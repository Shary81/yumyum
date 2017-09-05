<div id="invoices" class="tab-pane fade in">
	<div class="tab-header">
		<h3><?php esc_html_e('Invoices for Ads','listingpro'); ?></h3>
	</div>
	<div class="aligncenter">
		<div class="lp-invoice-table">
			<?php 
				global $user_id;
				$n = 1;
				$resultsforads = get_ads_invoices_list($user_id, '', 'success');
			?>

			<?php if( count($resultsforads) > 0 ){  ?>
			
				<?php $reqs_url = get_template_directory_uri().'/include/invoices/invoice-modal.php'; ?>
				<?php foreach( $resultsforads as $data ){ ?>
				
					<?php
						$adID = listing_get_metabox_by_ID('campaign_id', $data->post_id);
						$ad_type = listing_get_metabox_by_ID('ad_type', $adID);
						
						$ad_date = listing_get_metabox_by_ID('ad_date', $adID);
						$ad_expiryDate = listing_get_metabox_by_ID('ad_expiryDate', $adID);
						$plansData = '';
						$cnt = 1;
						if(!empty($ad_type)){
							foreach($ad_type as $package){
								
								if($package=="lp_random_ads"){
									$plansData = $plansData.'Random Ads';
								}
								
								if($package=="lp_detail_page_ads"){
									$plansData = $plansData.'Detail Page Ads';
								}
								
								if($package=="lp_top_in_search_page_ads"){
									$plansData = $plansData.'Search Page Ads';
								}
								
								if($cnt< count($ad_type)){
									$plansData = $plansData.' , ';
								}
								$cnt++;
							}
						}
					?>
					
					<div class="invoice-section">
						<div class="top-section">
							<h3><a href="<?php echo get_the_permalink($data->post_id); ?>"><?php echo get_the_title($data->post_id); ?></a><span><?php echo esc_html__(' - Purchased Ads', 'listingpro'); ?></span></h3>
							<a href="#" class="btn btn-first-hover pull-right showme" data-url="<?php echo $reqs_url; ?>" data-id="<?php echo $data->main_id; ?>"><?php echo esc_html__( 'View Detail', 'listingpro' ); ?></a>
						</div>
						<table class="wp-list-table widefat fixed striped posts">
							<thead>
								<tr>
									<th><?php esc_html_e('No.','listingpro'); ?></th>
									<th><?php esc_html_e('Order#','listingpro'); ?></th>
									<th><?php esc_html_e('Plan','listingpro'); ?></th>
									<th><?php esc_html_e('Price','listingpro'); ?></th>
									<th><?php esc_html_e('Purchased Date','listingpro'); ?></th>
									<th><?php esc_html_e('Expiry Date','listingpro'); ?></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $n; ?></td>
									<td><?php echo $data->transaction_id; ?></td>
									<td><?php echo $plansData; ?></td>
									<td><?php echo $data->price.$data->currency; ?></td>
									<td><?php echo $ad_date; ?></td>
									<td><?php echo $ad_expiryDate; ?></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
					<?php $n++; ?>
				<?php } ?>
			<?php } ?>
			<?php if(empty($resultsforads) || count($resultsforads) <= 0){
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