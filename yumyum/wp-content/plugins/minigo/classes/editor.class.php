<?php
/**
 *  TinyMCE Editor - Shortcode Button Hooks
 */
class PremioThemes_Editor {

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

	// Declare script for new buttons
	function editTinyMceEditor( $plugin_array ) {
	    $plugin_array['my_mce_button'] = plugins_url( 'inc/admin/shortcodes.js' , __FILE__ );
	    return $plugin_array;
	}

	function registerPremioThemeShortcodeButton( $buttons ) {
	    array_push( $buttons, 'pt_mce_content' );
	    array_push( $buttons, 'pt_mce_shortcodes' );
	    return $buttons;
	}

	// Construct function
	public function __construct() {
		add_action('admin_head', 'premioThemesShortcodeCustomButton');
	}

}
?>