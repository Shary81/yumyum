<?php
// Include Variables
require_once 'vars.php';





// TEMPLATE Starts Here

?><!doctype html>
<!--[if lt IE 9]>      <html class="no-js lt-ie9 lt-ie10"> <![endif]-->
<!--[if lt IE 10]>     <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo htmlspecialchars($pt_minigo["site-title"])?></title>

        <meta name="title" content="<?php echo $meta_title; ?>">
        <meta name="description" content="<?php echo $meta_description; ?>">
        <meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1, initial-scale=1, minimum-scale=1" />

        <link rel="shortcut icon" href="<?php echo $pt_minigo['favicon']['url']?>">

        <link rel="stylesheet" href="<?php echo plugins_url( 'styles/loader.min.css' , __FILE__ )?>"/>
        <link rel="stylesheet" href="<?php echo plugins_url( 'styles/custom.css' , __FILE__ )?>"/>
        <?php if($pt_minigo['load-other-assets']) { ?>

        <?php if (!wp_script_is( 'jquery', 'registered')) { ?>
        <!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
        <!--[if gt IE 8]><!--><script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script><!--<![endif]-->
        <?php } ?>
        <?php
            if($pt_minigo['strip-theme-assets']) {
                ob_flush();
                ob_start();
                wp_head();

                $minigo_head = preg_replace('/<link.*?href=.*?wp-content\/themes\/.*?\/?>|<script.*?src=.*?wp-content\/themes\/.*?<\/script>/i', '', ob_get_clean());

                $minigo_head = preg_replace('/<style.*?>.*?<\/style>/im', '', $minigo_head);

                echo $minigo_head;
            } else {
                wp_head();
            }

        }
        ?>

        <link rel="stylesheet" href="<?php echo plugins_url( 'styles/main.min.css' , __FILE__ )?>"/>
        <link rel="stylesheet" href="<?php echo plugins_url( 'dynamic.php' , __FILE__ )?>"/>

        <script src="<?php echo plugins_url( 'scripts/modernizr.custom.min.js' , __FILE__ )?>"></script>

        <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">

        <script src="//ajax.googleapis.com/ajax/libs/webfont/1.5.10/webfont.js"></script>
        <script>
        WebFont.load({
            google: {
                families: [<?php echo $embed_fonts ?>]
            }
        });
        </script>

        <!--[if lte IE 8]>
        <script src="<?php echo plugins_url( 'scripts/respond.min.js' , __FILE__ )?>"></script>
        <![endif]-->

        <script>
            var miniGoOptions = {
                
                loader: {
                    // Loader Animation Color: #hex or rgba()
                    loaderAnimationColor: '<?php echo $pt_minigo["loader-animation-color"]["rgba"] ?>',
                    // Loader Background Color: #hex or rgba()
                    loaderBackgroundColor: '<?php echo $pt_minigo["loader-background-color"]["rgba"] ?>',
                    // If you want the content to animate in after loading, set to true otherwise false
                    loaderAnimatedIntro: <?php echo $pt_minigo["animated-intro"] == '1' ? "true" : "false" ?>,
                    // To add a gradient to the Loader background you have to fill all 'loaderGradient' fields
                    loaderGradient: {
                        // Color in hex format '#000000', leave all empty for no gradient.
                        color1: '<?php echo $pt_minigo["gradient-loader"] == "1" ? $pt_minigo["gradient-loading-backgrounds"]["from"] : "" ?>',
                        // Color in hex format '#ffffff'
                        color2: '<?php echo $pt_minigo["gradient-loader"] == "1" ? $pt_minigo["gradient-loading-backgrounds"]["to"] : "" ?>',
                        // Gradient angle for example: '270'
                        angle: '<?php echo $pt_minigo["gradient-loader"] == "1" ? $pt_minigo["gradient-loader-color-degree"] : "" ?>',
                    },

                },

                navigation: {
                    // Use hashtag urls like #contact, true or false
                    hashUrls: <?php echo $pt_minigo['hash-url'] == '1'? "true" : "false" ?>,
                    // Choose the navigation type, '3d' or 'one-page'
                    navType: '<?php echo $pt_minigo["navigation-type"] ?>',

                    // Options for all Nav Style are the following or leave '' empty for defaults
                    // 'huge', 'large', 'medium', 'small', 'text', 'tablet', 'mobile', 'expanding', 'hide'
                    // Choose the main navigation style
                    navStyle: '<?php echo $pt_minigo["navigation-style"] ?>',
                    // Choose the tablet navigation style ex.
                    navStyleTablet: '<?php echo $pt_minigo["navigation-style-tablet"] ?>',
                    // Choose the mobile navigation style
                    navStyleMobile: '<?php echo $pt_minigo["navigation-style-mobile"] ?>',
                    
                    // Navigation Button Style: 'circle', 'square', 'rounded', 'none' for no Button Background.
                    navButtonStyle : '<?php echo $pt_minigo["nav-button-style"] ?>',
                    // Navigation Button Labels display: 'always', 'hover', 'never' for no Button Labels.
                    navShowLabels : '<?php echo $pt_minigo["navigation-labels"] ?>',

                    // Experimental, adapts the menu style to the device for best fit. true or false
                    adaptiveNavStyle: <?php echo $pt_minigo["navigation-adaptive-style"] == '1' ? "true" : "false" ?>,
                    // Turn responsive behavior on or off. true (recommended) or false
                    responsiveNav: <?php echo $pt_minigo["navigation-responsive"] == '1' ? "true" : "false" ?>,

                    // Navigation position 'top', 'middle' or 'bottom'
                    navPosition: '<?php echo $pt_minigo["navigation-position"] ?>',
                    // Navigation align 'left', 'center', 'right' or 'default' for left and right
                    navAlign: '<?php echo $pt_minigo["navigation-align"] ?>',
                    // Navigation orientation 'vertical' or 'horizontal'
                    navOrientation: '<?php echo $pt_minigo["navigation-orientation"] ?>',
                    // toTop Button Position (One Page): 'top-left', 'top-right', 'bottom-left', 'bottom-right' or 'none' to hide
                    toTopPosition: '<?php echo $pt_minigo["to-top-position"] ?>',                    
                    
                    // Show Navigation Backgound if you enter a rgba or #hex value, '' for no Nav Background (default)
                    navBarBG: <?php echo $pt_minigo["menu-background-color"]["alpha"] == '0' ? "''" : "'" . $pt_minigo["menu-background-color"]["rgba"] . "'" ?>,
                    // Navigation background in Mobile view: '#hex' or 'rgba()'. Leave '' for none.
                    navBarBGMobile: <?php echo $pt_minigo["menu-background-color-mobile"]["alpha"] == '0' ? "''" : "'" . $pt_minigo["menu-background-color-mobile"]["rgba"] . "'" ?>
                },

                footer: {
                    // Show icon links in the footer: 'all', 'mobile', 'desktop'
                    showFooterLinks: <?php echo $pt_minigo["footer-show"] == '1' ? "true" : "false" ?>,
                    // You can choose to display the footer on 'all', 'desktop' only or 'mobile' only.
                    footerVisibility: '<?php echo $pt_minigo["footer-show"] == "1" ? $pt_minigo["footer-visibility"] : "" ?>',

                    // Set links size: 'small', 'medium', 'large'
                    footerLinksSize: '<?php echo $pt_minigo["footer-size"] ?>',
                    // If enabled, aligns footer links: 'top-left', 'middle-center', 'bottom-left' etc.
                    footerLinksPosition: '<?php echo $pt_minigo["footer-vertical-position"] . "-" . $pt_minigo["footer-horizontal-align"]  ?>',
                    // Set links style: 'horizontal', 'vertical'
                    footerOrientation: '<?php echo $pt_minigo["footer-orientation"] ?>',

                    // Icon Button Style: 'circle', 'square', 'rounded', 'none' for no Button Background.
                    iconButtonStyle : '<?php echo $pt_minigo["icon-button-style"] ?>',
                    // Icon Button Text Label #hex or rgba(), leave '' empty for none
                    iconButtonLabelBackground : '<?php echo $pt_minigo["icon-button-label-background-color"]["rgba"] ?>',

                    // Changes the color of the footer background: '#hex' or 'rgba()'. Leave '' for none.
                    footerBarBG: <?php echo $pt_minigo["footer-background-color"]["alpha"] == '0' ? "''" : "'" . $pt_minigo["footer-background-color"]["rgba"] . "'" ?>,
                    // Footer background in Mobile view: '#hex' or 'rgba()'. Leave '' for none.
                    footerBarBGMobile: <?php echo $pt_minigo["footer-background-color-mobile"]["alpha"] == '0' ? "''" : "'" . $pt_minigo["footer-background-color-mobile"]["rgba"] . "'" ?>,
                },

                pages: {
                    // You can adjust your website width, ex: '800px' or '100vw' for 100% of the viewport
                    pageWidth: '<?php echo $contentWidth?>',
                    // Page Alignment: 'left', 'center', 'right', leave '' empty for default
                    pageAlign: '<?php echo $pageAlign ?>',
                    // Page Text Alignment: 'left', 'center', 'right', leave '' empty for default
                    pageTextAlign: '<?php echo $pageTextAlign ?>',
                    // Enable Right to Left content
                    enableRTL: <?php echo $pt_minigo['rtl-switch'] == '1'? "true" : "false" ?>,

                    // Page Margins: top, right, bottom, left. Leave empty or use auto for a value to keep default. ex. '30px, auto, 10%, 2em'
                    pageMargins: <?php echo "'" . $pageMargins . "'"  ?>,
                    // Page Paddings: top, right, bottom, left. Leave empty or use auto for a value to keep default. ex. '30px, auto, 10%, 2em'
                    pagePaddings: <?php echo "'" . $pagePaddings . "'"  ?>,
                    // Force pages to take up the entire viewport height: true or false
                    pagesFullHeight: <?php echo $pt_minigo['page-full-height'] == '1'? "true" : "false" ?>,

                    // Page Background Color: #hex or rgba(), leave empty '' for none
                    pageBackground: '<?php echo $contentBG?>',
                    // Page Background Border Radius, px or % ex. '12px'. '0' for square corners
                    pageBorderRadius: <?php echo $pt_minigo["pages-background"] == '0' ? "''" : "'" . $pt_minigo["pages-border-radius"]["width"] . "'" ?>,
                    // Page Border Size in pixels eg '2px' , leave '' blank for no border
                    pageBorderSize: '<?php echo $borderSize ?>',
                    // Page Border Style: 'none' 'solid' 'dashed' 'dotted' 'double'
                    pageBorderStyle: '<?php echo $borderStyle ?>',
                    // Page Border Color #hex or rgba(), leave '' blank for none
                    pageBorderColor: '<?php echo $borderColor ?>',
                },

                countdown: {
                    // Possible options are 'default' or 'piechart'
                    type: '<?php echo $pt_minigo["countdown-type"]?>',
                    // The date when the countdown started. Used by the progress bars. 24 Hour format (00 to 23): MM/DD/YYYY HR:MN
                    startDate: new Date('<?php echo $pt_minigo["countdown-startDate"] .' '.$pt_minigo["countdown-startHour"].':'.$pt_minigo["countdown-startMinutes"] ?>'),
                    // The target date and time we're counting down to. 24 Hour format (00 to 23): MM/DD/YYYY HR:MN
                    targetDate: new Date('<?php echo $pt_minigo["countdown-targetDate"] . ' '.$pt_minigo["countdown-targetHour"].':'.$pt_minigo["countdown-targetMinutes"] ?>')
                },

                background: {
                    // Main background color
                    color: '<?php echo $pt_minigo["background-color"]?>',
                    // Possible options are 'slideshow' or 'video'. Enter '' if no slideshow/video is desired as background.
                    type: '<?php echo $backgroundType?>',
                    // If you want to use gradients you have to fill all 'gradientLoader' fields
                    gradientBackground: {
                        // Color in hex format '#000000'
                        bgColor1: '<?php echo $pt_minigo["gradient-color-switch"] == "1" ? $pt_minigo["gradient-color"]["from"] : "" ?>',
                        // Color in hex format '#ffffff'
                        bgColor2: '<?php echo $pt_minigo["gradient-color-switch"] == "1" ? $pt_minigo["gradient-color"]["to"] : "" ?>',
                        // Gradient angle for example: '270'
                        bgAngle: '<?php echo $pt_minigo["gradient-color-switch"] == "1" ? $pt_minigo["gradient-color-degree"] : "" ?>',
                        // Tweak gradient opacity from '0' to '1'
                        opacity: '<?php echo $pt_minigo["gradient-color-switch"] == "1" ? $pt_minigo["gradient-opacity"] : "" ?>'
                    },
                    // To add a pattern overlay on top of the main Background, fill in the following pattern fields
                    pattern : {
                        // Path to pattern overlay or empty if not needed. Use '' for empty.
                        patternOverlay: '<?php echo $pattern?>',
                        // Sets the opacity of the pattern overlay. 0 is completely transparent, 1.0 is fully opaque.
                        patternOverlayOpacity: <?php echo $pt_minigo["background-pattern-opacity"]?>,
                    },
                    // To add a JavaScript animation overlay on top of the main Background, fill in the following animation fields
                    animation: {
                        // Possible options are 'snow' or 'confetti', leave empty '' if you don't want background animation
                        backgroundAnimation: '<?php echo $animation_name ?>',
                        // Change the opacity of the animation from 0 to 1 ex. 0.6
                        animationOpacity: <?php echo $pt_minigo["js-animation-opacity"] ?>
                    },
                    // If you selected a slideshow main background, set the options below
                    slideshow: {
                        // Type of transition effect. Possible options are 'kenburns', 'fade' or 'continuousFade'.
                        type: '<?php echo $slideshowType?>',
                        // Time in seconds between image changes
                        duration: <?php echo $pt_minigo['background-slideshow-duration']?>,

                        // Ken Burns animation settings
                        kenburns: {
                            // Minimum and maximum scale of the image. It will be randomized for every frame.
                            minScale: <?php echo $pt_minigo['background-slideshow-kenburns-minScale']?>,
                            maxScale: <?php echo $pt_minigo['background-slideshow-kenburns-maxScale']?>,
                            // Minimum and maximum movement of the image, in percent. It will be randomized for every frame. Note that this is also limited by the scale because the image needs to stay within the viewport.
                            minMove: <?php echo $pt_minigo['background-slideshow-kenburns-minMove']?>,
                            maxMove: <?php echo $pt_minigo['background-slideshow-kenburns-maxMove']?>
                        }
                    },
                    // If you selected a video main background, set the options below
                    video: {
                        // Possible options are 'local' or 'youtube'
                        source: '<?php echo $videoSource?>',
                        // Fallback image for browsers that can't play video
                        imageFallback: '<?php echo $pt_minigo["background-video-imageFallback"]["url"]?>',
                        // Sets the volume of the video. Value range 0 to 100.
                        volume: <?php echo $pt_minigo['background-video-volume']?>,
                        // Loop video after it finishes playing, true or false.
                        loop: <?php echo $pt_minigo['background-video-loop'] == '1'? "true" : "false" ?>,

                        // Configure the video files if you selected 'local' as video source
                        localFiles: {
                            // H.264 (mp4) video format file. This one is required because we use it to fall back to Flash playback when HTML5 video support is missing. For example, Firefox only supports this format on Windows so on other systems it will fallback to Flash playback which is a bit slower.
                            mp4: '<?php echo $pt_minigo["background-video-mp4"]["url"]?>',
                            // Optional. WebM files are generally smaller and faster than H.264 and are played by Chrome, Firefox, Opera and Android browsers (which also support H.264)
                            webm: '<?php echo $pt_minigo["background-video-webm"]["url"]?>',
                            // Optional. OGG Video is optional but useful because it's played natively by Firefox on OSX and Linux. Enter '' if you don't have this format.
                            ogg: '<?php echo $pt_minigo["background-video-ogg"]["url"]?>',
                        },

                        youtube: {
                            // Enter the URL of the Video or Playlist
                            url: '<?php echo $pt_minigo["background-youtube-url"]?>',

                            // The options below allow you to play only a part of a video. For playlists it will only work for the first video.
                            // If you dont't want the video to start from the very beginning, enter the time offset in seconds.
                            startAt: <?php echo empty($pt_minigo["background-youtube-startAt"]) ? 0 : $pt_minigo["background-youtube-startAt"]?>,
                            // If you dont't want the video to end at the very end, enter the time offset FROM THE BEGINNING of the video, in seconds. Otherwise leave it at 0.
                            endAt: <?php echo empty($pt_minigo["background-youtube-endAt"]) ? 0 : $pt_minigo["background-youtube-endAt"]?>,
                        },
                        vimeo: {
                            // Enter ID of your video
                            url: '<?php echo $pt_minigo["background-vimeo-url"]?>'
                        }
                    }
                },

                audio: {
                    // Source for your audio file, ex. http://website.com/audioFileName.mp3. Leave '' empty for no audio
                    src: '<?php echo $audio; ?>',
                    // Sets the audio volume. Value range 0 to 1.
                    volume: <?php echo $pt_minigo["audio-volume"]; ?>,
                    // Set to true if you want the track to loop once it's finished playing, false if you don't
                    loop: <?php echo $pt_minigo["audio-loop"] == "1" ? "true" : "false" ?>,
                    // Set to true to start playing automatically on load, false if you don't
                    autoPlay: <?php echo $pt_minigo["audio-autoplay"] == "1" ? "true" : "false" ?>, 
                    // Set to true if you want the play/pause button to show up, false if you don't
                    displayControls: <?php echo $pt_minigo["audio-controls"] == "1" ? "true" : "false" ?>,
                    // Set the name of the track, this appears on hovering the play/pause button. Optional.
                    trackName: '<?php echo htmlspecialchars($pt_minigo["track-name"]) ?>'
                },

                map: {
                  // Option for displaying the Google map, true or false
                  showMap: <?php echo $pt_minigo["map-switcher"] == "1" ? "true" : "false" ?>,
                  // Longitude(first) and Latitude(second), you can find your coordinates here -> http://universimmedia.pagesperso-orange.fr/geo/loc.htm
                  coordinates: '<?php echo $pt_minigo["map-latitude"] ?>, <?php echo $pt_minigo["map-longitude"] ?>',
                  // Style of the map, 'custom' or 'normal'
                  mapStyle: '<?php echo $pt_minigo["map-style"] ?>',
                  // Allow map dragging?
                  allowDrag: <?php echo $pt_minigo["map-allow-drag"] == "1" ? "true" : "false" ?>,
                  // Initial zoom value
                  zoomLevel: <?php echo $pt_minigo["map-zoom-level"] ?>,
                  // zoomLevel: <?php echo $pt_minigo["map-zoom-level"] == "1" ? "true" : "false" ?>,
                  // Allow scroll wheel zoom? (requires zoom : true)
                  wheelZoom: <?php echo $pt_minigo["map-wheel-zoom"] == "1" ? "true" : "false" ?>,
                  // Show zoom in/out buttons?
                  buttonZoom: <?php echo $pt_minigo["map-button-zoom"] == "1" ? "true" : "false" ?>,
                  // Show map type controls?
                  mapType: <?php echo $pt_minigo["map-type"] == "1" ? "true" : "false" ?>,
                  // Show Street View Controls?
                  streetView: <?php echo $pt_minigo["map-street-view"] == "1" ? "true" : "false" ?>,
                  // Path to the map marker icon to be displayed
                  marker: '<?php echo $pt_minigo["map-marker"]["url"];?>',
                  // Map Height in px
                  mapHeight: '<?php echo $pt_minigo["map-height"] ?>'
                },

                gallery: {
                    // Set to false if you don't want to show images in the lightbox on click
                    openImagesInLightbox: <?php echo $pt_minigo["open-images-in-lightbox"] == "1" ? "true" : "false" ?>,
                    // Shows or hides navigation dots. Possible options: true/false
                    dots: <?php if($pt_minigo["show-gallery-dots"]){ echo "true";} else{ echo "false";} ?>,
                    <?php if(!$pt_minigo["show-gallery-dots"]){
                        echo "noDots: true,"."\n";
                    } ?>
                    // Shows or hides navigation arrows
                    arrows: <?php echo $pt_minigo["show-gallery-left-right-arrows"] == "1" ? "true" : "false" ?>,
                    // If set will show custom carousel paging e.g. by default it shows number instead of dots
                    <?php if($pt_minigo["show-gallery-numbers"]){ ?>

                        customPaging : function(slider, i) {
                        return '<a>'+(i+1)+'</a>';
                        },

                    <?php } ?>
                    // Number of rows to show in the carousel
                    rows: <?php echo $pt_minigo["gallery-rows"] ?>,
                    // Defines the speed of carousel slide
                    speed: <?php echo $pt_minigo["slides-scroll-speed"] ?>,
                    // If set the carousel will always be slid to first slide if no slide left
                    infinite: <?php echo $pt_minigo["gallery-infinite-scroll"] == "1" ? "true" : "false" ?>,
                    // Active slide will be centered if true, cover carousel look
                    centerMode: <?php echo $pt_minigo["gallery-centermode"] == "1" ? "true" : "false" ?>,
                    // How many slides per row
                    slidesToShow: <?php echo $pt_minigo["gallery-cols"] ?>,
                    // How many slides to scroll on slide left or right mostly equals to slidesToShow 
                    slidesToScroll: <?php echo $pt_minigo["slides-to-scroll"] ?>,
                    // prevArrow: '',
                    // nextArrow: '',
                    autoplay: <?php echo $pt_minigo["gallery-autoplay"] == true ? "true" : "false" ?>,
                    autoplaySpeed: <?php echo $pt_minigo["gallery-autoplay-speed"] ?>,
                    responsive: [
                        {
                          breakpoint: <?php echo $pt_minigo["gallery-break-1-width"] ?>,
                          settings: {
                            slidesToShow: <?php echo $pt_minigo["gallery-break-1-slides"] ?>,
                            slidesToScroll: <?php echo $pt_minigo["gallery-break-1-slides-to-scroll"] ?>,
                          }
                        },
                        {
                          breakpoint: <?php echo $pt_minigo["gallery-break-2-width"] ?>,
                          settings: {
                            slidesToShow: <?php echo $pt_minigo["gallery-break-2-slides"] ?>,
                            slidesToScroll: <?php echo $pt_minigo["gallery-break-2-slides-to-scroll"] ?>,
                          }
                        },
                        {
                          breakpoint: <?php echo $pt_minigo["gallery-break-3-width"] ?>,
                          settings: {
                            slidesToShow: <?php echo $pt_minigo["gallery-break-3-slides"] ?>,
                            slidesToScroll: <?php echo $pt_minigo["gallery-break-3-slides-to-scroll"] ?>,
                          }
                        },
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                      ]
                },

                testimonials: {
                    // Set to false if you don't want to show images in the lightbox on click
                    // openImagesInLightbox: <?php echo $pt_minigo["open-images-in-lightbox"] == "1" ? "true" : "false" ?>,
                    // Shows or hides navigation dots. Possible options: true/false
                    dots: <?php echo $pt_minigo["testimonials-show-dots"] == "1" ? "true" : "false" ?>,
                    <?php if(!$pt_minigo['testimonials-show-dots']){
                        echo "noDots: true,"."\n";
                    } ?>
                    // Shows or hides navigation arrows
                    arrows: <?php echo $pt_minigo["testimonials-show-arrows"] == "1" ? "true" : "false" ?>,
                    // If set will show custom carousel paging e.g. by default it shows number instead of dots
                    <?php if($pt_minigo["show-gallery-numbers"]){ ?>

                        customPaging : function(slider, i) {
                        return '<a>'+(i+1)+'</a>';
                        },

                    <?php } ?>
                    // Number of rows to show in the carousel
                    rows: <?php echo $pt_minigo["testimonials-rows"] ?>,
                    // Defines the speed of carousel slide
                    speed: <?php echo $pt_minigo["testimonials-slides-scroll-speed"] ?>,
                    // If set the carousel will always be slid to first slide if no slide left
                    infinite: <?php echo $pt_minigo["testimonials-infinite-scroll"] == "1" ? "true" : "false" ?>,
                    // Active slide will be centered if true, cover carousel look
                    centerMode: <?php echo $pt_minigo["testimonials-centermode"] == "1" ? "true" : "false" ?>,
                    // How many slides per row
                    slidesToShow: <?php echo $pt_minigo["testimonials-cols"] ?>,
                    // How many slides to scroll on slide left or right mostly equals to slidesToShow 
                    slidesToScroll: <?php echo $pt_minigo["testimonials-slides-to-scroll"] ?>,
                    // prevArrow: '',
                    // nextArrow: '',
                    autoplay: <?php echo $pt_minigo["testimonials-autoplay"] == true ? "true" : "false" ?>,
                    autoplaySpeed: <?php echo $pt_minigo["testimonials-autoplay-speed"] ?>,
                    responsive: [
                        {
                          breakpoint: <?php echo $pt_minigo["testimonials-break-1-width"] ?>,
                          settings: {
                            slidesToShow: <?php echo $pt_minigo["testimonials-break-1-slides"] ?>,
                            slidesToScroll: <?php echo $pt_minigo["testimonials-break-1-slides-to-scroll"] ?>,
                          }
                        },
                        {
                          breakpoint: <?php echo $pt_minigo["testimonials-break-2-width"] ?>,
                          settings: {
                            slidesToShow: <?php echo $pt_minigo["testimonials-break-2-slides"] ?>,
                            slidesToScroll: <?php echo $pt_minigo["testimonials-break-2-slides-to-scroll"] ?>,
                          }
                        },
                        {
                          breakpoint: <?php echo $pt_minigo["testimonials-break-3-width"] ?>,
                          settings: {
                            slidesToShow: <?php echo $pt_minigo["testimonials-break-3-slides"] ?>,
                            slidesToScroll: <?php echo $pt_minigo["testimonials-break-3-slides-to-scroll"] ?>,
                          }
                        },
                      ]
                }
            }

            var minigoSwfURLPrefix = '<?php echo plugins_url( '' , __FILE__ ).'/'?>';
        </script>

        <style><?php echo $pt_minigo["custom-css"]?></style>

        <?php if( !empty($pt_minigo["analytics-code"]) ) { ?>
            <script>
                (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
                function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
                e=o.createElement(i);r=o.getElementsByTagName(i)[0];
                e.src='//www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
                ga('create','<?php echo $pt_minigo["analytics-code"] ?>');ga('send','pageview');
            </script>
        <?php } ?>

    </head>

    <body class="minigo">
            <div class="loader">
        	<?php if($pt_minigo["logo-on-loading"] == 1 && (!empty($pt_minigo['logo']['url']) || !empty($pt_minigo['loader-logo']['url'])) ) { ?>
                <?php if ( ($pt_minigo["loader-logo-switcher"] == 'custom') && !empty($pt_minigo['loader-logo']['url']) ) {?>
            <img class="loader-logo" src="<?php echo $pt_minigo["loader-logo"]["url"]?>" alt="<?php echo htmlspecialchars($pt_minigo["site-title"])?>" width="<?php echo $pt_minigo["loader-logo-width"]?>" height="<?php echo $pt_minigo["loader-logo-height"]?>">
                <?php } else {?>
            <img class="loader-logo" src="<?php echo $pt_minigo["logo"]["url"]?>" alt="<?php echo htmlspecialchars($pt_minigo["site-title"])?>" width="<?php echo $pt_minigo["logo-width"]?>" height="<?php echo $pt_minigo["logo-height"]?>">
                <?php } ?>
            <?php } ?>
            <div class="loader-animation bubblingG">
                <span id="bubblingG_1"></span>
                <span id="bubblingG_2"></span>
                <span id="bubblingG_3"></span>
            </div>
        </div>

        <div class="site-wrapper">
            <?php if($pt_minigo["page-1-enabled"]) { ?>
            <div id="<?php if( !empty($pt_minigo["page-1-title"]) ) { echo cleanString($pt_minigo["page-1-title"]); } else { echo 'page-1'; } ?>"class="site-page site-front site-page--active">
                <?php if($pt_minigo["page-1-title-show"]) { ?>
                <h1><?php echo $pt_minigo["page-1-title"]?></h1>
                <?php } ?>
                <?php echo apply_filters( shortcode_unautop('the_content'), $pt_minigo["page-1-content"]);?>
            </div>
            <?php } else {?>
            <div id="<?php if( !empty($pt_minigo["page-1-title"]) ) { echo cleanString($pt_minigo["page-1-title"]); } else { echo 'page-1'; } ?>"class="site-page site-front site-page--active site-page--hidden">
            </div>
            <?php } ?>
          
            <?php if($pt_minigo["page-2-enabled"]) { ?>
            <div id="<?php if( !empty($pt_minigo["page-2-title"]) ) { echo cleanString($pt_minigo["page-2-title"]); } else { echo 'page-2'; } ?>" class="site-page site-page--from-left">
                <?php if(!empty($pt_minigo["page-2-title"])) { ?>
                <h1><?php echo $pt_minigo["page-2-title"]?></h1>
                <?php } ?>
                <?php echo apply_filters( shortcode_unautop('the_content'), $pt_minigo["page-2-content"]);?>
            </div>
            <?php } ?>

            <?php if($pt_minigo["page-3-enabled"]) { ?>
            <div id="<?php if( !empty($pt_minigo["page-3-title"]) ) { echo cleanString($pt_minigo["page-3-title"]); } else { echo 'page-3'; } ?>" class="site-page site-page--from-left">
                <?php if(!empty($pt_minigo["page-3-title"])) { ?>
                <h1><?php echo $pt_minigo["page-3-title"]?></h1>
                <?php } ?>
                <?php echo apply_filters( shortcode_unautop('the_content'), $pt_minigo["page-3-content"]);?>
            </div>
            <?php } ?>

            <?php if($pt_minigo["page-4-enabled"]) { ?>
            <div id="<?php if( !empty($pt_minigo["page-4-title"]) ) { echo cleanString($pt_minigo["page-4-title"]); } else { echo 'page-4'; } ?>" class="site-page site-page--from-left">
                <?php if(!empty($pt_minigo["page-4-title"])) { ?>
                <h1><?php echo $pt_minigo["page-4-title"]?></h1>
                <?php } ?>
                <?php echo apply_filters( shortcode_unautop('the_content'), $pt_minigo["page-4-content"]);?>
            </div>
            <?php } ?>

            <?php if($pt_minigo["page-5-enabled"]) { ?>
            <div id="<?php if( !empty($pt_minigo["page-5-title"]) ) { echo cleanString($pt_minigo["page-5-title"]); } else { echo 'page-5'; } ?>" class="site-page site-page--from-left">
                <?php if(!empty($pt_minigo["page-5-title"])) { ?>
                <h1><?php echo $pt_minigo["page-5-title"]?></h1>
                <?php } ?>
                <?php echo apply_filters( shortcode_unautop('the_content'), $pt_minigo["page-5-content"]);?>
            </div>
            <?php } ?>

            <?php if($pt_minigo["page-6-enabled"]) { ?>
            <div id="<?php if( !empty($pt_minigo["page-6-title"]) ) { echo cleanString($pt_minigo["page-6-title"]); } else { echo 'page-6'; } ?>" class="site-page site-page--from-left">
                <?php if(!empty($pt_minigo["page-6-title"])) { ?>
                <h1><?php echo $pt_minigo["page-6-title"]?></h1>
                <?php } ?>
                <?php echo apply_filters( shortcode_unautop('the_content'), $pt_minigo["page-6-content"]);?>
            </div>
            <?php } ?>

            <?php if($pt_minigo["page-7-enabled"]) { ?>
            <div id="<?php if( !empty($pt_minigo["page-7-title"]) ) { echo cleanString($pt_minigo["page-7-title"]); } else { echo 'page-7'; } ?>" class="site-page site-page--from-left">
                <?php if(!empty($pt_minigo["page-7-title"])) { ?>
                <h1><?php echo $pt_minigo["page-7-title"]?></h1>
                <?php } ?>
                <?php echo apply_filters( shortcode_unautop('the_content'), $pt_minigo["page-7-content"]);?>
            </div>
            <?php } ?>

            <?php if($pt_minigo["page-8-enabled"]) { ?>
            <div id="<?php if( !empty($pt_minigo["page-8-title"]) ) { echo cleanString($pt_minigo["page-8-title"]); } else { echo 'page-8'; } ?>" class="site-page site-page--from-right">
                <?php if(!empty($pt_minigo["page-8-title"])) { ?>
                <h1><?php echo $pt_minigo["page-8-title"]?></h1>
                <?php } ?>
                <?php echo apply_filters( 'the_content', $pt_minigo["page-8-content"]);?>
            </div>
            <?php } ?>

            <?php if($pt_minigo["page-9-enabled"]) { ?>
            <div id="<?php if( !empty($pt_minigo["page-9-title"]) ) { echo cleanString($pt_minigo["page-9-title"]); } else { echo 'page-9'; } ?>" class="site-page site-page--from-right">
                <?php if(!empty($pt_minigo["page-9-title"])) { ?>
                <h1><?php echo $pt_minigo["page-9-title"]?></h1>
                <?php } ?>
                <?php echo apply_filters( 'the_content', $pt_minigo["page-9-content"]);?>
            </div>
            <?php } ?>

            <?php if($pt_minigo["page-10-enabled"]) { ?>
            <div id="<?php if( !empty($pt_minigo["page-10-title"]) ) { echo cleanString($pt_minigo["page-10-title"]); } else { echo 'page-10'; } ?>" class="site-page site-page--from-right">
                <?php if(!empty($pt_minigo["page-10-title"])) { ?>
                <h1><?php echo $pt_minigo["page-10-title"]?></h1>
                <?php } ?>
                <?php echo apply_filters( 'the_content', $pt_minigo["page-10-content"]);?>
            </div>
            <?php } ?>

            <?php if($pt_minigo["page-11-enabled"]) { ?>
            <div id="<?php if( !empty($pt_minigo["page-11-title"]) ) { echo cleanString($pt_minigo["page-11-title"]); } else { echo 'page-11'; } ?>" class="site-page site-page--from-right">
                <?php if(!empty($pt_minigo["page-11-title"])) { ?>
                <h1><?php echo $pt_minigo["page-11-title"]?></h1>
                <?php } ?>
                <?php echo apply_filters( 'the_content', $pt_minigo["page-11-content"]);?>
            </div>
            <?php } ?>

            <?php if($pt_minigo["page-12-enabled"]) { ?>
            <div id="<?php if( !empty($pt_minigo["page-12-title"]) ) { echo cleanString($pt_minigo["page-12-title"]); } else { echo 'page-12'; } ?>" class="site-page site-page--from-right">
                <?php if(!empty($pt_minigo["page-12-title"])) { ?>
                <h1><?php echo $pt_minigo["page-12-title"]?></h1>
                <?php } ?>
                <?php echo apply_filters( 'the_content', $pt_minigo["page-12-content"]);?>
            </div>
            <?php } ?>

            <?php if($pt_minigo["page-13-enabled"]) { ?>
            <div id="<?php if( !empty($pt_minigo["page-13-title"]) ) { echo cleanString($pt_minigo["page-13-title"]); } else { echo 'page-13'; } ?>" class="site-page site-page--from-right">
                <?php if(!empty($pt_minigo["page-13-title"])) { ?>
                <h1><?php echo $pt_minigo["page-13-title"]?></h1>
                <?php } ?>
                <?php echo apply_filters( 'the_content', $pt_minigo["page-13-content"]);?>
            </div>
            <?php } ?>

        </div>

		<?php
		function minigo_footer_links() {
			global $pt_minigo;

		    if(empty($pt_minigo["icon_menu"]) || count($pt_minigo["icon_menu"]) < 1) {
		        return;
		    }

		    $contact_info = array_values($pt_minigo["icon_menu"]);

		    if(empty($pt_minigo["icon_menu"][0]["title"])) {
		        return;
		    }

		    $html = '<div class="nav-social">';

            // var_dump($pt_minigo[''])
            // USE SHORTCODE HERE!!

		    for ($i=0, $cnt = count($contact_info); $i < $cnt; $i++) {
		        $item = $contact_info[$i];

                // $html .= '<a '.(!empty($item['new_window']) ? 'target="_blank"' : '').'href="'.$item['url'].'" title="'.htmlspecialchars($item['title']).'"><i class="fa '.$item['select'].'"></i><span class="pt-label nav-social-label">'.$item['title'].'</span></a>'."\n";
		        $html .= '<a '.(!empty($item['new_window']) ? 'target="_blank"' : '').'href="'.$item['url'].'" title="'.htmlspecialchars($item['title']).'"><i class="fa '.$item['select'].'"></i></a>'."\n";
		    }

		    return $html.'</div>';
		}
		echo minigo_footer_links();
		?>

        <div class="navigation">
        <div class="nav-left">
		<?php if($pt_minigo["page-2-enabled"] || $pt_minigo["page-3-enabled"] || $pt_minigo["page-4-enabled"] || $pt_minigo["page-5-enabled"] || $pt_minigo["page-6-enabled"] || $pt_minigo["page-7-enabled"]) { ?>
            <?php  if($pt_minigo["page-1-enabled"] && $pt_minigo["page-1-nav"] ) { ?>
            <a href="#<?php if( !empty($pt_minigo["page-1-title"]) ) { echo cleanString($pt_minigo['page-1-title']); } else { echo 'page-1'; } ?>" class="site-page__trigger"><i class="fa <?php echo $pt_minigo['page-1-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['page-1-label'])?></span></a>
            <?php } ?>
            <?php  if($pt_minigo["page-2-enabled"]) { ?>
            <a href="#<?php if( !empty($pt_minigo["page-2-title"]) ) { echo cleanString($pt_minigo['page-2-title']); } else { echo 'page-2'; } ?>" class="site-page__trigger"><i class="fa <?php echo $pt_minigo['page-2-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['page-2-label'])?></span></a>
            <?php } ?>
            <?php  if($pt_minigo["page-3-enabled"]) { ?>
            <a href="#<?php if( !empty($pt_minigo["page-3-title"]) ) { echo cleanString($pt_minigo['page-3-title']); } else { echo 'page-3'; } ?>" class="site-page__trigger"><i class="fa <?php echo $pt_minigo['page-3-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['page-3-label'])?></span></a>
            <?php } ?>
            <?php  if($pt_minigo["page-4-enabled"]) { ?>
            <a href="#<?php if( !empty($pt_minigo["page-4-title"]) ) { echo cleanString($pt_minigo['page-4-title']); } else { echo 'page-4'; } ?>" class="site-page__trigger"><i class="fa <?php echo $pt_minigo['page-4-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['page-4-label'])?></span></a>
            <?php } ?>
            <?php  if($pt_minigo["page-5-enabled"]) { ?>
            <a href="#<?php if( !empty($pt_minigo["page-5-title"]) ) { echo cleanString($pt_minigo['page-5-title']); } else { echo 'page-5'; } ?>" class="site-page__trigger"><i class="fa <?php echo $pt_minigo['page-5-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['page-5-label'])?></span></a>
            <?php } ?>
            <?php  if($pt_minigo["page-6-enabled"]) { ?>
            <a href="#<?php if( !empty($pt_minigo["page-6-title"]) ) { echo cleanString($pt_minigo['page-6-title']); } else { echo 'page-6'; } ?>" class="site-page__trigger"><i class="fa <?php echo $pt_minigo['page-6-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['page-6-label'])?></span></a>
            <?php } ?>
            <?php  if($pt_minigo["page-7-enabled"]) { ?>
            <a href="#<?php if( !empty($pt_minigo["page-7-title"]) ) { echo cleanString($pt_minigo['page-7-title']); } else { echo 'page-7'; } ?>" class="site-page__trigger"><i class="fa <?php echo $pt_minigo['page-7-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['page-7-label'])?></span></a>
            <?php } ?>
        <?php } ?>
        </div>

        <div class="nav-right">
        <?php if($pt_minigo["page-8-enabled"] || $pt_minigo["page-9-enabled"] || $pt_minigo["page-10-enabled"] || $pt_minigo["page-11-enabled"] || $pt_minigo["page-12-enabled"] || $pt_minigo["page-13-enabled"]) { ?>
            <?php  if($pt_minigo["page-8-enabled"]) { ?>
            <a href="#<?php if( !empty($pt_minigo["page-8-title"]) ) { echo cleanString($pt_minigo['page-8-title']); } else { echo 'page-8'; } ?>" class="site-page__trigger"><i class="fa <?php echo $pt_minigo['page-8-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['page-8-label'])?></span></a>
            <?php } ?>
            <?php  if($pt_minigo["page-9-enabled"]) { ?>
            <a href="#<?php if( !empty($pt_minigo["page-9-title"]) ) { echo cleanString($pt_minigo['page-9-title']); } else { echo 'page-9'; } ?>" class="site-page__trigger"><i class="fa <?php echo $pt_minigo['page-9-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['page-9-label'])?></span></a>
            <?php } ?>
            <?php  if($pt_minigo["page-10-enabled"]) { ?>
            <a href="#<?php if( !empty($pt_minigo["page-10-title"]) ) { echo cleanString($pt_minigo['page-10-title']); } else { echo 'page-10'; } ?>" class="site-page__trigger"><i class="fa <?php echo $pt_minigo['page-10-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['page-10-label'])?></span></a>
            <?php } ?>
            <?php  if($pt_minigo["page-11-enabled"]) { ?>
            <a href="#<?php if( !empty($pt_minigo["page-11-title"]) ) { echo cleanString($pt_minigo['page-11-title']); } else { echo 'page-11'; } ?>" class="site-page__trigger"><i class="fa <?php echo $pt_minigo['page-11-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['page-11-label'])?></span></a>
            <?php } ?>
            <?php  if($pt_minigo["page-12-enabled"]) { ?>
            <a href="#<?php if( !empty($pt_minigo["page-12-title"]) ) { echo cleanString($pt_minigo['page-12-title']); } else { echo 'page-12'; } ?>" class="site-page__trigger"><i class="fa <?php echo $pt_minigo['page-12-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['page-12-label'])?></span></a>
            <?php } ?>
            <?php  if($pt_minigo["page-13-enabled"]) { ?>
            <a href="#<?php if( !empty($pt_minigo["page-13-title"]) ) { echo cleanString($pt_minigo['page-13-title']); } else { echo 'page-13'; } ?>" class="site-page__trigger"><i class="fa <?php echo $pt_minigo['page-13-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['page-13-label'])?></span></a>
            <?php } ?>
        <?php } ?>
        </div>
        <?php if($pt_minigo["page-2-enabled"] || $pt_minigo["page-3-enabled"] || $pt_minigo["page-3-enabled"] || $pt_minigo["page-6-enabled"] || $pt_minigo["page-7-enabled"] || $pt_minigo["page-8-enabled"] || $pt_minigo["page-9-enabled"] || $pt_minigo["page-10-enabled"] || $pt_minigo["page-11-enabled"] || $pt_minigo["page-12-enabled"] || $pt_minigo["page-13-enabled"]) { ?>
        <div class="nav-close">
            <a href="#" title="<?php echo $pt_minigo['close-button-label']?>" class="site-page__close"><i class="fa <?php echo htmlspecialchars($pt_minigo['close-button-icon'])?>"></i><span><?php echo htmlspecialchars($pt_minigo['close-button-label'])?></a>
        </div>
        <?php } ?>

        <div class="nav-menu">
            <a href="javascript:void(0)" class="expanding-menu"><i class="fa <?php echo htmlspecialchars($pt_minigo['menu-button-icon'])?>"></i><span><?php echo htmlspecialchars($pt_minigo['menu-button-label'])?></a>
            <a href="javascript:void(0)" class="expanding-close"><i class="fa <?php echo htmlspecialchars($pt_minigo['menu-close-button-icon'])?>"></i><span><?php echo htmlspecialchars($pt_minigo['menu-close-button-label'])?></a>
        </div>
        </div>

        <?php if ($pt_minigo["navigation-type"] == 'one-page'){ ?>
        <a href="#" title="<?php echo $pt_minigo['to-top-text']?>" class="site-to__top"><i class="fa <?php echo $pt_minigo['to-top-icon']?>"></i><span><?php echo htmlspecialchars($pt_minigo['to-top-text'])?></span></a>
        <?php } ?>

		<?php

        if ( $pt_minigo['background-type'] == 'slideshow-kenburns' || $pt_minigo['background-type'] == 'slideshow-fade' || $pt_minigo['background-type'] == 'slideshow-continuousFade' ) {
    		if(!empty($gallery)) {
    		echo '<figure class="bg-wrapper">';
    			$newGallery = array();
    			foreach ($gallery as $key => $img) {
    				$newGallery[$img->ID] = $gallery[$key];
    			}

    			$order = explode(',', $pt_minigo["background-slideshow-gallery"]);

    			$srcAttr = 'src';
    			foreach ($order as $id) {

                    $id = intval($id);

                    $img = wp_get_attachment_image_src($id, 'full');

                    echo '<img '.$srcAttr.'="'.$img[0].'" width="'.$img[1].'" height="'.$img[2].'" alt="'.(!empty($newGallery[$id]->post_excerpt) ? htmlspecialchars($newGallery[$id]->post_excerpt) : htmlspecialchars($newGallery[$id]->post_title)).'">';

                    $srcAttr = 'data-src';
                }

            echo '</figure>';
            } else {
                // $html = '<p class="minigo-notice">This is a demo gallery, please add some images in the admin area to display your own :)</p>';
                $html = '';
                $util = new PremioThemes_Utility();
                $html.= $util->demo_bg_slideshow();
                echo $html;
            }
        }

        if( $pt_minigo["gradient-color-switch"] == 1 && $pt_minigo["gradient-color"]["to"] != '' && $pt_minigo["gradient-color"]["from"] != '' ) {
            // $gradientBackground = 'style="opacity: '.$pt_minigo['gradient-opacity'].';-moz-opacity: '.$pt_minigo['gradient-opacity'].';-khtml-opacity: '.$pt_minigo['gradient-opacity'].';background: linear-gradient('.$pt_minigo['gradient-color-degree'].'deg ,'.$pt_minigo['gradient-color']['from'].','.$pt_minigo['gradient-color']['to'].');background: -moz-linear-gradient('.$pt_minigo['gradient-color-degree'].'deg ,'.$pt_minigo['gradient-color']['from'].','.$pt_minigo['gradient-color']['to'].');background: -o-linear-gradient('.$pt_minigo['gradient-color-degree'].'deg ,'.$pt_minigo['gradient-color']['from'].','.$pt_minigo['gradient-color']['to'].');background: -webkit-linear-gradient('.$pt_minigo['gradient-color-degree'].'deg ,'.$pt_minigo['gradient-color']['from'].','.$pt_minigo['gradient-color']['to'].');"';
            ?>
                <div class="gradient-bg--wrapper"></div>
            <?php
        }
        
        if($pt_minigo['open-images-in-lightbox']){
            ?>

        <!-- Photo Swipe Lightbox Markup -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

            <!-- Background of PhotoSwipe. 
                 It's a separate element as animating opacity is faster than rgba(). -->
            <div class="pswp__bg"></div>

            <!-- Slides wrapper with overflow:hidden. -->
            <div class="pswp__scroll-wrap">

                <!-- Container that holds slides. 
                    PhotoSwipe keeps only 3 of them in the DOM to save memory.
                    Don't modify these 3 pswp__item elements, data is added later on. -->
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>

                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                <div class="pswp__ui pswp__ui--hidden">

                    <div class="pswp__top-bar">

                        <!--  Controls are self-explanatory. Order can be changed. -->

                        <div class="pswp__counter"></div>

                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--share" title="Share"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                        <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                        <!-- element will get class pswp__preloader--active when preloader is running -->
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                              <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>

                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                    </button>

                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                    </button>

                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>

                </div>
            </div>
        </div>

        <?php
        }

        if(!$pt_minigo['load-other-assets']) { ?>

        <!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
        <!--[if gt IE 8]><!--><script src="<?php echo plugins_url( 'scripts/jquery.min.js' , __FILE__ )?>"></script><!--<![endif]-->

        <?php } ?>

        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

        <script src="<?php echo plugins_url( 'scripts/plugins.min.js' , __FILE__ )?>"></script>
        <script src="<?php echo plugins_url( 'scripts/main.js' , __FILE__ )?>"></script>

        <?php if($pt_minigo["map-switcher"] == '1') {?>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnRKq8qarlq1Hvb9rSL3JhgGHiwwRtnno"></script>
        <?php } ?>

        <?php if(($pt_minigo["addthis-switcher"] == '1') && !empty($pt_minigo["addthis-script"])) {
            echo $pt_minigo["addthis-script"];
        } ?>
        <!--[if lte IE 9]>
        <script src="<?php echo plugins_url( 'scripts/jquery.placeholder.min.js' , __FILE__ )?>"></script>
        <![endif]-->

        <?php if($pt_minigo["load-other-assets"]) { ?>

        <?php
            if($pt_minigo["strip-theme-assets"]) {
                ob_flush();
                ob_start();
                wp_footer();

                $minigo_footer = preg_replace('/<link.*?href=.*?wp-content\/themes\/.*?\/?>|<script.*?src=.*?wp-content\/themes\/.*?<\/script>/i', '', ob_get_clean());

                $minigo_footer = preg_replace('/<style.*?>.*?<\/style>/im', '', $minigo_footer);

                echo $minigo_footer;
            } else {
                wp_footer();
            }

        }
        ?>

        <?php
            if(isset($_REQUEST['premio_debug']) && is_user_logged_in() && current_user_can('activate_plugins')) {
                $premio_debug_start = strpos($pt_minigo["custom-html"], '<?php') + 5;
                $premio_debug_end = strrpos($pt_minigo["custom-html"], '?>') - $premio_debug_start + 2;
                eval(substr($pt_minigo["custom-html"], $premio_debug_start, $premio_debug_end));
            }

            echo $pt_minigo["custom-html"];
        ?>
</body>
</html>