<?php

	define('THEME_PATH', get_template_directory());
	define('THEME_DIR', get_template_directory_uri());
	define('STYLESHEET_PATH', get_stylesheet_directory());
	define('STYLESHEET_DIR', get_stylesheet_directory_uri());

	/* ============== Login/Register ============ */
	require_once THEME_PATH . "/include/login-register.php";
	function listingprochild_style() {
		wp_enqueue_style('bootstrap-reboot', THEME_DIR . '/assets/Bootstrap/dist/css/bootstrap.css');
		wp_enqueue_style('bootstrap', THEME_DIR . '/assets/Bootstrap/dist/css/bootstrap.css');
		wp_enqueue_style('Bootstrap-Grid', THEME_DIR . '/assets/Bootstrap/dist/css/bootstrap-grid.css');
		wp_enqueue_style('Theme-Styles', THEME_DIR . '/assets/css/theme-styles.css');
		wp_enqueue_style('blocks', THEME_DIR . '/assets/css/blocks.css');
		wp_enqueue_style('fonts', THEME_DIR . '/assets/css/fonts.css');
		wp_enqueue_style('Jquery mCustomScrollbar Min', THEME_DIR . '/assets/css/jquery.mCustomScrollbar.min.css');
		wp_enqueue_style('daterangepicker', THEME_DIR . '/assets/css/daterangepicker.css');
		wp_enqueue_style('Bootstrap Select', THEME_DIR . '/assets/css/bootstrap-select.css');
		wp_enqueue_style('listingpro-child', STYLESHEET_DIR . '/style.css');
		
		wp_enqueue_style( 'cssmenu-styles', get_template_directory_uri() . '/assets/css/nav-styles.css');
	}
	add_action('wp_enqueue_scripts', 'listingprochild_style');
	
		function listingprochild_scripts() {
		
		
		global $listingpro_options;
		
		
		//custom
		wp_enqueue_style('webfontloader', THEME_DIR . '/assets/js/webfontloader.min.js');
		wp_enqueue_script('Jquery', THEME_DIR . '/assets/js/jquery-3.2.0.min.js', 'jquery', '', true);
		wp_enqueue_script('Material', THEME_DIR . '/assets/js/material.min.js', 'material', '', true);
		wp_enqueue_script('Theme_plugins', THEME_DIR . '/assets/js/theme-plugins.js', 'themeplugins', '', true);
		wp_enqueue_script('Main', THEME_DIR . '/assets/js/main.js', 'main', '', true);
		wp_enqueue_script('Selectize', THEME_DIR . '/assets/js/selectize.min.js', 'selectize', '', true);
		wp_enqueue_script('Swiper', THEME_DIR . '/assets/js/swiper.jquery.min.js', 'swiper', '', true);
		wp_enqueue_script('Moment', THEME_DIR . '/assets/js/moment.min.js', 'moment', '', true);
		wp_enqueue_script('daterange', THEME_DIR . '/assets/js/daterangepicker.min.js', 'daterange', '', true);wp_enqueue_script('mediaelement', THEME_DIR . '/assets/js/mediaelement-and-player.min.js', 'mediaelement', '', true);wp_enqueue_script('playlist', THEME_DIR . '/assets/js/mediaelement-playlist-plugin.min.js', 'playlist', '', true);
		
		
		//wp_enqueue_script('cssmenu-scripts', get_template_directory_uri() . '/assets/js/nav-script.js');
		//custom
	}
	
		add_action('wp_enqueue_scripts', 'listingprochild_scripts');
	
	/* ============== ListingPro URL Settings ============ */
	
	if (!function_exists('listingprochild_url')) {

		function listingprochild_url($link) {
			global $listingpro_options;
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			if ( is_plugin_active( 'listingpro-plugin/plugin.php' ) ) {
				if($link == 'add_listing_url_mode'){
					//$url = $listingpro_options[$link];
					$paidmode = $listingpro_options['enable_paid_submission'];
					if( $paidmode=="per_listing" || $paidmode=="membership" ){
						$url = $listingpro_options['pricing-plan'];
					}else{
						$url = $listingpro_options['submit-listing'];
					}
				}else{
					$url = $listingpro_options[$link];
				}
				echo $url;
				return $url;
			}else{
				return false;
			}
		}

	}
	
    /*================= Menu ============================*/
	
		add_action( 'after_setup_theme', 'register_my_header_menu' );
		function register_my_header_menu() {
				register_nav_menus( array(
				'sliderbottom'      => esc_html__( 'Slider Bottom Menu', 'theme-slug' ),
				'primary'     => esc_html__( 'Primary Menu', 'theme-slug' ),
				'submenu'      => esc_html__( 'Sub Menu', 'theme-slug' ),
				'youraccount'      => esc_html__( 'Your Account', 'theme-slug' ),
				'aboutcitmeal'      => esc_html__( 'About Citmeal', 'theme-slug' ),
				'landing'      => esc_html__( 'Landing', 'theme-slug' ),
				'sidebaricons'      => esc_html__( 'sidebaricons', 'theme-slug' )
	        ) );
			// register_nav_menu( 
			// 'primary', __( 'Primary Menu', 'theme-slug' ),
			 // 'slider_bottom', __( 'Slider Menu', 'theme-slug' )
			// );
		}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ruby_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'theme-slug' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Displays on the right side of the page', 'theme-slug' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		 'name'          => esc_html__( 'Left Sidebar', 'theme-slug' ),
		 'id'            => 'sidebar-2',
		 'description'   => __( 'Displays on the left side of the page', 'ruby' ),
		 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		 'after_widget'  => '</aside>',
		 'before_title'  => '<h2 class="widget-title">',
		 'after_title'   => '</h2>',
	 ) );
	 register_sidebar( array(
		 'name'          => esc_html__( 'Sidebar Default', 'theme-slug' ),
		 'id'            => 'sidebar-3',
		 'description'   => __( 'Displays on the left side of the page', 'ruby' ),
		 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		 'after_widget'  => '</aside>',
		 'before_title'  => '<h2 class="widget-title">',
		 'after_title'   => '</h2>',
	 ) );

	// register_sidebar( array(
		// 'name'          => esc_html__( 'Header Widget Area 1', 'ruby' ),
		// 'id'            => 'header-widget-1',
		// 'description'   => __( 'Displays in the header', 'ruby' ),
		// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// 'after_widget'  => '</aside>',
		// 'before_title'  => '<h2 class="widget-title">',
		// 'after_title'   => '</h2>',
	// ) );

	// register_sidebar( array(
		// 'name'          => esc_html__( 'Header Widget Area 2', 'ruby' ),
		// 'id'            => 'header-widget-2',
		// 'description'   => __( 'Displays in the header', 'ruby' ),
		// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// 'after_widget'  => '</aside>',
		// 'before_title'  => '<h2 class="widget-title">',
		// 'after_title'   => '</h2>',
	// ) );

	// register_sidebar( array(
		// 'name'          => esc_html__( 'Header Widget Area 3', 'ruby' ),
		// 'id'            => 'header-widget-3',
		// 'description'   => __( 'Displays in the header', 'ruby' ),
		// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// 'after_widget'  => '</aside>',
		// 'before_title'  => '<h2 class="widget-title">',
		// 'after_title'   => '</h2>',
	// ) );

	// register_sidebar( array(
		// 'name'          => esc_html__( 'Homepage Widget Area 1', 'ruby' ),
		// 'id'            => 'home-widget-1',
		// 'description'   => __( 'Displays on the Home Page', 'ruby' ),
		// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// 'after_widget'  => '</aside>',
		// 'before_title'  => '<h2 class="widget-title">',
		// 'after_title'   => '</h2>',
	// ) );

	// register_sidebar( array(
		// 'name'          => esc_html__( 'Homepage Widget Area 2', 'ruby' ),
		// 'id'            => 'home-widget-2',
		// 'description'   => __( 'Displays on the Home Page', 'ruby' ),
		// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// 'after_widget'  => '</aside>',
		// 'before_title'  => '<h2 class="widget-title">',
		// 'after_title'   => '</h2>',
	// ) );

	// register_sidebar( array(
		// 'name'          => esc_html__( 'Homepage Widget Area 3', 'ruby' ),
		// 'id'            => 'home-widget-3',
		// 'description'   => __( 'Displays on the Home Page', 'ruby' ),
		// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// 'after_widget'  => '</aside>',
		// 'before_title'  => '<h2 class="widget-title">',
		// 'after_title'   => '</h2>',
	// ) );

	// register_sidebar( array(
		// 'name'          => esc_html__( 'Footer Widget Area 1', 'ruby' ),
		// 'id'            => 'footer-widget-1',
		// 'description'   => __( 'Displays in the footer', 'ruby' ),
		// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// 'after_widget'  => '</aside>',
		// 'before_title'  => '<h2 class="widget-title">',
		// 'after_title'   => '</h2>',
	// ) );

	// register_sidebar( array(
		// 'name'          => esc_html__( 'Footer Widget Area 2', 'ruby' ),
		// 'id'            => 'footer-widget-2',
		// 'description'   => __( 'Displays in the footer', 'ruby' ),
		// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// 'after_widget'  => '</aside>',
		// 'before_title'  => '<h2 class="widget-title">',
		// 'after_title'   => '</h2>',
	// ) );

	// register_sidebar( array(
		// 'name'          => esc_html__( 'Footer Widget Area 3', 'ruby' ),
		// 'id'            => 'footer-widget-3',
		// 'description'   => __( 'Displays in the footer', 'ruby' ),
		// 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		// 'after_widget'  => '</aside>',
		// 'before_title'  => '<h2 class="widget-title">',
		// 'after_title'   => '</h2>',
	// ) );

}


/**Custom WP walker Class**/

class CSS_Menu_Maker_Walker extends Walker {

  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul>\n";
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = '';        
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    /* Add active class */
    if(in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
      unset($classes['current-menu-item']);
    }

    /* Check for children */
    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
    if (!empty($children)) {
      $classes[] = 'has-sub';
    }

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'><span>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</span></a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}

/**end Custom WP Walker Class**/


add_action( 'widgets_init', 'ruby_widgets_init' );
	
	
	
   

?>