<?php

/*
 * Submit Listing ajax
 *
*/
	
	if (!function_exists('Listingpro_listing_submit_init')) {
		function Listingpro_listing_submit_init(){
			wp_register_script('listingpro-submit-listing', plugins_url( '/assets/js/submit-listing.js', plugin_dir_path( __FILE__ ) ), '', '' ,true ); 
			wp_enqueue_script('listingpro-submit-listing');

			wp_localize_script( 'listingpro-submit-listing', 'ajax_listingpro_submit_object', array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			));
		}
		
	}
	add_action('init', 'Listingpro_listing_submit_init');
	
	/* ================================================================================= */
	add_action('wp_ajax_listingpro_submit_listing_ajax', 'listingpro_submit_listing_ajax');
	add_action('wp_ajax_nopriv_listingpro_submit_listing_ajax', 'listingpro_submit_listing_ajax');
	if(!function_exists('listingpro_submit_listing_ajax')){
		function listingpro_submit_listing_ajax(){
			if ( isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {
				global $listingpro_options;
				$response = '';
				$errors = array();
				if(empty($_POST['postTitle'])){
					$errors['postTitle'] = 'postTitle';
				}
				if(empty($_POST['gAddress'])){
					$errors['gAddress'] = 'gAddress';
				}
				if(empty($_POST['category'])){
					$errors['category'] = 'category';
				}
				if(empty($_POST['location'])){
					$errors['location'] = 'location';
				}
				if(empty($_POST['postContent'])){
					$errors['postContent'] = 'postContent';
				}
				/* PLAN ID */
				$lp_paid_mode = $listingpro_options['enable_paid_submission'];
				$plan_id = 'none';
				if(isset($_POST['plan_id'])){
					$plan_id = $_POST['plan_id'];
				}else{
					$plan_id = 'none';
				}
				if( !empty($errors) && count($errors)>0 ){
					
					die(json_encode(array('response'=>'fail', 'status'=>$errors)));	
				}
				else{
					$postID = '';
					$featuresID = '';
					if(isset($_POST['lp_form_fields_inn'])){
						if(isset($_POST['lp_form_fields_inn']['lp_feature']) && !empty($_POST['lp_form_fields_inn']['lp_feature'])){
							$featuresID = $_POST['lp_form_fields_inn']['lp_feature'];
						}
					}
					
					$tags = '';
					if(isset($_POST['tags']) && !empty($_POST['tags'])){						
						$tags = $_POST['tags'];
						$tags = explode( ',', $tags );
					}
						
					if ( is_user_logged_in() ) {
						$post_information = array(
							'post_title' => esc_attr(strip_tags($_POST['postTitle'])),
							'post_content' => $_POST['postContent'],
							'post_type' => 'listing',
							'tax_input' => array(
								'location' => array($_POST['location']),
								'listing-category' => array( $_POST['category']),
								'features' => $featuresID,
								'list-tags' => $tags,
							),			
						   'post_status' => 'pending'
						);						
						$postID = wp_insert_post( $post_information );
						$current_user = wp_get_current_user();
						$useremail = $current_user->user_email;
						$admin_email = '';
						$admin_email = get_option( 'admin_email' );
						$website_url = site_url();
						$website_name = get_option('blogname');
						$listing_title = get_the_title($postID);
						$listing_url = get_the_permalink($postID);
						
						$headers[] = 'Content-Type: text/html; charset=UTF-8';
						
						/* mail for user */
						$u_mail_subject_a = '';
						$u_mail_body_a = '';
						$u_mail_subject = $listingpro_options['listingpro_subject_new_submit_listing'];
						$u_mail_body = $listingpro_options['listingpro_new_submit_listing_content'];
						
						$u_mail_subject = str_replace('%website_url','%1$s', $u_mail_subject);
						$u_mail_subject = str_replace('%listing_title','%2$s', $u_mail_subject);
						$u_mail_subject = str_replace('%listing_url','%3$s', $u_mail_subject);
						$u_mail_subject = str_replace('%website_name','%4$s', $u_mail_subject);
						$u_mail_subject_a = sprintf( $u_mail_subject,$website_url,$listing_title,$listing_url, $website_name  );
						
						$u_mail_body = str_replace('%website_url','%1$s', $u_mail_body);
						$u_mail_body = str_replace('%listing_title','%2$s', $u_mail_body);
						$u_mail_body = str_replace('%listing_url','%3$s', $u_mail_body);
						$u_mail_body = str_replace('%website_name','%4$s', $u_mail_body);
						$u_mail_body_a = sprintf( $u_mail_body,$website_url,$listing_title,$listing_url,$website_name  );
						wp_mail( $useremail, $u_mail_subject_a, $u_mail_body_a, $headers);
						
						/* mail for admin */
						$a_mail_subject_a = '';
						$a_mail_body_a = '';
						$a_mail_subject = $listingpro_options['listingpro_subject_new_submit_listing_admin'];
						$a_mail_body = $listingpro_options['listingpro_new_submit_listing_content_admin'];
						
						$a_mail_subject = str_replace('%website_url','%1$s', $a_mail_subject);
						$a_mail_subject = str_replace('%listing_title','%2$s', $a_mail_subject);
						$a_mail_subject = str_replace('%listing_url','%3$s', $a_mail_subject);
						$a_mail_subject = str_replace('%website_name','%4$s', $a_mail_subject);
						$a_mail_subject_a = sprintf( $a_mail_subject,$website_url,$listing_title,$listing_url,$website_name  );
						
						$a_mail_body = str_replace('%website_url','%1$s', $a_mail_body);
						$a_mail_body = str_replace('%listing_title','%2$s', $a_mail_body);
						$a_mail_body = str_replace('%listing_url','%3$s', $a_mail_body);
						$a_mail_body = str_replace('%website_name','%4$s', $a_mail_body);
						$a_mail_body_a = sprintf( $a_mail_body,$website_url,$listing_title,$listing_url,$website_name  );
						wp_mail( $admin_email, $a_mail_subject_a, $a_mail_body_a, $headers);
						
						
						$business_hours = $_POST['business_hours'];
						
						$faqs;
						if( isset($_POST['faq']) && isset($_POST['faqans']) ){
							$faqs = array('faq'=>$_POST['faq'],'faqans'=>$_POST['faqans']);
						}
						if(isset($_POST['lp_form_fields_inn'])){
							$metaFields = 'lp_'.strtolower(THEMENAME).'_options_fields';
							$fields = $_POST['lp_form_fields_inn'];		 	
							update_post_meta($postID, $metaFields, $fields);

						} 
						listing_set_metabox('business_hours', $business_hours, $postID);
						listing_set_metabox('price_status', $_POST['price_status'], $postID);
						listing_set_metabox('faqs', $faqs, $postID);
						listing_set_metabox('tagline_text', $_POST['tagline_text'], $postID);
						listing_set_metabox('gAddress', $_POST['gAddress'], $postID);
						listing_set_metabox('latitude', $_POST['latitude'], $postID);
						listing_set_metabox('longitude', $_POST['longitude'], $postID);
						listing_set_metabox('phone', $_POST['phone'], $postID);
						listing_set_metabox('email', $useremail, $postID);
						listing_set_metabox('website', $_POST['website'], $postID);
						listing_set_metabox('twitter', $_POST['twitter'], $postID);
						listing_set_metabox('facebook', $_POST['facebook'], $postID);
						listing_set_metabox('linkedin', $_POST['linkedin'], $postID);
						listing_set_metabox('google_plus', $_POST['google_plus'], $postID);
						listing_set_metabox('youtube', $_POST['youtube'], $postID);
						listing_set_metabox('instagram', $_POST['instagram'], $postID);
						listing_set_metabox('Plan_id', $plan_id, $postID);
						listing_set_metabox('list_price', $_POST['listingprice'], $postID);
						listing_set_metabox('list_price_to', $_POST['listingptext'], $postID);
						listing_set_metabox('video', $_POST['postVideo'], $postID);
						listing_set_metabox('claimed_section', 'not_claimed', $postID);
						
						if ( isset($_FILES["listingfiles"]) ) {
							$files = $_FILES["listingfiles"];  			
							foreach ($files['name'] as $key => $value) { 							
								if ($files['name'][$key]) { 					
									$file = array( 'name' => $files['name'][$key],	 					
									'type' => $files['type'][$key], 						
									'tmp_name' => $files['tmp_name'][$key], 						
									'error' => $files['error'][$key], 						
									'size' => $files['size'][$key] ); 					
									$_FILES = array ("listingfiles" => $file); 					
									$count = 0;					
									foreach ($_FILES as $file => $array) {	
										
										$newupload = listingpro_handle_attachment($file,$postID,$set_thu=true); 
										$ids[] =$newupload;
										$count++;
									}
								}
							}				
							$img_ids = implode(",", $ids);				
							update_post_meta($postID, 'gallery_image_ids', $img_ids);		
						}

						if( $lp_paid_mode == "yes" ){
							listing_draft_save( $postID, null );
						}
						
						$response = get_the_permalink($postID);
						die(json_encode(array('response'=>'success', 'status'=>$response)));
					}
					else{
						$user_email = '';
						$user_name = '';
						$email = $_POST['email'];
						if(empty($email)){
							$errors['email'] = $email;
						}
						
						if( !empty($errors) && count($errors)>0 ){
							
							die(json_encode(array('response'=>'fail', 'status'=>$errors)));	
						}
						$user_name = $_POST['email'];
						if( email_exists($email)==true || username_exists($user_name)==true ){
							$response = '<span class="email-exist-error">email already exists</span>';
							die(json_encode(array('response'=>'failure', 'status'=>$response)));
						}
						else{
							
							$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
							$user_id = wp_create_user( $user_name, $random_password, $email );
							$creds['user_login'] = $user_name;
							$creds['user_password'] = $random_password;
							$creds['remember'] = true;
							$user = wp_signon( $creds, true );
							
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

							$formated_mail_content2 = sprintf( $mail_content2,$website_url,$user_name,$email  );
							
							$from = get_option('admin_email');
							$headers[] = 'Content-Type: text/html; charset=UTF-8';
							
							$headers2[] = 'Content-Type: text/html; charset=UTF-8';
							
							wp_mail( $email, $formated_subject, $formated_mail_content, $headers );
							wp_mail( $from, $subject2, $formated_mail_content2, $headers2 );
				
				

							
							$post_information = array(
								'post_author'=> $user_id,
								'post_title' => esc_attr(strip_tags($_POST['postTitle'])),
								'post_content' => $_POST['postContent'],
								'post_type' => 'listing',									
							   'post_status' => 'pending'
							);							
							$postID = wp_insert_post( $post_information );
							 
							 wp_set_post_terms($postID, $_POST['category'], 'listing-category');
							 wp_set_post_terms($postID, $_POST['location'], 'location');
							 wp_set_post_terms($postID, $featuresID, 'features');
							 wp_set_post_terms($postID, $tags, 'list-tags');
							 
							 
							
							$current_user = wp_get_current_user();
							$useremail = $current_user->user_email;
							$admin_email = '';
							$admin_email = get_option( 'admin_email' );
							$website_url = site_url();
							$website_name = get_option('blogname');
							$listing_title = get_the_title($postID);
							$listing_url = get_the_permalink($postID);
							
							$headers[] = 'Content-Type: text/html; charset=UTF-8';
							
							/* mail for user */
							$u_mail_subject_a = '';
							$u_mail_body_a = '';
							$u_mail_subject = $listingpro_options['listingpro_subject_new_submit_listing'];
							$u_mail_body = $listingpro_options['listingpro_new_submit_listing_content'];
							
							$u_mail_subject = str_replace('%website_url','%1$s', $u_mail_subject);
							$u_mail_subject = str_replace('%listing_title','%2$s', $u_mail_subject);
							$u_mail_subject = str_replace('%listing_url','%3$s', $u_mail_subject);
							$u_mail_subject = str_replace('%website_name','%4$s', $u_mail_subject);
							$u_mail_subject_a = sprintf( $u_mail_subject,$website_url,$listing_title,$listing_url, $website_name  );
							
							$u_mail_body = str_replace('%website_url','%1$s', $u_mail_body);
							$u_mail_body = str_replace('%listing_title','%2$s', $u_mail_body);
							$u_mail_body = str_replace('%listing_url','%3$s', $u_mail_body);
							$u_mail_body = str_replace('%website_name','%4$s', $u_mail_body);
							$u_mail_body_a = sprintf( $u_mail_body,$website_url,$listing_title,$listing_url,$website_name  );
							wp_mail( $useremail, $u_mail_subject_a, $u_mail_body_a, $headers);
						
							/* mail for admin */
							$a_mail_subject_a = '';
							$a_mail_body_a = '';
							$a_mail_subject = $listingpro_options['listingpro_subject_new_submit_listing_admin'];
							$a_mail_body = $listingpro_options['listingpro_new_submit_listing_content_admin'];
							
							$a_mail_subject = str_replace('%website_url','%1$s', $a_mail_subject);
							$a_mail_subject = str_replace('%listing_title','%2$s', $a_mail_subject);
							$a_mail_subject = str_replace('%listing_url','%3$s', $a_mail_subject);
							$a_mail_subject = str_replace('%website_name','%4$s', $a_mail_subject);
							$a_mail_subject_a = sprintf( $a_mail_subject,$website_url,$listing_title,$listing_url,$website_name  );
							
							$a_mail_body = str_replace('%website_url','%1$s', $a_mail_body);
							$a_mail_body = str_replace('%listing_title','%2$s', $a_mail_body);
							$a_mail_body = str_replace('%listing_url','%3$s', $a_mail_body);
							$a_mail_body = str_replace('%website_name','%4$s', $a_mail_body);
							$a_mail_body_a = sprintf( $a_mail_body,$website_url,$listing_title,$listing_url,$website_name  );
							wp_mail( $admin_email, $a_mail_subject_a, $a_mail_body_a, $headers);
							
							$business_hours = $_POST['business_hours'];
							
							$faqs='';
							if( isset($_POST['faq']) && isset($_POST['faqans']) ){
								$faqs = array('faq'=>$_POST['faq'],'faqans'=>$_POST['faqans']);
							}
							if(isset($_POST['lp_form_fields_inn'])){
								$metaFields = 'lp_'.strtolower(THEMENAME).'_options_fields';
								$fields = $_POST['lp_form_fields_inn'];		 	
								update_post_meta($postID, $metaFields, $fields);

							} 
							listing_set_metabox('business_hours', $business_hours, $postID);
							listing_set_metabox('price_status', $_POST['price_status'], $postID);
							listing_set_metabox('faqs', $faqs, $postID);
							listing_set_metabox('tagline_text', $_POST['tagline_text'], $postID);
							listing_set_metabox('gAddress', $_POST['gAddress'], $postID);
							listing_set_metabox('latitude', $_POST['latitude'], $postID);
							listing_set_metabox('longitude', $_POST['longitude'], $postID);
							listing_set_metabox('phone', $_POST['phone'], $postID);
							listing_set_metabox('email', $useremail, $postID);
							listing_set_metabox('website', $_POST['website'], $postID);
							listing_set_metabox('twitter', $_POST['twitter'], $postID);
							listing_set_metabox('facebook', $_POST['facebook'], $postID);
							listing_set_metabox('linkedin', $_POST['linkedin'], $postID);
							listing_set_metabox('google_plus', $_POST['google_plus'], $postID);
							listing_set_metabox('youtube', $_POST['youtube'], $postID);
							listing_set_metabox('instagram', $_POST['instagram'], $postID);
							listing_set_metabox('Plan_id', $plan_id, $postID);
							listing_set_metabox('list_price', $_POST['listingprice'], $postID);
							listing_set_metabox('list_price_to', $_POST['listingptext'], $postID);
							listing_set_metabox('video', $_POST['postVideo'], $postID);
							listing_set_metabox('claimed_section', 'not_claimed', $postID);
							
							if ( isset($_FILES["listingfiles"]) ) {
								$files = $_FILES["listingfiles"];  			
								foreach ($files['name'] as $key => $value) { 							
									if ($files['name'][$key]) { 					
										$file = array( 'name' => $files['name'][$key],	 					
										'type' => $files['type'][$key], 						
										'tmp_name' => $files['tmp_name'][$key], 						
										'error' => $files['error'][$key], 						
										'size' => $files['size'][$key] ); 					
										$_FILES = array ("listingfiles" => $file); 					
										$count = 0;					
										foreach ($_FILES as $file => $array) {												
											$newupload = listingpro_handle_attachment($file,$postID,$set_thu=true); 
											$ids[] =$newupload;
											$count++;
										}
									}
								}
								$img_ids = implode(",", $ids);				
								update_post_meta($postID, 'gallery_image_ids', $img_ids);		
							}

							if( $lp_paid_mode == "yes" ){
								listing_draft_save( $postID, $user_id );
							}
							
							$response = get_the_permalink($postID);
							die(json_encode(array('response'=>'success', 'status'=>$response, 'newuser'=>$user_id )));
							
						}
					}
					
					
				}
			}
			
			
			/* edit post */
			if ( isset( $_POST['edit_nonce_field'] ) && wp_verify_nonce( $_POST['edit_nonce_field'], 'edit_nonce' ) ) {
				
				global $listingpro_options;

				$lp_post ='';
				$form_field ='';
				$faqs ='';
				$faq ='';
				$faqans ='';
				$gAddress ='';
				$latitude ='';
				$longitude ='';
				$phone ='';
				$email ='';
				$website ='';
				$twitter ='';
				$facebook ='';
				$linkedin ='';
				$listingprice ='';
				$listingptext ='';
				$video ='';	
				$lp_post = $_POST['lp_post'];	
				
				$featuresID='';
				if(isset($_POST['lp_form_fields_inn'])){
					if(isset($_POST['lp_form_fields_inn']['lp_feature']) && !empty($_POST['lp_form_fields_inn']['lp_feature'])){
						$featuresID = $_POST['lp_form_fields_inn']['lp_feature'];
					}
				}
				$tags = '';
				if(isset($_POST['tags']) && !empty($_POST['tags'])){						
					$tags = $_POST['tags'];
					$tags = explode( ',', $tags );
				}
				$post_information = array(
					'ID'           => $lp_post,
					'post_title' => esc_attr(strip_tags($_POST['postTitle'])),
					'post_content' => $_POST['postContent'],
					'post_type' => 'listing',
					'tax_input' => array(
						'location' => array($_POST['location']),
						'listing-category' => array( $_POST['category']),
						'features' =>$featuresID,
						'list-tags' =>$tags,
					),       
					'post_status' => 'pending'
				);
				
				wp_update_post( $post_information );
				
				$postID = $lp_post;
				
				
				$business_hours = $_POST['business_hours'];
				$faqs;
				if( isset($_POST['faq']) && isset($_POST['faqans']) ){
					$faqs = array('faq'=>$_POST['faq'],'faqans'=>$_POST['faqans']);
				}

				if(isset($_POST['lp_form_fields_inn'])){
					$metaFields = 'lp_'.strtolower(THEMENAME).'_options_fields';
					$fields = $_POST['lp_form_fields_inn'];		 	
					update_post_meta($postID, $metaFields, $fields);

				} 
				listing_set_metabox('business_hours', $business_hours, $postID);
				listing_set_metabox('price_status', $_POST['price_status'], $postID);
				listing_set_metabox('faqs', $faqs, $postID);
				listing_set_metabox('tagline_text', $_POST['tagline_text'], $postID);
				listing_set_metabox('gAddress', $_POST['gAddress'], $postID);
				listing_set_metabox('latitude', $_POST['latitude'], $postID);
				listing_set_metabox('longitude', $_POST['longitude'], $postID);
				listing_set_metabox('phone', $_POST['phone'], $postID);
				listing_set_metabox('email', $_POST['email'], $postID);
				listing_set_metabox('website', $_POST['website'], $postID);
				listing_set_metabox('twitter', $_POST['twitter'], $postID);
				listing_set_metabox('facebook', $_POST['facebook'], $postID);
				listing_set_metabox('linkedin', $_POST['linkedin'], $postID);
				listing_set_metabox('google_plus', $_POST['google_plus'], $postID);
				listing_set_metabox('youtube', $_POST['youtube'], $postID);
				listing_set_metabox('instagram', $_POST['instagram'], $postID);
				listing_set_metabox('Plan_id', $_POST['plan_id'], $postID);
				listing_set_metabox('list_price', $_POST['listingprice'], $postID);
				listing_set_metabox('list_price_to', $_POST['listingptext'], $postID);
				listing_set_metabox('video', $_POST['postVideo'], $postID);
				listing_set_metabox('claimed_section', 'not_claimed', $postID);
				//update_post_meta($postID, 'gallery_image_ids', $_POST['galleryImages']);
				
				$ids = '';
				if ( isset($_FILES["listingfiles"]) ) {
					$files = $_FILES["listingfiles"];  
					foreach ($files['name'] as $key => $value) { 			
						if ($files['name'][$key]) { 
							$file = array( 
								'name' => $files['name'][$key],
								'type' => $files['type'][$key], 
								'tmp_name' => $files['tmp_name'][$key], 
								'error' => $files['error'][$key],
								'size' => $files['size'][$key]
							); 
							$_FILES = array ("listingfiles" => $file); 
							$count = 0;
							foreach ($_FILES as $file => $array) {				
								$newupload = listingpro_handle_attachment($file,$postID,$set_thu=true); 
								$ids[] =$newupload;
								$count++;
							}
							
						} 
					}					
					if(!empty($ids) && is_array($ids)){
						$galleryImagesIDS = explode( ',', $galleryImagesIDS );
						$result = array_merge($galleryImagesIDS, $ids);
						$img_ids = implode(",", $result);
						update_post_meta($postID, 'gallery_image_ids', $img_ids);
					}					

				}
				
				if (isset($_POST['listImg_remove'])) {
					$removeIDS = $_POST['listImg_remove'];
					$galleryImagesIDS = get_post_meta( $postID, 'gallery_image_ids', true);
					$galleryImagesIDS = explode( ',', $galleryImagesIDS );
					foreach ( $removeIDS as $key->$att_id){						
						unset($galleryImagesIDS[$key]);						
					}
					$fIDS = implode(",", $galleryImagesIDS);
					update_post_meta($postID, 'gallery_image_ids', $fIDS);
				}
				$response = get_the_permalink($postID);
				die(json_encode(array('response'=>'success', 'status'=>$response)));

					
				
			}
			
			
		}	
	}