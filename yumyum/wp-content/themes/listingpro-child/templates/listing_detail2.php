<?php
/* The loop starts here. */
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		setPostViews(get_the_ID());
		$claimed_section = listing_get_metabox('claimed_section');
		$tagline_text = listing_get_metabox('tagline_text');
		
		$plan_id = listing_get_metabox_by_ID('Plan_id',get_the_ID());
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

		$claim = '';
		if($claimed_section == 'claimed') {
			$claim = '<span class="claimed"><i class="fa fa-check"></i> '. esc_html__('Claimed', 'listingpro').'</span>';

		}elseif($claimed_section == 'not_claimed') {
			$claim = '';

		}
		global $post;
		
		$resurva_url = get_post_meta($post->ID, 'resurva_url', true);
		$menuOption = false;
		$menuTitle = '';
		$menuImg = '';
		$menuMeta = get_post_meta($post->ID, 'menu_listing', true);
		if(!empty($menuMeta)){
			$menuTitle = $menuMeta['menu-title'];
			$menuImg = $menuMeta['menu-img'];
			$menuOption = true;
		}
		
		$timekit = false;
		$timekit_booking = get_post_meta($post->ID, 'timekit_booking', true);
		if(!empty($timekit_booking)){
			$timekitAPP = $timekit_booking['timekit-app'];
			$timekitAPI = $timekit_booking['timekit-api-token'];
			$timekitListing = $timekit_booking['listing_id'];
			$timekitName = $timekit_booking['timekit_name'];
			$timekitEmail = $timekit_booking['timekit_email'];
			$timekit = true;
		}
		?>
		<!--==================================Section Open=================================-->
		<section class="aliceblue listing-second-view">
			<!--=======Galerry=====-->
			<?php 
				$IDs = get_post_meta( $post->ID, 'gallery_image_ids', true );
				if (!empty($IDs)) {
					if($gallery_show=="true"){
						$imgIDs = explode(',',$IDs);
						$numImages = count($imgIDs);
						if($numImages >= 1 ){ ?>
							<div class="pos-relative">
								<div class="spinner">
								  <div class="double-bounce1"></div>
								  <div class="double-bounce2"></div>
								</div>
								<div class="single-page-slider-container">
									<div class="row">
										<div class="">
											<div class="listing-slide img_<?php echo $numImages; ?>" data-images-num="<?php echo $numImages; ?>">
												<?php
													//$imgSize = 'listingpro-gal';
													require_once (THEME_PATH . "/include/aq_resizer.php");
													$imgSize = 'listingpro-detail_gallery';

													foreach($imgIDs as $imgID){
														
														if($numImages == 3){
															$img_url = wp_get_attachment_image_src( $imgID, 'full');
															$imgurl = aq_resize( $img_url[0], '550', '420', true, true, true);
															$imgSrc = $imgurl;
														}elseif($numImages == 2){
															$img_url = wp_get_attachment_image_src( $imgID, 'full');
															$imgurl = aq_resize( $img_url[0], '800', '400', true, true, true);
															$imgSrc = $imgurl;
														}elseif($numImages == 1){
															$img_url = wp_get_attachment_image_src( $imgID, 'full');
															$imgurl = aq_resize( $img_url[0], '1170', '400', true, true, true);
															$imgSrc = $imgurl;
														}elseif($numImages == 4){
															$img_url = wp_get_attachment_image_src( $imgID, 'full');
															$imgurl = aq_resize( $img_url[0], '400', '400', true, true, true);
															$imgSrc = $imgurl;
														}else {
															/* $imgurl = wp_get_attachment_image_src( $imgID, $imgSize);
															$imgSrc = $imgurl[0]; */
															$img_url = wp_get_attachment_image_src( $imgID, 'full');
															$imgurl = aq_resize( $img_url[0], '350', '450', true, true, true);
															$imgSrc = $imgurl;
														}
														$imgFull = wp_get_attachment_image_src( $imgID, 'full');
														if(!empty($imgurl[0])){
															echo '
															<div class="slide">
																<a href="'. $imgFull[0] .'" rel="prettyPhoto[gallery1]">
																	<img src="'. $imgSrc .'" alt="post1" />
																</a>
															</div>';
														}
													}
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
						} else{
							$imgurl = wp_get_attachment_image_src( $imgIDs[0], 'listingpro-listing-gallery');
							$imgFull = wp_get_attachment_image_src( $imgID, 'full');
							if(!empty($imgurl[0])){
								echo '
								<div class="slide_ban text-center">
									<a href="'. $imgFull[0] .'" rel="prettyPhoto[gallery1]">
										<img src="'. $imgurl[0] .'" alt="post1" />
									</a>
								</div>';
							}
						}
					}
				}
			?>
			<div class="post-meta-info">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-8 col-xs-12">
							<div class="post-meta-left-box">
								<?php if (function_exists('listingpro_breadcrumbs')) listingpro_breadcrumbs(); ?>
								<h1><?php the_title(); ?> <?php echo $claim; ?></h1>
								<?php if(!empty($tagline_text)) { ?>
									<p><?php echo $tagline_text; ?></p>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="post-meta-right-box text-right clearfix margin-top-20">
								<ul class="post-stat">
									<li id="fav-container">
										<a class="email-address add-to-fav" data-post-type="detail" href="" data-post-id="<?php echo get_the_ID(); ?>" data-success-text="Saved">
											<i class="fa <?php echo listingpro_is_favourite(get_the_ID(),$onlyicon=true); ?>"></i>
											<span class="email-icon">
												<?php echo listingpro_is_favourite(get_the_ID(),$onlyicon=false); ?>
											</span>
											 										
										</a>
									</li>
									<li class="reviews sbutton">
										<?php listingpro_sharing(); ?>
									</li>
								</ul>
								<div class="padding-top-30">
								<span class="rating-section">
									<?php
										$NumberRating = listingpro_ratings_numbers($post->ID);
										if($NumberRating != 0){
											echo lp_cal_listing_rate(get_the_ID());											
									?>
											<span>
												<small><?php echo $NumberRating; ?></small>
												<br> 
												<?php echo esc_html__('Ratings', 'listingpro'); ?>
											</span>
									<?php		
										}else{
											echo lp_cal_listing_rate(get_the_ID());
										}
									?>
								</span>
									<?php if(!empty($resurva_url)){ ?>
											<a href="" class="secondary-btn make-reservation">
												<i class="fa fa-calendar-check-o"></i>
												<?php echo esc_html__('Book Now', 'listingpro'); ?>
											</a>
											<div class="ifram-reservation">
												<div class="inner-reservations">
													<a href="#" class="close-btn"><i class="fa fa-times"></i></a>
													<iframe src="<?php echo $resurva_url; ?>" name="resurva-frame" frameborder="0"></iframe>
												</div>
											</div>
									<?php }else{
												if (class_exists('ListingReviews')) {
											?>
													<a href="#reply-title" class="secondary-btn" id="clicktoreview">
														<i class="fa fa-star"></i>
														<?php echo esc_html__('Submit Review', 'listingpro'); ?>
													</a>
											<?php
												}
											}
									?>
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content-white-area">
				<div class="container single-inner-container single_listing" >
					<div class="row">
						<div class="col-md-8 col-sm-8 col-xs-12">
							<?php
							$video = listing_get_metabox('video');
							if(!empty($video))
							{
								if($video_show=="true")
								{
							?>
										<div class="video-option  margin-bottom-30">
											<h2>
												<span><i class="fa fa-play-circle-o"></i></span>
												<span><?php echo esc_html__('Checkout', 'listingpro'); ?></span>
												<?php echo get_the_title(); ?>
												<a href="<?php echo esc_url($video); ?>" class="watch-video popup-youtube">
													<?php echo esc_html__('Watch Video', 'listingpro'); ?>
												</a>
											</h2>
										</div>
										<!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/play-video.png" alt="">
										<div class="widget-video widget-box widget-bg-color lp-border-radius-5">
									
										<?php if(wp_oembed_get( $video )){?>
											<?php echo wp_oembed_get($video); ?>
										<?php }else{ ?>
											<?php echo wp_kses_post($video); ?>
										<?php } ?>
										</div> -->
								<?php } ?>
							<?php } ?>
							<div class="post-row">
								<div class="post-detail-content">
									<?php the_content(); ?>
								</div>
							</div>
							<?php 
							$tags = get_the_terms( $post->ID ,'features');
							if(!empty($tags)){ ?>
								<div class="post-row padding-top-20">
									<!-- <div class="post-row-header clearfix margin-bottom-15"><h3><?php echo esc_html__('Features', 'listingpro'); ?></h3></div> -->
									<ul class="features list-style-none clearfix">
										<?php 
											foreach($tags as $tag) {
												$icon = listingpro_get_term_meta( $tag->term_id ,'lp_features_icon');
												?>								
											<li>
												<a href="<?php echo get_term_link($tag); ?>" class="parimary-link">
													<span class="tick-icon">
														<?php if(!empty($icon)) { ?>
															<i class="fa <?php echo $icon; ?>"></i>
														<?php }else { ?>
															<i class="fa fa-check"></i>
														<?php } ?>
													</span>
													<?php echo esc_html($tag->name); ?>
												</a>
											</li>
										<?php } ?>
									</ul>
								</div>
							<?php } ?>
							<?php 
								$faqs = listing_get_metabox('faqs');
								
								if( !empty($faqs) && count($faqs)>0 ){
									$faq = $faqs['faq'];
									$faqans = $faqs['faqans'];
									if( !empty($faq[1])){
									?>
									<div class="post-row faq-section padding-top-10 clearfix">
										<!-- <div class="post-row-header clearfix margin-bottom-15">
											<h3><?php echo esc_html__('Quick questions', 'listingpro'); ?></h3>
										</div> -->
										<div class="post-row-accordion">
											<div id="accordion">
												<?php for ($i = 1; $i <= (count($faq)); $i++) { ?>
													<h5>
													  <span class="question-icon">Q</span>
													  <span class="accordion-title"><?php echo esc_html($faq[$i]); ?></span>
													</h5>
													<div>
														<p>
															<?php echo esc_html($faqans[$i]); ?>
														</p>
													</div><!-- accordion tab -->
												<?php } ?>	
											</div>
										</div>
									</div>
									<?php
									}
								}
							 ?>
							<div id="submitreview">
								<?php 
									//getting old reviews
									listingpro_get_all_reviews($post->ID);
								?>
							</div>
							<?php
								//comments_template();
								listingpro_get_reviews_form($post->ID);
							?>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="sidebar-post">
								<?php if(!empty($timekit_booking) && $timekit == true){ ?>
								<div class="widget-box">
									<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/booking.js"></script>
								  	<div id="bookingjs1">
										<script type="text/javascript">
										  var widget1 = new TimekitBooking();
										  widget1.init({
											targetEl: '#bookingjs1',
											name:     '<?php echo $timekitName; ?>',
											email:    '<?php echo $timekitEmail; ?>',
											apiToken: '<?php echo $timekitAPI; ?>',
											calendar: '22f86f0c-ee80-470c-95e8-dadd9d05edd2',
											timekitConfig: {
											  app: '<?php echo $timekitAPP; ?>'
											}
											
										  });
										</script>
								  	</div>								
								</div>
								<?php } ?>
								<?php 
									$buisness_hours = listing_get_metabox('business_hours');
									if(!empty($buisness_hours)){
								?>
									<div class="widget-box">
										<?php get_template_part( 'include/timings' ); ?>									
									</div>
								<?php
									}
								?>
								
								
								<div class="widget-box map-area">
									<?php 
									$latitude = listing_get_metabox('latitude');
									$longitude = listing_get_metabox('longitude');
									if(!empty($latitude) && !empty($longitude)){
										if($map_show=="true"){
									?>
												<div class="widget-bg-color post-author-box lp-border-radius-5">
													<div class="widget-header margin-bottom-25 hideonmobile">
														<ul class="post-stat">
															<li>
																<a class="md-trigger parimary-link singlebigmaptrigger" data-lat="<?php echo esc_attr($latitude); ?>" data-lan="<?php echo esc_attr($longitude); ?>" data-modal="modal-4" >
																	<!-- <span class="phone-icon">
																		Marker icon by Icons8
																		<?php echo listingpro_icons('mapMarker'); ?>
																	</span>
																	<span class="phone-number ">
																		<?php echo esc_html__('View Large Map', 'listingpro'); ?>
																	</span> -->
																</a>
															</li>
														</ul>
													</div>
													<div class="widget-content ">
														<div class="widget-map pos-relative">
															<div id="singlepostmap" class="singlemap"></div>
															<div class="get-directions">
																<a href="https://www.google.com/maps?daddr=<?php echo esc_attr($latitude); ?>,<?php echo esc_attr($longitude); ?>" target="_blank" >
																	<span class="phone-icon">
																		<i class="fa fa-map-o"></i>
																	</span>
																	<span class="phone-number ">
																		<?php echo esc_html__('Get Directions', 'listingpro'); ?>
																	</span>
																</a>
															</div>
														</div>
													</div>
												</div><!-- ../widget-box  -->
										<?php } ?>
									<?php } ?>
									<div class="listing-detail-infos margin-top-20 clearfix">
										<ul class="list-style-none list-st-img clearfix">
											<?php 
											$gAddress = listing_get_metabox('gAddress');
											$phone = listing_get_metabox('phone');
											$website = listing_get_metabox('website');
											//if(empty($facebook) && empty($twitter) && empty($linkedin)){}else{
												?>
												<?php if(!empty($gAddress)) { ?>
													<li>
														<a>
															<span class="cat-icon">
																<?php echo listingpro_icons('mapMarkerGrey'); ?>
																<!-- <i class="fa fa-map-marker"></i> -->
															</span>
															<span>
																<?php echo $gAddress ?>
															</span>
														</a>
													</li>
												<?php } ?>
												<?php if(!empty($phone)) { ?>
													<?php if($contact_show=="true"){ ?>
														<li>
															<a href="tel:<?php echo esc_attr($phone); ?>">
																<span class="cat-icon">
																	<?php echo listingpro_icons('phone'); ?>
																	<!-- <i class="fa fa-mobile"></i> -->
																</span>
																<span>
																	<?php echo esc_html($phone); ?>
																</span>
															</a>
														</li>
													<?php } ?>
												<?php } ?>
												<?php if(!empty($website)) { ?>
													<li>
														<a href="<?php echo esc_url($website); ?>" target="_blank">
															<span class="cat-icon">
																<?php echo listingpro_icons('globe'); ?>
																<!-- <i class="fa fa-globe"></i> -->
															</span>
															<span><?php echo esc_url($website); ?></span>
														</a>
													</li>
												<?php } ?>
											<?php //} ?>
										</ul>
										<?php 
										$facebook = listing_get_metabox('facebook');
										$twitter = listing_get_metabox('twitter');
										$linkedin = listing_get_metabox('linkedin');
										$google_plus = listing_get_metabox('google_plus');
										$youtube = listing_get_metabox('youtube');
										if(empty($facebook) && empty($twitter) && empty($linkedin) && empty($google_plus) && empty($youtube) && empty($instagram)){}else{
											?>
											<div class="widget-box widget-social">
												<div class="widget-content clearfix">
													<ul class="list-style-none list-st-img">
														<?php if(!empty($facebook)){ ?>
															<li class="lp-fb">
																<a href="<?php echo esc_url($facebook); ?>" class="padding-left-0">
																	<!-- <i class="fa fa-facebook"></i> -->
																	<?php echo listingpro_icons('fb'); ?>
																</a>
															</li>
														<?php } ?>
														<?php if(!empty($twitter)){ ?>
															<li class="lp-tw">
																<a href="<?php echo esc_url($twitter); ?>" class="padding-left-0">
																	<!-- <i class="fa fa-twitter"></i> -->
																	<?php echo listingpro_icons('tw'); ?>
																</a>
															</li>
														<?php } ?>
														<?php if(!empty($linkedin)){ ?>
															<li  class="lp-li">
																<a href="<?php echo esc_url($linkedin); ?>" class="padding-left-0">
																	<!-- <i class="fa fa-linkedin"></i> -->
																	<?php echo listingpro_icons('lnk'); ?>
																</a>
															</li>
														<?php } ?>
														<?php if(!empty($google_plus)){ ?>
															<li  class="lp-li">
																<a href="<?php echo esc_url($google_plus); ?>#" class="padding-left-0">
																	<!-- <i class="fa fa-linkedin"></i> -->
																	<?php echo listingpro_icons('gp'); ?>
																</a>
															</li>
														<?php } ?>
														<?php if(!empty($youtube)){ ?>
															<li  class="lp-li">
																<a href="<?php echo esc_url($youtube); ?>#" class="padding-left-0">
																	<!-- <i class="fa fa-linkedin"></i> -->
																	<?php echo listingpro_icons('yt'); ?>
																</a>
															</li>
														<?php } ?>
														<?php if(!empty($instagram)){ ?>
															<li  class="lp-li">
																<a href="<?php echo esc_url($instagram); ?>#" class="padding-left-0">
																	<!-- <i class="fa fa-linkedin"></i> -->
																	<?php echo listingpro_icons('insta'); ?>
																</a>
															</li>
														<?php } ?>
													</ul>
												</div>
											</div><!-- ../widget-box  -->
										<?php } ?>
									</div>
								</div>
								<?php
								$claimed_section = listing_get_metabox('claimed_section');
								$priceRange = listing_get_metabox_by_ID('price_status', get_the_ID());
								$listingpTo = listing_get_metabox('list_price_to');
								$listingprice = listing_get_metabox_by_ID('list_price', get_the_ID());
								?>
								<?php if( (!empty($menuMeta) && $menuOption == true ) || (!empty($priceRange) || !empty($listingpTo) || !empty($listingprice)) || ($claimed_section == 'not_claimed') ) { ?>
									<div class="widget-box listing-price">
										<?php
											if(!empty($menuMeta) && $menuOption == true){
										?>
											<div class="menu-hotel">
												<a href="#" class="open-modal">
													<?php echo listingpro_icons('resMenu'); ?>
													<span>
														<?php if(!empty($menuTitle)){ echo $menuTitle; }else{ echo 'See Full Menu'; } ?>
													</span>
												</a>
												<div class="hotel-menu">
													<div class="inner-menu">
														<a href="#" class="close-menu-popup"><i class="fa fa-times"></i></a>
														<img src="<?php echo $menuImg; ?>" alt="">
													</div>
												</div>
											</div>
											<?php } ?>
										
										<div class="price-area">
											<?php echo listingpro_price_dynesty(get_the_ID()); ?>
											<?php get_template_part('templates/single-list/claimed' ); ?>
										</div>
										<?php get_template_part('templates/single-list/claim-form' ); ?>
									</div>
								<?php } ?>
								<?php echo listing_all_extra_fields($post->ID); ?>
								<div class="widget-box business-contact">
									<div class="contact-form quickform">										
										<div class="user_text">
											<?php
											$author_avatar_url = get_user_meta(get_the_author_meta( 'ID' ), "listingpro_author_img_url", true); 
											$avatar ='';
											if(!empty($author_avatar_url)) {
												$avatar =  $author_avatar_url;

											} else { 			
												$avatar_url = listingpro_get_avatar_url (get_the_author_meta( 'ID' ), $size = '94' );
												$avatar =  $avatar_url;

											}
										?>
											<div class="author-img">
												<img src="<?php echo $avatar; ?>" alt="">
											</div>
											<div class="author-social">
												<div class="status">
													<span class="online"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('nickname'); ?></a></span>													
												</div>
												<ul class="social-icons post-socials">
													<li>
														<a href="#">
															<?php echo listingpro_icons('fbGrey'); ?>
														</a>
													</li>
													<li>
														<a href="#">
															<?php echo listingpro_icons('googleGrey'); ?>
														</a>
													</li>
													<li>
														<a href="#">
															<?php echo listingpro_icons('instaGrey'); ?>
														</a>
													</li>
													<li>
														<a href="#">
															<?php echo listingpro_icons('tmblrGrey'); ?>
														</a>
													</li>
												</ul>
											</div>
										</div>
										<form class="form-horizontal"  method="post" id="contactOwner">
											<?php
											
											$author_id = '';
											$author_email = '';
											$author_email = get_the_author_meta( 'user_email' );
											$author_id = get_the_author_meta( 'ID' );
											
											?>
											<div class="form-group">
												<input type="text" class="form-control" name="name7" id="name7" placeholder="Name:">
											</div>
											<div class="form-group">
												<input type="email" class="form-control" name="email7" id="email7" placeholder="Email:">
											</div>
											<div class="form-group">
												<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
											</div>
											<div class="form-group">
												<textarea class="form-control" rows="5" name="message7" id="message7" placeholder="Message:"></textarea>
											</div>
											<div class="form-group margin-bottom-0 pos-relative">
												<input type="submit" value="Send" class="lp-review-btn btn-second-hover">
												<input type="hidden" value="<?php the_ID(); ?>" name="post_id">
												<input type="hidden" value="<?php echo $author_email; ?>" name="author_email">
												<input type="hidden" value="<?php echo $author_id; ?>" name="author_id">
												<i class="lp-search-icon fa fa-send"></i>
											</div>
										</form>
									</div>
								</div>
								<?php if(is_active_sidebar('listing_detail_sidebar')) { ?>
									<div class="sidebar">
										<?php dynamic_sidebar('listing_detail_sidebar'); ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--==================================Section Close=================================-->
		<?php 
		global $post;
		echo listingpro_post_confirmation($post);
	} // end while
}