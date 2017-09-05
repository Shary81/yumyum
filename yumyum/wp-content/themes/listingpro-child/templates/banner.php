	<?php
	if ( is_front_page() && is_home()  )
	{
	
	?>
		<div class="page-heading listing-page">
			<div class="page-heading-inner-container text-center">
				<h1><?php _e('Home', 'listingpro') ?></h1>
			</div>
			<div class="page-header-overlay"></div>
		</div>
	<?php 
	} elseif ( is_home() ) {
	?>
		<div class="page-heading listing-page">
			<div class="page-heading-inner-container text-center">
				<h1>
					<?php
						$queried_object = get_queried_object();
						echo single_post_title('', FALSE);
					?>
				</h1>
				<ul class="breadcrumbs">
					<li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'listingpro') ?></a></li>
					<li><span><?php _e('Blog', 'listingpro') ?></span></li>
				</ul>
			</div>
			<div class="page-header-overlay"></div>
		</div>
	<?php 
	}elseif ( is_archive() ) {
		
		if(is_tax('location') || is_tax('listing-category') || is_tax('features') ){
			global $listingpro_options;
			$listing_style = $listingpro_options['listing_style'];
			if(isset($_GET['list-style']) && !empty($_GET['list-style'])){
				$listing_style = $_GET['list-style'];
			}
			if($listing_style == '1'){
		?>
		<?php if( is_tax('listing-category') ){ ?>
			<?php
				$queried_object = get_queried_object();
				$term_id = $queried_object->term_id;
				$category_banner = listing_get_tax_meta($term_id,'category','banner');
				if($category_banner){
			?>
				<div class="page-heading listing-page" style="background:url(<?php echo esc_attr($category_banner); ?>);">
			<?php
				} else{
			?>
				<div class="page-heading listing-page">
			<?php
				} 
			?>
				
		<?php  } else { ?>
				<div class="page-heading listing-page">
		<?php } ?>
				<div class="page-heading-inner-container cat-area">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<?php if (function_exists('listingpro_breadcrumbs')) listingpro_breadcrumbs(); ?>
							</div>
							<div class="col-md-6 col-sm-6 text-right">
								<p class="view-on-map">
									<!-- Marker icon by Icons8 -->
									<?php echo listingpro_icons('whiteMapMarkerFill'); ?>
									<a class="md-trigger mobilelink all-list-map" data-modal="modal-listing"><?php echo esc_html_e('View on map', 'listingpro'); ?></a>
								</p>
								<div class="listing-view-layout">
									<ul>
										<li><a class="grid" href="#"><i class="fa fa-th"></i></a></li>
										<li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="page-header-overlay"></div>
			</div>
		<?php 
			}
		}elseif(is_author(get_queried_object_id())){			
		?>
			<div class="page-heading listing-page">
				<div class="page-heading-inner-container text-center">
					<h1><?php echo get_the_archive_title(get_queried_object_id()); ?></h1>
					<?php if (function_exists('listingpro_breadcrumbs')) listingpro_breadcrumbs(); ?>
				</div>
				<div class="page-header-overlay"></div>
			</div> 
		 
		<?php
		}else{
		?>
			<div class="page-heading listing-page">
				<div class="page-heading-inner-container text-center">
					<h1><?php echo the_archive_title(); ?></h1>
					<?php if (function_exists('listingpro_breadcrumbs')) listingpro_breadcrumbs(); ?>
				</div>
				<div class="page-header-overlay"></div>
			</div> 
		<?php 
		}
		
	}elseif ( is_front_page() ) {
		global $listingpro_options;
		$topBannerView = $listingpro_options['top_banner_styles'];
		$top_title = $listingpro_options['top_title'];
		$top_main_title = $listingpro_options['top_main_title'];
		$main_text = $listingpro_options['main_text'];
		$map_height = $listingpro_options['map_height'];
		
		$courtesySwitch = $listingpro_options['courtesy_switcher'];
		if($courtesySwitch == 1) {
			$courtesyListing = $listingpro_options['courtesy_listing'];
		}
		$height = '';
		if ( !empty($map_height) ) {
			$height = ' style="height:'.$map_height.'px;"';
		}else {
			$height = ' style="height:500px;"';
		}
		if( $topBannerView == 'map_view' ) {
		?>
			<div class="lp_home" id="homeMap" <?php echo $height; ?>></div>
		<?php } elseif( $topBannerView == 'banner_view' ) { ?>
			<div class="lp-home-banner-contianer">
				<div class="lp-home-banner-contianer-inner">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 text-center">
								<?php if(!empty($top_main_title)) { ?>
									<h1><?php echo $top_main_title; ?></h1>
								<?php } ?>
								<?php if(!empty($top_title)) { ?>
									<p class="lp-banner-browse-txt"><?php echo $top_title; ?></p>
								<?php } ?>
							</div>
							<div class="col-md-8 col-xs-12 col-md-offset-2 col-sm-offset-0">
								<?php get_template_part( 'templates/search/home-search'); ?>
								<div class="text-center lp-search-description">
									<?php if(!empty($main_text)) { ?>
										<p><?php echo $main_text; ?></p>
									<?php } ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-arrow.png" alt="banner-arrow" class="banner-arrow" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="page-header-overlay"></div>
				<?php if($courtesySwitch == 1) { ?>
					<div class="img-curtasy">
						<p><?php esc_html_e('Image courtesy by','listingpro'); ?> <span><a href="<?php echo get_the_permalink($courtesyListing); ?>"><?php echo get_the_title($courtesyListing); ?> <i class="fa fa-angle-right"></i></a></span></p>
					</div>
				<?php } ?>
			</div><!-- ../Home Search Container -->
		<?php } ?>

		<?php
	}elseif ( is_page()  ) {
		
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			if(has_shortcode( get_the_content(), 'vc_row' ) && has_shortcode( get_the_content(), 'listingpro_promotional' )){
				
			}else{
			?>	
				<div class="page-heading listing-page">
					<div class="page-heading-inner-container text-center">
						<h1><?php echo get_the_title(); ?></h1>
						<?php if (function_exists('listingpro_breadcrumbs')) listingpro_breadcrumbs(); ?>
					</div>
					<div class="page-header-overlay"></div>
				</div>
			<?php
			}
		endwhile; endif; 
		
		
	 
	}elseif ( is_search() ) {
		global $listingpro_options;
		$listing_style = $listingpro_options['listing_style'];
		if(isset($_GET['list-style']) && !empty($_GET['list-style'])){
			$listing_style = $_GET['list-style'];
		}
			
		if($listing_style == '1' && isset($_GET['post_type']) && $_GET['post_type'] == 'listing'){
		$sterm = '';	
		$sloc = '';	
		$termName = '';	
		$locName = '';	
		if(isset($_GET['lp_s_cat']) && !empty($_GET['lp_s_cat'])){
			$sterm = $_GET['lp_s_cat'];
			$termo = get_term_by('id', $sterm, 'listing-category');
			$termName = 'Best '.$termo->name;
		}	
		if(isset($_GET['lp_s_cat']) && empty($_GET['lp_s_cat']) && isset($_GET['lp_s_tag']) && !empty($_GET['lp_s_tag'])){
			$sterm = $_GET['lp_s_tag'];
			$termo = get_term_by('id', $sterm, 'list-tags');
			$termName = 'Results For '.$termo->name;
		}
		if(isset($_GET['lp_s_loc']) && !empty($_GET['lp_s_loc'])){
			$sloc = $_GET['lp_s_loc'];
			if(is_numeric($sloc)){
				$sloc = $sloc;
				$termo = get_term_by('id', $sloc, 'location');
				$locName = 'In '.$termo->name;
			}
			else{
				$checkTerm = listingpro_term_exist($sloc,'location');
				if($checkTerm==true){
					$locTerm = get_term_by('name', $sLocation, 'location');
					$locName = 'In '.$locTerm->name;
				}
				else{
					$locName = 'In '.$sloc;
				}
			}
			
		}
	?>
		<div class="page-heading listing-page">
		<div class="page-heading-inner-container search-page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<?php if (function_exists('listingpro_breadcrumbs')) listingpro_breadcrumbs(); ?>						
					</div>
					<div class="col-md-6 col-sm-6 text-right">
						<p class="view-on-map">
							<!-- Marker icon by Icons8 -->
							<?php echo listingpro_icons('whiteMapMarkerFill'); ?>
							<a class="md-trigger mobilelink all-list-map" data-modal="modal-listing"><?php echo esc_html_e('View on map', 'listingpro'); ?></a>
						</p>
						<div class="listing-view-layout">
							<ul>
								<li><a class="grid" href="#"><i class="fa fa-th"></i></a></li>
								<li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="page-header-overlay"></div>
		</div>
	<?php 
		}
	}elseif ( is_404() ) {
	?>
		<div class="page-heading listing-page">
			<div class="page-heading-inner-container text-center">
				<h1>404</h1>
				<?php if (function_exists('listingpro_breadcrumbs')) listingpro_breadcrumbs(); ?>
			</div>
			<div class="page-header-overlay"></div>
		</div>
	<?php 
	}else{
	?>
		
	<?php 
	} 
	?>