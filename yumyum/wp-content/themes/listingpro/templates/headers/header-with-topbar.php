<?php
	/* Header with topBar */
	global $listingpro_options;
	$lp_top_bar = $listingpro_options['top_bar_enable'];
	$listing_style = $listingpro_options['listing_style'];
	$header_fullwidth = $listingpro_options['header_fullwidth'];
	$headerSrch = $listingpro_options['search_switcher'];
	$topBannerView = $listingpro_options['top_banner_styles'];

	$headerWidth = '';
	if($header_fullwidth == 1){
		$headerWidth = 'fullwidth-header';
	}else{
		$headerWidth = 'container';
	}

	$listing_style = '';
	$listing_styledata = '';
	$headerClass = 'header-normal';
	$listing_style = $listingpro_options['listing_style'];
	if(isset($_GET['list-style']) && !empty($_GET['list-style'])){
		$listing_style = $_GET['list-style'];
	}
	if(is_tax('location') || is_tax('listing-category') || is_tax('features') || is_search()){
		if($listing_style == '2' || $listing_style == '3'){
			$headerClass = 'header-fixed';
		}
	}
	$menuColor= '';
	if(!is_front_page() || is_home()){
		$menuColor =  ' lp-menu-bar-color';
	}elseif ( $topBannerView == 'map_view' && is_front_page() ) {
		$menuColor =  ' lp-menu-bar-color';
	}
	
	$menuClass = '';
	 if(!is_front_page()){
		 $menuClass = 'col-md-6';
	 }else{
		  $menuClass = 'col-md-8';
	 }
?>
<header class="header-with-topbar <?php if(is_front_page()){ echo 'lp-header-bg'; } ?> <?php echo esc_attr($headerClass); ?>">
	<?php if(is_front_page()){ ?> <div class="lp-header-overlay"></div> <?php } ?>
	<?php if( $lp_top_bar == true ){ ?>
		<div class="lp-topbar">
			<div class="<?php echo $headerWidth; ?>">
				<div class="row">
					<div class="col-md-9 col-sm-9 text-left">
						<?php echo listingpro_top_bar_menu(); ?>
					</div>
					<div class="col-md-3 col-sm-3 text-right">
						<?php get_template_part( 'templates/join-now'); ?>
					</div>
				</div>
			</div>
		</div><!-- ../topbar -->
	<?php } ?>
	<div class="lp-menu-bar <?php echo esc_attr($menuColor);  ?>">
		<div class="<?php echo $headerWidth; ?>">
			<div id="menu" class="small-screen">
				<?php
					if(is_front_page()) {
						echo listingpro_primary_menu();
					}else {
						echo listingpro_inner_menu();
					}
				?>
			</div>
			<div class="row">
				<div class="col-md-2 col-xs-6 lp-logo-container">
					<div class="lp-logo">
						<a href="<?php echo esc_url(home_url('/')); ?>">
							<?php
							if(is_front_page()){
							    listingpro_primary_logo(); 
							}
							else{
								listingpro_secondary_logo(); 
							}
							?>
						</a>
					</div>
				</div>
				<div class="header-right-panel clearfix col-md-10 col-sm-10 col-xs-12">
					<?php
						if($headerSrch == 1) {
							if(!is_front_page() && !is_page_template('template-dashboard.php')){
								get_template_part('templates/search/top_search');
							}
						}
					?>
					<div class="col-xs-5 mobile-nav-icon">
						<a href="#menu" class="nav-icon">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
					</div>
					<div class="<?php echo $menuClass; ?> col-xs-12 lp-menu-container pull-right">
						<?php 
							$addURL = listingpro_url('add_listing_url_mode');
							if(!empty($addURL)){
						?>
							<div class="pull-right lp-add-listing-btn">
								<ul>
									<li>
										<a href="<?php echo listingpro_url('add_listing_url_mode'); ?>">
											<i class="fa fa-plus"></i>
											<?php esc_html_e('Add Listing', 'listingpro') ?>
										</a>
									</li>
								</ul>
							</div>
						<?php 
							}
						?>
						<div class="lp-menu pull-right menu">
							<?php
								if(is_front_page()) {
									echo listingpro_primary_menu();
								}else {
									echo listingpro_inner_menu();
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- ../menu-bar -->
</header>