<div class="open-hours">
	<!-- <h2><?php echo esc_html__('Opening Hours', 'listingpro');?></h2> -->
	<?php
		$buisness_hours = listing_get_metabox('business_hours');
		if(!empty($buisness_hours)){
				$lat = listing_get_metabox('latitude');
				$long = listing_get_metabox('longitude');
			$timezone = getClosestTimezone($lat, $long);
			//$timezone  = +5; //(GMT -5:00) EST (U.S. & Canada) 
			$time = gmdate("H:i", time() + 3600*($timezone+date("I"))); 
			$day =  gmdate("l"); 
			$time = strtotime($time);
			echo '<div class="today-hrs pos-relative"><ul>';
			$dayName = 'Today';
			foreach($buisness_hours as $key=>$value){
				$keyArray[] = $key;
				if($day == $key){
					$open = $value['open'];
					$open = str_replace(' ', '', $open);
					$close = $value['close'];
					$close = str_replace(' ', '', $close);
					$open = strtotime($open);
					$close = strtotime($close);
					$newTimeOpen = date('h:i A', $open);
					$newTimeClose = date('h:i A', $close);
					
					echo '<li class="today-timing clearfix"><strong>'.listingpro_icons('todayTime').' '.$dayName.'</strong>';
						if($time > $open && $time < $close){
							echo '<a class="Opened">'.esc_html__('Open Now~','listingpro').'</a>';
						}else{
							echo '<a class="closed">'.esc_html__('Closed Now!','listingpro').'</a>';
						}								
					echo '<span>'.$newTimeOpen.' - '.$newTimeClose.'</span></li>';
				}
			}
			if(is_array($keyArray) && !in_array($day, $keyArray)){
				echo '<li class="today-timing clearfix"><strong>'.listingpro_icons('todayTime').' '.$dayName.'</strong>';
				echo '<span><a class="closed dayoff">'.esc_html__('Day Off!','listingpro').'</a></span></li>';
			}
			echo '</ul>';
			echo '<a href="#" class="show-all-timings">'.esc_html__('Show all timings','listingpro').'</a>';
			echo '<ul class="hidding-timings">';
			foreach($buisness_hours as $key=>$value){
				$dayName = $key;
				$open = $value['open'];
				$open = str_replace(' ', '', $open);
				$close = $value['close'];
				$close = str_replace(' ', '', $close);
				$open = strtotime($open);
				$close = strtotime($close);
				$newTimeOpen = date('h:i A', $open);
				$newTimeClose = date('h:i A', $close);
				echo '<li><strong>'.$dayName.'</strong>';
				echo '<span>'.$newTimeOpen.' - '.$newTimeClose.'</span></li>';
			}
			echo '</ul>';
			echo '</div>';
		}
	?>
</div>
