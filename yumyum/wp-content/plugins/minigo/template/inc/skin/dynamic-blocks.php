
/**
 * BLOCKS STYLING
 */

/* [Title] */

/* Title - Color */
.minigo .minigo-title.small-divider h1,
.minigo .minigo-title.med-divider h1,
.minigo .minigo-title.big-divider h1 {
<?php if( $pt_minigo['titles-title-color']['rgba']) { ?>
    color: <?php echo $pt_minigo['titles-title-color']['rgba'] ?>;
<?php } ?> 
}

/* Subtitle - Color */
.minigo .minigo-title.small-divider h3,
.minigo .minigo-title.med-divider h3,
.minigo .minigo-title.big-divider h3 {
<?php if( $pt_minigo['titles-subtitle-color']['rgba']) { ?>
    color: <?php echo $pt_minigo['titles-subtitle-color']['rgba'] ?>;
<?php } ?> 
}

/* Title Divider Color */
.minigo .minigo-title.small-divider h1::after,
.minigo .minigo-title.med-divider h1::after,
.minigo .minigo-title.big-divider h1::after {
<?php if( $pt_minigo['titles-divider-color']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['titles-divider-color']['rgba'] ?>;
<?php } ?> 
}

/* Divider */

.minigo .minigo-divider {
<?php if( $pt_minigo['dividers-color']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['dividers-color']['rgba'] ?>;
<?php } ?>   
}

/* Contact Info - Icons */

<?php if( $pt_minigo['contact-info-color']['rgba']) { ?>
.minigo .contact-info i {
    color: <?php echo $pt_minigo['contact-info-color']['rgba'] ?>;
}
<?php } ?>  
<?php if( $pt_minigo['contact-info-color-hover']['rgba']) { ?>
.minigo .contact-info:hover i {
    color: <?php echo $pt_minigo['contact-info-color-hover']['rgba'] ?>;
}
<?php } ?>  

/* Slider */

.minigo .slick-dots li button:before {
<?php if( $pt_minigo['slider-nav-color']['rgba']) { ?>
    color: <?php echo $pt_minigo['slider-nav-color']['rgba'] ?>;
<?php } ?>
}

.minigo .slick-dots li button:hover:before {
<?php if( $pt_minigo['slider-nav-color-hover']['rgba']) { ?>
    color: <?php echo $pt_minigo['slider-nav-color-hover']['rgba'] ?>;
<?php } ?>
}

.minigo .slick-dots li.slick-active button:before {
<?php if( $pt_minigo['slider-nav-color-active']['rgba']) { ?>
    color: <?php echo $pt_minigo['slider-nav-color-active']['rgba'] ?>;
<?php } ?>
}

.minigo .slick-arrow:before {
<?php if( $pt_minigo['slider-nav-arrow-color']['rgba']) { ?>
    color: <?php echo $pt_minigo['slider-nav-arrow-color']['rgba'] ?>;
<?php } ?>
}

.minigo .slick-arrow:hover:before {
<?php if( $pt_minigo['slider-nav-arrow-color-hover']['rgba']) { ?>
    color: <?php echo $pt_minigo['slider-nav-arrow-color-hover']['rgba'] ?>;
<?php } ?>
}

.minigo .slick-holder {
<?php if( ($pt_minigo['gallery-thumb-border-size'] != null) && $pt_minigo['gallery-thumb-border-color']['rgba']) { ?>
    border: <?php echo $pt_minigo['gallery-thumb-border-size'] ?>px solid <?php echo $pt_minigo['gallery-thumb-border-color']['rgba'] ?>;
<?php } ?>
}

.minigo .slick-holder:hover {
<?php if( $pt_minigo['gallery-thumb-border-color-hover']['rgba']) { ?>
    border: <?php echo $pt_minigo['gallery-thumb-border-size'] ?>px solid <?php echo $pt_minigo['gallery-thumb-border-color-hover']['rgba'] ?>;
<?php } ?>
}

.minigo .slick-holder::after {
<?php if( $pt_minigo['gallery-thumb-background-color']['rgba']) { ?>
    background: <?php echo $pt_minigo['gallery-thumb-background-color-hover']['rgba'] ?>;
<?php } ?>
}

.minigo .slick-holder:hover::after {
<?php if( $pt_minigo['gallery-thumb-background-color-hover']['rgba']) { ?>
    background: <?php echo $pt_minigo['gallery-thumb-background-color-hover']['rgba'] ?>;
<?php } ?>
}

.minigo .slick-holder::after {
<?php if( $pt_minigo['gallery-thumb-background-color']['rgba']) { ?>
    background: <?php echo $pt_minigo['gallery-thumb-background-color-hover']['rgba'] ?>;
<?php } ?>
}

/* Team */

.minigo .team-holder .grid__item .profile-img {
<?php if( $pt_minigo['team-thumb-border-color']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['team-thumb-border-color']['rgba'] ?>;
<?php } ?>  
<?php if( $pt_minigo['team-thumb-background-color']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['team-thumb-background-color']['rgba'] ?>;
<?php } ?> 
}

.minigo .team-holder .grid__item:hover .profile-img {
  <?php if( $pt_minigo['team-thumb-border-color-hover']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['team-thumb-border-color-hover']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['team-thumb-background-color-hover']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['team-thumb-background-color-hover']['rgba'] ?>;
<?php } ?>  
}

/* Progress Bars */

.minigo .progress-bars-holder .progress-bar-value {
<?php if( $pt_minigo['progress-bars-value-color']['rgba']) { ?>
    color: <?php echo $pt_minigo['progress-bars-value-color']['rgba'] ?>;
<?php } ?>   
}

.minigo .progress-bars-holder .progress-bars-progress .progress-bar {
<?php if( $pt_minigo['progress-bars-color']['rgba']) { ?>
    background: <?php echo $pt_minigo['progress-bars-color']['rgba'] ?>;
<?php } ?>   
}

.minigo .progress-bars-holder .progress-bars-progress {
<?php if( $pt_minigo['progress-bars-border-color']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['progress-bars-border-color']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['progress-bars-background-color']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['progress-bars-background-color']['rgba'] ?>;
<?php } ?>
}

/* Testimonials */

.minigo .testimonials-holder .testimonials-container .testimonial-wrapper .testimonial-icon {
<?php if( $pt_minigo['testimonials-icon-color']['rgba']) { ?>
    color: <?php echo $pt_minigo['testimonials-icon-color']['rgba'] ?>;
<?php } ?> 
}

.minigo .testimonials-holder .testimonials-container .testimonial-wrapper:hover .testimonial-icon {
<?php if( $pt_minigo['testimonials-icon-color-hover']['rgba']) { ?>
    color: <?php echo $pt_minigo['testimonials-icon-color-hover']['rgba'] ?>;
<?php } ?> 
}

.minigo .testimonials-holder .testimonials-container .testimonial-wrapper .testimonial-quote::after {
<?php if( $pt_minigo['testimonials-divider-color']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['testimonials-divider-color']['rgba'] ?>;
<?php } ?> 
}

.minigo .testimonials-holder .testimonials-container .testimonial-wrapper:hover .testimonial-quote::after {
<?php if( $pt_minigo['testimonials-divider-color-hover']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['testimonials-divider-color-hover']['rgba'] ?>;
<?php } ?> 
}

.minigo .testimonials-holder .testimonials-container .testimonial-wrapper .testimonial-image {
<?php if( $pt_minigo['testimonials-avatar-border-color']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['testimonials-avatar-border-color']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['testimonials-avatar-background-color']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['testimonials-avatar-background-color']['rgba'] ?>;
<?php } ?> 
}

.minigo .testimonials-holder .testimonials-container .testimonial-wrapper a:hover .testimonial-image {
<?php if( $pt_minigo['testimonials-avatar-border-color-hover']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['testimonials-avatar-border-color-hover']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['testimonials-avatar-background-color-hover']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['testimonials-avatar-background-color-hover']['rgba'] ?>;
<?php } ?> 
}

/*  Map */

.minigo .map-container {
<?php if( $pt_minigo['map-border-color']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['map-border-color']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['map-background-color']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['map-background-color']['rgba'] ?>;
<?php } ?> 
}

.minigo .map-container:hover {
<?php if( $pt_minigo['map-border-color-hover']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['map-border-color-hover']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['map-background-color-hover']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['map-background-color-hover']['rgba'] ?>;
<?php } ?> 
}

/*  Icon Features */

.minigo .icon-features-holder .feature-item .feature-wrapper .feature-icon {
<?php if( $pt_minigo['icon-features-icon-color']['rgba']) { ?>
    color: <?php echo $pt_minigo['icon-features-icon-color']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['icon-features-border-color']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['icon-features-border-color']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['icon-features-background-color']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['icon-features-background-color']['rgba'] ?>;
<?php } ?> 
}

/*  Icon Features - Hover */

.minigo .icon-features-holder .feature-item .feature-wrapper:hover .feature-icon {
<?php if( $pt_minigo['icon-features-icon-color-hover']['rgba']) { ?>
    color: <?php echo $pt_minigo['icon-features-icon-color-hover']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['icon-features-border-color-hover']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['icon-features-border-color-hover']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['icon-features-background-color-hover']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['icon-features-background-color-hover']['rgba'] ?>;
<?php } ?> 
}

/*  Icon List */

.minigo .icon-list-holder .list-item .list-wrapper .list-icon {
<?php if( $pt_minigo['icon-list-icon-color']['rgba']) { ?>
    color: <?php echo $pt_minigo['icon-list-icon-color']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['icon-list-border-color']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['icon-list-border-color']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['icon-list-background-color']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['icon-list-background-color']['rgba'] ?>;
<?php } ?> 
}

/*  Icon List - Hover */

.minigo .icon-list-holder .list-item .list-wrapper:hover .list-icon {
<?php if( $pt_minigo['icon-list-icon-color-hover']['rgba']) { ?>
    color: <?php echo $pt_minigo['icon-list-icon-color-hover']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['icon-list-border-color-hover']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['icon-list-border-color-hover']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['icon-list-background-color-hover']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['icon-list-background-color-hover']['rgba'] ?>;
<?php } ?> 
}

/*  Counter Features - Icon */ 

.minigo .counter-features-holder .counter-feature-item .counter-feature-wrapper .counter-feature-icon {
<?php if( $pt_minigo['counter-features-icon-color']['rgba']) { ?>
    color: <?php echo $pt_minigo['counter-features-icon-color']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['counter-features-border-color']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['counter-features-border-color']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['counter-features-background-color']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['counter-features-background-color']['rgba'] ?>;
<?php } ?> 
}

/* Counter Features - Icon - Hover*/
.minigo .counter-features-holder .counter-feature-item .counter-feature-wrapper:hover .counter-feature-icon {
<?php if( $pt_minigo['counter-features-icon-color-hover']['rgba']) { ?>
    color: <?php echo $pt_minigo['counter-features-icon-color-hover']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['counter-features-border-color-hover']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['counter-features-border-color-hover']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['counter-features-background-color-hover']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['counter-features-background-color-hover']['rgba'] ?>;
<?php } ?> 
}

/* Counter Features - Labels */
.minigo .counter-features-holder .counter-feature-item .counter-feature-wrapper .counter-features-number {
<?php if( $pt_minigo['counter-features-counter-color']['rgba']) { ?>
    color: <?php echo $pt_minigo['counter-features-counter-color']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['base-typo']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['base-typo']['font-family'] ?>;
<?php } ?>
}

/* Counter Features - Numbers */
.minigo .counter-features-holder .counter-feature-item .counter-feature-wrapper .counter-features-number {
<?php if( $pt_minigo['counter-features-counter-color']['rgba']) { ?>
    color: <?php echo $pt_minigo['counter-features-counter-color']['rgba'] ?>;
<?php } ?> 
}

/* Counter Features - Numbers - Hover */
.minigo .counter-features-holder .counter-feature-item .counter-feature-wrapper:hover .counter-features-number {
<?php if( $pt_minigo['counter-features-counter-color-hover']['rgba']) { ?>
    color: <?php echo $pt_minigo['counter-features-counter-color-hover']['rgba'] ?>;
<?php } ?> 
}

/* Countdown */

/* Countdown - Flip Clock Numbers*/
.minigo .clock ul li a {
<?php if( $pt_minigo['countdown-numbers']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['countdown-numbers']['font-family'] ?>;
<?php } ?>
<?php if( $pt_minigo['countdown-numbers']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['countdown-numbers']['font-weight'] ?>;
<?php } ?>
<?php if( $pt_minigo['countdown-numbers-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['countdown-numbers-color']['rgba'] ?>;
<?php } ?>
<?php if( $pt_minigo['countdown-numbers-bg']['rgba'] ) { ?>
    background: <?php echo $pt_minigo['countdown-numbers-bg']['rgba'] ?> ;
<?php } ?>
}

/* Countdown - Flip Clock Label BG*/
.minigo .flip-clock-wrapper ul li a div.up {
<?php if( $pt_minigo['countdown-numbers-border']['border-top'] && $pt_minigo['countdown-numbers-border']['border-left'] && $pt_minigo['countdown-numbers-border']['border-right'] && $pt_minigo['countdown-numbers-border']['border-bottom'] ) { ?>
    border-top-width: <?php echo $pt_minigo['countdown-numbers-border']['border-top'] ?>;
    border-left-width: <?php echo $pt_minigo['countdown-numbers-border']['border-left'] ?>;
    border-right-width: <?php echo $pt_minigo['countdown-numbers-border']['border-right'] ?>;
    border-bottom-width: <?php echo $pt_minigo['countdown-numbers-border']['border-bottom'] ?>;
<?php } ?>
<?php if( $pt_minigo['countdown-numbers-border']['border-style'] ) { ?>
    border-style: <?php echo $pt_minigo['countdown-numbers-border']['border-style'] ?>;
<?php } ?>
<?php if( $pt_minigo['countdown-numbers-border-color']['rgba'] ) { ?>
    border-color: <?php echo $pt_minigo['countdown-numbers-border-color']['rgba'] ?>;
<?php } ?>
}

/* Countdown - Flip Clock Label */
.minigo .clock .flip-clock-label {
<?php if( $pt_minigo['countdown-typo-labels']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['countdown-typo-labels']['font-family'] ?> ;
<?php } ?>
<?php if( $pt_minigo['countdown-typo-labels']['font-weight'] ) { ?>
    font-weight: <?php echo $pt_minigo['countdown-typo-labels']['font-weight'] ?> ;
<?php } ?>
<?php if( $pt_minigo['countdown-labels-color']['rgba'] ) { ?>
    color: <?php echo $pt_minigo['countdown-labels-color']['rgba'] ?> ;
<?php } ?>
}

/* Progress Bar Color */
.minigo .clock-progress::after {
<?php if( $pt_minigo['progress-bar-color']['rgba'] ) { ?>
    background: <?php echo $pt_minigo['progress-bar-color']['rgba'] ?>;
<?php } ?>
}

/* Progress Bar Border Color */
.minigo .clock-progress {
<?php if( $pt_minigo['progress-bar-border']['border-top'] && $pt_minigo['progress-bar-border']['border-left'] && $pt_minigo['progress-bar-border']['border-right'] && $pt_minigo['progress-bar-border']['border-bottom'] ) { ?>
    border-top-width: <?php echo $pt_minigo['progress-bar-border']['border-top'] ?>;
    border-left-width: <?php echo $pt_minigo['progress-bar-border']['border-left'] ?>;
    border-right-width: <?php echo $pt_minigo['progress-bar-border']['border-right'] ?>;
    border-bottom-width: <?php echo $pt_minigo['progress-bar-border']['border-bottom'] ?>;
<?php } ?>
<?php if( $pt_minigo['progress-bar-border']['border-style'] ) { ?>
    border-style: <?php echo $pt_minigo['progress-bar-border']['border-style'] ?>;
<?php } ?>
<?php if( $pt_minigo['progress-bar-border-color']['rgba'] ) { ?>
    border-color: <?php echo $pt_minigo['progress-bar-border-color']['rgba'] ?>;
<?php } ?>
}

/*  Video */

.minigo .video-player {
<?php if( $pt_minigo['video-border-color']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['video-border-color']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['video-background-color']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['video-background-color']['rgba'] ?>;
<?php } ?> 
}

.minigo .video-player:hover {
<?php if( $pt_minigo['video-border-color-hover']['rgba']) { ?>
    border-color: <?php echo $pt_minigo['video-border-color-hover']['rgba'] ?>;
<?php } ?> 
<?php if( $pt_minigo['video-background-color-hover']['rgba']) { ?>
    background-color: <?php echo $pt_minigo['video-background-color-hover']['rgba'] ?>;
<?php } ?> 
}