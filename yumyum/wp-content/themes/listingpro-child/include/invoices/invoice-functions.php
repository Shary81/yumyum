<?php

/* ====================== for campaign wire===================== */

if(!function_exists('get_campaign_wire_invoice')){
	function get_campaign_wire_invoice($postid){
		
		global $listingpro_options;
		$output = null;
		$logo = '';
		$company = '';
		$address = '';
		$phone = '';
		$additional = '';
		$thanku_text = '';
		
		
		$logo = $listingpro_options['invoice_logo']['url'];
		$company = $listingpro_options['invoice_company_name'];
		$address = $listingpro_options['invoice_address'];
		$phone = $listingpro_options['invoice_phone'];
		$additional = $listingpro_options['invoice_additional_info'];
		$thanku_text = $listingpro_options['invoice_thankyou'];
		$userrow = '';
		$userID = '';
		$userID = get_current_user_id();
		$table = 'listing_campaigns';
		$data = '*';
		$condition = "post_id = $postid";
		$userrow = lp_get_data_from_db($table, $data, $condition);
		
		$plan_name = '';
		$plan_price = '';
		$currency = '';
		$invoice = '';
		if( is_array( $userrow ) && count( $userrow ) > 0 ){
			
				
				$plan_price = $userrow[0]->price;
				$plan_name = get_the_title($postid);
				$currency = $userrow[0]->currency;
				$invoice = $userrow[0]->transaction_id;
				
			
		}
		
		
		
		$user_info = get_userdata($userID);
		$fname = '';
		$lname = '';
		$usermail = '';
		$usermail = $user_info->user_email;
		$fname = $user_info->first_name;
		$lname = $user_info->last_name;
		
$output = '
		<div class="checkout-invoice-area">
			<div class="top-heading-area">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<img src="'.esc_attr($logo).'" alt="Listingpro" style="width:122px" width="122" class="CToWUd">
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<p>'.esc_html__('Receipt','listingpro').'</p>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12"></div>
				</div>
			</div>
			<div class="invoice-area">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h4>'.esc_html__('Billed to :','listingpro').'</h4>
						<ul>
							<li>'.$fname.' '.$lname.'</li>
							<li>'.$usermail.'</li>
						</ul>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<p>
							<strong>'.esc_html__('Invoice :','listingpro').'</strong>
							#'.$invoice.'<br>
							<strong>'.esc_html__('Process With: Direct / Wire method','listingpro').'</strong>
						</p>
					</div>
				</div>
				<div class="row heading-area">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<p><strong>'.esc_html__('Description','listingpro').'</strong></p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<p><strong>'.esc_html__('Plan','listingpro').'</strong></p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<p><strong>'.esc_html__('Price','listingpro').'</strong></p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12"></div>
				</div>
				<div class="row invoices-company-details">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<a href="#" target="_blank">'.$company.'</a> <br>
						<p>'.$address.'<span class="aBn" data-term="goog_1120388248" tabindex="0"><span class="aQJ">2017-03-01</span></span></b></p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<p>'.$plan_name.'</p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<p>'.$plan_price.'</p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
					</div>
				</div>
				<div class="row invoice-price-details">
					<div class="col-md-6 col-sm-6 col-xs-12">
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<ul class="clearfix">
							<li>'.esc_html__('Subtotal :','listingpro').'</li>
							<li>'.$plan_price.'</li>
						</ul>
						<ul class="clearfix">
							<li>'.esc_html__('Total :','listingpro').'</li>
							<li>'.$plan_price.'</li>
						</ul>
						<ul class="clearfix">
							<li>'.esc_html__('Amount Paid :','listingpro').'</li>
							<li>'.$plan_price. $currency.'</li>
						</ul>
						<ul class="clearfix">
							<li>'.esc_html__('Balance due :','listingpro').'</li>
							<li>0.00</li>
						</ul>
					</div>
				</div>
				<div class="thankyou-text text-center">
					<p>'.$thanku_text.'</p>
				</div>
			</div>
			<div class="checkout-bottom-area">
				<p>'.esc_html__('&copy; 2017 Listingpro all rights reserved','listingpro').'</p>
				<ul class="clearfix">
					<li>All Rights are Reserved</li>
					<li><a href="#" target="_blank" >'.esc_html__('Terms of Service','listingpro').'</a></li>
					<li><a href="#" target="_blank" >'.esc_html__('Cancellation Policy','listingpro').'</a></li>
					<li><a href="#" target="_blank" >'.esc_html__('Privacy Policy','listingpro').'</a></li>
				</ul>
			</div>
		</div>';

	$output = '
		<div class="checkout-invoice-area">
			<div class="top-heading-area">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<img src="'.esc_attr($logo).'" alt="Listingpro" style="width:122px" width="122" class="CToWUd">
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<p>'.esc_html__('Receipt','listingpro').'</p>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12"></div>
				</div>
			</div>
			<div class="invoice-area">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h4>'.esc_html__('Billed to :','listingpro').'</h4>
						<ul>
							<li>'.$fname.' '.$lname.'</li>
							<li>'.$usermail.'</li>
						</ul>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<p>
							<strong>'.esc_html__('Invoice :','listingpro').'</strong>
							#'.$invoice.'<br>
							<strong>'.esc_html__('Process With: Direct / Wire method','listingpro').'</strong>
						</p>
					</div>
				</div>
				<div class="row heading-area">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<p><strong>'.esc_html__('Description','listingpro').'</strong></p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<p><strong>'.esc_html__('Plan','listingpro').'</strong></p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<p><strong>'.esc_html__('Price','listingpro').'</strong></p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12"></div>
				</div>
				<div class="row invoices-company-details">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<a href="#" target="_blank">'.$company.'</a> <br>
						<p>'.$address.'<span class="aBn" data-term="goog_1120388248" tabindex="0"><span class="aQJ">2017-03-01</span></span></b></p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<p>'.$plan_name.'</p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<p>'.$plan_price.'</p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
					</div>
				</div>
				<div class="row invoice-price-details">
					<div class="col-md-6 col-sm-6 col-xs-12">
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<ul class="clearfix">
							<li>'.esc_html__('Subtotal :','listingpro').'</li>
							<li>'.$plan_price.'</li>
						</ul>
						<ul class="clearfix">
							<li>'.esc_html__('Total :','listingpro').'</li>
							<li>'.$plan_price.'</li>
						</ul>
						<ul class="clearfix">
							<li>'.esc_html__('Amount Paid :','listingpro').'</li>
							<li>'.$plan_price. $currency.'</li>
						</ul>
						<ul class="clearfix">
							<li>'.esc_html__('Balance due :','listingpro').'</li>
							<li>0.00</li>
						</ul>
					</div>
				</div>
				<div class="thankyou-text text-center">
					<p>'.$thanku_text.'</p>
				</div>
			</div>
			<div class="checkout-bottom-area">
				<p>'.esc_html__('&copy; 2017 Listingpro all rights reserved','listingpro').'</p>
				<ul class="clearfix">
					<li>All Rights are Reserved</li>
					<li><a href="#" target="_blank" >'.esc_html__('Terms of Service','listingpro').'</a></li>
					<li><a href="#" target="_blank" >'.esc_html__('Cancellation Policy','listingpro').'</a></li>
					<li><a href="#" target="_blank" >'.esc_html__('Privacy Policy','listingpro').'</a></li>
				</ul>
			</div>
		</div>';
		return $output;
		
		
	}
}

/* ====================== for listing wire ======================*/

if ( !function_exists('generate_wire_invoice') ){
	
	function generate_wire_invoice( $postid ){
		
		global $listingpro_options;
		$logo = '';
		$company = '';
		$address = '';
		$phone = '';
		$additional = '';
		$thanku_text = '';
		
		
		$logo = $listingpro_options['invoice_logo']['url'];
		$company = $listingpro_options['invoice_company_name'];
		$address = $listingpro_options['invoice_address'];
		$phone = $listingpro_options['invoice_phone'];
		$additional = $listingpro_options['invoice_additional_info'];
		$thanku_text = $listingpro_options['invoice_thankyou'];
		
		
		global $wpdb;
		$prefix = $wpdb->prefix;
		$userID = '';
		$userID = $wpdb->get_results( 
						$wpdb->prepare("SELECT user_id  FROM ".$prefix."listing_orders WHERE post_id=%d", $postid) 
					 );
		
		if( is_array( $userID ) ){
			
			$userID = $userID[0]->user_id;
			
		}
		else{
			
			$userID = $userID->user_id;
			
		}
		
		$userrow = '';
		$userrow = $wpdb->get_results( 
						$wpdb->prepare("SELECT *  FROM ".$prefix."listing_orders WHERE post_id=%d", $postid) 
					 );
		
		$plan_name = '';
		$plan_price = '';
		$currency = '';
		$invoice = '';
		if( is_array( $userrow ) && count( $userrow ) > 0 ){
			
				
				$plan_price = $userrow[0]->price;
				$plan_name = $userrow[0]->plan_name;
				$currency = $userrow[0]->currency;
				$invoice = $userrow[0]->order_id;
				
			
		}
		
		
		
		$user_info = get_userdata($userID);
		$fname = '';
		$lname = '';
		$usermail = '';
		$usermail = $user_info->user_email;
		$fname = $user_info->first_name;
		$lname = $user_info->last_name;
		
		
		$output = null;
		
		$output = '
		
		<div class="checkout-invoice-area">
			<div class="top-heading-area">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<img src="'.esc_attr($logo).'" alt="Listingpro" style="width:122px" width="122" class="CToWUd">
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<p>'.esc_html__('Receipt','listingpro').'</p>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12"></div>
				</div>
			</div>
			<div class="invoice-area">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h4>'.esc_html__('Billed to :','listingpro').'</h4>
						<ul>
							<li>'.$fname.' '.$lname.'</li>
							<li>'.$usermail.'</li>
						</ul>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<p>
							<strong>'.esc_html__('Invoice :','listingpro').'</strong>
							#'.$invoice.'<br>
							<strong>'.esc_html__('Process With: Direct / Wire method','listingpro').'</strong>
						</p>
					</div>
				</div>
				<div class="row heading-area">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<p><strong>'.esc_html__('Description','listingpro').'</strong></p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<p><strong>'.esc_html__('Plan','listingpro').'</strong></p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<p><strong>'.esc_html__('Price','listingpro').'</strong></p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12"></div>
				</div>
				<div class="row invoices-company-details">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<a href="#" target="_blank">'.$company.'</a> <br>
						<p>'.$address.'<span class="aBn" data-term="goog_1120388248" tabindex="0"><span class="aQJ">2017-03-01</span></span></b></p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<p>'.$plan_name.'</p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
						<p>'.$plan_price.'</p>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12">
					</div>
				</div>
				<div class="row invoice-price-details">
					<div class="col-md-6 col-sm-6 col-xs-12">
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<ul class="clearfix">
							<li>'.esc_html__('Subtotal :','listingpro').'</li>
							<li>'.$plan_price.'</li>
						</ul>
						<ul class="clearfix">
							<li>'.esc_html__('Total :','listingpro').'</li>
							<li>'.$plan_price.'</li>
						</ul>
						<ul class="clearfix">
							<li>'.esc_html__('Amount Paid :','listingpro').'</li>
							<li>'.$plan_price. $currency.'</li>
						</ul>
						<ul class="clearfix">
							<li>'.esc_html__('Balance due :','listingpro').'</li>
							<li>0.00</li>
						</ul>
					</div>
				</div>
				<div class="thankyou-text text-center">
					<p>'.$thanku_text.'</p>
				</div>
			</div>
			<div class="checkout-bottom-area">
				<p>'.esc_html__('&copy; 2017 Listingpro all rights reserved','listingpro').'</p>
				<ul class="clearfix">
					<li>All Rights are Reserved</li>
					<li><a href="#" target="_blank" >'.esc_html__('Terms of Service','listingpro').'</a></li>
					<li><a href="#" target="_blank" >'.esc_html__('Cancellation Policy','listingpro').'</a></li>
					<li><a href="#" target="_blank" >'.esc_html__('Privacy Policy','listingpro').'</a></li>
				</ul>
			</div>
		</div>';
	
	$website_url = site_url();
	$website_name = get_option('blogname');
	$admin_email = get_option( 'admin_email' );
	$plan_price = $userrow[0]->price.$userrow[0]->currency;
	$plan_title = $userrow[0]->plan_name;
	$invoice_no = $userrow[0]->order_id;
	$payment_method = $userrow[0]->payment_method;
	$post_id = $userrow[0]->post_id;
				
	$listing_title = get_the_title($post_id);
	$listing_url = get_the_permalink($post_id);
	
	
	$headers[] = 'Content-Type: text/html; charset=UTF-8';
	//to admin
			
			
			$mail_subject = $listingpro_options['listingpro_subject_wire_invoice_admin'];
			$website_url = site_url();
			$website_name = get_option('blogname');
			$mail_subject = str_replace('%website_url','%1$s', $mail_subject);
			$mail_subject = str_replace('%website_name','%2$s', $mail_subject);
			$formated_mail_subject = sprintf( $mail_subject,$website_url, $website_name );


			$mail_content = $listingpro_options['listingpro_content_wire_invoice_admin'];
			$mail_content = str_replace('%website_url','%1$s', $mail_content);
			$mail_content = str_replace('%listing_title','%2$s', $mail_content);
			$mail_content = str_replace('%plan_title','%3$s', $mail_content);
			$mail_content = str_replace('%plan_price','%4$s', $mail_content);
			$mail_content = str_replace('%listing_url','%5$s', $mail_content);
			$mail_content = str_replace('%invoice_no','%6$s', $mail_content);
			$mail_content = str_replace('%website_name','%7$s', $mail_content);
			$mail_content = str_replace('%payment_method','%8$s', $mail_content);

			$formated_mail_content = sprintf( $mail_content,$website_url,$listing_title,$plan_title,$plan_price,$listing_url,$invoice_no, $website_name, $payment_method  );
			
			$emailresponse = wp_mail( $admin_email, $formated_mail_subject, $formated_mail_content, $headers);
	
	
	
	// to user
			$to = $usermail;
			$subject = '';
			$body = '';
			$subjec = $listingpro_options['listingpro_subject_wire_invoice'];
			$bod = $listingpro_options['listingpro_content_wire_invoice'];
	
			$subjec = $listingpro_options['listingpro_subject_purchase_activated'];
			$website_url = site_url();
			$subjec = str_replace('%website_url','%1$s', $subjec);
			$subjec = str_replace('%website_name','%2$s', $subjec);
			$subject = sprintf( $subjec,$website_url,$website_name );

			$bod = $listingpro_options['listingpro_content_purchase_activated'];
			$bod = str_replace('%website_url','%1$s', $bod);
			$bod = str_replace('%listing_title','%2$s', $bod);
			$bod = str_replace('%plan_title','%3$s', $bod);
			$bod = str_replace('%plan_price','%4$s', $bod);
			$bod = str_replace('%listing_url','%5$s', $bod);
			$bod = str_replace('%invoice_no','%6$s', $bod);
			$bod = str_replace('%website_name','%7$s', $bod);
			$bod = str_replace('%payment_method','%8$s', $bod);

			$body = sprintf( $bod,$website_url,$listing_title,$plan_title,$plan_price, $listing_url, $invoice_no, $website_name, $payment_method  );

			$emailresponse = wp_mail( $to, $subject, $body, $headers);
	
	return $output;
	
	
	}
	
}




?>