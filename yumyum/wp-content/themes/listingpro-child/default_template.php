<?php
	/*
		Template Name: Default
	*/
	
	
?>

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
					<a href="#" class="author-name fn">
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
					<a href="#">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right" title="" data-original-title="NEWSFEED"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-newsfeed-icon"></use></svg>
						<span class="left-menu-title">Newsfeed</span>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="FAV PAGE"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-star-icon"></use></svg>
						<span class="left-menu-title">Fav Pages Feed</span>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="FRIEND GROUPS"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-faces-icon"></use></svg>
						<span class="left-menu-title">Friend Groups</span>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-headphones-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="MUSIC&PLAYLISTS"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-headphones-icon"></use></svg>
						<span class="left-menu-title">Music & Playlists</span>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-weather-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="WEATHER APP"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-weather-icon"></use></svg>
						<span class="left-menu-title">Weather App</span>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="CALENDAR AND EVENTS"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-calendar-icon"></use></svg>
						<span class="left-menu-title">Calendar and Events</span>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-badge-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Community Badges"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-badge-icon"></use></svg>
						<span class="left-menu-title">Community Badges</span>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-cupcake-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" title="" data-original-title="Friends Birthdays"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-cupcake-icon"></use></svg>
						<span class="left-menu-title">Friends Birthdays</span>
					</a>
				</li>
				<li>
					<a href="#">
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
					<a href="<?php echo  home_url('/personal_information'); ?>">

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
</div>-->

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

		<a href="#" class="olympus-chat inline-items">
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

			<a href="#" class="settings">
				<svg class="olymp-settings-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-settings-icon"></use></svg>
			</a>

			<a href="#" class="js-sidebar-open">
				<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
			</a>


		</div>

		<a href="#" class="olympus-chat inline-items">

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

<!-- ... end Fixed Sidebar Right -->



<!-- ... end Responsive Header -->

<div class="header-spacer"></div>


<!-- Top Header -->

<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top-header1.jpg" alt="nature">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col-lg-5 col-md-5 " >
								<ul class="profile-menu" >
								<?php
										wp_nav_menu( array(
										'theme_location' => 'sliderbottom',
										'menu_class'     => 'profile-menu',
										
									) );
                             ?>
									<!--<li>
										<a href="<?php //echo get_page_link(188); ?>" class="active" >Become a host</a>
									</li>
									<li>
										<a href="<?php //echo get_page_link(191); ?>">Reviews</a>
									</li>
									<li>
										<a href="<?php //echo get_page_link(190); ?>">Manage Booking</a>
									</li>-->
								</ul>
							</div>
							<!--<div class="col-lg-5 offset-lg-2 col-md-5 offset-md-2">
								<ul class="profile-menu">
									<li>
										<a href="#">Photos</a>
									</li>
									<li>
										<a href="#">Videos</a>
									</li>
									<li>
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown more-with-triangle">
												<li>
													<a href="#">Report Profile</a>
												</li>
												<li>
													<a href="#">Block Profile</a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>-->
						</div>

						<!--<div class="control-block-button">
							<a href="#" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-happy-face-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>

							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Profile Photo</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Header Photo</a>
									</li>
									<li>
										<a href="29-YourAccount-AccountSettings.html">Account Settings</a>
									</li>
								</ul>
							</div>
						</div>
					</div>-->
					<div class="top-header-author">
						<a href="http://localhost/yumyum/members-2/admin/profile/change-avatar/" class="author-thumb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/author-main1.jpg" alt="author">
						</a>
						<div class="author-content">
							<a href="#" class="h4 author-name"><?php echo $current_user->nickname; ?></a>
							<div class="country"><?php echo $current_user->country; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Top Header -->



<div class="container">
	<div class="row">

		<!-- Main Content -->

		<div class="col-xl-6 push-xl-3 col-lg-12 push-lg-0 col-md-12 col-sm-12 col-xs-12">
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
			<svg class="olymp-computer-icon"><use xlink:href=<?php echo get_stylesheet_directory_uri(); ?>/assets/"icons/icons.svg#olymp-computer-icon"></use></svg>

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
				<a class="nav-link" data-toggle="tab" href="#" role="tab" aria-expanded="false">
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


<div class="window-popup playlist-popup">

	<a href="" class="icon-close js-close-popup">
		<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
	</a>

	<table class="playlist-popup-table">

		<thead>

		<tr>

			<th class="play">
				PLAY
			</th>

			<th class="cover">
				COVER
			</th>

			<th class="song-artist">
				SONG AND ARTIST
			</th>

			<th class="album">
				ALBUM
			</th>

			<th class="released">
				RELEASED
			</th>

			<th class="duration">
				DURATION
			</th>

			<th class="spotify">
				GET IT ON SPOTIFY
			</th>

			<th class="remove">
				REMOVE
			</th>
		</tr>

		</thead>

		<tbody>
		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/playlist19.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">We Can Be Heroes</a>
					<a href="#" class="composition-author">Jason Bowie</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">Ziggy Firedust</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/playlist6.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">The Past Starts Slow and Ends</a>
					<a href="#" class="composition-author">System of a Revenge</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">Wonderize</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/playlist7.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">The Pretender</a>
					<a href="#" class="composition-author">Kung Fighters</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">Warping Lights</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/playlist8.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">Seven Nation Army</a>
					<a href="#" class="composition-author">The Black Stripes</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition ">Icky Strung (LIVE at Cube Garden)</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/playlist9.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">Leap of Faith</a>
					<a href="#" class="composition-author">Eden Artifact</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">The Assassins’s Soundtrack</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/playlist10.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">Killer Queen</a>
					<a href="#" class="composition-author">Archiduke</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition ">News of the Universe</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>
		</tbody>
	</table>

	<audio id="mediaplayer" data-showplaylist="true">
		<source src="mp3/Twice.mp3" title="Track 1" data-poster="track1.png" type="audio/mpeg">
		<source src="mp3/Twice.mp3" title="Track 2" data-poster="track2.png" type="audio/mpeg">
		<source src="mp3/Twice.mp3" title="Track 3" data-poster="track3.png" type="audio/mpeg">
		<source src="mp3/Twice.mp3" title="Track 4" data-poster="track4.png" type="audio/mpeg">
	</audio>

</div>

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