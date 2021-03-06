<?php
/**
 * BuddyPress - Users Profile
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>





<div class="item-list-tabs no-ajax" id="subnav" aria-label="<?php esc_attr_e( 'Member secondary navigation', 'buddypress' ); ?>" role="navigation">
	<ul>
		<?php //bp_get_options_nav(); ?>
	</ul>
</div><!-- .item-list-tabs -->

<?php

/**
 * Fires before the display of member profile content.
 *
 * @since 1.1.0
 */
do_action( 'bp_before_profile_content' ); ?>


<div class="profile">

<?php switch ( bp_current_action() ) :

	// Edit
	case 'edit' :
		bp_get_template_part( 'members/single/profile/edit' );
		break;

	// Change Avatar
	case 'change-avatar' :
		bp_get_template_part( 'members/single/profile/change-avatar' );
		break;

	// Change Cover Image
	case 'change-cover-image' :
		bp_get_template_part( 'members/single/profile/change-cover-image' );
		break;

	// Compose
	case 'public' :

		// Display XProfile
		// if ( bp_is_active( 'xprofile' ) )
			// bp_get_template_part( 'members/single/profile/profile-loop' );

		// // Display WordPress profile (fallback)
		// else
			// bp_get_template_part( 'members/single/profile/profile-wp' );

		// break;

	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch; ?>
</div><!-- .profile -->


<!--static HTML of News feed starts-->
	<div class="container">
			<div class="row">

		<!-- Main Content -->

		<div class="col-xl-6 push-xl-3 col-lg-12 push-lg-0 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="news-feed-form">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">

								<svg class="olymp-status-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-status-icon"></use></svg>

								<span>Status</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link inline-items" data-toggle="tab" href="#profile-1" role="tab" aria-expanded="false">

								<svg class="olymp-multimedia-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-multimedia-icon"></use></svg>

								<span>Multimedia</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link inline-items" data-toggle="tab" href="#blog" role="tab" aria-expanded="false">
								<svg class="olymp-blog-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-blog-icon"></use></svg>

								<span>Blog Post</span>
							</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
							<form>
								<div class="author-thumb">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/author-page.jpg" alt="author">
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Share what you are thinking here...</label>
									<textarea class="form-control" placeholder=""></textarea>
								</div>
								<div class="add-options-message">
									<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD PHOTOS">
										<svg class="olymp-camera-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-camera-icon"></use></svg>
									</a>
									<a href="#" class="options-message" data-toggle="tooltip" data-placement="top" title="" data-original-title="TAG YOUR FRIENDS">
										<svg class="olymp-computer-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-computer-icon"></use></svg>
									</a>

									<a href="#" class="options-message" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD LOCATION">
										<svg class="olymp-small-pin-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-small-pin-icon"></use></svg>
									</a>

									<button class="btn btn-primary btn-md-2">Post Status</button>
									<button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>

								</div>

							</form>
						</div>

						<div class="tab-pane" id="profile-1" role="tabpanel" aria-expanded="true">
							<form>
								<div class="author-thumb">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/author-page.jpg" alt="author">
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Share what you are thinking here...</label>
									<textarea class="form-control" placeholder=""  ></textarea>
								</div>
								<div class="add-options-message">
									<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD PHOTOS">
										<svg class="olymp-camera-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-camera-icon"></use></svg>
									</a>
									<a href="#" class="options-message" data-toggle="tooltip" data-placement="top" title="" data-original-title="TAG YOUR FRIENDS">
										<svg class="olymp-computer-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-computer-icon"></use></svg>
									</a>

									<a href="#" class="options-message" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD LOCATION">
										<svg class="olymp-small-pin-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-small-pin-icon"></use></svg>
									</a>

									<button class="btn btn-primary btn-md-2">Post Status</button>
									<button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>

								</div>

							</form>
						</div>

						<div class="tab-pane" id="blog" role="tabpanel" aria-expanded="true">
							<form>
								<div class="author-thumb">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/author-page.jpg" alt="author">
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Share what you are thinking here...</label>
									<textarea class="form-control" placeholder=""  ></textarea>
								</div>
								<div class="add-options-message">
									<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD PHOTOS">
										<svg class="olymp-camera-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-camera-icon"></use></svg>
									</a>
									<a href="#" class="options-message" data-toggle="tooltip" data-placement="top" title="" data-original-title="TAG YOUR FRIENDS">
										<svg class="olymp-computer-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-computer-icon"></use></svg>
									</a>

									<a href="#" class="options-message" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD LOCATION">
										<svg class="olymp-small-pin-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-small-pin-icon"></use></svg>
									</a>

									<button class="btn btn-primary btn-md-2">Post Status</button>
									<button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>

								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
			
		
			<div id="newsfeed-items-grid">

				<div class="ui-block">
					<article class="hentry post">

						<div class="post__author author vcard inline-items">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/author-page.jpg" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>
								<div class="post__date">
									<time class="published" datetime="2017-03-24T18:18">
										19 hours ago
									</time>
								</div>
							</div>

							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Edit Post</a>
									</li>
									<li>
										<a href="#">Delete Post</a>
									</li>
									<li>
										<a href="#">Turn Off Notifications</a>
									</li>
									<li>
										<a href="#">Select as Featured</a>
									</li>
								</ul>
							</div>

						</div>

						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
							pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
							mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
							accusantium doloremque.
						</p>

						<div class="post-additional-info inline-items">

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
								<span>8</span>
							</a>

							<ul class="friends-harmonic">
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic7.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic8.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic9.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic10.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic11.jpg" alt="friend">
									</a>
								</li>
							</ul>

							<div class="names-people-likes">
								<a href="#">Jenny</a>, <a href="#">Robert</a> and
								<br>6 more liked this
							</div>


							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-speech-balloon-icon"></use></svg>
									<span>17</span>
								</a>

								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
									<span>24</span>
								</a>
							</div>


						</div>

						<!--<div class="control-block-button post-control-button">

							<a href="#" class="btn btn-control featured-post">
								<svg class="olymp-trophy-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-trophy-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-like-post-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-like-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-comments-post-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-share-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
							</a>

						</div>-->

					</article>
				</div>

				<div class="ui-block">
					<article class="hentry post video">

						<div class="post__author author vcard inline-items">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/author-page.jpg" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a> shared a <a href="#">link</a>
								<div class="post__date">
									<time class="published" datetime="2017-03-24T18:18">
										7 hours ago
									</time>
								</div>
							</div>

							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Edit Post</a>
									</li>
									<li>
										<a href="#">Delete Post</a>
									</li>
									<li>
										<a href="#">Turn Off Notifications</a>
									</li>
									<li>
										<a href="#">Select as Featured</a>
									</li>
								</ul>
							</div>

						</div>

						<p>If someone missed it, check out the new song by System of a Revenge! I thinks they are going back to their roots...</p>

						<div class="post-video">
							<div class="video-thumb">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/video5.jpg" alt="photo">
								<a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video">
									<svg class="olymp-play-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-play-icon"></use></svg>
								</a>
							</div>

							<div class="video-content">
								<a href="#" class="h4 title">System of a Revenge - Nothing Else Matters (LIVE)</a>
								<p>Lorem ipsum dolor sit amet, consectetur ipisicing elit, sed do eiusmod tempo incididunt ut labore..</p>
								<a href="#" class="link-site">YOUTUBE.COM</a>
							</div>
						</div>

						<div class="post-additional-info inline-items">

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
								<span>15</span>
							</a>

							<ul class="friends-harmonic">
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic9.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic10.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic7.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic8.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic11.jpg" alt="friend">
									</a>
								</li>
							</ul>

							<div class="names-people-likes">
								<a href="#">Jenny</a>, <a href="#">Robert</a> and
								<br>13 more liked this
							</div>

							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-speech-balloon-icon"></use></svg>
									<span>1</span>
								</a>

								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
									<span>16</span>
								</a>
							</div>


						</div>

						<!--<div class="control-block-button post-control-button">

							<a href="#" class="btn btn-control">
								<svg class="olymp-like-post-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-like-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-comments-post-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-share-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
							</a>

						</div>-->

					</article>
				</div>

				<div class="ui-block">
					<article class="hentry post">

						<div class="post__author author vcard inline-items">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/author-page.jpg" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>
								<div class="post__date">
									<time class="published" datetime="2017-03-24T18:18">
										2 hours ago
									</time>
								</div>
							</div>

							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Edit Post</a>
									</li>
									<li>
										<a href="#">Delete Post</a>
									</li>
									<li>
										<a href="#">Turn Off Notifications</a>
									</li>
									<li>
										<a href="#">Select as Featured</a>
									</li>
								</ul>
							</div>

						</div>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris consequat.
						</p>

						<div class="post-additional-info inline-items">

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
								<span>36</span>
							</a>

							<ul class="friends-harmonic">
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic7.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic8.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic9.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic10.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic11.jpg" alt="friend">
									</a>
								</li>
							</ul>

							<div class="names-people-likes">
								<a href="#">You</a>, <a href="#">Elaine</a> and
								<br>34 more liked this
							</div>


							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-speech-balloon-icon"></use></svg>
									<span>17</span>
								</a>

								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
									<span>24</span>
								</a>
							</div>


						</div>

						<!--<div class="control-block-button post-control-button">

							<a href="#" class="btn btn-control">
								<svg class="olymp-like-post-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-like-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-comments-post-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-share-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
							</a>

						</div>-->

					</article>

					<ul class="comments-list">
						<li>
							<div class="post__author author vcard inline-items">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar10-sm.jpg" alt="author">

								<div class="author-date">
									<a class="h6 post__author-name fn" href="#">Elaine Dreyfuss</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											5 mins ago
										</time>
									</div>
								</div>

								<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

							</div>

							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
								<span>8</span>
							</a>
							<a href="#" class="reply">Reply</a>
						</li>
						<li class="has-children">
							<div class="post__author author vcard inline-items">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar5-sm.jpg" alt="author">

								<div class="author-date">
									<a class="h6 post__author-name fn" href="#">Green Goo Rock</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											1 hour ago
										</time>
									</div>
								</div>

								<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

							</div>

							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugiten, sed quia
								consequuntur magni dolores eos qui ratione voluptatem sequi en lod nesciunt. Neque porro
								quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit en lorem ipsum der.
							</p>

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
								<span>5</span>
							</a>
							<a href="#" class="reply">Reply</a>

							<ul class="children">
								<li>
									<div class="post__author author vcard inline-items">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar8-sm.jpg" alt="author">

										<div class="author-date">
											<a class="h6 post__author-name fn" href="#">Diana Jameson</a>
											<div class="post__date">
												<time class="published" datetime="2017-03-24T18:18">
													39 mins ago
												</time>
											</div>
										</div>

										<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

									</div>

									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
										<span>2</span>
									</a>
									<a href="#" class="reply">Reply</a>
								</li>
								<li>
									<div class="post__author author vcard inline-items">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar2-sm.jpg" alt="author">

										<div class="author-date">
											<a class="h6 post__author-name fn" href="#">Nicholas Grisom</a>
											<div class="post__date">
												<time class="published" datetime="2017-03-24T18:18">
													24 mins ago
												</time>
											</div>
										</div>

										<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

									</div>

									<p>Excepteur sint occaecat cupidatat non proident.</p>

									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
										<span>0</span>
									</a>
									<a href="#" class="reply">Reply</a>

								</li>
							</ul>

						</li>



						<li>
							<div class="post__author author vcard inline-items">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar4-sm.jpg" alt="author">

								<div class="author-date">
									<a class="h6 post__author-name fn" href="#">Chris Greyson</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											1 hour ago
										</time>
									</div>
								</div>

								<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

							</div>

							<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
								<span>7</span>
							</a>
							<a href="#" class="reply">Reply</a>

						</li>
					</ul>

					<a href="#" class="more-comments">View more comments <span>+</span></a>
					<form class="comment-form inline-items">

						<div class="post__author author vcard inline-items">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/author-page.jpg" alt="author">
						</div>

						<div class="form-group with-icon-right is-empty">
							<textarea class="form-control" placeholder=""  ></textarea>
							<div class="add-options-message">
								<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
									<svg class="olymp-camera-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-camera-icon"></use></svg>
								</a>
							</div>
							<span class="material-input"></span></div>

					</form>
				</div>

				<div class="ui-block">
					<article class="hentry post has-post-thumbnail shared-photo">

						<div class="post__author author vcard inline-items">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/author-page.jpg" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a> shared <a href="#">Diana Jameson</a>’s <a href="#">photo</a>
								<div class="post__date">
									<time class="published" datetime="2017-03-24T18:18">
										7 hours ago
									</time>
								</div>
							</div>

							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Edit Post</a>
									</li>
									<li>
										<a href="#">Delete Post</a>
									</li>
									<li>
										<a href="#">Turn Off Notifications</a>
									</li>
									<li>
										<a href="#">Select as Featured</a>
									</li>
								</ul>
							</div>

						</div>

						<p>Hi! Everyone should check out these amazing photographs that my friend shot the past week. Here’s one of them...leave a kind comment!</p>

						<div class="post-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/post-photo6.jpg" alt="photo">
						</div>

						<ul class="children single-children">
							<li>
								<div class="post__author author vcard inline-items">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar8-sm.jpg" alt="author">
									<div class="author-date">
										<a class="h6 post__author-name fn" href="#">Diana Jameson</a>
										<div class="post__date">
											<time class="published" datetime="2017-03-24T18:18">
												16 hours ago
											</time>
										</div>
									</div>
								</div>

								<p>Here’s the first photo of our incredible photoshoot from yesterday. If you like it please say so and tel me what you wanna see next!</p>
							</li>
						</ul>

						<div class="post-additional-info inline-items">

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
								<span>15</span>
							</a>

							<ul class="friends-harmonic">
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic5.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic10.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic7.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic8.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic2.jpg" alt="friend">
									</a>
								</li>
							</ul>

							<div class="names-people-likes">
								<a href="#">Diana</a>, <a href="#">Nicholas</a> and
								<br>13 more liked this
							</div>

							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-speech-balloon-icon"></use></svg>
									<span>0</span>
								</a>

								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
									<span>16</span>
								</a>
							</div>

						</div>

						<!--<div class="control-block-button post-control-button">

							<a href="#" class="btn btn-control">
								<svg class="olymp-like-post-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-like-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-comments-post-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-share-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
							</a>

						</div>-->

					</article>
				</div>

			</div>

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
		</div>

		<!-- ... end Main Content -->


		<!-- Left Sidebar -->

		<div class="col-xl-3 pull-xl-6 col-lg-6 pull-lg-0 col-md-6 col-sm-12 col-xs-12">
			<div class="ui-block">
			
				<div class="ui-block-title">
					<h6 class="title">Profile Intro</h6>
				</div>
		<div class="ui-block-content">
				<?php //if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
						<!--<div id="secondary" class="widget-area" role="complementary">
							<?php //dynamic_sidebar( 'sidebar-2' ); ?>
					    </div>-->
			<?php //endif; ?>
					<ul class="widget w-personal-info item-block">
						<li>
							<span class="title">About Me:</span>
							<span class="text">Hi, I’m James, I’m 36 and I work as a Digital Designer for the  “Daydreams” Agency in Pier 56.</span>
						</li>
						<li>
							<span class="title">Favourite TV Shows:</span>
							<span class="text">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.</span>
						</li>
						<li>
							<span class="title">Favourite Music Bands / Artists:</span>
							<span class="text">Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.</span>
						</li>
					</ul>

					<div class="widget w-socials">
						<h6 class="title">Other Social Networks:</h6>
						<a href="#" class="social-item bg-facebook">
							<i class="fa fa-facebook" aria-hidden="true"></i>
							Facebook
						</a>
						<a href="#" class="social-item bg-twitter">
							<i class="fa fa-twitter" aria-hidden="true"></i>
							Twitter
						</a>
						<a href="#" class="social-item bg-dribbble">
							<i class="fa fa-dribbble" aria-hidden="true"></i>
							Dribbble
						</a>
					</div>
				</div>
			</div>

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">James’s Badges</h6>
				</div>
				<div class="ui-block-content">

					<ul class="widget w-badges">
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge1.png" alt="author">
								<div class="label-avatar bg-primary">2</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge4.png" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge3.png" alt="author">
								<div class="label-avatar bg-blue">4</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge6.png" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge11.png" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge8.png" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge10.png" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge13.png" alt="author">
								<div class="label-avatar bg-breez">2</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge7.png" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge12.png" alt="author">
							</a>
						</li>
					</ul>

				</div>
			</div>

		<!--	<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">My Spotify Playlist</h6>
				</div>

				<ol class="widget w-playlist">
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/playlist6.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">The Past Starts Slow...</a>
							<a href="#" class="composition-author">System of a Revenge</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">3:22</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>

					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/playlist7.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">The Pretender</a>
							<a href="#" class="composition-author">Kung Fighters</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">5:48</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/playlist8.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Blood Brothers</a>
							<a href="#" class="composition-author">Iron Maid</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">3:06</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/playlist9.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Seven Nation Army</a>
							<a href="#" class="composition-author">The Black Stripes</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">6:17</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/playlist10.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
							</a>
						</div>

						<div class="composition">
							<a href="#" class="composition-name">Killer Queen</a>
							<a href="#" class="composition-author">Archiduke</a>
						</div>

						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">5:40</time>
							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Add Song to Player</a>
									</li>
									<li>
										<a href="#">Add Playlist to Player</a>
									</li>
								</ul>
							</div>
						</div>

					</li>
				</ol>
			</div>-->

		<!--	<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Twitter Feed</h6>
				</div>

				<ul class="widget w-twitter">
					<li class="twitter-item">
						<div class="author-folder">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/twitter-avatar1.png" alt="avatar">
							<div class="author">
								<a href="#" class="author-name">Space Cowboy</a>
								<a href="#" class="group">@james_spiegelOK</a>
							</div>
						</div>
						<p>Tomorrow with the agency we will run 5 km for charity. Come and give us your support! <a href="#" class="link-post">#Daydream5K</a></p>
						<span class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								2 hours ago
							</time>
						</span>
					</li>
					<li class="twitter-item">
						<div class="author-folder">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/twitter-avatar1.png" alt="avatar">
							<div class="author">
								<a href="#" class="author-name">Space Cowboy</a>
								<a href="#" class="group">@james_spiegelOK</a>
							</div>
						</div>
						<p>Check out the new website of “The Bebop Bar”! <a href="#" class="link-post">bytle/thbp53f</a></p>
						<span class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								16 hours ago
							</time>
						</span>
					</li>
					<li class="twitter-item">
						<div class="author-folder">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/twitter-avatar1.png" alt="avatar">
							<div class="author">
								<a href="#" class="author-name">Space Cowboy</a>
								<a href="#" class="group">@james_spiegelOK</a>
							</div>
						</div>
						<p>The Sunday is the annual agency camping trip and I still haven’t got a tent  <a href="#" class="link-post">#TheWild #Indoors</a></p>
						<span class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								Yesterday
							</time>
						</span>
					</li>
				</ul>
			</div>-->

			<!--<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Last Videos</h6>
				</div>
				<div class="ui-block-content">
					<ul class="widget w-last-video">
						<li>
							<a href="#" class="play-video play-video--small">
								<svg class="olymp-play-icon"><use xlink:href="icons/icons.svg#olymp-play-icon"></use></svg>
							</a>
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/video8.jpg" alt="video">
							<div class="video-content">
								<div class="title">System of a Revenge - Hypnotize...</div>
								<time class="published" datetime="2017-03-24T18:18">3:25</time>
							</div>
							<div class="overlay"></div>
						</li>
						<li>
							<a href="#" class="play-video play-video--small">
								<svg class="olymp-play-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-play-icon"></use></svg>
							</a>
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/video7.jpg" alt="video">
							<div class="video-content">
								<div class="title">Green Goo - Live at Dan’s Arena</div>
								<time class="published" datetime="2017-03-24T18:18">5:48</time>
							</div>
							<div class="overlay"></div>
						</li>
					</ul>
				</div>
			</div>-->
		</div>

		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->

		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="ui-block">
				
				<div class="ui-block-content">
				    <h6 class="title">Last Photos</h6>
					<?php //if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
						<!--<div id="secondary" class="widget-area" role="complementary">
							<?php //dynamic_sidebar( 'sidebar-1' ); ?>
					</div>-->
					<?php //endif; ?>
					<ul class="widget w-last-photo js-zoom-gallery">
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/last-photo10-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/last-phot11-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/last-phot12-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/last-phot13-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/last-phot14-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/last-phot15-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/last-phot16-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/last-phot17-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/last-phot18-large.jpg" alt="photo">
							</a>
						</li>
					</ul>
				</div>
			</div>

			<!--<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Blog Posts</h6>
				</div>
				<ul class="widget w-blog-posts">
					<li>
						<article class="hentry post">

							<a href="#" class="h4">My Perfect Vacations in South America and Europe</a>

							<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et.</p>

							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
									7 hours ago
								</time>
							</div>

						</article>
					</li>
					<li>
						<article class="hentry post">

							<a href="#" class="h4">The Big Experience of Travelling Alone</a>

							<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et.</p>

							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
									March 18th, at 6:52pm
								</time>
							</div>

						</article>
					</li>
				</ul>
			</div>-->

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Friends (86)</h6>
				</div>
				<div class="ui-block-content">
						<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
						<div id="secondary" class="widget-area" role="complementary">
							<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</div>
					<?php endif; ?>
					<!--<ul class="widget w-faved-page js-zoom-gallery">
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar38-sm.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar24-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar36-sm.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar35-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar34-sm.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar33-sm.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar32-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar31-sm.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar30-sm.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar29-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar28-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar27-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar26-sm.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar25-sm.jpg" alt="user">
							</a>
						</li>
						<li class="all-users">
							<a href="#">+74</a>
						</li>
					</ul>-->
				</div>
			</div>

			<!--<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Favourite Pages</h6>
				</div>

				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar41-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">The Marina Bar</a>
							<span class="chat-message-item">Restaurant / Bar</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>

					</li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar42-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Tapronus Rock</a>
							<span class="chat-message-item">Rock Band</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>

					</li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar43-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Pixel Digital Design</a>
							<span class="chat-message-item">Company</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>

					</li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/imagesg/avatar44-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Thompson’s Custom Clothing Boutique</a>
							<span class="chat-message-item">Clothing Store</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>

					</li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar45-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Crimson Agency</a>
							<span class="chat-message-item">Company</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>
					</li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/avatar46-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Mannequin Angel</a>
							<span class="chat-message-item">Clothing Store</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>
					</li>

				</ul>

			</div>-->

		<!--	<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">James's Poll</h6>
				</div>
				<div class="ui-block-content">
					<ul class="widget w-pool">
						<li>
							<p>If you had to choose, which actor do you prefer to be the next Darkman? </p>
						</li>

						<li>
							<div class="skills-item">
								<div class="skills-item-info">
									<span class="skills-item-title">

										<span class="radio">
											<label>
												<input type="radio" name="optionsRadios">
											Thomas Bale
											</label>
										</span>
									</span>
									<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="62" data-from="0"></span><span class="units">62%</span></span>
								</div>
								<div class="skills-item-meter">
									<span class="skills-item-meter-active bg-primary" style="width: 62%"></span>
								</div>

								<div class="counter-friends">12 friends voted for this</div>

								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img src="img/friend-harmonic1.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic2.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic3.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic4.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic5.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic6.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic7.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic8.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic9.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#" class="all-users">+3</a>
									</li>
								</ul>

							</div>-->
						</li>

						<!--<li>
							<div class="skills-item">
								<div class="skills-item-info">
									<span class="skills-item-title">

										<span class="radio">
											<label>
												<input type="radio" name="optionsRadios">
											Ben Robertson
											</label>
										</span>
									</span>
									<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="27" data-from="0"></span><span class="units">27%</span></span>
								</div>
								<div class="skills-item-meter">
									<span class="skills-item-meter-active bg-primary" style="width: 27%"></span>
								</div>
								<div class="counter-friends">7 friends voted for this</div>

								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic7.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic8.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic9.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic10.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic11.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic12.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic13.jpg" alt="friend">
										</a>
									</li>
								</ul>
							</div>
						</li>-->

						<!--<li>
							<div class="skills-item">
								<div class="skills-item-info">
									<span class="skills-item-title">
										<span class="radio">
											<label>
												<input type="radio" name="optionsRadios">
											Michael Streiton
											</label>
										</span>
									</span>
									<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="11" data-from="0"></span><span class="units">11%</span></span>
								</div>-->
								<!--<div class="skills-item-meter">
									<span class="skills-item-meter-active bg-primary" style="width: 11%"></span>
								</div>

								<div class="counter-friends">2 people voted for this</div>

								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic14.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/friend-harmonic15.jpg" alt="friend">
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
					<a href="#" class="btn btn-md-2 btn-border-think custom-color c-grey full-width">Vote Now!</a>
				</div>
			</div>
		</div>-->

		<!-- ... end Right Sidebar -->

	</div>
</div>
	</div>
<!--static HTML of News feed ends-->


<?php

/**
 * Fires after the display of member profile content.
 *
 * @since 1.1.0
 */
do_action( 'bp_after_profile_content' ); ?>
