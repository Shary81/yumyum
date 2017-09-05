<?php 
	global $listingpro_options;
	
	$copy_right = $listingpro_options['copy_right'];
	$footer_address = $listingpro_options['footer_address'];
	$phone_number = $listingpro_options['phone_number'];
	$author_info = $listingpro_options['author_info'];
	$fb = $listingpro_options['fb'];
	$tw = $listingpro_options['tw'];
	$gog = $listingpro_options['gog'];
	$insta = $listingpro_options['insta'];
	$tumb = $listingpro_options['tumb'];
	
	
	$footerNeed = true;
	$listing_style = $listingpro_options['listing_style'];
	if(isset($_GET['list-style']) && !empty($_GET['list-style'])){
		$listing_style = $_GET['list-style'];
	}
	if(is_tax('location') || is_tax('listing-category') || is_tax('features') || is_search()){
		if($listing_style == '2' || $listing_style == '3'){
			$footerNeed = false;
		}
	}
	if($footerNeed == true){
?>
<!--==================================Footer Open=================================-->
	<footer class="text-center">
		<div class="footer-upper-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php echo listingpro_footer_menu(); ?>
					</div>
				</div>
			</div>
		</div><!-- ../footer-upper-bar -->
		<div class="footer-bottom-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="footer-about-company">
						
						<?php 
						
						if( $copy_right ){
							echo '<li>'.$copy_right.'</li>';
						}
						
						?>
						
						<?php 
						
						if( $footer_address ){
							echo '<li>'.$footer_address.'</li>';
						}
						
						?>
						
						<?php 
						
						if( $phone_number ){
							echo '<li>Tel '.$phone_number.'</li>';
						}
						
						?>
						
						</ul>
						
						<?php 
						
						if( $author_info ){
							echo '<p class="credit-links">'.$author_info.'</p>';
						}
						
						?>
						<?php if(!empty($tw) || !empty($gog) || !empty($fb) || !empty($insta) || !empty($tumb)){ ?>
						<ul class="social-icons footer-social-icons">
						<?php if(!empty($fb)){ ?>
							<li>
								<a href="<?php echo $fb; ?>" target="_blank">
									<?php echo listingpro_icons('facebook'); ?>
								</a>
							</li>
						<?php } ?>
						<?php if(!empty($gog)){ ?>
							<li>
								<a href="<?php echo $gog; ?>" target="_blank">
									<?php echo listingpro_icons('google'); ?>
								</a>
							</li>
						<?php } ?>
						<?php if(!empty($tw)){ ?>
							<li>
								<a href="<?php echo $tw; ?>" target="_blank">
									<?php echo listingpro_icons('tw'); ?>
								</a>
							</li>
						<?php } ?>
						<?php if(!empty($insta)){ ?>
							<li>
								<a href="<?php echo $insta; ?>" target="_blank">
									<?php echo listingpro_icons('instagram'); ?>
								</a>
							</li>
						<?php } ?>
						<?php if(!empty($tumb)){ ?>
							<li>
								<a href="<?php echo $tumb; ?>" target="_blank">
									<?php echo listingpro_icons('tumbler'); ?>
								</a>
							</li>
						<?php } ?>
						</ul>
						<?php } ?>
					</div>
				</div>
			</div>
		</div><!-- ../footer-bottom-bar -->
		
	</footer>


<!-- End Main -->
</div>
	<?php } ?>

<?php wp_footer(); ?>
<script>
( function( $ ) {
$( document ).ready(function() {
$('#cssmenu li.has-sub>a').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp();
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown();
			element.siblings('li').children('ul').slideUp();
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp();
		}
	});

	$('#cssmenu>ul>li.has-sub>a').append('<span class="holder"></span>');

	(function getColor() {
		var r, g, b;
		var textColor = $('#cssmenu').css('color');
		textColor = textColor.slice(4);
		r = textColor.slice(0, textColor.indexOf(','));
		textColor = textColor.slice(textColor.indexOf(' ') + 1);
		g = textColor.slice(0, textColor.indexOf(','));
		textColor = textColor.slice(textColor.indexOf(' ') + 1);
		b = textColor.slice(0, textColor.indexOf(')'));
		var l = rgbToHsl(r, g, b);
		if (l > 0.7) {
			$('#cssmenu>ul>li>a').css('text-shadow', '0 1px 1px rgba(0, 0, 0, .35)');
			$('#cssmenu>ul>li>a>span').css('border-color', 'rgba(0, 0, 0, .35)');
		}
		else
		{
			$('#cssmenu>ul>li>a').css('text-shadow', '0 1px 0 rgba(255, 255, 255, .35)');
			$('#cssmenu>ul>li>a>span').css('border-color', 'rgba(255, 255, 255, .35)');
		}
	})();

	function rgbToHsl(r, g, b) {
	    r /= 255, g /= 255, b /= 255;
	    var max = Math.max(r, g, b), min = Math.min(r, g, b);
	    var h, s, l = (max + min) / 2;

	    if(max == min){
	        h = s = 0;
	    }
	    else {
	        var d = max - min;
	        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
	        switch(max){
	            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
	            case g: h = (b - r) / d + 2; break;
	            case b: h = (r - g) / d + 4; break;
	        }
	        h /= 6;
	    }
	    return l;
	}
});
} )( jQuery );

</script>


	</body>	
</html>
