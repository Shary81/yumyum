<?php

if(isset($_GET['lp_p_id'])){
	require_once( dirname(dirname( dirname( dirname(dirname( dirname( __FILE__ )))))) . '/wp-load.php' );
	$rowid = $_GET['lp_p_id'];
	$results = '';
	
	$invoice = '';
	$date  = '';
	$to = '';
	$emailid = '';
	$company = '';
	$address = '';
	$price = '';
	$currency = '';
	$packagetype = '';
	$packagename = '';
	$addtionalinfo = '';
	global $wpdb, $listingpro_options;
	$logo = $listingpro_options['invoice_logo']['url'];
	$company = $listingpro_options['invoice_company_name'];
	$address = $listingpro_options['invoice_address'];
	$addtionalinfo = $listingpro_options['invoice_additional_info'];
	
	
	
		$prefix = '';
		$prefix = $wpdb->prefix;
		$table_name = $prefix.'listing_orders';
		
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
			
			if( !empty($rowid)){
				//return on admin side
				$results = $wpdb->get_results( 
								$wpdb->prepare("SELECT * FROM {$prefix}listing_orders WHERE main_id=%s", $rowid) 
							 );
				foreach( $results as $data ){
					$invoice = $data->order_id;
					$date  = $data->date;
					$to = $data->firstname.' '.$data->lastname;
					$emailid = $data->email;
					$price = $data->price;
					$currency = $data->currency;
					$packagetype = $data->plan_type;
					$packagename = $data->plan_name;	
				}				
							
				
			}
			else{
				$results = 'no data';
			}
		}
		else{
			$results = 'no table data';
		}
	
	$output = null;
	
	$output = '
	
	<div class="col-md-12 modal-dialog" role="document">
		<div class="lp-list-detail">
			<div class="lp-detail-header">
				<div class="col-md-6">
					<img src="'.esc_attr($logo).'"/>
				</div>
				<div class="col-md-6">
					<div class="lp-list-date pull-right">
						<p><strong>'.esc_html__(' INVOICE ','listingpro').'</strong> : '.$invoice.' </p>
						<p><strong>'.esc_html__('DATE','listingpro').'</strong> : '.$date.' </p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="lp-addres-to-detail pull-left">
					<div class="lp-list-address">
						<p><strong> '.$to.' </strong></p>
						<p>'.$emailid.' </p>
					</div>
					<div class="lp-list-address">
						<p><strong>'.esc_html__('Company:','listingpro').'</strong> '.$company.'</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="lp-addres-com-detail pull-right">
				</div>
			</div>
			<div class="col-md-12">
				<table class="table invoice-total">
					<tbody>
						<tr>
							<td class="lp-lst-info"><strong>'.esc_html__('Plan Type','listingpro').'</strong></td>
							<td class="lp-lst-info">'.$packagetype.'</td>
						</tr>
						<tr>
							<td class="lp-lst-info"><strong>'.esc_html__('Plan Name','listingpro').'</strong></td>
							<td class="lp-lst-info">'.$packagename.'</td>
						</tr>
						
						<tr>
							<td class="description"><strong>'.esc_html__('Payment Total','listingpro').'</strong></td>
							<td class="amount"><strong>'.esc_html__('Total Price:','listingpro').'</strong> '.$currency.''.$price.' </td>
						</tr>
					</tbody>
				</table>
				<div class="">
					<p><strong>'.esc_html__('Additional Information:','listingpro').'</strong></p>
					<p>'.$addtionalinfo.'</p>
				</div>
			</div>
		</div>
	</div>
	
	';
	
	echo $output;
	die();
}
?>