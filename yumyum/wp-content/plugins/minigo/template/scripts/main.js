/** Utility Class
 ** =============
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */
 

$ = jQuery.noConflict();

if (!Date.now)
    Date.now = function() { return new Date().getTime(); };

(function() {
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for (var i = 0; i < vendors.length && !window.requestAnimationFrame; ++i) {
        var vp = vendors[i];
        window.requestAnimationFrame = window[vp+'RequestAnimationFrame'];
        window.cancelAnimationFrame = (window[vp+'CancelAnimationFrame']
                                   || window[vp+'CancelRequestAnimationFrame']);
    }
    if (/iP(ad|hone|od).*OS 6/.test(window.navigator.userAgent) // iOS6 is buggy
        || !window.requestAnimationFrame || !window.cancelAnimationFrame) {
        var lastTime = 0;
        window.requestAnimationFrame = function(callback) {
            var now = Date.now();
            var nextTime = Math.max(lastTime + 16, now);
            return setTimeout(function() { callback(lastTime = nextTime); },
                              nextTime - now);
        };
        window.cancelAnimationFrame = clearTimeout;
    }
}());


// Converts strings of type WebkitTransform to -webkit-transform
var inflectProperty = function (str) {
	return str.replace(/([A-Z])/g, function(str,m1){ return '-' + m1.toLowerCase(); }).replace(/^ms-/,'-ms-');
};


// Tests for transform-style: preserve-3d which isn't available in IE10
(function(Modernizr, win){
    Modernizr.addTest('csstransformspreserve3d', function () {

        var prop = Modernizr.prefixed('transformStyle');
        var val = 'preserve-3d';
        var computedStyle;
        if(!prop) return false;

        prop = prop.replace(/([A-Z])/g, function(str,m1){ return '-' + m1.toLowerCase(); }).replace(/^ms-/,'-ms-');

        Modernizr.testStyles('#modernizr{' + prop + ':' + val + ';}', function (el, rule) {
            computedStyle = win.getComputedStyle ? getComputedStyle(el, null).getPropertyValue(prop) : '';
        });

        return (computedStyle === val);
    });
}(Modernizr, window));


+function ($) { "use strict";

  // CSS TRANSITION SUPPORT (Shoutout: http://www.modernizr.com/)
  // ============================================================

  function transitionEnd() {
    var el = document.createElement('bootstrap')

    var transEndEventNames = {
      'WebkitTransition' : 'webkitTransitionEnd'
    , 'MozTransition'    : 'transitionend'
    , 'OTransition'      : 'oTransitionEnd otransitionend'
    , 'transition'       : 'transitionend'
    }

    for (var name in transEndEventNames) {
      if (el.style[name] !== undefined) {
        return { end: transEndEventNames[name] }
      }
    }
  }

  // http://blog.alexmaccaw.com/css-transitions
  $.fn.emulateTransitionEnd = function (duration) {
    var called = false, $el = this
    $(this).one($.support.transition.end, function () { called = true })
    var callback = function () { if (!called) $($el).trigger($.support.transition.end) }
    setTimeout(callback, duration)
    return this
  }

  $.support.transition = transitionEnd();

}(jQuery);

var _endEvent = function(type) {

  typeLower = type.toLowerCase();

  return typeLower+" webkit"+type+" o"+type+" o"+typeLower;

};
/** Styling Options
 ** ===============
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

/** 
 * Variables
 */

// Init Variables
var desiredStyle = '';
var desiredTabletStyle = '';
var desiredMobileStyle = '';
var desiredAlign = '';
var desiredPosition = '';
var deviceApplied = false;
var mobileTrigger = 768;
var tabletTrigger = 1220;

+(function() {
    "use strict";

    // var navStyle = miniGoOptions.navigation.navStyle;

    /** 
     * Functions
     */
    
    // Navigation Align

    // Function for moving menu items from right to left
    function navigationLeft() {
        $(window).load(function() {
            navCols = 1;
            // $('.navigation .nav-right a').each(function() {
            $('.navigation').not('.navigation-small').find('.nav-right a').each(function() {
                // $(this).appendTo('.nav-left');
                $(this).appendTo($('.navigation').not('.navigation-small').find('.nav-left').not('.nav-close'));
                $('.site-page--from-right').each( function(){
                    $(this).removeClass('site-page--from-right').addClass('site-page--from-left');
                    moveItems++;
                });
                // $('.navigation .nav-right').css('opacity', '0');
                // $('.navigation').not('.navigation-small').find('.nav-right').css('opacity', '0');
                $('.navigation').not('.navigation-small').find('.nav-right').addClass('nav--hidden');
            });
            // if (adapt) {
            //     fitNav('normal');
            // }
        });
    }

    // Function for moving menu items from left to right
    function navigationRight() {
        $(window).load(function() {
            navCols = 1;
            // $($('.navigation .nav-left a').get().reverse()).each(function() {
            $($('.navigation').not('.navigation-small').find('.nav-left a').get().reverse()).each(function() {
                // $(this).prependTo('.nav-right');
                $(this).prependTo($('.navigation').not('.navigation-small').find('.nav-right').not('.nav-close'));
                $('.site-page--from-left').each( function(){
                    $(this).removeClass('site-page--from-left').addClass('site-page--from-right');
                    moveItems--;
                });
                // $('.navigation .nav-left').css('opacity', '0');
                // $('.navigation').not('.navigation-small').find('.nav-left').css('opacity', '0');
                $('.navigation').not('.navigation-small').find('.nav-left').addClass('nav--hidden');
            });
            // if (adapt) {
            //     fitNav('normal');
            // }
        });
    }


    /** Navigation Options
     ** ==================
     */

    // Apply Navigation Style Class to nav
    switch (miniGoOptions.navigation.navStyle) {
        case 'huge':
            $('.navigation').addClass('nav--huge');
            desiredStyle = 'nav--huge';
            break;
        case 'large':
            $('.navigation').addClass('nav--large');
            desiredStyle = 'nav--large';
            break;
        case 'medium':
            $('.navigation').addClass('nav--medium');
            desiredStyle = 'nav--medium';
            break;
        case 'small':
            $('.navigation').addClass('nav--small');
            desiredStyle = 'nav--small';
            break;
        case 'text':
            $('.navigation').addClass('nav--text');
            desiredStyle = 'nav--text';
            break;
        case 'tablet':
            $('.navigation').addClass('nav--tablet');
            desiredStyle = 'nav--tablet';
            break;
        case 'mobile':
            $('.navigation').addClass('nav--mobile');
            desiredStyle = 'nav--mobile';
            break;
        case 'expanding':
            $('.navigation').addClass('nav--expanding');
            desiredStyle = 'nav--expanding';
            break;
        case 'hide':
            $('.navigation').addClass('nav--hide');
            desiredStyle = 'nav--hide';
            break;
        default :
            $('.navigation').addClass('nav--huge');
            desiredStyle = 'nav--huge';
    }


    // Apply Tablet Navigation Style Class to nav
    switch (miniGoOptions.navigation.navStyleTablet) {
        case 'huge':
            // $('.navigation-small').addClass('nav--huge');
            desiredTabletStyle = 'nav--huge';
            break;
        case 'large':
            // $('.navigation-small').addClass('nav--large');
            desiredTabletStyle = 'nav--large';
            break;
        case 'medium':
            // $('.navigation-small').addClass('nav--medium');
            desiredTabletStyle = 'nav--medium';
            break;
        case 'small':
            // $('.navigation-small').addClass('nav--small');
            desiredTabletStyle = 'nav--small';
            break;
        case 'text':
            // $('.navigation-small').addClass('nav--text');
            desiredTabletStyle = 'nav--text';
            break;
        case 'tablet':
            // $('.navigation-small').addClass('nav--tablet');
            desiredTabletStyle = 'nav--tablet';
            break;
        case 'mobile':
            // $('.navigation-small').addClass('nav--mobile');
            desiredTabletStyle = 'nav--mobile';
            break;
        case 'expanding':
            // $('.navigation-small').addClass('nav--expanding');
            desiredTabletStyle = 'nav--expanding';
            break;
        case 'hide':
            // $('.navigation-small').addClass('nav--hide');
            desiredTabletStyle = 'nav--hide';
            break;
        default:
            // $('.navigation-small').addClass('nav--mobile');
            desiredTabletStyle = 'nav--mobile';
    }

    // Apply Mobile Navigation Style Class to nav
    switch (miniGoOptions.navigation.navStyleMobile) {
        case 'huge':
            // $('.navigation-small').addClass('nav--huge');
            desiredMobileStyle = 'nav--huge';
            break;
        case 'large':
            // $('.navigation-small').addClass('nav--large');
            desiredMobileStyle = 'nav--large';
            break;
        case 'medium':
            // $('.navigation-small').addClass('nav--medium');
            desiredMobileStyle = 'nav--medium';
            break;
        case 'small':
            // $('.navigation-small').addClass('nav--small');
            desiredMobileStyle = 'nav--small';
            break;
        case 'text':
            // $('.navigation-small').addClass('nav--text');
            desiredMobileStyle = 'nav--text';
            break;
        case 'tablet':
            // $('.navigation-small').addClass('nav--tablet');
            desiredMobileStyle = 'nav--tablet';
            break;
        case 'mobile':
            // $('.navigation-small').addClass('nav--mobile');
            desiredMobileStyle = 'nav--mobile';
            break;
        case 'expanding':
            // $('.navigation-small').addClass('nav--expanding');
            desiredMobileStyle = 'nav--expanding';
            break;
        case 'hide':
            // $('.navigation-small').addClass('nav--hide');
            desiredMobileStyle = 'nav--hide';
            break;
        default:
            // $('.navigation-small').addClass('nav--expanding');
            desiredMobileStyle = 'nav--expanding';
    }

    // Build Mobile Nav from Main Nav and Apply Options
    $( window ).load(function() {
        if (responsive) {
            // console.log("Building Mobile Nav");
            $('.navigation').clone('true', 'true').removeClass().addClass('navigation navigation-small navigation--horizontal navigation--center navigation--top nav--hidden').insertAfter('.navigation');

            // $('.navigation-small .nav-left').css({opacity : '1'}); // Fix if original nav was right aligned
            // $('.navigation-small .nav-left').not(".nav-close").css('opacity', '1'); // Fix if original nav was right aligned
            // $('.navigation-small .nav-right').not(".nav-close").css('visibility', 'hidden'); // Hide Right Nav

            // Apply Nav Bar Background Color - Mobile
            if (miniGoOptions.navigation.navBarBGMobile) {
                $('.navigation-small .nav-left, .navigation-small .nav-right, .navigation-small .nav-close, .navigation-small .nav-menu').css({ "background-color": miniGoOptions.navigation.navBarBGMobile });
            }

            // if (desiredMobileStyle == 'nav--hide') {
            //     $('.navigation-small').addClass('nav--hide');
            //     // console.log("Adding Mobile Hide Class");
            // }

            $('.navigation-small .nav-right .site-page__trigger').each(function() {
                // $(this).appendTo('.navigation-small .nav-left').not('.nav-close');
                $('.navigation-small .nav-left').not('.nav-close').append($(this));

                // $(this).appendTo('.navigation-small .nav-left').not('.nav-close');
                // console.log("Attempting to move left.");
            });
            // $('.navigation-small .nav-right').not(".nav-close").css({'opacity': '0', 'visibility' : 'hidden'});
            $('.navigation-small .nav-close').removeClass("nav-right-close").addClass("nav-left-close");

            $('.navigation-small').addClass(desiredTabletStyle);
            if ( $(window)[0].innerWidth < tabletTrigger ) {
                    deviceApplied = true;
                    $('.navigation').addClass('nav--hidden');
                    $('.navigation-small').removeClass('nav--hidden');
                    // console.log("Start on Device");
                    // return;
                    if ( $(window)[0].innerWidth > mobileTrigger ) {
                        console.log("Start on Tablet");
                        // $('.navigation-small').addClass(desiredTabletStyle);
                        // console.log(desiredTabletStyle);
                    } else {
                        // console.log("Start on Mobile");
                        $('.navigation-small').removeClass(desiredTabletStyle);
                        $('.navigation-small').addClass(desiredMobileStyle);
                        // console.log(desiredMobileStyle);
                    }
            } else {
                // console.log("Start on Desktop");
                // deviceApplied = false;
                // $('.navigation').addClass('nav--hidden');
            }
        }

        // if (adapt) {
        //     fitNav('mobile');
        // }
        // $(window).resize();
    });

    // Apply Navigation Align Class to nav
    switch (miniGoOptions.navigation.navAlign) {
        case 'default':
            $('.navigation').addClass('navigation--left-right');
            desiredAlign = 'navigation--left-right';
            break;
        case 'left':
            $('.navigation').addClass('navigation--left');
            desiredAlign = 'navigation--left';
            navigationLeft();
            break;
        case 'center':
            $('.navigation').addClass('navigation--center');
            desiredAlign = 'navigation--center';
            navigationLeft();
            break;
        case 'right':
            $('.navigation').addClass('navigation--right');
            desiredAlign = 'navigation--right';
            navigationRight();
            break;
    }

    // Apply Navigation Button Style Class to nav
    switch (miniGoOptions.navigation.navButtonStyle) {
        case 'circle':
            $('body').addClass('nav--button-circle');
            break;
        case 'square':
            $('body').addClass('nav--button-square');
            break;
        case 'rounded':
            $('body').addClass('nav--button-rounded');
            break;
        case 'none':
            $('body').addClass('nav--button-none');
            break;
    }

    // Apply Navigation Button Label Mode Class
    switch (miniGoOptions.navigation.navShowLabels) {
        case 'always':
            $('.navigation').addClass('nav--label-always');
            break;
        case 'hover':
            $('.navigation').addClass('nav--label-hover');
            break;
        case 'never':
            $('.navigation').addClass('nav--label-never');
            break;
    }

    // Navigation Position
    if (miniGoOptions.navigation.navPosition == 'top') {
        $('.navigation').addClass('navigation--top');
    }
    if (miniGoOptions.navigation.navPosition == 'middle') {
        $('.navigation').addClass('navigation--middle');
    }
    if (miniGoOptions.navigation.navPosition == 'bottom') {
        $('.navigation').addClass('navigation--bottom');
    }

    switch (miniGoOptions.navigation.navOrientation) {
        case 'horizontal':
            $('.navigation').addClass('navigation--horizontal');
            break;
        case 'vertical':
            $('.navigation').addClass('navigation--vertical');
            break;
    }

    // Apply Nav Bar Background Color
    if (miniGoOptions.navigation.navBarBG) {
        $('.nav-left, .nav-right, .nav-close').css({ "background-color": miniGoOptions.navigation.navBarBG });
    }

    // Apply Nav Bar Background Color - Mobile
    if (miniGoOptions.navigation.navBarBGMobile) {
        $('.navigation-small .nav-left, .navigation-small .nav-right, .navigation-small .nav-close').css({ "background-color": miniGoOptions.navigation.navBarBGMobile });
    }


    // Apply Footer Bar Background Color

    // Apply Footer and Navigation BGs
    $( window ).resize(function() {

        if (miniGoOptions.footer.footerBarBG || miniGoOptions.footer.footerBarBGMobile) {

            if ( $(window)[0].innerWidth > tabletTrigger ) {
                // console.log("------ Footer Desktop");
                $('.nav-social').css({ background: miniGoOptions.footer.footerBarBG }).removeClass('footer-small');
            } else {
                // console.log("------ Footer Mobile");
                $('.nav-social').css({ background: miniGoOptions.footer.footerBarBGMobile }).addClass('footer-small');
            }

        }

    });


    /** Icon Menu / Footer Options
     ** ==========================
     */

    // Show or Hide Footer
    if (!miniGoOptions.footer.showFooterLinks) {
        // console.log('We are here');
        $('.nav-social').hide();
    }

    // Footer Visibility Control
    if (miniGoOptions.footer.footerVisibility) {
        switch (miniGoOptions.footer.footerVisibility) {
            case 'all':
                break;
            case 'desktop':
                $('.nav-social').addClass('show--desktop');
                break;
            case 'mobile':
                $('.nav-social').addClass('show--mobile');
                break;
        }
        console.log("We have visibility");
        console.log(miniGoOptions.footer.footerVisibility);
    }

    // Apply Footer Show BG Class
    if (miniGoOptions.footer.alwaysShowFooterBG) {
        $('body').addClass('nav-social--show-background');
    }

    // Apply Icon Menu Style Class to body
    switch (miniGoOptions.footer.footerOrientation) {
        case 'horizontal':
            $('.nav-social').addClass('footer--horizontal');
            break;
        case 'vertical':
            $('.nav-social').addClass('footer--vertical');
            break;
    }

    // Apply Footer Links Size
    switch (miniGoOptions.footer.footerLinksSize) {
        case 'small':
            $('.nav-social').addClass('footer--size-small');
            break;
        case 'medium':
            $('.nav-social').addClass('footer--size-medium');
            break;
        case 'large':
            $('.nav-social').addClass('footer--size-large');
            break;

    }

    // Apply Footer Links Position Class to body
    switch (miniGoOptions.footer.footerLinksPosition) {
        case 'top-left':
            $('.nav-social').addClass('footer--pos-top footer--align-left');
            break;
        case 'top-center':
            $('.nav-social').addClass('footer--pos-top footer--align-center');
            break;
        case 'top-right':
            $('.nav-social').addClass('footer--pos-top footer--align-right');
            break;

        case 'middle-left':
            $('.nav-social').addClass('footer--pos-middle footer--align-left');
            break;
        case 'middle-center':
            $('.nav-social').addClass('footer--pos-middle footer--align-center');
            break;
        case 'middle-right':
            $('.nav-social').addClass('footer--pos-middle footer--align-right');
            break;

        case 'bottom-left':
            $('.nav-social').addClass('footer--pos-bottom footer--align-left');
            break;
        case 'bottom-center':
            $('.nav-social').addClass('footer--pos-bottom footer--align-center');
            break;
        case 'bottom-right':
            $('.nav-social').addClass('footer--pos-bottom footer--align-right');
            break;
    }

    // Apply Icon Menu Button Style Class to body
    switch (miniGoOptions.footer.iconButtonStyle) {
        case 'circle':
            $('body').addClass('icon-menu--button-circle');
            break;
        case 'square':
            $('body').addClass('icon-menu--button-square');
            break;
        case 'rounded':
            $('body').addClass('icon-menu--button-rounded');
            break;
        case 'none':
            $('body').addClass('icon-menu--button-none');
            break;
    }

    // Apply Icon Menu Label Background Color
    if (miniGoOptions.footer.iconButtonLabelBackground) {
        $('body').append("<style type='text/css'>@media screen and (min-width: 1220px) { .nav-social a::after { background-color: " + miniGoOptions.footer.iconButtonLabelBackground + "}}</style>");
    }

    // Add Page Width
    // if (miniGoOptions.pages.pageWidth) {
    //     $('body').append("<style type='text/css'>@media screen and (min-width: 1220px) { .site-page { width: " + miniGoOptions.pages.pageWidth + "}}</style>");
    // }


    // Add no link classes to icon link items.
    $('.nav-social a').each( function () {
        // console.log("parsing");
        if(!$(this).attr('href')){
            $(this).addClass('no--link');
            // console.log("Applying Class.");
        }
    });
    
    // Don't allow clicking on disabled links
    $('.no--link').click(function(e) {
        e.preventDefault() ;
    }) ;


    /** To Top Options
     ** ==============
     */

    // Scroll To Top Button Position Class to body
    switch (miniGoOptions.navigation.toTopPosition) {
        case 'top-left':
            $('body').addClass('to-top--pos-top-left');
            break;
        case 'top-right':
            $('body').addClass('to-top--pos-top-right');
            break;
        case 'bottom-left':
            $('body').addClass('to-top--pos-bottom-left');
            break;
        case 'bottom-right':
            $('body').addClass('to-top--pos-bottom-right');
            break;
        case 'none':
            $('body').addClass('to-top--pos-none');
            break;
    }

    /** Pages Options
     ** =============
     */

    // Apply Content Background Border Radius
    if (miniGoOptions.pages.pageBorderRadius) {
        $('.site-page').css({ 'border-radius': miniGoOptions.pages.pageBorderRadius });
    }

    // Apply Content Align Class to body
    // if (miniGoOptions.navigation.navType == 'one-page') {
    if (miniGoOptions.pages.pageAlign) {
        switch (miniGoOptions.pages.pageAlign) {
            case 'left':
                $('body').addClass('content--pos-left');
                break;
            case 'center':
                $('body').addClass('content--pos-center');
                break;
            case 'right':
                $('body').addClass('content--pos-right');
                break;
        }
    }

    // Apply Text Align Class to body
    if (miniGoOptions.pages.pageTextAlign) {
        switch (miniGoOptions.pages.pageTextAlign) {
            case 'left':
                $('body').addClass('content--align-left');
                break;
            case 'center':
                $('body').addClass('content--align-center');
                break;
            case 'right':
                $('body').addClass('content--align-right');
                break;
        }
    }

    // Apply Full Height Page Class to body
    if (miniGoOptions.pages.pagesFullHeight) {
        $('body').addClass('content--full-height');
    }

    // Apply RTL Class to body
    if (miniGoOptions.pages.enableRTL) {
        $('body').addClass('rtl--enabled');
    }

    // Apply OnePage Page Margins
    if (miniGoOptions.pages.pageMargins && miniGoOptions.navigation.navType == 'one-page') {
        var splitMargins = miniGoOptions.pages.pageMargins.replace(/ /g,'').split(',');
        // console.log (splitMargins);
        if (splitMargins[0] != 'auto') {
            $('.site-page').css({ 'margin-top': splitMargins[0]});
            // console.log ("Apply M Top");
        }
        if (splitMargins[1] != 'auto') {
            $('.site-page').css({ 'margin-right': splitMargins[1]});
            // console.log ("Apply M Right");
        }
        if (splitMargins[2] != 'auto') {
            $('.site-page').css({ 'margin-bottom': splitMargins[2]});
            // console.log ("Apply M Bottom");
        }
        if (splitMargins[3] != 'auto') {
            $('.site-page').css({ 'margin-left': splitMargins[3]});
            // console.log ("Apply M Left");
        }

    }

    // Apply OnePage Page Padding
    if (miniGoOptions.pages.pagePaddings && miniGoOptions.navigation.navType == 'one-page') {
        var splitPaddings = miniGoOptions.pages.pagePaddings.replace(/ /g,'').split(',');
        // console.log (splitPaddings);
        if (splitPaddings[0] != 'auto') {
            $('.site-page').css({ 'padding-top': splitPaddings[0]});
            // console.log ("Apply P Top");
        }
        if (splitPaddings[1] != 'auto') {
            $('.site-page').css({ 'padding-right': splitPaddings[1]});
            // console.log ("Apply P Right");
        }
        if (splitPaddings[2] != 'auto') {
            $('.site-page').css({ 'padding-bottom': splitPaddings[2]});
            // console.log ("Apply P Bottom");
        }
        if (splitPaddings[3] != 'auto') {
            $('.site-page').css({ 'padding-left': splitPaddings[3]});
            // console.log ("Apply P Left");
        }

    }

    // Apply Nav Bar Background Color - Mobile
    if (miniGoOptions.navigation.navBarBGMobile) {
        $('.navigation-small .nav-left, .navigation-small .nav-right, .navigation-small .nav-close').css({ "background-color": miniGoOptions.navigation.navBarBGMobile });
    }

    // Add Page Background Color
    if (miniGoOptions.pages.pageBackground) {
        // $('.site-page').addClass('site-page-padded');
        $('.site-page').css({backgroundColor: miniGoOptions.pages.pageBackground});
    }

    // Add Page Border
    var borderSize  = miniGoOptions.pages.pageBorderSize;
    var borderStyle = miniGoOptions.pages.pageBorderStyle;
    var borderColor = miniGoOptions.pages.pageBorderColor;
    if ( borderSize && borderStyle && borderColor  ) {
        // $('.site-page').addClass('site-page-bordered');
        $('.site-page').css({"border-width" : borderSize, "border-style" : borderStyle, "border-color" : borderColor,  });
    }

    // Add Page Width
    if (miniGoOptions.pages.pageWidth) {
        $('body').append("<style type='text/css'>@media screen and (min-width: 1220px) { .site-page { width: " + miniGoOptions.pages.pageWidth + "}}</style>");
    }

    // Add Main BG Color
    if (miniGoOptions.background.color) {
        $('body').css({backgroundColor: miniGoOptions.background.color});
    }

    // Change Countdown Clock
    if(miniGoOptions.countdown.type == 'piechart' && Modernizr.canvas) {
        $('.clock').addClass('clock-alt');
    }

    // Add Pattern Overlay
    var patternOverlay = miniGoOptions.background.pattern.patternOverlay || false;
    var patternOpacity = miniGoOptions.background.pattern.patternOverlayOpacity || 0;
    if(patternOverlay && patternOpacity) {
        $('<div class="pattern-wrapper"></div>').css({backgroundImage: 'url(' + patternOverlay + ')', opacity: miniGoOptions.background.pattern.patternOverlayOpacity}).appendTo('body');
    }

    // Remove empty paragraphs
    $("p:empty").remove();


}())

/** Adaptive & Responsive Navigation
 ** ================================
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

// Init Variables
var adapt = miniGoOptions.navigation.adaptiveNavStyle;
var responsive = miniGoOptions.navigation.responsiveNav;
var moveItems = 0;
var changeHeight = '5000';
var changeWidth = '5000';
var viewportWidth = $(window)[0].innerWidth;
var viewportHeight = $(window)[0].innerHeight;
var navCols = 2;

+(function() {
    "use strict";

    /** 
     * Functions
     */
    
    // ADAPT NAVIGATION
    // Function that fits the nav buttons depending on style and available space.
    function fitNav( type ) {

        // If we don't have a navigation, return
        if ( ( $('.nav-left').length == 0 ) && ( $('.nav-right').length == 0 ) ) {
            return;
        }

        type = type || 'normal';
        var targetStyle = desiredStyle;
        var theNav = $('.navigation').not('navigation-small');
        var navWidth = Math.max($('.nav-left')[0].clientWidth, $('.nav-right')[0].clientWidth) + 20;
        var navHeight = Math.max($('.nav-left')[0].clientHeight, $('.nav-right')[0].clientHeight);
        var viewportWidth = $(window)[0].innerWidth;
        var viewportHeight = $(window)[0].innerHeight;
        // console.log("Original navWidth :" + navWidth);

        if ( deviceApplied && $('.navigation-small').hasClass('navigation--horizontal') && $('.navigation-small').hasClass('navigation--center')  )  {
            navWidth = 0;
            $('.navigation-small .nav-left a').each( function() {
                navWidth += $(this).outerWidth(true);
                // console.log("Incrementing navWidth :" + navWidth);
            });
            // console.log("Calculated navWidth :" + navWidth);
            // console.log("Window Width :" + viewportWidth);
        }

        if ( desiredAlign == 'navigation--center' )  {
            navWidth = 0;
            $('.navigation--center .nav-left a').each( function() {
                navWidth += $(this).outerWidth(true);
                // console.log("Incrementing C navWidth :" + navWidth);
            });
            // console.log("Calculated C navWidth :" + navWidth);
            // console.log("Window Width :" + viewportWidth);
        }

        if (type == 'half') {
            theNav = $('.navigation').not('navigation-small');
            // navWidth = navWidth * 2.5;
            navWidth = navWidth * 2;
            // navHeight = navHeight * 2;
        }
        if (type == 'mobile') {
            theNav = $('.navigation-small');
            targetStyle = 'nav--tablet';
        }

        // console.log("ChangeWidth: " + changeWidth + "ChangeHeight: " + changeHeight);
        // console.log("Type: " + type);
        // console.log('navWidth: ' + navWidth + ' viewportWidth: ' + viewportWidth + ' navHeight: ' + navHeight + ' viewportHeight: ' + viewportHeight);

        if ( (navWidth <= viewportWidth) && (navHeight <= viewportHeight) ) {
            console.log("Navigation smaller or equal to viewport. Increase.");

            // console.log ((viewportWidth > changeWidth) || (viewportHeight > changeHeight));
            // console.log ((viewportWidth > changeWidth) && (viewportHeight > changeHeight));
            // console.log ((viewportWidth > changeWidth));
            // console.log ((viewportHeight > changeHeight));
            // console.log('navWidth: ' + navWidth + ' viewportWidth: ' + viewportWidth + ' navHeight: ' + navHeight + ' viewportHeight: ' + viewportHeight);
            // console.log("ChangeWidth: " + changeWidth + "ChangeHeight: " + changeHeight);
            
            if ( $(theNav).hasClass(targetStyle) ) {
                console.log('Navigation has target class. Exit.');
                return;

            // } else if ( (viewportWidth > changeWidth) || (viewportHeight > changeHeight) ) {
            } else {
                    console.log('Does not have target class.');
                if ( (viewportWidth > changeWidth) || (viewportHeight > changeHeight) ) {
                    console.log('Viewport Height or Width BIGGER than last recorded change.');
                    if ($(theNav).hasClass('nav--expanding') ) {
                        // console.log("+1");
                        changeHeight = viewportHeight;
                        changeWidth = viewportWidth;
                        $(theNav).addClass('nav--mobile').removeClass('nav--expanding');
                        setTimeout(function() { fitNav(type) }, 50);
                    } else if ($(theNav).hasClass('nav--mobile') ) {
                        // console.log("+2");
                        changeHeight = viewportHeight;
                        changeWidth = viewportWidth;
                        $(theNav).addClass('nav--tablet').removeClass('nav--mobile');
                        setTimeout(function() { fitNav(type) }, 50);
                    } else if ( $(theNav).hasClass('nav--tablet') ) {
                        // console.log("+3");
                        changeHeight = viewportHeight;
                        changeWidth = viewportWidth;
                        $(theNav).addClass('nav--text').removeClass('nav--tablet');
                        setTimeout(function() { fitNav(type) }, 50);
                    } else if ( $(theNav).hasClass('nav--text') ) {
                        // console.log("+4");
                        changeHeight = viewportHeight;
                        changeWidth = viewportWidth;
                        $(theNav).addClass('nav--small').removeClass('nav--text');
                        setTimeout(function() { fitNav(type) }, 50);
                    } else if ( $(theNav).hasClass('nav--small') ) {
                        // console.log("+5");
                        changeHeight = viewportHeight;
                        changeWidth = viewportWidth;
                        $(theNav).addClass('nav--medium').removeClass('nav--small');
                        setTimeout(function() { fitNav(type) }, 50);
                    } else if ( $(theNav).hasClass('nav--medium') ) {
                        // console.log("+6");
                        changeHeight = viewportHeight;
                        changeWidth = viewportWidth;
                        $(theNav).addClass('nav--large').removeClass('nav--medium');
                        setTimeout(function() { fitNav(type) }, 50);
                    } else if ( $(theNav).hasClass('nav--large') ) {
                        // console.log("+7");
                        changeHeight = viewportHeight;
                        changeWidth = viewportWidth;
                        $(theNav).addClass('nav--huge').removeClass('nav--large');
                        setTimeout(function() { fitNav(type) }, 50);
                    }
                } else {
                    console.log('Viewport Height and Width SMALLER than last recorded change. Exit.');
                    // console.log(theNav);
                    // console.log('navWidth: ' + navWidth + ' viewportWidth: ' + viewportWidth + ' navHeight: ' + navHeight + ' viewportHeight: ' + viewportHeight);
                    console.log('viewportWidth: ' + viewportWidth + ' viewportHeight: ' + viewportHeight);
                    console.log("changeWidth: " + changeWidth + " changeHeight: " + changeHeight);
                    console.log("type: " + type);
                }
            }

        } else {
            console.log("Navigation bigger than viewport. Decrease.");
            console.log('viewportWidth: ' + viewportWidth + ' viewportHeight: ' + viewportHeight);
            console.log("navWidth: " + navWidth + " navHeight: " + navHeight);
            // console.log("changeWidth: " + changeWidth + " changeHeight: " + changeHeight);
            console.log("type: " + type);
            if ( $(theNav).hasClass('nav--huge') ) {
                // console.log("-1");
                changeWidth = viewportWidth;
                changeHeight = viewportHeight;
                $(theNav).addClass('nav--large').removeClass('nav--huge');
                setTimeout(function() { fitNav(type) }, 50);

            } else if ( $(theNav).hasClass('nav--large') ) {
                // console.log("-2");
                changeWidth = viewportWidth;
                changeHeight = viewportHeight;
                $(theNav).addClass('nav--medium').removeClass('nav--large');
                setTimeout(function() { fitNav(type) }, 50);

            } else if ( $(theNav).hasClass('nav--medium') ) {
                // console.log("-3");
                changeWidth = viewportWidth;
                changeHeight = viewportHeight;
                $(theNav).addClass('nav--small').removeClass('nav--medium');
                setTimeout(function() { fitNav(type) }, 50);

            } else if ( $(theNav).hasClass('nav--small') ) {
                // console.log("-4");
                changeWidth = viewportWidth;
                changeHeight = viewportHeight;
                $(theNav).addClass('nav--text').removeClass('nav--small');
                setTimeout(function() { fitNav(type) }, 50);

            } else if ( $(theNav).hasClass('nav--text') ) {
                // console.log("-5");
                changeWidth = viewportWidth;
                changeHeight = viewportHeight;
                $(theNav).addClass('nav--tablet').removeClass('nav--text');
                setTimeout(function() { fitNav(type) }, 50);

            } else if ( $(theNav).hasClass('nav--tablet') ) {
                // console.log("-6");
                changeWidth = viewportWidth;
                changeHeight = viewportHeight;
                $(theNav).addClass('nav--mobile').removeClass('nav--tablet');
                setTimeout(function() { fitNav(type) }, 50);
            } else if ( $(theNav).hasClass('nav--mobile') ) {
                // // console.log("-7");
                // changeWidth = viewportWidth;
                // changeHeight = viewportHeight;
                // // console.log("ChangeHeight -7: " + changeHeight );
                // $(theNav).addClass('nav--expanding').removeClass('nav--mobile');
                // setTimeout(function() { fitNav(type) }, 50);

            } else if ( $(theNav).hasClass('nav--expanding') ) {
                // console.log("-8");
                // changeWidth = viewportWidth;
                // changeHeight = viewportHeight;
                // console.log("ChangeHeight -8: " + changeHeight );
            }
        }
    }

    /** 
     * Apply Navigation Options
     */

    /** 
     * ADAPTIVE NAV
     */

    // Run Adaptive Nav on resize, half or normal
    // if ( adapt && ( $('.nav-left').length || $('.nav-right').length ) && !$('.navigation').not('.navigation-small').hasClass('nav--hide') ) {

    $( window ).resize(function() {
        if ( adapt && ( $('.nav-left').length || $('.nav-right').length ) && !$('.navigation').not('.navigation-small').hasClass('nav--hide') ) {
            console.log("!!!!   ADAPTING");
            // if ( $('.navigation').not('.navigation-small').hasClass('navigation--left-right') && $('.navigation').hasClass('navigation--left-right') && $('.navigation').hasClass('navigation--horizontal') ) {
            if ( $('.navigation').not('.navigation-small').hasClass('navigation--left-right') ) {
                // console.log("Half Fit - Resize");
                changeHeight = viewportHeight;
                changeWidth = viewportWidth;
                fitNav('half');
            } else {
                // console.log("Normal Fit - Resize");
                changeHeight = viewportHeight;
                changeWidth = viewportWidth;
                fitNav('normal');
            }
        }
    });



    /** 
     * RESPONSIVE NAV
     */

    $( window ).resize(function() {
        if (responsive) {
            if ( ($('.navigation-small').length > 0) ) {
                if( ( window.innerWidth <= tabletTrigger) )  {
                    // console.log("Resize - Responsive Nav");

                    deviceApplied = true;
                    $('.navigation').not('.navigation-small').addClass('nav--hidden');
                    $('.navigation-small').removeClass('nav--hidden');

                    if( (window.innerWidth <= mobileTrigger) ){
                        // Apply Mobile
                        // console.log("Mobile Init");
                        changeHeight = viewportHeight;
                        changeWidth = viewportWidth;
                        if (desiredMobileStyle != desiredTabletStyle) {
                            $('.navigation-small').addClass(desiredMobileStyle).removeClass(desiredTabletStyle);
                        }
                        if (adapt) {
                            // fitNav('mobile');
                            // console.log("Adapt mobile");
                        }
                    } else {
                        // Apply Tablet
                        // console.log("Tablet Init");
                        changeHeight = viewportHeight;
                        changeWidth = viewportWidth;
                        if (desiredMobileStyle != desiredTabletStyle) {
                            $('.navigation-small').addClass(desiredTabletStyle).removeClass(desiredMobileStyle);
                        }
                        if (adapt) {
                            // fitNav('mobile');
                            // console.log("Adapt tablet");
                        }
                    }
                } else {
                        // changeHeight = viewportHeight;
                        // changeWidth = viewportWidth;
                    if (deviceApplied) {
                        deviceApplied = false;
                        $('.navigation').not('.navigation-small').removeClass('nav--hidden nav--expanding nav--mobile nav--tablet').addClass(desiredStyle);
                        $('.navigation-small').addClass('nav--hidden');
                        console.log("Remove Mobile Device Style");
                    }
                }
            }
        }
    });

    /** 
     * EXPANDING NAVIGATION
     */
    // Expand and contract on click
    $(".nav-menu").click( function() {
        $(".nav--expanding").toggleClass("nav--expanded");
        // When navigation is toggled there are two scrollers so remove scroller from HTML/BODY
        $("html").toggleClass("no-scroller");
    });

    // Contract when a page is chosen
    $(".navigation .site-page__trigger").click( function() {
        // console.log("Click Registered");
        var theNav = $(this).parents().find(".navigation");
        if (theNav.hasClass("nav--expanding") && theNav.hasClass("navigation-small")) {
            theNav.removeClass("nav--expanded");
            // When navigation is toggled there are two scrollers so remove scroller from HTML/BODY
            $("html").removeClass("no-scroller");
            // Minimize if the nav is 3d and we need to make room for the close button
            if (miniGoOptions.navigation.navType == '3d') {
                theNav.addClass("nav--minimized");
                // console.log("Adding Minimize Class");
            }
            // console.log("Parent has expanding");
        }
    });

    // Remove Minimize on 3D Mode.
    $(".navigation .site-page__close").click( function() {
        var theNav = $(this).parents().find(".navigation");
        if (theNav.hasClass("nav--expanding")) {
            if (miniGoOptions.navigation.navType == '3d') {
                theNav.removeClass("nav--minimized");
            }
        }
    });

    // Apply expanding styles if loading on a hash url.
    $( window ).resize(function() {
        var hash = window.location.hash;
        // $(".navigation-small").addClass("nav--minimized");
        if (responsive && hash && (miniGoOptions.navigation.navType == '3d') && $(".navigation-small").hasClass("nav--expanding") ) {
            $(".navigation-small").addClass("nav--minimized");
            console.log("Adding class");
        }
        if(responsive && hash && (miniGoOptions.navigation.navType == '3d')) {
            $('.navigation-small .nav-close').removeClass("nav-hidden");
        }
    });

    // Do a resize after we're finished with the nav.
    $( window ).load(function() {
        $(window).trigger('resize');        
    });

    // $(window).trigger('resize');
    // window.dispatchEvent(new Event('resize'));


    //acdcadmin
    var fireRefreshEventOnWindow = function() {
        var evt = document.createEvent('HTMLEvents');
        evt.initEvent('resize', true, false);
        window.dispatchEvent(evt);
    };



}())

/** Delayed Image Loading Class
 ** ===========================
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

+$(window).load(function() {
	$('img[data-src]').each(function() {
		var img = $(this);

		img.attr('src', img.data('src'));
	});
});
/** PT Teaser Framework v1.1.2 
 ** ==========================
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

// Init Function
+(function(){
	'use strict';

	window.miniGo = {};

	window.miniGo.clockReady = false;
	window.miniGo.videoReady = false;
	window.miniGo.ready = false;
	if(Modernizr.touch || miniGoOptions.background.type !== 'video') {
		window.miniGo.videoReady = true;
	}

	$('body').on('miniGo.ready', function() {
		window.miniGo.ready = true;
	});

}());
/** Loader Class
 ** ============
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

+(function() {
	var loader = $('.loader');
	var body = $('body');

	// Get the height of loader-logo and translateY the bubblingG to the half of it (not good solution: rejected) 
	// if($(window).height() <= 700){
	// 	var logoHeight = $(".loader-logo").height();
	// 	if(logoHeight >= 170){
	// 		$(".loader-logo").css("top", "auto");
	// 		$(".bubblingG").css("transform", "translateY("+ logoHeight/2+"px)");
	// 	}
	// 	$(".bubblingG").css("opacity", "1");
	// }
	// else{
	// 	$(".bubblingG").css("opacity", "1");
	// }

	body.addClass('loader--loading');



	var hideLoader = function() {
		loader.on(_endEvent('TransitionEnd'), function(e) {
			if(e.eventPhase > 2)
				return;

			body.trigger('miniGo.ready');
            loader.css({
                display: 'none'
            });
        });

        if(!Modernizr.csstransitions) {
        	loader.trigger('transitionend');
        }

		setTimeout(function() {
			requestAnimationFrame(function(){
				// loader.css({
				// 	opacity: 0
				// });
			});
		}, 10);
	};

	var interval;
	var totalTime = 0;
	var loadEventTriggered = false;

	var loaded = function() {
		hideLoader();

		requestAnimationFrame(function(){
			body.addClass('loader--loaded');
		});

		$('.site-wrapper').one(_endEvent('TransitionEnd'), function(e) {
			if(e.eventPhase > 2)
				return;

			setTimeout(function() {
				body.removeClass('loader--loaded loader--loading');
			}, 600);
		});
	};

	setTimeout(function() {
		if(!loadEventTriggered) {
			loaded();
		}
	}, 4000);

	$(window).one('load', function() {
		loadEventTriggered = true;

		interval = setInterval(function() {
			totalTime += 50;
			if(totalTime < 4000 && (!window.miniGo.videoReady || !window.miniGo.clockReady))
				return;

			clearInterval(interval);

			loaded();

		}, 50);
	});


	// LOADER STYLES

	// Apply Loader Animation Color
	if (miniGoOptions.loader.loaderAnimationColor) {
		$('.loader-animation').css({ color : miniGoOptions.loader.loaderAnimationColor});
	}

	// Apply Loader Animation Class to body
	switch (miniGoOptions.navigation.loaderAnimationStyle) {
		case 'dots':
			$('body').addClass('loader--dots');
			break; 
		case 'spinner':
			$('body').addClass('loader--spinner');
			break;
		case 'progress-bar':
			$('body').addClass('loader--progress-bar');
			break;
	}
	
	// Apply Loader Background Color
	if (miniGoOptions.loader.loaderBackgroundColor) {
		$('.loader').css({ "background-color" : miniGoOptions.loader.loaderBackgroundColor});
	}

	// Apply No Intro Animation Class
	if (!miniGoOptions.loader.loaderAnimatedIntro) {
			$('body').addClass('loader--no-animation');
	}

}());
/** Gradients Overlay Class
 ** =======================
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

+(function() {
    var loader = $('.loader');
    var body = $('body');

    // Apply a certain preset skin
    switch (miniGoOptions.skin) {
        case 'skin-1':
            body.addClass('skin-1');
            break;
        case 'skin-2':
            body.addClass('skin-2');
            break;
        case 'skin-3':
            body.addClass('skin-3');
            break;
        case 'skin-4':
            body.addClass('skin-4');
            break;
        case 'skin-5':
            body.addClass('skin-5');
            break;
        case 'skin-6':
            body.addClass('skin-6');
            break;
        case 'skin-7':
            body.addClass('skin-7');
            break;
        case 'skin-8':
            body.addClass('skin-8');
            break;
        case 'skin-9':
            body.addClass('skin-9');
            break;
        case 'skin-10':
            body.addClass('skin-10');
            break;
        case 'skin-11':
            body.addClass('skin-11');
            break;
        case 'skin-12':
            body.addClass('skin-12');
            break;
    }

    // body.addClass('loader--loading');

    // Apply Loader Gradient
    var loaderAgent;
    if( navigator.userAgent.match(/firefox/i) ) {
        loaderAgent = '-moz-linear-gradient('+miniGoOptions.loader.loaderGradient.angle+'deg, '+miniGoOptions.loader.loaderGradient.color1+', '+miniGoOptions.loader.loaderGradient.color2+' )';
    }
    else if( navigator.userAgent.match(/Chrome/) || navigator.userAgent.match(/Safari/) ) {
        loaderAgent = 'linear-gradient('+miniGoOptions.loader.loaderGradient.angle+'deg, '+miniGoOptions.loader.loaderGradient.color1+', '+miniGoOptions.loader.loaderGradient.color2+' )';
    }

    if( loader && miniGoOptions.loader.loaderGradient.color1 !== '' && miniGoOptions.loader.loaderGradient.color2 !== '' && miniGoOptions.loader.loaderGradient.angle !== '' ) {
        loader.css({background: loaderAgent});
    }

    var gradientBGAgentBackground;
    if( navigator.userAgent.match(/firefox/i) ) {
        gradientBGAgentBackground = '-moz-linear-gradient('+miniGoOptions.background.gradientBackground.bgAngle+'deg, '+miniGoOptions.background.gradientBackground.bgColor1+', '+miniGoOptions.background.gradientBackground.bgColor2+' )';
    }
    else if( navigator.userAgent.match(/Chrome/) || navigator.userAgent.match(/Safari/)  ) {
        gradientBGAgentBackground = 'linear-gradient('+miniGoOptions.background.gradientBackground.bgAngle+'deg, '+miniGoOptions.background.gradientBackground.bgColor1+', '+miniGoOptions.background.gradientBackground.bgColor2+' )';
    }

    // Apply Background Gradient
    if( miniGoOptions.background.gradientBackground.bgColor1 !== '' && miniGoOptions.background.gradientBackground.bgColor2 !== '' && miniGoOptions.background.gradientBackground.bgAngle !== '' ) {
        $('.gradient-bg--wrapper').css({background: gradientBGAgentBackground});
        if( miniGoOptions.background.gradientBackground.opacity !== '' ) {
            $('.gradient-bg--wrapper').css({opacity: miniGoOptions.background.gradientBackground.opacity});
        }
    }
    else {
        $('.gradient-bg--wrapper').remove();
    }

    var hideLoader = function() {
        loader.on(_endEvent('TransitionEnd'), function(e) {
            if(e.eventPhase > 2)
                return;

            body.trigger('miniGo.ready');
            loader.css({
                display: 'none'
            });
        });

        if(!Modernizr.csstransitions) {
            loader.trigger('transitionend');
        }

        setTimeout(function() {
            requestAnimationFrame(function(){
                // loader.css({
                //  opacity: 0
                // });
            });
        }, 10);
    };

    var interval;
    var totalTime = 0;
    var loadEventTriggered = false;

    var loaded = function() {
        hideLoader();

        requestAnimationFrame(function(){
            body.addClass('loader--loaded');
        });

        $('.site-wrapper').one(_endEvent('TransitionEnd'), function(e) {
            if(e.eventPhase > 2)
                return;

            setTimeout(function() {
                body.removeClass('loader--loaded loader--loading');
            }, 600);
        });
    };

    setTimeout(function() {
        if(!loadEventTriggered) {
            $(window).off('load.minigoLoader');
            loaded();
        }
    }, 4000);

    $(window).one('load.minigoLoader', function() {
        loadEventTriggered = true;

        interval = setInterval(function() {
            totalTime += 50;
            if(totalTime < 800 && (!window.miniGo.videoReady || !window.miniGo.clockReady)) {
                return;
            }

            clearInterval(interval);

            loaded();

        }, 50);
    });

}());
/** Countdown Class
 ** ===============
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

var clock;
+function ($) {
    'use strict';

    // Grab the current date
    var currentDate = new Date();

    var targetDate = miniGoOptions.countdown.targetDate;
    var startDate = miniGoOptions.countdown.startDate;

    // Calculate the difference in seconds between the future and current date
    var diff = targetDate.getTime() / 1000 - currentDate.getTime() / 1000;

    if(diff < 0) {
        diff = 0;
    }
    var days = diff / 60 / 60 / 24;

    if(Math.floor(days) > 99) {
        $('body').addClass('over-99-days');
    }

    var charts = false,
    lastHours,
    lastMinutes;

    clock = $('.clock');

    if(clock.hasClass('clock-alt')) {
        charts = true;
        // New Flipper: We can add markup before or after, but can't append for some reason. 
        clock.append('<div class="chart chart-days" data-percent="100"></div>'+
                    '<div class="chart chart-hours" data-percent="100"></div>'+
                    '<div class="chart chart-minutes" data-percent="100"></div>'+
                    '<div class="chart chart-seconds" data-percent="100"></div>');
        
        var chartHours = $('.chart-hours'),
        chartMinutes = $('.chart-minutes'),
        chartSeconds = $('.chart-seconds'),
        chartClock = $('.clock-alt'),
        chartColor = chartClock.attr('data-chart-color'),
        chartWidth = chartClock.attr('data-chart-width'),
        chartBar = chartClock.attr('data-chart-bar');
        
        if( !chartColor ) { chartColor = false }
        if( !chartBar ) { chartBar = '#fff' }
        if( !chartWidth ) { chartWidth = 6 }

        $('.chart').easyPieChart({
            scaleColor: false,
            trackColor: chartColor,
            barColor: chartBar,
            lineWidth: chartWidth,
            lineCap: 'butt',
            size: 125,
            animate: 800
        });
    } else {
        clock.append('<div class="clock-progress"></div>');
    }

    var getPercentage = function() {
	   var percentage = 100 - (diff / ((targetDate.getTime() / 1000 - startDate.getTime() / 1000) / 100));
	   return percentage;
    };

    var updateProgress = function() {
        requestAnimationFrame(function() {
            if(charts) {
                $('.chart-days').data('easyPieChart').update(getPercentage());
            } else {
                $('.clock-progress').css('padding-right', 100 - getPercentage() + '%');
            }
        });
    };

    $('body').on('miniGo.ready', function() {
        setTimeout(updateProgress, 1000);
        setInterval(updateProgress, 30000);
    });

    // Instantiate a coutdown FlipClock
    FlipClock.Timer.prototype._setInterval = function(callback) {
    	var t = this;

        var flipclockTimer = function() {
            t._interval(callback);
        };

		t.timer = setInterval(function() {
            cancelAnimationFrame(flipclockTimer);
			requestAnimationFrame(flipclockTimer);
		}, this.interval);
    };

    clock = clock.FlipClock(diff, {
        clockFace: 'DailyCounter',
        countdown: true,
        callbacks: {
            start: function() {
                window.miniGo.clockReady = true;

                var labels = clock.data('labels');

                if(typeof labels !== 'undefined' && labels.length) {
                    labels = labels.split(',');
                    var labelElements = $('.flip-clock-label');

                    if(labels.length && labelElements.length) {
                        for (var i=0;i<labels.length;i++) {
                            $(labelElements[i]).text(labels[i].trim());
                        }
                    }
                }

                clock.addClass('flip-clock-started');

                 $('.clock ul').on(_endEvent('AnimationEnd'), function(e) {
                     e.stopPropagation();
                     e.stopImmediatePropagation();
                     e.preventDefault();
                 });
            },
            interval: function() {
                if (!charts || !window.miniGo.ready) {
                    return;
                }
                var toUpdate = clock.time.getHours(true);

                if(toUpdate !== lastHours) {
                    lastHours = toUpdate;
                    chartHours.data('easyPieChart').update(Math.round(lastHours/(23/100)));
                }

                toUpdate = clock.time.getMinutes(true);
                if(toUpdate !== lastMinutes) {
                    lastMinutes = toUpdate;
                    chartMinutes.data('easyPieChart').update(Math.round(lastMinutes/(59/100)));
                }

                chartSeconds.data('easyPieChart').update(Math.round(clock.time.getSeconds(true)/(59/100)));
            }
        }
    });

}(jQuery);
/** Audio Player Class
 ** ==================
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */


var audioTrack = function () {
    var source = miniGoOptions.audio.src;
    // Check if audio source is set before moving any further
    if (source !== '') {
        var volume = miniGoOptions.audio.volume,
            loop = miniGoOptions.audio.loop ? 'loop' : '',
            autoplay = miniGoOptions.audio.autoPlay ? 'autoplay' : '',
            controls = miniGoOptions.audio.displayControls,
            name = miniGoOptions.audio.trackName,
            holderid = 'audio-track',
            playerid = 'audio-player',
            audioPlayer = '#'+playerid;

        // Build Player code and append to body then set the volume
        var playerCode = '<div id="'+holderid+'"><audio id="'+playerid+'" '+loop+' '+autoplay+'><source src="'+source+'"></source></audio></div>';
        $("body").append(playerCode);
        $(audioPlayer).prop('volume', volume);

        // Display Controls
        if (controls) {

            // Add the controls to the social nav
            var controlsCode = '<a href="javascript:void(0);" class="setup-audio" title="'+name+'"><div class="audio-icons"><i class="icon-play fa fa-play"></i><i class="icon-pause fa fa-pause"></div></i></a>';
            $('.nav-social').append(controlsCode);

            // Add the controls to the icon menu shortcode if it exists
            if ($('.icon-menu').length != 0) {
                $('.icon-menu').append(controlsCode);
            }

            // Set the control display to on load pause if autoplay is on
            if(autoplay) {
                $('.setup-audio').removeClass('play pause').addClass('pause');
            } else {
                $('.setup-audio').removeClass('play pause').addClass('play');
            }

            // Setup Audio Controls
            $('.setup-audio').on('click', function() {
                if( !document.getElementById(playerid).paused ) {
                    document.getElementById(playerid).pause();
                    $('.setup-audio').removeClass('play pause').addClass('play');
                }
                else {
                    document.getElementById(playerid).play();
                    $('.setup-audio').removeClass('play pause').addClass('pause');
                }
            });

        }
    }
};
audioTrack();
/** Navigation Class
 ** ================
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

 +(function() {
    "use strict";

    var marginSize = 0;
    var marginAmount = 0;
    // var marginAmount = $('.nav-right').outerHeight();

    var currentPage,
    currentPageOffset,
    currentPageSize = {},

    nextPage,
    nextPageSize = {},

    wrapper = $('.site-wrapper'),

    classesToClear = 'site-page--' + ['go-right', 'come-right', 'go-left', 'come-left', 'reset'].join(' site-page--');

    var ie10 = false;
    if (navigator.appVersion.indexOf('MSIE 10') !== -1) {
        ie10 = true;
    }

    var centerPages = function() {
        var pages = [currentPage, nextPage];
        var h;
        var wH = window.innerHeight;
        var padding = parseInt(wrapper.css('padding-top').replace('px'));

        for (var i = 0; i < pages.length; i++) {
            h = pages[i].outerHeight();

            if ((h / 2) - (wH / 2) + padding < 0) {
                if (ie10) {
                    pages[i].css({
                        marginTop: (wH / 2) - padding
                    });
                }
            } else {
                if (ie10) {
                    pages[i].css({
                        marginTop: h / 2
                    });
                } else {
                    pages[i].css({
                        marginTop: (h / 2) - (wH / 2) + padding
                    });
                }
            }
        }
    };

    var accountForScroll = function() {
        if (currentPage.hasClass('site-front')) {
            var pages = [nextPage];
        } else {
            var pages = [currentPage, nextPage];
        }
        var h;
        var wH = window.innerHeight;
        var padding = parseInt(wrapper.css('padding-top').replace('px'));

        for (var i = 0; i < pages.length; i++) {
            h = pages[i].outerHeight();

            if ((h / 2) - (wH / 2) + padding < 0) {
                if (ie10) {
                    pages[i].css({
                        marginTop: (wH / 2) - padding
                    });
                }
            } else {
                if (ie10) {
                    pages[i].css({
                        marginTop: h / 2
                    });
                } else {
                    pages[i].css({
                        marginTop: (h / 2) - (wH / 2) + padding
                    });
                }
            }
        }
    },

    showPage = function() {

        if (miniGoOptions.navigation.navType !== 'one-page') {

            currentPage = $('.site-page--active');
            var animationEndExecuted = false;

            if (!Modernizr.cssanimations) {
                onAnimationStart();
                nextPage.addClass('site-page--active');
                currentPage.removeClass('site-page--active');
                onAnimationEnd();
                return;
            }

            nextPage.add(currentPage).css({
                'animation-play-state': 'paused',
                '-webkit-animation-play-state': 'paused',
            });

            requestAnimationFrame(function() {
                onAnimationStart();
            });


            currentPage.on(_endEvent('AnimationEnd'), function(e) {
                e.stopPropagation();
                e.preventDefault();

                if (e.eventPhase > 2)
                    return;

                currentPage.removeClass(classesToClear + ' site-page--active').css('margin-top', '');


                if (!animationEndExecuted) {
                    animationEndExecuted = true;
                } else {
                    onAnimationEnd();
                }
            });
            nextPage.on(_endEvent('AnimationEnd'), function(e) {
                e.stopPropagation();
                e.preventDefault();

                if (e.eventPhase > 2)
                    return;

                nextPage.addClass('site-page--active').css('margin-top', '').removeClass(classesToClear);

                if (nextPage.hasClass('site-front')) {
                    nextPage.removeClass('site-page--went-right site-page--went-left');
                }

                if (!animationEndExecuted) {
                    animationEndExecuted = true;
                } else {
                    onAnimationEnd();
                }
            });

            accountForScroll();

            var centerFrontPageRAF;
            var centerFrontPage = function() {
                var h = currentPage.outerHeight();
                var wH = window.innerHeight;
                var scroll = $(window).scrollTop();
                var offset = ((wH - h) / 2) + h / 2 + scroll;
                var padding = parseInt(wrapper.css('padding-top').replace('px'));

                if (offset < (h / 2) + padding) {
                    offset = (h / 2) + padding;
                }

                cancelAnimationFrame(centerFrontPageRAF);

                centerFrontPageRAF = requestAnimationFrame(function() {
                        // currentPage.css({ top: offset + 'px' }); // Removed to fix Shop Scrolling

                        wrapper.css({ 'perspective-origin': '50%' + offset + 'px', '-webkit-perspective-origin': '50%' + offset + 'px' });
                    });

            };

            $(window).on('resize.centerFrontPage, scroll.centerFrontPage', centerFrontPage);

            requestAnimationFrame(function() {
                if (nextPage.hasClass('site-front')) {
                    currentPage.addClass('site-page--reset');
                    nextPage.addClass('site-page--reset');

                    $(window).off('resize.centerFrontPage, scroll.centerFrontPage');
                    nextPage.css('top', '');
                    wrapper.css({ 'perspective-origin': '', '-webkit-perspective-origin': '' })
                } else if (nextPage.hasClass('site-page--from-left')) {
                    currentPage.addClass('site-page--go-right site-page--went-right');
                    centerFrontPage();
                    nextPage.addClass('site-page--come-right');
                } else if (nextPage.hasClass('site-page--from-right')) {
                    currentPage.addClass('site-page--go-left site-page--went-left');
                    centerFrontPage();
                    nextPage.addClass('site-page--come-left');
                }
            });


            requestAnimationFrame(function() {
                nextPage.add(currentPage).css({
                    'animation-play-state': '',
                    '-webkit-animation-play-state': '',
                });
            });
        }

    },

    onAnimationStart = function() {
        wrapper.css({
            'webkit-transform': '',
            'transform': '',
            '-webkit-perspective': '1500px',
            'perspective': '1500px',
        }).data('disableNav', 1);

        var navClose = $('.nav-close');

        $('body, html').css("overflow", "hidden");

        $('.nav-hidden').off(_endEvent('TransitionEnd'));
        $('.nav-left:not(.nav-hidden), .nav-right:not(.nav-hidden)').one(_endEvent('TransitionEnd'), function(e) {
            e.stopPropagation();
            e.preventDefault();

                // $(this).css('visibility', 'hidden');
                $(this).addClass('nav--hidden');
                
            });


        if (currentPage.hasClass('site-front')) {
            requestAnimationFrame(function() {
                navClose.hide().css('-webkit-transition', 'none').removeClass('nav-left-close nav-right-close').addClass('nav-hidden');
                    // navClose.hide().css('-webkit-transition', 'none').removeClass('nav-left nav-right').addClass('nav-hidden');

                    if (nextPage.hasClass('site-page--from-left')) {
                        navClose.addClass('nav-left-close');
                        // navClose.addClass('nav-left');
                    } else {
                        navClose.addClass('nav-right-close');
                        // navClose.addClass('nav-right');
                    }
                });

            requestAnimationFrame(function() {
                    // navClose.show().css('visibility', 'visible');
                    navClose.show().removeClass('nav--hidden');
                });

            setTimeout(function() {
                requestAnimationFrame(function() {
                    $('.nav-left:not(.nav-close), .nav-right:not(.nav-close)').addClass('nav-hidden');

                    setTimeout(function() {
                        requestAnimationFrame(function() {
                            navClose.one(_endEvent('TransitionEnd'), function(e) {
                                e.stopPropagation();
                                e.preventDefault();

                                if (e.eventPhase > 2)
                                    return;

                                navClose.data('disableNav', 0);
                            }).css('-webkit-transition', '').removeClass('nav-hidden');

                            if (!Modernizr.csstransitions) {
                                navClose.data('disableNav', 0);
                            }
                        });
                    }, 300);
                });
            }, 10);
        } else {
                // $('.nav-left, .nav-right').show().css('visibility', 'visible');
                $('.nav-left, .nav-right').show().removeClass('nav--hidden');

                setTimeout(function() {
                    requestAnimationFrame(function() {
                        var navs = $('.nav-hidden');
                        navClose.addClass('nav-hidden');

                        setTimeout(function() {
                            requestAnimationFrame(function() {

                                navs.one(_endEvent('TransitionEnd'), function(e) {
                                    e.stopPropagation();
                                    e.preventDefault();

                                    if (e.eventPhase > 2)
                                        return;

                                    navs.data('disableNav', 0);
                                }).removeClass('nav-hidden');

                                if (!Modernizr.csstransitions) {
                                    navs.data('disableNav', 0);
                                }
                            });
                        }, 300);
                    });
                }, 10);
            }
        },

        onAnimationEnd = function() {
            $('body, html').css("overflow", "");

            var frontPageScroller;
            $(window).on('scroll', function() {
                var page = $('site-page--went-left, .site-page--went-right');
                if (!page.length) {
                    return;
                }


            });

            wrapper.data('disableNav', 0);

            if (nextPage.hasClass('site-front')) {
                wrapper.css({
                    'webkit-transform': 'translate(0,0)',
                    'transform': 'translate(0,0)',
                    '-webkit-perspective': 'none',
                    'perspective': 'none',
                });
            }

            nextPage.add(currentPage).off(_endEvent('AnimationEnd'));

            setTimeout(function() {
                fitIcons();
            }, 100);
        };


    // $('.nav-left, .nav-right').css('visibility', 'visible');
    $('.nav-left, .nav-right').removeClass('nav--hidden');


    $('.site-page__trigger').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var el = $(this);

        // console.log("Registering Click");

        // Hash Urls
        if (miniGoOptions.navigation.hashUrls == true) {
                history.pushState({}, "", this.href);
        }

        if (miniGoOptions.navigation.navType == 'one-page') {
            var target = this.hash,
            $target = $(target);

            $(document).off("scroll");

            // Remove any active class from menu items
            $('.nav-left a, .nav-left a').each(function () {
                $(this).removeClass('active');
            })
            // Add active class to clicked menu item
            $(this).addClass('active');

            // Scroll the page
            $('html, body').stop().animate({
                scrollTop: $target.offset().top - marginAmount
            }, 600, function() {
                // $(document).on("scroll", onScroll);
            });

        } else {
            if (wrapper.data('disableNav') || el.data('disableNav'))
                return false;

            $('.site-page__trigger .site-page__close').data('disableNav', 1);

            nextPage = $(el.attr('href'));

            if (nextPage.length == 0)
                return;

            if ($(document).scrollTop() > 1) {
                $('body').animate({
                    scrollTop: 0
                }, 'fast', function() {
                    setTimeout(function() {
                        showPage();
                    }, 10);
                });
            } else {
                showPage();
            }
        }


        $('.site-front').on('click.backToFrontPage', function(e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            $('.nav-close').addClass('nav--hidden');
            console.log("Triggering Close X");
            if (wrapper.data('disableNav'))
                return false;

            $('.site-page__close').trigger('click');
            console.log("Triggering Close");
        });
    });

    // unction to activate Menu Items on Scroling.
    function onScroll(event){
        var scrollPosition = $(document).scrollTop();
        $('.site-page__trigger').each(function () {
            var currentLink = $(this);
            var refElement = $(currentLink.attr("href"));
            if (refElement.position().top <= scrollPosition && refElement.position().top + refElement.height() > scrollPosition) {
                currentLink.addClass("active");
            }
            else{
                currentLink.removeClass("active");
            }
        });
    }

    $('.site-page__close').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        if (miniGoOptions.navigation.hashUrls == true) {
            window.location.hash = '';
        }

        if (wrapper.data('disableNav') || $(this).data('disableNav'))
            return false;

        $('.site-page__trigger .site-page__close').data('disableNav', 1);

        $('.site-front').off('click.backToFrontPage');

        //$('.site-page__trigger').removeClass('disableNav');

        nextPage = $('.site-front');

        if (nextPage.length == 0)
            return;

        if ($(document).scrollTop() > 1) {
            $('body').animate({
                scrollTop: 0
            }, 'fast', function() {
                setTimeout(function() {
                    showPage();
                }, 10);
            });
        } else {
            showPage();
        }
    });


    $(document).on("mouseover", ".ecwid-minicart", function(){
        $(".ecwid-minicart-clickArea").on("click", function(){
            if(!$(".ecwid").parents(".site-page").hasClass("site-page--active")){
                var shopPage = $(".ecwid").parents(".site-page").attr("id");
                // Look for any close button (if close button exist click it because user is not on home page)
                
                    $(".nav-close:not(.nav-close.nav-hidden)").find(".site-page__close").trigger("click")
                    console.log(this)
                $("a[href='#"+shopPage+"']").first().trigger("click");
            }
            else{
                console.log(".shop page is already active: " + shopPage);
                return
            }

        });
    });
    // console.log("Click event added to the bag");

    // One Page Functionality
    if (miniGoOptions.navigation.navType == 'one-page') {
        $('body').addClass('one-page');
        // $('.site-to__top').addClass('active');

        onePageScrollToTop();

    }

    function onePageScrollToTop() {
        $('.site-to__top').on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 600);
            return false;
        });
    }

    // When Scrolling
    $(window).scroll(function() {
        // Show or hide Scroll to Top
        if ($(window).scrollTop() >= 250) {
            $('.site-to__top').addClass('active');

        } else {
            $('.site-to__top').removeClass('active');
        }
        // Apply active class to the corresponding menu item
        if ( miniGoOptions.navigation.navType == 'one-page' ) {
            onScroll();
        }
    });


    // Enable Hash Urls
    if (miniGoOptions.navigation.hashUrls == true) {
        var hash = window.location.hash;

        if (hash) {
            $('.nav-left a[href="' + hash + '"], .nav-right a[href="' + hash + '"]').trigger('click');
        }
    }

    // Add Top Nav Style Vertical Margin
    $(window).on('resize', function() {
        // Apply Top Margin in Desktop View if Navigation position is Top and orientation is Horizontal
        marginSize = 0;
       if ( miniGoOptions.navigation.navType == 'one-page' &&  $('.navigation').not('.navigation-small').not('.navigation--vertical').hasClass('navigation--top') && ( $(window).innerWidth() >= 1220 ) ) {
            marginSize = Math.max($('div.nav-right').outerHeight(), $('div.nav-left').outerHeight());
            marginAmount = marginSize;
            $('.site-front').css('margin-top', marginSize);
        }
        // Apply Top Margin in Mobile View
       if ( miniGoOptions.navigation.navType == 'one-page' && !$('.navigation-small').hasClass('.nav--hidden') && ( $(window).innerWidth() < 1220 ) ) {
            marginSize = $('.navigation-small .nav-left').outerHeight();
            marginAmount = marginSize;
            $('.site-front').css('margin-top', marginSize);
        }
        if ( miniGoOptions.navigation.navType == 'one-page' ) {
            onScroll();
        }
        // Scroll to the active section.
        // $('html, body').stop().animate({
        //     scrollTop: $target.offset().top - marginAmount
        // }, 600);

	});


}())

/** Form Ajax Class
 ** ===============
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

+(function () { "use strict";

$("form.form-ajax").append('<input type="text" style="position: absolute; left: -9999em;" name="important-info2">');

	$("form.form-ajax").each(function() {
		$(this).validate({
			submitHandler: function(form, e) {
				e.preventDefault();

				form = $(form);

				form.removeClass('form--failed form--success').addClass('form--submitted');

				form.find('[type="submit"]').attr('disabled', 'disabled');

				$.post(form.prop('action'), form.serialize(), function(data, e) {
					form.removeClass('form--submitted');

					if(data.toString().indexOf(form.data('success-response')) === -1) {
						form.addClass('form--failed');

						form.trigger('submitFailed');

						return false;
					}

					form.find('[type="submit"]').removeAttr('disabled');
					form.addClass('form--success');
					form.trigger('submitSucceeded');
					form[0].reset();
				}, 'text');

				return false;
			}
		});
	});
}());
/** Form Flip Class
 ** ===============
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

+(function () { "use strict";

	$('.form-flip').each(function() {
		var container = $(this);
		container.addClass('disableTransforms');

		container.children().on(_endEvent('AnimationEnd'), function(e) {
			e.preventDefault();
			e.stopPropagation();

			window.requestAnimationFrame(function() {
				container.removeClass('disableTransforms')//.addClass('disableTransforms');
			});
		});

		container.children('.form-flip__enabler').click(function(e) {
			e.preventDefault();
			e.stopPropagation();

			container.removeClass('disableTransforms');
			container.addClass('form-flip--enabled');
		});

		container.children('.form-flip__close').click(function(e) {
			e.preventDefault();
			e.stopPropagation();

			container.removeClass('disableTransforms');

			container.one(_endEvent('AnimationEnd'), function(e) {
				e.stopPropagation();
				container.hide();
			});

			container.addClass('form-flip--closed');

		});

		container.find('form').on('submitSucceeded', function() {
			container.removeClass('disableTransforms');
			container.addClass('form-flip--success');
		});
	});

}());
/** Icons Class
 ** ===========
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

var fitIcons;

+(function () {
	"use strict";

    var timer;

	fitIcons = function() {
		var page = $('.site-page--active');

        if(typeof page === "undefined" || !page.length ) {
            timer = setTimeout(fitIcons, 100);
            return;
        }

		var nav = $('.nav-social');
        var mainNav = $('.nav-left, .nav-right, .nav-close');

        requestAnimationFrame(function() {

			if( window.innerHeight - page.outerHeight() <= 108 * 2 ) {
				if (miniGoOptions.navigation.navType != 'one-page') {
					// nav.addClass('nav--small');
				}

	            if(window.innerWidth < 1220) {
				// console.log("Here  A ");
					// nav.addClass('nav--small');
	                // mainNav.addClass('nav--small');
	            } else {
					// nav.removeClass('nav--small');
	                // mainNav.removeClass('nav--small');
	            }
			} else {
				// nav.removeClass('nav--small');
	            // mainNav.removeClass('nav--small');
			}
			if( $('body').hasClass('navigation--top') ) {
			    // mainNav.addClass('nav--small'); // Add another class here.
			}
		});
	}


	$(window).resize(function() {
		clearTimeout(timer);
		timer = setTimeout(fitIcons, 100);
	}).one('ready load miniGo.ready', fitIcons);


	// Counter Features Text
	$(".counter-features-number").fitText(1.2, { minFontSize: '60px', maxFontSize: '60px' });
	// Counter
	$('.counter-features-number').counterUp({
        delay: 10,
        time: 1500
    });

	// Fix Icon Label Going off screen
	// $(".nav-social a ::after").each( function() {
	// 	// if(this.is(':offscreen')) {
	// 	// 	console.log(this);
	// 	// }
	// });

	// $(".nav-social a").hover( function() {
	// 	var offset = $(this).after().width();

	// });




}())
/** Video Background Class
 ** ======================
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

var loopVideo = miniGoOptions.background.video.loop;

if (loopVideo) {
    var loopVideoNum = 1;
} else {
    var loopVideoNum = 0;
}

var onYouTubeIframeAPIReady;

+(function() {
    'use strict';

    if(miniGoOptions.background.type !== 'video') {
        return;
    }

    var videoOptions = miniGoOptions.background.video,
    wrapper = $('<div id="video-container"></div>'),
    poster = videoOptions.imageFallback,
    volume = videoOptions.volume;

    if (videoOptions.source === 'vimeo') {
        // poster = false;
        wrapper.appendTo('body');
    }

    if(poster.length) {
        wrapper.css({backgroundImage: 'url(' + poster + ')'});
    }

    var init = function() {
        if(Modernizr.touch) {
            wrapper.appendTo('body');
            return;
        }

        switch(videoOptions.source)
        {
        case 'local':
            loadLocal();
            break;

        case 'youtube':
            loadYoutube();
            break;

        case 'vimeo':
            loadVimeo();
            break;
        }
    };
    console.log(poster);
    console.log(wrapper);

    var loadLocal = function() {
        if (loopVideo) {
            var video = $('<video autoplay loop class="fillWidth">').appendTo(wrapper);
        } else {
            var video = $('<video autoplay class="fillWidth">').appendTo(wrapper);
        }

        var sourceTemplate = '<source src="{file}" type="video/{type}">';


        for(var file in videoOptions.localFiles) {
            video.append(sourceTemplate.replace('{file}', videoOptions.localFiles[file]).replace('{type}', file));
        }

        video.children().last().add(video).on('error', function(e) {
            e.stopPropagation();
            video.children().unwrap();
            window.miniGo.videoReady = true;
        });

        if(typeof video[0].volume !== 'undefined') {
            video[0].volume = volume / 100;
        } else {
            window.miniGo.videoReady = true;
        }

        video.on('canplay', function() {
            window.miniGo.videoReady = true;
        });

        if(videoOptions.localFiles.mp4.length) {
            var videoPath = videoOptions.localFiles.mp4;

            if(typeof window.minigoSwfURLPrefix === 'undefined') {
                var minigoSwfURLPrefix = '';
            } else {
                var minigoSwfURLPrefix = window.minigoSwfURLPrefix;
            }

            var flashTemplate = '<object class="fillWidth">' +
                                    '<param name="movie" value="' + minigoSwfURLPrefix + 'inc/StrobeMediaPlayback.swf"></param>' +
                                    '<param name="flashvars" value="src={file}&loop=true&autoPlay=true&playButtonOverlay=false&scaleMode=zoom&controlBarMode=none&volume={volume}&bufferingOverlay=false&poster={poster}"></param>' +
                                    '<param name="allowFullScreen" value="true"></param>' +
                                    '<param name="allowscriptaccess" value="always"></param>' +
                                    '<param name="wmode" value="direct"></param>' +
                                    '<embed class="fillWidth" src="' + minigoSwfURLPrefix + 'inc/StrobeMediaPlayback.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="opaque" flashvars="src={file}&loop=true&autoPlay=true&playButtonOverlay=false&scaleMode=zoom&controlBarMode=none&volume={volume}&bufferingOverlay=false&poster={poster}"></embed>' +
                                '</object>';

            if(videoPath.indexOf('://') == -1) {
                videoPath = encodeURIComponent(getFileUrl(videoPath));
            }


            video.append(
                flashTemplate
                    .replace(/\{file\}/g, videoPath)
                    .replace(/\{poster\}/g, encodeURIComponent(getFileUrl(poster)))
                    .replace(/\{volume\}/g, volume / 100)
            );
        }

        wrapper.appendTo('body');
    };

    var loadYoutube = function () {
        var youtubeWrap = $('<div id="youtubeWrap" class="fillWidth"></div>').appendTo(wrapper);
        wrapper.appendTo('body');

        // 2. This code loads the IFrame Player API code asynchronously.
        var tag = $('<script></script>');

        $('body').append(tag.attr('src', 'https://www.youtube.com/iframe_api'));

        var params = getUrlParams(videoOptions.youtube.url);

        var videoSize = getFillSize();

        youtubeWrap.css({
            width: videoSize.width,
            height: videoSize.height
        });

        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads. showinfo=0&controls=0&autohid=1 
        var player;
        onYouTubeIframeAPIReady = function() {
            player = new YT.Player('youtubeWrap', {
                width: videoSize.width,
                height: videoSize.height,
                videoId: params.v ? params.v : '',
                playerVars: {
                    autoplay: 1,
                    controls: 0,
                    enablejsapi: 1,
                    loop: loopVideoNum,
                    modestbranding: 1,
                    iv_load_policy: 3,
                    showinfo: 0,
                    autohide: 1,
                    start: videoOptions.youtube.startAt,
                    end: videoOptions.youtube.endAt,
                    listType: 'playlist',
                    list: params.list ? params.list : '',
                    wmode: "opaque",
                    origin: window.location.origin
                },

                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        console.log(player);
        };

        // 4. The API will call this function when the video player is ready.
        var onPlayerReady = function() {
            youtubeWrap = $('#youtubeWrap');

            player.setVolume(volume);
        };

        // 5. The API calls this function when the player's state changes.
        //    The function indicates that when playing a video (state=1),
        //    the player should play for six seconds and then stop.
        // var done = false;
        var onPlayerStateChange = function(event) {
            if (!params.list && event.data === YT.PlayerState.ENDED) {
                player.playVideo();
            }
            if(event.data === YT.PlayerState.PLAYING) {
                window.miniGo.videoReady = true;
            }
        };

        var timeoutYoutube;
        $(window).on('resize.youtube', function() {
            clearTimeout(timeoutYoutube);
            timeoutYoutube = setTimeout(function() {
                var videoSize = getFillSize();
                youtubeWrap.css({
                    width: videoSize.width,
                    height: videoSize.height
                });
            }, 100);
        });
    };

    var loadVimeo = function () {
        var vimeoURL = videoOptions.vimeo.url,
            vimeoVolume = videoOptions.volume,
            videoSize = getFillSize(),
            vimeoApiInsertion = '?api=1&player_id=vimeo&title=0&byline=0&portrait=0&badge=0',
            vimeoSource = vimeoURL + vimeoApiInsertion,
            vimeoStructure = $('<iframe id="vimeo" src="http://player.vimeo.com/video/'+ vimeoSource +'" width="'+ videoSize.width + '" height="'+ videoSize.height +'"frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'),
            vimeoWrap = $('#vimeo');

        $( 'body' ).append( vimeoStructure );

        var iframe = $( '#vimeo' )[0];
        var player = $f( iframe );

        // When the player is ready, add listeners for pause, finish, and playProgress
        player.addEvent( 'ready', function() {
            player.api( 'play', vimeoIsReadyForPlay );
            player.api( 'setVolume', vimeoVolume );
            player.api( 'setLoop', loopVideoNum );
        });

        function vimeoIsReadyForPlay() {
            $('.preloader').hasClass('hidden');
            // console.log ('Vimeo Player Ready');
        }

        var timeoutVimeo;
        $(window).on('resize', function() {
            clearTimeout(timeoutVimeo);
            timeoutVimeo = setTimeout(function() {
                // var videoSize = getFillSize();
                $('#vimeo').css({
                    width: $(window).innerWidth(),
                    height: $(window).innerHeight()
                });
                // console.log($(window).innerWidth());
            }, 100);
        });

    };

    var getFileUrl = function(path) {
        var url = window.location;

        if(path[0] === '/') {
            return url.protocol + '//' + url.host + path;
        }

        var urlPath = url.pathname;
        if(urlPath[urlPath.length - 1] !== '/') {
            urlPath = urlPath.slice(0, urlPath.lastIndexOf('/'));
        }

        return url.protocol + '//' + url.host + urlPath + path;
    };

    var getFillSize = function() {
        var wW = window.innerWidth,
        wH = window.innerHeight,
        wAspect = wW/wH,
        newSize = {};

        if(wAspect < 1.777777) {
            newSize.width = Math.round(16 * (wH / 9));
            newSize.height = wH;
        } else {
            newSize.width = wW;
            newSize.height = Math.round(9 * (wW / 16));
        }

        return newSize;
    };


    var getUrlParams = function(url) {
        var hashPosition = url.indexOf('#');
        var params = url.slice(url.indexOf('?'), hashPosition === -1 ? url.length : hashPosition).substr(1).split('&');

        if (params === "") return {};

        var b = {};
        for (var i = 0; i < params.length; ++i)
        {
            var p=params[i].split('=');
            if (p.length !== 2) {
                continue;
            }
            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, ' '));
        }
        return b;
    };

    init();
}());
/** Google Map Class
 ** ================
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

jQuery(document).ready(function() {
    (function($) {

        // Check if the map is used in the markup, otherwise exit function.
        if(!$("#googleMap").length) {
            return;
        }

        var w_h = $(window).height(),
            w_w = $(window).width(),
            showMap = miniGoOptions.map.showMap,
            coordinates = miniGoOptions.map.coordinates,
            splitCoords = miniGoOptions.map.coordinates.split(','),
            mapStyle = miniGoOptions.map.mapStyle,
            allowDrag = miniGoOptions.map.allowDrag,
            zoomLevel = miniGoOptions.map.zoomLevel,
            wheelZoom = miniGoOptions.map.wheelZoom,
            buttonZoom = miniGoOptions.map.buttonZoom,
            mapType = miniGoOptions.map.mapType,
            streetView = miniGoOptions.map.streetView,
            mapHeight = miniGoOptions.map.mapHeight;

        // var w_h = $(document).height() - 150;
        if (mapHeight != ''){
            $('#googleMap').height(mapHeight);
        }
        // var drag;
        // if ($(window).width() < 768) {
        //     drag = false;
        // } else {
        //     drag = true;
        // }

        function minigo_map() {
            var saturation = -100;
            var markerUrl = miniGoOptions.map.marker;
            // Remove after fixing the options to true!
            // if (wheelZoom === '1') { wheelZoom = true; } else if (wheelZoom === '0') { wheelZoom = false; }

            var styles;
            if (miniGoOptions.map.mapStyle === 'custom') {
                styles = [{
                    "featureType": "landscape",
                    "stylers": [
                        { "hue": "#ff3607" },
                        { "saturation": saturation },
                        { "lightness": 60 },
                        { "gamma": 1 }
                    ]
                }, {
                    "featureType": "transit",
                    "stylers": [
                        { "hue": "#ff3607" },
                        { "saturation": saturation },
                        { "lightness": 0 },
                        { "gamma": 1 }
                    ]
                }, {
                    "featureType": "road.highway",
                    "stylers": [
                        { "hue": "#ff3607" },
                        { "saturation": saturation },
                        { "lightness": 20 },
                        { "gamma": 1 }
                    ]
                }, {
                    "featureType": "road.arterial",
                    "stylers": [
                        { "hue": "#ff3607" },
                        { "saturation": saturation },
                        { "lightness": 20 },
                        { "gamma": 1 }
                    ]
                }, {
                    "featureType": "road.local",
                    "stylers": [
                        { "hue": "#ff3607" },
                        { "saturation": saturation },
                        { "lightness": 50 },
                        { "gamma": 1 }
                    ]
                }, {
                    "featureType": "water",
                    "stylers": [
                        { "hue": "#ff3607" },
                        { "saturation": saturation },
                        { "lightness": 15 },
                        { "gamma": 1 }
                    ]
                }, {
                    "featureType": "poi",
                    "stylers": [
                        { "hue": "#ff3607" },
                        { "saturation": saturation },
                        { "lightness": 25 },
                        { "gamma": 1 }
                    ]
                }];
            } else if (mapStyle === 'normal') {
                styles = null;
            }

            var latlng = new google.maps.LatLng(splitCoords[0], splitCoords[1]);
            var map_options = {
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                draggable: allowDrag,
                zoom: zoomLevel,
                zoomControl: buttonZoom,
                scrollwheel: wheelZoom,
                mapTypeControl: mapType,
                streetViewControl: streetView,
                styles: styles
            };

            var map = new google.maps.Map(document.getElementById('googleMap'), map_options);

            var points = new google.maps.LatLng(splitCoords[0], splitCoords[1]);
            var marker = new google.maps.Marker({
                position: points,
                map: map,
                icon: markerUrl
            });
            // google.maps.event.addListener(marker, 'click',

            //     function() {
            //         // var infowindow = new google.maps.InfoWindow({
            //         //  content: '<div>We are here !</div>'
            //         // });
            //         // infowindow.open(map,marker);
            //     });
        }

        if (showMap) {
            window.onload = function() {
                minigo_map();
            };
        }

    })(jQuery);

});
/** Gallery Class
 ** =============
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

$(document).ready(function() {

    /** Video Gallery
     ** =============
     */

    var min_w = 300; // minimum video width allowed
    var vid_w_orig; // original video dimensions
    var vid_h_orig;

    jQuery(function() { // runs after DOM has loaded

        vid_w_orig = parseInt(jQuery('iframe').attr('width'));
        vid_h_orig = parseInt(jQuery('iframe').attr('height'));

        jQuery(window).resize(function() { resizeToCover(); });
        jQuery(window).trigger('resize');
    });

    function resizeToCover() {

        // Set the video viewport to the window size
        jQuery('#video-viewport').width(jQuery(window).width());
        jQuery('#video-viewport').height(jQuery(window).height());

        // Use largest scale factor of horizontal/vertical
        var scale_h = jQuery(window).width() / vid_w_orig;
        var scale_v = jQuery(window).height() / vid_h_orig;
        var scale = scale_h > scale_v ? scale_h : scale_v;

        // Don't allow scaled width < minimum video width
        if (scale * vid_w_orig < min_w) { scale = min_w / vid_w_orig; };

        // Scale the video
        jQuery('iframe').width(scale * vid_w_orig);
        jQuery('iframe').height(scale * vid_h_orig);
        // and center it by scrolling the video viewport
        jQuery('#video-viewport').scrollLeft((jQuery('iframe').width() - jQuery(window).width()) / 2);
        jQuery('#video-viewport').scrollTop((jQuery('iframe').height() - jQuery(window).height()) / 2);
    }


    /** PhotoSwipe Lightbox
     ** ===================
     */

    // If we don't use dots and display arrows, fix bottom margin
    if (miniGoOptions.gallery.noDots && miniGoOptions.gallery.arrows) {
        $(".minigo-gallery").css('margin-bottom', '30px');

    }

    var initPhotoSwipeFromDOM = function(gallerySelector) {

        // parse slide data (url, title, size ...) from DOM elements 
        // (children of gallerySelector)

        var parseThumbnailElements = function(el) {

            /*  Extension to photoswipe. 
                First fetch the element clicked on. 
                It is used to set the index later */
            var entryElement = el.querySelectorAll('figure');
            var element = entryElement[0].querySelectorAll('a');
            var firstImage = element[0].getAttribute('href');

            /*  Extension to photoswipe. 
                Now overwrite variable "el" and populate it with DOM data
                from the DIV containing the thumbnails                      */
            var allElm = document.querySelectorAll(gallerySelector);
            var el = allElm[0].querySelectorAll('figure');

            var thumbElements = el,
                numNodes = thumbElements.length,
                items = [],
                figureEl,
                linkEl,
                size,
                item;

            for (var i = 0; i < numNodes; i++) {

                figureEl = thumbElements[i]; // <figure> element


                // Include only element nodes 
                if (figureEl.nodeType !== 1) {
                    continue;
                }

                linkEl = figureEl.children[0]; // <a> element

                size = linkEl.getAttribute('data-size').split('x');

                // Create slide object
                item = {
                    src: linkEl.getAttribute('href'),
                    w: parseInt(size[0], 10),
                    h: parseInt(size[1], 10),
                    /*  Extension to photoswipe. 
                        Extend object ITEM with "start". Set to true when it is the 
                        thumbnail clicked in the browser.
                        Search the source for item.start to see how it is used  */
                    start: linkEl.getAttribute('href') === firstImage ? true : false
                };

                if (figureEl.children.length > 1) {
                    // <figcaption> content
                    item.title = figureEl.children[1].innerHTML;
                }

                if (linkEl.children.length > 0) {
                    // <img> thumbnail element, retrieving thumbnail url
                    item.msrc = linkEl.children[0].getAttribute('src');
                }

                item.el = figureEl; // save link to element for getThumbBoundsFn
                items.push(item);
            }

            return items;
        };
        // End parseThumbnailElements.    

        // Find nearest parent element
        var closest = function closest(el, fn) {
            return el && (fn(el) ? el : closest(el.parentNode, fn));
        };

        // Triggers when user clicks on thumbnail
        var onThumbnailsClick = function(e) {
            e = e || window.event;
            e.preventDefault ? e.preventDefault() : e.returnValue = false;

            var eTarget = e.target || e.srcElement;

            // find root element of slide
            var clickedListItem = closest(eTarget, function(el) {
                return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
            });

            if (!clickedListItem) {
                return;
            }

            // Find index of clicked item by looping through all child nodes
            // alternatively, you may define index via data- attribute
            var clickedGallery = clickedListItem.parentNode,
                childNodes = clickedListItem.parentNode.childNodes,
                numChildNodes = childNodes.length,
                nodeIndex = 0,
                index;

            for (var i = 0; i < numChildNodes; i++) {
                if (childNodes[i].nodeType !== 1) {
                    continue;
                }

                if (childNodes[i] === clickedListItem) {
                    index = nodeIndex;
                    break;
                }
                nodeIndex++;
            }



            if (index >= 0) {
                // Open PhotoSwipe if valid index found
                openPhotoSwipe(index, clickedGallery);
            }
            return false;
        };

        // Parse picture index and gallery index from URL (#&pid=1&gid=2)
        var photoswipeParseHash = function() {
            var hash = window.location.hash.substring(1),
                params = {};

            if (hash.length < 5) {
                return params;
            }

            var vars = hash.split('&');
            for (var i = 0; i < vars.length; i++) {
                if (!vars[i]) {
                    continue;
                }
                var pair = vars[i].split('=');
                if (pair.length < 2) {
                    continue;
                }
                params[pair[0]] = pair[1];
            }

            if (params.gid) {
                params.gid = parseInt(params.gid, 10);
            }

            return params;
        };

        var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
            var pswpElement = document.querySelectorAll('.pswp')[0],
                gallery,
                options,
                items;

            items = parseThumbnailElements(galleryElement);

            // Define options (if needed)
            options = {

                // Define gallery index (for URL)
                galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                getThumbBoundsFn: function(index) {
                    // See Options -> getThumbBoundsFn section of documentation for more info
                    var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                        pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                        rect = thumbnail.getBoundingClientRect();

                    return { x: rect.left, y: rect.top + pageYScroll, w: rect.width };

                }

            };

            // PhotoSwipe opened from URL
            if (fromURL) {
                if (options.galleryPIDs) {
                    // parse real index when custom PIDs are used 
                    // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                    for (var j = 0; j < items.length; j++) {
                        if (items[j].pid == index) {
                            options.index = j;
                            break;
                        }
                    }
                } else {
                    // in URL indexes start from 1
                    options.index = parseInt(index, 10) - 1;
                }
            } else {
                options.index = parseInt(index, 10);
            }

            // Exit if index not found
            if (isNaN(options.index)) {
                return;
            }

            if (disableAnimation) {
                options.showAnimationDuration = 0;
            }

            /*  Extension to photoswipe. 
                Set index with item.start */
            for (var findInd = 0; findInd < items.length; findInd++) {
                if (items[findInd].start) {
                    options.index = findInd;
                    break;
                }
            }

            // Pass data to PhotoSwipe and initialize it
            gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.init();
        };

        // Loop through all gallery elements and bind events
        var galleryElements = document.querySelectorAll(gallerySelector);

        for (var i = 0, l = galleryElements.length; i < l; i++) {
            galleryElements[i].setAttribute('data-pswp-uid', i + 1);
            galleryElements[i].onclick = onThumbnailsClick;
        }

        // Parse URL and open gallery if it contains #&pid=3&gid=1
        var hashData = photoswipeParseHash();
        if (hashData.pid && hashData.gid) {
            openPhotoSwipe(hashData.pid, galleryElements[hashData.gid - 1], true, true);
        }

    };

    // Initialize PhotoSwipe
    if (miniGoOptions.gallery.openImagesInLightbox) {
        initPhotoSwipeFromDOM('.minigo-gallery');
    } else {
        $(".minigo-gallery").on('click', '.hover', function(e) {
            e.preventDefault();
        });
    }

    // Initialize Slick Carousel
    $(".minigo-gallery").slick({
        dots: miniGoOptions.gallery.dots,
        arrows: miniGoOptions.gallery.arrows,
        rows: miniGoOptions.gallery.rows,
        speed: miniGoOptions.gallery.speed,
        infinite: miniGoOptions.gallery.infinite,
        centerMode: miniGoOptions.gallery.centerMode,
        slidesToShow: miniGoOptions.gallery.slidesToShow,
        slidesToScroll: miniGoOptions.gallery.slidesToScroll,
        prevArrow: miniGoOptions.gallery.prevArrow,
        nextArrow: miniGoOptions.gallery.nextArrow,
        responsive: miniGoOptions.gallery.responsive,
        customPaging: miniGoOptions.gallery.customPaging,
        autoplay: miniGoOptions.gallery.autoplay,
        autoplaySpeed: miniGoOptions.gallery.autoplaySpeed,
        rtl: miniGoOptions.pages.enableRTL
    });

});

/** Testimonials Class
 ** =============
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

$(document).ready(function() {

    // Initialize Testimonials Slick Carousel
    $(".testimonials-container").slick({
        dots: miniGoOptions.testimonials.dots,
        arrows: miniGoOptions.testimonials.arrows,
        rows: miniGoOptions.testimonials.rows,
        speed: miniGoOptions.testimonials.speed,
        infinite: miniGoOptions.testimonials.infinite,
        centerMode: miniGoOptions.testimonials.centerMode,
        slidesToShow: miniGoOptions.testimonials.slidesToShow,
        slidesToScroll: miniGoOptions.testimonials.slidesToScroll,
        prevArrow: miniGoOptions.testimonials.prevArrow,
        nextArrow: miniGoOptions.testimonials.nextArrow,
        responsive: miniGoOptions.testimonials.responsive,
        customPaging: miniGoOptions.testimonials.customPaging,
        autoplay: miniGoOptions.testimonials.autoplay,
        autoplaySpeed: miniGoOptions.testimonials.autoplaySpeed,
        rtl: miniGoOptions.pages.enableRTL
    });

});

/** IE Compatibility Class
 ** ======================
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

$(function() {
	if($('html').hasClass('lt-ie10')) {
		$('.form-flip__enabler, .site-page__trigger').on('click', function() {
	    	setTimeout(function() {
	        	$('input, textarea').placeholder();
	        }, 50);
		});
	}
});
/** Ken Burns Effect Class
 ** ======================
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

+function ($) {
    "use strict";

    if(miniGoOptions.background.type !== 'slideshow') {
        $('.bg-wrapper').remove();
        return;
    }

    function randomizer(min,max) {
        var randomresult = Math.random() * (max - min) + min;
        return randomresult;
    }

    var resizeImages = function(imageSet) {
        var wW = window.innerWidth,
        wH = window.innerHeight,
        wAspect = wW/wH;

        if(typeof imageSet === "undefined" || !imageSet.length) {
            var imageSet = $('.bg-wrapper img[src]');
        }

        if(typeof imageSet === "undefined" || !imageSet.length) {
            return;
        }

        imageSet.each(function() {
            var el = $(this),
            w,
            h;

            if(typeof this.naturalWidth !== "undefined") {
                w = this.naturalWidth;
                h = this.naturalHeight;
            } else if (el.attr("width") && el.attr("height")) {
                w = el.attr("width");
                h = el.attr("height");
            } else if(typeof this.complete !== "undefined" && this.complete) {
                w = el.width();
                h = el.height();

                el.attr("width", w);
                el.attr("height", h);
            } else {
                return;
            }

            w = parseInt(w);
            h = parseInt(h);

            var aspect = w/h,
            newW,
            newH;

            if(wH * aspect < wW) {
                newW = wW;
                newH = wW * (1 / aspect);
            } else {
                newW = wH * aspect;
                newH = wH;
            }

            if(newW == w && newH == h)
                return;

            el.css({
                left: '50%',
                top: '50%',
                width: newW,
                height: newH,
                //"margin-top": -1 * newH / 2,
                //"margin-left": -1 * newW / 2
            })
        });
    };

    var timeout;
    $(window).on('resize.bgImages', function() {
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            clearTimeout(timeout);

            resizeImages();
        }, 100);
    }).load(resizeImages);

    resizeImages();

    var options = miniGoOptions.background.slideshow || {},
    wrapper = $('.bg-wrapper'),
    maxscale = miniGoOptions.background.slideshow.kenburns.maxScale,
    minscale = miniGoOptions.background.slideshow.kenburns.minScale,
    minMov = miniGoOptions.background.slideshow.kenburns.minMove,
    maxMov = miniGoOptions.background.slideshow.kenburns.maxMove,
    duration = options.duration || 15,
    animationType = options.type || 'kenburns',

    animateFrame = function(el) {
        switch(animationType) {
            case "fade":
                fadeFrame(el);
                break;

            case "continuousFade":
                continuousFadeFrame(el);
                break;

            default:
                kenBurnsFrame(el);
        }
    },

    kenBurnsFrame = function(el) {
        var el = $(el);
        resizeImages(el);

        var scalarStart = randomizer(minscale,maxscale).toFixed(2);
        scalarStart = 1;
        var scalarEnd = randomizer(minscale,maxscale).toFixed(2);

        maxMov = ((scalarEnd - 1) * 100 / 3).toFixed(2);

        var moveX = randomizer(minMov,maxMov).toFixed(2);
        moveX = Math.random() < 0.5 ? -Math.abs(moveX) : Math.abs(moveX);

        var moveY = randomizer(minMov,maxMov).toFixed(2);
        moveY = Math.random() < 0.5 ? -Math.abs(moveY) : Math.abs(moveY);


        if (Modernizr.csstransitions){
            var transform = inflectProperty(Modernizr.prefixed('transform'));
            var transition = inflectProperty(Modernizr.prefixed('transition'));

            var transformStart = 'translate(-50%, -50%) scale(' + scalarStart + ')';
            var transformEnd = 'translate(' + -1 * (50 - moveX) + '%,' + -1 * (50 - moveY) + '%) scale(' + scalarEnd + ')';

            if(Math.floor((Math.random()*2)+1) == 2) {
                var tmp = transformStart;
                transformStart = transformEnd;
                transformEnd = tmp;
            }

            el.css({
                opacity: 1,
                transform: transformStart,
                visibility: 'visible',
                //zIndex: 1
            });

            window.requestAnimationFrame(function() {
                el.addClass('animated').css({
                    transition: transform + ' ' + duration + 's linear, opacity ' + (Math.round((duration/5) * 1000) / 1000) + 's ease',
                    transform: transformEnd
                });
            });

            setTimeout(function() {
                kenBurnsEnd(el);
            }, duration/5*4*1000);
        } else {
            el.css({visibility: 'visible'});
        }
    },

    kenBurnsEnd = function(el) {
        var transform = inflectProperty(Modernizr.prefixed('transform'));
        var transition = inflectProperty(Modernizr.prefixed('transition'));

        requestAnimationFrame(function() {
            el.css({
                opacity: 0
            });

            var next = el.next();
            if (!next.length) {
                next = el.siblings(':first-child');
            }

            next.css('z-index', 0);

            animateFrame(next);

            el.one(_endEvent('TransitionEnd'), function() {
                next.css('z-index', 1);
                el.removeClass('animated').css({
                    transition: '',
                    transform: '',
                    opacity: '',
                    zIndex: 0,
                    visibility: 'hidden'
                });
            });
        });
    },

    continuousFadeFrame = function(el) {
        var next = el.next();
        if (!next.length) {
            next = el.siblings(':first-child');
        }

        if(typeof next[0].complete !== "undefined" && !next[0].complete) {
            next.load(function() {
                continuousFadeFrame(el);
            });
            return;
        }

        resizeImages(next);


        if (Modernizr.csstransitions){
            var transition = inflectProperty(Modernizr.prefixed('transition'));

            el.css({
                zIndex: 1,
                opacity: 1,
                visibility: 'visible'
            });

            next.css({
                zIndex: 0,
                opacity: 1,
                visibility: 'visible'
            });


            setTimeout(function() {
                requestAnimationFrame(function() {
                    el.css({
                        transition: 'opacity ' + duration + 's linear',
                        opacity: 0
                    });
                });

                el.one(_endEvent('TransitionEnd'), function() {
                    el.css({
                        zIndex: -1,
                        transition: '',
                        visibility: ''
                    });
                    next.css({
                        zIndex: 1
                    });
                    continuousFadeFrame(next);
                });
            }, 10);

        } else {
            el.css({visibility: 'visible', opacity: 1});
        }
    },

    fadeFrame = function(el) {
        var next = el.next();
        if (!next.length) {
            next = el.siblings(':first-child');
        }

        if(typeof next[0].complete !== "undefined" && !next[0].complete) {
            next.load(function() {
                fadeFrame(el);
            });
            return;
        }

        resizeImages(next);


        if (Modernizr.csstransitions){
            var transition = inflectProperty(Modernizr.prefixed('transition'));
            next.css({
                zIndex: 0,
                opacity: 1,
                visibility: 'visible'
            });

            el.css({
                zIndex: 1,
                opacity: 1,
                visibility: 'visible'
            });

            setTimeout(function() {
                el.css({
                    opacity: 0,
                    transition: 'opacity 1s linear ' + duration + 's'
                });

                el.one(_endEvent('TransitionEnd'), function() {
                    el.css({
                        zIndex: -1,
                        transition: '',
                        visibility: ''
                    });
                    next.css({
                        zIndex: 1
                    });
                    fadeFrame(next);
                });
            }, 10);
        } else {
            next.css({
                zIndex: 0,
                opacity: 1,
                visibility: 'visible'
            });

            el.css({
                zIndex: 1,
                opacity: 1,
                visibility: 'visible',
            });

            setTimeout(function() {
                el.animate({opacity: 0}, 1000, function() {
                    el.css({
                        zIndex: -1,
                        visibility: ''
                    });
                    next.css({
                        zIndex: 1
                    });
                    fadeFrame(next);
                });
            }, duration * 1000);
        }
    };


    $(window).load(function() {
        var el = $('.bg-wrapper img:first-child') || false;

        if(!el)
            return;

        if(!el.siblings().length) {
            el.css({
                visibility: 'visible',
                display: 'block',
                opacity: 1
            });
            return;
        }
        animateFrame(el);
    });
}(jQuery);
/** Content Helper Classes
 ** ======================
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

$(function(){
	"use strict";

	// Apply Divider Settings
	
	$(".minigo-divider").each(function(){
		$(this).css({
		"border-bottom-width" : $(this).data("size"),
		"opacity" : $(this).data("opacity"),
		"margin-top" : $(this).data("spacetop"),
		"margin-bottom" : $(this).data("spacebottom")
		});
	});


	// Shop Go to Proper Page
	// $(".ecwid-minicart-clickArea").on("click", function(){
	// $("#cart-id").on("click", function(){
	// 	console.log("Registering Click");
	// 	// var storePageID = '';
	// 	// storePageID = $(".ecwid").closest('.site-page').attr('id');
	// 	var storePageID = $(".shop-container").closest('.site-page').prop('id');
	// 	$('a[href$="' + storePageID + '"]').click();
	// 	// console.log($('a[href$="' + storePageID + '"]'));
	// });

	// var storePageID = $(".shop-container").closest('.site-page').prop('id');

	// $(window).on('hashchange', function () { 
 //        var theHash = window.location.hash;
 //        console.log("Has Changed: " + theHash);
 //        if(hash == '!/~/cart'); {
 //        	console.log("Cart Page");
	// 		$('a[href$="' + storePageID + '"]').click();
 //        }
	// });
    
	// 	// var storePageID = $(".shop-container").closest('.site-page').prop('id');
	// 	// storePageID = $(".ecwid").attr('id');
	// 	// console.log(storePageID);
	// 	console.log("Here 9");
	// 	// console.log($(".shop-container").closest('.site-page').prop('id'));

}())
/** JS Background Animations Class
 ** ==============================
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

+function ($) {
    "use strict";

    // Initialize Functions we will need to use later

    // Init Rain Drops Effect
    var rainDropsInit = function() {
        $("body").append('<div class="rainydrops-container"><div class="slideshow"><canvas width="1" height="1" id="container" style="position:absolute"></canvas><div class="slide" id="slide-1" data-weather="storm"></div></div></div>');
        $('#container').css({opacity: animationOpacity});
    }

    // Init Flat Surface Shader
    var fssInit = function() {
        $("body").append('<div id="fss-container" class="container"><div id="fss-output" class="container"></div></div>');
        $('#fss-container').css({opacity: animationOpacity});
        fssStart();
    }

    // Create a container for the JS Animation, either Div or Canvas depending on what is required
    var createAnimationContainer = function (type) {
        var canvasContainer = $('<div id="js-animation" class="js-animation--wrapper"></div>');
        var canvasElement = $('<canvas id="js-animation" class="js-animation--wrapper"></canvas>');
        switch(type) {
            case 'div':
                $("body").append(canvasContainer); 
                break;
            case 'canvas':
                $("body").append(canvasElement); 
                break;            
            }
    }

    // Define the function that loads the desired animation js and appends it to the body
    var loadAnimation = function(src, type) {
        createAnimationContainer(type);
        var path = minigoSwfURLPrefix; // Check if we're using the WP Version
        // console.log('the path: ' + path);
        if (typeof(path) != 'undefined' && path !== null && path !== '' ) { // WP
            var jsLink = "<script type='text/javascript' src='"+path+"scripts/animations/"+src+"'>";
        } else if (window.location.protocol != 'file:'){ // Not Local
            // var jsLink = $("<script type='text/javascript' src='scripts/animations/"+src+"'>");
            var jsLink = "<script type='text/javascript' src='scripts/animations/"+src+"'>";
        }
        // console.log('the var: ' + jsLink);
        // console.log(window.location.protocol);
        $("body").append(jsLink); 
    };

    var addAnimClass = function(theClass) {
        $('#js-animation').addClass(theClass);
    }

    // Asign a variable to the option set in the markup
    var theAnimation     = miniGoOptions.background.animation.backgroundAnimation;
    var animationOpacity = miniGoOptions.background.animation.animationOpacity;

    // If an animation option is set, check which one and load triger the script loading
    if( theAnimation != '') {
        switch(theAnimation){
            case 'confetti':
                loadAnimation("confetti.js", "canvas");
                break;
            case 'snow-flakes':
                loadAnimation("snow-flakes.js", "canvas");
                break;
            case 'quick-rain':
                loadAnimation("quick-rain.js", "canvas");
                break;
            case 'rain-drops':
                loadAnimation("rain-drops.js", "");
                rainDropsInit();
                break;
            case 'glitter-confetti':
                loadAnimation("glitter-confetti.js", "canvas");
                break;
            case 'water-pipe':
                loadAnimation("water-pipe.js", "div");
                break;
            case 'fss':
                loadAnimation("fss.js", "");
                fssInit();
                break;
            case 'particles':
                loadAnimation("particles.js", "div");
                break;
            case 'constellation':
                loadAnimation("constellation.js", "canvas");
                break;
            case 'rainbow-grid':
                loadAnimation("rainbow-grid.js", "canvas");
                break;
            case 'star-field':
                loadAnimation("star-field.js", "div");
                break;
            case 'fireworks':
                loadAnimation("fireworks.js", "canvas");
                break;
            case 'animated-color':
                loadAnimation("animated-color.js", "div");
                console.log('Here');
                break;
            case 'shooting-stars':
                loadAnimation("shooting-stars.js", "canvas");
                break;
            case 'xmas':
                loadAnimation("xmas.js", "canvas");
                break;
            case 'radial-gradients':
                loadAnimation("radial-gradients.js", "div");
                break;
            case 'animated-gradients':
                loadAnimation("animated-gradients.js", "canvas");
                break;
            case 'nodes-connection':
                loadAnimation("nodes-connection.js", "canvas");
                break;
            case 'rainbow-squares':
                loadAnimation("rainbow-squares.js", "canvas");
                break;
            case 'color-buzz':
                loadAnimation("color-buzz.js", "canvas");
                break;
            case 'molten-metal': // Very Heavy!
                loadAnimation("molten-metal.js", "canvas");
                break;
            case 'floating-particles':
                loadAnimation("floating-particles.js", "canvas");
                break;
            case 'color-smoke':
                loadAnimation("color-smoke.js", "canvas");
                break;
            case 'particle-explode':
                loadAnimation("particle-explode.js", "canvas");
                break;
            case 'snake-bugs':
                loadAnimation("snake-bugs.js", "canvas");
                break;
            case 'film-grain':
                loadAnimation("film-grain.js", "canvas");
                break;
            case 'mouse-gradient':
                loadAnimation("mouse-gradient.js", "canvas");
                break;
            case 'bezier-art':
                loadAnimation("bezier-art.js", "canvas");
                break;
            case 'bezier-links':
                loadAnimation("bezier-links.js", "canvas");
                break;
            case 'hearts':
                loadAnimation("hearts.js", "canvas");
                break;
        }
        addAnimClass(theAnimation);
    }
    // else {
    //     $('#js-animation-canvas').remove();
    // }

    if( animationOpacity != '') {
        $('#js-animation').css({opacity: animationOpacity});
    }

}(jQuery);
/** Blocks Class
 ** ==================
 ** (c) Premio Themes | premiothemes.com | <hello@premiothemes.com>
 */

/** 
 * Preview Thumbs
 */

! function() {
    "use strict";
    $(".thumb").hover(function() {
        var a = $(this),
            b = "hover";
        a.index() > 1 && (b += " hover-2nd-row"), a.parent().addClass(b)
    }, function() {
        var a = $(this);
        a.parent().removeClass("hover hover-2nd-row")
    });
    // var a, b = function() {
    //     var a = $(".mac:first");
    //     if (a.width() < window.innerWidth / 4.5) $(".bg").css({ top: a.offset().top + .9133333333333333 * a.height() });
    //     else {
    //         $(".bg").css({ top: a.offset().top + .9133333333333333 * a.height() });
    //         var b = $(".thumb:nth-child(3) .mac");
    //         $(".bg2").css({ top: b.offset().top + .9133333333333333 * b.height() })
    //     }
    // };
    // $(window).resize(function() { clearTimeout(a), a = setTimeout(b, 30) }).ready(b).load(b), b()
}();

// ! function() {
//     "use strict";
//     $(".row-2 .thumb").hover(function() {
//         var a = $(this),
//             b = "hover";
//         a.index() > 1 && (b += " hover-2nd-row"), a.parent().addClass(b)
//     }, function() {
//         var a = $(this);
//         a.parent().removeClass("hover hover-2nd-row")
//     });
//     var a, b = function() {
//         var a = $(".mac:first"),
//             c = $(".row-1");
//         if (a.width() < window.innerWidth / 4.5) $(".bg3").css({ top: a.offset().top + .9133333333333333 * a.height() + c.height() });
//         else {
//             $(".bg3").css({ top: a.offset().top + .9133333333333333 * a.height() + c.height() });
//             var b = $(".thumb:nth-child(3) .mac");
//             $(".bg4").css({ top: b.offset().top + .9133333333333333 * b.height() + c.height() })
//         }
//     };
//     $(window).resize(function() { clearTimeout(a), a = setTimeout(b, 30) }).ready(b).load(b), b()
// }();


// ! function() {
//     "use strict";
//     $(".row-3 .thumb").hover(function() {
//         var a = $(this),
//             b = "hover";
//         a.index() > 1 && (b += " hover-2nd-row"), a.parent().addClass(b)
//     }, function() {
//         var a = $(this);
//         a.parent().removeClass("hover hover-2nd-row")
//     });
//     var a, b = function() {
//         var a = $(".mac:first"),
//             c = $(".row-1"),
//             d = $(".row-2");
//         if (a.width() < window.innerWidth / 4.5) $(".bg5").css({ top: a.offset().top + .9133333333333333 * a.height() + c.height() + d.height() });
//         else {
//             $(".bg5").css({ top: a.offset().top + .9133333333333333 * a.height() + c.height() + d.height() });
//             var b = $(".thumb:nth-child(3) .mac");
//             $(".bg6").css({ top: b.offset().top + .9133333333333333 * b.height() + c.height() + d.height() })
//         }
//         console.log("Here");
//         console.log(a.width());
//     };
//     $(window).resize(function() { clearTimeout(a), a = setTimeout(b, 30) }).ready(b).load(b), b()
// }();


// ! function() {
//     "use strict";
//     $(".row-4 .thumb").hover(function() {
//         var a = $(this),
//             b = "hover";
//         a.index() > 1 && (b += " hover-2nd-row"), a.parent().addClass(b);
//     }, function() {
//         var a = $(this);
//         a.parent().removeClass("hover hover-2nd-row")
//     });
//     var a, b = function() {
//         var a = $(".mac:first"),
//             c = $(".row-1"),
//             d = $(".row-2"),
//             e = $(".row-3");
//         if (a.width() < window.innerWidth / 4.5) $(".bg7").css({ top: a.offset().top + .9133333333333333 * a.height() + c.height() + d.height() + e.height() });
//         // if (a.width() < window.innerWidth / 4.5) $(".bg7").css({ top: a.offset().top + .9133333333333333 * a.height() + c.height() + d.height()});
//         else {
//             $(".bg7").css({ top: a.offset().top + .9133333333333333 * a.height() + c.height() + d.height() + e.height() });
//             // $(".bg7").css({ top: a.offset().top + .9133333333333333 * a.height() + c.height() + d.height()  });
//             var b = $(".thumb:nth-child(3) .mac");
//             // $(".bg8").css({ top: b.offset().top + .9133333333333333 * b.height() + c.height() + d.height()})
//             $(".bg8").css({ top: b.offset().top + .9133333333333333 * b.height() + c.height() + d.height() + e.height()})
//         }
//         console.log("Here");
//         console.log(a.width());
//     };
//     $(window).resize(function() { clearTimeout(a), a = setTimeout(b, 30) }).ready(b).load(b), b()
// }();