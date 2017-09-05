<?php 

global $pt_minigo;

// Clean Strings for Hash URL
function cleanString($string) {
   $string = strtolower(str_replace(' ', '-', $string)); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

// Prepare Patterns
$pattern = '';
if($pt_minigo["background-pattern"] == 'preset' && !empty($pt_minigo["background-patternPreset"])) {
    $pattern = $pt_minigo["background-patternPreset"];
} elseif($pt_minigo["background-pattern"] == 'custom' && !empty($pt_minigo["background-patternCustom"]["url"])) {
    $pattern = $pt_minigo["background-patternCustom"]["url"];
}

// Prepare Content Background
$contentBG = '';
if ($pt_minigo["pages-background"] && $pt_minigo["pages-background-color"]["rgba"]){
    $contentBG = $pt_minigo["pages-background-color"]["rgba"];
}

// Prepare Slideshow
$backgroundType = 'slideshow';
$slideshowType = 'kenburns';
$videoSource = 'youtube';

switch($pt_minigo["background-type"]) {
    case 'color':
        $backgroundType = '';
        break;
    case 'slideshow-kenburns':
        $backgroundType = 'slideshow';
        $slideshowType = 'kenburns';
        break;
    case 'slideshow-fade':
        $backgroundType = 'slideshow';
        $slideshowType = 'fade';
        break;
    case 'slideshow-continuousFade':
        $backgroundType = 'slideshow';
        $slideshowType = 'continuousFade';
        break;
    case 'video':
        $backgroundType = 'video';
        $videoSource = 'local';
        break;
    case 'youtube':
        $backgroundType = 'video';
        $videoSource = 'youtube';
        break;
    case 'vimeo':
        $backgroundType = 'video';
        $videoSource = 'vimeo';
        $showVimeo = true;
        break;
}

// Prepare Gallery
$gallery = array();
if($backgroundType == 'slideshow' && !empty($pt_minigo["background-slideshow-gallery"])) {
    $gallery = new WP_Query( array(
        'posts_per_page' => -1,
        'post_type' => 'attachment',
        'post_status' => array(
            'publish',
            'inherit'
        ),
        'orderby' => 'post__in',
        'post__in' => explode(',', $pt_minigo['background-slideshow-gallery'])
    ));

    $gallery = $gallery->posts;
}

// Prepare Site Width
if( $pt_minigo["pages-width-switch"] && $pt_minigo["pages-width"] ) {
    $contentWidth = str_replace("%", "vw", $pt_minigo["pages-width"]["width"]);
}
else {
    $contentWidth = '';
}

// Prepare Audio
$audio = '';
if( $pt_minigo["enable-audio"] == 1 ) {
    if( $pt_minigo["audio-switch"] == 'url' ) {
        $audio = $pt_minigo["url-audio-track"];
    }
    elseif( $pt_minigo["audio-switch"] == 'local' ) {
        $audio = $pt_minigo["audio-track"]["url"];
    }
}


// pt_minigo["js-animation-options"]

// Prepare JS Animation Updated
$animation_name = '';
if ($pt_minigo["js-animation-switch"]){
    $animation_name = $pt_minigo["js-animation-options"];
}


// echo '<pre>';
// echo var_dump($pt_minigo["js-animation-options"]);
// echo '</pre>';

// Meta Title Filter
if( !empty($pt_minigo["meta-title"]) ) {
    $meta_title = htmlspecialchars($pt_minigo["meta-title"]);
}
else {
    $meta_title = '';
}

// Meta Description Filter
if( !empty($pt_minigo["meta-description"]) ) {
    $meta_description = htmlspecialchars($pt_minigo["meta-description"]);
}
else {
    $meta_description = '';
}

// Remove Duplicates from Google Fonts Array
$font_array = array( $pt_minigo["heading-1"]["font-family"] , $pt_minigo["heading-2"]["font-family"] , $pt_minigo["heading-3"]["font-family"] , $pt_minigo["heading-4"]["font-family"] , $pt_minigo["heading-5"]["font-family"], $pt_minigo["heading-6"]["font-family"] , $pt_minigo["paragraph-styles"]["font-family"] ,$pt_minigo["countdown-numbers"]["font-family"] , $pt_minigo["countdown-typo-labels"]["font-family"] , $pt_minigo["nav-button-typo"]["font-family"] , $pt_minigo["icon-button-typo"]["font-family"] , $pt_minigo["content-button-typo"]["font-family"] , $pt_minigo["input-typo"]["font-family"] , $pt_minigo["input-notification-typo"]["font-family"] );

$unique_fonts = array_unique($font_array);
$count_unique = count($unique_fonts);
$embed_fonts = '';
$cnt = 0;
foreach($unique_fonts as $unique_font) {
    $cnt++;
    $embed_fonts.= "'".$unique_font."'";
    if ($cnt != $count_unique){
         $embed_fonts.= ", ";
    }
}

// Prepare Page Margins
$pageMargins = '';
if ( ( $pt_minigo["pages-spacing-switch"] ) && ( !empty($pt_minigo["pages-margins"]["margin-top"]) || !empty($pt_minigo["pages-margins"]["margin-right"]) || !empty($pt_minigo["pages-margins"]["margin-bottom"]) || !empty($pt_minigo["pages-margins"]["margin-left"]) ) ) { 
// if ( ( $pt_minigo["pages-spacing-switch"] )  ) { 

    if( !empty($pt_minigo["pages-margins"]["margin-top"] ) ) {
        $pageMargins .= $pt_minigo["pages-margins"]["margin-top"] . ", ";
    } else {
        $pageMargins .= "auto , ";
    }
    if( !empty($pt_minigo["pages-margins"]["margin-right"] ) ) {
        $pageMargins .= $pt_minigo["pages-margins"]["margin-right"] . ", ";
    } else {
        $pageMargins .= "auto , ";
    }
    if( !empty($pt_minigo["pages-margins"]["margin-bottom"] ) ) {
        $pageMargins .= $pt_minigo["pages-margins"]["margin-bottom"] . ", ";
    } else {
        $pageMargins .= "auto , ";
    }
    if( !empty($pt_minigo["pages-margins"]["margin-left"] ) ) {
        $pageMargins .= $pt_minigo["pages-margins"]["margin-left"];
    } else {
        $pageMargins .= "auto";
    }

}

// Prepare Page Paddings
$pagePaddings = '';
if ( ( $pt_minigo["pages-spacing-switch"] ) && ( !empty($pt_minigo["pages-paddings"]["padding-top"]) || !empty($pt_minigo["pages-paddings"]["padding-right"]) || !empty($pt_minigo["pages-paddings"]["padding-bottom"]) || !empty($pt_minigo["pages-paddings"]["padding-left"]) ) ) { 
// if ( ( $pt_minigo["pages-spacing-switch"] )  ) { 

    if( !empty($pt_minigo["pages-paddings"]["padding-top"] ) ) {
        $pagePaddings .= $pt_minigo["pages-paddings"]["padding-top"] . ", ";
    } else {
        $pagePaddings .= "auto , ";
    }
    if( !empty($pt_minigo["pages-paddings"]["padding-right"] ) ) {
        $pagePaddings .= $pt_minigo["pages-paddings"]["padding-right"] . ", ";
    } else {
        $pagePaddings .= "auto , ";
    }
    if( !empty($pt_minigo["pages-paddings"]["padding-bottom"] ) ) {
        $pagePaddings .= $pt_minigo["pages-paddings"]["padding-bottom"] . ", ";
    } else {
        $pagePaddings .= "auto , ";
    }
    if( !empty($pt_minigo["pages-paddings"]["padding-left"] ) ) {
        $pagePaddings .= $pt_minigo["pages-paddings"]["padding-left"];
    } else {
        $pagePaddings .= "auto";
    }

}


// Prepare Page Borders

$borderSize = '';
$borderStyle = '';
$borderColor = '';

if ($pt_minigo["pages-background-border"]) {
    if($pt_minigo["pages-border"]["border-top"]) {
        $borderSize = $pt_minigo["pages-border"]["border-top"];
    }
    if($pt_minigo["pages-border"]["border-style"]) {
        $borderStyle = $pt_minigo["pages-border"]["border-style"];
    }
    if($pt_minigo["pages-border-color"]["rgba"]) {
        $borderColor = $pt_minigo["pages-border-color"]["rgba"];
    }
}


// Prepare Page Alignments
$pageAlign = '';
$pageTextAlign = '';
if ($pt_minigo["pages-align"] || $pt_minigo["pages-text-align"]) {
    $pageAlign = $pt_minigo["pages-align"]  != 'default' ? $pt_minigo["pages-align"] : '';
    $pageTextAlign = $pt_minigo["pages-text-align"] != 'default' ? $pt_minigo["pages-text-align"] : '';

}