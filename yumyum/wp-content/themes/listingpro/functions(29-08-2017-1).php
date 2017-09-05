<?php
/**
 * Listingpro Functions.
 *
 */
 
	define('THEME_PATH', get_template_directory());
	define('THEME_DIR', get_template_directory_uri());
	define('STYLESHEET_PATH', get_stylesheet_directory());
	define('STYLESHEET_DIR', get_stylesheet_directory_uri());


	/* ============== Theme Setup ============ */
	remove_filter( 'the_content', 'wpautop' );
	add_action( 'after_setup_theme', 'listingpro_theme_setup' );
	function listingpro_theme_setup() {
		
		/* Text Domain */
		load_theme_textdomain( 'listingpro', get_template_directory() . '/languages' );
		
		/* Theme supports */
		
		add_editor_style();
		add_theme_support( 'post-thumbnails' );
		add_theme_support( "title-tag" );
		add_theme_support( "custom-header" );
		add_theme_support( "custom-background" ) ;
		add_theme_support('automatic-feed-links');
		
		remove_post_type_support( 'page', 'thumbnail' );
		
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
			'search-form',
			'comment-form',
			'comment-list'
			)
		);
		
		// We are using three menu locations.
		register_nav_menus( array(
			'primary'         => esc_html__( 'Homepage Menu', 'listingpro' ),
			//'primary_inner'   => esc_html__( 'Inner Pages Menu', 'listingpro' ),
			//'top_menu'        => esc_html__( 'Top Bar Menu', 'listingpro' ),
			//'footer_menu' 	  => esc_html__( 'Footer Menu', 'listingpro' ),
		) );
		
		/* Image sizes */
		add_image_size( 'listingpro-blog-grid', 372, 240, true ); // (cropped)		
		add_image_size( 'listingpro-listing-grid', 272, 231, true ); // (cropped)		
		add_image_size( 'listingpro-listing-gallery', 580, 408, true ); // (cropped)		
		add_image_size( 'listingpro-list-thumb',287, 190, true ); // (cropped)		
		add_image_size( 'listingpro-author-thumb',63, 63, true ); // (cropped)		
		add_image_size( 'listingpro-gallery-thumb1',458, 425, true ); // (cropped)		
		add_image_size( 'listingpro-gallery-thumb2',360, 198, true ); // (cropped)		
		add_image_size( 'listingpro-gallery-thumb3',263, 198, true ); // (cropped)		
		add_image_size( 'listingpro-gallery-thumb4',653, 199, true ); // (cropped)
		//by Harry
		add_image_size( 'listingpro-detail_gallery',383, 454, true ); // (cropped)
		add_image_size( 'listingpro-gal',990, 1200, true ); // (cropped)
		//by zaheer
		add_image_size( 'listingpro-dashboard-listing-thumb',160, 105, true ); // (cropped)	
		add_image_size( 'listingpro-checkout-listing-thumb',220, 80, true ); // (cropped)	
		add_image_size( 'listingpro-review-gallery-thumb',184, 135, true ); // (cropped)
		add_image_size( 'listingpro-checkout-listing-thumb-order',142, 100, true ); // (cropped)		
		
		
		
		
	}
	
	if ( ! isset( $content_width ) ) $content_width = 900;
	/* ============== Dynamic options and Styling ============ */
	require_once THEME_PATH . '/include/dynamic-options.php';
	
	/* ============== Breadcrumb ============ */
	require_once THEME_PATH . '/templates/breadcrumb.php';
	
	/* ============== Blog Comments ============ */
	require_once THEME_PATH . '/templates/blog-comments.php';	

	/* ============== Required Plugins ============ */
	require_once THEME_PATH . "/include/plugins/install-plugin.php";
	
	/* ============== icons ============ */
	require_once THEME_PATH . "/include/icons.php";
	
	/* ============== List confirmation ============ */
	require_once THEME_PATH . "/include/list-confirmation.php";
	
	/* ============== Login/Register ============ */
	require_once THEME_PATH . "/include/login-register.php";
	
	/* ============== Search Filter ============ */
	require_once THEME_PATH . "/include/search-filter.php";
	
	/* ============== Claim List ============ */
	require_once THEME_PATH . "/include/single-ajax.php";
	
	/* ============== Social Share ============ */
	require_once THEME_PATH . "/include/social-share.php";
	
	/* ============== Ratings ============ */
	require_once THEME_PATH . "/include/reviews/ratings.php";
	
	/* ============== Last Review ============ */
	require_once THEME_PATH . "/include/reviews/last-review.php";
	
	/* ============== Check Time status ============ */
	require_once THEME_PATH . "/include/time-status.php";
	
	/* ============== Banner Catss ============ */
	require_once THEME_PATH . "/include/banner-cats.php";
	
	/* ============== Fav Function ============ */
	require_once THEME_PATH . "/include/favorite-function.php";
	
	/* ============== Live Chat ============ */
	//require_once THEME_PATH . "/include/live-chat.php";
	
	/* ============== listing Widgets ============ */
	require_once THEME_PATH . "/include/widgets/widget_most_viewed.php";
	require_once THEME_PATH . "/include/widgets/widget_featured_listing.php";
	require_once THEME_PATH . "/include/widgets/widget_ads_listing.php";
	
	/* ============== Reviews Form ============ */
	require_once THEME_PATH . "/include/reviews/reviews-form.php";
	
	/* ============== all reviews ============ */
	require_once THEME_PATH . "/include/reviews/all-reviews.php";
	
	/* ============== review-submit ============ */
	require_once THEME_PATH . "/include/reviews/review-submit.php";
	
	/* ============== all reviews ============ */
	require_once THEME_PATH . "/include/all-extra-fields.php";
	
	
		/* ============== listing campaign save  ============ */
	require_once THEME_PATH . "/include/paypal/campaign-save.php";
	
	/* ============== invoice function ============ */
	require_once THEME_PATH . "/include/invoices/invoice-functions.php";
	
	require_once THEME_PATH . "/include/invoices/invoice-modal.php";
	
	
	/* ============== Approve review ============ */
	require_once THEME_PATH . "/include/reviews/approve-review.php";
	
	/* ============== setup wizard =============== */
	require_once THEME_PATH . "/include/setup/envato_setup.php";
	//importer
	require_once THEME_PATH . "/include/setup/importer/init.php";
	
	/* ============== listing data db save ============ */
	require_once THEME_PATH . "/include/listingdata_db_save.php";
	
	/* ============== listing home map  ============ */
	require_once THEME_PATH . "/include/home_map.php";
	
	/* ============== listing stripe ajax  ============ */
	require_once THEME_PATH . "/include/stripe/stripe-ajax.php";
	
	
	
	
	
	/* ============== ListingPro Style Load ============ */
	add_action('wp_enqueue_scripts', 'listingpro_style');
	function listingpro_style() {

		wp_enqueue_style('bootstrap-reboot', THEME_DIR . '/assets/Bootstrap/dist/css/bootstrap.css');
		wp_enqueue_style('bootstrap', THEME_DIR . '/assets/Bootstrap/dist/css/bootstrap.css');
		wp_enqueue_style('Bootstrap-Grid', THEME_DIR . '/assets/Bootstrap/dist/css/bootstrap-grid.css');
		wp_enqueue_style('Theme-Styles', THEME_DIR . '/assets/css/theme-styles.css');
		wp_enqueue_style('blocks', THEME_DIR . '/assets/css/blocks.css');
		wp_enqueue_style('fonts', THEME_DIR . '/assets/css/fonts.css');
		wp_enqueue_style('Jquery mCustomScrollbar Min', THEME_DIR . '/assets/css/jquery.mCustomScrollbar.min.css');
		wp_enqueue_style('daterangepicker', THEME_DIR . '/assets/css/daterangepicker.css');
		wp_enqueue_style('Bootstrap Select', THEME_DIR . '/assets/css/bootstrap-select.css');
		wp_enqueue_style('listingpro-child', STYLESHEET_DIR . '/style.css');
		
		wp_enqueue_style( 'cssmenu-styles', get_template_directory_uri() . '/assets/css/nav-styles.css');
		
		wp_enqueue_style('bootstrap', THEME_DIR . '/assets/lib/bootstrap/css/bootstrap.css');
		wp_enqueue_style('jQuery-Filler', THEME_DIR . '/assets/lib/jquery-filer-master/css/jquery.filer.css');
		wp_enqueue_style('jQuery-Filler-Theme', THEME_DIR . '/assets/lib/jquery-filer-master/css/themes/jquery-filer-theme.css');
		wp_enqueue_style('Magnific-Popup', THEME_DIR . '/assets/lib/Magnific-Popup-master/magnific-popup.css');
		wp_enqueue_style('popup-component', THEME_DIR . '/assets/lib/popup/css/component.css');
		wp_enqueue_style('icon8', THEME_DIR . '/assets/lib/icon8/styles.min.css');
		wp_enqueue_style('Font-awesome', THEME_DIR . '/assets/lib/font-awesome/css/font-awesome.min.css');
		wp_enqueue_style('Mmenu', THEME_DIR . '/assets/lib/jquerym.menu/css/jquery.mmenu.all.css');
		wp_enqueue_style('MapBox', THEME_DIR . '/assets/css/mapbox.css');
		wp_enqueue_style('Chosen', THEME_DIR . '/assets/lib/chosen/chosen.css');
		
		wp_enqueue_style('Slick-css', THEME_DIR . '/assets/lib/slick/slick.css');
		wp_enqueue_style('Slick-theme', THEME_DIR . '/assets/lib/slick/slick-theme.css');
		
		wp_enqueue_style('jquery-ui', THEME_DIR . '/assets/css/jquery-ui.css');
		wp_enqueue_style('Color', THEME_DIR . '/assets/css/colors.css');
		wp_enqueue_style('custom-font', THEME_DIR . '/assets/css/font.css');		
		wp_enqueue_style('Main', THEME_DIR . '/assets/css/main.css');
		wp_enqueue_style('Responsive', THEME_DIR . '/assets/css/responsive.css');
		/* by haroon */
		wp_enqueue_style('select2', THEME_DIR . '/assets/css/select2.css');

		wp_enqueue_style('css-prettyphoto', THEME_DIR . '/assets/css/prettyphoto.css');
		/* end by haroon */
		wp_enqueue_style('theme-style', THEME_DIR . '/assets/css/theme-styles.css');
		wp_enqueue_style('block', THEME_DIR . '/assets/css/block.css');
		
		wp_enqueue_style('listingpro', STYLESHEET_DIR . '/style.css');
		
	}
	

	/* ============== ListingPro Script Load ============ */

	add_action('wp_enqueue_scripts', 'listingpro_scripts');

	function listingpro_scripts() {
		
		
		global $listingpro_options;
		
		wp_enqueue_style('webfontloader', THEME_DIR . '/assets/js/webfontloader.min.js');
		wp_enqueue_script('Jquery', THEME_DIR . '/assets/js/jquery-3.2.0.min.js', 'jquery', '', true);
		wp_enqueue_script('Material', THEME_DIR . '/assets/js/material.min.js', 'material', '', true);
		wp_enqueue_script('Theme_plugins', THEME_DIR . '/assets/js/theme-plugins.js', 'themeplugins', '', true);
		wp_enqueue_script('Main', THEME_DIR . '/assets/js/main.js', 'main', '', true);
		wp_enqueue_script('Selectize', THEME_DIR . '/assets/js/selectize.min.js', 'selectize', '', true);
		wp_enqueue_script('Swiper', THEME_DIR . '/assets/js/swiper.jquery.min.js', 'swiper', '', true);
		wp_enqueue_script('Moment', THEME_DIR . '/assets/js/moment.min.js', 'moment', '', true);
		wp_enqueue_script('daterange', THEME_DIR . '/assets/js/daterangepicker.min.js', 'daterange', '', true);wp_enqueue_script('mediaelement', THEME_DIR . '/assets/js/mediaelement-and-player.min.js', 'mediaelement', '', true);wp_enqueue_script('playlist', THEME_DIR . '/assets/js/mediaelement-playlist-plugin.min.js', 'playlist', '', true);
		 
		
		
		wp_enqueue_script('Mapbox', THEME_DIR . '/assets/js/mapbox.js', 'jquery', '', true);
		wp_enqueue_script('Mapbox-leaflet', THEME_DIR . '/assets/js/leaflet.markercluster.js', 'jquery', '', true);

		wp_enqueue_script('Build', THEME_DIR . '/assets/js/build.min.js', 'jquery', '', true);
		
		wp_enqueue_script('Chosen',THEME_DIR. '/assets/lib/chosen/chosen.jquery.js', 'jquery', '', true);	
		
		wp_enqueue_script('bootstrap', THEME_DIR . '/assets/lib/bootstrap/js/bootstrap.min.js', 'jquery', '', true);	
		
		wp_enqueue_script('jquery-ui',THEME_DIR . '/assets/js/jquery-ui.js', 'jquery', '', true);
		wp_enqueue_script('Slick', THEME_DIR . '/assets/lib/slick/slick.min.js', 'jquery', '', true);
		
		wp_enqueue_script('Mmenu', THEME_DIR . '/assets/lib/jquerym.menu/js/jquery.mmenu.min.all.js', 'jquery', '', true);
		wp_enqueue_script('magnific-popup', THEME_DIR . '/assets/lib/Magnific-Popup-master/jquery.magnific-popup.min.js', 'jquery', '', true);
		
		/* by haroon */
		wp_enqueue_script('select2', THEME_DIR . '/assets/js/select2.full.min.js', 'jquery', '', true);
		/* end by haroon */
		
		wp_enqueue_script('video2', THEME_DIR . '/assets/lib/jquery-filer-master/js/jquery.filer.min.js', 'jquery', '', true);
		
		wp_enqueue_script('bootstrap-rating', THEME_DIR . '/assets/js/bootstrap-rating.js', 'jquery', '', true);
		wp_enqueue_script('popup-classie', THEME_DIR . '/assets/lib/popup/js/classie.js', 'jquery', '', true);
		wp_enqueue_script('modalEffects', THEME_DIR. '/assets/lib/popup/js/modalEffects.js', 'jquery', '', true);		
		
		if(class_exists('Redux')){
			$mapAPI = '';
			$mapAPI = $listingpro_options['google_map_api'];
			if(empty($mapAPI)){
				$mapAPI = 'AIzaSyDQIbsz2wFeL42Dp9KaL4o4cJKJu4r8Tvg';
			}
		 if( $listingpro_options['submit-listing'] == get_permalink() || $listingpro_options['edit-listing'] == get_permalink()){
			wp_enqueue_script('maps', 'https://maps.googleapis.com/maps/api/js?v=3&amp;key='.$mapAPI.'&amp;libraries=places', 'jquery', '', false);			
			wp_enqueue_script('Form-validate', THEME_DIR . '/assets/js/validate.min.js', 'jquery', '', false);
		 }else{
				wp_enqueue_script('maps', 'https://maps.googleapis.com/maps/api/js?v=3&amp;key='.$mapAPI.'', 'jquery', '', false);
			}
		}
		/* IF ie9 */
			wp_enqueue_script('html5shim', 'https://html5shim.googlecode.com/svn/trunk/html5.js', array(), '1.0.0', true);
			wp_script_add_data( 'html5shim', 'conditional', 'lt IE 9' );
			wp_enqueue_script('jquery-prettyPhoto', THEME_DIR. '/assets/js/jquery.prettyPhoto.js', 'jquery', '', true);
			wp_enqueue_script('nicescroll', THEME_DIR. '/assets/js/jquery.nicescroll.min.js', 'jquery', '', true);
			wp_enqueue_script('chosen-jquery', THEME_DIR . '/assets/js/chosen.jquery.min.js', 'jquery', '', true);
			wp_enqueue_script('Main', THEME_DIR. '/assets/js/main.js', 'jquery', '', true);
			wp_enqueue_script('pagination', THEME_DIR . '/assets/js/pagination.js', 'jquery', '', true);
			
			wp_enqueue_script('socialshare', THEME_DIR . '/assets/js/social-share.js', 'jquery', '', true);

		
		if(is_singular('listing')){
		wp_enqueue_script('singlemap', THEME_DIR. '/assets/js/singlepostmap.js', 'jquery', '', true);
		}
		
		
		
		
		if ( is_single() && comments_open() ) wp_enqueue_script( 'comment-reply' );
		 

	}
	
	
	/* ============== ListingPro Stripe JS ============ */
	add_filter( 'wp_enqueue_scripts', 'listingpro_stripeJsfile', 0 );
	if(!function_exists('listingpro_stripeJsfile')){
		function listingpro_stripeJsfile(){
			wp_enqueue_script('stripejs', THEME_DIR . '/assets/js/checkout.js', 'jquery', '', false);
		}
	}
	
	


	/* ============== ListingPro Options ============ */

	if ( !isset( $listingpro_options ) && file_exists( dirname( __FILE__ ) . '/include/options-config.php' ) ) {
		require_once( dirname( __FILE__ ) . '/include/options-config.php' );
	}
	
	
	
	/* ============== ListingPro Load media ============ */
	if ( ! function_exists( 'listingpro_load_media' ) ) {
		function listingpro_load_media() {
		  wp_enqueue_media();
		}
		
	}	
	add_action( 'admin_enqueue_scripts', 'listingpro_load_media' );
	
		if ( ! function_exists( 'listingpro_admin_css' ) ) {
			function listingpro_admin_css() {
			  wp_enqueue_style('adminpages-css', THEME_DIR . '/assets/css/admin-style.css');
			}
			
		}	
		add_action( 'admin_enqueue_scripts', 'listingpro_admin_css' );
	
	
	/* ============== ListingPro Author Contact meta ============ */
	if ( ! function_exists( 'listingpro_author_meta' ) ) {
		function listingpro_author_meta( $contactmethods ) {

			// Add telefone
			$contactmethods['phone'] = 'Phone';
			// add address
			$contactmethods['address'] = 'Address';
			// add Social
			$contactmethods['facebook'] = 'Facebook';
			$contactmethods['google'] = 'Google';
			$contactmethods['linkedin'] = 'Linkedin';
			$contactmethods['instagram'] = 'Instagram';
			$contactmethods['twitter'] = 'Twitter';
			$contactmethods['pinterest'] = 'Pinterest';
		 
			return $contactmethods;
			
		}
		add_filter('user_contactmethods','listingpro_author_meta',10,1);
	}	
	
	
	

	
	/* ============== ListingPro User avatar URL ============ */
	
	if ( ! function_exists( 'listingpro_get_avatar_url' ) ) {
		
		function listingpro_get_avatar_url($author_id, $size){
			$get_avatar = get_avatar( $author_id, $size );
			preg_match("/src='(.*?)'/i", $get_avatar, $matches);
			return ( $matches[1] );
		}
	
	}
	
	
	
	
	
	/* ============== ListingPro Author image ============ */
	
	if (!function_exists('listingpro_author_image')) {

		function listingpro_author_image() {
							 
			if(is_user_logged_in()){
				
				$current_user = wp_get_current_user();
	
				$author_avatar_url = get_user_meta($current_user->ID, "listingpro_author_img_url", true); 

				if(!empty($author_avatar_url)) {

					$avatar =  $author_avatar_url;

				} else { 			

					$avatar_url = listingpro_get_avatar_url ( $current_user->ID, $size = '94' );
					$avatar =  $avatar_url;

				}
			}

				 
			return $avatar;
			
		}

	}
	
	
	/* ============== ListingPro Single Author image ============ */
	
	if (!function_exists('listingpro_single_author_image')) {

		function listingpro_single_author_image() {
							 
			if(is_single()){
				
				$author_avatar_url = get_user_meta(get_the_author_meta('ID'), "listingpro_author_img_url", true); 

				if(!empty($author_avatar_url)) {

					$avatar =  $author_avatar_url;

				} else { 			

					$avatar_url = listingpro_get_avatar_url ( get_the_author_meta('ID'), $size = '94' );
					$avatar =  $avatar_url;

				}
			}

				 
			return $avatar;
			
		}

	}
	
	
	
	
	/* ============== ListingPro Subscriber can upload media ============ */
	
	if ( ! function_exists( 'listingpro_subscriber_capabilities' ) ) {
		
		if ( current_user_can('subscriber')) {
			add_action('init', 'listingpro_subscriber_capabilities');
		}
		
		function listingpro_subscriber_capabilities() {
			//if (!is_admin()) {
			$contributor = get_role('subscriber');
			$contributor->add_cap('upload_files');
			$contributor->add_cap('edit_posts');
			$contributor->add_cap('assign_location');
			$contributor->add_cap('assign_list-tags');
			$contributor->add_cap('assign_listing-category');
			$contributor->add_cap('assign_features');
			
			  show_admin_bar(false);
		
			//}
		}
		
	}
	if ( ! function_exists( 'listingpro_admin_capabilities' ) ) {
		
		add_action('init', 'listingpro_admin_capabilities');
		
		function listingpro_admin_capabilities() {
			$contributor = get_role('administrator');
			$contributor->add_cap('assign_location');
			$contributor->add_cap('assign_list-tags');
			$contributor->add_cap('assign_listing-category');
			$contributor->add_cap('assign_features');
		}
		
	}
	
	
	if( !function_exists('listingpro_vcSetAsTheme') ) {
		add_action('vc_before_init', 'listingpro_vcSetAsTheme');
		function listingpro_vcSetAsTheme()
		{
			vc_set_as_theme($disable_updater = false);
		}
	}  
	
	/* ============== ListingPro Block admin acccess ============ */
	if ( !function_exists( 'listingpro_block_admin_access' ) ) {

		add_action( 'init', 'listingpro_block_admin_access' );

		function listingpro_block_admin_access() {
			if( is_user_logged_in() ) {
				if (is_admin() && !current_user_can('administrator') && isset( $_GET['action'] ) != 'delete' && !(defined('DOING_AJAX') && DOING_AJAX)) {
					wp_die(esc_html("You don't have permission to access this page.", "listingpro"));
					exit;
				}
			}
		}

	}
	
	
	
	/* ============== ListingPro Media Uploader ============ */
	
	if ( ! function_exists( 'listingpro_add_media_upload_scripts' ) ) {

		function listingpro_add_media_upload_scripts() {
			if ( is_admin() ) {
				 return;
			   }
			wp_enqueue_media();
		}
		//add_action('wp_enqueue_scripts', 'listingpro_add_media_upload_scripts');
		
	}


	/* ============== ListingPro Search Form ============ */
	
	if ( ! function_exists( 'listingpro_search_form' ) ) {

		function listingpro_search_form() {

			$form = '<form role="search" method="get" id="searchform" action="' . esc_url(home_url('/')) . '" >
			<div class="input">
				<i class="icon-search"></i><input class="" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __('Type and hit enter', 'listingpro') . '">
			</div>
			</form>';

			return $form;
		}
	}

	add_filter('get_search_form', 'listingpro_search_form');
	
	
	/* ============== ListingPro Favicon ============ */
	
	if ( ! function_exists( 'listingpro_favicon' ) ) {

		function listingpro_favicon() {
			global $listingpro_options;
		   if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {

			   if($listingpro_options['theme_favicon'] != ''){
					
					echo '<link rel="shortcut icon" href="' . wp_kses_post($listingpro_options['theme_favicon']['url']) . '"/>';
				} else {
					echo '<link rel="shortcut icon" href="' . THEME_DIR . '/assets/img/favicon.ico"/>';
				}
			}
			
		}
	}

	
	/* ============== ListingPro Title ============ */

	if ( ! function_exists( 'listingpro_title' ) ) {
		
		function listingpro_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
		}
		add_action( 'wp_head', 'listingpro_title' );
		
	}
	
	/* ============== ListingPro Top bar menu ============ */
	
	if (!function_exists('listingpro_top_bar_menu')) {

		function listingpro_top_bar_menu() {
			$defaults = array(
				'theme_location'  => 'top_menu',
				'menu'            => '',
				'container'       => 'false',
				'menu_class'      => 'lp-topbar-menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			);
			if ( has_nav_menu( 'top_menu' ) ) {
				return wp_nav_menu( $defaults );
			}
		}

	}
	
	/* ============== ListingPro Primary menu ============ */
	
	if (!function_exists('listingpro_primary_menu')) {

		function listingpro_primary_menu() {
			$defaults = array(
				'theme_location'  => 'primary',
				'menu'            => '',
				'container'       => 'div',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,				
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			);
			if ( has_nav_menu( 'primary' ) ) {
				return wp_nav_menu( $defaults );
			}
		}

	}
	
	
	/* ============== ListingPro Inner pages menu ============ */
	
	if (!function_exists('listingpro_inner_menu')) {

		function listingpro_inner_menu() {
			$defaults = array(
				'theme_location'  => 'primary_inner',
				'menu'            => '',
				'container'       => 'div',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,				
				'items_wrap'      => '<ul id="%1$s" class="inner_menu %2$s">%3$s</ul>',
			);
			if ( has_nav_menu( 'primary_inner' ) ) {
				return wp_nav_menu( $defaults );
			}
		}

	}
	
	/* ============== ListingPro Footer menu ============ */
	
	if (!function_exists('listingpro_footer_menu')) {

		function listingpro_footer_menu() {
			$defaults = array(
				'theme_location'  => 'footer_menu',
				'menu'            => '',
				'container'       => 'false',
				'menu_class'      => 'footer-menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			);

			if ( has_nav_menu( 'footer_menu' ) ) {
				return wp_nav_menu( $defaults );
			}
		}

	}
	
	/* ============== ListingPro Default sidebar ============ */

	if (!function_exists('listingpro_sidebar')) {

		function listingpro_sidebar() {

			register_sidebar(array(
				'name' => 'Default sidebar',
				'id' => 'default-sidebar',
				'before_widget' => '<aside class="widget %2$s" id="%1$s">',
				'after_widget' => '</aside>',
				'before_title' => '<div class="imo-widget-title-container"><h2 class="widget-title">',
				'after_title' => '</h2></div>',
			));
			register_sidebar(array(
				'name' => 'Listing Detail sidebar',
				'id' => 'listing_detail_sidebar',
				'before_widget' => '<div class="widget-box viewed-listing %2$s" id="%1$s">',
				'after_widget' => '</div>',
				'before_title' => '<h2>',
				'after_title' => '</h2>',
			));
				
		}

	}
	add_action('widgets_init', 'listingpro_sidebar');
	
	/* ============== ListingPro Primary Logo ============ */
	
	if (!function_exists('listingpro_primary_logo')) {

		function listingpro_primary_logo() {
			
			global $listingpro_options;
			$lp_logo = $listingpro_options['primary_logo']['url'];
			if(!empty($lp_logo)){
				echo '<img src="'.$lp_logo.'" alt="" />';
			}
			
		}

	}
	
	
	/* ============== ListingPro Seconday Logo ============ */
	
	if (!function_exists('listingpro_secondary_logo')) {

		function listingpro_secondary_logo() {
			
			global $listingpro_options;
			$lp_logo2 = $listingpro_options['seconday_logo']['url'];
			if(!empty($lp_logo2)){
				echo '<img src="'.$lp_logo2.'" alt="" />';
			}
			
		}

	}
	
	

	/* ============== ListingPro URL Settings ============ */
	
	if (!function_exists('listingpro_url')) {

		function listingpro_url($link) {
			global $listingpro_options;
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			if ( is_plugin_active( 'listingpro-plugin/plugin.php' ) ) {
				if($link == 'add_listing_url_mode'){
					//$url = $listingpro_options[$link];
					$paidmode = $listingpro_options['enable_paid_submission'];
					if( $paidmode=="per_listing" || $paidmode=="membership" ){
						$url = $listingpro_options['pricing-plan'];
					}else{
						$url = $listingpro_options['submit-listing'];
					}
				}else{
					$url = $listingpro_options[$link];
				}
				
				return $url;
			}else{
				return false;
			}
		}

	}
	
	
	
	/* ============== ListingPro translation ============ */
	
	if (!function_exists('listingpro_translation')) {

		function listingpro_translation($word) {
			
			
				return $word;
					
		}
	}


	/* ============== ListingPro Infinite load ============ */
	
	if (!function_exists('listingpro_load_more')) {

		function listingpro_load_more($wp_query) {		
			$output=null;
			$pages = intval($wp_query->max_num_pages);
			$paged = (get_query_var('paged')) ? intval(get_query_var('paged')) : 1;
			if (empty($pages)) {
				$pages = 1;
			}
			if (1 != $pages) {
				$output = '<p class="solitaire-infinite-scroll" data-has-next="' . ($paged === $pages ? 'false' : 'true') . '">';
				$output .= '<a class="no-more" href="#">' . __('No more posts', 'listingpro') . '</a>';
				$output .= '<a class="loading" href="#"></a>';
				$output .= '<a class="next" href="' . get_pagenum_link($paged + 1) . '">' . __('Load More ', 'listingpro') . '</a>';
				$output .= '</p>';
			}
			return $output;
		}
		
	}
	
	
	/* ============== ListingPro Icon8 base64 Icons ============ */
	
	if (!function_exists('listingpro_icons')) {

		function listingpro_icons($icons) {
			$colors = new listingproIcons();
			$icon = '';
			if($icons != ''){
				$iconsrc = $colors->listingpro_icon($icons);	
				$icon = '<img class="icon icons8-'.$icons.'" src="'.$iconsrc.'" alt="'.$icons.'">';
				return $icon;
			}else{
				return $icon;
			}
		}
	}
	

	
	/* ============== ListingPro Search Filter ============ */
	
	if (!function_exists('listingpro_searchFilter')) {
		
		
		function listingpro_searchFilter() {
			global $wp_post_types;
			$wp_post_types['page']->exclude_from_search = true;
		}
		add_action('init', 'listingpro_searchFilter');
		
	}
	

	/* ============== ListingPro Price Dynesty ============ */
	
	if (!function_exists('listingpro_price_dynesty_text')) {
		function listingpro_price_dynesty_text($postid) {
			$output = null;
			if(!empty($postid)){
				$priceRange = listing_get_metabox_by_ID('price_status', $postid);
				//$listingptext = listing_get_metabox('list_price_text');
				$listingprice = listing_get_metabox_by_ID('list_price', $postid);
				if(!empty($priceRange ) && !empty($listingprice )){
					$output .='
					<span class="element-price-range list-style-none">'; 
						$dollars = '';
						$tip = '';
						if( $priceRange == 'notsay' ){
							$dollars = '';
							$tip = '';

						}elseif( $priceRange == 'inexpensive' ){
							$dollars = '1';
							$tip = esc_html__('Inexpensive', 'listingpro');

						}elseif( $priceRange == 'moderate' ){
							$dollars = '2';
							$tip = esc_html__('Moderate', 'listingpro');

						}elseif( $priceRange == 'pricey' ){
							$dollars = '3';
							$tip = esc_html__('Pricey', 'listingpro');

						}elseif( $priceRange == 'ultra_high_end' ){
							$dollars = '4';
							$tip = esc_html__('Ultra High End', 'listingpro');
						}

						if( $priceRange != 'notsay' ){
							$output .= '<span class="grayscale simptip-position-top simptip-movable" data-tooltip="'.$tip.'" title="'.$tip.'">';
							for ($i=0; $i < $dollars ; $i++) { 
								$output .= '$';
							}
							$output .= '</span>';
							
						}
						$output .= '
					</span>';
				}
			}
			return $output;
		}		
	}
	
	/* ============== ListingPro Price Dynesty ============ */
	
	if (!function_exists('listingpro_price_dynesty')) {
		function listingpro_price_dynesty($postid) {
			if(!empty($postid)){
				$priceRange = listing_get_metabox_by_ID('price_status', $postid);
				$listingpTo = listing_get_metabox('list_price_to');
				$listingprice = listing_get_metabox_by_ID('list_price', $postid);
				if(!empty($priceRange ) && !empty($listingprice )){
					?>
					<div class="post-row price-range">
						<ul class="list-style-none post-price-row line-height-16">
							<li class="grayscale-dollar">
								<?php 
									$dollars = '';
									$tip = '';
									if( $priceRange == 'notsay' ){
										$dollars = '';
										$tip = '';

									}elseif( $priceRange == 'inexpensive' ){
										$dollars = '1';
										$tip = esc_html__('Inexpensive', 'listingpro');

									}elseif( $priceRange == 'moderate' ){
										$dollars = '2';
										$tip = esc_html__('Moderate', 'listingpro');

									}elseif( $priceRange == 'pricey' ){
										$dollars = '3';
										$tip = esc_html__('Pricey', 'listingpro');

									}elseif( $priceRange == 'ultra_high_end' ){
										$dollars = '4';
										$tip = esc_html__('Ultra High End', 'listingpro');
									}
									
									echo '<span class="simptip-position-top simptip-movable" data-tooltip="'.$tip.'" title="'.$tip.'">';
										echo '<span class="active">';
										for ($i=0; $i < $dollars ; $i++) { 
											echo '$';
										}
										echo '</span>';

										echo '<span class="grayscale">';
										$greyDollar = 4 - $dollars;
										for($i=1;$i<=$greyDollar;$i++){
											echo '$';
										}
										echo '</span>';
									echo '</span>';
								?>
							</li>
							<li>
								<span class="post-rice">
									<span class="text">
										<?php echo esc_html__('Price Range', 'listingpro'); ?>
									</span>
									<?php
									
										if(!empty($listingprice)){
											echo esc_html($listingprice);
											if(!empty($listingpTo)){
												echo ' - ';
												echo esc_html($listingpTo);
											}
										}
										
									?>
								</span>
							</li>
						</ul>
					</div>
					<?php
				}
			}
		}		
	}
	
	/* ============== ListingPro email and mailer filter ============ */
	add_filter('wp_mail_from', 'listingpro_mail_from');
	add_filter('wp_mail_from_name', 'listingpro_mail_from_name');
	if( !function_exists('listingpro_mail_from') ){ 
		function listingpro_mail_from($old) {
			
			$mailFrom = null;
			if( class_exists( 'Redux' ) ) {
				global $listingpro_options;
				$mailFrom = $listingpro_options['listingpro_general_email_address'];
			}
			else{
				$mailFrom = get_option( 'admin_email' );
			}
			return $mailFrom;
		}
	}
	if( !function_exists('listingpro_mail_from_name') ){
		function listingpro_mail_from_name($old) {
			
			$mailFromName = null;
			if( class_exists( 'Redux' ) ) {
				global $listingpro_options;
				$mailFromName = $listingpro_options['listingpro_general_email_from'];
			}
			else{
				$mailFromName = get_option( 'blogname' );
			}
			return $mailFromName;
		}
	}
	
	/* ============== email html support ============ */
	if( !function_exists('listingpro_set_content_type') ){
		add_filter( 'wp_mail_content_type', 'listingpro_set_content_type' );
		function listingpro_set_content_type( $content_type ) {
			return 'text/html';
		}
	}
	if( !function_exists('get_textarea_as_editor') ){
		function get_textarea_as_editor($editor_id){
			$content = '';
			$settings = array(

				'wpautop' => true,

				'postContent' => 'content',

				'media_buttons' => false,

				'tinymce' => array(

					'theme_advanced_buttons1' => 'bold,italic,underline,blockquote,separator,strikethrough,bullist,numlist,justifyleft,justifycenter,justifyright,undo,redo,link,unlink,fullscreen',

					'theme_advanced_buttons2' => 'pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo',

					'theme_advanced_buttons3' => '',

					'theme_advanced_buttons4' => ''

				),

				'quicktags' => array(

					'buttons' => 'b,i,ul,ol,li,link,close'

				)

			);

			ob_start();
			wp_editor( $content, $editor_id, $settings );
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
			
		}
	}
	
	/* ============== Listingpro term Exist ============ */	
	
		if(!function_exists('listingpro_term_exist')){
			function listingpro_term_exist($name,$taxonomy){
				$term = term_exists($name, $taxonomy);
				if (!empty($term)) {
				 return $term;
				}else{
					return 0;
				}
			}
		}
	
	
	
	/* ============== Listingpro compaigns ============ */	
	if(!function_exists('listingpro_get_campaigns_listing')){
		function listingpro_get_campaigns_listing( $campaign_type, $IDSonly, $taxQuery=array(), $searchQuery=array(),$priceQuery=array(),$s ){
			$adsType = array(
			'lp_random_ads',
			'lp_detail_page_ads',
			'lp_top_in_search_page_ads'
			);
			
			global $listingpro_options;	
			$listing_style = '';
			$listing_style = $listingpro_options['listing_style'];
			$postNumber = '';
			if($listing_style == '3' && !is_front_page()){
				$postNumber = 2;
			}else{
				$postNumber = 3;
			}
			
			if( !empty($campaign_type) ){
				if( in_array($campaign_type, $adsType, true) ){
					
					$TxQuery = array();
					if( !empty( $taxQuery ) && is_array($taxQuery)){
						$TxQuery = $taxQuery;
					}elseif(!empty($searchQuery) && is_array($searchQuery)){
						$TxQuery = $searchQuery;
					}
					$args = array(
						'orderby' => 'rand',
						'post_type' => 'listing',
						'post_status' => 'publish',
						'posts_per_page' => $postNumber,
						'tax_query' => $TxQuery,
						'meta_query' => array(
							'relation'=>'AND',
							array(
								'key'     => 'campaign_status',
								'value'   => array( 'active' ),
								'compare' => 'IN',
							),
							array(
								'key'     => $campaign_type,
								'value'   => array( 'active' ),
								'compare' => 'IN',
							),
							$priceQuery,
						),
					);
					if(!empty($s)){
						$args = array(
							'orderby' => 'rand',
							'post_type' => 'listing',
							'post_status' => 'publish',
							's' => $s,
							'posts_per_page' => $postNumber,
							'tax_query' => $TxQuery,
							'meta_query' => array(
								'relation'=>'AND',
								array(
									'key'     => 'campaign_status',
									'value'   => array( 'active' ),
									'compare' => 'IN',
								),
								array(
									'key'     => $campaign_type,
									'value'   => array( 'active' ),
									'compare' => 'IN',
								),
								$priceQuery,
							),
						);
					}
					$idsArray = array();
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							if( $IDSonly==TRUE ){
								$idsArray[] =  get_the_ID();
								
							}
							else{
								if(is_singular('listing')){
									get_template_part( 'templates/details-page-ads' );
								}
								else{
									get_template_part( 'listing-loop' );
								}
								
							}
							
							wp_reset_postdata();
						}
						if( $IDSonly==TRUE ){
							if(!empty($idsArray)){
								return $idsArray;
							}
						}
				
					}
			
			
			
				}
			}
			
			
		}
	}
	/* ============== Listingpro Sharing ============ */	
	if(!function_exists('listingpro_sharing')){
		function listingpro_sharing() {
			?>
			<a class="reviews-quantity">
				<span class="reviews-stars">
					<i class="fa fa-share-alt"></i>
				</span>
				<?php echo esc_html__('Share', 'listingpro');?>
			</a>
			<div class="md-overlay hide"></div>
			<ul class="social-icons post-socials smenu">
				<li>
					<a href="<?php echo listingpro_social_sharing_buttons('facebook'); ?>" target="_blank"><!-- Facebook icon by Icons8 -->
						<i class="fa fa-facebook"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo listingpro_social_sharing_buttons('gplus'); ?>" target="_blank"><!-- Google Plus icon by Icons8 -->
						<i class="fa fa-google-plus"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo listingpro_social_sharing_buttons('twitter'); ?>" target="_blank"><!-- twitter icon by Icons8 -->
						<i class="fa fa-twitter"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo listingpro_social_sharing_buttons('linkedin'); ?>" target="_blank"><!-- linkedin icon by Icons8 -->
						<i class="fa fa-linkedin"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo listingpro_social_sharing_buttons('pinterest'); ?>" target="_blank"><!-- pinterest icon by Icons8 -->
						<i class="fa fa-pinterest"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo listingpro_social_sharing_buttons('reddit'); ?>" target="_blank"><!-- reddit icon by Icons8 -->
						<i class="fa fa-reddit"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo listingpro_social_sharing_buttons('stumbleupon'); ?>" target="_blank"><!-- stumbleupon icon by Icons8 -->
						<i class="fa fa-stumbleupon"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo listingpro_social_sharing_buttons('del'); ?>" target="_blank"><!-- delicious icon by Icons8 -->
						<i class="fa fa-delicious"></i>
					</a>
				</li>
			</ul>
			<?php
		}
	}
	
	
	/* Post Views */

if(!function_exists('getPostViews')){
	function getPostViews($postID){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return esc_html__('0 View', 'listingpro');
	    }
	    return $count.esc_html__(' Views', 'listingpro');
	}
}
 
// function to count views.
if(!function_exists('setPostViews')){
	function setPostViews($postID) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}
}

// function to get all post meta value by keys
if(!function_exists('getMetaValuesByKey')){
	function getMetaValuesByKey($key){
		global $wpdb;
		$metaVal = $wpdb->get_col("SELECT meta_value
		FROM $wpdb->postmeta WHERE meta_key = '$key'" );
		return $metaVal;
	}
}

// function to get total views
if(!function_exists('getTotalPostsViews')){
	function getTotalPostsViews(){
		$totalCount = 0;
		$totalArray = getMetaValuesByKey('post_views_count');
		if(!empty($totalArray)){
			foreach( $totalArray as $count ){
				$totalCount = $totalCount + $count;
			}
		}
		return $totalCount;
	}
}

// function to get author listing total views
if(!function_exists('getAuthorPostsViews')){
	function getAuthorPostsViews(){
		$count = 0;
		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;
		
		$args = array(
			'post_type' => 'listing',
			'author' => $user_id,
			'post_status' => 'publish',
			'posts_per_page' => -1
		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$n = get_post_meta(get_the_ID(), 'post_views_count', true);
				$count = $count + (int)$n;
			}
			wp_reset_postdata();
		}
		return $count;
	}
}

// function to get author listing total reviews
if(!function_exists('getAuthorTotalViews')){
	function getAuthorTotalViews(){
		$count = 0;
		$review_ids = '';
		$result = array();
		$review_new = array();
		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;
		$review_ids = array();
		
		$args = array(
			'post_type' => 'listing',
			'author' => $user_id,
			'post_status' => 'publish',
			'posts_per_page' => -1
		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$key = 'reviews_ids';
				$review_idss = listing_get_metabox_by_ID($key ,get_the_ID());
				
				if( !empty($review_idss) ){
					if (strpos($review_idss, ",") !== false) {
						$review_ids = explode( ',', $review_idss );		
						$result = array_merge($result, $review_ids);
					}
					else{
						$result[] = $review_idss;
					}
					
				}
			}
			wp_reset_postdata();
			$count = $count + count($result);
		}
		return $count;
	}
}

//function to get all reviews in array on author's posts
if(!function_exists('getAllReviewsArray')){
	function getAllReviewsArray(){
		$review_ids = '';
		$result = array();
		$review_new = array();
		$review_idss = '';
		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;
		
		$postid = array();
		
		$args = array(
			'post_type' => 'listing',
			'author' => $user_id,
			'post_status' => 'publish',
			'posts_per_page' => -1
		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$key = 'reviews_ids';
				
				$review_idss = listing_get_metabox_by_ID($key ,get_the_ID());
				
				if( !empty($review_idss) ){
					if (strpos($review_idss, ",") !== false) {
						$review_ids = explode( ',', $review_idss );		
						$result = array_merge($result, $review_ids);
					}
					else{
						$result[] = $review_idss;
					}
					
				}
				
			}
			//wp_reset_postdata();
		}
		return $result;
	}
}


/*========================================get ads invoices list============================================*/
//function to retreive invoices
if(!function_exists('get_ads_invoices_list')){
	function get_ads_invoices_list($userid, $method, $status){
		global $wpdb;
		$prefix = '';
		$prefix = $wpdb->prefix;
		$table_name = $prefix.'listing_campaigns';
		
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
			
			if( empty($userid)  && !empty($method) && !empty($status) && is_admin() ){
				//return on admin side only
				$results = $wpdb->get_results( 
								$wpdb->prepare("SELECT * FROM {$prefix}listing_campaigns WHERE payment_method=%s AND status=%s", $method, $status) 
							 );
				return $results;
			}
			else if( !empty($userid) && isset($userid) && !empty($status)){
				//return for all users by id
				
				$results = $wpdb->get_results( 
								$wpdb->prepare("SELECT * FROM {$prefix}listing_campaigns WHERE user_id=%d AND status=%s", $userid, $status) 
							 );
				return $results;
				
			}
			
		}
	}
}

/*====================================================================================*/
// Delete post action
if(!function_exists('lp_delete_any_post')){
add_action( 'before_delete_post', 'lp_delete_any_post' );
	function lp_delete_any_post( $postid ){
		global $post_type;
		
		if($post_type == 'listing'){
			$listing_id = $postid;
			$campaignID = listing_get_metabox_by_ID('campaign_id', $listing_id);
			$get_reviews = listing_get_metabox_by_ID('reviews_ids', $listing_id);
			
			wp_delete_post($campaignID);
			if(!empty($get_reviews)){
				$reviewsArray = array();
				if (strpos($get_reviews, ',') !== false) {
					$reviewsArray = explode(",",$get_reviews);
				}
				else{
					$reviewsArray[] = $get_reviews;
				}
				$args = array(
					'posts_per_page'      => -1,
					'post__in'            => $reviewsArray,
					'post_type' => 'lp-reviews',
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						wp_delete_post(get_the_ID());
					}
				}
			}
			
			
		}
		else if($post_type == 'lp-reviews'){
			
			$review_id = $postid;
			$action = 'delete';
			$listing_id = listing_get_metabox_by_ID('listing_id', $postid);
			
			listingpro_set_listing_ratings($review_id, $listing_id, '', $action);

		}
		else if($post_type == 'lp-ads'){
			$listing_id = listing_get_metabox_by_ID('ads_listing', $postid);
			$ad_type = listing_get_metabox_by_ID('ad_type', $postid);
			if(!empty($ad_type)&& count($ad_type)>0){
				foreach($ad_type as $type){
					delete_post_meta( $listing_id, $type );
				}
			}
			
			listing_delete_metabox('campaign_id', $listing_id);
			delete_post_meta( $listing_id, 'campaign_status' );
			
		}
		
		
	}
}

//=======================================================
//						Pagination
//=======================================================
if(!function_exists('listingpro_pagination')){

	function listingpro_pagination() {
		global $wp_query;

		$pages = $wp_query->max_num_pages;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		if (empty($pages)) {
			$pages = 1;
		}

		if (1 != $pages) {

			$big = 9999; // need an unlikely integer
			echo "
			<div class='lp-pagination pagination'>";
				$pagination = paginate_links(
				array(
					'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
					'end_size' => 3,
					'mid_size' => 6,
					'format' => '?paged=%#%',
					'current' => max(1, get_query_var('paged')),
					'total' => $wp_query->max_num_pages,
					'type' => 'list',
					'prev_text' => __('&laquo;', 'listingpro'),
					'next_text' => __('&raquo;', 'listingpro'),
				));
				print $pagination;
			echo "</div>";
		}
	}
}

//=======================================================
//						Login Screen
//=======================================================
	if(!function_exists('listingpro_login_screen')){
		function listingpro_login_screen() {
			wp_enqueue_style( 'listable-custom-login', get_template_directory_uri() . '/assets/css/login-page.css' );
			wp_enqueue_style('Font-awesome', THEME_DIR . '/assets/lib/font-awesome/css/font-awesome.min.css');
		}

		add_action( 'login_enqueue_scripts', 'listingpro_login_screen' );
	}
/*====================================================================================*/

/*====================================================================================*/
/* calculate average rate for listing */
	if(!function_exists('lp_cal_listing_rate')){
		function lp_cal_listing_rate($listing_id,$post_type = 'listing', $is_reviewcall = false){
			if($post_type == 'lp_review'){
				$rating = listing_get_metabox_by_ID('rating' ,$listing_id);
			}else{
				$rating = get_post_meta( $listing_id, 'listing_rate', true );
			}
			$ratingRes = '';
			if(!empty($rating) && $rating > 0){
				
				if($rating < 1){
					$ratingRes = '<span class="rate lp-rate-worst">'.$rating.'<sup>/ 5</sup></span>';
				}
				
				else if($rating >=1 && $rating < 2){
					$ratingRes = '<span class="rate lp-rate-bad">'.$rating.'<sup>/ 5</sup></span>';
				}
				
				else if($rating >=2 && $rating < 3.5){
					$ratingRes = '<span class="rate lp-rate-satisfactory">'.$rating.'<sup>/ 5</sup></span>';
				}
				
				else if($rating >=3.5 && $rating <= 5){
					$ratingRes = '<span class="rate lp-rate-good">'.$rating.'<sup>/ 5</sup></span>';
				}
				
			}
			else{
				if (class_exists('ListingReviews')) {
					if ( is_singular('listing') ){
						
						if($is_reviewcall==true){
							$ratingRes = '';
						}
						else{
							$ratingRes = '<span class="no-review">'.esc_html__("Be the first one to rate!", "listingpro").'</span>';
						}
					}else{
						$ratingRes = '<span class="no-review">'.esc_html__("0 Review", "listingpro").'</span>';
					}
				}
				
			}
			
			return $ratingRes;
			
		}
	}
	
	
	/* =============================================== cron-job for listing==================================== */
	if(!function_exists('lp_expire_this_listing')){
		function lp_expire_this_listing(){
			global $wpdb;
			$args=array(
				'post_type' => 'listing',
				'post_status' => 'publish',
				'posts_per_page' => -1,
			);
			$wp_query = null;
			$wp_query = new WP_Query($args);
			if( $wp_query->have_posts() ) {
				while ($wp_query->have_posts()) : $wp_query->the_post();
					$listing_id = get_the_ID();
					$plan_id = listing_get_metabox_by_ID('Plan_id', $listing_id);
					if(!empty($plan_id)){
						$plan_duration = get_post_meta($plan_id, 'plan_time', true);
						if(!empty($plan_duration)){
							$sql =
								"UPDATE {$wpdb->posts}
								SET post_status = 'expired'
								WHERE (ID = '$listing_id' AND post_type = 'listing' AND post_status = 'publish')
								AND DATEDIFF(NOW(), post_date) > %d";
							$res = $wpdb->query($wpdb->prepare( $sql, $plan_duration ));
							if($res!=false){
								$campaign_status = get_post_meta($listing_id, 'campaign_status', true);
								if(!empty($campaign_status)){
									delete_post_meta( $listing_id, 'campaign_status');
								}
								$adID = listing_get_metabox_by_ID('campaign_id', $listing_id);
								if(!empty($adID)){
									wp_delete_post( $adID, true );
								}
								
								$post_author_id = get_post_field( 'post_author', $listing_id );
								$user = get_user_by( 'id', $post_author_id );
								$useremail = $user->user_email;
								$website_url = site_url();
								$website_name = get_option('blogname');
								$listing_title = get_the_title($listing_id);
								$listing_url = get_the_permalink($listing_id);
								/* email to user */
								$headers[] = 'Content-Type: text/html; charset=UTF-8';
						
								$u_mail_subject_a = '';
								$u_mail_body_a = '';
								$u_mail_subject = $listingpro_options['listingpro_subject_listing_expired'];
								$u_mail_body = $listingpro_options['listingpro_listing_expired'];
								
								$u_mail_subject = str_replace('%website_url','%1$s', $u_mail_subject);
								$u_mail_subject = str_replace('%listing_title','%2$s', $u_mail_subject);
								$u_mail_subject = str_replace('%listing_url','%3$s', $u_mail_subject);
								$u_mail_subject = str_replace('%website_name','%4$s', $u_mail_subject);
								$u_mail_subject_a = sprintf( $u_mail_subject,$website_url,$listing_title,$listing_url, $website_name  );
								
								$u_mail_body = str_replace('%website_url','%1$s', $u_mail_body);
								$u_mail_body = str_replace('%listing_title','%2$s', $u_mail_body);
								$u_mail_body = str_replace('%listing_url','%3$s', $u_mail_body);
								$u_mail_body = str_replace('%website_name','%4$s', $u_mail_body);
								$u_mail_body_a = sprintf( $u_mail_body,$website_url,$listing_title,$listing_url,$website_name  );
								wp_mail( $useremail, $u_mail_subject_a, $u_mail_body_a, $headers);
								
							}
						}
					}
				endwhile;
			}
		}
	}
	add_action('lp_cron_listing_event', 'lp_expire_this_listing', 10, 3);
	
	wp_schedule_event(time(),'twicedaily', 'lp_cron_listing_event');
		
	/* =============================================== cron-job for ads ==================================== */
	if(!function_exists('lp_expire_this_ad')){
		function lp_expire_this_ad(){
			global $wpdb, $listingpro_options;
			$ads_durations = $listingpro_options['listings_ads_durations'];
			$args=array(
				'post_type' => 'lp-ads',
				'post_status' => 'publish',
				'posts_per_page' => -1,
			);
			$wp_query = null;
			$wp_query = new WP_Query($args);
			if( $wp_query->have_posts() ) {
				while ($wp_query->have_posts()) : $wp_query->the_post();
					$adID = get_the_ID();
					$ad_expiryDate = listing_get_metabox_by_ID('ad_expiryDate', $adID);
					$ads_listing = listing_get_metabox_by_ID('ads_listing', $adID);
					$currentdate = date("d-m-Y");
					if(strtotime($currentdate) > strtotime($ad_expiryDate)){
						$campaign_status = get_post_meta($ads_listing, 'campaign_status', true);
						if(!empty($campaign_status)){
							delete_post_meta( $ads_listing, 'campaign_status');
						}
						wp_delete_post( $adID, true );
						
						$listing_id = $ads_listing;
						$post_author_id = get_post_field( 'post_author', $listing_id );
						$user = get_user_by( 'id', $post_author_id );
						$useremail = $user->user_email;
						$website_url = site_url();
						$website_name = get_option('blogname');
						$listing_title = get_the_title($listing_id);
						$listing_url = get_the_permalink($listing_id);
						/* email to user */
						$headers[] = 'Content-Type: text/html; charset=UTF-8';
				
						$u_mail_subject_a = '';
						$u_mail_body_a = '';
						$u_mail_subject = $listingpro_options['listingpro_subject_ads_expired'];
						$u_mail_body = $listingpro_options['listingpro_ad_campaign_expired'];
						
						$u_mail_subject = str_replace('%website_url','%1$s', $u_mail_subject);
						$u_mail_subject = str_replace('%listing_title','%2$s', $u_mail_subject);
						$u_mail_subject = str_replace('%listing_url','%3$s', $u_mail_subject);
						$u_mail_subject = str_replace('%website_name','%4$s', $u_mail_subject);
						$u_mail_subject_a = sprintf( $u_mail_subject,$website_url,$listing_title,$listing_url, $website_name  );
						
						$u_mail_body = str_replace('%website_url','%1$s', $u_mail_body);
						$u_mail_body = str_replace('%listing_title','%2$s', $u_mail_body);
						$u_mail_body = str_replace('%listing_url','%3$s', $u_mail_body);
						$u_mail_body = str_replace('%website_name','%4$s', $u_mail_body);
						$u_mail_body_a = sprintf( $u_mail_body,$website_url,$listing_title,$listing_url,$website_name  );
						wp_mail( $useremail, $u_mail_subject_a, $u_mail_body_a, $headers);
						
					}
					
				endwhile;
			}
		}
	}
	add_action('lp_cron_ads_event', 'lp_expire_this_ad', 10, 3);
	
	wp_schedule_event(time(),'twicedaily', 'lp_cron_ads_event');
	
	
	
	
	function getClosestTimezone($lat, $lng)
	  {
		$diffs = array();
		foreach(DateTimeZone::listIdentifiers() as $timezoneID) {
		  $timezone = new DateTimeZone($timezoneID);
		  $location = $timezone->getLocation();
		  $tLat = $location['latitude'];
		  $tLng = $location['longitude'];
		  $diffLat = abs($lat - $tLat);
		  $diffLng = abs($lng - $tLng);
		  $diff = $diffLat + $diffLng;
		  $diffs[$timezoneID] = $diff;
		}
		
		$timezone = array_keys($diffs, min($diffs));
		$timestamp = time();
		date_default_timezone_set($timezone[0]);
		$zones_GMT = date('P', $timestamp);
		return $zones_GMT;

	  }