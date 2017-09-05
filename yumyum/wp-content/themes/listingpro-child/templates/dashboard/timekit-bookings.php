<?php

if ( isset( $_POST['timekit_nonce_field'] ) && wp_verify_nonce( $_POST['timekit_nonce_field'], 'timekit_nonce' ) ) {

	$timekitAPI 		= $_POST['timekitAPI'];
	$timekitAPP 		= $_POST['timekitAPP'];
	$timekitListing 	= $_POST['timekitListing'];
	$timekitName 		= $_POST['timekitName'];
	$timekitEmail 		= $_POST['timekitEmail'];

	$timekitArray = array('timekit-app'=>$timekitAPP,'timekit-api-token'=>$timekitAPI,'listing_id' =>$timekitListing,'timekit_name' =>$timekitName,'timekit_email' =>$timekitEmail);
	if(isset($timekitAPI) && !empty($timekitAPI) && isset($timekitListing) && !empty($timekitListing) && isset($timekitAPP) && !empty($timekitAPP) && isset($timekitName) && !empty($timekitName) && isset($timekitEmail) && !empty($timekitEmail)){
		update_post_meta( $timekitListing, 'timekit_booking', $timekitArray);
	}

}

if ( isset( $_POST['timekit_del_nonce_field'] ) && wp_verify_nonce( $_POST['timekit_del_nonce_field'], 'timekit_del_nonce' ) ) {
	$timekit_remove_id 		= $_POST['timekit_remove_id'];
	if(isset($timekit_remove_id) && !empty($timekit_remove_id)){
		delete_post_meta($timekit_remove_id, 'timekit_booking');
	}
}
$user_ID = get_current_user_id();	
$argsActive = array(
	'author'   => $user_ID,
	'posts_per_page'   => -1,
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'listing',
	'post_status'      => 'publish',
	'meta_query' =>
	array(
		array(
			'key'     => 'timekit_booking',
			'compare' => 'EXIST'
		)
	),
);
$Active_array = get_posts( $argsActive ); 

$args = array(
	'author'   => $user_ID,
	'posts_per_page'   => -1,
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'listing',
	'post_status'      => 'publish'
);
$posts_array = get_posts( $args );

$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


?>
<div class="user-recent-listings-inner tab-pane fade in active" id="resurva_bookings">
	<div class="tab-header">
		<h3><?php echo esc_html__('Bookings', 'listingpro'); ?></h3>
	</div>
	<div class="row lp-list-page-list">
		<div class="col-md-12 col-sm-6 col-xs-12 lp-list-view">
			<div class="resurva-booking">
				<div class="lp-list-view-inner-contianer clearfix">
					<form method="post" id="booking" action="<?php echo $actual_link; ?>">
						<a href="#" class="switch-fields"><?php esc_html_e('Add Timekit Bookings','listingpro'); ?></a>
						<div class="hidden-items clearfix">
							<div class="row margin-bottom-20">
								<div class="col-md-6 col-xs-12">
									<label for="timekitName"><?php esc_html_e('Enter your Timekit Name:','listingpro'); ?></label>
									<p><?php esc_html_e('Enter your Timekit name for booking widget','listingpro'); ?></p>
									<input type="text" name="timekitName" id="timekitName" placeholder="<?php esc_html_e('Enter your Timekit Name','listingpro'); ?>" required>
								</div>
								<div class="col-md-6 col-xs-12">
									<label for="timekitEmail"><?php esc_html_e('Enter your Timekit email','listingpro'); ?></label>
									<p><?php esc_html_e('Enter your Timekit email which you are using for Timekit Bookings.','listingpro'); ?></p>
									<input type="text" name="timekitEmail" id="timekitEmail" placeholder="<?php esc_html_e('Enter your Timekit email','listingpro'); ?>" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-xs-12">
									<div class="row">
										<div class="col-md-6 col-xs-12">
											<label for="timekitAPI"><?php esc_html_e('Enter your Timekit API Token','listingpro'); ?></label>
											<input type="text" name="timekitAPI" id="timekitAPI" placeholder="<?php esc_html_e('Enter your Timekit API Token','listingpro'); ?>" required>
										</div>
										<div class="col-md-6 col-xs-12">
											<label for="timekitAPP"><?php esc_html_e('Enter your Timekit APP Name','listingpro'); ?></label>
											<input type="text" name="timekitAPP" id="timekitAPP" placeholder="<?php esc_html_e('Enter your Timekit APP Name','listingpro'); ?>" required>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
									<label for="timekitListing"><?php esc_html_e('Select your list to assign your Timekit booking','listingpro'); ?></label>
									<?php if(!empty($posts_array)){ ?>
									<select class="select2" name="timekitListing" id="timekitListing">
										<?php										
											foreach ($posts_array as $list) {
											?>
												<option value="<?php echo $list->ID; ?>"><?php echo $list->post_title; ?></option>
											<?php } ?>
									</select>
									<?php }else{
										echo esc_html__('You have no published listing.','listingpro');
									} ?>
								</div>
							</div>
							<div class="row margin-top-20">
								<div class="col-md-6 col-xs-12">
									<input type="submit" value="Submit" class="lp-review-btn btn-second-hover">
								</div>
								<div class="col-md-6 col-xs-12">
								</div>
							</div>
						</div>
						<?php echo wp_nonce_field( 'timekit_nonce', 'timekit_nonce_field' , true, false ); ?>
					</form>					
				</div>		
			</div>
			<?php if(!empty($Active_array)){ ?>
				<div class="resurva-booking">
					<div class="lp-list-view-inner-contianer clearfix">
					<h3 class="margin-top-0 margin-bottom-30"><?php esc_html_e('Timekit Bookings Currently Active On','listingpro'); ?></h3>
						<ul class="padding-left-0">
							<?php						
							foreach ($Active_array as $list) {
							?>
								<li class="clearfix">
									<h3 class="pull-left margin-right-30"><?php echo $list->post_title; ?></h3>
									<form method="post" id="booking" action="<?php echo $actual_link; ?>">
										<input type="hidden" name="timekit_remove_id" value="<?php echo $list->ID; ?>" class="lp-review-btn btn-second-hover">
										<span>
											<i class="fa fa-times"></i>
											<input type="submit" value="<?php esc_html_e('Remove Booking','listingpro'); ?>" class="margin-top-10 pull-right">
										</span>
										<?php echo wp_nonce_field( 'timekit_del_nonce', 'timekit_del_nonce_field' , true, false ); ?>
									</form>	
								</li>
							<?php } ?>						
						</ul>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>