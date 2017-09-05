<?php
	$sQuery = '';
	$sLocation = '';
	$sLocationName = '';
	$lp_tag = '';
	$lp_cat = '';
	$sLoc = '';
	$defaultCats = null;
	if( isset($_GET['select']) && !empty($_GET['select']) ){
		$sQuery = $_GET['select'];
	}
	if( isset($_GET['lp_s_loc']) && !empty($_GET['lp_s_loc']) ){
		$sLocation = $_GET['lp_s_loc'];
		if(is_numeric($sLocation)){
			$locTerm = get_term_by('id', $sLocation, 'location');
			$sLoc = $locTerm->name;
		}
		else{
			$checkTerm = listingpro_term_exist($sLocation,'location');
			if($checkTerm==true){
				$locTerm = get_term_by('name', $sLocation, 'location');
				$sLocationName = $locTerm->name;
				$sLocation = $locTerm->term_id;
				$sLoc = $sLocation ? $sLocationName : esc_html__( 'City...', 'listingpro' );
			}
			else{
				$sLoc = $sLocation;
				
			}
		}
		

	}
	if(is_tax('location')){
		$queried_object = get_queried_object();
		$sLocation = $queried_object->term_id;		
	}
	
	if( !empty($_GET['lp_s_tag']) && isset($_GET['lp_s_tag'])){
		$lp_tag = $_GET['lp_s_tag'];
	}
	if( !empty($_GET['lp_s_cat']) && isset($_GET['lp_s_cat'])){
		$lp_cat = $_GET['lp_s_cat'];
	}
	global $listingpro_options;
	$search_placeholder = $listingpro_options['search_placeholder'];
	$location_default_text = $listingpro_options['location_default_text'];
?>
<div class="header-filter pos-relative form-group margin-bottom-0 col-md-5">
	<form autocomplete="off" class="form-inline top-search-form" action="<?php echo home_url(); ?>" method="get" accept-charset="UTF-8">
		<div class="search-form-field input-group width-49-percent margin-right-15">
			<div class="input-group-addon lp-border"><?php esc_html_e('What','listingpro'); ?></div>
			<div class="pos-relative">
				<div class="what-placeholder pos-relative" data-holder="">
				<input autocomplete="off" type="text" class="lp-suggested-search js-typeahead-input lp-search-input form-control ui-autocomplete-input dropdown_fields" name="select" id="select" placeholder="<?php echo $search_placeholder; ?>" value="<?php echo $sQuery; ?>" data-prev-value='0'>
				<i class="cross-search-q fa fa-times-circle" aria-hidden="true"></i>
				<img class='loadinerSearch' width="100px" src="<?php echo get_template_directory_uri().'/assets/images/search-load.gif' ?>"/>
				<input type="hidden" name="lp_s_tag" id="lp_s_tag" value="<?php echo $lp_tag; ?>">
				<input type="hidden" name="lp_s_cat" id="lp_s_cat" value="<?php echo $lp_cat; ?>">
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
		<div class="input-group width-49-percent">
			
			<div class="input-group-addon lp-border"><?php esc_html_e('Where','listingpro'); ?></div>
			<div class="ui-widget border-dropdown">
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
						foreach($locations as $location) {
							if($sLocation == $location->term_id){
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
		<div class="lp-search-btn-header pos-relative">
			<input value="" class="lp-search-btn lp-search-icon" type="submit">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ellipsis.gif" class="searchloading loader-inner-header">
		</div>
	</form>
</div>
