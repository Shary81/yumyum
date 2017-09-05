<?php 
get_header(); 
if(is_user_logged_in()){
   wp_redirect ('profile');
}

?>
<body class="landing-page">

<div class="content-bg-wrap">
	<div class="content-bg"></div>
</div>


<!-- Landing Header -->

<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12">
			<div id="site-header-landing" class="header-landing">
				<a href="02-ProfilePage.html" class="logo">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="Olympus">
					<h5 class="logo-title">CitMeal</h5>
				</a>

				<ul class="profile-menu">
					<li>
						<a href="#">About Us</a>
					</li>
					<li>
						<a href="#">Careers</a>
					</li>
					<li>
						<a href="#">FAQS</a>
					</li>
					<li>
						<a href="#">Help & Support</a>
					</li>
					<li>
						<a href="#" class="js-expanded-menu">
							<svg class="olymp-menu-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-menu-icon"></use></svg>
							<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- ... end Landing Header -->

<!-- Login-Registration Form  -->

<div class="container">
	<div class="row display-flex">
		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<div class="landing-content">
				<h1>Lorem Ipsum</h1>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
				</p>
				<a href="#" class="btn btn-md btn-border c-white">Register Now!</a>
			</div>
		</div>

		<div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<div class="registration-login-form">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home" role="tab">
							<svg class="olymp-login-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-login-icon"></use></svg>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#profile" role="tab">
							<svg class="olymp-register-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-register-icon"></use></svg>
						</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Register to Meal Punk</div>
						<form id="register" class="content">
							<p class="status"></p>
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<div class="form-group label-floating is-empty" style="margin-top:20px;">
										<label for="firstname" class="control-label" >Name</label>
										<input id="firstname" name="firstname" class="form-control" placeholder="" type="text">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group label-floating is-empty" style="margin-top:20px;">
										<label for="username" class="control-label">Username</label>
										<input id="username2" name="username" class="form-control" placeholder="" type="text">
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="form-group label-floating is-empty">
										<label for="email" class="control-label">Your Emai </label>
										<input id="email" name="email" class="form-control" placeholder="" type="email">
									</div>
									

									
									<div class="form-group label-floating is-select">
										<select name="gender" id="gender" class="selectpicker form-control" size="auto">
											<option value="gender">Gender</option>
											<option value="male">Male</option>
											<option value="female">Female</option>
										</select>
									</div>
									<div class="form-group label-floating is-select">
										<select name="usertype" id="usertype" class="selectpicker form-control" size="auto">
											<option value="usertype">User Type</option>
											<option value="host">Host</option>
											<option value="guest">Guest</option>
										</select>
									</div>
									<div class="form-group">
										<label for="country">Country *</label>
										<input type="text" class="form-control" id="autocomplete" name="country" />
									</div>
									<div class="form-group">
										<p>Password will be e-mailed to you.</p>
									</div>
									<div class="remember">
										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox">
												I accept the <a href="#">Terms and Conditions</a> of the website
											</label>
										</div>
									</div>
								<!--	<button style="width:308px; height:50px;color:white;
									background-color:orange; border-radius:6px;border:0;">Quality Documents Verifications</button>
								
								 <button style="width:308px; height:50px;color:white; background-color:black; margin-top:10px; border-radius:6px; border:0;">Place Verifications</button>
									-->
									<input style="margin-top:10px;" type="submit" value="Register" class="btn btn-purple btn-lg full-width" />
									<?php if ( is_plugin_active( "nextend-facebook-connect/nextend-facebook-connect.php" ) ) { ?>
									<a href="<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-facebook" aria-hidden="true"></i>Login with Facebook</a>
									<?php } ?>


									<?php if ( is_plugin_active( "nextend-twitter-connect/nextend-twitter-connect.php" ) ) { ?>
									<a href="<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1&redirect='+window.location.href; return false;" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter" aria-hidden="true"></i>Login with Twitter</a>
									<?php } ?>
									<?php if ( is_plugin_active( "nextend-google-connect/nextend-google-connect.php" ) ) { ?>
									<a href="<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1&redirect='+window.location.href; return false;" class="btn btn-lg bg-gmail-plus full-width btn-icon-left" style="background-color: red;"><i class="fa fa-google-plus" aria-hidden="true"></i>

Login with Gmail</a>
									<?php } ?>
								</div>
							</div>
							<?php wp_nonce_field( 'ajax-register-nonce', 'security' ); ?>
						</form>
					</div>

					<div class="tab-pane" id="profile" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Login to your Account</div>
						<form method="post" id="login" class="content">
							<p class="status" style="font-size:10px;" ></p>
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="form-group label-floating is-empty" style="margin-top:20px;">
										<label class="control-label">Username or Email Address *</label>
										<input class="form-control" placeholder="" type="text" id="username" name="username">
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Password*</label>
										<input id="password" name="password" class="form-control" placeholder="" type="password">
									</div>

									<div class="remember">

										<div class="checkbox">
											<label for="check1">
												<input id="check1" name="remember" type="checkbox" value="price-on-call">
												Remember Me
											</label>
										</div>
										<!--<a role="tab" data-toggle="tab" class="nav-link" href="#forgotten" class="forgot" aria-expanded="false">Forgot my Password</a>-->
									</div>

									<input type="submit" class="btn btn-lg btn-primary full-width" value="Login" />
									<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
									<div class="or"></div>
									<?php if ( is_plugin_active( "nextend-facebook-connect/nextend-facebook-connect.php" ) ) { ?>
									<a id="loginfacebook" href="<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-facebook" aria-hidden="true"></i>Login with Facebook</a>
									<?php } ?>
									<?php if ( is_plugin_active( "nextend-twitter-connect/nextend-twitter-connect.php" ) ) { ?>
									<a href="<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1&redirect='+window.location.href; return false;" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter" aria-hidden="true"></i>Login with Twitter</a>
									<?php } ?>
									<?php if ( is_plugin_active( "nextend-google-connect/nextend-google-connect.php" ) ) { ?>
									<a href="<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1&redirect='+window.location.href; return false;" class="btn btn-lg bg-gmail-plus full-width btn-icon-left" style="background-color: red;"><i class="fa fa-google-plus" aria-hidden="true"></i>

									Login with Gmail</a>
									<?php } ?>
								</div>
							</div>
						</form>
					</div>
					
					<div class="tab-pane" id="forgotten" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Forgotten Password</div>
						<form method="post" id="forgot" class="content">
							<p class="status"></p>
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Email Address *</label>
										<input class="form-control" placeholder="" type="text" id="email2" name="email2">
									</div>
									<div class="form-group">
										<input type="submit" value="Get New Password" class="btn btn-lg btn-primary full-width" /> 
									</div>
								</div>
							</div>
						</form>
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>