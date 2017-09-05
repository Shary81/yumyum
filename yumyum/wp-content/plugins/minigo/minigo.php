<?php
/*
Plugin Name: MiniGO
Plugin URI: http://pre.la/minigo-wp
Description: MiniGO - Uber Minimal Flat Coming Soon WP Plugin
Version: 3.0.6
Author: Premio Themes
Author URI: http://www.premiothemes.com
License: Commercial
Domain Path: /inc/languages
Text Domain: pt-minigo
Copyright 2014-2017 Premio Themes
*/

$minigo_version = '3.0.6';

/**
 * Init
 *
 * @package WordPress
 * @subpackage MiniGO
 * @since 1.0
 */

/**
 * Require config to get our initial values
 */


/**
 * Upon activation of the plugin, see if we are running the required version and deploy theme in defined.
 *
 * @since 1.0
 */

include 'inc/debug.php';

// Define the plugin path variables for later use
global $minigo_path;
$minigo_path = plugin_dir_path(__FILE__);
$minigo_url = plugin_dir_url(__FILE__);

/**
 * Multilanguage Support
 */ 

function minigo_load_textdomain() {
  load_plugin_textdomain( 'pt-minigo', false, plugin_basename( dirname( __FILE__ ) ) . '/inc/languages' );
}

add_action( 'plugins_loaded', 'minigo_load_textdomain' );


/**
 * Backend Setup
 */ 

if ( !class_exists( 'redux-framework' ) && file_exists( plugin_dir_path(__FILE__) . 'inc/redux-framework/ReduxCore/framework.php' ) ) {
    require_once( plugin_dir_path(__FILE__) . 'inc/redux-framework/ReduxCore/framework.php' );
}

if ( file_exists( plugin_dir_path(__FILE__) . 'inc/admin/config.php' ) ) {
    require_once( plugin_dir_path(__FILE__) . 'inc/premio-fields/premio-fields.php' );
    require_once( plugin_dir_path(__FILE__) . 'inc/premio-fields/field-contact-info/field_contact_info.php' );
    require_once( plugin_dir_path(__FILE__) . 'inc/premio-fields/field-icon-menu/field-icon-menu.php' );
    require_once( plugin_dir_path(__FILE__) . 'inc/premio-fields/field-icon-features/field-icon-features.php' );
    require_once( plugin_dir_path(__FILE__) . 'inc/premio-fields/field-counter-features/field-counter-features.php' );
    require_once( plugin_dir_path(__FILE__) . 'inc/premio-fields/field-icon-list/field-icon-list.php' );
    require_once( plugin_dir_path(__FILE__) . 'inc/premio-fields/field-progress-bars/field-progress-bars.php' );
    require_once( plugin_dir_path(__FILE__) . 'inc/premio-fields/field-team-profiles/field-team-profiles.php' );
    require_once( plugin_dir_path(__FILE__) . 'inc/premio-fields/field-testimonials/field-testimonials.php' );
    require_once( plugin_dir_path(__FILE__) . 'inc/premio-fields/premio-verify/premio-verify.php' );
    require_once( plugin_dir_path(__FILE__) . 'inc/admin/config.php' );
    require_once( plugin_dir_path(__FILE__) . 'inc/admin/font-awesome/font-awesome-icons.php' );
}

// Load Admin Font
function minigo_admin_font() {
    wp_register_style('redux-pt-font', '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=latin-ext', array(), $GLOBALS['minigo_version'], 'all' );
    wp_enqueue_style('redux-pt-font');
}
add_action( 'redux/page/pt_minigo/enqueue', 'minigo_admin_font' );

// Load Icon Fonts
function minigo_icon_font() {
    wp_enqueue_script('field-awesome-select-js', plugins_url( 'inc/admin/font-awesome/select2-font-awesome.js' , __FILE__ ), array('jquery', 'select2-js'), $GLOBALS['minigo_version'], true );
    // wp_register_style('redux-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css', array(), $GLOBALS['minigo_version'], 'all' );
    wp_register_style('redux-font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css', array(), $GLOBALS['minigo_version'], 'all' );
    wp_enqueue_style('redux-font-awesome');
}
add_action( 'redux/page/pt_minigo/enqueue', 'minigo_icon_font' );


// Load Admin Panel Styling
function minigo_addPanelCSS() {
    wp_register_style('minigo-redux-custom-css', plugins_url( 'inc/admin/custom.min.css' , __FILE__ ), $GLOBALS['minigo_version'], 'all' );
    wp_enqueue_style('minigo-redux-custom-css');
}
add_action( 'redux/page/pt_minigo/enqueue', 'minigo_addPanelCSS' );

// Load Admin Panel JavaScript
function minigo_addPanelJS() {
    wp_enqueue_script('minigo-redux-custom-js', plugins_url( 'inc/admin/custom.min.js' , __FILE__ ), array('jquery', 'select2-js'), $GLOBALS['minigo_version'], true );
}
add_action( 'redux/page/pt_minigo/enqueue', 'minigo_addPanelJS' );

// Load Custom Fields JavaScript
function minigo_addFieldsJS() {
    wp_enqueue_script('minigo-redux-premio-fields-js', plugins_url( 'inc/admin/premio-fields.min.js' , __FILE__ ), array('jquery', 'jquery-ui-core', 'jquery-ui-accordion', 'wp-color-picker', 'select2-js'), $GLOBALS['minigo_version'], true );
}
add_action( 'redux/page/pt_minigo/enqueue', 'minigo_addFieldsJS' );

// Remove Redux Framework from the Tools menu
add_action( 'admin_menu', 'remove_redux_menu',12 );
function remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}

// Fix for wrong wp_editor height
function minigo_fix_editor_height_filter($in)
{
    $in['min_height'] = 300;
    return $in;
}

function minigo_fix_editor_height() {
    add_filter('tiny_mce_before_init', 'minigo_fix_editor_height_filter' );
}
add_action( 'redux/page/pt_minigo/load', 'minigo_fix_editor_height' );

// Load Admin Panel Editor Styling
function minigo_addEditorCSS() {
    add_editor_style( plugins_url( 'inc/admin/editor-style.min.css' , __FILE__ ) );
}
add_action( 'admin_init', 'minigo_addEditorCSS' );

/**
 *  Init
 */
add_action('init', 'premiothemes_init', 1);
function premiothemes_init() {
    // Load Classes
    // require_once( 'classes/backend.class.php' );
    require_once( 'classes/utility.class.php' );
    require_once( 'classes/shortcodes.class.php' );
    require_once( 'classes/editor.class.php' );
    // require_once( 'classes/options.class.php' ); // Options not yet implemented
    require_once( 'classes/comingsoon.class.php' );
    
    // Creates NONCE field value
    wp_create_nonce( 'minigo-subscribe' );
    wp_create_nonce( 'minigo-contact' );

    // Init Classes
    // new PremioThemes_Backend();
    new PremioThemes_ComingSoon_Admin();
    new PremioThemes_ComingSoon();
    new PremioThemes_Utility();
    new PremioThemes_Shortcodes();
    // new PremioThemes_Editor();
}

/**
 *  TinyMCE Button Hooks
 */

// Hooks your functions into the correct filters
function premioThemesShortcodeCustomButton() {
    // check user permissions
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }
    // check if WYSIWYG is enabled
    if ( is_admin() ) {
        add_filter( 'mce_external_plugins', 'editTinyMceEditor' );
        add_filter( 'mce_buttons', 'registerPremioThemeShortcodeButton' );
    }
}
add_action('admin_head', 'premioThemesShortcodeCustomButton');

// Declare script for new buttons
function editTinyMceEditor( $plugin_array ) {
    $plugin_array['pt_mce_widgets_button'] = plugins_url( 'inc/admin/mce-widgets.min.js' , __FILE__ );
    $plugin_array['pt_mce_content_button'] = plugins_url( 'inc/admin/mce-content.min.js' , __FILE__ );
    return $plugin_array;
}

function registerPremioThemeShortcodeButton( $buttons ) {
    array_push( $buttons, 'pt_mce_widgets_button' );
    array_push( $buttons, 'pt_mce_content_button' );
    return $buttons;
}

// On Activation, Open MiniGO Options
function comingsoon_activation_redirect( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        exit( wp_redirect( admin_url( 'admin.php?page=minigo_options&tab=0' ) ) );
    }
}
add_action( 'activated_plugin', 'comingsoon_activation_redirect' );