<?php
	/*
		Template Name: invite_friends
	*/
	get_header();
	if(!is_user_logged_in()){
	   wp_redirect ('home');
	}
?>

<body class="overlay-enable modal-open">


<!-- Window-popup Create Friends Group Add Friends -->
<div class="modal fade show" id="create-friend-group-add-friends" style="display: block">
	<div class="modal-dialog ui-block window-popup create-friend-group create-friend-group-add-friends">
		<a href="<?php echo home_url('/profile'); ?>" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 class="title">Add Friends to “Freelance Clients” Group</h6>
		</div>

		<div class="ui-block-content">
			<form class="form-group label-floating is-select">

				<select class="selectpicker form-control style-2 show-tick" multiple data-max-options="2" data-live-search="true" size="auto">
					<option title="Green Goo Rock" data-content='<div class="inline-items">
										<div class="author-thumb">
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar52-sm.jpg" alt="author">
										</div>
											<div class="h6 author-title">Green Goo Rock</div>

										</div>'>
					</option>

					<option title="Mathilda Brinker" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar74-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Mathilda Brinker</div>
										</div>'>
					</option>

					<option title="Marina Valentine" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar48-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Marina Valentine</div>
										</div>'>
					</option>

					<option title="Dave Marinara" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar75-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Dave Marinara</div>
										</div>'>
					</option>

					<option title="Rachel Howlett" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatar76-sm.jpg" alt="author">
											</div>
											<div class="h6 author-title">Rachel Howlett</div>
										</div>'>
					</option>

				</select>
			</form>

			<a href="#" class="btn btn-blue btn-lg full-width">Save Changes</a>
		</div>

	</div>
</div>
<!-- ... end Window-popup Create Friends Group Add Friends -->


<?php
	get_footer();

?>