<?php 
add_action( 'init', 'create_post_type_claims' );

function create_post_type_claims() {
	$labels = array(
		'name'               => _x( 'Claims', 'post type general name', 'listingpro' ),
		'singular_name'      => _x( 'Claim', 'post type singular name', 'listingpro' ),
		'menu_name'          => _x( 'Claims', 'admin menu', 'listingpro' ),
		'name_admin_bar'     => _x( 'Claim', 'add new on admin bar', 'listingpro' ),
		'add_new'            => _x( 'Add New', 'review', 'listingpro' ),
		'add_new_item'       => __( 'Add New Claim', 'listingpro' ),
		'new_item'           => __( 'New Claim', 'listingpro' ),
		'edit_item'          => __( 'Edit Claim', 'listingpro' ),
		'view_item'          => __( 'View Claim', 'listingpro' ),
		'all_items'          => __( 'All Claims', 'listingpro' ),
		'search_items'       => __( 'Search Claims', 'listingpro' ),
		'parent_item_colon'  => __( 'Parent Claims:', 'listingpro' ),
		'not_found'          => __( 'No reviews found.', 'listingpro' ),
		'not_found_in_trash' => __( 'No reviews found in Trash.', 'listingpro' )
	);

	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-testimonial',
        'description'        => __( 'Description.', 'listingpro' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'lp-claims' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 30,
		'supports'           => array( 'title')
	);

	register_post_type( 'lp-claims', $args );
}

/**
 */
/* updates by zaheer on 25 feb */
function save_lp_claims_meta($post_id) {
	$post_id = $post_id;
    $post_type = get_post_type($post_id);
	
    if ( "lp-claims" != $post_type ) return;


    if ( !empty( $_POST['claimer'] ) && isset( $_POST['claimer'] ) ) {
		$new_author = $_POST['claimer'];
		$claim_status = $_POST['claim_status'];
		$claimed_post = $_POST['claimed_listing'];
		
		$usermeta = get_user_by( 'id', $new_author );
		$new_author_name = $usermeta->user_login;

		
		
		if( !empty($claim_status) && $claim_status=="approved" ){
			
			listing_set_metabox('claimed_section', 'claimed', $claimed_post);
			listing_set_metabox('owner', $new_author, $post_id);
		
			
			global $wpdb;
			$prefix = $wpdb->prefix;
			
			$update_data = array('post_author' => $new_author);
			$where = array('ID' => $claimed_post);
			$update_format = array('%s');
			$wpdb->update($prefix.'posts', $update_data, $where, $update_format);
			
		}
		else{
			return;
		}
		
		
		
    }

}
//add_action( 'save_post', 'save_lp_claims_meta', 10, 3 );
add_action( 'save_post', 'save_lp_claims_meta');

/* ============== ListingPro Custom post type columns ============ */
	
	if (!function_exists('lp_claims_columns')) {
		function lp_claims_columns($columns) {
			return array(
				'cb' => '<input type="checkbox" />',			
				'title' => esc_html__('Title'),			
				'author' => esc_html__('Author'),
				'status' => esc_html__('Status'),
				'date' => esc_html__('Date')
			);
		}
		add_filter('manage_lp-claims_posts_columns' , 'lp_claims_columns');
	}
/* ============== content for custom column ======================*/
	
	if (!function_exists('listingpro_claims_columns_content')) {
		function listingpro_claims_columns_content($column_name, $post_ID) {
			
			if ($column_name == 'status') {
				$metabox = get_post_meta($post_ID, 'lp_' . strtolower(THEMENAME) . '_options', true);
				echo $metabox['claim_status'];
			}
			
		}
		add_action('manage_lp-claims_posts_custom_column', 'listingpro_claims_columns_content', 10, 2);
	}