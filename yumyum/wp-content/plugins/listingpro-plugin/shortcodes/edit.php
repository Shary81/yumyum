<?php 
ob_start();
/*------------------------------------------------------*/
/* Edit Listing
/*------------------------------------------------------*/
vc_map( array(
	"name"                      => __("Edit Listing", "js_composer"),
	"base"                      => 'listingpro_edit',
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
function listingpro_shortcode_edit($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'title'   => '',
		'subtitle'   => ''		
	), $atts));
	

	global $listingpro_options;
	
	/* EDIT LIST */
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
	$gPlus ='';
	$youtube ='';
	$instagram ='';
	$video ='';	
	if(isset($_GET['lp_post']) && !empty($_GET['lp_post'])){
		$lp_post = $_GET['lp_post'];	
		//$form_field = listing_get_metabox_by_ID('form_field', $lp_post);
		$tagline_text = listing_get_metabox_by_ID('tagline_text',$lp_post);
		$faqs = listing_get_metabox_by_ID('faqs',$lp_post);
		if(!empty($faqs)){
			$faq =$faqs['faq'];
			$faqans =$faqs['faqans'];
		}
		$gAddress = listing_get_metabox_by_ID('gAddress',$lp_post);
		$latitude = listing_get_metabox_by_ID('latitude', $lp_post);
		$longitude = listing_get_metabox_by_ID('longitude',$lp_post);
		$plan_id = listing_get_metabox_by_ID('Plan_id',$lp_post);
		$phone = listing_get_metabox_by_ID('phone', $lp_post);
		$email = listing_get_metabox_by_ID('email', $lp_post);
		$website = listing_get_metabox_by_ID('website', $lp_post);
		$twitter = listing_get_metabox_by_ID('twitter', $lp_post);
		$facebook = listing_get_metabox_by_ID('facebook',$lp_post);
		$linkedin = listing_get_metabox_by_ID('linkedin', $lp_post);
		$gPlus = listing_get_metabox_by_ID('google_plus', $lp_post);
		$youtube = listing_get_metabox_by_ID('youtube', $lp_post);
		$instagram = listing_get_metabox_by_ID('instagram', $lp_post);
		$video = listing_get_metabox_by_ID('video', $lp_post);
		$listingprice = listing_get_metabox_by_ID('list_price', $lp_post);
		/* by zaheer on 17 march */
		$listingptext = listing_get_metabox_by_ID('list_price_to', $lp_post);
		/* end by zaheer on 17 march */		
		$metaFields = get_post_meta( $lp_post, 'lp_'.strtolower(THEMENAME).'_options_fields', true);
		$galleryImagesIDS = get_post_meta( $lp_post, 'gallery_image_ids', true);

		if(!empty($plan_id)){
			$plan_id = $plan_id;
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
		
	}else{
		wp_redirect( home_url() ); exit;

	}
	
	if(is_user_logged_in()){
		
		$current_user = wp_get_current_user();
		$userID = $current_user->ID;
		$post_author_id = get_post_field( 'post_author', $lp_post );

		if($userID != $post_author_id) {
			wp_redirect( home_url() ); exit;
		}
	}else{
		wp_redirect( home_url() ); exit;
	}	


	$current_cat='';
	$formFields='';
	$current_cat_array = get_the_terms($lp_post, 'listing-category');
	if(!empty($current_cat_array)){
		foreach($current_cat_array as $current_catt) {
				$current_cat = $current_catt->term_id;
		}
	}
	$term_id = $current_cat;
	$fieldIDs = listingpro_get_term_meta($term_id,'fileds_ids');
	
	if(!empty($fieldIDs)){
		$formFields = listingpro_field_type($fieldIDs);
	}

	/* EDIT FORM OUTPUT */

	$output = null;
	$output .= '
	<div class="page-container-four clearfix submit_new_style">
		<div class="col-md-12 col-sm-12">
			<div class="form-page-heading">
				<h3>'.$title.'</h3>
				<p>'.$subtitle.'</p>
			</div>
			<div class="post-submit">
				<div class="author-section border-bottom lp-form-row clearfix lp-border-bottom padding-bottom-40">
					<div class="lp-form-row-left text-left pull-left not-logged-in-msg">
						<img class="avatar-circle" src="'.plugins_url( '/images/author.jpg', dirname(__FILE__) ).'" />
						<p>'.esc_html__(listingpro_translation('You are currently signed in as'), 'listingpro').' <strong>'.listingpro_author_name().',</strong> <a href="'.wp_logout_url(esc_url(home_url('/'))).'" class="">'.esc_html__(listingpro_translation('Sign out'), 'listingpro').'</a> ' .esc_html__('or continue below and start submission.', 'listingpro').'</p>
					</div>
				</div>';
				$pcontent= '';	$page_data = get_page($lp_post); 	$pcontent = $page_data->post_content;	//$pcontent = get_the_content($lp_post);	

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

				$listing_btn_text = $listingpro_options['listing_edit_btn_text'];

				$btnText = '';
				if(!empty($listing_btn_text)) {
					$btnText = $listing_btn_text;
				}else {
					$btnText = esc_html__(listingpro_translation('Update & Preview'), 'listingpro');
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
								<div class="form-group">
									<label for="usr">'.$listing_title_text.'</label>
									<div class="help-text">
										<a href="#" class="help"><i class="fa fa-question"></i></a>
										<div class="help-tooltip">
											<p>'.esc_html__('Put here Listing title here and tell the name of your business to the world.', 'listingpro').'</p>
										</div>
									</div>
									<input type="text" value="'.get_the_title($lp_post).'" name="postTitle" class="form-control" id="usr">
								</div>
								<div class="form-group">
									<input type="text" name="tagline_text" value="'.$tagline_text.'" class="form-control" id="usr">									
								</div>';
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
								<select autocomplete="off" data-placeholder="'.esc_html__(listingpro_translation('Select your listing region'), 'listingpro').'" id="inputCity" name="location" class="select2 postsubmitSelect" tabindex="5">';
									$output .=	'<option value="">'.esc_html__('Select Location', 'listingpro').'</option>';
									$current_loc ='';
									$current_loc_array = get_the_terms($lp_post, 'location');
									if(!empty($current_loc_array)){
										foreach($current_loc_array as $current_locc) {
												$current_loc = $current_locc->term_id;
										}
									}
									$args = array(
										'post_type' => 'listing',
										'order' => 'ASC',
										'hide_empty' => false,
									);
									$locations = get_terms( 'location',$args);
									foreach($locations as $location) {										
										if($location->term_id == $current_loc){
											$selected = 'selected';
										}else{
											$selected = '';
										}
										$output .=	'<option '.$selected.' value="'.$location->term_id.'">'.$location->name.'</option>';
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
								<input value="'.$gAddress.'" type="text" class="form-control" name="gAddress" id="inputAddress" placeholder="'.esc_html__(listingpro_translation('Your address for google map'), 'listingpro').'">
								<input value="'.$latitude.'" type="hidden" id="latitude" name="latitude">
								<input value="'.$longitude.'" type="hidden" id="longitude" name="longitude">
							</div>';
							$output .='
						</div>
						<div class="row">';
							if($phoneSwitch == 1) {
								if($contact_show=="true"){
									$output .='
									<div class="form-group col-md-6 col-xs-12">
										<label for="inputPhone">'.esc_html__(listingpro_translation('Phone'), 'listingpro').'</label>
										<input value="'.$phone.'" type="text" class="form-control" name="phone" id="inputPhone" placeholder="'.esc_html__(listingpro_translation('Your contact number'), 'listingpro').'">
									</div>';
								}
							}
							if($webSwitch == 1) {
								$output .='
								<div class="form-group col-md-6 col-xs-12">
									<label for="inputWebsite">'.esc_html__(listingpro_translation('Website'), 'listingpro').'</label>
									<input value="'.$website.'" type="text" class="form-control" name="website" id="inputWebsite" placeholder="'.esc_html__(listingpro_translation('Your web URL'), 'listingpro').'">
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
										$output	.= LP_operational_hours_form($lp_post,true);
										$output	.='
									</div>';
								}
								$output .='
								<div class="form-group clearfix margin-bottom-0">
									<label for="inputCategory">'.$listing_cat_text.'</label>
								  	<select autocomplete="off" data-placeholder="'.esc_html__('Choose one categories', 'listingpro').'" id="inputCategory" name="category" class="select2 postsubmitSelect" tabindex="5">';
										$output .='<option value="">'.esc_html__('Select Category', 'listingpro').'</option>';
										$args = array(
											'post_type' => 'listing',
											'order' => 'ASC',
											'hide_empty' => false,
										);
										$categories = get_terms( 'listing-category',$args);
										foreach($categories as $category) {
											if($category->term_id == $current_cat){
												$selected = 'selected';
											}else{
												$selected = '';
											}
											$output .=	'<option '.$selected.' value="'.$category->term_id.'">'.$category->name.'</option>';
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
								<label for="inputTags">'.$listing_features_text.'</label><br>
								<p class="paragraph-form">'.esc_html__(listingpro_translation('Select your listing features'), 'listingpro').'</p>
								<div class="pre-load"></div>
								<div class="featuresDataContainer row clearfix" id="tags-by-cat">';
									if(!empty($term_id)){
										$termparent = get_term_by('id', $term_id, 'listing-category');
										$parent = $termparent->parent;
									}
									$features = listingpro_get_term_meta($term_id,'lp_category_tags');
									if(empty($features)){
										$features = listingpro_get_term_meta($parent,'lp_category_tags');
									}
									if(!empty($features)){
										$cheched = '';
										foreach($features as $feature){
											$terms = get_term_by('id', $feature, 'features');
											if(!empty($terms)){
												if(!empty($metaFields['lp_feature'])){
													if (in_array($feature, $metaFields['lp_feature'])) {
														$cheched =  "checked";
													}else{
														$cheched = '';
													}  
												}
												$output .='<div class="col-md-2 col-sm-4 col-xs-6"><div class="checkbox pad-bottom-10"><input '.$cheched.'  id="check_'.$terms->term_id.'" type="checkbox" name="lp_form_fields_inn[lp_feature][]" value="'.$terms->term_id.'" ><label for="check_'.$terms->term_id.'">'.$terms->name.'</label></div></div>
												';
											}
										}
									}
									$output .='
								</div>
								<div class="featuresDataContainer row clearfix" id="features-by-cat">';
									$output .= $formFields;
									$output	.='
								</div>
							</div>';
						}
						$output .='
						<div class="form-group clearfix">
							<div class="row">';
								if($currencySwitch == 1) {
									$output .='
									<div class="col-md-4">
										<label for="listingptext">'.esc_html__('Price Range', 'listingpro').'</label>
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
										<label for="listingprice">'.esc_html__('Price From', 'listingpro').'</label>
										<input value="'.$listingprice.'" type="text" name="listingprice" class="form-control" id="listingprice" placeholder="'.esc_html__(listingpro_translation('Only Digits'), 'listingpro').'">
									</div>';
								}
								if($priceSwitch == 1) {
									$output .='
									<div class="col-md-4">
										<label for="listingptext">'.esc_html__('Price To', 'listingpro').'</label>
										<input value="'.$listingptext.'" type="text" name="listingptext" class="form-control" id="listingptext" placeholder="'.esc_html__('Price To', 'listingpro').'">
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
									<textarea class="form-control" name="postContent" rows="8" id="inputDescription">'.$pcontent.'</textarea>
								</div>';
								if($faq_switch == 1) {
									$output .='
									<div class="form-group clearfix margin-bottom-0">
										<div id="tabs" class="clearfix">';
											if(!empty($faq)){
											 	$n=count($faq);
											 	if($n>0){
													$j=1;
													while($j <= $n){
														$output .='
														<div id="tabs-'.$j.'">
															<div class="form-group">
																<label for="inputLinkedIn">'.$listing_faq_text.'</label>
																<input type="text" class="form-control" placeholder="'.esc_html__('Questions', 'listingpro').'" name="faq['.$j.']" id="inputLinkedIn" value="'.$faq[$j].'">
															</div>
															<div class="form-group">
																<textarea class="form-control" placeholder="'.esc_html__('Answer', 'listingpro').'" name="faqans['.$j.']" rows="8" id="inputDescription">'.$faqans[$j].'</textarea>
															</div>
													  	</div>';	
														$j++;
													}
												}else {
													$output .='
													<div id="tabs-1">
														<div class="form-group">
															<label for="inputLinkedIn">'.$listing_faq_text.'</label>
															<input type="text" class="form-control" name="faq[1]" id="inputLinkedIn" placeholder="'.esc_html__(listingpro_translation('FAQ 1'), 'listingpro').'">
														</div>
														<div class="form-group">
															<textarea class="form-control" name="faqans[1]" rows="8" id="inputDescription"></textarea>
														</div>
												  	</div>';	
												}
												$output.='
												<div class="btn-container clearfix">	
												  	<ul>';
														if( is_array($faq) && count($faq)>0 ){
															$i=1;
															foreach ($faq as $q){
																$output .='<li><a href="#tabs-'.$i.'">'.$listing_faq_tabs_text.'</a></li>';
																$i++;
															}
														}
														else{
															$output .='<li><a href="#tabs-1">'.$listing_faq_tabs_text.'</a></li>';	
														}
														$output .='
													</ul>
												  	<a id="tabsbtn" class="lp-secondary-btn btn-first-hover">+</a>
											 	</div>';
											}
											$output .='
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
										<input value="'.$twitter.'" type="text" class="form-control" name="twitter" id="inputTwitter" placeholder="'.esc_html__(listingpro_translation('Your Twitter URL'), 'listingpro').'">
									</div>';
								}
								if($fbSwitch == 1) {
									$output .='
									<div class="form-group col-md-6 col-xs-12">
										<label for="inputFacebook">'.esc_html__(listingpro_translation('Facebook'), 'listingpro').'</label>
										<input value="'.$facebook.'" type="text" class="form-control" name="facebook" id="inputFacebook" placeholder="'.esc_html__(listingpro_translation('Your Facebook URL'), 'listingpro').'">
									</div>';
								}
								if($lnkSwitch == 1) {
									$output .='
									<div class="form-group col-md-6 col-xs-12">
										<label for="inputLinkedIn">'.esc_html__(listingpro_translation('LinkedIn'), 'listingpro').'</label>
										<input value="'.$linkedin.'" type="text" class="form-control" name="linkedin" id="inputLinkedIn" placeholder="'.esc_html__(listingpro_translation('Your LinkedIn URL'), 'listingpro').'">
									</div>';
								}
								if($googleSwitch == 1) {
									$output .='
									<div class="form-group col-md-6 col-xs-12">
										<label for="inputGooglePlus">'.esc_html__('Google Plus', 'listingpro').'</label>
										<input value="'.$gPlus.'" type="text" class="form-control" name="google_plus" id="inputGooglePlus" placeholder="'.esc_html__('Your Google Plus URL', 'listingpro').'">
									</div>';
								}
								if($ytSwitch == 1) {
									$output .='
									<div class="form-group col-md-6 col-xs-12">
										<label for="inputYoutube">'.esc_html__('Youtube', 'listingpro').'</label>
										<input value="'.$youtube.'" type="text" class="form-control" name="youtube" id="inputYoutube" placeholder="'.esc_html__('Your Youtube URL', 'listingpro').'">
									</div>';
								}
								if($instaSwitch == 1) {
									$output .='
									<div class="form-group col-md-6 col-xs-12">
										<label for="inputInstagram">'.esc_html__('Instagram', 'listingpro').'</label>
										<input value="'.$instagram.'" type="text" class="form-control" name="instagram" id="inputInstagram" placeholder="'.esc_html__('Your Instagram URL', 'listingpro').'">
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
										<textarea class="form-control" name="tags" id="inputTags" placeholder="'.esc_html__('Enter tags or keywords comma seprated...', 'listingpro').'">';
										$tags = get_the_terms($lp_post, 'list-tags');
										if ( $tags and ! is_wp_error($tags) ){
											$names = wp_list_pluck($tags ,'name');
											$output .= implode(',', $names);
										}
										$output .=	'
										</textarea>
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
											<label for="postVideo">'.esc_html__('Video ', 'listingpro').'<span>(Optional)</span></label>
											<input type="text" value="'.$video.'" class="form-control" name="postVideo" id="postVideo" placeholder="'.esc_html__('ex: https://youtu.be/lY2yjAdbvdQ', 'listingpro').'">
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
														</div>';
														$galleryImagesIDS = explode( ',', $galleryImagesIDS );
														foreach($galleryImagesIDS as $galID){
															$imgFull = wp_get_attachment_image_src( $galID, 'thumbnail');
															if(!empty($imgFull[0])){
																$output.= '
																<div id="filediv">													
																	<ul class="jFiler-items-list jFiler-items-grid grid1">
																		<li class="jFiler-item">	
																			<div class="jFiler-item-container">
																				<div class="jFiler-item-inner">		
																					<div class="jFiler-item-thumb">
																						<img src="'. $imgFull[0] .'" alt="post1" />
																					</div>		
																				</div>		
																			</div>
																			<a class="icon-jfi-trash jFiler-item-trash-action"></a>	
																			<input name="" id="file" multiple="multiple" value="'.$galID.'" type="hidden">
																		</li>
																	</ul>
																</div>';
															}
														}	
														$output .=	'
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
							<div class="form-group col-md-6 margin-bottom-0">
							  	<div class="checkbox form-group col-md-4">
							  	</div>
								<div class="form-group clearfix margin-bottom-0 preview-section pos-relative col-md-8 pull-right">
									<label for="previewListing">'.esc_html__('Click below to review your listing.', 'listingpro').'</label>
									<div class="error_box"></div>
									<input type="hidden" name="lp_post" value="'.$lp_post.'" /> 
									<input type="hidden" name="plan_id" value="'.$plan_id.'" /> 
									<input type="submit" name="listingedit" value="'.$btnText.'" class="lp-secondary-btn btn-first-hover" /> 
									<i class="fa fa-angle-right"></i>
								</div>';
								$output .= wp_nonce_field( 'edit_nonce', 'edit_nonce_field' ,true, false );
								$output .='
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>';

	return $output;
}
add_shortcode('listingpro_edit', 'listingpro_shortcode_edit');