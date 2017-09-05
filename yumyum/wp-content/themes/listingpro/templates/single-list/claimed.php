<?php
$claimed_section = listing_get_metabox('claimed_section');
if($claimed_section == 'claimed') {
}elseif($claimed_section == 'not_claimed') {

?>
	<div class="claim-area">
		<span class="phone-icon">
			<!-- <i class="fa fa-building-o"></i> -->
			<?php echo listingpro_icons('building'); ?>
			<strong><?php echo esc_html__('Own or work here?', 'listingpro'); ?></strong>
		</span>
		<?php 
			/* added by zaheer on 25 feb */
			if( is_user_logged_in() ){ ?>
				<a class="phone-number md-trigger claimformtrigger2" data-modal="modal-2">
					<?php echo esc_html__('Claim Now!', 'listingpro'); ?>
				</a>
				<a class="phone-number claimformtrigger" >
					<?php echo esc_html__('Claim Now!', 'listingpro'); ?>
				</a>
				<?php 
			} else{ ?>
				<a class="phone-number md-trigger claimformtrigger2" data-modal="modal-3">
					<?php echo esc_html__('Claim Now!', 'listingpro'); ?>
				</a>
				<a class="phone-number claimformtrigger" >
					<?php echo esc_html__('Claim Now!', 'listingpro'); ?>
				</a>
				<?php
			}
		?>
	</div>
<?php } ?>