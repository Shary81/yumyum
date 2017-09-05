<?php
/**
 * BuddyPress - Users Cover Image Header
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>




<?php

/**
 * Fires before the display of a member's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_member_header' ); ?>


<div class="ui-block">
	<div class="top-header">
				
<div id="cover-image-container">
<div class="top-header-thumb">
	<span class="change_cover">
		<i class="fa fa-camera" aria-hidden="true"></i>
		Change Cover Image
	</span>
	<a id="header-cover-image" href="<?php echo home_url('/members/yumyum/profile/change-cover-image/'); ?>" class="header_cover_img">
	<span class="change_cover chng animated fadeIn">
		<i class="_mi _before dashicons dashicons-camera" aria-hidden="true"></i>
		Change Cover Image
	</span>
	</a>
</div>
	<div id="item-header-cover-image" class="profile-section">
		<div id="item-header-avatar" class="top-header-author">
			<a href="<?php echo home_url('/members/yumyum/profile/change-avatar/'); ?>" class="author-thumb change_profile_img">
				<?php bp_displayed_user_avatar( 'type=full' ); ?>
				
				<span class="change_profile chng animated fadeInUp">
					<i class="_mi _before dashicons dashicons-camera" aria-hidden="true"></i>
					Change Profile Photo
				</span>
			</a>
		</div><!-- #item-header-avatar -->

		<div id="item-header-content" class="author-content">

			<?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
				<h2 class="user-nicename author-name remove_margin">@<?php bp_displayed_user_mentionname(); ?></h2>
			<?php endif; ?>

			<div id="item-buttons"><?php

				/**
				 * Fires in the member header actions section.
				 *
				 * @since 1.2.6
				 */
				do_action( 'bp_member_header_actions' ); ?></div><!-- #item-buttons -->

			<span class="activity" data-livestamp="<?php bp_core_iso8601_date( bp_get_user_last_activity( bp_displayed_user_id() ) ); ?>"><?php bp_last_activity( bp_displayed_user_id() ); ?></span>

			<?php

			/**
			 * Fires before the display of the member's header meta.
			 *
			 * @since 1.2.0
			 */
			do_action( 'bp_before_member_header_meta' ); ?>

			<div id="item-meta">

				<?php if ( bp_is_active( 'activity' ) ) : ?>

					<div id="latest-update">

						<?php bp_activity_latest_update( bp_displayed_user_id() ); ?>

					</div>

				<?php endif; ?>

				<?php

				 /**
				  * Fires after the group header actions section.
				  *
				  * If you'd like to show specific profile fields here use:
				  * bp_member_profile_data( 'field=About Me' ); -- Pass the name of the field
				  *
				  * @since 1.2.0
				  */
				 do_action( 'bp_profile_header_meta' );

				 ?>

			</div><!-- #item-meta -->

		</div><!-- #item-header-content -->

	</div><!-- #item-header-cover-image -->
</div><!-- #cover-image-container -->

</div>
</div>



<?php

/**
 * Fires after the display of a member's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_member_header' ); ?>

<div id="template-notices" role="alert" aria-atomic="true">
	<?php

	/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
	do_action( 'template_notices' ); ?>

</div>
