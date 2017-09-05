<?php
/**
 *	Shortcodes
 */
class PremioThemes_Shortcodes {

	// Shortcode: [minigo-logo]
	public function minigo_logo_shortcode() {
		global $pt_minigo;

		if( empty( $pt_minigo['logo']['url'] ) ) {
			return '';
		}

	    $html = '<div class="grid logo-holder">'."\n";
	        $html .= '<div class="grid__item one-whole push--bottom">'."\n";
		        $html .= '<img src="'.$pt_minigo['logo']['url'].'" alt="'.htmlspecialchars($pt_minigo['site-title']).'" width="'.$pt_minigo['logo-width'].'" height="'.$pt_minigo['logo-height'].'">'."\n";
	        $html .= '</div>'."\n";
	    $html .= '</div>'."\n";

		return $html;
	}

	// Shortcode: [minigo-title title="Your title" subtitle="Your subtitle" style="the-style"]
	public function minigo_title_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array( 'title' => '', 'subtitle' => '', 'style' => '' ), $atts ) );
	    $html = '<div class="grid title-holder">'."\n";
	        $html .= '<div class="grid__item one-whole push--bottom">'."\n";
				$html .= '<div class="minigo-title ' . $style . '">'."\n".'<h1>'. $title .'</h1>'."\n";
				if ($subtitle != '') { $html .= '<h3>'. $subtitle .'</h3>'."\n"; }
				$html .= '</div>'."\n";
			$html .= '</div>'."\n";
		$html .= '</div>'."\n";
		return $html;
	}

	// Shortcode: [minigo-divider size="1px" top="30px" bottom="30px" style="the-style"]
	public function minigo_divider_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array( 'size' => '', 'top' => '', 'bottom' => '', 'style' => '', 'opacity' => '' ), $atts ) );
		$html = '<hr class="minigo-divider ' . $style . '" data-size="'.$size.'" data-spacetop="'.$top.'" data-spacebottom="'.$bottom.'" data-opacity="'.$opacity.'">'."\n";
		return $html;
	}

	// Shortcode: [minigo-button text="Text" url="#" class="the-class" target="_blank" style="the-style"]
	public function minigo_button_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array( 'text' => '', 'url' => '', 'class' => '', 'target' => '', 'style' => '' ), $atts ) );
	    $html = '<div class="grid button-holder">'."\n";
	        $html .= '<div class="grid__item one-whole push--bottom">'."\n";
				$html .= '<a href="' . $url . '" class="btn '. $style .' '. $class . '" target="'. $target .'">' . $text . '</a>'."\n";
			$html .= '</div>'."\n";
		$html .= '</div>'."\n";
		return $html;
	}

	// Shortcode: [minigo-icon-menu]
	public function minigo_icon_menu_shortcode() {
		global $pt_minigo;

		// $newn = new ReduxFramework_icon_menu();

		// print_r($newn);

		if( empty( $pt_minigo['icon_menu'] ) || count( $pt_minigo['icon_menu'] ) < 1 ) {
			return;
		}

		$icon_menu = array_values( $pt_minigo['icon_menu'] );

		if( empty( $pt_minigo['icon_menu'][0]['title'] ) ) {
			return;
		}

	    $html = '<div class="grid icon-menu-holder">'."\n";
	        $html .= '<div class="grid__item one-whole push--bottom">'."\n";
				$html .= '<div class="icon-menu">'."\n";

			// var_dump($icon_menu);
			for ( $i=0, $cnt = count( $icon_menu ); $i < $cnt; $i++ ) {
				$item = $icon_menu[$i];
				// $iconColor = $item["color"];
				// $iconColorHover = $item["color-hover"];
				// $backgroundColor = $item["background"];
				// $backgroundColorHover = $item["background-hover"];
				// $borderColor = $item["border-color"];
				// $borderColorHover = $item["border-color-hover"];
				// $hasStyles = ($iconColor || $iconColorHover || $backgroundColor || $backgroundColorHover || $borderColor );
				// $linkStyle = 'style="{background-color: '.htmlspecialchars($backgroundColor).'; border-color:'.htmlspecialchars($borderColor).';} :hover {background-color: '.htmlspecialchars($backgroundColorHover).'; border-color:'.htmlspecialchars($borderColorHover).';}"';
				// $linkStyle = 'style="background-color: '.htmlspecialchars($backgroundColor).'; border-color:'.htmlspecialchars($borderColor).';"';
				// $iconStyle = 'style="color: '.htmlspecialchars($iconColor).';"';
				// $linkStyle = 'style="background-color: '.htmlspecialchars($backgroundColor).'; border-color:'.htmlspecialchars($borderColor).';"';
				// $iconStyle = 'style="color: '.htmlspecialchars($iconColor).';"';

				// var_dump($hasStyles);
				
				// $html .= '<a href="'. $item['url'] .'" '.(!empty($item['new_window']) ? 'target="_blank"' : '') .' title="'. htmlspecialchars( $item['title'] ) .'"><i class="fa '. $item['select'] .'"></i></a>';
				// $html .= '<a href="'. $item['url'] .'" '.(!empty($item['new-window']) ? 'target="_blank"' : '') .' title="'. htmlspecialchars( $item['title'] ) .'"'. $linkStyle.'>'."\n";
				// 	$html .= '<i class="fa '. $item['select'] .'"'. $iconStyle.'></i>'."\n";
				// $html .= '</a>'."\n";
				$html .= '<a href="'. $item['url'] .'" '.(!empty($item['new-window']) ? 'target="_blank"' : '') .' title="'. htmlspecialchars( $item['title'] ) .'">'."\n";
					$html .= '<i class="fa '. $item['select'] .'"></i>'."\n";
				$html .= '</a>'."\n";
			}

				$html .= '</div>'."\n";
			$html .= '</div>'."\n";
		$html .= '</div>'."\n";

		return $html;
	}

	// Shortcode: [minigo-countdown]
	public function minigo_countdown_shortcode() {
		global $pt_minigo;

		if( !$pt_minigo['countdown-enabled'] ) {
			return;
		}

		if( $pt_minigo['switch-charts'] == 1 ) {
	        $chartColor = 'data-chart-bar="'. $pt_minigo['chart-track-color']['rgba'] .'"';
	        $chartWidth = 'data-chart-width="'. $pt_minigo['chart-line-width']['width'] .'"';
	        $chartBar = 'data-chart-color="'. $pt_minigo['chart-bar-color']['rgba'] .'"';
	    }
	    else {
	        $chartWidth = '';
	        $chartColor = '';
	        $chartBar = '';
	    }

	    $html = '<div class="grid countdown-holder">'."\n";
		    $html .= '<div class="grid__item one-whole">'."\n";
	            $html .= '<div class="clock " '. $chartColor . ' '. $chartWidth . ' '. $chartBar .' data-labels="'.htmlspecialchars($pt_minigo['countdown-labels']).'">'."\n".'</div>'."\n";
            $html .= '</div>'."\n";
        $html .= '</div>'."\n";

		return $html;
	}

	// Shortcode: [minigo-subscribe-form]
	public function minigo_subscribe_form_shortcode() {
		global $pt_minigo;

		$html = '<div class="grid subscribe-form-holder">'."\n";
	        $html .= '<div class="grid__item one-whole">'."\n";
	            $html .= '<div class="form-flip">'."\n";
					$html .= '<button class="form-flip__enabler btn btn--full">'.$pt_minigo['subscribe-form-title'].'</button>'."\n";
                    $html .= '<div class="form-flip__target">';
		                $html .= '<form class="form-ajax" data-success-response="success" action="" method="post">'."\n";
	                        $html .= '<div class="input-group">'."\n";
						        $html .= '<input class="text-input" name="email" type="email" placeholder="'.htmlspecialchars($pt_minigo['subscribe-form-email-label']).'" data-msg-required="'.htmlspecialchars($pt_minigo['form-validation-required']).'" data-msg-email="'.htmlspecialchars($pt_minigo['form-validation-email']).'" required>'."\n";
	                            $html .= '<div class="input-group-addon">'."\n";
							        $html .= '<button class="btn btn--font-black" type="submit" autocomplete="off"><span>'.$pt_minigo['subscribe-form-button-label'].'</span><i class="form-spinner fa fa-spinner"></i></button>'."\n";
                                $html .= '</div>'."\n";
                            $html .= '</div>'."\n";
	                        $html .= '<input type="hidden" name="minigo_subscribe">'."\n";
                            $html .= '<input type="text" name="important-info">'."\n";
                            $html .= wp_nonce_field( 'minigo-subscribe', '_wpnonce', true, false);
                        $html .= "\n".'</form>'."\n";
                    $html .= '</div>'."\n";
				$html .= '<button class="form-flip__close btn btn--full">'.$pt_minigo['subscribe-form-success-message'].'</button>'."\n";
	            $html .= '</div>'."\n";
	        $html .= '</div>'."\n";
        $html .= '</div>'."\n";

		return $html;
	}

	// Shortcode: [minigo-contact-info]
	public function minigo_contact_info_shortcode() {
		global $pt_minigo;

		if(empty($pt_minigo['contact_info']) || count($pt_minigo['contact_info']) < 1) { return; }
		    $contact_info = array_values($pt_minigo['contact_info']);
		    // if(empty($pt_minigo['contact_info'][0]['title'])) { return; }
		    // var_dump($contact_info);
		    $html = '<div class="grid contact-info-holder">'."\n";

			    // Add Heading if exists
	    	    if($pt_minigo['contact-info-heading']){ 
		        $contactInfoHeading = '<h2>'. htmlspecialchars($pt_minigo['contact-info-heading']) .'</h2>'."\n";
			    $html.= $contactInfoHeading;
			    }

			    $html .= '<div class="grid__item one-whole">'."\n";

			    // var_dump($contact_info);
			    for ($i=0, $cnt = count($contact_info); $i < $cnt; $i++) {
			        $item = $contact_info[$i];
			        if(!empty($item['force_row']) && $i !== 0) {
	            $html .= '</div>'."\n";
			    $html .= '<div class="grid__item one-whole push-half--top">'."\n";
			        }

			        $html .= '<div class="contact-info"><i class="fa '.$item['select'].'"></i>'.(!empty($item['url']) ? '<a href="'.$item['url'].'">' : '').$item['title'].(!empty($item['url']) ? '</a>' : '').'</div>'."\n";
			        if(!empty($item['force_row']) && $i == 0 && $cnt > 1) {
	            $html .= '</div>'."\n";
				$html .= '<div class="grid__item one-whole push-half--top">'."\n";
			        }
		    }
			    $html .= '</div>'."\n";
		    $html .= '</div>'."\n";

		return $html;
	}

	// Shortcode: [minigo-contact-form]
	public function minigo_contact_form_shortcode() {
		global $pt_minigo;

	    $html = '<form id="contactForm" data-msg-success="'.htmlspecialchars($pt_minigo['contact-form-success-message']).'" class="form-ajax" data-success-response="success" action="" method="post">'."\n";
		    $html.= '<div class="grid contact-form-holder">'."\n";
	            $html.= '<div class="grid__item one-half palm-one-whole push--top">'."\n";
				    $html.= '<input class="text-input" name="name" type="text" placeholder="'.htmlspecialchars($pt_minigo['contact-form-name-label']).'" data-msg-required="'.htmlspecialchars($pt_minigo['form-validation-required']).'" required>'."\n";
                $html.= '</div>'."\n";
                $html.= '<div class="grid__item one-half palm-one-whole push--top">'."\n";
				    $html.= '<input class="text-input" name="email" type="email" placeholder="'.htmlspecialchars($pt_minigo['contact-form-email-label']).'" data-msg-required="'.htmlspecialchars($pt_minigo['form-validation-required']).'" data-msg-email="'.htmlspecialchars($pt_minigo['form-validation-email']).'" required>'."\n";
                $html.= '</div>'."\n";
                $html.= '<div class="grid__item one-whole push--top">'."\n";
					$html.= '<textarea rows="6" name="message" placeholder="'.htmlspecialchars($pt_minigo['contact-form-message-label']).'" data-msg-required="'.htmlspecialchars($pt_minigo['form-validation-required']).'" required></textarea>'."\n";
                $html.= '</div>'."\n";
                $html.= '<div class="grid__item one-whole push--top">'."\n";
					$html.= '<button class="btn btn--font-bold" type="submit" autocomplete="off"><span>'.$pt_minigo['contact-form-button-label'].'</span><i class="form-spinner fa fa-spinner"></i></button>'."\n";
                $html.= '</div>'."\n";
            $html.= '</div>'."\n";
            $html.= '<input type="hidden" name="minigo_contact">'."\n";
            $html.= '<input type="text" name="important-info">'."\n";
            $html.= wp_nonce_field( 'minigo-contact', '_wpnonce', true, false);
        $html.= "\n".'</form>'."\n";

		return $html;
	}

	// Shortcode: [minigo-progress-bars]
	public function minigo_progress_bars_shortcode() {
		global $pt_minigo;

		if(empty($pt_minigo['progress_bars']) || count($pt_minigo['progress_bars']) < 1 || empty($pt_minigo['progress_bars'][0]['title'])) {
		    return;
		}

	    $progress_bar = array_values($pt_minigo['progress_bars']);
	    $columns = $pt_minigo['progress-bars-columns'];
		$utils = new PremioThemes_Utility();

		// var_dump($columns);
	    $html = '<div class="grid progress-bars-holder">'."\n";

	    if($pt_minigo['progress_heading']){ 
	        $progressHeading = '<h2>'. htmlspecialchars($pt_minigo['progress_heading']) .'</h2>'."\n";
		    $html.= $progressHeading;
	    }

	    for ($i=0, $cnt = count($progress_bar); $i < $cnt; $i++) {
	        $item = $progress_bar[$i];
			$html .= '<div class="grid__item '.$utils->grid_col($columns).' push--bottom progress-bar-item">'."\n";
		        $html.= '<div class="progress-bar-wrapper">'."\n";
			        $html.= '<h5 class="pull-left progress-bar-heading">'.htmlspecialchars($item['title']).'</h5>'."\n";
			        $html.= '<h5 class="pull-right progress-bar-value">'.htmlspecialchars($item['value']).'</h5>'."\n";
		            $html.= '<div class="progress-bars-progress" style="background-color: '.htmlspecialchars($item['background']).'; border-color:'.htmlspecialchars($item['border-color']).';">'."\n";
			            $html.= '<div class="progress-bar" style="width: '.htmlspecialchars($item['progress']).'%; background: '.htmlspecialchars($item['bar-color']).';">'."\n";
					    $html.= '</div>'."\n";
				    $html.= '</div>'."\n";
			    $html.= '</div>'."\n";
		    $html.= '</div>'."\n";
	        $iplus = $i + 1;
	        if (($iplus % $columns) == 0 && ($iplus != $cnt)) {
	        	$html.='</div>'."\n".'<div class="grid progress-bars-holder">'."\n";
	        }
	    }
	    $html.= '</div>'."\n";
	    return $html;

	}

	// Shortcode: [minigo-icon-features]
	public function minigo_icon_features_shortcode() {
		global $pt_minigo;

		if(empty($pt_minigo['icon_features']) || count($pt_minigo['icon_features']) < 1 || empty($pt_minigo['icon_features'][0]['title'])) {
		    return;
		}

	    $features = array_values($pt_minigo['icon_features']);
	    $columns = $pt_minigo['icon-features-columns'];
		$utils = new PremioThemes_Utility();

	    $html = '<div class="grid icon-features-holder">'."\n";

	    if($pt_minigo['icon-features-heading']){ 
	        $featuresHeading = '<h2>'. htmlspecialchars($pt_minigo['icon-features-heading']) .'</h2>'."\n";
		    $html.= $featuresHeading;
	    }

	    for ($i=0, $cnt = count($features); $i < $cnt; $i++) {
	        $item = $features[$i];
			$html .= '<div class="grid__item '.$utils->grid_col($columns).' push--bottom feature-item">'."\n";
		        $html.= '<div class="feature-wrapper">'."\n";
				    $html.= '<i class="fa '.$item['select'].' feature-icon"></i>'."\n";
				    $html.= '<h3 class="feature-title">'.htmlspecialchars($item['title']).'</h3>'."\n";
				    // $html.= '<p class="feature-text">'.htmlspecialchars($item['text']).'</p>'."\n";
				    $html.= '<p class="feature-text">'.$item['text'].'</p>'."\n";
			    $html.= '</div>'."\n";
		    $html.= '</div>'."\n";
	        $iplus = $i + 1;
	        if (($iplus % $columns) == 0 && ($iplus != $cnt)) {
	        	$html.='</div>'."\n".'<div class="grid icon-features-holder">'."\n";
	        }
	    }
	    $html.= '</div>'."\n";
	    return $html;
	}

	// Shortcode: [minigo-counter-features]
	public function minigo_counter_features_shortcode() {
		global $pt_minigo;

		if(empty($pt_minigo['counter_features']) || count($pt_minigo['counter_features']) < 1 || empty($pt_minigo['counter_features'][0]['title'])) {
		    return;
		}

	    $features = array_values($pt_minigo['counter_features']);
	    $columns = $pt_minigo['counter-features-columns'];
		$utils = new PremioThemes_Utility();

	    $html = '<div class="grid counter-features-holder">'."\n";

	    if($pt_minigo['counter-features-heading']){ 
	        $featuresHeading = '<h2>'. htmlspecialchars($pt_minigo['counter-features-heading']) .'</h2>'."\n";
		    $html.= $featuresHeading;
	    }

	    for ($i=0, $cnt = count($features); $i < $cnt; $i++) {
	        $item = $features[$i];
			$html .= '<div class="grid__item '.$utils->grid_col($columns).' push--bottom counter-feature-item">'."\n";
		        $html.= '<div class="counter-feature-wrapper">'."\n";
					$html.='<div class="counter-features-number" data-percentage="'. $item['counter'] .'">'.$item['counter'].'</div>';
				    $html.= '<i class="fa '.$item['select'].' counter-feature-icon"></i>'."\n";
				    $html.= '<h3 class="counter-feature-title">'.htmlspecialchars($item['title']).'</h3>'."\n";
				    $html.= '<p class="counter-feature-text">'.$item['text'].'</p>'."\n";
			    $html.= '</div>'."\n";
		    $html.= '</div>'."\n";
	        $iplus = $i + 1;
	        if (($iplus % $columns) == 0 && ($iplus != $cnt)) {
	        	$html.='</div>'."\n".'<div class="grid counter-features-holder">'."\n";
	        }
	    }
	    $html.= '</div>'."\n";
	    return $html;
	}

	// Shortcode: [minigo-icon-list]
	public function minigo_icon_list_shortcode() {
		global $pt_minigo;

		if(empty($pt_minigo['icon_list']) || count($pt_minigo['icon_list']) < 1 || empty($pt_minigo['icon_list'][0]['title'])) {
		    return;
		}

	    $list = array_values($pt_minigo['icon_list']);
	    $columns = $pt_minigo['icon-list-columns'];
		$utils = new PremioThemes_Utility();

	    $html = '<div class="grid icon-list-holder">'."\n";

	    if($pt_minigo['icon-list-heading']){ 
	        $listHeading = '<h2>'. htmlspecialchars($pt_minigo['icon-list-heading']) .'</h2>'."\n";
		    $html.= $listHeading;
	    }

	    for ($i=0, $cnt = count($list); $i < $cnt; $i++) {
	        $item = $list[$i];
			$html .= '<div class="grid__item '.$utils->grid_col($columns).' push--bottom list-item">'."\n";
		        $html.= '<div class="list-wrapper">'."\n";
				    $html.= '<i class="fa '.$item['select'].' list-icon"></i>'."\n";
				    // $html.= '<span class="list-title">'.htmlspecialchars($item['title']).'</span>'."\n";
				    $html.= '<p class="list-title">'. $item['title'] .'</p>'."\n";
			    $html.= '</div>'."\n";
		    $html.= '</div>'."\n";
	        $iplus = $i + 1;
	        if (($iplus % $columns) == 0 && ($iplus != $cnt)) {
	        	$html.='</div>'."\n".'<div class="grid icon-list-holder">'."\n";
	        }
	    }
	    $html.= '</div>'."\n";
	    return $html;
	}


	// Shortcode: [minigo-map]
	public function minigo_map_shortcode() {
	    global $pt_minigo;

		if($pt_minigo['map-switcher'] == '0') {
		    return;
		}

	    $html = '<div class="grid map-holder">'."\n";
		    $html.= '<div class="grid__item one-whole push--bottom">'."\n";

	    if($pt_minigo['map_heading']){ 
	        $mapHeading = '<h2>'. htmlspecialchars($pt_minigo['map_heading']) .'</h2>'."\n";
		    $html .= $mapHeading;
	    }
				$html.='<div class="map-container">'."\n";
					$html.='<div id="googleMap">'."\n";
					$html .= '</div>'."\n";
			    $html .= '</div>'."\n";
		    $html .= '</div>'."\n";
	    $html .= '</div>'."\n";

	    return $html;

	}

	// Shortcode: [minigo-addthis]
	public function minigo_addthis_shortcode() {
	    global $pt_minigo;

		if($pt_minigo['addthis-switcher'] == '0') {
		    return;
		}

	    $html = '<div class="grid addthis-widget-holder">'."\n";
		    $html.= '<div class="grid__item one-whole push--bottom">'."\n";

	    if($pt_minigo['addthis-heading']){ 
	        $addthisHeading = '<h2>'. htmlspecialchars($pt_minigo['addthis-heading']) .'</h2>'."\n";
		    $html .= $addthisHeading;
	    }
				$html.='<div class="addthis-container">'."\n";
					$html .= $pt_minigo['addthis-code']."\n";
			    $html .= '</div>'."\n";
		    $html .= '</div>'."\n";
	    $html .= '</div>'."\n";

	    return $html;

	}

	// Shortcode: [minigo-shop]
	public function minigo_shop_shortcode() {
	    global $pt_minigo;

		if($pt_minigo['shop-switcher'] == '0') {
		    return;
		}

	    $html = '<div class="grid shop-holder">'."\n";
		    $html.= '<div class="grid__item one-whole push--bottom">'."\n";

	    if($pt_minigo['shop-heading']){ 
	        $shopHeading = '<h2>'. htmlspecialchars($pt_minigo['shop-heading']) .'</h2>'."\n";
		    $html .= $shopHeading;
	    }
				$html.='<div class="shop-container">'."\n";
					$html .= $pt_minigo['shop-code']."\n";
			    $html .= '</div>'."\n";
		    $html .= '</div>'."\n";
	    $html .= '</div>'."\n";

	    return $html;

	}

	// Shortcode: [minigo-video title="Title"]<Video Code>[/minigo-video]
	public function minigo_video_shortcode( $atts, $content) {

		extract( shortcode_atts( array( 'title' => ''), $atts ) );

		if(empty($content)) {
		    return;
		}

		if ($title) {
		    $videoHeading = '<h2>' . $title . '</h2>'."\n";
	    } else {
		    $videoHeading = '';
	    }

	    $html = '<div class="grid video-holder">'."\n";
	        $html.= $videoHeading;
	        $html .= '<div class="grid__item one-whole video-player">'."\n";
				$html .= $content;
			$html .= '</div>'."\n";
		$html .= '</div>'."\n";
		return $html;
	}


	// Shortcode: [minigo-team]
	public function minigo_team_shortcode() {
	    global $pt_minigo;
	    global $minigo_url;

	     if(empty($pt_minigo['team_profiles']) || count($pt_minigo['team_profiles']) < 1) {
	        return;
	    }

	    $profiles = array_values($pt_minigo['team_profiles']);
	    $columns = $pt_minigo['team-columns'];
		$utils = new PremioThemes_Utility();

	    $html = '<div class="grid team-holder">'."\n";

	    if($pt_minigo['team-heading']){ 
	        $teamHeading = '<h2>'. htmlspecialchars($pt_minigo['team-heading']) .'</h2>'."\n";
		    $html.= $teamHeading;
	    }

	    for ($i=0, $cnt = count($profiles); $i < $cnt; $i++) {
	        $item = $profiles[$i];
	        $links = array_slice($item, -22); // extract from main array to separate icons only.
	        $avatar = empty($item['image']) ?  htmlspecialchars($minigo_url . 'template/images/content/profiles/profile-empty.jpg') : htmlspecialchars($item['image']);  // If no image is set, use the default avatar image

	        $html .= '<div class="grid__item '.$utils->grid_col($columns).' push--bottom">'."\n";
		        $html .= '<div class="avatar-holder">'."\n";
			        $html .= '<img class="profile-img" src="'. $avatar .'" alt="'.htmlspecialchars($item['first_name']).' '.htmlspecialchars($item['last_name']).'">'."\n";
		        $html .= '</div>'."\n";
		        $html .= '<h2>'.htmlspecialchars($item['first_name']).' '.htmlspecialchars($item['last_name']).'</h2>'."\n";
		        $html .= '<strong>'.htmlspecialchars($item['job_title']).'</strong>'."\n";
			    $html .= '<div class="team-links">'."\n";

	            foreach ($links as $link_icon => $link_url)  {
		            if($link_url != ''){
		                $html .= '<a href="'.$link_url .'">'.'<i class="fa '.$link_icon .'"></i>'.'</a>'."\n";;
		            }
	            }
		        $html .= '</div>'."\n";
	        $html .= '</div>'."\n";

	        $iplus = $i + 1;
	        if (($iplus % $columns) == 0 && ($iplus != $cnt)) {
	        	$html.='</div>'."\n".'<div class="grid team-holder">'."\n";
	        }
	    }
	    $html .= '</div>'."\n";
	    return $html;
	}

	// Shortcode: [minigo-gallery]
	public static function minigo_gallery_shortcode() {
		global $pt_minigo;
		$rows = $pt_minigo['gallery-rows'];
		$thumbSize = $pt_minigo['gallery-thumbnails'];

		if($thumbSize == 'default') {
			$thumbSize = 'medium';
		}

		// 
		// WP sizes: 'thumbnail', 'medium', 'medium_large', 'large', 'post-thumbnail'
		// 

		if( !empty( $pt_minigo['photo-gallery'] ) ) {
			$minigo_gallery = $pt_minigo['photo-gallery'];
		} else {
			$minigo_gallery = '';
			// $html = '<p class="minigo-notice">This is a demo gallery, please add some images in the admin area to display your own :)</p>';
			$html = '';
			$util = new PremioThemes_Utility();
			$html.= $util->demo_gallery($rows);
			return $html;
		}

		$folioAttachments = get_posts( array(
			'post_type'			=> 'attachment',
			'orderby'			=> 'post__in',
			'posts_per_page'	=> -1,
			'post__in'			=> explode( ',', $minigo_gallery )
		) );

		if( $folioAttachments ) {
			$html = '<div class="grid gallery-holder">'."\n";
		        $html.= '<div class="grid__item one-whole push--bottom">'."\n";
		            $html.= '<div class="minigo-gallery" style="max-width: 100%;" itemscope itemtype="http://schema.org/ImageGallery">'."\n";
		                foreach( $folioAttachments as $getImages ) {
		                    $thumbsUrl = wp_get_attachment_url( $getImages->ID );
		                    $sizes = wp_get_attachment_metadata($getImages->ID);

		                    $filename = basename ( get_attached_file( $getImages->ID ) );
		                    $minimized = str_replace($filename, $sizes['sizes'][$thumbSize]['file'], $thumbsUrl);

		                    if ( $rows == 1) {$html .= '<div>'."\n";}
		                    $html .= '<figure itemprop="associatedMedia" itemscope urlitemtype="http://schema.org/ImageObject">'."\n";
			                    $html .= '<a class="slick-holder" title="'. $getImages->post_excerpt .'" href="'. $thumbsUrl .'" itemprop="contentUrl" data-size="'. $sizes['width'] .'x'. $sizes['height'] .'"><img src="'. $minimized .'" width="'. $sizes['sizes'][$thumbSize]['width'] .'" height="'. $sizes['sizes'][$thumbSize]['height'] .'" itemprop="thumbnail" alt="'. $getImages->post_excerpt .'" itemprop="thumbnail"></a>'."\n";
		                    $html .= '</figure>';
		                    if ( $rows == 1) {$html .= '</div>'."\n";}
		            }
		            $html .="</div>"."\n";
	            $html.= '</div>'."\n";
            $html.= '</div>'."\n";
            return $html;
        }

	}

	// Shortcode: [minigo-testimonials]
	public static function minigo_testimonials_shortcode() {
		global $pt_minigo;
		global $minigo_url;

		if(empty($pt_minigo['testimonials']) || count($pt_minigo['testimonials']) < 1 || empty($pt_minigo['testimonials'][0]['quote'])) {
		    return;
		}

	    $testimonials = array_values($pt_minigo['testimonials']);
	    $html = '<div class="grid testimonials-holder">'."\n";

	    if($pt_minigo['testimonials-heading']){ 
	        $testimonialsHeading = '<h2>'. htmlspecialchars($pt_minigo['testimonials-heading']) .'</h2>'."\n";
		    $html.= $testimonialsHeading;
	    }

		    $html.= '<div class="testimonials-container">'."\n";

		    for ($i=0, $cnt = count($testimonials); $i < $cnt; $i++) {
		        $item = $testimonials[$i];
		        $avatar = empty($item['image']) ?  htmlspecialchars($minigo_url . 'template/images/content/profiles/profile-empty.jpg') : htmlspecialchars($item['image']);  // If no image is set, use the default avatar image
		        $html.= '<blockquote class="testimonial-wrapper">'."\n";
				    $html.= '<i class="fa ' . $item['select'] .' testimonial-icon"></i>'."\n";
				    $html.= '<p class="testimonial-quote">'. $item['quote'].'</p>'."\n";
				    if (!empty($item['url'])) {
				    $window = $item["new_window"] == "1" ? "_blank" : "_self";
				    $html.= '<a href="'.$item['url'].'" target="' . $window . '">'."\n";
					}
					    if ($pt_minigo['testimonials-show-images']) {$html.= '<img class="testimonial-image" src="'. $avatar.'">'. "\n";}
					    $html.= '<cite class="testimonial-name">'. $item['name'].'</cite>'. "\n";
					    $html.= '<span class="testimonial-position">' . $item['position'] . '</span>'."\n";
				    if (!empty($item['url'])) {$html.= '</a>'."\n";}
			    $html.= '</blockquote>'."\n";
		    }
		    $html.= '</div>'."\n";
	    $html.= '</div>'."\n";
	    return $html;
	}


	// Row Shortcode for Grid: [PT_row]...[/PT_row]
	public function minigo_row_shortcode( $atts, $content = null ) {
	    $content = '<div class="grid minigo-grid">'.$content.'</div>'."\n";
	    return wpautop(do_shortcode($content), true);   
	}

	// Column Shortcode for Grid: [PT_column size="the-size"][/PT_column]
	public function minigo_column_shortcode( $atts, $content = null ) {
	    extract( shortcode_atts( array(
	        'size' => '',
	    ), $atts ) );
    
	    $content = '<div class="grid__item '.$size.' palm-one-whole">'.$content.'</div>'."\n";
	    return do_shortcode($content);
	}

	// Construct function
	public function __construct() {
		add_shortcode( 'minigo-logo', array( $this, 'minigo_logo_shortcode' ) );
		add_shortcode( 'minigo-title', array( $this, 'minigo_title_shortcode' ) );
		add_shortcode( 'minigo-divider', array( $this, 'minigo_divider_shortcode' ) );
		add_shortcode( 'minigo-button', array( $this, 'minigo_button_shortcode' ) );
		add_shortcode( 'minigo-icon-menu', array( $this, 'minigo_icon_menu_shortcode' ) );
		add_shortcode( 'minigo-icon-features', array( $this, 'minigo_icon_features_shortcode' ) );
		add_shortcode( 'minigo-counter-features', array( $this, 'minigo_counter_features_shortcode' ) );
		add_shortcode( 'minigo-icon-list', array( $this, 'minigo_icon_list_shortcode' ) );
		add_shortcode( 'minigo-countdown', array( $this, 'minigo_countdown_shortcode' ) );
		add_shortcode( 'minigo-subscribe-form', array( $this, 'minigo_subscribe_form_shortcode' ) );
		add_shortcode( 'minigo-contact-info', array( $this, 'minigo_contact_info_shortcode' ) );
		add_shortcode( 'minigo-contact-form', array( $this, 'minigo_contact_form_shortcode' ) );
		add_shortcode( 'minigo-progress-bars', array( $this, 'minigo_progress_bars_shortcode' ) );
		add_shortcode( 'minigo-team', array( $this, 'minigo_team_shortcode' ) );
		add_shortcode( 'minigo-map', array( $this, 'minigo_map_shortcode' ) );
		add_shortcode( 'minigo-addthis', array( $this, 'minigo_addthis_shortcode' ) );
		add_shortcode( 'minigo-shop', array( $this, 'minigo_shop_shortcode' ) );
		add_shortcode( 'minigo-video', array( $this, 'minigo_video_shortcode' ) );
		add_shortcode( 'minigo-gallery', array( $this, 'minigo_gallery_shortcode' ) );
		add_shortcode( 'minigo-testimonials', array( $this, 'minigo_testimonials_shortcode' ) );
		add_shortcode( 'PT_row', array( $this, 'minigo_row_shortcode' ) );
		add_shortcode( 'PT_column', array( $this, 'minigo_column_shortcode' ) );
	}
	
}
?>