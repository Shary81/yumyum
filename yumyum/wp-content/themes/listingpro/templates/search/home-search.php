		<?php
								
			$listCats=array();
			$catIcon = '';
			$defaultCats = null;
			global $listingpro_options;
			$search_placeholder = $listingpro_options['search_placeholder'];
			$location_default_text = $listingpro_options['location_default_text'];
		?>
		<div class="lp-search-bar">
			<form autocomplete="off" class="form-inline" action="<?php echo home_url(); ?>" method="get" accept-charset="UTF-8">
				
				<div class="form-group lp-suggested-search">
					<div class="input-group-addon lp-border"><?php esc_html_e('What','listingpro'); ?></div>
						<div class="pos-relative">
							<div class="what-placeholder pos-relative" data-holder="">
							<input autocomplete="off" type="text" class="lp-suggested-search js-typeahead-input lp-search-input form-control ui-autocomplete-input dropdown_fields" name="select" id="select" placeholder="<?php echo $search_placeholder; ?>" data-prev-value='0'>
							<i class="cross-search-q fa fa-times-circle" aria-hidden="true"></i>
							<img class='loadinerSearch' width="100px" src="<?php echo get_template_directory_uri().'/assets/images/search-load.gif' ?>"/>
							<input type="hidden" name="lp_s_tag" id="lp_s_tag">
							<input type="hidden" name="lp_s_cat" id="lp_s_cat">
							<input type="hidden" name="s" value="home">
							<input type="hidden" name="post_type" value="listing">
							</div>
							<div id="input-dropdown">
								<ul>
									<?php
										
										$args = array(
											'post_type' => 'listing',
											'order' => 'ASC',
											'hide_empty' => false,
											'parent' => 0,
										);
										$listCatTerms = get_terms( 'listing-category',$args);
										if ( ! empty( $listCatTerms ) && ! is_wp_error( $listCatTerms ) ){
											foreach ( $listCatTerms as $term ) {
												$catIcon = listingpro_get_term_meta( $term->term_id,'lp_category_image' );
												if(!empty($catIcon)){
													$catIcon = '<img class="d-icon" src="'.$catIcon.'" />';
												}
												echo '<li class="lp-wrap-cats" data-catid="'.$term->term_id.'">'.$catIcon.'<span class="lp-s-cat">'.$term->name.'</span></li>';
												
												$defaultCats .='<li class="lp-wrap-cats" data-catid="'.$term->term_id.'">'.$catIcon.'<span class="lp-s-cat">'.$term->name.'</span></li>';
												
												
											}
										}
									?>
									
								</ul>
								<div style="display:none" id="def-cats"><?php echo $defaultCats;?></div>
							</div>
						</div>
				</div>
				
				
				<div class="form-group lp-location-search">
					<div class="input-group-addon lp-border lp-where"><?php esc_html_e('Where','listingpro'); ?></div>
					<div class="ui-widget border-dropdown">
						<i class="fa fa-crosshairs"></i>
					  <select class="chosen-select chosen-select5" name="lp_s_loc" id="searchlocation">
						<option id="def_location" value=""><?php echo $location_default_text; ?></option>
						<?php 
							$args = array(
							'post_type' => 'listing',
							'order' => 'ASC',
							'hide_empty' => false,
							'parent' => 0,
							);
							$locations = get_terms( 'location',$args);
							if ( ! empty( $locations ) && ! is_wp_error( $locations ) ){
								foreach($locations as $location) {
									if(is_tax('location') && $term_ID == $location->term_id){
										$selected = 'selected';
									}else{
										$selected = '';
									}
									echo '<option '.$selected.' value="'.$location->term_id.'">'.$location->name.'</option>';
								}		
							}		
						?>	
					  </select>
					</div>
				</div>
				<div class="form-group pull-right">
					<div class="lp-search-bar-right">
						<input value="<?php echo esc_html__( 'Search', 'listingpro' );?>" class="lp-search-btn" type="submit">
						<i class="icons8-search lp-search-icon"></i>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ellipsis.gif" class="searchloading">
						<!--
							<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/searchloader.gif" class="searchloading">
						-->
					</div>
				</div>
					
				
			</form>
			
		</div>