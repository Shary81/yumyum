<div class="fixed-sidebar-left sidebar--small" id="sidebar-left">
		<a href="02-ProfilePage.html" class="logo">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.svg" alt="CitMeal">
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark" >
			<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-menu-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="OPEN MENU"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-menu-icon"></use></svg>
					</a>
				</li>
				<!--<li>
					<a href="#">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right" title="" data-original-title="NEWSFEED"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-newsfeed-icon"></use></svg>
						</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="FAV PAGE"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="FRIEND GROUPS"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-faces-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-headphones-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="MUSIC&PLAYLISTS"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-headphones-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-weather-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="WEATHER APP"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-weather-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="CALENDAR AND EVENTS"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-calendar-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-badge-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Community Badges"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-badge-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-cupcake-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Friends Birthdays"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-cupcake-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-stats-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Account Stats"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-stats-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-manage-widgets-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Manage Widgets"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-manage-widgets-icon"></use></svg>
					</a>
				</li>-->
			</ul>
		</div>
	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1" >
		<a href="#" class="logo">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.svg" alt="Olympus">
			<h6 class="logo-title">CitMeal</h6>
		</a>
         
		<div class="mCustomScrollbar" data-mcs-theme="dark">
		
		<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-close-icon left-menu-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
						<span class="left-menu-title">Collapse Menu</span>
					</a>
				</li>
				       <?php
							 wp_nav_menu( array(
							 'theme_location' => 'primary',
							 'menu_class'     => 'left-menu',
							 ) );
                          ?>
				
			<!--	<li id="dropdown_1">
				<a href="#">
						<svg class="olymp-cupcake-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Friends Birthdays"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-cupcake-icon"></use></svg>
						<span class="left-menu-title">Profile</span>
						<svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
									
						</a>
						<ul id="sub_list_1">
							<?php
									 // wp_nav_menu( array(
										 // 'theme_location' => 'primary',
									 // ) );
									// 'menu_class'     => 'sub_list_1',
                          ?>
						
						</ul>
						
				</li> -->
				
			
			<!--<li id="dropdown_2">
				<a href="#">
						<svg class="olymp-cupcake-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Friends Birthdays"><use xlink:href="<?php// echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-cupcake-icon"></use></svg>
						<span class="left-menu-title">Perferences</span>
						<svg class="olympp-dropdown-arrow-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
						
						</a>
						<ul id="sub_list_2">
							<li>
							<a href="#">
							<span class="left-menu-title">Payments</span>
							</a>
							</li>	
							<li>
							<a href="#">
							<span class="left-menu-title">Invite Friends</span>
							</a>
							</li>
							<li>
							<a href="#">
							<span class="left-menu-title">Notifications</span>
							</a>
							</li>
							
						
						</ul>
				</li>-->
				
				<!--<li>
					<a href="<?php //echo home_url('/badges'); ?>">
						<svg class="olymp-cupcake-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Friends Birthdays"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-cupcake-icon"></use></svg>
						<span class="left-menu-title">Badges</span>
					</a>
				</li>
				<li>
					<a href="<?php //echo home_url('/notifications'); ?>">
						<svg class="olymp-stats-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Account Stats"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-stats-icon"></use></svg>
						<span class="left-menu-title">Notifications</span>
					</a>
				</li>
				<li>
					<a href="<?php //echo home_url('/invite_friends'); ?>">
						<svg class="olymp-manage-widgets-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Manage Widgets"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-manage-widgets-icon"></use></svg>
						<span class="left-menu-title">Invite Friends</span>
					</a>
				</li>
				<li>
					<a href="<?php //echo home_url('/reviews'); ?>">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right" title="" data-original-title="NEWSFEED"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-newsfeed-icon"></use></svg>
						<span class="left-menu-title">Reviews</span>
					</a>
				</li>
				<li>
					<a href="<?php //echo home_url('/manage_booking'); ?>">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="FAV PAGE"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
						<span class="left-menu-title">Manage Booking</span>
					</a>
				</li>
				<li>
					<a href="<?php //echo home_url('/statements'); ?>">
						<svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="FRIEND GROUPS"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-faces-icon"></use></svg>
						<span class="left-menu-title">Statement</span>
					</a>
				</li>
				<li>
					<a href="<?php //echo home_url('/becaome_a_host'); ?>">
						<svg class="olymp-headphones-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="MUSIC&PLAYLISTS"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-headphones-icon"></use></svg>
						<span class="left-menu-title">Become a host</span>
					</a>
				</li>
				<li>
					<a href="<?php //echo home_url('/add_tag_image'); ?>">
						<svg class="olymp-weather-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="WEATHER APP"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-weather-icon"></use></svg>
						<span class="left-menu-title">Add Tag Image</span>
					</a>
				</li>
				<li>
					<a href="<?php //echo home_url('/newsfeed'); ?>">
						<svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="CALENDAR AND EVENTS"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-calendar-icon"></use></svg>
						<span class="left-menu-title">NewsFeed</span>
					</a>
				</li>
				<li>
					<a href="<?php //echo home_url('/gift_vochers'); ?>">
						<svg class="olymp-badge-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Community Badges"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-badge-icon"></use></svg>
						<span class="left-menu-title">Gift Voucher</span>
					</a>
				</li>-->
				
			</ul>

			<div class="profile-completion">

				<div class="skills-item">
					<div class="skills-item-info">
						<span class="skills-item-title">Profile Completion</span>
						<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="76" data-from="0"></span><span class="units">76%</span></span>
					</div>
					<div class="skills-item-meter">
						<span class="skills-item-meter-active bg-primary" style="width: 76%"></span>
					</div>
				</div>

				<span>Complete <a href="#">your profile</a> so people can know more about you!</span>

			</div>
		</div>
	</div>
