<?php get_header();?>
	<?php 
	/* The loop starts here. */
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			?>
	<!--==================================Single Banner =================================-->
	<div class="blog-single-page" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>);">
		<div class="blog-heading-inner-container text-center">
			
			<div class="lp-blog-user-thumb">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 51 ); ?>
			</div>
			<h1 class="padding-bottom-15"><?php echo get_the_title(); ?></h1>
			<?php if (function_exists('listingpro_breadcrumbs')) listingpro_breadcrumbs(); ?>
			
			<ul class="lp-blog-grid-author ">
				<li>
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
						<i class="fa fa-user"></i>
						<span><?php the_author(); ?></span>
					</a>
				</li>
				<li>
					<i class="fa fa-calendar"></i>
					<span><?php the_date(get_option('date_format')); ?></span>
				</li>
			</ul><!-- ../lp-blog-grid-author -->
		</div>
		<div class="page-header-overlay"></div>
	</div><!-- ..-->	
	<!--==================================Section Open=================================-->
	<section class="aliceblue">
		<div class="container page-container-second">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 padding-40 blog-single-inner-container lp-border lp-border-radius-8">
					<div class="blog-content popup-gallery">
						<?php the_content(); ?>
					</div>
					<div class="blog-meta clearfix">
						<div class="blog-tags pull-left">
							<ul>
								<li><i class="fa fa-tag"></i></li>
								
								<?php
									$posttags = get_the_tags();
									if ($posttags) {
									  foreach($posttags as $tag) {
										echo '&nbsp;<li><a href="' .get_tag_link($tag->term_id). '">#' .$tag->name. '</a></li>'; 
									  }
									}
								?>
							</ul>
						</div>
						<div class="blog-social pull-right">
							<ul class="social-icons blog-social">
								<li>
									<a href="http://www.facebook.com/share.php?u=<?php echo esc_url(get_the_permalink()); ?>&title=<?php echo get_the_title(); ?>"><!-- Facebook icon by Icons8 -->
										<?php echo listingpro_icons('facebook'); ?>
									</a>
								</li>
								<li>
									<a href="https://plus.google.com/share?url=<?php echo esc_url(get_the_permalink()); ?>"><!-- Google Plus icon by Icons8 -->
									<?php echo listingpro_icons('google'); ?>
									</a>
								</li>
								<li>
									<a href="http://twitter.com/home?status=<?php echo esc_html_e(get_the_title(),'listingpro'); ?>+<?php echo esc_url(get_the_permalink()); ?>"><!-- Twitter icon by Icons8 -->
										<?php echo listingpro_icons('twitter'); ?>
									</a>
								</li>
								<li>
									<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url(get_the_permalink()); ?>&title=<?php echo get_the_title(); ?>&source=<?php echo esc_url(home_url('/')); ?>"><!-- LinkedIn icon by Icons8 -->
										<?php echo listingpro_icons('linkedin'); ?>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<?php
						echo  next_posts_link();
						echo  previous_posts_link();
						comments_template();
					?>

				</div>
			</div>
		</div>
	</section>
	<!--==================================Section Close=================================-->
	<?php 
		} // end while
	} // end if
	?>
<?php get_footer();?>