<?php
/**
 * Claim List
 *
 */

/* ============== ListingPro single ajax Init ============ */
	
	if(!function_exists('Listingpro_single_ajax_init')){
		function Listingpro_single_ajax_init(){
			
			
			wp_register_script('ajax-single-ajax', get_template_directory_uri() . '/assets/js/single-ajax.js', array('jquery') ); 
			 
			wp_enqueue_script('ajax-single-ajax');
			

			wp_localize_script( 'ajax-single-ajax', 'single_ajax_object', array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			));
			
		}
		if(!is_admin()){
			add_action('init', 'Listingpro_single_ajax_init');
		}
	}
	
	
	
	
	/* ============== ListingPro Claim Ajax Process ============ */
	
	add_action('wp_ajax_listingpro_claim_list', 'listingpro_claim_list');
	add_action('wp_ajax_nopriv_listingpro_claim_list', 'listingpro_claim_list');
	if(!function_exists('listingpro_claim_list')){
		function listingpro_claim_list(){
			
			$post_title = '';
			$post_url = '';
			$email1 = '';
			$message = '';
			$author_nicename = '';
			$author_url = '';
			$emailexist = false;
		
			if( isset( $_POST[ 'formData' ] ) ) {
				parse_str( $_POST[ 'formData' ], $formData );
				
				$posttitle = '';
				$name1 = $formData['name1'];
				$post_title = $formData['post_title'];
				$posttitle = esc_html__('Claim for', 'listingpro').' ';
				$posttitle .= $post_title;
				
				$author_email = $formData['author_email'];
				$email1 = $formData['email1'];
				$message = $formData['message'];
				
				$post_id = $formData['post_id'];
				$post_author = get_post_field( 'post_author', $post_id );
				$user = get_user_by( 'id', $post_author );
				$usersname = $user->user_login;
				
				$claimerdetails = '';
				$claimerdetails .= $name1.' : ';
				$claimerdetails .= $email1.' : ';
				$claimerdetails .= $message;
				
				$status = 'pending';
				
				$claim_post = array(
				  'post_title'    => wp_strip_all_tags( $posttitle ),
				  'post_type'   => 'lp-claims',
				  'post_status'   => 'publish',
				);
				 
				$id = wp_insert_post( $claim_post );
				
				$current_user = get_post_field( 'post_author', $id );
				
				listing_set_metabox('details', $claimerdetails, $id);
				listing_set_metabox('claimer', $current_user, $id);
				listing_set_metabox('owner', $usersname, $id);
				listing_set_metabox('claim_status', $status, $id);
				listing_set_metabox('claimed_listing', $post_id, $id);
				
				$result = $id;
				
				echo json_encode(array('state'=>'<span class="alert alert-success">'.esc_html__('Claim has been submitted.','listingpro').'</span>','result'=>$result));
				exit();
			}
			

		}
	}

	/* ============== ListingPro Contact author Process ============ */
	
	
	add_action('wp_ajax_listingpro_contactowner', 'listingpro_contactowner');
	add_action('wp_ajax_nopriv_listingpro_contactowner', 'listingpro_contactowner');
	if(!function_exists('listingpro_contactowner')){
		function listingpro_contactowner(){
			
			$post_id = '';
			$post_title = '';
			$post_url = '';
			$name = '';
			$email = '';
			$phone = '';
			$message = '';
			$authoremail = '';
			$authorID = '';
			$result = '';
			$error = array();
		
			if( isset( $_POST[ 'formData' ] ) ) {
				parse_str( $_POST[ 'formData' ], $formData );
				
				
				$post_id = $formData['post_id'];
				$post_title = get_the_title($post_id);
				$post_url = get_the_permalink($post_id);
				$name1 = $formData['name7'];
				$email = $formData['email7'];
				$phone = $formData['phone'];
				$message = $formData['message7'];
				$authorID = $formData['author_id'];
				$authoremail = $formData['author_email'];
				$SiteTitle = get_bloginfo( 'name' );
				
					
					
				$to = $authoremail;
				$subject =  esc_html__('User Sent A Message From ','listingpro').$SiteTitle.'';
				$body = esc_html__('A person has contacted for following post','listingpro');
				$body .= '<br>';
				$body .= esc_html__('Post Title : ','listingpro').'<a href="'.$post_url.'" target="_blank">'.$post_title.'</a>';
				$body .= '<br>';
				$body .= '<h4>'.esc_html__('Contacted by ','listingpro').'</h4>';
				$body .= esc_html__('Name : ','listingpro').$name1;
				$body .= '<br>';
				$body .= esc_html__('Contact : ','listingpro').$phone;
				$body .= '<br>';
				$body .= esc_html__('Email : ','listingpro').$email;
				$body .= '<br>';
				$body .= $message;
				$headers = "From: " . strip_tags($email) . "\r\n";
				$headers .= "Reply-To: ". strip_tags($email) . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				
				if(empty($email) || empty($message) || empty($name1)){
					$result = 'fail';
					if(empty($email)){
						$error['email'] = $email;
					}
					if(empty($message)){
						$error['message'] = $message;
					}
					if(empty($name1)){
						$error['name7'] = $name1;
					}
					echo json_encode(array('state'=>'<span class="alert alert-danger">'.esc_html__('Oh sorry! something missing','listingpro').'</span>','result'=>$result, 'errors'=>$error));
				}
				else{
					$result = wp_mail( $to, $subject, $body,$headers); 
					if($result==true){
						$leadsCount = '';
						$leadsCount = get_user_meta( $authorID, 'leads_count', true );
						if( isset($leadsCount) ){
							$leadsCount = (int)$leadsCount + 1;
							update_user_meta($authorID, 'leads_count', $leadsCount);
						}
						else{
							$leadsCount = 0;
							update_user_meta($authorID, 'leads_count', $leadsCount);
						}
						
						
						
						
						/* saving activity in wp_options */
						
						$listing_id = $post_id;
						$listingData = get_post($listing_id);
						$authID = $listingData->post_author;
						$currentdate = date("Y-m-d h:i:a");
						$activityData = array();
						$activityData = array( array(
							'type'	=>	'lead',
							'actor'	=>	$name1,
							'reviewer'	=>	'',
							'listing'	=>	$listing_id,
							'rating'	=>	'',
							'time'	=>	$currentdate
						));
						
						$updatedActivitiesData = array();
						
						$lp_recent_activities = get_option( 'lp_recent_activities' );
						if( $lp_recent_activities!=false ){
							
							$existingActivitiesData = get_option( 'lp_recent_activities' );
							if (array_key_exists($authID, $existingActivitiesData)) {
								$currenctActivityData = $existingActivitiesData[$authID];
								if(count($currenctActivityData)>=20){
									$currenctActivityData = array_slice($currenctActivityData,1,20);
									$updatedActivityData = array_merge($currenctActivityData,$activityData);
								}
								else{
									$updatedActivityData = array_merge($currenctActivityData,$activityData);
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
						
						
						
						
						
						
						echo json_encode(array('state'=>'<span class="alert alert-success">'.esc_html__('Email has been sent.','listingpro').'</span>','result'=>$result, 'errors'=>$error));
						
					}
					else{
						echo json_encode(array('state'=>'<span class="alert alert-danger">'.esc_html__('Something went wrong.','listingpro').'</span>','result'=>$result, 'errors'=>$error));
						
						

					}
					
					
				}
			}
			exit();
		}
	}