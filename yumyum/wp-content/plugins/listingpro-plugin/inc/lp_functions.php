<?php
/* listingpro aditional functions */

if(!function_exists('lp_generate_invoice_mail')){
	function lp_generate_invoice_mail( $ID, $post ) {
		global $listingpro_options;
		$author = $post->post_author;
		$name = get_the_author_meta( 'display_name', $author );
		$useremail = get_the_author_meta( 'user_email', $author );
			
			$website_url = site_url();
			$website_name = get_option('blogname');
			$listing_title = $post->post_title;
			$listing_url = get_permalink( $ID );
			$headers[] = 'Content-Type: text/html; charset=UTF-8';

			$u_mail_subject_a = '';
			$u_mail_body_a = '';
			$u_mail_subject = $listingpro_options['listingpro_subject_listing_approved'];
			$u_mail_body = $listingpro_options['listingpro_listing_approved'];
			
			$u_mail_subject = str_replace('%website_url','%1$s', $u_mail_subject);
			$u_mail_subject = str_replace('%listing_title','%2$s', $u_mail_subject);
			$u_mail_subject = str_replace('%listing_url','%3$s', $u_mail_subject);
			$u_mail_subject = str_replace('%website_name','%4$s', $u_mail_subject);
			$u_mail_subject_a = sprintf( $u_mail_subject,$website_url,$listing_title,$listing_url, $website_name  );
			
			$u_mail_body = str_replace('%website_url','%1$s', $u_mail_body);
			$u_mail_body = str_replace('%listing_title','%2$s', $u_mail_body);
			$u_mail_body = str_replace('%listing_url','%3$s', $u_mail_body);
			$u_mail_body = str_replace('%website_name','%4$s', $u_mail_body);
			$u_mail_body_a = sprintf( $u_mail_body,$website_url,$listing_title,$listing_url,$website_name  );
			wp_mail( $useremail, $u_mail_subject_a, $u_mail_body_a, $headers);
			
		}
		
}
add_action( 'publish_listing', 'lp_generate_invoice_mail', 10, 2);
