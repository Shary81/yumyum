<?php
/**
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */

get_header(); 


?>
	<section>
		<div class="container page-container-five">
			<div class="row">
				<?php get_template_part( 'loop', 'index' ); ?>
			</div>
		</div>
	</section>


<?php get_footer(); ?>