<div id="invoices" class="tab-pane fade in">
	<div class="tab-header">
		<h3><?php esc_html_e('Invoices for Listing','listingpro'); ?></h3>
	</div>
	<div class="aligncenter">
		<div class="lp-invoice-table">
			<?php 
				global $user_id;
				$results = get_invoices_list($user_id, '', 'success');
			?>
			<?php if( count($results) > 0 ){  ?>
				<?php $n=1; ?>
				<?php $reqs_url = get_template_directory_uri().'/include/invoices/invoice-modal.php'; ?>
				<?php foreach( $results as $data ){ ?>
					<div class="invoice-section">
						<div class="top-section">
							<h3><a href="<?php echo get_the_permalink($data->post_id); ?>"><?php echo get_the_title($data->post_id); ?></a><span><?php echo esc_html__(' - Purchased Listing', 'listingpro'); ?></span></h3>
							<a href="#" class="btn btn-first-hover pull-right showme" data-url="<?php echo $reqs_url; ?>" data-id="<?php echo $data->main_id; ?>"><?php echo esc_html__( 'View Detail', 'listingpro' ); ?></a>
						</div>
						<table class="wp-list-table widefat fixed striped posts">
							<thead>
								<tr>
									<th><?php esc_html_e('No.','listingpro'); ?></th>
									<th><?php esc_html_e('Order#','listingpro'); ?></th>
									<th><?php esc_html_e('Method','listingpro'); ?></th>
									<th><?php esc_html_e('Plan','listingpro'); ?></th>
									<th><?php esc_html_e('Price','listingpro'); ?></th>
									<th><?php esc_html_e('>Date','listingpro'); ?></th>
									<th><?php esc_html_e('Days','listingpro'); ?></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $n; ?></td>
									<td><?php echo $data->order_id; ?></td>
									<td><?php echo $data->payment_method; ?></td>
									<td><?php echo $data->plan_name; ?></td>
									<td><?php echo $data->price.$data->currency; ?></td>
									<td><?php echo $data->date; ?></td>
									<td><?php echo $data->days; ?></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
					<?php $n++; ?>
				<?php } ?>
			<?php  }  ?>
			
			
			<?php if(empty($results) || count($results) <= 0){
				?>
				<div class="text-center no-result-found col-md-12 col-sm-6 col-xs-12 margin-bottom-30">
					<h1><?php esc_html_e('Ooops!','listingpro'); ?></h1>
					<p><?php esc_html_e('Sorry ! There is no Invoice generated yet!','listingpro'); ?></p>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
<!--invoices-->