<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" lang="en">
<head>

	<title><?php the_title(); ?></title>

	<!-- Required meta tags always come first -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	

</head>
<?php


	if(get_page_link('331')!=get_permalink()){?>
	<header class="header" id="site-header">
	<?php
			// //include TEMPLATEPATH . '/headertop.php';
			get_template_part('/headertop');
	?>
	</header>
	<?php }?>

