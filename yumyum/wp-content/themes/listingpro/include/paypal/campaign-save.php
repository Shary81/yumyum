<?php
if(session_id() == '') {
    session_start();
}
/* ================================save data via paypal====================================== */
if(!function_exists('lp_save_campaign_data')){
	function lp_save_campaign_data($adID, $transactionID, $method, $token, $status){
		global $wpdb,$listingpro_options;
		$dbprefix = $wpdb->prefix;
		$user_ID = '';
		$user_ID = get_current_user_id();
		$currency_code = '';
		$currency_code = $listingpro_options['currency_paid_submission'];
		$priceKeyArray = 0;
		$price_packages = $_SESSION['price_package'];
				if( !empty($price_packages) ){
					foreach( $price_packages as $type=>$val ){
						
						$priceKeyArray = $priceKeyArray+$val;
					}
				}

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		$sql="
		   CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."listing_campaigns`
		 (
			  main_id bigint(20) NOT NULL auto_increment,
			  user_id varchar(255) default NULL,
			  post_id varchar(255) default NULL,
			  payment_method varchar(255) default NULL,
			  token varchar(255) default NULL,
			  price varchar(255) default NULL,
			  currency varchar(255) default NULL,
			  status varchar(255) default NULL,
			  transaction_id varchar(255) default NULL,
			  PRIMARY KEY  (`main_id`)
		 );";
		dbDelta($sql);
		
		$insert_sql ="
				INSERT INTO `".$wpdb->prefix."listing_campaigns` VALUES ('','$user_ID','$adID','$method','$token','$priceKeyArray','$currency_code','$status','$transactionID')";

        dbDelta($insert_sql);
		
	}
}

/* ===========================================listingpro insert data in db============================================== */

if(!function_exists('lp_insert_data_in_db')){
	function lp_insert_data_in_db($table, $dataArray){
		global $wpdb,$listingpro_options;
		$dbprefix = $wpdb->prefix;
		$table =$dbprefix.$table;
		$result = $wpdb->insert( $table, $dataArray, $format = null );
		
		if(!empty($result) && $result > 0){
			return true;
		}
		else{
			return false;
		}
		
	}
}

/* ============================================listingpro update data in db========================================= */

if(!function_exists('lp_update_data_in_db')){
	function lp_update_data_in_db($table, $data, $where){
		global $wpdb,$listingpro_options;
		$dbprefix = $wpdb->prefix;
		$table =$dbprefix.$table;
		
		$result = $wpdb->update( $table, $data, $where, $format = null, $where_format = null );
		if(!empty($result) && $result > 0){
			return true;
		}
		else{
			return false;
		}
	}
}

/* ============================================listingpro get data from db table ================================= */

if(!function_exists('lp_get_data_from_db')){
	function lp_get_data_from_db($table, $data, $condition){
		global $wpdb,$listingpro_options;
		
		$dbprefix = $wpdb->prefix;
		
		$table =$dbprefix.$table;
		if($wpdb->get_var("SHOW TABLES LIKE '$table'") == $table) {
			$query = "";
			$query = "SELECT $data from $table WHERE $condition";
			$result = $wpdb->get_results( $query);		
			return $result;
		}
return;
		
	}
}

/* =============================================listingpro create campains table ================================*/

if(!function_exists('lp_create_campaigns_table')){
	function lp_create_campaigns_table(){
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		global $wpdb,$listingpro_options;
		$dbprefix = $wpdb->prefix;
		$sql="
		   CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."listing_campaigns`
		 (
			  main_id bigint(20) NOT NULL auto_increment,
			  user_id varchar(255) default NULL,
			  post_id varchar(255) default NULL,
			  payment_method varchar(255) default NULL,
			  token varchar(255) default NULL,
			  price varchar(255) default NULL,
			  currency varchar(255) default NULL,
			  status varchar(255) default NULL,
			  transaction_id varchar(255) default NULL,
			  PRIMARY KEY  (`main_id`)
		 );";
		dbDelta($sql);
	}
}

/* ==============================================listingpro create listings orders table =============================== */

if(!function_exists('lp_create_listings_orders_table')){
	function lp_create_listings_orders_table(){
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		global $wpdb,$listingpro_options;
		$dbprefix = $wpdb->prefix;
		$wpdb->query("CREATE TABLE IF NOT EXISTS `".$dbprefix."listing_orders` (
		  `main_id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		  `user_id` TEXT NOT NULL ,
		  `post_id` TEXT NOT NULL ,
		  `plan_id` TEXT NOT NULL ,
		  `plan_name` TEXT NOT NULL ,
		  `plan_type` TEXT NOT NULL ,
		  `payment_method` TEXT NOT NULL ,
		  `token` TEXT NOT NULL ,
		  `price` FLOAT UNSIGNED NOT NULL ,
		  `currency` TEXT NOT NULL ,
		  `days` TEXT NOT NULL ,
		  `date` TEXT NOT NULL ,
		  `status` TEXT NOT NULL ,
		  `used` TEXT NOT NULL ,
		  `transaction_id` TEXT NOT NULL ,
		  `firstname` TEXT NOT NULL ,
		  `lastname` TEXT NOT NULL ,
		  `email` TEXT NOT NULL ,
		  `description` TEXT NOT NULL ,
		  `summary` TEXT NOT NULL ,
		  `order_id` TEXT NOT NULL 
		  ) ENGINE = MYISAM; ");
	}
}

?>