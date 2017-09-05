<?php
if ( ! class_exists( 'PremioThemes_ComingSoon' ) ) {
    class PremioThemes_ComingSoon {

        /**
         *  Construct function
         */
        function __construct() {
            global $pt_minigo;

            if( !empty( $pt_minigo['comingsoon-enabled'] ) || isset( $_GET['cs_preview'] ) ) {
                if(function_exists('bp_is_active')){
                    add_action('template_redirect', array($this,'render_comingsoon_page'),9);
                } else {
                    add_action('template_redirect', array($this,'render_comingsoon_page'));
                }
            }

            if( !empty( $pt_minigo['comingsoon-enabled'] ) ) {
                add_action( 'admin_bar_menu', array( $this, 'admin_bar_menu' ), 1000 );
                // if ( is_user_logged_in() ) {
                //     wp_enqueue_style( 'pt-minigo-admin', plugins_url( 'inc/admin/admin.css', dirname( __FILE__ ) ) , array(), $GLOBALS['minigo_version'], 'screen');
                // }
            }

            if( isset( $_POST['minigo_subscriber_list'] ) ) {
                update_option( 'minigo_subscriber_list', $_POST['minigo_subscriber_list'] );
                header( 'Location: '.$_SERVER['REQUEST_URI'] );
            }
        }

        /**
         *  Display admin bar when active
         */
        function admin_bar_menu($str){
            global $wp_admin_bar;
            global $pt_minigo;

            $msg = '';

            if ( $pt_minigo['comingsoon-enabled'] == 'maintenance_mode' ) {
                $msg = __( 'MiniGO - Maintenance Mode', 'pt-minigo' );
            } elseif ( $pt_minigo['comingsoon-enabled'] == 'coming_soon' ) {
                $msg = __( 'MiniGO - Active', 'pt-minigo' );
            }

            //Add the main siteadmin menu item
            $wp_admin_bar->add_menu( array(
                'id'        => 'premiothemes-comingsoon-notice',
                'href'      => admin_url().'admin.php?page=minigo_options',
                'parent'    => 'top-secondary',
                'title'     => $msg,
                'meta'      => array( 'class' => 'premiothemes-comingsoon-active' ),
            ) );
        }

        /**
         *  Display the coming soon page
         */
        function render_comingsoon_page() {
            global $pt_minigo;

            // Return if a login page
            if(preg_match("/login/i",$_SERVER['REQUEST_URI']) > 0){
                return false;
            }

            if(!isset($_GET['cs_preview']) && !empty($pt_minigo['whitelist-ips'])) {
                $ips = explode("\n", str_replace("\r\n", "\n", trim($pt_minigo['whitelist-ips'])));

                if(!empty($ips) && in_array($_SERVER['REMOTE_ADDR'], $ips)) {
                    return false;
                }
            }

            // URL Filtering
            try {
                $protocol = 'http';
                if(!empty($_SERVER['HTTPS'])) {
                    $protocol = 'https';
                }

                $current_url = $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                if(substr($current_url, -1) !== '/') {
                    $current_url .= '/';
                }

                $home_url = home_url();
                if(substr($home_url, -1) !== '/') {
                    $home_url .= '/';
                }

                $site_url = site_url();
                if(substr($site_url, -1) !== '/') {
                    $site_url .= '/';
                }

                $network_home_url = network_home_url();
                if(substr($network_home_url, -1) !== '/') {
                    $network_home_url .= '/';
                }

                if(!isset($_GET['cs_preview']) && $pt_minigo['display-on'] === 'root') {
                    if($current_url !== $home_url || $current_url !== $site_url || $current_url !== $network_home_url) {
                        return false;
                    }
                }

                if(!isset($_GET['cs_preview']) && $pt_minigo['display-on'] === 'custom' && !empty($pt_minigo['custom-urls-list'])) {
                    $urls = explode("\n", str_replace("\r\n", "\n", trim($pt_minigo['custom-urls-list'])));
                    $expression = array();
                    foreach($urls as $url) {
                        $url = trim($url);
                        $url = preg_quote($url, '/');
                        $url = str_replace('\*', '(.*?)', $url).'\/?'.'$';
                        $expression[] = $url;
                    }

                    if(empty($expression)) {
                        throw new Exception('Expression creation failed');
                    }

                    $expression = '/'.implode('|', $expression).'/';
                    $expressionMatches = preg_match($expression, $current_url);
                    if( $expressionMatches === false ) {
                        throw new Exception('URL match regex error');
                    }

                    if($expressionMatches === 0 && $pt_minigo['custom-urls-mode'] === 'whitelist') {
                        return false;
                    }

                    if($expressionMatches === 1 && $pt_minigo['custom-urls-mode'] === 'blacklist') {
                        return false;
                    }
                }
            } catch(Exception $e) {
                if(isset($_REQUEST['premio_debug'])) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
            }

            if(!is_admin()){
                if(!is_feed()){
                    if ( !is_user_logged_in() || (isset($_GET['cs_preview']))) {
                        if(!empty($_POST) && (isset($_POST['minigo_contact']) || isset($_POST['minigo_subscribe']))) {
                            if ( !wp_verify_nonce($_POST['_wpnonce'], 'minigo-contact') && !wp_verify_nonce($_POST['_wpnonce'], 'minigo-subscribe') ) {
                                exit( 'Nonce failed.' );
                            }
                            ob_start();
                            $protocol = "HTTP/1.0";
                            if ( "HTTP/1.1" == $_SERVER["SERVER_PROTOCOL"] ) {
                                $protocol = "HTTP/1.1";
                            }
                            header( "$protocol 200 OK", true, 200 );
                            include plugin_dir_path(dirname(__FILE__)).'template/mailListHandler.php';
                            ob_end_flush();
                            exit;
                        }
                        ob_start();
                        if ($pt_minigo['comingsoon-enabled'] == 'maintenance_mode' && !isset($_GET['cs_preview'])) {
                            $this->send_503();
                        }

                        show_admin_bar(false);
                        remove_action('wp_head', '_admin_bar_bump_cb');
                        $file = plugin_dir_path(dirname(__FILE__)).'template/site.php';
                        // print_r($file);
                        include($file);
                        ob_end_flush();
                        exit();
                    }
                }
            }
        }

        /**
         *  Send 503
         */
        function send_503() {
            global $pt_minigo;

            $protocol = "HTTP/1.0";

            if ( "HTTP/1.1" == $_SERVER["SERVER_PROTOCOL"] ) {
                $protocol = "HTTP/1.1";
            }

            $retryAfter = strtotime( $pt_minigo['countdown-targetDate'] . ' ' . $pt_minigo['countdown-targetHour'] . ':' . $pt_minigo['countdown-targetMinutes'] ) - time();
            if($retryAfter < 0) {
                $retryAfter = 3600;
            }
            header( "Content-type: text/html; charset=UTF-8" );
            header( "$protocol 503 Service Unavailable", true, 503 );
            header( "Retry-After: $retryAfter" );
        }
    }
}
?>