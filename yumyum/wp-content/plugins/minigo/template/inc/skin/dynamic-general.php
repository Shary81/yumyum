
/**
 * GENERAL STYLING
 */

/* Body Text */
.minigo {
<?php if( $pt_minigo['body-font-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['body-font-color']['rgba'] ?>;
<?php } ?>
/*
<?php if( $pt_minigo['base-typo']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['base-typo']['font-family'] ?>;
<?php } ?>
*/
<?php if( $pt_minigo['base-typo']['font-size'] ) { ?>
    font-size: <?php echo $pt_minigo['base-typo']['font-size'] ?>;
<?php } ?>
<?php if( $pt_minigo['base-typo']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['base-typo']['font-weight'] ?>;
<?php } ?>
}

/* Text Links */
.minigo a,
.minigo .contact-info a {
<?php if( $pt_minigo['link-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['link-color']['rgba'] ?>;
<?php } ?>
}

/* Text Links Hover */
.minigo a:hover, .minigo .contact-info a:hover {
<?php if( $pt_minigo['link-color-hover']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['link-color-hover']['rgba'] ?>;
<?php } ?>
}

/* Text Link Underlines */

.minigo .site-page a::before {
<?php if( $pt_minigo['link-underline-color']['rgba'] ) { ?>
    background-color: <?php echo $pt_minigo['link-underline-color']['rgba'] ?>;
<?php } ?>
}

.minigo .site-page a:hover::before {
<?php if( $pt_minigo['link-underline-hover']['rgba'] ) { ?>
    background-color: <?php echo $pt_minigo['link-underline-hover']['rgba'] ?>;
<?php } ?>
}

/* Paragraphs */
.minigo p,
.minigo .contact-info {
<?php if( $pt_minigo['paragraph-styles']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['paragraph-styles']['font-family'] ?>;
<?php } ?>
<?php if( $pt_minigo['paragraph-styles']['font-size'] ) { ?>
    font-size: <?php echo $pt_minigo['paragraph-styles']['font-size'] ?>;
<?php } ?>
<?php if( $pt_minigo['paragraph-styles']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['paragraph-styles']['font-weight'] ?>;
<?php } ?>
<?php if( $pt_minigo['paragraph-styles']['color'] ) { ?>
    color: <?php echo $pt_minigo['paragraph-styles']['color'] ?>;
<?php } ?>
<?php if( $pt_minigo['paragraph-styles']['line-height'] ) { ?>
    line-height: <?php echo $pt_minigo['paragraph-styles']['line-height'] ?>;
<?php } ?>
}

/* Heading H1 */
.minigo h1 {
<?php if( $pt_minigo['heading-1']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['heading-1']['font-family'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-1']['font-size'] ) { ?>
    font-size: <?php echo $pt_minigo['heading-1']['font-size'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-1']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['heading-1']['font-weight'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-1']['text-transform'] ) { ?>
    text-transform: <?php echo $pt_minigo['heading-1']['text-transform'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-1']['color'] ) { ?>
    color: <?php echo $pt_minigo['heading-1']['color'] ?>;
<?php } ?>
}

/* Heading H2 */
.minigo h2 {
<?php if( $pt_minigo['heading-2']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['heading-2']['font-family'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-2']['font-size'] ) { ?>
    font-size: <?php echo $pt_minigo['heading-2']['font-size'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-2']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['heading-2']['font-weight'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-2']['text-transform'] ) { ?>
    text-transform: <?php echo $pt_minigo['heading-2']['text-transform'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-2']['color'] ) { ?>
    color: <?php echo $pt_minigo['heading-2']['color'] ?>;
<?php } ?>
}

/* Heading H3 */
.minigo h3 {
<?php if( $pt_minigo['heading-3']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['heading-3']['font-family'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-3']['font-size'] ) { ?>
    font-size: <?php echo $pt_minigo['heading-3']['font-size'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-3']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['heading-3']['font-weight'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-3']['text-transform'] ) { ?>
    text-transform: <?php echo $pt_minigo['heading-3']['text-transform'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-3']['color'] ) { ?>
    color: <?php echo $pt_minigo['heading-3']['color'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-3']['line-height'] ) { ?>
    line-height: <?php echo $pt_minigo['heading-3']['line-height'] ?>;
<?php } ?>
}

/* Heading H4 */
.minigo h4 {
<?php if( $pt_minigo['heading-4']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['heading-4']['font-family'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-4']['font-size'] ) { ?>
    font-size: <?php echo $pt_minigo['heading-4']['font-size'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-4']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['heading-4']['font-weight'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-4']['text-transform'] ) { ?>
    text-transform: <?php echo $pt_minigo['heading-4']['text-transform'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-4']['color'] ) { ?>
    color: <?php echo $pt_minigo['heading-4']['color'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-4']['line-height'] ) { ?>
    line-height: <?php echo $pt_minigo['heading-4']['line-height'] ?>;
<?php } ?>
}

/* Heading H5 */
.minigo h5 {
<?php if( $pt_minigo['heading-5']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['heading-5']['font-family'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-5']['font-size'] ) { ?>
    font-size: <?php echo $pt_minigo['heading-5']['font-size'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-5']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['heading-5']['font-weight'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-5']['text-transform'] ) { ?>
    text-transform: <?php echo $pt_minigo['heading-5']['text-transform'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-5']['color'] ) { ?>
    color: <?php echo $pt_minigo['heading-5']['color'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-5']['line-height'] ) { ?>
    line-height: <?php echo $pt_minigo['heading-5']['line-height'] ?>;
<?php } ?>
}

/* Heading H6 */
.minigo h6 {
<?php if( $pt_minigo['heading-6']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['heading-6']['font-family'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-6']['font-size'] ) { ?>
    font-size: <?php echo $pt_minigo['heading-6']['font-size'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-6']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['heading-6']['font-weight'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-6']['text-transform'] ) { ?>
    text-transform: <?php echo $pt_minigo['heading-6']['text-transform'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-6']['color'] ) { ?>
    color: <?php echo $pt_minigo['heading-6']['color'] ?>;
<?php } ?>
<?php if( $pt_minigo['heading-6']['line-height'] ) { ?>
    line-height: <?php echo $pt_minigo['heading-6']['line-height'] ?>;
<?php } ?>
}

/* Content Buttons */
.minigo .btn {
<?php if( $pt_minigo['content-button-typo']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['content-button-typo']['font-family'] ?>;
<?php } ?>
<?php if( $pt_minigo['content-button-typo']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['content-button-typo']['font-weight'] ?>;
<?php } ?>
<?php if( $pt_minigo['content-button-typo']['font-size'] ) { ?>
    font-size: <?php echo $pt_minigo['content-button-typo']['font-size'] ?>;
<?php } ?>
<?php if( $pt_minigo['content-button-border']['border-top'] && $pt_minigo['content-button-border']['border-left'] && $pt_minigo['content-button-border']['border-right'] && $pt_minigo['content-button-border']['border-bottom'] ) { ?>
    border-top-width: <?php echo $pt_minigo['content-button-border']['border-top'] ?>;
    border-left-width: <?php echo $pt_minigo['content-button-border']['border-left'] ?>;
    border-right-width: <?php echo $pt_minigo['content-button-border']['border-right'] ?>;
    border-bottom-width: <?php echo $pt_minigo['content-button-border']['border-bottom'] ?>;
<?php } ?>
<?php if( $pt_minigo['content-button-border']['border-style'] ) { ?>
    border-style: <?php echo $pt_minigo['content-button-border']['border-style'] ?>;
<?php } ?>
<?php if( $pt_minigo['content-button-border-color']['rgba'] ) { ?>
    border-color: <?php echo $pt_minigo['content-button-border-color']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['content-button-bg']['rgba'] ) { ?>
    background: <?php echo $pt_minigo['content-button-bg']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['content-button-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['content-button-color']['rgba'] ?>;
<?php } ?>
}

/* Content Buttons - Hover */
.minigo .btn:hover {
<?php if( $pt_minigo['content-button-border-hover']['border-top'] && $pt_minigo['content-button-border-hover']['border-left'] && $pt_minigo['content-button-border-hover']['border-right'] && $pt_minigo['content-button-border-hover']['border-bottom'] ) { ?>
    border-top-width: <?php echo $pt_minigo['content-button-border-hover']['border-top'] ?>;
    border-left-width: <?php echo $pt_minigo['content-button-border-hover']['border-left'] ?>;
    border-right-width: <?php echo $pt_minigo['content-button-border-hover']['border-right'] ?>;
    border-bottom-width: <?php echo $pt_minigo['content-button-border-hover']['border-bottom'] ?>;
<?php } ?>
<?php if( $pt_minigo['content-button-border-hover']['border-style'] ) { ?>
    border-style: <?php echo $pt_minigo['content-button-border-hover']['border-style'] ?>;
<?php } ?>
<?php if( $pt_minigo['content-button-border-color-hover']['rgba'] ) { ?>
    border-color: <?php echo $pt_minigo['content-button-border-color-hover']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['content-button-bg-hover']['rgba'] ) { ?>
    background: <?php echo $pt_minigo['content-button-bg-hover']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['content-button-color-hover']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['content-button-color-hover']['rgba'] ?>;
<?php } ?>
}

/* [Main Navigation] */

/* Main Navigation - Label */
.minigo .nav-left .site-page__trigger span,
.minigo .nav-right .site-page__trigger span,
.minigo .site-to__top span,
.minigo .nav-close .site-page__close span,
.minigo .nav-menu a span {
<?php if( $pt_minigo['nav-button-typo']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['nav-button-typo']['font-family'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-typo']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['nav-button-typo']['font-weight'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-typo']['font-size'] ) { ?>
    font-size: <?php echo $pt_minigo['nav-button-typo']['font-size'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-label-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['nav-button-label-color']['rgba'] ?>;
<?php } ?>
}

/* Main Navigation - Icon */
.minigo .nav-left .site-page__trigger i,
.minigo .nav-right .site-page__trigger i,
.minigo .site-to__top i,
.minigo .nav-close .site-page__close i,
.minigo .nav-menu a i {
<?php if( $pt_minigo['nav-button-border']['border-top'] && $pt_minigo['nav-button-border']['border-left'] && $pt_minigo['nav-button-border']['border-right'] && $pt_minigo['nav-button-border']['border-bottom'] ) { ?>
    border-top-width: <?php echo $pt_minigo['nav-button-border']['border-top'] ?>;
    border-left-width: <?php echo $pt_minigo['nav-button-border']['border-left'] ?>;
    border-right-width: <?php echo $pt_minigo['nav-button-border']['border-right'] ?>;
    border-bottom-width: <?php echo $pt_minigo['nav-button-border']['border-bottom'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-border']['border-style'] ) { ?>
    border-style: <?php echo $pt_minigo['nav-button-border']['border-style'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-border-color']['rgba'] ) { ?>
    border-color: <?php echo $pt_minigo['nav-button-border-color']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-bg']['rgba'] ) { ?>
    background-color: <?php echo $pt_minigo['nav-button-bg']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-icon-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['nav-button-icon-color']['rgba'] ?>;
<?php } ?> 
}

/* Main Navigation - Label - Hover */
.minigo .nav-left .site-page__trigger:hover span,
.minigo .nav-left .site-page__trigger.active:hover span,
.minigo .nav-right .site-page__trigger:hover span,
.minigo .nav-right .site-page__trigger.active:hover span,
.minigo .site-to__top:hover span,
.minigo .nav-close .site-page__close:hover span,
.minigo .nav-menu a:hover span {
<?php if( $pt_minigo['nav-button-label-color-hover']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['nav-button-label-color-hover']['rgba'] ?>;
<?php } ?>
}

/* Main Navigation - Icon - Hover */
.minigo .nav-left .site-page__trigger:hover i,
.minigo .nav-left .site-page__trigger.active:hover i,
.minigo .nav-right .site-page__trigger:hover i,
.minigo .nav-right .site-page__trigger.active:hover i,
.minigo .site-to__top:hover i,
.minigo .nav-close .site-page__close:hover i,
.minigo .nav-menu a:hover i {
<?php if( $pt_minigo['nav-button-border-hover']['border-top'] && $pt_minigo['nav-button-border-hover']['border-left'] && $pt_minigo['nav-button-border-hover']['border-right'] && $pt_minigo['nav-button-border-hover']['border-bottom'] ) { ?>
    border-top-width: <?php echo $pt_minigo['nav-button-border-hover']['border-top'] ?>;
    border-left-width: <?php echo $pt_minigo['nav-button-border-hover']['border-left'] ?>;
    border-right-width: <?php echo $pt_minigo['nav-button-border-hover']['border-right'] ?>;
    border-bottom-width: <?php echo $pt_minigo['nav-button-border-hover']['border-bottom'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-border-hover']['border-style'] ) { ?>
    border-style: <?php echo $pt_minigo['nav-button-border-hover']['border-style'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-border-color-hover']['rgba'] ) { ?>
    border-color: <?php echo $pt_minigo['nav-button-border-color-hover']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-bg-hover']['rgba'] ) { ?>
    background-color: <?php echo $pt_minigo['nav-button-bg-hover']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-icon-color-hover']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['nav-button-icon-color-hover']['rgba'] ?> !important;
<?php } ?> 
}

/* Main Navigation - Label - Selected */
.minigo .nav-left .site-page__trigger.active span,
.minigo .nav-right .site-page__trigger.active span,
.minigo .site-to__top:focus span,
.minigo .nav-close  .site-page__close:focus span,
.minigo .nav-menu a:focus span {
<?php if( $pt_minigo['nav-button-label-color-selected']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['nav-button-label-color-selected']['rgba'] ?>;
<?php } ?>
}

/* Main Navigation - Icon - Selected */
.minigo .nav-left .site-page__trigger.active i,
.minigo .nav-right .site-page__trigger.active i,
.minigo .site-to__top:focus i,
.minigo .nav-close  .site-page__close:focus i,
.minigo .nav-menu a:focus i {
<?php if( $pt_minigo['nav-button-border-selected']['border-top'] && $pt_minigo['nav-button-border-selected']['border-left'] && $pt_minigo['nav-button-border-selected']['border-right'] && $pt_minigo['nav-button-border-selected']['border-bottom'] ) { ?>
    border-top-width: <?php echo $pt_minigo['nav-button-border-selected']['border-top'] ?>;
    border-left-width: <?php echo $pt_minigo['nav-button-border-selected']['border-left'] ?>;
    border-right-width: <?php echo $pt_minigo['nav-button-border-selected']['border-right'] ?>;
    border-bottom-width: <?php echo $pt_minigo['nav-button-border-selected']['border-bottom'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-border-selected']['border-style'] ) { ?>
    border-style: <?php echo $pt_minigo['nav-button-border-selected']['border-style'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-border-color-selected']['rgba'] ) { ?>
    border-color: <?php echo $pt_minigo['nav-button-border-color-selected']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-bg-selected']['rgba'] ) { ?>
    background-color: <?php echo $pt_minigo['nav-button-bg-selected']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['nav-button-icon-color-selected']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['nav-button-icon-color-selected']['rgba'] ?> !important;
<?php } ?> 
}

/* Icon Menu Navigation */
.minigo .nav-social a,
.minigo .icon-menu a,
.minigo .team-holder .grid__item .team-links a,
.minigo .setup-audio {
<?php if( $pt_minigo['icon-button-border']['border-top'] && $pt_minigo['icon-button-border']['border-left'] && $pt_minigo['icon-button-border']['border-right'] && $pt_minigo['icon-button-border']['border-bottom'] ) { ?>
    border-top-width: <?php echo $pt_minigo['icon-button-border']['border-top'] ?>;
    border-left-width: <?php echo $pt_minigo['icon-button-border']['border-left'] ?>;
    border-right-width: <?php echo $pt_minigo['icon-button-border']['border-right'] ?>;
    border-bottom-width: <?php echo $pt_minigo['icon-button-border']['border-bottom'] ?>;
<?php } ?>
<?php if( $pt_minigo['icon-button-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['icon-button-color']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['icon-button-border']['border-style'] ) { ?>
    border-style: <?php echo $pt_minigo['icon-button-border']['border-style'] ?>;
<?php } ?>
<?php if( $pt_minigo['icon-button-border-color']['rgba'] ) { ?>
    border-color: <?php echo $pt_minigo['icon-button-border-color']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['icon-button-bg']['rgba'] ) { ?>
    background: <?php echo $pt_minigo['icon-button-bg']['rgba'] ?>;
<?php } ?>
}

/* Icon Menu Nav - Hover */
.minigo .nav-social a:hover,
.minigo .icon-menu a:hover,
.minigo .team-holder .grid__item .team-links a:hover,
.minigo .setup-audio:hover  {
<?php if( $pt_minigo['icon-button-border-hover']['border-top'] && $pt_minigo['icon-button-border-hover']['border-left'] && $pt_minigo['icon-button-border-hover']['border-right'] && $pt_minigo['icon-button-border-hover']['border-bottom'] ) { ?>
    border-top-width: <?php echo $pt_minigo['icon-button-border-hover']['border-top'] ?>;
    border-left-width: <?php echo $pt_minigo['icon-button-border-hover']['border-left'] ?>;
    border-right-width: <?php echo $pt_minigo['icon-button-border-hover']['border-right'] ?>;
    border-bottom-width: <?php echo $pt_minigo['icon-button-border-hover']['border-bottom'] ?>;
<?php } ?>
<?php if( $pt_minigo['icon-button-border-hover']['border-style'] ) { ?>
    border-style: <?php echo $pt_minigo['icon-button-border-hover']['border-style'] ?>;
<?php } ?>
<?php if( $pt_minigo['icon-button-border-color-hover']['rgba'] ) { ?>
    border-color: <?php echo $pt_minigo['icon-button-border-color-hover']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['icon-button-bg-hover']['rgba'] ) { ?>
    background: <?php echo $pt_minigo['icon-button-bg-hover']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['icon-button-color-hover']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['icon-button-color-hover']['rgba'] ?>;
<?php } ?>
}

.minigo .setup-audio .audio-icons i {
<?php if( $pt_minigo['icon-button-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['icon-button-color']['rgba'] ?>;
<?php } ?>
}

.minigo .setup-audio .audio-icons:hover i {
<?php if( $pt_minigo['icon-button-color-hover']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['icon-button-color-hover']['rgba'] ?>;
<?php } ?>
}

/* Icon Menu Nav - Label */
.minigo .nav-social a::after,
.minigo .nav-social a:hover::after,
.minigo .icon-menu a::after,
.minigo .icon-menu a:hover::after {
<?php if( $pt_minigo['icon-button-typo']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['icon-button-typo']['font-family'] ?>;
<?php } ?>
<?php if( $pt_minigo['icon-button-typo']['font-size'] ) { ?>
    font-size: <?php echo $pt_minigo['icon-button-typo']['font-size'] ?>;
<?php } ?>
<?php if( $pt_minigo['icon-button-typo']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['icon-button-typo']['font-weight'] ?>;
<?php } ?>
<?php if( $pt_minigo['icon-button-typo']['line-height'] ) { ?>
    line-height: <?php echo $pt_minigo['icon-button-typo']['line-height'] ?>;
<?php } ?>  
}

/* Icon Menu Nav - Label - Hover */
.minigo .nav-social a:hover::after,
.minigo .icon-menu a:hover::after {
<?php if( $pt_minigo['icon-button-label-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['icon-button-label-color']['rgba'] ?>;
<?php } ?>
}

/* [Forms] */

/* Input - Typography */
.minigo .text-input,
.minigo textarea,
.minigo select,
.minigo .contact-info,
.minigo .contact-info a {
<?php if( $pt_minigo['input-typo']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['input-typo']['font-family'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-typo']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['input-typo']['font-weight'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-typo']['font-size'] ) { ?>
    font-size: <?php echo $pt_minigo['input-typo']['font-size'] ?>;
<?php } ?>
}

/* Inputs */
.minigo .text-input,
.minigo textarea,
.minigo select {
<?php if( $pt_minigo['input-border']['border-top'] && $pt_minigo['input-border']['border-left'] && $pt_minigo['input-border']['border-right'] && $pt_minigo['input-border']['border-bottom'] ) { ?>
    border-top-width: <?php echo $pt_minigo['input-border']['border-top'] ?>;
    border-left-width: <?php echo $pt_minigo['input-border']['border-left'] ?>;
    border-right-width: <?php echo $pt_minigo['input-border']['border-right'] ?>;
    border-bottom-width: <?php echo $pt_minigo['input-border']['border-bottom'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-border']['border-style'] ) { ?>
    border-style: <?php echo $pt_minigo['input-border']['border-style'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-border']['border-color'] ) { ?>
    border-color: <?php echo $pt_minigo['input-border-color']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-color']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-background']['rgba'] ) { ?>
    background: <?php echo $pt_minigo['input-background']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-shadow-size'] && $pt_minigo['input-shadow-color']['rgba'] ) { ?>
            box-shadow: 0 0 <?php echo $pt_minigo['input-shadow-size'] . 'px 0 ' . $pt_minigo['input-shadow-color']['rgba'] ?>;
       -moz-box-shadow: 0 0 <?php echo $pt_minigo['input-shadow-size'] . 'px 0 ' . $pt_minigo['input-shadow-color']['rgba'] ?>;
    -webkit-box-shadow: 0 0 <?php echo $pt_minigo['input-shadow-size'] . 'px 0 ' . $pt_minigo['input-shadow-color']['rgba'] ?>;
<?php } ?>
}

/* Inputs - Hover */
.minigo .text-input:hover,
.minigo textarea:hover,
.minigo select:hover {
<?php if( $pt_minigo['input-hover-border']['border-top'] && $pt_minigo['input-hover-border']['border-left'] && $pt_minigo['input-hover-border']['border-right'] && $pt_minigo['input-hover-border']['border-bottom'] ) { ?>
    border-top-width: <?php echo $pt_minigo['input-hover-border']['border-top'] ?>;
    border-left-width: <?php echo $pt_minigo['input-hover-border']['border-left'] ?>;
    border-right-width: <?php echo $pt_minigo['input-hover-border']['border-right'] ?>;
    border-bottom-width: <?php echo $pt_minigo['input-hover-border']['border-bottom'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-hover-border']['border-style'] ) { ?>
    border-style: <?php echo $pt_minigo['input-hover-border']['border-style'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-hover-border-color']['rgba'] ) { ?>
    border-color: <?php echo $pt_minigo['input-hover-border-color']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-hover-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-hover-color']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-hover-background-color']['rgba'] ) { ?>
    background: <?php echo $pt_minigo['input-hover-background-color']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-hover-shadow-size'] && $pt_minigo['input-hover-shadow-color']['rgba'] ) { ?>
            box-shadow: 0 0 <?php echo $pt_minigo['input-hover-shadow-size'] . 'px 0 ' . $pt_minigo['input-hover-shadow-color']['rgba'] ?>;
       -moz-box-shadow: 0 0 <?php echo $pt_minigo['input-hover-shadow-size'] . 'px 0 ' . $pt_minigo['input-hover-shadow-color']['rgba'] ?>;
    -webkit-box-shadow: 0 0 <?php echo $pt_minigo['input-hover-shadow-size'] . 'px 0 ' . $pt_minigo['input-hover-shadow-color']['rgba'] ?>;
<?php } ?>
}

/* Inputs - Focus */
.minigo .text-input:focus,
.minigo textarea:focus,
.minigo select:focus {
<?php if( $pt_minigo['input-active-border']['border-top'] && $pt_minigo['input-active-border']['border-left'] && $pt_minigo['input-active-border']['border-right'] && $pt_minigo['input-active-border']['border-bottom'] ) { ?>
    border-top-width: <?php echo $pt_minigo['input-active-border']['border-top'] ?>;
    border-left-width: <?php echo $pt_minigo['input-active-border']['border-left'] ?>;
    border-right-width: <?php echo $pt_minigo['input-active-border']['border-right'] ?>;
    border-bottom-width: <?php echo $pt_minigo['input-active-border']['border-bottom'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-active-border']['border-style'] ) { ?>
    border-style: <?php echo $pt_minigo['input-active-border']['border-style'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-active-border-color']['rgba'] ) { ?>
    border-color: <?php echo $pt_minigo['input-active-border-color']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-active-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-active-color']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-active-background-color']['rgba'] ) { ?>
    background: <?php echo $pt_minigo['input-active-background-color']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-active-shadow-size'] && $pt_minigo['input-active-shadow-color']['rgba'] ) { ?>
            box-shadow: 0 0 <?php echo $pt_minigo['input-active-shadow-size'] . 'px 0 ' . $pt_minigo['input-active-shadow-color']['rgba'] ?>;
       -moz-box-shadow: 0 0 <?php echo $pt_minigo['input-active-shadow-size'] . 'px 0 ' . $pt_minigo['input-active-shadow-color']['rgba'] ?>;
    -webkit-box-shadow: 0 0 <?php echo $pt_minigo['input-active-shadow-size'] . 'px 0 ' . $pt_minigo['input-active-shadow-color']['rgba'] ?>;
<?php } ?>
}

/* Inputs - Labels */
.minigo form label {
<?php if( $pt_minigo['input-notification-typo']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['input-notification-typo']['font-family'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-notification-typo']['font-size'] ) { ?>
    font-size: <?php echo $pt_minigo['input-notification-typo']['font-size'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-notification-typo']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['input-notification-typo']['font-weight'] ?>;
<?php } ?>
<?php if( $pt_minigo['input-notification-typo']['color'] ) { ?>
    color: <?php echo $pt_minigo['input-notification-typo']['color'] ?>;
<?php } ?>
}

/* Inputs - Notifications */
.minigo #contactForm.form--success::after {
<?php if( $pt_minigo['input-notification-typo']['color'] ) { ?>
    color: <?php echo $pt_minigo['input-notification-typo']['color'] ?>;
<?php } ?>
}

/* Inputs - Placeholder Text */
.minigo input:-moz-placeholder,
.minigo textarea:-moz-placeholder {
<?php if( $pt_minigo['input-placeholder-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-placeholder-color']['rgba'] ?>;
<?php } ?>
}
.minigo input::-moz-placeholder,
.minigo textarea::-moz-placeholder {
<?php if( $pt_minigo['input-placeholder-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-placeholder-color']['rgba'] ?>;
<?php } ?>
}
.minigo input:-ms-input-placeholder,
.minigo textarea:-ms-input-placeholder {
<?php if( $pt_minigo['input-placeholder-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-placeholder-color']['rgba'] ?>;
<?php } ?>
}
.minigo input::-webkit-input-placeholder,
.minigo textarea::-webkit-input-placeholder {
<?php if( $pt_minigo['input-placeholder-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-placeholder-color']['rgba'] ?>;
<?php } ?>
}
.minigo input:hover:-moz-placeholder,
.minigo textarea:hover:-moz-placeholder {
<?php if( $pt_minigo['input-hover-placeholder-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-hover-placeholder-color']['rgba'] ?>;
<?php } ?>
}
.minigo input:hover::-moz-placeholder,
.minigo textarea:hover::-moz-placeholder {
<?php if( $pt_minigo['input-hover-placeholder-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-hover-placeholder-color']['rgba'] ?>;
<?php } ?>
}
.minigo input:hover:-ms-input-placeholder,
.minigo textarea:hover:-ms-input-placeholder {
<?php if( $pt_minigo['input-hover-placeholder-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-hover-placeholder-color']['rgba'] ?>;
<?php } ?>
}
.minigo input:hover::-webkit-input-placeholder,
.minigo textarea:hover::-webkit-input-placeholder {
<?php if( $pt_minigo['input-hover-placeholder-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-hover-placeholder-color']['rgba'] ?>;
<?php } ?>
}
.minigo input:focus:-moz-placeholder,
.minigo textarea:focus:-moz-placeholder {
<?php if( $pt_minigo['input-active-placeholder-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-active-placeholder-color']['rgba'] ?>;
<?php } ?>
}
.minigo input:focus::-moz-placeholder,
.minigo textarea:focus::-moz-placeholder {
<?php if( $pt_minigo['input-active-placeholder-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-active-placeholder-color']['rgba'] ?>;
<?php } ?>
}
.minigo input:focus:-ms-input-placeholder,
.minigo textarea:focus:-ms-input-placeholder {
<?php if( $pt_minigo['input-active-placeholder-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-active-placeholder-color']['rgba'] ?>;
<?php } ?>
}
.minigo input:focus::-webkit-input-placeholder,
.minigo textarea:focus::-webkit-input-placeholder {
<?php if( $pt_minigo['input-active-placeholder-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['input-active-placeholder-color']['rgba'] ?>;
<?php } ?>
}

