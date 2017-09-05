<?php
/**
 * Template name: Dashboard
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */
 ?>
 <?php
 
	/* by zaheer on 21 march */
	function count_user_posts_by_status($post_type = 'listing',$post_status = 'publish',$user_id = 0, $userListing=false){
		global $wpdb;
		$count = 0;
		if($userListing==false){
		
			$count = $wpdb->get_var(
				$wpdb->prepare( 
				"
				SELECT COUNT(ID) FROM $wpdb->posts 
				WHERE post_status = %s
				AND post_type = %s
				AND post_author = %d",
				$post_status,
				$post_type,
				$user_id
				)
			);
			
		}
		else{
			$pid = $wpdb->get_col(
				$wpdb->prepare( 
				"
				SELECT ID FROM $wpdb->posts 
				WHERE post_status = %s
				AND post_type = %s
				AND post_author = %d",
				$post_status,
				$post_type,
				$user_id
				)
			);
			if(!empty($pid)){
				foreach($pid as $id){
					$listingID = listing_get_metabox_by_ID('ads_listing', $id);
					$uid = get_post_field( 'post_author', $listingID );
					if($uid==$user_id){
						$count++;
					}
				}
			}
		}
		
		return ($count) ? $count : 0;
		
	}
	/* end by zaheer on 21 march */
	
	
	$userID = '';
	if(is_user_logged_in()){
		
		$current_user = wp_get_current_user();
		$userID = $current_user->ID;		
	}else{
		wp_redirect( home_url() ); exit;
	}
	
	/* by zaheer on 21 march */
	$published_listings = ''; 
	$pending_listings=''; 
	$expired_listings = ''; 
	$all_listings='';
	$count_listings = wp_count_posts( 'listing', 'readable' );
	$published_listings = count_user_posts_by_status('listing', 'publish',$userID, false);
	$pending_listings = count_user_posts_by_status('listing', 'pending',$userID, false);
	$expired_listings = count_user_posts_by_status('listing', 'trash',$userID, false);
	$all_listings = $published_listings + $pending_listings + $expired_listings;
	/* end by zaheer on 21 march */
	
	$updateTab = false;
	global $user_id, $listingpro_options;
	
	$current_user = wp_get_current_user();
	$user_id = $current_user->ID; 
	$rmessage = '';
	$rType = '';
	if(isset($_POST['removeid']) && !empty($_POST['removeid'])){
		$rID = $_POST['removeid'];
		$rpost = get_post( $rID ); 
		$rpost_author = $rpost->post_author;
		if($user_id == $rpost_author){
			wp_delete_post($rID);
			$rmessage = esc_html__('Post has deleted succesfully', "listingpro");
			$rType = 'success';
		}else{
			$rmessage = esc_html__('You have no permission to delete this post', "listingpro");
			$rType = 'warning';
		}
		
	}
	
	$current_user = wp_get_current_user();
	$user_id = $current_user->ID; 
	// User Name
	$user_fname = get_the_author_meta('first_name', $user_id);
	$user_lname = get_the_author_meta('last_name', $user_id);
	// User contact meta
	$user_address = get_the_author_meta('address', $user_id);
	$user_phone = get_the_author_meta('phone', $user_id);
	$user_email = get_the_author_meta('user_email', $user_id);
	// User Social links
	$user_facebook = get_the_author_meta('facebook', $user_id);
	$user_google = get_the_author_meta('google', $user_id);
	$user_linkedin = get_the_author_meta('linkedin', $user_id);
	$user_instagram = get_the_author_meta('instagram', $user_id);
	$user_twitter = get_the_author_meta('twitter', $user_id);
	$user_pinterest = get_the_author_meta('pinterest', $user_id);
	// User BIO
	$user_desc = get_the_author_meta('description', $user_id);
	$user_ID = $user_id;
	if ($user_ID) {

		if(isset($_POST['profileupdate'])) {

			$message = esc_html__("Your profile updated successfully.", "listingpro");
			$mType = 'success';

			$first = esc_html($_POST['first_name']);
			$last = esc_html($_POST['last_name']);
			$email = esc_html($_POST['email']);
			$user_phone = esc_html($_POST['phone']);
			$user_address = esc_html($_POST['address']);
			$description = esc_html($_POST['desc']);

			$facebook = esc_html($_POST['facebook']);
			$google = esc_html($_POST['google']);
			$linkedin = esc_html($_POST['linkedin']);
			$instagram = esc_html($_POST['instagram']);
			$twitter = esc_html($_POST['twitter']);
			$pinterest = esc_html($_POST['pinterest']);

			$password = esc_html($_POST['pwd']);
			$confirm_password = esc_html($_POST['confirm']);

			update_user_meta( $user_ID, 'first_name', $first );
			update_user_meta( $user_ID, 'last_name', $last );
			update_user_meta( $user_ID, 'phone', $user_phone );
			update_user_meta( $user_ID, 'address', $user_address );
			update_user_meta( $user_ID, 'description', $description );

			update_user_meta( $user_ID, 'facebook', $facebook );
			update_user_meta( $user_ID, 'google', $google );
			update_user_meta( $user_ID, 'linkedin', $linkedin );
			update_user_meta( $user_ID, 'instagram', $instagram );
			update_user_meta( $user_ID, 'twitter', $twitter );
			update_user_meta( $user_ID, 'pinterest', $pinterest );
			
			$your_image_url = $_POST['your_author_image_url'];
			$author_avatar_url = get_user_meta($user_ID, "listingpro_author_img_url", true); 
			if($your_image_url != ''){
				update_user_meta( $user_ID, 'listingpro_author_img_url', $your_image_url );
			}else{
				update_user_meta( $user_ID, 'listingpro_author_img_url', $author_avatar_url );
			}

			if(isset($email) && is_email($email)) {
				wp_update_user( array ('ID' => $user_ID, 'user_email' => $email) ) ;
			}else { 
				$message = esc_html__("Please enter a valid email id.", "listingpro");
				$mType = 'error';
			}

			if($password) {
				if (strlen($password) < 5 || strlen($password) > 15) {
					$message = esc_html__("Password must be 5 to 15 characters in length", "listingpro");
					$mType = 'error';
				}
				//elseif( $password == $confirm_password ) {
				elseif(isset($password) && $password != $confirm_password) {
					$message = "Password Mismatch";
					$mType = 'error';
				} elseif ( isset($password) && !empty($password) ) {
					$update = wp_set_password( $password, $user_ID );
					$message = esc_html__("Your profile updated successfully.", "listingpro");
					$mType = 'success';
				}
			}
			$updateTab = true;
		}
	}
	
	$contactSupport = $listingpro_options['contact_support'];
	$resurva_bookings_enable = $listingpro_options['resurva_bookings_enable'];
	$timekit_bookings_enable = $listingpro_options['timekit_bookings_enable'];
	$menu_bookings_enable = $listingpro_options['menu_bookings_enable'];
		
		
			/* by zaheer on 28 march */
			$published_campaings = count_user_posts_by_status('lp-ads', 'publish',$userID, true);
			/* end by zaheer on 28 march */
 ?>
<?php get_header();?>

<!--==================================Section Open=================================-->
<?php
	if (class_exists('ListingproPlugin')) {
?>
	<section class="aliceblue">
		<div class="admin-top-section">
			<div class="user-details">
				<div class="row pos-relative">
					<div class="col-md-3">
						<div class="user-portfolio">
							<div class="user-info">
								<div class="user-thumb">
									<img class="avatar-circle" src="<?php echo listingpro_author_image(); ?>" alt="userimg" />
								</div>
								<div class="user-text">
									<h5 class="user-name margin-top-0">
										<span><?php esc_html_e('Howdy!','listingpro'); ?></span>
										<?php echo listingpro_author_name(); ?>
									</h5>
									<!-- <p><?php echo esc_html($user_address); ?></p>
									<p><?php echo esc_html($user_phone); ?></p> -->
								</div>
							</div>
						</div>
					</div>
					<div class="lp-right-panel-upper">
						<div class="user-description-box clearfix">
							<ul>
								<li class="lp-all-listing">
									<span class="count-text all-listing"><?php echo esc_html__('All Listing', 'listingpro'); ?></span>
									<div class="lp-dashboard-circle">
										<div class="lp-circle-content">
											<span class="count"><?php echo $all_listings; ?>
												<p><?php echo esc_html__('Items', 'listingpro'); ?></p>
											</span>
										</div>
									</div>
								</li>
								<li class="lp-pending">
									<span class="count-text pending-listing"><?php echo esc_html__('Pending', 'listingpro'); ?></span>
									<div class="lp-dashboard-circle">
										<div class="lp-circle-content">
											<span class="count"><?php echo $pending_listings; ?>
												<p><?php echo esc_html__('Items', 'listingpro'); ?></p>
											</span>
										</div>	
									</div>	
								</li>
								<li class="lp-publish-listing">
									<span class="count-text published-listing"><?php echo esc_html__('Published', 'listingpro'); ?></span>								
									<div class="lp-dashboard-circle">
										<div class="lp-circle-content">
											<span class="count"><?php echo $published_listings; ?>
												<p><?php echo esc_html__('Items', 'listingpro'); ?></p>
											</span>
										</div>
									</div>
								</li>
								<li class="lp-expired-listing">
									<span class="count-text expired-listing"><?php echo esc_html__('Expired', 'listingpro'); ?></span>
									<div class="lp-dashboard-circle">
										<div class="lp-circle-content">
											<span class="count"><?php echo $expired_listings; ?>
												<p><?php echo esc_html__('Items', 'listingpro'); ?></p>
											</span>
										</div>
									</div>
								</li>
								
								<li class="lp-active-listing">
									<span class="count-text active-campaigns"><?php echo esc_html__('Active Campaigns', 'listingpro'); ?></span>
									<div class="lp-dashboard-circle">
										<div class="lp-circle-content">
											<span class="count"><?php echo $published_campaings; ?>
												<p><?php echo esc_html__('Items', 'listingpro'); ?></p>
											</span>
										</div>
									</div>
								</li>
							</ul>
							
						</div>		
						<?php if(!empty($contactSupport)) { ?>
							<div class="lp-contact-support">
								<a href="<?php echo $contactSupport; ?>" class="secondary-btn">
									<i class="fa fa-support"></i>
									<?php esc_html_e('Contact Support','listingpro'); ?>
								</a>
							</div>
						<?php } ?>			
					</div>					
				</div>
			</div>
		</div>

		<?php
			$dashPage = '';
			$opendClass = '';
			$activeListing = '';
			$activePending = '';
			$activeExpired = '';
			if(isset($_GET['dashboard'])){
				$dashPage = $_GET['dashboard'];
			}
			
			if(!empty($dashPage) && ($dashPage=="listing" || $dashPage=="pending" || $dashPage=="expired")){
				$opendClass = 'opened';

				if($dashPage=="listing"){
					$activeListing = 'class="active"';
				}
				else if($dashPage=="pending"){
					$activePending = 'class="active"';
				}
				else if($dashPage=="expired"){
					$activeExpired = 'class="active"';
				}
			}
			
			$lft_panel = '';
			$openedClass = '';
			$camp_Listing = '';
			$activeCampListing = '';
			$invcListing = '';
			$activeinvoiceListing = '';
			if(isset($_GET['dashboard'])){
				$lft_panel = $_GET['dashboard'];
			}
			if(!empty($lft_panel) && ($lft_panel=="campaigns" || $lft_panel=="active-campaigns")){
				$openedClass = 'opened';
				
				if($lft_panel=="campaigns"){
					$camp_Listing = 'class="active"';
				}
				else if($lft_panel=="active-campaigns"){
					$activeCampListing = 'class="active"';
				}
			}
			
			if(!empty($lft_panel) && ($lft_panel=="list-invoices" || $lft_panel=="ads-invoices")){
				$openedClasss = 'opened';
				
				if($lft_panel=="list-invoices"){
					$activeinvoiceListing = 'class="active"';
				}
				else if($lft_panel=="ads-invoices"){
					$invcListing = 'class="active"';
				}
			}
			
			$review_panel = '';
			$reviewOpenedClass = '';
			$review_Listing = '';
			$activeReviewListing = '';
			if(isset($_GET['dashboard'])){
				$review_panel = $_GET['dashboard'];
			}
			if(!empty($review_panel) && ($review_panel=="reviews" || $review_panel=="reviews-submited")){
				$reviewOpenedClass = 'opened';
				
				if($review_panel=="reviews"){
					$review_Listing = 'class="active"';
				}
				else if($review_panel=="reviews-submited"){
					$activeReviewListing = 'class="active"';
				}
			}
			
			$tymkit_panel = '';
			$tymkitOpenedClass = '';
			$tymkit_Listing = '';
			$activeTymkitListing = '';
			if(isset($_GET['dashboard'])){
				$tymkit_panel = $_GET['dashboard'];
			}
			if(!empty($tymkit_panel) && ($tymkit_panel=="bookings" || $tymkit_panel=="timekit-bookings")){
				$tymkitOpenedClass = 'opened';
				
				if($tymkit_panel=="bookings"){
					$tymkit_Listing = 'class="active"';
				}
				else if($tymkit_panel=="timekit-bookings"){
					$activeTymkitListing = 'class="active"';
				}
			}
			
			
			$activeDashboardMenu = '';
			$activeprofileMenu = '';
			$activesavedMenu = '';
			$activeinvoicesMenu = '';
			$activepackagesMenu = '';
			$activecampaignsMenu = '';
			$activereviewsMenu = '';
			$activeBookingsMenu = '';
			$activeMenuItem = '';
			if(!empty($dashPage)){
				if($dashPage=="main-screen"){
					$activeDashboardMenu = 'class="active-dash-menu"';
				}
				else if($dashPage=="update-profile"){
					$activeprofileMenu = 'class="active-dash-menu"';
				}
				else if($dashPage=="saved"){
					$activesavedMenu = 'class="active-dash-menu"';
				}
				else if($dashPage=="invoices"){
					$activeinvoicesMenu = 'class="active-dash-menu"';
				}
				else if($dashPage=="packages"){
					$activepackagesMenu = 'class="active-dash-menu"';
				}
				else if($dashPage=="campaigns"){
					$activecampaignsMenu = 'class="active-dash-menu"';
				}
				else if($dashPage=="services-screen"){
					$activeMenuItem = 'class="active-dash-menu"';
				}
			}
			
			
			$currentURL = '';
			$perma = '';
			$dashQuery = 'dashboard=';
			$currentURL = get_permalink();
			global $wp_rewrite;
			if ($wp_rewrite->permalink_structure == ''){
				$perma = "&";
			}else{
				$perma = "?";
			}
		?>

		<div class="dashboard-content">
			<div class="row">
				<div class="col-md-12 col-xs-12 tbl-cell">
					<div class="pull-left left-panel tbl-cell">
						<div class="dashboard-tabs lp-main-tabs text-center">
							<!-- Left Panel Navigation Starts -->
							<ul>
								<li>
									<a <?php echo $activeDashboardMenu; ?> href="<?php echo $currentURL.$perma.$dashQuery.'main-screen'; ?>"><i class="fa fa-dashboard"></i><?php esc_html_e(' Dashboard','listingpro'); ?></a>
								</li>
								<li class="dropdown <?php echo $opendClass ?>">
									<a href="#"><i class="fa fa-th-list"></i><?php esc_html_e('My Listing ','listingpro'); ?> <i class="fa fa-angle-down"></i></a>
									<ul class="<?php echo $opendClass ?>">
										<li <?php echo $activeListing; ?> class="lp-publish-lst"><a href="<?php echo $currentURL.$perma.$dashQuery.'listing'; ?>"><i class="fa fa-angle-right"></i><?php esc_html_e(' Published','listingpro'); ?><span><?php echo $published_listings; ?></span></a></li>
										<li <?php echo $activePending; ?> class="lp-pending-lst"><a href="<?php echo $currentURL.$perma.$dashQuery.'pending'; ?>"><i class="fa fa-angle-right"></i><?php esc_html_e('  Pending','listingpro'); ?><span><?php echo $pending_listings; ?></span></a></li>
										<li <?php echo $activeExpired; ?> class="lp-expired-lst"><a href="<?php echo $currentURL.$perma.$dashQuery.'expired'; ?>"><i class="fa fa-angle-right"></i><?php esc_html_e('   Expired','listingpro'); ?><span><?php echo $expired_listings; ?></span></a></li>
									</ul>
								</li>
								<li><a <?php echo $activesavedMenu; ?> href="<?php echo $currentURL.$perma.$dashQuery.'saved'; ?>"><i class="fa fa-heart" aria-hidden="true"></i><?php esc_html_e('Saved','listingpro'); ?> </a></li>
								<li class="dropdown <?php echo $openedClass ?>">
									<a href="#"><i class="fa fa-file-text-o"></i><?php esc_html_e(' Invoices ','listingpro'); ?><i class="fa fa-angle-down"></i></a>
									<ul class="<?php echo $opendClass ?>">
										<li <?php echo $activeinvoiceListing; ?> class="lp-publish-lst"><a href="<?php echo $currentURL.$perma.$dashQuery.'list-invoices'; ?>"><i class="fa fa-angle-right"></i><?php esc_html_e(' For Listings','listingpro'); ?> </a></li>
										<li <?php echo $invcListing; ?> class="lp-publish-lst"><a href="<?php echo $currentURL.$perma.$dashQuery.'ads-invoices'; ?>"><i class="fa fa-angle-right"></i><?php esc_html_e(' For Ads','listingpro'); ?></a></li>
									</ul>
								</li>
								<li><a <?php echo $activepackagesMenu; ?> href="<?php echo $currentURL.$perma.$dashQuery.'packages'; ?>"><i class="fa fa-briefcase" aria-hidden="true"></i><?php esc_html_e('Packages','listingpro'); ?> </a></li>
								
								<?php
									if (class_exists('ListingAds')) {
								?>
										<li class="dropdown <?php echo $openedClass ?>">
											<a href="#"><i class="fa fa-bullhorn"></i><?php esc_html_e('Ad Campaigns ','listingpro'); ?> <i class="fa fa-angle-down"></i></a>
											<ul class="<?php echo $openedClass ?>">
												<li <?php echo $activeCampListing; ?> class="lp-publish-lst"><a href="<?php echo $currentURL.$perma.$dashQuery.'active-campaigns'; ?>"><i class="fa fa-angle-right"></i><?php esc_html_e(' Active Campaigns ','listingpro'); ?><span><?php echo $published_campaings; ?></span></a></li>
												<li <?php echo $camp_Listing; ?> class="lp-publish-lst"><a href="<?php echo $currentURL.$perma.$dashQuery.'campaigns'; ?>"><i class="fa fa-angle-right"></i> <?php esc_html_e('Start New Campaign','listingpro'); ?></a></li>
											</ul>
										</li>
								<?php
									}
								?>
								
								<?php
									if (class_exists('ListingReviews')) {
								?>
										<li class="dropdown <?php echo $reviewOpenedClass ?>">
											<a href="#"><i class="fa fa-star"></i><?php esc_html_e(' Reviews ','listingpro'); ?><i class="fa fa-angle-down"></i></a>
											<ul class="<?php echo $reviewOpenedClass ?>">
												<li <?php echo $review_Listing; ?>><a href="<?php echo $currentURL.$perma.$dashQuery.'reviews'; ?>"><i class="fa fa-angle-right"></i><?php esc_html_e(' Reviews Received','listingpro'); ?></a></li>
												<li <?php echo $activeReviewListing; ?>><a href="<?php echo $currentURL.$perma.$dashQuery.'reviews-submited'; ?>"><i class="fa fa-angle-right"></i><?php esc_html_e('Reviews Submited ','listingpro'); ?> </a></li>
											</ul>
										</li>
								<?php
									}
								?>
								
								<?php if( $timekit_bookings_enable == 1 || $resurva_bookings_enable == 1 ) { ?>
									<li class="dropdown <?php echo $tymkitOpenedClass ?>">
										<a href="#"><i class="fa fa-calendar"></i><?php esc_html_e('Bookings ','listingpro'); ?> <i class="fa fa-angle-down"></i></a>
										<ul class="<?php echo $tymkitOpenedClass ?>">
											<?php if( $resurva_bookings_enable == 1 ) { ?>
												<li <?php echo $tymkit_Listing; ?>><a href="<?php echo $currentURL.$perma.$dashQuery.'bookings'; ?>"><i class="fa fa-angle-right"></i><?php esc_html_e(' Resurva','listingpro'); ?></a></li>
											<?php } ?>
											<?php if( $timekit_bookings_enable == 1 ) { ?>
												<li <?php echo $activeTymkitListing; ?>><a href="<?php echo $currentURL.$perma.$dashQuery.'timekit-bookings'; ?>"><i class="fa fa-angle-right"></i><?php esc_html_e(' Timekit','listingpro'); ?></a></li>
											<?php } ?>
										</ul>
									</li>
								<?php }
								if( $menu_bookings_enable == 1 ) { ?>
									<li><a <?php echo $activeMenuItem; ?> href="<?php echo $currentURL.$perma.$dashQuery.'services-screen'; ?>"><i class="fa fa-cutlery"></i><?php esc_html_e('Food / Service Menu','listingpro'); ?> </a></li>
								<?php } ?>
								<li>
									<a <?php echo $activeprofileMenu; ?> href="<?php echo $currentURL.$perma.$dashQuery.'update-profile'; ?>"><i class="fa fa-user-circle"></i><?php esc_html_e(' My Profile','listingpro'); ?></a>
								</li>
								<li><a href="<?php echo wp_logout_url(); ?>"><i class="fa fa-unlock-alt"></i><?php esc_html_e(' Logout','listingpro'); ?></a></li>
							</ul>
						</div>
					</div>
					<div class="right-panel">
						
						<?php
							if(isset($_GET['dashboard']) && !empty($_GET['dashboard'])){
								get_template_part('templates/dashboard/'.$_GET['dashboard'].'');
							}else {
								get_template_part('templates/dashboard/main-screen');
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php } else{ ?>
	<div class="col-md-12">
		<p><?php esc_html_e('Sorry! You have no permisssion to access this page. Please contact web admin.','listingpro'); ?></p>
	</div>
	<?php } ?>
	<!--==================================Section Close=================================-->
	<div class="md-overlay"></div>
<?php get_footer();?>