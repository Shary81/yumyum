<?php
/**
 *	Utility Classes
  */
 
class PremioThemes_Utility {

	// Return Grid code to help generate columns
	public function grid_col($col) {
		$grid_code = '';
		switch ($col) {
			case '1':
				$grid_code = 'one-whole';
				break;
			case '2':
				$grid_code = 'one-half palm-one-whole';
				break;
			case '3':
				$grid_code = 'one-third palm-one-whole';
				break;
			case '4':
				$grid_code = 'one-quarter lap-one-half palm-one-whole';
				break;
			case '5':
				$grid_code = 'one-fifth lap-one-half palm-one-whole';
				break;
			case '6':
				$grid_code = 'one-sixth lap-one-third palm-one-whole';
				break;
			case '8':
				$grid_code = 'one-eighth lap-one-third  palm-one-whole';
				break;
			case '10':
				$grid_code = 'one-tenth lap-one-third  palm-one-whole';
				break;
			case '12':
				$grid_code = 'one-twelfth lap-one-third  palm-one-whole';
				break;
			default:
				$grid_code = 'one-whole lap-one-third  palm-one-whole';
				break;
		}
		return $grid_code;
	}

	// Demo Gallery for when we first load a skin and/or the gallery is empty
	public function demo_gallery($rows) {
		global $minigo_url;
		$gallery_array = array(
					0 => array(
						'title' => 'Image Title',
						'url' => $minigo_url.'template/images/bg/bg1.jpg',
						'thumbsize' => array(
							'width' => '300',
							'height' => '170'
							),
						'imagesize' => array(
							'width' => '1600',
							'height' => '900'
							),
						),
					1 => array(
						'title' => 'Image Title',
						'url' => $minigo_url.'template/images/bg/bg2.jpg',
						'thumbsize' => array(
							'width' => '300',
							'height' => '170'
							),
						'imagesize' => array(
							'width' => '1600',
							'height' => '900'
							),
						),
					2 => array(
						'title' => 'Image Title',
						'url' => $minigo_url.'template/images/bg/bg3.jpg',
						'thumbsize' => array(
							'width' => '300',
							'height' => '170'
							),
						'imagesize' => array(
							'width' => '1600',
							'height' => '900'
							),
						),
					3 => array(
						'title' => 'Image Title',
						'url' => $minigo_url.'template/images/bg/bg4.jpg',
						'thumbsize' => array(
							'width' => '300',
							'height' => '170'
							),
						'imagesize' => array(
							'width' => '1600',
							'height' => '900'
							),
						),
					4 => array(
						'title' => 'Image Title',
						'url' => $minigo_url.'template/images/bg/bg5.jpg',
						'thumbsize' => array(
							'width' => '300',
							'height' => '170'
							),
						'imagesize' => array(
							'width' => '1600',
							'height' => '900'
							),
						),
					5 => array(
						'title' => 'Image Title',
						'url' => $minigo_url.'template/images/bg/bg6.jpg',
						'thumbsize' => array(
							'width' => '300',
							'height' => '170'
							),
						'imagesize' => array(
							'width' => '1600',
							'height' => '900'
							),
						),
		);

		$html = '<div class="grid">'."\n";
	        $html.= '<div class="grid__item one-whole push--bottom">'."\n";
	            $html.= '<div class="minigo-gallery" style="max-width: 100%;" itemscope itemtype="http://schema.org/ImageGallery">'."\n";
				for ($i=0; $i <= 3; $i++) {
	                foreach( $gallery_array as $image ) {
	                    if ( $rows == 1) {$html .= '<div>'."\n";}
	                    $html .= '<figure itemprop="associatedMedia" itemscope urlitemtype="http://schema.org/ImageObject">'."\n";
		                    $html .= '<a class="slick-holder" title="'. $image['title'] .'" href="'. $image['url'] .'" itemprop="contentUrl" data-size="'. $image['imagesize']['width'] .'x'. $image['imagesize']['height'] .'"><img src="'. $image['url'] .'" width="'. $image['thumbsize']['width'] .'" height="'. $image['thumbsize']['height'] .'" itemprop="thumbnail" alt="'. $image['title'] .'" itemprop="thumbnail"></a>'."\n";
	                    $html .= '</figure>';
	                    if ( $rows == 1) {$html .= '</div>'."\n";}
		            }
		        }
	            $html .="</div>"."\n";
            $html.= '</div>'."\n";
        $html.= '</div>'."\n";

        return $html;
	}

	// Demo Gallery for when we first load a skin and/or the gallery is empty
	public function demo_bg_slideshow() {
		global $minigo_url;
		$gallery_array = array(
					0 => array(
						'title' => 'Image Title',
						'url' => 'http://premiothemes.com/demos/minigo/assets/template/images/bg/slideshow-2.jpg',
						'imagesize' => array(
							'width' => '1920',
							'height' => '1080'
							),
						),
					1 => array(
						'title' => 'Image Title',
						'url' => 'http://premiothemes.com/demos/minigo/assets/template/images/bg/slideshow-1.jpg',
						'imagesize' => array(
							'width' => '1920',
							'height' => '1080'
							),
						),
					2 => array(
						'title' => 'Image Title',
						'url' => 'http://premiothemes.com/demos/minigo/assets/template/images/bg/slideshow-3.jpg',
						'imagesize' => array(
							'width' => '1920',
							'height' => '1080'
							),
						),
		);

		$html = '<figure class="bg-wrapper">'."\n";

			$srcAttr = 'src';
	        foreach( $gallery_array as $image ) {
                $html.= '<img '.$srcAttr.'="'.$image['url'].'" width="'.$image['imagesize']['width'].'" height="'.$image['imagesize']['height'].'" alt="'.$image['title'].'">'."\n";
				$srcAttr = 'data-src';
	        }

        $html.= '</figure>'."\n";

        return $html;
	}

}
?>