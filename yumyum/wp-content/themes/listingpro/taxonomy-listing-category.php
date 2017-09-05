<?php
/**
 * The template for displaying Listing category.
 */

get_header(); 

	global $listingpro_options;

		$listing_style = $listingpro_options['listing_style'];
		if(isset($_GET['list-style']) && !empty($_GET['list-style'])){
			$listing_style = $_GET['list-style'];
		}

	
			switch($listing_style) {
		 
					case '1': get_template_part( 'templates/listing-simple' );
					break;
			 
					case '2': get_template_part( 'templates/listing-with-sidebar' );
					break;
			 
					case '3': get_template_part( 'templates/listing-with-map' );
					break;
			 
			}
			

get_footer();