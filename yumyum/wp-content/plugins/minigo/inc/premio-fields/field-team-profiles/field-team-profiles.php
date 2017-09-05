<?php
/**
 * Redux Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Redux Framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Redux Framework. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     ReduxFramework
 * @subpackage  Field_team_profiles
 * @author      Luciano "WebCaos" Ubertini
 * @author      Daniel J Griffiths (Ghost1227)
 * @author      Dovy Paukstys
 * @version     3.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Don't duplicate me!
if (!class_exists('ReduxFramework_team_profiles')) {

    /**
     * Main ReduxFramework_team_profiles class
     *
     * @since       1.0.0
     */
    class ReduxFramework_team_profiles extends ReduxFramework{

        /**
         * Field Constructor.
         *
         * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        function __construct( $field = array(), $value ='', $parent ) {
            $this->parent = $parent;
            $this->field = $field;
            $this->value = $value;

            $defaults = array(
                'attachment_id' => '',
                'thumb' => '',
                'image' => '',

                'first_name' => '',
                'last_name' => '',
                'job_title' => '',

                'sort' => 0,

                'fa-link' => '',        // Website
                'fa-envelope' => 'aaaa',    // Email
                'fa-phone' => '',       // Phone
                'fa-facebook' => '',    // Facebook
                'fa-twitter' => '',     // Twitter
                'fa-linkedin' => '',    // Linkedin
                'fa-pinterest' => '',   // Pinterest
                'fa-google-plus' => '', // Google Plus
                'fa-youtube' => '',     // Youtube
                'fa-instagram' => '',   // Instagram
                'fa-flickr' => '',      // Flickr
                'fa-skype' => '',       // Skype
                'fa-whatsapp' => '',    // WhatsApp
                'fa-snapchat' => '',    // SnapChat
                'fa-vine' => '',        // Vine
                'fa-wordpress' => '',   // WordPress
                'fa-tumblr' => '',      // Tumblr
                'fa-slack' => '',       // Slack
                'fa-git' => '',         // Git
                'fa-behance' => '',     // Behance
                'fa-dribbble' => '',    // Dribbble
                'fa-deviantart' => '',  // DeviantArt
            );

            $this->field = wp_parse_args( $this->field, $defaults );

        }

        /**
         * Field Render Function.
         *
         * Takes the vars and outputs the HTML for the field in the settings
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function render() {

            echo '<div class="redux-team_profiles-accordion redux-slides-accordion pt-accordion-holder" data-new-content-title="' . 'New Profile' . '">';

            $x = 0;

            if (isset($this->value) && is_array($this->value)) {

                $team_profiless = $this->value;

                foreach ($team_profiless as $team_profiles) {

                    if ( empty( $team_profiles ) ) {
                        continue;
                    }

                    // Accordion Item Group
                    echo '<div class="redux-team_profiles-accordion-group redux-slides-accordion-group pt-accordion-group"><fieldset class="redux-field" data-id="'.$this->field['id'].'">';

                    // Delete Button [button]
                    echo '<a href="javascript:void(0);" class="button deletion pt-accordion-remove redux-team_profiles-remove"><i class="fa fa-remove"></i>' . __('Delete', 'redux-framework') . '</a>';

                    // Accordion Item Title Bar
                    echo '<h3><span class="redux-team_profiles-header redux-slides-header pt-accordion-title"><span class="member-first-name">' . $team_profiles['first_name'] . '</span><span class="member-last-name"> ' . $team_profiles['last_name'] . '</span></span></h3>';

                    // Image Manager [media]

                    echo '<div class="pt-image-manager">';
                    $hide = '';
                    if ( empty ( $team_profiles[ 'image' ] ) ) {
                        $hide = ' hide';
                    }

                    echo '<label class="pt-image-label">Profile Picture</label>';
                    echo '<div class="screenshot' . $hide . '">';
                        echo '<a class="of-uploaded-image" href="' . $team_profiles[ 'image' ] . '">';
                            echo '<img class="redux-team_profiles-image pt-accordion-image" id="image_image_id_' . $x . '" src="' . $team_profiles[ 'thumb' ] . '" alt="" target="_blank" rel="external" />';
                        echo '</a>';
                    echo '</div>';

                    echo '<div class="redux_team_profiles_add_remove pt-image-button-holder">';

                    echo '<span class="button media_upload_button" id="add_team_profiles_image_' . $x . '">' . __ ( 'Upload', 'pt-minigo' ) . '</span>';

                    $hide = '';
                    if ( empty ( $team_profiles[ 'image' ] ) || $team_profiles[ 'image' ] == '' ) {
                        $hide = ' hide';
                    }

                    echo '<span class="button remove-image' . $hide . '" id="reset_team_profiles_image_' . $x . '" rel="' . $team_profiles[ 'attachment_id' ] . '">' . __ ( 'Remove', 'pt-minigo' ) . '</span>';

                    echo '</div>' . "\n";

                    echo '<ul id="' . $this->field['id'] . '-ul" class="redux-team_profiles-list">';

                    // Image Field [hidden]
                    echo '<li class="team_profiles_image"><input type="hidden" class="upload-id" name="' . $this->field[ 'name' ] . '[' . $x . '][attachment_id]' . $this->field['name_suffix'] .'" id="' . $this->field[ 'id' ] . '-image_id_' . $x . '" value="' . $team_profiles[ 'attachment_id' ] . '" />';
                    echo '<input type="hidden" class="upload-thumbnail" name="' . $this->field[ 'name' ] . '[' . $x . '][thumb]' . $this->field['name_suffix'] .'" id="' . $this->field[ 'id' ] . '-thumb_url_' . $x . '" value="' . $team_profiles[ 'thumb' ] . '" readonly="readonly" />';
                    echo '<input type="hidden" class="upload" name="' . $this->field[ 'name' ] . '[' . $x . '][image]' . $this->field['name_suffix'] .'" id="' . $this->field[ 'id' ] . '-image_url_' . $x . '" value="' . $team_profiles[ 'image' ] . '" readonly="readonly" />';
                    '</li>';

                    // First Name [input]
                    echo '<li><label>'.__('First Name','pt-minigo').'</label> <input type="text" id="' . $this->field['id'] . '-first_name_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][first_name]" value="' . esc_attr($team_profiles['first_name']) . '" placeholder="'.__('First Name', 'pt-minigo').'" class="full-text team_profiles-first_name" /></li>';

                    // Last Name [input]
                    echo '<li><label>Last Name</label> <input type="text" id="' . $this->field['id'] . '-last_name_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][last_name]" value="' . esc_attr($team_profiles['last_name']) . '" placeholder="'.__('Last Name', 'pt-minigo').'" class="full-text team_profiles-last_name" /></li>';

                    // Job Title [input]
                    echo '<li><label>'.__('Job Title','pt-minigo').'</label> <input type="text" id="' . $this->field['id'] . '-job_title_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][job_title]" value="' . esc_attr($team_profiles['job_title']) . '" placeholder="'.__('Job Title', 'pt-minigo').'" class="full-text team_profiles-job_title" /></li>';

                    // Item Sort Order [hidden]
                    echo '<li class="pt-hidden"><input type="hidden" class="team_profiles-sort" name="' . $this->field['name'] . '[' . $x . '][sort]" id="' . $this->field['id'] . '-sort_' . $x . '" value="' . $team_profiles['sort'] . '" /></li>';


                    // Help Notice [!]
                    echo '<li class="pt-accordion-notice">'.__('<strong>Link Tip:</strong>  If you want an icon link to show up, fill in the url field, otherwise leave it blank.','pt-minigo').'</li>';

                    // echo'<li class=""><strong>Icon Links</strong> If you want an icon link to show up, fill in the url field, otherwise leave it blank.</li>';

                    // Icon Options [input]
                    echo '<div class="pt-flex">';
                        echo '<li><label class="">Website: </label><input type="text" id="' . $this->field['id'] . '-fa-link_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-link]" value="' . esc_attr($team_profiles['fa-link']) . '" placeholder="'.__('Website url', 'pt-minigo').'" class="full-text team_profiles-fa-link" /></li>';
                        echo '<li><label class="">Email: </label><input type="text" id="' . $this->field['id'] . '-fa-envelope_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-envelope]" value="' . esc_attr($team_profiles['fa-envelope']) . '" placeholder="'.__('Email url', 'pt-minigo').'" class="full-text team_profiles-fa-envelope" /></li>';
                        echo '<li><label class="">Phone: </label><input type="text" id="' . $this->field['id'] . '-fa-phone_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-phone]" value="' . esc_attr($team_profiles['fa-phone']) . '" placeholder="'.__('Phone url', 'pt-minigo').'" class="full-text team_profiles-fa-phone" /></li>';
                        echo '<li><label class="">Facebook: </label><input type="text" id="' . $this->field['id'] . '-fa-facebook_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-facebook]" value="' . esc_attr($team_profiles['fa-facebook']) . '" placeholder="'.__('Facebook url', 'pt-minigo').'" class="full-text team_profiles-fa-facebook" /></li>';
                        echo '<li><label class="">Twitter: </label><input type="text" id="' . $this->field['id'] . '-fa-twitter_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-twitter]" value="' . esc_attr($team_profiles['fa-twitter']) . '" placeholder="'.__('Twitter url', 'pt-minigo').'" class="full-text team_profiles-fa-twitter" /></li>';
                        echo '<li><label class="">Linkedin: </label><input type="text" id="' . $this->field['id'] . '-fa-linkedin_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-linkedin]" value="' . esc_attr($team_profiles['fa-linkedin']) . '" placeholder="'.__('Linkedin url', 'pt-minigo').'" class="full-text team_profiles-fa-linkedin" /></li>';
                        echo '<li><label class="">Pinterest: </label><input type="text" id="' . $this->field['id'] . '-fa-pinterest_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-pinterest]" value="' . esc_attr($team_profiles['fa-pinterest']) . '" placeholder="'.__('Pintrest url', 'pt-minigo').'" class="full-text team_profiles-fa-pinterest" /></li>';
                        echo '<li><label class="">Google Plus: </label><input type="text" id="' . $this->field['id'] . '-fa-google-plus_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-google-plus]" value="' . esc_attr($team_profiles['fa-google-plus']) . '" placeholder="'.__('Google Plus url', 'pt-minigo').'" class="full-text team_profiles-fa-google-plus" /></li>';
                        echo '<li><label class="">Youtube: </label><input type="text" id="' . $this->field['id'] . '-fa-youtube_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-youtube]" value="' . esc_attr($team_profiles['fa-youtube']) . '" placeholder="'.__('Youtube url', 'pt-minigo').'" class="full-text team_profiles-fa-youtube" /></li>';
                        echo '<li><label class="">Instagram: </label><input type="text" id="' . $this->field['id'] . '-fa-instagram_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-instagram]" value="' . esc_attr($team_profiles['fa-instagram']) . '" placeholder="'.__('Instagram url', 'pt-minigo').'" class="full-text team_profiles-fa-instagram" /></li>';
                        echo '<li><label class="">Flickr: </label><input type="text" id="' . $this->field['id'] . '-fa-flickr_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-flickr]" value="' . esc_attr($team_profiles['fa-flickr']) . '" placeholder="'.__('Flickr url', 'pt-minigo').'" class="full-text team_profiles-fa-flickr" /></li>';
                        echo '<li><label class="">Skype: </label><input type="text" id="' . $this->field['id'] . '-fa-skype_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-skype]" value="' . esc_attr($team_profiles['fa-skype']) . '" placeholder="'.__('Skype url', 'pt-minigo').'" class="full-text team_profiles-fa-skype" /></li>';
                        echo '<li><label class="">WhatsApp: </label><input type="text" id="' . $this->field['id'] . '-fa-whatsapp_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-whatsapp]" value="' . esc_attr($team_profiles['fa-whatsapp']) . '" placeholder="'.__('WhatsApp url', 'pt-minigo').'" class="full-text team_profiles-fa-whatsapp" /></li>';
                        echo '<li><label class="">SnapChat: </label><input type="text" id="' . $this->field['id'] . '-fa-snapchat_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-snapchat]" value="' . esc_attr($team_profiles['fa-snapchat']) . '" placeholder="'.__('SnapChat url', 'pt-minigo').'" class="full-text team_profiles-fa-snapchat" /></li>';
                        echo '<li><label class="">Vine: </label><input type="text" id="' . $this->field['id'] . '-fa-vine_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-vine]" value="' . esc_attr($team_profiles['fa-vine']) . '" placeholder="'.__('Vine url', 'pt-minigo').'" class="full-text team_profiles-fa-vine" /></li>';
                        echo '<li><label class="">Wordpress: </label><input type="text" id="' . $this->field['id'] . '-fa-wordpress_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-wordpress]" value="' . esc_attr($team_profiles['fa-wordpress']) . '" placeholder="'.__('Wordpress url', 'pt-minigo').'" class="full-text team_profiles-fa-wordpress" /></li>';
                        echo '<li><label class="">Tumblr: </label><input type="text" id="' . $this->field['id'] . '-fa-tumblr_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-tumblr]" value="' . esc_attr($team_profiles['fa-tumblr']) . '" placeholder="'.__('Tumblr url', 'pt-minigo').'" class="full-text team_profiles-fa-tumblr" /></li>';
                        echo '<li><label class="">Slack: </label><input type="text" id="' . $this->field['id'] . '-fa-slack_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-slack]" value="' . esc_attr($team_profiles['fa-slack']) . '" placeholder="'.__('Slack url', 'pt-minigo').'" class="full-text team_profiles-fa-slack" /></li>';
                        echo '<li><label class="">Git: </label><input type="text" id="' . $this->field['id'] . '-fa-git_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-git]" value="' . esc_attr($team_profiles['fa-git']) . '" placeholder="'.__('Git url', 'pt-minigo').'" class="full-text team_profiles-fa-git" /></li>';
                        echo '<li><label class="">Behance: </label><input type="text" id="' . $this->field['id'] . '-fa-behance_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-behance]" value="' . esc_attr($team_profiles['fa-behance']) . '" placeholder="'.__('Behance url', 'pt-minigo').'" class="full-text team_profiles-fa-behance" /></li>';
                        echo '<li><label class="">Dribbble: </label><input type="text" id="' . $this->field['id'] . '-fa-dribbble_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-dribbble]" value="' . esc_attr($team_profiles['fa-dribbble']) . '" placeholder="'.__('Dribbble url', 'pt-minigo').'" class="full-text team_profiles-fa-dribbble" /></li>';
                        echo '<li><label class="">Deviantart: </label><input type="text" id="' . $this->field['id'] . '-fa-deviantart_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][fa-deviantart]" value="' . esc_attr($team_profiles['fa-deviantart']) . '" placeholder="'.__('Deviantart url', 'pt-minigo').'" class="full-text team_profiles-fa-deviantart" /></li>';
                    echo '</div>';

                    // Delete Button [button]
                    // echo '<li><a href="javascript:void(0);" class="button deletion pt-accordion-remove redux-team_profiles-remove">' . __('Delete Profile', 'pt-minigo') . '</a></li>';
                    echo '</ul></div></fieldset></div>';
                    $x++;
                }
            }

            // Add Button [button]
            // echo '</div><a href="javascript:void(0);" class="button redux-team_profiles-add button-primary pt-accordion-add" rel-id="' . $this->field['id'] . '-ul" rel-name="' . $this->field['name'] . '[title][]">' . __('Add Team Member', 'pt-minigo') . '</a><br/>';

            echo '</div>'; // End Accordion

            // Action Bar [section]
            echo '<div class="pt-accordion-action-bar">';

            // Add Button [button]
            echo '<a href="javascript:void(0);" class="button redux-team_profiles-add button-primary pt-accordion-add" rel-id="' . $this->field['id'] . '-ul" rel-name="' . $this->field['name'] . '[title][]"><i class="fa fa-plus"></i>' . __('New Team Member', 'redux-framework') . '</a>';

            // Remove All Button [button]
            echo '<a href="javascript:void(0);" class="button deletion pt-accordion-remove-all redux-team_profiles-remove-all"><i class="fa fa-eraser"></i>' . __('Delete All', 'redux-framework') . '</a>';

            echo '</div>'; // Action Bar
        }

    }
}
