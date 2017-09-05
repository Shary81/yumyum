<?php
/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

class featured_ads_Widget extends WP_Widget{
function __construct() {
	parent::__construct(
		'listingPro_ads_widget', // Base ID
		'ListingPro - Ads Listing', // Name
		array('description' => esc_html__('It will show the Listings in ads', 'listingpro') )
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
			<?php echo esc_html__('Maximum 3 Ads listings will show in sidebar in "random" order', 'listingpro'); ?>
		</p>
        
       
	<?php
}

function widget($args, $instance) {
	extract( $args );
	$title = apply_filters('widget_title', $instance['title']);
	echo $before_widget;

	if ( $title ) {
		echo $before_title . $title . $after_title;
	}
	$s = '';
	global $post;
	?>
	<div class=" paid-listing">
		<div class="listing-post">
			<?php
			$data = listingpro_get_campaigns_listing( 'lp_detail_page_ads', false, array(), array(),array() ,$s);
			print_r($data);
			?>

		</div>
	</div>
	<?php

	echo $after_widget;
}



function update($new_instance, $old_instance) {
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	return $instance;
}
 
 
} //end class featured_ads_Widget

function featured_ads_Widget_registration() {
	register_widget('featured_ads_Widget');
}
add_action('widgets_init', 'featured_ads_Widget_registration');