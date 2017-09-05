<?php
	/*
		Template Name: change_profile_image
	*/
	// echo "called";
	// exit;
?>
<?php
	/*
		Template Name: change_profile_image
	*/
	
?>
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
<body class="overlay-enable modal-open">


<!-- Window-popup Update Header Photo -->

<div class="modal fade show" id="update-header-photo" style="display: block">
	<div class="modal-dialog ui-block window-popup update-header-photo">
		<a href="<?php echo home_url('/profile'); ?>" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 class="title">Update Header Photo</h6>
		</div>

		<a href="#" class="upload-photo-item">
			<svg class="olymp-computer-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-computer-icon"></use></svg>

			<h6>Upload Photo</h6>
			<span>Browse your computer.</span>
		</a>

		<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

			<svg class="olymp-photos-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-photos-icon"></use></svg>

			<h6>Choose from My Photos</h6>
			<span>Choose from your uploaded photos</span>
		</a>
	</div>
</div>

<!-- ... end Window-popup Update Header Photo -->
</body>