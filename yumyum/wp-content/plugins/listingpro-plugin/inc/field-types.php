<?php 
	
	/* ============== ListingPro get child term (tags) ============ */
	
 	if (!function_exists('listingpro_field_type')) {
		
		function listingpro_field_type($fieldIDs){
			$output='';
			if(!empty($fieldIDs)){
				foreach($fieldIDs as $fieldID){
					$typech = listing_get_metabox_by_ID('field-type',$fieldID);
					if(!empty($typech) && $typech == 'checkbox'){				
						$output .= listingpro_field_type_output_checkbox($fieldID);
						
					}		
				}
				$output .= '<div class="clearfix"></div>';
				foreach($fieldIDs as $fieldID){
					$typech = listing_get_metabox_by_ID('field-type',$fieldID);
					if(!empty($typech) && $typech == 'check'){				
						$output .= listingpro_field_type_output_check($fieldID);
						
					}		
				}
				
				$output .= '<div class="clearfix"></div>';
				foreach($fieldIDs as $fieldIDall){
					$typeall = listing_get_metabox_by_ID('field-type',$fieldIDall);
					if(!empty($typeall) && $typeall != 'checkbox' && $typeall != 'check'){				
						$output .= call_user_func('listingpro_field_type_output_'.$typeall, $fieldIDall);
					}		
				}
			}			
			
			return $output;
		}
	} 
	
	/* ============== ListingPro Field (TEXT) ============ */
	
	if (!function_exists('listingpro_field_type_output_text')) {
		
		function listingpro_field_type_output_text($fieldID){
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			if(isset($_GET['lp_post']) && !empty($_GET['lp_post'])){
				$value = listing_get_fields($slug,$_GET['lp_post']);
			}
			$output= null;
			$output = 
				'<div class="col-md-6 col-sm-6 col-xs-12 ">
					<label for="feature_'.$slug.'">'.$title.'</label>
					<input id="field-'.$slug.'" class="form-control" value="'.$value.'" type="text" name="lp_form_fields_inn['.$slug.']">					
				</div>'
			;
			return $output;
		}
	}
	/* ============== ListingPro Field (Normal Checkbox) ============ */
	
	if (!function_exists('listingpro_field_type_output_check')) {
		
		function listingpro_field_type_output_check($fieldID){
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			if(isset($_GET['lp_post']) && !empty($_GET['lp_post'])){
				$value = listing_get_fields($slug,$_GET['lp_post']);
			}
			$output= null;
			$output = 
				'<div class="col-md-2 col-sm-4 col-xs-6">
					<div class="checkbox pad-bottom-10">
						<input value="Yes" '.checked($value, 'Yes', false).' id="check_'.$slug.'" type="checkbox" name="lp_form_fields_inn['.$slug.']">
						<label for="check_'.$slug.'">'.$title.'</label>
					</div>
				</div>';
				
			return $output;
		}
	}
	/* ============== ListingPro Field (Switch) ============ */
	
	if (!function_exists('listingpro_field_type_output_checkbox')) {
		
		function listingpro_field_type_output_checkbox($fieldID){
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			if(isset($_GET['lp_post']) && !empty($_GET['lp_post'])){
				$value = listing_get_fields($slug,$_GET['lp_post']);
			}
			$output= null;
			$output = 
				'<div class="col-md-3 col-sm-3 col-xs-6">
					<label for="feature_'.$slug.'">'.$title.'</label>
					<input value="No" class="form-control switch-checkbox-hidden" type="hidden" name="lp_form_fields_inn['.$slug.']">
					<label class="switch">									
					<input value="Yes" '.checked($value, 'Yes', false).' id="field-'.$slug.'" class="form-control switch-checkbox" type="checkbox" name="lp_form_fields_inn['.$slug.']">										
					 <div class="slider round"></div>
					</label>					
				</div>'
			;
			return $output;
		}
	}
	
	/* ============== ListingPro Field (wysiwyg) ============ */
	
	if (!function_exists('listingpro_field_type_output_wysiwyg')) {
		
		function listingpro_field_type_output_wysiwyg($fieldID){
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			$output= null;
			$output = 
				'<div class="col-md-12 col-sm-12 col-xs-12">
					<label for="feature_'.$slug.'">'.$title.'</label>					 
					 <textarea id="field-'.$slug.'" class="form-control" name="lp_form_fields_inn['.$slug.']" rows="5"></textarea>
				</div>'
			;
			return $output;
		}
	}
	
	/* ============== ListingPro Field (textarea) ============ */
	
	if (!function_exists('listingpro_field_type_output_textarea')) {
		
		function listingpro_field_type_output_textarea($fieldID){
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			if(isset($_GET['lp_post']) && !empty($_GET['lp_post'])){
				$value = listing_get_fields($slug,$_GET['lp_post']);
			}
			$output= null;
			$output = 
				'<div class="col-md-12 col-sm-12 col-xs-12">
					<label for="feature_'.$slug.'">'.$title.'</label>					 
					 <textarea id="field-'.$slug.'" class="form-control" name="lp_form_fields_inn['.$slug.']" rows="5">'.$value.'</textarea>
				</div>'
			;
			return $output;
		}
	}
	
	/* ============== ListingPro Field (text_time) ============ */
	
	if (!function_exists('listingpro_field_type_output_text_time')) {
		
		function listingpro_field_type_output_text_time($fieldID){
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			$output= null;
			$output = 
				'<div class="col-md-6 col-sm-6 col-xs-12">
					<label for="feature_'.$slug.'">'.$title.'</label>
					<input id="field-'.$slug.'" class="form-control" type="text" name="lp_form_fields_inn['.$slug.']">					
				</div>'
			;
			return $output;
		}
	}
	
	/* ============== ListingPro Field (select_timezone) ============ */
	
	if (!function_exists('listingpro_field_type_output_select_timezone')) {
		
		function listingpro_field_type_output_select_timezone($fieldID){
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			$output= null;
			$output = 
				'<div class="col-md-6 col-sm-6 col-xs-12">
					<label for="feature_'.$slug.'">'.$title.'</label>
					<input id="field-'.$slug.'" class="form-control" type="text" name="lp_form_fields_inn['.$slug.']">					
				</div>'
			;
			return $output;
		}
	}
	
	/* ============== ListingPro Field (text_date_timestamp) ============ */
	
	if (!function_exists('listingpro_field_type_output_text_date_timestamp')) {
		
		function listingpro_field_type_output_text_date_timestamp($fieldID){
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			$output= null;
			$output = 
				'<div class="col-md-6 col-sm-6 col-xs-12">
					<label for="feature_'.$slug.'">'.$title.'</label>
					<input id="field-'.$slug.'" class="form-control" type="text" name="lp_form_fields_inn['.$slug.']">					
				</div>'
			;
			return $output;
		}
	}
	
	/* ============== ListingPro Field (text_datetime_timestamp) ============ */
	
	if (!function_exists('listingpro_field_type_output_text_datetime_timestamp')) {
		
		function listingpro_field_type_output_text_datetime_timestamp($fieldID){
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			$output= null;
			$output = 
				'<div class="col-md-6 col-sm-6 col-xs-12">
					<label for="feature_'.$slug.'">'.$title.'</label>
					<input id="field-'.$slug.'" class="form-control" type="text" name="lp_form_fields_inn['.$slug.']">					
				</div>'
			;
			return $output;
		}
	}
	/* ============== ListingPro Field (text_datetime_timestamp_timezone) ============ */
	
	if (!function_exists('listingpro_field_type_output_text_datetime_timestamp_timezone')) {
		
		function listingpro_field_type_output_text_datetime_timestamp_timezone($fieldID){
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			$output= null;
			$output = 
				'<div class="col-md-6 col-sm-6 col-xs-12">
					<label for="feature_'.$slug.'">'.$title.'</label>
					<input id="field-'.$slug.'" class="form-control" type="text" name="lp_form_fields_inn['.$slug.']">					
				</div>'
			;
			return $output;
		}
	}
	
	/* ============== ListingPro Field (color) ============ */
	
	if (!function_exists('listingpro_field_type_output_color')) {
		
		function listingpro_field_type_output_color($fieldID){
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			$output= null;
			$output = 
				'<div class="col-md-6 col-sm-6 col-xs-12">
					<label for="feature_'.$slug.'">'.$title.'</label>
					<input id="field-'.$slug.'" class="form-control" type="text" name="lp_form_fields_inn['.$slug.']">					
				</div>'
			;
			return $output;
		}
	}
	
	/* ============== ListingPro Field (checkboxes) ============ */
	
	if (!function_exists('listingpro_field_type_output_checkboxes')) {
		
		function listingpro_field_type_output_checkboxes($fieldID){
			$output= null;
			$values = '';
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			if(isset($_GET['lp_post']) && !empty($_GET['lp_post'])){
				$values = listing_get_fields($slug,$_GET['lp_post']);
			}
			$options = listing_get_metabox_by_ID('multicheck-options',$fieldID);
			
			$options = explode( ',', $options ) ;
			$output .= 
				'<div class="col-md-12 col-sm-12 col-xs-12">
					<label for="feature_'.$slug.'">'.$title.'</label>'
					;
			foreach($options as $option){
				if (!empty($values) && in_array($option, $values)) {
					$cheched =  "checked";
				}else{
					$cheched = '';
				} 
				$output .= '<div class="radio-inline"><input '.$cheched.' id="field-'.$slug.'" class="" type="checkbox" name="lp_form_fields_inn['.$slug.'][]" value="'.$option.'"><span style="margin-right:20px;"><strong>' . $option . '</strong></span></div>';
			}
			$output .= 
				'</div>'
			; 
			return $output;
		}
	}
	
	
	/* ============== ListingPro Field (checkboxes) ============ */
	
	if (!function_exists('listingpro_field_type_output_radio')) {
		
		function listingpro_field_type_output_radio($fieldID){
			$output= null;
			$values='';
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			if(isset($_GET['lp_post']) && !empty($_GET['lp_post'])){
				$values = listing_get_fields($slug,$_GET['lp_post']);
			}
			$options2 = listing_get_metabox_by_ID('radio-options',$fieldID);
			
			$options2 = explode( ',', $options2 ) ;
			$output .= 
				'<div class="col-md-12 col-sm-12 col-xs-12">
					<label for="feature_'.$slug.'">'.$title.'</label>'
					;
			foreach($options2 as $option){
			
				$output .= '<div class="radio-inline"><input '.checked($values, $option, false).' style="vertical-align: middle;" id="field-'.$slug.'" class="" type="radio" name="lp_form_fields_inn['.$slug.']" value="'.$option.'"><span style="margin-right:20px; vertical-align: middle"><strong>' . $option . '</strong></span></div>';
			}
			$output .= 
				'</div>'
			; 
			return $output;
		}
	}
	
	
	/* ============== ListingPro Field (select) ============ */
	
	if (!function_exists('listingpro_field_type_output_select')) {
		
		function listingpro_field_type_output_select($fieldID){
			$output= null;
			$values= null;
			$postar = get_post($fieldID); 
			$slug = $postar->post_name;
			$title = get_the_title($fieldID);
			$options = listing_get_metabox_by_ID('select-options',$fieldID);
			if(isset($_GET['lp_post']) && !empty($_GET['lp_post'])){
				$values = listing_get_fields($slug,$_GET['lp_post']);
			}
			$options = explode( ',', $options ) ;
			$output .= 
				'<div class="col-md-6 col-sm-6 col-xs-12">
					<label for="feature_'.$slug.'">'.$title.'</label>
					<select  id="field-'.$slug.'" class="form-control" name="lp_form_fields_inn['.$slug.']">
					';
			$output .= '<option value="">Select Option</option>';
			foreach($options as $option){
				if ($option == $values) {
					$selected =  "selected";
				}else{
					$selected = '';
				} 
				$output .= '<option '.$selected.' value="'.$option.'">'.$option.'</option>';
			}
			$output .= 
				'</select>
				</div>
				'
			; 
			return $output;
		}
	}
