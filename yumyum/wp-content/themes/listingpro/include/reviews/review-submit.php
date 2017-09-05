<?php

	if (!function_exists('Listingpro_review_submit_init')) {
		function Listingpro_review_submit_init(){
			
			global $listingpro_options;
			$dashURL = $listingpro_options['listing-author'];
			if($dashURL){
				$dashURL = $dashURL;
			}
			else{
				$dashURL = home_url();
			}

			wp_register_script('review-submit-ajax', get_template_directory_uri() . '/assets/js/review-submit.js', array('jquery') ); 
			wp_enqueue_script('review-submit-ajax');

			wp_localize_script( 'review-submit-ajax', 'ajax_review_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

			
			
		}
	}


	// Execute the action only if the user is logged in
	//if (is_user_logged_in()) {
		add_action('wp_enqueue_scripts', 'Listingpro_review_submit_init');
	//}
	
	add_action('wp_ajax_ajax_review_submit',        'ajax_review_submit');
	add_action('wp_ajax_nopriv_ajax_review_submit', 'ajax_review_submit');
	
	if(!function_exists('ajax_review_submit')){
		function ajax_review_submit(){
				
				$listing_id = $_POST['comment_post_ID'];
				$title = $_POST['post_title'];
				$description = $_POST['post_description'];
				$rating = $_POST['rating'];
				$user_email = '';
				$postID = '';
				$post_information = array();
				
				if ( is_user_logged_in() ) {
					$post_information = array(
						'post_title' => esc_attr(strip_tags( $title )),
						'post_content' => $description,
						'post_type' => 'lp-reviews',
						'post_status' => 'publish'
					);
				$postID = wp_insert_post( $post_information );
				}
				else{
					$user_email = $_POST['u_mail'];
					if( email_exists($user_email)==true ){
						$res = json_encode(array('reviewID'=>$postID, 'status'=>'Email already exist! Please login or change email', 'error'=>'email'));
						die($res);
					}
					else{
						$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
						list($user_name) = explode('@', $user_email);
						$user_name .=rand(1,100);
						$user_id = wp_create_user( $user_name, $random_password, $user_email );
						$creds['user_login'] = $user_name;
						$creds['user_password'] = $random_password;
						$creds['remember'] = true;
						$user = wp_signon( $creds, true );
						
						
						$post_information = array(
							'post_author'=> $user_id,
							'post_title' => esc_attr(strip_tags( $title )),
							'post_content' => $description,
							'post_type' => 'lp-reviews',
							'post_status' => 'publish'
						);
						$postID = wp_insert_post( $post_information );
						
						$current_user = wp_get_current_user();
							$useremail = $current_user->user_email;
							$admin_email = '';
							$admin_email = get_option( 'admin_email' );
							$website_url = site_url();
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
							
							
					}
				}
				
				
				
				
				

				listing_set_metabox('rating', $rating, $postID);
				listing_set_metabox('listing_id', $listing_id, $postID);
				
				$action = 'add';
				listingpro_set_listing_ratings($postID, $listing_id , $rating , $action);
				
				listingpro_total_reviews_add($listing_id);

				if ( !empty($_FILES['post_gallery']) ) {
					$ids = array();
					$files = $_FILES['post_gallery'];  			
					foreach ($files['name'] as $key => $value) { 							
						if ($files['name'][$key]) { 					
							$file = array(
								'name' => $files['name'][$key],	 					
								'type' => $files['type'][$key], 						
								'tmp_name' => $files['tmp_name'][$key], 						
								'error' => $files['error'][$key], 						
								'size' => $files['size'][$key]
							); 					
							$_FILES = array ("post_gallery" => $file); 					
							$count = 0;					
							foreach ($_FILES as $file => $array) {
								$newupload = listingpro_handle_attachment($file,$postID,$set_thu=false); 									 $ids[] =$newupload;									  $count++;					
							}
						}
					}
					if( is_array($ids) && count($ids)>0 ){
						$img_ids = implode(",", $ids);
						update_post_meta($postID, 'gallery_image_ids', $img_ids);
						
					}
				}
				$dataRes = array();
				$dataRes['reviewid']= $postID;
				$dataRes['status']= 'Review has been submitted successfully';
				$res = json_encode(array('reviewID'=>$postID, 'status'=>'Review has been submitted successfully'));
				
				/* saving activity in wp_options */
						
						$reviewData = get_post($postID);
						$reviewerID = $reviewData->post_author;
						
						$listingData = get_post($listing_id);
						$authID = $listingData->post_author;
						$currentdate = date("Y-m-d h:i:a");
						$activityData = array();
						$activityData = array( array(
							'type'	=>	'review',
							'actor'	=>	get_the_author_meta('user_login',$reviewerID),
							'reviewer'	=>	'',
							'listing'	=>	$listing_id,
							'rating'	=>	$rating,
							'time'	=>	$currentdate
						));
						
						$updatedActivitiesData = array();
						
						$lp_recent_activities = get_option( 'lp_recent_activities' );
						if( $lp_recent_activities!=false ){
							
							$existingActivitiesData = get_option( 'lp_recent_activities' );
							if (array_key_exists($authID, $existingActivitiesData)) {
								$currenctActivityData = $existingActivitiesData[$authID];
								
								if(!empty($currenctActivityData)){
									if(count($currenctActivityData)>=20){
									$currenctActivityData =	array_slice($currenctActivityData,1,20);
										$updatedActivityData = array_merge($currenctActivityData,$activityData);
									}
									else{
										$updatedActivityData = array_merge($currenctActivityData,$activityData);
									}
								}
								
								$updatedActivityData = array_merge($currenctActivityData,$activityData);
								$existingActivitiesData[$authID] = $updatedActivityData;
							}
							else{
								$existingActivitiesData[$authID] = $activityData;
							}
							$updatedActivitiesData = $existingActivitiesData;
						}
						else{
							$updatedActivitiesData[$authID] = $activityData;
						}
						update_option( 'lp_recent_activities', $updatedActivitiesData );
				
				die($res);
		}
	}
	
	
	/* by zaheer on 16 march */
	add_action('wp_ajax_lp_reviews_interests',        'lp_reviews_interests');
	add_action('wp_ajax_nopriv_lp_reviews_interests', 'lp_reviews_interests');
	
	if(!function_exists('lp_reviews_interests')){
		function lp_reviews_interests(){
			$newScore = '';
			$currentScore = '';
			$reviewID = '';
			$reviewID = $_POST['id'];
			$currentScore = $_POST['interest'];
			$restype = $_POST['restype'];
			
			if(!empty($currentScore)){
				$currentScore++;
			}
			else{
				$currentScore = 1;
			}
			$key = 'review_'.$restype;
			listing_set_metabox($key, $currentScore, $reviewID);
			$newScore = listing_get_metabox_by_ID($key, $reviewID);
			
			/* saving activity in wp_options */
			$reviewData = get_post($reviewID);
			$reviewerID = $reviewData->post_author;
			
			$listing_id = listing_get_metabox_by_ID('listing_id', $reviewID);
			$listingData = get_post($listing_id);
			$authID = $listingData->post_author;
			$currentdate = date("Y-m-d h:i:a");
			$activityData = array();
			$activityData = array( array(
				'type'	=>	'reaction',
				'actor'	=>	'',
				'reviewer'	=>	$reviewerID,
				'listing'	=>	$listing_id,
				'rating'	=>	$restype,
				'time'	=>	$currentdate
			));
			
			$updatedActivitiesData = array();
			
			$lp_recent_activities = get_option( 'lp_recent_activities' );
			if( $lp_recent_activities!=false ){
				
				$existingActivitiesData = get_option( 'lp_recent_activities' );
				if (array_key_exists($authID, $existingActivitiesData)) {
					$currenctActivityData = $existingActivitiesData[$authID];
					if(!empty($currenctActivityData)){
						if(count($currenctActivityData)>=20){
						$currenctActivityData =	array_slice($currenctActivityData,1,20);
							$updatedActivityData = array_merge($currenctActivityData,$activityData);
						}
						else{
							$updatedActivityData = array_merge($currenctActivityData,$activityData);
						}
					}
					$existingActivitiesData[$authID] = $updatedActivityData;
				}
				else{
					$existingActivitiesData[$authID] = $activityData;
				}
				$updatedActivitiesData = $existingActivitiesData;
			}
			else{
				$updatedActivitiesData[$authID] = $activityData;
			}
			update_option( 'lp_recent_activities', $updatedActivitiesData );
			
			$response ='';
			$response = json_encode(array('id'=>$reviewID, 'newScore'=>$newScore));
			die($response);
		}
	}
	/* end by zaheer on 16 march */
		
?>