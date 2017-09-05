<?php

					$type = 'listing';
					$term_id = '';
					$taxName = '';
					$termID = '';
					$term_ID = '';
					global $paged;
					
					
					$taxTaxDisplay = true;
					$TxQuery = '';
					$tagQuery = '';
					$catQuery = '';
					$locQuery = '';
					$taxQuery = '';
					$searchQuery = '';
					$parent = '';
					$priceQuery = '';
					$sKeyword = '';
					
					if( !empty($_GET['s']) && isset($_GET['s']) && $_GET['s']=="home" ){
						if( !empty($_GET['lp_s_tag']) && isset($_GET['lp_s_tag'])){
							$lpsTag = $_GET['lp_s_tag'];
							$tagQuery = array(
								'taxonomy' => 'list-tags',
								'field' => 'id',
								'terms' => $lpsTag,
								'operator'=> 'IN' //Or 'AND' or 'NOT IN'
							);
						}
						
						if( !empty($_GET['lp_s_cat']) && isset($_GET['lp_s_cat'])){
							$lpsCat = $_GET['lp_s_cat'];
							$termo = get_term_by('id', $lpsCat, 'listing-category');
							$parent = $termo->parent;
							$catQuery = array(
								'taxonomy' => 'listing-category',
								'field' => 'id',
								'terms' => $lpsCat,
								'operator'=> 'IN' //Or 'AND' or 'NOT IN'
							);
						}
						
						if( !empty($_GET['lp_s_loc']) && isset($_GET['lp_s_loc'])){							
							$lpsLoc = $_GET['lp_s_loc'];
							if(is_numeric($lpsLoc)){
								$lpsLoc = $lpsLoc;
							}
							else{
								$term = listingpro_term_exist($lpsLoc,'location');
								if(!empty($term)){
									$lpsLoc=$term['term_id'];
								}
								
								else{
									$lpsLoc = '';
								}
							}
							$locQuery = array(
								'taxonomy' => 'location',
								'field' => 'id',
								'terms' => $lpsLoc,
								'operator'=> 'IN' //Or 'AND' or 'NOT IN'
							);
						}
						/* on 3 april by zaheer */
						if( empty($_GET['lp_s_tag']) && empty($_GET['lp_s_cat']) && !empty($_GET['select']) ){
							
							$sKeyword = $_GET['select'];
							
						}
						/* end on 3 april by zaheer */
						$TxQuery = array(
							'relation' => 'AND',
							$tagQuery,
							$catQuery,
							$locQuery,
						);
					$ad_campaignsIDS = listingpro_get_campaigns_listing( 'lp_top_in_search_page_ads', TRUE,$taxQuery,$TxQuery,$priceQuery,$sKeyword);
					}
					else{
						$queried_object = get_queried_object();
						$term_id = $queried_object->term_id;
						$taxName = $queried_object->taxonomy;
						if(!empty($term_id)){
							$termID = get_term_by('id', $term_id, $taxName);
							$termName = $termID->name;
							$term_ID = $termID->term_id;
							$parent = $termID->parent;
						}
						
						$TxQuery = array(
							array(
								'taxonomy' => $taxName,
								'field' => 'id',
								'terms' => $termID->term_id,
								'operator'=> 'IN' //Or 'AND' or 'NOT IN'
							),
						);
					$ad_campaignsIDS = listingpro_get_campaigns_listing( 'lp_top_in_search_page_ads', TRUE, $TxQuery,$searchQuery,$priceQuery,$sKeyword );
					}


					
					$args=array(
						'post_type' => $type,
						'post_status' => 'publish',
						'posts_per_page' => 12,
						's'	=> $sKeyword,
						'paged'  => $paged,
						'post__not_in' =>$ad_campaignsIDS,
						'tax_query' => $TxQuery	
					);
					
					$my_query = null;
					$my_query = new WP_Query($args);
					$found = $my_query->found_posts;
					if(($found > 1)){
					$foundtext = esc_html__('Results', 'listingpro');
					}else{
						$foundtext = esc_html__('Result', 'listingpro');
					}
					// Harry Code
					global $listingpro_options;

					$listing_layout = $listingpro_options['listing_views'];
					$addClassListing = '';
					if($listing_layout == 'list_view') {
						$addClassListing = 'listing_list_view';
					}
?>
		<!--==================================Section Open=================================-->
	<section>
		<div class="container page-container listing-simple <?php echo $addClassListing; ?>">
			<div class="margin-bottom-20 margin-top-30 post-with-map-container-right">
				<?php get_template_part( 'templates/search/filter'); ?>
			</div>

			<div class="mobile-map-space">
			
					<!-- Popup Open -->
	
					<div class="md-modal md-effect-3 mobilemap" id="modal-listing">
						<div class="md-content mapbilemap-content">
							<div class="map-pop">							
								<div id='map' class="listingmap"></div>							
							</div>
						<a class="md-close mapbilemap-close"><i class="fa fa-close"></i></a>
						</div>
					</div>
					<!-- Popup Close -->
					<div class="md-overlay md-overlayi"></div> <!-- Overlay for Popup -->
			</div>
			
			
			<div class="row lp-list-page-grid" id="content-grids" >
				<?php
					$array['features'] = '';
					if( !empty($_GET['s']) && isset($_GET['s']) && $_GET['s']=="home" ){
						echo listingpro_get_campaigns_listing( 'lp_top_in_search_page_ads', false,$taxQuery,$TxQuery,$priceQuery,$sKeyword);
					}else{
						echo listingpro_get_campaigns_listing( 'lp_top_in_search_page_ads', false, $TxQuery,$searchQuery,$priceQuery,$sKeyword);
					}
					
					if( $my_query->have_posts() ) {
						while ($my_query->have_posts()) : $my_query->the_post();  
							get_template_part( 'listing-loop' );							
						endwhile;						
					}elseif(empty($ad_campaignsIDS)){
						?>						
							<div class="text-center margin-top-80 margin-bottom-80">
								<h2><?php esc_html_e('No Results','listingpro'); ?></h2>
								<p><?php esc_html_e('Sorry! There are no listings matching your search.','listingpro'); ?></p>
								<p><?php esc_html_e('Try changing your search filters or','listingpro'); ?>
									<a href="<?php echo get_the_permalink(); ?>"><?php esc_html_e('Reset Filter','listingpro'); ?></a>
								</p>
							</div>									
						<?php
					}	
					
				?>
				<div class="md-overlay"></div>
			</div>
			<?php echo listingpro_load_more($my_query); ?>
		</div>
	</section>
	<!--==================================Section Close=================================-->