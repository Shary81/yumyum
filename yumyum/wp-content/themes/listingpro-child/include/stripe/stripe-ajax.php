<?php
	add_action('wp_ajax_listingpro_save_stripe', 'listingpro_save_stripe');
	add_action('wp_ajax_nopriv_listingpro_save_stripe', 'listingpro_save_stripe');
	
	if(!function_exists('listingpro_save_stripe')){
		function listingpro_save_stripe(){
			global $wpdb, $listingpro_options;
			$dbprefix = '';
			$dbprefix = $wpdb->prefix;
			
			$paypal_success = $listingpro_options['payment_success'];
			$paypal_success = get_permalink($paypal_success);
			$token = $_POST['token'];
			$email = $_POST['email'];
			$planID = $_POST['plan'];
			$listing = $_POST['listing'];
			$listing_title = get_the_title($listing);
			
			$status = 'success';
			$method = 'stripe';
			$currency = '';
			$currency = $listingpro_options['currency_paid_submission'];
			
			
			
			$my_post = array( 'ID' => $listing, 'post_status'   => 'publish' );
			wp_update_post( $my_post );
			
			$thepost = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM ".$dbprefix."listing_orders WHERE post_id = %d", $listing ) );
		  
			$current_user = wp_get_current_user();
			$useremail = $current_user->user_email;
			$admin_email = '';
			$admin_email = get_option( 'admin_email' );
			
			$listing_id = $listing;
			$listing_title = get_the_title($listing);
			$invoice_no = $thepost->order_id;
			
			$date = date('d-m-Y');

			$update_data = array('currency' => $currency,
							   'date' => $date,
							   'status' => $status,
							   'description' => 'listing has been purchased',
							   'payment_method' => $method,
							   'summary' => $status,
							   'token' => $token);

			$where = array('post_id' => $listing_id);

			$update_format = array('%s', '%s', '%s', '%s', '%s', '%s');

			$wpdb->update($dbprefix.'listing_orders', $update_data, $where, $update_format);
			
			
			$packageResult = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM ".$dbprefix."listing_orders WHERE post_id = %d", $listing ) );
			$planID = $packageResult->plan_id;
			$planUsed = $packageResult->used;
			
			$allowedPosts = '';
			$allowedPosts = get_post_meta($planID, 'plan_text' ,true);
			
			$update_data = array('used' => '1', 'transaction_id' => $token, 'status' => $status);
	  
			$where = array('token' => $token);
			  
			$update_format = array('%s', '%s', '%s');
			  
			$wpdb->update($dbprefix.'listing_orders', $update_data, $where, $update_format);
			
			if(!empty($allowedPosts) && $allowedPosts=="1"){
				$update_status = array('status' => 'expired');
				$wheree = array('plan_id' => $planID);
				$update_formatt = array('%s');
				$wpdb->update($dbprefix.'listing_orders', $update_status, $wheree, $update_formatt);
			}
			
			$current_user = wp_get_current_user();
			$useremail = $current_user->user_email;
			$admin_email = '';
			$admin_email = get_option( 'admin_email' );
			
			$listing_title = get_the_title($listing);
			$invoice_no = $thepost->order_id;
			$payment_method = $method;
			
			$plan_title = $thepost->plan_name;
			$plan_price = $thepost->price.$thepost->currency;
			$listing_url = get_the_permalink($listing);
			
			//to admin
			$mail_subject = $listingpro_options['listingpro_subject_purchase_activated_admin'];
			$website_url = site_url();
			$website_name = get_option('blogname');
			$mail_subject = str_replace('%website_url','%1$s', $mail_subject);
			$mail_subject = str_replace('%website_name','%2$s', $mail_subject);
			$formated_mail_subject = sprintf( $mail_subject,$website_url, $website_name );


			$mail_content = $listingpro_options['listingpro_content_purchase_activated_admin'];
			$mail_content = str_replace('%website_url','%1$s', $mail_content);
			$mail_content = str_replace('%listing_title','%2$s', $mail_content);
			$mail_content = str_replace('%plan_title','%3$s', $mail_content);
			$mail_content = str_replace('%plan_price','%4$s', $mail_content);
			$mail_content = str_replace('%listing_url','%5$s', $mail_content);
			$mail_content = str_replace('%invoice_no','%6$s', $mail_content);
			$mail_content = str_replace('%website_name','%7$s', $mail_content);
			$mail_content = str_replace('%payment_method','%8$s', $mail_content);

			$formated_mail_content = sprintf( $mail_content,$website_url,$listing_title,$plan_title,$plan_price,$listing_url,$invoice_no, $website_name, $payment_method  );
			
			$headers1[] = 'Content-Type: text/html; charset=UTF-8';
			wp_mail( $admin_email, $formated_mail_subject, $formated_mail_content, $headers1);
			// to user
			
			$mail_subject2 = $listingpro_options['listingpro_subject_purchase_activated'];
			$website_url = site_url();
			$mail_subject2 = str_replace('%website_url','%1$s', $mail_subject2);
			$mail_subject2 = str_replace('%website_name','%2$s', $mail_subject2);
			$formated_mail_subject2 = sprintf( $mail_subject2,$website_url,$website_name );

			$mail_content2 = $listingpro_options['listingpro_content_purchase_activated'];
			$mail_content2 = str_replace('%website_url','%1$s', $mail_content2);
			$mail_content2 = str_replace('%listing_title','%2$s', $mail_content2);
			$mail_content2 = str_replace('%plan_title','%3$s', $mail_content2);
			$mail_content2 = str_replace('%plan_price','%4$s', $mail_content2);
			$mail_content2 = str_replace('%listing_url','%5$s', $mail_content2);
			$mail_content2 = str_replace('%invoice_no','%6$s', $mail_content2);
			$mail_content2 = str_replace('%website_name','%7$s', $mail_content2);
			$mail_content2 = str_replace('%payment_method','%8$s', $mail_content2);

			$formated_mail_content2 = sprintf( $mail_content2,$website_url,$listing_title,$plan_title,$plan_price, $listing_url, $invoice_no, $website_name, $payment_method  );

			$headers[] = 'Content-Type: text/html; charset=UTF-8';
			wp_mail( $useremail, $formated_mail_subject2, $formated_mail_content2, $headers);
			
			
			$response = '';
			$response = json_encode(array('token'=>$token, 'email'=>$email, 'listing'=>$listing, 'redirect'=>$paypal_success));
			
			die($response);
		
		}
	}
	
	/*======================================= campaign data saved =======================*/
	
	add_action('wp_ajax_listingpro_save_package_stripe', 'listingpro_save_package_stripe');
	add_action('wp_ajax_nopriv_listingpro_save_package_stripe', 'listingpro_save_package_stripe');
	
	if(!function_exists('listingpro_save_package_stripe')){
		function listingpro_save_package_stripe(){
			global $wpdb, $listingpro_options;
			$dbprefix = '';
			$dbprefix = $wpdb->prefix;
			$paypal_success = $listingpro_options['payment_success'];
			$paypal_success = get_permalink($paypal_success);
			$response = '';
			$token = '';
			$status = 'success';
			$email = '';
			$listing_id = $_POST['listing'];
			$token = $_POST['token'];
			$email = $_POST['email'];
			
			$price_packages = $_POST['packages'];
				$ads_durations = $listingpro_options['listings_ads_durations'];
				
			  
				$currentdate = date("d-m-Y");
				$exprityDate = date('Y-m-d', strtotime($currentdate. ' + '.$ads_durations.' days'));
				$exprityDate = date('d-m-Y', strtotime( $exprityDate ));
				
				
				$my_post = array(
					'post_title'    => $listing_id,
					'post_status'   => 'publish',
					'post_type' => 'lp-ads',
				);
				$adID = wp_insert_post( $my_post );
				
				listing_set_metabox('ads_listing', $listing_id, $adID);
				
				listing_set_metabox('ad_status', 'Active', $adID);
				listing_set_metabox('ad_date', $currentdate, $adID);
				listing_set_metabox('ad_expiryDate', $exprityDate, $adID);
				
				listing_set_metabox('campaign_id', $adID, $listing_id);
				update_post_meta( $listing_id, 'campaign_status', 'active' );
				
				$priceKeyArray;
				if( !empty($price_packages) ){
					foreach( $price_packages as $val ){
						$priceKeyArray[] = $val;
						update_post_meta( $listing_id, $val, 'active' );
					}
				}
				
				if( !empty($priceKeyArray) ){
					
					listing_set_metabox('ad_type', $priceKeyArray, $adID);
				}
				
				$tID = $token;
				$token = $token;
				$payment_method = 'stripe';
				
				lp_save_campaign_data($adID, $tID, $payment_method, $token, $status);
				$response = json_encode(array('token'=>$token, 'email'=>$email, 'listing'=>$listing_id, 'redirect'=>$paypal_success));
			
			die($response);
		}
	}
	
?>