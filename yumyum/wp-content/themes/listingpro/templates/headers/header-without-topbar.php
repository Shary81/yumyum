<?php

		
		global $listingpro_options;
		$lp_top_bar = $listingpro_options['top_bar_enable'];
		$headerBgcolor = $listingpro_options['header_bgcolor'];
		$listing_style = $listingpro_options['listing_style'];
		$header_fullwidth = $listingpro_options['header_fullwidth'];
		$headerSrch = $listingpro_options['search_switcher'];
		$topBannerView = $listingpro_options['top_banner_styles'];


		$headerWidth = '';
		if($header_fullwidth == 1){
			$headerWidth = 'fullwidth-header';
		}else{
			$headerWidth = 'container';
		}

		
		$listing_styledata = '';
		$headerClass = 'header-normal';
		$listing_style = '';
		$listing_style = $listingpro_options['listing_style'];
		if(isset($_GET['list-style']) && !empty($_GET['list-style'])){
			$listing_style = $_GET['list-style'];
		}
		if(is_tax('location') || is_tax('listing-category') || is_tax('features') || is_search()){
			if($listing_style == '2' || $listing_style == '3'){
				$headerClass = 'header-fixed';
			}
		}
		$menuColor= '';
		if(!is_front_page() || is_home()){
			$menuColor =  ' lp-menu-bar-color';
		}elseif ( $topBannerView == 'map_view' && is_front_page() ) {
			$menuColor =  ' lp-menu-bar-color';
		}

		$menuClass = '';
 		if(!is_front_page() && $headerSrch == 1 ){
		 	$menuClass = 'col-md-6';
	 	}elseif(!is_front_page() && $headerSrch != 1 ) {
		  	$menuClass = 'col-md-7';
	 	}else {
		  	$menuClass = 'col-md-7';
	 	}
	?>

	<!--================================full width with blue background====================================-->
 	
	<header class="header-without-topbar <?php echo $headerClass; ?> pos-relative lp-header-full-width">
		<?php if(is_front_page()){ ?> <div class="lp-header-overlay"></div> <?php } ?>	
			
			<div id="menu">
				<?php
					if(is_front_page()) {
						echo listingpro_primary_menu();
					}else {
						echo listingpro_inner_menu();
					}
				?>
			</div>
		<?php
			$menuColor= '';
			if(!is_front_page()){
				$menuColor =  ' lp-menu-bar-color';
			}
			if(is_home()){
				$menuColor =  ' lp-menu-bar-color';
			}
		
		?>
		
		<!--============================Custom header===============-->
		<div class="header header-content-wrapper">
		<div class="lp-menu-bar <?php echo $menuColor;  ?>">
			<div class="<?php echo $headerWidth; ?>">
				<div class="row">
					<div class="col-md-1 col-xs-6 lp-logo-container">
						<div class="lp-logo">
							<a href="<?php echo esc_url(home_url('/')); ?>">
								<?php
								if(is_front_page()){
								    listingpro_primary_logo(); 
								}
								else{
									listingpro_secondary_logo(); 
								}
								?>
							</a>
						</div>
					</div>
					<div class="header-right-panel clearfix col-md-11 col-sm-11 col-xs-12">
						<?php 
							//if($headerSrch == 1) {
								//if(!is_front_page() && !is_page_template('template-dashboard.php')){
									get_template_part('templates/search/top_search');
								//}
							//}
						?>
						
						
						
						
						<!--<div class="col-xs-6 mobile-nav-icon">
							<a href="#menu" class="nav-icon">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
						</div>-->
						<div class="<?php echo $menuClass; ?> col-xs-7 clearfix pull-right">
						
						
						<!--friends-->
						<div class="exp">
							<?php if(is_user_logged_in()){ ?>
						  <a href="#" class="link-find-friend">Find Experience</a>
							<?php }		 ?>
						</div>
						
						<!--control block-->
							<div class="control-block">
									
									
									
								<?php	
									if(is_user_logged_in()){ ?>
								<div class="control-icon more has-items">
									<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
									<div class="label-avatar bg-blue">6</div>

									<div class="more-dropdown more-with-triangle triangle-top-center">
										<div class="ui-block-title ui-block-title-small">
											<h6 class="title">FRIEND REQUESTS</h6>
											<a href="#">Find Friends</a>
											<a href="#">Settings</a>
										</div>

										<div class="mCustomScrollbar" data-mcs-theme="dark">
											<ul class="notification-list friend-requests">
												<li>
													<div class="author-thumb">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar55-sm.jpg" alt="author">
													</div>
													<div class="notification-event">
														<a href="#" class="h6 notification-friend">Tamara Romanoff</a>
														<span class="chat-message-item">Mutual Friend: Sarah Hetfield</span>
													</div>
													<span class="notification-icon">
														<a href="#" class="accept-request">
															<span class="icon-add without-text">
																<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
															</span>
														</a>

														<a href="#" class="accept-request request-del">
															<span class="icon-minus">
																<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
															</span>
														</a>

													</span>

													<div class="more">
														<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
													</div>
												</li>

												<li>
													<div class="author-thumb">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar56-sm.jpg" alt="author">
													</div>
													<div class="notification-event">
														<a href="#" class="h6 notification-friend">Tony Stevens</a>
														<span class="chat-message-item">4 Friends in Common</span>
													</div>
													<span class="notification-icon">
														<a href="#" class="accept-request">
															<span class="icon-add without-text">
																<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
															</span>
														</a>

														<a href="#" class="accept-request request-del">
															<span class="icon-minus">
																<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
															</span>
														</a>

													</span>

													<div class="more">
														<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
													</div>
												</li>

												<li class="accepted">
													<div class="author-thumb">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar57-sm.jpg" alt="author">
													</div>
													<div class="notification-event">
														You and <a href="#" class="h6 notification-friend">Mary Jane Stark</a> just became friends. Write on <a href="#" class="notification-link">her wall</a>.
													</div>
													<span class="notification-icon">
														<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
													</span>

													<div class="more">
														<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
														<svg class="olymp-little-delete"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-little-delete"></use></svg>
													</div>
												</li>

												<li>
													<div class="author-thumb">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar58-sm.jpg" alt="author">
													</div>
													<div class="notification-event">
														<a href="#" class="h6 notification-friend">Stagg Clothing</a>
														<span class="chat-message-item">9 Friends in Common</span>
													</div>
													<span class="notification-icon">
														<a href="#" class="accept-request">
															<span class="icon-add without-text">
																<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
															</span>
														</a>

														<a href="#" class="accept-request request-del">
															<span class="icon-minus">
																<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
															</span>
														</a>

													</span>

													<div class="more">
														<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
													</div>
												</li>

											</ul>
										</div>

										<a href="#" class="view-all bg-blue">Check all your Events</a>
									</div>
								</div>

								<div class="control-icon more has-items">
									<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
									<div class="label-avatar bg-purple">2</div>

									<div class="more-dropdown more-with-triangle triangle-top-center">
										<div class="ui-block-title ui-block-title-small">
											<h6 class="title">Chat / Messages</h6>
											<a href="#">Mark all as read</a>
											<a href="#">Settings</a>
										</div>

										<div class="mCustomScrollbar" data-mcs-theme="dark">
											<ul class="notification-list chat-message">
												<li class="message-unread">
													<div class="author-thumb">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar59-sm.jpg" alt="author">
													</div>
													<div class="notification-event">
														<a href="#" class="h6 notification-friend">Diana Jameson</a>
														<span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
														<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
													</div>
													<span class="notification-icon">
														<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
													</span>
													<div class="more">
														<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
													</div>
												</li>

												<li>
													<div class="author-thumb">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar60-sm.jpg" alt="author">
													</div>
													<div class="notification-event">
														<a href="#" class="h6 notification-friend">Jake Parker</a>
														<span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
														<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
													</div>
													<span class="notification-icon">
														<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
													</span>

													<div class="more">
														<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
													</div>
												</li>
												<li>
													<div class="author-thumb">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar61-sm.jpg" alt="author">
													</div>
													<div class="notification-event">
														<a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
														<span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with...</span>
														<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
													</div>
														<span class="notification-icon">
															<svg class="olymp-chat---messages-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
														</span>
													<div class="more">
														<svg class="olymp-three-dots-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
													</div>
												</li>

												<li class="chat-group">
													<div class="author-thumb">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar11-sm.jpg" alt="author">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar12-sm.jpg" alt="author">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar13-sm.jpg" alt="author">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar10-sm.jpg" alt="author">
													</div>
													<div class="notification-event">
														<a href="#" class="h6 notification-friend">You, Faye, Ed &amp; Jet +3</a>
														<span class="last-message-author">Ed:</span>
														<span class="chat-message-item">Yeah! Seems fine by me!</span>
														<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
													</div>
														<span class="notification-icon">
															<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
														</span>
													<div class="more">
														<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
													</div>
												</li>
											</ul>
										</div>

										<a href="#" class="view-all bg-purple">View All Messages</a>
									</div>
								</div>

								<div class="control-icon more has-items">
									<svg class="olymp-thunder-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-thunder-icon"></use></svg>

									<div class="label-avatar bg-primary">8</div>

									<div class="more-dropdown more-with-triangle triangle-top-center">
										<div class="ui-block-title ui-block-title-small">
											<h6 class="title">Notifications</h6>
											<a href="#">Mark all as read</a>
											<a href="#">Settings</a>
										</div>

										<div class="mCustomScrollbar" data-mcs-theme="dark">
											<ul class="notification-list">
												<li>
													<div class="author-thumb">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar62-sm.jpg" alt="author">
													</div>
													<div class="notification-event">
														<div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
														<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
													</div>
														<span class="notification-icon">
															<svg class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
														</span>

													<div class="more">
														<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
														<svg class="olymp-little-delete"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-little-delete"></use></svg>
													</div>
												</li>

												<li class="un-read">
													<div class="author-thumb">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar63-sm.jpg" alt="author">
													</div>
													<div class="notification-event">
														<div>You and <a href="#" class="h6 notification-friend">Nicholas Grissom</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.</div>
														<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 hours ago</time></span>
													</div>
														<span class="notification-icon">
															<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
														</span>

													<div class="more">
														<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
														<svg class="olymp-little-delete"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-little-delete"></use></svg>
													</div>
												</li>

												<li class="with-comment-photo">
													<div class="author-thumb">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar64-sm.jpg" alt="author">
													</div>
													<div class="notification-event">
														<div><a href="#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="#" class="notification-link">photo</a>.</div>
														<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
													</div>
														<span class="notification-icon">
															<svg class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
														</span>

													<div class="comment-photo">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/comment-photo1.jpg" alt="photo">
														<span>“She looks incredible in that outfit! We should see each...”</span>
													</div>

													<div class="more">
														<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
														<svg class="olymp-little-delete"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-little-delete"></use></svg>
													</div>
												</li>

												<li>
													<div class="author-thumb">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar65-sm.jpg" alt="author">
													</div>
													<div class="notification-event">
														<div><a href="#" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="#" class="notification-link">Gotham Bar</a>.</div>
														<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
													</div>
														<span class="notification-icon">
															<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
														</span>

													<div class="more">
														<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
														<svg class="olymp-little-delete"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-little-delete"></use></svg>
													</div>
												</li>

												<li>
													<div class="author-thumb">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar66-sm.jpg" alt="author">
													</div>
													<div class="notification-event">
														<div><a href="#" class="h6 notification-friend">James Summers</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
														<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
													</div>
														<span class="notification-icon">
															<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
														</span>

													<div class="more">
														<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
														<svg class="olymp-little-delete"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-little-delete"></use></svg>
													</div>
												</li>
											</ul>
										</div>

										<a href="#" class="view-all bg-primary">View All Notifications</a>
									</div>
								</div>

								<!--<div class="author-page author vcard inline-items more">
									<div class="author-thumb">
										<img alt="author" src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/author-page.jpg" class="avatar">
										<span class="icon-status online"></span>
										<div class="more-dropdown more-with-triangle">
											<div class="mCustomScrollbar" data-mcs-theme="dark">
												<div class="ui-block-title ui-block-title-small">
													<h6 class="title">Your Account</h6>
												</div>

												<ul class="account-settings">
															 <?php
															 //wp_nav_menu( array(
															 //'theme_location' => 'youraccount',
															 //'menu_class'     => 'account-settings',
															
														//) );
												 ?>
												 <li>
														<a href="<?php //echo wp_logout_url( esc_url(home_url('/')) ); ?>">
															<svg class="olymp-logout-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-logout-icon"></use></svg>

															<span>Log Out</span>
														</a>
													</li>
													
												</ul>


												<div class="ui-block-title ui-block-title-small">
													<h6 class="title">About CitMeal</h6>
												</div>
												<?php
													 // wp_nav_menu( array(
													 //'theme_location' => 'aboutcitmeal',
													 //'menu_class'     => '',
													 // ) );
												?>
											</div>

										</div>
									</div>
									<a href="#" class="author-name fn">
										<div class="author-title">
											<span>Michel Jackson</span>
											<?php //echo  $current_user->nickname; ?>
											<svg class="olymp-dropdown-arrow-icon">
											<use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-dropdown-arrow-icon"></use>
											</svg>
										</div>
										<span class="author-subtitle">SPACE COWBOY</span>
									</a>
								</div>-->

									<?php }	/* else{
									   wp_nav_menu( array(
									   'theme_location' => 'landing',
									   'menu_class'     => 'control-block',
									   ) );
									} */?>
									
							<div class="pull-right">
								<div class="lp-joinus-icon">
									<?php get_template_part( 'templates/join-now'); ?>
								</div>
								<?php /*
									$addURL = listingpro_url('add_listing_url_mode');
								if(!empty($addURL)){
								?>
								<div class="pull-right lp-add-listing-btn">
									<ul>
										<li>
											<a href="<?php echo listingpro_url('add_listing_url_mode'); ?>">
												<i class="fa fa-plus"></i>
												<?php esc_html_e('Add Listing', 'listingpro') ?>
											</a>
										</li>
									</ul>
								</div>
								<?php 
									}*/
								?>
							</div>	
								
								
							</div>
						
						<!--end control block-->
						
							
							<!--<div class="pull-right padding-right-10">
								<div class="lp-menu menu">
									<?php
										/*if(is_front_page()) {
											echo listingpro_primary_menu();
										}else {
											echo listingpro_inner_menu();
										}*/
									?>
								</div>
							</div>-->
						</div>
						
						<!--Search-->
						
						
						
						
						
					</div>
				</div>
			</div>
		</div>
		
		</div>
		
		
		
	
		
		
		
		
		<!--============================Custom header end==============================-->
		
		
		
		<!--<div class="lp-menu-bar <?php //echo $menuColor;  ?>">
			<div class="<?php //echo $headerWidth; ?>">
				<div class="row">
					<div class="col-md-2 col-xs-6 lp-logo-container">
						<div class="lp-logo">
							<a href="<?php //echo esc_url(home_url('/')); ?>">
								<?php
								/*if(is_front_page()){
								    listingpro_primary_logo(); 
								}
								else{
									listingpro_secondary_logo(); 
								}*/
								?>
							</a>
						</div>
					</div>
					<div class="header-right-panel clearfix col-md-10 col-sm-10 col-xs-12">
						<?php 
							/*if($headerSrch == 1) {
								if(!is_front_page() && !is_page_template('template-dashboard.php')){
									get_template_part('templates/search/top_search');
								}
							}*/
						?>
						<div class="col-xs-6 mobile-nav-icon">
							<a href="#menu" class="nav-icon">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
						</div>
						<div class="<?php //echo $menuClass; ?> col-xs-12 lp-menu-container clearfix pull-right">
							<div class="pull-right">
								<div class="lp-joinus-icon">
									<?php //get_template_part( 'templates/join-now'); ?>
								</div>
								<?php 
									/*$addURL = listingpro_url('add_listing_url_mode');
								if(!empty($addURL)){*/
								?>
								<div class="pull-right lp-add-listing-btn">
									<ul>
										<li>
											<a href="<?php //echo listingpro_url('add_listing_url_mode'); ?>">
												<i class="fa fa-plus"></i>
												<?php //esc_html_e('Add Listing', 'listingpro') ?>
											</a>
										</li>
									</ul>
								</div>
								<?php 
									//}
								?>
							</div>
							<div class="pull-right padding-right-10">
								<div class="lp-menu menu">
									<?php
										/*if(is_front_page()) {
											echo listingpro_primary_menu();
										}else {
											echo listingpro_inner_menu();
										}*/
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-->
		
		<!-- ../menu-bar -->
		<?php //get_template_part( 'templates/banner'); ?>
	</header>
	<!--==================================Header Close=================================-->