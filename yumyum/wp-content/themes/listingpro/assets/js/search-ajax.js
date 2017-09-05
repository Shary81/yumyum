/* js for search by zaheer */
jQuery(document).ready(function($) {
	
	
	jQuery('input.lp-search-btn').on('click', function(e){
		jQuery(this).next('i').removeClass('icons8-search');
		//jQuery(this).css('color', 'transparent');
		jQuery(this).css('cssText', 'background-image:url() !important; color: transparent');
		if(jQuery('img.searchloading').hasClass('loader-inner-header')){
			jQuery('img.loader-inner-header').css({
				'top': '15px',
				'left': '90%',
				'width': 'auto',
				'height': 'auto',
				'margin-left': '0px'
			});
		}
		
		jQuery('img.searchloading').css('display', 'block');
	});
	
	
	jQuery('form i.cross-search-q').on('click', function(){
		jQuery("form i.cross-search-q").css("display","none");
		jQuery('form .lp-suggested-search').val('');
		jQuery("img.loadinerSearch").css("display","block");
		var qString = '';
		
		jQuery.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajax_search_term_object.ajaxurl,
			data: { 
				'action': 'listingpro_suggested_search', 
				'tagID': qString, 
				},
			success: function(data){
				if(data){
					jQuery("#input-dropdown ul").empty();
					var resArray = [];
					if(data.suggestions.cats){
										jQuery.each(data.suggestions.cats, function(i,v) {
							
											resArray.push(v);
										
										});
									
								}
					jQuery('img.loadinerSearch').css('display','none');
					jQuery("#input-dropdown ul").append(resArray);
					myDropDown.css('display', 'block');
				}
			}
		});
					
	});
	
	var inputField = jQuery('.dropdown_fields');
	var inputTagField = jQuery('#lp_s_tag');
	var inputCatField = jQuery('#lp_s_cat');
	var myDropDown = jQuery("#input-dropdown");
	var myDropDown1 = jQuery("#input-dropdown ul li");
	var myDropOption = jQuery('#input-dropdown > option');
	var html = jQuery('html');
	var select = jQuery('.dropdown_fields, #input-dropdown > option');
	var lps_tag = jQuery('.lp-s-tag');
	var lps_cat = jQuery('.lp-s-cat');

    var length = myDropOption.length;
    inputField.on('click', function(event) {
		//event.preventDefault();
		myDropDown.attr('size', length);
		myDropDown.css('display', 'block');
		

		
		
	});
	
	//myDropDown1.on('click', function(event) {
    jQuery(document).on('click', '#input-dropdown ul li', function(event) {
		
        myDropDown.attr('size', 0);
        var dropValue =  jQuery(this).text();
        var tagVal =  jQuery(this).data('tagid');
        var catVal =  jQuery(this).data('catid');
        var moreVal =  jQuery(this).data('moreval');
        inputField.val(dropValue);
        inputTagField.val(tagVal);
        inputCatField.val(catVal);
		if( tagVal==null && catVal==null && moreVal!=null){
			inputField.val(moreVal);
		}
        jQuery("form i.cross-search-q").css("display","block");
        myDropDown.css('display', 'none');
    });

    html.on('click', function(event) {
		//event.preventDefault();
        myDropDown.attr('size', 0);
         myDropDown.css('display', 'none');
	});

    select.on('click', function(event) {
		event.stopPropagation();
	});
	
	var resArray = [];
	var bufferedResArray = [];
	var prevQString = '?';
	
	//inputField.on('input', function(){
	inputField.bind('change paste keyup', function(){
		
		$this = jQuery(this);
		var qString = this.value;
		
		prevQuery = $this.data('prev-value');
		$this.data( "prev-value", qString.length );
		
		
		if(qString.length==0){
			
			defCats = jQuery('#def-cats').html();
			myDropDown.css('display', 'none');
			jQuery("#input-dropdown ul").empty();
			
			jQuery("#input-dropdown ul").append(defCats);
			myDropDown.css('display', 'block');
			$this.data( "prev-value", qString.length );
			
		}
		else if( (qString.length==1 && prevQString!=qString) || (qString.length==1 && prevQuery < qString.length) ){
			
						myDropDown.css('display', 'none');
						jQuery("#input-dropdown ul").empty();
						resArray = [];
					//jQuery('#selector').val().length
					jQuery("form i.cross-search-q").css("display","none");
					jQuery("img.loadinerSearch").css("display","block");
					//jQuery(this).addClass('loaderimg');
					jQuery.ajax({
						type: 'POST',
						dataType: 'json',
						url: ajax_search_term_object.ajaxurl,
						data: { 
							'action': 'listingpro_suggested_search', 
							'tagID': qString, 
							},
						success: function(data){
							if(data){
								
								
									if(data.suggestions.tag|| data.suggestions.tagsncats || data.suggestions.cats || data.suggestions.titles){
											
											if(data.suggestions.tag){
													jQuery.each(data.suggestions.tag, function(i,v) {
														resArray.push(v);
													});
												//count = resArray.length;
												/* if(count > 5){
													resArray.splice(5, count);
												} */
											}
											
											if(data.suggestions.tagsncats){
													jQuery.each(data.suggestions.tagsncats, function(i,v) {
														resArray.push(v);
													});
											
												/* count = resArray.length;
												if(count > 10){
													resArray.splice(10, count);
												} */
											}
											
												
											if(data.suggestions.cats){
												jQuery.each(data.suggestions.cats, function(i,v) {
														
														resArray.push(v);
													
													});
													
												if(data.suggestions.tag==null && data.suggestions.tagsncats==null && data.suggestions.titles==null ){
													resArray = resArray;
												}
												else{
														/* count = resArray.length;
														if(count > 15){
														resArray.splice(15, count); 
														}*/

												}
														
													
												
											}
											
											if(data.suggestions.titles){
												jQuery.each(data.suggestions.titles, function(i,v) { 		
													
														resArray.push(v);
													
												});
												/* count = resArray.length;
												
												if(count > 20){
													resArray.splice(20, count);
												} */
											}
										
									}
									else{
											if(data.suggestions.more){
												jQuery.each(data.suggestions.more, function(i,v) {
													resArray.push(v);
												});
											
										}
									}
									
									prevQString = data.tagID;
									
									jQuery('img.loadinerSearch').css('display','none');
									if(jQuery('form #select').val() == ''){
										jQuery("form i.cross-search-q").css("display","none");
									}
									else{
										jQuery("form i.cross-search-q").css("display","block");
									}
									
									
									bufferedResArray = resArray;
									filteredRes = [];
									qStringNow = jQuery('.dropdown_fields').val();
									jQuery.each( resArray, function( key, value ) {
										
										if(jQuery(value).find('a').length=="1"){
											rText = jQuery(value).find('a').text();
										}
										else{
											rText = jQuery(value).text();
										}
										
										if (rText.substr(0, qStringNow.length).toUpperCase() == qStringNow.toUpperCase()) {
											filteredRes.push(value);
										}
										
										
										
									});
									
									
									
									if( filteredRes.length > 0){
										myDropDown.css('display', 'none');
										jQuery("#input-dropdown ul").empty();
										
										jQuery("#input-dropdown ul").append(filteredRes);
										myDropDown.css('display', 'block');
										$this.data( "prev-value", qString.length );
										
									}
									
									else if( filteredRes.length < 1 && qStringNow.length < 2){
										myDropDown.css('display', 'none');
										jQuery("#input-dropdown ul").empty();
										$mResults = '<strong>More results for </strong>';
										$mResults = $mResults+qString;
										var defRes = '<li class="lp-wrap-more-results" data-moreval="'+qString+'">'+$mResults+'</li>';
										newResArray.push(defRes);
										jQuery("#input-dropdown ul").append(newResArray);
										myDropDown.css('display', 'block');
										$this.data( "prev-value", qString.length );
									}
									
									
										
									
									
								}
							}
						
					});
		}
		/* get results from buffered data */
		else{
			newResArray = [];
			myDropDown.css('display', 'none');
			jQuery("#input-dropdown ul").empty();
			jQuery.each( bufferedResArray, function( key, value ) {
			  var stringToCheck = jQuery(value).find('span').first().text();
			  if (stringToCheck.substr(0, qString.length).toUpperCase() == qString.toUpperCase()) {
					newResArray.push(value);
			  }
			});
			if(newResArray.length == 0){
				$mResults = '<strong>More results for </strong>';
				$mResults = $mResults+qString;
				var defRes = '<li class="lp-wrap-more-results" data-moreval="'+qString+'">'+$mResults+'</li>';
				newResArray.push(defRes);
			}
			
			jQuery("#input-dropdown ul").append(newResArray);
			myDropDown.css('display', 'block');
		}
	});
    
    
});
/* end js for search by zaheer */



jQuery(document).ready(function($){
	

	
	jQuery("#searchcategory").change(function() {
		jQuery('.tags-area').remove();
		jQuery('.solitaire-infinite-scroll').remove();
		jQuery(".chosen-select").val('').trigger('chosen:updated');
		jQuery("#searchtags").prop('disabled', true).trigger('chosen:updated');
		listStyle = jQuery("#page").data('list-style');
			jQuery.ajax({
				type: 'POST',
				dataType: 'json',
				url: ajax_search_term_object.ajaxurl,
				data: { 
					'action': 'ajax_search_term', 
					'term_id': jQuery("#searchcategory").val(), 
					'list_style': listStyle 
					},
				success: function(data){
					if(data){
							jQuery(".search-row .form-inline").after( data.html );
							jQuery(".lp-features-filter").css( 'opacity','1' );
						
					}
				}
			});
	});


	jQuery("#searchform select").change(function() {
		var docHeight = jQuery( document ).height();
		jQuery( "body" ).prepend( '<div id="full-overlay"></div>' );
		jQuery('#full-overlay').css('height',docHeight+'px');
		jQuery('#content-grids').html(' ');
		jQuery('.solitaire-infinite-scroll').remove();
		jQuery('#content-grids').addClass('content-loading');
		listStyle = jQuery("#page").data('list-style');
		var inexpensive='';
		moderate = '';
		pricey = '';
		ultra = '';
		averageRate = '';
		mostRewvied = '';
		listing_openTime = '';
		
		inexpensive = jQuery('.currency-signs #one').find('.active').data('price');
		moderate = jQuery('.currency-signs #two').find('.active').data('price');
		pricey = jQuery('.currency-signs #three').find('.active').data('price');
		ultra = jQuery('.currency-signs #four').find('.active').data('price');
		
		averageRate = jQuery('.search-filters li#listingRate').find('.active').data('value');	
		mostRewvied = jQuery('.search-filters li#listingReviewed').find('.active').data('value');
		listing_openTime = jQuery('.search-filters li#listing_openTime').find('.active').data('value');
		
		var tags_name = [];
		tags_name = jQuery('.tags-area input[type=checkbox]:checked').map(function(){
		  return jQuery(this).val();
		}).get();
		
			jQuery.ajax({
				type: 'POST',
				dataType: 'json',
				url: ajax_search_term_object.ajaxurl,
				data: { 
					'action': 'ajax_search_tags', 
					'tag_name': jQuery("#searchtags").val(), 
					'cat_id': jQuery("#searchcategory").val(),
					'loc_id': jQuery("#lp_search_loc").val(),
					'inexpensive':inexpensive,
					'moderate':moderate,
					'pricey':pricey,
					'ultra':ultra,
					'averageRate':averageRate,
					'mostRewvied':mostRewvied,
					'listing_openTime':listing_openTime,
					'tag_name':tags_name,
					'list_style': listStyle
					},
				success: function(data){
					jQuery('#full-overlay').remove();
					if(data){
						listing_update(data);
						
					}
				}
			});
	});

	jQuery(document).on('change','.tags-area input[type=checkbox]',function(e){
		var docHeight = jQuery( document ).height();
		jQuery( "body" ).prepend( '<div id="full-overlay"></div>' );
		jQuery('#full-overlay').css('height',docHeight+'px');
		var tags_name = [];
		tags_name = jQuery('.tags-area input[type=checkbox]:checked').map(function(){
		  return jQuery(this).val();
		}).get();
		
		jQuery('#content-grids').html(' ');
		jQuery('.solitaire-infinite-scroll').remove();
		jQuery('#content-grids').addClass('content-loading');
		listStyle = jQuery("#page").data('list-style');
		var inexpensive='';
		moderate = '';
		pricey = '';
		ultra = '';
		averageRate = '';
		mostRewvied = '';
		listing_openTime = '';
		
		inexpensive = jQuery('.currency-signs #one').find('.active').data('price');
		moderate = jQuery('.currency-signs #two').find('.active').data('price');
		pricey = jQuery('.currency-signs #three').find('.active').data('price');
		ultra = jQuery('.currency-signs #four').find('.active').data('price');
		
		averageRate = jQuery('.search-filters li#listingRate').find('.active').data('value');	
		mostRewvied = jQuery('.search-filters li#listingReviewed').find('.active').data('value');
		listing_openTime = jQuery('.search-filters li#listing_openTime').find('.active').data('value');
		
			jQuery.ajax({
				type: 'POST',
				dataType: 'json',
				url: ajax_search_term_object.ajaxurl,
				data: { 
					'action': 'ajax_search_tags', 
					'tag_name': jQuery("#searchtags").val(), 
					'cat_id': jQuery("#searchcategory").val(),
					'loc_id': jQuery("#lp_search_loc").val(),
					'inexpensive':inexpensive,
					'moderate':moderate,
					'pricey':pricey,
					'ultra':ultra,
					'averageRate':averageRate,
					'mostRewvied':mostRewvied,
					'listing_openTime':listing_openTime,					
					'tag_name':tags_name,					
					'list_style': listStyle 
					},
				success: function(data){
					jQuery('#full-overlay').remove();
					if(data){
						listing_update(data);
						
					}
				}
			});
			e.preventDefault();
	});


	
	/* =========================================================== */
	jQuery(".search-filter-attr li a").click(function(event) {
		
		var docHeight = jQuery( document ).height();
		jQuery( "body" ).prepend( '<div id="full-overlay"></div>' );
		jQuery('#full-overlay').css('height',docHeight+'px');
		event.preventDefault();
		jQuery(this).toggleClass('active');
		
		jQuery('#content-grids').html(' ');
		jQuery('.solitaire-infinite-scroll').remove();
		jQuery('#content-grids').addClass('content-loading');
		var inexpensive='';
		moderate = '';
		pricey = '';
		ultra = '';
		averageRate = '';
		mostRewvied = '';
		listing_openTime = '';
		
		inexpensive = jQuery('.currency-signs #one').find('.active').data('price');
		moderate = jQuery('.currency-signs #two').find('.active').data('price');
		pricey = jQuery('.currency-signs #three').find('.active').data('price');
		ultra = jQuery('.currency-signs #four').find('.active').data('price');
		
		averageRate = jQuery('.search-filters li#listingRate').find('.active').data('value');	
		mostRewvied = jQuery('.search-filters li#listingReviewed').find('.active').data('value');
		listing_openTime = jQuery('.search-filters li#listing_openTime').find('.active').data('value');
		
		var tags_name = [];
		tags_name = jQuery('.tags-area input[type=checkbox]:checked').map(function(){
		  return jQuery(this).val();
		}).get();

		
		listStyle = jQuery("#page").data('list-style');
			jQuery.ajax({
				type: 'POST',
				dataType: 'json',
				url: ajax_search_term_object.ajaxurl,
				data: { 
					'action': 'ajax_search_tags', 
					'inexpensive':inexpensive,
					'moderate':moderate,
					'pricey':pricey,
					'ultra':ultra,
					'averageRate':averageRate,
					'mostRewvied':mostRewvied,
					'listing_openTime':listing_openTime,
					'tag_name':tags_name,
					'cat_id': jQuery("#searchcategory").val(), 
					'loc_id': jQuery("#lp_search_loc").val(),
					'list_style': listStyle 
					},
				success: function(data) {
					jQuery('#full-overlay').remove();
					if(data){
						listing_update(data);
						
							
					}
				  } 
			});
	});

	
	/* =======================Open now========================= */
	jQuery(document).on('click','.search-filters li#listing_openTime a',function(event) {
		
		
		var docHeight = jQuery( document ).height();
		jQuery( "body" ).prepend( '<div id="full-overlay"></div>' );
		jQuery('#full-overlay').css('height',docHeight+'px');
		event.preventDefault();
		
		jQuery('#content-grids').html(' ');
		jQuery('.solitaire-infinite-scroll').remove();
		jQuery('#content-grids').addClass('content-loading');
		var inexpensive='';
		moderate = '';
		pricey = '';
		ultra = '';
		averageRate = '';
		mostRewvied = '';
		var listing_openTime = '';
		
		inexpensive = jQuery('.currency-signs #one').find('.active').data('price');
		moderate = jQuery('.currency-signs #two').find('.active').data('price');
		pricey = jQuery('.currency-signs #three').find('.active').data('price');
		ultra = jQuery('.currency-signs #four').find('.active').data('price');
		
		averageRate = jQuery('.search-filters li#listingRate').find('.active').data('value');	
		mostRewvied = jQuery('.search-filters li#listingReviewed').find('.active').data('value');
		
		jQuery(this).toggleClass('active');
		if(jQuery(this).hasClass("active")){
			jQuery(this).attr('data-value', 'open');
			listing_openTime = 'open';			
		}
		else{
			jQuery(this).attr('data-value', 'close');
			listing_openTime = 'close';			
		}
		//listing_openTime = jQuery(this).data('value');

		var tags_name = [];
		tags_name = jQuery('.tags-area input[type=checkbox]:checked').map(function(){
		  return jQuery(this).val();
		}).get();

		
		listStyle = jQuery("#page").data('list-style');
			jQuery.ajax({
				type: 'POST',
				dataType: 'json',
				url: ajax_search_term_object.ajaxurl,
				data: { 
					'action': 'ajax_search_tags', 
					'inexpensive':inexpensive,
					'moderate':moderate,
					'pricey':pricey,
					'ultra':ultra,
					'averageRate':averageRate,
					'mostRewvied':mostRewvied,
					'listing_openTime':listing_openTime,
					'tag_name':tags_name,
					'cat_id': jQuery("#searchcategory").val(), 
					'loc_id': jQuery("#lp_search_loc").val(),
					'list_style': listStyle 
					},
				success: function(data) {
					jQuery('#full-overlay').remove();
					if(data){
						listing_update(data);
						if(data.opentime!=''){
							var timevalue = ''; 
							timevalue = data.opentime;
							/* if(timevalue=='open'){
								jQuery('#content-grids .lp-grid-box-contianer .grid-closed:contains("Closed Now")') .closest( ".lp-grid-box-contianer" ).css('display','none');
							}
							if(timevalue=='close'){
								jQuery('#content-grids .lp-grid-box-contianer .grid-closed:contains("Closed Now")') .closest( ".lp-grid-box-contianer" ).css('display','block');
							} */
							
						}
							
					}
				  } 
			});
	});
	/* =====by zaheer on 13 march====== */
	
	jQuery(document).on('click', '.add-to-fav',function(e) {
		e.preventDefault() 
		$this = jQuery(this);
		$this.find('i').addClass('fa-spin fa-spinner');
		var val = jQuery(this).data('post-id');
		var type = jQuery(this).data('post-type');
			jQuery.ajax({
				type: 'POST',
				dataType: 'json',
				url: ajax_search_term_object.ajaxurl,
				data: { 
					'action': 'listingpro_add_favorite', 
					'post-id': val, 
					'type': type,
					},
				success: function(data) {
					if(data){
						if(data.active == 'yes'){
							$this.find('i').removeClass('fa-spin fa-spinner');
							if(data.type == 'grids' || data.type == 'list'){
							var successText = $this.data('success-text');
							$this.find('span').text(successText);
							//alert($this.find('i'));
							$this.find('.fa').removeClass('fa-bookmark-o');
							$this.find('.fa').addClass('fa-bookmark');
							}else{
								var successText =$this.data('success-text');
								$this.find('span').text(successText);
								$this.find('i').removeClass('fa-bookmark');
								$this.find('i').addClass('fa-bookmark-o');
							}				
						}				
					}
				  } 
			});
	});
	

	
	jQuery(".remove-fav").click(function(e) {
			e.preventDefault() 
			var val = jQuery(this).data('post-id');
			jQuery(this).find('i').removeClass('fa-close');
			jQuery(this).find('i').addClass('fa-spinner fa-spin');
			$this = jQuery(this);
				jQuery.ajax({
					type: 'POST',
					dataType: 'json',
					url: ajax_search_term_object.ajaxurl,
					data: { 
						'action': 'listingpro_remove_favorite', 
						'post-id': val, 
						},
					success: function(data) {
						if(data){
							if(data.remove == 'yes'){
								$this .parent( ".lp-grid-box-contianer" ).fadeOut();
							}
						}
					  }
				});			
			
	});
	


});

/*
jQuery(document).ready(function($){
	if($('#content-grids').is('.lp-list-page-grid')) {
		//alert();
		jQuery('#content-grids').html(' ');
			jQuery.ajax({
				type: 'POST',
				dataType: 'json',
				url: ajax_search_term_object.ajaxurl,
				data: { 
					'action': 'ajax_listing_load', 
					},
				success: function(data) {

					  //alert(data); 
						//jQuery('#content-grids').html(data); 	
				jQuery.each(data, function(i,v) {  
						jQuery('#content-grids').html(v); 
					});						
				  }
			});
	}

});
*/

			function listing_update(data){
				
					
						jQuery('#content-grids').hide();
						jQuery('#content-grids').html(data.html); 
						
						//jQuery('#listing_found').html('<p>'+data.found+' '+data.foundtext+'</p>'); 	
						jQuery('#content-grids').fadeIn('slow'); 					
						jQuery('#content-grids').removeClass('content-loading');						
						
					var taxonomy = jQuery('section.taxonomy').attr('id');
					
						if(taxonomy == 'location'){
							if(data.cat != ''){
								var CatName = data.cat;
								CatName = CatName.replace('&amp;', '&');
								jQuery('.filter-top-section').children('.lp-title').find('span.term-name').html(CatName+' Listings <span style="font-weight:normal;"> In </span>');
								jQuery('.filter-top-section').children('.lp-title').find('span.font-bold:last-child').text(data.city);
								//window.history.pushState("Details", "Title", 'location/'+data.cat);	
							}
							
						}else if(taxonomy == 'listing-category'){
	
							if(data.cat != ''){
								var CatName = data.cat;
								CatName = CatName.replace('&amp;', '&');
								jQuery('.filter-top-section').children('.lp-title').find('span.term-name').text(CatName);
								//window.history.pushState("Details", "Title", 'location/'+data.cat);	
							}
							
						}else if(taxonomy == 'features'){
							jQuery('.showbread').show();
							jQuery('.fst-term').html(data.tags);
							if(data.keyword != ''){
								jQuery('.s-term').html(',&nbsp;keyword&nbsp;"'+data.keyword+'"');
							}else{
								jQuery('.s-term').html(' ');
							}
							if(data.city != ''){
								if(data.cat != ''){									
									jQuery('.sec-term').html('&amp;&nbsp;'+data.city);
								}else{
									jQuery('.sec-term').html(data.city);
								}
							}else{
								jQuery('.sec-term').html(' ');
							}
							if(data.tags != ''){
								jQuery('.tag-term').html(',&nbsp;tagged&nbsp;('+data.tags+')');
							}
							if(data.tags == null){
								jQuery('.tag-term').html('');
							}
						}
						
						
						else if(taxonomy == 'keyword'){
							jQuery('.showbread').show();
							jQuery('.fst-term').html(data.cat);
							if(data.keyword != ''){
								jQuery('.s-term').html(',&nbsp;keyword&nbsp;"'+data.keyword+'"');
							}else{
								jQuery('.s-term').html(' ');
							}
							if(data.city != ''){
								if(data.cat != ''){									
									jQuery('.sec-term').html('&amp;&nbsp;'+data.city);
								}else{
									jQuery('.sec-term').html(data.city);
								}
							}else{
								jQuery('.sec-term').html(' ');
							}
							
							if(data.tags != ''){
								jQuery('.tag-term').html(',&nbsp;tagged&nbsp;('+data.tags+')');
							}
							if(data.tags == null){
								jQuery('.tag-term').html('');
							}
						}
						
					
					jQuery( ".all-list-map" ).trigger('click');
					//jQuery( ".qickpopup" ).trigger('click');
					 
					
			}