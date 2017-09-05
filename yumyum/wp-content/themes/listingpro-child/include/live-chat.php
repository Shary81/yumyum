<?php
/**
 * Live Chat Function
 *
 */
if(!function_exists('listingpro_chatPlugin')){

	function listingpro_chatPlugin(){

		global $listingpro_options;

		$chat_option = $listingpro_options['chat-off'];

		if($chat_option == 1) {

			$current_user = wp_get_current_user();

			//print_r($current_user);

	?>

		<script>

			window.intercomSettings = {

			    app_id: "fabozo16",

			    name: "<?php echo $current_user->display_name ?>", // Full name

			    email: "<?php echo $current_user->user_email ?>", // Email address

			    created_at: <?php echo strtotime($current_user->user_registered) ?> // Signup date as a Unix timestamp

			};

		</script>

		<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/fabozo16';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>

<?php

		}

	}

	add_action('admin_footer', 'listingpro_chatPlugin');

}