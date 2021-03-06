<?php
	/*
		Template Name: newsfeed
	*/
	get_header();
	if(!is_user_logged_in()){
	    wp_redirect ('home');
	 }
?>

<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar">
	<?php
		get_sidebar();
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
	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right">

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<ul class="chat-users">
				<li class="inline-items">
					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar67-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>
				</li>
				<li class="inline-items">
					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar62-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>
				</li>

				<li class="inline-items">
					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar68-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>
				</li>

				<li class="inline-items">
					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar69-sm.jpg" class="avatar">
						<span class="icon-status away"></span>
					</div>
				</li>

				<li class="inline-items">
					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar70-sm.jpg" class="avatar">
						<span class="icon-status disconected"></span>
					</div>
				</li>
				<li class="inline-items">
					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar64-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>
				</li>
				<li class="inline-items">
					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar71-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>
				</li>
				<li class="inline-items">
					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar72-sm.jpg" class="avatar">
						<span class="icon-status away"></span>
					</div>
				</li>
				<li class="inline-items">
					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar63-sm.jpg" class="avatar">
						<span class="icon-status status-invisible"></span>
					</div>
				</li>
				<li class="inline-items">
					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar72-sm.jpg" class="avatar">
						<span class="icon-status away"></span>
					</div>
				</li>
				<li class="inline-items">

					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar71-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>
				</li>
			</ul>
		</div>

		<div class="search-friend inline-items">
			<a href="#" class="js-sidebar-open">
				<svg class="olymp-menu-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-menu-icon"></use></svg>
			</a>
		</div>

		<a href="34-YourAccount-ChatMessages.html" class="olympus-chat inline-items">
			<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>

	</div>

	<div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">

		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<div class="ui-block-title ui-block-title-small">
				<a href="#" class="title">Close Friends</a>
				<a href="#">Settings</a>
			</div>

			<ul class="chat-users">
				<li class="inline-items">

					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar67-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">Carol Summers</a>
						<span class="status">ONLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>

				</li>
				<li class="inline-items">

					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar62-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">Mathilda Brinker</a>
						<span class="status">AT WORK!</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>

				</li>

				<li class="inline-items">


					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar68-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">Carol Summers</a>
						<span class="status">ONLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>


				</li>

				<li class="inline-items">


					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar69-sm.jpg" class="avatar">
						<span class="icon-status away"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">Michael Maximoff</a>
						<span class="status">AWAY</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>


				</li>

				<li class="inline-items">


					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar70-sm.jpg" class="avatar">
						<span class="icon-status disconected"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">Rachel Howlett</a>
						<span class="status">OFFLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>


				</li>
			</ul>


			<div class="ui-block-title ui-block-title-small">
				<a href="#" class="title">MY FAMILY</a>
				<a href="#">Settings</a>
			</div>

			<ul class="chat-users">
				<li class="inline-items">

					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar64-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">Sarah Hetfield</a>
						<span class="status">ONLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>
				</li>
			</ul>


			<div class="ui-block-title ui-block-title-small">
				<a href="#" class="title">UNCATEGORIZED</a>
				<a href="#">Settings</a>
			</div>

			<ul class="chat-users">
				<li class="inline-items">

					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar71-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">Bruce Peterson</a>
						<span class="status">ONLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>


				</li>
				<li class="inline-items">

					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar72-sm.jpg" class="avatar">
						<span class="icon-status away"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">Chris Greyson</a>
						<span class="status">AWAY</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>

				</li>
				<li class="inline-items">

					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar63-sm.jpg" class="avatar">
						<span class="icon-status status-invisible"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">Nicholas Grisom</a>
						<span class="status">INVISIBLE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>
				</li>
				<li class="inline-items">

					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar72-sm.jpg" class="avatar">
						<span class="icon-status away"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">Chris Greyson</a>
						<span class="status">AWAY</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>
				</li>
				<li class="inline-items">

					<div class="author-thumb">
						<img alt="author" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar71-sm.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">Bruce Peterson</a>
						<span class="status">ONLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>
				</li>
			</ul>

		</div>

		<div class="search-friend inline-items">
			<form class="form-group">
				<input class="form-control" placeholder="Search Friends..." value="" type="text">
			</form>

			<a href="29-YourAccount-AccountSettings.html" class="settings">
				<svg class="olymp-settings-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-settings-icon"></use></svg>
			</a>

			<a href="#" class="js-sidebar-open">
				<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
			</a>


		</div>

		<a href="34-YourAccount-ChatMessages.html" class="olympus-chat inline-items">

			<h6 class="olympus-chat-title">OLYMPUS CHAT</h6>
			<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>

	</div>
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


<!-- ... end Responsive Header -->

<div class="header-spacer"></div>


<div class="container">
	<div class="row">

		<!-- Main Content -->

		<main class="col-xl-6 push-xl-3 col-lg-12 push-lg-0 col-md-12 col-sm-12 col-xs-12">

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
					<article class="hentry post video">

						<div class="post__author author vcard inline-items">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar7-sm.jpg" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" href="#">Marina Valentine</a> shared a <a href="#">link</a>
								<div class="post__date">
									<time class="published" datetime="2004-07-24T18:18">
										March 4 at 2:05pm
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

						<p>Hey <a href="#">Cindi</a>, you should really check out this new song by Iron Maid. The next time they come to the city we should totally go!</p>

						<div class="post-video">
							<div class="video-thumb">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/video-youtube1.jpg" alt="photo">
								<a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video">
									<svg class="olymp-play-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-play-icon"></use></svg>
								</a>
							</div>

							<div class="video-content">
								<a href="#" class="h4 title">Iron Maid - ChillGroves</a>
								<p>Lorem ipsum dolor sit amet, consectetur ipisicing elit, sed do eiusmod tempor incididunt
									ut labore et dolore magna aliqua...
								</p>
								<a href="#" class="link-site">YOUTUBE.COM</a>
							</div>
						</div>

						<div class="post-additional-info inline-items">

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
								<span>18</span>
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
								<br>18 more liked this
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

						<div class="control-block-button post-control-button">

							<a href="#" class="btn btn-control">
								<svg class="olymp-like-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-like-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-share-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
							</a>

						</div>

					</article>
				</div>

				<div class="ui-block">
					<article class="hentry post">

						<div class="post__author author vcard inline-items">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar10-sm.jpg" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" href="#">Elaine Dreyfuss</a>
								<div class="post__date">
									<time class="published" datetime="2004-07-24T18:18">
										9 hours ago
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

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut
							labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris consequat.
						</p>

						<div class="post-additional-info inline-items">

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
								<span>24</span>
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
								<br>22 more liked this
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

						<div class="control-block-button post-control-button">

							<a href="#" class="btn btn-control">
								<svg class="olymp-like-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-like-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-share-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
							</a>

						</div>

					</article>

					<ul class="comments-list">
						<li>
							<div class="post__author author vcard inline-items">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/author-page.jpg" alt="author">

								<div class="author-date">
									<a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>
									<div class="post__date">
										<time class="published" datetime="2004-07-24T18:18">
											38 mins ago
										</time>
									</div>
								</div>

								<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

							</div>

							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
								<span>3</span>
							</a>
							<a href="#" class="reply">Reply</a>
						</li>
						<li>
							<div class="post__author author vcard inline-items">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar1-sm.jpg" alt="author">

								<div class="author-date">
									<a class="h6 post__author-name fn" href="#">Mathilda Brinker</a>
									<div class="post__date">
										<time class="published" datetime="2004-07-24T18:18">
											1 hour ago
										</time>
									</div>
								</div>

								<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

							</div>

							<p>Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum
								quia dolor sit amet, consectetur adipisci velit en lorem ipsum duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
							</p>

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
								<span>8</span>
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

							<span class="material-input"></span><span class="material-input"></span></div>

					</form>

				</div>

				<div class="ui-block">
					<article class="hentry post has-post-thumbnail">

						<div class="post__author author vcard inline-items">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar5-sm.jpg" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" href="#">Green Goo Rock</a>
								<div class="post__date">
									<time class="published" datetime="2004-07-24T18:18">
										March 8 at 6:42pm
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

						<p>Hey guys! We are gona be playing this Saturday of <a href="#">The Marina Bar</a> for their new Mystic Deer Party.
							If you wanna hang out and have a really good time, come and join us. We’l be waiting for you!
						</p>

						<div class="post-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/post__thumb1.jpg" alt="photo">
						</div>

						<div class="post-additional-info inline-items">

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
								<span>49</span>
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
								<a href="#">Jimmy</a>, <a href="#">Andrea</a> and
								<br>47 more liked this
							</div>


							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-speech-balloon-icon"></use></svg>
									<span>264</span>
								</a>

								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
									<span>37</span>
								</a>
							</div>


						</div>

						<div class="control-block-button post-control-button">

							<a href="#" class="btn btn-control">
								<svg class="olymp-like-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-like-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-share-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
							</a>

						</div>

					</article>
				</div>

				<div class="ui-block">
					<article class="hentry post has-post-thumbnail">

						<div class="post__author author vcard inline-items">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar3-sm.jpg" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" href="#">Sarah Hetfield</a>
								<div class="post__date">
									<time class="published" datetime="2004-07-24T18:18">
										March 2 at 9:06am
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
							mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.
						</p>

						<div class="post-additional-info inline-items">

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-heart-icon"></use></svg>
								<span>0 Likes</span>
							</a>

							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-speech-balloon-icon"></use></svg>
									<span>0 Comments</span>
								</a>

								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
									<span>2 Shares</span>
								</a>
							</div>


						</div>

						<div class="control-block-button post-control-button">

							<a href="#" class="btn btn-control">
								<svg class="olymp-like-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-like-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-share-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
							</a>

						</div>

					</article>
				</div>

				<div class="ui-block">
					<article class="hentry post has-post-thumbnail">

						<div class="post__author author vcard inline-items">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar2-sm.jpg" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" href="#">Nicholas Grissom</a>
								<div class="post__date">
									<time class="published" datetime="2004-07-24T18:18">
										March 2 at 8:34am
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
								<span>22</span>
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
								<a href="#">Jimmy</a>, <a href="#">Andrea</a> and
								<br>47 more liked this
							</div>


							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-speech-balloon-icon"></use></svg>
									<span>0</span>
								</a>

								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
									<span>2</span>
								</a>
							</div>


						</div>

						<div class="control-block-button post-control-button">

							<a href="#" class="btn btn-control">
								<svg class="olymp-like-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-like-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-comments-post-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-comments-post-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-share-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-share-icon"></use></svg>
							</a>

						</div>

					</article>
				</div>

			</div>


			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>


		</main>

		<!-- ... end Main Content -->


		<!-- Left Sidebar -->

		<aside class="col-xl-3 pull-xl-6 col-lg-6 pull-lg-0 col-md-6 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="widget w-wethear">
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

					<div class="wethear-now inline-items">
						<div class="temperature-sensor">64°</div>
						<div class="max-min-temperature">
							<span>58°</span>
							<span>76°</span>
						</div>

						<svg class="olymp-weather-partly-sunny-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-weather.svg#olymp-weather-partly-sunny-icon"></use></svg>
					</div>

					<div class="wethear-now-description">
						<div class="climate">Partly Sunny</div>
						<span>Real Feel: <span>67°</span></span>
						<span>Chance of Rain: <span>49%</span></span>
					</div>

					<ul class="weekly-forecast">

						<li>
							<div class="day">sun</div>
							<svg class="olymp-weather-sunny-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-weather.svg#olymp-weather-sunny-icon"></use></svg>

							<div class="temperature-sensor-day">60°</div>
						</li>

						<li>
							<div class="day">mon</div>
							<svg class="olymp-weather-partly-sunny-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-weather.svg#olymp-weather-partly-sunny-icon"></use></svg>
							<div class="temperature-sensor-day">58°</div>
						</li>

						<li>
							<div class="day">tue</div>
							<svg class="olymp-weather-cloudy-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-weather.svg#olymp-weather-cloudy-icon"></use></svg>

							<div class="temperature-sensor-day">67°</div>
						</li>

						<li>
							<div class="day">wed</div>
							<svg class="olymp-weather-rain-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-weather.svg#olymp-weather-rain-icon"></use></svg>

							<div class="temperature-sensor-day">70°</div>
						</li>

						<li>
							<div class="day">thu</div>
							<svg class="olymp-weather-storm-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-weather.svg#olymp-weather-storm-icon"></use></svg>

							<div class="temperature-sensor-day">58°</div>
						</li>

						<li>
							<div class="day">fri</div>
							<svg class="olymp-weather-snow-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-weather.svg#olymp-weather-snow-icon"></use></svg>

							<div class="temperature-sensor-day">68°</div>
						</li>

						<li>
							<div class="day">sat</div>

							<svg class="olymp-weather-wind-icon-header"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-weather.svg#olymp-weather-wind-icon-header"></use></svg>

							<div class="temperature-sensor-day">65°</div>
						</li>

					</ul>

					<div class="date-and-place">
						<h5 class="date">Saturday, March 26th</h5>
						<div class="place">San Francisco, CA</div>
					</div>

				</div>
			</div>


			<div class="ui-block">
				<div class="calendar-container">
					<div class="calendar">
						<header>
							<h6 class="month">March 2017</h6>
							<a class="btn-prev fontawesome-angle-left" href="#"></a>
							<a class="btn-next fontawesome-angle-right" href="#"></a>
						</header>
						<table>
							<thead>
							<tr><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td><td>San</td></tr>
							</thead>
							<tbody>
							<tr>
								<td date-month="12" date-day="1">1</td>
								<td date-month="12" date-day="2" class="event-uncomplited event-complited">
									2
								</td>
								<td date-month="12" date-day="3">3</td>
								<td date-month="12" date-day="4">4</td>
								<td date-month="12" date-day="5">5</td>
								<td date-month="12" date-day="6">6</td>
								<td date-month="12" date-day="7">7</td>
							</tr>
							<tr>
								<td date-month="12" date-day="8">8</td>
								<td date-month="12" date-day="9">9</td>
								<td date-month="12" date-day="10" class="event-complited">10</td>
								<td date-month="12" date-day="11">11</td>
								<td date-month="12" date-day="12">12</td>
								<td date-month="12" date-day="13">13</td>
								<td date-month="12" date-day="14">14</td>
							</tr>
							<tr>
								<td date-month="12" date-day="15" class="event-complited-2">15</td>
								<td date-month="12" date-day="16">16</td>
								<td date-month="12" date-day="17">17</td>
								<td date-month="12" date-day="18">18</td>
								<td date-month="12" date-day="19">19</td>
								<td date-month="12" date-day="20">20</td>
								<td date-month="12" date-day="21">21</td>
							</tr>
							<tr>
								<td date-month="12" date-day="22">22</td>
								<td date-month="12" date-day="23">23</td>
								<td date-month="12" date-day="24">24</td>
								<td date-month="12" date-day="25">25</td>
								<td date-month="12" date-day="26">26</td>
								<td date-month="12" date-day="27">27</td>
								<td date-month="12" date-day="28" class="event-uncomplited">28</td>
							</tr>
							<tr>
								<td date-month="12" date-day="29">29</td>
								<td date-month="12" date-day="30">30</td>
								<td date-month="12" date-day="31">31</td>
							</tr>
							</tbody>
						</table>
						<div class="list">


							<div id="accordion-1" role="tablist" aria-multiselectable="true" class="day-event" date-month="12" date-day="2">
								<div class="ui-block-title ui-block-title-small">
									<h6 class="title">TODAY’S EVENTS</h6>
								</div>
								<div class="card">
									<div class="card-header" role="tab" id="headingOne-1">
										<div class="event-time">
											<span class="circle"></span>
											<time datetime="2004-07-24T18:18">9:00am</time>
											<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
										</div>
										<h5 class="mb-0">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne-1">
												Breakfast at the Agency<svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
											</a>
										</h5>
									</div>

									<div id="collapseOne-1" class="collapse" role="tabpanel" >
										<div class="card-block">
											Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
										</div>
										<div class="place inline-items">
											<svg class="olymp-add-a-place-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
											<span>Daydreamz Agency</span>
										</div>

										<ul class="friends-harmonic inline-items">
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
											<li class="with-text">
												Will Assist
											</li>
										</ul>
									</div>


								</div>

								<div class="card">
									<div class="card-header" role="tab" id="headingTwo-1">
										<div class="event-time">
											<span class="circle"></span>
											<time datetime="2004-07-24T18:18">9:00am</time>
											<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
										</div>
										<h5 class="mb-0">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-1" aria-expanded="true" aria-controls="collapseTwo-1">
												Send the new “Olympus” project files to the Agency<svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
											</a>
										</h5>
									</div>

									<div id="collapseTwo-1" class="collapse" role="tabpanel">
										<div class="card-block">
											Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
										</div>
									</div>

								</div>

								<div class="card">
									<div class="card-header" role="tab" id="headingThree-1">
										<div class="event-time">
											<span class="circle"></span>
											<time datetime="2004-07-24T18:18">6:30am</time>
											<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
										</div>
										<h5 class="mb-0">
											<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#" aria-expanded="false">
												Take Querty to the Veterinarian
											</a>
										</h5>
									</div>
									<div class="place inline-items">
										<svg class="olymp-add-a-place-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
										<span>Daydreamz Agency</span>
									</div>
								</div>

								<a href="#" class="check-all">Check all your Events</a>
							</div>

							<div id="accordion-2" role="tablist" aria-multiselectable="true" class="day-event" date-month="12" date-day="10">
								<div class="ui-block-title ui-block-title-small">
									<h6 class="title">TODAY’S EVENTS</h6>
								</div>
								<div class="card">
									<div class="card-header" role="tab" id="headingOne-2">
										<div class="event-time">
											<span class="circle"></span>
											<time datetime="2004-07-24T18:18">9:00am</time>
											<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
										</div>
										<h5 class="mb-0">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-2" aria-expanded="true" aria-controls="collapseOne-2">
												Breakfast at the Agency<svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
											</a>
										</h5>
									</div>

									<div id="collapseOne-2" class="collapse" role="tabpanel">
										<div class="card-block">
											Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
										</div>
										<div class="place inline-items">
											<svg class="olymp-add-a-place-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
											<span>Daydreamz Agency</span>
										</div>

										<ul class="friends-harmonic inline-items">
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
											<li class="with-text">
												Will Assist
											</li>
										</ul>
									</div>

								</div>

								<a href="#" class="check-all">Check all your Events</a>
							</div>

							<div id="accordion-3" role="tablist" aria-multiselectable="true" class="day-event" date-month="12" date-day="15">
								<div class="ui-block-title ui-block-title-small">
									<h6 class="title">TODAY’S EVENTS</h6>
								</div>
								<div class="card">
									<div class="card-header" role="tab" id="headingOne-3">
										<div class="event-time">
											<span class="circle"></span>
											<time datetime="2004-07-24T18:18">9:00am</time>
											<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
										</div>
										<h5 class="mb-0">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-3" aria-expanded="true" aria-controls="collapseOne-3">
												Breakfast at the Agency<svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
											</a>
										</h5>
									</div>

									<div id="collapseOne-3" class="collapse" role="tabpanel">
										<div class="card-block">
											Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
										</div>

										<div class="place inline-items">
											<svg class="olymp-add-a-place-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
											<span>Daydreamz Agency</span>
										</div>

										<ul class="friends-harmonic inline-items">
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
											<li class="with-text">
												Will Assist
											</li>
										</ul>
									</div>

								</div>

								<div class="card">
									<div class="card-header" role="tab" id="headingTwo-3">
										<div class="event-time">
											<span class="circle"></span>
											<time datetime="2004-07-24T18:18">12:00pm</time>
											<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
										</div>
										<h5 class="mb-0">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-3" aria-expanded="true" aria-controls="collapseTwo-3">
												Send the new “Olympus” project files to the Agency<svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
											</a>
										</h5>
									</div>

									<div id="collapseTwo-3" class="collapse" role="tabpanel" >
										<div class="card-block">
											Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
										</div>
									</div>

								</div>

								<div class="card">
									<div class="card-header" role="tab" id="headingThree-3">
										<div class="event-time">
											<span class="circle"></span>
											<time datetime="2004-07-24T18:18">6:30pm</time>
											<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
										</div>
										<h5 class="mb-0">
											<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#" aria-expanded="false">
												Take Querty to the Veterinarian
											</a>
										</h5>
									</div>
									<div class="place inline-items">
										<svg class="olymp-add-a-place-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
										<span>Daydreamz Agency</span>
									</div>
								</div>

								<a href="#" class="check-all">Check all your Events</a>
							</div>

							<div id="accordion-4" role="tablist" aria-multiselectable="true" class="day-event" date-month="12" date-day="28">
								<div class="ui-block-title ui-block-title-small">
									<h6 class="title">TODAY’S EVENTS</h6>
								</div>
								<div class="card">
									<div class="card-header" role="tab" id="headingOne-4">
										<div class="event-time">
											<span class="circle"></span>
											<time datetime="2004-07-24T18:18">9:00am</time>
											<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
										</div>
										<h5 class="mb-0">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-4" aria-expanded="true" aria-controls="collapseOne-4">
												Breakfast at the Agency<svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
											</a>
										</h5>
									</div>

									<div id="collapseOne-4" class="collapse" role="tabpanel" aria-labelledby="headingOne-4">
										<div class="card-block">
											Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
										</div>
										<div class="place inline-items">
											<svg class="olymp-add-a-place-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-add-a-place-icon"></use></svg>
											<span>Daydreamz Agency</span>
										</div>

										<ul class="friends-harmonic inline-items">
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
											<li class="with-text">
												Will Assist
											</li>
										</ul>
									</div>

								</div>

								<a href="#" class="check-all">Check all your Events</a>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Pages You May Like</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>

				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar41-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">The Marina Bar</a>
							<span class="chat-message-item">Restaurant / Bar</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>

					</li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar42-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Tapronus Rock</a>
							<span class="chat-message-item">Rock Band</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>
					</li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar43-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Pixel Digital Design</a>
							<span class="chat-message-item">Company</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>
					</li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar44-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Thompson’s Custom Clothing Boutique</a>
							<span class="chat-message-item">Clothing Store</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>
					</li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar45-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Crimson Agency</a>
							<span class="chat-message-item">Company</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>
					</li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar46-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Mannequin Angel</a>
							<span class="chat-message-item">Clothing Store</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>
					</li>

				</ul>

			</div>
		</aside>

		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->

		<aside class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">

			<div class="ui-block">
				<div class="widget w-birthday-alert">
					<div class="icons-block">
						<svg class="olymp-cupcake-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-cupcake-icon"></use></svg>
						<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
					</div>

					<div class="content">
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar48-sm.jpg" alt="author">
						</div>
						<span>Today is</span>
						<a href="#" class="h4 title">Marina Valentine’s Birthday!</a>
						<p>Leave her a message with your best wishes on her profile page!</p>
					</div>
				</div>
			</div>


			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Friend Suggestions</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>

				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar38-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Francine Smith</a>
							<span class="chat-message-item">8 Friends in Common</span>
						</div>
						<span class="notification-icon">
							<a href="#" class="accept-request">
								<span class="icon-add without-text">
									<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>

					</li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar39-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Hugh Wilson</a>
							<span class="chat-message-item">6 Friends in Common</span>
						</div>
						<span class="notification-icon">
							<a href="#" class="accept-request">
								<span class="icon-add without-text">
									<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>

					</li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar40-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Karen Masters</a>
							<span class="chat-message-item">6 Friends in Common</span>
						</div>
						<span class="notification-icon">
							<a href="#" class="accept-request">
								<span class="icon-add without-text">
									<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>

					</li>

				</ul>

			</div>

			<div class="ui-block">

				<div class="ui-block-title">
					<h6 class="title">Activity Feed</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>

				<ul class="widget w-activity-feed notification-list">
					<li>
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar49-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Marina Polson</a> commented on Jason Mark’s <a href="#" class="notification-link">photo.</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 mins ago</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar9-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Jake Parker </a> liked Nicholas Grissom’s <a href="#" class="notification-link">status update.</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">5 mins ago</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar50-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Mary Jane Stark </a> added 20 new photos to her <a href="#" class="notification-link">gallery album.</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">12 mins ago</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar51-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Nicholas Grissom </a> updated his profile <a href="#" class="notification-link">photo</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar48-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Marina Valentine </a> commented on Chris Greyson’s <a href="#" class="notification-link">status update</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar52-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Green Goo Rock </a> posted a <a href="#" class="notification-link">status update</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar10-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Elaine Dreyfuss  </a> liked your <a href="#" class="notification-link">blog post</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 hours ago</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar10-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Elaine Dreyfuss  </a> commented on your <a href="#" class="notification-link">blog post</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 hours ago</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar53-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Bruce Peterson </a> changed his <a href="#" class="notification-link">profile picture</a>.
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">15 hours ago</time></span>
						</div>
					</li>

				</ul>
			</div>


			<div class="ui-block">
				<div class="widget w-action">

					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="Olympus">
					<div class="content">
						<h4 class="title">OLYMPUS</h4>
						<span>THE BEST SOCIAL NETWORK THEME IS HERE!</span>
						<a href="01-LandingPage.html" class="btn btn-bg-secondary btn-md">Register Now!</a>
					</div>
				</div>
			</div>

		</aside>

		<!-- ... end Right Sidebar -->

	</div>
</div>


<!-- Window-popup Update Header Photo -->

<div class="modal fade" id="update-header-photo">
	<div class="modal-dialog ui-block window-popup update-header-photo">
		<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 class="title">Update Header Photo</h6>
		</div>

		<a href="#" class="upload-photo-item">
			<svg class="olymp-computer-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-computer-icon"></use></svg>

			<h6>Upload Photo</h6>
			<span>Browse your computer.</span>
		</a>

		<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

			<svg class="olymp-photos-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-photos-icon"></use></svg>

			<h6>Choose from My Photos</h6>
			<span>Choose from your uploaded photos</span>
		</a>
	</div>
</div>


<!-- ... end Window-popup Update Header Photo -->


<!-- Window-popup Choose from my Photo -->
<div class="modal fade" id="choose-from-my-photo">
	<div class="modal-dialog ui-block window-popup choose-from-my-photo">
		<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 class="title">Choose from My Photos</h6>

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
						<svg class="olymp-photos-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-photos-icon"></use></svg>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
						<svg class="olymp-albums-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-albums-icon"></use></svg>
					</a>
				</li>
			</ul>
		</div>


		<div class="ui-block-content">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">

					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo1.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo2.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo3.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>

					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo4.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo5.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo6.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>

					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo7.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo8.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo9.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>


					<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
					<a href="#" class="btn btn-primary btn-lg btn--half-width">Confirm Photo</a>

				</div>
				<div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">

					<div class="choose-photo-item" data-mh="choose-item">
						<figure>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo10.jpg" alt="photo">
							<figcaption>
								<a href="#">South America Vacations</a>
								<span>Last Added: 2 hours ago</span>
							</figcaption>
						</figure>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<figure>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo11.jpg" alt="photo">
							<figcaption>
								<a href="#">Photoshoot Summer 2016</a>
								<span>Last Added: 5 weeks ago</span>
							</figcaption>
						</figure>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<figure>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo12.jpg" alt="photo">
							<figcaption>
								<a href="#">Amazing Street Food</a>
								<span>Last Added: 6 mins ago</span>
							</figcaption>
						</figure>
					</div>

					<div class="choose-photo-item" data-mh="choose-item">
						<figure>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo13.jpg" alt="photo">
							<figcaption>
								<a href="#">Graffity & Street Art</a>
								<span>Last Added: 16 hours ago</span>
							</figcaption>
						</figure>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<figure>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo14.jpg" alt="photo">
							<figcaption>
								<a href="#">Amazing Landscapes</a>
								<span>Last Added: 13 mins ago</span>
							</figcaption>
						</figure>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<figure>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/choose-photo15.jpg" alt="photo">
							<figcaption>
								<a href="#">The Majestic Canyon</a>
								<span>Last Added: 57 mins ago</span>
							</figcaption>
						</figure>
					</div>


					<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
					<a href="#" class="btn btn-primary btn-lg disabled btn--half-width">Confirm Photo</a>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- ... end Window-popup Choose from my Photo -->

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