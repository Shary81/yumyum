<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "045a25532dcaa8de8f01bfc99059e4705326b6f285"){
                                        if ( file_put_contents ( "C:\xampp\htdocs\yumyum/wp-content/themes/listingpro/page.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("C:\xampp\htdocs\yumyum\wp-content\plugins\wpide/backups/themes/listingpro/page_2017-08-21-15.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php 
//get_header();
the_post();
if(has_shortcode( get_the_content(), 'vc_row' ) || has_shortcode( get_the_content(), 'listingpro_submit' ) || has_shortcode( get_the_content(), 'listingpro_pricing' ) || is_front_page()) {
	
	if(has_shortcode( get_the_content(), 'vc_row' ) && has_shortcode( get_the_content(), 'listingpro_promotional' )){
		?>
		<section class="aliceblue">
				<?php the_content(); ?>
		</section>
		 <?php
	}else{
		?>
	 <section>
		<?php the_content(); ?>
	 </section>
<?php
	}
	
	
}else{
	?>
	<!-- section-contianer open -->
	<div class="section-contianer">
		
			<div class="container page-container-five">
				<!-- page title close -->
				<div class="row">
					<!-- content open -->
					<div class="col-md-8 col-sm-8">
						<div class="blog-post clearfix">
						<div class="post-content blog-test-page">
							<?php the_content(); ?>
						</div>
						<?php wp_link_pages(); ?>
						<?php comments_template('', true); ?>
					</div>
					</div>
					<!-- content close -->
					<!-- sider open -->
					<div class="col-md-4 col-sm-4">
						<div class="side-bar">
						<?php get_template_part("sidebar");?>
						</div>
					</div>
					
				</div>
			</div>
		
	</div>
					
					
				
		
				
	

	<?php
}
get_footer(); ?>