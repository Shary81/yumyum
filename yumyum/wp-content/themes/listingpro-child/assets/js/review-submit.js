 jQuery(document).ready(function($){
	 jQuery( '#rewies_form' ).on('submit', function(e){
		$this = jQuery(this);
		$this.find('.review_status').text('');
		$this.find(':input[type=submit]').prop('disabled', true);
		$title = jQuery('#post_title').val();
		$rating = jQuery('#review-rating').val();
		$description = jQuery('#post_description').val();
		var $umail = '';
		$umail = $this.find(":input[type=email]").val();
		if ($umail !== undefined){
			$this.find('.loadinerSearch').css('display', 'block');
			e.preventDefault();
			if( $title == '' ||  $rating == '' ||  $description == '' ||  $umail == '' ){
				$this.find('.review_status').text('Please fill Email, Title, Description and Rating');
				$this.find('.review_status').addClass('error-msg');
				$this.find(':input[type=submit]').prop('disabled', false);
				$this.find('.loadinerSearch').css('display', 'none');
			}
			else{
					
					
					var fd = new FormData(this);
					fd.append('action', 'ajax_review_submit');
					
					jQuery.ajax({
						type: 'POST',
						url: ajax_review_object.ajaxurl,
						data:fd,
						contentType: false,
						processData: false,
						
						success: function(res){
							var res = jQuery.parseJSON(res);
							$this.find('.loadinerSearch').css('display', 'none');
							$this.find(':input[type=submit]').prop('disabled', false);
							if(res.error){
								$this.find('.review_status').addClass('error-msg');
								$this.find('.review_status').text(res.status);
							}
							else{
								
								$this.find('.review_status').text(res.status);
								$this.find('.review_status').removeClass('error-msg');
								$this.find('.review_status').addClass('success-msg');
								$this[0].reset();
								var timer = '';
								function redirectPageNow(){
									location.reload(true);
									clearTimeout(timer);
								}
								timer = setTimeout(redirectPageNow, 2000);
									
							}
							
						},
						error: function(request, error){
							alert(error);
						}
					});
					
				}
		}
		
		else if( $title == '' ||  $rating == '' ||  $description == '' ){
				$this.find('.review_status').text('Please fill Title, Description and Rating');
				$this.find('.review_status').addClass('error-msg');
				$this.find(':input[type=submit]').prop('disabled', false);
		}
		else{
			$this.find('.loadinerSearch').css('display', 'block');
			e.preventDefault();
			
			var fd = new FormData(this);
			fd.append('action', 'ajax_review_submit');
			
			jQuery.ajax({
				type: 'POST',
				url: ajax_review_object.ajaxurl,
				data:fd,
				contentType: false,
				processData: false,
				
				success: function(res){
					$this.find('.loadinerSearch').css('display', 'none');
					$this.find(':input[type=submit]').prop('disabled', false);
					var res = jQuery.parseJSON(res);
					$this.find('.review_status').text(res.status);
					$this.find('.review_status').removeClass('error-msg');
					$this.find('.review_status').addClass('success-msg');
					$this[0].reset();
					var timer = '';
					function redirectPageNow(){
						location.reload(true);
						clearTimeout(timer);
					}
					timer = setTimeout(redirectPageNow, 2000);
				},
				error: function(request, error){
					alert(error);
				}
			});
			
		}
		return false;
	 });
	 
	 /* by zaheer on 16 march */
	 jQuery(document).on('click' , '.reviews-section a.reviewRes',function(e){
		reviewID = '';
		var $this = jQuery(this);
		$this.find('span.interests-score').text('');
		$this.find('span.interests-score').append('<i class="fa fa-spinner fa-spin"></i>');
		reviewID = $this.data('id');
		var currentVal = $this.data('score');
		var restype = $this.data('restype');
		jQuery.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajax_review_object.ajaxurl,
			data:{
				action:'lp_reviews_interests',
				interest : currentVal,
				restype : restype,
				id : reviewID,
			},
			
			
			success: function(res){
				var newscore = res.newScore;
				$this.data('score', newscore);
				$this.find('span.interests-score').empty('');
				$this.find('span.interests-score').text(newscore);
				if(restype=='interesting'){
					$this.css({'background-color': '#417cdf',
					'color': '#fff'});
				}
				else if(restype=='lol'){
					$this.css({'background-color': '#ff8e29',
					'color': '#fff'});
				}
				else if(restype=='love'){
					$this.css({'background-color': '#ff2357',
					'color': '#fff'});
				}
				
				currentVal = false;
			},
			error: function(request, error){
				alert(error);
			}
		});
		
		e.preventDefault();
	 });
	 
	 
	 jQuery('.reviews-section a.lol').click(function(e){
		var currentVal = '';
		currentVal = jQuery(this).data('score');
	 });
	 
	 jQuery('.reviews-section a.love').click(function(e){
		var currentVal = '';
		currentVal = jQuery(this).data('score');
	 });
	 
	 
	 /* end by zaheer on 16 march */
 });