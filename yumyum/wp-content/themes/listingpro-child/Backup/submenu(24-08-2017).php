<div class="your-profile">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Your PROFILE</h6>
					</div>
					<div class="your-profile-menu">
						
						<?php
										wp_nav_menu( array(
										 'theme_location' => 'submenu',
										 'menu_class'     => 'your-profile-menu',
									 ) );
                             ?>
					
					
							 </div>
<!--
					<div id="accordion" role="tablist" aria-multiselectable="true">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<h6 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Profile Settings
										<svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
									</a>
								</h6>
							</div>

							<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
								<ul class="your-profile-menu">
								
								<?php
										// wp_nav_menu( array(
										 // 'theme_location' => 'submenu',
										 // 'menu_class'     => 'your-profile-menu',
									// ) );
                             ?>
								<li>
									<a href="<?php //echo home_url('/personal_information'); ?>">Personal Information</a>
								</li>
								<li>
									<a href="<?php //echo home_url('/account_settings'); ?>">Account Settings</a>
								</li>
								<li>
									<a href="<?php //echo home_url('/change_password'); ?>">Change Password</a>
								</li>
								<li>
									<a href="<?php //echo home_url('/hobbies_interests'); ?>">Hobbies and Interests</a>
								</li>
								<li>
									<a href="<?php //echo home_url('/education_employment'); ?>">Education and Employement</a>
								</li>
							</ul>
							</div>
						</div>
					</div>


					<div class="ui-block-title">
						<a href="<?php// echo home_url('/notifications'); ?>" class="h6 title">Notifications</a>
						<a href="#" class="items-round-little bg-primary">8</a>
					</div>
					<div class="ui-block-title">
						<a href="<?php //echo home_url('/chat_messages'); ?>" class="h6 title">Chat / Messages</a>
					</div>
					<div class="ui-block-title">
						<a href="<?php// echo home_url('/invite_friends'); ?>" class="h6 title">Friend Requests</a>
						<a href="#" class="items-round-little bg-blue">3</a>
					</div>
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">FAVOURITE PAGE</h6>
					</div>
					<div class="ui-block-title">
						<a href="<?php// echo home_url('/create_fav_page'); ?>" class="h6 title">Create Fav Page</a>
					</div>
					<div class="ui-block-title">
						<a href="<?php// echo home_url('/fav_page_settings'); ?>" class="h6 title">Fav Page Settings</a>
					</div> -->
</div>