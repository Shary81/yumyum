<?php
/**
 * Search Filters.
 *
 */

	/* ============== ListingPro get child term (tags) in search ============ */
	
	if (!function_exists('listingpro_search_term_method')) {
		
		function listingpro_search_term_method(){
			
			wp_register_script('search-ajax-script', get_template_directory_uri() . '/assets/js/search-ajax.js', array('jquery') ); 
			wp_enqueue_script('search-ajax-script');

			wp_localize_script( 'search-ajax-script', 'ajax_search_term_object', array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			));

		
		}
		if(!is_admin()){
			add_action('init', 'listingpro_search_term_method');
		}
	}
	
	
	/* ============== ListingPro Search Term ============ */
	
	add_action('wp_ajax_ajax_search_term',        'ajax_search_term');
	add_action('wp_ajax_nopriv_ajax_search_term', 'ajax_search_term');
	
	if (!function_exists('ajax_search_term')) {
		function ajax_search_term(){


			$term_id = $_POST['term_id'];

			$count = 1;
			$tagsHTML = '';
			$featureName='';
			$termparent='';
			$parent='';
			if(!empty($term_id)){
				$termparent = get_term_by('id', $term_id, 'listing-category');
				$parent = $termparent->parent;
			}
			
			$features = listingpro_get_term_meta($term_id,'lp_category_tags');
			if(empty($features)){
				$features = listingpro_get_term_meta($parent,'lp_category_tags');
			}
			if(!empty($features)){
				$tagsHTML = '
						<div class="form-inline lp-features-filter tags-area">
							<div class="form-group">
								<div class="input-group margin-right-0">
									<ul>';
									
									foreach($features as $feature){
										$terms = get_term_by('id', $feature, 'features');
										if(!empty($terms)){
											$tagsHTML .= '<li>';
												$tagsHTML .= '<div class="pad-bottom-10 checkbox">';
													$tagsHTML .= '<input type="checkbox" name="searchtags[]'.$count.'" id="check_'.$count.'" class="searchtags" value="'.$terms->term_id.'">';
													$tagsHTML .= '<label for="'.$terms->term_id.'">'.$terms->name.'</label>';
												$tagsHTML .= '</div>';
											$tagsHTML .= '</li>';
											$count++;	
										}
									}
								$tagsHTML .='</ul>';
							$tagsHTML .='</div>';
						$tagsHTML .='</div>';
					$tagsHTML .='</div>
				';
				
			}
			

			$term_group_result = json_encode(array('html'=>$tagsHTML));
			die($term_group_result);
			
		}
	}
	
	
	/* ============== ListingPro Search Filter========== */
	
	add_action('wp_ajax_ajax_search_tags',        'ajax_search_tags');
	add_action('wp_ajax_nopriv_ajax_search_tags', 'ajax_search_tags');
	
	if (!function_exists('ajax_search_tags')) {
		function ajax_search_tags(){
			global $listingpro_options;
			$info[] = '';
			$info['tag_name'] = $_POST['tag_name'];
			$info['cat_id'] = $_POST['cat_id'];
			$info['loc_id'] = $_POST['loc_id'];

			$info['listStyle'] = $_POST['list_style'];
			$info['inexpensive'] = $_POST['inexpensive'];
			$info['moderate'] = $_POST['moderate'];
			$info['pricey'] = $_POST['pricey'];
			$info['ultra'] = $_POST['ultra'];
			$info['averageRate'] = $_POST['averageRate'];
			$info['mostRewvied'] = $_POST['mostRewvied'];
			$info['listing_openTime'] = $_POST['listing_openTime'];
			$tagQuery ='';
			$catQuery ='';
			$listing_time ='';
			$sFeatures = '';
			$sFeatures = $_POST['tag_name'];
			if(!empty($info['listing_openTime'])){
				$listing_time = $info['listing_openTime'];
			}

			$priceQuery =array();
			$categoryName = '';
			$LocationName = '';
			$locQuery = '';

			$currentTax = '';
			
			
			if(!empty($info['tag_name'])){
				$tagQuery = array(
					'taxonomy' => 'features',
					'field' => 'id',
					'terms' => $info['tag_name'],
				);
			}
			if(!empty($info['cat_id'])){
			$categoryName = get_term_by('id', $info['cat_id'], 'listing-category');
			$categoryName = $categoryName->name;
				$catQuery = array(
					'taxonomy' => 'listing-category',
					'field' => 'id',
					'terms' => $info['cat_id'],
				);
			}
			
			if(!empty($info['loc_id'])){
			$LocationName = get_term_by('id', $info['loc_id'], 'location');
			$LocationName = $LocationName->name;
				$locQuery = array(
					'taxonomy' => 'location',
					'field' => 'id',
					'terms' => $info['loc_id'],
				);
			}

			/* added by zaheer on 13 march */
			
				$orderBy = '';
				$rateArray = '';
				$reviewedArray = '';
				$statusArray = array();
				$optenTimeArray = array();
				$relation = 'OR';
				
				
				if( !empty($info['averageRate']) ){
					$orderBy = 'meta_value_num';
					$rateArray = array(
						'key'     => $info['averageRate'],
						'compare' => 'EXIST'
					);
				}
				if( !empty($info['mostRewvied']) ){
					$orderBy = 'meta_value_num';
					$reviewedArray = array(
						'key'     => $info['mostRewvied'],
						'compare' => 'EXIST'
					);
				}
			
				if( !empty($info['inexpensive'])){
					$inexArray = array(
						'key'     => 'lp_listingpro_options',
						'value'   => 'inexpensive',
						'compare' => 'LIKE'
					);
				}
				if( !empty($info['moderate'])){
					$moderArray = array(
						'key'     => 'lp_listingpro_options',
						'value'   => 'moderate',
						'compare' => 'LIKE'
					);
				}
				if( !empty($info['pricey'])){
					$pricyArray = array(
						'key'     => 'lp_listingpro_options',
						'value'   => 'pricey',
						'compare' => 'LIKE'
					);
				}
				if( !empty($info['ultra'])){
					$ultrArray = array(
						'key'     => 'lp_listingpro_options',
						'value'   => 'ultra_high_end',
						'compare' => 'LIKE'
					);
				
				}
				if( !empty($info['inexpensive']) ||  !empty($info['moderate']) ||  !empty($info['pricey']) ||  !empty($info['ultra']) ){
					$statusArray = array(
							'key'     => 'lp_listingpro_options',
							'value'   => 'price_status',
							'compare' => 'LIKE'
						);
					$relation = "AND";	
				}
				if( !empty($info['inexpensive']) ||  !empty($info['moderate']) ||  !empty($info['pricey']) ||  !empty($info['ultra']) ||  !empty($info['averageRate']) ||  !empty($info['mostRewvied']) ){
					$priceQuery = array(
						'relation' => $relation, // Optional, defaults to "AND"
						$statusArray,
						array(
							'relation' => 'OR',
							$inexArray,$moderArray,$pricyArray,$ultrArray 
						),
						array(
							'relation' => 'OR',
							$rateArray, $reviewedArray
						)
						
					);
				
				}
			
			
			
			/* added by zaheer on 13 march */
			$searchQuery ='';
			$TxQuery = array($tagQuery,$catQuery,$locQuery);
			if(empty($TxQuery)){
				$TxQuery = array();
			}
			$ad_campaignsIDS = listingpro_get_campaigns_listing( 'lp_top_in_search_page_ads', TRUE, $TxQuery,$searchQuery,$priceQuery );
			$type = 'listing';
			$args=array(
				'post_type' => $type,
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'post__not_in' =>$ad_campaignsIDS,
				'orderby'   => $orderBy,
				/* 'meta_key'  => $metaKey, */
				'meta_query' => $priceQuery,
				'tax_query' => array(
					 $tagQuery,$catQuery,$locQuery						 
				),
				
			);

			$my_query = null;
			$output = null;
			$result = null;
			$found = null;
			$my_query = new WP_Query($args);
			$found = $my_query->found_posts;
			$output .= '<div class="promoted-listings">';
			ob_start();
			$output .= listingpro_get_campaigns_listing( 'lp_top_in_search_page_ads', false, $TxQuery,$searchQuery,$priceQuery );	
			$output .= ob_get_contents(); 
			ob_end_clean();		
			$output .= '</div>';
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();  
				if($listing_time == 'open'){
					$openStatus = listingpro_check_time(get_the_ID(),true);
					if($openStatus == 'open'){
						ob_start();
						get_template_part('listing-loop');
						 $htmlOutput .= ob_get_contents(); 
						ob_end_clean();						
					}
					
				}else{
					ob_start();
					get_template_part('listing-loop');
					 $htmlOutput .= ob_get_contents(); 
					ob_end_clean();
				}			
				endwhile;
				wp_reset_query();	
				if(empty($htmlOutput)){
						$output .= '
						<div class="text-center margin-top-80 margin-bottom-80">
							<h2>'.esc_html__('No Results','listingpro').'</h2>
							<p>'.esc_html__('Sorry! There are no listings matching your search.','listingpro').'</p>
							<p>'.esc_html__('Try changing your search filters or ','listingpro').'<a href="'.get_the_permalink().'">'.esc_html__('Reset Filter','listingpro').'</a></p>
						</div>
						';
				}
				else{
					$output .=$htmlOutput;
				}
			}elseif(empty($ad_campaignsIDS)){
			$output .= '
						<div class="text-center margin-top-80 margin-bottom-80">
							<h2>'.esc_html__('No Results','listingpro').'</h2>
							<p>'.esc_html__('Sorry! There are no listings matching your search.','listingpro').'</p>
							<p>'.esc_html__('Try changing your search filters or ','listingpro').'<a href="'.get_the_permalink().'">'.esc_html__('Reset Filter','listingpro').'</a></p>
						</div>
						';
			}	
			if(($found > 1)){
				$foundtext = 'Results';
			}else{
				$foundtext = 'Result';
			}
					
					
			$term_group_result = json_encode(array("foundtext"=>$foundtext,"found"=>$found,"tags"=>$info['tag_name'],"cat"=>$categoryName,"city"=>$LocationName,"html"=>$output,"opentime"=>$listing_time));
			die($term_group_result);
		}
	}
	
	
	/* ddfd */
	/* ============== ListingPro Home page========== */
	
	add_action('wp_ajax_listingpro_suggested_search',        'listingpro_suggested_search');
	add_action('wp_ajax_nopriv_listingpro_suggested_search', 'listingpro_suggested_search');
	
	if (!function_exists('listingpro_suggested_search')) {
		function listingpro_suggested_search(){
			global $listingpro_options;
			
			$qString = '';
			$qString = strtolower($_POST['tagID']);
			$output = null;
			$TAGOutput = null;
			$CATOutput = null;
			$TagCatOutput = null;
			$TitleOutput = null;
			if(empty($qString)){
				global $listingpro_options;
				$cats;
				$ucat = array(
					 'post_type' => 'listing',
					  'hide_empty' => false,
					  'orderby' => 'count',
					  'order' => 'ASC',
					  'parent'=> 0,
					);
					$catIcon = '';
					$categories = get_terms( 'listing-category',$ucat);
					foreach($categories as $cat) {
						$catIcon = listingpro_get_term_meta( $cat->term_id,'lp_category_image' );
						if(!empty($catIcon)){
							$catIcon = '<img src="'.$catIcon.'" />';
						}
						$cats[] = '<li class="lp-default-cats" data-catid="'.$cat->term_id.'">'.$catIcon.'<span class="lp-s-cat">'.$cat->name.'</span></li>';
					}
				$output = array('tag'=>'', 'cats'=>$cats, 'tagsncats'=>'', 'titles'=>'','more'=>'');
				$query_suggestion = json_encode(array("tagID"=>$qString,"suggestions"=>$output));
				die($query_suggestion);
			}else{
					$args = array(  
					
						'posts_per_page'=> -1, // Number of related posts to display.
						'post_type'	=> 'listing',
						'post_status'	=> 'publish'
					
					);  

						  
					$my_query = new wp_query( $args );
					if($my_query->have_posts()){ 
					while ($my_query->have_posts()) : $my_query->the_post();  
						$tagTerms = get_the_terms(get_the_ID(), 'list-tags');
						$catTerms = get_the_terms(get_the_ID(), 'listing-category');
						$locTerms = get_the_terms(get_the_ID(), 'location');
						$catName = '';
						$catIcon = '';
						$locNames = '';
						
						if( !empty($catTerms) && !empty($tagTerms) ){
							
							$catName = $catTerms[0];
							$term_id = $catName->term_id;
							$parent='';
							if(!empty($term_id)){
								$termparent = get_term_by('id', $term_id, 'listing-category');
								$parent = $termparent->parent;
							}
							$catIcon = listingpro_get_term_meta( $catName->term_id,'lp_category_image' );
							if(empty($catIcon)){
								$catIcon = listingpro_get_term_meta($parent,'lp_category_image');
							}
							if(!empty($catIcon)){
								$catIcon = '<img class="lp-s-caticon" src="'.$catIcon.'" />';
							}
						
							foreach($tagTerms as $tag){
								if(strpos(strtolower($tag->name), $qString) === 0){
									$TAGOutput[] = '<li class="lp-wrap-tags" data-tagid="'.$tag->term_id.'"><span class="lp-s-tag">'.$tag->name.'</span></li>'; 
									$TagCatOutput[] = '<li class="lp-wrap-catsntags" data-tagid="'.$tag->term_id.'" data-catid="'.$catName->term_id.'">'.$catIcon.'<span class="lp-s-tag">'.$tag->name.'</span><span> in </span><span class="lp-s-cat">'.$catName->name.'</span></li>';
									
								}
							}
							
							foreach($catTerms as $cat){
								if(strpos(strtolower($cat->name), $qString) === 0){
									$CATOutput[] = '<li class="lp-wrap-cats" data-catid="'.$cat->term_id.'">'.$catIcon.'<span class="lp-s-cat">'.$cat->name.'</span></li>' ; 
									
								}
							}
							
						
						}
						$listTitle = get_the_title();
						
						$listThumb = '';
						if ( has_post_thumbnail()) {
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'thumbnail' );
									if(!empty($image[0])){
										$listThumb = "<img src='" . $image[0] . "' />
											";
									}else{
										$listThumb = '<img src="'.esc_html__('https://placeholdit.imgix.net/~text?txtsize=33&txt=ListingPro&w=50&h=50', 'listingpro').'" alt="">';
									}		
						}
						
						if(strpos(strtolower($listTitle), $qString) === 0){
							
							$TitleOutput[] = '<li class="lp-wrap-title" data-url="'.get_the_permalink().'">'.$listThumb.'<span class="lp-s-title"><a href="'.get_the_permalink().'">'.$listTitle.' <span class="lp-loc">'.$locTerms[0]->name.'</span></a></span></li>';
						}
							
					endwhile;
				

					}
					$TAGOutput = array_unique($TAGOutput);
					$CATOutput = array_unique($CATOutput);
					$TagCatOutput = array_unique($TagCatOutput);
					if( (!empty($TAGOutput) && count($TAGOutput)>0) || (!empty($TAGOutput) && count($TAGOutput)>0) || (!empty($TAGOutput) && count($TAGOutput)>0) ){
						$output = array('tag'=>$TAGOutput, 'cats'=>$CATOutput, 'tagsncats'=>$TagCatOutput, 'titles'=>$TitleOutput,'more'=>'');
					}
					else{
						$moreResult = array();
						$mResults = '<strong>'.esc_html__('More results for ', 'listingpro').'</strong>';
						$mResults .= $qString;
						$moreResult[] = '<li class="lp-wrap-more-results" data-moreval="'.$qString.'">'.$mResults.'</li>';
						
						$output = array('tag'=>'', 'cats'=>'', 'tagsncats'=>'', 'titles'=>'','more'=>$moreResult);
					}
								
										
				$query_suggestion = json_encode(array("tagID"=>$qString,"suggestions"=>$output));
				die($query_suggestion);
			}				
		}
	}
	
	/* ======================show cateogries on focus================ */
	add_action('wp_ajax_listingpro_suggested_cats',        'listingpro_suggested_cats');
	add_action('wp_ajax_nopriv_listingpro_suggested_cats', 'listingpro_suggested_cats');
	
	if (!function_exists('listingpro_suggested_cats')) {
		function listingpro_suggested_cats(){
			global $listingpro_options;
			$cats;
			$homeSearchCategory = $listingpro_options['home_banner_search_cats'];
			$ucat = array(
				 'post_type' => 'listing',
				  'hide_empty' => false,
				  'orderby' => 'count',
				  'order' => 'ASC',
				  'include'=> $homeSearchCategory
				);
				$categories = get_terms( 'listing-category',$ucat);
				foreach($categories as $category) {
					$cats[] =  $category->name;
				}
			$query_suggestion = json_encode(array("cats"=>$cats));
			die($query_suggestion);
		}
	}
	/* ======================show cateogries on focus================ */