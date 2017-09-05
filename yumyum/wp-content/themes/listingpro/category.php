<?php
/**
 * The template for displaying Category Page.
 */
 
 get_header();
 
 ?>
	<!--==================================Section Open=================================-->
	<section>
		<div class="container page-container-five">
			<div class="row">
				<?php get_template_part( 'loop', 'archive' ); ?>
			</div>
		</div>
	</section>
	<!--==================================Section Close=================================-->

<?php get_footer();?>