<?php
if(!function_exists('listingpro_get_all_reviews')){
	function listingpro_get_all_reviews($postid){
		?>
		
		<?php
		
		$key = 'reviews_ids';
		$review_idss = listing_get_metabox_by_ID($key ,$postid);
		$review_ids = '';
		if( !empty($review_idss) ){
			$review_ids = explode(",",$review_idss);
		}
		
		$active_reviews_ids = array();
		if( !empty($review_ids) && is_array($review_ids) ){
			$review_ids = array_unique($review_ids);
			foreach($review_ids as $reviewID){
				if(get_post_status($reviewID)=="publish"){
					$active_reviews_ids[] = $reviewID;
				}
			}
			if(count($active_reviews_ids) == 1){
				$label = esc_html__('Review for','listingpro').get_the_title($postid);
			}else{
				$label = esc_html__('Reviews for ','listingpro').get_the_title($postid);
			}
			echo '<h3 class="comment-reply-title">'.count($active_reviews_ids).' '.$label.'</h3>';
		}
		else{			
		}
		
		if( !empty($review_ids) && count($review_ids)>0 ){
			echo '<div class="reviews-section">';
			foreach( $review_ids as $key=>$review_id ){
				$args = array(
					'post_type'  => 'lp-reviews',
					'orderby'    => 'date',
					'order'      => 'ASC',
					'p'			 => $review_id,
					'post_status'	=> 'publish'
			 	);
			 	$query = new WP_Query( $args );
 				if ( $query->have_posts() ) {
					echo '';
					while ( $query->have_posts() ) {
						$query->the_post();
						global $post;
						echo '<article class="review-post">';
						$rating = listing_get_metabox_by_ID('rating' ,get_the_ID());
						$rate = $rating;
						$gallery = get_post_meta(get_the_ID(), 'gallery_image_ids', true);
						$author_id = $post->post_author;
						
						$author_avatar_url = get_user_meta($author_id, "listingpro_author_img_url", true); 
						$avatar;
						if(!empty($author_avatar_url)) {
							$avatar =  $author_avatar_url;

						} else { 			
							$avatar_url = listingpro_get_avatar_url ( $author_id, $size = '94' );
							$avatar =  $avatar_url;

						}
						$user_reviews_count = count_user_posts( $author_id , 'lp-reviews' );
						?>
						<figure>
							<div class="review-thumbnail">
								<img src="<?php  echo $avatar; ?>" alt="">
							</div>
							<figcaption>
								<h4><?php the_author(); ?></h4>
								<p><i class="fa fa-star"></i> <?php echo $user_reviews_count; ?> <?php esc_html_e('Reviews','listingpro'); ?></p>
							</figcaption>
						</figure>
						<section class="details">
							<div class="top-section">
								<h3><?php the_title(); ?></h3>
								<time><?php echo get_the_time('F j, Y g:i a'); ?></time>
								<div class="review-count">
									<div class="rating">
										<?php
											listingpro_ratings_stars('rating', get_the_ID());
										?>
									</div>
									<?php echo lp_cal_listing_rate(get_the_ID(),'lp_review', true); ?>
								</div>
							</div>
							<div class="content-section">
								<p><?php the_content(); ?></p>
								<?php if( !empty($gallery) ){ ?>
								<div class="images-gal-section">
									<div class="row">
										<div class="img-col review-img-slider">
											<?php
												//image gallery
												$imagearray = explode(',', $gallery);
												foreach( $imagearray as $image ){
													$imgGal = wp_get_attachment_image( $image, 'listingpro-review-gallery-thumb', '', '' );
													$imgGalFull = wp_get_attachment_image_src( $image,  'full');
														echo '<a class="galImgFull" href="'.$imgGalFull[0].'">'.$imgGal.'</a>';
												}
											?>
										</div>
									</div>
								</div>
								<?php } ?>
								<?php
										$interests = '';
										$Lols = '';
										$loves = '';
										$interests = listing_get_metabox_by_ID('review_interesting',get_the_ID());
										$Lols = listing_get_metabox_by_ID('review_lol',get_the_ID());
										$loves = listing_get_metabox_by_ID('review_love',get_the_ID());
										
										if(empty($interests)){
											$interests = 0;
										}
										if(empty($Lols)){
											$Lols = 0;
										}
										if(empty($loves)){
											$loves = 0;
										}
								?>
								<div class="bottom-section">
									<form action="#">
										<span><?php echo esc_html__('Was this review ...?', 'listingpro'); ?></span>
										<ul>
											<li>
												<a class="instresting reviewRes" href="#" data-restype='interesting' data-id='<?php the_ID(); ?>' data-score='<?php echo $interests; ?>'>
													<i class="fa fa-thumbs-o-up"></i><?php echo esc_html__(' Interesting ', 'listingpro'); ?><span class="interests-score"><?php if(!empty($interests)) echo $interests; ?></span>
												</a>
											</li>
											<li>
												<a class="lol reviewRes" href="#" data-restype='lol' data-id='<?php the_ID(); ?>' data-score='<?php echo $Lols; ?>'>
													<i class="fa fa-smile-o"></i><?php echo esc_html__(' Lol ', 'listingpro'); ?><span class="interests-score"><?php if(!empty($Lols)) echo $Lols; ?></span>
												</a>
											</li>
											<li>
												<a class="love reviewRes" href="#" data-restype='love' data-id='<?php the_ID(); ?>' data-score='<?php echo $loves; ?>'>
													<i class="fa fa-heart-o"></i><?php echo esc_html__(' Love ', 'listingpro'); ?><span class="interests-score"><?php if(!empty($loves)) echo $loves; ?></span>
												</a>
											</li>
										</ul>
									</form>
								</div>
							</div>
						</section>
						<?php
						echo '</article>';
					}
					echo '';
					wp_reset_postdata();
				} else {}
			}
			echo '</div>';
		} 
		
	}
}
?>