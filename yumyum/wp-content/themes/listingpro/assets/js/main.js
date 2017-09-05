/* Main.js contains all main JS  */
/*  Author : CrdioStudio Dev team */

/*moin 31-03-017 strt*/
jQuery(window).on('resize load live', function (){
	jQuery(window).resize( function () {
		if (jQuery(window).width() <= 480) {
			jQuery('.sidebar-post .map-area').insertBefore('.single_listing .post-row:nth-child(2)');
			jQuery('.sidebar-post .lp-timing').insertBefore('.single_listing .map-area');
			jQuery('.sidebar-post .widget-box.listing-price').insertAfter('.single_listing .map-area');
		} else {
			jQuery('.map-area').insertAfter('.sidebar-post .lp-timing');
			jQuery('.lp-timing').insertAfter('.sidebar-post .reservation-form');
			jQuery('.widget-box.listing-price').insertAfter('.sidebar-post .map-area');
		}
	});
});
jQuery(document).ready(function() {
	// Search Top margin in map view
	var hh = jQuery('header').outerHeight();
	var ab = jQuery('.absolute');
	ab.css('top', hh);
	
	
	// Touch Behaviorr for Mobile devices
	if ($('.chosen-container').length > 0) {
	  	$('.chosen-container').on('touchstart', function(e) {
			e.stopPropagation(); e.preventDefault();
			// Trigger the mousedown event.
			$(this).trigger('mousedown');
	  	});
	}
	if (jQuery(window).width() <= 480) {
		jQuery('#more_filters').hide();
	} else {		
		jQuery('#more_filters').show();
	}
	jQuery('#see_filter').on('click', function(event) {
		event.preventDefault();
		var filter = jQuery('#more_filters');
		jQuery(this).next('#more_filters').toggleClass('open_filter');
		if(filter.hasClass('open_filter')) {
			jQuery(this).next('#more_filters').slideDown(400);
		}else {
			jQuery(this).next('#more_filters').slideUp(400);
		};
	});
});
/*moin 31-03-017 ends*/

/* by zaheer on 30 march */
jQuery(document).ready(function($){
	jQuery('.lp-location-search .ui-widget.border-dropdown > i').on('click', function(event) {
		event.preventDefault();
		jQuery(this).addClass('fa-circle-o-notch fa-spin');
		jQuery(this).removeClass('fa-crosshairs');
		if(jQuery('.form-group').is('.lp-location-search')){
			$.getJSON('https://geoip-db.com/json/geoip.php?jsonp=?') 
	         .done (function(location)
			{
	            //$('.lp-home-sear-location').val(location.city);
				//jQuery(".chosen-select").val('').trigger('chosen:updated');
				jQuery("#searchlocation").prop('disabled', true).trigger('chosen:updated');
				$('#searchlocation').find('#def_location').text(location.city);
				$('#searchlocation').find('#def_location').val(location.city);
				jQuery("#searchlocation").prop('disabled', false).trigger('chosen:updated');
				jQuery('.form-group.lp-location-search .chosen-container.chosen-container-single .chosen-single span').addClass('slide-right');
				jQuery('.lp-location-search .ui-widget.border-dropdown > i').fadeOut('slow');
			});
		}
	});
	
	
	
	jQuery('#ads_promotion').on('submit', function(e){
		var $this = jQuery(this);
		totalPrice = $this.find('input[name="total"]').val(); 
		method = $this.find('input[name="method"]:checked').val();
		currency = $this.find('input[name="currency"]').val();
		listing_id = $this.find('input[name="post_id"]').val();
		listing_name = $this.find('input[name="post_id"]').data("title");
		if (listing_id==='' || !jQuery('input[name="method"]').is(":checked") ) {
			alert('Please select form fields');
			e.preventDefault();
		}
		else if(method==='stripe'){
			if(currency==="USD"){
				totalPrice = parseInt(totalPrice)*100;
			}
			
			handler.open({
			name: listing_name,
			description: "",
			zipCode: true,
			amount: totalPrice,
			currency: currency
		  });
			e.preventDefault();
		}
		
	});
});
/* end by zaheer on 30 march */

jQuery(window).load(function() {
	
	
	jQuery('.lp-suggested-search').on('click', function(event) {

		jQuery("#input-dropdown").niceScroll({
			cursorcolor:"#363F48",
			cursoropacitymax: 1,
			boxzoom:true,
			cursorwidth: "10px",
			cursorborderradius: "0px",
			cursorborder: "0px solid #fff",
			touchbehavior:true,
			background: "#f7f7f7",
			horizrailenabled: false,
			autohidemode: false,
			zindex : "999999",
		});

	});
	
	
	// Notices Box Script
	jQuery('.notice a.close').on('click', function(event) {
		event.preventDefault();
		jQuery(this).parent('.notice').fadeOut('slow');
	});

	jQuery('.lp-header-full-width .lp-menu-bar .header-filter, .lp-menu-bar .header-filter.pos-relative.form-group').css('display', 'block');
	jQuery('.listing-with-map').removeClass('page-load');
	jQuery('.taxonomy-content-inner').fadeTo( 3000 , 1);

	var logoH = jQuery('.lp-logo').outerHeight();
	var acHgt = jQuery('.header-right-panel.clearfix');
	var a = parseInt(logoH + 10);
	var b = jQuery('.header-right-panel').height();
	var c = a - b;
	var d = c/2;
	//alert(b);
	acHgt.css({ 'padding-top': d+'px' });

	jQuery('.rating-symbol:nth-child(1)').hover(function() {
		jQuery('.review.angry').css({
			'opacity': '1',
			'visibility': 'visible',
		});
	}, function() {
		jQuery('.review.angry').css({
			'opacity': '0',
			'visibility': 'hidden',
		});
	});
	jQuery('.rating-symbol:nth-child(2)').hover(function() {
		jQuery('.review.cry').css({
			'opacity': '1',
			'visibility': 'visible',
		});
	}, function() {
		jQuery('.review.cry').css({
			'opacity': '0',
			'visibility': 'hidden',
		});
	});
	jQuery('.rating-symbol:nth-child(3)').hover(function() {
		jQuery('.review.sleeping').css({
			'opacity': '1',
			'visibility': 'visible',
		});
	}, function() {
		jQuery('.review.sleeping').css({
			'opacity': '0',
			'visibility': 'hidden',
		});
	});
	jQuery('.rating-symbol:nth-child(4)').hover(function() {
		jQuery('.review.smily').css({
			'opacity': '1',
			'visibility': 'visible',
		});
	}, function() {
		jQuery('.review.smily').css({
			'opacity': '0',
			'visibility': 'hidden',
		});
	});
	jQuery('.rating-symbol:nth-child(5)').hover(function() {
		jQuery('.review.cool').css({
			'opacity': '1',
			'visibility': 'visible',
		});
	}, function() {
		jQuery('.review.cool').css({
			'opacity': '0',
			'visibility': 'hidden',
		});
	});
	
	

	var rtngSym = jQuery('.rating-symbol');
	var rtngTip = jQuery('input.rating-tooltip');
	

	jQuery('.rating-symbol:first-of-type').hover(function() {
		jQuery('.rating-symbol:first-of-type .rating-symbol-foreground span').css('color', '#de9147');
	}, function() { });
	jQuery('.rating-symbol:nth-of-type(2)').hover(function() {
		jQuery('.rating-symbol:first-of-type .rating-symbol-foreground span').css('color', '#de9147');
		jQuery('.rating-symbol:nth-of-type(2) .rating-symbol-foreground span').css('color', '#de9147');
	}, function() { });
	jQuery('.rating-symbol:nth-of-type(3)').hover(function() {
		jQuery('.rating-symbol:first-of-type .rating-symbol-foreground span').css('color', '#dec435');
		jQuery('.rating-symbol:nth-of-type(2) .rating-symbol-foreground span').css('color', '#dec435');
		jQuery('.rating-symbol:nth-of-type(3) .rating-symbol-foreground span').css('color', '#dec435');
	}, function() { });
	jQuery('.rating-symbol:nth-of-type(4)').hover(function() {
		jQuery('.rating-symbol:first-of-type .rating-symbol-foreground span').css('color', '#c5de35');
		jQuery('.rating-symbol:nth-of-type(2) .rating-symbol-foreground span').css('color', '#c5de35');
		jQuery('.rating-symbol:nth-of-type(3) .rating-symbol-foreground span').css('color', '#c5de35');
		jQuery('.rating-symbol:nth-of-type(4) .rating-symbol-foreground span').css('color', '#c5de35');
	}, function() { });
	jQuery('.rating-symbol:nth-of-type(5)').hover(function() {
		jQuery('.rating-symbol:first-of-type .rating-symbol-foreground span').css('color', '#73cf42');
		jQuery('.rating-symbol:nth-of-type(2) .rating-symbol-foreground span').css('color', '#73cf42');
		jQuery('.rating-symbol:nth-of-type(3) .rating-symbol-foreground span').css('color', '#73cf42');
		jQuery('.rating-symbol:nth-of-type(4) .rating-symbol-foreground span').css('color', '#73cf42');
		jQuery('.rating-symbol:nth-of-type(5) .rating-symbol-foreground span').css('color', '#73cf42');
	}, function() { });
	rtngSym.on('click', function(event) {
		event.preventDefault();
		var thsVal 	= jQuery('input.rating-tooltip').val();

		//alert(thsVal);
		if (thsVal == 1) {
			jQuery('.review.angry').addClass('visible');
			jQuery('.rating-symbol:first-of-type').addClass('angry');
			jQuery('.rating-symbol').removeClass('cry');
			jQuery('.rating-symbol').removeClass('sleeping');
			jQuery('.rating-symbol').removeClass('smily');
			jQuery('.rating-symbol').removeClass('cool');
		}else{
			jQuery('.review.angry').removeClass('visible');
		};

		if (thsVal == 2) {
			jQuery('.review.cry').addClass('visible');
			jQuery('.rating-symbol:first-of-type').addClass('cry');
			jQuery('.rating-symbol:nth-of-type(2)').addClass('cry');
			jQuery('.rating-symbol').removeClass('angry');
			jQuery('.rating-symbol').removeClass('sleeping');
			jQuery('.rating-symbol').removeClass('smily');
			jQuery('.rating-symbol').removeClass('cool');
		}else{
			jQuery('.review.cry').removeClass('visible');
		};

		if (thsVal == 3) {
			jQuery('.review.sleeping').addClass('visible');
			jQuery('.rating-symbol:first-of-type').addClass('sleeping');
			jQuery('.rating-symbol:nth-of-type(2)').addClass('sleeping');
			jQuery('.rating-symbol:nth-of-type(3)').addClass('sleeping');
			jQuery('.rating-symbol').removeClass('angry');
			jQuery('.rating-symbol').removeClass('cry');
			jQuery('.rating-symbol').removeClass('smily');
			jQuery('.rating-symbol').removeClass('cool');
		}else{
			jQuery('.review.sleeping').removeClass('visible');
		};

		if (thsVal == 4) {
			jQuery('.review.smily').addClass('visible');
			jQuery('.rating-symbol:first-of-type').addClass('smily');
			jQuery('.rating-symbol:nth-of-type(2)').addClass('smily');
			jQuery('.rating-symbol:nth-of-type(3)').addClass('smily');
			jQuery('.rating-symbol:nth-of-type(4)').addClass('smily');
			jQuery('.rating-symbol').removeClass('angry');
			jQuery('.rating-symbol').removeClass('cry');
			jQuery('.rating-symbol').removeClass('sleeping');
			jQuery('.rating-symbol').removeClass('cool');
		}else{
			jQuery('.review.smily').removeClass('visible');
		};

		if (thsVal == 5) {
			jQuery('.review.cool').addClass('visible');
			jQuery('.rating-symbol:first-of-type').addClass('cool');
			jQuery('.rating-symbol:nth-of-type(2)').addClass('cool');
			jQuery('.rating-symbol:nth-of-type(3)').addClass('cool');
			jQuery('.rating-symbol:nth-of-type(4)').addClass('cool');
			jQuery('.rating-symbol:nth-of-type(5)').addClass('cool');
			jQuery('.rating-symbol').removeClass('angry');
			jQuery('.rating-symbol').removeClass('cry');
			jQuery('.rating-symbol').removeClass('sleeping');
			jQuery('.rating-symbol').removeClass('smily');
		}else{
			jQuery('.review.cool').removeClass('visible');
		};

	});
});

		
jQuery(document).ready(function(){
	'use-strict';

	// Disable next button
	var checkdInput = jQuery('.checkboxx input.checked_class');
	checkdInput.on('change', function(event) {
		event.preventDefault();
		if (checkdInput.is(':checked')) {
			jQuery('a#lp-next').css('display', 'block');
			jQuery('a#lp-next').removeClass('hide');
			jQuery('span.show').removeClass('show');
			jQuery('.promotional-section > .lp-face.lp-pay-options.lp-dash-sec > span').addClass('hide');
		}else {
			jQuery('a#lp-next').addClass('hide');
			jQuery('.promotional-section > .lp-face.lp-pay-options.lp-dash-sec > span').addClass('show');
		};
	});

	var rdoInput = jQuery('.lp-method-wrap input.radio_checked');
	rdoInput.on('change', function(event) {
		event.preventDefault();
		if (rdoInput.is(':checked')) {
			jQuery('input.lp-next2.promotebtn').css('display', 'block');
			jQuery('input.lp-next2.promotebtn').removeClass('hide');
			jQuery('.promotional-section span.proceed-btn').removeClass('show');
			jQuery('.promotional-section span.proceed-btn').addClass('hide');
		}else {
			jQuery('input.lp-next2.promotebtn').addClass('hide');
			jQuery('.promotional-section span.proceed-btn').addClass('show');
		};
		
	});
	
	//Dashboard promotional script
	jQuery('.promotional-section a.lp-submit-btn').on('click', function(event) {
		event.preventDefault();
		jQuery(this).parent('.promotional-section').slideUp(500);
		jQuery(this).parent('.promotional-section').next('.lp-card > form#ads_promotion').slideDown(1000);
	});

	// Dashboard Left Panel Script
	var dash = jQuery('.dashboard-tabs.lp-main-tabs.text-center > ul > li.dropdown > a');
	var dashli = jQuery('.dashboard-tabs.lp-main-tabs.text-center > ul > li.dropdown');
	var dashul = jQuery('.dashboard-tabs.lp-main-tabs.text-center > ul > li.dropdown > ul');

	dash.on('click', function(event) {
		event.preventDefault();
		if(dashli.hasClass('opened')) {
			jQuery( dashli ).removeClass('opened');
			jQuery(this).next('ul').removeClass('opened');

		}else if(dashli.hasClass('dropdown')) {
			jQuery(dashul).removeClass('opened');
			jQuery(this).parent('li').addClass('opened');
			jQuery(this).next('ul').addClass('opened');

		};

	});
	
	// Review Script
	jQuery('h3#reply-title').on('click', function(event) {
		event.preventDefault();
		var thiss = jQuery(this);
		if (thiss.hasClass('active')) {
			jQuery(this).removeClass('active');
			jQuery(this).next('#rewies_form').slideUp();
		}else{
			jQuery(this).addClass('active');
			jQuery(this).next('#rewies_form').slideDown();
		};
		//jQuery(this).next('#rewies_form').toggleClass('open_review_form');
	});
	jQuery('#clicktoreview').on('click', function(event) {
		event.preventDefault();
		var thiss = jQuery('#reply-title');
			thiss.addClass('active');
			thiss.next('#rewies_form').slideDown();		
	});
	jQuery('#rewies_form input[type=file]').change(function(e) {
		$in = jQuery(this);
		$in.prev().prev().text($in.val());
		
	});
		// listing layout
	//jQuery('.listing-simple').addClass('listing_list_view');
	jQuery('a.grid').on('click', function(event) {
		event.preventDefault();
		jQuery('a.list').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.listing-simple').removeClass('listing_list_view');
		
		// Listing with Map
		jQuery('.post-with-map-container').find('.lp-grid-box-contianer.card1.lp-grid-box-contianer1').removeClass('col-sm-12 list_view');
		jQuery('.post-with-map-container').find('.lp-grid-box-contianer.card1.lp-grid-box-contianer1').addClass('col-md-6 col-sm-12 grid_view2');
		
		// Listing Simple
		jQuery('.listing-simple').find('.lp-grid-box-contianer.card1.lp-grid-box-contianer1').removeClass('col-sm-12 list_view');
		jQuery('.listing-simple').find('.lp-grid-box-contianer.card1.lp-grid-box-contianer1').addClass('col-md-4 col-sm-12 grid_view2');
	});
	jQuery('a.list').on('click', function(event) {
		event.preventDefault();
		jQuery('a.grid').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.listing-simple').addClass('listing_list_view');
		
		// Listing with Map
		jQuery('.post-with-map-container').find('.lp-grid-box-contianer.card1.lp-grid-box-contianer1').removeClass('col-md-6 col-sm-6 grid_view2');
		jQuery('.post-with-map-container').find('.lp-grid-box-contianer.card1.lp-grid-box-contianer1').addClass('col-sm-12 list_view');
		
		// Listing Simple
		jQuery('.listing-simple').find('.lp-grid-box-contianer.card1.lp-grid-box-contianer1').removeClass('col-md-4 col-sm-6 grid_view2');
		jQuery('.listing-simple').find('.lp-grid-box-contianer.card1.lp-grid-box-contianer1').addClass('col-sm-12 list_view');
	});

//============================================ Harry Code ==================================================//
	// Open Hours Script
	jQuery('a.show-all-timings').on('click', function(event) {
		event.preventDefault();
		jQuery(this).toggleClass('opened');
		jQuery(this).next('ul.hidding-timings').slideToggle(400);
	});
	jQuery('[data-toggle="tooltip"]').tooltip();

	// Open review reply
	jQuery('a.see_more_btn').on('click', function(event) {
		event.preventDefault();
		jQuery(this).next('.review-content').slideToggle(200);
	});
	// Open review reply form
	jQuery('a.open-reply').on('click', function(event) {
		event.preventDefault();
		jQuery(this).next('.post_response').slideToggle(300);
	});
	
	// Add hours
	jQuery('button.add-hours').on('click', function(event) {
		event.preventDefault();
		var error = false;
		var weekday = jQuery('select.weekday').val();
		var startVal = jQuery('select.hours-start').val();
		var endVal = jQuery('select.hours-end').val();
		var hrstart = jQuery('select.hours-start').find('option:selected').text();
		var hrend = jQuery('select.hours-end').find('option:selected').text();
		jQuery('.hours-display .hours').each(function(index, element) { 
			var weekdayTExt = jQuery(element).children('.weekday').text();
			if(weekdayTExt == weekday){
				alert('Sorry! '+weekday+' Already Added.');
				error = true;
			}
		});
		if(error != true){
			jQuery('.hours-display').append("<div class='hours'><span class='weekday'>"+ weekday +"</span><span class='start'>"+ hrstart +"</span><span>-</span><span class='end'>"+ hrend +"</span><a class='remove-hours' href='#'>Remove</a><input name='business_hours["+weekday+"][open]' value='"+startVal+"' type='hidden'><input name='business_hours["+weekday+"][close]' value='"+endVal+"' type='hidden'></div>");
			var current = jQuery('select.weekday').find('option:selected');
			var nextval = current.next();
			current.removeAttr('selected');
			nextval.attr('selected','selected');
			jQuery('select.weekday').trigger('change.select2');
		}
	});

	// Remove Hours Script
	
	jQuery(document).on('click','a.remove-hours',function(event){
		event.preventDefault();
		jQuery(this).parent('.hours').remove();
	});
	// Toggle Script for Currency area
	jQuery('a.toggle-currencey-area').on('click', function(event) {
		event.preventDefault();
		jQuery(this).next('.currency-area').slideToggle(400);
		jQuery(this).toggleClass('active');
	});
		// Magnific Popup 
	jQuery('.review-img-slider').magnificPopup({
		delegate: 'a',
      	type: 'image',
      	tLoading: 'Loading image #%curr%...',
      	mainClass: 'mfp-img-mobile',
      	gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      	},
      	image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
          		return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
            }
      	}
			

	});
	jQuery(document).ready(function() {
		jQuery(".add-more").click(function() {
			jQuery("#lp_feature_panel").slideToggle("slow");
		});
		
		jQuery('#listings_checkout').on('submit', function(e){
			var $this = jQuery(this);
			method = $this.find('input[name="plan"]:checked').val();
			listing_id = $this.find('input[name="listing_id"]:checked').val();
			post_title = $this.find('input[name="listing_id"]:checked').data('title');
			plan_price = $this.find('input[name="listing_id"]:checked').data('price');
			if (!jQuery('input[name="listing_id"]').is(":checked") || !jQuery('input[name="plan"]').is(":checked") ) {
				alert('Please select form fields');
				e.preventDefault();
			}
			else if(method==='stripe'){
				//jQuery('#stripe-submit').trigger( "click" );
				handler.open({
				name: post_title,
				description: "",
				zipCode: true,
				amount: plan_price,
				currency: currency
			  });
				e.preventDefault();
			}
			
		});
		
	});
		var hdrHeight = jQuery('header.header-normal').outerHeight();

		jQuery('.top-section .absolute').css('top', hdrHeight);
		
		
		
	if ($(window).width() >= 768) { 
		// Listing Detail Gallery
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({
			animation_speed:'fast',
			theme:'dark_rounded',
			slideshow:7000,
			autoplay_slideshow: true,
			social_tools: '',
			deeplinking: false,
			show_title: false,
		}); 
	}

	jQuery('label.switch').on('click', function(event) {
		   if(jQuery(this).find('.check-day').is(':checked')){
				jQuery(this).parent().next('div').find(".timePicker").removeAttr('disabled');
				jQuery(this).parent().next('div').next('div').find(".timePicker").removeAttr('disabled');
			}
			else
			{
				jQuery(this).parent().next('div').find(".timePicker").attr('disabled','disabled');
				jQuery(this).parent().next('div').next('div').find(".timePicker").attr('disabled','disabled');
			}

		});
	/* by haroon */
	if(jQuery('input').is('.timePicker')){
		jQuery('.timePicker').each(function(index, element) { 
			 var elementTime = $(element).val();
			 if(elementTime != ''){			 
				  jQuery(element).wickedpicker({now: elementTime,twentyFour: true});
			 }else{
				 jQuery(element).wickedpicker({twentyFour: true});
			 }
			
		});
	}
	


	jQuery('a.onlineform').on('click', function(event) {
		event.preventDefault();
		jQuery(this).next('.booking-form').slideToggle(400);
		jQuery(this).toggleClass('active');
	});

	jQuery('.listing-second-view .ask-question-area > a.ask_question_popup').on('click', function(event) {
		event.preventDefault();
		jQuery(this).next('.faq-form').slideToggle(400);
	});
	
	// Quick View Slider
	$('.quickViewSlide').slick({
		centerPadding: '0px',
		slidesToShow: 1,
		autoplay: true,
		draggable: true,
  		autoplaySpeed: 5000,
  		centerMode: false,
  		focusOnSelect: true,
	});
	
	var images = jQuery( ".listing-slide" ).data('images-num');
	var center_mode = true;
	if(images > 5 ) {
		images = 5;
		center_mode = true;
	}else {
		center_mode = false;
	}
	// Listing Detail Slider
	$('.listing-slide').slick({
		centerPadding: '10px',
		slidesToShow: images,
		autoplay: true,
		draggable: false,
  		autoplaySpeed: 5000,
  		centerMode: center_mode,
  		focusOnSelect: true,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '0px',
					slidesToShow: 5
				}
			},
			{
				breakpoint: 480,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '0px',
					slidesToShow: 1
				}
			}
		]
	});

	jQuery( ".select2" ).select2();
	
	
		jQuery('.review-img-slider').slick({
	  	infinite: true,
	  	slidesToShow: 3,
	  	slidesToScroll: 1,
		autoplay: false,
  		autoplaySpeed: 5000,
	  	arrows:true,
	  	dots:false,
	   	responsive: [
			{
		  		breakpoint: 790,
		  		settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 2
		 		}
			},
			{
			  	breakpoint: 480,
			  	settings: {
					slidesToShow: 1
			  	}
			}
	  	]
	});
	/* end  by haroon */
	
	$('.post-slide').slick({
	  infinite: true,
	  slidesToShow: 2,
	  slidesToScroll: 1,
	  arrows:false,
	  dots:true,
	   responsive: [
		{
		  breakpoint: 2,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 3
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1
		  }
		}
	  ]
	});
	
	//Slick One Per Slide Testimonials
	$('.testimonial-slider').slick({
		dots: true,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 1000,
		speed: 1000,
		arrows: false,
		slidesToShow: 1
	});
	// Accordion
	var icons = {
		header: "fa fa-plus",
		activeHeader: "fa fa-minus"
	};
		$( "#accordion" ).accordion({
			icons: icons,
			autoHeight: false 
		});
	$( "#toggle" ).button().on('click',function() {
		if ( $( "#accordion" ).accordion( "option", "icons" ) ) {
			$( "#accordion" ).accordion( "option", "icons", null );
		} else {
			$( "#accordion" ).accordion( "option", "icons", icons );
	}
	});
	// Popup Gallery
	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
	  disableOn: 319,
	  type: 'iframe',
	  mainClass: 'mfp-fade',
	  removalDelay: 160,
	  preloader: false,
	  fixedContentPos: false
	});
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		}
	});
	//Boostrap Rating
	//http://dreyescat.github.io/bootstrap-rating/
	 $('input.check').on('change', function () {
          alert('Rating: ' + $(this).val());
        });
        $('#programmatically-set').on('click' , function () {
          $('#programmatically-rating').rating('rate', $('#programmatically-value').val());
        });
        $('#programmatically-get').on('click' , function () {
          alert($('#programmatically-rating').rating('rate'));
        });
        $('.rating-tooltip').rating({
          extendSymbol: function (rate) {
            $(this).tooltip({
              container: 'body',
              placement: 'bottom',
              title: 'Rate ' + rate
            });
          }
        });
        $('.rating-tooltip-manual').rating({
          extendSymbol: function () {
            var title;
            $(this).tooltip({
              container: 'body',
              placement: 'bottom',
              trigger: 'manual',
              title: function () {
                return title;
              }
            });
            $(this).on('rating.rateenter', function (e, rate) {
              title = rate;
              $(this).tooltip('show');
            })
            .on('rating.rateleave', function () {
              $(this).tooltip('hide');
            });
          }
        });
        $('.rating').each(function () {
          $('<span class="label label-default"></span>')
            .text($(this).val() || ' ')
            .insertAfter(this);
        });
        $('.rating').on('change', function () {
          $(this).next('.label').text($(this).val());
        });
	// Popup Form
	$(".signUpClick").on('click' , function() {  
		$('.siginincontainer').fadeOut();
		$('.forgetpasswordcontainer').fadeOut();
		$('.siginupcontainer').fadeIn();
	 });
	$(".signInClick").on('click' , function() {  
		$('.forgetpasswordcontainer').fadeOut();
		$('.siginupcontainer').fadeOut();
		$('.siginincontainer').fadeIn();
	 });
	$(".forgetPasswordClick").on('click' , function() { 
		$('.siginupcontainer').fadeOut();
		$('.siginincontainer').fadeOut(); 
		$('.forgetpasswordcontainer').fadeIn();

	 });
	$(".cancelClick").on('click' , function() { 
		$('.siginupcontainer').fadeOut();
		$('.forgetpasswordcontainer').fadeOut();
		$('.siginincontainer').fadeIn(); 

	 });
	 // Mapbox 
	$(window).load(function(){
	
		$(window).resize(function () {

			if ($(this).width() < 781) {
					$('.mobilemap').removeAttr('id');
					$('.mobilemap').removeClass('md-modal');
					$('.mobilemap').removeClass('md-effect-3');
					$('.mobilelink').removeClass('md-trigger');
					$('.mobile-map-space .md-overlayi').removeClass('md-overlay');
					$('.listing-container-right .md-overlayi').removeClass('md-overlay');
					$(".mobilelink").on('click' , function() {  
						if($('.mobilemap').hasClass('map-open')) {
							$('.mobilemap').removeClass("map-open"); 
							$('.mobilemap .mapbilemap-content').css({"opacity":"0","margin-top":"-520px"});
							$("a.mobilelink").text("View on map");
						}
						else{   
							$('.mobilemap').addClass("map-open"); 
							$('.mobilemap .mapbilemap-content').css({"opacity":"1","margin-top":"0px"});
							$("a.mobilelink").text("Close map");
						}
				    });
					$(".claimformtrigger").on('click' , function() { 
						$(this).closest('.post-row').addClass('rowopen');
						if($('.claimform').hasClass('claimform-open')) {
							$('.claimform').removeClass("claimform-open");
							$('.claimform').slideUp(600); 
							
							}
						else{
							$('.claimform').addClass("claimform-open"); 
							$('.claimform').slideDown(600);
						}
					});
					$(".quickformtrigger").on('click' , function() { 
						if($('.quickform').hasClass('quickform-open')) {
							$('.quickform').removeClass("quickform-open");
							$('.quickform').slideUp(600); 
							
							}
						else{
							$('.quickform').addClass("quickform-open"); 
							$('.quickform').slideDown(600);
						}
					});
			} else {
					var headertop = $('header').height();
					$('.section-fixed').css('padding-top',headertop+'px');
		
			}
			  
		}).resize();//triggcurrentColorer the event manually when the page is loaded

		$('.search-row').fadeTo( 600 , 1);
		$('.listing-sidebar-left .form-inline').fadeTo( 600 , 1);
		$('.post-with-map-container .form-inline').fadeTo( 600 , 1);
		$('.lp-search-bar').fadeTo( 600 , 1);		
		$('#menu').css('display','block');
		$('.spinner').css("display","none");
		$('.single-page-slider-container').css("opacity","1");
		
			
/*
 * L.TileLayer is used for standard xyz-numbered tile layers.
 */


 
 L.Google = L.TileLayer.extend({
	includes: L.Mixin.Events,

	options: {
		minZoom: 0,
		maxZoom: 18,
		tileSize: 256,
		subdomains: 'abc',
		errorTileUrl: '',
		attribution: '',
		opacity: 1,
		continuousWorld: false,
		noWrap: false,
		mapOptions: {
			backgroundColor: '#dddddd'
		}
	},

	// Possible types: SATELLITE, ROADMAP, HYBRID, TERRAIN
	initialize: function(type, options) {
		L.Util.setOptions(this, options);

		this._ready = google.maps.Map != undefined;
		if (!this._ready) L.Google.asyncWait.push(this);

		this._type = type || 'SATELLITE';
	},

	onAdd: function(map) {
		this._map = map;

		// create a container div for tiles
		this._initContainer();
		this._initMapObject();

		// set up events
		map.on({
			'viewreset': this._reset,
			'moveend': this._update
		}, this);

		this._limitedUpdate = L.Util.limitExecByInterval(this._update, 150, this);
		map.on('move', this._update, this);

		// Fixes zoom animation for Google tiles.
		map.on('zoomanim', function (e) {
			var center = e.center;
			var _center = new google.maps.LatLng(center.lat, center.lng);

			this._google.setCenter(_center);
			this._google.setZoom(e.zoom);
		}, this);

		// Moves Leaflet attributions up to properly display Google's attribution.
		this._google.lmap = map;
		google.maps.event.addListenerOnce(this._google, "tilesloaded", this._moveGoogleAttribution);

		this._reset();
		this._update();
	},

	onRemove: function(map) {
		this._map._container.removeChild(this._container);
		//this._container = null;

		this._map.off('viewreset', this._resetCallback, this);

		this._map.off('move', this._update, this);

		this._map.off('zoomanim', this._handleZoomAnim, this);

		map._controlCorners['bottomright'].style.marginBottom = "0em";
		//this._map.off('moveend', this._update, this);
	},

	getAttribution: function() {
		var googleMap = typeof(this._google);
		var oldAttribution = typeof(this._google.leafletAttribution);
		//if (this._google.leafletAttribution !== 'undefined') {
		if (googleMap !== 'undefined' && oldAttribution !== 'undefined') {
			this.options.attribution = this._google.leafletAttribution;
			delete this._google.leafletAttribution;
		}

		return this.options.attribution;
	},

	_moveGoogleAttribution: function() {
		// Get the Google attribution elements.
		var googleAttribution = document.getElementsByClassName('gmnoprint');

		// Builds the attribution text.
		var attribution = ' | ';
		attribution += googleAttribution[0].outerHTML + ' - ';
		attribution += googleAttribution[1].outerHTML;

		// Modify some styles.
		var sheet = document.createElement('style');
		sheet.innerHTML = ".gmnoprint {position: inherit !important; display: inline-block; right: 0 !important;}";
		sheet.innerHTML += ".gm-style-cc div:first-child {opacity: 0 !important;}";
		document.body.appendChild(sheet);

		// Removes old attribution.
		googleAttribution[0].parentNode.removeChild(googleAttribution[0]);
		googleAttribution[0].parentNode.removeChild(googleAttribution[0]);

		// Adds to Leaflet Attribution Control.
		this.lmap.attributionControl.addAttribution(attribution);
		// Saves the attribution to be sent to options.
		this.leafletAttribution = attribution;

		delete this.lmap;
	},

	setOpacity: function(opacity) {
		this.options.opacity = opacity;
		if (opacity < 1) {
			L.DomUtil.setOpacity(this._container, opacity);
		}
	},

	setElementSize: function(e, size) {
		e.style.width = size.x + "px";
		e.style.height = size.y + "px";
	},

	_initContainer: function() {
		var tilePane = this._map._container,
			first = tilePane.firstChild;

		if (!this._container) {
			this._container = L.DomUtil.create('div', 'leaflet-layer leaflet-google-layer');
			this._updateZIndex();
		}
		else {
			this._tileContainer = this._container;
		}

		if (true) {
			tilePane.insertBefore(this._container, first);

			this.setOpacity(this.options.opacity);
			this.setElementSize(this._container, this._map.getSize());
		}
	},

	_initMapObject: function() {
		if (!this._ready) return;
		this._google_center = new google.maps.LatLng(0, 0);
		var map = new google.maps.Map(this._container, {
		    center: this._google_center,
		    zoom: 0,
		    tilt: 0,
		    mapTypeId: google.maps.MapTypeId[this._type],
		    disableDefaultUI: true,
		    keyboardShortcuts: false,
		    draggable: false,
		    disableDoubleClickZoom: true,
		    scrollwheel: false,
		    streetViewControl: false,
		    styles: this.options.mapOptions.styles,
		    backgroundColor: this.options.mapOptions.backgroundColor
		});

		var _this = this;
		this._reposition = google.maps.event.addListenerOnce(map, "center_changed",
			function() { _this.onReposition(); });
		this._google = map;

		google.maps.event.addListenerOnce(map, "idle",
			function() { _this._checkZoomLevels(); });
	},

	_checkZoomLevels: function() {
		//setting the zoom level on the Google map may result in a different zoom level than the one requested
		//(it won't go beyond the level for which they have data).
		// verify and make sure the zoom levels on both Leaflet and Google maps are consistent
		if (this._google.getZoom() !== this._map.getZoom()) {
			//zoom levels are out of sync. Set the leaflet zoom level to match the google one
			this._map.setZoom( this._google.getZoom() );
		}
	},

	_resetCallback: function(e) {
		this._reset(e.hard);
	},

	_reset: function (e) {
		for (var key in this._tiles) {
			this.fire('tileunload', {tile: this._tiles[key]});
		}

		this._tiles = {};
		this._tilesToLoad = 0;

		if (this.options.reuseTiles) {
			this._unusedTiles = [];
		}

		//this._tileContainer.innerHTML = '';

		if (this._animated && e && e.hard) {
			this._clearBgBuffer();
		}

		this._initContainer();
	},

	_update: function(e) {
		if (!this._google) return;
		this._resize();

		var center = e && e.latlng ? e.latlng : this._map.getCenter();
		var _center = new google.maps.LatLng(center.lat, center.lng);

		this._google.setCenter(_center);
		this._google.setZoom(this._map.getZoom());

		this._checkZoomLevels();
		//this._google.fitBounds(google_bounds);
	},

	_resize: function() {
		var size = this._map.getSize();
		if (this._container.style.width == size.x &&
		    this._container.style.height == size.y)
			return;
		this.setElementSize(this._container, size);
		this.onReposition();
	},


	_handleZoomAnim: function (e) {
		var center = e.center;
		var _center = new google.maps.LatLng(center.lat, center.lng);

		this._google.setCenter(_center);
		this._google.setZoom(e.zoom);
	},


	onReposition: function() {
		if (!this._google) return;
		google.maps.event.trigger(this._google, "resize");
	}
});

L.Google.asyncWait = [];
L.Google.asyncInitialize = function() {
	var i;
	for (i = 0; i < L.Google.asyncWait.length; i++) {
		var o = L.Google.asyncWait[i];
		o._ready = true;
		if (o._container) {
			o._initMapObject();
			o._update();
		}
	}
	L.Google.asyncWait = [];
};



	L.HtmlIcon = L.Icon.extend({
		options: {
			/*
			html: (String) (required)
			iconAnchor: (Point)
			popupAnchor: (Point)
			*/
		},

		initialize: function(options) {
			L.Util.setOptions(this, options);
		},

		createIcon: function() {
			var div = document.createElement('div');
			div.innerHTML = this.options.html;
			if (div.classList)
				div.classList.add('leaflet-marker-icon');
			else
				div.className += ' ' + 'leaflet-marker-icon';
			return div;
		},

		createShadow: function() {
			return null;
		}
	});
		
			
			 	jQuery( ".all-list-map" ).on('click', function() {
					//alert('ghgfh');
					$('.map-pop').empty();
					if($('#map-section').is('.map-container3')) {
						$('.map-pop').html('<div class="mapSidebar" id="map"></div>');
					}else{
						$('.map-pop').html('<div class="listingmap" id="map"></div>');
					}
					var map = null
					$mtoken = $('#page').data("mtoken");	
					$mapboxDesign = $('#page').data("mstyle");
					
					if($mtoken != ''){
						
						L.mapbox.accessToken = $mtoken;
						 map = L.mapbox.map('map', 'mapbox.streets');
						L.tileLayer('https://api.tiles.mapbox.com/v4/'+$mapboxDesign+'/{z}/{x}/{y}.png?access_token='+$mtoken+'', {
									maxZoom: 18,
									attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
										'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
										'Imagery © <a href="http://mapbox.com">Mapbox</a>',
									id: 'mapbox.light'
						}).addTo(map);						
						 
						var markers = new L.MarkerClusterGroup();
						initializeMap(markers);
						map.fitBounds(markers.getBounds());
						
						map.scrollWheelZoom.disable();
					}else{	
						
						var map = new L.Map('map', '');
						
						var googleLayer = new L.Google('ROADMAP');						
						map.addLayer(googleLayer);
						var markers = new L.MarkerClusterGroup();
						initializeMap(markers);
						map.fitBounds(markers.getBounds());
						
						map.scrollWheelZoom.disable();
						map.invalidateSize();
					}
						
						
						
						
					function initializeMap(markers) {
						markers.clearLayers();
						jQuery(".lp-grid-box-contianer").each(function(i){
			
							var LPtitle  = jQuery(this).data("title");
							var LPposturl  = jQuery(this).data("posturl");
							var LPlattitue  = jQuery(this).data("lattitue");
							var LPlongitute  = jQuery(this).data("longitute");
							var LPpostid  = jQuery(this).data("postid");
							var LPaddress  = jQuery(this).find('.gaddress').text();
							var LPimageSrc  = jQuery(this).find('.lp-grid-box-thumb').find('img').attr('src');
							var LPiconSrc  = jQuery(this).find('.cat-icon').find('img').attr('src');
							if(LPlattitue != '' && LPlongitute != ''){
								var LPimage = '';
								if(LPimageSrc != ''){
									LPimage = LPimageSrc;
								}
								
								var LPicon = '';
								if(LPiconSrc != ''){
									LPicon = LPiconSrc;
								}
								
								var markerLocation = new L.LatLng(LPlattitue, LPlongitute); // London

								var CustomHtmlIcon = L.HtmlIcon.extend({
									options : {
										html : "<div class='lpmap-icon-shape pin card"+LPpostid+"'><div class='lpmap-icon-contianer'><img src='"+LPicon+"' /></div></div>",
									}
								});

								var customHtmlIcon = new CustomHtmlIcon(); 

								var marker = new L.Marker(markerLocation, {icon: customHtmlIcon}).bindPopup('<div class="map-post"><div class="map-post-thumb"><a href="'+LPposturl+'"><img src="'+LPimage+'" ></a></div><div class="map-post-des"><div class="map-post-title"><h5><a href="'+LPposturl+'">'+LPtitle+'</a></h5></div><div class="map-post-address"><p><i class="fa fa-map-marker"></i> '+LPaddress+'</p></div></div></div>').addTo(map);
								markers.addLayer(marker);
								map.addLayer(markers);
							
							}
							
						});
					};
						
					
				});
				
				if($('#map').is('.mapSidebar')) {
				
					$('.map-pop').empty();
					$('.map-pop').html('<div class="mapSidebar" id="map"></div>');
					var map = null
					$mtoken = $('#page').data("mtoken");					
					$mapboxDesign = $('#page').data("mstyle");					
					
					if($mtoken != ''){
						
						L.mapbox.accessToken = $mtoken;
						 map = L.mapbox.map('map', 'mapbox.streets')
						 .setView([0, -0], 2);
						L.tileLayer('https://api.tiles.mapbox.com/v4/'+$mapboxDesign+'/{z}/{x}/{y}.png?access_token='+$mtoken+'', {
									maxZoom: 18,
									attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
										'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
										'Imagery © <a href="http://mapbox.com">Mapbox</a>',
									id: 'mapbox.light'
						}).addTo(map);						
						 
						var markers = new L.MarkerClusterGroup();
						initializeMap(markers);
						map.fitBounds(markers.getBounds(), {padding: [50, 50]});
						
						map.scrollWheelZoom.disable();
					}else{
						
						var map = new L.Map('map', '').setView(new L.LatLng(0, -0), 2);
						
						var googleLayer = new L.Google('ROADMAP');						
						map.addLayer(googleLayer);
						var markers = new L.MarkerClusterGroup();
						initializeMap(markers);
						map.fitBounds(markers.getBounds());
						
						map.scrollWheelZoom.disable();
						map.invalidateSize();
					}
						
						
						
						
					function initializeMap(markers) {
						markers.clearLayers();
						jQuery(".lp-grid-box-contianer").each(function(i){
			
							var LPtitle  = jQuery(this).data("title");
							var LPposturl  = jQuery(this).data("posturl");
							var LPlattitue  = jQuery(this).data("lattitue");
							var LPlongitute  = jQuery(this).data("longitute");
							var LPpostid  = jQuery(this).data("postid");
							var LPaddress  = jQuery(this).find('.gaddress').text();
							var LPimageSrc  = jQuery(this).find('.lp-grid-box-thumb').find('img').attr('src');
							var LPiconSrc  = jQuery(this).find('.cat-icon').find('img').attr('src');
							if(LPlattitue != '' && LPlongitute != ''){
								
								var LPimage = '';
								if(LPimageSrc != ''){
									LPimage = LPimageSrc;
								}
								
								var LPicon = '';
								if(LPiconSrc != ''){
									LPicon = LPiconSrc;
								}
								
								var markerLocation = new L.LatLng(LPlattitue, LPlongitute); // London

								var CustomHtmlIcon = L.HtmlIcon.extend({
									options : {
										html : "<div class='lpmap-icon-shape pin card"+LPpostid+"'><div class='lpmap-icon-contianer'><img src='"+LPicon+"' /></div></div>",
									}
								});

								var customHtmlIcon = new CustomHtmlIcon(); 

								var marker = new L.Marker(markerLocation, {icon: customHtmlIcon}).bindPopup('<div class="map-post"><div class="map-post-thumb"><a href="'+LPposturl+'"><img src="'+LPimage+'" ></a></div><div class="map-post-des"><div class="map-post-title"><h5><a href="'+LPposturl+'">'+LPtitle+'</a></h5></div><div class="map-post-address"><p><i class="fa fa-map-marker"></i> '+LPaddress+'</p></div></div></div>').addTo(map);
								markers.addLayer(marker);
								map.addLayer(markers);
							
							}
							
						});
					};
				
				}
					
		 if($('#map').is('.contactmap')) {
			 
			 
			 $mtoken = $('#page').data("mtoken");
				$siteURL = $('#page').data("site-url");
				$lat = $('.cp-lat').data("lat");
				$lan = $('.cp-lan').data("lan");
				if($mtoken != ''){
					L.mapbox.accessToken = $mtoken;
						
					map = L.mapbox.map('map', 'mapbox.streets');
											
					map.scrollWheelZoom.disable();
					var map = L.mapbox.map('map', 'mapbox.streets')
					.setView([$lat,$lan], 14);
					
				}else{
					
					var map = new L.Map('map', {center: new L.LatLng($lat,$lan), zoom: 14});
						
						var googleLayer = new L.Google('ROADMAP');						
						map.addLayer(googleLayer);
						
						map.scrollWheelZoom.disable();
					}
					
					var markers = new L.MarkerClusterGroup();
					
						var markerLocation = new L.LatLng($lat, $lan); // London

						var CustomHtmlIcon = L.HtmlIcon.extend({
							options : {
								html : "<div class='lpmap-icon-shape pin '><div class='lpmap-icon-contianer'><img src='"+$siteURL+"wp-content/themes/listingpro/assets/images/pins/lp-logo.png'  /></div></div>",
							}
						});

						var customHtmlIcon = new CustomHtmlIcon(); 

						var marker = new L.Marker(markerLocation, {icon: customHtmlIcon}).bindPopup('hjghfj').addTo(map);
						markers.addLayer(marker);
						
			
			}else if($('#map').is('.singlebigpost')) {
				$( ".singlebigmaptrigger" ).click(function() {
					
					$mtoken = $('#page').data("mtoken");
					$siteURL = $('#page').data("site-url");
					$lat = $('.singlebigmaptrigger').data("lat");
					$lan = $('.singlebigmaptrigger').data("lan");
					if($mtoken != ''){
						
						L.mapbox.accessToken = $mtoken;
						var map = L.mapbox.map('map', 'mapbox.streets')
						.setView([$lat,$lan], 14);
						
						var markers = new L.MarkerClusterGroup();
						
							var markerLocation = new L.LatLng($lat, $lan); // London

							var CustomHtmlIcon = L.HtmlIcon.extend({
								options : {
									html : "<div class='lpmap-icon-shape pin '><div class='lpmap-icon-contianer'><img src='"+$siteURL+"wp-content/themes/listingpro/assets/images/pins/lp-logo.png'  /></div></div>",
								}
							});

							var customHtmlIcon = new CustomHtmlIcon(); 

							var marker = new L.Marker(markerLocation, {icon: customHtmlIcon}).bindPopup('hjghfj').addTo(map);
							markers.addLayer(marker);
							map.fitBounds(markers.getBounds());
						
							map.scrollWheelZoom.disable();
							map.invalidateSize();
						
						
					}else{
							var map = new L.Map('map', {center: new L.LatLng($lat,$lan), zoom: 14});
							var googleLayer = new L.Google('ROADMAP');
							map.addLayer(googleLayer);
							var markers = new L.MarkerClusterGroup();
						
							var markerLocation = new L.LatLng($lat, $lan); // London

							var CustomHtmlIcon = L.HtmlIcon.extend({
								options : {
									html : "<div class='lpmap-icon-shape pin '><div class='lpmap-icon-contianer'><img src='"+$siteURL+"wp-content/themes/listingpro/assets/images/pins/lp-logo.png'  /></div></div>",
								}
							});

							var customHtmlIcon = new CustomHtmlIcon(); 

							var marker = new L.Marker(markerLocation, {icon: customHtmlIcon}).bindPopup('hjghfj').addTo(map);
							markers.addLayer(marker);
							map.fitBounds(markers.getBounds());
						
							map.scrollWheelZoom.disable();
							map.invalidateSize();
					}
					
				});
			}

		});
				
		
	// Autocomplete
	
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left lp-search-input location_input lp-home-locaton-input" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
		  .tooltip({
            tooltipClass: "ui-state-highlight"
          });
 
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Items" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .mousedown(function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on('click' , function() {
            input.focus();
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
	
    $( ".comboboxs" ).combobox();
		$( "#toggle" ).on('click' , function(){
		$( ".comboboxs" ).toggle();
    });	
   // $( "#searchcategory" ).combobox();
		$( "#toggle" ).on('click' , function(){
		$( "#searchcategory" ).toggle();
    });	
    $( ".ui-autocomplete" ).autocomplete({
	  appendTo: ".input-group"
	});    
	$('.custom-combobox-input').autocomplete({ minLength: 0 });
	$('.custom-combobox-input').on( "click", function(){
		$(this).autocomplete("search", "");
	});
	
  
	// Location Placeholder
	$(".location_input").attr("placeholder", "Your Location");
	$(".comboboxCategory .location_input").attr("placeholder", "Food");
	$(".postSubmitCat .location_input").attr("placeholder", "Chose one or more than one categories");
	
	
	$(document).on('click', '.md-close', function(){	
		$('.md-modal').modal('hide');
		$('.md-modal').removeClass('md-show');
		$('.modal-backdrop').remove();
	});
	// Popup Data
	$(document).on('click', '.qickpopup', function(){
		
		// variables
		var LPtitle  = $(this).closest('.lp-grid-box-contianer').data("title");
		var LPlattitue  = $(this).closest('.lp-grid-box-contianer').data("lattitue");
		var LPlongitute  = $(this).closest('.lp-grid-box-contianer').data("longitute");
		var LPpostID  = $(this).closest('.lp-grid-box-contianer').data("postid");
		
		if($('#modal-1'+LPpostID).is('.md-show')) {
			
		}else{
			$('#modal-1'+LPpostID).modal({
					show: 'true'
			});
			$('#modal-1'+LPpostID).addClass('md-show');
		}
		
		
			var markers = false;
					$mtoken = $('#page').data("mtoken");
					$siteURL = $('#page').data("site-url");
					$lat = LPlattitue;
					$lan = LPlongitute;

					if($mtoken != ''){
						
						L.mapbox.accessToken = $mtoken;
						map = L.mapbox.map('quickmap'+LPpostID, 'mapbox.streets');
					}else{
						var map = new L.Map('quickmap'+LPpostID, {center: new L.LatLng($lat,$lan), zoom: 14});
						var googleLayer = new L.Google('ROADMAP');
							map.addLayer(googleLayer);
					}

						 map.setView([$lat,$lan], 14);
						
							markers = new L.MarkerClusterGroup();
						
							var markerLocation = new L.LatLng($lat, $lan); // London

							var CustomHtmlIcon = L.HtmlIcon.extend({
								options : {
									html : "<div class='lpmap-icon-shape pin '><div class='lpmap-icon-contianer'><img src='"+$siteURL+"wp-content/themes/listingpro/assets/images/pins/lp-logo.png'  /></div></div>",
								}
							});

							var customHtmlIcon = new CustomHtmlIcon(); 

							var marker = new L.Marker(markerLocation, {icon: customHtmlIcon}).bindPopup('').addTo(map);
							markers.addLayer(marker);
		
	});
	
	//href Smooth Scroll
	
	// handle links with @href started with '#' only
 	$('.post-meta-right-box a.secondary-btn[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	}); 
	var submitlink = $('body').data('submitlink');
	var siteurl = $('#page').data('site-url');
	var sitelogo = $('#page').data('sitelogo');
	
	$('#menu').mmenu({
			navbar: {
				title: ""
			},
			navbars		: {
				height 	: 3,
				content :  [ 
					'<a href="'+siteurl+'" class="userimage"><img class="icon icons8-Contacts" src="'+sitelogo+'" alt="user"></a>',
					'<a href="'+submitlink+'" class="iconsmall"><img class="icon icons8-Message" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAkUlEQVR4nO3UMQqEQBREQa/mZb2WR9HcQJCZlh6oB5Mtv5cK3DZJkiTptf04r5UeAAAAsgDTBwYDAAAAAAAAAKwD0H4vPtB+Lz7Qfi8+0H4vPtB+Lz7Qfi8+0H4vPtB+b3jg+fvRN/v/fQ4AAADVHy0AAAAAAAAAwDoAswMAAAAAAAAA/AfQ/gAAACBJkiS9dAPh83vJOsFdHQAAAABJRU5ErkJggg==" alt="contactus"></a>'
				]
			}
		});
	//Tags Container 
	$('.chosen-select2').chosen({
		disable_search: true
	});
	$('.chosen-select1').chosen({
		disable_search: true
	});
	$('.chosen-select7').chosen({
		disable_search: true
	});
	
	$('.chosen-select5').chosen({
		disable_search: true
	});
	
	var $tags = $('#searchtags').chosen(),
		LPnewTags = function() {
                    $('.LPtagsContainer').empty();
                    $tags.find(':selected').each(function(i, obj) {
                        $('<div class="active-tag">' + obj.value + '<div class="remove-tag"><i class="fa fa-times"></i></div></div>').appendTo('.LPtagsContainer').on('click', function() {
                            $(this).remove();
                            $(obj).attr('selected', false);
                            $tags.trigger("chosen:updated");
                            $('.LPtagsContainer input[value="' + obj.value + '"]').remove();
                        });

                        $('<input type="hidden" name="select_tag" value="' + obj.value + '" />').appendTo('.LPtagsContainer');
                    });
                };

            $tags.on('change', LPnewTags);
	
		/* Social Share */
		var social = $('.post-stat li ul.social-icons.post-socials');
		var socialOvrly = $('.reviews.sbutton .md-overlay');

		$('.sbutton a.reviews-quantity').on('click', function(event) { 
			event.preventDefault();
			social.fadeIn(400);

			if(socialOvrly.hasClass('hide')){
				$(socialOvrly).removeClass('hide');
				$(socialOvrly).addClass('show');
			}
			else{
				$(socialOvrly).removeClass('show');
				$(socialOvrly).addClass('hide');
			}
		});

		socialOvrly.on('click', function(event) { 
			event.preventDefault();
			social.fadeOut(400);

			if(socialOvrly.hasClass('show')){
				$(socialOvrly).removeClass('show');
				$(socialOvrly).addClass('hide');
			}
			else{
				$(socialOvrly).removeClass('hide');
				$(socialOvrly).addClass('show');
			}
		});
		
		// Reserwa Popup
		jQuery('a.make-reservation').on('click', function(event) {
			event.preventDefault();
			jQuery('.ifram-reservation').fadeIn(400);
		});
		jQuery('a.close-btn').on('click', function(event) {
			event.preventDefault();
			jQuery('.ifram-reservation').fadeOut(400);
		});

		//Menu Popup
		jQuery('.widget-box a.open-modal').on('click', function(event) {
			event.preventDefault();
			jQuery('.hotel-menu').fadeIn(400);
		});
		jQuery('a.close-menu-popup').on('click', function(event) {
			event.preventDefault();
			jQuery('.hotel-menu').fadeOut(400);
		});

		// Resurva Booking Switcher
		jQuery('a.switch-fields').on('click', function(event) {
			event.preventDefault();
			jQuery(this).toggleClass('active');
			jQuery('.hidden-items').fadeToggle(400);
		});

		// Dashboard Notices
		jQuery('a.dismiss').on('click', function(event) {
			event.preventDefault();
			jQuery(this).parent('.panel-dash-dismiss').slideUp(400);
		});
		
		
		
		
		/* Pins Hover */

		$(document).on('mouseenter','.lp-grid-box-contianer',function() {
			var cardID  = $(this).data("postid");
			var	cardclass = '.lpmap-icon-shape.card'+cardID;
			if($(cardclass).hasClass('cardHighlight')) {
				$(cardclass).removeClass("cardHighlight"); 
			 }
			 else{   
				$(cardclass).addClass("cardHighlight"); 
			 }
		  });
		  $(document).on('mouseleave','.lp-grid-box-contianer',function() {
				var cardID  = $(this).data("postid");
				var	cardclass = '.lpmap-icon-shape.card'+cardID;
				$(cardclass).removeClass("cardHighlight"); 			 
		  });
		  
		  
		  
	 /* Select Category */
	 $('.postsubmitSelect').on('change', function(){
		 $('.featuresDataRow').show();
		var cvalue =	$(this).val() ;
		$('.featuresData').css({'opacity':'0','visibility':'hidden','display':'none'});
		$('.featuresDataContainer').find('.featuresData'+cvalue).css({'opacity':'1','visibility':'visible','display':'block'});
	});
	
});
$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});






$(document).ready(function(){
	if($('form').is('#lp-submit-formdf')) {
		var validator = new FormValidator('lp-submit-form', [
		{
			name: 'postTitle',
			display: 'Title',
			rules: 'required'
		}, {
			name: 'category',
			display: 'Category',
			rules: 'required'
		}, {
			name: 'postContent',
			display: 'Description',
			rules: 'required'
		},  {
			name: 'location',
			display: 'Location',
			rules: 'required'
		},  {
			name: 'gAddress',
			display: 'Google Address',
			rules: 'required'
		},{
			name: 'email',
			rules: 'valid_email',
			
		},{
			name: 'username',
			display: 'UserName',
			rules: 'required'
			
		},{
			name: 'policycheck',
			display: 'Terms and Conditions Check',
			rules: 'required'
			
		}], function(errors, evt) {


			var SELECTOR_ERRORS = $('.error_box'),
				SELECTOR_SUCCESS = $('.success_box');

			if (errors.length > 0) {
				SELECTOR_ERRORS.empty();

				for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
					SELECTOR_ERRORS.append(errors[i].message + '<br />');
				}

				SELECTOR_SUCCESS.css({ display: 'none' });
				SELECTOR_ERRORS.fadeIn(200);
			} else {
				SELECTOR_ERRORS.css({ display: 'none' });
				SELECTOR_SUCCESS.fadeIn(200);
			}

			
		});
	}	
});
var image_custom_uploader;
var $thisItem = '';

jQuery(document).on('click','.upload-author-image', function(e) {
	e.preventDefault();

	$thisItem = jQuery(this);
	$form = jQuery('#profileupdate');

	//If the uploader object has already been created, reopen the dialog
	if (image_custom_uploader) {
	    image_custom_uploader.open();
	    return;
	}

	//Extend the wp.media object
	image_custom_uploader = wp.media.frames.file_frame = wp.media({
	    title: 'Choose Image',
	    button: {
	        text: 'Choose Image'
	    },
	    multiple: false
	});

	//When a file is selected, grab the URL and set it as the text field's value
	image_custom_uploader.on('select', function() {
	    attachment = image_custom_uploader.state().get('selection').first().toJSON();
	    var url = '';
	    url = attachment['url'];
	    var attachId = '';
	    attachId = attachment['id'];
		
	   jQuery( "img.author-avatar" ).attr({
	        src: url
	    });
	  $form.parent().parent().find( ".criteria-image-url" ).attr({
	        value: url
	    });
	    $form.parent().parent().find( ".criteria-image-id" ).attr({
	        value: attachId
	    });
	});

	//Open the uploader dialog
	image_custom_uploader.open();
});
									
									
/* update by zaheer on 25 feb  */									
jQuery(document).ready(function($){
	jQuery('#listings_checkout input[name=listing_id]').on('change', function() {
	jQuery('#listings_checkout input[name=post_id]').val(jQuery(this, '#listings_checkout').val());
	});
	jQuery('#listings_checkout input[name=plan]').on('change', function() {
	jQuery('#listings_checkout input[name=method]').val(jQuery(this, '#listings_checkout').val());
	});
	
	
	jQuery('.lp-promotebtn').on('click', function(){
		jQuery('#ads_promotion input[name=listing_id]').val(jQuery(this).closest('li').find('input[name=post_id]').val());
	});
	jQuery('#ads_promotion input[name=plan]').on('change', function() {
	jQuery('#ads_promotion input[name=method]').val(jQuery(this, '#listings_checkout').val());
	});


});
/* by zaheer on 25 feb */
	jQuery('.availableprice_options input').change(function($){
		var $total;
		$oldtotal = jQuery('#totalprice').val();
		if (jQuery(this).is(":checked")){
			var $val = jQuery(this).val();
			$total = parseInt($val)+parseInt($oldtotal);
			jQuery('#totalprice').val($total);
			jQuery('.pricetotal #price').html($total);
		}
		else{
			var $val = jQuery(this).val();
			$total = parseInt($oldtotal)-parseInt($val);
			jQuery('#totalprice').val($total);
			jQuery('.pricetotal #price').html($total);
		}
		
	});
	/* end by zaheer on 25 feb */
//end js by zaheer on 9feb
//moin at 17/02/17
/*jQuery(window).scroll(function () {
	if (jQuery(this).scrollTop() > 595){  
			jQuery('.dashboard-tabs.lp-main-tabs').addClass('lp-posi');
	} else if(jQuery(this).scrollTop() < 595) {
		jQuery('.dashboard-tabs.lp-main-tabs').removeClass('lp-posi');
	}
});*/


/* update by zaheer on 25 feb  */
jQuery('.lp-front').on('click','#lp-front' ,function(e) {
	e.preventDefault();
	//jQuery('.lp-front').hide(200);
	jQuery('.lp-front').slideUp(500);
	jQuery('.lp-back1').slideDown(1000);
	//jQuery('.lp-back').show(500);
});
jQuery('.lp-back1').on('click','#lp-back1' ,function(e) {
	e.preventDefault();
	jQuery('.lp-back1').slideUp(500);
	jQuery('.lp-front').slideDown(1000);
});
jQuery('.lp-back1').on('click','#lp-next' ,function(e) {
	e.preventDefault();
	jQuery('.lp-back1').slideUp(500);
	jQuery('.lp-back2').slideDown(1000);
});
jQuery('.lp-back2').on('click','#lp-back2' ,function(e) {
	e.preventDefault();
	jQuery('.lp-back2').slideUp(500);
	jQuery('.lp-back1').slideDown(1000);
});
/* end update by zaheer on 25 feb  */

//dynamic model for invoices by zaheer
jQuery(document).ready(function($){
	
	$('a.showme').click(function(ev){
             ev.preventDefault();
             var rowid = $(this).data('id');
				 reqlink = $(this).data('url');
             $.get(reqlink+'?lp_p_id=' + rowid, function(html){
                 $('#modal-invoice .modal-body').html('');
                 $('#modal-invoice .modal-body').html(html);
                 $('#modal-invoice').modal('show', {backdrop: 'static'});
             });
         });
		
});


jQuery(document).ready(function($){
	jQuery('.lp-home-categoires').find('li').each(function() {
	 var iconsrc = jQuery(this).find('.icons-banner-cat').attr('src');
	 if(iconsrc != ''){
		var changecolor = changeColInUri(iconsrc,"#41A6DF","#ffffff");
		jQuery(this).find('.icons-banner-cat').attr("src", changecolor);
	 }
	});


	jQuery('#input-dropdown').find('li').each(function() {
	 var iconsrc = jQuery(this).find('img').attr('src');
	 if(iconsrc != '' && iconsrc != undefined){
		var changecolor = changeColInUri(iconsrc,"#41A6DF","#ffffff");
		jQuery(this).prepend('<img class="h-icon" src="'+changecolor+'" />');
	 }
	});




	jQuery('.listing-single-cat').find('li').each(function() {
	 var iconsrc = jQuery(this).find('.base-icon').attr('src');
	 if(iconsrc != ''){
		var changecolor = changeColInUri(iconsrc,"#41A6DF","#ffffff");
		jQuery(this).find('.base-icon').attr("src", changecolor);
	 }
	});

	jQuery('.user-portfolio ul.post-socials').find('li').each(function() {
	 var iconsrc = jQuery(this).find('.icon').attr('src');
	 if(iconsrc != ''){
		//var changecolor = changeColInUri(iconsrc,"#41A6DF","#ffffff");
		var changecolor = changeColInUri(iconsrc,"#ffffff","#41A6DF");
		jQuery(this).find('.icon').attr("src", changecolor);
	 }
	});

	jQuery('.post-stat ul.post-socials').find('li').each(function() {
	 var iconsrc = jQuery(this).find('.icon').attr('src');
	 if(iconsrc != ''){
		//var changecolor = changeColInUri(iconsrc,"#41A6DF","#ffffff");
		var changecolor = changeColInUri(iconsrc,"#ffffff","#41A6DF");
		jQuery(this).find('.icon').attr("src", changecolor);
	 }
	});

	jQuery('.blog-social ul.blog-social').find('li').each(function() {
	 var iconsrc = jQuery(this).find('.icon').attr('src');
	 if(iconsrc != ''){
		//var changecolor = changeColInUri(iconsrc,"#41A6DF","#ffffff");
		var changecolor = changeColInUri(iconsrc,"#ffffff","#41A6DF");
		jQuery(this).find('.icon').attr("src", changecolor);
	 }
	});

	jQuery('.user-info ul.social-icons').find('li').each(function() {
	 var iconsrc = jQuery(this).find('.icon').attr('src');
	 if(iconsrc != ''){
		//var changecolor = changeColInUri(iconsrc,"#41A6DF","#ffffff");
		var changecolor = changeColInUri(iconsrc,"#ffffff","#6e6e6e");
		jQuery(this).find('.icon').attr("src", changecolor);
	 }
	});

	jQuery('.popup-post-left-bottom ul.social-icons').find('li').each(function() {
	 var iconsrc = jQuery(this).find('.icon').attr('src');
	 if(iconsrc != ''){
		//var changecolor = changeColInUri(iconsrc,"#41A6DF","#ffffff");
		var changecolor = changeColInUri(iconsrc,"#ffffff","#6e6e6e");
		jQuery(this).find('.icon').attr("src", changecolor);
	 }
	});
	
	if(jQuery('.form-group').is('.lp-location-search')){
		$.getJSON('https://geoip-db.com/json/geoip.php?jsonp=?') 
         .done (function(location)
         {
			$('.lp-dyn-city').text(location.city);
         });
	}
	
});
function hexToRGB(hexStr) {
    var col = {};
    col.r = parseInt(hexStr.substr(1,2),16);
    col.g = parseInt(hexStr.substr(3,2),16);
    col.b = parseInt(hexStr.substr(5,2),16);
    return col;
}

function changeColInUri(data,colfrom,colto) {
    // create fake image to calculate height / width
    var img = document.createElement("img");
    img.src = data;
    img.style.visibility = "hidden";
    document.body.appendChild(img);

    var canvas = document.createElement("canvas");
    canvas.width = img.offsetWidth;
    canvas.height = img.offsetHeight;

    var ctx = canvas.getContext("2d");
    ctx.drawImage(img,0,0);

    // remove image
    img.parentNode.removeChild(img);

    // do actual color replacement

	if(canvas.width != 0){
		var imageData = ctx.getImageData(0,0,canvas.width,canvas.height);
		
		var data = imageData.data;

		var rgbfrom = hexToRGB(colfrom);
		var rgbto = hexToRGB(colto);

		var r,g,b;
		for(var x = 0, len = data.length; x < len; x+=4) {
			r = data[x];
			g = data[x+1];
			b = data[x+2];


				data[x] = rgbto.r;
				data[x+1] = rgbto.g;
				data[x+2] = rgbto.b;

		   
		}

		ctx.putImageData(imageData,0,0);
	}
    return canvas.toDataURL();
}