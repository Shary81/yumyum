<?php
	
	/* ============== ListingPro category meta ============ */

	global $category_meta;
	$category_meta = Array(
		Array(
			'name' => esc_html__('Category Icon', 'listingpro'),
			'id' => 'lp_category_image',
			'type' => 'file',
			'value' => '',
			'desc' => 'Please use Base64 from icon8 and copy base64 code from icon8 and then paste in the box; '
			),	
		Array(
			'name' => esc_html__('Category Banner ', 'listingpro'),
			'id' => 'lp_category_banner',
			'type' => 'file',
			'value' => '',
			'desc' => ''
			),	
		Array(
			'name' => esc_html__('Category Features', 'listingpro'),
			'id' => 'lp_category_tags',
			'type' => 'mselect',
			'value' => '',
			'desc' => 'Select one or more features to show this tag in.',
			'std'=> '',
			'options'=>listing_get_feature_array(),
			),
			
	);


/* ============== ListingPro category meta add field ============ */
	
	if (!function_exists('listingpro_category_meta_add')) {
		add_action( 'listing-category_add_form_fields', 'listingpro_category_meta_add' );
		function listingpro_category_meta_add() {
			
			global $category_meta; 
			
					foreach ($category_meta as $meta) {
						 call_user_func('settings_'.$meta['type'], $meta);
						
					}
				
		 }
	}
	/* ============== ListingPro category meta edit ============ */
	
	if (!function_exists('listingpro_category_meta_edit')) {
		add_action( 'listing-category_edit_form_fields', 'listingpro_category_meta_edit' );
		function listingpro_category_meta_edit( $term ) {
		   global $category_meta; 
		
			foreach ($category_meta as $meta) {
				$value  = listingpro_get_term_meta( $term->term_id, $meta['id']);
				$meta['value'] = $value;

				 call_user_func('settings_'.$meta['type'], $meta);
				
			}

		 }
	 }
	/* ============== ListingPro category meta save ============ */
	
	if (!function_exists('listingpro_category_meta_save')) {
		add_action( 'edit_listing-category',   'listingpro_category_meta_save' );
		add_action( 'create_listing-category', 'listingpro_category_meta_save' );
		function listingpro_category_meta_save( $term_id ) {

			global $category_meta;

			$metaboxes = $category_meta;
			if(!empty($metaboxes)) {
				$myMeta = array();

				foreach ($metaboxes as $metabox) {
					if(isset($_POST[$metabox['id']])){
						$old_value  = listingpro_get_term_meta( $term_id,$metabox['id']);
						$new_value = $_POST[$metabox['id']];
						if ( $old_value && '' === $new_value )
						delete_term_meta( $term_id, $_POST[$metabox['id']] );
						else if ( $old_value !== $new_value )
						update_term_meta( $term_id, $metabox['id'], $new_value );
					}
				}

			}
		}
	}
	/* ============== ListingPro category column ============ */
	
	if (!function_exists('listingpro_category_column')) {
		add_filter( 'manage_edit-listing-category_columns', 'listingpro_category_column' );
		function listingpro_category_column( $columns ) {
			global $category_meta;
			 $metaboxes = $category_meta;
			 foreach ($metaboxes as $metabox) {
				 $columns[$metabox['id']] = $metabox['name'];
		   
			 }
			
			return $columns;
		}
	}
	/* ============== ListingPro category column render ============ */
	
	if (!function_exists('listingpro_category_column_manage')) {
		add_filter( 'manage_listing-category_custom_column', 'listingpro_category_column_manage', 10, 3 );
		function listingpro_category_column_manage( $out, $column, $term_id ) {
			global $category_meta;
			$metaboxes = $category_meta;
			 foreach ($metaboxes as $metabox) {
				if ( $metabox['id'] === $column ) {
					$value  = listingpro_get_term_meta( $term_id, $metabox['id']);
					if ( ! $value )
						$value = '';
					if($metabox['type'] == 'file'){
						$out = sprintf( '<img width="80" src="%s" />', esc_attr( $value ) );
					}elseif($metabox['type'] == 'mselect'){
						if (!empty($value)){
							foreach ($value as $val) {
								
								$oute =  get_term_by('id', $val, 'listing-category');
								if(!empty($oute)){
									echo $oute->name.',';
								}
								
							}
						}
					}else{
					$out = sprintf( '<span class="term-meta-text-block" style="" >%s</div>', esc_attr( $value ) );
					}
				}
			   
			 }
			
			return $out;
		}
	}