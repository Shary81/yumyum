<?php 
get_header();
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
	<div class="fixed-sidebar">
<?php
	get_sidebar();
?>
</div>
		<div class="row">
				<div class="col-md-12 col-sm-12">
								<img   src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/luby.jpg" height="250px" width="1280px" alt="icon">
				</div>
			</div>
			<div class="container page-container-five">
				<!-- page title close -->
				<div class="row">
					
					<!-- content open -->
					<div class="col-md-9 col-sm-9">
						<div class="blog-post clearfix">
							<div class="post-content blog-test-page">
								<?php the_content(); ?>
							</div>	
						</div>
					</div>
					<!-- content close -->
					<!-- sider open -->
					<div class="col-md-3 col-sm-3">
						<div class="side-bar">
						<?php get_template_part("sidebar_default");?>
						</div>
					</div>
					
				</div>
			</div>
		
	</div>
					
					
				
		
				
	

	<?php
}
get_footer(); ?>