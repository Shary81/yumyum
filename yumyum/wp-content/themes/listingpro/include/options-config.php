<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
	
	$allowed_html_array = array(
		'i' => array(
			'class' => array()
		),
		'span' => array(
			'class' => array()
		),
		'a' => array(
			'href' => array(),
			'title' => array(),
			'target' => array()
		)
	);


    // This is your option name where all the Redux data is stored.
    $opt_name = "listingpro_options";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';


    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();



    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'listingpro' ),
        'page_title'           => __( 'Theme Options', 'listingpro' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => true,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.


    );




    
    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */




    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
	// -> START General Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'General Settings', 'listingpro' ),
        'id'               => 'general-settings',
        'customizer_width' => '400px',
        'icon'             => 'el el-cogs',
        'fields'     => array(
            array(
                'id'       => 'resurva_bookings_enable',
                'type'     => 'switch',
                'title'    => __( 'Enable/Disable Resurva Bookings', 'listingpro' ),
                'desc'     => __( 'Bookings enable/disable on frontend user dashboard.', 'listingpro' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'timekit_bookings_enable',
                'type'     => 'switch',
                'title'    => __( 'Enable/Disable Timekit Bookings', 'listingpro' ),
                'desc'     => __( 'Bookings enable/disable on frontend user dashboard.', 'listingpro' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'menu_bookings_enable',
                'type'     => 'switch',
                'title'    => __( 'Enable/Disable Menu', 'listingpro' ),
                'desc'     => __( 'Bookings enable/disable on frontend user dashboard.', 'listingpro' ),
                'default'  => 1,
            ),
			array(
				'id'    => 'lp_info_warning',
				'type'  => 'info',
				'title' => __('URL Rewrite', 'listingpro'),
				'style' => 'warning',
				'desc'  => __('Please update permalinks ( under Settings menu ) after any change you made in following slugs ( to avoice 404 page ) ', 'listingpro')
			),
			array(
                'id'       => 'listing_slug',
                'type'     => 'text',
                'title'    => __( 'Rewrite listing slug', 'listingpro' ),
                'subtitle' => __( 'Default is "listing"', 'listingpro' ),
                'default'  => 'listing',
            ),
			array(
                'id'       => 'listing_cat_slug',
                'type'     => 'text',
                'title'    => __( 'Rewrite listing category slug', 'listingpro' ),
                'subtitle' => __( 'Default is "listing-category"', 'listingpro' ),
                'default'  => 'listing-category',
            ),
			array(
                'id'       => 'listing_loc_slug',
                'type'     => 'text',
                'title'    => __( 'Rewrite location slug', 'listingpro' ),
                'subtitle' => __( 'Default is "location"', 'listingpro' ),
                'default'  => 'location',
            ),
			array(
                'id'       => 'listing_features_slug',
                'type'     => 'text',
                'title'    => __( 'Rewrite features slug', 'listingpro' ),
                'subtitle' => __( 'Default is "features"', 'listingpro' ),
                'default'  => 'features',
            ),
            array(
                'id'       => 'theme_color',
                'type'     => 'color',
                'title'    => __('Primary Theme Color', 'listingpro'), 
                'subtitle' => __('(default: #41a6df).', 'listingpro'),
                'default'  => '#41a6df',
                'validate' => 'color',
            ),
            array(
                'id'       => 'sec_theme_color',
                'type'     => 'color',
                'title'    => __('Secondary Theme Color', 'listingpro'), 
                'subtitle' => __('(default: #363F48).', 'listingpro'),
                'default'  => '#363F48',
                'validate' => 'color',
            ),
			 array(
                'id'       => 'css_editor',
                'type'     => 'ace_editor',
                'title'    => __('Custom CSS', 'listingpro'),
                'subtitle' => __('Paste your CSS code here.', 'listingpro'),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'desc'     => '',
                'default'  => "#header{\nmargin: 0 auto;\n}"
            ),
            array(
                'id'       => 'script_editor',
                'type'     => 'ace_editor',
                'title'    => __('Custom JS', 'listingpro'),
                'subtitle' => __('Paste your JS code here.', 'listingpro'),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'desc'     => '',
                'default'  => "jQuery(document).ready(function(){\n\n});"
            ),
        )
    ) );

    // START Typo Section
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Typography', 'listingpro' ),
        'id'               => 'typography-settings',
        'customizer_width' => '400px',
        'icon'             => 'el el-file-edit',
        'fields'     => array(
            array(
                'id'       => 'typography-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'listingpro' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'listingpro' ),
                'google'   => true,
                'font-backup' => false,
                'text-align'  => false,
                'all_styles'=> true,
                'default'     => array(
                    'color'       => '#7f7f7f',
                    'font-size'   => '',
                    'font-family' => 'Quicksand',
                    'font-weight' => '400',
                    'line-height' => ''
                ),
            ),
            array(
                'id'          => 'nav_typo',
                'type'        => 'typography', 
                'title'       => esc_html__('Navigation Style and Anchor', 'listingpro'),
                'google'      => true, 
                'font-backup' => false,
                'text-align'  => false,
                'line-height'  => false,
                'all_styles'=> true,
                'output'      => array('.menu-item a'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'listingpro'),
                'default'     => array(
                    'color'       => '',
                    'font-style'  => '',
                    'font-family' => 'Quicksand',
                    'google'      => true,
                    'font-size'   => '',
                ),
            ),
            array(
                'id'          => 'h1_typo',
                'type'        => 'typography',
                'title'       => esc_html__('Heading h1 Style', 'listingpro'),
                'google'      => true, 
                'font-backup' => false,
                'text-align'  => false,
                'all_styles'=> true,
                'units'       =>'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'listingpro'),
                'default'     => array(
                    'color'       => '#333', 
                    'font-style'  => '', 
                    'font-family' => 'Quicksand', 
                    'google'      => true,
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ),
            array(
                'id'          => 'h2_typo',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading h2 Style', 'listingpro'),
                'google'      => true, 
                'font-backup' => false,
                'text-align'  => false,
                'all_styles'=> true,
                'units'       =>'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'listingpro'),
                'default'     => array(
                    'color'       => '#333', 
                    'font-style'  => '', 
                    'font-family' => 'Quicksand', 
                    'google'      => true,
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ),
            array(
                'id'          => 'h3_typo',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading h3 Style', 'listingpro'),
                'google'      => true, 
                'font-backup' => false,
                'text-align'  => false,
                'all_styles'=> true,
                'units'       =>'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'listingpro'),
                'default'     => array(
                    'color'       => '#333', 
                    'font-style'  => '', 
                    'font-family' => 'Quicksand', 
                    'google'      => true,
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ),
            array(
                'id'          => 'h4_typo',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading h4 Style', 'listingpro'),
                'google'      => true, 
                'font-backup' => false,
                'text-align'  => false,
                'all_styles'=> true,
                'units'       =>'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'listingpro'),
                'default'     => array(
                    'color'       => '#333', 
                    'font-style'  => '', 
                    'font-family' => 'Quicksand', 
                    'google'      => true,
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ),
            array(
                'id'          => 'h5_typo',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading h5 Style', 'listingpro'),
                'google'      => true, 
                'font-backup' => false,
                'text-align'  => false,
                'all_styles'=> true,
                'units'       =>'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'listingpro'),
                'default'     => array(
                    'color'       => '#333', 
                    'font-style'  => '', 
                    'font-family' => 'Quicksand', 
                    'google'      => true,
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ),
            array(
                'id'          => 'h6_typo',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading h6 Style', 'listingpro'),
                'google'      => true, 
                'font-backup' => false,
                'text-align'  => false,
                'all_styles'=> true,
                'units'       =>'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'listingpro'),
                'default'     => array(
                    'color'       => '#333', 
                    'font-style'  => '', 
                    'font-family' => 'Quicksand', 
                    'google'      => true,
                    'font-size'   => '16px', 
                    'line-height' => '27px'
                ),
            ),
            array(
                'id'          => 'paragraph_typo',
                'type'        => 'typography', 
                'title'       => esc_html__('Paragraph and small elements', 'listingpro'),
                'google'      => true, 
                'font-backup' => false,
                'text-align'  => false,
                'all_styles'=> true,
                'units'       =>'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'listingpro'),
                'default'     => array(
                    'color'       => '#7f7f7f', 
                    'font-style'  => '', 
                    'font-family' => 'Open Sans', 
                    'google'      => true,
                    'font-size'   => '',
                    'line-height' => ''
                ),
            )
        )
    ) );
	// -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header', 'listingpro' ),
        'id'               => 'Header',
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
		'fields'     => array(
            array(
                'id'       => 'header_views',
                'type'     => 'image_select',
                'title'    => esc_html__('Header layout', 'listingpro'), 
                'subtitle' => esc_html__('', 'listingpro'),
                'options'  => array(
                    'header_with_topbar'      => array(
                        'alt'   => 'Listing detail layout', 
                        'img'   => get_template_directory_uri().'/assets/images/admin/header-with-topbar.jpg'
                    ),
                    'header_menu_bar'      => array(
                        'alt'   => 'Listing detail layout', 
                        'img'   => get_template_directory_uri().'/assets/images/admin/header-menu-dropdown.jpg'
                    ),
                    'header_without_topbar'      => array(
                        'alt'   => 'Listing detail layout', 
                        'img'   => get_template_directory_uri().'/assets/images/admin/header-without-topbar.jpg'
                    ),
                ),
                'default' => 'header_without_topbar'
            ),
			
			array(
                'id'       => 'top_bar_enable',
                'type'     => 'switch',
                'title'    => __( 'Enable/Disable Top bar', 'listingpro' ),
                'subtitle' => __( '', 'listingpro' ),
                'required' => array('header_views','equals','header_with_topbar'),
                'default'  => 1,
            ),
            array(
                'id'       => 'top_bar_bgcolor',
                'type'     => 'color',
                'title'    => __('Top Bar Background Color', 'listingpro'), 
                'subtitle' => __('(default: #363F48).', 'listingpro'),
                'required' => array('top_bar_enable','equals','1'),
                'default'  => '#363F48',
                'validate' => 'color',
            ),
			
            array(
                'id'       => 'header_bgcolor',
                'type'     => 'color',
                'title'    => __('Header Background Color', 'listingpro'), 
                'subtitle' => __('(default: #42a7df).', 'listingpro'),
                'default'  => '#42a7df',
                'validate' => 'color',
            ),
			array(
                'id'       => 'header_fullwidth',
                'type'     => 'switch',
                'title'    => __('Header fullwidth or in container', 'listingpro'), 
                'subtitle' => __('', 'listingpro'),
                 'default'  => true,
            ),
			array(
                'id'       => 'search_switcher',
                'type'     => 'switch', 
                'title'    => __('Header Search On/Off', 'listingpro'),
                'subtitle' => __('', 'listingpro'),
                'default'  => false,
            ),
           
			array(
                'id'       => 'primary_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Home Page Logo ', 'listingpro' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload your logo here', 'listingpro' ),
                'default'  => array( 'url' => get_template_directory_uri().'/assets/images/logo.png' ),

            ),	
			array(
                'id'       => 'seconday_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Logo for inner pages', 'listingpro' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload your logo here', 'listingpro' ),
                'default'  => array( 'url' => get_template_directory_uri().'/assets/images/logo2.png' ),

            ),
			array(
                'id'       => 'theme_favicon',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Your Favicon ', 'listingpro' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload your Favicon here', 'listingpro' ),
                'default'  => array( 'url' => get_template_directory_uri().'/assets/images/favicon.png' ),

            ),
			array(
                'id'       => 'page_header',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Page header background image', 'listingpro' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload your Image here', 'listingpro' ),
                'default'  => array( 'url' => get_template_directory_uri().'/assets/images/header-banner.jpg' ),

            ),
            
			
        )
    ) );
    // -> START Banner Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Banner Settings', 'listingpro' ),
        'id'               => 'search_settings',
        'customizer_width' => '400px',
        'icon'             => 'el el-map-marker',
		'fields'     => array(
            array(
                'id'       => 'top_banner_styles',
                'type'     => 'select',
                'title'    => __('Select Top Header Style', 'listingpro'), 
                'subtitle' => __('', 'listingpro'),
                'desc'     => __('', 'listingpro'),
                // Must provide key => value pairs for select options
                'options'  => array(
                    'map_view' => 'Map View',
                    'banner_view' => 'Banner with Search',
                ),
                'default'  => 'banner_view',
            ),
			array(
                'id'       => 'home_banner',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Home Banner Image', 'listingpro' ),
                'compiler' => 'true',
               'subtitle' => __('Upload image for homepage banner', 'listingpro'),
			   'required' => array( 
                    array('top_banner_styles','equals','banner_view') 
                ),
                'default' => array( 'url' => get_template_directory_uri().'/assets/images/home-banner.jpg' ),
            ),
			array(
                'id'       => 'courtesy_switcher',
                'type'     => 'switch', 
                'title'    => __('Courtesy Listing On/Off', 'listingpro'),
                'subtitle' => __('Is this banner courtesy with any listing', 'listingpro'),
                'required' => array( 
                    array('top_banner_styles','equals','banner_view') 
                ),
                'default'  => false,
            ),
            array(
                'id'        =>'courtesy_listing',
                'type'      => 'select',
                'multi'     => false,
                'required' => array( 
                    array('courtesy_switcher','equals', 1),
                ),
                'data'      => 'posts',
                'args'      => array('post_type' => array('listing'), 'posts_per_page' => -1),
                'title'     => esc_html__('Select listing', 'listingpro'),
                'desc'      => esc_html__('', 'listingpro'),
            ),
			array(
				'id'       => 'home_banner_cats',
				'type' => 'select',
                'data' => 'terms',
				'args' => array('taxonomies'=>'listing-category'),
                'multi' => true,
                'title' => __('Select listing categories', 'listingpro'),
                'subtitle' => __('These categories will be appeared on the homepage Banner', 'listingpro'),
				'default' => '',
			),
            array(
                'id'       => 'search_views',
                'type'     => 'select',
                'title'    => __('Select Search View', 'listingpro'), 
                'subtitle' => __('', 'listingpro'),
                'desc'     => __('', 'listingpro'),
                'required' => array( 
                    array('top_banner_styles','equals','map_view') 
                ),
                // Must provide key => value pairs for select options
                'options'  => array(
                    'light' => 'Light',
                    'dark' => 'Dark',
                    'grey' => 'Grey',
                ),
                'default'  => 'light',
            ),
            array(
                'id'       => 'search_alignment',
                'type'     => 'select',
                'title'    => __('Select Search Alignment', 'listingpro'), 
                'subtitle' => __('', 'listingpro'),
                'desc'     => __('', 'listingpro'),
                'required' => array( 
                    array('top_banner_styles','equals','map_view') 
                ),
                // Must provide key => value pairs for select options
                'options'  => array(
                    'align_top' => 'Align with Top Navbar',
                    'align_middle' => 'Align bottom under banner',
                    'align_bottom' => 'Align bottom after banner',
                ),
                'default'  => 'align_middle',
            ),
            array(
                'id'       => 'search_layout',
                'type'     => 'select',
                'title'    => __('Select Search Mode', 'listingpro'), 
                'subtitle' => __('', 'listingpro'),
                'desc'     => __('', 'listingpro'),
                'required' => array( 
                    array('top_banner_styles','equals','map_view') 
                ),
                // Must provide key => value pairs for select options
                'options'  => array(
                    'fullwidth' => 'Fullwidth',
                    'boxed' => 'Boxed',
                ),
                'default'  => 'boxed',
            ),
            array(
                'id'       => 'cat_txt',
                'type'     => 'text',
                'title'    => __( 'Categories Text', 'listingpro' ),
                'subtitle' => __( '', 'listingpro' ),
                'required' => array( 
                    array('top_banner_styles','equals','map_view'),
                    array('search_alignment','!=','align_top')
                ),
                'default'  => 'Just looking around? Let us suggest you something hot & happening! ',
            ),
            array(
                'id'       => 'map_height',
                'type'     => 'text',
                'title'    => __( 'Map Height', 'listingpro' ),
                'subtitle' => __( '', 'listingpro' ),
                'required' => array( 
                    array('top_banner_styles','equals','map_view'),
                ),
                'desc'  => 'Only use numbers do not use Px. i.e 500',
                'default'  => '550',
            ),
			array(
                'id'       => 'search_placeholder',
                'type'     => 'text',
                'title'    => __( 'Banner Search Placeholder', 'listingpro' ),
                'subtitle' => __( '', 'listingpro' ),
                'default'  => 'Ex: food, service, barber, hotel',
            ),
			array(
                'id'       => 'location_default_text',
                'type'     => 'text',
                'title'    => __( 'Location Default Text', 'listingpro' ),
                'subtitle' => __( '', 'listingpro' ),
                'default'  => 'Your City...',
            ),
            array(
                'id'       => 'top_title',
                'type'     => 'text',
                'title'    => __( 'Search Top Title', 'listingpro' ),
                'subtitle' => __( '', 'listingpro' ),
                'required' => array( 
                    array('top_banner_styles','equals','banner_view') 
                ),
                'default'  => "Let's uncover the best places to eat, drink, and shop nearest to you.",
            ),
            array(
                'id'       => 'top_main_title',
                'type'     => 'text',
                'title'    => __( 'Search Main Title', 'listingpro' ),
                'subtitle' => __( '', 'listingpro' ),
                'required' => array( 
                    array('top_banner_styles','equals','banner_view') 
                ),
                'default'  => 'Explore <span class="lp-dyn-city">Your city</span>',
            ), 
            array(
                'id'       => 'main_text',
                'type'     => 'text',
                'title'    => __( 'Search Main Text', 'listingpro' ),
                'subtitle' => __( '', 'listingpro' ),
                'required' => array( 
                    array('top_banner_styles','equals','banner_view') 
                ),
                'default'  => 'Just looking around? Let us suggest you something hot & happening! ',
            ),  
        )
    ) );

	
	
	// -> START Basic Fields
		Redux::setSection( $opt_name, array(
			'title'            => __( 'Map Settings', 'listingpro' ),
			'id'               => 'map_settings',
			'customizer_width' => '400px',
			'icon'             => 'el el-home',
			'fields'     => array(
				array(
					'id'       => 'map_option',
					'type'     => 'select',
					'title'    => __('Select Search Mode', 'listingpro'), 
					'subtitle' => __('', 'listingpro'),
					'desc'     => __('', 'listingpro'),					
					'options'  => array(
						'google' => 'Google Map',
						'mapbox' => 'MapBox API',
					),
					'default'  => 'google',
				),
				array(
					'id'       => 'mapbox_token',
					'type'     => 'text',
					'title'    => __( 'Mapbox Token (Optional)', 'listingpro' ),
					'subtitle' => __( 'Put here MapBox token, If you leave it empty then Google map will work', 'listingpro' ),
					'required' => array( 
						array('map_option','equals','mapbox') 
					),
					'default'  => '',
				),	
				array(
                    'id'       => 'map_style',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Mapbox Map style', 'listingpro'), 
                    'subtitle' => esc_html__('Select any style', 'listingpro'),
					'required' => array( 
						array('map_option','equals','mapbox') 
					),
                    'options'  => array(
                        'mapbox.streets-basic'      => array(
                            'alt'   => 'streets-basic', 
                            'img'   => get_template_directory_uri().'/assets/images/map/streets-basic.png'
                        ),
                        'mapbox.streets'      => array(
                            'alt'   => 'streets', 
                            'img'   => get_template_directory_uri().'/assets/images/map/streets.png'
                        ),
                        'mapbox.outdoors'      => array(
                            'alt'   => 'outdoors', 
                            'img'   => get_template_directory_uri().'/assets/images/map/outdoors.png'
                        ),
						'mapbox.light'      => array(
                            'alt'   => 'light', 
                            'img'   => get_template_directory_uri().'/assets/images/map/light.png'
                        ),
						'mapbox.emerald'      => array(
                            'alt'   => 'emerald', 
                            'img'   => get_template_directory_uri().'/assets/images/map/emerald.png'
                        ),
						'mapbox.satellite'      => array(
                            'alt'   => 'satellite', 
                            'img'   => get_template_directory_uri().'/assets/images/map/satellite.png'
                        ),
						'mapbox.pencil'      => array(
                            'alt'   => 'pencil', 
                            'img'   => get_template_directory_uri().'/assets/images/map/pencil.png'
                        ),
						'mapbox.pirates'      => array(
                            'alt'   => 'pirates', 
                            'img'   => get_template_directory_uri().'/assets/images/map/pirates.png'
                        ),
						
                    ),
                    'default' => '1'
                ),
				array(
					'id'       => 'google_map_api',
					'type'     => 'text',
					'title'    => __( 'Google Map API', 'listingpro' ),
					'subtitle' => __( 'Please set your own google map API key for your site( default key is for only demo)', 'listingpro' ),
					'required' => array( 
						array('map_option','equals','google') 
					),
					'default'  => 'AIzaSyDQIbsz2wFeL42Dp9KaL4o4cJKJu4r8Tvg',
				),
			

				
			)
		) );
		
		
		
		
	include_once(ABSPATH.'wp-admin/includes/plugin.php');	
	if ( is_plugin_active( 'listingpro-plugin/plugin.php' ) ) {
		
		// -> START Basic Fields
		Redux::setSection( $opt_name, array(
    		'title'            => __( 'Listing General Setting', 'listingpro' ),
    		'id'               => 'general_settings',
    		'customizer_width' => '400px',
    		'icon'             => 'el el-list-alt',			
    		'fields'     => array(
                array(
                    'id'       => 'contact_support',
                    'type'     => 'text',
                    'title'    => __( 'Contact Support URL', 'listingpro' ),
                    'subtitle' => __( 'Enter contact support url here for user dashboard.', 'listingpro' ),
                    'default'  => '#',
                ),
    		)
    	) );
		
		
		Redux::setSection( $opt_name, array(
			'title'            => __( 'Listing View', 'listingpro' ),
			'id'               => 'listing_view',
			'customizer_width' => '400px',
			'subsection' => true,
			'icon'             => 'el el-home',
			'fields'     => array(
                array(
                    'id'       => 'listing_style',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Listing page layout', 'listingpro'), 
                    'subtitle' => esc_html__('', 'listingpro'),
                    'options'  => array(
                        '1'      => array(
                            'alt'   => 'Fullwidth - top search', 
                            'img'   => get_template_directory_uri().'/assets/images/admin/listing-search-top.jpg'
                        ),
                       /*  '2'      => array(
                            'alt'   => 'with sidebar search', 
                            'img'   => get_template_directory_uri().'/assets/images/admin/listing-search.jpg'
                        ), */
                        '3'      => array(
                            'alt'   => 'Half map - half listing - top search', 
                            'img'   => get_template_directory_uri().'/assets/images/admin/listing-map.jpg'
                        ),
                    ),
                    'default' => '1'
                ),
				array(
                    'id'       => 'c_ad',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => esc_html__( 'Ad Image', 'listingpro' ),
                    'compiler' => 'true',
                    'required' => array('listing_style','equals','2'),
                    'desc'     => esc_html__( 'Put ad here', 'listingpro' ),
                    'default'  => array( 'url' => get_template_directory_uri().'/assets/images/boximage2.jpg' ),
				),
                array(
                    'id'       => 'listing_views',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Listing page layout', 'listingpro'), 
                    'subtitle' => esc_html__('', 'listingpro'),
                    'options'  => array(
                        'list_view'      => array(
                            'alt'   => 'Listing detail layout', 
                            'img'   => get_template_directory_uri().'/assets/images/admin/listing-view.jpg'
                        ),
                        'grid_view'      => array(
                            'alt'   => 'Listing detail layout', 
                            'img'   => get_template_directory_uri().'/assets/images/admin/grid-view.jpg'
                        ),
                    ),
                    'default' => 'grid_view'
                ),
			)
		) );
		
		Redux::setSection( $opt_name, array(
			'title'            => __( 'Listing Submit & Edit Settings', 'listingpro' ),
			'id'               => 'listing_submit_settings',
			'customizer_width' => '400px',
			'subsection' => true,
			'fields'     => array(
                // Harry Code Starts from here
                array(
                    'id'       => 'submit_ad_img_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('First section Image ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'submit_ad_img',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => esc_html__( 'Upload Image for Submit Listing', 'listingpro' ),
                    'compiler' => 'true',
                    'desc'     => esc_html__( 'Upload Image for Submit Listing', 'listingpro' ),
                    'required' => array('submit_ad_img_switch','equals','1'), 
                    'default'  => array( 'url' => get_template_directory_uri().'/assets/images/submt.png' ),
                ),
                array(
                    'id'       => 'submit_ad_img1_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Second section Image ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'submit_ad_img1',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => esc_html__( 'Upload Image for second section', 'listingpro' ),
                    'compiler' => 'true',
                    'desc'     => esc_html__( 'Upload Image for second section', 'listingpro' ),
                    'required' => array('submit_ad_img1_switch','equals','1'), 
                    'default'  => array( 'url' => get_template_directory_uri().'/assets/images/sbmt.png' ),
                ),
                array(
                    'id'       => 'submit_ad_img2_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Third section Image ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'submit_ad_img2',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => esc_html__( 'Upload Image for third section', 'listingpro' ),
                    'compiler' => 'true',
                    'desc'     => esc_html__( 'Upload Image for third section', 'listingpro' ),
                    'required' => array('submit_ad_img2_switch','equals','1'), 
                    'default'  => array( 'url' => get_template_directory_uri().'/assets/images/sbmt1.png' ),
                ),
                array(
                    'id'       => 'submit_ad_img3_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Fourth section Image ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'submit_ad_img3',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => esc_html__( 'Upload Image for Fourth section', 'listingpro' ),
                    'compiler' => 'true',
                    'desc'     => esc_html__( 'Upload Image for Fourth section', 'listingpro' ),
                    'required' => array('submit_ad_img3_switch','equals','1'), 
                    'default'  => array( 'url' => get_template_directory_uri().'/assets/images/sbmt2.png' ),
                ),
                array(
                    'id'       => 'quick_tip_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Quick Tips ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'quick_tip_title',
                    'type' => 'text',
                    'title'    => esc_html__( 'Quick Tip Title', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'required' => array('quick_tip_switch','equals','1'),                    
                    'default' => 'Quick Tip',
                ),
                array(
                    'id'        => 'quick_tip_text',
                    'type'      => 'textarea',
                    'title'     => esc_html__('Quick Text', 'listingpro'),
                    'subtitle'  => esc_html__('', 'listingpro'),
                    'required' => array('quick_tip_switch','equals','1'), 
                    'default'   => 'Add information about your business below. Your business page will not appear in search results until this information has been verified and approved by our moderators. Once it is approved, you will receive an email with instructions on how to claim your business page.'
                ),
                array(
                    'id'       => 'listing_title_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Title Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),                   
                    'default' => 'Listing Title',
                ),
                array(
                    'id'       => 'listing_city_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add City Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'default' => 'City',
                ),
                array(
                    'id'       => 'listing_gadd_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Google Address Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'default' => 'Full Address (Geolocation)',
                ),
                array(
                    'id'       => 'phone_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Phone ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_ph_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Phone Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'required' => array('phone_switch','equals','1'),
                    'default' => 'Phone',
                ),
                array(
                    'id'       => 'web_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Website URL ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_web_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Website Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'required' => array('web_switch','equals','1'),
                    'default' => 'Website',
                ),
                array(
                    'id'       => 'oph_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Hours ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_oph_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Operational Hours Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'required' => array('oph_switch','equals','1'),
                    'default' => 'Add Business Hours',
                ),
                array(
                    'id'       => 'listing_cat_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Category Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),                   
                    'default' => 'Category',
                ),
                array(
                    'id'       => 'features_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Features area ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_features_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Features area Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'required' => array('features_switch','equals','1'),                    
                    'default' => esc_html__( 'Select your listing features', 'listingpro' ),
                ),
                array(
                    'id'       => 'currency_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Price Range ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_curr_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Price Range Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'required' => array('currency_switch','equals','1'),                    
                    'default' => 'Price Range',
                ),
                array(
                    'id'       => 'digit_price_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Price From ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_digit_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Price From Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'required' => array('digit_price_switch','equals','1'),
                    'default' => 'Price From',
                ),
                array(
                    'id'       => 'price_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Price To ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_price_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Price To Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'required' => array('price_switch','equals','1'),
                    'default' => 'Price To',
                ),
                array(
                    'id'       => 'listing_desc_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Description Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),                   
                    'default' => 'Description',
                ),
                array(
                    'id'       => 'faq_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('FAQ ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_faq_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add FAQ Title', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'required' => array('faq_switch','equals','1'),
                    'default' => 'FAQ',
                ),
                array(
                    'id'       => 'listing_faq_tabs_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add FAQ Tabs Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'required' => array('faq_switch','equals','1'),
                    'default' => 'FAQ',
                ),
                array(
                    'id'       => 'tw_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Twitter URL ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'fb_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Facebook URL ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'lnk_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('LinkedIn ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'google_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Google Plus ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'yt_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Youtube ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'insta_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Instagram ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'tags_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Tags field ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_tags_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Tags Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'required' => array('fb_switch','equals','1'),
                    'default' => 'Tags or keywords (Comma seprated)',
                ),
                array(
                    'id'       => 'vdo_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Business video ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_vdo_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Business video Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'required' => array('vdo_switch','equals','1'),
                    'default' => 'Your Business video',
                ),
                array(
                    'id'       => 'file_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Image Uploading ON/OFF', 'listingpro'),
                    'subtitle' => esc_html__('', 'listingpro'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_email_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Email Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),
                    'default'   => esc_html__( 'Enter email to signup & recieve notification upon listing approval', 'listingpro' ),
                ),
                array(
                    'id'       => 'listing_btn_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Submit Listing Button Text', 'listingpro' ),
                    'subtitle' => esc_html__( '', 'listingpro' ),
                    'description' => esc_html__( '', 'listingpro' ),                    
                    'default' => 'Save & Preview',
                ),
				array(
					'id'       => 'listing_edit_btn_text',
					'type' => 'text',
					'title'    => esc_html__( 'Add Edit Listing Button Text', 'listingpro' ),
					'subtitle' => esc_html__( '', 'listingpro' ),
					'description' => esc_html__( '', 'listingpro' ),					
					'default' => 'Update & Preview',
				),
                // Harry Code Ends from here
			)
		) );
		
		/* **********************************************************************
		 * Property
		 * **********************************************************************/

 
Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Payment Settings', 'listingpro' ),
    'id'     => 'payment-settings',
    'desc'   => '',
    'icon'   => 'el-icon-eur',
    'fields'		=> array(
        array(
            'id'       => 'listings_admin_approved',
            'type'     => 'select',
            'title'    => esc_html__('Submited Listings Should be Approved by Admin ?', 'listingpro'),
            'subtitle' => '',
            'desc'     => '',
            'options'  => array(
                'yes'   => esc_html__( 'Yes', 'listingpro' ),
                'no'   => esc_html__( 'No', 'listingpro' )
            ),
            'default'  => 'yes',
        ),
        array(
            'id'       => 'enable_paid_submission',
            'type'     => 'select',
            'title'    => esc_html__('Enable Paid Submission', 'listingpro'),
            'subtitle' => '',
            'desc'     => '',
            'options'  => array(
                'no'   => esc_html__( 'No', 'listingpro' ),
                'yes'   => esc_html__( 'Yes', 'listingpro' ),
            ),
            'default'  => 'no',
        ),

        array(
            'id'       => 'per_listing_expire',
            'type'     => 'text',
            'required' => array( 'per_listing_expire_unlimited', '=', '1' ),
            'title'    => esc_html__('Number of Expire Days', 'listingpro'),
            'subtitle' => 'No of days until a listings will expire. Starts from the moment the listing is published on the website',
            'desc'     => '',
            'default'  => '30',
        ),
        array(
            'id'       => 'currency_paid_submission',
            'type'     => 'select',
            //'required' => array( 'enable_paid_submission', '!=', 'no' ),
            'title'    => esc_html__('Currency For Paid Submission', 'listingpro'),
            'subtitle' => '',
            'desc'     => '',
            'options'  => array(
                'USD'  => 'USD',
                'EUR'  => 'EUR',
                'AUD'  => 'AUD',
                'BRL'  => 'BRL',
                'CAD'  => 'CAD',
                'CHF'  => 'CHF',
                'CZK'  => 'CZK',
                'DKK'  => 'DKK',
                'HKD'  => 'HKD',
                'HUF'  => 'HUF',
                'IDR'  => 'IDR',
                'ILS'  => 'ILS',
                'INR'  => 'INR',
                'JPY'  => 'JPY',
                'KOR'  => 'KOR',
                'KSH'  => 'KSH',
                'MYR'  => 'MYR',
                'MXN'  => 'MXN',
                'NGN'  => 'NGN',
                'NOK'  => 'NOK',
                'NZD'  => 'NZD',
                'PHP'  => 'PHP',
                'PLN'  => 'PLN',
                'GBP'  => 'GBP',
                'SGD'  => 'SGD',
                'SEK'  => 'SEK',
                'TWD'  => 'TWD',
                'THB'  => 'THB',
                'TRY'  => 'TRY',
                'VND'  => 'VND',
                'ZAR'  => 'ZAR'
            ),
            'default'  => 'USD',
        ),

        array(
            'id'       => 'paypal_api',
            'type'     => 'select',
            //'required' => array( 'enable_paid_submission', '!=', 'no' ),
            'title'    => esc_html__('Paypal And Checkout Api', 'listingpro'),
            'subtitle' => esc_html__('Sandbox = test API. LIVE = real payments API', 'listingpro'),
            'desc'     => esc_html__('Update PayPal Checkout settings according to API type selection', 'listingpro'),
            'options'  => array(
                'sandbox'=> 'Sandbox',
                'live'   => 'Live',
            ),
            'default'  => 'sandbox',
        ),
		array(
            'id'       => 'stripe_api',
            'type'     => 'select',
            //'required' => array( 'enable_paid_submission', '!=', 'no' ),
            'title'    => esc_html__('Stripe And Checkout Api', 'listingpro'),
            'subtitle' => esc_html__('Sandbox = test API. LIVE = real payments API', 'listingpro'),
            'desc'     => esc_html__('Update Stripe Checkout settings according to API type selection', 'listingpro'),
            'options'  => array(
                'sandbox'=> 'Sandbox',
                'live'   => 'Live',
            ),
            'default'  => 'sandbox',
        ),
        array(
            'id'       => 'payment_terms_condition',
            'type'     => 'select',
            'data'     => 'pages',
            'title'    => esc_html__( 'Terms & Conditions', 'listingpro' ),
            'subtitle' => esc_html__( 'Select terms & conditions page', 'listingpro' ),
            'desc'     => '',
			'default'  => '',
        ),
         array(
            'id'       => 'payment-checkout',
            'type'     => 'select',
            'data'     => 'pages',
            'title'    => esc_html__( 'Checkout Page', 'listingpro' ),
            'subtitle' => esc_html__( 'Select checkout page', 'listingpro' ),
            'desc'     => '',
			'default'  => '',
        ), 
		/* array(
            'id'       => 'payment-checkout',
            'type'     => 'text',
            'title'    => esc_html__('Payment Checkout', 'listingpro'),
            'subtitle' => esc_html__('Select checkout page','listingpro'),
            'desc'     => '',
            'default'  => '',
        ), */
		array(
			'id'=>'payment_fail',
			'type' => 'select',
			'data'     => 'pages',
			'title' => __('Failed Payment page - after failed payment', 'listingpro'),
			'subtitle' => __('This must be an URL.', 'listingpro'),
			'desc' => __('', 'listingpro'),
			'default'  => '',
		),
			
		array(
			'id'=>'payment_success',
			'type' => 'select',
			'data'     => 'pages',
			'title' => __('Thank you page - after successful payment', 'listingpro'),
			'subtitle' => __('This must be an URL.', 'listingpro'),
			'desc' => __('', 'listingpro'),
			'default'  => '',
		),

		
    ),
));

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Paypal Settings', 'listingpro' ),
    'id'     => 'mem-paypal-settings',
    'desc'   => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'enable_paypal',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Paypal', 'listingpro' ),
            //'required' => array( 'enable_paid_submission', '!=', 'no' ),
            'desc'     => '',
            'subtitle' => '',
            'default'  => 0,
            'on'       => esc_html__( 'Enabled', 'listingpro' ),
            'off'      => esc_html__( 'Disabled', 'listingpro' ),
        ),
        
        array(
            'id'       => 'paypal_api_username',
            'type'     => 'text',
            'required' => array( 'enable_paypal', '=', '1' ),
            'title'    => esc_html__('Paypal API Username', 'listingpro'),
            'subtitle' => '',
            'desc'     => '',
            'default'  => '',
        ),
        array(
            'id'       => 'paypal_api_password',
            'type'     => 'text',
            'required' => array( 'enable_paypal', '=', '1' ),
            'title'    => esc_html__('Paypal API Password', 'listingpro'),
            'subtitle' => '',
            'desc'     => '',
            'default'  => '',
        ),
        array(
            'id'       => 'paypal_api_signature',
            'type'     => 'text',
            'required' => array( 'enable_paypal', '=', '1' ),
            'title'    => esc_html__('Paypal API Signature', 'listingpro'),
            'subtitle' => '',
            'desc'     => '',
            'default'  => '',
        ),
        array(
            'id'       => 'paypal_receiving_email',
            'type'     => 'text',
            'required' => array( 'enable_paypal', '=', '1' ),
            'title'    => esc_html__('Paypal Receiving Email', 'listingpro'),
            'subtitle' => '',
            'desc'     => '',
            'default'  => '',
        ),
    )
));
Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Stripe Settings', 'listingpro' ),
    'id'     => 'mem-stripe-settings',
    'desc'   => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'enable_stripe',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Stripe', 'listingpro' ),
            //'required' => array( 'enable_paid_submission', '!=', 'no' ),
            'desc'     => '',
            'subtitle' => '',
            'default'  => 0,
            'on'       => esc_html__( 'Enabled', 'listingpro' ),
            'off'      => esc_html__( 'Disabled', 'listingpro' ),
        ),
        
        array(
            'id'       => 'stripe_secrit_key',
            'type'     => 'text',
            'required' => array( 'enable_stripe', '=', '1' ),
            'title'    => esc_html__('Secret Key', 'listingpro'),
            'subtitle' => '',
            'desc'     => '',
            'default'  => '',
        ),
        array(
            'id'       => 'stripe_pubishable_key',
            'type'     => 'text',
            'required' => array( 'enable_stripe', '=', '1' ),
            'title'    => esc_html__('Publishable Key', 'listingpro'),
            'subtitle' => '',
            'desc'     => '',
            'default'  => '',
        ),
        
    )
));
Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Direct Payment / Wire Payment', 'listingpro' ),
    'id'     => 'mem-wire-payment',
    'desc'   => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'enable_wireTransfer',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Wire Transfer', 'listingpro' ),
            //'required' => array( 'enable_paid_submission', '!=', 'no' ),
            'desc'     => '',
            'subtitle' => '',
            'default'  => 0,
            'on'       => esc_html__( 'Enabled', 'listingpro' ),
            'off'      => esc_html__( 'Disabled', 'listingpro' ),
        ),
         array(
            'id'       => 'direct_payment_instruction',
            'type'     => 'editor',
            'required' => array( 'enable_wireTransfer', '=', '1' ),
            'title'    => esc_html__('Wire instructions for direct payment', 'listingpro'),
            'subtitle' => '',
            'desc'     => '',
            'default'  => '
					<div>Your full name and mailing address</div>
					<div>Your Santander Bank account number</div>
					<div>SWIFT Code - SVRNUS33 (International only)</div>
					<div>Santander Bank routing number</div>
			',
            'args'   => array(
                'teeny'            => true,
                'textarea_rows'    => 10
            )
        ),
    )
));

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Thank You Page', 'listingpro' ),
    'id'     => 'mem-thankyou',
    'desc'   => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'payment_thankyou_page',
            'type'     => 'select',
            'data'     => 'pages',
            'title'    => esc_html__( 'Thank You Page', 'listingpro' ),
            'subtitle' => esc_html__( 'Select thank you page', 'listingpro' ),
            'desc'     => '',
        ),
    )
));

	
	$adminMail = get_option('admin_email');
	$blogName = get_option('blogname');
/* **********************************************************************
 * Email Management
 * **********************************************************************/
Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Email Management', 'listingpro' ),
    'id'     => 'listingpro-email-management',
    'desc'   => esc_html__( 'Global variables: %website_url as website url,%website_name as website name, %user_email as user_email, %username as username', 'listingpro' ),
    'icon'   => 'el-icon-envelope el-icon-small',
    'fields'		=> array(
		
		/* ===================================Email General Setting======================================== */
		array(
			'id'     => 'listingpro-general-listing-email-info',
			'type'   => 'info',
			'notice' => false,
			'style'  => 'info',
			'title'  => wp_kses(__( '<span class="font24">General Email Settings</span>', 'listingpro' ), $allowed_html_array),
			'subtitle' => esc_html__('Set email address and email sender name here', 'listingpro'),
			'desc'   => ''
		),
		array(
			'id'       => 'listingpro_general_email_address',
			'type'     => 'text',
			'title'    => esc_html__('Email Address', 'listingpro'),
			'subtitle' => esc_html__('Email address for general email sending', 'listingpro'),
			'desc'     => 'Enter email address here',
			'default'  => $adminMail,
		),
		array(
			'id'       => 'listingpro_general_email_from',
			'type'     => 'text',
			'title'    => esc_html__('Email From', 'listingpro'),
			'subtitle' => esc_html__('Email sender name for general email sending', 'listingpro'),
			'desc'     => 'Enter email sender name here',
			'default'  => $blogName,
		),
		/* ===================================New User Registration======================================== */
		array(
            'id'     => 'email-new-user-info',
            'type'   => 'info',
            'notice' => false,
            'style'  => 'info',
            'title'  => wp_kses(__( '<span class="font24">New Registered User</span>', 'listingpro' ), $allowed_html_array),
            'desc'   => esc_html__( '%user_login_register as username, %user_pass_register as user password, %user_email_register as new user email', 'listingpro' )
        ),

        array(
            'id'       => 'listingpro_subject_new_user_register',
            'type'     => 'text',
            'title'    => esc_html__('Subject for New User Notification', 'listingpro'),
            'subtitle' => esc_html__('Email subject for new user notification', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('Your username and password on %website_url', 'listingpro'),
        ),
        array(
            'id'       => 'listingpro_new_user_register',
            'type'     => 'editor',
            'title'    => esc_html__('Content for New User Notification', 'listingpro'),
            'subtitle' => esc_html__('Email content for new user notification', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('Hi there,
									Welcome to %website_url! You can login now using the below credentials:
									Username:%user_login_register
									Password: %user_pass_register
									If you have any problems, please contact us.
									Thank you!', 'listingpro'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),
		

        array(
            'id'       => 'listingpro_subject_admin_new_user_register',
            'type'     => 'text',
            'title'    => esc_html__('Subject for New User Admin Notification', 'listingpro'),
            'subtitle' => esc_html__('Email subject for new user admin notification', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('New User Registration', 'listingpro'),
        ),
        array(
            'id'       => 'listingpro_admin_new_user_register',
            'type'     => 'editor',
            'title'    => esc_html__('Content for New User Admin Notification', 'listingpro'),
            'subtitle' => esc_html__('Email content for new user admin notification', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('New user registration on %website_url.
									Username: %user_login_register,
									E-mail: %user_email_register', 'listingpro'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),

		/* ==================================New Listing Submit======================================= */
		array(
            'id'     => 'listingpro-new-listing-submit-info',
            'type'   => 'info',
            'notice' => false,
            'style'  => 'info',
            'title'  => wp_kses(__( '<span class="font24">Submit Listing</span>', 'listingpro' ), $allowed_html_array),
            'subtitle' => esc_html__('New listing submit mail', 'listingpro'),
            'desc'   => ''
        ),

        array(
            'id'       => 'listingpro_subject_new_submit_listing',
            'type'     => 'text',
            'title'    => esc_html__('Subject', 'listingpro'),
            'subtitle' => esc_html__('Email subject', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('Your listing has been submitted', 'listingpro'),
        ),
        array(
            'id'       => 'listingpro_new_submit_listing_content',
            'type'     => 'editor',
            'title'    => esc_html__('Content', 'listingpro'),
            'subtitle' => esc_html__('Email content', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('<div style="width: 100%; background: #f0f1f3; padding: 50px 0px;">
<a style="width: 45%; margin: 0 auto; text-align: center; display: block; padding-bottom: 25px; padding-left: 30px; padding-right: 30px;"><img src="images/logo.png" /></a>
<div style="width: 45%; background: #fff; padding: 50px 30px; margin: 0 auto;">
<p style="margin: 0px;">New  Listing has been submitted on <a href="%website_url" >%website_name</a> </p>

<h2 style="color: #2a6ad4; margin: 0px; font-size: 20px;">%listing_title</h2>
<div style="padding: 30px 0px 15px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Details are Following:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing Name:</strong>%listing_title</p>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing URL:</strong>%listing_url</p>
</div>
<div style="padding: 15px 0px 30px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Other Details:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Full Adress:</strong>45 B Road NY. USA</p>
</div>
</div>
</div>', 'listingpro'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),
		
		array(
            'id'       => 'listingpro_subject_new_submit_listing_admin',
            'type'     => 'text',
            'title'    => esc_html__('Subject(for admin)', 'listingpro'),
            'subtitle' => esc_html__('Email subject', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('New listing has been submitted', 'listingpro'),
        ),
		array(
            'id'       => 'listingpro_new_submit_listing_content_admin',
            'type'     => 'editor',
            'title'    => esc_html__('Content(for admin)', 'listingpro'),
            'subtitle' => esc_html__('Email content', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('<div style="width: 100%; background: #f0f1f3; padding: 50px 0px;">
<a style="width: 45%; margin: 0 auto; text-align: center; display: block; padding-bottom: 25px; padding-left: 30px; padding-right: 30px;"><img src="images/logo.png" /></a>
<div style="width: 45%; background: #fff; padding: 50px 30px; margin: 0 auto;">
<p style="margin: 0px;">New  Listing has been submitted on <a href="%website_url" >%website_name</a> </p>

<h2 style="color: #2a6ad4; margin: 0px; font-size: 20px;">%listing_title</h2>
<div style="padding: 30px 0px 15px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Details are Following:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing Name:</strong>%listing_title</p>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing URL:</strong>%listing_url</p>
</div>
<div style="padding: 15px 0px 30px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Other Details:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Full Adress:</strong>45 B Road NY. USA</p>
</div>
</div>
</div>', 'listingpro'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),
		
		/* new code by zaheer on 15march */
	
	/* =====================================Purchased Activated==================================== */
        
        array(
            'id'     => 'email-purchase-activated-info',
            'type'   => 'info',
            'notice' => false,
            'style'  => 'info',
            'title'  => wp_kses(__( '<span class="font24">Purchase Activated</span>', 'listingpro' ), $allowed_html_array),
            'subtitle' => esc_html__('Package / Pay per listing has been purchased', 'listingpro'),
            'desc'   => ''
        ),

        array(
            'id'       => 'listingpro_subject_purchase_activated',
            'type'     => 'text',
            'title'    => esc_html__('Subject', 'listingpro'),
            'subtitle' => esc_html__('Email subject for purchase activated', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('Your purchase has  activated', 'listingpro'),
        ),
        array(
            'id'       => 'listingpro_content_purchase_activated',
            'type'     => 'editor',
            'title'    => esc_html__('Content', 'listingpro'),
            'subtitle' => esc_html__('Email content for Purchase Activated', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('<div style="width: 100%; background: #f0f1f3; padding: 50px 0px;"><a style="width: 45%; margin: 0 auto; text-align: center; display: block; padding-bottom: 25px; padding-left: 30px; padding-right: 30px;"><img src="images/logo.png" /></a>
<div style="width: 45%; background: #fff; padding: 50px 30px; margin: 0 auto;">
<p style="margin: 0px;">Your purchase has been successful on  <a href="%website_url">%website_name</a></p>

<div style="padding: 30px 0px 15px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Details are Following:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Plan Name:</strong>%plan_title</p>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Plan Price:</strong>%plan_price</p>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing Submitted:</strong>%listing_title</p>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing URL:</strong>%listing_url</p>

</div>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Payment Method:</strong>%payment_method</p>

<div style="padding: 15px 0px 30px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Other Details:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Full Adress:</strong>45 B Road NY. USA</p>

</div>
</div>
</div>', 'listingpro'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),
		
		array(
            'id'       => 'listingpro_subject_purchase_activated_admin',
            'type'     => 'text',
            'title'    => esc_html__('Subject(for admin)', 'listingpro'),
            'subtitle' => esc_html__('Email subject for purchase activated', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('A purchased has been made', 'listingpro'),
        ),
		
		array(
            'id'       => 'listingpro_content_purchase_activated_admin',
            'type'     => 'editor',
            'title'    => esc_html__('Content(for admin)', 'listingpro'),
            'subtitle' => esc_html__('Email content', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('<div style="width: 100%; background: #f0f1f3; padding: 50px 0px;"><a style="width: 45%; margin: 0 auto; text-align: center; display: block; padding-bottom: 25px; padding-left: 30px; padding-right: 30px;"><img src="images/logo.png" /></a>
<div style="width: 45%; background: #fff; padding: 50px 30px; margin: 0 auto;">
<p style="margin: 0px;">Your purchase has been successful on  <a href="%website_url">%website_name</a></p>

<div style="padding: 30px 0px 15px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Details are Following:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Plan Name:</strong>%plan_title</p>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Plan Price:</strong>%plan_price</p>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing Submitted:</strong>%listing_title</p>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing URL:</strong>%listing_url</p>

</div>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Payment Method:</strong>%payment_method</p>

<div style="padding: 15px 0px 30px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Other Details:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Full Adress:</strong>45 B Road NY. USA</p>

</div>
</div>
</div>', 'listingpro'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),
		
	/* =====================================Listing Approved==================================== */

        array(
            'id'     => 'email-approved-info',
            'type'   => 'info',
            'notice' => false,
            'style'  => 'info',
            'title'  => wp_kses(__( '<span class="font24">Approved Listing</span>', 'listingpro' ), $allowed_html_array),
            'subtitle' => esc_html__('You can use %listing_title as listing title, %listing_url as listing link', 'listingpro'),
            'desc'   => ''
        ),

        array(
            'id'       => 'listingpro_subject_listing_approved',
            'type'     => 'text',
            'title'    => esc_html__('Subject for Approved Listing', 'listingpro'),
            'subtitle' => esc_html__('Email subject for approved listing', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('Your listing approved', 'listingpro'),
        ),
        array(
            'id'       => 'listingpro_listing_approved',
            'type'     => 'editor',
            'title'    => esc_html__('Content for Listing Approved', 'listingpro'),
            'subtitle' => esc_html__('Email content for listing approved', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('<div style="width: 100%; background: #f0f1f3; padding: 50px 0px;">
<a style="width: 45%; margin: 0 auto; text-align: center; display: block; padding-bottom: 25px; padding-left: 30px; padding-right: 30px;"><img src="images/logo.png" /></a>
<div style="width: 45%; background: #fff; padding: 50px 30px; margin: 0 auto;">
<p style="margin: 0px;">New  Listing has been submitted on <a href="%website_url" >%website_name</a> </p>

<h2 style="color: #2a6ad4; margin: 0px; font-size: 20px;">%listing_title</h2>
<div style="padding: 30px 0px 15px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Details are Following:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing Name:</strong>%listing_title</p>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing URL:</strong>%listing_url</p>
</div>
<div style="padding: 15px 0px 30px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Order  Details:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Full Adress:</strong>P-11, Paradise Floor, Sadiq Trade Center</p>
</div>
</div>
</div>', 'listingpro'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),

	/* =====================================Listing Expired==================================== */
		
        array(
            'id'     => 'email-expired-info',
            'type'   => 'info',
            'notice' => false,
            'style'  => 'info',
            'title'  => wp_kses(__( '<span class="font24">Expired Listing</span>', 'listingpro' ), $allowed_html_array),
            'subtitle' => esc_html__('You can use %listing_title as listing title, %listing_url as listing link', 'listingpro'),
            'desc'   => ''
        ),

        array(
            'id'       => 'listingpro_subject_listing_expired',
            'type'     => 'text',
            'title'    => esc_html__('Subject for Expired Listing', 'listingpro'),
            'subtitle' => esc_html__('Email subject for expired listing', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('Your listing expired', 'listingpro'),
        ),
        array(
            'id'       => 'listingpro_listing_expired',
            'type'     => 'editor',
            'title'    => esc_html__('Content for Listing Expired', 'listingpro'),
            'subtitle' => esc_html__('Email content for listing expired', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('<div style="width: 100%; background: #f0f1f3; padding: 50px 0px;">
<a style="width: 45%; margin: 0 auto; text-align: center; display: block; padding-bottom: 25px; padding-left: 30px; padding-right: 30px;"><img src="images/logo.png" /></a>
<div style="width: 45%; background: #fff; padding: 50px 30px; margin: 0 auto;">
<p style="margin: 0px;">New  Listing has been submitted on <a href="%website_url" >%website_name</a> </p>

<h2 style="color: #2a6ad4; margin: 0px; font-size: 20px;">%listing_title</h2>
<div style="padding: 30px 0px 15px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Details are Following:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing Name:</strong>%listing_title</p>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing URL:</strong>%listing_url</p>
</div>
<div style="padding: 15px 0px 30px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Order  Details:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Full Adress:</strong>P-11, Paradise Floor, Sadiq Trade Center</p>
</div>
</div>
</div>', 'listingpro'),
            'args'   => array(
                'teeny'            => true,
                'textarea_rows'    => 10
            )
        ),
	/* =====================================Ads Expired==================================== */
		
        array(
            'id'     => 'email-expired-info-ads',
            'type'   => 'info',
            'notice' => false,
            'style'  => 'info',
            'title'  => wp_kses(__( '<span class="font24">Expired Ad Campagin</span>', 'listingpro' ), $allowed_html_array),
            'desc'   => ''
        ),

        array(
            'id'       => 'listingpro_subject_ads_expired',
            'type'     => 'text',
            'title'    => esc_html__('Subject', 'listingpro'),
            'subtitle' => esc_html__('Email subject for expired ads campaign', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('Your ad campaign has expired', 'listingpro'),
        ),
        array(
            'id'       => 'listingpro_ad_campaign_expired',
            'type'     => 'editor',
            'title'    => esc_html__('Content for ads campaigns Expired', 'listingpro'),
            'subtitle' => esc_html__('Email content for ads campaigns expired', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('<div style="width: 100%; background: #f0f1f3; padding: 50px 0px;">
<a style="width: 45%; margin: 0 auto; text-align: center; display: block; padding-bottom: 25px; padding-left: 30px; padding-right: 30px;"><img src="images/logo.png" /></a>
<div style="width: 45%; background: #fff; padding: 50px 30px; margin: 0 auto;">
<p style="margin: 0px;">New  Listing has been submitted on <a href="%website_url" >%website_name</a> </p>

<h2 style="color: #2a6ad4; margin: 0px; font-size: 20px;">%listing_title</h2>
<div style="padding: 30px 0px 15px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Details are Following:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing Name:</strong>%listing_title</p>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing URL:</strong>%listing_url</p>
</div>
<div style="padding: 15px 0px 30px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Order  Details:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Full Adress:</strong>P-11, Paradise Floor, Sadiq Trade Center</p>
</div>
</div>
</div>', 'listingpro'),
            'args'   => array(
                'teeny'            => true,
                'textarea_rows'    => 10
            )
        ),

    
	/* =====================================Invoice Email==================================== */

        array(
            'id'     => 'email-wire-invoice-info',
            'type'   => 'info',
            'notice' => false,
            'style'  => 'info',
            'title'  => wp_kses(__( 'Wire Invoice', 'listingpro' ), $allowed_html_array),
            'subtitle' => esc_html__('you can use %invoice_no as invoice number, %listing_title as listing title', 'listingpro'),
            'desc'   => ''
        ),
        array(
            'id'       => 'listingpro_subject_wire_invoice',
            'type'     => 'text',
            'title'    => esc_html__('Subject', 'listingpro'),
            'subtitle' => esc_html__('Email subject wire inovice', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('Your new listing on %website_url', 'listingpro'),
        ),
        array(
            'id'       => 'listingpro_content_wire_invoice',
            'type'     => 'editor',
            'title'    => esc_html__('Content for wire invoice', 'listingpro'),
            'subtitle' => esc_html__('Email content', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('<div style="width: 100%; background: #f0f1f3; padding: 50px 0px;">
<a style="width: 45%; margin: 0 auto; text-align: center; display: block; padding-bottom: 25px; padding-left: 30px; padding-right: 30px;"><img src="images/logo.png" /></a>
<div style="width: 45%; background: #fff; padding: 50px 30px; margin: 0 auto;">
<p style="margin: 0px;">New  Listing has been submitted on <a href="%website_url" >%website_name</a> </p>

<h2 style="color: #2a6ad4; margin: 0px; font-size: 20px;">%listing_title</h2>
<div style="padding: 30px 0px 15px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Details are Following:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing Name:</strong>%listing_title</p>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing URL:</strong>%listing_url</p>
</div>
<div style="padding: 15px 0px 30px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Order  Details:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Full Adress:</strong>P-11, Paradise Floor, Sadiq Trade Center</p>
</div>
</div>
</div>', 'listingpro'),
            'args'   => array(
                'teeny'         => true,
                'textarea_rows' => 10
            )
        ),
		
	
        array(
            'id'       => 'listingpro_subject_wire_invoice_admin',
            'type'     => 'text',
            'title'    => esc_html__('Subject(admin)', 'listingpro'),
            'subtitle' => esc_html__('Email subject(admin)', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('Your new listing on %website_url', 'listingpro'),
        ),
        array(
            'id'       => 'listingpro_content_wire_invoice_admin',
            'type'     => 'editor',
            'title'    => esc_html__('Content for wire(admin)', 'listingpro'),
            'subtitle' => esc_html__('Email content(admin)', 'listingpro'),
            'desc'     => '',
            'default'  => esc_html__('<div style="width: 100%; background: #f0f1f3; padding: 50px 0px;">
<a style="width: 45%; margin: 0 auto; text-align: center; display: block; padding-bottom: 25px; padding-left: 30px; padding-right: 30px;"><img src="images/logo.png" /></a>
<div style="width: 45%; background: #fff; padding: 50px 30px; margin: 0 auto;">
<p style="margin: 0px;">New  Listing has been submitted on <a href="%website_url" >%website_name</a> </p>

<h2 style="color: #2a6ad4; margin: 0px; font-size: 20px;">%listing_title</h2>
<div style="padding: 30px 0px 15px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Details are Following:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing Name:</strong>%listing_title</p>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Listing URL:</strong>%listing_url</p>
</div>
<div style="padding: 15px 0px 30px 0px;">
<h3 style="margin: 0px 0px 5px; font-size: 16px;">Order  Details:</h3>
<p style="margin: 0px; font-size: 14px;"><strong style="padding-right: 10px;">Full Adress:</strong>P-11, Paradise Floor, Sadiq Trade Center</p>
</div>
</div>
</div>', 'listingpro'),
            'args'   => array(
                'teeny'         => true,
                'textarea_rows' => 10
            )
        ),
		
		
	
      
    ),
));
	

	
	
        /* **********************************************************************
        * Invoices
        * **********************************************************************/
        Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Invoice Options', 'listingpro' ),
            'id'     => 'listing-invoice',
            'desc'   => '',
            'icon'   => 'el-icon-list-alt',
            'fields'		=> array(
				
                array(
                    'id'		=> 'invoice_logo',
                    'url'		=> true,
                    'type'		=> 'media',
                    'title'		=> esc_html__( 'Company Logo', 'listingpro' ),
                    'read-only'	=> false,
                    'default'	=> array( 'url'	=> get_template_directory_uri() .'/assets/images/logo.png' ),
                    'subtitle'	=> esc_html__( 'Upload company logo for invoices.', 'listingpro' ),
                ),
                array(
                    'id'		=> 'invoice_company_name',
                    'type'		=> 'text',
                    'title'		=> esc_html__( 'Company Name', 'listingpro' ),
                    'default'	=> 'Company Name',
                    'subtitle'	=> esc_html__( 'Enter company full name', 'listingpro' ),
                ),
                array(
                    'id'		=> 'invoice_address',
                    'type'		=> 'textarea',
                    'title'		=> esc_html__( 'Company Address', 'listingpro' ),
                    'default'	=> '1161 Washingtown Avenue 299<br> Miami Beach 33141 FL',
                    'subtitle'	=> esc_html__( 'Enter company full address', 'listingpro' )
                ),
                array(
                    'id'		=> 'invoice_phone',
                    'type'		=> 'text',
                    'title'		=> esc_html__( 'Company Phone', 'listingpro' ),
                    'default'	=> '(987)654 3210',
                    'subtitle'	=> '',
                ),
                array(
                    'id'		=> 'invoice_additional_info',
                    'type'		=> 'editor',
                    'title'		=> esc_html__( 'Additional Info', 'listingpro' ),
                    'default'	=> '<p>The lorem ipsum text is typically a scrambled section of De finibus bonorum et malorum, a 1st-century BC Latin text by Cicero, with words altered, added, and removed to make it nonsensical, improper Latin.[citation needed]</p>',
                    'subtitle'	=> ''
                ),
                array(
                    'id'		=> 'invoice_thankyou',
                    'type'		=> 'text',
                    'title'		=> esc_html__( 'Thank You text', 'listingpro' ),
                    'default'	=> 'Thank you for your business with us.',
                    'subtitle'	=> '',
                ),
            ),
        ));
		/* **********************************************************************
		 * Ads Options
		 * **********************************************************************/
		Redux::setSection( $opt_name, array(
			'title'  => esc_html__( 'Ads Options', 'listingpro' ),
			'id'     => 'listing-ads',
			'desc'   => '',
			'icon'   => 'el-icon-screen',
			'fields'		=> array(
				array(
                    'id'        => 'lp_pro_title',
                    'url'       => true,
                    'type'      => 'text',
                    'title'     => esc_html__( 'Ads Title', 'listingpro' ),
                    'read-only' => false,
                    'default'   => 'What is Ad Promotion?',
                ),
                array(
                    'id'        => 'lp_pro_text',
                    'url'       => true,
                    'type'      => 'textarea',
                    'title'     => esc_html__( 'Ads Text', 'listingpro' ),
                    'read-only' => false,
                    'default'   => 'Add information about your business below. Your business page will not appear in search results until this information has been verified and approved by our moderators. Once it is approved, you will receive an email with instructions on how to claim your business page.',
                ),
                array(
                    'id'       => 'lp_pro_img',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => __( 'Promotion page image', 'listingpro' ),
                    'compiler' => 'true',
                    //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                    'desc'     => __( 'Upload your image here', 'listingpro' ),
                    'default'  => array( 'url' => get_template_directory_uri().'/assets/images/admin/promotional-img.jpg' ),
                ),
				array(
					'id'		=> 'lp_random_ads',
					'url'		=> true,
					'type'		=> 'text',
					'title'		=> esc_html__( 'Random ads', 'listingpro' ),
					'read-only'	=> false,
					'default'	=> '10',
					'subtitle'	=> esc_html__( 'Put ads plan price here ( do not include any currency sign ).', 'listingpro' ),
				),
				array(
					'id'		=> 'lp_detail_page_ads',
					'url'		=> true,
					'type'		=> 'text',
					'title'		=> esc_html__( 'Detail page ads', 'listingpro' ),
					'read-only'	=> false,
					'default'	=> '20',
					'subtitle'	=> esc_html__( 'Put ads plan price here ( do not include currency sign ).', 'listingpro' ),
				),
				array(
					'id'		=> 'lp_top_in_search_page_ads',
					'url'		=> true,
					'type'		=> 'text',
					'title'		=> esc_html__( 'Top in search & taxonomy', 'listingpro' ),
					'read-only'	=> false,
					'default'	=> '50',
					'subtitle'	=> esc_html__( 'Put ads plan price here ( do not include currency sign ).', 'listingpro' ),
				),
				 array(
					'id'       => 'listings_ads_durations',
					'type'     => 'select',
					'title'    => esc_html__('Ads Duration', 'listingpro'),
					'subtitle' => '',
					'desc'     => '',
					'options'  => array(
						'1'   => esc_html__( '1 Day', 'listingpro' ),
						'2'   => esc_html__( '2 Days', 'listingpro' ),
						'3'   => esc_html__( '3 Days', 'listingpro' ),
						'4'   => esc_html__( '4 Days', 'listingpro' ),
						'5'   => esc_html__( '5 Days', 'listingpro' ),
						'6'   => esc_html__( '6 Days', 'listingpro' ),
						'7'    => esc_html__( '1 Week', 'listingpro' ),
						'14'   => esc_html__( '2 Weeks', 'listingpro' ),
						'21'   => esc_html__( '3 Weeks', 'listingpro' ),
						'28'   => esc_html__( '4 Weeks', 'listingpro' ),
						'30'   => esc_html__( '1 Month', 'listingpro' ),
					),
					'default'  => '7',
				),
				
				
			),
		));



}
	
	
	
	if ( is_plugin_active( 'listingpro-plugin/plugin.php' ) ) {
		
		// -> START Basic Fields
		Redux::setSection( $opt_name, array(
			'title'            => __( 'URL Config', 'listingpro' ),
			'id'               => 'URL settings',
			'customizer_width' => '400px',
			'icon'             => 'el el-link',
			'fields'     => array(
			
				array(
					'id'=>'listing-author',
					'type' => 'text',
					'title' => __('Author Page URL', 'listingpro'),
					'subtitle' => __('This must be an URL.', 'listingpro'),
					'validate' => 'url',
					'default' => ''
				),
				array(
					'id'=>'submit-listing',
					'type' => 'text',
					'title' => __('Submit Listing', 'listingpro'),
					'subtitle' => __('This must be an URL.', 'listingpro'),
					'desc' => __('This is a page for Submiting new listing', 'listingpro'),
					'validate' => 'url',
					'default' => ''
				),
				array(
					'id'=>'edit-listing',
					'type' => 'text',
					'title' => __('Edit Listing', 'listingpro'),
					'subtitle' => __('This must be an URL.', 'listingpro'),
					'desc' => __('This is a page for Edit your listing', 'listingpro'),
					'validate' => 'url',
					'default' => ''
				),
				array(
					'id'=>'pricing-plan',
					'type' => 'text',
					'title' => __('Price plans', 'listingpro'),
					'subtitle' => __('This must be an URL.', 'listingpro'),
					'desc' => __('This is a page for selecting price plans', 'listingpro'),
					'validate' => 'url',
					'default' => ''
				),
				

				
			)
		) );
    
	}
	
	// -> START Basic Fields
		Redux::setSection( $opt_name, array(
			'title'            => __( 'Contact Page', 'listingpro' ),
			'desc'            => __( 'Translate all text strings into your own language', 'listingpro' ),
			'id'               => 'contact_page',
			'customizer_width' => '400px',
			'icon'             => 'el el-phone'

		) );	
		
	// -> START Basic Fields
		Redux::setSection( $opt_name, array(
			'title'            => __( 'Contact Information', 'listingpro' ),
			'desc'            => __( 'Add or edit Content Contact information', 'listingpro' ),
			'id'               => 'contact_page_information',
			'customizer_width' => '400px',
			'icon'             => 'el el-home',
			'subsection' => true,
			'fields'     => array(
				
				array(
					'id'=>'Address',
					'type' => 'text',
					'title' => __("Title for contact information", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => 'Address'
				),
				array(
					'id'=>'cp-address',
					'type' => 'text',
					'title' => __("Your Address", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => ' Your Address at Lutaco Tower 007A Nguyen Van Troi'
				),
				array(
					'id'=>'cp-number',
					'type' => 'text',
					'title' => __("Your Phone", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => '+008 1234 6789'
				),
				array(
					'id'=>'cp-email',
					'type' => 'text',
					'title' => __("Your Email", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => 'xyz@example.com'
				),
				array(
					'id'=>'cp-social-links',
					'type' => 'switch',
					'title' => __("Social Links", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => 1
				),

			)
		) );
		
		
		
		// -> START Basic Fields
		Redux::setSection( $opt_name, array(
			'title'            => __( 'Form Settings', 'listingpro' ),
			'desc'            => __( 'Add or edit Form settings', 'listingpro' ),
			'id'               => 'contact_page_form',
			'customizer_width' => '400px',
			'icon'             => 'el el-caret-up',
			'subsection' => true,
			'fields'     => array(
			
				array(
					'id'=>'form-title',
					'type' => 'text',
					'title' => __("Title for From", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => 'Contact us'
				),
				array(
					'id'=>'form-title',
					'type' => 'text',
					'title' => __("Title for From", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => 'Contact us'
				),
				array(
					'id'=>'cp-success-message',
					'type' => 'textArea',
					'title' => __("Success message for contact form", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => 'Your message was sent successfully! I will be in touch as soon as I can.'
				),
				array(
					'id'=>'cp-failed-message',
					'type' => 'textArea',
					'title' => __("failed or error message for contact form", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => 'Something went wrong, try refreshing and submitting the form again.'
				),
				

			)
		) );
		
		// -> START Basic Fields
		Redux::setSection( $opt_name, array(
			'title'            => __( 'Conatct Map Settings', 'listingpro' ),
			'desc'            => __( 'Set Latitude and longtitude for contact page map', 'listingpro' ),
			'id'               => 'contact_page_map',
			'customizer_width' => '400px',
			'icon'             => 'el el-home',
			'subsection' => true,
			'fields'     => array(
				
				array(
					'id'=>'cp-lat',
					'type' => 'text',
					'title' => __("Title for contact information", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => '51.516576'
				),
				array(
					'id'=>'cp-lan',
					'type' => 'text',
					'title' => __("Your Address", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => '-0.137508'
				),


			)
		) );
	
		
			
	// -> START Basic Fields
		Redux::setSection( $opt_name, array(
			'title'            => __( 'Footer', 'listingpro' ),
			'desc'            => __( 'Add or edit Footer information', 'listingpro' ),
			'id'               => 'footer_section_information',
			'customizer_width' => '400px',
			'icon'             => 'el el-home',
			//'subsection' => true,
			'fields'     => array(
				array(
                    'id'       => 'footer_top_bgcolor',
                    'type'     => 'color',
                    'title'    => __('Footer top area bgcolor', 'listingpro'), 
                    'subtitle' => __('(default: #363f48).', 'listingpro'),
                    'default'  => '#363f48',
                    'validate' => 'color',
                ),
                array(
                    'id'       => 'footer_bgcolor',
                    'type'     => 'color',
                    'title'    => __('Footer top area bgcolor', 'listingpro'), 
                    'subtitle' => __('(default: #45505b).', 'listingpro'),
                    'default'  => '#45505b',
                    'validate' => 'color',
                ),
				array(
					'id'=>'fb',
					'type' => 'text',
					'title' => __("Facebook URL", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => '#'
				),
				array(
					'id'=>'tw',
					'type' => 'text',
					'title' => __("Twitter URL", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => '#'
				),
				array(
					'id'=>'gog',
					'type' => 'text',
					'title' => __("Google URL", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => '#'
				),
				array(
					'id'=>'insta',
					'type' => 'text',
					'title' => __("Instagram URL", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => '#'
				),
				array(
					'id'=>'tumb',
					'type' => 'text',
					'title' => __("Tumbler URL", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => '#'
				),
				array(
					'id'=>'copy_right',
					'type' => 'text',
					'title' => __("Copy right information", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => 'Copyright © 2017 Listingpro'
				),
				array(
					'id'=>'footer_address',
					'type' => 'text',
					'title' => __("Address", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => '45 B Road NY. USA'
				),
				array(
					'id'=>'phone_number',
					'type' => 'text',
					'title' => __("Phone", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => '007-123-456'
				),
				array(
					'id'=>'author_info',
					'type' => 'text',
					'title' => __("Theme Author Information", 'listingpro'),
					'subtitle' => __('', 'listingpro'),
					'default' => 'Proudly Listingpro by <a href="http://www.cridio.com/" target="_blank">Cridio Studio</a>'
				),
				

			)
		) );
		
		/*  */
		


    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'listingpro' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'listingpro' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'listingpro' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

