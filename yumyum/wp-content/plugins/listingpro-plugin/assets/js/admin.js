/*-----------------------------------------------------------------------------------*/
/*	Custom Script for admin
/*-----------------------------------------------------------------------------------*/
	jQuery(function($) {
	if(jQuery("tr").is('#field_faqs')){
	var tabs = jQuery("#field_faqs").find("#tabs").tabs();
	}
	jQuery('#tabsbtn').click(function(){
		var ul = tabs.find( "ul" );
		var list = Number(ul.find( "li" ).length) + 1;
		jQuery( "<li><a href='#tab"+list+"'>Q "+list+"</a></li>" ).appendTo( ul );
		
		var content = "<div class='form-group'><label for='faq-"+list+"'>FAQ Number "+list+"</label><input type='text' class='form-control' name='faqs[faq]["+list+"]' id='faq-"+list+"' placeholder='FAQ "+list+"'></div><div class='form-group'><label for='faq-ans-"+list+"'>Answer "+list+"</label><textarea class='form-control' name='faqs[faqans]["+list+"]' rows='8' id='faq-ans-"+list+"'></textarea></div>";
		
		jQuery( "<div id='tab"+list+"'><p>"+content+"</p></div>" ).appendTo( tabs );
		tabs.tabs( "refresh" );
	});
	
	
		// Add hours
	jQuery('button.add-hours').on('click', function(event) {
		event.preventDefault();
		var weekday = jQuery('select.weekday').val();
		var startVal = jQuery('select.hours-start').val();
		var endVal = jQuery('select.hours-end').val();
		var hrstart = jQuery('select.hours-start').find('option:selected').text();
		var hrend = jQuery('select.hours-end').find('option:selected').text();

		jQuery('div.weekday').text(weekday);
		jQuery('.hours-display').append("<div class='hours'><span class='weekday'>"+ weekday +"</span><span class='start'>"+ hrstart +"</span><span>-</span><span class='end'>"+ hrend +"</span><a class='remove-hours' href='#'>Remove</a><input name='business_hours["+weekday+"][open]' value='"+startVal+"' type='hidden'><input name='business_hours["+weekday+"][close]' value='"+endVal+"' type='hidden'></div>");
		var current = jQuery('select.weekday').find('option:selected');
		var nextval = current.next();
		current.removeAttr('selected');
		nextval.attr('selected','selected');
		 jQuery('select.weekday').trigger('change.select2');
	});

	// Remove Hours Script
	
	jQuery(document).on('click','a.remove-hours',function(event){
		event.preventDefault();
		jQuery(this).parent('.hours').remove();
	});
	
	
	
  });
  
  jQuery(function() {
		var div = jQuery( '.type_inrement' );
		var th = div.find( "th" );		
		var td = div.find( "td" );
		var dataID = div.data( "id" );
		var dataVALUE= div.data( "value" );
		var dataNAME = div.data( "name" );		
		var listfirst = Number(td.find( "input" ).length);
		div.find( "th" ).find('strong').text(dataNAME+" "+listfirst);
	jQuery('#metaincbtn').click(function(){			
		var list = Number(td.find( "input" ).length) + 1;		
		var thContent = "<label for='"+dataID+"["+list+"]'><strong>"+dataNAME+" "+list+"</strong><span></span></label>";
		var tdContent = "<input type='text' name='"+dataID+"["+list+"]' id='"+dataID+"' value='"+dataVALUE+"' />";
		jQuery(thContent).appendTo( th );
		jQuery(tdContent).appendTo( td );

	});				
	
	
  jQuery(window).load(function($){
		var listID = jQuery('#post_ID').val();	
		var termID = jQuery('#listing-categorychecklist').find('input:checked').val();
		if(termID != undefined && termID != ''){
		jQuery.ajax({
				type: 'POST',
				dataType: 'json',
				url: ajaxurl,
				data: { 
					'action': 'lp_get_fields', 
					'term_id': jQuery('#listing-categorychecklist').find('input').val(), 
					'list_id': listID, 
					},
				success: function(data){
					//alert(data);
					if(data){
						$output1 = "<div id='commentstatusdiv' class='lp-metaboxes postbox extrafieldsdiv'><h2 class='hndle ui-sortable-handle'><span>Extra Fields</span></h2><div class='inside'><table class='form-table lp-metaboxes'><tbody>";
						$outputf = "<div id='commentstatusdiv' class='lp-metaboxes postbox extrafieldsdiv'><h2 class='hndle ui-sortable-handle'><span>Please select Features</span></h2><div class='inside'><table class='form-table lp-metaboxes'><tbody>";
						
						$output2 = "</tbody></table></div></div>";
						
						if(data.features != null){
							jQuery('#postbox-container-2').append($outputf+data.features+$output2);
						}else{
							jQuery('#postbox-container-2').append($output1+'<p>No Fields Associated</p>'+$output2);
						}
						
						if(data.fields != null){
							jQuery('#postbox-container-2').append($output1+data.fields+$output2);
						}else{
							jQuery('#postbox-container-2').append($output1+'<p>No Fields Associated</p>'+$output2);
						}
					}
					
				}
			});
		}
	});
	
	
	jQuery("#listing-categorychecklist").find('input').on("click", function($){
		jQuery('.extrafieldsdiv').remove();
		if(jQuery(this).parent().parent().parent().parent().children('label').find('input:checkbox').is(":checked")){
		}else{
			jQuery("#listing-categorychecklist").children('li').find('label').find('input:checkbox').removeAttr('checked');
		}
		jQuery(this).attr('checked','checked');
		var listID = jQuery('#post_ID').val();
		jQuery.ajax({
				type: 'POST',
				dataType: 'json',
				url: ajaxurl,
				data: { 
					'action': 'lp_get_fields', 
					'term_id': jQuery(this).val(), 
					'list_id': listID, 
					},
				success: function(data){
					//alert(data);
					if(data){
						$output1 = "<div id='commentstatusdiv' class='lp-metaboxes postbox extrafieldsdiv'><h2 class='hndle ui-sortable-handle'><span>Extra Fields</span></h2><div class='inside'><table class='form-table lp-metaboxes'><tbody>";
						$outputf = "<div id='commentstatusdiv' class='lp-metaboxes postbox extrafieldsdiv'><h2 class='hndle ui-sortable-handle'><span>Please select Features</span></h2><div class='inside'><table class='form-table lp-metaboxes'><tbody>";
						
						$output2 = "</tbody></table></div></div>";
						
						if(data.features != null){
							jQuery('#postbox-container-2').append($outputf+data.features+$output2);
						}else{
							jQuery('#postbox-container-2').append($output1+'<p>No Fields Associated</p>'+$output2);
						}
						
						if(data.fields != null){
							jQuery('#postbox-container-2').append($output1+data.fields+$output2);
						}else{
							jQuery('#postbox-container-2').append($output1+'<p>No Fields Associated</p>'+$output2);
						}
					}
					
				}
			});
		
	});
	
  });