<?php 

require_once(ABSPATH . 'wp-admin/includes/screen.php');
/* =========================form action for wire process============================= */

if( !empty($_POST['payment_submit']) && isset($_POST['payment_submit']) ){
	if (!isset($_SESSION)) { session_start(); }
	global $wpdb,$listingpro_options;
	$ads_durations = $listingpro_options['listings_ads_durations'];
	
	$currentdate = date("d-m-Y");
	$exprityDate = date('Y-m-d', strtotime($currentdate. ' + '.$ads_durations.' days'));
	$exprityDate = date('d-m-Y', strtotime( $exprityDate ));
	
	$table = 'listing_campaigns';
	$order_id = '';
	$order_id = $_POST['order_id'];
	
	$data = array('status' => 'success');
	$where = array('transaction_id' => $order_id);
	lp_update_data_in_db($table, $data, $where);
	$postid= $_POST['post_id'];
	
	$my_post = array( 'post_title'    => $postid, 'post_status'   => 'publish', 'post_type' => 'lp-ads' );
	$adID = wp_insert_post( $my_post );
	
	listing_set_metabox('ads_listing', $postid, $adID);
				
	listing_set_metabox('ad_status', 'Active', $adID);
	listing_set_metabox('ad_date', $currentdate, $adID);
	listing_set_metabox('ad_expiryDate', $exprityDate, $adID);
	
	listing_set_metabox('campaign_id', $adID, $postid);
	
	$price_packages = $_SESSION['price_package'];
	
	$priceKeyArray;
	if( !empty($price_packages) ){
		foreach( $price_packages as $type=>$val ){
			
			$priceKeyArray[] = $type;
			update_post_meta( $postid, $type, 'active' );
		}
	}
	update_post_meta( $postid, 'campaign_status', 'active' );
	
	if( !empty($priceKeyArray) ){
		listing_set_metabox('ad_type', $priceKeyArray, $adID);
	}
	unset($_SESSION['price_package']);
}

/* =========================inovices for ads========================================= */
add_action('admin_menu', 'lp_register_ads_invoice_page');
 
function lp_register_ads_invoice_page() {
    add_submenu_page(
        'lp-listings-invoices',
        'Ads Invoices',
        'Ads Invoices',
        'manage_options',
        'ads-invoices-page',
        'ads_invoices_submenu_page_callback' );
}
 
function ads_invoices_submenu_page_callback() {
	wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/assets/lib/bootstrap/css/bootstrap.css');
	wp_enqueue_script('bootstrapadmin', get_template_directory_uri() . '/assets/lib/bootstrap/js/bootstrap.min.js', 'jquery', '', true);
?>

<?php
	global $wpdb;
	$dbprefix = $wpdb->prefix;
	$table = 'listing_campaigns';
	$table_name =$dbprefix.$table;
?>
	<div class="wrap">
		<h2><?php esc_html_e('Ads Invoices', 'listingpro');  ?></h2>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#paypal">Paypal</a></li>
			<li><a data-toggle="tab" href="#stripe">Stripe</a></li>
			<li><a data-toggle="tab" href="#wire">Wire</a></li>
		</ul>
		<div class="tab-content">
			<!--paypal-->
			<div id="paypal" class="tab-pane fade in active">
			
				<ul class="nav nav-tabs">
				
					<li class="active">
						<a data-toggle="tab" href="#p-success">Success</a>
					</li>
					
					<li>
						<a data-toggle="tab" href="#p-pending">Pending</a>
					</li>
					
					<li>
						<a data-toggle="tab" href="#p-failed">Failed</a>
					</li>
					
				</ul>
				
				<div class="tab-content">
					
					<div id="p-success" class="tab-pane fade in active">
						
						<?php
							
							$table = 'listing_campaigns';
							$data = '*';
							$condition = 'payment_method="paypal" AND status="success"';
							if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
								$paypal_success = lp_get_data_from_db($table, $data, $condition);
							}
							
							if(!empty($paypal_success) && count($paypal_success)>0){ ?>
							
								<?php $n=1; ?>
								<table class="wp-list-table widefat fixed striped posts">
									<thead>
										<tr>
											<th>No.</th>
											<th>User</th>
											<th>Post</th>
											<th>Price</th>
											<th>Transaction ID</th>
										</tr>
									</thead>
									
									<tbody>
										<?php foreach( $paypal_success as $data ){ ?>
											<tr>
												<td><?php echo $n; ?></td>
												<td><?php echo $data->user_id; ?></td>
												<td><?php echo $data->post_id; ?></td>
												<td><?php echo $data->price.$data->currency; ?></td>
												<td><?php echo $data->transaction_id; ?></td>
											</tr>
										<?php $n++; ?>
										<?php } ?>
										
									</tbody>
								</table>	
							
							<?php
							}
							else{
								echo esc_html__('Sorry! You have no successful invoice', 'listingpro');
							}
						?>
					
					</div>
					
					<div id="p-pending" class="tab-pane fade in">
						
						<?php 
							$table = 'listing_campaigns';
							$data = '*';
							$condition = 'payment_method="paypal" AND status="pending"';
							if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
								$paypal_pending = lp_get_data_from_db($table, $data, $condition);
							}
							
							
							if(!empty($paypal_pending) && count($paypal_pending)>0){?>
							
								<?php $n=1; ?>
								<table class="wp-list-table widefat fixed striped posts">
									<thead>
										<tr>
											<th>No.</th>
											<th>User</th>
											<th>Post</th>
											<th>Price</th>
											<th>Transaction ID</th>
										</tr>
									</thead>
									
									<tbody>
										<?php foreach( $paypal_pending as $data ){ ?>
											<tr>
												<td><?php echo $n; ?></td>
												<td><?php echo $data->user_id; ?></td>
												<td><?php echo $data->post_id; ?></td>
												<td><?php echo $data->price.$data->currency; ?></td>
												<td><?php echo $data->transaction_id; ?></td>
											</tr>
										<?php $n++; ?>
										<?php } ?>
										
									</tbody>
								</table>	
							
							<?php
								
							}
							else{
								echo esc_html__('Sorry! You have no pending invoice', 'listingpro');
							}
						?>
						
					</div>
					
					<div id="p-failed" class="tab-pane fade in">
						
						<?php 
							$table = 'listing_campaigns';
							$data = '*';
							$condition = 'payment_method="paypal" AND status="failed"';
							if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
								$paypal_failed = lp_get_data_from_db($table, $data, $condition);
							}
							
							if(!empty($paypal_failed) && count($paypal_failed)>0){?>
							
								<?php $n=1; ?>
								<table class="wp-list-table widefat fixed striped posts">
									<thead>
										<tr>
											<th>No.</th>
											<th>User</th>
											<th>Post</th>
											<th>Price</th>
											<th>Transaction ID</th>
										</tr>
									</thead>
									
									<tbody>
										<?php foreach( $paypal_failed as $data ){ ?>
											<tr>
												<td><?php echo $n; ?></td>
												<td><?php echo $data->user_id; ?></td>
												<td><?php echo $data->post_id; ?></td>
												<td><?php echo $data->price.$data->currency; ?></td>
												<td><?php echo $data->transaction_id; ?></td>
											</tr>
										<?php $n++; ?>
										<?php } ?>
										
									</tbody>
								</table>	
							
							<?php
								
							}
							else{
								echo esc_html__('Sorry! You have no failed invoice', 'listingpro');
							}
						?>
						
					</div>
					
				</div>
			
			</div>
			
			<!--stripe-->
			<div id="stripe" class="tab-pane fade in">
			
				<ul class="nav nav-tabs">
				
					<li class="active">
						<a data-toggle="tab" href="#s-success">Success</a>
					</li>
					
					<li>
						<a data-toggle="tab" href="#s-pending">Pending</a>
					</li>
					
					<li>
						<a data-toggle="tab" href="#s-failed">Failed</a>
					</li>
					
				</ul>
				
				<div class="tab-content">
				
					<div id="s-success" class="tab-pane fade in active">
					
						<?php 
							$table = 'listing_campaigns';
							$data = '*';
							$condition = 'payment_method="stripe" AND status="success"';
							if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
								$stripe_success = lp_get_data_from_db($table, $data, $condition);
							}
							
							
							if(!empty($stripe_success) && count($stripe_success)>0){?>
							
								<?php $n=1; ?>
								<table class="wp-list-table widefat fixed striped posts">
									<thead>
										<tr>
											<th>No.</th>
											<th>User</th>
											<th>Post</th>
											<th>Price</th>
											<th>Transaction ID</th>
										</tr>
									</thead>
									
									<tbody>
										<?php foreach( $stripe_success as $data ){ ?>
											<tr>
												<td><?php echo $n; ?></td>
												<td><?php echo $data->user_id; ?></td>
												<td><?php echo $data->post_id; ?></td>
												<td><?php echo $data->price.$data->currency; ?></td>
												<td><?php echo $data->transaction_id; ?></td>
											</tr>
										<?php $n++; ?>
										<?php } ?>
										
									</tbody>
								</table>	
							
							<?php
								
							}
							else{
								echo esc_html__('Sorry! You have no successful invoice', 'listingpro');
							}
						?>
					
					</div>
					
					<div id="s-pending" class="tab-pane fade in">
					
						<?php 
							$table = 'listing_campaigns';
							$data = '*';
							$condition = 'payment_method="stripe" AND status="pending"';
							if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
								$stripe_pending = lp_get_data_from_db($table, $data, $condition);
							}
							
							
							if(!empty($stripe_pending) && count($stripe_pending)>0){?>
							
								<?php $n=1; ?>
								<table class="wp-list-table widefat fixed striped posts">
									<thead>
										<tr>
											<th>No.</th>
											<th>User</th>
											<th>Post</th>
											<th>Price</th>
											<th>Transaction ID</th>
										</tr>
									</thead>
									
									<tbody>
										<?php foreach( $stripe_pending as $data ){ ?>
											<tr>
												<td><?php echo $n; ?></td>
												<td><?php echo $data->user_id; ?></td>
												<td><?php echo $data->post_id; ?></td>
												<td><?php echo $data->price.$data->currency; ?></td>
												<td><?php echo $data->transaction_id; ?></td>
											</tr>
										<?php $n++; ?>
										<?php } ?>
										
									</tbody>
								</table>	
							
							<?php
								
							}
							else{
								echo esc_html__('Sorry! You have no pending invoice', 'listingpro');
							}
						?>
						
					</div>
					
					<div id="s-failed" class="tab-pane fade in">
						
						<?php 
							$table = 'listing_campaigns';
							$data = '*';
							$condition = 'payment_method="stripe" AND status="failed"';
							if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
								$stripe_failed = lp_get_data_from_db($table, $data, $condition);
							}
							
							
							if(!empty($stripe_failed) && count($stripe_failed)>0){?>
							
								<?php $n=1; ?>
								<table class="wp-list-table widefat fixed striped posts">
									<thead>
										<tr>
											<th>No.</th>
											<th>User</th>
											<th>Post</th>
											<th>Price</th>
											<th>Transaction ID</th>
										</tr>
									</thead>
									
									<tbody>
										<?php foreach( $stripe_failed as $data ){ ?>
											<tr>
												<td><?php echo $n; ?></td>
												<td><?php echo $data->user_id; ?></td>
												<td><?php echo $data->post_id; ?></td>
												<td><?php echo $data->price.$data->currency; ?></td>
												<td><?php echo $data->transaction_id; ?></td>
											</tr>
										<?php $n++; ?>
										<?php } ?>
										
									</tbody>
								</table>	
							
							<?php
								
							}
							else{
								echo esc_html__('Sorry! You have no failed invoice', 'listingpro');
							}
						?>
						
					</div>
					
				</div>
			
			</div>
			
			<!--wire-->
			<div id="wire" class="tab-pane fade in">
			
				<ul class="nav nav-tabs">
				
					<li class="active">
						<a data-toggle="tab" href="#w-success">Success</a>
					</li>
					
					<li>
						<a data-toggle="tab" href="#w-pending">Pending</a>
					</li>
					
					<li>
						<a data-toggle="tab" href="#w-failed">Failed</a>
					</li>
					
				</ul>
				
				<div class="tab-content">
				
					<div id="w-success" class="tab-pane fade in active">
						
						<?php 
							$table = 'listing_campaigns';
							$data = '*';
							$condition = 'payment_method="wire" AND status="success"';
							if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
								$wire_success = lp_get_data_from_db($table, $data, $condition);
							}
							
							
							if(!empty($wire_success) && count($wire_success)>0){?>
							
								<?php $n=1; ?>
								<table class="wp-list-table widefat fixed striped posts">
									<thead>
										<tr>
											<th>No.</th>
											<th>User</th>
											<th>Post</th>
											<th>Price</th>
											<th>Transaction ID</th>
										</tr>
									</thead>
									
									<tbody>
										<?php foreach( $wire_success as $data ){ ?>
											<tr>
												<td><?php echo $n; ?></td>
												<td><?php echo $data->user_id; ?></td>
												<td><?php echo $data->post_id; ?></td>
												<td><?php echo $data->price.$data->currency; ?></td>
												<td><?php echo $data->transaction_id; ?></td>
											</tr>
										<?php $n++; ?>
										<?php } ?>
										
									</tbody>
								</table>	
							
							<?php
								
							}
							else{
								echo esc_html__('Sorry! You have no successful invoice', 'listingpro');
							}
						?>
						
					</div>
					
					<div id="w-pending" class="tab-pane fade in">
						
						<?php 
							$table = 'listing_campaigns';
							$data = '*';
							$condition = 'payment_method="wire" AND status="pending"';
							if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
								$wire_pending = lp_get_data_from_db($table, $data, $condition);
							}
							
							
							if(!empty($wire_pending) && count($wire_pending)>0){?>
							
								<?php $n=1; ?>
								<table class="wp-list-table widefat fixed striped posts">
									<thead>
										<tr>
											<th>No.</th>
											<th>User</th>
											<th>Post</th>
											<th>Price</th>
											<th>status</th>
											<th>Action</th>
										</tr>
									</thead>
									
									<tbody>
										<?php foreach( $wire_pending as $data ){ ?>
											<tr>
												<td><?php echo $n; ?></td>
												<td><?php echo $data->user_id; ?></td>
												<td><?php echo $data->post_id; ?></td>
												<td><?php echo $data->price.$data->currency; ?></td>
												<td><?php echo $data->status; ?></td>
												<td>
													<form class="wp-core-ui" id="confirm_payment" name="confirm_payment" method="post">
													
														<input type="submit" name="payment_submit" class="button action" value="Confirm" onclick="return window.confirm('Are you sure you want to proceed action?');" />
														<input type="hidden" name="order_id" value="<?php echo $data->	transaction_id ?>" />
														<input type="hidden" name="post_id" value="<?php echo $data->post_id ?>" />
													
													</form>
												</td>
											</tr>
										<?php $n++; ?>
										<?php } ?>
										
									</tbody>
								</table>	
							
							<?php
								
							}
							else{
								echo esc_html__('Sorry! You have no pending invoice', 'listingpro');
							}
						?>
						
					</div>
					
					<div id="w-failed" class="tab-pane fade in">
					
						<?php 
							$table = 'listing_campaigns';
							$data = '*';
							$condition = 'payment_method="wire" AND status="failed"';
							if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
								$wire_failed = lp_get_data_from_db($table, $data, $condition);
							}
							
							
							if(!empty($wire_failed) && count($wire_failed)>0){?>
							
								<?php $n=1; ?>
								<table class="wp-list-table widefat fixed striped posts">
									<thead>
										<tr>
											<th>No.</th>
											<th>User</th>
											<th>Post</th>
											<th>Price</th>
											<th>Transaction ID</th>
										</tr>
									</thead>
									
									<tbody>
										<?php foreach( $wire_failed as $data ){ ?>
											<tr>
												<td><?php echo $n; ?></td>
												<td><?php echo $data->user_id; ?></td>
												<td><?php echo $data->post_id; ?></td>
												<td><?php echo $data->price.$data->currency; ?></td>
												<td><?php echo $data->transaction_id; ?></td>
											</tr>
										<?php $n++; ?>
										<?php } ?>
										
									</tbody>
								</table>	
							
							<?php
								
							}
							else{
								echo esc_html__('Sorry! You have no failed invoice', 'listingpro');
							}
						?>
					
					</div>
					
				</div>
			
			</div>
			
		</div>
	</div>
			
			
<?php
}
?>