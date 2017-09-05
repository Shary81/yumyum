<div id="ads" class="tab-pane fade active in">
	<div class="tab-header">
		<h3><?php esc_html_e('Ads - Promote your Listings','listingpro'); ?></h3>
	</div>
	<?php
		global $listingpro_options;
		$paypalStatus = false;
		$stripeStatus = false;
		$wireStatus = false;
		if($listingpro_options['enable_paypal']=="1"){
			$paypalStatus = true;
		}
		if($listingpro_options['enable_stripe']=="1"){
			$stripeStatus = true;
		}
		if($listingpro_options['enable_wireTransfer']=="1"){
			$wireStatus = true;
		}
		
		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;
		$lp_random_ads = $listingpro_options['lp_random_ads'];
		$lp_detail_page_ads = $listingpro_options['lp_detail_page_ads'];
		$lp_top_in_search_page_ads = $listingpro_options['lp_top_in_search_page_ads'];
		$currencyprice = $listingpro_options['currency_paid_submission'];
		$ads_durations = $listingpro_options['listings_ads_durations'];

		$lp_promotion_title = $listingpro_options['lp_pro_title'];
		$lp_promotion_text = $listingpro_options['lp_pro_text'];
		$lp_promotion_img = $listingpro_options['lp_pro_img']['url'];

		$levels;

		if( !empty($lp_random_ads) ){
			$levels[$lp_random_ads]= $lp_random_ads.$currencyprice;
		}
		if( !empty($lp_detail_page_ads) ){
			$levels[$lp_detail_page_ads]= $lp_detail_page_ads.$currencyprice;
		}
		if( !empty($lp_top_in_search_page_ads) ){
			$levels[$lp_top_in_search_page_ads]= $lp_top_in_search_page_ads.$currencyprice;
		}
		
		$argsss=array(
			'post_type' => 'listing',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'author' => $user_id,
			'meta_query'=> array(
				'relation' => 'OR',
				array(
					'key' => 'campaign_status',
					'compare' => 'NOT EXISTS',
				),
				array(
					'key' => 'campaign_status',
					'value' => array('active', 'in progress'),
					'compare' => 'NOT IN',
				),
				
			),
		);
		$my_queryyy = null;
		$my_queryyy = new WP_Query($argsss);
		
		$user_ID = '';
		$user_ID = get_current_user_id();
		
		$publisedPosts = count_user_posts_by_status($post_type = 'listing',$post_status = 'publish',$user_ID);
		
		?>
	<div class="aligncenter">
		<div class="lp-flip">
			<div class="lp-card">
				
					<?php if( (!empty($publisedPosts))&& ($my_queryyy->have_posts()) ){ ?>
						<div class="promotional-section padding">
							<div class="promotiona-text">
								<h3><?php echo $lp_promotion_title; ?></h3>
								<p><?php echo $lp_promotion_text; ?></p>
							</div>
							<img src="<?php echo $lp_promotion_img; ?>" alt="">
							<a href="#" class="lp-submit-btn"><?php esc_html_e('Get Started Now!','listingpro'); ?></a>
						</div>
					<?php } else{ ?>
						<div class="text-center no-result-found col-md-12 col-sm-6 col-xs-12 margin-bottom-30">
							<h1><?php esc_html_e('Ooops!','listingpro'); ?></h1>
							<p><?php esc_html_e('Sorry ! Your have no Published listings yet!','listingpro'); ?></p>
						</div>
					<?php } ?>
				
				<?php
					$ads_promo_url = get_template_directory_uri().'/include/paypal/form-handler2.php';
				?>
				<form id="ads_promotion" name="ads_promotion" action="<?php echo esc_url($ads_promo_url); ?>" method="POST">
					<?php
						$ads_promo_url = get_template_directory_uri().'/include/paypal/form-handler2.php';
					?>
					<div class="promotional-section lp-promote-listing-margin">
						<div class="lp-face lp-front lp-pay-options margin-bottom-30 lp-dash-sec">
							<ul class="lp-inner">
								<?php
									if ( $my_queryyy->have_posts() ) {
										while ( $my_queryyy->have_posts() ) {
											$my_queryyy->the_post();
											$listingcurrency = listing_get_metabox_by_ID('listingcurrency', get_the_ID());
											$listingprice = listing_get_metabox_by_ID('listingprice', get_the_ID());
											echo '
											<li class="col-md-1 col-xs-12">
												<div class="lp-list-view-thumb">
													<div class="lp-list-view-thumb-inner">';
														if ( has_post_thumbnail()) {
															$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'thumbnail' );
															if(!empty($image[0])){
																echo "<a href='".get_the_permalink()."' >
																		<img src='" . $image[0] . "' />
																	</a>";
															}else {
																echo "<a href='".get_the_permalink()."' >
																		<img src='".esc_url('https://placeholdit.imgix.net/~text?txtsize=22&txt=150%C3%97150&w=150&h=150')."' />
																	</a>";
															}
														}else {
															echo "<a href='".get_the_permalink()."' >
																	<img src='".esc_url('https://placeholdit.imgix.net/~text?txtsize=22&txt=150%C3%97150&w=150&h=150')."' />
																</a>";
														}
														echo '
													</div>
												</div>
												<div class="lp-list-view-content-upper lp-list-view-content-bottom">
													<a href="'. get_the_permalink().'"><h4>'.get_the_title().'</h4></a>
													<ul class="lp-grid-box-price list-style-none list-pt-display">';
														$cats = get_the_terms( get_the_ID(), 'listing-category' );
														if(!empty($cats)){
															foreach ( $cats as $cat ) { 
																$category_image = listing_get_tax_meta($cat->term_id,'category','image');
																echo '
																<li class="">';
																	if(!empty($category_image)){
																		echo '
																		<a class="category-cion" href="'. get_term_link($cat).'">
																			<img class="icon icons8-Food" src="'. esc_attr($category_image).'" alt="cat-icon">
																		</a>';
																	}
																	echo '
																	<a href="'. get_term_link($cat).'">
																		'. $cat->name .'
																	</a>
																</li>';
															}
														}
														echo '
														<li>
															<span>'. esc_html($listingcurrency.$listingprice).'</span>
														</li>
														<li>
															<span class="lp-list-sp-icon">
																<i class="fa fa-calendar"></i>
															</span>
															<span class="lp-list-sp-text">
																'. get_the_time( get_option( 'date_format' ) ).'
															</span>
														</li>
													</ul>
													<div class="promote-btn pull-right">
														<input type="submit" name="promote_submit" id="lp-front" class="lp-promotebtn btn btn-first-hover"  value="'.esc_html__('Promote','listingpro').'"/>
														<input type="hidden" data-title="'.get_the_title().'" name="post_id" value="'.get_the_id().'">
													</div>
												</div>
											</li>';
											wp_reset_postdata();
										}
									} else {
									}
								?>
							</ul>
						</div>
					</div>
					<div class="promotional-section">
						<div class="lp-face lp-back1 lp-pay-options margin-bottom-30 lp-dash-sec"> 
							<h4><?php echo esc_html__('Where you want to show your ad', 'listingpro'); ?></h4>
							<div class="availableprice_options  padding-top-30">
								<?php if( is_array($levels) && count($levels)>0 ){ ?>
									<div class="checkboxx">
										<div class="plan-img">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/plan.png" alt="">
										</div>
										<div class="checkbox pad-bottom-10">
										  	<input class="checked_class" data-package="lp_random_ads" type="checkbox" name="package_level[lp_random_ads]" value="<?php echo $lp_random_ads; ?>">
										  	<label><?php esc_html_e('Show Random Ads  ','listingpro'); ?>(<?php echo $lp_random_ads.' '.$currencyprice; ?>)</label>
									  	</div>
									</div>
									<div class="checkboxx">
										<div class="plan-img">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/plan1.png" alt="">
										</div>
										<div class="checkbox pad-bottom-10">
									  		<input class="checked_class" data-package="lp_detail_page_ads" type="checkbox" name="package_level[lp_detail_page_ads]" value="<?php echo $lp_detail_page_ads; ?>">
										  	<label><?php esc_html_e('Show Detail Page Ads ','listingpro'); ?>(<?php echo $lp_detail_page_ads.' '.$currencyprice; ?>)</label>
									  	</div>
									</div>
									<div class="checkboxx">
										<div class="plan-img">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/plan2.png" alt="">
										</div>
										<div class="checkbox pad-bottom-10">
											<input class="checked_class" data-package="lp_top_in_search_page_ads" type="checkbox" name="package_level[lp_top_in_search_page_ads]" value="<?php echo $lp_top_in_search_page_ads; ?>">
										  	<label><?php esc_html_e('Show Ads in search and taxonomy  ','listingpro'); ?>(<?php echo $lp_top_in_search_page_ads.' '.$currencyprice; ?>)</label>
										</div>
									</div>
									<input id="totalprice" type="hidden" name="total" value="0" />
								<?php } ?>
						   	</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6 text-left">
										<?php 
											if(!empty($ads_durations)){
												if($ads_durations=="1"){
													echo '<strong>Ad duration : </strong><strong><span>'.$ads_durations.' Day</span></strong>';
												}
												else{
													echo '<strong>Ad duration : </strong><strong><span>'.$ads_durations.' Days</span></strong>';
												}
											}
										?>
									</div>
									<div class="col-md-6 text-right">
										<span class="pricetotal">
											<strong><?php esc_html_e('Total : ','listingpro'); ?></strong><strong><span id="price">0</span>
											<?php echo ' '.$currencyprice; ?></strong>
										</span>
									</div>
								</div>
							</div>
							<a href="#" id="lp-next" class=" hide lp-next1 promotebtn btn btn-first-hover"><?php echo esc_html__('next', 'listingpro'); ?> <i class="fa fa-angle-double-right"></i></a>
							<span class="show"><?php echo esc_html__('next', 'listingpro'); ?>	<i class="fa fa-angle-double-right"></i></span>
							<button id="lp-back1" class="promotebtn btn btn-first-hover" style="float:left;"><i class="fa fa-angle-double-left"></i> <?php echo esc_html__('Back', 'listingpro'); ?></button>
						</div>
					</div>
					<div class="promotional-section">
						<div class="lp-face lp-back2 lp-pay-options margin-bottom-30 lp-dash-sec"> 
							<?php if($wireStatus==true){?>
								<div class="lp-method-wrap lp-listing-form pos-relative">
									<label>
										<img class="" src="<?php echo get_template_directory_uri() ?>/assets/images/wire.png" alt="userimg" />
										<div class="radio radio-danger">
											<input class="radio_checked" type="radio" name="method" id="rd1" value="wire">
											<label for="rd1">
											</label>
										</div>
									</label>
								</div>
							<?php } ?>
							<?php if($paypalStatus==true){?>
								<div class="lp-method-wrap lp-listing-form pos-relative">
									<label>
										<img class="" src="<?php echo get_template_directory_uri() ?>/assets/images/paypal.png" alt="wire" />
										<div class="radio radio-danger">
											<input class="radio_checked" type="radio" name="method" id="rd3" value="paypal">
											<label for="rd1">
											</label>
										</div>
									</label>
								</div>
							<?php } ?>
							<?php if($stripeStatus==true){  ?>
								<div class="lp-method-wrap lp-listing-form pos-relative">
									<label>
										<img class="" src="<?php echo get_template_directory_uri() ?>/assets/images/stripe.png" alt="wire" />
										<div class="radio radio-danger">
											<input class="radio_checked" type="radio" name="method" id="rd3" value="stripe">
											<label for="rd1">
											</label>
										</div>
									</label>
								</div>
							<?php } ?>
							
							<?php if($wireStatus==false && $paypalStatus==false && $stripeStatus==false){?>
								<div class="text-center no-result-found col-md-12 col-sm-6 col-xs-12 margin-bottom-30">
									<h1> <?php esc_html_e('Ooops!','listingpro'); ?></h1>
									<p> <?php esc_html_e('Sorry ! Your have no checkout payment method','listingpro'); ?></p>
								</div>
							<?php } ?>
							
							<div class="clearfix"></div>
							<input type="hidden" name="listing_id" value="" />
							<input type="hidden" name="func" value="start ads" />
							<input type="submit" name="submit_ads_prom" class="hide lp-next2 promotebtn btn btn-first-hover" value="<?php echo esc_html__('Proceed', 'listingpro'); ?>" />
							<span class="proceed-btn show"><?php echo esc_html__('Proceed', 'listingpro'); ?> <i class="fa fa-send"></i></span>
							<button id="lp-back2" class="promotebtn btn btn-first-hover" style="float:left;"><i class="fa fa-angle-double-left"></i> <?php echo esc_html__('Back', 'listingpro'); ?></button>
							<input type="hidden" name="currency" value="<?php echo $currencyprice; ?>">
							
							
						</div>
					</div>
				</form>
			</div>	 
		</div>
	</div>
</div>

<?php
	$pubilshableKey = '';
	$secritKey = '';
	
	$pubilshableKey = $listingpro_options['stripe_pubishable_key'];
	$secritKey = $listingpro_options['stripe_secrit_key'];
	
	$ajaxURL = '';
	$ajaxURL = admin_url( 'admin-ajax.php' );
	
	?>
	<script>
	var listing_id;
	var packages = [];
	
	jQuery('#ads_promotion').on('submit', function(e){
		
		$this = jQuery(this);
		listing_id = $this.find('input[name="post_id"]').val();
		
		jQuery('input.checked_class[type="checkbox"]:checked').each(function () {
			 packages.push(jQuery(this).data('package'));
		 });
		
	});
	
	var handler = StripeCheckout.configure({
	  key: "<?php echo $pubilshableKey; ?>",
	  image: "https://stripe.com/img/documentation/checkout/marketplace.png",
	  locale: "auto",
	  token: function(token) {
		token_id = token.id;
		token_email = token.email;
		
		jQuery.ajax({
			type: "POST",
			dataType: "json",
			url: "<?php echo $ajaxURL; ?>",
			data: { 
				"action": "listingpro_save_package_stripe", 
				"token": token_id, 
				"email": token_email, 
				"listing": listing_id, 
				"packages": packages 
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

	window.addEventListener("popstate", function() {
	  handler.close();
	});
	</script>
<!--ads-->