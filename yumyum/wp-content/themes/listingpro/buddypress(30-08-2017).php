<?php 
get_header();
the_post();

	?>
	
	
<div class="fixed-sidebar">
<?php
	get_sidebar();
?>
</div>

<div class="fixed-sidebar right">
<?php 

		get_template_part('/siderbar_friend');
?>
</div>
	
	<!-- section-contianer open -->
	<div class="section-contianer">
			<div class="container page-container-five">
				<!-- page title close -->
				<div class="row">
					
					<!-- content open -->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="header-spacer"></div>
						<div class="blog-post clearfix">
							<div class="post-content blog-test-page">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
					<!-- content close -->
					<!-- sider open -->
					
					
				</div>
			</div>
		
	</div>
					
					
				
		
				
	

	<?php

get_footer(); ?>