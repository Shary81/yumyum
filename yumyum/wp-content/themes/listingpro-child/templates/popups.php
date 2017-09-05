
		<!-- Listing Detail Popup -->
		
		<!-- dynamic invoice -->
		<div class="modal fade lp-modal-list" id="modal-invoice">
				<div class="modal-content">
				
					<div class="modal-body">
						<?php esc_html_e('Content is loading...','listingpro'); ?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-white" data-dismiss="modal"><?php esc_html_e('Close','listingpro'); ?></button>
						<a href="#" onclick="window.print()" class="lp-print-list btn-first-hover"><?php esc_html_e('Print','listingpro'); ?></a>
					</div>
				</div>
		</div>
		<!-- dynamic invoice -->
		
		
		<!-- Login Popup -->
		<div class="md-modal md-effect-3" id="modal-3">
			<div class="login-form-popup lp-border-radius-8">
				<div class="siginincontainer">
					<h1 class="text-center"><?php esc_html_e('Sign in','listingpro'); ?></h1>
					<form id="login" class="form-horizontal margin-top-30"  method="post">
						<p class="status"></p>
						<div class="form-group">
							<label for="username"><?php esc_html_e('Username or Email Address *','listingpro'); ?></label>
							<input type="text" class="form-control" id="username" name="username" />
						</div>
						<div class="form-group">
							<label for="password"><?php esc_html_e('Password *','listingpro'); ?></label>
							<input type="password" class="form-control" id="password" name="password" />
						</div>
						<div class="form-group">
							<div class="checkbox pad-bottom-10">
								<input id="check1" type="checkbox" name="remember" value="price-on-call">
								<label for="check1"><?php esc_html_e('Keep me signed in','listingpro'); ?></label>
							</div>
						</div>
						
						<div class="form-group">
							<input type="submit" value="Sign in" class="lp-secondary-btn width-full btn-first-hover" /> 
						</div>
						<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
					</form>	
					<div class="pop-form-bottom">
						<div class="bottom-links">
							<a  class="signUpClick"><?php esc_html_e('Not a member? Sign up','listingpro'); ?></a>
							<a  class="forgetPasswordClick pull-right" ><?php esc_html_e('Forgot Password','listingpro'); ?></a>
						</div>
						<p class="margin-top-15"><?php esc_html_e('Connect with your Social Network','listingpro'); ?></p>
						<ul class="social-login list-style-none">
							<?php if ( is_plugin_active( "nextend-google-connect/nextend-google-connect.php" ) ) { ?>
								<li>
									<a id="logingoogle" class="google flaticon-googleplus" href="<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1&redirect='+window.location.href; return false;">
										<i class="fa fa-google-plus"></i>
										<span><?php esc_html_e('Google','listingpro'); ?></span>
									</a>
								</li>
							<?php } ?>
							<?php if ( is_plugin_active( "nextend-facebook-connect/nextend-facebook-connect.php" ) ) { ?>
							<li>
								<a id="loginfacebook" class="facebook flaticon-facebook" href="<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;">
									<i class="fa fa-facebook"></i>
									<span><?php esc_html_e('Facebook','listingpro'); ?></span>
								</a>
							</li>
							<?php } ?>
							<?php if ( is_plugin_active( "nextend-twitter-connect/nextend-twitter-connect.php" ) ) { ?>
								<li>
									<a id="logintwitter" class="twitter flaticon-twitter" href="<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1&redirect='+window.location.href; return false;">
										<i class="fa fa-twitter"></i>
										<span><?php esc_html_e('Twitter','listingpro'); ?></span>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				<a class="md-close"><i class="fa fa-close"></i></a>
				</div>
				<div class="siginupcontainer">
					<h1 class="text-center"><?php esc_html_e('Sign Up','listingpro'); ?></h1>
					<form id="register" class="form-horizontal margin-top-30"  method="post">
					<p class="status"></p>
						<div class="form-group">
							<label for="firstname"><?php esc_html_e('Name *','listingpro'); ?></label>
							<input type="text" class="form-control" id="firstname" name="firstname" />
						</div>
						<div class="form-group">
							<label for="username"><?php esc_html_e('Username *','listingpro'); ?></label>
							<input type="text" class="form-control" id="username2" name="username" />
						</div>
						<div class="form-group">
							<label for="password"><?php esc_html_e('Email Address *','listingpro'); ?></label>
							<input type="email" class="form-control" id="email" name="email" />
						</div>
						<div class="form-group">
							<label for="gender"><?php esc_html_e('Gender *','listingpro'); ?></label>
							<select class="form-control" id="gender" name="gender">
								<option value="gender"><?php esc_html_e('Gender','listingpro'); ?></option>
								<option value="male"><?php esc_html_e('Male','listingpro'); ?></option>
								<option value="female"><?php esc_html_e('Female','listingpro'); ?></option>
							</select>
						</div>
						<div class="form-group">
							<label for="country"><?php esc_html_e('Country *','listingpro'); ?></label>
							<input type="text" class="form-control" id="autocomplete" name="country" />
						</div>
						<div class="form-group">
							<p><?php esc_html_e('Password will be e-mailed to you.','listingpro'); ?></p>
						</div>
						<div class="form-group">
							<input type="submit" value="Register" class="lp-secondary-btn width-full btn-first-hover" /> 
						</div>
						<?php wp_nonce_field( 'ajax-register-nonce', 'security' ); ?>
					</form>	
					<div class="pop-form-bottom">
						<div class="bottom-links">
							<a class="signInClick" ><?php esc_html_e('Already have an account? Sign in','listingpro'); ?></a>
							<a class="forgetPasswordClick pull-right" ><?php esc_html_e('Forgot Password','listingpro'); ?></a>
						</div>
						<p class="margin-top-15"><?php esc_html_e('Connect with your Social Network','listingpro'); ?></p>
						<ul class="social-login list-style-none">
							<?php if ( is_plugin_active( "nextend-google-connect/nextend-google-connect.php" ) ) { ?>
								<li>
									<a id="logingoogle" class="google flaticon-googleplus" href="<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1&redirect='+window.location.href; return false;">
										<i class="fa fa-google-plus"></i>
										<span><?php esc_html_e('Google','listingpro'); ?></span>
									</a>
								</li>
							<?php } ?>
							<?php if ( is_plugin_active( "nextend-facebook-connect/nextend-facebook-connect.php" ) ) { ?>
							<li>
								<a id="loginfacebook" class="facebook flaticon-facebook" href="<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;">
									<i class="fa fa-facebook"></i>
									<span><?php esc_html_e('Facebook','listingpro'); ?></span>
								</a>
							</li>
							<?php } ?>
							<?php if ( is_plugin_active( "nextend-twitter-connect/nextend-twitter-connect.php" ) ) { ?>
								<li>
									<a id="logintwitter" class="twitter flaticon-twitter" href="<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1&redirect='+window.location.href; return false;">
										<i class="fa fa-twitter"></i>
										<span><?php esc_html_e('Twitter','listingpro'); ?></span>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				<a class="md-close"><i class="fa fa-close"></i></a>
				</div>
				<div class="forgetpasswordcontainer">
					<h1 class="text-center"><?php esc_html_e('Forgotten Password','listingpro'); ?></h1>
					<form class="form-horizontal margin-top-30"  method="post">
						<div class="form-group">
							<label for="password"><?php esc_html_e('Email Address *','listingpro'); ?></label>
							<input type="email" class="form-control" id="email2" />
						</div>
						<div class="form-group">
							<input type="submit" value="<?php esc_html_e('Get New Password','listingpro'); ?>" class="lp-secondary-btn width-full btn-first-hover" /> 
						</div>
					</form>	
					<div class="pop-form-bottom">
						<div class="bottom-links">
							<a class="cancelClick" ><?php esc_html_e('Cancel','listingpro'); ?></a>
						</div>
					</div>
				<a class="md-close"><i class="fa fa-close"></i></a>
				</div>
			</div>	
		</div>
		
		
		
		
		
		<!-- ../Login Popup -->
		<?php if(is_singular('listing')){ ?>
		<?php 
		
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
				
		?>
		<?php
		$post_id='';
		$post_title='';
		$post_url='';
		$post_author_id='';
		$post_author_meta='';
		$author_nicename='';
		$author_url='';
		
		$post_id = $post->ID;
		$post_title = $post->post_title;
		$post_url = get_permalink($post_id);
		
		$post_author_id= $post->post_author;
		$post_author_meta = get_user_by( 'id', $post_author_id );
		//print_r($post_author_meta);
		$author_nicename = $post_author_meta->user_nicename;
		$author_user_email = $post_author_meta->user_email;
		$author_url = get_author_posts_url( $post_author_id);
		
		

		?>
		<?php
			}
		}
		?>
		
		<!-- Popup Open -->
		<div class="md-modal md-effect-3 single-page-popup" id="modal-6">
			<div class="md-content cotnactowner-box">
				<h3><?php esc_html('Contact Owner', 'listingpro'); ?></h3>
				<div class="">
					<form class="form-horizontal"  method="post" id="contactowner">
						<div class="form-group">
							<input type="text" class="form-control" name="name" id="name" placeholder="Name:" required>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name="email6" id="email6" placeholder="Email:" required>
						</div>
						<div class="form-group">
							<textarea class="form-control" rows="5" name="message1" id="message1" placeholder="Message:"></textarea>
						</div>
						<div class="form-group mr-bottom-0">
							<input type="submit" value="Submit" class="lp-review-btn btn-second-hover">
							<input type="hidden"  name="authoremail" value="<?php echo esc_attr($author_user_email); ?>">
							<input type="hidden" class="form-control" name="post_title" value="<?php echo esc_attr($post_title); ?>">
							<input type="hidden" class="form-control" name="post_url" value="<?php echo esc_attr($post_url); ?>">
							<i class="fa fa-circle-o-notch fa-spin fa-2x formsubmitting"></i>
							<span class="statuss"></span>
						</div>
					</form>	
					<a class="md-close"><i class="fa fa-close"></i></a>
				</div>
			</div>
		</div>
		<!-- Popup Close -->
		<div class="md-modal md-effect-3" id="modal-4">
			<div class="md-content">
				<div id="map"  class="singlebigpost"></div>
				<a class="md-close widget-map-click"><i class="fa fa-close"></i></a>
			</div>
		</div>
		
		<?php } ?>
		<div class="md-overlay"></div> <!-- Overlay for Popup -->