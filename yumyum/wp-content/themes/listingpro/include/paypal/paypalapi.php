<?php
//session_start();

/**
 * PayPal API
 */
if ( ! class_exists('wp_PayPalAPI') ) {

  class wp_PayPalAPI {
  
    /**
     * Start express checkout
     */
    function StartExpressCheckout() {

      global $listingpro_options; 
      $paypal_api_environment = $listingpro_options['paypal_api'];
      $paypal_success = $listingpro_options['payment_success'];
	  $paypal_success = get_permalink($paypal_success);
      $paypal_fail = $listingpro_options['payment_fail'];
      $paypal_fail = get_permalink($paypal_fail);
      $paypal_api_username = $listingpro_options['paypal_api_username'];
      $paypal_api_password = $listingpro_options['paypal_api_password'];
      $paypal_api_signature = $listingpro_options['paypal_api_signature'];
	  $currency_code = $listingpro_options['currency_paid_submission'];
      
      if ( $paypal_api_environment != 'sandbox' && $paypal_api_environment != 'live' )
        trigger_error('Environment does not defined! Please define it at the plugin configuration page!', E_USER_ERROR);
      
      /*if ( $paypal_fail === FALSE || ! is_numeric($paypal_fail) )
        trigger_error('Cancel page not defined! Please define it at the plugin configuration page!', E_USER_ERROR);
      
      if ( $paypal_success === FALSE || ! is_numeric($paypal_success) )
        trigger_error('Success page not defined! Please define it at the plugin configuration page!', E_USER_ERROR);*/
	
	  global $plan_price, $post_id;
	  
	  $PAYMENTREQUEST_0_DESC = 'payment description goes here';
	  $AMT = $plan_price;
	  
	  $CURRENCYCODE = $currency_code;
	  
      /* global $wpdb;
      $result = $wpdb->get_results( "SELECT * FROM wp_url" );

      foreach ( $result as $info ) {
        $url = $info->url;
      } */
	  $url = get_template_directory_uri();
      
      // FIELDS
      $fields = array(
              'USER' => urlencode($paypal_api_username),
              'PWD' => urlencode($paypal_api_password),
              'SIGNATURE' => urlencode($paypal_api_signature),
              'VERSION' => urlencode('72.0'),
              'PAYMENTREQUEST_0_PAYMENTACTION' => urlencode('Sale'),
              'PAYMENTREQUEST_0_AMT0' => urlencode($AMT),
              'PAYMENTREQUEST_0_CUSTOM' => urlencode($post_id),
              'PAYMENTREQUEST_0_AMT' => urlencode($AMT),
              'PAYMENTREQUEST_0_ITEMAMT' => urlencode($AMT),
              'ITEMAMT' => urlencode($AMT),
              'PAYMENTREQUEST_0_CURRENCYCODE' => urlencode($CURRENCYCODE),
              'RETURNURL' => urlencode( $url.'/include/paypal/form-handler.php?func=confirm'),
              'CANCELURL' => urlencode($paypal_fail),
              'METHOD' => urlencode('SetExpressCheckout'),
              'POSTID' => urlencode('postid')
          );

      $fields['PAYMENTREQUEST_0_CUSTOM'] = $post_id;
      
      if ( isset($PAYMENTREQUEST_0_DESC) )
        $fields['PAYMENTREQUEST_0_DESC'] = $PAYMENTREQUEST_0_DESC;
      
      if ( isset($paypal_success) )
        $_SESSION['RETURN_URL'] = $paypal_success;
      
      if ( isset($paypal_fail) )
        $fields['CANCELURL'] = $paypal_fail;
      
      $fields['PAYMENTREQUEST_0_QTY0'] = 1;
      $fields['PAYMENTREQUEST_0_AMT'] = $fields['PAYMENTREQUEST_0_AMT'];
      
      
      if ( isset($_POST['TAXAMT']) ) {
        $fields['PAYMENTREQUEST_0_TAXAMT'] = $_POST['TAXAMT'];
        $fields['PAYMENTREQUEST_0_AMT'] += $_POST['TAXAMT'];
      }
      
            
      if ( isset($_POST['HANDLINGAMT']) ) {
        $fields['PAYMENTREQUEST_0_HANDLINGAMT'] = $_POST['HANDLINGAMT'];
        $fields['PAYMENTREQUEST_0_AMT'] += $_POST['HANDLINGAMT'];
      }
            
      if ( isset($_POST['SHIPPINGAMT']) ) {
        $fields['PAYMENTREQUEST_0_SHIPPINGAMT'] = $_POST['SHIPPINGAMT'];
        $fields['PAYMENTREQUEST_0_AMT'] += $_POST['SHIPPINGAMT'];
      }
      
      $fields_string = '';

      foreach ( $fields as $key => $value ) 
        $fields_string .= $key.'='.$value.'&';
        
      rtrim($fields_string,'&');
      
      // CURL
      $ch = curl_init();
      
      if ( $paypal_api_environment == 'sandbox' )
        curl_setopt($ch, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
      elseif ( $paypal_api_environment == 'live' )
        curl_setopt($ch, CURLOPT_URL, 'https://api-3t.paypal.com/nvp');
        
      curl_setopt($ch, CURLOPT_POST, count($fields));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
		curl_setopt($ch, CURLOPT_SSLVERSION, 6); //6 is for TLSV1.2
      
      //execute post
      $result = curl_exec($ch);
      
      //close connection
      curl_close($ch);
      
      parse_str($result, $result);
      
      if ( $result['ACK'] == 'Success' ) {
        
        if ( $paypal_api_environment == 'sandbox' )
          header('Location: https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token='.$result['TOKEN']);
        elseif ( $paypal_api_environment == 'live' )
          header('Location: https://www.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token='.$result['TOKEN']);
        exit;
        
      } else {
        print_r($result);
      }
      
    }
    
    /**
     * Validate payment
     */
    function ConfirmExpressCheckout() {
    
      global $listingpro_options; 
      $paypal_api_environment = $listingpro_options['paypal_api'];
      $paypal_success = $listingpro_options['payment_success'];
	  $paypal_success = get_permalink($paypal_success);
      $paypal_fail = $listingpro_options['payment_fail'];
      $paypal_fail = get_permalink($paypal_fail);
      $paypal_api_username = $listingpro_options['paypal_api_username'];
      $paypal_api_password = $listingpro_options['paypal_api_password'];
      $paypal_api_signature = $listingpro_options['paypal_api_signature'];
      
      // FIELDS
      $fields = array(
              'USER' => urlencode($paypal_api_username),
              'PWD' => urlencode($paypal_api_password),
              'SIGNATURE' => urlencode($paypal_api_signature),
			  'PAYMENTREQUEST_0_PAYMENTACTION' => urlencode('Sale'),
              'VERSION' => urlencode('72.0'),
              'TOKEN' => urlencode($_GET['token']),
              'METHOD' => urlencode('GetExpressCheckoutDetails')
          );
      
      $fields_string = '';
      foreach ( $fields as $key => $value )
        $fields_string .= $key.'='.$value.'&';
      rtrim($fields_string,'&');
      
      // CURL
      $ch = curl_init();
      
      if ( $paypal_api_environment == 'sandbox' )
        curl_setopt($ch, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
      elseif ( $paypal_api_environment == 'live' )
        curl_setopt($ch, CURLOPT_URL, 'https://api-3t.paypal.com/nvp');
        
      curl_setopt($ch, CURLOPT_POST, count($fields));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
		curl_setopt($ch, CURLOPT_SSLVERSION, 6); //6 is for TLSV1.2
      
      //execute post
      $result = curl_exec($ch);
      //close connection
      curl_close($ch);
      
      parse_str($result, $result);
      $post_id =  $result['PAYMENTREQUEST_0_CUSTOM'];
      if ( $result['ACK'] == 'Success' ) {
        //wp_PayPalAPI::SavePayment($result, 'pending');
		$var = new wp_PayPalAPI();
		$var->SavePayment($result, 'pending');
		$var->DoExpressCheckout($result,$post_id);
        //wp_PayPalAPI::DoExpressCheckout($result);
		
      } else {
		$var = new wp_PayPalAPI();
		$var->SavePayment($result, 'failed');
        //wp_PayPalAPI::SavePayment($result, 'failed');
      }
    }
    
    /**
     * Close transaction
     */
    function DoExpressCheckout($result,$post_id) {
     
      global $listingpro_options; 
      $paypal_api_environment = $listingpro_options['paypal_api'];
      $paypal_success = $listingpro_options['payment_success'];
	  $paypal_success = get_permalink($paypal_success);
      $paypal_fail = $listingpro_options['payment_fail'];
      $paypal_fail = get_permalink($paypal_fail);
      $paypal_api_username = $listingpro_options['paypal_api_username'];
      $paypal_api_password = $listingpro_options['paypal_api_password'];
      $paypal_api_signature = $listingpro_options['paypal_api_signature'];
    
      // FIELDS
      $fields = array(
              'USER' => urlencode($paypal_api_username),
              'PWD' => urlencode($paypal_api_password),
              'SIGNATURE' => urlencode($paypal_api_signature),
              'VERSION' => urlencode('72.0'),
              'PAYMENTREQUEST_0_PAYMENTACTION' => urlencode('Sale'),
              'PAYERID' => urlencode($result['PAYERID']),
              'TOKEN' => urlencode($result['TOKEN']),
              'PAYMENTREQUEST_0_AMT' => urlencode($result['AMT']),
              'PAYMENTREQUEST_0_CURRENCYCODE' => urlencode($result['CURRENCYCODE']),
              'METHOD' => urlencode('DoExpressCheckoutPayment')
          );
      
      $fields_string = '';
      foreach ( $fields as $key => $value)
        $fields_string .= $key.'='.$value.'&';
      rtrim($fields_string,'&');
      
      // CURL
      $ch = curl_init();
      
      if ( $paypal_api_environment == 'sandbox' )
        curl_setopt($ch, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
      elseif ( $paypal_api_environment == 'live' )
        curl_setopt($ch, CURLOPT_URL, 'https://api-3t.paypal.com/nvp');
      
      curl_setopt($ch, CURLOPT_POST, count($fields));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
		curl_setopt($ch, CURLOPT_SSLVERSION, 6); //6 is for TLSV1.2
      
      //execute post
      $result = curl_exec($ch);
      //close connection
      curl_close($ch);
      
      parse_str($result, $result);	  
      if ( $result['ACK'] == 'Success' ) {		  
        wp_PayPalAPI::UpdatePayment($result, 'success',$post_id);
      } else {
        wp_PayPalAPI::UpdatePayment($result, 'failed',$post_id);
      }
    }
    
    /**
     * Save payment result into database
     */
    function SavePayment($result, $status) {
      global $wpdb;
      $dbprefix = $wpdb->prefix;
	  $date = date('d-m-Y');

     $update_data = array('currency' => $result['CURRENCYCODE'],
                           'date' => $date,
                           'status' => $status,
                           'description' => $result['PAYMENTREQUEST_0_DESC'],
                           'summary' => serialize($result),
                           'token' => $result['TOKEN']);

      $where = array('post_id' => $result['PAYMENTREQUEST_0_CUSTOM']);
      
      $update_format = array('%s', '%s', '%s', '%s', '%s');

      $wpdb->update($dbprefix.'listing_orders', $update_data, $where, $update_format);
	  
	  $token = '';
	  $tokenn = $result['TOKEN'];
	  

    }
    
    /**
     * Update payment
     */
    function UpdatePayment($result, $status,$post_id) {
      global $wpdb,$listingpro_options;
	  $dbprefix = $wpdb->prefix;
	  
       if($status=="success" && !empty($post_id)){
		   
			$my_post = array( 'ID' => $post_id, 'post_status'   => 'publish' );
			wp_update_post( $my_post );
			
			$thepost = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM ".$dbprefix."listing_orders WHERE post_id = %d", $post_id ) );
		  
			$current_user = wp_get_current_user();
			$useremail = $current_user->user_email;
			$admin_email = '';
			$admin_email = get_option( 'admin_email' );
			
			$listing_id = $post_id;
			$listing_title = get_the_title($post_id);
			$invoice_no = $thepost->order_id;
			$payment_method = $thepost->payment_method;
			
			$plan_title = $thepost->plan_name;
			$plan_price = $thepost->price.$thepost->currency;
			$listing_url = get_the_permalink($listing_id);
			
			
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
			
			/* on 28 march  */
			$packageResult = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM ".$dbprefix."listing_orders WHERE post_id = %d", $post_id ) );
			$planID = $packageResult->plan_id;
			$planUsed = $packageResult->used;
			
			$allowedPosts = '';
			$allowedPosts = get_post_meta($planID, 'plan_text' ,true);
			
			
			$update_data = array('used' => '1', 'transaction_id' => $result['PAYMENTINFO_0_TRANSACTIONID'], 'status' => $status);
	  
			$where = array('token' => $result['TOKEN']);
			  
			$update_format = array('%s', '%s', '%s');
			  
			$wpdb->update($dbprefix.'listing_orders', $update_data, $where, $update_format);
			
			if(!empty($allowedPosts) && $allowedPosts=="1"){
				$update_status = array('status' => 'expired');
				$wheree = array('plan_id' => $planID);
				$update_formatt = array('%s');
				$wpdb->update($dbprefix.'listing_orders', $update_status, $wheree, $update_formatt);
			}
		  
		  
	  }
	  else{
			$update_data = array('used' => '1', 'transaction_id' => $result['PAYMENTINFO_0_TRANSACTIONID'], 'status' => $status);
	  
			$where = array('token' => $result['TOKEN']);
			  
			$update_format = array('%s', '%s', '%s');
			  
			$wpdb->update($dbprefix.'listing_orders', $update_data, $where, $update_format);
	  }

	
	  
    }
    
  }
  
}