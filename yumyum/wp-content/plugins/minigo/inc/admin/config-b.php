<?php

class PremioThemes_ComingSoon_Admin {

    function __construct() {

        global $minigo_path;
        global $minigo_url;
        global $minigo_version;

        $args = array();
        $tabs = array();

        // GLOBAL Redux Settings
        $args = array(
            'opt_name'               => 'pt_minigo',     // Set a custom option name. Don't forget to replace spaces with underscores!
            'disable_tracking'       => true,            // Disables Redux Tracking
            'allow_sub_menu'       => true,            // Disables Redux Tracking
            'dev_mode'               => false,           // This is the variable that enables or disables Redux’s developer mode. When developer mode is set to true, the load time is displayed at the bottom of the options panel. Also, Redux loads all field and core JavaScript in non minimzed form.
            'update_notice'          => false,           // This variable sets whether or not Redux will display an admin notice when a new build is ready for download via Github. This feature is only available when dev_mode is set to true.
            'hide_expand'            => true,            // Hides Redux Expand button
            'dev_mode_icon_class'    => 'icon-large',    // Set the class for the dev mode tab icon.
            'system_info_icon_class' => 'icon-large',    // Set the class for the system info tab icon.
            'display_name'           => '<img width="96" height="96" src="'.plugins_url( 'img/logo.png' , __FILE__ ).'"><a href="http://www.premiothemes.com/" target="_blank" style="display: none;" class="premiothemes-logo"><img width="150" height="30" src="'.plugins_url( 'img/premiothemes-logo.png' , __FILE__ ).'"></a>', // This variable sets the title that appears at the top of the options panel.
            'display_version'        => '<h3>MiniGO WP Plugin<small>Version : '.$minigo_version.'</small></h3>', // This variable set the version number that appears after the title at the top of the options panel.
            'google_update_weekly'   => false,           // This will only function if you have a google_api_key provided. This argument tells the core to grab the Google fonts cache weekly, ensuring your font list is always up to date.
            'async_typography'       => true,            // This variable determines if Google fonts load on the front-end of a theme asynchronously . 
            'admin_bar'              => false,           // Show the panel pages on the admin bar
            'import_icon_class'      => 'icon-large',    // Set the class for the import/export tab icon.
            'default_icon_class'     => 'icon-large',    // Set default icon class for all sections and tabs
            'menu_title'             => __('MiniGO Options', 'pt-minigo'),  // Set a custom title for the options page.
            'page_title'             => __('MiniGO Options', 'pt-minigo'),  // Set a custom page title for the options page.
            'page_slug'              => 'minigo_options',                   // Set a custom page slug for options page (wp-admin/themes.php?page=***).
            'default_show'           => false,           // This is the variable that enabled or disables whether or not the field’s default value is displayed by the field’s title.
            'default_mark'           => '*',             // This is the variable specifies the symbol to print by the field’s title when the default value is shown. default_show must be set to true. The * symbol is recommended.
            'show_options_object'    => false            // Removes the Options Object Tab even on localhost
            );

        // Set a custom menu icon.
        if ( version_compare( get_bloginfo( 'version' ), '3.8', '>=' ) ) {
            $args['menu_icon'] = 'dashicons-marker';
        }

        // Add HTML before the form.
        if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
            if (!empty($args['global_variable'])) {
                $v = $args['global_variable'];
            } else {
                $v = str_replace("-", "_", $args['opt_name']);
            }
            $args['intro_text'] = '<a href="http://www.premiothemes.com/minigo/help/wp-plugin/" target="_blank" class="button pt-admin-button btn-docs"><i class="fa fa-life-buoy"></i>'.__('Online Documentation', 'pt-minigo').'</a><a href="'.site_url().'?cs_preview'.'" target="_blank" class="button pt-admin-button btn-preview"><i class="fa fa-eye"></i>'.__('Preview', 'pt-minigo').'</a>';
        } 

        // Set footer/credit line.
        $args['footer_credit'] = '&nbsp;';

        $sections = array();

        //Background Animations Reader
        $anims_path = $minigo_path . 'inc/admin/img/animations/';
        $anims_url  = $minigo_url . 'inc/admin/img/animations/';
        $anims      = array();

        if ( is_dir( $anims_path ) ) :

            if ( $anims_dir = opendir( $anims_path ) ) :
                $anims = array();
                while ( ( $anims_file = readdir( $anims_dir ) ) !== false ) {
                    if( stristr( $anims_file, '.png' ) !== false || stristr( $anims_file, '.jpg' ) !== false ) {
                        $name = explode(".", $anims_file);
                        $name = str_replace('.'.end($name), '', $anims_file);
                        $anims[] = array( 'alt'=>$name,'img' => $anims_url . $anims_file );
                    }
                }
            endif;
        endif;

        //Background Patterns Reader
        $patterns_path = $minigo_path . 'template/images/patterns/';
        $patterns_url  = $minigo_url . 'template/images/patterns/';
        $patterns      = array();

        if ( is_dir( $patterns_path ) ) :

            if ( $patterns_dir = opendir( $patterns_path ) ) :
                $patterns = array();
                while ( ( $patterns_file = readdir( $patterns_dir ) ) !== false ) {
                    if( stristr( $patterns_file, '.png' ) !== false || stristr( $patterns_file, '.jpg' ) !== false ) {
                        $name = explode(".", $patterns_file);
                        $name = str_replace('.'.end($name), '', $patterns_file);
                        $patterns[] = array( 'alt'=>$name,'img' => $patterns_url . $patterns_file );
                    }
                }
            endif;
        endif;

        // Team Members Vars
        // $profiles_url = $minigo_url . 'template/images/content/profiles/';
        $profiles_url = 'http://premiothemes.com/demos/minigo/assets/template/images/content/profiles/';

        // Control Panel Settings Below
        // ============================

        // MAIN SHORTCODE MENU
        $sections[] = array(
            'title' => __('Main Settings', 'pt-minigo'),
            // 'desc' => __('Start setting up MiniGO here :)', 'pt-minigo'),
            'icon' => 'el-icon-wrench',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'comingsoon-enabled',
                    'type' => 'button_set',
                    'title' => __('Plugin Mode', 'pt-minigo'),
                    'desc' => '<ul><li><i class="fa fa-power-off"></i><strong>' . __('Off', 'pt-minigo') . '</strong><br/> ' . __('MiniGO will only be displayed in the preview mode.', 'pt-minigo') . '</li>'.
                                  '<li><i class="fa fa-bullhorn"></i><strong>' . __('Plugin On', 'pt-minigo') . '</strong><br/>  ' . __('Visitors will see MiniGO while you work on your theme.','pt-minigo') . '<br/><em>' . __('HTTP codes will be normal so search bots will index MiniGO.', 'pt-minigo') . '</em></li>' . 
                                  '<li><i class="fa fa-gears"></i><strong>' . __('Maintenance', 'pt-minigo') . '</strong><br/>  ' . __('Use whenever you\'re doing work on an existing website.','pt-minigo') . '<br/><em>' . __('This keeps the search engine bots from indexing MiniGO by sending a HTTP 503 header.', 'pt-minigo') . '</em></li></ul>',
                    'options' => array(
                        0 =>'<i class="fa fa-power-off"></i>' . __('Plugin Off', 'pt-minigo'),
                        'coming_soon' => '<i class="fa fa-bullhorn"></i>' . __('Plugin On', 'pt-minigo'),
                        'maintenance_mode' => '<i class="fa fa-gears"></i>' . __('Maintenance', 'pt-minigo'),
                        ),
                    'subtitle'=> __('Choose the mode in which you want the plugin to operate in.', 'pt-minigo').'<br><strong class="desc-note">'.__('Note that, when enabled, the plugin will only be visible to visitors that aren\'t logged in.', 'pt-minigo').'</strong>',
                    'default' => 'coming_soon'
                    ),
                // Where to display MiniGO
                array(
                    'id' => 'display-on',
                    'type' => 'button_set',
                    'title' => __('Display MiniGO on:', 'pt-minigo'),
                    'subtitle' => __('You can use MiniGO to placehold the entire site, just the front page or a custom list of urls. Quite handy.', 'pt-minigo'),
                    'options' => array(
                        'all' => __('Entire site', 'pt-minigo'),
                        'root' => __('Front page', 'pt-minigo'),
                        'custom' => __('Custom URL list', 'pt-minigo')
                        ),
                    'default' => 'all'
                    ),

                // Custom URLs
                array(
                    'id'        => 'section-custom-urls-start',
                    'type'      => 'section',
                    'indent'    => true,
                    'required' => array('display-on', '=','custom')
                    ),
                array(
                    'id' => 'custom-urls-mode',
                    'type' => 'radio',
                    'title'     => __('Custom URL list mode', 'pt-minigo'),
                    'options' => array(
                        'whitelist' => '<strong>' . __('Whitelist','pt-minigo') . '</strong> - ' . __('MiniGO will only be displayed for the <strong>Custom URLs</strong> specified in the field below.', 'pt-minigo'),
                        'blacklist' => '<strong>' . __('Blacklist','pt-minigo') . '</strong> - ' . __('MiniGO will be displayed for all URLs except for the <strong>Custom URLs</strong> specified in the field below.', 'pt-minigo'),
                        ),
                    'default' => 'whitelist',
                    'required' => array('display-on', '=','custom')
                    ),
                array(
                    'id'=>'custom-urls-list',
                    'type' => 'textarea',
                    'title' => __('Custom URLs', 'pt-minigo'),
                    'subtitle'=> __('Write URLs one per line, including the http:// part of the url.', 'pt-minigo').'<br>'.__('You can use an asterisk * as a wildcard.', 'pt-minigo').
                                    '<p>'.__('For example: ', 'pt-minigo').'<code>http://example.com/blog/</code> '.__('only matches that exact URL while' , 'pt-minigo').'<code>http://example.com/blog/*</code> '.__('would match any URL starting with ', 'pt-minigo').'http://example.com/blog/ <p>
                                    <p>'.__('Also,', 'pt-minigo').' <code>http://*example.com/blog/</code> '.__('would match', 'pt-minigo').' http://example.com/blog/ '.__('as well as', 'pt-minigo').' http://www.example.com/blog/ '.__('or any other subdomain.', 'pt-minigo').'</p>',
                    "default"       => home_url().'*',
                    'required' => array('display-on', '=','custom'),
                    ),
                array(
                        'id'        => 'section-custom-urls-end',
                        'type'      => 'section',
                        'indent'    => false,
                        'required' => array('display-on', '=','custom'),
                    ),
                // array(
                //     'id' => 'share-shortcodes',
                //     'type' => 'switch',
                //     'title' => __('Share MiniGO Shortcodes?', 'pt-minigo'),
                //     'subtitle' => __('Turn on if you want to use MiniGO Shortcodes in your Theme (even if MiniGO is Off).', 'pt-minigo'),
                //     'default' => 0
                // ),
            )
        );

        // Skin Selection
        $sections[] = array(
            'id' => 'skin-section',
            'subsection' => true,
            'title' => ''.__('Skin Selection', 'pt-minigo'),
            'icon' => 'el-icon-eye-open',
            // 'icon' => 'fa fa-plus',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'switch-themes',
                    'type' => 'radio',
                    'title' => __('Choose a Base (Skin)', 'pt-minigo'),
                    'subtitle' => __('After you load a base you can then customize it via the admin options as well as custom css.', 'pt-minigo').'<br><strong class="desc-note">'.__('Loading a base replaces all your options including content, so, ideally, set this up to your liking before you start building your content, otherwise make sure to back it up.', 'pt-minigo').'</strong>',
                    'options' => array(
                        'skin-01' => __('v3 Dark - 3D, Fully Featured', 'pt-minigo'),
                        'skin-02' => __('v3 White - One Page, All Features ', 'pt-minigo'),
                        'skin-03' => __('Original Dark - Simple, Clean Base', 'pt-minigo'),
                        'skin-04' => __('Original Light - Simple, Clean Base', 'pt-minigo'),
                        'skin-05' => __('5 Minutes - Minimal, Quick Page', 'pt-minigo'),
                        'skin-06' => __('Studio - One Page, Left Menu', 'pt-minigo'),
                        'skin-07' => __('Freelancer - One Page, Right Menu', 'pt-minigo'),
                        'skin-08' => __('Startup - 3D, Split Bottom Menu', 'pt-minigo'),
                        'skin-09' => __('Product - One Page, Top Menu', 'pt-minigo'),
                        'skin-10' => __('Landing - One Page, No Menu', 'pt-minigo'),
                        'skin-11' => __('App - 3D, Bottom Menu', 'pt-minigo'),
                        'skin-12' => __('Cafe - One Page, Left Menu', 'pt-minigo'),
                        'skin-13' => __('Maintenance - 3D, Corner Menu', 'pt-minigo'),
                        'skin-14' => __('Automotive - 3D, Split Menu', 'pt-minigo'),
                        'skin-15' => __('Resume - One Page, Corner Menu', 'pt-minigo'),
                        'skin-16' => __('Domain Sale - 3D, Left Menu', 'pt-minigo')
                    ),
                    'default' => 'skin-1'
                ),
            )
        );

        // Site Options
        $sections[] = array(
            'id' => 'content-section',
            'title' => ''.__('Site Options', 'pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-adjust-alt',
            'icon-class' => 'icon-large',
            'fields' => array(

                array(
                    'id'=>'site-title',
                    'type' => 'text',
                    'title' => __('Site Title', 'pt-minigo'),
                    'subtitle'=> __('Used as the window/tab title.', 'pt-minigo'),
                    "default"       => 'MiniGO - Uber Minimal Flat Coming Soon WP Plugin',
                    ),
                array(
                    'id'=>'logo',
                    'type' => 'media',
                    'preview' => true,
                    'url'=> false,
                    'title' => __('Logo', 'pt-minigo'),
                    'desc'=> __('Use the <em>Logo Width</em> and <em>Logo Height</em> settings below if you want to force a certain size. For example, set it to half the actual logo size to make it look sharper on Retina displays.', 'pt-minigo'),
                    'subtitle' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-logo]</strong> '.__('shortcode in your pages.', 'pt-minigo'),
                    'default' => array('url' => 'http://premiothemes.com/demos/minigo/assets/template/images/logo.png')
                    ),
                array(
                    'id'=>'logo-width',
                    'type' => 'text',
                    'title' => __('Logo Width', 'pt-minigo'),
                    'subtitle'=> __('Maximum width in pixels.', 'pt-minigo'),
                    "default"       => '141',
                    "validate" => 'numeric'
                    ),
                array(
                    'id'=>'logo-height',
                    'type' => 'text',
                    'title' => __('Logo Height', 'pt-minigo'),
                    'subtitle'=> __('Maximum height in pixels.', 'pt-minigo'),
                    "default"       => '141',
                    "validate" => 'numeric'
                    ),
                array(
                    'id'=>'favicon',
                    'type' => 'media',
                    'preview' => true,
                    'url'=> false,
                    'title' => __('Favicon', 'pt-minigo'),
                    'desc'=> __('Use a 16x16 .ico or .png file.', 'pt-minigo'),
                    'subtitle' => __('This is the icon displayed in the browser title bar.', 'pt-minigo'),
                    'default' => array('url' => $minigo_url . 'template/favicon.ico')
                    ),
                array(
                    'id' => 'seo-section',
                    'type' => 'section',
                    'indent' => true,
                    'title' => ''.__('SEO Options', 'pt-minigo'),
                    'subtitle' => __('Here you can edit your meta tags to help search engines index and list your site.','pt-minigo').'<br>'.__('Please note that once indexed, it will take a while for search engines to update your SERP snippet (text that shows up in searches) if you decide to change it after indexing.', 'pt-minigo'),
                ),
                array(
                    'id'=>'meta-title',
                    'type'=>'text',
                    'title' => __('Meta Title', 'pt-minigo'),
                    'subtitle' => __('This typically shows up as the title for your search engine listing.', 'pt-minigo') . '<br>' . __('Ideally try to keep it under 50 characters, after 70 google truncates it.', 'pt-minigo') .'<br>' . __('This tool helps: ', 'pt-minigo') . '<a href="http://www.serpsimulator.com/" target="_blank">' . __('Serp Simulator', 'pt-minigo') . '</a>.',
                ),
                array(
                    'id'=>'meta-description',
                    'type'=>'textarea',
                    'title' => __('Meta Description', 'pt-minigo'),
                    'subtitle' => __('This typically shows up as the short description for your search engine listing.', 'pt-minigo') . '<br>' . __('Ideally up to 200 characters, some text might be truncated by google at 150-160 chars so best keep it short.', 'pt-minigo')
                ),
                array(
                    'id' => 'analytics-code',
                    'type' => 'text',
                    'title' => __('Google Analytics tracking code', 'pt-minigo'),
                    'subtitle' => __('Copy your Tracking ID (UA-XXXXXXXX-X)', 'pt-minigo')
                ),
            )
        );

        // Loader Options
        $sections[] = array(
            'id' => 'loader-section',
            'subsection' => true,
            'title' => ''.__('Loader', 'pt-minigo'),
            'icon' => 'el-icon-hourglass',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'logo-on-loading',
                    'type' => 'switch',
                    'title' => __('Display Logo on loading screen', 'pt-minigo'),
                    'subtitle' => __('Shows your logo while loading.', 'pt-minigo'),
                    'default' => 1
                ),
                array(
                    'id' => 'loader-logo-switcher',
                    'type' => 'button_set',
                    'title' => __('Logo to Show', 'pt-minigo'),
                    'subtitle'=> __('If you want to display a different logo on the loading screen select one here, otherwise leave default.', 'pt-minigo'),
                    'required' => array('logo-on-loading', '=','1'),
                    'options' => array(
                        'default' => 'Default',
                        'custom' => 'Custom',
                        ),
                    'default' => 'default'
                ),
                array(
                    'id'=>'loader-logo',
                    'type' => 'media',
                    'preview' => true,
                    'url'=> false,
                    'title' => __('Logo', 'pt-minigo'),
                    'desc'=> __('Use the <em>Logo Width</em> and <em>Logo Height</em> settings below if you want to force a certain size. For example, set it to half the actual logo size to make it look sharper on Retina displays.', 'pt-minigo'),
                    'subtitle' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-logo]</strong> '.__('shortcode in your pages.', 'pt-minigo'),
                    'required' => array('logo-on-loading', '=','1'),
                    'required' => array('loader-logo-switcher', '=','custom'),
                    'default' => array('url' => 'http://premiothemes.com/demos/minigo/assets/template/images/logo-dark.png')
                    ),
                array(
                    'id'=>'loader-logo-width',
                    'type' => 'text',
                    'title' => __('Logo Width', 'pt-minigo'),
                    'subtitle'=> __('Maximum width in pixels.', 'pt-minigo'),
                    'required' => array('logo-on-loading', '=','1'),
                    'required' => array('loader-logo-switcher', '=','custom'),
                    "default"       => '141',
                    "validate" => 'numeric'
                    ),
                array(
                    'id'=>'loader-logo-height',
                    'type' => 'text',
                    'title' => __('Logo Height', 'pt-minigo'),
                    'subtitle'=> __('Maximum height in pixels.', 'pt-minigo'),
                    'required' => array('logo-on-loading', '=','1'),
                    'required' => array('loader-logo-switcher', '=','custom'),
                    "default"       => '141',
                    "validate" => 'numeric'
                    ),

                array(
                    'id' => 'animated-intro',
                    'type' => 'switch',
                    'title' => __('Animated Page Intro?', 'pt-minigo'),
                    'subtitle' => __('Use a fancy animation after loading is done to display the content. Disable for no animation.', 'pt-minigo'),
                    'default' => 1
                ),
                // array(
                //     'id' => 'loader-animation-style',
                //     'type' => 'button_set',
                //     'title' => __('Loader Animation Style', 'pt-minigo'),
                //     'required' => array('loader-animation', 'equals','1'),
                //     'options' => array(
                //         'dots' => 'Dots',
                //         'spinner' => 'Spinner',
                //         'progress' => 'Progress Bar'
                //         ),
                //     'default' => 'dots'
                // ),
                array(
                    'id' => 'loader-animation-color',
                    'type' => 'color_rgba',
                    'title' => __('Loading Animation Color', 'pt-minigo'),
                    'subtitle' => __('Pick a color to use for the Loading Animation.', 'pt-minigo'),
                    // 'required' => array('loader-animation', 'equals', '1'),
                    'default'  => array(
                        'color' => '#FFF',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'loader-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Loader Background Color', 'pt-minigo'),
                    'subtitle' => __('Background color of the loader screen, solid color is recommended.', 'pt-minigo'),
                    'default'  => array(
                        'color' => '#000',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'gradient-loader',
                    'type' => 'switch',
                    'title' => __('Loader Background Gradient?', 'pt-minigo'),
                    'subtitle' => __('Loader Background Color gets replaced with this gradient.', 'pt-minigo'),
                    'default' => 0
                ),
                array(
                    'id' => 'gradient-loading-backgrounds',
                    'type' => 'color_gradient',
                    'required' => array('gradient-loader', 'equals', '1'),
                    'default' => array(
                        'from' => '#928EAA',
                        'to' => '#4D6168'
                    )
                ),
                array(
                    'id'=>'gradient-loader-color-degree',
                    'type' => 'slider',
                    'required' => array('gradient-loader','equals','1'),
                    'title' => __('Gradient Loader Angle', 'pt-minigo'),
                    'subtitle' => __('If you want more control over the direction of the gradient, you can define an angle.', 'pt-minigo'),
                    'default'   => 270,
                    'min'       => 0,
                    'step'      => 1,
                    'max'       => 360,
                    'display_value' => 'text'
                ),
            )
        );

        // Navigation Options
        $sections[] = array(
            'id' => 'navigation-section',
            'title' => ''.__('Navigation', 'pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-link',
            'icon-class' => 'icon-large',
            'fields' => array(
                // General
                array(
                    'id'        => 'navigation-general-section',
                    'type'      => 'section',
                    'title'      => 'General',
                    'indent'    => true,
                    ),
                array(
                    'id' => 'hash-url',
                    'type' => 'switch',
                    'title' => __('Use Hash Urls', 'pt-minigo'),
                    'subtitle'=> __('Choose whether or not you want to use hash urls: yourwebsite.com/#services', 'pt-minigo'),
                    "default"       => 1,
                ),
                array(
                    'id' => 'navigation-type',
                    'title' => __('Navigation Type', 'pt-minigo'),
                    'subtitle'=> __('One Page Navigation stacks sections below each others and scrolls to each one, where as 3D Navigation keeps them separated on the sides and animates them into view when selected.', 'pt-minigo'),
                    'type' => 'button_set',
                    'options' => array(
                        '3d' => '3D Navigation',
                        'one-page' => 'One Page Navigation'
                        ),
                    'default' => '3d'
                ),
                // Layout
                array(
                    'id'        => 'navigation-layout-section',
                    'type'      => 'section',
                    'title'      => 'Layout',
                    'indent'    => true,
                    ),
                array(
                    'id' => 'navigation-position',
                    'type' => 'button_set',
                    'title' => __('Navigation Position', 'pt-minigo'),
                    'subtitle'=> __('Choose where you would like to display the navigation, vertically.', 'pt-minigo'),
                    'options' => array(
                        'top' => __('Top', 'pt-minigo'),
                        'middle' => __('Middle', 'pt-minigo'),
                        'bottom' => __('Bottom', 'pt-minigo')
                        ),
                    'default' => 'middle'
                ),
                array(
                    'id' => 'navigation-align',
                    'type' => 'button_set',
                    'title' => __('Navigation Alignment', 'pt-minigo'),
                    'subtitle'=> __('Choose where you would like to display the navigation, horizontally.', 'pt-minigo'),
                    'options' => array(
                        'default' => 'Default (Left & Right)',
                        'left' => __('Left', 'pt-minigo'),
                        'center' => __('Center', 'pt-minigo'),
                        'right' => __('Right', 'pt-minigo'),
                        ),
                    'default' => 'default'
                ),
                array(
                    'id' => 'navigation-orientation',
                    'type' => 'button_set',
                    'title' => __('Navigation Orientation', 'pt-minigo'),
                    'subtitle'=> __('Choose the orientation of the navigation, horizontal for in-line, vertical for a stack.', 'pt-minigo'),
                    'options' => array(
                        'vertical' => __('Vertical', 'pt-minigo'),
                        'horizontal' =>  __('Horizontal', 'pt-minigo'),
                        ),
                    'default' => 'vertical'
                ),
                // Style
                array(
                    'id'        => 'navigation-style-section',
                    'type'      => 'section',
                    'title'      => 'Style',
                    'indent'    => true,
                    ),
                array(
                    'id' => 'navigation-style',
                    'type' => 'button_set',
                    'title' => __('Navigation Style', 'pt-minigo'),
                    'subtitle'=> __('Changes the style of the Navigation.', 'pt-minigo'),
                    'options' => array(
                        'default' => __('Default', 'pt-minigo'),
                        'huge' => __('Huge', 'pt-minigo'),
                        'large' => __('Large', 'pt-minigo'),
                        'medium' => __('Medium', 'pt-minigo'),
                        'small' => __('Small', 'pt-minigo'),
                        'text' => __('Text', 'pt-minigo'),
                        'tablet' => __('Tablet', 'pt-minigo'),
                        'mobile' => __('Mobile', 'pt-minigo'),
                        // 'expanding' => __('Expanding', 'pt-minigo'),
                        'hide' => __('Hide', 'pt-minigo'),
                        ),
                    'default' => 'huge'
                ),

                array(
                    'id' => 'navigation-labels',
                    'type' => 'button_set',
                    'title' => __('Navigation Labels', 'pt-minigo'),
                    'subtitle'=> __('Choose how to display the navigation labels.', 'pt-minigo'),
                    'options' => array(
                        'always' => __('Always Show', 'pt-minigo'),
                        'hover' => __('Show on Hover', 'pt-minigo'),
                        'never' => __('Never Show', 'pt-minigo'),
                        ),
                    'default' => 'always'
                ),
                array(
                    'id' => 'navigation-adaptive-style',
                    'type' => 'switch',
                    'title' => __('Adaptive Navigation Style?', 'pt-minigo'),
                    'subtitle'=> __('Experimental, adapts the style of the navigation to the users viewport for the best fit.', 'pt-minigo') . __(' Most obvious when you have many pages and big buttons.', 'pt-minigo'),
                    'default' => false,
                ),
                array(
                    'id' => 'navigation-responsive',
                    'type' => 'switch',
                    'title' => __('Responsive Navigation?', 'pt-minigo'),
                    'subtitle'=> __('Turn responsive behavior on or off for mobile devices.', 'pt-minigo') . __('It\'s recommended you keep this option turned on unless you\'re doing special customizations requiring it off.', 'pt-minigo'),
                    'default' => true,
                ),
                array(
                    'id' => 'navigation-style-tablet',
                    'type' => 'button_set',
                    'title' => __('Navigation Style - Tablet', 'pt-minigo'),
                    'subtitle'=> __('Changes the style of the Navigation on Tablet Devices.', 'pt-minigo'),
                    'required' => array('navigation-responsive', 'equals','1'),
                    'options' => array(
                        'default' => __('Default', 'pt-minigo'),
                        'huge' => __('Huge', 'pt-minigo'),
                        'large' => __('Large', 'pt-minigo'),
                        'medium' => __('Medium', 'pt-minigo'),
                        'small' => __('Small', 'pt-minigo'),
                        'text' => __('Text', 'pt-minigo'),
                        'tablet' => __('Tablet', 'pt-minigo'),
                        'mobile' => __('Mobile', 'pt-minigo'),
                        'expanding' => __('Expanding', 'pt-minigo'),
                        'hide' => __('Hide', 'pt-minigo'),
                        ),
                    'default' => 'tablet'
                ),
                array(
                    'id' => 'navigation-style-mobile',
                    'type' => 'button_set',
                    'title' => __('Navigation Style - Mobile', 'pt-minigo'),
                    'subtitle'=> __('Changes the style of the Navigation on Mobile Devices.', 'pt-minigo'),
                    'required' => array('navigation-responsive', 'equals','1'),
                    'options' => array(
                        'default' => __('Default', 'pt-minigo'),
                        'huge' => __('Huge', 'pt-minigo'),
                        'large' => __('Large', 'pt-minigo'),
                        'medium' => __('Medium', 'pt-minigo'),
                        'small' => __('Small', 'pt-minigo'),
                        'text' => __('Text', 'pt-minigo'),
                        'tablet' => __('Tablet', 'pt-minigo'),
                        'mobile' => __('Mobile', 'pt-minigo'),
                        'expanding' => __('Expanding', 'pt-minigo'),
                        'hide' => __('Hide', 'pt-minigo'),
                        ),
                    'default' => 'mobile'
                ),

                // Background
                array(
                    'id'        => 'navigation-background-section',
                    'type'      => 'section',
                    'title'      => 'Background',
                    'indent'    => true,
                    ),

                array(
                    'id' => 'menu-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Navigation Background Color', 'pt-minigo'),
                    'subtitle' => __('Show a background behind the navigation (optional).', 'pt-minigo') . '<br>'. __('Select a color and opacity to apply, set opacity to 0 for none.', 'pt-minigo'),
                    'default'  => array(
                        'color' => '#000',
                        'alpha' => '0'
                    ),
                    'validate' => 'colorrgba',
                ),
                array(
                    'id' => 'menu-background-color-mobile',
                    'type' => 'color_rgba',
                    'title' => __('Navigation Background Color - Mobile', 'pt-minigo'),
                    'subtitle' => __('In mobile view, show a background behind the navigation (recommended).', 'pt-minigo') . '<br>'. __('Select a color and opacity to apply, set opacity to 0 for none.', 'pt-minigo'),
                    'default'  => array(
                        'color' => '#000',
                        'alpha' => '0.95'
                    ),
                    'validate' => 'colorrgba',
                ),
                // Back/Scroll Button
                array(
                    'id'        => 'navigation-back-section',
                    'type'      => 'section',
                    'title'      => 'Back/Scroll Button',
                    'indent'    => true,
                    ),
                array(
                    'id'=>'close-button-label',
                    'type' => 'text',
                    'title' => __('Close Button Label', 'pt-minigo'),
                    'required' => array('navigation-type', 'equals','3d'),
                    'subtitle' => __('The label of the button that appears when navigating away front the front page - 3D Nav Only.', 'pt-minigo'),
                    'default' => 'CLOSE',
                    ),
                array(
                    'id'=>'close-button-icon',
                    'type' => 'select',
                    'title' => __('Close Button Icon', 'pt-minigo'),
                    'subtitle' => __('The icon of the button that appears when navigating away front the front page - 3D Nav Only.', 'pt-minigo'),
                    // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                    'required' => array('navigation-type', 'equals','3d'),
                    'options' => minigo_get_font_awesome_icons(),
                    'class' => 'font-awesome-icons',
                    'default' => 'fa-times-circle'
                    ),
                // To Top
                array(
                    'id' => 'to-top-position',
                    'type' => 'button_set',
                    'title' => __('To Top Position', 'pt-minigo'),
                    'subtitle'=> __('Reposition the To Top Button, One Page Nav Only.', 'pt-minigo'),
                    'required' => array('navigation-type', 'equals','one-page'),
                    'options' => array(
                        'none' =>  __('Don\'t show', 'pt-minigo'),
                        'top-left' =>  __('Top Left', 'pt-minigo'),
                        'top-right' =>  __('Top Right', 'pt-minigo'),
                        'bottom-left' =>  __('Bottom Left', 'pt-minigo'),
                        'bottom-right' =>  __('Bottom Right', 'pt-minigo'),
                        ),
                    'default' => 'bottom-right'
                ),
                array(
                    'id' => 'to-top-text',
                    'type' => 'text',
                    'title' => __('To Top Label', 'pt-minigo'),
                    'subtitle' => __('Text that appears on hovering the Go to Top Button - One Page Nav Only.', 'pt-minigo'),
                    'required' => array('to-top-position', 'not','none'),
                    'required' => array('navigation-type', '=','one-page'),
                    'default' => __('Top', 'pt-minigo'),
                ),
                array(
                    'id'=>'to-top-icon',
                    'type' => 'select',
                    'title' => __('To Top Button Icon', 'pt-minigo'),
                    'subtitle' => __('The icon of the button that top - One Page Nav Only.', 'pt-minigo'),
                    'required' => array('navigation-type', '=','one-page'),
                    'options' => minigo_get_font_awesome_icons(),
                    'class' => 'font-awesome-icons',
                    'default' => 'fa-arrow-up'
                    ),
                // Menu Buttom
                array(
                    'id'        => 'navigation-menu-section',
                'type'      => 'section',
                    'required' => array('navigation-responsive', 'equals','1'),
                    'title'      => 'Menu Button',
                    'subtitle' => __('The button that opens the menu if the Expanding navigation style is used.', 'pt-minigo'),
                    'indent'    => true,
                    ),
                array(
                    'id'=>'menu-button-label',
                    'type' => 'text',
                    'title' => __('Menu Button Label', 'pt-minigo'),
                    'subtitle' => __('The label of the menu button', 'pt-minigo'),
                    'required' => array('navigation-responsive', 'equals','1'),
                    'default' => 'MENU',
                    ),
                array(
                    'id'=>'menu-button-icon',
                    'type' => 'select',
                    'title' => __('Menu Button Icon', 'pt-minigo'),
                    'subtitle' => __('The icon of the menu button.', 'pt-minigo'),
                    // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                    'required' => array('navigation-responsive', 'equals','1'),
                    'options' => minigo_get_font_awesome_icons(),
                    'class' => 'font-awesome-icons',
                    'default' => 'fa-bars'
                    ),
                array(
                    'id'=>'menu-close-button-label',
                    'type' => 'text',
                    'title' => __('Menu Close Button Label', 'pt-minigo'),
                    'subtitle' => __('The label of the menu button', 'pt-minigo'),
                    'required' => array('navigation-responsive', 'equals','1'),
                    'default' => 'CLOSE',
                    ),
                array(
                    'id'=>'menu-close-button-icon',
                    'type' => 'select',
                    'title' => __('Menu Close Button Icon', 'pt-minigo'),
                    'subtitle' => __('The icon of the menu button.', 'pt-minigo'),
                    // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                    'required' => array('navigation-responsive', 'equals','1'),
                    'options' => minigo_get_font_awesome_icons(),
                    'class' => 'font-awesome-icons',
                    'default' => 'fa-close'
                    ),

            )
        );

        // Footer Options
        $sections[] = array(
            'id' => 'footer-section',
            'title' => ''.__('Footer Navigation', 'pt-minigo'),
            'subtitle' => __('Serves as a footer or sidebar, shows the icon links that you can set up in the shortcodes area.','pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-link',
            'icon-class' => 'icon-large',
            'fields' => array(

                    array(
                        'id' => 'footer-show',
                        'type' => 'switch',
                        'title' => __('Show Footer?', 'pt-minigo'),
                        'subtitle' => __('Display the Icon Menu as a footer?.', 'pt-minigo'),
                        'default' => true,
                    ),
                    // Footer Visibility
                    array(
                    'id'        => 'footer-visibility-section',
                    'type'      => 'section',
                    'title'      => 'Style',
                    'required' => array('footer-show', 'equals','1'),
                    'indent'    => true,
                    ),
                    array(
                        'id' => 'footer-visibility',
                        'type' => 'button_set',
                        'title' => __('Footer Visibility', 'pt-minigo'),
                        'subtitle' => __('Controls on which devices the footer is displayed.', 'pt-minigo'),
                        'required' => array('footer-show', 'equals','1'),
                        'options' => array(
                            'default' => 'Default',
                            'desktop' => 'Only Desktop',
                            'mobile' => 'Only Mobile Devices',
                            'all' => 'All'
                            // 'None' => 'None'
                            ),
                        'default' => 'default' 
                    ),
                    // Style
                    array(
                    'id'        => 'foooter-style-section',
                    'type'      => 'section',
                    'title'      => 'Style',
                    'required' => array('footer-show', 'equals','1'),
                    'indent'    => true,
                    ),
                    array(
                        'id' => 'footer-size',
                        'type' => 'button_set',
                        'title' => __('Footer Sizing', 'pt-minigo'),
                        'subtitle' => __('Controls the size of the footer links and labels.', 'pt-minigo'),
                        'required' => array('footer-show', 'equals','1'),
                        'options' => array(
                            'small' => 'Small Icons',
                            'medium' => 'Medium Icons',
                            'large' => 'Large Icons'
                            ),
                        'default' => 'medium'
                    ),
                    // Layout
                    array(
                    'id'        => 'foooter-layout-section',
                    'type'      => 'section',
                    'title'      => 'Layout',
                    'required' => array('footer-show', 'equals','1'),
                    'indent'    => true,
                    ),
                    array(
                        'id' => 'footer-vertical-position',
                        'type' => 'button_set',
                        'title' => __('Footer Vertical Position', 'pt-minigo'),
                        'subtitle' => __('You can position the footer bar at the top, middle or bottom of the screen.', 'pt-minigo'),
                        'required' => array('footer-show', 'equals','1'),
                        'options' => array(
                            'top' => 'Top',
                            'middle' => 'Middle',
                            'bottom' => 'Bottom'
                            ),
                        'default' => 'bottom'
                    ),
                    array(
                        'id' => 'footer-horizontal-align',
                        'type' => 'button_set',
                        'title' => __('Footer Horizontal Align', 'pt-minigo'),
                        'subtitle' => __('You can align the footer bar to the left, center or right of the screen.', 'pt-minigo'),
                        'required' => array('footer-show', 'equals','1'),
                        'options' => array(
                            'left' => 'Left',
                            'center' => 'Center',
                            'right' => 'Right'
                            ),
                        'default' => 'center'
                    ),
                    array(
                        'id' => 'footer-orientation',
                        'type' => 'button_set',
                        'title' => __('Footer Orientation', 'pt-minigo'),
                        'subtitle' => __('Choose the orientation of the footer, horizontal for in-line, vertical for a stack.', 'pt-minigo'),
                        'required' => array('footer-show', 'equals','1'),
                        'options' => array(
                            'horizontal' => 'Horizontal',
                            'vertical' => 'Vertical',
                            ),
                        'default' => 'horizontal'
                    ),

                    // Background
                    array(
                    'id'        => 'foooter-background-section',
                    'type'      => 'section',
                    'title'      => 'Background',
                    'required' => array('footer-show', 'equals','1'),
                    'indent'    => true,
                    ),
                    array(
                        'id' => 'footer-background-color',
                        'type' => 'color_rgba',
                        'title' => __('Footer Background Color', 'pt-minigo'),
                        'subtitle' => __('Show a background behind the footer (optional).', 'pt-minigo') . '<br>'. __('Select a color and opacity to apply, set opacity to 0 for none.', 'pt-minigo'),
                        'required' => array('footer-show', 'equals','1'),
                        // 'required' => array('always-show-footer-background', 'equals', '1'),
                        'default'  => array(
                            'color' => '#000',
                            'alpha' => '0'
                        ),
                        'validate' => 'colorrgba',
                    ),
                    array(
                        'id' => 'footer-background-color-mobile',
                        'type' => 'color_rgba',
                        'title' => __('Footer Background Color - Mobile', 'pt-minigo'),
                        'subtitle' => __('In mobile view, show a background behind the footer (recommended).', 'pt-minigo') . '<br>'. __('Select a color and opacity to apply, set opacity to 0 for none.', 'pt-minigo'),
                        'required' => array('footer-show', 'equals','1'),
                        // 'required' => array('always-show-footer-background', 'equals', '1'),
                        'default'  => array(
                            'color' => '#000',
                            'alpha' => '0.9'
                        ),
                        'validate' => 'colorrgba',
                    ),
                    // array(
                    //     'id' => 'show-footer-text',
                    //     'type' => 'switch',
                    //     'title' => __('Show Text in Footer?', 'pt-minigo'),
                    //     'default' => false,
                    // ),
                    // array(
                    // 'id'=>'footer-content',
                    // 'type' => 'editor',
                    // 'title' => __('Footer Content', 'pt-minigo'),
                    // 'required' => array('footer-show', 'equals','1'),
                    // 'required' => array('show-footer-text', 'equals','1'),
                    // 'args' => array(
                    //     'teeny' => false,
                    //     'textarea_rows' => 20
                    // ),
                    // 'default' => 'Copyright ©2016 <a href="http://premiothemes.com" target="_blank">PremioThemes</a>. All rights reserved.',
                    // ),
            )
        );

        // Background Settings
        $sections[] = array(
            'id' => 'background-settings-section',
            'title' => ''.__('Background', 'pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-picture',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id'=>'background-color',
                    'type' => 'color',
                    'title' => __('Background Color', 'pt-minigo'),
                    'subtitle'=> __('The main background color.', 'pt-minigo'),
                    "default" => '#222',
                    'validate' => 'color'
                    ),

                array(
                    'id'=>'background-type',
                    'type' => 'radio',
                    'title' => __('Background Type', 'pt-minigo'),
                    'subtitle' => '<p>'.__('Choose whether you want a solid background, a slideshow or a video as background.', 'pt-minigo').'</p><p>'.__('There are 3 types of slideshow transition effects.', 'pt-minigo').'</p><p>'.__('The Video type uses your own video files, while YouTube allows you to use any YouTube video or playlist.', 'pt-minigo').'</p>',
                    'desc' => '<p><strong>'.__('Important notice : ', 'pt-minigo').'</strong> '.__('Videos don\'t auto-play on iOS devices (iPhone, iPad, iPod). Apple disabled this on purpose. Also, videos will not be loaded on slow network connections on touch devices.', 'pt-minigo').'</p>',
                    'options' => array(
                        'color' => __('Solid Color'),
                        'slideshow-kenburns' => __('Slideshow - Ken Burns'),
                        'slideshow-fade' => __('Slideshow - Fade'),
                        'slideshow-continuousFade' => __('Slideshow - Continuous Fade'),
                        'video' => __('Video'),
                        'youtube' => __('YouTube'),
                        'vimeo' => __('Vimeo')
                    ),
                    'default' => 'slideshow-kenburns'
                    ),

                array(
                    'id'=>'background-slideshow-duration',
                    'type' => 'text',
                    'required' => array('background-type','contains','slideshow'),
                    'title' => __('Time between slides', 'pt-minigo'),
                    'subtitle' => __('Number of seconds each slide is visible for.', 'pt-minigo'),
                    'validate' => 'numeric',
                    'default' => 10,
                    'class' => 'small-text'
                    ),
                array(
                    'id'=>'background-slideshow-kenburns-minScale',
                    'type' => 'text',
                    'required' => array('background-type','equals','slideshow-kenburns'),
                    'title' => __('Ken Burns - Minimum Scale', 'pt-minigo'),
                    'subtitle' => __('Minimum scale of the image. The value will be randomized for every slide within the min/max limits.', 'pt-minigo'),
                    'desc' => __('Use a minimum of 1.0', 'pt-minigo'),
                    'validate' => 'numeric',
                    'default' => 1.2,
                    'class' => 'small-text'
                    ),
                array(
                    'id'=>'background-slideshow-kenburns-maxScale',
                    'type' => 'text',
                    'required' => array('background-type','equals','slideshow-kenburns'),
                    'title' => __('Ken Burns - Maximum Scale', 'pt-minigo'),
                    'subtitle' => __('Maximum scale of the image. This value will be randomized for every slide within the min/max limits.', 'pt-minigo'),
                    'desc' => __('This needs to be higher than Minimum Scale.', 'pt-minigo'),
                    'validate' => 'numeric',
                    'default' => 1.7,
                    'class' => 'small-text'
                    ),
                array(
                    'id'=>'background-slideshow-kenburns-minMove',
                    'type' => 'text',
                    'required' => array('background-type','equals','slideshow-kenburns'),
                    'title' => __('Ken Burns - Minimum Movement', 'pt-minigo'),
                    'subtitle' => __('Minimum movement of the image, in percentages. The actual value will be randomized for every slide, all within the min/max limits. Note that this is also limited by the scale because the image needs to stay within the viewport bounds.', 'pt-minigo'),
                    'desc' => __('Use a minimum of 0', 'pt-minigo'),
                    'validate' => 'numeric',
                    'default' => 5,
                    'class' => 'small-text'
                    ),
                array(
                    'id'=>'background-slideshow-kenburns-maxMove',
                    'type' => 'text',
                    'required' => array('background-type','equals','slideshow-kenburns'),
                    'title' => __('Ken Burns - Maximum Movement', 'pt-minigo'),
                    'subtitle' => __('Maximum movement of the image, in percentages. The actual value will be randomized for every slide, all within the min/max limits. Note that this is also limited by the scale because the image needs to stay within the viewport bounds.', 'pt-minigo'),
                    'desc' => __('This needs to be higher than Minimum Movement.', 'pt-minigo'),
                    'validate' => 'numeric',
                    'default' => 15,
                    'class' => 'small-text'
                    ),
                array(
                    'id' => 'background-slideshow-gallery',
                    'type' => 'gallery',
                    'required' => array('background-type','contains','slideshow'),
                    'title' => __('Slideshow Images', 'pt-minigo'),
                    'subtitle' => __('Select the images you want in the slideshow.', 'pt-minigo'),
                    ),

                array(
                    'id'=>'background-video-imageFallback',
                    'type' => 'media',
                    'preview' => true,
                    'url'=> false,
                    'required' => array('background-type','equals', array('video', 'youtube', 'vimeo')),
                    'title' => __('Video Fallback Image', 'pt-minigo'),
                    'subtitle' => __('Fallback image for browsers that can\'t play video (such as mobile devices).', 'pt-minigo'),
                    'default' => array('url' => '')
                    ),

                array(
                    'id'=>'background-video-volume',
                    'type' => 'slider',
                    'required' => array('background-type','equals', array('video', 'youtube', 'vimeo')),
                    'title' => __('Video Volume', 'pt-minigo'),
                    'subtitle' => '<p>'.__('Sets the audio volume of the video. Value range 0 to 100.', 'pt-minigo').'</p><p>'.__('Note that the volume setting doesn\'t work on Phones and Tablets.', 'pt-minigo'),
                    'validate' => 'numeric',
                    "default"       => 0,
                    "min"       => 0,
                    "step"      => 1,
                    "max"       => 100
                    ),
                array(
                    'id'=>'background-video-mp4',
                    'type' => 'media',
                    'mode' => 'video',
                    'url'=> true,
                    'preview' => false,
                    'required' => array('background-type','equals', 'video'),
                    'title' => __('Video File - MP4', 'pt-minigo'),
                    'subtitle' => __('H.264 (mp4) video format file. This one is required because we use it to fall back to Flash playback when HTML5 video support is missing. For example, Firefox only supports this format natively on Windows so on other systems it will fallback to Flash playback which is a bit slower.', 'pt-minigo'),
                    'default' => array('url' => 'http://premiothemes.com/demos/assets/video/bg-video-01.mp4')
                    ),
                array(
                    'id'=>'background-video-webm',
                    'type' => 'media',
                    'mode' => 'video',
                    'url'=> true,
                    'preview' => false,
                    'required' => array('background-type','equals', 'video'),
                    'title' => __('Video File - WebM', 'pt-minigo'),
                    'subtitle' => __('Optional WebM format. WebM files are generally smaller and faster than H.264 and are played by Chrome, Firefox, Opera and Android browsers (which also support H.264).', 'pt-minigo'),
                    'default' => array('url' => 'http://premiothemes.com/demos/assets/video/bg-video-01.webm')
                    ),
                array(
                    'id'=>'background-video-ogg',
                    'type' => 'media',
                    'mode' => 'video',
                    'url'=> true,
                    'preview' => false,
                    'required' => array('background-type','equals', 'video'),
                    'title' => __('Video File - OGG', 'pt-minigo'),
                    'subtitle' => __('Optional OGG format. OGG Video is optional but useful because it’s played natively by Firefox on OSX and Linux.', 'pt-minigo'),
                    'default' => array('url' => 'http://premiothemes.com/demos/assets/video/bg-video-01.ogv')
                    ),

                array(
                    'id'=>'background-youtube-url',
                    'type' => 'text',
                    'required' => array('background-type','equals', 'youtube'),
                    'title' => __('YouTube URL', 'pt-minigo'),
                    'subtitle' => __('The URL of the Youtube Video or Playlist.', 'pt-minigo'),
                    'validate' => 'url',
                    'default' => 'http://www.youtube.com/watch?v=ab0TSkLe-E0',
                    'class' => 'regular-text'
                    ),
                array(
                    'id'=>'background-youtube-startAt',
                    'type' => 'text',
                    'required' => array('background-type','equals', 'youtube'),
                    'title' => __('YouTube Video - Start at', 'pt-minigo'),
                    'subtitle' => __('If you dont’t want the video to start from the very beginning, enter the time offset in seconds.', 'pt-minigo'),
                    'validate' => 'numeric',
                    'default' => 0,
                    'class' => 'small-text'
                    ),
                array(
                    'id'=>'background-youtube-endAt',
                    'type' => 'text',
                    'required' => array('background-type','equals', 'youtube'),
                    'title' => __('YouTube Video - End at', 'pt-minigo'),
                    'subtitle' => __('If you dont’t want the video to end at the very end, enter the time offset <strong>FROM THE BEGINNING</strong> of the video, in seconds. Otherwise leave it at 0.', 'pt-minigo'),
                    'validate' => 'numeric',
                    'default' => 0,
                    'class' => 'small-text'
                    ),
                array(
                    'id'=>'background-vimeo-url',
                    'type' => 'text',
                    'required' => array('background-type','equals', 'vimeo'),
                    'title' => __('Vimeo URL ID', 'pt-minigo'),
                    'subtitle' => __('Enter the ID of your vimeo URL', 'pt-minigo'),
                    'default' => '14715111',
                    'hint' => array(
                        'content' => 'http://vimeo.com/<strong>14715111</strong>',
                        )
                    ),
                array(
                    'id'        => 'background-video-loop',
                    'type'      =>'switch',
                    'title'     => __('Loop Video?', 'pt-minigo'),
                    'subtitle' => __('Replays the video after it finishes.', 'pt-minigo'),
                    'required' => array('background-type','equals', array('video', 'youtube', 'vimeo')),
                    'default'   => 1
                ),
                array(
                    'id'        => 'gradient-color-switch',
                    'type'      =>'switch',
                    'title'     => __('Enable Gradient Background', 'pt-minigo'),
                    'subtitle' => __('Show a gradient layer on top of the background. You can pick the colors, orientation and opacity.', 'pt-minigo'),
                    'default'   => 0
                ),
                array(
                    'id'=>'gradient-color',
                    'type' => 'color_gradient',
                    'title' => __('Gradient Background', 'pt-minigo'),
                    'required' => array('gradient-color-switch', 'equals', '1'),
                    'subtitle' => __('You can remove background gradient by hitting the <strong>clear</strong> button', 'pt-minigo'),
                    'default' => array(
                        'from' => '#fff',
                        'to' => '#fff'
                    )
                    ),
                array(
                    'id' => 'gradient-opacity',
                    'type' => 'text',
                    'title' => __('Gradient Background Opacity', 'pt-minigo'),
                    'validate' => 'numeric',
                    'default' => 0.2,
                    'required' => array('gradient-color-switch', 'equals', '1'),
                    'class' => 'small-text'
                    ),
                array(
                    'id'=>'gradient-color-degree',
                    'type' => 'slider',
                    'title' => __('Gradient Background Angle', 'pt-minigo'),
                    'subtitle' => __('If you want more control ver the direction of the gradient, you can define an angle.', 'pt-minigo'),
                    'required' => array('gradient-color-switch', 'equals', '1'),
                    'default'   => 270,
                    'min'       => 0,
                    'step'      => 1,
                    'max'       => 360,
                    'display_value' => 'text'
                    ),
                array(
                    'id'        => 'js-animation-switch',
                    'type'      =>'switch',
                    'subtitle' => __('Show a fancy Javascript animation on top of the background. You can pick from 30 animations and choose opacity.', 'pt-minigo'),
                    'title'     => __('Enable JS Animation', 'pt-minigo'),
                    'default'   => 0
                ),
                // array(
                //     'id'=>'js-animation-options',
                //     'type' => 'image_select',
                //     'tiles' => true,
                //     'required' => array('js-animation-switch','equals','1'),
                //     'title' => __('JS Animations', 'pt-minigo'),
                //     'subtitle'=> __('Select a JS animation to display.', 'pt-minigo'),
                //     // 'default'       => $anims[0]['img'],
                //     // 'default' => array(
                //     //     'alt' => $anims[0]['alt'],
                //     //     'img' => $anims[0]['img'],
                //     //     ),
                //     'default' => '0',
                //     'options' => $anims
                //     ),
                array(
                    'id'=>'js-animation-options',
                    'type' => 'select',
                    'title' => __('JS Animations', 'pt-minigo'),
                    'required' => array('js-animation-switch','equals','1'),
                    'subtitle'=> __('Select a JS animation to display.', 'pt-minigo'),
                    'options' => array(
                        'animated-color' => __('Animated Color', 'pt-minigo'),
                        'animated-gradients' => __('Animated Gradients', 'pt-minigo'),
                        'bezier-art' => __('Bezier Art', 'pt-minigo'),
                        'bezier-links' => __('Bezier Links', 'pt-minigo'),
                        'color-buzz' => __('Color Buzz', 'pt-minigo'),
                        'color-smoke' => __('Color Smoke', 'pt-minigo'),
                        'confetti' => __('Confetti', 'pt-minigo'),
                        'constellation' => __('Constellation', 'pt-minigo'),
                        'film-grain' => __('Film Grain', 'pt-minigo'),
                        'fireworks' => __('Fireworks', 'pt-minigo'),
                        'floating-particles' => __('Floating Particles', 'pt-minigo'),
                        'fss' => __('FSS', 'pt-minigo'),
                        'glitter-confetti' => __('Glitter Confetti', 'pt-minigo'),
                        'hearts' => __('Hearts', 'pt-minigo'),
                        'molten-metal' => __('Molten Metal', 'pt-minigo'),
                        'mouse-gradient' => __('Mouse Gradient', 'pt-minigo'),
                        'nodes-connection' => __('Nodes Connection', 'pt-minigo'),
                        'particle-explode' => __('Particles Explode', 'pt-minigo'),
                        'particles' => __('Particles', 'pt-minigo'),
                        'quick-rain' => __('Quick Rain', 'pt-minigo'),
                        'radial-gradients' => __('Radial Gradients', 'pt-minigo'),
                        'rain-drops' => __('Rain Drops', 'pt-minigo'),
                        'rainbow-grid' => __('Rainbow Grid', 'pt-minigo'),
                        'rainbow-squares' => __('Rainbow Squares', 'pt-minigo'),
                        'shooting-stars' => __('Shooting Stars', 'pt-minigo'),
                        'snake-bugs' => __('Snake Bugs', 'pt-minigo'),
                        'snow-flakes' => __('Snow Flakes', 'pt-minigo'),
                        'star-field' => __('Star Field', 'pt-minigo'),
                        'water-pipe' => __('Water Pipe', 'pt-minigo'),
                        'xmas' => __('XMas', 'pt-minigo')
                        ),
                    'default' => 'animated-color'
                    ),
                array(
                    'id' => 'js-animation-opacity',
                    'type' => 'text',
                    'title' => __('JS Animation Opacity', 'pt-minigo'),
                    'subtitle' => __('Sets the opacity of the animation. 0 is completely transparent, 1.0 is fully opaque.', 'pt-minigo'),
                    'validate' => 'numeric',
                    'default' => 1,
                    'required' => array('js-animation-switch', 'equals', '1'),
                    'class' => 'small-text'
                    ),
                array(
                    'id'=>'background-pattern',
                    'type' => 'button_set',
                    'title' => __('Pattern Overlay', 'pt-minigo'),
                    'subtitle' => __('You can use a pattern image as overlay over the background slideshow/video. Choose a preset or select Custom to upload your own.', 'pt-minigo'),
                    'options' => array(
                        'off' => __('Off', 'pt-minigo'),
                        'preset' => __('Preset', 'pt-minigo'),
                        'custom' => __('Custom', 'pt-minigo')
                    ),
                    'default' => 'off'
                    ),
                array(
                    'id'=>'background-patternPreset',
                    'type' => 'image_select',
                    'tiles' => true,
                    'required' => array('background-pattern','equals','preset'),
                    'title' => __('Pattern Preset', 'pt-minigo'),
                    'subtitle'=> __('Select a background pattern.', 'pt-minigo'),
                    'default'       => $patterns[0]['img'],
                    'options' => $patterns
                    ),
                array(
                    'id'=>'background-patternCustom',
                    'type' => 'media',
                    'preview' => true,
                    'url'=> false,
                    'required' => array('background-pattern','equals','custom'),
                    'title' => __('Custom Pattern', 'pt-minigo'),
                    'subtitle' => __('Upload your pattern using the WordPress uploader', 'pt-minigo'),
                    'default' => array('url' => '')
                    ),
                array(
                    'id'=>'background-pattern-opacity',
                    'type' => 'text',
                    'required' => array('background-pattern','not','off'),
                    'title' => __('Pattern Opacity', 'pt-minigo'),
                    'subtitle' => __('Sets the opacity of the pattern overlay. 0 is completely transparent, 1.0 is fully opaque.', 'pt-minigo'),
                    'validate' => 'numeric',
                    'default' => 0.2,
                    'class' => 'small-text'
                    ),
                )

        );

        // Contact Settings < More to come
        $sections[] = array(
            'id' => 'contact-settings-section',
            // 'subtitle' => __('In this section you can set the contact information you want the <strong>[minigo-contact-info]</strong> shortcode to display and also set up the [minigo-contact-form] and [minigo-subscribe-form] shortcodes as well.', 'pt-minigo'),
            'title' => ''.__('Contact Settings', 'pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-envelope',
            'icon-class' => 'icon-large',
            'fields' => array(
                    array(
                    'id'=>'global-form',
                    'type' => 'section',
                    'indent' => true,
                    'title' => __('Global Form Settings', 'pt-minigo'),
                    'subtitle'=> __('These settings apply to both the subscription and contact forms.', 'pt-minigo')
                    ),
                    array(
                    'id'=>'form-validation-required',
                    'type' => 'text',
                    'title' => __('Required Field Validation Message', 'pt-minigo'),
                    'subtitle' => __('The message displayed when a required form field is left blank.', 'pt-minigo'),
                    'default' => 'This field is required.',
                    ),
                    array(
                    'id'=>'form-validation-email',
                    'type' => 'text',
                    'title' => __('Email Field Validation Message', 'pt-minigo'),
                    'subtitle' => __('The message displayed when an incorrect e-mail address is entered in any of the e-mail form fields.', 'pt-minigo'),
                    'default' => 'Please enter a valid email address.',
                    ),
            )
        );

        // Contact Form Subsection
        $sections[] = array(
            'id' => 'contact-form-subsection',
            'subsection' => true,
            'title' => __('Contact Form', 'pt-minigo'),
            'desc'=> __('Settings for the Contact Form. It can be displayed anywhere by using the', 'pt-minigo').'<strong> [minigo-contact-form] </strong>'.__('shortcode.', 'pt-minigo'),
            'icon_class' => 'icon-large',
            'icon' => 'el-icon-comment-alt',
            'fields' => array(
                    // Contact Form
                    array(
                    'id'=>'contact-target-address',
                    'type' => 'text',
                    'title' => __('Target E-mail Address', 'pt-minigo'),
                    'subtitle' => __('This is the email address where you’ll receive the contact form messages.', 'pt-minigo'),
                    
                    'default' => get_option( 'admin_email' ),
                    ),
                    array(
                    'id'=>'contact-from-address',
                    'type' => 'text',
                    'title' => __('FROM E-mail Address', 'pt-minigo'),
                    'subtitle' => __('This is the email address from which the messages are sent from.', 'pt-minigo'),
                    'desc' => '<p>'.__('By default, the Contact form FROM email is the same as the Target E-mail Address. However, some hosting providers won\'t allow email being sent from an address that isn\'t configured on the host\'s Mail service. If you are not getting emails from the form try setting this to an address that is properly configured on your host.', 'pt-minigo').'</p>',
                    'default' => ''
                    ),
                    array(
                    'id'=>'contact-subject-prefix',
                    'type' => 'text',
                    'title' => __('E-mail Subject Prefix', 'pt-minigo'),
                    'subtitle' => __('Prefix for the email subject. Useful for filtering mail.', 'pt-minigo'),
                    
                    'default' => 'MiniGO message from - ',
                    ),
                    array(
                    'id'=>'contact-form-name-label',
                    'type' => 'text',
                    'title' => __('Name Field Label', 'pt-minigo'),
                    
                    'default' => 'Your name',
                    ),
                    array(
                    'id'=>'contact-form-email-label',
                    'type' => 'text',
                    'title' => __('Email Field Label', 'pt-minigo'),
                    
                    'default' => 'Your e-mail address',
                    ),
                    array(
                    'id'=>'contact-form-message-label',
                    'type' => 'text',
                    'title' => __('Message Field Label', 'pt-minigo'),
                    
                    'default' => 'Message',
                    ),
                    array(
                    'id'=>'contact-form-button-label',
                    'type' => 'text',
                    'title' => __('Button Label', 'pt-minigo'),
                    
                    'default' => 'SEND MESSAGE',
                    ),
                    array(
                    'id'=>'contact-form-success-message',
                    'type' => 'text',
                    'title' => __('Success Message', 'pt-minigo'),
                    'subtitle' => __('The message displayed after the form is successfully submitted.', 'pt-minigo'),
                    'default' => 'Message sent!',
                    ),
            )
        );

        // Subscribe Form Subsection
        $sections[] = array(
            'id' => 'subscribe-form-subsection',
            'title' => __('Subscribe Form', 'pt-minigo'),
            'desc'=> __('Settings for the Subscribe Form (titled "Get Notified" by default). It can be displayed anywhere by using the', 'pt-minigo'). '<strong> [minigo-subscribe-form] </strong>'.__('shortcode.', 'pt-minigo'),
            'icon_class' => 'icon-large',
            'subsection' => true,
            'icon' => 'el-icon-address-book',
            'fields' => array(
                // Subscribe Form
                array(
                'id'=>'subscribe-form-title',
                'type' => 'text',
                'title' => __('Title', 'pt-minigo'),
                
                'default' => 'Get Notified',
                ),
                array(
                'id'=>'subscribe-form-email-label',
                'type' => 'text',
                'title' => __('Email Field Label', 'pt-minigo'),
                
                'default' => 'Your e-mail address',
                ),
                array(
                'id'=>'subscribe-form-button-label',
                'type' => 'text',
                'title' => __('Button Label', 'pt-minigo'),
                
                'default' => 'GO',
                ),
                array(
                'id'=>'subscribe-form-success-message',
                'type' => 'text',
                'title' => __('Success Message', 'pt-minigo'),
                'subtitle' => __('The message displayed after the form is successfully submitted.', 'pt-minigo'),
                'default' => 'Got it, thank you',
                ),
                array(
                'id'=>'subscribe-use_Mailchimp',
                'type' => 'switch',
                'title' => __('Use MailChimp', 'pt-minigo'),
                'subtitle' => __('Set to Yes if you want to use MailChimp to manage subscribers. If set to No the email addresses will be added to a simple text string.', 'pt-minigo'),
                'on' => 'Yes',
                'off' => 'No',
                'default' => 0,
                ),
                array(
                'id'=>'subscribe-Mailchimp_API_Key',
                'type' => 'text',
                'required' => array('subscribe-use_Mailchimp','=','1'),
                'title' => __('MailChimp API Key', 'pt-minigo'),
                'subtitle' => __('In order to use MailChimp you’ll need an API Key. You can generate API Keys by going to', 'pt-minigo').' <a href="https://admin.mailchimp.com/account/api/" target="_blank">Account settings -> Extras -> API keys</a>',
                
                'default' => '1da1462f73495883e81efd45e324decc-us4',
                ),
                array(
                'id'=>'subscribe-Mailchimp_list_ID',
                'type' => 'text',
                'required' => array('subscribe-use_Mailchimp','=','1'),
                'title' => __('MailChimp List ID', 'pt-minigo'),
                'subtitle' => __('Next you need to create a List in MailChimp and paste it’s ID here. The List ID can be found in the List’s Settings, on the right hand side.', 'pt-minigo'),
                'default' => 'd1a2c1442d',
                ),
                array(
                'id'=>'subscribe-Mailchimp_double_optin',
                'type' => 'switch',
                'required' => array('subscribe-use_Mailchimp','=','1'),
                'title' => __('Use MailChimp Double Opt-in', 'pt-minigo'),
                'subtitle' => __('If set to Yes, it enables Double Opt-in. See the', 'pt-minigo').' <a target="_blank" href="http://kb.mailchimp.com/article/how-does-confirmed-optin-or-double-optin-work/">'.__('this link', 'pt-minigo').'</a> '.__('for reference on how it works.', 'pt-minigo'),
                'on' => 'Yes',
                'off' => 'No',
                'default' => 0,
                ),
                array(
                'id'=>'subscribe-Mailchimp_send_welcome',
                'type' => 'switch',
                'required' => array('subscribe-use_Mailchimp','=','1'),
                'title' => __('Send Welcome email from MailChimp', 'pt-minigo'),
                'subtitle' => __('If Double Opt-in is disabled, you can still send a Welcome message by setting the following to true.', 'pt-minigo').'<br> '.__('The option is ignored if Double Opt-in is on.', 'pt-minigo'),
                'on' => 'Yes',
                'off' => 'No',
                'default' => 0,
                ),
                array(
                'id'=>'raw_info',
                'type' => 'info',
                'required' => array('subscribe-use_Mailchimp','=','0'),
                'raw_html'=>true,
                'desc' => '
                    <table class="form-table form-table-section no-border form-table-section-indented">
                    <tr valign="top" style="display: block;">
                        <th scope="row">
                            <div class="redux_field_th">
                                '.__('Subscribers', 'pt-minigo').'<span style="font-weight: normal;" class="description">'.__('The list of subscribed e-mail addresses.', 'pt-minigo').'</span>
                            </div>
                        </th>
                        <td>
                                <fieldset class="minigo_subscriber_list_form redux-field-container redux-field redux-container-text">
                                    <textarea placeholder="" class="noUpdate large-text" rows="6">'.htmlspecialchars(get_option( 'minigo_subscriber_list' )).'</textarea>
                                    <div class="description field-desc"><p>'.__('The e-mail addresses submited using the \'Get Notified\' form are added to this field when the MailChimp mode is disabled.', 'pt-minigo').'<br>'.__('You can edit or clear the contents and Save the result.', 'pt-minigo').'</p></div>
                                    <input style="margin-top: 10px;" type="submit" class="noUpdate button" value="Save">
                                </fieldset>
                        </td>
                    </tr>
                    </table>',
                ),

            )
        );



        // Audio Settings
        $sections[] = array(
            'id' => 'audio-settings-section',
            'title' => ''.__('Audio', 'pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-volume-down',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'enable-audio',
                    'type' => 'switch',
                    'title' => __('Enable Audio Player?', 'pt-minigo'),
                    'subtitle' => __('Adds an audio player to the site.', 'pt-minigo'),
                    'default' => 0,
                ),
                array(
                    'id' => 'audio-switch',
                    'type' => 'button_set',
                    'title' => __('Local or URL Audio Track', 'pt-minigo'),
                    'required' => array('enable-audio', '=', '1'),
                    'options' => array(
                        'local' => 'Local Audio File',
                        'url' => 'URL Audio File'
                    ),
                    'default' => 'url'
                ),
                array(
                    'id' => 'audio-track',
                    'title' => __('Upload Mp3 File', 'pt-minigo'),
                    'subtitle' => __('Upload your track locally.', 'pt-minigo'),
                    'type' => 'media',
                    'required' => array(
                        array('enable-audio', '=', '1'),
                        array('audio-switch','=','local')
                    ),
                    'url' => true,
                    'mode' => false,
                    'compiler' => true
                ),
                array(
                    'id' => 'url-audio-track',
                    'type' => 'text',
                    'title' => __('Play audio track from url', 'pt-minigo'),
                    'subtitle' => __('Play Audio directly from URL.', 'pt-minigo'),
                    'required' => array(
                        array('enable-audio', '=', '1'),
                        array('audio-switch','!=','local')
                    ),
                    'default' => 'http://premiothemes.com/demos/assets/audio/wathne-lounge.mp3'
                ),
                array(
                    'id' => 'track-name',
                    'type' => 'text',
                    'title' => __('Track Name', 'pt-minigo'),
                    'subtitle' => __('Optional, shows up as tooltip for Audio Controls.', 'pt-minigo'),
                    'required' => array('enable-audio', '=', '1'),
                    'default' => 'Optional Track Name to Display'
                ),
                array(
                    'id' => 'audio-volume',
                    'type' => 'slider',
                    'title' => __('Control your speakers', 'pt-minigo'),
                    'subtitle' => __('Set the volume, 0 = off, 1 = full', 'pt-minigo'),
                    'required' => array('enable-audio', '=', '1'),
                    'default'       => 0.8,
                    'resolution' => 0.1,
                    'step' => .1,
                    'min'       => 0,
                    'max'       => 1
                ),
                array(
                    'id' => 'audio-controls',
                    'type' => 'switch',
                    'title' => __('Audio Controls', 'pt-minigo'),
                    'subtitle' => __('Display the music on/off button?', 'pt-minigo') . '<br>' . __('* The controls show up in the footer if enabled or icon menu shortcode.', 'pt-minigo'),
                    'required' => array('enable-audio', '=', '1'),
                    'default' => 1
                ),
                array(
                    'id' => 'audio-autoplay',
                    'type' => 'switch',
                    'required' => array('enable-audio', '=', '1'),
                    'title' => __('Autoplay Audio Track ?', 'pt-minigo'),
                    'subtitle' => __('You can start playing as soon as the site is loaded.', 'pt-minigo'),
                    'default' => 1,
                ),
                array(
                    'id' => 'audio-loop',
                    'type' => 'switch',
                    'required' => array('enable-audio', '=', '1'),
                    'title' => __('Loop Audio Track ?', 'pt-minigo'),
                    'subtitle' => __('Once the song has finished, should it be played again?', 'pt-minigo'),
                    'default' => 1,
                )
            )
        );


        // Custom Code
        $sections[] = array(
            'id' => 'custom-code-section',
            'title' => ''.__('Custom Code', 'pt-minigo'),
            'desc' => __('You can add custom code to MiniGO in order to further customize and extend it.', 'pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-align-justify',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id'=>'custom-css',
                    'type' => 'ace_editor',
                    'title' => __('Custom CSS', 'pt-minigo'),
                    'subtitle' => __('Paste your CSS code here.', 'pt-minigo'),
                    'mode' => 'css',
                    //'theme' => 'monokai',
                    'desc' => __('Use this field to customize the layout or style of your MiniGO install.', 'pt-minigo'),
                    'default' => ''
                    ),
                array(
                    'id'=>'custom-html',
                    'type' => 'ace_editor',
                    'title' => __('Custom HTML', 'pt-minigo'),
                    'subtitle' => __('Paste your HTML code here.', 'pt-minigo'),
                    'mode' => 'html',
                    //'theme' => 'monokai',
                    'desc' => __('Inserts HTML before the closing', 'pt-minigo').' &lt;/body&gt; '.__('tag. For example, it can be used to add tracking code. If you\'re using Google Analytics, visit the SEO tab.', 'pt-minigo'),
                    'default' => ''
                    ),
            )
        );

        // MAIN PAGE MENU
        $sections[] = array(
            'id' => 'page-options-section',
            'title' => __('Pages', 'pt-minigo'),
            'icon' => 'el-icon-file-edit',
            'icon-class' => 'icon-large',
            'desc' => 
                '<p>'.__('In this section you can set up page options, then select each page to enable/disable it and and edit the content.', 'pt-minigo').'</p>'.
                '<p>'.__('Please use the "Widget" and "Content" dropdowns in the editor to add shortcodes to your pages.', 'pt-minigo').'</p>'.
                '<h4 class="shortcode-list-heading">'.__('The following shortcodes are available:', 'pt-minigo').'</h4>'.
                '<div class="shortcodes-list-holder">
                    <ul class="shortcodes-list shortcodes-left">
                        <li class="shortcodes-list-title"><h4>'.__('Widget Shortcodes', 'pt-minigo').'</h4></li>
                        <li class="help-addthis"><i class="fa fa-plus-square-o"></i><strong>[minigo-addthis]</strong><span> - '.__('Displays the AddThis social sharing widget block.', 'pt-minigo').'</span></li>
                        <li class="help-contact-form"><i class="fa fa-pencil"></i><strong>[minigo-contact-form]</strong><span> - '.__('Displays the Contact Form block.', 'pt-minigo').'</span></li>
                        <li class="help-contact-info"><i class="fa fa-location-arrow"></i><strong>[minigo-contact-info]</strong><span> - '.__('Displays the Contact Info block.', 'pt-minigo').'</span></li>
                        <li class="help-counter-features"><i class="fa fa-adn"></i><strong>[minigo-counter-features]</strong><span> - '.__('Displays the Counter Features block.', 'pt-minigo').'</span></li>
                        <li class="help-countdown"><i class="fa fa-clock-o"></i><strong>[minigo-countdown]</strong><span> - '.__('Displays the Countdown block.', 'pt-minigo').'</span></li>
                        <li class="help-icon-features"><i class="fa fa-adn"></i><strong>[minigo-icon-features]</strong><span> - '.__('Displays the Icon Features block.', 'pt-minigo').'</span></li>
                        <li class="help-icon-list"><i class="fa fa-list-ul"></i><strong>[minigo-icon-list]</strong><span> - '.__('Displays the Icon List block.', 'pt-minigo').'</span></li>
                        <li class="help-icon-menu"><i class="fa fa-dot-circle-o"></i><strong>[minigo-icon-menu]</strong><span> - '.__('Displays the Icon Menu block.', 'pt-minigo').'</span></li>
                        <li class="help-map"><i class="fa fa-map-o"></i><strong>[minigo-map]</strong><span> - '.__('Displays the Google Map block.', 'pt-minigo').'</span></li>
                        <li class="help-gallery"><i class="fa fa-photo"></i><strong>[minigo-gallery]</strong><span> - '.__('Displays the Gallery block.', 'pt-minigo').'</span></li>
                        <li class="help-progress-bars"><i class="fa fa-lightbulb-o"></i><strong>[minigo-progress-bars]</strong><span> - '.__('Displays the Progress Bars block.', 'pt-minigo').'</span></li>
                        <li class="help-progress-features"><i class="fa fa-adn"></i><strong>[minigo-progress-features]</strong><span> - '.__('Displays the Counter Features block.', 'pt-minigo').'</span></li>
                        <li class="help-subscribe-form"><i class="fa fa-mail-forward"></i><strong>[minigo-subscribe-form]</strong><span> - '.__('Displays the "Get Notified" subscription form block.', 'pt-minigo').'</span></li>
                        <li class="help-team"><i class="fa fa-users"></i><strong>[minigo-team]</strong><span> - '.__('Displays the Team Members block.', 'pt-minigo').'</span></li>
                        <li class="help-testimonials"><i class="fa fa-quote-left"></i><strong>[minigo-testimonials]</strong><span> - '.__('Displays the Testimonials block.', 'pt-minigo').'</span></li>
                    </ul>

                    <ul class="shortcodes-list shortcodes-right">
                        <li class="shortcodes-list-title"><h4>'.__('Content Shortcodes', 'pt-minigo').'</h4></li>
                        <li class="help-button"><i class="fa fa-hand-o-up"></i><strong>[minigo-button]</strong><span> - '.__('Displays a button with the options you pick from the pop-up.', 'pt-minigo').'</span></li>
                        <li class="help-divider"><i class="fa fa-minus"></i><strong>[minigo-divider]</strong><span> - '.__('Displays a horizontal rule divider with the options you pick from the pop-up.', 'pt-minigo').'</span></li>
                        <li class="help-grid"><i class="fa fa-th-large"></i><strong>[minigo-grid]</strong><span> - '.__('Displays a responsive grid with the options you pick from the pop-up.', 'pt-minigo').'</span></li>
                        <li class="help-logo"><i class="fa fa-rocket"></i><strong>[minigo-logo]</strong><span> - '.__('Displays the logo as configured in the Main Settings section.', 'pt-minigo').'</span></li>
                        <li class="help-title"><i class="fa fa-header"></i><strong>[minigo-title]</strong><span> - '.__('Displays a title/subtitle block with the options you pick from the pop-up.', 'pt-minigo').'</span></li>

                    </ul>
                </div>',
            'fields' => array(

                // Pages Align
                array(
                    'id' => 'pages-align',
                    'type' => 'button_set',
                    'title' => __('Page Alignment', 'pt-minigo'),
                    'subtitle' => __('Alignment of pages relative to viewport.', 'pt-minigo') . '<br>' . __(' Best used with One Page Nav Style.','pt-minigo'),
                    // 'required' => array('navigation-type', 'equals','one-page'),
                    'options' => array(
                        'default' => 'Default',
                        'left' => 'Left',
                        'center' => 'Center',
                        'right' => 'Right'
                        ),
                    'default' => 'default'
                    ),
                    // Pages Text Align
                    array(
                        'id'       => 'pages-text-align',
                        'type'     => 'button_set',
                        'title'    => __('Text Alignment', 'pt-minigo'),
                        // 'required' => array('pages-enabled','=','1'),
                        // 'required' => array('pages-custom-options', 'equals','1'),
                        'subtitle' => __('Alignment of the text within the pages.', 'pt-minigo'),
                        'options'  => array(
                            'default' => 'Default',
                            'left'    => 'Left',
                            'center'  => 'Center',
                            'right'   => 'Right',
                            ),
                        'default' => 'default'
                    ),
                // Enable RTL
                array(
                    'id'=>'rtl-switch',
                    'type' => 'switch',
                    'title' => __('Enable RTL', 'pt-minigo'),
                    'subtitle'=> __('Right to Left content for Arabic or Hebrew.', 'pt-minigo'),
                    "default"       => 0,
                    ),


                // Enable Background
                array(
                    'id'=>'pages-background',
                    'type' => 'switch',
                    'title' => __('Page Background', 'pt-minigo'),
                    'subtitle'=> __('Choose whether or not you want your pages to have a translucent background.', 'pt-minigo'),
                    "default"       => 0,
                    ),
                // Background Color
                array(
                    'id'=>'pages-background-color',
                    'type' => 'color_rgba',
                    'required' => array('pages-background', 'equals','1'),
                    'title' => __('Page Background - Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for the pages background.', 'pt-minigo'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '.7'
                        ),
                    'mode'     => 'background',
                    'validate' => 'colorrgba',
                    ),
               // Border Radius 
                array(
                    'id'       => 'pages-border-radius',
                    'type'     => 'dimensions',
                    'title'    => __('Page Background - Border Radius', 'pt-minigo'),
                    'subtitle' => __('Change the border radius of all pages.', 'pt-minigo'),
                    'required' => array('pages-background', 'equals','1'),
                    'height'   => false,
                    'subtitle' => __('Adjust the content width.', 'pt-minigo'),
                    'units'    => array('em','px','%'),
                    'default'  => array(
                        'width'   => '6', 
                        // 'height'  => '',
                        'units' => 'px'
                        ),
                    ),
                // Enable Background Border
                array(
                    'id'=>'pages-background-border',
                    'type' => 'switch',
                    'title' => __('Page Background - Border', 'pt-minigo'),
                    'subtitle'=> __('Choose whether or not you want your pages to have a translucent border.', 'pt-minigo'),
                    "default"       => 0,
                    ),

                    // Border Size & Style
                    array(
                        'id'       => 'pages-border',
                        'type'     => 'border',
                        'title'    => __('Page Background - Border Style', 'pt-minigo'),
                        'subtitle' => __('Add a specific border size and style to pages.', 'pt-minigo'),
                        'color'    => false,
                        'required' => array('pages-background-border','=','1'),
                        'all'      => true,
                        // 'required' => array('pages-enabled','=','1'),
                        // 'required' => array('pages-custom-options', 'equals', '1'),
                        'default'  => array(
                            'border-width' => '2',
                            'border-style' => 'solid',
                        ),
                    ),
                    // Border Color
                    array(
                        'id'       => 'pages-border-color',
                        'type'     => 'color_rgba',
                        'title'    => __('Page Background - Border Color', 'pt-minigo'),
                        'subtitle' => __('Add a specific border color to pages.', 'pt-minigo'),
                        'required' => array('pages-background-border','=','1'),
                        // 'required' => array('pages-enabled','=','1'),
                        // 'required' => array('pages-custom-options', 'equals', '1'),
                        'default'  => array(
                            'color' => '#fff',
                            'alpha' => '0.15'
                        ), 
                    ),
                // Enable Width
                array(
                    'id'=>'pages-width-switch',
                    'type' => 'switch',
                    'title' => __('Custom Page Width', 'pt-minigo'),
                    'subtitle' => __('Enable to control your global page width.', 'pt-minigo'),
                    'default' => 0
                    ),
               // Pages Width
                array(
                    'id'       => 'pages-width',
                    'type'     => 'dimensions',
                    'title'    => __('Pages Width', 'pt-minigo'),
                    'subtitle' => __('Change the width of all pages.', 'pt-minigo'),
                    'height'   => false,
                    'units'    => array('em','px','%'),
                    'required' => array('pages-width-switch', 'equals','1'),
                    'default'  => array(
                        'width'   => '70', 
                        // 'height'  => '',
                        'units' => '%'
                        ),
                    ),

                // Enable Margins & Paddings
                array(
                'id'=>'pages-spacing-switch',
                'type' => 'switch',
                'title' => __('Page Spacing', 'pt-minigo'),
                'subtitle' => __('Enable to control the global margins & paddings for all pages.', 'pt-minigo'),
                'default' => 0
                ),
                // Margins
                array(
                    'id'       => 'pages-margins',
                    'type'     => 'spacing',
                    'title'    => __('Margins', 'pt-minigo'),
                    'subtitle' => __('Choose global page margins.', 'pt-minigo'),
                    'required' => array('pages-spacing-switch','=','1'),
                    // 'required' => array('pages-custom-options', 'equals','1'),
                    'mode'     => 'margin',
                    'units'    => array('px', 'em', '%'),
                    'units_extended' => 'false',
                    'default'  => array(
                        'margin-top'     => '30', 
                        'margin-right'   => '30', 
                        'margin-bottom'  => '30', 
                        'margin-left'    => '30',
                        'units'          => 'px', 
                    ),
                ),
                // Paddings
                array(
                    'id'       => 'pages-paddings',
                    'type'     => 'spacing',
                    'title'    => __('Paddings', 'pt-minigo'),
                    'subtitle' => __('Choose global page paddings.', 'pt-minigo'),
                    'required' => array('pages-spacing-switch','=','1'),
                    // 'required' => array('pages-custom-options', 'equals','1'),
                    'mode'     => 'padding',
                    'units'    => array('px', 'em', '%'),
                    'units_extended' => 'false',
                    'default'  => array(
                        'padding-top'     => '30', 
                        'padding-right'   => '', 
                        'padding-bottom'  => '30', 
                        'padding-left'    => '',
                        'units'           => 'px', 
                        ),
                    ),

                array( 
                    'id' => 'page-full-height',
                    'title' => __('Full Height Pages?', 'pt-minigo'),
                    'subtitle' => __('Makes the minimum height of the pages the same as the window.', 'pt-minigo'),
                    'type' => 'switch',
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 0
                    ),

                )
        );

        // Page [1] - Intro
        $sections[] = array(
        'id' => 'page-1-subsection',
        'title' => __('First Page ', 'pt-minigo'). '<span class="page-type">[Intro]</span>',
        'subtitle'=> __('The content of the intro page that is always centered or the first vertical section if one page is enabled.', 'pt-minigo'),
        'subsection' => true,
        'icon' => 'el-icon-edit',
        'icon_class' => 'icon-large',
        'fields' => array(
                array(
                    'id'=>'page-1-enabled',
                    'type' => 'switch',
                    'title' => __('Show Intro Page?', 'pt-minigo'),
                    'subtitle'=> __('If you don\'t want the intro page to be displayed you can disable this.', 'pt-minigo'),
                    "default"       => 1,
                    ),

                array(
                    'id'=>'page-1-title-show',
                    'type' => 'switch',
                    'title' => __('Display Title?', 'pt-minigo'),
                    'subtitle'=> __('You can enter a title then choose not to display it so it\'s only used as a hash url if that\'s enabled.', 'pt-minigo'),
                    'required' => array('page-1-enabled','=','1'),
                    "default"       => 0,
                    ),
                array(
                    'id'=>'page-1-title',
                    'type' => 'text',
                    'title' => __('Title', 'pt-minigo'),
                    'subtitle' => __('Intro Page title (optional)', 'pt-minigo'),
                    'required' => array('page-1-enabled','=','1'),
                    'required' => array('page-1-title-show', '=','1'),
                    'default' => 'Welcome!',
                    ),
                array(
                    'id'=>'page-1-content',
                    'type' => 'editor',
                    'title' => __('Front Page Content', 'pt-minigo'),
                    'required' => array('page-1-enabled','=','1'),
                    'args' => array(
                        'teeny' => false,
                        'textarea_rows' => 20
                    ),
                    'default' => '[minigo-logo]'."\n".'<h3>Welcome to MiniGO, a clean, modern mini-site template.</h3>' . "\n" . '[minigo-countdown]' . "\n" . '[minigo-subscribe-form]',
                    ),
                array(
                    'id'=>'page-1-nav',
                    'type' => 'switch',
                    'title' => __('Show in Navigation?', 'pt-minigo'),
                    'subtitle'=> __('If you want the homepage to be added into the navigation as the first button.', 'pt-minigo'),
                    'required' => array('page-1-enabled','=','1'),
                    "default"       => 0,
                    ),

                array(
                    'id'=>'page-1-label',
                    'type' => 'text',
                    'indent' => true,
                    'title' => __('Link Label', 'pt-minigo'),
                    'subtitle' => __('The label of the left hand side button.', 'pt-minigo'),
                    'required' => array('page-1-enabled','=','1'),
                    'required' => array('page-1-nav','=','1'),
                    'default' => 'HOME',
                    ),
                array(
                    'id'=>'page-1-icon',
                    'type' => 'select',
                    'title' => __('Icon', 'pt-minigo'),
                    'subtitle' => __('The icon of the left hand side button.', 'pt-minigo'),
                    // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                    'required' => array('page-1-enabled','=','1'),
                    'required' => array('page-1-nav','=','1'),
                    'options' => minigo_get_font_awesome_icons(),
                    'class' => 'font-awesome-icons',
                    'default' => 'fa-home'
                    ),

            )
        );

        // Page [2] [L1]
        $sections[] = array(
        'id' => 'page-2-subsection',
        'title' => __('Second Page', 'pt-minigo') . '<span class="page-type">[L 1]</span>',
        'subtitle'=> __('Manage the content and options for the second page.', 'pt-minigo'),
        'subsection' => true,
        'icon' => 'el-icon-edit',
        'icon_class' => 'icon-large',
        'fields' => array(
                array(
                    'id'=>'page-2-enabled',
                    'type' => 'switch',
                    'title' => __('Enabled?', 'pt-minigo'),
                    'subtitle'=> __('Show this page?', 'pt-minigo'),
                    "default"       => 1,
                    ),
                array(
                    'id'=>'page-2-label',
                    'type' => 'text',
                    'title' => __('Link Label', 'pt-minigo'),
                    'subtitle' => __('The text displayed in the Menu for this page.', 'pt-minigo'),
                    'required' => array('page-2-enabled','=','1'),
                    'default' => 'ABOUT',
                    ),
                array(
                    'id'=>'page-2-icon',
                    'type' => 'select',
                    'title' => __('Icon', 'pt-minigo'),
                    'subtitle' => __('Select an icon to show in the Menu for this page.', 'pt-minigo'),
                    // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                    'required' => array('page-2-enabled','=','1'),
                    'options' => minigo_get_font_awesome_icons(),
                    'class' => 'font-awesome-icons',
                    'default' => 'fa-info-circle'
                    ),
                array(
                    'id'=>'page-2-title',
                    'type' => 'text',
                    'title' => __('Title', 'pt-minigo'),
                    'required' => array('page-2-enabled','=','1'),
                    'default' => 'Who we are',
                    ),

                array(
                    'id'=>'page-2-content',
                    'type' => 'editor',
                    'title' => __('Front Page Content', 'pt-minigo'),
                    'required' => array('page-2-enabled','=','1'),
                    'args' => array(
                        'teeny' => false,
                        'textarea_rows' => 20
                    ),
                    'default' => '<h4>Hello and welcome to this <a href="http://www.premiothemes.com" target="_blank">Premio</a> demo</h4>' . "\n" . 'We built this using an <strong>admin panel</strong> and a number of cool shortcodes you can customize and edit with ease. With MiniGO you can be up and running in 5 minutes or take an hour or so to set up a cool minisite <em>(*no coding required)</em> then start capturing leads, grow your list and make a buzz while you build the big site. To start, you can show off your team with this block.' . "\n" . '[minigo-team]',
                    ),

            )
        );

        // Page [3] [L2]
        $sections[] = array(
        'id' => 'page-3-subsection',
        'title' => __('Third Page', 'pt-minigo') . '<span class="page-type">[L 2]</span>',
        'subtitle'=> __('Manage the content and options for the third page.', 'pt-minigo'),
        'subsection' => true,
        'icon' => 'el-icon-edit',
        'icon_class' => 'icon-large',
        'fields' => array(
            array(
                'id'=>'page-3-enabled',
                'type' => 'switch',
                'title' => __('Enabled?', 'pt-minigo'),
                'subtitle'=> __('Show this page?', 'pt-minigo'),
                "default"       => 1,
                ),
            array(
                'id'=>'page-3-label',
                'type' => 'text',
                'title' => __('Link Label', 'pt-minigo'),
                'subtitle' => __('The text displayed in the Menu for this page.', 'pt-minigo'),
                'required' => array('page-3-enabled','=','1'),
                'default' => 'SERVICES',
                ),
            array(
                'id'=>'page-3-icon',
                'type' => 'select',
                'title' => __('Icon', 'pt-minigo'),
                'subtitle' => __('Select an icon to show in the Menu for this page.', 'pt-minigo'),
                // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                'required' => array('page-3-enabled','=','1'),
                'options' => minigo_get_font_awesome_icons(),
                'class' => 'font-awesome-icons',
                'default' => 'fa-cog'
                ),
            array(
                'id'=>'page-3-title',
                'type' => 'text',
                'title' => __('Title', 'pt-minigo'),
                'required' => array('page-3-enabled','=','1'),
                'default' => 'What we do',
                ),

            array(
                'id'=>'page-3-content',
                'type' => 'editor',
                'title' => __('Front Page Content', 'pt-minigo'),
                'required' => array('page-3-enabled','=','1'),
                'args' => array(
                    'teeny' => false,
                    'textarea_rows' => 20
                ),
                'default' => 'Next, let\'s be progressive with some bars. You can add or remove items, change values, colors or columns.' . "\n" . '[minigo-progress-bars]',
                ),
            )
        );

        // Page [4] [L3]
        $sections[] = array(
        'id' => 'page-4-subsection',
        'title' => __('Fourth Page', 'pt-minigo'). '<span class="page-type">[L 3]</span>',
        'subtitle'=> __('Manage the content and options for the fourth page.', 'pt-minigo'),
        'subsection' => true,
        'icon' => 'el-icon-edit',
        'icon_class' => 'icon-large',
        'fields' => array(
            array(
                'id'=>'page-4-enabled',
                'type' => 'switch',
                'title' => __('Enabled?', 'pt-minigo'),
                'subtitle'=> __('Show this page?', 'pt-minigo'),
                "default"       => 1,
                ),
            array(
                'id'=>'page-4-label',
                'type' => 'text',
                'title' => __('Link Label', 'pt-minigo'),
                'subtitle' => __('The text displayed in the Menu for this page.', 'pt-minigo'),
                'required' => array('page-4-enabled','=','1'),
                'default' => 'GALLERY',
                ),
            array(
                'id'=>'page-4-icon',
                'type' => 'select',
                'title' => __('Icon', 'pt-minigo'),
                'subtitle' => __('Select an icon to show in the Menu for this page.', 'pt-minigo'),
                // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                'required' => array('page-4-enabled','=','1'),
                'options' => minigo_get_font_awesome_icons(),
                'class' => 'font-awesome-icons',
                'default' => 'fa-photo'
                ),
            array(
                'id'=>'page-4-title',
                'type' => 'text',
                'title' => __('Title', 'pt-minigo'),
                'required' => array('page-4-enabled','=','1'),
                'default' => 'Showcase Your Works',
                ),

            array(
                'id'=>'page-4-content',
                'type' => 'editor',
                'title' => __('Front Page Content', 'pt-minigo'),
                'required' => array('page-4-enabled','=','1'),
                'args' => array(
                    'teeny' => false,
                    'textarea_rows' => 20
                ),
                'default' => 'You can add a cool gallery that can be customized to change the number of rows, columns as well as colors.' . "\n" . 'You can display it as a large image grid or a simple one-by-one image slider. Up to you.' . "\n" . '[minigo-gallery]',
                ),

            )
        );

        // Page [5] [L4]
        $sections[] = array(
        'id' => 'page-5-subsection',
        'title' => __('Fifth Page', 'pt-minigo') . '<span class="page-type">[L 4]</span>',
        'subtitle'=> __('Manage the content and options for the fifth page.', 'pt-minigo'),
        'subsection' => true,
        'icon' => 'el-icon-edit',
        'icon_class' => 'icon-large',
        'fields' => array(

                array(
                    'id'=>'page-5-enabled',
                    'type' => 'switch',
                    'title' => __('Enabled?', 'pt-minigo'),
                    'subtitle'=> __('Show this page?', 'pt-minigo'),
                    "default"       => 1,
                    ),
                array(
                    'id'=>'page-5-label',
                    'type' => 'text',
                    'title' => __('Link Label', 'pt-minigo'),
                    'subtitle' => __('The text displayed in the Menu for this page.', 'pt-minigo'),
                    'required' => array('page-5-enabled','=','1'),
                    'default' => 'CLIENTS',
                    ),
                array(
                    'id'=>'page-5-icon',
                    'type' => 'select',
                    'title' => __('Icon', 'pt-minigo'),
                    'subtitle' => __('Select an icon to show in the Menu for this page.', 'pt-minigo'),
                    // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                    'required' => array('page-5-enabled','=','1'),
                    'options' => minigo_get_font_awesome_icons(),
                    'class' => 'font-awesome-icons',
                    'default' => 'fa-users'
                    ),
                array(
                    'id'=>'page-5-title',
                    'type' => 'text',
                    'title' => __('Title', 'pt-minigo'),
                    'required' => array('page-5-enabled','=','1'),
                    'default' => 'What our Customers say',
                    ),

                array(
                    'id'=>'page-5-content',
                    'type' => 'editor',
                    'title' => __('Front Page Content', 'pt-minigo'),
                    'required' => array('page-5-enabled','=','1'),
                    'args' => array(
                        'teeny' => false,
                        'textarea_rows' => 20
                    ),
                    'default' => 'Social proof is important so why not display a slick testimonial slider?' . "\n" . '[minigo-testimonials]',
                    ),
            )
        );

        // Page [6] - [L5]
        $sections[] = array(
        'id' => 'page-6-subsection',
        'title' => __('Sixth Page', 'pt-minigo') . '<span class="page-type">[L 5]</span>',
        'subtitle'=> __('Manage the content and options for the sixth page.', 'pt-minigo'),
        'subsection' => true,
        'icon' => 'el-icon-edit',
        'icon_class' => 'icon-large',
        'fields' => array(

                array(
                    'id'=>'page-6-enabled',
                    'type' => 'switch',
                    'title' => __('Enabled?', 'pt-minigo'),
                    'subtitle'=> __('Show this page?', 'pt-minigo'),
                    "default"       => 1,
                    ),
                array(
                    'id'=>'page-6-label',
                    'type' => 'text',
                    'title' => __('Link Label', 'pt-minigo'),
                    'subtitle' => __('The text displayed in the Menu for this page.', 'pt-minigo'),
                    'required' => array('page-6-enabled','=','1'),
                    'default' => 'AWARDS',
                    ),
                array(
                    'id'=>'page-6-icon',
                    'type' => 'select',
                    'title' => __('Icon', 'pt-minigo'),
                    'subtitle' => __('Select an icon to show in the Menu for this page.', 'pt-minigo'),
                    // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                    'required' => array('page-6-enabled','=','1'),
                    'options' => minigo_get_font_awesome_icons(),
                    'class' => 'font-awesome-icons',
                    'default' => 'fa-trophy'
                    ),
                array(
                    'id'=>'page-6-title',
                    'type' => 'text',
                    'title' => __('Title', 'pt-minigo'),
                    'required' => array('page-6-enabled','=','1'),
                    'default' => 'Achievements and Stats',
                    ),

                array(
                    'id'=>'page-6-content',
                    'type' => 'editor',
                    'title' => __('Front Page Content', 'pt-minigo'),
                    'required' => array('page-6-enabled','=','1'),
                    'args' => array(
                        'teeny' => false,
                        'textarea_rows' => 20
                    ),
                    'default' => '[minigo-counter-features]',
                    ),

            )
        );

        // Page [7] [L6]
        $sections[] = array(
        'id' => 'page-7-subsection',
        'title' => __('Seventh Page', 'pt-minigo') . '<span class="page-type">[L 6]</span>',
        'subtitle'=> __('Manage the content and options for the seventh page.', 'pt-minigo'),
        'subsection' => true,
        'icon' => 'el-icon-edit',
        'icon_class' => 'icon-large',
        'fields' => array(
                array(
                    'id'=>'page-7-enabled',
                    'type' => 'switch',
                    'title' => __('Enabled?', 'pt-minigo'),
                    'subtitle'=> __('Show this page?', 'pt-minigo'),
                    "default"       => 0,
                    ),
                array(
                    'id'=>'page-7-label',
                    'type' => 'text',
                    'title' => __('Link Label', 'pt-minigo'),
                    'subtitle' => __('The text displayed in the Menu for this page.', 'pt-minigo'),
                    'required' => array('page-7-enabled','=','1'),
                    'default' => '',
                    ),
                array(
                    'id'=>'page-7-icon',
                    'type' => 'select',
                    'title' => __('Icon', 'pt-minigo'),
                    'subtitle' => __('Select an icon to show in the Menu for this page.', 'pt-minigo'),
                    // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                    'required' => array('page-7-enabled','=','1'),
                    'options' => minigo_get_font_awesome_icons(),
                    'class' => 'font-awesome-icons',
                    'default' => ''
                    ),
                array(
                    'id'=>'page-7-title',
                    'type' => 'text',
                    'title' => __('Title', 'pt-minigo'),
                    'required' => array('page-7-enabled','=','1'),
                    'default' => '',
                    ),

                array(
                    'id'=>'page-7-content',
                    'type' => 'editor',
                    'title' => __('Front Page Content', 'pt-minigo'),
                    'required' => array('page-7-enabled','=','1'),
                    'args' => array(
                        'teeny' => false,
                        'textarea_rows' => 20
                    ),
                    'default' => '',
                    ),

            )
        );

        // Page [8] - [R1]
        $sections[] = array(
        'id' => 'page-8-subsection',
        'title' => __('Eighth Page', 'pt-minigo') . '<span class="page-type">[R 1]</span>',
        'subtitle'=> __('Manage the content and options for the eighth page.', 'pt-minigo'),
        'subsection' => true,
        'icon' => 'el-icon-edit',
        'icon_class' => 'icon-large',
        'fields' => array(
                array(
                    'id'=>'page-8-enabled',
                    'type' => 'switch',
                    'title' => __('Enabled?', 'pt-minigo'),
                    'subtitle'=> __('Show this page?', 'pt-minigo'),
                    "default"       => 1,
                    ),
                array(
                    'id'=>'page-8-label',
                    'type' => 'text',
                    'title' => __('Link Label', 'pt-minigo'),
                    'subtitle' => __('The text displayed in the Menu for this page.', 'pt-minigo'),
                    'required' => array('page-8-enabled','=','1'),
                    'default' => 'THE PRODUCT',
                    ),
                array(
                    'id'=>'page-8-icon',
                    'type' => 'select',
                    'title' => __('Icon', 'pt-minigo'),
                    'subtitle' => __('Select an icon to show in the Menu for this page.', 'pt-minigo'),
                    // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                    'required' => array('page-8-enabled','=','1'),
                    'options' => minigo_get_font_awesome_icons(),
                    'class' => 'font-awesome-icons',
                    'default' => 'fa-cube'
                    ),
                array(
                    'id'=>'page-8-title',
                    'type' => 'text',
                    'title' => __('Title', 'pt-minigo'),
                    'required' => array('page-8-enabled','=','1'),
                    'default' => 'Why choose MiniGO',
                    ),

                array(
                    'id'=>'page-8-content',
                    'type' => 'editor',
                    'title' => __('Front Page Content', 'pt-minigo'),
                    'required' => array('page-8-enabled','=','1'),
                    'args' => array(
                        'teeny' => false,
                        'textarea_rows' => 20
                    ),
                    'default' => '[minigo-icon-features]' . "\n" . '[minigo-title title="Title Shortcode" subtitle="You can also use the icon menu in the content area" style="small-divider"]' . "\n" . '[minigo-icon-menu]',
                    ),
            )
        );

        // Page [9] [R2]
        $sections[] = array(
        'id' => 'page-9-subsection',
        'title' => __('Ninth Page', 'pt-minigo') . '<span class="page-type">[R 2]</span>',
        'subtitle'=> __('Manage the content and options for the ninth page.', 'pt-minigo'),
        'subsection' => true,
        'icon' => 'el-icon-edit',
        'icon_class' => 'icon-large',
        'fields' => array(
                array(
                    'id'=>'page-9-enabled',
                    'type' => 'switch',
                    'title' => __('Enabled?', 'pt-minigo'),
                    'subtitle'=> __('Show this page?', 'pt-minigo'),
                    "default"       => 1,
                    ),
                array(
                    'id'=>'page-9-label',
                    'type' => 'text',
                    'title' => __('Link Label', 'pt-minigo'),
                    'subtitle' => __('The text displayed in the Menu for this page.', 'pt-minigo'),
                    'required' => array('page-9-enabled','=','1'),
                    'default' => 'FEATURES',
                    ),
                array(
                    'id'=>'page-9-icon',
                    'type' => 'select',
                    'title' => __('Icon', 'pt-minigo'),
                    'subtitle' => __('Select an icon to show in the Menu for this page.', 'pt-minigo'),
                    // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                    'required' => array('page-9-enabled','=','1'),
                    'options' => minigo_get_font_awesome_icons(),
                    'class' => 'font-awesome-icons',
                    'default' => 'fa-star'
                    ),
                array(
                    'id'=>'page-9-title',
                    'type' => 'text',
                    'title' => __('Title', 'pt-minigo'),
                    'required' => array('page-9-enabled','=','1'),
                    'default' => 'Product Features',
                    ),

                array(
                    'id'=>'page-9-content',
                    'type' => 'editor',
                    'title' => __('Front Page Content', 'pt-minigo'),
                    'required' => array('page-9-enabled','=','1'),
                    'args' => array(
                        'teeny' => false,
                        'textarea_rows' => 20
                    ),
                    'default' => '[PT_row]' . "\n" . '[PT_column size="one-half palm-one-whole"]' . "\n" . '[minigo-icon-list]' . "\n" . '[/PT_column]' . "\n" . '[PT_column size="one-half palm-one-whole"]' . "\n" . '[minigo-video title="Embed Videos from Youtube or Vimeo"]<iframe src="https://player.vimeo.com/video/185412081?badge=0" width="800" height="340" frameborder="0" allowfullscreen="allowfullscreen"></iframe>[/minigo-video]' . "\n" . '[/PT_column]' . "\n" . '[/PT_row]' . "\n" . '[minigo-addthis]',
                    ),

            )
        );

        // Page [10] [R3]
        $sections[] = array(
        'id' => 'page-10-subsection',
        'title' => __('Tenth Page', 'pt-minigo') . '<span class="page-type">[R 3]</span>',
        'subtitle'=> __('Manage the content and options for the tenth page.', 'pt-minigo'),
        'subsection' => true,
        'icon' => 'el-icon-edit',
        'icon_class' => 'icon-large',
        'fields' => array(
            array(
                'id'=>'page-10-enabled',
                'type' => 'switch',
                'title' => __('Enabled?', 'pt-minigo'),
                'subtitle'=> __('Show this page?', 'pt-minigo'),
                "default"       => 1,
                ),
            array(
                'id'=>'page-10-label',
                'type' => 'text',
                'title' => __('Link Label', 'pt-minigo'),
                'subtitle' => __('The text displayed in the Menu for this page.', 'pt-minigo'),
                'required' => array('page-10-enabled','=','1'),
                'default' => 'SHOP',
                ),
            array(
                'id'=>'page-10-icon',
                'type' => 'select',
                'title' => __('Icon', 'pt-minigo'),
                'subtitle' => __('Select an icon to show in the Menu for this page.', 'pt-minigo'),
                // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                'required' => array('page-10-enabled','=','1'),
                'options' => minigo_get_font_awesome_icons(),
                'class' => 'font-awesome-icons',
                'default' => 'fa-shopping-bag'
                ),
            array(
                'id'=>'page-10-title',
                'type' => 'text',
                'title' => __('Title', 'pt-minigo'),
                'required' => array('page-10-enabled','=','1'),
                'default' => 'Online Shop',
                ),

            array(
                'id'=>'page-10-content',
                'type' => 'editor',
                'title' => __('Front Page Content', 'pt-minigo'),
                'required' => array('page-10-enabled','=','1'),
                'args' => array(
                    'teeny' => false,
                    'textarea_rows' => 20
                ),
                'default' => '[minigo-shop]',
                ),

            )
        );

        // Page [11] [R4]
        $sections[] = array(
        'id' => 'page-11-subsection',
        'title' => __('Eleventh Page', 'pt-minigo') . '<span class="page-type">[R 4]</span>',
        'subtitle'=> __('Manage the content and options for the eleventh page.', 'pt-minigo'),
        'subsection' => true,
        'icon' => 'el-icon-edit',
        'icon_class' => 'icon-large',
        'fields' => array(
            array(
                'id'=>'page-11-enabled',
                'type' => 'switch',
                'title' => __('Enabled?', 'pt-minigo'),
                'subtitle'=> __('Show this page?', 'pt-minigo'),
                "default"       => 1,
                ),
            array(
                'id'=>'page-11-label',
                'type' => 'text',
                'title' => __('Link Label', 'pt-minigo'),
                'subtitle' => __('The text displayed in the Menu for this page.', 'pt-minigo'),
                'required' => array('page-11-enabled','=','1'),
                'default' => 'LOCATION',
                ),
            array(
                'id'=>'page-11-icon',
                'type' => 'select',
                'title' => __('Icon', 'pt-minigo'),
                'subtitle' => __('Select an icon to show in the Menu for this page.', 'pt-minigo'),
                'required' => array('page-11-enabled','=','1'),
                'options' => minigo_get_font_awesome_icons(),
                'class' => 'font-awesome-icons',
                'default' => 'fa-envelope'
                ),
            array(
                'id'=>'page-11-title',
                'type' => 'text',
                'title' => __('Title', 'pt-minigo'),
                'required' => array('page-11-enabled','=','1'),
                'default' => 'Google Map',
                ),

            array(
                'id'=>'page-11-content',
                'type' => 'editor',
                'args' => array(
                    'teeny' => false,
                    'textarea_rows' => 20
                ),
                'title' => __('Front Page Content', 'pt-minigo'),
                'required' => array('page-11-enabled','=','1'),
                'default' => '[minigo-map]' . "\n" . '[minigo-divider size="1px" top="0px" bottom="15px" style="divider-line" opacity="0.15"]' . "\n" . 'You can display a map with plenty of options, custom dividers or buttons such as the one below.' . "\n" . '[minigo-divider size="2px" top="10px" bottom="10px" style="divider-dashed" opacity="0.25"]' . "\n" . '[minigo-button text="Get Directions" url="http://pre.la/minigo-map" class="" target="_blank" style="btn--large"]',
                ),

            )
        );

        // Page [12] [R5]
        $sections[] = array(
        'id' => 'page-12-subsection',
        'title' => __('Twelfth Page', 'pt-minigo') . '<span class="page-type">[R 5]</span>',
        'subtitle'=> __('Manage the content and options for the twelfth page.', 'pt-minigo'),
        'subsection' => true,
        'icon' => 'el-icon-edit',
        'icon_class' => 'icon-large',
        'fields' => array(
            array(
                'id'=>'page-12-enabled',
                'type' => 'switch',
                'title' => __('Enabled?', 'pt-minigo'),
                'subtitle'=> __('Show this page?', 'pt-minigo'),
                "default"       => 1,
                ),
            array(
                'id'=>'page-12-label',
                'type' => 'text',
                'title' => __('Link Label', 'pt-minigo'),
                'subtitle' => __('The text displayed in the Menu for this page.', 'pt-minigo'),
                'required' => array('page-12-enabled','=','1'),
                'default' => 'CONTACT',
                ),
            array(
                'id'=>'page-12-icon',
                'type' => 'select',
                'title' => __('Icon', 'pt-minigo'),
                'subtitle' => __('Select an icon to show in the Menu for this page.', 'pt-minigo'),
                'required' => array('page-12-enabled','=','1'),
                'options' => minigo_get_font_awesome_icons(),
                'class' => 'font-awesome-icons',
                'default' => 'fa-envelope'
                ),
            array(
                'id'=>'page-12-title',
                'type' => 'text',
                'title' => __('Title', 'pt-minigo'),
                'required' => array('page-12-enabled','=','1'),
                'default' => 'Get in Touch',
                ),

            array(
                'id'=>'page-12-content',
                'type' => 'editor',
                'title' => __('Front Page Content', 'pt-minigo'),
                'required' => array('page-12-enabled','=','1'),
                'args' => array(
                    'teeny' => false,
                    'textarea_rows' => 20
                ),
                'default' => '[minigo-contact-info]' . "\n" . '[minigo-contact-form]',
                ),
            )
        );

        // Page [13] [R6]
        $sections[] = array(
        'id' => 'page-13-subsection',
        'title' => __('Thirteenth Page', 'pt-minigo') . '<span class="page-type">[R 6]</span>',
        'subtitle'=> __('Manage the content and options for the thirteenth page.', 'pt-minigo'),
        'subsection' => true,
        'icon' => 'el-icon-edit',
        'icon_class' => 'icon-large',
        'fields' => array(
            array(
                'id'=>'page-13-enabled',
                'type' => 'switch',
                'title' => __('Enabled?', 'pt-minigo'),
                'subtitle'=> __('Show this page?', 'pt-minigo'),
                "default"       => 0,
                ),
            array(
                'id'=>'page-13-label',
                'type' => 'text',
                'title' => __('Link Label', 'pt-minigo'),
                'subtitle' => __('The text displayed in the Menu for this page.', 'pt-minigo'),
                'required' => array('page-13-enabled','=','1'),
                'default' => '',
                ),
            array(
                'id'=>'page-13-icon',
                'type' => 'select',
                'title' => __('Icon', 'pt-minigo'),
                'subtitle' => __('Select an icon to show in the Menu for this page.', 'pt-minigo'),
                // 'desc' => __('The icons are from ', 'pt-minigo').'<a href="http://fontawesome.io/" target="_blank">Font Awesome</a>',
                'required' => array('page-13-enabled','=','1'),
                'options' => minigo_get_font_awesome_icons(),
                'class' => 'font-awesome-icons',
                'default' => ''
                ),
            array(
                'id'=>'page-13-title',
                'type' => 'text',
                'title' => __('Title', 'pt-minigo'),
                'required' => array('page-13-enabled','=','1'),
                'default' => '',
                ),

            array(
                'id'=>'page-13-content',
                'type' => 'editor',
                'args' => array(
                    'teeny' => false,
                    'textarea_rows' => 20
                ),
                'title' => __('Front Page Content', 'pt-minigo'),
                'required' => array('page-13-enabled','=','1'),
                'default' => '',
                ),
            )
        );




        // MAIN SHORTCODE MENU
        $sections[] = array(
            'title' => __('Blocks', 'pt-minigo'),
            // 'title' => __('Shortcodes', 'pt-minigo'),
            'desc' => __('You can set up the shortcodes used in the page content below.', 'pt-minigo'),
            'icon' => 'el-icon-asterisk',
            'icon-class' => 'icon-large',
        );

        // AddThis Shortcode
        $sections[] = array(
            'id' => 'addthis-section',
            'title' => ''.__('AddThis Widget', 'pt-minigo'),
            'subtitle' => __('In this section you can set your AddThis widget shortcode', 'pt-minigo'),
            'desc' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-addthis]</strong> '.__('shortcode in your pages.', 'pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-plus',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'addthis-switcher',
                    'type' => 'switch',
                    'title' => __('Enable AddThis Widget', 'pt-minigo'),
                    'subtitle' => __('If you\'re not using the AddThis shortcode, disable it so we don\'t load it\'s scripts.', 'pt-minigo'),
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 1
                    ),
                array(
                    'id'=>'addthis-heading',
                    'type' => 'text',
                    'title' => __('AddThis Widget Heading', 'pt-minigo'),
                    'subtitle' => __('This is the (optional) heading that will show on top of the widget', 'pt-minigo'),
                    'required' => array('addthis-switcher','equals','1'),
                    'default' => 'Share This',
                ),
                array(
                    'id'=>'addthis-script',
                    'type' => 'ace_editor',
                    'title' => __('AddThis Script Code', 'pt-minigo'),
                    'subtitle' => __('Paste your AddThis script code here.', 'pt-minigo'),
                    'required' => array('addthis-switcher','equals','1'),
                    'mode' => 'html',
                    //'theme' => 'monokai',
                    'desc' => __('Inserts the AddThis script code before the end of the body tag', 'pt-minigo'),
                    'default' => '<!-- Go to www.addthis.com/dashboard to customize your tools -->'."\n".'<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-543cf7a01fea0260"></script>'
                ),
                array(
                    'id'=>'addthis-code',
                    'type' => 'ace_editor',
                    'title' => __('AddThis Code', 'pt-minigo'),
                    'subtitle' => __('Paste your AddThis code here.', 'pt-minigo'),
                    'required' => array('addthis-switcher','equals','1'),
                    'mode' => 'html',
                    //'theme' => 'monokai',
                    'desc' => __('Inserts the AddThis HTML code where the shortcode is used', 'pt-minigo'),
                    'default' => '<!-- Go to www.addthis.com/dashboard to customize your tools -->'."\n".'<div class="addthis_sharing_toolbox"></div>'
                ),
            )
        );

        // Contact Info Shortcode
        $sections[] = array(
            'id' => 'contact-info-section',
            'title' => __('Contact Info', 'pt-minigo'),
            'subtitle' => __('Set up your contact info shortcode below.', 'pt-minigo') . '<a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">' . __('here', 'pt-minigo') .'</a>',
            'desc' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-contact-info]</strong> '.__('shortcode in your pages.', 'pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-address-book',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'contact-info-switcher',
                    'type' => 'switch',
                    'title' => __('Enable Contact Info Widget', 'pt-minigo'),
                    'subtitle' => __('If you\'re not using the Contact Info shortcode, disable it to be lean.', 'pt-minigo'),
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 1
                    ),
                array(
                    'id'=>'contact-info-heading',
                    'type' => 'text',
                    'title' => __('Contact Info Heading', 'pt-minigo'),
                    'subtitle' => __('This (optional) heading will be displayed above the contact info. Leave blank to hide.', 'pt-minigo'),
                    'required' => array('contact-info-switcher','=','1'),
                    'default' => 'Contact Info',
                ),
                array(
                    'id'=>'contact_info',
                    'type' => 'contact_info',
                    'title' => __('Contact Info', 'pt-minigo'),
                    'subtitle'=> __('On the right, you can:', 'pt-minigo').
                        '<ul class="help-subtitle">
                            <li>
                                <strong>'.__('Order', 'pt-minigo').'</strong> '.__('the items by dragging the title bar to the desired position in the stack.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Edit', 'pt-minigo').'</strong> '.__('each item by clicking on the title bar to expand it. Conversely, you can click on the title bar again to retract an expanded item.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Customize', 'pt-minigo').'</strong> '.__('the image, name, position, testimonial, url and new window options for each item.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Delete', 'pt-minigo').'</strong> '.__('any item by using the "Delete" button on the right.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Add', 'pt-minigo').'</strong> '.__('a new item using the "Add Contact Info" button. A new item will be added at the botom of the stack, ready to be edited.', 'pt-minigo').'
                            </li>
                        </ul>',
                    'options' => minigo_get_font_awesome_icons(),
                    'required' => array('contact-info-switcher','=','1'),
                    'default_show' => false,
                    'default' => array(
                            0 => array(
                                'title' => '+1 555 85952',
                                'url' => '',
                                'select' => 'fa-phone',
                                'force_row' => 0,
                                'sort' => 0
                                ),
                            1 => array(
                                'title' => 'mail@website.web',
                                'url' => 'mailto:mail@website.web',
                                'select' => 'fa-envelope-o',
                                'force_row' => 0,
                                'sort' => 1
                                ),
                            2 => array(
                                'title' => '345 Rodeo Drive San Jose, CA 95111, USA',
                                'url' => '',
                                'force_row' => 1,
                                'select' => 'fa-map-marker',
                                'sort' => 2
                                ),
                        )
                ),

            )
        );

        // Countdown Subsection
        $sections[] = array(
            'id' => 'countdown-section',
            'title' => __('Countdown', 'pt-minigo'),
            'desc' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-countdown]</strong> '.__('shortcode in your pages.', 'pt-minigo'),
            'icon_class' => 'icon-large',
            'subsection' => true,
            'icon' => 'el-icon-time',
            'fields' => array(

                array(
                    'id'=>'countdown-enabled',
                    'type' => 'switch',
                    'title' => __('Enable Countdown', 'pt-minigo'),
                    'subtitle'=> __('Choose whether or not you want the countdown timer to be displayed.', 'pt-minigo'),
                    "default" => 1,
                    ),
                array(
                    'id'=>'countdown-heading',
                    'type' => 'text',
                    'title' => __('Countdown Heading', 'pt-minigo'),
                    'subtitle' => __('This (optional) heading will be displayed above the Countdown. Leave blank to hide.', 'pt-minigo'),
                    'required' => array('countdown-enabled','=','1'),
                    'default' => 'Countdown',
                ),
                array(
                    'id' => 'countdown-type',
                    'type' => 'button_set',
                    'title' => __('Countdown Type', 'pt-minigo'),
                    'subtitle'=> __('Choose between two different countdown styles.', 'pt-minigo'),
                    'required' => array('countdown-enabled','=','1'),
                    'options' => array(
                        'default' => __('3D Flip Style', 'pt-minigo'),
                        'piechart' => __('Pie Chart Style', 'pt-minigo')
                        ),
                    'default' => 'default',
                ),

                array(
                    'id' => 'switch-charts',
                    'type' => 'switch',
                    'title' => __('Enable Charts Settings', 'pt-minigo'),
                    'default' => 0,
                    'required' => array('countdown-type', 'equals', 'piechart')
                ),
                array(
                    'id' => 'chart-track-color',
                    'type' => 'color_rgba',
                    'title' => __('Tracking Color', 'pt-minigo'),
                    // 'transparent' => true,
                    'required' => array('switch-charts', 'equals', '1'),
                    'default'  => array(
                        'color' => '#FFF',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'chart-bar-color',
                    'type' => 'color_rgba',
                    'title' => __('Bar Background Color', 'pt-minigo'),
                    'transparent' => false,
                    'required' => array('switch-charts', 'equals', '1'),
                    'default'  => array(
                        'color' => '#FFF',
                        'alpha' => '0'
                    ),
                ),
                array(
                    'id' => 'chart-outline-color',
                    'type' => 'color_rgba',
                    'title' => __('Outline Color', 'pt-minigo'),
                    'transparent' => false,
                    'required' => array('switch-charts', 'equals', '1'),
                    'default'  => array(
                        'color' => '#FFF',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'chart-line-width',
                    'type' => 'dimensions',
                    'title' => __('Chart Line Width', 'pt-minigo'),
                    'required' => array('switch-charts', 'equals', '1'),
                    'units' => false,
                    'height' => false,
                    'name' => '',
                    'default' => '6'
                ),
                array(
                    'id'=>'countdown-startDate',
                    'type' => 'date',
                    'required' => array('countdown-enabled','=','1'),
                    'title' => __('Countdown Start - Date', 'pt-minigo'),
                    'subtitle' => __('Date when the countdown started. Needed for the countdown progress bar.', 'pt-minigo'),
                    'default' => date('m/d/Y', time() - 60 * 24 * 60 * 60)
                    ),
                array(
                    'id'=>'countdown-startHour',
                    'type' => 'spinner',
                    'required' => array('countdown-enabled','=','1'),
                    'title' => __('Countdown Start - Hour', 'pt-minigo'),
                    'subtitle'=> __('Time when the countdown started. 24 hour format (00 to 23).', 'pt-minigo'),
                    "default"   => "23",
                    "min"       => "00",
                    "step"      => "1",
                    "max"       => "23",
                    ),
                array(
                    'id'=>'countdown-startMinutes',
                    'type' => 'spinner',
                    'required' => array('countdown-enabled','=','1'),
                    'title' => __('Countdown Start - Minutes', 'pt-minigo'),

                    "default"   => "59",
                    "min"       => "00",
                    "step"      => "1",
                    "max"       => "59",
                    ),
                array(
                    'id'=>'countdown-targetDate',
                    'type' => 'date',
                    'required' => array('countdown-enabled','=','1'),
                    'title' => __('Countdown End - Date', 'pt-minigo'),
                    'subtitle' => __('Date that we\'re counting down to.', 'pt-minigo'),
                    
                    'default' => date('m/d/Y', time() + 60 * 24 * 60 * 60)
                    ),
                array(
                    'id'=>'countdown-targetHour',
                    'type' => 'spinner',
                    'required' => array('countdown-enabled','=','1'),
                    'title' => __('Countdown End - Hour', 'pt-minigo'),
                    'subtitle'=> __('Time that we\'re counting down to. 24 hour format (00 to 23).', 'pt-minigo'),
                    "default"   => "23",
                    "min"       => "00",
                    "step"      => "1",
                    "max"       => "23",
                    ),
                array(
                    'id'=>'countdown-targetMinutes',
                    'type' => 'spinner',
                    'required' => array('countdown-enabled','=','1'),
                    'title' => __('Countdown End - Minutes', 'pt-minigo'),

                    "default"   => "59",
                    "min"       => "00",
                    "step"      => "1",
                    "max"       => "59",
                    ),
                array(
                    'id'=>'countdown-labels',
                    'type' => 'text',
                    'required' => array('countdown-enabled','=','1'),
                    'title' => __('Labels', 'pt-minigo'),
                    'subtitle'=> __('The labels of the individual countdown items. Comma separated list.', 'pt-minigo'),
                    "default"   => "DAYS,HOURS,MINUTES,SECONDS",
                    ),
            )
        );

        // Counter Features Shortcode
        $sections[] = array(
            'id' => 'counter-features-section',
            'title' => ''.__('Counter Features', 'pt-minigo'),
            'subtitle' => __('In this section you can set your Counter Features shortcodes', 'pt-minigo'),
            'desc' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-counter-features]</strong> '.__('shortcode in your pages.', 'pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-bell',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'counter-features-switcher',
                    'type' => 'switch',
                    'title' => __('Enable Counter Features', 'pt-minigo'),
                    'subtitle' => __('If you\'re not using the Counter Features shortcode, disable it to be lean.', 'pt-minigo'),
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 1
                    ),
                array(
                    'id'=>'counter-features-heading',
                    'type' => 'text',
                    'title' => __('Counter Features Heading', 'pt-minigo'),
                    'subtitle' => __('This is the heading that will show as Counter Features shortcode heading', 'pt-minigo'),
                    'required' => array('counter-features-switcher','=','1'),
                    'default' => 'Counter Features',
                ),
                array(
                    'id' => 'counter-features-columns',
                    'type' => 'button_set',
                    'title' => __('Number of columns', 'pt-minigo'),
                    'subtitle' => __('Choose how many columns you want to use to display Counter Features.', 'pt-minigo'),
                    'required' => array('counter-features-switcher','=','1'),
                    'options' => array(
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '8' => '8',
                        '10' => '10',
                        '12' => '12',
                        ),
                    'default' => '4',
                    ),
                array(
                    'id'=>'counter_features',
                    'type' => 'counter_features',
                    'output' => true,
                    'title' => __('Counter Features Setup', 'pt-minigo'),
                    'subtitle'=> __('On the right, you can:', 'pt-minigo').
                        '<ul class="help-subtitle">
                            <li>
                                <strong>'.__('Order', 'pt-minigo').'</strong> '.__('the items by dragging the title bar to the desired position in the stack.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Edit', 'pt-minigo').'</strong> '.__('each item by clicking on the title bar to expand it. Conversely, you can click on the title bar again to retract an expanded item.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Customize', 'pt-minigo').'</strong> '.__(' the icon, title and text for each item.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Delete', 'pt-minigo').'</strong> '.__('any item by using the "Delete" button on the right.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Add', 'pt-minigo').'</strong> '.__('a new item using the "Add Counter Feature" button. A new item will be added at the botom of the stack, ready to be edited.', 'pt-minigo').'
                            </li>
                        </ul>',
                    'options' => minigo_get_font_awesome_icons(),
                    'required' => array('counter-features-switcher','=','1'),
                    'default_show' => false,
                    'default' => array(
                            0 => array(
                                'title' => '5 Star Ratings',
                                'text' => 'What really matters is what users think and that\'s our main KPI. <strong>4.9</strong> average.',
                                'counter' => '90',
                                'select' => 'fa-star-o',
                                'sort' => 0,
                                ),
                            1 => array(
                                'title' => 'Average Rating',
                                'text' => 'We follow through with scalable, high quality code for any platform.',
                                'counter' => '4.9',
                                'select' => 'fa-heart-o',
                                'sort' => 1,
                                ),
                            2 => array(
                                'title' => 'Sales',
                                'text' => 'Robustness and reliability matters, proven and updated since 2014.',
                                'counter' => '3133',
                                'select' => 'fa-shopping-bag',
                                'sort' => 2,
                                ),
                            3 => array(
                                'title' => 'Admin Options',
                                'text' => 'Along with 8 skins, 20 shortcodes and the freedom to do whatever you imagine.',
                                'counter' => '368',
                                'select' => 'fa-gears',
                                'sort' => 3,
                                ),

                            )

                ),
            )
        );

        // Google Map Shortcode
        $sections[] = array(
            'id' => 'map-section',
            'title' => __('Google Map', 'pt-minigo'),
            // 'subtitle' => __('Set up your map shortcode below. Find your coordinates ', 'pt-minigo') . '<a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">' . __('here', 'pt-minigo') .'</a>',
            'desc' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-map]</strong> '.__('shortcode in your pages.', 'pt-minigo') . '<br>' . __('Find your coordinates', 'pt-minigo') . ' <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">' . __('here', 'pt-minigo') .'</a>',
            'subsection' => true,
            'icon' => 'el-icon-map-marker',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'map-switcher',
                    'type' => 'switch',
                    'title' => __('Enable Google Map', 'pt-minigo'),
                    'subtitle' => __('If you\'re not using the map shortcode, disable it so we don\'t load it\'s scripts.', 'pt-minigo'),
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 1
                ),
                array(
                    'id'=>'map_heading',
                    'type' => 'text',
                    'title' => __('Map Heading', 'pt-minigo'),
                    'subtitle' => __('Optional heading to be displayed before the map. Leave empty for no heading.', 'pt-minigo'),
                    'required' => array('map-switcher','equals','1'),
                    'default' => 'The Location',
                ),
                array(
                    'id' => 'map-style',
                    'type' => 'button_set',
                    'title' => __('Map Style', 'pt-minigo'),
                    'required' => array('map-switcher','equals','1'),
                    'options' => array(
                        'custom' => __('Monochrome', 'pt-minigo'),
                        'normal' => __('Normal', 'pt-minigo')
                        ),
                    'default' => 'custom',
                    ),
                array(
                    'id' => 'map-latitude',
                    'type' => 'text',
                    'title' => __('Latitude', 'pt-minigo'),
                    'required' => array('map-switcher','equals','1'),
                    'default' => '37.32961'
                    ),
                array(
                    'id' => 'map-longitude',
                    'type' => 'text',
                    'title' => __('Longitude', 'pt-minigo'),
                    'required' => array('map-switcher','equals','1'),
                    'default' => '-121.89063'
                    ),
                array(
                    'id' => 'map-allow-drag',
                    'title' => __('Allow Map Dragging', 'pt-minigo'),
                    'type' => 'switch',
                    'required' => array('map-switcher','equals','1'),
                    'default' => 1,
                    ),
                array(
                    'id' => 'map-zoom-level',
                    'type' => 'spinner',
                    'title' => __('Google Map Zoom Level', 'pt-minigo'),
                    'required' => array('map-switcher','equals','1'),
                    'default' => '15',
                    'min' => '5',
                    'max' => '17'
                    ),
                array(
                    'id' => 'map-wheel-zoom',
                    'title' => __('Zoom with MouseWheel', 'pt-minigo'),
                    'type' => 'switch',
                    'required' => array('map-switcher','equals','1'),
                    'default' => 0,
                    ),
                array(
                    'id' => 'map-button-zoom',
                    'title' => __('Show Zoom Buttons', 'pt-minigo'),
                    'type' => 'switch',
                    'required' => array('map-switcher','equals','1'),
                    'default' => 1,
                    ),
                array(
                    'id' => 'map-type',
                    'title' => __('Show Map Type Controls', 'pt-minigo'),
                    'subtitle' => __('ex. Terrain, Satellite', 'pt-minigo'),
                    'type' => 'switch',
                    'required' => array('map-switcher','equals','1'),
                    'default' => 1,
                    ),
                array(
                    'id' => 'map-street-view',
                    'title' => __('Show Street View Controls', 'pt-minigo'),
                    'type' => 'switch',
                    'required' => array('map-switcher','equals','1'),
                    'default' => 1,
                    ),
                array(
                    'id'=>'map-marker',
                    'type' => 'media',
                    'preview' => true,
                    'url'=> false,
                    'title' => __('Location marker icon', 'pt-minigo'),
                        'required' => array('map-switcher','equals','1'),
                    'default' => array('url' => $minigo_url . 'template/images/map-marker.png')
                ),
                array(
                    'id' => 'map-height',
                    'type' => 'text',
                    'required' => array('map-switcher', 'equals','1'),
                    'title' => __('Map Height', 'pt-minigo'),
                    'subtitle' => __('Map Height in pixels (optional)', 'pt-minigo'),
                    'validate' => 'numeric',
                    'default' => '300',
                    'class' => 'small-text'
                ),
            )
        );

        // Icon Features Shortcode
        $sections[] = array(
            'id' => 'icon-features-section',
            'title' => ''.__('Icon Features', 'pt-minigo'),
            'subtitle' => __('In this section you can set your icon features shortcodes', 'pt-minigo'),
            'desc' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-icon-features]</strong> '.__('shortcode in your pages.', 'pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-star',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'icon-features-switcher',
                    'type' => 'switch',
                    'title' => __('Enable Icon Features', 'pt-minigo'),
                    'subtitle' => __('If you\'re not using the Icon Features shortcode, disable it to be lean.', 'pt-minigo'),
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 1
                    ),
                array(
                    'id'=>'icon-features-heading',
                    'type' => 'text',
                    'title' => __('Icon Features Heading', 'pt-minigo'),
                    'subtitle' => __('This is the heading that will show as Icon Features shortcode heading', 'pt-minigo'),
                    'required' => array('icon-features-switcher','=','1'),
                    'default' => 'Icon Features',
                ),
                array(
                    'id' => 'icon-features-columns',
                    'type' => 'button_set',
                    'title' => __('Number of columns', 'pt-minigo'),
                    'subtitle' => __('Choose how many columns you want to use to display icon features.', 'pt-minigo'),
                    'required' => array('icon-features-switcher','=','1'),
                    'options' => array(
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '8' => '8',
                        '10' => '10',
                        '12' => '12',
                        ),
                    'default' => '4',
                    ),
                array(
                    'id'=>'icon_features',
                    'type' => 'icon_features',
                    'output' => true,
                    'title' => __('Icon Features Setup', 'pt-minigo'),
                    'subtitle'=> __('On the right, you can:', 'pt-minigo').
                        '<ul class="help-subtitle">
                            <li>
                                <strong>'.__('Order', 'pt-minigo').'</strong> '.__('the items by dragging the title bar to the desired position in the stack.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Edit', 'pt-minigo').'</strong> '.__('each item by clicking on the title bar to expand it. Conversely, you can click on the title bar again to retract an expanded item.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Customize', 'pt-minigo').'</strong> '.__(' the icon, title and text for each item.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Delete', 'pt-minigo').'</strong> '.__('any item by using the "Delete" button on the right.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Add', 'pt-minigo').'</strong> '.__('a new item using the "Add Icon Feature" button. A new item will be added at the botom of the stack, ready to be edited.', 'pt-minigo').'
                            </li>
                        </ul>',
                    'options' => minigo_get_font_awesome_icons(),
                    'required' => array('icon-features-switcher','=','1'),
                    'default_show' => false,
                    'default' => array(
                            0 => array(
                                'title' => 'Strategy',
                                'text' => 'In a world of MVPs MiniGO lets you publish early, test and grow an idea efficiently  and with no fuss.',
                                'sort' => 0,
                                'select' => 'fa-lightbulb-o'
                                ),
                            1 => array(
                                'title' => 'Design',
                                'text' => 'Designed to have an unobtrusive UI, it lets your content speak and your visuals impress. First impressions matter.',
                                'sort' => 1,
                                'select' => 'fa-pencil'
                                ),
                            2 => array(
                                'title' => 'Development',
                                'text' => 'Zero coding skills needed but we do include absolutely all sources for the devs who appreciate sass and such.',
                                'sort' => 2,
                                'select' => 'fa-code'
                                ),
                            3 => array(
                                'title' => 'Marketing',
                                'text' => 'Get your name out there, have a web placeholder, build a lead list right now, build the website in the meantime.',
                                'sort' => 3,
                                'select' => 'fa-bullhorn'
                                ),

                            )

                ),
            )
        );

        // Icon List Shortcode
        $sections[] = array(
            'id' => 'icon-list-section',
            'title' => ''.__('Icon List', 'pt-minigo'),
            'subtitle' => __('In this section you can set your icon list shortcodes', 'pt-minigo'),
            'desc' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-icon-list]</strong> '.__('shortcode in your pages.', 'pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-th-list',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'icon-list-switcher',
                    'type' => 'switch',
                    'title' => __('Enable Icon List', 'pt-minigo'),
                    'subtitle' => __('If you\'re not using the Icon List shortcode, disable it to be lean.', 'pt-minigo'),
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 1
                    ),
                array(
                    'id'=>'icon-list-heading',
                    'type' => 'text',
                    'title' => __('Icon List Heading', 'pt-minigo'),
                    'subtitle' => __('This is the heading that will show as icon list shortcode heading', 'pt-minigo'),
                    'required' => array('icon-list-switcher','=','1'),
                    'default' => 'Icon List',
                ),

                array(
                    'id' => 'icon-list-columns',
                    'type' => 'button_set',
                    'title' => __('Number of columns', 'pt-minigo'),
                    'subtitle' => __('Choose how many columns you want to use to display icon list.', 'pt-minigo'),
                    'required' => array('icon-list-switcher','=','1'),
                    'options' => array(
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '8' => '8',
                        '10' => '10',
                        '12' => '12',
                        ),
                    'default' => '2',
                    ),
                array(
                    'id'=>'icon_list',
                    'type' => 'icon_list',
                    'output' => true,
                    'title' => __('Icon List Setup', 'pt-minigo'),
                    'subtitle'=> __('On the right, you can:', 'pt-minigo').
                        '<ul class="help-subtitle">
                            <li>
                                <strong>'.__('Order', 'pt-minigo').'</strong> '.__(' the items by dragging the title bar to the desired position in the stack.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Edit', 'pt-minigo').'</strong> '.__(' each item by clicking on the title bar to expand it. Conversely, you can click on the title bar again to retract an expanded item.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Customize', 'pt-minigo').'</strong> '.__(' the icon and title for each item.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Delete', 'pt-minigo').'</strong> '.__(' any item by using the "Delete" button on the right.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Add', 'pt-minigo').'</strong> '.__(' a new item using the "Add Icon List Item" button. A new item will be added at the botom of the stack, ready to be edited.', 'pt-minigo').'
                            </li>
                        </ul>',
                    'options' => minigo_get_font_awesome_icons(),
                    'required' => array('icon-list-switcher','=','1'),
                    'default_show' => false,
                    'default' => array(
                            0 => array(
                                'title' => 'Page Editors for Sections',
                                'sort' => 0,
                                'select' => 'fa-align-center'
                                ),
                            1 => array(
                                'title' => '5 Minute Set-up',
                                'sort' => 1,
                                'select' => 'fa-bell'
                                ),
                            2 => array(
                                'title' => 'Count down to Launch',
                                'sort' => 2,
                                'select' => 'fa-calendar'
                                ),
                            3 => array(
                                'title' => 'Robustly Engineered',
                                'sort' => 3,
                                'select' => 'fa-car'
                                ),
                            4 => array(
                                'title' => 'Got some Awards!',
                                'sort' => 4,
                                'select' => 'fa-certificate'
                                ),
                            5 => array(
                                'title' => 'Gulp and SASS',
                                'sort' => 5,
                                'select' => 'fa-codepen'
                                ),
                            6 => array(
                                'title' => 'Fully Featured Admin',
                                'sort' => 6,
                                'select' => 'fa-dashboard'
                                ),
                            7 => array(
                                'title' => 'Build your Mailing List',
                                'sort' => 7,
                                'select' => 'fa-database'
                                ),
                            8 => array(
                                'title' => 'Pre-sell your Products',
                                'sort' => 8,
                                'select' => 'fa-diamond'
                                ),
                            9 => array(
                                'title' => 'Build a quick MVP',
                                'sort' => 9,
                                'select' => 'fa-flag-checkered'
                                ),
                            10 => array(
                                'title' => '4.9/5 Customer Rating',
                                'sort' => 10,
                                'select' => 'fa-heart'
                                ),
                            11 => array(
                                'title' => 'Newly Updated <strong>v3</strong> !',
                                'sort' => 11,
                                'select' => 'fa-hourglass-2'
                                ),

                            )

                ),
            )
        );

        // Icon Menu Shortcode
        $sections[] = array(
            'id' => 'icon-menu-section',
            'title' => ''.__('Icon Menu <span class="page-type">[Footer]</span>', 'pt-minigo'),
            'subtitle' => __('In this section you can set your icon menu shortcodes', 'pt-minigo'),
            'desc' => __('Here you can edit and sort the links displayed in the footer and/or the ','pt-minigo') .'<strong>[minigo-icon-menu]</strong> '. __('shortcode you can add to your pages.', 'pt-minigo') . '<br>' . __('For Footer navigation options, please visit the Navigation Options under Main Settings.','pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-info-circle',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id'=>'icon-menu-heading',
                    'type' => 'text',
                    'title' => __('Icon Menu Heading', 'pt-minigo'),
                    'subtitle' => __('This is the (optional) heading that will show as icon menu shortcode heading', 'pt-minigo'),
                    'default' => 'Icon Menu',
                ),
               array(
                'id'=>'icon_menu',
                'type' => 'icon_menu',
                'output' => true,
                'title' => __('Links', 'pt-minigo'),
                'subtitle'=> __('On the right, you can:', 'pt-minigo').
                    '<ul class="help-subtitle">
                        <li>
                            <strong>'.__('Order', 'pt-minigo').'</strong> '.__('the items by dragging the title bar to the desired position in the stack.', 'pt-minigo').'
                        </li>
                        <li>
                            <strong>'.__('Edit', 'pt-minigo').'</strong> '.__('each item by clicking on the title bar to expand it. Conversely, you can click on the title bar again to retract an expanded item.', 'pt-minigo').'
                        </li>
                        <li>
                            <strong>'.__('Customize', 'pt-minigo').'</strong> '.__('the text label (can leave blank), link url and target, icon and colors for each item.', 'pt-minigo').'
                        </li>
                        <li>
                            <strong>'.__('Delete', 'pt-minigo').'</strong> '.__('any item by using the "Delete" button on the right.', 'pt-minigo').'
                        </li>
                        <li>
                            <strong>'.__('Add', 'pt-minigo').'</strong> '.__('a new link using the "Add Link" button. A new item will be added at the botom of the stack, ready to be edited.', 'pt-minigo').'
                        </li>
                        <li>
                        <strong>'.__('To save a color, press the "Select" button', 'pt-minigo').' </strong>
                            <img class="c--picker-demo-submit" src="'. $minigo_url . 'inc/admin/img/c-picker-s.png' . '" alt="">
                        </li>
                    </ul>',
                'options' => minigo_get_font_awesome_icons(),
                'default_show' => false,
                'default' => array(
                        0 => array(
                            'title' => 'Follow us on Twitter',
                            'url' => 'https://twitter.com/PremioThemes',
                            'new-window' => 1,
                            'color' => '',
                            'border-color' => '',
                            'background' => '',
                            'color-hover' => '',
                            'border-color-hover' => '',
                            'background-hover' => '',
                            'select' => 'fa-twitter',
                            'sort' => 0
                            ),
                        1 => array(
                            'title' => 'Like us on Facebook',
                            'url' => 'https://www.facebook.com/PremioThemes',
                            'new-window' => 1,
                            'color' => '',
                            'border-color' => '',
                            'background' => '',
                            'color-hover' => '',
                            'border-color-hover' => '',
                            'background-hover' => '',
                            'select' => 'fa-facebook',
                            'sort' => 1
                            ),
                        2 => array(
                            'title' => 'Our Youtube Channel',
                            'url' => 'https://www.youtube.com/channel/UCsVztxXlDTQsLxgr2AVa31Q',
                            'new-window' => 1,
                            'color' => '',
                            'border-color' => '',
                            'background' => '',
                            'color-hover' => '',
                            'border-color-hover' => '',
                            'background-hover' => '',
                            'select' => 'fa-youtube-square',
                            'sort' => 2
                            ),
                        3 => array(
                            'title' => 'Pinterest Pinboard',
                            'url' => 'https://www.pinterest.com/PremioThemes/',
                            'new-window' => 1,
                            'color' => '',
                            'border-color' => '',
                            'background' => '',
                            'color-hover' => '',
                            'border-color-hover' => '',
                            'background-hover' => '',
                            'select' => 'fa-pinterest',
                            'sort' => 3
                            ),
                        3 => array(
                            'title' => 'Behance Portfolio',
                            'url' => 'https://www.behance.net/PremioThemes',
                            'new-window' => 1,
                            'color' => '',
                            'border-color' => '',
                            'background' => '',
                            'color-hover' => '',
                            'border-color-hover' => '',
                            'background-hover' => '',
                            'select' => 'fa-behance',
                            'sort' => 3
                            ),
                        4 => array(
                            'title' => 'Connect on Linkedin',
                            'url' => 'https://www.linkedin.com/company/4994120',
                            'new-window' => 1,
                            'color' => '',
                            'border-color' => '',
                            'background' => '',
                            'color-hover' => '',
                            'border-color-hover' => '',
                            'background-hover' => '',
                            'select' => 'fa-linkedin',
                            'sort' => 4
                            ),
                        5 => array(
                            'title' => '© 2014-2017 Premio Themes, All rights reserved.',
                            'url' => '',
                            'new-window' => 1,
                            'color' => '',
                            'border-color' => '',
                            'background' => '',
                            'color-hover' => '',
                            'border-color-hover' => '',
                            'background-hover' => '',
                            'select' => 'fa-copyright',
                            'sort' => 5
                            ),
                    )
                ),

                )
            
        );

        // Photo Gallery Shortcode
        $sections[] = array(
            'id' => 'gallery-section',
            'subsection' => true,
            'title' => __('Photo Gallery', 'pt-minigo'),
            'desc' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-gallery]</strong> '.__('shortcode in your pages.', 'pt-minigo'),
            'icon-class' => 'icon-large',
            'icon' => 'el-icon-picasa',
            'fields' => array(
                array(
                    'id' => 'gallery-switcher',
                    'type' => 'switch',
                    'title' => __('Enable Gallery', 'pt-minigo'),
                    'subtitle' => __('If you\'re not using the Gallery shortcode, disable it to be lean.', 'pt-minigo'),
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 1
                    ),
                array(
                    'id'       => 'photo-gallery',
                    'type'     => 'gallery',
                    'title' => __('Gallery', 'pt-minigo'),
                    'subtitle' => __('Use the <strong>Add/Edit Gallery</strong> button in order to select and order the images you want to have in the gallery section.', 'pt-minigo') . '<br><br>' . __('If your gallery is empty, make sure you click on the "Add to Gallery" tab in media manager pop-up as there is nothing to edit.', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                ),
                // array(
                //     'id'=>'gallery-heading',
                //     'type' => 'text',
                //     'title' => __('Gallery Heading', 'pt-minigo'),
                //     'subtitle' => __('This will show up as the gallery heading, leave empty for none.', 'pt-minigo'),
                //     'required' => array('gallery-switcher','=','1'),
                //     'default' => 'Photo Gallery',
                // ),
                array(
                    'id' => 'gallery-options-section',
                    'type' => 'section',
                    'indent' => true,
                    'title' => ''.__('Gallery Options', 'pt-minigo'),
                    'subtitle' => __('In this sub-section you can control the options for the gallery.', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                ),

                array(
                    'id' => 'gallery-thumbnails',
                    'type' => 'button_set',
                    'title' => __('Thumbnail Size', 'pt-minigo'),
                    'subtitle'=> __('Changes the size of your thumbnails depending on how large you need them.', 'pt-minigo') . '<br>' . __('Typical widths are 150px for Small, 300px for Medium, 1024px for Large and full uploaded image size for Full. Change them in Settings > Media.', 'pt-minigo'),
                    'options' => array(
                        'default' => __('Default', 'pt-minigo'),
                        'thumbnail' => __('Tiny', 'pt-minigo'),
                        'medium' => __('Small', 'pt-minigo'),
                        'medium_large' => __('Medium', 'pt-minigo'),
                        'large' => __('Large', 'pt-minigo'),
                        'post-thumbnail' => __('Big', 'pt-minigo'),
                        'full' => __('Full', 'pt-minigo')
                        ),
                    'default' => 'default'
                ),
                array(
                    'id'=>'open-images-in-lightbox',
                    'type' => 'switch',
                    'title' => __('Open Images in Lightbox', 'pt-minigo'),
                    'subtitle'=> __('Choose whether or not you want the images in the gallery be opened in a lightbox.', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => true,
                ),
                array(
                    'id'=>'show-gallery-dots',
                    'type' => 'switch',
                    'title' => __('Show dots under the gallery for navigation', 'pt-minigo'),
                    'subtitle'=> __('Choose whether or not you want the gallery to have navigation dots.', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => true,
                ),
                
                array(
                    'id'=>'show-gallery-numbers',
                    'type' => 'switch',
                    'title' => __('Show numbers instead of dots navigation', 'pt-minigo'),
                    'subtitle'=> __('Replaces the dots with numbers.', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    'required' => array('show-gallery-dots', 'equals', '1'),
                    "default"       => false,
                ),

                array(
                    'id'=>'show-gallery-left-right-arrows',
                    'type' => 'switch',
                    'title' => __('Show left/right arrows in the gallery for navigation', 'pt-minigo'),
                    'subtitle'=> __('Choose whether or not you want the gallery to have navigation arrows.', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => true,
                ),

                 array(
                    'id'=>'gallery-rows',
                    'type' => 'text',
                    'title' => __('Gallery items rows', 'pt-minigo'),
                    'subtitle' => __('Define how many rows you want on the gallery', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    'default' => '1',
                ),
                 array(
                    'id'=>'gallery-cols',
                    'type' => 'text',
                    'title' => __('Gallery items columns', 'pt-minigo'),
                    'subtitle' => __('Define how many columns you want on the gallery', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    'default' => '4',
                ),

                 array(
                    'id'=>'slides-to-scroll',
                    'type' => 'text',
                    'title' => __('Gallery number of items to scroll', 'pt-minigo'),
                    'subtitle' => __('Define how many columns you want to scroll on sliding left/right', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    'default' => '4',
                ),
                array(
                    'id'=>'gallery-autoplay',
                    'type' => 'switch',
                    'title' => __('Autoplay', 'pt-minigo'),
                    'subtitle'=> __('Enable autoplay of slides.', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => false,
                ),
                 array(
                    'id'=>'gallery-autoplay-speed',
                    'type' => 'text',
                    'title' => __('Autoplay Speed', 'pt-minigo'),
                    'subtitle' => __('Set the time between autoplay animations (ms)', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    'default' => '3000',
                ),
                array(
                    'id'=>'slides-scroll-speed',
                    'type' => 'text',
                    'title' => __('Gallery scroll speed', 'pt-minigo'),
                    'subtitle' => __('Define how fast you want to scroll on sliding left/right', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    'default' => '500',
                ),

                array(
                    'id'=>'gallery-infinite-scroll',
                    'type' => 'switch',
                    'title' => __('Inifinite Slide', 'pt-minigo'),
                    'subtitle'=> __('if set to true the carousel will always be slid to first slide if no slide left.', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => false,
                ),
                
                 array(
                    'id'=>'gallery-centermode',
                    'type' => 'switch',
                    'title' => __('Gallery Centermode', 'pt-minigo'),
                    'subtitle'=> __('if set to true the carousel show the active slide in the middle.', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => false,
                ),


                array(
                    'id' => 'photo-gallery-breakpoint-1',
                    'type' => 'section',
                    'indent' => true,
                    'required' => array('gallery-switcher','=','1'),
                    'title' => ''.__('Gallery Breakpoint 1', 'pt-minigo'),
                ),
                array(
                    'id'=>'gallery-break-1-width',
                    'type' => 'text',
                    'title' => __('Minimum width', 'pt-minigo'),
                    'subtitle'=> __('Minimum width to apply this media break point', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => 1024,
                ),
                array(
                    'id'=>'gallery-break-1-slides',
                    'type' => 'text',
                    'title' => __('Slides to Show', 'pt-minigo'),
                    'subtitle'=> __('Number of slides to show', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => 4,
                ),
                array(
                    'id'=>'gallery-break-1-slides-to-scroll',
                    'type' => 'text',
                    'title' => __('Slides to Slide', 'pt-minigo'),
                    'subtitle'=> __('Number of slides to scroll', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => 4,
                ),

                array(
                    'id' => 'photo-gallery-breakpoint-2',
                    'type' => 'section',
                    'title' => ''.__('Gallery Breakpoint 2', 'pt-minigo'),
                    'indent' => true,
                    'required' => array('gallery-switcher','=','1'),
                ),
                array(
                    'id'=>'gallery-break-2-width',
                    'type' => 'text',
                    'title' => __('Minimum width', 'pt-minigo'),
                    'subtitle'=> __('Minimum width to apply this media break point', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => 768,
                ),
                array(
                    'id'=>'gallery-break-2-slides',
                    'type' => 'text',
                    'title' => __('Slides to Show', 'pt-minigo'),
                    'subtitle'=> __('Number of slides to show', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => 3,
                ),
                array(
                    'id'=>'gallery-break-2-slides-to-scroll',
                    'type' => 'text',
                    'title' => __('Slides to Show', 'pt-minigo'),
                    'subtitle'=> __('Number of slides to scroll', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => 3,
                ),

                array(
                    'id' => 'photo-gallery-breakpoint-3',
                    'type' => 'section',
                    'title' => ''.__('Gallery Breakpoint 3', 'pt-minigo'),
                    'indent' => true,
                    'required' => array('gallery-switcher','=','1'),
                ),
                array(
                    'id'=>'gallery-break-3-width',
                    'type' => 'text',
                    'title' => __('Minimum width', 'pt-minigo'),
                    'subtitle'=> __('Minimum width to apply this media break point', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => 520,
                ),
                array(
                    'id'=>'gallery-break-3-slides',
                    'type' => 'text',
                    'title' => __('Slides to Show', 'pt-minigo'),
                    'subtitle'=> __('Number of slides to show', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => 2,
                ),
                array(
                    'id'=>'gallery-break-3-slides-to-scroll',
                    'type' => 'text',
                    'title' => __('Slides to Show', 'pt-minigo'),
                    'subtitle'=> __('Number of slides to scroll', 'pt-minigo'),
                    'required' => array('gallery-switcher','=','1'),
                    "default"       => 2,
                )
            )
        );

        // Progress Bars Shortcode
        $sections[] = array(
            'id' => 'progress-bars-section',
            'subsection' => true,
            'title' => __('Progress Bars', 'pt-minigo'),
            'subtitle' => __('In this section you can set up your progress bars shortcodes', 'pt-minigo'),
            'desc' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-progress-bars]</strong> '.__('shortcode in your pages.', 'pt-minigo'),
            'icon' => 'el-icon-bulb',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'progress-bars-switcher',
                    'type' => 'switch',
                    'title' => __('Enable Progress Bars', 'pt-minigo'),
                    'subtitle' => __('If you\'re not using the Progress Bars shortcode, disable it to be lean.', 'pt-minigo'),
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 1
                    ),
                array(
                    'id'=>'progress_heading',
                    'type' => 'text',
                    'title' => __('Progress Bars Heading', 'pt-minigo'),
                    'subtitle' => __('This is the heading that will show as the shortcode heading', 'pt-minigo'),
                    'required' => array('progress-bars-switcher','=','1'),
                    'default' => 'Our Skills',
                ),
                array(
                    'id' => 'progress-bars-columns',
                    'type' => 'button_set',
                    'title' => __('Number of columns', 'pt-minigo'),
                    'subtitle' => __('Choose how many columns you want to use.', 'pt-minigo'),
                    'required' => array('progress-bars-switcher','=','1'),
                    'options' => array(
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '8' => '8',
                        '10' => '10',
                        '12' => '12',
                        ),
                    'default' => '2',
                ),
                array(
                    'id'=>'progress_bars',
                    'type' => 'progress_bars',
                    'output' => true,
                    'title' => __('Progress Bars Setup', 'pt-minigo'),
                    'subtitle'=> __('On the right, you can:', 'pt-minigo').
                        '<ul class="help-subtitle">
                            <li>
                                <strong>'.__('Order', 'pt-minigo').'</strong> '.__('the items by dragging the title bar to the desired position in the stack.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Edit', 'pt-minigo').'</strong> '.__('each item by clicking on the title bar to expand it. Conversely, you can click on the title bar again to retract an expanded item.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Customize', 'pt-minigo').'</strong> '.__(' the title, progress amount, bar color, border color and background color for each item.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Delete', 'pt-minigo').'</strong> '.__('any item by using the "Delete" button on the right.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Add', 'pt-minigo').'</strong> '.__('a new item using the "Add Progress Bar" button. A new item will be added at the botom of the stack, ready to be edited.', 'pt-minigo').'
                            </li>
                        </ul>',
                    // 'options' => minigo_get_font_awesome_icons(),
                    'required' => array('progress-bars-switcher','=','1'),
                    'default_show' => false,
                    'default' => array(
                        0 => array(
                            'title' => 'User Experience Design',
                            'progress' => '94',
                            'value' => '94',
                            'sort' => 0,
                            'bar-color' => '',
                            'border-color'=> '',
                            'background' => '',
                            'select' => array()
                        ),
                        1 => array(
                            'title' => 'Empathy',
                            'progress' => '100',
                            'value' => '100',
                            'sort' => 1,
                            'bar-color' => '',
                            'border-color'=> '',
                            'background' => '',
                            'select' => array()
                        ),
                        2 => array(
                            'title' => 'Front-End Development',
                            'value' => '76',
                            'progress' => '76',
                            'sort' => 2,
                            'bar-color' => '',
                            'border-color'=> '',
                            'background' => '',
                            'select' => array()
                        ),
                        3 => array(
                            'title' => 'User Interface Design',
                            'value' => '8/10',
                            'progress' => '80',
                            'sort' => 0,
                            'bar-color' => '',
                            'border-color'=> '',
                            'background' => '',
                            'select' => array()
                        ),
                        4 => array(
                            'title' => 'Achievements',
                            'value' => '24 of 200',
                            'progress' => '12',
                            'sort' => 1,
                            'bar-color' => '',
                            'border-color'=> '',
                            'background' => '',
                            'select' => array()
                        ),
                        5 => array(
                            'title' => 'Back-End Development',
                            'value' => '81',
                            'progress' => '81',
                            'sort' => 2,
                            'bar-color' => '',
                            'border-color'=> '',
                            'background' => '',
                            'select' => array()
                        ),
                        6 => array(
                            'title' => 'Digital Marketing',
                            'value' => '78%',
                            'progress' => '78',
                            'sort' => 0,
                            'bar-color' => '',
                            'border-color'=> '',
                            'background' => '',
                            'select' => array()
                        ),
                        7 => array(
                            'title' => 'Servers broken till now',
                            'value' => 'Zero',
                            'progress' => '0',
                            'sort' => 1,
                            'bar-color' => '',
                            'border-color'=> '',
                            'background' => '',
                            'select' => array()
                            ),
                        )

                ),
            )
        );

        // Shop Shortcode
        $sections[] = array(
            'id' => 'shop-section',
            'title' => ''.__('Shop Widget', 'pt-minigo'),
            'subtitle' => __('In this section you can set your [minigo-shop] widget shortcode.','pt-minigo').'<br>'. __('It\'s important to note that you need to install the Ecwid plugin and set up a shop in order for it to work.', 'pt-minigo'),
            'desc' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-shop]</strong> '.__('shortcode in your pages.', 'pt-minigo'),
            'subsection' => true,
            'icon' => 'el-icon-shopping-cart',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'shop-switcher',
                    'type' => 'switch',
                    'title' => __('Enable Shop Widget', 'pt-minigo'),
                    'subtitle' => __('If you\'re not using the Shop shortcode, disable it to be lean.', 'pt-minigo'),
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 1
                    ),
                array(
                    'id'=>'shop-heading',
                    'type' => 'text',
                    'title' => __('Shop Widget Heading', 'pt-minigo'),
                    'subtitle' => __('This is the (optional) heading that will show on top of the widget', 'pt-minigo'),
                    'required' => array('shop-switcher','equals','1'),
                    'default' => 'Get the Gear',
                ),
                array(
                    'id' => 'shop-before-content-switcher',
                    'type' => 'switch',
                    'title' => __('Show Content Before Shop?', 'pt-minigo'),
                    'subtitle' => __('If you need to, you can display an editable content block before the Shop block.', 'pt-minigo'),
                    'required' => array('shop-switcher','equals','1'),
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 0
                    ),
                array(
                    'id'=>'shop-before-content',
                    'required' => array('shop-switcher','equals','1'),
                    'required' => array('shop-before-content-switcher','equals','1'),
                    'title' => __('Content Before the Shop', 'pt-minigo'),
                    'subtitle' => __('Optional content area, displays after the shop.', 'pt-minigo'),
                    'type' => 'editor',
                    'args' => array(
                        'teeny' => false,
                        'textarea_rows' => 20
                    ),
                    'default' => '',
                    ),
                array(
                    'id'=>'shop-code',
                    'type' => 'ace_editor',
                    'title' => __('Shop Code', 'pt-minigo'),
                    'subtitle' => __('Paste your Shop code here.', 'pt-minigo'),
                    'required' => array('shop-switcher','equals','1'),
                    'mode' => 'html',
                    //'theme' => 'monokai',
                    'desc' => __('Inserts the Shop HTML code where the shortcode is used', 'pt-minigo'),
                    'default' => '<div id="my-store-10270054"></div>'."\n".'<div><script type="text/javascript" src="https://app.ecwid.com/script.js?10270054&data_platform=code&data_date=2016-10-10" charset="utf-8"></script>'."\n".'<script type="text/javascript"> xProductBrowser("categoriesPerRow=3","views=grid(3,3) list(10) table(20)","categoryView=grid","searchView=list","id=my-store-10270054");</script>'."\n".'</div>'
                ),
                array(
                    'id' => 'shop-after-content-switcher',
                    'type' => 'switch',
                    'title' => __('Show Content After Shop?', 'pt-minigo'),
                    'subtitle' => __('If you need to, you can display an editable content block after the Shop block.', 'pt-minigo'),
                    'required' => array('shop-switcher','equals','1'),
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 0
                    ),
                array(
                    'type' => 'editor',
                    'id'=>'shop-after-content',
                    'title' => __('Content After the Shop Adrea', 'pt-minigo'),
                    'subtitle' => __('Optional content area, displays after the shop.', 'pt-minigo'),
                    'required' => array('shop-switcher','equals','1'),
                    'required' => array('shop-after-content-switcher','equals','1'),
                    'args' => array(
                        'teeny' => false,
                        'textarea_rows' => 20
                    ),
                    'default' => '',
                    ),
            )
        );


        // Team Members Shortcode
        $sections[] = array(
            'id' => 'team-section',
            'subsection' => true,
            'title' => __('Team Members', 'pt-minigo'),
            'subtitle' => __('In this section you can set your Teams shortcodes', 'pt-minigo'),
            'desc' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-team]</strong> '.__('shortcode in your pages.', 'pt-minigo'),
            'icon' => 'el-icon-user',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'team-switcher',
                    'type' => 'switch',
                    'title' => __('Enable Team', 'pt-minigo'),
                    'subtitle' => __('If you\'re not using the Team shortcode, disable it to be lean.', 'pt-minigo'),
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 1
                    ),
                array(
                    'id'=>'team-heading',
                    'type' => 'text',
                    'title' => __('Team Heading', 'pt-minigo'),
                    'subtitle' => __('This is the heading that will show as teams shortcode heading', 'pt-minigo'),
                    'required' => array('team-switcher','=','1'),
                    'default' => 'The Team',
                ),
                array(
                    'id' => 'team-columns',
                    'type' => 'button_set',
                    'title' => __('Number of columns', 'pt-minigo'),
                    'subtitle' => __('Choose how many columns you want to use to display team members.', 'pt-minigo'),
                    'required' => array('team-switcher','=','1'),
                    'options' => array(
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '8' => '8',
                        '10' => '10',
                        '12' => '12',
                        ),
                    'default' => '4',
                    ),
                array(
                    'id'=>'team_profiles',
                    'type' => 'team_profiles',
                    'title' => __('Team Profiles', 'pt-minigo'),
                    'subtitle'=> __('On the right, you can:', 'pt-minigo').
                        '<ul class="help-subtitle">
                            <li>
                                <strong>'.__('Order', 'pt-minigo').'</strong> '.__('the items by dragging the title bar to the desired position in the stack.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Edit', 'pt-minigo').'</strong> '.__('each item by clicking on the title bar to expand it. Conversely, you can click on the title bar again to retract an expanded item.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Customize', 'pt-minigo').'</strong> '.__('the image, first and last names, job title and social links for each member.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Delete', 'pt-minigo').'</strong> '.__('any item by using the "Delete" button on the right.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Add', 'pt-minigo').'</strong> '.__('a new item using the "Add Team Member" button. A new item will be added at the botom of the stack, ready to be edited.', 'pt-minigo').'
                            </li>
                        </ul>',
                    'output' => true,
                    'default_show' => true,
                    // 'options' => minigo_get_font_awesome_icons(),
                    'required' => array('team-switcher','=','1'),
                    'default' => array(
                            0 => array(

                                'attachment_id' => '',                                
                                'thumb' => $profiles_url.'profile-1.jpg',
                                'image' => $profiles_url.'profile-1.jpg',
                                
                                'first_name' => 'Jeremy',
                                'last_name' => 'May',
                                'job_title' => 'UX Designer',
                                'sort' => 0,
                                'fa-link' => '#',
                                'fa-envelope' => '',
                                'fa-phone' => '',
                                'fa-facebook' => '#',
                                'fa-twitter' => '',
                                'fa-linkedin' => '',
                                'fa-pinterest' => '',
                                'fa-google-plus' => '#',
                                'fa-youtube' => '',
                                'fa-instagram' => '',
                                'fa-flickr' => '',
                                'fa-skype' => '',
                                'fa-whatsapp' => '',
                                'fa-snapchat' => '#',
                                'fa-vine' => '',
                                'fa-wordpress' => '',
                                'fa-tumblr' => '',
                                'fa-slack' => '',
                                'fa-git' => '',
                                'fa-behance' => '',
                                'fa-dribbble' => '',
                                'fa-deviantart' => ''
                                ),
                            1 => array(
                                
                                'attachment_id' => '',
                                'thumb' => $profiles_url.'profile-2.jpg',
                                'image' => $profiles_url.'profile-2.jpg',
                                
                                'first_name' => 'Richard',
                                'last_name' => 'Clarkson',
                                'job_title' => 'Front-End Developer',
                                'sort' => 1,
                                'fa-link' => '',
                                'fa-envelope' => '',
                                'fa-phone' => '',
                                'fa-facebook' => '#',
                                'fa-twitter' => '',
                                'fa-linkedin' => '',
                                'fa-pinterest' => '',
                                'fa-google-plus' => '',
                                'fa-youtube' => '',
                                'fa-instagram' => '',
                                'fa-flickr' => '#',
                                'fa-skype' => '',
                                'fa-whatsapp' => '',
                                'fa-snapchat' => '',
                                'fa-vine' => '',
                                'fa-wordpress' => '',
                                'fa-tumblr' => '#',
                                'fa-slack' => '',
                                'fa-git' => '',
                                'fa-behance' => '',
                                'fa-dribbble' => '#',
                                'fa-deviantart' => ''
                                ),
                            2 => array(
                                
                                'attachment_id' => '',
                                'thumb' => $profiles_url.'profile-3.jpg',
                                'image' => $profiles_url.'profile-3.jpg',

                                'first_name' => 'James',
                                'last_name' => 'Hammond',
                                'job_title' => 'Back-End Developer',
                                'sort' => 2,
                                'fa-link' => '',
                                'fa-envelope' => '#',
                                'fa-phone' => '',
                                'fa-facebook' => '',
                                'fa-twitter' => '',
                                'fa-linkedin' => '',
                                'fa-pinterest' => '',
                                'fa-google-plus' => '#',
                                'fa-youtube' => '',
                                'fa-instagram' => '',
                                'fa-flickr' => '',
                                'fa-skype' => '',
                                'fa-whatsapp' => '#',
                                'fa-snapchat' => '',
                                'fa-vine' => '',
                                'fa-wordpress' => '',
                                'fa-tumblr' => '',
                                'fa-slack' => '',
                                'fa-git' => '#',
                                'fa-behance' => '',
                                'fa-dribbble' => '',
                                'fa-deviantart' => ''
                                ),
                            3 => array(

                                'attachment_id' => '',                                
                                'thumb' => $profiles_url.'profile-4.jpg',
                                'image' => $profiles_url.'profile-4.jpg',
                                
                                'first_name' => 'Matt',
                                'last_name' => 'Jones',
                                'job_title' => 'Marketing Expert',
                                'sort' => 0,
                                'fa-link' => '',
                                'fa-envelope' => '',
                                'fa-phone' => '#',
                                'fa-facebook' => '',
                                'fa-twitter' => '',
                                'fa-linkedin' => '#',
                                'fa-pinterest' => '#',
                                'fa-google-plus' => '',
                                'fa-youtube' => '',
                                'fa-instagram' => '',
                                'fa-flickr' => '#',
                                'fa-skype' => '',
                                'fa-whatsapp' => '',
                                'fa-snapchat' => '',
                                'fa-vine' => '',
                                'fa-wordpress' => '',
                                'fa-tumblr' => '',
                                'fa-slack' => '',
                                'fa-git' => '',
                                'fa-behance' => '#',
                                'fa-dribbble' => '',
                                'fa-deviantart' => '',
                                ),
                            )
                ),
            )
        );

        // Testimonials Shortcode
        $sections[] = array(
            'id' => 'testimonials-section',
            'title' => __('Testimonials Options', 'pt-minigo'),
            'desc' => __('This can be accessed by using the ', 'pt-minigo').'<strong>[minigo-testimonials]</strong> '.__('shortcode in your pages.', 'pt-minigo'),
            'subsection' => true,
            'icon-class' => 'icon-large',
            'icon' => 'el-icon-quotes',
            'fields' => array(
                array(
                    'id' => 'testimonials-switcher',
                    'type' => 'switch',
                    'title' => __('Enable Testimonials', 'pt-minigo'),
                    'subtitle' => __('If you\'re not using the Testimonials shortcode, disable it to be lean.', 'pt-minigo'),
                    'on' => 'Yes',
                    'off' => 'No',
                    'default' => 1
                    ),
                // array(
                //     'id' => 'testimonials-subsection',
                //     'type' => 'section',
                //     'indent' => true,
                //     'title' => ''.__('Testimonials', 'pt-minigo'),
                //     'required' => array('testimonials-switcher','=','1'),
                //     'subtitle' => __('In this sub-section you can control the options for the testimonial slider.', 'pt-minigo')
                // ),
                array(
                    'id'=>'testimonials-heading',
                    'type' => 'text',
                    'title' => __('Testimonials Heading', 'pt-minigo'),
                    'subtitle' => __('This is the heading that will show as testimonials shortcode heading', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    'default' => 'Testimonials',
                ),
                array(
                    'id'=>'testimonials',
                    'type' => 'testimonials',
                    'title' => __('Testimonials', 'pt-minigo'),
                    'subtitle'=> __('On the right, you can:', 'pt-minigo').
                        '<ul class="help-subtitle">
                            <li>
                                <strong>'.__('Order', 'pt-minigo').'</strong> '.__('the items by dragging the title bar to the desired position in the stack.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Edit', 'pt-minigo').'</strong> '.__('each item by clicking on the title bar to expand it. Conversely, you can click on the title bar again to retract an expanded item.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Customize', 'pt-minigo').'</strong> '.__('the image, name, position, testimonial, url and new window options for each item.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Delete', 'pt-minigo').'</strong> '.__('any item by using the "Delete" button on the right.', 'pt-minigo').'
                            </li>
                            <li>
                                <strong>'.__('Add', 'pt-minigo').'</strong> '.__('a new item using the "Add Testimonial" button. A new item will be added at the botom of the stack, ready to be edited.', 'pt-minigo').'
                            </li>
                        </ul>',
                    'output' => true,
                    'required' => array('testimonials-switcher','=','1'),
                    'default_show' => true,
                    'options' => minigo_get_font_awesome_icons(),
                    'default' => array(
                            0 => array(
                                'attachment_id' => '',                                
                                'thumb' => $profiles_url.'profile-1.jpg',
                                'image' => $profiles_url.'profile-1.jpg',

                                'name' => 'Edward Williams',
                                'position' => 'CEO, Square Clothes',
                                'url' => 'http://pre.la/minigo-reviews',
                                'new_window' => 1,
                                'select' => 'fa-quote-left',
                                'quote' => 'Medal of Support! This guys should get a medal for his support. He mailed me in seconds after I asked for support and helped me out. Thx PremioThemes! Great plugin for a quick "Under Maintenance" or "Under Construction" website. Very flexible and easy going. Saved me hours of work. Thank you and keep up the great work.',
                                'sort' => 0
                                ),
                            1 => array(
                                'attachment_id' => '',                                
                                'thumb' => $profiles_url.'profile-2.jpg',
                                'image' => $profiles_url.'profile-2.jpg',

                                'name' => 'Charles Bowker',
                                'position' => 'CMO, Toncon',
                                'url' => 'http://pre.la/minigo-reviews',
                                'new_window' => 1,
                                'select' => 'fa-quote-left',
                                'quote' => 'Hello ! This word to tell you that your 2.0 version is purely AWESOME ! I never thought a coming soon plugin could offer such lots of visual configuration ! Plus, you added audio also as well as tons of styles, fonts, colors etc…the freaking MOST KILLER COMING SOON on codecanyon ! Hyper nice job !! I’m totally bluffed ! Cheers, Seb',
                                'sort' => 1
                                ),
                            2 => array(
                                'attachment_id' => '',                                
                                'thumb' => $profiles_url.'profile-3.jpg',
                                'image' => $profiles_url.'profile-3.jpg',

                                'name' => 'Mark Healy',
                                'position' => 'PR, K-dox',
                                'url' => 'http://pre.la/minigo-reviews',
                                'new_window' => 1,
                                'select' => 'fa-quote-left',
                                'quote' => 'Great plugin for a quick "Under Maintenance" or "Under Construction" website. Very flexible and easy going. Saved me hours of work. Thank you and keep up the great work.',
                                'sort' => 2
                                ),
                            3 => array(
                                'attachment_id' => '',                                
                                'thumb' => $profiles_url.'profile-4.jpg',
                                'image' => $profiles_url.'profile-4.jpg',

                                'name' => 'Charles Hillman',
                                'position' => 'Director, Convolin',
                                'url' => 'http://pre.la/minigo-reviews',
                                'new_window' => 1,
                                'select' => 'fa-quote-left',
                                'quote' => 'We\'ve used many different Coming Soon plugins, but MiniGO is without a doubt the best one we\'ve used to date! It has so many different features allowing us to create a page that looks and functions exactly how we want it to! Add in the simple SEO capabilities, easy controls, overall style and of course, the AMAZING customer support and you\'ve got yourself the complete package! If you are choosing what Coming Soon plugin to use, this is definitely the one to get!',
                                'sort' => 3
                                ),
                            4 => array(
                                'attachment_id' => '',                                
                                'thumb' => $profiles_url.'profile-3.jpg',
                                'image' => $profiles_url.'profile-3.jpg',

                                'name' => 'Paul Tovar',
                                'position' => 'Founder, Inchcare',
                                'url' => 'http://pre.la/minigo-reviews',
                                'new_window' => 1,
                                'select' => 'fa-quote-left',
                                'quote' => 'The plugin is a lifesaver, it is fully customizable with an elegant design for the price. And when it comes to support, the seller is 100% there, even at odd hours of the week. I am very pleased with this purchase and would recommend them to everyone. Thanks a ton for making this so useful and easy!',
                                'sort' => 4
                                ),
                            5 => array(
                                'attachment_id' => '',                                
                                'thumb' => $profiles_url.'profile-2.jpg',
                                'image' => $profiles_url.'profile-2.jpg',

                                'name' => 'David Burden',
                                'position' => 'CMO, Triotex',
                                'url' => '#',
                                'new_window' => 1,
                                'select' => 'fa-quote-left',
                                'quote' => 'It does what really need for a coming soon plugin and it does it well. A lot of options, elegant and effective. The best on the market. This plugin has everything you would ever need for any small site. Amazing work!!',
                                'sort' => 5
                                ),
                            6 => array(
                                'attachment_id' => '',                                
                                'thumb' => $profiles_url.'profile-4.jpg',
                                'image' => $profiles_url.'profile-4.jpg',

                                'name' => 'Bruce Petty',
                                'position' => 'Manager, Ranstreet',
                                'url' => 'http://pre.la/minigo-reviews',
                                'new_window' => 1,
                                'select' => 'fa-quote-left',
                                'quote' => 'What a great coming soon template. Some options to customize the text, content background colour and opacity are a few areas I would suggest improving upon but it really is a nice plugin. Well done. I\'ll try to keep it simple, I had a problem, and they fixed it, like incredibly quick. These guys are awesome, clean coding, superb design. For anyone looking for a coming soon. This is the would be the go to choice.',
                                'sort' => 6
                                ),
                            7 => array(
                                'attachment_id' => '',                                
                                'thumb' => $profiles_url.'profile-1.jpg',
                                'image' => $profiles_url.'profile-1.jpg',

                                'name' => 'Gregory Carroll',
                                'position' => 'CTO, Zoomlux',
                                'url' => 'http://pre.la/minigo-reviews',
                                'new_window' => 1,
                                'select' => 'fa-quote-left',
                                'quote' => 'Beautiful design and easy install. Than you so much for this elegant coming soon plugin! This is, hands down, the best looking Word Press plugin available. Worth every penny! Excellent Admin, Customisation and superb Customer Services, thank you to the Team behind MiniGo. I 100% recommend this plugin.',
                                'sort' => 7
                                )
                        )
                ),
                
                array(
                    'id'=>'testimonials-show-images',
                    'type' => 'switch',
                    'title' => __('Show testimonial images', 'pt-minigo'),
                    'subtitle'=> __('If you don\'t want to display testimonial images set this to No.', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => true,
                ),

                array(
                    'id'=>'testimonials-show-dots',
                    'type' => 'switch',
                    'title' => __('Show dots under the testimonial slider for navigation', 'pt-minigo'),
                    'subtitle'=> __('Choose whether or not you want the testimonial slider to have navigation dots.', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => true,
                ),
               
                array(
                    'id'=>'testimonials-show-numbers',
                    'type' => 'switch',
                    'title' => __('Show numbers instead of dots navigation', 'pt-minigo'),
                    'subtitle'=> __('Replaces the dots with numbers.', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    'required' => array('show-testimonials-dots', 'equals', '1'),
                    "default"       => false,
                ),

                array(
                    'id'=>'testimonials-show-arrows',
                    'type' => 'switch',
                    'title' => __('Show left/right arrows in the testimonial slider for navigation', 'pt-minigo'),
                    'subtitle'=> __('Choose whether or not you want the testimonial slider to have navigation arrows.', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => true,
                ),

                 array(
                    'id'=>'testimonials-rows',
                    'type' => 'text',
                    'title' => __('Testimonial slider items rows', 'pt-minigo'),
                    'subtitle' => __('Define how many rows you want on the testimonial slider', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    'default' => '1',
                ),
                 array(
                    'id'=>'testimonials-cols',
                    'type' => 'text',
                    'title' => __('Testimonial slider columns', 'pt-minigo'),
                    'subtitle' => __('Define how many columns you want on the testimonial slider', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    'default' => '3',
                ),

                 array(
                    'id'=>'testimonials-slides-to-scroll',
                    'type' => 'text',
                    'title' => __('Testimonial slider number of items to scroll', 'pt-minigo'),
                    'subtitle' => __('Define how many columns you want to scroll on sliding left/right', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    'default' => '3',
                ),
                array(
                    'id'=>'testimonials-autoplay',
                    'type' => 'switch',
                    'title' => __('Autoplay', 'pt-minigo'),
                    'subtitle'=> __('Enable autoplay of slides.', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => true,
                ),
                 array(
                    'id'=>'testimonials-autoplay-speed',
                    'type' => 'text',
                    'title' => __('Autoplay Speed', 'pt-minigo'),
                    'subtitle' => __('Set the time between autoplay animations (ms)', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    'default' => '5000',
                ),
                array(
                    'id'=>'testimonials-slides-scroll-speed',
                    'type' => 'text',
                    'title' => __('Testimonials scroll speed', 'pt-minigo'),
                    'subtitle' => __('Define how fast you want to scroll on sliding left/right', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    'default' => '800',
                ),

                array(
                    'id'=>'testimonials-infinite-scroll',
                    'type' => 'switch',
                    'title' => __('Inifinite Slide', 'pt-minigo'),
                    'subtitle'=> __('if set to true the carousel will always be slid to first slide if no slide left.', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => false,
                ),
                
                 array(
                    'id'=>'testimonials-centermode',
                    'type' => 'switch',
                    'title' => __('Testimonials Centermode', 'pt-minigo'),
                    'subtitle'=> __('if set to true the carousel show the active slide in the middle.', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => false,
                ),

                array(
                    'id' => 'testimonials-breakpoint-1',
                    'type' => 'section',
                    'title' => ''.__('Testimonials Breakpoint 1', 'pt-minigo'),
                    'indent' => true,
                    'required' => array('testimonials-switcher','=','1'),
                ),
                array(
                    'id'=>'testimonials-break-1-width',
                    'type' => 'text',
                    'title' => __('Minimum width', 'pt-minigo'),
                    'subtitle'=> __('Minimum width to apply this media break point', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => 1280,
                ),
                array(
                    'id'=>'testimonials-break-1-slides',
                    'type' => 'text',
                    'title' => __('Slides to Show', 'pt-minigo'),
                    'subtitle'=> __('Number of slides to show', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => 3,
                ),
                array(
                    'id'=>'testimonials-break-1-slides-to-scroll',
                    'type' => 'text',
                    'title' => __('Slides to Slide', 'pt-minigo'),
                    'subtitle'=> __('Number of slides to scroll', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => 3,
                ),

                array(
                    'id' => 'testimonials-breakpoint-2',
                    'type' => 'section',
                    'title' => ''.__('Testimonials Breakpoint 2', 'pt-minigo'),
                    'indent' => true,
                    'required' => array('testimonials-switcher','=','1'),
                ),
                array(
                    'id'=>'testimonials-break-2-width',
                    'type' => 'text',
                    'title' => __('Minimum width', 'pt-minigo'),
                    'subtitle'=> __('Minimum width to apply this media break point', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => 1024,
                ),
                array(
                    'id'=>'testimonials-break-2-slides',
                    'type' => 'text',
                    'title' => __('Slides to Show', 'pt-minigo'),
                    'subtitle'=> __('Number of slides to show', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => 2,
                ),
                array(
                    'id'=>'testimonials-break-2-slides-to-scroll',
                    'type' => 'text',
                    'title' => __('Slides to Show', 'pt-minigo'),
                    'subtitle'=> __('Number of slides to scroll', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => 2,
                ),

                array(
                    'id' => 'testimonials-breakpoint-3',
                    'type' => 'section',
                    'title' => ''.__('Testimonials Breakpoint 3', 'pt-minigo'),
                    'indent' => true,
                    'required' => array('testimonials-switcher','=','1'),
                ),
                array(
                    'id'=>'testimonials-break-3-width',
                    'type' => 'text',
                    'title' => __('Minimum width', 'pt-minigo'),
                    'subtitle'=> __('Minimum width to apply this media break point', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => 768,
                ),
                array(
                    'id'=>'testimonials-break-3-slides',
                    'type' => 'text',
                    'title' => __('Slides to Show', 'pt-minigo'),
                    'subtitle'=> __('Number of slides to show', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => 1,
                ),
                array(
                    'id'=>'testimonials-break-3-slides-to-scroll',
                    'type' => 'text',
                    'title' => __('Slides to Show', 'pt-minigo'),
                    'subtitle'=> __('Number of slides to scroll', 'pt-minigo'),
                    'required' => array('testimonials-switcher','=','1'),
                    "default"       => 1,
                )
            )
        );

        // VISUAL SETTINGS MENU
        $sections[] = array(
            // 'title' => __('Visual Settings', 'pt-minigo'),
            'title' => __('General Styling', 'pt-minigo'),
            'desc' => __('In this section you can fine-tune the appearance of your MiniGO.', 'pt-minigo'),
            'icon' => 'el-icon-brush',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id'=>'enable-visual-settings',
                    'type' => 'switch',
                    'title' => __('Enable General Visual Settings', 'pt-minigo'),
                    'subtitle'=> __('Enable general visual settings in order to access the styling options and overwride the defaults.', 'pt-minigo'),
                    "default"       => 0,
                    ),
            )
        );

        // Typography Styling Section
        $sections[] = array(
            'id' => 'headings-style-section',
            'title' => ''.__('Typography Styling', 'pt-minigo'),
            'subtitle' => __('In this sub-section you can control the font properties for headings and paragraph text.', 'pt-minigo'),
            'required' => array('enable-visual-settings', 'equals', '1'),
            'subsection' => true,
            'icon' => 'el-icon-fontsize',
            'icon_class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'base-typo',
                    'type' => 'typography',
                    'title' => __('Base Typography', 'pt-minigo'),
                    'subtitle' => __('All other styles build on top of this.', 'pt-minigo'),
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'subsets' => false,
                    'font-size' => true,
                    'text-align' => false,
                    'font-style' => false,
                    'line-height' => false,
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '400',
                        'font-size' => '18px',
                        'color' => '#fff',
                        'line-height' => '26px'
                    )
                ),
                array(
                    'id' => 'body-font-color',
                    'type' => 'color_rgba',
                    'title' => __('Base Body Font Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'link-color',
                    'type' => 'color_rgba',
                    'title' => __('Text Link Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'link-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Text Link Hover Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),

                array(
                    'id' => 'link-underline-color',
                    'type' => 'color_rgba',
                    'title' => __('Text Link Underline Color.', 'pt-minigo'),
                    'subtitle' => __('You can select opacity 0 to hide underline.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.25'
                    ),
                ),
                array(
                    'id' => 'link-underline-hover',
                    'type' => 'color_rgba',
                    'title' => __('Text Link Underline Hover Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.5'
                    ),
                ),
                array(
                    'id' => 'paragraph-styles',
                    'type' => 'typography',
                    'title' => __('Paragraphs', 'pt-minigo'),
                    'subtitle' => __('This will only affect the paragraphs <p>', 'pt-minigo'),
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'subsets' => false,
                    'font-size' => true,
                    'text-align' => false,
                    'font-style' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '300',
                        'font-size' => '18px',
                        'color' => '#fff',
                        'line-height' => '26px'
                    )
                ),
                array(
                    'id' => 'heading-1',
                    'type' => 'typography',
                    'title' => __('Headings H1', 'pt-minigo'),
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'text-transform' => true,
                    'subsets' => false,
                    'line-height' => true,
                    'text-align' => false,
                    'font-style' => false,
                    'letter-spacing' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '100',
                        'font-size' => '60',
                        'color' => '#fff',
                    )

                ),
                array(
                    'id' => 'heading-2',
                    'type' => 'typography',
                    'title' => __('Headings H2', 'pt-minigo'),
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'text-transform' => true,
                    'subsets' => false,
                    'text-align' => false,
                    'line-height' => false,
                    'font-style' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '300',
                        'font-size' => '36px',
                        'color' => '#fff'
                    )
                ),
                array(
                    'id' => 'heading-3',
                    'type' => 'typography',
                    'title' => __('Headings H3', 'pt-minigo'),
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'text-transform' => true,
                    'subsets' => false,
                    'text-align' => false,
                    'font-style' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '300',
                        'font-size' => '30',
                        'color' => '#fff'
                    )
                ),
                array(
                    'id' => 'heading-4',
                    'type' => 'typography',
                    'title' => __('Headings H4', 'pt-minigo'),
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'text-transform' => true,
                    'subsets' => false,
                    'text-align' => false,
                    'font-style' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '300',
                        'font-size' => '24',
                        'color' => '#fff'
                    )
                ),
                array(
                    'id' => 'heading-5',
                    'type' => 'typography',
                    'title' => __('Headings H5', 'pt-minigo'),
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'text-transform' => true,
                    'subsets' => false,
                    'text-align' => false,
                    'font-style' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '300',
                        'font-size' => '20',
                        'color' => '#fff'
                    )
                ),
                array(
                    'id' => 'heading-6',
                    'type' => 'typography',
                    'title' => __('Headings H6', 'pt-minigo'),
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'text-transform' => true,
                    'subsets' => false,
                    'text-align' => false,
                    'font-style' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '300',
                        'font-size' => '18',
                        'color' => '#fff'
                    )
                ),
            )
        );
        
        // Nav Button Styling Section
        $sections[] = array(
            'id' => 'nav-buttons-section',
            'subsection' => true,
            'title' => ''.__('Nav Buttons', 'pt-minigo'),
            'required' => array('enable-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-link',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Nav Buttons Styling
                array(
                    'id' => 'section-nav-button-styling',
                    'type' => 'section',
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'indent' => true,
                    'title' => ''. __('Navigation Button Styling', 'pt-minigo'),
                    'subtitle' => __('In this sub-section you can control the main navigation buttons styling.', 'pt-minigo')
                ),
                array(
                    'id' => 'nav-button-typo',
                    'title' => __('Navigation Buttons Typography', 'pt-minigo'),
                    'type' => 'typography',
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'subsets' => false,
                    'text-align' => false,
                    'font-style' => false,
                    'line-height' => false,
                    'text-transform' => false,
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '300',
                        'font-size' => '16px'
                    )
                ),
                array(
                    'id' => 'nav-button-style',
                    'type' => 'button_set',
                    'title' => __('Navigation Buttons Style', 'pt-minigo'),
                    'subtitle'=> __('Changes the style of the Navigation Buttons.', 'pt-minigo'),
                    'options' => array(
                        'default' => 'Default',
                        'circle' => 'Circle',
                        'square' => 'Square',
                        'rounded' => 'Rounded',
                        'none' => 'No Background',
                        ),
                    'default' => 'default'
                ),
                array(
                    'id'=>'nav-button-style-rounded',
                    'type' => 'text',
                    'title' => __('Rounded Corners Size', 'pt-minigo'),
                    'subtitle'=> __('Size in pixels.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'required' => array('nav-button-style', 'equals','rounded'),
                    "default"       => '4',
                    "validate" => 'numeric'
                    ),

                // Nav Button Colors
                array(
                    'id' => 'nav-button-icon-color',
                    'type' => 'color_rgba',
                    'title' => __('Button Icon Color', 'pt-minigo'),
                    'subtitle' => __('Affects icon color within buttons.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.75'
                    ),
                ),
                array(
                    'id' => 'nav-button-label-color',
                    'type' => 'color_rgba',
                    'title' => __('Button Label Color', 'pt-minigo'),
                    'subtitle' => __('Affects text color within buttons.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.75'
                    ),
                ),
                array(
                    'id' => 'nav-button-border',
                    'type' => 'border',
                    'title' => __('Button Border Settings', 'pt-minigo'),
                    'subtitle' => __('Control <strong>width</strong> and <strong>style</strong> of the button border.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'color' => false,
                    'default' => array(
                        'border-width' => '1',
                        'border-style' => 'solid'
                    )
                ),
                array(
                    'id' => 'nav-button-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Button Border Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.5'
                    ),
                ),
                array(
                    'id' => 'nav-button-bg',
                    'type' => 'color_rgba',
                    'title' => __('Button Background Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0'
                    ),
                ),

                // Nav Button Hover
                array(
                    'id' => 'section-nav-button-hover-styling',
                    'type' => 'section',
                    'indent' => true,
                    'title' => ''. __('Navigation Button Hover Styling', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'subtitle' => __('In this sub-section you can control hover properties for the navigation buttons.', 'pt-minigo')
                ),
                array(
                    'id' => 'nav-button-icon-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Button Icon Color Hover', 'pt-minigo'),
                    'subtitle' => __('Color of button icons when hovering.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'nav-button-label-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Button Text Color Hover', 'pt-minigo'),
                    'subtitle' => __('Color of button text when hovering.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'nav-button-border-hover',
                    'type' => 'border',
                    'title' => __('Button Border Hover', 'pt-minigo'),
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        // 'border-color' => '#fff',
                        'border-width' => '1',
                        'border-style' => 'solid'
                    )
                ),
                array(
                    'id' => 'nav-button-border-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Button Border Color Hover', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'nav-button-bg-hover',
                    'type' => 'color_rgba',
                    'title' => __('Button Background Color Hover', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#000',
                        'alpha' => '0.25'
                    ),
                ),

                // Nav Button Selected
                array(
                    'id' => 'section-nav-button-selected-styling',
                    'type' => 'section',
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'indent' => true,
                    'title' => ''. __('Navigation Button Selected Styling', 'pt-minigo'),
                    'subtitle' => __('In this sub-section you can control selected properties for the navigation buttons (:focus).', 'pt-minigo')
                ),
                array(
                    'id' => 'nav-button-icon-color-selected',
                    'type' => 'color_rgba',
                    'title' => __('Button Icon Color Selected', 'pt-minigo'),
                    'subtitle' => __('Color of button icons when selected.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'nav-button-label-color-selected',
                    'type' => 'color_rgba',
                    'title' => __('Button Text Color Selected', 'pt-minigo'),
                    'subtitle' => __('Color of button text when selected.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'nav-button-border-selected',
                    'type' => 'border',
                    'title' => __('Button Border Selected', 'pt-minigo'),
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        // 'border-color' => '#fff',
                        'border-width' => '1',
                        'border-style' => 'solid'
                    )
                ),
                array(
                    'id' => 'nav-button-border-color-selected',
                    'type' => 'color_rgba',
                    'title' => __('Button Border Color Selected', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.75'
                    ),
                ),
                array(
                    'id' => 'nav-button-bg-selected',
                    'type' => 'color_rgba',
                    'title' => __('Button Background Color Selected', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#000',
                        'alpha' => '0.15'
                    ),
                ),

            )
        );


        // Icon Button Styling Section
        $sections[] = array(
            'id' => 'icon-buttons-section',
            'title' => ''.__('Icon Buttons', 'pt-minigo'),
            // 'subtitle' => __('In this sub-section you can control style properties for buttons.', 'pt-minigo'),
            'required' => array('enable-visual-settings', 'equals', '1'),
            'subsection' => true,
            'icon' => 'el-icon-info-circle',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Icon Menu Styling
                array(
                    'id' => 'section-icon-button-styling',
                    'type' => 'section',
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'indent' => true,
                    'title' => ''. __('Icon Menu Button Styling', 'pt-minigo'),
                    'subtitle' => __('In this sub-section you can control the icon menu (social) buttons styling.', 'pt-minigo')
                ),
                array(
                    'id' => 'icon-button-typo',
                    'title' => __('Social Button Label Typography', 'pt-minigo'),
                    'subtitle' => __('Choose the Font for Social Labels', 'pt-minigo'),
                    'type' => 'typography',
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'subsets' => false,
                    'text-align' => false,
                    'font-style' => false,
                    'line-height' => true,
                    'text-transform' => false,
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '400',
                        'font-size' => '16px',
                        'line-height' => '24px'
                    )
                ),
                array(
                    'id' => 'icon-button-style',
                    'type' => 'button_set',
                    'title' => __('Icon Menu Buttons Style', 'pt-minigo'),
                    'subtitle'=> __('Changes the style of the Icon Menu Buttons.', 'pt-minigo'),
                    'options' => array(
                        'default' => 'Default',
                        'circle' => 'Circle',
                        'square' => 'Square',
                        'rounded' => 'Rounded',
                        'none' => 'No Background',
                        ),
                    'default' => 'default'
                ),
                array(
                    'id'=>'icon-button-style-rounded',
                    'type' => 'text',
                    'title' => __('Rounded Corners Size', 'pt-minigo'),
                    'subtitle'=> __('Size in pixels.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'required' => array('icon-button-style', 'equals','rounded'),
                    "default"       => '4',
                    "validate" => 'numeric'
                    ),

                // Label
                array(
                    'id' => 'icon-button-label-color',
                    'type' => 'color_rgba',
                    'title' => __('Icon Menu Button Label Color', 'pt-minigo'),
                    'subtitle' => __('Changes the color of the text that appears on hovering the icon menu links.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'icon-button-label-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Label Background Color', 'pt-minigo'),
                    'subtitle' => __('Pick a color for the label background, keep alpha 0 for none.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#000',
                        'alpha' => '0'
                    ),
                ),

                // Icon Button Colors
                array(
                    'id' => 'icon-button-color',
                    'type' => 'color_rgba',
                    'title' => __('Button Color', 'pt-minigo'),
                    'subtitle' => __('Affects icons and text color within buttons.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.5'
                    ),
                ),
                array(
                    'id' => 'icon-button-border',
                    'type' => 'border',
                    'title' => __('Button Border Settings', 'pt-minigo'),
                    'subtitle' => __('Control <strong>width</strong> and <strong>style</strong> of the button border.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'color' => false,
                    'default' => array(
                        'border-width' => '1',
                        'border-style' => 'solid'
                    )
                ),
                array(
                    'id' => 'icon-button-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Button Border Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.5'
                    ),
                ),
                array(
                    'id' => 'icon-button-bg',
                    'type' => 'color_rgba',
                    'title' => __('Button Background Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0'
                    ),
                ),

                // Icon Button Hover
                array(
                    'id' => 'section-icon-button-hover-styling',
                    'type' => 'section',
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'indent' => true,
                    'title' => ''. __('Icon Menu Button Hover Styling', 'pt-minigo'),
                    'subtitle' => __('In this sub-section you can control hover properties for the icon menu buttons.', 'pt-minigo')
                ),
                array(
                    'id' => 'icon-button-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Button Color Hover', 'pt-minigo'),
                    'subtitle' => __('Color of button items when hovering.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'icon-button-border-hover',
                    'type' => 'border',
                    'title' => __('Button Border Hover', 'pt-minigo'),
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        // 'border-color' => '#fff',
                        'border-width' => '1',
                        'border-style' => 'solid'
                    )
                ),
                array(
                    'id' => 'icon-button-border-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Button Border Color Hover', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.75'
                    ),
                ),
                array(
                    'id' => 'icon-button-bg-hover',
                    'type' => 'color_rgba',
                    'title' => __('Button Background Color Hover', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#000',
                        'alpha' => '0.25'
                    ),
                ),

            )
        );


        // Content Button Styling Section
        $sections[] = array(
            'id' => 'content-buttons-section',
            'subsection' => true,
            'title' => ''.__('Content Buttons', 'pt-minigo'),
            'required' => array('enable-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-hand-up',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Content Buttons Styling
                array(
                    'id' => 'section-content-button-styling',
                    'type' => 'section',
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'indent' => true,
                    'title' => ''. __('Content Button Styling', 'pt-minigo'),
                    'subtitle' => __('In this sub-section you can control your base Content Button properties.', 'pt-minigo')
                ),
                array(
                    'id' => 'content-button-typo',
                    'title' => __('Content Button Typography', 'pt-minigo'),
                    'subtitle' => __('Choose the Font for Main Buttons', 'pt-minigo'),
                    'type' => 'typography',
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'subsets' => false,
                    'text-align' => false,
                    'font-style' => false,
                    'line-height' => false,
                    'text-transform' => false,
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-size' => '22px',
                        'font-weight' => '400'
                    )
                ),

                // Content Buttons Colors
                array(
                    'id' => 'content-button-color',
                    'type' => 'color_rgba',
                    'title' => __('Button Color', 'pt-minigo'),
                    'subtitle' => __('Affects text color within buttons.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.9'
                    ),
                ),
                array(
                    'id' => 'content-button-border',
                    'type' => 'border',
                    'title' => __('Button Border Settings', 'pt-minigo'),
                    'subtitle' => __('Control <strong>width</strong> and <strong>style</strong> of the button border.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'color' => false,
                    'default' => array(
                        'border-width' => '1',
                        'border-style' => 'solid'
                    )
                ),
                array(
                    'id' => 'content-button-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Button Border Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.9'
                    ),
                ),
                array(
                    'id' => 'content-button-bg',
                    'type' => 'color_rgba',
                    'title' => __('Button Background Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0'
                    ),
                ),
                // Content Buttons Hover
                array(
                    'id' => 'section-content-button-hover-styling',
                    'type' => 'section',
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'indent' => true,
                    'title' => ''. __('Content Buttons Hover Styling', 'pt-minigo'),
                    'subtitle' => __('In this sub-section you can control hover properties for the content buttons.', 'pt-minigo')
                ),
                array(
                    'id' => 'content-button-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Button Color Hover', 'pt-minigo'),
                    'subtitle' => __('Color of button items when hovering.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'content-button-border-hover',
                    'type' => 'border',
                    'title' => __('Button Border Hover', 'pt-minigo'),
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'border-width' => '1',
                        'border-style' => 'solid'
                    )
                ),
                array(
                    'id' => 'content-button-border-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Button Border Color Hover', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'content-button-bg-hover',
                    'type' => 'color_rgba',
                    'title' => __('Button Background Color Hover', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#000',
                        'alpha' => '0.25'
                    ),
                ),



            )
        );

        // Forms Styling Section
        $sections[] = array(
            'id' => 'forms-style-section',
            'title' => ''. __('Forms Styling', 'pt-minigo'),
            'subtitle' => __('In this sub-section you can control form properties.', 'pt-minigo'),
            'required' => array('enable-visual-settings', 'equals', '1'),
            'subsection' => true,
            'icon' => 'el-icon-pencil',
            'icon_class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'input-typo',
                    'type' => 'typography',
                    'title' => __('Typography Settings', 'pt-minigo'),
                    'subtitle' => __('Choose the Forms font', 'pt-minigo'),
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'subsets' => false,
                    'text-align' => false,
                    'font-style' => false,
                    'line-height' => false,
                    'text-transform' => false,
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '300',
                        'font-size' => '22px'
                    )
                ),
                array(
                    'id' => 'input-notification-typo',
                    'type' => 'typography',
                    'title' => __('Notification Typography Settings', 'pt-minigo'),
                    'subtitle' => __('This applies to all the form notifications such as validation errors', 'pt-minigo'),
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'subsets' => false,
                    'text-align' => false,
                    'font-style' => false,
                    'line-height' => false,
                    'text-transform' => false,
                    'color' => true,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '400',
                        'font-size' => '16px',
                        'color' => ''
                    )
                ),
                array(
                    'id' => 'input-border',
                    'type' => 'border',
                    'title' => __('Forms Border Style', 'pt-minigo'),
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'border-width' => '1',
                        'border-style' => 'solid'
                    )
                ),
                array(
                    'id' => 'input-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Forms Border Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.8'
                    ),
                ),
                array(
                    'id' => 'input-color',
                    'type' => 'color_rgba',
                    'title' => __('Forms Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'input-background',
                    'type' => 'color_rgba',
                    'title' => __('Input Background Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0'
                    ),
                ),
                array(
                    'id' => 'input-placeholder-color',
                    'type' => 'color_rgba',
                    'title' => __('Forms Placeholder Text Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.7'
                    ),
                ),
                array(
                    'id'=>'input-shadow-size',
                    'type' => 'text',
                    'title' => __('Forms Box Shadow Size', 'pt-minigo'),
                    'subtitle'=> __('Value in pixels, set to 0 for none.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    "default"       => '0',
                    "validate" => 'numeric'
                    ),
                array(
                    'id' => 'input-shadow-color',
                    'type' => 'color_rgba',
                    'title' => __('Forms Box Shadow Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0'
                    ),
                ),

                // Forms Hover
                array(
                    'id' => 'section-input-hover-style',
                    'type' => 'section',
                    'title' => ''.__('Forms Hover Styling', 'pt-minigo'),
                    'subtitle' => __('In this sub-section you can control hover properties for forms.', 'pt-minigo'),
                    'indent' => true,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                ),
                array(
                    'id' => 'input-hover-border',
                    'type' => 'border',
                    'title' => __('Forms Hover Border', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'color' => false,
                    'default' => array(
                        'border-width' => '1',
                        'border-style' => 'solid'
                    )
                ),
                array(
                    'id' => 'input-hover-border-color',
                    'title' => __('Forms Hover Border Color', 'pt-minigo'),
                    'type' => 'color_rgba',
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'input-hover-color',
                    'type' => 'color_rgba',
                    'title' => __('Forms Hover Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'input-hover-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Forms Hover Background Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.15'
                    ),
                ),
                array(
                    'id' => 'input-hover-placeholder-color',
                    'type' => 'color_rgba',
                    'title' => __('Forms Hover Placeholder Text Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.85'
                    ),
                ),
                array(
                    'id'=>'input-hover-shadow-size',
                    'type' => 'text',
                    'title' => __('Forms Hover Box Shadow Size', 'pt-minigo'),
                    'subtitle'=> __('Value in pixels, set to 0 for none.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    "default"       => '6',
                    "validate" => 'numeric'
                    ),
                array(
                    'id' => 'input-hover-shadow-color',
                    'type' => 'color_rgba',
                    'title' => __('Forms Hover Box Shadow Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.15'
                    ),
                ),


                // Forms Active
                array(
                    'id' => 'section-input-active-style',
                    'type' => 'section',
                    'title' => ''.__('Forms Active Styling', 'pt-minigo'),
                    'subtitle' => __('In this sub-section you can control active properties for forms.', 'pt-minigo'),
                    'indent' => true,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                ),
                array(
                    'id' => 'input-active-border',
                    'type' => 'border',
                    'title' => __('Forms Active Border', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'color' => false,
                    'default' => array(
                        'border-width' => '1',
                        'border-style' => 'solid'
                    )
                ),
                array(
                    'id' => 'input-active-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Forms Active Border Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'input-active-color',
                    'type' => 'color_rgba',
                    'title' => __('Forms Active Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'input-active-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Forms Active Background Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'input-active-placeholder-color',
                    'type' => 'color_rgba',
                    'title' => __('Forms Active Placeholder Text Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.5'
                    ),
                ),
                array(
                    'id'=>'input-active-shadow-size',
                    'type' => 'text',
                    'title' => __('Forms Active Box Shadow Size', 'pt-minigo'),
                    'subtitle'=> __('Value in pixels, set to 0 for none.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    "default"       => '8',
                    "validate" => 'numeric'
                    ),
                array(
                    'id' => 'input-active-shadow-color',
                    'type' => 'color_rgba',
                    'title' => __('Forms Active Box Shadow Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0.4'
                    ),
                ),

            )
        );

        // SHORTCODE STYLING MENU - Section
        $sections[] = array(
            // 'title' => __('Visual Settings', 'pt-minigo'),
            'title' => __('Block Styling', 'pt-minigo'),
            'desc' => __('In this section you can fine-tune the appearance of your MiniGO blocks.', 'pt-minigo'),
            'icon' => 'el-icon-website',
            'icon-class' => 'icon-large',
            'fields' => array(
                array(
                    'id'=>'enable-blocks-visual-settings',
                    'type' => 'switch',
                    'title' => __('Enable Block Visual Settings', 'pt-minigo'),
                    'subtitle'=> __('Enable block visual settings in order to access the styling options and overwride the defaults.', 'pt-minigo'),
                    "default"       => 0,
                    ),
            )
        );

        // Content Styling Styling Subsection
        $sections[] = array(
            'id' => 'blocks-style-content-section',
            'subsection' => true,
            'title' => ''.__('Content Blocks', 'pt-minigo'),
            'desc' => __('In this sub-section you can set styles for your content shortcodes:', 'pt-minigo') . ' <strong>[minigo-divider] [minigo-divider]</strong>',
            'required' => array('enable-blocks-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-indent-left',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Titles
                array(
                    'id' => 'titles-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Titles Shortcode Styling', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'titles-title-color',
                    'type' => 'color_rgba',
                    'title' => __('Titles - Title Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for the title.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                ),
                array(
                    'id'=>'titles-subtitle-color',
                    'type' => 'color_rgba',
                    'title' => __('Titles - Subtitle Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for the subtitle.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                ),
                array(
                    'id'=>'titles-divider-color',
                    'type' => 'color_rgba',
                    'title' => __('Titles - Divider Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for the titles divider.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                ),

                // Divider
                array(
                    'id' => 'dividers-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Divider Shortcode Styling', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'dividers-color',
                    'type' => 'color_rgba',
                    'title' => __('Divider - Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for the dividers. If you select a certain opacity when inserting shortcode, it will be applied over this setting.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),

                // Contact Info
                array(
                    'id' => 'contact-info-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Contact Info Shortcode Styling', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'contact-info-color',
                    'type' => 'color_rgba',
                    'title' => __('Icon - Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for the contact info icons.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.75'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'contact-info-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Icon - Color - Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for the contact info icons when hovering.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),  

            )
        );

        // Countdown Styling Section
        $sections[] = array(
            'id' => 'countdown-style-section',
            'subsection' => true,
            'title' => ''.__('Countdown Styling', 'pt-minigo'),
            'subtitle' => __('The settings below control the Counter Style.', 'pt-minigo'),
            'required' => array('enable-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-time',
            'icon_class' => 'icon-large',
            'fields' => array(
                array(
                    'id' => 'countdown-numbers',
                    'type' => 'typography',
                    'title' => __('Countdown Numbers', 'pt-minigo'),
                    'subtitle' => __('Set the countdown numbers typography.', 'pt-minigo'),
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'font-weight' => true,
                    'font-size' => false,
                    'subsets' => false,
                    'text-align' => false,
                    'font-style' => false,
                    'line-height' => false,
                    'text-transform' => false,
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '400',
                        // 'color' => '#fff'
                    )
                ),
                array(
                    'id' => 'countdown-numbers-color',
                    'type' => 'color_rgba',
                    'title' => __('Countdown Numbers Color', 'pt-minigo'),
                    'subtitle' => __('Set the countdown numbers color.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'countdown-numbers-bg',
                    'type' => 'color_rgba',
                    'title' => __('Number Backgrounds', 'pt-minigo'),
                    'subtitle' => __('Set the countdown numbers background. Can be set to transparent.', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '0'
                    ),
                ),

                array(
                    'id' => 'countdown-numbers-border',
                    'type' => 'border',
                    'title' => __('Border Style', 'pt-minigo'),
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'border-width' => '1',
                        'border-style' => 'solid',
                    )
                ),
                array(
                    'id' => 'countdown-numbers-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Border Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
                array(
                    'id' => 'countdown-typo-labels',
                    'type' => 'typography',
                    'title' => __('Countdown Labels', 'pt-minigo'),
                    'subtitle' => __('This will affect the countdown labels', 'pt-minigo'),
                    'google' => true,
                    'preview' => array('always_display' => true),
                    'font-weight' => true,
                    'font-size' => false,
                    'subsets' => false,
                    'text-align' => false,
                    'font-style' => false,
                    'line-height' => false,
                    'text-transform' => false,
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'font-family' => 'Lato',
                        'font-weight' => '300',
                    )
                ),
                array(
                    'id' => 'countdown-labels-color',
                    'type' => 'color_rgba',
                    'title' => __('Countdown Labels Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),

                array(
                    'id' => 'section-nav-button-hover-styling',
                    'type' => 'section',
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'indent' => true,
                    'title' => ''. __('Progress Bar Styling', 'pt-minigo'),
                    'subtitle' => __('Set up the countdown progress bar if you chose to use it.', 'pt-minigo')
                ),
                array(
                    'id' => 'progress-bar-color',
                    'type' => 'color_rgba',
                    'title' => __('Progress Bar Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),

                array(
                    'id' => 'progress-bar-border',
                    'type' => 'border',
                    'title' => __('Border Style', 'pt-minigo'),
                    'color' => false,
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default' => array(
                        'border-width' => '1',
                        'border-style' => 'solid'
                    )
                ),
                array(
                    'id' => 'progress-bar-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Progress Bar Border Color', 'pt-minigo'),
                    'required' => array('enable-visual-settings', 'equals', '1'),
                    'default'  => array(
                        'color' => '#fff',
                        'alpha' => '1'
                    ),
                ),
            )
        );

        // Counter Features Styling Subsection
        $sections[] = array(
            'id' => 'blocks-style-counter-features-section',
            'subsection' => true,
            'title' => ''.__('Counter Features', 'pt-minigo'),
            'desc' => __('In this sub-section you can set styles for your Counter Features shortcode:', 'pt-minigo') . ' <strong>[minigo-icon-features]</strong>',
            'required' => array('enable-blocks-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-bell',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Counter Features
                array(
                    'id' => 'counter-features-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Counter Features Styling', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'counter-features-counter-color',
                    'type' => 'color_rgba',
                    'title' => __('Counter Features - Counter Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity of the counter numbers.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.75'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'counter-features-counter-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Counter Features - Counter Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity of the counter numbers when hovering.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'counter-features-icon-color',
                    'type' => 'color_rgba',
                    'title' => __('Counter Features - Icon Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity icon.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'counter-features-icon-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Counter Features - Icon Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'counter-features-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Counter Features - Icon Border Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon border.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'counter-features-border-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Counter Features - Icon Border Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon border hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.5'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'counter-features-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Counter Features - Icon BG Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon Background.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'counter-features-background-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Counter Features - Icon BG Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon Background hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
            )
        );

        // Icon Features Styling Subsection
        $sections[] = array(
            'id' => 'blocks-style-icon-features-section',
            'subsection' => true,
            'title' => ''.__('Icon Features', 'pt-minigo'),
            'desc' => __('In this sub-section you can set styles for your Icon Features shortcode:', 'pt-minigo'). ' <strong>[minigo-icon-features]</strong>',
            'required' => array('enable-blocks-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-star',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Icon Features
                array(
                    'id' => 'icon-features-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Icon Features Styling', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'icon-features-icon-color',
                    'type' => 'color_rgba',
                    'title' => __('Icon Features - Icon Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity icon.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'icon-features-icon-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Icon Features - Icon Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'icon-features-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Icon Features - Icon Border Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon border.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'icon-features-border-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Icon Features - Icon Border Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon border hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.5'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'icon-features-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Icon Features - Icon BG Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon Background.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'icon-features-background-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Icon Features - Icon BG Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon Background hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
            )
        );

        // Icon List Styling Subsection
        $sections[] = array(
            'id' => 'blocks-style-icon-list-section',
            'subsection' => true,
            'title' => ''.__('Icon List', 'pt-minigo'),
            'desc' => __('In this sub-section you can set styles for your Icon List shortcode:', 'pt-minigo') . ' <strong>[minigo-icon-list]</strong>',
            'required' => array('enable-blocks-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-th-list',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Icon List
                array(
                    'id' => 'icon-list-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Icon List Styling', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'icon-list-icon-color',
                    'type' => 'color_rgba',
                    'title' => __('Icon List - Icon Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity icon.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'icon-list-icon-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Icon List - Icon Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'icon-list-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Icon List - Icon Border Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon border.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'icon-list-border-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Icon List - Icon Border Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon border hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.5'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'icon-list-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Icon List - Icon BG Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon background.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'icon-list-background-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Icon List - Icon BG Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for icon background hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
            )
        );

        // Map Styling Styling Subsection
        $sections[] = array(
            'id' => 'blocks-style-map-section',
            'subsection' => true,
            'title' => ''.__('Map', 'pt-minigo'),
            'desc' => __('In this sub-section you can set styles for your Map shortcode:', 'pt-minigo'). ' <strong>[minigo-map]</strong>',
            'required' => array('enable-blocks-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-map-marker',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Map
                array(
                    'id' => 'map-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Map Styling', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'map-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Map - Border Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for map border.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'map-border-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Map - Border Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for map border hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.5'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'map-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Map - BG Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for map background.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'map-background-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Map - BG Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for map background hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
            )
        );

        // Photo Gallery Styling Subsection
        $sections[] = array(
            'id' => 'blocks-style-photo-gallery-section',
            'subsection' => true,
            'title' => ''.__('Photo Gallery', 'pt-minigo'),
            'desc' => __('In this sub-section you can set styles for your photo gallery shortcode:', 'pt-minigo') . ' <strong>[minigo-gallery]</strong>',
            'required' => array('enable-blocks-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-picasa',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Gallery Styling
                array(
                    'id' => 'gallery-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Photo Gallery Styling', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'gallery-thumb-border-size',
                    'type' => 'text',
                    'title' => __('Thumbnail - Border Size', 'pt-minigo'),
                    'subtitle'=> __('Value in pixels.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    "default"       => '1',
                    "validate" => 'numeric'
                    ),
                array(
                    'id'=>'gallery-thumb-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Thumbnail - Background Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for thumbnail background.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0.1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'gallery-thumb-background-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Thumbnail - Hover Background Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for thumbnail background on hover.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'gallery-thumb-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Thumbnail - Border Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for thumbnail border.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'gallery-thumb-border-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Thumbnail - Border Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for thumbnail border hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.5'
                        ),
                    'validate' => 'colorrgba'
                    ),
            )
        );

        // Progress Bars Styling Subsection
        $sections[] = array(
            'id' => 'blocks-style-progress-bars-section',
            'subsection' => true,
            'title' => ''.__('Progress Bars', 'pt-minigo'),
            'desc' => __('In this sub-section you can set styles for your progress bars shortcode:', 'pt-minigo') . ' <strong>[minigo-progress-bars]</strong>',
            'required' => array('enable-blocks-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-bulb',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Progress Bars
                array(
                    'id' => 'progress-bars-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Progress Bars Styling', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'progress-bars-value-color',
                    'type' => 'color_rgba',
                    'title' => __('Progress Bars - Value Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for the value.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'progress-bars-color',
                    'type' => 'color_rgba',
                    'title' => __('Progress Bars - Bar Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for progress bars.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'progress-bars-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Progress Bars - Bar Background Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for for progress bars background.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'progress-bars-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Progress Bars - Bar Border Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for for progress bars border.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
            )
        );

        // Shop Styling Styling Subsection
        $sections[] = array(
            'id' => 'blocks-style-shop-section',
            'subsection' => true,
            'title' => ''.__('Shop', 'pt-minigo'),
            'desc' => __('In this sub-section you can set styles for your Shop shortcode:', 'pt-minigo') . ' <strong>[minigo-shop]</strong><br><em>' .  __('Note: More specific options will be added in an update.', 'pt-minigo') . '</em>',
            'required' => array('enable-blocks-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-shopping-cart',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Map
                array(
                    'id' => 'shop-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Shop General Styling', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'shop-brand-color',
                    'type' => 'color_rgba',
                    'title' => __('Shop - Brand Color', 'pt-minigo'),
                    'subtitle' => __('Set the main color', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'shop-bg-color',
                    'type' => 'color_rgba',
                    'title' => __('Shop - Background Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for Shop border hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
            )
        );

        // Slider Styling Subsection
        $sections[] = array(
            'id' => 'blocks-style-slider-section',
            'subsection' => true,
            'title' => ''.__('Slider Blocks', 'pt-minigo'),
            'desc' => __('In this sub-section you can set styles for your slider shortcodes:', 'pt-minigo') . ' <strong>[minigo-gallery] [minigo-team] [minigo-testimonials]</strong>',
            'required' => array('enable-blocks-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-resize-horizontal',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Slider Styling
                array(
                    'id' => 'slider-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Slider Styling', 'pt-minigo'),
                    'subtitle' => __('Set styles for the slider used for the photo gallery and testimonials shortcodes.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'slider-nav-color',
                    'type' => 'color_rgba',
                    'title' => __('Navigation - Dots Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for the gallery navigation dots.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'slider-nav-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Navigation - Dots Hover Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for dots hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'slider-nav-color-active',
                    'type' => 'color_rgba',
                    'title' => __('Navigation - Dots Active Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for dots active state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.75'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'slider-nav-arrow-color',
                    'type' => 'color_rgba',
                    'title' => __('Navigation - Arrows Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for the gallery navigation arrows.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'slider-nav-arrow-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Navigation - Arrows Hover Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for arrows hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),

            )
        );

        // Team Styling Subsection
        $sections[] = array(
            'id' => 'blocks-style-team-section',
            'subsection' => true,
            'title' => ''.__('Team', 'pt-minigo'),
            'desc' => __('In this sub-section you can set styles for your team shortcode:', 'pt-minigo') . ' <strong>[minigo-team]</strong>',
            'required' => array('enable-blocks-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-user',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Team Members
                array(
                    'id' => 'team-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Team Members Styling', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'team-thumb-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Avatar - Border Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for thumbnail border.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'team-thumb-border-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Avatar - Border Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for thumbnail border hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.5'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'team-thumb-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Avatar - BG Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for thumbnail background.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'team-thumb-background-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Avatar - BG Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for thumbnail background hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
            )
        );

        // Testimonials Styling Subsection
        $sections[] = array(
            'id' => 'blocks-style-progress-bars-section',
            'subsection' => true,
            'title' => ''.__('Testimonials', 'pt-minigo'),
            'desc' => __('In this sub-section you can set styles for your Testimonials shortcode:', 'pt-minigo'). ' <strong>[minigo-testimonials]</strong>',
            'required' => array('enable-blocks-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-quotes',
            'icon_class' => 'icon-large',
            'fields' => array(
                // Testimonials
                array(
                    'id' => 'testimonials-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Testimonials Styling', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'testimonials-icon-color',
                    'type' => 'color_rgba',
                    'title' => __('Testimonials - Icon Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for testimonial icon.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'testimonials-icon-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Testimonials - Icon Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for testimonial icon hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'testimonials-divider-color',
                    'type' => 'color_rgba',
                    'title' => __('Testimonials - Divider Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for testimonial divider.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'testimonials-divider-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Testimonials - Divider Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for testimonial divider hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.5'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'testimonials-avatar-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Testimonials - Avatar Border Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for testimonial avatar border.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'testimonials-avatar-border-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Testimonials - Avatar Border Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for testimonial avatar border hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '1'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'testimonials-avatar-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Testimonials - Avatar BG Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for testimonial avatar background.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'testimonials-avatar-background-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Testimonials - Avatar BG Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for testimonial avatar background hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
            )
        );

        // Video Styling Styling Subsection
        $sections[] = array(
            'id' => 'blocks-style-video-section',
            'subsection' => true,
            'title' => ''.__('Video', 'pt-minigo'),
            'desc' => __('In this sub-section you can set styles for your Video shortcode:', 'pt-minigo'). ' <strong>[minigo-video]</strong>',
            'required' => array('enable-blocks-visual-settings', 'equals', '1'),
            'icon' => 'el-icon-video',
            'icon_class' => 'icon-large',
            'fields' => array(
                // video
                array(
                    'id' => 'video-styling-section',
                    'type' => 'section',
                    'subsection' => true,
                    'indent' => true,
                    'title' => __('Video Styling', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1')
                ),
                array(
                    'id'=>'video-border-color',
                    'type' => 'color_rgba',
                    'title' => __('Video - Border Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for video border.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'video-border-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Video - Border Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for video border hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#FFF',
                            'alpha' => '0.5'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'video-background-color',
                    'type' => 'color_rgba',
                    'title' => __('Video - BG Color', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for video background.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0'
                        ),
                    'validate' => 'colorrgba'
                    ),
                array(
                    'id'=>'video-background-color-hover',
                    'type' => 'color_rgba',
                    'title' => __('Video - BG Color Hover', 'pt-minigo'),
                    'subtitle' => __('Set the color and opacity for video background hover state.', 'pt-minigo'),
                    'required' => array('enable-blocks-visual-settings', 'equals', '1'),
                    'default'  => array(
                            'color' => '#000',
                            'alpha' => '0.25'
                        ),
                    'validate' => 'colorrgba'
                    ),
            )
        );



       $sections[] = array(
            'title' => __('Advanced', 'pt-minigo'),
            'icon_class' => 'icon-large',
            'icon' => 'el-icon-lock',
            'fields' => array(
                array(
                    'id'=>'load-other-assets',
                    'type' => 'switch',
                    'title' => __('Load Styles and Scripts from other Plugins', 'pt-minigo'),
                    'subtitle'=> '<p>'.__('Choose whether or not to load CSS and Javascript files enqueued by the active theme and other active plugins.', 'pt-minigo').'</p><p>'.__('This will allow you to use any shortcodes that other plugins provide but <strong>may break MiniGO.', 'pt-minigo').'</strong></p>',
                    "default"       => 0,
                    ),
                array(
                    'id'=>'strip-theme-assets',
                    'type' => 'switch',
                    'required' => array('load-other-assets','=','1'),
                    'title' => __('Attempt to remove Theme Styles and Scripts', 'pt-minigo'),
                    'subtitle'=> '<p>'.__('If enabled, the plugin will attempt to remove any styling and scripts loaded by the active theme.', 'pt-minigo').'</p><p>'.__('Set this to On to keep your theme from breaking MiniGO.', 'pt-minigo').'</p><p>'.__('There\'s no way to ensure that the cleanup was successful so the theme\'s styles may still be able to break MiniGO\'s layout.', 'pt-minigo').'</p>',
                    "default"       => 1,
                    ),
                array(
                    'id'=>'whitelist-ips',
                    'type'=>'textarea',
                    'title' => __('Whitelist IPs', 'pt-minigo'),
                    'subtitle'=> __('A list of client IPs that will view your theme regardless if MiniGO is disabled or not and the visitor using the IP is logged in or not.', 'pt-minigo'),
                    'desc'=> __('One IP per line.', 'pt-minigo')
                    )

                )
            );

            $sections[] = array(
                'id' => 'updates-subsection',
                'subsection' => true,
                'title' => __('Updates', 'pt-minigo'),
                'desc' => __('Stay up to date with automatic updates for your plugin! Just enter your purchase key below and you\'re set.', 'pt-minigo'),
                'icon_class' => 'icon-large',
                'icon' => 'el-icon-upload',
                'fields' => array(
                    array(
                        'id' => 'purchase-key',
                        'type' => 'text',
                        'title' => __('Purchase Key', 'pt-minigo'),
                        'subtitle' => __('Don\'t know where to find it?','pt-minigo').'<br>'.__('Follow our ', 'pt-minigo').'<a target="_blank" href="http://premiothemes.com/help/purchase-key/">'.__('quick tutorial', 'pt-minigo').'</a>!',
                    ),
                   array(
                        'id' => 'premio_verify_user',
                        'type' => 'premio_verify_user'
                    )
                )
            );

            $sections[] = array(
                'id' => 'import-export-subsection',
                'title' => __('Import/Export', 'pt-minigo'),
                'desc' => __('You can import and export all MiniGO Settings in JSON format which is quite handy if you want to back up your site, clone or migrate it.', 'pt-minigo'),
                'icon_class' => 'icon-large',
                'subsection' => true,
                'icon' => 'el-icon-refresh',
                'fields' => array(
                    array(
                        'id'            => 'opt-import-export',
                        'type'          => 'import_export',
                        'title'         => 'Import Export',
                        'subtitle'      => 'Save and restore your Redux options',
                        'full_width'    => false,
                    ),
                )
            );

        global $MiniGOReduxFramework;
        $MiniGOReduxFramework = new ReduxFramework($sections, $args, $tabs);
        // END Config
    }
}