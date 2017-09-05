 jQuery(document).ready(function($){
	 jQuery('#claimform').on('submit', function(e){
		$this = jQuery(this);
		$this.find('.statuss').html('');
		jQuery(this).find('.formsubmitting').css('visibility','visible');
		e.preventDefault();
		var formData = $(this).serialize();
		
		jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: single_ajax_object.ajaxurl,
            data: { 
                'action': 'listingpro_claim_list', 
                'formData': formData, 
			},   
            success: function(res){
				$this.find('.formsubmitting').css('visibility','hidden');
                //alert(res.state);
				$this.find('.statuss').html(res.state);
				
				$this[0].reset();
            }
        });
		//return false;
		 //alert(formData);
	 });
	 
	 
	 
	 jQuery('#contactOwner').on('submit', function(e){
		
		$this = jQuery(this);
		$this.find('.lp-search-icon').removeClass('fa-send');	
		$this.find('.lp-search-icon').addClass('fa-spinner fa-spin');
		e.preventDefault();
		var formData = $(this).serialize();
		
		jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: single_ajax_object.ajaxurl,
            data: { 
                'action': 'listingpro_contactowner', 
                'formData': formData, 
			},   
            success: function(res){
				if(res.result==="fail"){
					jQuery.each(res.errors, function (k, v) {
						if(k==="email"){
							jQuery("input[name='email7']").addClass('error-msg');
						}
						if(k==="message"){
							jQuery("textarea[name='message7']").addClass('error-msg');
						}
						if(k==="name7"){
							jQuery("input[name='name7']").addClass('error-msg');
						}
						$this.find('.lp-search-icon').removeClass('fa-spinner fa-spin');	
						$this.find('.lp-search-icon').addClass('fa-cross');
						//$this.append(res.state);
					});
				}
				else{
					$this.find('.lp-search-icon').removeClass('fa-spinner fa-spin');	
					$this.find('.lp-search-icon').addClass('fa-check');
					//$this.append(res.state);
					$this[0].reset();
				}
            }
        });
		//return false;
		 //alert(formData);

	 });
 });