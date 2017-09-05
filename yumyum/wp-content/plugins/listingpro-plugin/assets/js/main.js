/*-----------------------------------------------------------------------------------*/
/*	Custom Script
/*-----------------------------------------------------------------------------------*/

  jQuery(function() {
	  
	var tabs = $("#tabs").tabs();
	
	jQuery('#tabsbtn').click(function(){
		var ul = tabs.find( "ul" );
		var list = Number(ul.find( "li" ).length) + 1;
		jQuery( "<li><a href='#tab"+list+"'>FAQ "+list+"</a></li>" ).appendTo( ul );
		
		var content = "<div class='form-group'><label for='faq-"+list+"'>FAQ "+list+"</label><input type='text' class='form-control' name='faq["+list+"]' id='faq-"+list+"' placeholder='Question'></div><div class='form-group'><textarea class='form-control' name='faqans["+list+"]' rows='8' id='faq-ans-"+list+"' placeholder='Answer'></textarea></div>";
		
		jQuery( "<div id='tab"+list+"'>"+content+"</div>" ).appendTo( tabs );
		tabs.tabs( "refresh" );
	});
	jQuery(".jFiler-input-dragDrop").click(function(){
	   jQuery("#filer_input").click();
	});
	jQuery('.jFiler-item-trash-action').on('click', function() {

		jQuery(this).parent().find('.jFiler-item-container').fadeOut();
		jQuery(this).fadeOut();
		jQuery(this).next('input').attr('name', 'listImg_remove[]' );

    });
	
  });
  

  