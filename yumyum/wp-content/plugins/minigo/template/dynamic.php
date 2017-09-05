<?php
header('Content-type: text/css');
require '../../../../wp-load.php';

global $pt_minigo;

// Load General Dynamic Styling
if( $pt_minigo['enable-visual-settings'] == 1 ) {
    require_once 'inc/skin/dynamic-general.php';
}

// Load Blocks Dynamic Styling
if( $pt_minigo['enable-blocks-visual-settings'] == 1 ) {
    require_once 'inc/skin/dynamic-blocks.php';
    require_once 'inc/skin/dynamic-blocks-shop.php';
}

// Load Options Dynamic Styling
require_once 'inc/skin/dynamic-options.php';

?>