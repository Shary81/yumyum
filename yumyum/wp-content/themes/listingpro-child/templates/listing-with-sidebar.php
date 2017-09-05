<?php
					$queried_object = get_queried_object();
					$term_id = $queried_object->term_id;
					$taxName = $queried_object->taxonomy;

					$termID = get_term_by('id', $term_id, $taxName);
					$termName = $termID->name;
					$term_ID = $termID->term_id;
					$type = 'listing';
					
					$taxTaxDisplay = true;
					if(is_tax('listing-category') || is_tax('location') || is_tax('features')){
						$TxQuery = array(
									'taxonomy' => $taxName,
									'field' => 'id',
									'terms' => $termID->term_id,
									'operator'=> 'IN' //Or 'AND' or 'NOT IN'
								 );
					}
					
					if(isset($_GET['s'])){
						$s = $_GET['s'];
					}else{
						$s = '';
					}
					
					
					
					$args=array(
						'post_type' => $type,
						'post_status' => 'publish',
						'posts_per_page' => 12,
						's' => $s,
						'tax_query' => array(
							$TxQuery	
						),
					);
					
					$my_query = null;
					$my_query = new WP_Query($args);
					$found = $my_query->found_posts;
					if(($found > 1)){
					$foundtext = esc_html__('Results', 'listingpro');
					}else{
						$foundtext = esc_html__('Result', 'listingpro');
					}
?>
<!--==================================Section Open=================================-->

	<section class="section-fixed listing-with-sidebar">
		<div class="full-width clearfix">
		<?php
		$category_banner = listing_get_tax_meta($termID->term_id,'category','banner');
		global $listingpro_options;
		$c_ad = $listingpro_options['c_ad']['url'];
		
		if( !empty($category_banner) ){ ?>
		<div class="width-32-percent pull-left" style="background:url(<?php echo esc_url($category_banner); ?>)">
		<?php } else{?>
		<div class="width-32-percent pull-left">	
		<?php } ?>
			
				<div class="pull-right listing-sidebar-left">
					<div class="sidebar-breadcrumbs padding-bottom-30">
						<h2 class="breadcrumb-title">
							<?php echo  $termID->name; ?>
						</h2>
						<ul class="breadcrumbs">
							<li><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html_e('Home', 'listingpro'); ?></a></li>
							<li><span><?php echo  $termID->name; ?></span></li>
						</ul>
					</div>
					<div class="sider-bar-reset padding-bottom-10">
						<p>
							<?php echo esc_html_e('Showing all Listings for', 'listingpro'); ?> 
							<span class="fst-term" id="<?php echo  $taxName; ?>">
								<?php echo  $termID->name; ?>
							</span> 
							<span class="sec-term"></span>
							<span class="tag-term showbread" ></span>
							<a href="" class="achor-color reset_bread">
								<?php echo esc_html_e('Reset', 'listingpro'); ?>
							</a>
						</p>
					</div>
					<div class="form-cotnainer">
						<form class="form-inline clearfix" method="post" enctype="multipart/form-data" id="searchform">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon lp-border"><i class="fa fa-search"></i></div>
									<input type="text" class="form-control lp-border border-right-radius" id="searchInput" name="s" value="<?php echo esc_attr($s); ?>" placeholder="What is your Interest?">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon lp-border"><i class="fa fa-crosshairs"></i></div>
										<div class="ui-widget border-dropdown">
										  <select class="chosen-select7 tag-select-third" name="searchlocation" id="searchlocation">
											
											<option value=""><?php esc_html_e('All Locations','listingpro'); ?></option>
											<?php 
												$args = array(
												'post_type' => 'listing',
												'order' => 'ASC',
												'hide_empty' => false,
												);

												$locations = get_terms( 'location',$args);
												foreach($locations as $location) {
													if(is_tax('location') && $term_ID == $location->term_id){
														$selected = 'selected';
													}else{
														$selected = '';
													}
													
													echo '<option '.$selected.' value="'.$location->term_id.'">'.$location->name.'</option>';
													
												}		
											?>		
										  </select>
										</div>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon lp-border"><i class="fa fa-list"></i></div>
										<div class="ui-widget comboboxCategory border-dropdown">
										 <select class="chosen-select2 tag-select-third" name="searchcategory" id="searchcategory">
											
											<option value=""><?php esc_html_e('All Categoires','listingpro'); ?></option>
											<?php 
												$args = array(
												'post_type' => 'listing',
												'order' => 'ASC',
												'hide_empty' => false,
												);
												
												$locations = get_terms( 'listing-category',$args);
												foreach($locations as $location) {
													
													if(is_tax('listing-category') && $term_ID == $location->term_id){
														$selected = 'selected';
													}else{
														$selected = '';
													}
													echo '<option '.$selected.' value="'.$location->term_id.'">'.$location->name.'</option>';
													
												}		
											?>	
										  </select>
										</div>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
										<div class="input-group-addon lp-border"><i class="fa fa-tag"></i></div>
										<select data-placeholder="Tags" class="chosen-select tag-select-third" name="searchtags" id="searchtags" multiple >
										
											<?php 
												$args = array(
												'post_type' => 'listing',
												'order' => 'ASC',
												'hide_empty' => false,
												);

												$locations = get_terms( 'features',$args);
												foreach($locations as $location) {
													
													echo '<option value="'.$location->name.'">'.$location->name.'</option>';
													
												}		
											?>	
									  </select>
								</div>
							</div>
						</form>
					</div>
					<div class="advertisement-box-270x100 padding-top-20">
					<?php if($c_ad){ ?>
						<img src="<?php echo esc_url($c_ad); ?>" alt="boximage" />
					<?php } ?>
						
					</div>
				</div>
				<div class="page-header-overlay"></div>
			</div><!-- ../width-32-percent -->
			<div class="width-68-percent pull-right">
				<div class="pull-left listing-container-right">
						<div class="listing-page-result-row margin-bottom-15 padding-top-25 clearfix">
							<div class="col-md-12">
								<div class="LPtagsContainer ">
									
								</div>
							</div>
							<div class="col-md-6 col-sm-6 text-left" id="listing_found">
								<p><?php echo esc_html($found); ?> <?php echo esc_html($foundtext); ?></p>
							</div>
							<div class="col-md-6 col-sm-6 text-right">
								<p class="view-on-map">
									<!-- Marker icon by Icons8 -->
									<?php echo listingpro_icons('mapMarker'); ?>
									<a class="md-trigger mobilelink all-list-map" data-modal="modal-listing"><?php echo esc_html_e('View on map', 'listingpro'); ?></a>
								</p>
							</div>
						</div>
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
								
								
						<div class="clearfix lp-list-page-grid" id="content-grids" >
							<?php
								if( $my_query->have_posts() ) {
									while ($my_query->have_posts()) : $my_query->the_post();  
										get_template_part( 'listing-loop' );
									endwhile;
								}else{
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
						
	
				</div>
			</div><!-- ../width-68-percent -->
		</div>
	</section>
	<!--==================================Section Close=================================-->