<?php
	
	if(!function_exists('save_lp-save_lpads_meta')){
		function save_lpads_meta( $post_id, $post ){
			global $listingpro_options;
			$post_type = get_post_type($post_id);
			
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
			if ( $post_type !== 'lp-ads' ) return $post_id;
			if( !empty($_POST['ad_type']) && isset($_POST['ad_type']) ){
				listing_set_metabox('ad_status', 'active', $post_id);
			
				$ad_type = $_POST['ad_type'];
				
				$listingID = $_POST['ads_listing'];
				listing_set_metabox('campaign_id', $post_id, $listingID);
				update_post_meta( $listingID, 'campaign_status', 'active' );
				
				if(!empty($ad_type)){
					foreach( $ad_type as $type ){
						update_post_meta( $listingID, $type, 'active' );
					}
				}
				
			}
			else{
				return $post_id;
			}
			

			
		}
		add_action('save_post', 'save_lpads_meta', 10, 3);

	}
	
	/*========= delete listing post meta on trashing ad post =========*/
	add_action('wp_trash_post', 'delete_listing_meta_on_ad_trash', 10);
	if( !function_exists('delete_listing_meta_on_ad_trash') ){
		function delete_listing_meta_on_ad_trash($post_id){
			
			$ads_listing = listing_get_metabox_by_ID('ads_listing', $post_id );
			$ads_type = listing_get_metabox_by_ID('ad_type', $post_id );
			if( !empty($ads_listing) && !empty($ads_type) ){
				if(!empty($ads_type)){
					foreach( $ads_type as $type ){
						update_post_meta( $ads_listing, $type, 'expire' );
					}
				}
			}
			
		}
	}
	
	/* ============== ListingPro Custom post type columns ============ */
	
	if (!function_exists('lp_ads_columns')) {
		function lp_ads_columns($columns) {
			return array(
				'cb' => '<input type="checkbox" />',			
				'title' => esc_html__('Ad Title'),			
				'list_title' => esc_html__('Listing Title'),			
				'author' => esc_html__('Author'),
				'date' => esc_html__('Date')
			);
		}
		add_filter('manage_lp-ads_posts_columns' , 'lp_ads_columns');
	}
	/* ============== content for custom column ======================*/
	
	if (!function_exists('listingpro_ads_columns_content')) {
		function listingpro_ads_columns_content($column_name, $post_ID) {
			
			if ($column_name == 'list_title') {
				$metabox = get_post_meta($post_ID, 'lp_' . strtolower(THEMENAME) . '_options', true);
				if(isset($metabox['ads_listing']) && !empty($metabox['ads_listing'])){
					echo get_the_title($metabox['ads_listing']);
				}
			}
			
			
			
			
		}
		add_action('manage_lp-ads_posts_custom_column', 'listingpro_ads_columns_content', 10, 2);
	}
	
	/* ============== content for custom column ======================*/
	if(!function_exists('listingpro_trash_ads_delete')){
	function listingpro_trash_ads_delete($post_id) {
			if (get_post_type($post_id) == 'lp-ads') {
				// Force delete
				wp_delete_post( $post_id, true );
			}
		}
	}	
	add_action('wp_trash_post', 'listingpro_trash_ads_delete');
	
	