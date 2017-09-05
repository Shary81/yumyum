<?php 
	/* The loop starts here. */
	$postGridCount = 0;			
	
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			$postGridCount++;
			?>
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="col-md-4 col-sm-4 lp-blog-grid-box">
										<div class="lp-blog-grid-box-container lp-border lp-border-radius-8">
											<div class="lp-blog-grid-box-thumb">
												<a href="<?php the_permalink(); ?>">
													<?php

														if ( has_post_thumbnail() ) {
															the_post_thumbnail('listingpro-blog-grid');
														}
														else {
															echo '<img src="'.esc_html__('https://placeholdit.imgix.net/~text?txtsize=33&w=372&h=240', 'listingpro').'" alt="">';
														}
													?>
												</a>
											</div>
											<div class="lp-blog-grid-box-description text-center">
													<div class="lp-blog-user-thumb margin-top-subtract-25">
														<?php echo get_avatar( get_the_author_meta( 'ID' ), 51 ); ?>
													</div>
													
													<div class="lp-blog-grid-category">
														<a href="blog-archive.html" >
															<?php the_category(' ,'); ?>
														</a>
													</div>
													<div class="lp-blog-grid-title">
														<h4 class="lp-h4">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h4>
													</div>
													<ul class="lp-blog-grid-author">
														<li>
														
															<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
																<i class="fa fa-user"></i>
																<span><?php the_author(); ?></span>
															</a>
														</li>
														<li>
															<i class="fa fa-calendar"></i>
															<span><?php the_date(get_option('date_format')); ?></span>
														</li>
													</ul><!-- ../lp-blog-grid-author -->
											</div>
										</div>
									</div>
								</div>
		<?php 
			if($postGridCount%3 == 0){
				echo '<div class="clearfix"></div>';
			}
		} // end while
	} // end if
	
	
				
	?>