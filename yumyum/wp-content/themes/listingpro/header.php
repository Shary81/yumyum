<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
	   <!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Favicon -->
		<?php listingpro_favicon(); ?>	
		<?php wp_head(); ?>
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
	</head>
    <body <?php body_class() ?> data-submitlink="<?php echo listingpro_url('submit-listing'); ?>">
	<?php
		global $listingpro_options;
		$mapbox_token= '';
		$map_style= '';
		$mapOption = $listingpro_options['map_option'];

		$search_view = $listingpro_options['search_views'];
		$search_layout = $listingpro_options['search_layout'];
		$alignment = $listingpro_options['search_alignment'];
		$top_banner_styles = $listingpro_options['top_banner_styles'];

		$alignClass = '';
		if( $top_banner_styles == 'map_view' ) {			
			if ( $alignment == 'align_top' ) {
				$alignClass = 'lp-align-top';
			}elseif ( $alignment == 'align_middle' ) {
				$alignClass = 'lp-align-underBanner';
			}elseif ( $alignment == 'align_bottom' ) {
				$alignClass = 'lp-align-bottom';
			}
		}


		if($mapOption == 'mapbox'){
			$mapbox_token = $listingpro_options['mapbox_token'];
			$map_style = $listingpro_options['map_style'];
		}
		
		
		$primary_logo = $listingpro_options['primary_logo']['url'];
		$listing_style = '';
		$listing_styledata = '';
		$listing_style = $listingpro_options['listing_style'];
		if(isset($_GET['list-style']) && !empty($_GET['list-style'])){
			$listing_styledata = 'data-list-style="'.$_GET['list-style'].'"';
			$listing_style = $_GET['list-style'];
		}

		$header_views = $listingpro_options['header_views'];
		$topBannerView = $listingpro_options['top_banner_styles'];

		$imgClass = '';
		if( $topBannerView == 'map_view' ) {
			$imgClass = '';
		}elseif ( $topBannerView ) {
			$imgClass = 'lp-header-bg';
		}
	?>
	
	<div id="page" class="clearfix" <?php echo esc_attr($listing_styledata); ?> data-mtoken="<?php echo esc_attr($mapbox_token); ?>"  data-mstyle="<?php echo esc_attr($map_style); ?>" data-sitelogo="<?php echo esc_attr($primary_logo); ?>" data-site-url="<?php echo esc_url(home_url('/')); ?>">
	
	<!--==================================Header Open=================================-->
<div class="pos-relative">
	<div class="header-container <?php if(is_front_page()){ echo $imgClass; } ?> ">
		<?php
			//get_template_part( 'templates/headers/header-with-topbar');
			switch ($header_views) {
				 case 'header_with_topbar':
				 get_template_part( 'templates/headers/header-with-topbar');
				 break;
				case 'header_menu_bar':
				 get_template_part( 'templates/headers/header-menu-dropdown');
				 break;
				case 'header_without_topbar':
				 get_template_part( 'templates/headers/header-without-topbar');
				 break;

				default:
				 break;
			}
   
   
			get_template_part( 'templates/popups');
			get_template_part( 'templates/banner');
		?>
	</div>
	<!--==================================Header Close=================================-->

	<!--================================== Search Close =================================-->
	<?php 
	if(is_front_page() && !is_home()){
		$topBannerView = $listingpro_options['top_banner_styles'];
		if( $topBannerView == 'map_view' ) {
			get_template_part( 'templates/search/template_search1' );
		}
	}
	?>

	<!--================================== Search Close =================================-->
</div>

<?php 
	if ( is_front_page() ) { ?>
		<div class="home-categories-area <?php echo esc_attr($alignClass); ?>">
			<?php echo listingpro_banner_categories(); ?>
		</div>
		<?php
	}
?>