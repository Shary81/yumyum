<?php 
ob_start();
/*------------------------------------------------------*/
/* Submit Listing
/*------------------------------------------------------*/
vc_map( array(
	"name"                      => __("Listing Checkout", "js_composer"),
	"base"                      => 'listingpro_checkout',
	"category"                  => __('Listingpro', 'js_composer'),
	"description"               => '',
	"params"                    => array(
		
		array(
			"type"			=> "textfield",
			"class"			=> "",
			"heading"		=> __("Title","js_composer"),
			"param_name"	=> "title",
			"value"			=> ""
		),
		array(
			"type"        => "attach_image",
			"class"       => "",
			"heading"     => __("Bank Transfer Image","js_composer"),
			"param_name"  => "bank_transfer_img",
			"value"       => "",
			"description" => "Bank Transfer image"
		),
		array(
			"type"        => "attach_image",
			"class"       => "",
			"heading"     => __("Stripe Image","js_composer"),
			"param_name"  => "stripe_img",
			"value"       => "",
			"description" => "Stripe image"
		),
		array(
			"type"        => "attach_image",
			"class"       => "",
			"heading"     => __("Paypal Image","js_composer"),
			"param_name"  => "paypal_img",
			"value"       => "",
			"description" => "Paypal image"
		),
		
		
	),
) );
function listingpro_shortcode_checkout($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'title'   => '',
		'stripe_img'   => '',		
		'bank_transfer_img'   => '',		
		'paypal_img'   => '',		
	), $atts));
	
	$stripe_img_url = null;
	$paypal_img_url = null;
	
	$stripe_img_url = wp_get_attachment_url($stripe_img);
	$paypal_img_url = wp_get_attachment_url($paypal_img);
	
	
	$output = null;
	
	global $listingpro_options;
	global $wpdb;
	$dbprefix = '';
	$dbprefix = $wpdb->prefix;
	
	$user_ID = '';
	$user_ID = get_current_user_id();
	
	$currency = '';
	$currency = $listingpro_options['currency_paid_submission'];
	$currency_symbol = listingpro_currency_sign();
	
	$paypalStatus = false;
	$stripeStatus = false;
	if($listingpro_options['enable_paypal']=="1"){
		$paypalStatus = true;
	}
	if($listingpro_options['enable_stripe']=="1"){
		$stripeStatus = true;
	}
	/* ================================for campaign wire============================== */
	if(isset($_GET['checkout']) && !empty($_GET['checkout']) && $_GET['checkout']=="wire"){
		
			if (!isset($_SESSION)) { session_start(); }

			$postID = $_SESSION['post_id'];
			if(!empty($postID)){
				$output ='<div class="page-container-four clearfix">';
				$output .='<div class="col-md-10 col-md-offset-1">';
				$output .= get_campaign_wire_invoice( $postID );
				$output .='</div>';
				$output .='</div>';
				unset($_SESSION['post_id']);
			}
			else{
				$redirect = site_url();
				wp_redirect($redirect);
				exit();
			}
	}
	/* ================================for listings wire============================== */
	else if( isset($_GET['method']) && !empty($_GET['method']) && $_GET['method']=="wire" ){
			
			if (!isset($_SESSION)) { session_start(); }

			$postID = $_SESSION['post_id'];
			if(!empty($postID)){
				$output ='<div class="page-container-four clearfix">';
				$output .='<div class="col-md-10 col-md-offset-1">';
				$output .= generate_wire_invoice( $postID );
				$output .='</div>';
				$output .='</div>';
				unset($_SESSION['post_id']);
			}
			else{
				$redirect = site_url();
				wp_redirect($redirect);
				exit();
			}
	}
	/* ================================for checkout default page ============================== */
	else{
			$post_id = '';
			$order_id = '';
			$redirect = '';
			$redirect = get_template_directory_uri().'/include/paypal/form-handler.php?func=addrow';
			
			
			$output ='<div class="page-container-four clearfix">';
			$output .='<div class="col-md-10 col-md-offset-1">';
			
			$paid_mode = $listingpro_options['enable_paid_submission'];
			
			if( !empty($paid_mode) && $paid_mode=="no" ){
					$output .='<p class="text-center">Sorry! Currently Free mode is activated</p>';
			}
			else{
				
					
					$results = $wpdb->get_results( "SELECT * FROM ".$dbprefix."listing_orders WHERE user_id ='$user_ID' AND status = 'in progress'" );
					
					if( count($results) >0 ){
						
						$output .='<form autocomplete="off" id="listings_checkout" class="lp-listing-form" name ="listings_checkout" action="'.$redirect.'" method="post">';		
						$output .='<h3> '.esc_html__( $title, 'listingpro' ).'</h3>';
						$output .='<div class="row">';
						$output .='<div class="col-md-8">';
						$output .='<div class="lp-checkout-wrapper">';
						$the_query = '';
							foreach ( $results as $info ) {
							
								$post_id = $info->post_id;
								$order_id = $info->order_id;
								
										
										//$postmeta = get_post_meta($post_id, 'lp_listingpro_options', true);
										$plan_id = listing_get_metabox_by_ID('Plan_id',$post_id);
										$plan_price = get_post_meta($plan_id, 'plan_price', true);
										$plan_duration = get_post_meta($plan_id, 'plan_time', true);
										$terms = wp_get_post_terms( $post_id, 'listing-category', array() );
										
										$catname = '';
										if( count($terms)>0 ){
											$catname = $terms[0]->name;
										}
										if(!empty($plan_price)){
											$output .='<div class="lp-user-listings clearfix"><div class="col-md-12 col-sm-12 col-xs-12 lp-listing-clm">';
											if ( has_post_thumbnail($post_id) ) { 
												
												$imgurl = get_the_post_thumbnail_url($post_id, 'listingpro-checkout-listing-thumb');
												$output .= '<input type="hidden" name="listing_img" value="'.$imgurl.'">';
												$output .='<div class="col-md-3">';
												$output .='<img class="img-responsive" src="'.$imgurl.'" alt="" />';
												$output .='</div>';
												
											}else {
												$output .='<div class="col-md-3">';
												$output .='<img class="img-responsive" src="'.esc_url('https://placeholdit.imgix.net/~text?txtsize=33&txt=ListingPro&w=372&h=240').'" alt="" />';
												$output .='</div>';
											} 
											$output .= '<h5>';
											$output .= get_the_title($post_id);
											$output .='</h5>';
											$output .= '<div class="col-md-2 col-sm-2 col-xs-6">';
											
											$output .= '<span class="lp-booking-dt">Date:</span>
											<p>'.get_the_date('m d y', $post_id).'</p>';
											
											$output .='</div>';
											$output .= '<div class="col-md-2 col-sm-2 col-xs-6">';
											
											$output .= '<span class="lp-persons">Category:</span>
											<p>'.$catname.'</p>';
											
											$output .='</div>';
											$output .= '<div class="col-md-2 col-sm-2 col-xs-6">';
											
											$output .= '<span class="lp-duration">Duration:</span>
											<p>'.$plan_duration.' Days</p>';
											
											$output .='</div>';
											$output .= '<div class="col-md-2 col-sm-2 col-xs-6">';
											
											$output .= '<span class="lp-booking-type">Price:</span>
											<p>'.$currency_symbol.$plan_price.'</p>';
											
											$price = '';
											if($currency=="USD"){
												$price = bcmul($plan_price, 100);
											}
											else{
												$price = $plan_price;
											}
											
											$output .= '<input type="hidden" name="plan_price" value="'.$price.'">';
											$output .= '<input type="hidden" name="currency" value="'.$currency.'">';
											$output .= '<input type="hidden" name="post_title" value="'.get_the_title($post_id).'">';
											$output .= '<input type="hidden" name="listings_id" value="'.$post_id.'">';
											$output .= '<input type="hidden" name="plan_id" value="'.$plan_id.'">';
											
											$output .='</div>';
											$output .= '<div class="col-md-1 col-sm-2 col-xs-6">';
											
											$output .='<div class="radio radio-danger">
															<input type="radio" name="listing_id" data-title="'.get_the_title($plan_id).'" data-price="'.$price.'" id="'.$post_id.'" value="'.$post_id.'">
															<label for="'.$post_id.'">
															 
															</label>
														</div>';
											$output .='</div>';
											$output .='</div>';
											$output .='</div>';
										}
									
							
							}
						$output .='</div>';
						$output .='</div>';
						
						$output .='<div class="col-md-4">';
						$output .='<div class="lp-rightbnk-transfer-msg">';
							$output .='<div class="lp-method-wrap">';
							$output .='<label>';
							
							
							$output .='<div class="radio radio-danger">
											<input type="radio" name="plan" id="rd1" value="wire">
											<label for="rd1">
											</label>
										</div>
										<img src="'.esc_attr($bank_transfer_img).'" alt="Bank Transfer">';
							
							$bankinfo = '';
							$bankinfo = $listingpro_options['direct_payment_instruction'];
							$output .= 'Bank Transfer';
							$output .='</label>';
							$output .='<div class="lp-tranfer-info">';
								
							$output .= $bankinfo;
							$output .='</div>';
							$output .='</div>';
						
							
							if($paypalStatus==true){
								$output .='<div class="lp-method-wrap">';
								$output .='<label>';
								
								
								$output .='<div class="radio radio-danger">
													<input type="radio" name="plan" id="rd2" value="paypal">
													<label for="rd2">
													 
													</label>
												</div>';
								
								
								$output .= '<img src="'.esc_attr($paypal_img_url).'" alt="paypal" />';
								$output .='Paypal';
								$output .='</label>';
								$output .='</div>';
							}
							
							if($stripeStatus==true){
								$output .='<div class="lp-method-wrap">';
								$output .='<label>';
								
								
								$output .='<div class="radio radio-danger">
													<input type="radio" name="plan" id="rd3" value="stripe">
													<label for="rd3">
													 
													</label>
											</div>';
								
								
								$output .= '<img src="'.esc_attr($stripe_img_url).'" alt="stripe" />';
								$output .='Stripe';
								$output .='</label>';
								$output .='</div>';
							}
							
							
						
						$output .='</div>';
						$output .='<input type="hidden" name="post_id" value="" />';
						$output .='<input type="hidden" name="method" value="" />';
						$output .='<input type="hidden" name="func" value="start" />';
						$output .='</div>';
						$output .='<div class="col-md-5 padding-0">';
						$output .='<input type="submit" name="submit_checkout" value="Proceed checkout" />';
						$output.='</div>';
						$output .='</div>';
						
						
						$output .='</form>';
						
					}
					else{
						$output .='<p class="text-center">Sorry! You have no paid listings yet!</p>';
					}
				
			}
			
			
			
			$output .='</div>';
			$output .='</div>';
			
			$pubilshableKey = '';
			$secritKey = '';
			
			$pubilshableKey = $listingpro_options['stripe_pubishable_key'];
			$secritKey = $listingpro_options['stripe_secrit_key'];
			
			$ajaxURL = '';
			$ajaxURL = admin_url( 'admin-ajax.php' );
			
			$output .='

			<button id="stripe-submit">Purchase</button>

			<script>
			var post_title = "";
			listings_id = "";
			listings_img = "";
			plan_price = "";
			currency = "";
			plan_id = "";
			listing_img = "";
			
			jQuery("#listings_checkout input[name=listing_id]").click(function(){
				post_title = "";
				post_title = jQuery("#listings_checkout input[name=post_title]").val();
				
				plan_price = "";
				plan_price = jQuery("#listings_checkout input[name=plan_price]").val();
				
				currency = "";
				currency = jQuery("#listings_checkout input[name=currency]").val();
				
				listings_id = "";
				listings_id = jQuery("#listings_checkout input[name=listing_id]:checked").val();
				
				plan_id = "";
				plan_id = jQuery("#listings_checkout input[name=plan_id]").val();
				
				listing_img = "";
				listing_img = jQuery("#listings_checkout input[name=listing_img]").val();
				
			});
			
			var token_email, token_id;
			var handler = StripeCheckout.configure({
			  key: "'.$pubilshableKey.'",
			  image: "https://stripe.com/img/documentation/checkout/marketplace.png",
			  locale: "auto",
			  token: function(token) {
				token_id = token.id;
				token_email = token.email;
				
				jQuery.ajax({
					type: "POST",
					dataType: "json",
					url: "'.$ajaxURL.'",
					data: { 
						"action": "listingpro_save_stripe", 
						"token": token_id, 
						"email": token_email, 
						"listing": listings_id, 
						"plan": plan_id 
					},   
					success: function(res){
						redURL = res.redirect;
						window.location.href = redURL;
						
					},
					error: function(errorThrown){
						alert(errorThrown);
					} 
				});
				

			  }
			});

			//document.getElementById("stripe-submit").addEventListener("click", function(e) {
			  
			  //e.preventDefault();
			//});

			// Close Checkout on page navigation:
			window.addEventListener("popstate", function() {
			  handler.close();
			});
			</script>
			
			';
	}
	return $output;
}
add_shortcode('listingpro_checkout', 'listingpro_shortcode_checkout');