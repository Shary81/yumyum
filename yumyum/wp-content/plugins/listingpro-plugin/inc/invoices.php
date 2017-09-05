<?php 
require_once(ABSPATH . 'wp-admin/includes/screen.php');
//form submit
if( !empty($_POST['payment_submitt']) && isset($_POST['payment_submitt']) ){
	
	global $wpdb;
	$dbprefix = '';
	$dbprefix = $wpdb->prefix;
	$table_name = $dbprefix.'listing_orders';
	$order_id = '';
	$results = '';
	$order_id = $_POST['order_id'];
	$date = date('d-m-Y');
	$update_data = array('date' => $date, 'status' => 'success', 'used' => '1');
	$where = array('order_id' => $order_id);
	$update_format = array('%s', '%s');
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
		$wpdb->update($dbprefix.'listing_orders', $update_data, $where, $update_format);
	}
	
	$postid= $_POST['post_id'];
	  $my_post = array(
		  'ID'           => $postid,
		  'post_status'   => 'publish',
	  );

	  wp_update_post( $my_post );
	  
	  if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
		$thepost = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM ".$dbprefix."listing_orders WHERE post_id = %d", $postid ) );
	  }
	  
	  $post_author_id = get_post_field( 'post_author', $postid );
	  $user = get_user_by( 'id', $post_author_id );
	  $useremail = $user->user_email;
	  
			$admin_email = '';
			$admin_email = get_option( 'admin_email' );
			
			$listing_id = $postid;
			$listing_title = get_the_title($postid);
			$invoice_no = $thepost->order_id;
			$payment_method = $thepost->payment_method;
			
			$plan_title = $thepost->plan_name;
			$plan_price = $thepost->price.$thepost->currency;
			$listing_url = get_the_permalink($listing_id);
			
			
			//to admin
			$mail_subject = $listingpro_options['listingpro_subject_purchase_activated_admin'];
			$website_url = site_url();
			$website_name = get_option('blogname');
			$mail_subject = str_replace('%website_url','%1$s', $mail_subject);
			$mail_subject = str_replace('%website_name','%2$s', $mail_subject);
			$formated_mail_subject = sprintf( $mail_subject,$website_url, $website_name );


			$mail_content = $listingpro_options['listingpro_content_purchase_activated_admin'];
			$mail_content = str_replace('%website_url','%1$s', $mail_content);
			$mail_content = str_replace('%listing_title','%2$s', $mail_content);
			$mail_content = str_replace('%plan_title','%3$s', $mail_content);
			$mail_content = str_replace('%plan_price','%4$s', $mail_content);
			$mail_content = str_replace('%listing_url','%5$s', $mail_content);
			$mail_content = str_replace('%invoice_no','%6$s', $mail_content);
			$mail_content = str_replace('%website_name','%7$s', $mail_content);
			$mail_content = str_replace('%payment_method','%8$s', $mail_content);

			$formated_mail_content = sprintf( $mail_content,$website_url,$listing_title,$plan_title,$plan_price,$listing_url,$invoice_no, $website_name, $payment_method  );
			
			$headers1[] = 'Content-Type: text/html; charset=UTF-8';
			wp_mail( $admin_email, $formated_mail_subject, $formated_mail_content, $headers1);
			// to user
			
			$mail_subject2 = $listingpro_options['listingpro_subject_purchase_activated'];
			$website_url = site_url();
			$mail_subject2 = str_replace('%website_url','%1$s', $mail_subject2);
			$mail_subject2 = str_replace('%website_name','%2$s', $mail_subject2);
			$formated_mail_subject2 = sprintf( $mail_subject2,$website_url,$website_name );

			$mail_content2 = $listingpro_options['listingpro_content_purchase_activated'];
			$mail_content2 = str_replace('%website_url','%1$s', $mail_content2);
			$mail_content2 = str_replace('%listing_title','%2$s', $mail_content2);
			$mail_content2 = str_replace('%plan_title','%3$s', $mail_content2);
			$mail_content2 = str_replace('%plan_price','%4$s', $mail_content2);
			$mail_content2 = str_replace('%listing_url','%5$s', $mail_content2);
			$mail_content2 = str_replace('%invoice_no','%6$s', $mail_content2);
			$mail_content2 = str_replace('%website_name','%7$s', $mail_content2);
			$mail_content2 = str_replace('%payment_method','%8$s', $mail_content2);

			$formated_mail_content2 = sprintf( $mail_content2,$website_url,$listing_title,$plan_title,$plan_price, $listing_url, $invoice_no, $website_name, $payment_method  );

			$headers[] = 'Content-Type: text/html; charset=UTF-8';
			wp_mail( $useremail, $formated_mail_subject2, $formated_mail_content2, $headers);
	
	
}

			 
/*---------------------------------------------------
				adding invoice page
----------------------------------------------------*/

function listingpro_register_invocies_page() {
    add_menu_page(
        __( 'Listings Invoices', 'listingpro' ),
        'Invoices',
        'manage_options',
        'lp-listings-invoices',
        'listingpro_invoices_page',
        plugins_url( 'listingpro-plugin/images/invoices.png' ),
        30
    );
	wp_enqueue_style("panel_style", WP_PLUGIN_URL."/listingpro-plugin/assets/css/custom-admin-pages.css", false, "1.0", "all");
	
}
add_action( 'admin_menu', 'listingpro_register_invocies_page' );

if(!function_exists('listingpro_invoices_page')){
	function listingpro_invoices_page(){
										//adding css
									
									wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/assets/lib/bootstrap/css/bootstrap.css');
									wp_enqueue_script('bootstrapadmin', get_template_directory_uri() . '/assets/lib/bootstrap/js/bootstrap.min.js', 'jquery', '', true);
									global $wpdb;
									$dbprefix = '';
									$dbprefix = $wpdb->prefix;
									$table_name = $dbprefix.'listing_orders';
		?>
			<div class="wrap">
				<h2><?php esc_html_e('Listings Invoices', 'listingpro');  ?></h2>
						
						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#paypal">Paypal</a></li>
						  <li><a data-toggle="tab" href="#stripe">Stripe</a></li>
						  <li><a data-toggle="tab" href="#wire">Wire</a></li>
						</ul>
						

						<div class="tab-content">
							
						<!--paypal-->	
						<div id="paypal" class="tab-pane fade in active">
						  
								<!-- inner tabs start -->
								<ul class="nav nav-tabs">
								  <li class="active">
										<a data-toggle="tab" href="#success">Success</a>
								 </li>
								  <li>
										<a data-toggle="tab" href="#pending">Pending</a>
								 </li>
								  <li>
										<a data-toggle="tab" href="#failed">Failed</a>
								 </li>
								</ul>
								
								<div class="tab-content">
									
									<div id="success" class="tab-pane fade in active">
										
										<?php 
											if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
												$results = get_invoices_list('', 'paypal', 'success') ; 
											}
										?>
											<?php if( !empty($results) && count($results) > 0 ){  ?>
												<?php $n=1; ?>
													<table class="wp-list-table widefat fixed striped posts">
														<thead>
															<tr>
																<th>No.</th>
																<th>User</th>
																<th>Order#</th>
																<th>Plan</th>
																<th>Price</th>
																<th>Date</th>
																<th>Days</th>
															</tr>
														</thead>
														
														<tbody>
															<?php foreach( $results as $data ){ ?>
																<tr>
																	<td><?php echo $n; ?></td>
																	<td><?php echo $data->user_id; ?></td>
																	<td><?php echo $data->order_id; ?></td>
																	<td><?php echo $data->plan_name; ?></td>
																	<td><?php echo $data->price.$data->currency; ?></td>
																	<td><?php echo $data->date; ?></td>
																	<td><?php echo $data->days; ?></td>
																</tr>
															<?php $n++; ?>
															<?php } ?>
															
														</tbody>
													</table>	
											
											<?php  } else{ ?>
													<p>Nothing in the list</p>
											<?php } ?>
										
									</div>
									<!--success -->
									

									<div id="pending" class="tab-pane fade in">
										
										<?php 
											if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
												$results = get_invoices_list('', 'paypal', 'pending') ; 
											}
										 ?>
											<?php if( !empty($results) && count($results) > 0 ){  ?>
												<?php $n=1; ?>
													<table class="wp-list-table widefat fixed striped posts">
														<thead>
															<tr>
																<th>No.</th>
																<th>User</th>
																<th>Order#</th>
																<th>Plan</th>
																<th>Price</th>
																<th>Date</th>
																<th>Days</th>
															</tr>
														</thead>
														
														<tbody>
															<?php foreach( $results as $data ){ ?>
																<tr>
																	<td><?php echo $n; ?></td>
																	<td><?php echo $data->user_id; ?></td>
																	<td><?php echo $data->order_id; ?></td>
																	<td><?php echo $data->plan_name; ?></td>
																	<td><?php echo $data->price.$data->currency; ?></td>
																	<td><?php echo $data->date; ?></td>
																	<td><?php echo $data->days; ?></td>
																</tr>
															<?php $n++; ?>
															<?php } ?>
															
														</tbody>
													</table>	
											
											<?php  } else{ ?>
													<p>Nothing in the list</p>
											<?php } ?>
										
									</div>
									<!--pending -->
									

									<div id="failed" class="tab-pane fade in">
										
										<?php 
											if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
												$results = get_invoices_list('', 'paypal', 'failed') ;  
											}
										?>
											<?php if( !empty($results) && count($results) > 0 ){  ?>
												<?php $n=1; ?>
													<table class="wp-list-table widefat fixed striped posts">
														<thead>
															<tr>
																<th>No.</th>
																<th>User</th>
																<th>Order#</th>
																<th>Plan</th>
																<th>Price</th>
																<th>Date</th>
																<th>Days</th>
															</tr>
														</thead>
														
														<tbody>
															<?php foreach( $results as $data ){ ?>
																<tr>
																	<td><?php echo $n; ?></td>
																	<td><?php echo $data->user_id; ?></td>
																	<td><?php echo $data->order_id; ?></td>
																	<td><?php echo $data->plan_name; ?></td>
																	<td><?php echo $data->price.$data->currency; ?></td>
																	<td><?php echo $data->date; ?></td>
																	<td><?php echo $data->days; ?></td>
																</tr>
															<?php $n++; ?>
															<?php } ?>
															
														</tbody>
													</table>	
											
											<?php  } else{ ?>
													<p>Nothing in the list</p>
											<?php } ?>
										
									</div>
									<!--failed -->
									
								</div>
								<!-- inner tabs ends -->
						  
							</div>
						  <!--/paypal-->
						  	
						<!--stripe-->	
						<div id="stripe" class="tab-pane fade in">
						  
								<!-- inner tabs start -->
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
											if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
												$results = get_invoices_list('', 'stripe', 'success') ;  
											}
										?>
											<?php if( !empty($results) && count($results) > 0 ){  ?>
												<?php $n=1; ?>
													<table class="wp-list-table widefat fixed striped posts">
														<thead>
															<tr>
																<th>No.</th>
																<th>User</th>
																<th>Order#</th>
																<th>Plan</th>
																<th>Price</th>
																<th>Date</th>
																<th>Days</th>
															</tr>
														</thead>
														
														<tbody>
															<?php foreach( $results as $data ){ ?>
																<tr>
																	<td><?php echo $n; ?></td>
																	<td><?php echo $data->user_id; ?></td>
																	<td><?php echo $data->order_id; ?></td>
																	<td><?php echo $data->plan_name; ?></td>
																	<td><?php echo $data->price.$data->currency; ?></td>
																	<td><?php echo $data->date; ?></td>
																	<td><?php echo $data->days; ?></td>
																</tr>
															<?php $n++; ?>
															<?php } ?>
															
														</tbody>
													</table>	
											
											<?php  } else{ ?>
													<p>Nothing in the list</p>
											<?php } ?>
										
									</div>
									<!--success -->
									

									<div id="s-pending" class="tab-pane fade in">
										<?php 
											if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
												$results = get_invoices_list('', 'stripe', 'pending') ;  
											}
										?>
										<?php  ?>
											<?php if( !empty($results) && count($results) > 0 ){  ?>
												<?php $n=1; ?>
													<table class="wp-list-table widefat fixed striped posts">
														<thead>
															<tr>
																<th>No.</th>
																<th>User</th>
																<th>Order#</th>
																<th>Plan</th>
																<th>Price</th>
																<th>Date</th>
																<th>Days</th>
															</tr>
														</thead>
														
														<tbody>
															<?php foreach( $results as $data ){ ?>
																<tr>
																	<td><?php echo $n; ?></td>
																	<td><?php echo $data->user_id; ?></td>
																	<td><?php echo $data->order_id; ?></td>
																	<td><?php echo $data->plan_name; ?></td>
																	<td><?php echo $data->price.$data->currency; ?></td>
																	<td><?php echo $data->date; ?></td>
																	<td><?php echo $data->days; ?></td>
																</tr>
															<?php $n++; ?>
															<?php } ?>
															
														</tbody>
													</table>	
											
											<?php  } else{ ?>
													<p>Nothing in the list</p>
											<?php } ?>
										
									</div>
									<!--pending -->
									

									<div id="s-failed" class="tab-pane fade in">
										<?php 
											if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
												$results = get_invoices_list('', 'stripe', 'failed') ;  
											}
										?>
										<?php  ?>
											<?php if( !empty($results) && count($results) > 0 ){  ?>
												<?php $n=1; ?>
													<table class="wp-list-table widefat fixed striped posts">
														<thead>
															<tr>
																<th>No.</th>
																<th>User</th>
																<th>Order#</th>
																<th>Plan</th>
																<th>Price</th>
																<th>Date</th>
																<th>Days</th>
															</tr>
														</thead>
														
														<tbody>
															<?php foreach( $results as $data ){ ?>
																<tr>
																	<td><?php echo $n; ?></td>
																	<td><?php echo $data->user_id; ?></td>
																	<td><?php echo $data->order_id; ?></td>
																	<td><?php echo $data->plan_name; ?></td>
																	<td><?php echo $data->price.$data->currency; ?></td>
																	<td><?php echo $data->date; ?></td>
																	<td><?php echo $data->days; ?></td>
																</tr>
															<?php $n++; ?>
															<?php } ?>
															
														</tbody>
													</table>	
											
											<?php  } else{ ?>
													<p>Nothing in the list</p>
											<?php } ?>
										
									</div>
									<!--failed -->
									
								</div>
								<!-- inner tabs ends -->
						  
							</div>
						  <!--/stripe-->
						  
						  
						
							
						
						<div id="wire" class="tab-pane fade">
						  
							<!-- inner tabs start -->
							<ul class="nav nav-tabs">
							  <li class="active">
									<a data-toggle="tab" href="#wsuccess">Success</a>
							 </li>
							  <li>
									<a data-toggle="tab" href="#wpending">Pending</a>
							 </li>
							  <li>
									<a data-toggle="tab" href="#wfailed">Failed</a>
							 </li>
							</ul>
							
							<div class="tab-content">
								
								<div id="wsuccess" class="tab-pane fade in active">
									
									<?php 
											if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
												$results =  get_invoices_list('', 'wire', 'success');  
											}
									?>
									<?php  ?>
										<?php if( !empty($results) && count($results) > 0 ){  ?>
											<?php $n=1; ?>
												<table class="wp-list-table widefat fixed striped posts">
													<thead>
														<tr>
															<th>No.</th>
															<th>User</th>
															<th>Order#</th>
															<th>Plan</th>
															<th>Price</th>
															<th>Date</th>
															<th>Days</th>
														</tr>
													</thead>
													
													<tbody>
														<?php foreach( $results as $data ){ ?>
															<tr>
																<td><?php echo $n; ?></td>
																<td><?php echo $data->user_id; ?></td>
																<td><?php echo $data->order_id; ?></td>
																<td><?php echo $data->plan_name; ?></td>
																<td><?php echo $data->price.$data->currency; ?></td>
																<td><?php echo $data->date; ?></td>
																<td><?php echo $data->days; ?></td>
															</tr>
														<?php $n++; ?>
														<?php } ?>
														
													</tbody>
												</table>	
										
										<?php  } else{ ?>
												<p>Nothing in the list</p>
										<?php } ?>
									
								</div>
								<!--success -->
								
								
								<div id="wpending" class="tab-pane fade in">
									
									<?php 
											if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
												$results =  get_invoices_list('', 'wire', 'pending'); 
											}
									?>
									<?php  ?>
										<?php if( !empty($results) && count($results) > 0 ){  ?>
											<?php $n=1; ?>
												<table class="wp-list-table widefat fixed striped posts">
													<thead>
														<tr>
															<th>No.</th>
															<th>User</th>
															<th>Order#</th>
															<th>Plan</th>
															<th>Price</th>
															<th>Date</th>
															<th>Days</th>
															<th>Action</th>
														</tr>
													</thead>
													
													<tbody>
														<?php foreach( $results as $data ){ ?>
															<tr>
																<td><?php echo $n; ?></td>
																<td><?php echo $data->user_id; ?></td>
																<td><?php echo $data->order_id; ?></td>
																<td><?php echo $data->plan_name; ?></td>
																<td><?php echo $data->price.$data->currency; ?></td>
																<td><?php echo $data->date; ?></td>
																<td><?php echo $data->days; ?></td>
																<td>
																	<form class="wp-core-ui" id="confirm_payment" name="confirm_payment" method="post">
																		<input type="submit" name="payment_submitt" class="button action" value="Confirm" onclick="return window.confirm('Are you sure you want to proceed action?');" />
																		<input type="hidden" name="order_id" value="<?php echo $data->order_id ?>" />
																		<input type="hidden" name="post_id" value="<?php echo $data->post_id ?>" />
																	
																	</form>
																</td>
															</tr>
														<?php $n++; ?>
														<?php } ?>
														
													</tbody>
												</table>	
										
										<?php  } else{ ?>
												<p>Nothing in the list</p>
										<?php } ?>
									
								</div>
								<!--pending -->
								
								
								<div id="wfailed" class="tab-pane fade in">
									
									<?php 
											if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
												$results =  get_invoices_list('', 'wire', 'failed');
											}
									?>
									<?php  ?>
										<?php if( !empty($results) && count($results) > 0 ){  ?>
											<?php $n=1; ?>
												<table class="wp-list-table widefat fixed striped posts">
													<thead>
														<tr>
															<th>No.</th>
															<th>User</th>
															<th>Order#</th>
															<th>Plan</th>
															<th>Price</th>
															<th>Date</th>
															<th>Days</th>
														</tr>
													</thead>
													
													<tbody>
														<?php foreach( $results as $data ){ ?>
															<tr>
																<td><?php echo $n; ?></td>
																<td><?php echo $data->user_id; ?></td>
																<td><?php echo $data->order_id; ?></td>
																<td><?php echo $data->plan_name; ?></td>
																<td><?php echo $data->price.$data->currency; ?></td>
																<td><?php echo $data->date; ?></td>
																<td><?php echo $data->days; ?></td>
															</tr>
														<?php $n++; ?>
														<?php } ?>
														
													</tbody>
												</table>	
										
										<?php  } else{ ?>
												<p>Nothing in the list</p>
										<?php } ?>
									
								</div>
								<!--failed -->
								
								
								
						  
							
						  </div>
						  <!--/wire-->
						  
						</div>
						
			</div>
		<?php	
	}
}

//function to retreive invoices
if(!function_exists('get_invoices_list')){
	function get_invoices_list($userid, $method, $status){
		global $wpdb;
		$prefix = '';
		$prefix = $wpdb->prefix;
		$table_name = $prefix.'listing_orders';
		
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
			
			if( empty($userid)  && !empty($method) && !empty($status) && is_admin() ){
				//return on admin side
				$results = $wpdb->get_results( 
								$wpdb->prepare("SELECT * FROM {$prefix}listing_orders WHERE payment_method=%s AND status=%s", $method, $status) 
							 );
				return $results;
			}
			else if( !empty($userid) && isset($userid) && !empty($status) && !is_admin() ){
				//return on front side
				
				$results = $wpdb->get_results( 
								$wpdb->prepare("SELECT * FROM {$prefix}listing_orders WHERE user_id=%d AND status=%s", $userid, $status) 
							 );
				return $results;
				
			}
			
		}
	}
}

?>