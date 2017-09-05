<?php						
if( !function_exists('LP_operational_hours_form') ){
	function LP_operational_hours_form($postID,$edit){
		$output = '';
		$MondayOpen = '';
		$MondayClose = '';
		$TusedayOpen = '';
		$TusedayClose = '';
		$WednesdayOpen = '';
		$WednesdayClose = '';
		$ThursdayOpen = '';
		$ThursdayClose = '';
		$FridayOpen = '';
		$FridayClose = '';
		$SaturdayOpen = '';
		$SaturdayClose = '';
		$SundayOpen = '';
		$SundayClose = '';
		
		$MondayEnabled = 'disabled';
		$Mondaychecked = '';
		$TusedayEnabled = 'disabled';
		$Tusedaychecked = '';
		$WednesdayEnabled = 'disabled';
		$Wednesdaychecked = '';
		$ThursdayEnabled = 'disabled';
		$Thursdaychecked = '';
		$FridayEnabled = 'disabled';
		$Fridaychecked = '';
		$SaturdayEnabled = 'disabled';
		$Saturdaychecked = '';
		$SundayEnabled = 'disabled';
		$Sundaychecked = '';
		global $listingpro_options;

		$listingOphText = $listingpro_options['listing_oph_text'];
			$output .='
				
				<div class="form-group clearfix">
					<label for="operationalHours">'.$listingOphText.'</label>
					<div class="day-hours" id="day-hours-BusinessHours">
						<div class="hours-display">';
		if($edit == true && !empty($postID)){
			$buisness_hours = listing_get_metabox_by_ID('business_hours', $postID);
			
			if(!empty($buisness_hours)){	
				foreach($buisness_hours as $key=>$value){
			$output .='		<div class="hours">
			                	<span class="weekday">'.$key.'</span>
			                	<span class="start">'.$value['open'].'</span>
			                	<span>-</span>
			                	<span class="end">'.$value['close'].'</span>
			                	<a class="remove-hours" href="#">Remove</a>
			                	<input name="business_hours['.$key.'][open]" value="'.$value['open'].'" type="hidden">
			                	<input name="business_hours['.$key.'][close]" value="'.$value['close'].'" type="hidden">
			                </div>';
				}
			}
		}else{
		$output .='
				       
			                <div class="hours">
			                	<span class="weekday">'.esc_html__( 'Monday', 'listingpro' ).'</span>
			                	<span class="start">09:00</span>
			                	<span>-</span>
			                	<span class="end">17:00</span>
			                	<a class="remove-hours" href="#">Remove</a>
			                	<input name="business_hours['.esc_html__( 'Monday', 'listingpro' ).'][open]" value="09:00" type="hidden">
			                	<input name="business_hours['.esc_html__( 'Monday', 'listingpro' ).'][close]" value="17:00" type="hidden">
			                </div>
			                <div class="hours">
			                	<span class="weekday">'.esc_html__( 'Tuesday', 'listingpro' ).'</span>
			                	<span class="start">09:00</span>
			                	<span>-</span>
			                	<span class="end">17:00</span>
			                	<a class="remove-hours" href="#">Remove</a>
			                	<input name="business_hours['.esc_html__( 'Tuesday', 'listingpro' ).'][open]" value="09:00" type="hidden">
			                	<input name="business_hours['.esc_html__( 'Tuesday', 'listingpro' ).'][close]" value="17:00" type="hidden">
			                </div>
			                <div class="hours">
			                	<span class="weekday">'.esc_html__( 'Wednesday', 'listingpro' ).'</span>
			                	<span class="start">09:00</span>
			                	<span>-</span>
			                	<span class="end">17:00</span>
			                	<a class="remove-hours" href="#">Remove</a>
			                	<input name="business_hours['.esc_html__( 'Wednesday', 'listingpro' ).'][open]" value="09:00" type="hidden">
			                	<input name="business_hours['.esc_html__( 'Wednesday', 'listingpro' ).'][close]" value="17:00" type="hidden">
			                </div>
			                <div class="hours">
			                	<span class="weekday">'.esc_html__( 'Thursday', 'listingpro' ).'</span>
			                	<span class="start">09:00</span>
			                	<span>-</span>
			                	<span class="end">17:00</span>
			                	<a class="remove-hours" href="#">Remove</a>
			                	<input name="business_hours['.esc_html__( 'Thursday', 'listingpro' ).'][open]" value="09:00" type="hidden">
			                	<input name="business_hours['.esc_html__( 'Thursday', 'listingpro' ).'][close]" value="17:00" type="hidden">
			                </div>
			                <div class="hours">
			                	<span class="weekday">'.esc_html__( 'Friday', 'listingpro' ).'</span>
			                	<span class="start">09:00</span>
			                	<span>-</span>
			                	<span class="end">17:00</span>
			                	<a class="remove-hours" href="#">Remove</a>
			                	<input name="business_hours['.esc_html__( 'Friday', 'listingpro' ).'][open]" value="09:00" type="hidden">
			                	<input name="business_hours['.esc_html__( 'Friday', 'listingpro' ).'][close]" value="17:00" type="hidden">
			                </div>
			            ';
		}
		$output .= '</div>
				        <ul class="hours-select clearfix inline-layout up-4">
				            <li>
				                <select class="weekday select2">
									<option value="'.esc_html__( 'Monday', 'listingpro' ).'">'.esc_html__( 'Monday', 'listingpro' ).'</option>
									<option value="'.esc_html__( 'Tuesday', 'listingpro' ).'">'.esc_html__( 'Tuesday', 'listingpro' ).'</option>
									<option value="'.esc_html__( 'Wednesday', 'listingpro' ).'">'.esc_html__( 'Wednesday', 'listingpro' ).'</option>
									<option value="'.esc_html__( 'Thursday', 'listingpro' ).'">'.esc_html__( 'Thursday', 'listingpro' ).'</option>
									<option value="'.esc_html__( 'Friday', 'listingpro' ).'">'.esc_html__( 'Friday', 'listingpro' ).'</option>
									<option value="'.esc_html__( 'Saturday', 'listingpro' ).'" selected="">'.esc_html__( 'Saturday', 'listingpro' ).'</option>
									<option value="'.esc_html__( 'Sunday', 'listingpro' ).'">'.esc_html__( 'Sunday', 'listingpro' ).'</option>
				                </select>
				            </li>
				            <li>
				                <select class="hours-start select2">
									<option value="24:00">24:00 (midnight)</option>
									<option value="24:30">24:30 </option>
									<option value="01:00">01:00</option>
									<option value="01:30">01:30</option>
									<option value="02:00">02:00</option>
									<option value="02:30">02:30</option>
									<option value="03:00">03:00</option>
									<option value="03:30">03:30</option>
									<option value="04:00">04:00</option>
									<option value="04:30">04:30</option>
									<option value="05:00">05:00</option>
									<option value="05:30">05:30</option>
									<option value="06:00">06:00</option>
									<option value="06:30">06:30</option>
									<option value="07:00">07:00</option>
									<option value="07:30">07:30</option>
									<option value="08:00">08:00</option>
									<option value="08:30">08:30</option>
									<option value="09:00" selected="">09:00</option>
									<option value="09:30">09:30</option>
									<option value="10:00">10:00</option>
									<option value="10:30">10:30</option>
									<option value="11:00">11:00</option>
									<option value="11:30">11:30</option>
									<option value="12:00">12:00(noon)</option>
									<option value="12:30">12:30</option>
									<option value="13:00">13:00</option>
									<option value="13:30">13:30</option>
									<option value="14:00">14:00</option>
									<option value="14:30">14:30</option>
									<option value="15:00">15:00</option>
									<option value="15:30">15:30</option>
									<option value="16:00">16:00</option>
									<option value="16:30">16:30</option>
									<option value="17:00">17:00</option>
									<option value="17:30">17:30</option>
									<option value="18:00">18:00</option>
									<option value="18:30">18:30</option>
									<option value="19:00">19:00</option>
									<option value="19:30">19:30</option>
									<option value="20:00">20:00</option>
									<option value="20:30">20:30</option>
									<option value="21:00">21:00</option>
									<option value="21:30">21:30</option>
									<option value="22:00">22:00</option>
									<option value="22:30">22:30</option>
									<option value="23:00">23:00</option>
									<option value="23:30">23:30</option>
				                </select>
				            </li>
				            <li>
				                <select class="hours-end select2">
									<option value="24:00">24:00 (midnight)</option>
									<option value="24:30">24:30 </option>
									<option value="01:00">01:00</option>
									<option value="01:30">01:30</option>
									<option value="02:00">02:00</option>
									<option value="02:30">02:30</option>
									<option value="03:00">03:00</option>
									<option value="03:30">03:30</option>
									<option value="04:00">04:00</option>
									<option value="04:30">04:30</option>
									<option value="05:00">05:00</option>
									<option value="05:30">05:30</option>
									<option value="06:00">06:00</option>
									<option value="06:30">06:30</option>
									<option value="07:00">07:00</option>
									<option value="07:30">07:30</option>
									<option value="08:00">08:00</option>
									<option value="08:30">08:30</option>
									<option value="09:00">09:00</option>
									<option value="09:30">09:30</option>
									<option value="10:00">10:00</option>
									<option value="10:30">10:30</option>
									<option value="11:00">11:00</option>
									<option value="11:30">11:30</option>
									<option value="12:00">12:00(noon)</option>
									<option value="12:30">12:30</option>
									<option value="13:00">13:00</option>
									<option value="13:30">13:30</option>
									<option value="14:00">14:00</option>
									<option value="14:30">14:30</option>
									<option value="15:00">15:00</option>
									<option value="15:30">15:30</option>
									<option value="16:00">16:00</option>
									<option value="16:30">16:30</option>
									<option value="17:00" selected="">17:00</option>
									<option value="17:30">17:30</option>
									<option value="18:00">18:00</option>
									<option value="18:30">18:30</option>
									<option value="19:00">19:00</option>
									<option value="19:30">19:30</option>
									<option value="20:00">20:00</option>
									<option value="20:30">20:30</option>
									<option value="21:00">21:00</option>
									<option value="21:30">21:30</option>
									<option value="22:00">22:00</option>
									<option value="22:30">22:30</option>
									<option value="23:00">23:00</option>
									<option value="23:30">23:30</option>
				                </select>
				            </li>
							<li>
				                <button type="button" value="submit" class="ybtn ybtn--small add-hours"><span>Add Hours</span></button>
				            </li>
				        </ul>
				    </div>
					

				</div>';
	
		return $output;
	}
}