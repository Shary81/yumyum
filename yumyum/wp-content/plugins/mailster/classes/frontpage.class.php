<?php

class MailsterFrontpage {

	public function __construct() {

		add_action( 'init', array( &$this, 'init' ) );

		add_action( 'query_vars', array( &$this, 'set_query_vars' ) );
		add_action( 'template_redirect', array( &$this, 'template_redirect' ), 1 );
		add_action( 'pre_get_posts', array( &$this, 'filter_status_on_archive' ), 1 );

		add_action( 'mailster_wphead', array( &$this, 'styles' ) );
		add_action( 'mailster_wpfooter', array( &$this, 'scripts' ) );

		add_filter( 'rewrite_rules_array', array( &$this, 'rewrite_rules' ) );

		add_action( 'post_updated', array( &$this, 'update_homepage' ) );
		add_filter( 'oembed_request_post_id', array( &$this, 'add_filter_status_to_publish' ) );

		add_shortcode( 'newsletter', array( &$this, 'newsletter' ) );
		add_shortcode( 'newsletter_list', array( &$this, 'newsletter_list' ) );
		add_shortcode( 'newsletter_signup_form', array( &$this, 'newsletter_signup_form' ) );

		add_shortcode( 'newsletter_signup', array( &$this, 'do_shortcode' ) );
		add_shortcode( 'newsletter_confirm', array( &$this, 'do_shortcode_wrong_confirm' ) );
		add_shortcode( 'newsletter_unsubscribe', array( &$this, 'do_shortcode_wrong_unsubscribe' ) );

		add_shortcode( 'newsletter_subscribers', array( &$this, 'newsletter_subscribers' ) );
		add_shortcode( 'newsletter_button', array( &$this, 'newsletter_button' ) );

	}


	public function init() {

		add_filter( 'the_content', array( &$this, 'shortcode_empty_paragraph_fix' ) );

		if ( mailster_option( '_flush_rewrite_rules' ) ) {
			flush_rewrite_rules( true );
			mailster_update_option( '_flush_rewrite_rules', false );
		}

	}


	/**
	 *
	 *
	 * @param unknown $wp_rules
	 * @return unknown
	 */
	public function rewrite_rules( $wp_rules ) {

		$slugs = implode( '|', (array) mailster_option( 'slugs', array( 'confirm', 'subscribe', 'unsubscribe', 'profile' ) ) );

		$homepage = mailster_option( 'homepage' );

		$pagename = str_replace( 'index.php/', '', untrailingslashit( str_replace( trailingslashit( get_bloginfo( 'url' ) ), '', get_permalink( $homepage ) ) ) );

		$rules = array();
		$rules[ '(index\.php/)?(' . preg_quote( $pagename ) . ')/(' . $slugs . ')/?([a-f0-9]{32})?/?([a-z0-9]*)?' ] = 'index.php?pagename=' . preg_replace( '#\.html$#', '', $pagename ) . '&_mailster_page=$matches[3]&_mailster_hash=$matches[4]&_mailster_extra=$matches[5]';

		if ( get_option( 'page_on_front' ) == $homepage && get_option( 'show_on_front' ) == 'page' ) {
			$rules[ '^(' . $slugs . ')/?([a-f0-9]{32})?/?([a-z0-9]*)?' ] = 'index.php?page_id=' . $homepage . '&_mailster_page=$matches[1]&_mailster_hash=$matches[2]&_mailster_extra=$matches[3]';
		}

		$rules['^(index\.php/)?(mailster|mymail)/([0-9]+)/([a-f0-9]{32})/?([a-zA-Z0-9=_+]+)?/?([0-9]+)?/?'] = 'index.php?_mailster=$matches[3]&_mailster_hash=$matches[4]&_mailster_page=$matches[5]&_mailster_extra=$matches[6]';

		$rules['^(index\.php/)?(mailster|mymail)/(subscribe|update|unsubscribe)/?$'] = 'index.php?_mailster=$matches[3]';

		if ( $secret = mailster_option( 'cron_secret' ) ) {
			$rules[ '^(index\.php/)?mailster/(' . $secret . ')/?$' ] = 'index.php?_mailster_cron=$matches[2]';
		}

		return $rules + $wp_rules;

	}


	/**
	 *
	 *
	 * @param unknown $post_id
	 */
	public function update_homepage( $post_id ) {

		$post = get_post( $post_id );
		if ( 'mailster' == $post->post_name ) {
			mailster_notice( sprintf( __( 'Please do not use %1$s in %2$s as page slug as it conflicts with Mailster form submission!', 'mailster' ), '&quot;<strong>mailster</strong>&quot;', '<a>' . str_replace( 'mailster', '<strong>mailster</strong>', get_permalink( $post_id ) . '</a>' ) ), 'error', true );
		}

		if ( $post_id == mailster_option( 'homepage' ) ) {
			flush_rewrite_rules();
		}

	}


	/**
	 *
	 *
	 * @param unknown $vars
	 * @return unknown
	 */
	public function set_query_vars( $vars ) {

		$vars[] = '_mailster';
		$vars[] = '_mailster_page';
		$vars[] = '_mailster_hash';
		$vars[] = '_mailster_extra';
		$vars[] = '_mailster_cron';
		return $vars;

	}


	/**
	 *
	 *
	 * @param unknown $subpage (optional)
	 * @param unknown $hash    (optional)
	 * @param unknown $extra   (optional)
	 * @return unknown
	 */
	public function get_link( $subpage = null, $hash = '', $extra = '' ) {

		$is_permalink = mailster( 'helper' )->using_permalinks();

		$homepage = get_permalink( mailster_option( 'homepage' ) );

		$prefix = ! mailster_option( 'got_url_rewrite' ) ? '/index.php' : '/';

		if ( ! $is_permalink ) {
			$homepage = str_replace( trailingslashit( get_bloginfo( 'url' ) ), untrailingslashit( get_bloginfo( 'url' ) ) . $prefix, $homepage );
		}

		if ( is_null( $subpage ) ) {
			return $homepage;
		}

		$subpage = $this->get_page_by_slug( $subpage );

		if ( $is_permalink ) {

			return trailingslashit( $homepage ) . trailingslashit( $subpage . '/' . $hash . '/' . $extra );

		} else {

			$query = array(
				'_mailster_page' => $subpage,
				'_mailster_hash' => $hash,
				'_mailster_extra' => $extra,
			);

			if ( get_option( 'page_on_front' ) == mailster_option( 'homepage' ) ) {
				$query = wp_parse_args( $query, array( 'page_id' => mailster_option( 'homepage' ) ) );
			}

			return add_query_arg( $query, $homepage );

		}

	}


	public function template_redirect() {

		global $wp, $post;

		if ( is_404() ) {
			if ( preg_match( '#^(index\.php/)?mailster/#', $wp->request ) && ! isset( $_REQUEST['mailster_error'] ) ) {
				flush_rewrite_rules();
				$redirect_to = add_query_arg( array( 'mailster_error' => 1 ), home_url( $wp->request ) );
				wp_redirect( $redirect_to, 302 );
				exit;
			}
		}

		// Mailster < 2 method
		if ( isset( $_GET['mailster'] ) ) {

			$target = isset( $_GET['t'] ) ? str_replace( '&amp;', '&', preg_replace( '/\s+/', '', $_GET['t'] ) ) : null;
			$hash = isset( $_GET['k'] ) ? preg_replace( '/\s+/', '', $_GET['k'] ) : null;
			$count = isset( $_GET['c'] ) ? intval( $_GET['c'] ) : 0;
			$campaign_id = intval( $_GET['mailster'] );
			if ( isset( $_GET['s'] ) ) {
				$target = ( ! empty( $_GET['s'] ) ? 'https://' : 'http://' ) . $target;
			}

			if ( preg_match( '#[a-zA-Z\d\/+]+#', $target ) ) {
				$target = base64_decode( strtr( $target, '-_', '+/' ) );
			}

			if ( false !== strpos( $target, 'unsubscribe=' ) ) {
				$target = untrailingslashit( $this->get_link( 'unsubscribe' ) );
			}

			if ( false !== strpos( $target, 'profile=' ) ) {
				$target = untrailingslashit( $this->get_link( 'profile' ) );
			}

			$wp->query_vars['_mailster'] = $campaign_id;
			$wp->query_vars['_mailster_page'] = rtrim( strtr( base64_encode( $target ), '+/', '-_' ), '=' );
			$wp->query_vars['_mailster_hash'] = $hash;
			$wp->query_vars['_mailster_extra'] = $count;

		}

		if ( isset( $_GET['mailster_unsubscribe'] ) ) {
			if ( mailster( 'helper' )->using_permalinks() ) {
				wp_redirect( $this->get_link( 'unsubscribe', $_GET['mailster_unsubscribe'], $_GET['k'] ), 301 );
				exit;
			} else {
				$wp->query_vars['_mailster_page'] = 'unsubscribe';
				$wp->query_vars['_mailster_hash'] = isset( $_GET['k'] ) ? preg_replace( '/\s+/', '', $_GET['k'] ) : null;

			}
		} elseif ( isset( $_GET['mailster_profile'] ) ) {
			if ( mailster( 'helper' )->using_permalinks() ) {
				wp_redirect( $this->get_link( 'profile', $_GET['mailster_profile'] ), 301 );
				exit;
			} else {
				$wp->query_vars['_mailster_page'] = 'profile';
				$wp->query_vars['_mailster_hash'] = isset( $_GET['k'] ) ? preg_replace( '/\s+/', '', $_GET['k'] ) : null;

			}
		} elseif ( isset( $_GET['mailster_confirm'] ) ) {
			if ( mailster( 'helper' )->using_permalinks() ) {
				wp_redirect( $this->get_link( 'confirm', $_GET['mailster_confirm'] ), 301 );
				exit;
			} else {
				$wp->query_vars['_mailster_page'] = 'confirm';
				$wp->query_vars['_mailster_hash'] = isset( $_GET['k'] ) ? preg_replace( '/\s+/', '', $_GET['k'] ) : null;

			}
		}

		// convert custom slugs
		if ( isset( $wp->query_vars['_mailster_page'] ) && ! empty( $wp->query_vars['_mailster_page'] ) && mailster( 'helper' )->using_permalinks() ) {
			$wp->query_vars['_mailster_page'] = $this->get_page_by_slug( $wp->query_vars['_mailster_page'] );
		}

		if ( isset( $wp->query_vars['_mailster'] ) && in_array( $wp->query_vars['_mailster'], array( 'subscribe', 'update', 'unsubscribe' ) ) ) {

			$this->do_post_actions();

		} elseif ( isset( $wp->query_vars['_mailster'] ) ) {

				$this->do_tracking_actions();

		} elseif ( isset( $wp->query_vars['_mailster_page'] ) ) {

			$this->do_mailster_require_filesystem();

		} else {

		}

		// front page & archive page
		if ( isset( $wp->query_vars['post_type'] ) && $wp->query_vars['post_type'] == 'newsletter' ) {

			if ( is_archive() ) {

				add_filter( 'get_the_excerpt', array( &$this, 'content_as_iframe' ), -1 );
				add_filter( 'get_the_content', array( &$this, 'content_as_iframe' ), -1 );
				add_filter( 'the_excerpt', array( &$this, 'content_as_iframe' ), -1 );
				add_filter( 'the_content', array( &$this, 'content_as_iframe' ), -1 );

			} elseif ( function_exists( 'is_embed' ) && is_embed() ) {

					// alter the embed content
					add_filter( 'the_excerpt_embed', array( &$this, 'the_excerpt_embed' ), -1 );

			} else {
				$this->do_frontpage();
			}
		}

	}


	private function do_post_actions() {

		global $wp;

		switch ( $wp->query_vars['_mailster'] ) {
			case 'subscribe':
				mailster( 'form' )->submit();
			break;
			case 'update':
				mailster( 'form' )->submit();
			break;
			case 'unsubscribe':
				mailster( 'form' )->unsubscribe();
			break;
		}
		exit;
	}


	private function do_tracking_actions() {

		global $wp;

		$campaign_id = intval( $wp->query_vars['_mailster'] );
		$target = base64_decode( strtr( $wp->query_vars['_mailster_page'], '-_', '+/' ) );
		$hash = $wp->query_vars['_mailster_hash'];
		$index = $wp->query_vars['_mailster_extra'];
		$redirect_to = null;

		$subscriber = mailster( 'subscribers' )->get_by_hash( $hash, false );
		$campaign = mailster( 'campaigns' )->get( $campaign_id, false );

		if ( $subscriber ) {

			$subscriber_id = $subscriber->ID;

			if ( $target ) {

				if ( ! preg_match( '#^https?:#', $target ) ) {
					wp_die( 'Invalid URL' );
				}

				setcookie( 'mailster', $subscriber->hash, time() + 1800, COOKIEPATH, COOKIE_DOMAIN );

				$target = apply_filters( 'mymail_click_target', apply_filters( 'mailster_click_target', $target, $campaign->ID ), $campaign->ID );

				do_action( 'mailster_click', $subscriber->ID, $campaign->ID, $target, $index );
				do_action( 'mymail_click', $subscriber->ID, $campaign->ID, $target, $index );

				$redirect_to = $target;

				// append hash and campaign_id if unsubscribe link
				if ( untrailingslashit( $this->get_link( 'unsubscribe' ) ) == $redirect_to ) :
					$redirect_to = $this->get_link( 'unsubscribe', $subscriber->hash, $wp->query_vars['_mailster'] );

				elseif ( untrailingslashit( $this->get_link( 'profile' ) ) == $redirect_to ) :
					$redirect_to = $this->get_link( 'profile', md5( wp_create_nonce( 'mailster_nonce' ) . $subscriber->hash ), $wp->query_vars['_mailster'] );

				endif;

			} else {

				do_action( 'mailster_open', $subscriber->ID, $campaign->ID );
				do_action( 'mymail_open', $subscriber->ID, $campaign->ID );

			}

			if ( ! $redirect_to ) {
				$redirect_to = $target ? apply_filters( 'mymail_click_target', apply_filters( 'mailster_click_target', $target, $campaign->ID ), $campaign->ID ) : false;
			}

			// user doesn't exists
		} else {

			$subscriber_id = null;

			$redirect_to = $target ? apply_filters( 'mymail_click_target', apply_filters( 'mailster_click_target', $target, $campaign->ID ), $campaign->ID ) : false;

		}

		// no target => tracking image
		if ( ! $redirect_to ) {

			nocache_headers();
			header( 'Content-type: image/gif' );
			// The transparent, beacon image
			echo chr( 71 ) . chr( 73 ) . chr( 70 ) . chr( 56 ) . chr( 57 ) . chr( 97 ) . chr( 1 ) . chr( 0 ) . chr( 1 ) . chr( 0 ) . chr( 128 ) . chr( 0 ) . chr( 0 ) . chr( 0 ) . chr( 0 ) . chr( 0 ) . chr( 0 ) . chr( 0 ) . chr( 0 ) . chr( 33 ) . chr( 249 ) . chr( 4 ) . chr( 1 ) . chr( 0 ) . chr( 0 ) . chr( 0 ) . chr( 0 ) . chr( 44 ) . chr( 0 ) . chr( 0 ) . chr( 0 ) . chr( 0 ) . chr( 1 ) . chr( 0 ) . chr( 1 ) . chr( 0 ) . chr( 0 ) . chr( 2 ) . chr( 2 ) . chr( 68 ) . chr( 1 ) . chr( 0 ) . chr( 59 );

		} else {
			// redirect in any case with 307 (temporary moved) to force tracking
			$to = apply_filters( 'mymail_redirect_to', apply_filters( 'mailster_redirect_to', $redirect_to, $campaign_id, $subscriber_id ), $campaign_id, $subscriber_id );
			$to = str_replace( '&amp;', '&', $to );
			header( 'Location: ' . $to, true, 307 );

		}

		exit;
	}


	private function do_mailster_require_filesystem() {

		global $wp;

		// remove this filter as it's cause redirection to homepage in WP 4.5
		if ( is_front_page() ) {
			remove_action( 'template_redirect', 'redirect_canonical' );
		}

		switch ( $wp->query_vars['_mailster_page'] ) {

			case 'subscribe':

				do_action( 'mailster_homepage_subscribe' );
				do_action( 'mymail_homepage_subscribe' );

			break;

			case 'unsubscribe':

				do_action( 'mailster_homepage_unsubscribe' );
				do_action( 'mymail_homepage_unsubscribe' );

			break;

			case 'profile':

				do_action( 'mailster_homepage_profile' );
				do_action( 'mymail_homepage_profile' );

				// redirect if no hash is set
				if ( empty( $wp->query_vars['_mailster_hash'] ) ) {

					if ( is_user_logged_in() ) {
						if ( $subscriber = mailster( 'subscribers' )->get_by_wpid( get_current_user_id() ) ) {
							$wp->query_vars['_mailster_hash'] = md5( wp_create_nonce( 'mailster_nonce' ) . $subscriber->hash );
						}
					}

					if ( empty( $wp->query_vars['_mailster_hash'] ) ) {

						wp_redirect( $this->get_link(), 301 );
						exit;
					}
				}

			break;

			case 'confirm':

				do_action( 'mailster_homepage_confirm' );
				do_action( 'mymail_homepage_confirm' );

				$subscriber = mailster( 'subscribers' )->get_by_hash( $wp->query_vars['_mailster_hash'] );
				// redirect if no such subscriber
				if ( ! $subscriber ) {

					wp_redirect( $this->get_link(), 301 );
					exit;
				}

				$form_id = mailster( 'subscribers' )->meta( $subscriber->ID, 'form' );
				$form = mailster( 'forms' )->get( $form_id, false, false );

				$target = ! empty( $form->confirmredirect ) ? $form->confirmredirect : $this->get_link( 'subscribe', $subscriber->hash, true );

				// subscriber no "pending" anymore
				if ( 0 == $subscriber->status ) {

					$ip = mailster_option( 'track_users' ) ? mailster_get_ip() : null;
					$user_meta = array(
					'ID' => $subscriber->ID,
					'confirm' => time(),
					'status' => 1,
					'ip_confirm' => $ip,
					'ip' => $ip,
					'lang' => mailster_get_lang(),
					);

					if ( 'unknown' !== ( $geo = mailster_ip2City() ) ) {

							$user_meta['geo'] = $geo->country_code . '|' . $geo->city;
						if ( $geo->city ) {
							$user_meta['coords'] = floatval( $geo->latitude ) . ',' . floatval( $geo->longitude );
						}
					}

					if ( $subscriber_id = mailster( 'subscribers' )->update( $user_meta, true, false, true ) ) {

						if ( ! is_wp_error( $subscriber_id ) ) {
							do_action( 'mailster_subscriber_subscribed', $subscriber->ID );
							do_action( 'mymail_subscriber_subscribed', $subscriber->ID );
							// old hook for backward compatibility
							do_action( 'mymail_subscriber_insert', $subscriber->ID );
						}
					} else {

							wp_redirect( $this->get_link(), 301 );
							exit;
					}
				}

				$redirect_to = apply_filters( 'mymail_confirm_target', apply_filters( 'mailster_confirm_target', $target, $subscriber->ID ), $subscriber->ID );

				wp_redirect( $redirect_to, 301 );
			exit;
			break;

		}

	}


	/**
	 *
	 *
	 * @param unknown $post_id
	 * @return unknown
	 */
	public function add_filter_status_to_publish( $post_id ) {

		add_filter( 'get_post_status', array( &$this, 'status_to_publish' ), 10, 2 );

		return $post_id;

	}


	/**
	 *
	 *
	 * @param unknown $post_status
	 * @param unknown $post
	 * @return unknown
	 */
	public function status_to_publish( $post_status, $post ) {

		if ( 'newsletter' == $post->post_type && in_array( $post_status, array( 'finished', 'paused', 'queued' ) ) ) {
			return 'publish';
		}

		return $post_status;

	}


	/**
	 *
	 *
	 * @param unknown $output
	 * @return unknown
	 */
	public function the_excerpt_embed( $output ) {

		global $post;

		if ( ! $post ) {
			return $output;
		}

		return mailster( 'campaigns' )->get_excerpt( $post->ID );
	}


	private function do_frontpage() {

		global $wp, $post;

		if ( isset( $wp->query_vars['preview'] ) ) {
			$preview = true;
			$args['post_type'] = 'newsletter';
			$args['p'] = $wp->query_vars['p'];

		} else {
			$preview = false;
			$args['post_type'] = 'newsletter';
			$args['post_status'] = array( 'finished', 'active' );
		}

		$args['posts_per_page'] = -1;
		$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$args['orderby'] = 'menu_order';

		if ( have_posts() ) : while ( have_posts() ) : the_post();

				$meta = mailster( 'campaigns' )->meta( get_the_ID() );

				if ( isset( $_GET['frame'] ) && $_GET['frame'] == '0' ) {

					// remove oembed
					if ( isset( $GLOBALS['wp_embed'] ) ) {
						remove_filter( 'the_content', array( $GLOBALS['wp_embed'], 'run_shortcode' ), 8 );
						remove_filter( 'the_content', array( $GLOBALS['wp_embed'], 'autoembed' ), 8 );
					}

					if ( post_password_required() ) {

						// unlock post if pwd hash is provided
						if ( isset( $_GET['pwd'] ) && $_GET['pwd'] == md5( $post->post_password . AUTH_KEY ) ) {
							require_once ABSPATH . WPINC . '/class-phpass.php';
							$hasher = new PasswordHash( 8, true );
							$pwd = $hasher->HashPassword( wp_unslash( $post->post_password ) );
							$_COOKIE[ 'wp-postpass_' . COOKIEHASH ] = $pwd;
						}
					}

					$content = get_the_content();

					if ( post_password_required() ) {
						wp_die( $content );
					}

					if ( ! $content ) {
						wp_die( __( 'There is no content for this newsletter.', 'mailster' ) . ( current_user_can( 'edit_newsletters' ) ? ' <a href="' . admin_url( 'post.php?post=' . get_the_ID() . '&action=edit' ) . '">' . __( 'Add content', 'mailster' ) . '</a>' : '' ) );
					}

					$content = mailster()->sanitize_content( $content, null, $meta['head'] );

					$placeholder = mailster( 'placeholder', $content );
					$placeholder->excerpt_filters( false );
					$placeholder->set_campaign( get_the_ID() );
					$unsubscribe_homepage = ( get_page( mailster_option( 'homepage' ) ) ) ? get_permalink( mailster_option( 'homepage' ) ) : get_bloginfo( 'url' );
					$unsubscribe_homepage = apply_filters( 'mymail_unsubscribe_link', apply_filters( 'mailster_unsubscribe_link', $unsubscribe_homepage ) );

					$unsubscribelink = mailster()->get_unsubscribe_link( get_the_ID() );
					$forwardlink = mailster()->get_forward_link( get_the_ID() );
					$profilelink = mailster()->get_profile_link( get_the_ID() );

					$placeholder->add( array(
						'preheader' => $meta['preheader'],
						'subject' => $meta['subject'],
						'webversion' => '<a href="{webversionlink}">' . mailster_text( 'webversion' ) . '</a>',
						'webversionlink' => get_permalink( get_the_ID() ),
						'unsub' => '<a href="{unsublink}">' . mailster_text( 'unsubscribelink' ) . '</a>',
						'unsublink' => $unsubscribelink,
						'forward' => '<a href="{forwardlink}">' . mailster_text( 'forward' ) . '</a>',
						'forwardlink' => $forwardlink,
						'profile' => '<a href="{profilelink}">' . mailster_text( 'profile' ) . '</a>',
						'profilelink' => $profilelink,
						'email' => antispambot( 'some@example.com' ),
					) );

					$placeholder->share_service( get_permalink( get_the_ID() ), get_the_title() );

					$content = $placeholder->get_content();
					$search = array( '<a ',  '@media only screen and (max-device-width:' );
					$replace = array( '<a target="_top" ', '@media only screen and (max-width:' );
					$content = str_replace( $search, $replace, $content );

					if ( mailster_option( 'frontpage_public' ) || ! get_option( 'blog_public' ) ) {
						$content = str_replace( '</head>', "<meta name='robots' content='noindex,nofollow' />\n</head>", $content );
					}

					echo $content;

					exit;

				} else {

					add_filter( 'get_previous_post_where', array( &$this, 'get_post_where' ) );
					add_filter( 'get_next_post_where', array( &$this, 'get_post_where' ) );

					$url = add_query_arg( 'frame', 0, get_permalink() );

					if ( $preview ) {
						$url = add_query_arg( 'preview', 1, $url );
					}

					$social_services = mailster( 'helper' )->social_services();

					if ( ! $custom = locate_template( 'single-newsletter.php' ) ) {

						include MAILSTER_DIR . 'views/single-newsletter.php';

					} else {

						include $custom;

					}

					exit;
				}

		endwhile;

		else :
			// NOT FOUND
			global $wp_query;
			$wp_query->set_404();
			status_header( 404 );
			get_template_part( 404 );
			exit;

		endif;

		// Reset Post Data
		wp_reset_postdata();

	}


	/**
	 *
	 *
	 * @param unknown $campaign_id (optional)
	 * @param unknown $width       (optional)
	 * @param unknown $height      (optional)
	 * @return unknown
	 */
	public function content_as_iframe( $campaign_id = null, $width = 610, $height = null ) {

		global $post;

		if ( is_integer( $campaign_id ) ) {
			$campaign = mailster( 'campaigns' )->get( $campaign_id );
		} else {
			$campaign = $post;
		}
		if ( ! isset( $campaign ) || ( isset( $campaign ) && $campaign->post_type != 'newsletter' ) ) {
			return '';
		}

		switch ( current_filter() ) {
			case 'the_excerpt':
			case 'get_the_excerpt':
				remove_filter( 'get_the_content', array( &$this, 'content_as_iframe' ), -1 );
				add_filter( 'get_the_content', '__return_empty_string', -1 );
				remove_filter( 'the_content', array( &$this, 'content_as_iframe' ), -1 );
				add_filter( 'the_content', '__return_empty_string', -1 );
			break;
			case 'the_content':
			case 'get_the_content':
				remove_filter( 'get_the_excerpt', array( &$this, 'content_as_iframe' ), -1 );
				add_filter( 'get_the_excerpt', '__return_empty_string', -1 );
				remove_filter( 'the_excerpt', array( &$this, 'content_as_iframe' ), -1 );
				add_filter( 'the_excerpt', '__return_empty_string', -1 );
			break;
		}

		return '<iframe class="mailster-frame mailster-frame-' . $campaign->ID . '" src="' . add_query_arg( 'frame', 0, get_permalink( $campaign->ID ) ) . '" style="width:' . $width . 'px;' . ( $height ? 'height=' . intval( $height ) . 'px;' : '' ) . '" width="' . apply_filters( 'mymail_iframe_width', apply_filters( 'mailster_iframe_width', '100%' ) ) . '" scrolling="auto" frameborder="0" onload="this.height=this.contentWindow.document.body.scrollHeight+20;" data-no-lazy=""></iframe>';

	}


	/**
	 *
	 *
	 * @param unknown $query
	 */
	public function filter_status_on_archive( $query ) {
		if ( is_admin() ) {
			return;
		}

		if ( $query->is_main_query() && $query->is_post_type_archive( 'newsletter' ) ) {
			$query->set( 'post_status', mailster_option( 'archive_types', array( 'finished', 'active' ) ) );
		}

	}


	public function styles() {

		$suffix = SCRIPT_DEBUG ? '' : '.min';

		wp_register_style( 'mailster-frontpage-style', MAILSTER_URI . 'assets/css/frontpage' . $suffix . '.css', array(), MAILSTER_VERSION );
		wp_print_styles( 'mailster-frontpage-style' );

	}


	public function scripts() {

		$suffix = SCRIPT_DEBUG ? '' : '.min';

		wp_register_script( 'mailster-frontpage-script', MAILSTER_URI . 'assets/js/frontpage' . $suffix . '.js', array( 'jquery' ), MAILSTER_VERSION );
		wp_localize_script( 'mailster-frontpage-script', 'ajaxurl', admin_url( 'admin-ajax.php' ) );

		wp_print_scripts( 'mailster-frontpage-script' );

	}


	/**
	 *
	 *
	 * @param unknown $sql
	 * @return unknown
	 */
	public function get_post_where( $sql ) {
		return str_replace( "post_status = 'publish'", "post_status IN ('finished', 'active') AND post_password = ''", $sql );
	}


	/**
	 *
	 *
	 * @param unknown $slug
	 * @return unknown
	 */
	public function get_page_by_slug( $slug ) {

		$slugs = mailster_option( 'slugs' );

		$return = is_array( $slugs ) ? array_search( $slug, $slugs ) : $slug;

		if ( empty( $return ) ) {
			$return = isset( $slugs[ $slug ] ) ? $slugs[ $slug ] : $slug;
		}

		return $return;
	}


	/**
	 *
	 *
	 * @param unknown $atts
	 * @param unknown $content
	 * @return unknown
	 */
	public function do_shortcode( $atts, $content ) {

		global $wp, $post;

		$content = get_the_content();

		// signup form
		if ( ! isset( $wp->query_vars['_mailster_page'] ) ) {

			$pattern = '\[(\[?)(newsletter_signup)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)';

			if ( preg_match( '/' . $pattern . '/s', $content, $matches ) ) {
				return do_shortcode( wpautop( $matches[5] ) );
			}

			return '';

		}

		switch ( $wp->query_vars['_mailster_page'] ) {

			case 'confirm':

			break;

			case 'subscribe':

				$subscriber = mailster( 'subscribers' )->get_by_hash( $wp->query_vars['_mailster_hash'] );

				if ( $subscriber->status == 1 ) {

					$pattern = '\[(\[?)(newsletter_confirm)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)';

					preg_match( '/' . $pattern . '/s', $content, $matches );

					return ! empty( $matches[5] ) ? do_shortcode( $matches[5] ) : mailster_text( 'success' );

				} else {

					return mailster_text( 'unsubscribeerror' );

				}

			break;

			case 'profile':

				$form = mailster( 'form' )->id( mailster_option( 'profile_form', 1 ) );
				$form->is_profile();
			return $form->render();

			break;

			case 'unsubscribe':

				$pattern = '\[(\[?)(newsletter_unsubscribe)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)';

				if ( preg_match( '/' . $pattern . '/s', $content, $matches ) ) {
					echo do_shortcode( wpautop( $matches[5] ) );
				}

				$form = mailster( 'form' );
				$form->is_unsubscribe();
				$form->campaign_id( isset( $wp->query_vars['_mailster'] ) ? $wp->query_vars['_mailster'] : $wp->query_vars['_mailster_extra'] );
			return $form->render();

			break;

			default:

			return do_shortcode( $content );

		}

	}


	/**
	 *
	 *
	 * @param unknown $atts
	 * @param unknown $content
	 * @return unknown
	 */
	public function newsletter( $atts, $content ) {

		if ( ! isset( $atts['id'] ) || ( ! is_single() && ! is_page() ) ) {
			return false;
		}

		$link = get_permalink( $atts['id'] );

		if ( ! $link ) {
			return '';
		}

		extract( shortcode_atts( array(
					'scrolling' => true,
		), $atts ) );

		return '<iframe class="mailster_frame" src="' . add_query_arg( 'frame', 0, $link ) . '" style="min-width:610px;" width="' . apply_filters( 'mymail_iframe_width', apply_filters( 'mailster_iframe_width', '100%' ) . '" scrolling="' . ( $scrolling ? 'auto' : 'no' ) ) . '" frameborder="0" onload="this.height=this.contentWindow.document.body.scrollHeight+20;" data-no-lazy=""></iframe>';

	}


	/**
	 *
	 *
	 * @param unknown $atts
	 * @param unknown $content
	 * @return unknown
	 */
	public function newsletter_list( $atts, $content ) {
		extract( shortcode_atts( array(
					'date' => false,
					'count' => 10,
					'status' => array( 'finished', 'active' ),
					'order' => 'desc',
					'orderby' => 'date',
		), $atts ) );

		$r = new WP_Query( array(
				'post_type' => 'newsletter',
				'posts_per_page' => $count,
				'no_found_rows' => true,
				'post_status' => $status,
				'ignore_sticky_posts' => true,
				'order' => $order,
				'orderby' => $orderby,
		) );

		$return = '';

		if ( $r->have_posts() ) :

			$return .= '<ul class="mailster-newsletter-list">';
			while ( $r->have_posts() ) : $r->the_post();
				$title = get_the_title();
				$return .= '<li><a href="' . get_permalink() . '" title="' . esc_attr( $title ) . '">' . $title . '</a>';
				if ( $date ) {
					$return .= ' <span class="mailster-newsletter-date">' . get_the_date() . '</span>';
				}

				$return .= '</li>';
		endwhile;
			$return .= '</ul>';

			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

		endif;

		return $return;

	}


	/**
	 *
	 *
	 * @param unknown $atts
	 * @return unknown
	 */
	public function newsletter_subscribers( $atts ) {
		extract( shortcode_atts( array(
			'formatted' => true,
			'round' => 1,
			'lists' => null,
		), $atts ) );

		$round = max( 1, $round );

		if ( ! is_null( $lists ) ) {
			$lists = explode( ',', (string) $lists );
			$subscribers = mailster( 'lists' )->count( $lists, 1 );
		} else {
			$subscribers = mailster( 'subscribers' )->get_count_by_status( 1 );
		}

		$subscribers = ceil( $subscribers / $round ) * $round;
		if ( $formatted ) {
			$subscribers = number_format_i18n( $subscribers );
		}

		return $subscribers;
	}


	/**
	 *
	 *
	 * @param unknown $atts
	 * @param unknown $content
	 * @return unknown
	 */
	public function newsletter_signup( $atts, $content ) {
		return do_shortcode( $content );
	}


	/**
	 *
	 *
	 * @param unknown $atts
	 * @param unknown $content
	 * @return unknown
	 */
	public function newsletter_signup_form( $atts, $content ) {

		if ( ! isset( $atts['id'] ) ) {
			$atts['id'] = mailster( 'helper' )->get_first_form_id();
		}

		$form = mailster( 'form' )->id( $atts['id'] );
		return $form->render( false );
	}


	/**
	 *
	 *
	 * @param unknown $atts
	 * @param unknown $content
	 * @return unknown
	 */
	public function do_shortcode_wrong_confirm( $atts, $content ) {

		return $this->do_shortcode_wrong( 'newsletter_confirm', $atts, $content );

	}


	/**
	 *
	 *
	 * @param unknown $atts
	 * @param unknown $content
	 * @return unknown
	 */
	public function do_shortcode_wrong_unsubscribe( $atts, $content ) {

		return $this->do_shortcode_wrong( 'newsletter_unsubscribe', $atts, $content );

	}


	/**
	 *
	 *
	 * @param unknown $shorttcode
	 * @param unknown $atts
	 * @param unknown $content
	 * @return unknown
	 */
	private function do_shortcode_wrong( $shorttcode, $atts, $content ) {

		if ( ! is_mailster_newsletter_homepage() && is_user_logged_in() ) {
			$msg = sprintf( __( 'You should use the shortcode %s only on the newsletter homepage!', 'mailster' ), "[$shorttcode]" );
			_doing_it_wrong( "[$shorttcode]", $msg, '2.1.5' );
			return '<p>' . $msg . '</p>';
		}
		return;
	}


	/**
	 *
	 *
	 * @param unknown $atts
	 * @param unknown $content
	 * @return unknown
	 */
	public function newsletter_button( $atts, $content ) {

		$args = shortcode_atts( array(
			'id' => 1,
			'showcount' => false,
			'label' => mailster_text( 'submitbutton' ),
			'design' => 'default',
			'width' => 480,
			'endpoint' => MAILSTER_URI . 'form.php',
		), $atts );

		return mailster( 'forms' )->get_subscribe_button( $args['id'], $args );

	}


	/**
	 *
	 *
	 * @param unknown $content
	 * @return unknown
	 */
	public function shortcode_empty_paragraph_fix( $content ) {

		// array of custom shortcodes requiring the fix
		$block = join( '|', array( 'newsletter', 'newsletter_signup', 'newsletter_signup_form', 'newsletter_confirm', 'newsletter_unsubscribe', 'newsletter_subscribers', 'newsletter_subscribe' ) );

		// opening tag
		$rep = preg_replace( "/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/", '[$2$3]', $content );

		// closing tag
		$rep = preg_replace( "/(<p>)?\[\/($block)](<\/p>|<br \/>)?/", '[/$2]', $rep );

		return $rep;

	}


}
