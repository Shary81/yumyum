<?php
/**
 * Login And Register.
 *
 */
	
	
	/* ============== Listingpro Login/Register  ============ */
	
	if (!function_exists('Listingpro_ajax_login_init')) {
		function Listingpro_ajax_login_init(){
			global $listingpro_options;
			$dashURL = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if($dashURL){
				$dashURL = $dashURL;
			}
			else{
				$dashURL = home_url();
			}

			wp_register_script('ajax-login-script', get_template_directory_uri() . '/assets/js/login.js', array('jquery') ); 
			wp_enqueue_script('ajax-login-script');

			wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'redirecturl' => $dashURL ,
				'loadingmessage' => '<span class="alert alert-info">'.esc_html__('Please wait...','listingpro').'<i class="fa fa-spinner fa-spin"></i></span>',
			));

			// Enable the user with no privileges to run ajax_login() in AJAX
			add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
			
			
			add_action('wp_ajax_ajax_register',        'ajax_register');
			add_action('wp_ajax_nopriv_ajax_register', 'ajax_register');
		}
	}


	// Execute the action only if the user isn't logged in
	if (!is_user_logged_in()) {
		add_action('init', 'Listingpro_ajax_login_init');
	}
	
	
	/* ============== Listingpro Login/Register  ============ */
	
	if (!function_exists('ajax_login')) {
		function ajax_login(){

			// First check the nonce, if it fails the function will break
			check_ajax_referer( 'ajax-login-nonce', 'security' );

			// Nonce is checked, get the POST data and sign user on
			$info = array();
			$info['user_login'] = $_POST['username'];
			$info['user_password'] = $_POST['password'];
			$info['remember'] = true;

			$user_signon = wp_signon( $info, false );
			if ( is_wp_error($user_signon) ){
				echo json_encode(array('loggedin'=>false, 'message'=>'<span class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i>'.esc_html__('Wrong username or password.','listingpro').' </span>'));
			} else {
				echo json_encode(array('loggedin'=>true, 'message'=>'<span class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> '.esc_html__('Login successful, redirecting...','listingpro').'</span>'));
			}

			die();
		}
	}
	
	
	/* ============== Listingpro Login/Register  ============ */
	
	if (!function_exists('ajax_register')) {
		function ajax_register(){
			global $wpdb, $listingpro_options;
			// First check the nonce, if it fails the function will break
			//check_ajax_referer( 'ajax-register-nonce', 'security' );
			
			$first_name = $wpdb->escape($_POST['firstname']);
			$user_name = $wpdb->escape($_POST['username']);
			$user_email = $wpdb->escape($_POST['email']);
			$gender = $wpdb->escape($_POST['gender']);
			$usertype = $wpdb->escape($_POST['usertype']);
			$country = $wpdb->escape($_POST['country']);
			$error = false;
			$note = '';
			$user_id = username_exists( $user_name );
			 
			if ( !$user_id && email_exists($user_email) == false && !empty($user_email) && !empty($user_name) && is_email($user_email) && !empty($first_name) &&  $gender!='gender' && $usertype!='usertype' && !empty($country)) {
				$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
				$user_id = wp_create_user($first_name, $user_name, $random_password, $user_email, $gender, $usertype ,$country );
				
				/* for user */
				$subject = $listingpro_options['listingpro_subject_new_user_register'];
				$website_url = site_url();
				$subject = str_replace('%website_url','%1$s', $subject);
				$formated_subject = sprintf( $subject, $website_url );
				
				$mail_content = $listingpro_options['listingpro_new_user_register'];
				$mail_content = str_replace('%website_url','%1$s', $mail_content);
				$mail_content = str_replace('%user_login_register','%2$s', $mail_content);
				$mail_content = str_replace('%user_pass_register','%3$s', $mail_content);

				$formated_mail_content = sprintf( $mail_content,$website_url,$user_name,$random_password  );
				
				/* for admin */
				
				$subject2 = $listingpro_options['listingpro_subject_admin_new_user_register'];
				
				$mail_content2 = $listingpro_options['listingpro_admin_new_user_register'];
				$mail_content2 = str_replace('%website_url','%1$s', $mail_content2);
				$mail_content2 = str_replace('%user_login_register','%2$s', $mail_content2);
				$mail_content2 = str_replace('%user_email_register','%3$s', $mail_content2);

				$formated_mail_content2 = sprintf( $mail_content2,$website_url,$user_name,$user_email  );
				
				$from = get_option('admin_email');
				$headers[] = 'Content-Type: text/html; charset=UTF-8';
				$headers2[] = 'Content-Type: text/html; charset=UTF-8';
				
				wp_mail( $user_email, $formated_subject, $formated_mail_content, $headers );
				wp_mail( $from, $subject2, $formated_mail_content2, $headers2 );
				 
				

				
			$note = '<span class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> '.esc_html__('Go to your inbox or spam/junk and get your password','listingpro').'</span>';		
			}elseif(email_exists($user_email) == true){
				$error = true;
				$note = '<span class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i>'.esc_html__(' This Email already exists','listingpro').'</span>';
			}elseif(username_exists( $user_name ) == true){
				$error = true;
				$note = '<span class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i>'.esc_html__(' This Username already exists','listingpro').'</span>';
			}elseif(empty($user_email)){
				$error = true;
				$note = '<span class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i>'.esc_html__(' Email field is empty','listingpro').'</span>';
			}elseif(!is_email($user_email)){
				$error = true;
				$note = '<span class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i>'.esc_html__(' Please provide correct email.','listingpro').'</span>';
			}elseif(empty($user_name)){
				$error = true;
				$note = '<span class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i>'.esc_html__(' Username field is empty.','listingpro').'</span>';
			}elseif(empty($first_name)){
				$error = true;
				$note = '<span class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i>'.esc_html__(' Name field is empty.','listingpro').'</span>';
			}elseif($gender == 'gender'){
				$error = true;
				$note = '<span class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i>'.esc_html__(' Please select gender.','listingpro').'</span>';
			}elseif($usertype == 'usertype'){
				$error = true;
				$note = '<span class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i>'.esc_html__(' Please select UserType.','listingpro').'</span>';
			}elseif(empty($country)){
				$error = true;
				$note = '<span class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i>'.esc_html__(' Counry field is empry.','listingpro').'</span>';
			}
															
			if ( $error == true ){
				$final = json_encode(array('register'=>false, 'message'=> $note ));
			} else {
				$final = json_encode(array('register'=>true, 'message'=>$note ));
			} 

			die($final);
			
		}
	}