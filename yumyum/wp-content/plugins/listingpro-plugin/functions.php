<?php 
/* ============== ListingPro Currency sign ============ */
class ListingproPlugin{
	
}
	add_action( 'admin_enqueue_scripts', 'listingpro_load_media' );
	if (!function_exists('listingpro_currency_sign')) {

		function listingpro_currency_sign() {
			$currency_code = '';
			$currencycode = '';
			global $listingpro_options;
			if(isset($listingpro_options)){
				$currency_code = $listingpro_options['currency_paid_submission'];
					if($currency_code == "USD") {
					$currencycode = "$";
				} elseif($currency_code == "AUD") {
					$currencycode = "$";
				} elseif($currency_code == "CAD") {
					$currencycode = "$";
				} elseif($currency_code == "CZK") {
					$currencycode = "Kč";
				} elseif($currency_code == "DKK") {
					$currencycode = "kr";
				} elseif($currency_code == "EUR") {
					$currencycode = "€";
				} elseif($currency_code == "HKD") {
					$currencycode = "$";
				} elseif($currency_code == "HUF") {
					$currencycode = "Ft";
				} elseif($currency_code == "JPY") {
					$currencycode = "¥";
				} elseif($currency_code == "NOK") {
					$currencycode = "kr";
				} elseif($currency_code == "NZD") {
					$currencycode = "$";
				} elseif($currency_code == "PLN") {
					$currencycode = "zł";
				} elseif($currency_code == "GBP") {
					$currencycode = "£";
				} elseif($currency_code == "SEK") {
					$currencycode = "kr";
				} elseif($currency_code == "SGD") {
					$currencycode = "$";
				} elseif($currency_code == "CHF") {
					$currencycode = "CHF";
				}				
			}
			return $currencycode;
		}
	}

	
	
	
	/* ============== ListingPro Icon8 SVG ============ */
	
	if (!function_exists('listingpro_icon8')) {

		function listingpro_icon8($icon) {
			$output = '';
			  if($icon == 'checked'){
				$output = '
												<img class="icon icons8-Checked" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAFLklEQVRoQ+1azXHbOBT+nm/2Zb0VREgDUSow1IF9DHWwXYG1FaxTQZIKohykHC1XIGwFtiuAXEHsS7wnv50HghRJgSQoMc5OJpzxjDwEQXzv53sfHkj4RS76RXDgN5CQJ0dze8QEDXZ/h0QYZuOYcQvCg/ufYPCMazNWt31FxM4e0V+txjNOiXDWdVEMrMAw2MMX806Zrs8Xx28NRM/tMYALAnRhwjsGZEEGjFXR4npmh9jDoXgKgCbmYxC9yj0mzxDebwuoMxD91Q7A+JwDYL5n0BR7mJp3atXFqg4ccEzEE4D+kGedIfZxYk5UGoaRVycgzgsCgsSq/MigS5Ooj5Hvqh2mr+whvmOSAfIhd1LNIRlXBzAaiJ7ZCyK4RTPjGgc462q1NsCyUHpyofnGv+fcjNVUfuuZlRz8AGAUIokoIHpmxQsumRn4qw8vNIHSc/uRgAtmvJVFC6EQY1kF1ynZ9dxOyFmCH5lpklmozbq73pdclJzzebSUcGbGezNWl6G5Gz0iOUHAVZMldl1wo2fS3BEQQwa+mETVUnwtEMdOz7hxlniBcAoB0jMr7xdmu+N96KacrAcyt0uhWElsM1ZSM170yvNS6P2AhgJCcqWuzgSBrEOKH3mfBn2zU5tFKnmpiwnPhFEITB2Q1Bs/IaSEZonw2TPkiUnUwtPvJRH+loJpEjWqGmMDSE51zPfL8etBm/X6vF9hqLyGOCCuxvBKFEDIK5tA5nZKwGkT1fW5+GyuCrkEGUrPbOaVjfsbQEZzy86tBNVVO20L0EsUR7MA/lkmqihE82kFLDEsMx5wAFXM3RKQQt24WyYq30tsu8DY5/TcXhEgzNhKs6O5lT3Mm2p4lYGsXffJJGoSu5Bdxq3lDz8y0bAtCgrypVTlS0BGcyuC7YiBnC12WWTbs2uGcvLH0WzsM9X6VvWIq6SZWGubdJf7MUIwWO3XArKUS1WPuERfJipaFUtydhWSsUIwCCSV+t8k4c1Y/ZmN2RpIqXAxSpzfKgSfcEPAoE0I1s2TMWvR4FsD8dV2XYUZIvE/tYVbUQhuy4y9AwmAmZqxOq8DExKCbcBD92OApBztd2axL6mEWRBMVpX9Bi2KoYI5MrNDItxIzSl6tDf6TVmIF04LMUpgSkBr1Gu00dabvXrWKmiZrQqisBERGwfGt3XwHQNvQWlaRJNCbXiu9/P1BTHjdmlvmrF6G2ul4rgSGGmTwgGRXWbjVjX2XRlZNEoUmawP0ZiCgbRxsrZOL7vMTDRKni2T19KxzK8fJuMLPSq07bc7eCNexufhBaxMolTsS+qqMP7FYZsQjH2HntlvLkwDhBGUIgXx+MObcdEg8v5aeL/S2HwIbWBiX9znOL/xsnXekHfVisOCVxYmUSd9LqzrXNnGq6k11digI+ZbXxN+WoiVWkMNG6//d8u0pjUU8mjrviOziMsX6XP5Nn/X8Og6vtLfao2IViBO4foWkfzmSLnedeEVdbA+i4lUBFFAPBh/vODOSBbYx3nfrVTHTk/uWM/1mrt0OqOBeDDHBJ56hSuhdhmzmYrxjpyIyXyFY72zrF0a83wnIA5M2iQTHXXkrbZCqqvkiLnbYagcXQCnYJzJ1teH7jX2MOk6V2cgmXV8M096Xw6QX4R8FGCIYRi43zjMFDEJvMo+Kih+UCBNDCZcvtjxdNXN7oOB1KKnMSFQHuNOhhfi0W0BZPNt7ZHQov1XEJrkMw64DwOcjC9cdwAeOP3awey6+OLEvQLp7pH+nvgNpD9b9jPTfwQDNWCupe5qAAAAAElFTkSuQmCC" alt="icon-check" />';
			  }
			 elseif($icon == 'unchecked'){
				$output = '
												<img class="icon icons8-Cancel" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAFCUlEQVRoQ9Va7XEaSRB9g36ZperkCCxFcO0IDkVgK4JDERhFcHIExhFYisAiAuEI3BeBRATHVYH8y9qrt/TgYcXuzi4L4qaKki0ts/2mu19/jUNL64fIyU/gDwDCjwNOsPyE6yEFHgAoP0fAt1eq/P/Wy22zA4V/Av4EMNggdOzWDw4YOWC8DahGQAzAXwYgEzgF/nXAhCfdWf58yAvG7xHwE9Cn1lKg74DfAsTXHeBjE0C1gKQix4/ApxAAgBsAt4nqbawKwucWIu8B8EPN+nXdBS6d6ix2z2ggfGEKfHHAsZ3+qEuTqPGyMqFMy4MUGFJLKTBzwEXsAUUBmYt8csDQBBl3gGET9cecrpHGtVsSB0121FO9rPpuKRCa0gL46oA+tQBg2FO9rtq0jb/PRUggJAFqZ5IA52XaLwRi/nBnTkkQ/Z4qaXNvay5CKp8YIWgXOCsCUwhkLnJHTQD4uwO835UpVZ0KwTiAVvC7kcr5pu9sBDIXoUo/0JyOAHkpEF7gUDMp8Lmn6v11hekZEKPDr+YTezenIg3lzOw8z2ZrQMy5741iL/bl2FXmFWhm4IAvpOYEOA39ZQ3IQoS2yMA0TlQZpA5uzUXo/KTmm0SVzJatFRALSPeH4hdFJ2hxRslkHeDU++8KSKCNj4nq1cGpIhBoIUL5mOuttJIB8drgv7vA69i0YyFyD2BWxu9VBxLEKySqb6uez8vrtZIB2YQwZsOFCAMk+b00WBXtFQZdxqtElQEwankLcsBlV5XhIgPCk2WK/YzWynY1QZiy1waTB9FlSl8jAfVhguVConrqQifvqR5HHUfwUBMw24II6JgZcub0jskZuXkbyq0Dpi0QZkmsgd6lwAWBZOkIgK3YKgZMmyBC32baQiBZgOkAZ69Uae+NVxmYtkEYe/WfgLsU+Oa8o4fBpTESFkLLcniNALjfI5CVBGSnuo5dJI9lxt/p8ASS8sFEGSzbWXkwtmurILykXv6dAOFLcmD4q9Y0ER73voB4c+K7GwXNKhvZKZC8Y5swtYNmFQhjrsw1aFpsWb5p2dnXHNucvVEGUAYmyBGnu6DfjewUE2diNBA+80PkF/22HBBLKbZtMD7Z9QGxrRQlKk60CWYh8itFCZLGWU/1dV31NonYbYGZi/zD/kKWNJrnZw7fMI2P0kT+gLYFE6Tx00T1JAPyKDJMl132tYK+SjsLEaYHjSN2HkxshWiHnzVK1gqrsNStQ8NWIbI8rlUUhQcUgGGaFFUhbpL3f9l8CJh2vflgKTEnSWwHzY6Aty/dJi0ya2sHffdO/qwdFNpdWbO4ym92/fegub65Qecz1gVz++VM4uBapp6U2ERMgJPClqlpha1SNrE5vzvb90ykSKPWxOaogw2S8ia23yQYKxyEv4QgoscKARjfLOa4+fylnN/KWXZ5SM2FzfWq0VuWer+UmeXMqbTCjBmG3rLLYmAu9zUzeRT58ARcmU+Mu8Cg0TA0dLogAHFcPDkCLnZlahYnOM/n/JLv2zhqy5NCdOfELgxw/u2H+aMOcNMWoOBeSzbSsEsJg1YvDHj0lheN8tctLICOmwTDhcg7u8Kxmj4xee3yBkSNpna0RnIlJtMZntzq/ohduVheqnFugjSdbrxU49ybpzQNL9WEjfObDnDVRMuNgHhQNIcU4B0VjotZzzRZU7vmdNsEgH/hVkDyWvpp15eCi2d5cNPcxbPJNsKH7/8PkcItXz99rKgAAAAASUVORK5CYII=" alt="icon-cross" />';
			  }
			  return $output;
			
		}
	}
	
	
	
	
	
	

	
	
	/* ============== ListingPro Author Name ============ */
	
	if (!function_exists('listingpro_author_name')) {

		function listingpro_author_name() {
				 if ( is_user_logged_in() ) {
					$current_user = wp_get_current_user();
					$output = $current_user->user_login; 
				} else {
					$output = '';
				}
				return $output;
			
		}

	}
	
	
	
	
	/* ============== ListingPro Get Metabox ============ */
	
	if (!function_exists('listing_get_metabox')) {
		function listing_get_metabox($name) {
			global $post;
			if ($post) {
				$metabox = get_post_meta($post->ID, 'lp_' . strtolower(THEMENAME) . '_options', true);
				return isset($metabox[$name]) ? $metabox[$name] : "";
			}
			return false;
		}
	}
	
	/* ============== ListingPro Get form fields ============ */
	
	if (!function_exists('listing_get_fields')) {
		function listing_get_fields($name,$post_id) {
			if ($post_id) {
				$metabox = get_post_meta($post_id, 'lp_' . strtolower(THEMENAME) . '_options_fields', true);
				return isset($metabox[$name]) ? $metabox[$name] : "";
			}
			return false;
		}
	}
	
	
	/* ============== ListingPro Get Metabox ============ */
	
	if (!function_exists('listing_get_metabox_by_ID')) {
		function listing_get_metabox_by_ID($name,$postid) {
			if ($postid) {
				$metabox = get_post_meta($postid, 'lp_' . strtolower(THEMENAME) . '_options', true);
				return isset($metabox[$name]) ? $metabox[$name] : "";
			}else{
				return false;
			}
			
		}
	}
	
	
	/* ============== ListingPro Set Metabox ============ */
	
	if (!function_exists('listing_set_metabox')) {
		function listing_set_metabox($name, $val, $postID) {
			if ($postID) {
				$metabox = get_post_meta($postID, 'lp_' . strtolower(THEMENAME) . '_options', true);
				$metabox[$name] = $val;
				return update_post_meta($postID, 'lp_' . strtolower(THEMENAME) . '_options', $metabox);
			}else{
				return false;
			}
		}
	}
	
	
	/* ============== ListingPro Set Metabox ============ */
	
	if (!function_exists('listing_set_metabox_of_extraFields')) {
		function listing_set_metabox_of_extraFields($name, $val, $postID) {
			if ($postID) {
				$metabox = get_post_meta($postID, 'lp_' . strtolower(THEMENAME) . '_options_fields', true);
				$metabox[$name] = $val;
				return update_post_meta($postID, 'lp_' . strtolower(THEMENAME) . '_options_fields', $metabox);
			}else{
				return false;
			}
		}
	}
	
	/* ============== ListingPro deleted Metabox ============ */
	
	if (!function_exists('listing_delete_metabox')) {
		function listing_delete_metabox($key, $postid) {
			global $post;
			if ($postid) {
				$metabox = get_post_meta($postid, 'lp_' . strtolower(THEMENAME) . '_options', true);
				if (array_key_exists($key, $metabox)) {
					unset($metabox[$key]);
					if(!empty($metabox)){
						return update_post_meta($postid, 'lp_' . strtolower(THEMENAME) . '_options', $metabox);
					}
				}
				else{
					return false;
				}
				
			}else{
				return false;
			}
		}
	}
	
	/* ============== ListingPro get term meta ============ */
	
	if (!function_exists('listingpro_get_term_meta')) {
		function listingpro_get_term_meta( $term_id,$meta_name ) {
		  $value = get_term_meta( $term_id, $meta_name, true );		  
		  return $value;
		}
	}
	
	
	
	/* ============== ListingPro Get taxonomy Meta ============ */

	if (!function_exists('listing_get_tax_meta')) {
		function listing_get_tax_meta($termID,$taxonomy,$meta) {
			if ($termID) {
				$metae = 'lp_'.$taxonomy.'_'.$meta;
				$metad = listingpro_get_term_meta( $termID,$metae);
				return $metad;
			}else{
				return false;
			}
		}
	}
	
	/* ============== ListingPro Features array ============ */
	
	 if (!function_exists('listing_get_feature_array')) {
		function listing_get_feature_array() {
				$cat = '';
				 $ucat = array(
				 'post_type' => 'listing',
				  'hide_empty' => false,
				  'orderby' => 'count',
				  'order' => 'ASC',
				);
				$features = get_terms( 'features',$ucat);

				foreach($features as $feature) {

					$cat[$feature->term_id] = $feature->name;
				} 
				return $cat;
		}
	} 
	
	
	
	/* ============== ListingPro update form field id in listing category ============ */
	

	
	 if (!function_exists('listingpro_update_form_fields_meta_in_listing_categories')) {
		function listingpro_update_form_fields_meta_in_listing_categories($post_id) {
			if(is_admin()){
				$screen = get_current_screen();
				if(!empty($screen)){
					if ( $screen->post_type == 'form-fields' ){
						$cats='';
						$currentPostID = '';
										
						
						if(isset($_POST['field-cat']) && !empty($_POST['field-cat'])){
							if(isset($_POST['post_ID'])){
								$currentPostID = $_POST['post_ID'];
							}
							$cats = $_POST['field-cat'];
							foreach($cats as $cat){
								$fieldIDs = listingpro_get_term_meta($cat,'fileds_ids');
								
								if(empty($fieldIDs)){
									$fieldIDs[] ='';							
								}
								
								if(!in_array($currentPostID,$fieldIDs)){
									array_push($fieldIDs,$currentPostID);
									update_term_meta( $cat, 'fileds_ids', $fieldIDs );							
								}
							}
							implode(',',$cats);
						}
						if(!empty($cats)){
							$terms = get_terms( 'listing-category', array(
								'hide_empty' => false,
								'exclude' => $cats
							) );
							
							if(!empty($terms)){
								foreach($terms as $term){		
									$fieldIDs = listingpro_get_term_meta($term->term_id,'fileds_ids');
									if(!empty($fieldIDs)){
										foreach($fieldIDs as $index => $value)
										{
											$key = array_search($currentPostID, $fieldIDs);

											if($key == $index)
											{
												unset($fieldIDs[$index]);
												echo $index;
												echo $value;
												
											}
										}
										update_term_meta( $term->term_id, 'fileds_ids', $fieldIDs );	
										
									}
								}
								
							}
						}
					}
				}
			
			}
		}
		add_action( 'save_post', 'listingpro_update_form_fields_meta_in_listing_categories' );
	}
	
	/* ============== ListingPro update features in listing post ============ */
	
	 if (!function_exists('listingpro_update_features_in_list')) {
		function listingpro_update_features_in_list($post_id) {
			if(is_admin()){
				require_once(ABSPATH . 'wp-admin/includes/screen.php');
				$screen = get_current_screen();				
				if (!empty($screen)){
					if ( $screen->post_type == 'listing' ){
						if(isset($_POST['lp_form_fields_inn']) && !empty($_POST['lp_form_fields_inn']['lp_feature']) && isset($_POST['post_ID'])){
							wp_set_post_terms($_POST['post_ID'], $_POST['lp_form_fields_inn']['lp_feature'], 'features');
						}
					}
				}
			}
			
		}
		add_action( 'save_post', 'listingpro_update_features_in_list' );
	}
	
	
	/* ============== ListingPro Features array ============ */
	
	 if (!function_exists('listing_get_cat_array')) {
		function listing_get_cat_array() {
				$cat = '';
				 $ucat = array(
				 'post_type' => 'listing',
				  'hide_empty' => false,
				  'orderby' => 'count',
				  'order' => 'ASC',
				);
				$features = get_terms( 'listing-category',$ucat);

				foreach($features as $feature) {

					$cat[$feature->term_id] = $feature->name;
				} 
				return $cat;
		}
	}
	
	
	
	/* ============== ListingPro Custom post type columns ============ */
	
	if (!function_exists('listing_columns')) {
		function listing_columns($columns) {
			return array(
				'cb' => '<input type="checkbox" />',			
				'title' => esc_html__('Title'),			
				'listing-category' => esc_html__('Listing Category'),
				'location' => esc_html__('Location'),
				'features' => esc_html__('Features'),
				'author' => esc_html__('Author'),
				'date' => esc_html__('Date')
			);
		}
		add_filter('manage_listing_posts_columns' , 'listing_columns');
	}
	
	

	
	if (!function_exists('listingpro_columns_content')) {
		function listingpro_columns_content($column_name, $post_ID) {
			if ($column_name == 'listing-category') {
				$term_list = wp_get_post_terms($post_ID, 'listing-category', array("fields" => "names"));
				foreach($term_list as $list) {
					echo $list.',';
				}
			}
			if ($column_name == 'location') {
				$term_list = wp_get_post_terms($post_ID, 'location', array("fields" => "names"));
				foreach($term_list as $list) {
					echo $list.',';
				}
			}
			if ($column_name == 'features') {
				$terms = get_the_terms( $post_ID, 'features' );
				if(!empty($terms)){
					foreach ($terms as $term) {
						 echo $term->name;
					 }
				}
				 
			}
		}
		add_action('manage_listing_posts_custom_column', 'listingpro_columns_content', 10, 2);
	}
	
	
	/* ============== ListingPro Frontend Uplaod ============ */
	
	if (!function_exists('listingpro_handle_attachment')) {
		function listingpro_handle_attachment($file_handler,$post_id,$set_thu=false) {
			// check to make sure its a successful upload
			if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

			require_once(ABSPATH . "wp-admin" . '/includes/image.php');
			require_once(ABSPATH . "wp-admin" . '/includes/file.php');
			require_once(ABSPATH . "wp-admin" . '/includes/media.php');

			$attach_id = media_handle_upload( $file_handler, $post_id );

				 // If you want to set a featured image frmo your uploads. 
			if ($set_thu) set_post_thumbnail($post_id, $attach_id);
			return $attach_id;
		}
	}
	

	
	/* ============== ListingPro Frontend Uplaod Featured image ============ */
	
	if (!function_exists('listingpro_handle_attachment_featured')) {
		function listingpro_handle_attachment_featured($file_handler,$post_id) {

			require_once(ABSPATH . "wp-admin" . '/includes/image.php');
			require_once(ABSPATH . "wp-admin" . '/includes/file.php');
			require_once(ABSPATH . "wp-admin" . '/includes/media.php');

			$attach_id = media_handle_upload( $file_handler, $post_id );

			set_post_thumbnail($post_id, $attach_id);
			return $attach_id;
		}
	}
	

	
	
	/* ============== ListingPro get child term (tags) ============ */
	
	if (!function_exists('listingpro_child_term_method')) {
		
		
		function listingpro_child_term_method(){
			wp_register_script('ajax-term-script', plugins_url( '/assets/js/child-term.js', __FILE__ ), array('jquery') ); 
			wp_enqueue_script('ajax-term-script');

			wp_localize_script( 'ajax-term-script', 'ajax_term_object', array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			));

			// Enable the user with no privileges to run ajax_login() in AJAX
			
		}
			add_action('wp_enqueue_scripts', 'listingpro_child_term_method');
	}
	
	add_action('wp_ajax_ajax_term',        'ajax_term');
	add_action('wp_ajax_nopriv_ajax_term', 'ajax_term');
	function ajax_term(){

		// Nonce is checked, get the POST data and sign user on
		$term_id = $_POST['term_id'];
		$output = null;
		if(!empty($term_id)){
			$termparent = get_term_by('id', $term_id, 'listing-category');
			$parent = $termparent->parent;
		}
		$fieldIDs = listingpro_get_term_meta($term_id,'fileds_ids');
		$output .= '<label for="inputTags" class="featuresBycat">Additional Bussiness Info</label>';
		$output .= listingpro_field_type($fieldIDs);
		
		$featureName;
		$features = listingpro_get_term_meta($term_id,'lp_category_tags');
		if(empty($features)){
			$features = listingpro_get_term_meta($parent,'lp_category_tags');
		}
		foreach($features as $feature){
			$terms = get_term_by('id', $feature, 'features');
			if(!empty($terms)){
					$featureName[$terms->term_id] = $terms->name;
			}
		}
		
		//$term_fields = get_option(LiSTINGPRO_FORM_FIELDS);
		//$listingpro_term_fields = $term_fields[$term_id]['listingpro_form_fields'];
		
		
		$term_group_result = json_encode(array('tags'=>$featureName, 'fields'=>$output));
		//$term_group_result = json_encode($listingpro_tag_groups);
		die($term_group_result);
		
	}
	
	
	add_action('wp_ajax_lp_get_fields',        'lp_get_fields');
	add_action('wp_ajax_nopriv_lp_get_fields', 'lp_get_fields');
	function lp_get_fields(){
		$output = null;
		$featureOutput = null;
		$array='';
		$value='';
		$term_id = $_POST['term_id'];
		$list_id = $_POST['list_id'];
		
		if(!empty($term_id)){
			$termparent = get_term_by('id', $term_id, 'listing-category');
			$parent = $termparent->parent;
		}
		$fieldIDs = listingpro_get_term_meta($term_id,'fileds_ids');
		$Features = listingpro_get_term_meta( $term_id,'lp_category_tags' );
		if(empty($Features)){
			$Features = listingpro_get_term_meta($parent,'lp_category_tags');
		}
		$featurevalue = listing_get_fields('lp_feature',$list_id);
		$featureMID = 'lp_feature';
		if(!empty($Features)){
			explode(',', $Features);
			foreach($Features as $Feature){
				$features = get_term_by('id', $Feature, 'features');
				$featureName[$features->term_id] = $features->name;
			}			
			$settings = Array(
					'name'          => 'Select Business Features',
					'id'            => 'lp_form_fields_inn['.$featureMID.']',
					'type'          => 'checkboxes',
					'child_of'=> '',
					'match'=>'',
					'options'=>$featureName,
					'value'=>$featurevalue,
					'std'=>'',
					'desc' => ''
					);
				ob_start();
				call_user_func('settings_checkboxes', $settings);
				$featureOutput[] .= ob_get_contents(); 
			ob_end_clean();
		}
		if(!empty($fieldIDs)){
			$type = 'form-fields';
			$args=array(
				'post_type' => $type,
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'post__in'         => $fieldIDs,
				
			);
			$my_query = null;
			
			$my_query = new WP_Query($args);
			

			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
					global $post;
					$options='';
					$array= null;
					
					$type = listing_get_metabox('field-type');
					
					if(isset($list_id) && !empty($list_id)){
						$value = listing_get_fields($post->post_name,$list_id);
					}
					
					
					
					if($type=='radio'){
						$options = listing_get_metabox('radio-options');
					}elseif($type=='select'){
						$options = listing_get_metabox('select-options');
					}elseif($type=='checkboxes'){
						$options = listing_get_metabox('multicheck-options');
					}
					if(!empty($options)){
						$myArray = explode(',', $options);
						foreach($myArray as $key=>$myAr){
							$array[$myAr] = $myAr;
						}
						
					}
					
					$settings = Array(
						'name'          => get_the_title(),
						'id'            => 'lp_form_fields_inn['.$post->post_name.']',
						'type'          => $type,
						'child_of'=> '',
						'match'=>'',
						'options'=>$array,
						'value'=>$value,
						'std'=>'',
						'desc' => '',
						'from' => 'ajax'
						);
					ob_start();
					call_user_func('settings_'.$type, $settings);
					 $output[] .= ob_get_contents(); 
						ob_end_clean();
				endwhile;	
				
			}
		}
		$term_group_result = json_encode(array('fields'=>$output,'features'=>$featureOutput));
		die($term_group_result);
		
	}
	if (!function_exists('Listingpro_activation')) {
		function Listingpro_activation() {
			$status = get_option( 'theme_activation' );
			if(empty($status) && $status != 'none'){
				update_option( 'theme_activation', 'none' );
			}
			?>
			<div class="notice">
				<form action="" method="post">
					<h2 style="margin-top:0;margin-bottom:5px">Activate Listingpro</h2>
					<p>To unlock all ListingPro features please enter your purchase code below. To get your purchase code, login to ThemeForest, and go to Downloads section and, click on the green Download button next to ListingPro and select “License certificate & purchase code” in any format. </p>
					<div id="title-wrap" class="input-text-wrap">
						<label id="title-prompt-text" class="prompt" for="title"> Put here purchase key </label>
						<input id="title" name="key" autocomplete="off" type="text">
					</div>
					<?php echo wp_nonce_field( 'api_nonce', 'api_nonce_field' ,true, false ); ?>
					<input type="submit" name="submit" class="button button-primary button-hero" value="Activate"/>
				</form>
			<?php
			
			if( isset( $_POST['api_nonce_field'] ) &&  wp_verify_nonce( $_POST['api_nonce_field'], 'api_nonce' ) && !empty($_POST['key'])){
				
				$purchase_key = $_POST['key'];
				$item_id = 19386460;
				//'c8f37d37-52e2-4fed-b0ac-e470ba475772'
				$purchase_data = verify_envato_purchase_code( $purchase_key );

				if( isset($purchase_data['verify-purchase']['buyer']) && $purchase_data['verify-purchase']['item_id'] == $item_id) {
					update_option( 'theme_activation', 'activated' );
					echo '<p class="successful"> '.__( 'Valid License Key!', 'sample-text-domain' ).' </p>'; 
				} else{
					echo '<p class="error"> '.__( 'Invalid license key', 'sample-text-domain' ).' </p>'; 
				}
			
				

			}
			echo '</div>';
		}
		$status = get_option( 'theme_activation' );
		if(empty($status) || $status != 'activated'){
			add_action( 'admin_notices', 'Listingpro_activation' );
		}
	}
	function verify_envato_purchase_code($code_to_verify) {
		// Your Username
		$username = 'CridioStudio';
		
		// Set API Key	
		$api_key = 'd22l6udt6rk9s36spidjjlah3nhnxw77';
		
		// Open cURL channel
		$ch = curl_init();
		 
		// Set cURL options
		curl_setopt($ch, CURLOPT_URL, "http://marketplace.envato.com/api/edge/". $username ."/". $api_key ."/verify-purchase:". $code_to_verify .".json");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		   //Set the user agent
		   $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
		   curl_setopt($ch, CURLOPT_USERAGENT, $agent);	 
		// Decode returned JSON
		$output = json_decode(curl_exec($ch), true);
		 
		// Close Channel
		curl_close($ch);
		 
		// Return output
		return $output;
	}