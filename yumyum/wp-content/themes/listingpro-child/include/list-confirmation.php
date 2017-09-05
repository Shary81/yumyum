<?php

/**

 * List Confirmation.

 *

 */

	/* ============== ListingPro listing confirmation ============ */



	if ( ! function_exists( 'listingpro_post_confirmation' ) ) {

		

		function listingpro_post_confirmation($post) {

			if (isset($_POST['publish']) && !empty($_POST['publish_post']) ) {	

				$my_post = array();

				$my_post['ID'] = $_POST['publish_post'];

				$my_post['post_status'] = 'publish';



				// Update the post into the database

				$postid = wp_update_post( $my_post );

				

				// generating email

				

				global $listingpro_options;

				

				$current_user = wp_get_current_user();

				$user_email = $current_user->user_email;

				


				$subject = $listingpro_options['listingpro_subject_listing_approved'];
				$mail_content = $listingpro_options['listingpro_listing_approved'];
				$mail_content = str_replace('%website_url','%1$s', $mail_content);
				$mail_content = str_replace('%listing_title','%2$s', $mail_content);
				$mail_content = str_replace('%listing_url','%3$s', $mail_content);
				$website_url = site_url();
				$listing_title = get_the_title($postid);
				$listing_url = get_the_permalink($postid);
				$formated_mail_content = '';
				$formated_mail_content = sprintf( $mail_content,$website_url,$listing_title,$listing_url  );
				
				$from = get_option('admin_email');
				$headers[] = 'Content-Type: text/html; charset=UTF-8';
				$headers[]= 'From: '.$from . "\r\n";
				

				wp_mail( $user_email, $subject, $formated_mail_content, $headers);

			}	

			$current_user = wp_get_current_user();

			

			if ($post->post_author == $current_user->ID) {

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

				
				if(is_single()){
				?>

				<div class="lp_confirmation">

					<div class="widget-box padding-0 lp-border-radius-5">

						<div class="widget-content">
				<?php } ?>

							<ul class="list-style-none list-st-img">

								<li>

									<a class="edit-list" href="<?php echo esc_url($edit_post); ?>">

										<span><?php echo listingpro_icons('pencil'); ?><?php echo esc_html__('Edit','listingpro'); ?></span>

									</a>

								</li>

								<?php 

								if (get_post_status ( $post->ID ) == 'pending') {
								$checkout = $listingpro_options['payment-checkout'];
								$checkout_url = get_permalink( $checkout );
								?>

									<li>

										<?php

											global $listingpro_options;

											global $wpdb;

											$dbprefix = '';

											$dbprefix = $wpdb->prefix;

											

											$paidmode = '';

											$paidmode = $listingpro_options['enable_paid_submission'];

											

											$planID = '';

											$planPrice = '';

											$postmeta = get_post_meta($post->ID, 'lp_listingpro_options', true);

											$planID = $postmeta['Plan_id'];

											$planPrice = get_post_meta($planID, 'plan_price', true);

											$plan_type = '';

											$plan_type = get_post_meta($planID, 'plan_package_type', true);

											

											$user_ID = '';
											$results = '';

											$user_ID = get_current_user_id();

											
											if( !empty($plan_type) && $plan_type=="Package" ){
												$results = $wpdb->get_results( "SELECT * FROM ".$dbprefix."listing_orders WHERE user_id ='$user_ID' AND plan_id='$planID' AND status = 'success' AND plan_type='$plan_type'" );
											}
											

										?>

										<?php

										

											if( !empty($paidmode) && $paidmode=="yes" ){

												

											?>

													

													<?php

													//check if plan_type already purchased

													if( !empty($results) && count($results)>0 && !empty($planPrice) ){

													?>

															<?php if($listingpro_options['listings_admin_approved']=="yes"){ ?> 

																<form id="lp_recheck" method="post">

								

																	<input class="lp-review-btn btn-second-hover" type="submit" value="Publish" name="publish">

																	

																	<input type="hidden" value="<?php echo esc_attr($postID); ?>" name="publish_post">

																	

																</form>

															<?php } ?>

													<?php

													}

													//check if plan_type not purchased

													else if( empty($results) &&  !empty($planPrice) ){

													?>

													<a href="<?php echo esc_url($checkout_url);  ?>" class="lp-review-btn btn-second-hover text-center" title="pay"><?php echo esc_html__('Pay & Publish','listingpro'); ?></a>
													
													<?php

													}

													else if( empty($results) && count($results)==0 && empty($planPrice) ){

													?>


														<?php if($listingpro_options['listings_admin_approved']=="no"){ ?> 

																<form id="lp_recheck" method="post">

								

																	<input class="lp-review-btn btn-second-hover" type="submit" value="Publish" name="publish">

																	

																	<input type="hidden" value="<?php echo esc_attr($postID); ?>" name="publish_post">

																	

																</form>

														<?php } ?>

															

													<?php

													}

													?>

																	

										<?php
										
											}
											else if( !empty($plan_type) && $plan_type=="Pay Per Listing" &&  !empty($planPrice) ){?>

												

													<a href="<?php echo esc_url($checkout_url);  ?>" class="lp-review-btn btn-second-hover text-center" title="pay"><?php echo esc_html__('Pay','listingpro'); ?></a>
											<?php	
											}

											else{

										?>

										<?php if($listingpro_options['listings_admin_approved']=="no"){ ?> 

												<form id="lp_recheck" method="post">

				

													<input class="lp-review-btn btn-second-hover" type="submit" value="<?php echo esc_html__('Publish','listingpro'); ?>" name="publish">

													

													<input type="hidden" value="<?php echo esc_attr($postID); ?>" name="publish_post">

													

												</form>

										<?php } ?>


										<?php

											}

										?>

								</li>

						<?php } ?>

							</ul>
				<?php if(is_single()){ ?>
						</div>

					</div>

				</div>
				<?php		
				}
			}		

		}

	}