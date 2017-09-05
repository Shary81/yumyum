<?php
/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

class featured_Listing_Widget extends WP_Widget{
function __construct() {
	parent::__construct(
		'listingPro_featured_widget', // Base ID
		'ListingPro - Featured Listing Widget', // Name
		array('description' => esc_html__('', 'listingpro') )
   	);
}
function form($instance) {
	if( $instance) {
		$title = esc_attr($instance['title']);
		$numberOfListings = esc_attr($instance['numberOfListings']);
        $with_thumbs = $instance['with_thumbs'];
	} else {
		$title = '';
		$numberOfListings = '';
        $video_posts_style = '';
        $with_thumbs = '';
	}
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title', 'listingpro'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php echo esc_html__('Number of Listings:', 'listingpro'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('numberOfListings'); ?>" name="<?php echo $this->get_field_name('numberOfListings'); ?>" type="text" value="<?php echo $numberOfListings; ?>" />
			<!-- <select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
				<?php for($x=1;$x<=10;$x++): ?>
				<option <?php echo $x == $numberOfListings ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
				<?php endfor;?>
			</select> -->
		</p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'with_thumbs' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'with_thumbs' ); ?>" name="<?php echo $this->get_field_name( 'with_thumbs' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'with_thumbs' ); ?>"><?php echo esc_html__('Check this to show thumbnails', 'listingpro');?></label>
        </p>
        <!-- <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php echo esc_html__('Social Style:', 'listingpro' );?></label>
            <select class='widefat' id="<?php echo $this->get_field_id('video_posts_style'); ?>" name="<?php echo $this->get_field_name('video_posts_style'); ?>" type="text">
                <option value='style_one'<?php echo ($video_posts_style=='style_one')?'selected':''; ?>><?php echo esc_html__('Style One', 'listingpro' );?></option>
                <option value='style_two'<?php echo ($video_posts_style=='style_two')?'selected':''; ?>><?php echo esc_html__('Style Two', 'listingpro' );?></option>
                <option value='style_three'<?php echo ($video_posts_style=='style_three')?'selected':''; ?>><?php echo esc_html__('Style Three', 'listingpro' );?></option>
            </select>                
        </p> -->
	<?php
}

function widget($args, $instance) {
	extract( $args );
	$title = apply_filters('widget_title', $instance['title']);
	$numberOfListings = $instance['numberOfListings'];
    $video_posts_style = $instance['video_posts_style'];
    $with_thumbs = $instance['with_thumbs'];
	echo $before_widget;

	if ( $title ) {
		echo $before_title . $title . $after_title;
	}

	global $post;
	
		$videosPosts = new WP_Query();
		$videosPosts->query('post_type=listing&post_status=publish&posts_per_page=' . $numberOfListings );
		if($videosPosts->found_posts > 0) {
			echo '
			<div class=" paid-listing">
				<div class="listing-post">';
					while ($videosPosts->have_posts()) {
						$gAddress = listing_get_metabox('gAddress');
						$rating = listing_get_metabox_by_ID('rating' ,get_the_ID());
						$rate = $rating;
						print_r($rating);

						$videosPosts->the_post();
						if(has_post_thumbnail()) {
							$images = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'listingpro-gallery-thumb2' );
							$image = '<img src="'.$images[0].'" alt="">';
						}else {
							$image = '<img src="'.esc_url('https://placeholdit.imgix.net/~text?txtsize=33&txt=ListingPro&w=360&h=198').'" alt="Listing Pro Placeholder">';
						}
						?>
						<article>
							<figure>
								<a href="<?php echo get_permalink(); ?>">
									<?php echo $image; ?>
								</a>
								<figcaption>
									<div class="listing-price">
										<?php
											$listingcurrency = get_post_meta( $post->ID, 'listingcurrency', true );
											$listingprice = get_post_meta( $post->ID, 'listingprice', true );
											$listingptext = get_post_meta( $post->ID, 'listingptext', true );
											echo esc_html($listingcurrency.$listingprice);
										?>
									</div>
									<div class="listing-ad">Ad</div>
									<div class="bottom-area">
										<div class="listing-cats">
											<?php 
											$cats = get_the_terms( get_the_ID(), 'listing-category' );
											foreach($cats as $cat) {
												?>
												<a href="<?php echo get_term_link($cat); ?>" class="cat"><?php echo $cat->name; ?></a>
											<?php } ?>
										</div>
										<?php if(!empty($rate)) { ?>
											<span class="rate"><?php echo $rate; ?></span>
										<?php } ?>
										<h4><a href="<?php echo get_permalink(); ?>"><?php echo substr(get_the_title(), 0, 45); ?></a></h4>
										<?php if(!empty($gAddress)) { ?>
											<div class="listing-location">
												<p><?php echo $gAddress ?></p>
											</div>
										<?php } ?>
									</div>
								</figcaption>
							</figure>
						</article>
						<?php
					}
					echo '
				</div>
			</div>';
		}else{
			echo '<p style="padding:25px;">No listing found</p>';
		}

	echo $after_widget;
}



function update($new_instance, $old_instance) {
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
    $instance['video_posts_style'] = strip_tags($new_instance['video_posts_style']);
    $instance[ 'with_thumbs' ] = $new_instance[ 'with_thumbs' ];
	return $instance;
}
 
 
} //end class featured_Listing_Widget

function featured_listing_widget_registration() {
	register_widget('featured_Listing_Widget');
}
add_action('widgets_init', 'featured_listing_widget_registration');