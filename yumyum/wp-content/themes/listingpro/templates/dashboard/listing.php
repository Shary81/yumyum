<div class="user-recent-listings-inner tab-pane fade in active" id="pending">
	<div class="tab-header">
		<h3><?php echo esc_html__('Published Listings', 'listingpro'); ?></h3>
	</div>
	<div class="row lp-list-page-list">
		<?php
		global $paged, $wp_query;

			$current_user = wp_get_current_user();
			$user_id = $current_user->ID;
			$args=array(
				'post_type' => 'listing',
				'post_status' => 'publish',
				'posts_per_page' => 20,
				'author' => $user_id,
				'paged' => $paged,
			);
			$wp_query = null;
			$wp_query = new WP_Query($args);
			if( $wp_query->have_posts() ) {
				while ($wp_query->have_posts()) : $wp_query->the_post();  
					$listingcurrency = listing_get_metabox('listingcurrency');
					$listingprice = listing_get_metabox('listingprice');
					$listingptext = listing_get_metabox('listingptext');
					$Plan_id = listing_get_metabox('Plan_id');
					$plan_time  = get_post_meta($Plan_id, 'plan_time', true);
					global $wp_rewrite,$listingpro_options;
					$edit_post_page_id = $listingpro_options['edit-listing'];
					$postID = $post->ID;
					if ($wp_rewrite->permalink_structure == ''){
						//we are using ?page_id
						$edit_post = $edit_post_page_id."&lp_post=".$postID;
					}else{
						//we are using permalinks
						$edit_post = $edit_post_page_id."?lp_post=".$postID;
					}
					?>		
					<div class="col-md-12 col-sm-6 col-xs-12 lp-list-view">
						<div class="lp-list-view-inner-contianer clearfix">
							<div class="col-md-1 col-sm-1 col-xs-12">
								<div class="lp-list-view-thumb">
									<div class="lp-list-view-thumb-inner">
										<?php	
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
										?>	
									</div>
								</div>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<div class="lp-list-view-content lp-list-cnt">
									<div class="lp-list-view-content-upper lp-list-view-content-bottom">
										<a href="<?php echo get_the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
										<ul class="lp-grid-box-price list-style-none list-pt-display">
											<?php
												$cats = get_the_terms( get_the_ID(), 'listing-category' );
												if(!empty($cats)){
													foreach ( $cats as $cat ) {
														$category_image = listing_get_tax_meta($cat->term_id,'category','image');
														if(!empty($category_image)){
															?>
															<li class="category-cion">
																<a href="<?php echo get_term_link($cat); ?>">
																	<img class="icon icons8-Food" src="<?php echo esc_attr($category_image); ?>" alt="cat-icon">
																</a>
															</li>
															<?php
														} ?>
														<li class="">
															<a href="<?php echo get_term_link($cat); ?>">
																<?php echo $cat->name; ?>
															</a>
														</li>
														<?php
													}
												}
											?>
											<li>
												<span><?php echo esc_html($listingcurrency.$listingprice); ?></span>
											</li>
											<li>
												<span class="lp-list-sp-icon">
													<i class="fa fa-calendar"></i>
												</span>
												<span class="lp-list-sp-text">
													<?php the_time( get_option( 'date_format' ) ); ?>
												</span>
											</li>
											<li>
												<span class="lp-list-sp-icon">
													<i class="fa fa-clock-o"></i>
												</span>
												<span class="lp-list-sp-text">
												<?php 
												if(!empty($plan_time)){
													$startdate = get_the_time('d-m-Y');

													$endDate = date('d-m-Y', strtotime($startdate. ' + '.$plan_time.' days'));		
													$diff = (strtotime($endDate) - time()) / 60 / 60 / 24;

													if ($diff < 1 && $diff > 0) {
														$days = 1;
													} else {
														$days = floor($diff);
													}
												}else{
													$days = esc_html__('Unlimited','listingpro');
												}
													echo esc_html($days).esc_html__(' Days Left','listingpro');
												?>
												</span>
											</li>
											<li>
												<span class="lp-list-sp-icon">
													<i class="fa fa-check"></i>
												</span>
												<span class="lp-list-sp-text">
												<?php 
													if(get_post_status() == 'publish'){
														echo esc_html__('Published','listingpro');
													}elseif(get_post_status() == 'pending'){
														echo esc_html__('Pending','listingpro');
													}
												?>
												</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<div class="lp-rigt-icons lp-list-view-content-bottom">
									<ul class="lp-list-view-edit list-style-none aliceblue">
										<li><a target="_blank" href="<?php echo esc_url($edit_post); ?>"><i class="fa fa-pencil-square-o"></i><span><?php echo esc_html__('Edit', 'listingpro'); ?></span></a></li>
										<li><a href="#" data-modal="modal-<?php echo esc_attr($postID); ?>" class="md-trigger"><i class="fa fa-times"></i><span><?php echo esc_html__('Remove', 'listingpro'); ?></span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>	
					<div class="md-modal md-effect-3" id="modal-<?php echo esc_attr($postID); ?>">
						<div class="md-content">
							<form class="form-horizontal"  method="post">
								<div class="form-group mr-bottom-0">
									<h3><?php echo esc_html__( 'Are you sure you want to delete this?', 'listingpro' ); ?></h3>
									<a href="#" class="md-close" data-postid="<?php echo esc_attr($postID); ?>">
										<?php echo esc_html__( 'No', 'listingpro' ); ?>
									</a>
									<input type="submit" value="<?php echo esc_html__( 'Yes', 'listingpro' ); ?>" class="lp-review-btn btn-second-hover">
									<input name="removeid" type="hidden" value="<?php echo esc_attr($postID); ?>" />
								</div>
							</form>	
						</div>
					</div>	
					<?php			
				endwhile;
				echo listingpro_pagination();
			}else{
				?>
				<div class="text-center no-result-found col-md-12 col-sm-6 col-xs-12 margin-bottom-30">
					<h1><?php esc_html_e('Ooops!','listingpro'); ?></h1>
					<p><?php esc_html_e('Sorry ! Your have no listing yet!','listingpro'); ?></p>
				</div>
				<?php
			}
		?>
	</div>
</div>
												