<?php
/**
 *	Options << Not yet implemented in MiniGO
 */
class PremioThemes_Options {

	// This function add the pattern on background (!!)
	public static function pattern() {
		global $pt_minigo;

	    $pattern = '';

	    if($pt_minigo['background-pattern'] == 'preset' && !empty($pt_minigo['background-patternPreset'])) {
	        $pattern = $pt_minigo['background-patternPreset'];
	    } elseif($pt_minigo['background-pattern'] == 'custom' && !empty($pt_minigo['background-patternCustom']['url'])) {
	        $pattern = $pt_minigo['background-patternCustom']['url'];
	    }

	    return $pattern;
	}

	// This function add the class on body tag (!!)
	public static function bodyClass() {
		global $pt_minigo

	    $backgroundTheme = '';
	    $pt_minigo['choose-theme'] = '';

	    if( ( $pt_minigo['choose-theme'] ) == 'light' ) {
	        $backgroundTheme = 'light';
	    }
	    else if( ($pt_minigo['choose-theme']) == 'dark' ) {
	        $backgroundTheme = 'dark';
	    }
	    else if( ($pt_minigo['choose-theme']) == 'custom' ) {
	        $backgroundTheme = 'custom';
	    }

	    return $backgroundTheme;
	}

	// This function add Google Map in Contact page (!!)
	public static function google_map() {
		global $pt_minigo

		if( $pt_minigo['google-switcher'] == 1 ) {

			$html = '<div class="c-map">';
				$html .= '<div class="closeMap"><a href="#"><i class="fa fa-times"></i></a></div>';
				$html .= '<div id="map"></div>';
			$html .= '</div>';
			// :// for https
			$html .= '<script type="text/javascript" src="://maps.google.com/maps/api/js?sensor=false"></script>';
		}

		return $html;
	}

	// This function adds the navigation (!!)
	public static function navigation() {
		global $pt_minigo

		$navItemsArray = array(
		    array( $pt_minigo['left-page-enabled'], htmlspecialchars( $pt_minigo['left-page-title'] ) ),
		    array( $pt_minigo['folio-page-enabled'], htmlspecialchars( $pt_minigo['folio-page-title'] ) ),
		    array( $pt_minigo['right-page-enabled'], htmlspecialchars( $pt_minigo['contact-page-title'] ) ),
		);

		$html = '<div class="collapse navbar-collapse">';
			$html .= '<ul class="nav navbar-nav">';
				$html .= '<li class="home">Home</li>';
					$linksCount = 0;
					foreach( $navItemsArray as $navItem ) {
						if( $navItem[0] == 1 ) {
							$html .= '<li data-target="#content-carousel" data-slide-to="'. $linksCount .'" class="indicator-targets">'. $navItem[1] .'</li>';
							$linksCount++;
						}
					}
			$html .= '</ul>';
			$html .= '<div class="nav-underline"></div>';
		$html .= '</div>';

		return $html;
	}

}
?>