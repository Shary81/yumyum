<?php
/**
 * The template for displaying Search result for Listings.
 */

get_header(); 

	global $listingpro_options;

		$listing_style = $listingpro_options['listing_style'];

	
			switch($listing_style) {
		 
					case '1': get_template_part( 'templates/listing-simple' );
					break;
			 
					case '2': get_template_part( 'templates/listing-with-sidebar' );
					break;
			 
					case '3': get_template_part( 'templates/listing-with-map' );
					break;
			 
			}
			

get_footer();