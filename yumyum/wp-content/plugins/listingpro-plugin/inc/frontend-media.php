<?php

/**
 * Class Name:       Listingpro Frontend Media upload
 */


if ( ! defined( 'WPINC' ) ) {
	die;
}

class Listingpro_Front_End_Media_Upload {


	function __construct() {
		add_action( 'init', array( $this, 'init' ) );
	}


	function init() {
		load_plugin_textdomain(
			'frontend-media',
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_filter( 'ajax_query_attachments_args', array( $this, 'filter_media' ) );
		add_shortcode( 'frontend-button', array( $this, 'frontend_shortcode' ) );
	}


	function enqueue_scripts() {
		wp_enqueue_media();
		wp_enqueue_script(
			'frontend-js',
			plugins_url( '/', dirname(__FILE__) ) . 'assets/js/frontend.js',
			array( 'jquery' ),
			'2015-05-07'
		);
	}

	function filter_media( $query ) {
		if ( ! current_user_can( 'manage_options' ) )
			$query['author'] = get_current_user_id();

		return $query;
	}

	function frontend_shortcode( $args ) {
		if ( current_user_can( 'upload_files' ) ) {
			$str = __( 'Select File', 'frontend-media' );
			return '<input type="hidden" id="frontend-input" name="frontend_input"><input id="frontend-button" type="button" value="' . $str . '" class="button upload-btn" style="position: relative; z-index: 1;"><div class="clearfix"></div><img id="frontend-image" />';
		}

		return __( 'Please Login To Upload', 'frontend-media' );
	}
}

new Listingpro_Front_End_Media_Upload();