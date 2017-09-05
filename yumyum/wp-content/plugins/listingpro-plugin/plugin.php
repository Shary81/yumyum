<?php
/*
Plugin Name: ListingPro Plugin
Plugin URI: 
Description: This plugin Only competible With listingpro Theme By CridioStudio.
Version: 0.1
Author: CridioStudio (Dev Team)
Author URI: http://www.cridio.io
Author Email: support@cridio.com

  Copyright 2016 CridioStudio
*/



	/* ============== Visual composer added ============ */

	define('THEMENAME', 'listingpro');
	
	function listingpro_plugin_uploader()
	{
		global $listingpro_options;
		// Register the script like this for a plugin:

		
		/* end js by haroon */
		wp_register_script( 'uploader', plugins_url( '/assets/js/uploader.js', __FILE__ ), array( 'jquery' ) );
		
		wp_register_script( 'main', plugins_url( '/assets/js/main.js', __FILE__ ), array( 'jquery' ) );
		
		
		
		if($listingpro_options['submit-listing'] == get_permalink() || $listingpro_options['edit-listing'] == get_permalink()){
			wp_enqueue_script( 'uploader' );
		}
		wp_enqueue_script( 'main' );
	}
	add_action( 'wp_enqueue_scripts', 'listingpro_plugin_uploader' );
	
	
	
	function listingpro_plugin_admin_script()
	{		
		wp_register_script( 'adminjs', plugins_url( '/assets/js/admin.js', __FILE__ ), array( 'jquery' ) );	
		wp_enqueue_script( 'adminjs' );
	}
	add_action( 'admin_enqueue_scripts', 'listingpro_plugin_admin_script' );
	
	function listingpro_plugin_admin_style()
	{		
		wp_enqueue_style('fontawesome', 'http:////netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css', '', '4.7.0', 'all');
	}
	add_action( 'admin_init', 'listingpro_plugin_admin_style' );
	
	
	
	add_action( 'init', 'jplug_admin_init' );
    function jplug_admin_init() {
		
        /* Register our script. */
		if ( class_exists('WPBakeryVisualComposerAbstract') ) {
			vc_disable_frontend();
		
			require WP_PLUGIN_DIR.'/listingpro-plugin/inc/vc_mods/vc_mods.php';
			$vc_template_dir =  WP_PLUGIN_DIR.'/listingpro-plugin/inc/vc_mods/vc_templates';			
			vc_set_shortcodes_templates_dir( $vc_template_dir );
				include_once(WP_PLUGIN_DIR.'/listingpro-plugin/vc_special_elements.php');
				include_once(WP_PLUGIN_DIR.'/listingpro-plugin/vc-icon-param.php');
				$check = get_option( 'theme_activation' );
				if(!empty($check) && $check != 'none'){
					include_once(WP_PLUGIN_DIR.'/listingpro-plugin/shortcodes/pricing.php');
					include_once(WP_PLUGIN_DIR.'/listingpro-plugin/shortcodes/submit.php');
					include_once(WP_PLUGIN_DIR.'/listingpro-plugin/shortcodes/edit.php');
					include_once(WP_PLUGIN_DIR.'/listingpro-plugin/shortcodes/checkout.php');
				}
		}
		 

	}
		 
    
	

	
	
	
	function post_type_pricing() {
		$labels = array(
	    	'name' => _x('Pricing Plans', 'post type general name', 'listingpro'),
	    	'singular_name' => _x('Price Plans', 'post type singular name', 'listingpro'),
	    	'add_new' => _x('Add New Price Plan', 'book', 'listingpro'),
	    	'add_new_item' => __('Add New Price Plan', 'listingpro'),
	    	'edit_item' => __('Edit Price Plan', 'listingpro'),
	    	'new_item' => __('New Price Plan', 'listingpro'),
	    	'view_item' => __('View Price Plan', 'listingpro'),
	    	'search_items' => __('Search Price Plans', 'listingpro'),
	    	'not_found' =>  __('No Price Plan found', 'listingpro'),
	    	'not_found_in_trash' => __('No Price Plans found in Trash', 'listingpro'), 
	    	'parent_item_colon' => ''
		);		
		$args = array(
	    	'labels' => $labels,
	    	'public' => false,
	    	'publicly_queryable' => false,
	    	'show_ui' => true, 
	    	'query_var' => true,
	    	'rewrite' => true,
	    	'capability_type' => 'post',
	    	'hierarchical' => false,
	    	'menu_position' => null,
	    	'supports' => array('title'),
	    	'menu_icon' => plugins_url( 'listingpro-plugin/images/plans.png', dirname(__FILE__) )
		); 		

		register_post_type( 'price_plan', $args ); 				  
	} 
									  
	add_action('init', 'post_type_pricing');
	

	
	function post_type_listing() {
		
		global $listingpro_options;
		$listingSLUG = '';
		if(class_exists('ReduxFramework')){
			$listingSLUG = $listingpro_options['listing_slug'];
		}
		if(empty($listingSLUG)){
			$listingSLUG = 'listing';
		}
		
		$labels = array(
	    	'name' => _x('Listings', 'post type general name', 'listingpro'),
	    	'singular_name' => _x('Listing', 'post type singular name', 'listingpro'),
	    	'add_new' => _x('Add New', 'book', 'listingpro'),
	    	'add_new_item' => __('Add New List', 'listingpro'),
	    	'edit_item' => __('Edit List', 'listingpro'),
	    	'new_item' => __('New Listing', 'listingpro'),
	    	'view_item' => __('View List', 'listingpro'),
	    	'search_items' => __('Search Listing', 'listingpro'),
	    	'not_found' =>  __('No List found', 'listingpro'),
	    	'not_found_in_trash' => __('No List found in Trash', 'listingpro'), 
	    	'parent_item_colon' => ''
		);		
		$args = array(
	    	'labels' => $labels,
	    	'public' => true,
	    	'publicly_queryable' => true,
	    	'show_ui' => true, 
	    	'query_var' => 'listing',
	    	'rewrite'   => array( 'slug' => $listingSLUG ),
	    	'capability_type' => 'post',
			'has_archive' => false,
	    	'hierarchical' => false,
	    	'menu_position' => null,
	    	'supports' => array( 'title', 'editor', 'author', 'thumbnail','comments' ),
	    	'menu_icon' => plugins_url( 'listingpro-plugin/images/reviews.png', dirname(__FILE__) )
		); 		

		register_post_type( 'listing', $args ); 				  
	} 
									  
	add_action('init', 'post_type_listing',0);
	
		function post_type_form_fields() {
			$labels = array(
				'name' => _x('Form Fields', 'post type general name', 'listingpro'),
				'singular_name' => _x('Field', 'post type singular name', 'listingpro'),
				'add_new' => _x('Add New Field', 'book', 'listingpro'),
				'add_new_item' => __('Add New Field', 'listingpro'),
				'edit_item' => __('Edit Field', 'listingpro'),
				'new_item' => __('New Field', 'listingpro'),
				'view_item' => __('View Field', 'listingpro'),
				'search_items' => __('Search Fields', 'listingpro'),
				'not_found' =>  __('No Field found', 'listingpro'),
				'not_found_in_trash' => __('No Field found in Trash', 'listingpro'), 
				'parent_item_colon' => ''
			);		
			$args = array(
				'labels' => $labels,
				'public' => false,
				'publicly_queryable' => true,
				'show_ui' => true, 
				'query_var' => 'form-fields',
				'rewrite' => true,
				'capability_type' =>'post',
				'has_archive' => false,
				'hierarchical' => false,
				'menu_position' => null,
				'exclude_from_search' => true,
				'show_in_menu' => 'edit.php?post_type=listing',
				'supports' => array( 'title' ),
				'menu_icon' => plugins_url( 'listingpro-plugin/images/blog.png', dirname(__FILE__) )
			); 		

			register_post_type( 'form-fields', $args ); 				  
		} 
		add_action('init', 'post_type_form_fields',0);								  

	
		function listingpro_form_field_sideHide() {
			$screen = get_current_screen();
			if( !empty($screen)) {
				if( in_array( $screen->id, array( 'form-fields') ) ) {				
					echo '<style>#minor-publishing { display: none; }</style>';
				}
			}
		}
		add_action( 'admin_head', 'listingpro_form_field_sideHide' );
		function remove_post_custom_fields() {
			remove_meta_box( 'commentstatusdiv', 'listing', 'normal' );
			remove_meta_box( 'commentsdiv', 'listing', 'normal' );
			remove_meta_box( 'revisionsdiv', 'listing', 'normal' );
			remove_meta_box( 'authordiv', 'listing', 'normal' ); 
			remove_meta_box( 'featuresdiv', 'listing', 'side' );
		}
		add_action( 'admin_menu' , 'remove_post_custom_fields' );	
	
		function listing_category() {
			global $listingpro_options;
			$listing_cat_slug = '';
			if(class_exists('ReduxFramework')){
				$listing_cat_slug = $listingpro_options['listing_cat_slug'];
			}
			if(empty($listing_cat_slug)){
				$listing_cat_slug = 'listing-category';
			}
			register_taxonomy(
				'listing-category',
				'listing',
				array(
					'labels' => array(
						'name' => 'Categories',
						'add_new_item' => 'Add New Category',
						'new_item_name' => "New Category"
					),
					'show_ui' => true,
					'show_tagcloud' => false,
					'hierarchical' => true,
					'rewrite'           => array( 'slug' => $listing_cat_slug ),
					'query_var'     => true,
					'public'            => true,
					'capabilities' => array(
						'assign_terms' => 'assign_listing-category',
					)
					)
			);
			
		}
		add_action( 'init', 'listing_category', 0 );


		function listing_features() {
			global $listingpro_options;
			$listing_features_slug = '';
			if(class_exists('ReduxFramework')){
				$listing_features_slug = $listingpro_options['listing_features_slug'];
			}
			if(empty($listing_features_slug)){
				$listing_features_slug = 'features';
			}
			register_taxonomy(
				'features',
				'listing',
					array(
						'hierarchical'  => true,
						'labels' => array(
							'name' => 'Features',
							'add_new_item' => 'Add New Feature',
							'new_item_name' => "New Feature"
						),
						'singular_name' => "Feature",
						'show_ui' => true,
						'rewrite' => array( 'slug' => $listing_features_slug ),
						'query_var'     => true,
						'public'            => true,
						'capabilities' => array(
							'assign_terms' => 'assign_features',
						)
					)
				);
		}
	add_action( 'init', 'listing_features', 0 );
	function listing_tags() {
			
			register_taxonomy(
				'list-tags',
				'listing',
					array(
						'hierarchical'  => false,
						'label'         => "Tags",
						'singular_name' => "Tag",
						'show_ui' => true,
						'rewrite'       => true,
						'query_var'     => true,
						'public'            => true,
						'capabilities' => array(
							'assign_terms' => 'assign_list-tags',
						)
					)
				);
		}
		add_action( 'init', 'listing_tags', 0 );
	function listing_location() {
		global $listingpro_options;
			$listing_loc_slug = '';
			if(class_exists('ReduxFramework')){
				$listing_loc_slug = $listingpro_options['listing_loc_slug'];
			}
			if(empty($listing_loc_slug)){
				$listing_loc_slug = 'location';
			}
		$location_labels = array(
            'name' => __( 'Location', 'listingpro' ),
            'singular_name' => __( 'Location', 'listingpro' ),
            'search_items' =>  __( 'Search Locations', 'listingpro' ),
            'popular_items' => __( 'Popular Locations', 'listingpro' ),
            'all_items' => __( 'All Locations', 'listingpro' ),
            'parent_item' => __( 'Parent Location', 'listingpro' ),
            'parent_item_colon' => __( 'Parent Location:', 'listingpro' ),
            'edit_item' => __( 'Edit Location', 'listingpro' ),
            'update_item' => __( 'Update Location', 'listingpro' ),
            'add_new_item' => __( 'Add New Location', 'listingpro' ),
            'new_item_name' => __( 'New Location Name', 'listingpro' ),
            'separate_items_with_commas' => __( 'Separate Locations with commas', 'listingpro' ),
            'add_or_remove_items' => __( 'Add or remove Location', 'listingpro' ),
            'choose_from_most_used' => __( 'Choose from the most used Locations', 'listingpro' ),
            'menu_name' => __( 'Locations', 'listingpro' )
        );
		register_taxonomy("location",
			array("listing"),
			 array("hierarchical" => true,
			 'labels' => $location_labels,
			 'show_ui' => true,
                'query_var' => true,
                'rewrite'   => array( 'slug' => $listing_loc_slug ),
				'capabilities' => array(
					'assign_terms' => 'assign_location',
				)
			 )
		 );
		 
	}
add_action( 'init', 'listing_location', 0 );

	add_action( 'init', 'listingpro_plugin_functions', 0 );
    function listingpro_plugin_functions() {
		

		 
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/functions.php');
		 
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/metaboxes/location-meta.php');
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/metaboxes/category-meta.php');
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/metaboxes/features-meta.php');		
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/recaptcha.php');
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/field-types.php');
		 
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/claims.php');
		 
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/metaboxes-plans.php');
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/metaboxes/post-type.php');
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/invoices.php'); 
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/templates/hours-form.php');
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/setup-pages.php');
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/last-review.php');
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/submit-ajax.php');
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/frontend-media.php');
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/invoices-ads.php');
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/register_new_status.php');
		 include_once(WP_PLUGIN_DIR.'/listingpro-plugin/inc/lp_functions.php');

	} 