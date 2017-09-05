<?php
 
	function load_plans_scripts(){
			$screen = get_current_screen();
			$pageTitle = '';
			$pageTitle = $screen->id;
			if(!empty($pageTitle) && $pageTitle=="price_plan"){
				wp_register_script( 'plans', plugins_url( '/assets/js/plans.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ) );
				wp_enqueue_script( 'plans' );
			}
		}
	add_action( 'admin_enqueue_scripts', 'load_plans_scripts' );
		
	add_action( 'add_meta_boxes', 'plan_package_type' );
	function plan_package_type() {
	    add_meta_box( 
	        'plan_package_type',
	        __( 'Select Package Type', 'listingpro' ),
	        'plan_type_package',
	        'price_plan'
	    );
	}

	function plan_type_package( $post ) {

		$plan_package_type = get_post_meta( $post->ID, 'plan_package_type', true );

		echo '<label for="plan_package_type"></label>';
		
		echo '<select name="plan_package_type" id="plan_package_type">';
		
		if( !empty ( $plan_package_type ) ){
			
			if( $plan_package_type=="Pay Per Listing" ){
				
				echo '<option value="Package">Package</option>';
				echo '<option value="Pay Per Listing" selected>Pay Per Listing</option>';
				
			}
			else if( $plan_package_type=="Package" ){
				echo '<option value="Package" selected>Package</option>';
				echo '<option value="Pay Per Listing">Pay Per Listing</option>';
			}
			
		}
		else{
			echo '<option value="Pay Per Listing">Pay Per Listing</option>';
			echo '<option value="Package">Package</option>';
		}
		
		echo '</select>';
		
	}


	add_action( 'save_post', 'plan_package_type_save' );
	function plan_package_type_save( $post_id ) {		

		global $plan_package_type;

		if(isset($_POST["plan_package_type"]))
		$plan_package_type = $_POST['plan_package_type'];
		update_post_meta( $post_id, 'plan_package_type', $plan_package_type );

	}
	
	
		
	
	add_action( 'add_meta_boxes', 'plan_text_box' );
	function plan_text_box() {
	    add_meta_box( 
	        'plan_text_box',
	        __( 'Enter no. of post in the package', 'listingpro' ),
	        'plan_text_content',
	        'price_plan'
	    );
	}

	function plan_text_content( $post ) {

		$plan_text = get_post_meta( $post->ID, 'plan_text', true );

		echo '<label for="plan_text"></label>';
		echo '<input type="text" id="plan_text" name="plan_text" placeholder="Total Posts in Package" value="';
		echo $plan_text; 
		echo '">';
		
	}


	add_action( 'save_post', 'plan_text_save' );
	function plan_text_save( $post_id ) {		

		global $plan_text;

		if(isset($_POST["plan_text"]))
		$plan_text = $_POST['plan_text'];
		update_post_meta( $post_id, 'plan_text', $plan_text );

	}
		
		
		
	add_action( 'add_meta_boxes', 'plan_price_box' );
	function plan_price_box() {
	    add_meta_box( 
	        'plan_price_box',
	        __( 'Price (Do not use currency sign)(Empty field will be considered as free plan. Free plan option only works in "Pay per Listing" )', 'listingpro' ),
	        'plan_price_content',
	        'price_plan'
	    );
	}

	function plan_price_content( $post ) {

		$plan_price = get_post_meta( $post->ID, 'plan_price', true );

		echo '<label for="plan_price"></label>';
		echo '<input type="text" id="plan_price" name="plan_price" placeholder="" value="';
		echo $plan_price; 
		echo '">';
		
	}


	add_action( 'save_post', 'plan_price_save' );
	function plan_price_save( $post_id ) {		

		global $plan_price;

		if(isset($_POST["plan_price"]))
		$plan_price = $_POST['plan_price'];
		update_post_meta( $post_id, 'plan_price', $plan_price );

	}



	add_action( 'add_meta_boxes', 'plan_time_box' );
	function plan_time_box() {
	    add_meta_box( 
	        'plan_time_box',
	        __( 'Duration( in days )', 'listingpro' ),
	        'plan_time_content',
	        'price_plan'
	    );
	}

	function plan_time_content( $post ) {

		$plan_time = get_post_meta( $post->ID, 'plan_time', true );

		echo '<label for="plan_time"></label>';
		echo '<input type="text" id="plan_time" name="plan_time" placeholder="Leave empty for unlimited" value="';
		echo $plan_time; 
		echo '">';
		
	}


	add_action( 'save_post', 'plan_time_save' );
	function plan_time_save( $post_id ) {		

		global $plan_time;

		if(isset($_POST["plan_time"]))
		$plan_time = $_POST['plan_time'];
		update_post_meta( $post_id, 'plan_time', $plan_time );

	}	
	

	add_action( 'add_meta_boxes', 'plan_hot_box' );
	function plan_hot_box() {
	    add_meta_box( 
	        'plan_hot_box',
	        __( 'Hot Plan', 'listingpro' ),
	        'plan_hot_content',
	        'price_plan'
	    );
	}

	function plan_hot_content( $post ) {

		$plan_hot = get_post_meta( $post->ID, 'plan_hot', true );
		$checked = '';
		if($plan_hot == 'true'){
			$checked = 'checked';
		}
		
		echo '<input '.$checked.' type="checkbox" id="plan_hot" name="plan_hot" value="';
		echo wp_kses_post($plan_hot); 
		echo '">';
		echo '<label for="plan_hot">  Check if you want to make this plan "Hot"</label><br/>';
		
	}


	add_action( 'save_post', 'plan_hot_save' );
	function plan_hot_save( $post_id ) {		

		if(isset($_POST["plan_hot"])){
			update_post_meta( $post_id, 'plan_hot', 'true' );
		}
		else{
			update_post_meta( $post_id, 'plan_hot', 'false' );
		}
	}	
		
		
		
		
		
	add_action( 'add_meta_boxes', 'plan_contact_box' );
	function plan_contact_box() {
		$screens = array( 'price_plan');
		foreach ( $screens as $screen ) {
			add_meta_box( 
				'plan_contact_box',
				__( 'Ad Posting options', 'listingpro' ),
				'plan_contact_content',
				$screen,
				 'normal',
				'high'
			);
		}
	}
	
	
		function plan_contact_content( $post ) {

		$contact_show = get_post_meta( $post->ID, 'contact_show', true );
		$checked = '';
		if($contact_show == 'true'){
			$checked = 'checked';
		}
		
		echo '<input '.$checked.' type="checkbox" id="contact_show" name="contact_show" value="';
		echo wp_kses_post($contact_show); 
		echo '">';
		echo '<label for="contact_show">  Check it if you want to allow user to show his contact information</label><br/>';
		
		$map_show = get_post_meta( $post->ID, 'map_show', true );
		$checked = '';
		if($map_show == 'true'){
			$checked = 'checked';
		}
		echo '<input '.$checked.' type="checkbox" id="map_show" name="map_show" value="';
		echo wp_kses_post($map_show); 
		echo '">';
		echo '<label for="map_show">  Check it if you want to allow user to show his Google map</label><br/>';
		
		$video_show = get_post_meta( $post->ID, 'video_show', true );
		$checked = '';
		if($video_show == 'true'){
			$checked = 'checked';
		}
		echo '<input '.$checked.' type="checkbox" id="video_show" name="video_show" value="';
		echo wp_kses_post($video_show); 
		echo '">';
		echo '<label for="video_show">  Check it if you want to allow user to show his Ad video</label><br/>';
		
		$gallery_show = get_post_meta( $post->ID, 'gallery_show', true );
		$checked = '';
		if($gallery_show == 'true'){
			$checked = 'checked';
		}
		echo '<input '.$checked.' type="checkbox" id="gallery_show" name="gallery_show" value="';
		echo wp_kses_post($gallery_show); 
		echo '">';
		echo '<label for="gallery_show">  Check it if you want to allow user to show his Gallery</label><br/>';
		
	}

	add_action( 'save_post', 'plan_contact_box_save' );
	function plan_contact_box_save( $post_id ) {


		if(isset($_POST["contact_show"])){
		update_post_meta( $post_id, 'contact_show', 'true' );
		}else{
		update_post_meta( $post_id, 'contact_show', 'false' );
		}
		
		if(isset($_POST["map_show"])){
		update_post_meta( $post_id, 'map_show', 'true' );
		}else{
		update_post_meta( $post_id, 'map_show', 'false' );
		}
		
		if(isset($_POST["video_show"])){
		update_post_meta( $post_id, 'video_show', 'true' );
		}else{
		update_post_meta( $post_id, 'video_show', 'false' );
		}
		
		if(isset($_POST["gallery_show"])){
		update_post_meta( $post_id, 'gallery_show', 'true' );
		}else{
		update_post_meta( $post_id, 'gallery_show', 'false' );
		}
	}	