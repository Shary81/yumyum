<?php 
/* * *********************** */
/* Listing options */
/* * *********************** */
global $listingpro_options, $reviews_options, $listingpro_settings, $listingpro_formFields,$claim_options;
/* zaheer 10 march */
global $currentdate, $exprityDate;
$currentdate = date("d-m-Y");
$ads_durations = '';
if(class_exists('Redux') && isset($listingpro_options) && !empty($listingpro_options)){
$ads_durations = $listingpro_options['listings_ads_durations'];
}
$exprityDate = date('Y-m-d', strtotime($currentdate. ' + '.$ads_durations.' days'));
$exprityDate = date('d-m-Y', strtotime( $exprityDate ));
/* zaheer 10 march */
global $priceplans;
$priceplans[]= 'Select Plan';
$the_query = new WP_Query( array('post_type'	=> 'price_plan', 'posts_per_page'	=> -1) );

if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$priceplans[get_the_ID()] = get_the_title();
	}
	wp_reset_postdata();
} else {
}


/* ads plan array by zaheer */
$level1_price = '';
$level2_price = '';
$level3_price = '';
$level4_price = '';
global $adsArray;
if(class_exists('Redux') && isset($listingpro_options) && !empty($listingpro_options)){
$currencyprice = $listingpro_options['currency_paid_submission'];
$lp_random_ads = $listingpro_options['lp_random_ads'];
$lp_detail_page_ads = $listingpro_options['lp_detail_page_ads'];
$lp_top_in_search_page_ads = $listingpro_options['lp_top_in_search_page_ads'];
$currencyprice = $listingpro_options['currency_paid_submission'];


$adsArray['lp_random_ads'] = $lp_random_ads.$currencyprice.' (Random)'; 
$adsArray['lp_detail_page_ads'] = $lp_detail_page_ads.$currencyprice.' (Detail Page)'; 
$adsArray['lp_top_in_search_page_ads'] = $lp_top_in_search_page_ads.$currencyprice.' (Top in Search)'; 
}

$claimers = array();
$all_listings = array();
$queryy = new WP_Query( array('post_type' => 'listing', 'posts_per_page'	=> -1) );
	 if ( $queryy->have_posts() ) {
			echo '';
			while ( $queryy->have_posts() ) {
				$queryy->the_post();
				$all_listings[get_the_ID()] = get_the_title();	
			}
	}

$users = get_users(  );
foreach($users as $user_id){
        $claimers[$user_id->ID] = $user_id->user_nicename;
    }

$claimStatus = array();
$claimStatus = array(
	'pending'	=> 'Pending',
	'approved'	=> 'Approved',
	'decline'	=> 'Decline',
);	
	
$claim_options = Array(
	Array(
		'name' => esc_html__('Claimed For', 'listingpro'),
        'id' => 'claimed_listing',
        'type' => 'select',
        'options' => $all_listings,
		'desc' => ''),
		
	Array(
		'name' => esc_html__('Claimed by', 'listingpro'),
        'id' => 'claimer',
        'type' => 'select',
        'options' => $claimers,
		'desc' => ''),
		
	Array(
		'name' => esc_html__('Author', 'listingpro'),
        'id' => 'owner',
        'type' => 'static',
		'desc' => ''),
	Array(
		'name' => esc_html__('Status', 'listingpro'),
        'id' => 'claim_status',
        'type' => 'select',
        'options' => $claimStatus,
		'desc' => ''),
	
	Array(
		'name' => esc_html__('Claimer Details', 'listingpro'),
        'id' => 'details',
        'type' => 'textarea',
        'child_of' => '',
        'match' => '',
		'desc' => ''),
			
);

/* end ads by zaheer */

/* Ads options by zaheer */
global $ads_options;

$ads_options = Array(
	Array(
		'name' => esc_html__('Select Listing', 'listingpro'),
        'id' => 'ads_listing',
        'type' => 'select',
		'options' => $all_listings,
		'desc'	  => '',
		),
	Array(
		'name' => esc_html__('Ad type', 'listingpro'),
        'id' => 'ad_type',
        'type' => 'checkboxes',
		'value'=> '',
		'options' => $adsArray,
		'desc'	  => '',
		),
	Array(
		'name' => esc_html__('Launched Date', 'listingpro'),
        'id' => 'ad_date',
        'type' => 'hidden',
		'std' => $currentdate,
		 'desc' => '',
		),
	Array(
		'name' => esc_html__('Ad Expiry Date', 'listingpro'),
        'id' => 'ad_expiryDate',
        'type' => 'hidden',
	 	'std' => $exprityDate,
		'desc' => '',
		),
		
);
/* end Ads options by zaheer */


$reviews_options = Array(

	Array(
		'name' => esc_html__('Gallery', 'listingpro'),
        'id' => 'gallery',
        'type' => 'gallery',
		'desc' => ''),
		/* by zaheer on 25 feb */
	Array(
		'name' => esc_html__('Rating', 'listingpro'),
        'id' => 'rating',
        'type' => 'select',
        'options' => array(
		''	=>	'Select rating',
		'1'	=>	'1',
		'2'	=>	'2',
		'3'	=>	'3',
		'4'	=>	'4',
		'5'	=>	'5',
		),
		'desc' => ''),
	Array(
		'name' => esc_html__('Assigned to Listing', 'listingpro'),
        'id' => 'listing_id',
        'type' => 'Select',
        'options' => $all_listings,
		'desc' => ''),
	Array(
		'name' => esc_html__('Reply', 'listingpro'),
        'id' => 'review_reply',
        'type' => 'text',
        'default' => '',
		'desc' => ''),
	/* end by zaheer on 25 feb */
		/* by zaher on 16 march */
	Array(
		'name' => esc_html__('Interesting', 'listingpro'),
        'id' => 'review_interesting',
        'type' => 'hidden',
        'default' => '',
		'desc' => ''),
	Array(
		'name' => esc_html__('LOL', 'listingpro'),
        'id' => 'review_lol',
        'type' => 'hidden',
        'default' => '',
		'desc' => ''),
	Array(
		'name' => esc_html__('Love', 'listingpro'),
        'id' => 'review_love',
        'type' => 'hidden',
        'default' => '',
		'desc' => ''),
	/*end by zaher on 16 march */
	
);

$listingpro_settings = Array(
	Array(
        'name' => esc_html__('Business Tagline Text', 'listingpro'),
        'id' => 'tagline_text',
        'type' => 'text',
		'desc' => 'Your Business One liner'),

    Array(
        'name' => esc_html__('Google Address', 'listingpro'),
        'id' => 'gAddress',
        'type' => 'text',
		'desc' => 'Google address for map'),		
	Array(
        'name' => esc_html__('Latitude', 'listingpro'),
        'id' => 'latitude',
        'type' => 'hidden',
		'desc' => ''),
	Array(
        'name' => esc_html__('Longitude', 'listingpro'),
        'id' => 'longitude',
        'type' => 'hidden',
		'desc' => ''),
   
   Array(
        'name' => esc_html__('Phone', 'listingpro'),
        'id' => 'phone',
        'type' => 'text',
		'desc' => ''),
    Array(
        'name' => esc_html__('Email', 'listingpro'),
        'id' => 'email',
        'type' => 'text',
		'desc' => 'This Email is not for public'),
    Array(
        'name' => esc_html__('Website', 'listingpro'),
        'id' => 'website',
        'type' => 'text',
		'desc' => 'Your website URL'),
    Array(
        'name' => esc_html__('Twitter', 'listingpro'),
        'id' => 'twitter',
        'type' => 'text',
		'desc' => 'Your twitter URL'),
    Array(
        'name' => esc_html__('Facebook', 'listingpro'),
        'id' => 'facebook',
        'type' => 'text',
		'desc' => 'Your facebook URL'),
    Array(
        'name' => esc_html__('LinkedIn', 'listingpro'),
        'id' => 'linkedin',
        'type' => 'text',
		'desc' => 'Your Linkedin URL'),
	Array(
        'name' => esc_html__('Google Plus', 'listingpro'),
        'id' => 'google_plus',
        'type' => 'text',
		'desc' => 'Your Google Plus URL'),
    Array(
        'name' => esc_html__('Youtube Channel Link', 'listingpro'),
        'id' => 'youtube',
        'type' => 'text',
		'desc' => 'Your Youtube Channel URL as social link'),
	Array(
        'name' => esc_html__('Instagram Profile Link', 'listingpro'),
        'id' => 'instagram',
        'type' => 'text',
		'desc' => 'Your Instagram Profile URL as social link'),
	Array(
        'name' => esc_html__('Youtube Video URL', 'listingpro'),
        'id' => 'video',
        'type' => 'text',
		'desc' => 'Any specific Youtube Video? You want to share on business page'),
	
    Array(
        'name' => esc_html__('Image Gallery', 'listingpro'),
        'id' => 'gallery',
        'type' => 'gallery',
		'desc' => 'Select images to present your buisness online.'),
	Array(
        'name' => esc_html__('Show Price Status', 'listingpro'),
        'id' => 'price_status',
        'type' => 'select',
        'std' => 'Price Range',
        'options' => array(
        	'notsay' => 'Prefer not to say',
        	'inexpensive' => '$ Inexpensive',
        	'moderate' => '$$ Moderate',
        	'pricey' => '$$$ Pricey',
        	'ultra_high_end' => '$$$$ Ultra High-End',
        ),
		'desc' => 'It will show your business price range'),
			/*by zaher on 17 march */
	Array(
        'name' => esc_html__('Price From', 'listingpro'),
        'id' => 'list_price',
        'type' => 'Text',
		'desc' => 'Ignore this if your buisness does not have any specific price to show'),
	Array(
        'name' => esc_html__('Price To', 'listingpro'),
        'id' => 'list_price_to',
        'type' => 'Text',
		'desc' => 'Ignore this if your buisness does not have any specific price to show'),	
		/*end by zaher on 17 march */
	Array(
        'name' => esc_html__('Plans', 'listingpro'),
        'id' => 'Plan_id',
        'type' => 'select',
        'options' => $priceplans,
		'desc' => 'Ignore this if this post will not be a paid one'),
	Array(
        'name' => esc_html__('Reviews', 'listingpro'),
        'id' => 'reviews_ids',
        'type' => 'array',
		'desc' => ''),
	Array(
        'name' => esc_html__('Verify Listing', 'listingpro'),
        'id' => 'claimed_section',
        'type' => 'select',
        'std' => 'Verify Listing',
        'options' => array(
			'not_claimed' => 'Not Claimed',
        	'claimed' => 'Claimed'      	
        ),
		'default'=> 'not_claimed',
		'desc' => 'Approve claim at claim section this will override complete claim system'),
    
	/* changes on 25 feb by zaheer */
	Array(
        'name' => esc_html__('Ad Purchased on', 'listingpro'),
        'id' => 'listings_ads_purchase_date',
        'type' => 'hidden',
		'default'	=>'',
		'desc' => ''),
	/* end changes on 25 feb by zaheer */
	Array(
        'name' => esc_html__('Faq', 'listingpro'),
        'id' => 'faqs',
        'type' => 'faqs',
		'desc' => ''),
	Array(
        'name' => esc_html__('Timings', 'listingpro'),
        'id' => 'business_hours',
        'type' => 'timings',
		'desc' => 'Set Your business time details'),
	Array(
		'name' => esc_html__('Copmain ID', 'listingpro'),
        'id' => 'campaign_id',
        'type' => 'hidden',
		'desc' => '',
		),
		

   
);

$listingpro_formFields = Array(
	
	
	Array(
		'name'          => __( 'Field Type', 'listingpro' ),
		'id'            => 'field-type',
		'type'          => 'select',
		'child_of'=> '',
		'options'       => array(
			'text'                              => __( 'Text', 'listingpro' ),                
			//'textarea'                          => __( 'Textarea', 'listingpro' ),                
			//'wysiwyg'                           => __( 'TinyMCE wysiwyg editor', 'listingpro' ),
/* 			'text_time'                         => __( 'Time picker', 'listingpro' ),
			'select_timezone'                   => __( 'Timezone', 'listingpro' ),
			'text_date_timestamp'               => __( 'Date', 'listingpro' ),
			'text_datetime_timestamp'           => __( 'Date and time', 'listingpro' ),
			'text_datetime_timestamp_timezone'  => __( 'Date, time and timezone', 'listingpro' ), */
			//'color'                       => __( 'Colorpicker', 'listingpro' ),
			'check'                          => __( 'Checkbox', 'listingpro' ),
			'checkbox'                          => __( 'Checkbox (Switch On/Off)', 'listingpro' ),
			'checkboxes'                        => __( 'Multicheck', 'listingpro' ),
			'radio'                             => __( 'Radio', 'listingpro' ),
			'select'                            => __( 'Select', 'listingpro' ),   		
			),
		'desc' => ''
		),
	Array(
		'name'          => __( 'Radio Options', 'listingpro' ),
		'id'            => 'radio-options',
		'type'          => 'textarea',
		'child_of'=> 'field-type',
		'match'=>'radio',
		'desc' => 'Comma separated options if type support choices'
		),
	Array(
		'name'          => __( 'Select Options', 'listingpro' ),
		'id'            => 'select-options',
		'type'          => 'textarea',
		'child_of'=> 'field-type',
		'match'=>'select',
		'desc' => 'Comma separated options if type support choices'
		),	
	Array(
		'name'          => __( 'Multicheck Options', 'listingpro' ),
		'id'            => 'multicheck-options',
		'type'          => 'textarea',
		'child_of'=> 'field-type',
		'match'=>'checkboxes',
		'desc' => 'Comma separated options if type support choices'
		),	
	Array(
		'name'          => __( 'Select category for this field', 'listingpro' ),
		'id'            => 'field-cat',
		'type'          => 'checkboxes',
		'child_of'=> '',
		'options'=>listing_get_cat_array(),
		'desc' => ''
		),	
	
   
);

	
	
	
		
		
		
	

add_action('admin_init', 'listingpro_settings_box');
if (!function_exists('listingpro_settings_box')) {
    function listingpro_settings_box() {
        global $listingpro_settings, $reviews_options;
        add_meta_box('listing_meta_settings',esc_html__( 'listing settings', 'listingpro' ),'listingpro_metabox_render','listing','normal','high',$listingpro_settings);
        add_meta_box('Reviews_meta_settings',esc_html__( 'Additional Setting', 'listingpro' ),'reviews_metabox_render','lp-reviews','normal','high',$reviews_options);
		global $claim_options;
		add_meta_box('claims_meta_settings',esc_html__( 'Details About Claim', 'listingpro' ),'claims_metabox_render','lp-claims','normal','high',$claim_options);
		/* ads metabox by zaheer */
		global $ads_options;
		add_meta_box('ads_meta_settings',esc_html__( 'Ad Options', 'listingpro' ),'ads_metabox_render','lp-ads','normal','high',$ads_options);
		
		/* end ads metabox by zaheer */
    }
}

add_action('admin_init', 'listingpro_settings_formfields');
if (!function_exists('listingpro_settings_formfields')) {
    function listingpro_settings_formfields() {
        global $listingpro_formFields;
        add_meta_box('listing_meta_settings',esc_html__( 'Custom Form Fields', 'listingpro' ),'listingpro_metabox_render','form-fields','normal','high',$listingpro_formFields);
    }
}

 ?>