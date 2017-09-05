<?php
/**
 * Backend and Admin Setup << Not used in this version
 */ 

class PremioThemes_Backend {

	// Load Backend Dependencies
	public function minigo_backend() {
	echo '<script>console.log("We Are Here");</script>';
		if ( !class_exists( 'redux-framework' ) && file_exists( plugin_dir_path(__FILE__) . 'inc/redux-framework/ReduxCore/framework.php' ) ) {
		    require_once( plugin_dir_path(__FILE__) . 'inc/redux-framework/ReduxCore/framework.php' );
		}

		if ( file_exists( plugin_dir_path(__FILE__) . 'inc/admin/config.php' ) ) {
		    require_once( plugin_dir_path(__FILE__) . 'inc/field-contact-info/field_contact_info.php' );
		    require_once( plugin_dir_path(__FILE__) . 'inc/field-icon-menu/field-icon-menu.php' );
		    require_once( plugin_dir_path(__FILE__) . 'inc/field-icon-features/field-icon-features.php' );
		    require_once( plugin_dir_path(__FILE__) . 'inc/field-icon-list/field-icon-list.php' );
		    require_once( plugin_dir_path(__FILE__) . 'inc/field-progress-bars/field-progress-bars.php' );
		    require_once( plugin_dir_path(__FILE__) . 'inc/field-team-profiles/field-team-profiles.php' );
		    require_once( plugin_dir_path(__FILE__) . 'inc/field-testimonials/field-testimonials.php' );
		    require_once( plugin_dir_path(__FILE__) . 'inc/premio-verify/premio-verify.php' );
		    require_once( plugin_dir_path(__FILE__) . 'inc/admin/config.php' );
		    require_once( plugin_dir_path(__FILE__) . 'inc/admin/font-awesome/font-awesome-icons.php' );
		}
	}

	// Load Icon Fonts
	public function minigo_icon_font() {
	    wp_enqueue_script('field-awesome-select-js', plugins_url( 'inc/admin/font-awesome/select2-font-awesome.js' , __FILE__ ), array('jquery', 'select2-js'), $GLOBALS['minigo_version'], true );
	    wp_register_style('redux-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', array(), $GLOBALS['minigo_version'], 'all' );
	    wp_enqueue_style('redux-font-awesome');
	}

	// Load Admin Panel Styling
	public function minigo_addPanelCSS() {
	    wp_register_style('minigo-redux-custom-css', plugins_url( 'inc/admin/custom.css' , __FILE__ ), $GLOBALS['minigo_version'], 'all' );
	    wp_enqueue_style('minigo-redux-custom-css');
	}

	// Load Admin Panel JavaScript
	public function minigo_addPanelJS() {
	    wp_enqueue_script('minigo-redux-custom-js', plugins_url( 'inc/admin/custom.js' , __FILE__ ), array('jquery', 'select2-js'), $GLOBALS['minigo_version'], true );
	}

	// Remove Redux Framework from the Tools menu
	public function remove_redux_menu() {
	    remove_submenu_page('tools.php','redux-about');
	}

	// Fix for wrong wp_editor height
	public function minigo_fix_editor_height_filter($in)
	{
	    $in['min_height'] = 300;
	    return $in;
	}

	public function minigo_fix_editor_height() {
	    add_filter('tiny_mce_before_init', 'minigo_fix_editor_height_filter' );
	}

	// Load Admin Panel Editor Styling
	public function minigo_addEditorCSS() {
	    add_editor_style( plugins_url( 'inc/admin/editor-style.css' , __FILE__ ) );
	}

	// Construct function
	public function __construct() {
		// do_action( 'admin_init', 'minigo_backend' );
		add_action( 'admin_init', 'minigo_backend' );
		// add_action( 'redux/page/pt_minigo/enqueue', 'minigo_backend' );
		add_action( 'redux/page/pt_minigo/enqueue', 'minigo_icon_font' );
		add_action( 'redux/page/pt_minigo/enqueue', 'minigo_addPanelCSS' );
		add_action( 'redux/page/pt_minigo/enqueue', 'minigo_addPanelJS' );
		add_action( 'admin_menu', 'remove_redux_menu',12 );
		add_action( 'redux/page/pt_minigo/load', 'minigo_fix_editor_height' );
		add_action( 'admin_init', 'minigo_addEditorCSS' );
	}

}
?>