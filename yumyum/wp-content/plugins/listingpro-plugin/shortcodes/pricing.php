<?php
/*------------------------------------------------------*/
/* Pricing plans
/*------------------------------------------------------*/
vc_map( array(
	"name"                      => esc_html__("Pricing Plans", "js_composer"),
	"base"                      => 'listingpro_pricing',
	"category"                  => esc_html__('Listingpro', 'js_composer'),
	"description"               => '',
	"params"                    => array(
		array(
			"type"			=> "textfield",
			"class"			=> "",
			"heading"		=> esc_html__("Title","js_composer"),
			"param_name"	=> "title",
			"value"			=> ""
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Subtitle', 'js_composer' ),
			'param_name'  => 'subtitle',
			'value'       => ''
		),
		array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => esc_html__("Pricing plans views","js_composer"),
			"param_name"  => "pricing_views",
			'value' => array(
				esc_html__( 'Horizontal View', 'js_composer' ) => 'horizontal_view',
				esc_html__( 'Vertical View', 'js_composer' ) => 'vertical_view',
			),
			'save_always' => true,
			"description" => ""
		),
	),
) );
function listingpro_shortcode_pricing($atts, $content = null) {
	extract(shortcode_atts(array(
		'title'   			=> '',
		'subtitle'   		=> '',
		'pricing_views'   	=> 'horizontal_view'
	), $atts));
	global $listingpro_options;
	
	global $wpdb;
	$dbprefix = '';
	$dbprefix = $wpdb->prefix;
	$user_ID = '';
	$user_ID = get_current_user_id();
	$output = null;
	$results = null;
	$table_name = $dbprefix.'listing_orders';
	$limitLefts = '';
	
	if( $pricing_views == 'horizontal_view' ) {
		$output .= '
		<div class="page-container-four clearfix">
			<div class="col-md-10 col-md-offset-1">
				<div class="page-header">
					<h3>'.$title.'</h3>
					<p>'.$subtitle.'</p>
				</div>
				<div class="page-inner-container">';
					$args = array(
						'post_type' => 'price_plan',
					);
					$query = new WP_Query( $args );
					if($query->have_posts()){
						while ( $query->have_posts() ) {
							$query->the_post();
							global $post;
							$plan_package_type = get_post_meta( get_the_ID(), 'plan_package_type', true );
							$post_price = get_post_meta(get_the_ID(), 'plan_price', true);
							$plan_time = '';
							$plan_time = get_post_meta(get_the_ID(), 'plan_time', true);
							$posts_allowed_in_plan = '';
							$posts_allowed_in_plan = get_post_meta(get_the_ID(), 'plan_text', true);
							//echo $posts_allowed_in_plan;
							
							if(!empty($plan_package_type) && $plan_package_type=="Package"){
								if(is_numeric($posts_allowed_in_plan)){
									$posts_allowed_in_plan = $posts_allowed_in_plan;
								}
								else{
									$posts_allowed_in_plan = esc_html__('unlimited', 'listingpro');
								}
							}
							

							$contact_show = get_post_meta( get_the_ID(), 'contact_show', true );
							if($contact_show == 'true'){
								$contact_checked = 'checked';
							}else{
								$contact_checked = 'unchecked';
							}
							
							$map_show = get_post_meta( get_the_ID(), 'map_show', true );
							if($map_show == 'true'){
								$map_checked = 'checked';
							}else{
								$map_checked = 'unchecked';
							}
							
							$video_show = get_post_meta( get_the_ID(), 'video_show', true );
							if($video_show == 'true'){
								$video_checked = 'checked';
							}else{
								$video_checked = 'unchecked';
							}
							
							$gallery_show = get_post_meta( get_the_ID(), 'gallery_show', true );
							if($gallery_show == 'true'){
								$gallery_checked = 'checked';
							}else{
								$gallery_checked = 'unchecked';
							}
							
							
							$plan_type_name = '';
							if( $plan_package_type=="Pay Per Listing" ){
								$plan_type_name = "Per Listing";
							}
							else{
								$plan_type_name = "Per Package";
							}
							
				
							$plan_text = '';
							$used = '';
							$plan_limit_left = '';
							
							if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
								$results = $wpdb->get_results( "SELECT * FROM ".$dbprefix."listing_orders WHERE user_id ='$user_ID' AND status = 'success' AND plan_type='$plan_package_type'" );
							}
							
							$used = '';
							if( !empty($results) && count($results)>0 ){
								if(!empty($plan_package_type) && $plan_package_type=="Package"){
									
									/* package details */
									foreach ( $results as $info ) {
										$used = $info->used;
									}
									
									if(is_numeric($posts_allowed_in_plan)){
										$plan_limit_left = (int)$posts_allowed_in_plan - (int)$used;
									}
									else{
										$plan_limit_left = $posts_allowed_in_plan;
									}
									
									$plan_text = esc_html__('Per Package ', 'listingpro');
								}
								else if(!empty($plan_package_type) && $plan_package_type=="Pay Per Listing"){
									$plan_text = esc_html__('Per Listing ', 'listingpro');
								}
								
							}
							else{
								if(!empty($plan_package_type) && $plan_package_type=="Package"){
									$plan_text = esc_html__('Per Package ', 'listingpro');
									$plan_limit_left = $posts_allowed_in_plan;
								}
								else if(!empty($plan_package_type) && $plan_package_type=="Pay Per Listing"){
									$plan_text = esc_html__('Per Listing ', 'listingpro');
								}
							}

							$output .='
							<div class="price-plan-box lp-border-radius-8 '.get_the_ID().'">
								<div class="price-plan-box-upper">
									<h1 class="clearfix">
										<span class="pull-left">'.get_the_title().'</span>';
										if(!empty($post_price)){
											$output .='<span class="pull-right">'.listingpro_currency_sign().$post_price.'</span>';
										}
										else{
											$output .='<span class="pull-right">'.esc_html__("Free", "listingpro").'</span>';
										}
										
									$listingCalculations = null;	
									$output .=
									'</h1>
									<p class="clearfix">
										<span class="pull-left">'.$plan_text.'</span>
										<span class="pull-right">';
											if( !empty($plan_time) ){
												$output .= esc_html__(listingpro_translation('Duration'), 'listingpro').' : '.$plan_time.' '.esc_html__(listingpro_translation('days'), 'listingpro');
											}
											else{
												$output .= esc_html__(listingpro_translation('Duration'), 'listingpro');
												$output .= esc_html__(' : Unlimited days', 'listingpro');
											}
											
											if( $plan_package_type=="Package" ){
												$plan_text = get_post_meta(get_the_ID(), 'plan_text', true);
												if( !empty($plan_text) && isset($plan_text) ){
													$plan_text = esc_html__('Total Listings : ', 'listingpro').$plan_text;
													$listingCalculations = $plan_text;
												}
												else{
													$plan_text = esc_html__('unlimited', 'listingpro');
													$plan_text = esc_html__('Total Listings : ', 'listingpro').$plan_text;
													$listingCalculations = $plan_text;
												}
										
												if( !empty($plan_limit_left) && is_numeric($plan_limit_left) ){
													$limitLefts .= esc_html__('Available Listings : ', 'listingpro'). $plan_limit_left;
													$listingCalculations .= ' . '.$limitLefts;
												}
												
												
												if(!empty($used) && isset($used)){
													$used =  $used;
												}
												else{
													$used =  0;
												}
												
												$listingCalculations .= ' . Used : '.$used;
												
												$output .='<p class="clearfix">'.$listingCalculations.'</p>';
											}
											
											$output .='
										</span>
									</p>
								</div>
								<div class="price-plan-box-bottom lp-border clearfix">
									<div class="price-plan-content  pull-left">
										<ul class="list-style-none">
											<li>
												<span class="icon-text">'.listingpro_icon8($map_checked).'</span>
												<span>'.esc_html__(listingpro_translation('Map Display'), 'listingpro').'</span>
											</li>
											<li>
												<span class="icon-text">'.listingpro_icon8($contact_checked).'</span>
												<span>'.esc_html__(listingpro_translation('Contact Display'), 'listingpro').'</span>
											</li>
											<li>
												<span class="icon-text">'.listingpro_icon8($gallery_checked).'</span>
												<span>'.esc_html__(listingpro_translation('Image Gallery'), 'listingpro').'</span>
											</li>
											<li>
												<span class="icon-text">'.listingpro_icon8($video_checked).'</span>
												<span>'.esc_html__(listingpro_translation('Video'), 'listingpro').'</span>
											</li>
										</ul>
									</div>
									<form  enctype="multipart/form-data" method="post" action="'.listingpro_url('submit-listing').'" class="price-plan-button  pull-right">
										<input type="hidden" name="plan_id" value="'.get_the_ID().'" />';
										
										if( !empty($plan_package_type) && $plan_package_type=="Package" ){
											
											$plan_text = get_post_meta(get_the_ID(), 'plan_text', true);
											if(!empty($plan_text)){
											
												if(!empty($plan_limit_left)){
													
												
													$output .='<input id="submit" class="lp-secondary-btn btn-second-hover" type="submit" value="'.esc_html__(listingpro_translation('Get Started Now'), 'listingpro').'" name="submit">';
												}
												else{
													$output .='<p>Package <strong>limit</strong> has been exceeded </p>';
												}
											}
											else{
												$output .='<p>A <strong>Package</strong> should have a price </p>';
											}
										}
										
										else{
											$output .='<input id="submit" class="lp-secondary-btn btn-second-hover" type="submit" value="'.esc_html__(listingpro_translation('Get Started Now'), 'listingpro').'" name="submit">';
										}
										
										
										$output .= wp_nonce_field( 'price_nonce', 'price_nonce_field' ,true, false );
										$output .='
									</form>
								</div>
							</div>';
						}/* END WHILE */
						wp_reset_postdata();
					}else {
						echo '<p class="text-center">'.esc_html__(listingpro_translation('There is no Plan available right now.'), 'listingpro').'</p>';
					}
					$output .= '
				</div>
			</div>
		</div>';
	}elseif( $pricing_views == 'vertical_view' ) {
		$output .= '
		<div class="col-md-10 col-md-offset-1 padding-bottom-40 '.$pricing_views.'">
			<div class="page-header">
				<h3>'.$title.'</h3>
				<p>'.$subtitle.'</p>
			</div>
			<div class="page-inner-container">
				<div class="row">';
					$args1 = array(
						'post_type' => 'price_plan',
					);
					$query1 = new WP_Query( $args1 );
					$gridNumber = 0;
					if($query1->have_posts()){
						while ( $query1->have_posts() ) {
							$query1->the_post(); $gridNumber++;
							global $post;
							$plan_package_type = get_post_meta( get_the_ID(), 'plan_package_type', true );
							$post_price = get_post_meta(get_the_ID(), 'plan_price', true);

							$plan_time = '';
							$plan_time = get_post_meta(get_the_ID(), 'plan_time', true);
							$posts_allowed_in_plan = '';
							$PostAllowedInPlan = get_post_meta(get_the_ID(), 'plan_text', true);
							if(!empty($PostAllowedInPlan)){
								$posts_allowed_in_plan = get_post_meta(get_the_ID(), 'plan_text', true);
							}
							else{
								$posts_allowed_in_plan = 'unlimited';
							}
							

							$contact_show = get_post_meta( get_the_ID(), 'contact_show', true );
							if($contact_show == 'true'){
								$contact_checked = 'checked';
							}else{
								$contact_checked = 'unchecked';
							}
							
							$map_show = get_post_meta( get_the_ID(), 'map_show', true );
							if($map_show == 'true'){
								$map_checked = 'checked';
							}else{
								$map_checked = 'unchecked';
							}
							
							$video_show = get_post_meta( get_the_ID(), 'video_show', true );
							if($video_show == 'true'){
								$video_checked = 'checked';
							}else{
								$video_checked = 'unchecked';
							}
							
							$gallery_show = get_post_meta( get_the_ID(), 'gallery_show', true );
							if($gallery_show == 'true'){
								$gallery_checked = 'checked';
							}else{
								$gallery_checked = 'unchecked';
							}
							
							$plan_hot = '';
							$plan_hot = get_post_meta( get_the_ID(), 'plan_hot', true );
							
							$plan_type = '';
							$plan_type_name = '';
							$plan_type = get_post_meta(get_the_ID(), 'plan_package_type', true);
							if( $plan_type=="Pay Per Listing" ){
								$plan_type_name = "Per Listing";
							}
							else{
								$plan_type_name = "Per Package";
							}
				
							$plan_text = '';
							$used = '';
							$plan_limit_left = '';
							if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
								$results = $wpdb->get_results( "SELECT * FROM ".$dbprefix."listing_orders WHERE user_id ='$user_ID' AND status = 'success' AND plan_type='$plan_type'" );
							}
							
							
			
							if( !empty($results) && count($results)>0 ){
								$used = '';
								foreach ( $results as $info ) {
									$used = $info->used;
								}
								if(is_numeric($posts_allowed_in_plan)){
									$plan_limit_left = (int)$posts_allowed_in_plan - (int)$used;
								}
								else{
									$plan_limit_left = 'unlimited';
								}
								
							}
							else{
								$plan_limit_left = $PostAllowedInPlan;
							}

							if( !empty ( $plan_package_type ) ){
								if( $plan_package_type=="Pay Per Listing" ){
									$plan_text = '';
								}
								else if( $plan_package_type=="Package" ){
									$plan_text = get_post_meta(get_the_ID(), 'plan_text', true);
									if( !empty($plan_text) && isset($plan_text) ){
										$plan_text = esc_html__('Max. listings allowed : ', 'listingpro').$plan_text;
									}
								}
							}

							$hotClass = '';
							if(!empty($plan_hot) && $plan_hot=="true") {
								$hotClass = 'featured-plan';
							}else {
								$hotClass = '';
							}

							$output .='
							<div class="col-md-4 '.get_the_ID().' '.$hotClass.'">
								<div class="lp-price-main lp-border-radius-8 lp-border text-center">';
								
								$user_ID = get_current_user_id();
								
								
								if( !empty($plan_type) && $plan_type=="Package" ){
									if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
										$results = $wpdb->get_results( "SELECT * FROM ".$dbprefix."listing_orders WHERE user_id ='$user_ID' AND status = 'success' AND plan_type='$plan_type'" );
									}
								}
								if(is_numeric($plan_limit_left)){
									if( !empty($results) && count($results)>0 ){
										if(!empty($post_price) && $plan_limit_left>0){
											$output .='<div class="lp-sales-option">
															<div class="sales-offer">
																Active
															</div>
														</div>';
										}
									}
								}
								else if(!empty($post_price) && $plan_limit_left=="unlimited"){
										$output .='<div class="lp-sales-option">
														<div class="sales-offer">
															Active
														</div>
													</div>';
								}
								
									$output .='
									<div class="lp-title">
										<a>'.get_the_title().'</a>';
										if(!empty($post_price)){
											$output .='<p>'.listingpro_currency_sign().$post_price.'</p>';
										}
										else{
											$output .='<p>'.esc_html__("Free", "listingpro").'</p>';
										}
										if(!empty($plan_type_name)){
											$output .='<span class="package-type">'.$plan_type_name.'</span><br><br>';
										}
										
										if(is_numeric($plan_limit_left)){
											if( !empty($results) && count($results)>0 ){
												if(!empty($post_price) && $plan_limit_left>0){
													$output .= '<span style="font-size:12px;color:#fff" class="allowedListing">'.esc_html__('Remaining Listings : ', 'listingpro') . $plan_limit_left.'</span>';
												}
											}
										}
										
									$output .='
									</div>';
									
									$output .='
									<div class="lp-price-list">';
									if(!empty($plan_hot) && $plan_hot=="true"){
										$output .='<div class="lp-hot">hot</div>';
									}
									
										
										$output .='<ul class="lp-listprc">
											<li>
												<span class="icon-text">
													<img class="icon icons8-Cancel" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAFaElEQVRoQ+1aTVbbVhT+rpSDO6s5EePACgqTVh7F7ABWgFkBZlKbUckInAnJCmJWULICxMhuJjgrCIxxDnQGja3bcyU9+0lI1pNsSk9OPAL8/r77893v3QfhO/nQd4IDP4CkefLtp9vXzH6dmesErgK0Ph3HAwbdye9E5BFZH3//dXmwqIiY2yNHvZs6Ee0Q0Ch6KAauAHjMfHpQW/GKztfHlwbS+Wu4xYw9AupqQQZ/BsTa8IjsK93ibz/dro/Ho6plUZUZdWJsgfBqOjcA9KYsoMJAjnq3q0TjDxMAjGuAuz5edA9qy2Jh44+A4/Foi4maBPwsExnwKhV7e39jOQhD008hIOIFMD4AqDLwN4EOW+7Ld6abZY07ubyt/nM/aipAEnKWZW8nc0jGZQE0BnLc/7pH4ODQDHysVOxGUavlAZaDPjyMPAL9ImN9xu5BzenKz0e9YcMinJBlb6aRhBGQ4/5QQilKZtpfhBdmgTruD98RsEeWvSGHFkKxiM6T4Aole6f/tQnwiYQSM5rKQnnWnfd7yUXJuSCP/LGAqIL5Tau2cpi29kyPRDnx5yxLzHvgWfOD3HkYnQf1iHHaqjmZFJ8JRCxi0fgysASePpzSAHX6N5cCQmi9UnlRn5WTmUCO+8NzoVhJ7LbrbD2l5dPWnuQl43rpJ3tdQEiuZNWZVCAqpCQvKhV7ddHslGcUPS8ty67rCe8zb6aBSQWivPEcIRXRrNQqgLDd+s05kx87vZtDEP0hBbPtOptJYzwCMqE6xnWr5qzmWW+R3+sMpdcQ2SOsMeMrUQBpXnkEpNMbdkHYmUV1izy8WitGLhkMpbySxmCPgfSHHNKtvVZUO5UFGKdZvmjVViZCVF8zAvsFwN1SxV7TczcGZJrk/Lntrmh3ibJHNJvX6Q+lVm2Z0Oxx/2YgEiYZXnEg04R633adptkx5hulaDZUDvZ6XhQo+ZIM/SQQD0SvdbaY75izZyuGEhCKZvP20+bE6lscSFRJlVjLW3Se702EYNr6U1aN51ICSJjoLdcxVsXMuCgqJE2FYBqQkBjGt5LwLddZVmNKA9ELV5Lz84Tgw8P4koDVPCGYtU4nYlbd4KWByCY6GAY12+7L93nhpgvBssy4cCCPwaDbdp3dLDBpQjAPeNr3uUAURxdN9rhn0sFoWsmYodJARPl1KTVH9+jC6Dfqb52JFmLEwcTzKV29mnpmctnjWaw1Z0EUa/n+2IvABG2db9+wyn5wQYs1E0wPnhxnVBCn3M6DlruyUWYzHQzAA4BEQVfLMlTyDIosZkoUmaQSaR7RGIIZdVVbZ1G3TCUaRQm0Xaeqg3wyGa96VLJZ3n3b1POFZLwKL+n2tV1nzXSTrCp8f49qnhA03aPTH0pFrxpdrILw6t2E4vGZuifptSPsryHBVqkSRf1R62c9usCYWm+R4yJ9JReqVG/IXpnicOoVnLVcZ3uRByu61vTild2amtmgIxoPwnb/8zToQhbVW7bZF6//dcs0qzWU5tHce4eyiOh/n7Ff9O5RNIzU+BgIg4jIBRKyWNQiCt5GzOR6WQAyT3+LMVUERkD0WI0OeLZUsXcX3UqN2Em6jFGv2Tw3jYEEYMIH0G703nfHoEOTy5SJdyIvyNtH+KxHaKh2qcn8QkBkwUDvYNQNC2bwDHdFRF3ft06LVvBgLcvfYeZGcPWNnvWY7WbRtQoDiRVNn5sKUPh3UbvwGORZln2dfOuLlPErAksnsR77hwLmCx84/M+ep5NuDrQZqBH0iwt+ghBinPngblkAMyVKwfNMhoeggn8gqDOhqmS8GiDXU2LI+7nnA968h9fPWTq0yoJ9qnk/gDyVZcuu+y8Ax3BgT7fNbAAAAABJRU5ErkJggg==" alt="icon-cross">
												</span>';
												$output .= '<span>';
												if( !empty($plan_time) ){
													$output .= esc_html__(listingpro_translation('Duration'), 'listingpro').' : '.$plan_time.' '.esc_html__(listingpro_translation('days'), 'listingpro');
												}
												else{
													$output .= esc_html__(listingpro_translation('Duration'), 'listingpro');
													$output .= esc_html__(' : Unlimited days', 'listingpro');
												}
												$output .= '</span>';
												$output .='</li>';
												
												if(!empty($posts_allowed_in_plan) && $plan_type=="Package"){
													$output .='<li>';
													$output .='<span class="icon-text">'.listingpro_icon8('checked').'</span>';
													$output .= '<span>'.esc_html__('Max. Listings : ', 'listingpro'). $posts_allowed_in_plan.'</span>';
													$output .='</li>';
												}
											
												if(empty($posts_allowed_in_plan) && $plan_type=="Package"){
													$output .='<li>';
													$output .='<span class="icon-text">'.listingpro_icon8('checked').'</span>';
													$output .= '<span>'.esc_html__('Max. Listings : Unlimited', 'listingpro').'</span>';
													$output .='</li>';
												}
											
												
												$output .='
											<li>
												<span class="icon icons8-Cancel">'.listingpro_icon8($map_checked).'</span>
												<span>'.esc_html__(listingpro_translation('Map Display'), 'listingpro').'</span>
											</li>
											<li>
												<span class="icon icons8-Cancel">'.listingpro_icon8($contact_checked).'</span>
												<span>'.esc_html__(listingpro_translation('Contact Display'), 'listingpro').'</span>
											</li>
											<li>
												<span class="icon icons8-Cancel">'.listingpro_icon8($gallery_checked).'</span>
												<span>'.esc_html__(listingpro_translation('Image Gallery'), 'listingpro').'</span>
											</li>
											<li>
												<span class="icon icons8-Cancel">'.listingpro_icon8($video_checked).'</span>
												<span>'.esc_html__(listingpro_translation('Video'), 'listingpro').'</span>
											</li>
										</ul>';
										$output .='<form method="post" action="'.listingpro_url('submit-listing').'" class="price-plan-button">
											<input type="hidden" name="plan_id" value="'.$post->ID.'" />';
											
											if(empty($post_price) && $plan_type=="Package"){
												$output .='<p>A <strong>Package</strong> should have a price </p>';

											}
											else if( !empty($plan_type) && $plan_type=="Package" ){
												if(!empty($plan_limit_left)){
											
													$output .='<input id="submit" class="lp-price-free lp-without-prc btn" type="submit" value="'.esc_html__('Continue', 'listingpro').'" name="submit">';
												}
												else{
													$output .='<p>Package <strong>limit</strong> has been exceeded </p>';
												}
											}
											else{
											
													$output .='<input id="submit" class="lp-price-free lp-without-prc btn" type="submit" value="'.esc_html__('Continue', 'listingpro').'" name="submit">';
												
												
											}
											$output .= wp_nonce_field( 'price_nonce', 'price_nonce_field' ,true, false );
											$output .='
										</form>
									</div>
								</div>
							</div>';
							if($gridNumber%3 == 0) {
								$output.='<div class="clearfix"></div>';
							}
						}/* END WHILE */
						wp_reset_postdata();
					}else {
						echo '<p class="text-center">'.esc_html__(listingpro_translation('There is no Plan available right now.'), 'listingpro').'</p>';
					}
					$output .= '
				</div>
			</div>
		</div>';
	}			
	
	return $output;
}
add_shortcode('listingpro_pricing', 'listingpro_shortcode_pricing');