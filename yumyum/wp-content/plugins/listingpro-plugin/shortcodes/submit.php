<?php 
ob_start();
/*------------------------------------------------------*/
/* Submit Listing
/*------------------------------------------------------*/
vc_map( array(
	"name"                      => __("Submit Listing", "js_composer"),
	"base"                      => 'listingpro_submit',
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
			'type'        => 'textfield',
			'heading'     => __( 'Subtitle', 'js_composer' ),
			'param_name'  => 'subtitle',
			'value'       => ''
		),
	),
) );
function listingpro_shortcode_submit($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'title'   => '',
		'subtitle'   => ''
	), $atts));
	

	/* PRIVACY URL */
	global $listingpro_options;
	$lp_paid_mode = $listingpro_options['enable_paid_submission'];
	$privacy_policy = $listingpro_options['payment_terms_condition'];

	$paidmode = '';
	$paidmode = $listingpro_options['enable_paid_submission'];
	
	/* EDIT LIST */
	$lp_post ='';
	$form_field ='';
	$faq ='';
	$faqans ='';
	$gAddress ='';
	$latitude ='';
	$longitude ='';
	$timings ='';
	$phone ='';
	$email ='';
	$website ='';
	$twitter ='';
	$facebook ='';
	$linkedin ='';
	$listingcurrency ='';
	$listingprice ='';
	$listingptext ='';
	$video ='';	
	
	/* MODE CHECK */
	if( $lp_paid_mode == "yes" ){
		
		if( !isset($_POST['plan_id']) && !isset( $_POST['price_nonce_field'] )){
				$lp_plans_url = $listingpro_options['pricing-plan'];
				if(!empty($lp_plans_url)){
					wp_redirect($lp_plans_url);
					exit;
				}
				else{
					wp_redirect(site_url());
					exit;
				}
				
		}
	}
	
	
	/* PLAN ID */
	$plan_id = '';
	if(isset($_POST['plan_id'])){
		$plan_id = $_POST['plan_id'];
	}else{
		$plan_id = 'none';
	}
	
	
	$contact_show = get_post_meta( $plan_id, 'contact_show', true );
	$map_show = get_post_meta( $plan_id, 'map_show', true );
	$video_show = get_post_meta( $plan_id, 'video_show', true );
	$gallery_show = get_post_meta( $plan_id, 'gallery_show', true );
	if($plan_id=="none"){
		$contact_show = 'true';
		$map_show = 'true';
		$video_show = 'true';
		$gallery_show = 'true';
	}
	
	/* SUBMIT FORM OUTPUT */
	$output = null;
	
	$output .= '
	<div class="page-container-four clearfix submit_new_style">
		<div class="col-md-12 col-sm-12">
			<div class="form-page-heading">
				<h3>'.$title.'</h3>
				<p>'.$subtitle.'</p>
			</div>
			<div class="post-submit">';
				if(is_user_logged_in()) {
					$output .= '
					<div class="author-section border-bottom lp-form-row clearfix lp-border-bottom padding-bottom-40">
						<div class="lp-form-row-left text-left pull-left not-logged-in-msg">
							<img class="avatar-circle" src="'.listingpro_author_image().'" />
							<p>'.esc_html__(listingpro_translation('You are currently signed in as'), 'listingpro').' <strong>'.listingpro_author_name().',</strong> <a href="'.wp_logout_url(esc_url(home_url('/'))).'" class="">'.esc_html__(listingpro_translation('Sign out'), 'listingpro').'</a> ' .esc_html__('or continue below and start submission.', 'listingpro').'</p>
						</div>
					</div>';
				}else{
					$output .=
					'<div class="author-section border-bottom lp-form-row clearfix lp-border-bottom padding-bottom-40">
						<div class="lp-form-row-left text-left pull-left not-logged-in-msg">
							<!-- <img class="avatar-circle" src="'.plugins_url( '/images/author.jpg', dirname(__FILE__) ).'" /> -->
							<p><strong>'.esc_html__('Returning User? Please', 'listingpro'). '</strong> <a class=" md-trigger" data-modal="modal-3">'.esc_html__('Sign In', 'listingpro').'</a> '.esc_html__('and if you are a ', 'listingpro').' <strong>' .esc_html__('New User, continue below ', 'listingpro').'</strong>' .esc_html__('and register along with this submission.', 'listingpro').'</p>
						</div>						
					</div>';
				}

				$quickTipTitle = $listingpro_options['quick_tip_title'];
				$quickTipText = $listingpro_options['quick_tip_text'];
				$submitImg = $listingpro_options['submit_ad_img']['url'];
				$submitImg1 = $listingpro_options['submit_ad_img1']['url'];
				$submitImg2 = $listingpro_options['submit_ad_img2']['url'];
				$submitImg3 = $listingpro_options['submit_ad_img3']['url'];

				/* Submit Fields ON/OFF */
				$listing_title_text = $listingpro_options['listing_title_text'];
				$listingCityText = $listingpro_options['listing_city_text'];
				$listingGaddText = $listingpro_options['listing_gadd_text'];
				$phoneSwitch = $listingpro_options['phone_switch'];
				$listingPhText = $listingpro_options['listing_ph_text'];
				$webSwitch = $listingpro_options['web_switch'];
				$listingWebText = $listingpro_options['listing_web_text'];
				$ophSwitch = $listingpro_options['oph_switch'];
				$listing_cat_text = $listingpro_options['listing_cat_text'];
				$features_switch = $listingpro_options['features_switch'];
				$listing_features_text = $listingpro_options['listing_features_text'];
				$currencySwitch = $listingpro_options['currency_switch'];
				$listingCurrText = $listingpro_options['listing_curr_text'];
				$digitPriceSwitch = $listingpro_options['digit_price_switch'];
				$listingDigitText = $listingpro_options['listing_digit_text'];
				$priceSwitch = $listingpro_options['price_switch'];
				$listingPriceText = $listingpro_options['listing_price_text'];
				$listing_desc_text = $listingpro_options['listing_desc_text'];
				$faq_switch = $listingpro_options['faq_switch'];
				$listing_faq_text = $listingpro_options['listing_faq_text'];
				$listing_faq_tabs_text = $listingpro_options['listing_faq_tabs_text'];
				$twSwitch = $listingpro_options['tw_switch'];
				$fbSwitch = $listingpro_options['fb_switch'];
				$lnkSwitch = $listingpro_options['lnk_switch'];
				$googleSwitch = $listingpro_options['google_switch'];
				$ytSwitch = $listingpro_options['yt_switch'];
				$instaSwitch = $listingpro_options['insta_switch'];
				$tags_switch = $listingpro_options['tags_switch'];
				$listingTagsText = $listingpro_options['listing_tags_text'];
				$vdoSwitch = $listingpro_options['vdo_switch'];
				$listingVdoText = $listingpro_options['listing_vdo_text'];
				$fileSwitch = $listingpro_options['file_switch'];
				$listingEmailText = $listingpro_options['listing_email_text'];

				$submit_ad_img_switch = $listingpro_options['submit_ad_img_switch'];
				$submit_ad_img1_switch = $listingpro_options['submit_ad_img1_switch'];
				$submit_ad_img2_switch = $listingpro_options['submit_ad_img2_switch'];
				$submit_ad_img3_switch = $listingpro_options['submit_ad_img3_switch'];
				$quick_tip_switch = $listingpro_options['quick_tip_switch'];

				$listing_btn_text = $listingpro_options['listing_btn_text'];

				$btnText = '';
				if(!empty($listing_btn_text)) {
					$btnText = $listing_btn_text;
				}else {
					$btnText = esc_html__('Save & Preview', 'listingpro');
				}

				$output .='
				<form method="post" enctype=multipart/form-data id="lp-submit-form" name="lp-submit-form">
					<div class="white-section border-bottom">
						<div class="row">
							<div class="form-group col-md-6 col-xs-12">';
								if($quick_tip_switch == 1) {
									$output .='
									<div class="quick_tip">
										<h2>'. $quickTipTitle .'</h2>
										<p>'. $quickTipText .'</p>
									</div>';
								}
								$output .='
								<label for="usr">'.$listing_title_text.'</label>
								<div class="help-text">
									<a href="#" class="help"><i class="fa fa-question"></i></a>
									<div class="help-tooltip">
										<p>'.esc_html__('Put here Listing title here and tell the name of your business to the world.', 'listingpro').'</p>
									</div>
								</div>
								<input type="text" name="postTitle" class="form-control margin-bottom-10" id="usr" placeholder="' .esc_html__('Staple & Fancy Hotel', 'listingpro').'">
								<input type="text" name="tagline_text" class="form-control margin-bottom-10" id="usr" placeholder="' .esc_html__('Tagline Example: Best Express Mexican Grill', 'listingpro').'">';
								$output .='
							</div>
							<div class="form-group col-md-6 col-xs-12">';
								if($submit_ad_img_switch == 1) {
									$output .='
									<div class="submit-img">
										<img src="'. $submitImg .'" alt="">
									</div>';
								}
								$output .='
							</div>
						</div>
						<div class="row">';
							$output .='
							<div class="form-group col-md-6 col-xs-12">
								<label for="inputTags">'.$listingCityText.'</label>
								<div class="help-text">
									<a href="#" class="help"><i class="fa fa-question"></i></a>
									<div class="help-tooltip">
										<p>'.esc_html__('This city name will help your list find in seach filters', 'listingpro').'</p>
									</div>
								</div>
								<select data-placeholder="'.esc_html__('select your listing region', 'listingpro').'" id="inputCity" name="location" class="select2 postsubmitSelect" tabindex="5">';
									$output .=	'<option value="">' .esc_html__('Select City', 'listingpro').'</option>';
									$args = array(
										'post_type' => 'listing',
										'order' => 'ASC',
										'hide_empty' => false,
									);
									$locations = get_terms( 'location',$args);
									foreach($locations as $location) {										
										$output .=	'<option value="'.$location->term_id.'">'.$location->name.'</option>';
									}
									$output .='
								</select>
							</div>';
							$output .='
							<div class="form-group col-md-6 col-xs-12">
								<label for="inputAddress">'.$listingGaddText.'</label>
								<div class="help-text">
									<a href="#" class="help"><i class="fa fa-question"></i></a>
									<div class="help-tooltip">
										<p>'.esc_html__('Start typing and select your google location from google suggestions, This is for map and also for locating your business', 'listingpro').'</p>
									</div>
								</div>
								<input type="text" class="form-control" name="gAddress" id="inputAddress" placeholder="'.esc_html__('Start typing and find your place in google map', 'listingpro').'">
								<input type="hidden" id="latitude" name="latitude">
								<input type="hidden" id="longitude" name="longitude">
							</div>';
							$output .='
						</div>
						<div class="row">';
							if($phoneSwitch == 1) {
								if($contact_show=="true"){
									$output .='
									<div class="form-group col-md-6 col-xs-12">
										<label for="inputPhone">'.$listingPhText.'</label>
										<input type="text" class="form-control" name="phone" id="inputPhone" placeholder="'.esc_html__('111-111-1234', 'listingpro').'">
									</div>';
								}
							}
							if($webSwitch == 1) {
								$output .='
								<div class="form-group col-md-6 col-xs-12">
									<label for="inputWebsite">'.$listingWebText.'</label>
									<input type="text" class="form-control" name="website" id="inputWebsite" placeholder="'.esc_html__('http://', 'listingpro').'">
								</div>';
							}
							$output .='
						</div>
					</div>
					<div class="white-section border-bottom">
						<div class="row">
							<div class="form-group col-md-6 col-xs-12">';
								if($ophSwitch == 1) {
									$output .='
									<div class="form-group clearfix margin-bottom-0">';
										$fakeID	= '';
										$output	.= LP_operational_hours_form($fakeID,false);
										$output	.='
									</div>';
								}
								$output .='
								<div class="form-group clearfix margin-bottom-0">
									<label for="inputCategory">'.$listing_cat_text.'</label>
								  	<select data-placeholder="Choose Your Business Category" id="inputCategory" name="category" class="select2 postsubmitSelect" tabindex="5">';
										$output .=	'<option value="">' .esc_html__('Select Category', 'listingpro').'</option>';
										$args = array(
											'post_type' => 'listing',
											'order' => 'ASC',
											'hide_empty' => false,
											'parent' => 0,
										);
										$categories = get_terms( 'listing-category',$args);
										if(!empty($categories)){
											foreach($categories as $category) {
												$output .=	'<option value="'.$category->term_id.'">'.$category->name.'</option>';
												$sub = get_term_children( $category->term_id, 'listing-category' );
													foreach ( $sub as $subID ) {								
														$term = get_term_by( 'id', $subID, 'listing-category' );
												$output .= '<option class="sub_cat" value="'.$term->term_id.'">-&nbsp;&nbsp;'.$term->name.'</option>';
													}
											}
										}
										$output .='
									</select>
								</div>';
								$output .='
							</div>
							<div class="form-group col-md-6 col-xs-12">';
								if($submit_ad_img1_switch == 1) {
									$output .='
									<div class="submit-img">
										<img src="'. $submitImg1 .'" alt="">
									</div>';
								}
								$output .='
							</div>
						</div>';
						if($features_switch == 1) {
							$output .='
							<div class="form-group clearfix">
								<label for="inputTags" class="labelforfeatures lp-nested">'.$listing_features_text.'</label><br>
								<div class="pre-load"></div>
								<div class="featuresDataContainer lp-nested row" id="tags-by-cat"></div>	
								<div class="featuresDataContainer lp-nested row" id="features-by-cat"></div>
							</div>';
						}
						$output .='
						<div class="form-group clearfix">
							<div class="row">';
								if($currencySwitch == 1) {
									$output .='
									<div class="col-md-4">
										<label for="price_status">'.$listingCurrText.'</label>
										<select id="price_status" name="price_status" class="chosen-select chosen-select7  postsubmitSelect" tabindex="5">
											<option value="notsay">' .esc_html__('Not to say', 'listingpro').'</option>
											<option value="inexpensive"> $ - '.esc_html__('Inexpensive', 'listingpro').'</option>
											<option value="moderate"> $$ - '.esc_html__('Moderate', 'listingpro').'</option>
											<option value="pricey"> $$$ - '.esc_html__('Pricey', 'listingpro').'</option>
											<option value="ultra_high_end"> $$$$ - '.esc_html__('Ultra High', 'listingpro').'</option>
										</select>
									</div>';
								}
								if($digitPriceSwitch == 1) {
									$output .='
									<div class="col-md-4">
										<label for="listingprice">'.$listingDigitText.'</label>
										<input type="text" name="listingprice" class="form-control" id="listingprice" placeholder="'.esc_html__('Price From', 'listingpro').'">
									</div>';
								}
								if($priceSwitch == 1) {
									$output .='
									<div class="col-md-4">
										<label for="listingptext">'.$listingPriceText.'</label>
										<input type="text" name="listingptext" class="form-control" id="listingptext" placeholder="'.esc_html__('Price To', 'listingpro').'">
									</div>';
								}
								$output .='
							</div>
						</div>
					</div>
					<div class="white-section border-bottom">
						<div class="row">
							<div class="form-group col-md-6 col-xs-12">';
								$output .='
								<div class="form-group clearfix">
									<label for="inputDescription">'.$listing_desc_text.'</label>
									<textarea class="form-control" placeholder="'.esc_html__('Detail description about your listing', 'listingpro').'" name="postContent" rows="8" id="inputDescription"></textarea>
								</div>';
								if($faq_switch == 1) {
									$output .='
									<div class="form-group clearfix margin-bottom-0">
										<div id="tabs" class="clearfix pos-relative">
											<div class="btn-container faq-btns clearfix">	
											  	<ul>
													<li><a href="#tabs-1">'.$listing_faq_tabs_text.'</a></li>
											  	</ul>
											  	<a id="tabsbtn" class="lp-secondary-btn btn-first-hover">+</a>
										 	</div>
										  	<div id="tabs-1">
												<div class="form-group">
													<label for="inputLinkedIn">'.$listing_faq_text.'</label>
													<input type="text" class="form-control" name="faq[1]" id="inputLinkedIn" placeholder="'.esc_html__('FAQ', 'listingpro').'">
												</div>
												<div class="form-group">												
													<textarea class="form-control" placeholder="'.esc_html__('Answer', 'listingpro').'" name="faqans[1]" rows="8" id="inputDescription"></textarea>
												</div>
									 	 	</div>										
									  	</div>
									</div>';
								}
								$output .='
							</div>
							<div class="form-group col-md-6 col-xs-12">';
								if($submit_ad_img2_switch == 1) {
									$output .='
									<div class="submit-img">
										<img src="'. $submitImg2 .'" alt="">
									</div>';
								}
								$output .='
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6 col-xs-12 lp-social-area">';
								if($twSwitch == 1) {
									$output .='
									<div class="form-group col-md-6 col-xs-12">
										<label for="inputTwitter">'.esc_html__(listingpro_translation('Twitter'), 'listingpro').'</label>
										<input type="text" class="form-control" name="twitter" id="inputTwitter" placeholder="'.esc_html__(listingpro_translation('Your Twitter URL'), 'listingpro').'">
									</div>';
								}
								if($fbSwitch == 1) {
									$output .='
									<div class="form-group col-md-6 col-xs-12">
										<label for="inputFacebook">'.esc_html__(listingpro_translation('Facebook'), 'listingpro').'</label>
										<input type="text" class="form-control" name="facebook" id="inputFacebook" placeholder="'.esc_html__(listingpro_translation('Your Facebook URL'), 'listingpro').'">
									</div>';
								}
								if($lnkSwitch == 1) {
									$output .='
									<div class="form-group col-md-6 col-xs-12">
										<label for="inputLinkedIn">'.esc_html__(listingpro_translation('LinkedIn'), 'listingpro').'</label>
										<input type="text" class="form-control" name="linkedin" id="inputLinkedIn" placeholder="'.esc_html__(listingpro_translation('Your LinkedIn URL'), 'listingpro').'">
									</div>';
								}
								if($googleSwitch == 1) {
									$output .='
									<div class="form-group col-md-6 col-xs-12">
										<label for="inputGooglePlus">'.esc_html__('Google Plus', 'listingpro').'</label>
										<input type="text" class="form-control" name="google_plus" id="inputGooglePlus" placeholder="'.esc_html__('Your Google Plus URL', 'listingpro').'">
									</div>';
								}
								if($ytSwitch == 1) {
									$output .='
									<div class="form-group col-md-6 col-xs-12">
										<label for="inputYoutube">'.esc_html__('Youtube', 'listingpro').'</label>
										<input type="text" class="form-control" name="youtube" id="inputYoutube" placeholder="'.esc_html__('Your Youtube URL', 'listingpro').'">
									</div>';
								}
								if($instaSwitch == 1) {
									$output .='
									<div class="form-group col-md-6 col-xs-12">
										<label for="inputInstagram">'.esc_html__('Instagram', 'listingpro').'</label>
										<input type="text" class="form-control" name="instagram" id="inputInstagram" placeholder="'.esc_html__('Your Instagram URL', 'listingpro').'">
									</div>';
								}
								$output .='
							</div>';
							if($tags_switch == 1) {
								$output .='
								<div class="form-group col-md-6 col-xs-12 lp-social-area">
									<div class="form-group col-md-12 col-xs-12">
										<label for="inputTags">'.$listingTagsText.'</label>
										<div class="help-text">
											<a href="#" class="help"><i class="fa fa-question"></i></a>
											<div class="help-tooltip">
												<p>'.esc_html__('These Keywords or tags will help your listing to find in search, Add keywords with comma seprated related to your business', 'listingpro').'</p>
											</div>
										</div>
										<textarea class="form-control" name="tags" id="inputTags" placeholder="'.esc_html__('Enter tags or keywords comma seprated...', 'listingpro').'"></textarea>
									</div>
								</div>';
							}
							$output .='
						</div>
					</div>
					<div class="white-section border-bottom">
						<div class="row">
							<div class="form-group col-md-6 col-xs-12">';
								if($vdoSwitch == 1) {
									if($video_show=="true"){
										$output .='
										<div class="form-group clearfix">
											<label for="postVideo">'.$listingVdoText.'<span>(Optional)</span></label>
											<input type="text" class="form-control" name="postVideo" id="postVideo" placeholder="'.esc_html__('ex: https://youtu.be/lY2yjAdbvdQ', 'listingpro').'">
										</div>';
									}
								}
								if($fileSwitch == 1) {
									if($gallery_show=="true"){
										$output .='
										<div class="form-group clearfix margin-bottom-0">
											<div class="col-sm-12 padding-left-0 padding-right-0">
												<label for="postVideo">'.esc_html__('Images ', 'listingpro').'<span>(Select one as the featured image)</span></label>	
												<div class="jFiler-input-dragDrop pos-relative">
													<div class="jFiler-input-inner">
														<div class="jFiler-input-icon">
															<i class="icon-jfi-cloud-up-o"></i>
														</div>
															<div class="jFiler-input-text">
															<h3>Drag&Drop files here</h3>
															<span style="display:inline-block; margin: 15px 0">or</span>
														</div>
														<a class="jFiler-input-choose-btn blue">Browse Files</a>
														<div id="filediv">
															<input type="file" name="listingfiles[]" id="file" multiple>
														</div>
													</div>
												</div>
											</div>
										</div>';
									}
								}
								$output .='
							</div>
							<div class="form-group col-md-6 col-xs-12">';
								if($submit_ad_img3_switch == 1) {
									$output .='
									<div class="submit-img">
										<img src="'. $submitImg3 .'" alt="">
									</div>';
								}
								$output .='
							</div>
						</div>
					</div>
					<div class="blue-section">
						<div class="row">
							<div class="form-group col-md-6 margin-bottom-0">';
								if(!is_user_logged_in()){
									$output .='
									<label for="inputEmail">'.$listingEmailText.'</label>
									<input type="email" class="form-control" name="email" id="inputEmail" placeholder="'.esc_html__('your contact email', 'listingpro').'">';
								}
							$output .='
							</div>
							<div class="form-group col-md-6 margin-bottom-0">';
								if(!empty($privacy_policy)){
									$output .='
								  	<div class="checkbox form-group col-md-4">
									  	<input id="check_policy" type="checkbox" name="policycheck" value="true">
									  	<label for="check_policy">I Agree</label>
									  	<div class="help-text">
											<a href="#" class="help"><i class="fa fa-question"></i></a>
											<div class="help-tooltip">
												<p>'.esc_html__('You agree you accept our Terms & Conditions for posting this ad.', 'listingpro').'</p>
											</div>
										</div>
								  	</div>';
								}
								$output .='
								<div class="form-group clearfix margin-bottom-0 preview-section pos-relative col-md-8 pull-right">
									<label for="previewListing">'.esc_html__('Click below to review your listing.', 'listingpro').'</label>
									<div class="success_box">All of the fields were successfully validated!</div>
									<div class="error_box"></div>
									<input type="hidden" name="plan_id" value="'.$plan_id.'" /> 
									<input type="submit" name="listingpost" value="'.$btnText.'" class="lp-secondary-btn btn-first-hover" />
									<i class="fa fa-angle-right"></i>
								</div>';
								$output .= wp_nonce_field( 'post_nonce', 'post_nonce_field' ,true, false );
								$output .='
							</div>
						</div>
					</div>
					<!-- <div class="form-group clearfix">
						<label for="inputTags">'.esc_html__('Featured Image', 'listingpro').'</label>
						<div class="col-sm-12 padding-left-0 padding-right-0">
							<input type="file" name="featuredimage" id="featuredimage">
						</div>
					</div> -->
				</form>
			</div>
		</div>
	</div>';
						

	

	return $output;
}
add_shortcode('listingpro_submit', 'listingpro_shortcode_submit');