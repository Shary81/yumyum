<?php
	/*
		Template Name: badges
	*/
	get_header();
	if(!is_user_logged_in()){
	   wp_redirect ('home');
	}
?>


<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar">
<?php
		get_template_part('/siderbar_collapse');
?>	
</div>

<!-- ... end Fixed Sidebar Left -->

<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar fixed-sidebar-responsive">

	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
		<a href="#" class="logo js-sidebar-open">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="Olympus">
		</a>

	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
		<a href="#" class="logo">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="Olympus">
			<h6 class="logo-title">olympus</h6>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<div class="control-block">
				<div class="author-page author vcard inline-items">
					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/author-page.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>
					<a href="02-ProfilePage.html" class="author-name fn">
						<div class="author-title">
							James Spiegel <svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
						</div>
						<span class="author-subtitle">SPACE COWBOY</span>
					</a>
				</div>
			</div>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">MAIN SECTIONS</h6>
			</div>

			<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-close-icon left-menu-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
						<span class="left-menu-title">Collapse Menu</span>
					</a>
				</li>
				<li>
					<a href="mobile-index.html">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right" title="" data-original-title="NEWSFEED"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-newsfeed-icon"></use></svg>
						<span class="left-menu-title">Newsfeed</span>
					</a>
				</li>
				<li>
					<a href="Mobile-28-YourAccount-PersonalInformation.html">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="FAV PAGE"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
						<span class="left-menu-title">Fav Pages Feed</span>
					</a>
				</li>
				<li>
					<a href="mobile-29-YourAccount-AccountSettings.html">
						<svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="FRIEND GROUPS"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-faces-icon"></use></svg>
						<span class="left-menu-title">Friend Groups</span>
					</a>
				</li>
				<li>
					<a href="Mobile-30-YourAccount-ChangePassword.html">
						<svg class="olymp-headphones-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="MUSIC&PLAYLISTS"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-headphones-icon"></use></svg>
						<span class="left-menu-title">Music & Playlists</span>
					</a>
				</li>
				<li>
					<a href="Mobile-31-YourAccount-HobbiesAndInterests.html">
						<svg class="olymp-weather-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="WEATHER APP"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-weather-icon"></use></svg>
						<span class="left-menu-title">Weather App</span>
					</a>
				</li>
				<li>
					<a href="Mobile-32-YourAccount-EducationAndEmployement.html">
						<svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="CALENDAR AND EVENTS"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-calendar-icon"></use></svg>
						<span class="left-menu-title">Calendar and Events</span>
					</a>
				</li>
				<li>
					<a href="Mobile-33-YourAccount-Notifications.html">
						<svg class="olymp-badge-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Community Badges"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-badge-icon"></use></svg>
						<span class="left-menu-title">Community Badges</span>
					</a>
				</li>
				<li>
					<a href="Mobile-34-YourAccount-ChatMessages.html">
						<svg class="olymp-cupcake-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Friends Birthdays"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-cupcake-icon"></use></svg>
						<span class="left-menu-title">Friends Birthdays</span>
					</a>
				</li>
				<li>
					<a href="Mobile-35-YourAccount-FriendsRequests.html">
						<svg class="olymp-stats-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Account Stats"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-stats-icon"></use></svg>
						<span class="left-menu-title">Account Stats</span>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-manage-widgets-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Manage Widgets"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-manage-widgets-icon"></use></svg>
						<span class="left-menu-title">Manage Widgets</span>
					</a>
				</li>
			</ul>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">YOUR ACCOUNT</h6>
			</div>

			<ul class="account-settings">
				<li>
					<a href="#">

						<svg class="olymp-menu-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-menu-icon"></use></svg>

						<span>Profile Settings</span>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="FAV PAGE"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>

						<span>Create Fav Page</span>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-logout-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-logout-icon"></use></svg>

						<span>Log Out</span>
					</a>
				</li>
			</ul>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">About Olympus</h6>
			</div>

			<ul class="about-olympus">
				<li>
					<a href="#">
						<span>Terms and Conditions</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>FAQs</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Careers</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Contact</span>
					</a>
				</li>
			</ul>

		</div>
	</div>
</div>

<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Right -->

<div class="fixed-sidebar right">
<?php
	get_template_part('/siderbar_friend');
?>
</div>	
<!-- ... end Fixed Sidebar Right -->

<!-- Fixed Sidebar Right -->

<div class="fixed-sidebar right fixed-sidebar-responsive">

	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right-responsive">

		<a href="#" class="olympus-chat inline-items js-chat-open">
			<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>

	</div>

</div>

<!-- ... end Fixed Sidebar Right -->



<!-- ... end Responsive Header -->



<div class="header-spacer header-spacer-small"></div>


<!-- Main Header Badges -->

<div class="main-header">
	<div class="content-bg-wrap">
		<div class="content-bg bg-badges"></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-xs-12">
				<div class="main-header-content">
					<h1>Collect your Badges!</h1>
					<p>Welcome to your badge collection! Here you’ll find all the badges you can unlock to show on your
						profile. Learn how to achive the goal to adquire them and collect them all. Some have leveled
						tiers and other don’t. You can challenge your friends to see who gets more and let the fun begin!
					</p>
				</div>
			</div>
		</div>
	</div>

	<img class="img-bottom" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badges-bottom.png" alt="friends">
</div>

<!-- ... end Main Header Badges -->


<!-- Main Content Badges -->

<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge1.png" alt="author">
						<div class="label-avatar bg-primary">2</div>
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Olympian User</a>
						<div class="birthday-date">Congratulations! You have been in the Olympus community for 2 years.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 76%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge2.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Favourite Creator</a>
						<div class="birthday-date">You created a favourite page.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 100%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge3.png" alt="author">
						<div class="label-avatar bg-blue">4</div>
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Friendly User</a>
						<div class="birthday-date">You have more than 80 friends. Next Tier: 150 Friends. </div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 52%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge4.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Professional Photographer</a>
						<div class="birthday-date">You have uploaded more than 500 images to your profile.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 100%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge5.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Expert Filmaker</a>
						<div class="birthday-date">You have uploaded more than 80 videos to your profile.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 70%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge6.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Mightier Than The Sword</a>
						<div class="birthday-date">You have written more than 50 blog post entries.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 23%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge7.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Universe Explorer</a>
						<div class="birthday-date">You have visited more than 1000 different user profiles.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 100%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge8.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Nothing to Hide</a>
						<div class="birthday-date">You have completed all your profile fields.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 100%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge9.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Messaging Master</a>
						<div class="birthday-date">You have messaged with at least 20 different people.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 69%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge10.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Musical Sharer</a>
						<div class="birthday-date">You have linked your Spotify account to share your playlist.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 33%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge11.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Superliked Hero</a>
						<div class="birthday-date">You have collected more than 100 likes in one post.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 100%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge12.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Strongly Caffeinated </a>
						<div class="birthday-date">You have written more than 1000 posts.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 65%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge13.png" alt="author">
						<div class="label-avatar bg-breez">2</div>
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Events Promoter</a>
						<div class="birthday-date">You have created more than 25 public or private events. Next Tier: 50.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 100%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge14.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Friendship Cultivator</a>
						<div class="birthday-date">You have tagged friends on 200 different posts.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 80%"></span>
						</div>
					</div>

				</div>
			</div>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge15.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Phantom Profile</a>
						<div class="birthday-date">You haven’t posted anything on your profile for more than 1 month.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 100%"></span>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>

<!-- ... end Main Content Badges -->


<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive">
	<div class="ui-block-title">
		<span class="icon-status online"></span>
		<h6 class="title" >Chat</h6>
		<div class="more">
			<svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
			<svg class="olymp-little-delete js-chat-open"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-little-delete"></use></svg>
		</div>
	</div>
	<div class="mCustomScrollbar">
		<ul class="notification-list chat-message chat-message-field">
			<li>
				<div class="author-thumb">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
				</div>
				<div class="notification-event">
					<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
				</div>
			</li>

			<li>
				<div class="author-thumb">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/author-page.jpg" alt="author" class="mCS_img_loaded">
				</div>
				<div class="notification-event">
					<span class="chat-message-item">Don’t worry Mathilda!</span>
					<span class="chat-message-item">I already bought everything</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
				</div>
			</li>

			<li>
				<div class="author-thumb">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
				</div>
				<div class="notification-event">
					<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
				</div>
			</li>
		</ul>
	</div>

	<form>

		<div class="form-group label-floating is-empty">
			<label class="control-label">Press enter to post...</label>
			<textarea class="form-control" placeholder=""></textarea>
			<div class="add-options-message">
				<a href="#" class="options-message">
					<svg class="olymp-computer-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-computer-icon"></use></svg>
				</a>
				<div class="options-message smile-block">

					<svg class="olymp-happy-sticker-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-sticker-icon"></use></svg>

					<ul class="more-dropdown more-with-triangle triangle-bottom-right">
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat1.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat2.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat3.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat4.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat5.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat6.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat7.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat8.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat9.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat10.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat11.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat12.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat13.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat14.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat15.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat16.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat17.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat18.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat19.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat20.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat21.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat22.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat23.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat24.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat25.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat26.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-chat27.png" alt="icon">
							</a>
						</li>
					</ul>
				</div>
			</div>
			<span class="material-input"></span></div>

	</form>


</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->
<?php
	get_footer();

?>