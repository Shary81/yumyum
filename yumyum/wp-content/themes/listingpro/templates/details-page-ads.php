<?php

						$gAddress = listing_get_metabox('gAddress');
						$rating = get_post_meta( get_the_ID(), 'listing_rate', true );
						$rate = $rating;
						
						$priceRange = listing_get_metabox_by_ID('price_status', $post->ID);
						$listingpTo = listing_get_metabox('list_price_to');
						$listingprice = listing_get_metabox_by_ID('list_price', $post->ID);
						
						if(has_post_thumbnail()) {
							$images = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'listingpro-gallery-thumb2' );
							$image = '<img src="'.$images[0].'" alt="">';
						}else {
							$image = '<img src="'.esc_url('https://placeholdit.imgix.net/~text?txtsize=33&txt=ListingPro&w=360&h=198').'" alt="Listing Pro Placeholder">';
						}
						?>
						<article>
							<figure>
								<a href="<?php echo get_permalink(); ?>">
									<?php echo $image; ?>
								</a>
								<figcaption>
									<a href="<?php echo get_permalink(); ?>" class="overlay-link"></a>
									<div class="listing-price">
										<?php
											if(!empty($listingprice)){
												echo esc_html($listingprice);
												if(!empty($listingpTo)){
													echo ' - ';
													echo esc_html($listingpTo);
												}
											}
										?>
									</div>
									<?php
										$adStatus = get_post_meta( $post->ID, 'campaign_status', true );
										$CHeckAd = '';
										if($adStatus == 'active'){
											echo $CHeckAd = '<span class="listing-pro">Ad</span>';
										}
									?>
									<div class="bottom-area">
										<div class="listing-cats">
											<?php 
											$cats = get_the_terms( get_the_ID(), 'listing-category' );
											if(!empty($cats)){
											foreach($cats as $cat) {
												?>
												<a href="<?php echo get_term_link($cat); ?>" class="cat"><?php echo $cat->name; ?></a>
											<?php } } ?>
										</div>
										<?php if(!empty($rate)) { ?>
											<span class="rate"><?php echo $rate; ?></span>
										<?php } ?>
										<h4><a href="<?php echo get_permalink(); ?>"><?php echo substr(get_the_title(), 0, 45); ?></a></h4>
										<?php if(!empty($gAddress)) { ?>
											<div class="listing-location">
												<p><?php echo $gAddress ?></p>
											</div>
										<?php } ?>
									</div>
								</figcaption>
							</figure>
						</article>
						