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
 * @subpackage  Field_testimonials
 * @author      Luciano "WebCaos" Ubertini
 * @author      Daniel J Griffiths (Ghost1227)
 * @author      Dovy Paukstys
 * @version     3.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Don't duplicate me!
if (!class_exists('ReduxFramework_testimonials')) {

    /**
     * Main ReduxFramework_testimonials class
     *
     * @since       1.0.0
     */
    class ReduxFramework_testimonials extends ReduxFramework{

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

                'name' => '',
                'position' => '',
                'url' => '',
                'new_window' => 0,
                'select' => 'fa-quote-left',
                'select' => array(),
                'quote' => '',
                'sort' => ''
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

            echo '<div class="redux-testimonials-accordion pt-accordion-holder">';

            $x = 0;

            if (isset($this->value) && is_array($this->value)) {

                $testimonialss = $this->value;

                foreach ($testimonialss as $testimonials) {

                    if ( empty( $testimonials ) ) {
                        continue;
                    }

                    // Accordion Item Group
                    echo '<div class="redux-testimonials-accordion-group pt-accordion-group"><fieldset class="redux-field redux-container-testimonials redux-container-select" data-id="'.$this->field['id'].'">';

                    // Delete Button [button]
                    echo '<a href="javascript:void(0);" class="button deletion pt-accordion-remove redux-testimonials-remove"><i class="fa fa-remove"></i>' . __('Delete', 'redux-framework') . '</a>';

                    // Accordion Item Title Bar
                    echo '<h3><span class="redux-testimonials-header pt-accordion-title">' . $testimonials['name'] . '</span></h3>';

                    // Image Manager [media]
                    echo '<div class="pt-image-manager">';
                    $hide = '';
                    if ( empty ( $testimonials[ 'image' ] ) ) {
                        $hide = ' hide';
                    }

                    echo '<label class="pt-image-label">Testimonial Image</label>';
                    echo '<div class="screenshot' . $hide . '">';
                        echo '<a class="of-uploaded-image" href="' . $testimonials[ 'image' ] . '">';
                            echo '<img class="redux-testimonials-image pt-accordion-image" id="image_testimonials_id_' . $x . '" src="' . $testimonials[ 'thumb' ] . '" alt="" target="_blank" rel="external" />';
                        echo '</a>';
                    echo '</div>';

                    echo '<div class="redux_testimonials_add_remove pt-image-button-holder">';

                    echo '<span class="button media_upload_button" id="add_testimonials_image_' . $x . '">' . __ ( 'Upload', 'pt-minigo' ) . '</span>';

                    $hide = '';
                    if ( empty ( $testimonials[ 'image' ] ) || $testimonials[ 'image' ] == '' ) {
                        $hide = ' hide';
                    }

                    echo '<span class="button remove-image' . $hide . '" id="reset_testimonials_image_' . $x . '" rel="' . $testimonials[ 'attachment_id' ] . '">' . __ ( 'Remove', 'pt-minigo' ) . '</span>';

                    echo '</div>' . "\n";

                    echo '<ul id="' . $this->field['id'] . '-ul" class="redux-testimonials-list">';

                    // Image Field [hidden]
                    echo '<li class="testimonials_image"><input type="hidden" class="upload-id" name="' . $this->field[ 'name' ] . '[' . $x . '][attachment_id]' . $this->field['name_suffix'] .'" id="' . $this->field[ 'id' ] . '-image_id_' . $x . '" value="' . $testimonials[ 'attachment_id' ] . '" />';
                    echo '<input type="hidden" class="upload-thumbnail" name="' . $this->field[ 'name' ] . '[' . $x . '][thumb]' . $this->field['name_suffix'] .'" id="' . $this->field[ 'id' ] . '-thumb_url_' . $x . '" value="' . $testimonials[ 'thumb' ] . '" readonly="readonly" />';

                    echo '<input type="hidden" class="upload" name="' . $this->field[ 'name' ] . '[' . $x . '][image]' . $this->field['name_suffix'] .'" id="' . $this->field[ 'id' ] . '-image_url_' . $x . '" value="' . $testimonials[ 'image' ] . '" readonly="readonly" />';
                        '</li>';
                    
                    // Name [input]
                    echo '<li class=""><label>Name</label> <input type="text" id="' . $this->field['id'] . '-name_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][name]" value="' . esc_attr($testimonials['name']) . '" placeholder="'.__('Name', 'redux-framework').'" class="full-text testimonials-name" /></li>';
                    
                    // Position [input]
                    echo '<li class=""><label>Position</label> <input type="text" id="' . $this->field['id'] . '-position_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][position]" value="' . esc_attr($testimonials['position']) . '" placeholder="'.__('Position', 'redux-framework').'" class="full-text testimonials-position" /></li>';
                    
                    // URL [input]
                    echo '<li class=""><label>Url</label> <input type="text" id="' . $this->field['id'] . '-url_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][url]" value="' . esc_attr($testimonials['url']) . '" placeholder="'.__('Link (optional)', 'redux-framework').'" class="full-text testimonials-url" /></li>';
                    
                    // New Window [checkbox]
                    echo '<li class="pt-checkbox pt-idented"><label class="label-new-window" for="' . $this->field['id'] . '-new_window_' . $x . '"><input type="checkbox" id="' . $this->field['id'] . '-new_window_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][new_window]" value="1" class="checkbox testimonials-new_window_" '.($testimonials['new_window'] == 1 ? 'checked="checked"' : '').' />'.__('Open in new Window/Tab','pt-minigo').'</label></li>';
                    
                    // Testimonial Icon [select]
                    if ( isset( $this->field['options'] ) && !empty( $this->field['options'] ) ) {
                        echo '<li class="pt-icon-select">';
                        $placeholder = (isset($this->field['placeholder']['options'])) ? esc_attr($this->field['placeholder']['options']) : __( 'Select an Icon', 'redux-framework' );

                        if ( isset( $this->field['select2'] ) ) { // if there are any let's pass them to js
                            $select2_params = json_encode( esc_attr( $this->field['select2'] ) );
                            $select2_params = htmlspecialchars( $select2_params , ENT_QUOTES);
                            echo '<input type="hidden" class="select2_params" value="'. $select2_params .'">';
                        }

                        echo '<label class="for--select">Icon</label> <select id="'.$this->field['id'].'-select" data-placeholder="'.$placeholder.'" name="' . $this->field['name'] . '[' . $x . '][select]" class="font-awesome-icons s--icons redux-select-item '.$this->field['class'].'" rows="6">';
                            echo '<option></option>';

                            foreach($this->field['options'] as $k => $v){
                                if (is_array($this->value)) {
                                    $selected = $testimonials['select'] == $k ?' selected="selected"':'';
                                } else {
                                    $selected = selected($this->value['select'], $k, false);
                                }
                                echo '<option value="'.$k.'"'.$selected.'>'.$v.'</option>';
                            }

                        echo '</select></li>';
                    }

                    // Testimonial [textarea]
                    echo '<li class=""><label>Testimonial</label> <textarea rows="4" id="' . $this->field['id'] . '-quote_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][quote]" value="' . esc_attr($testimonials['quote']) . '" class="full-text" placeholder="'.__('Testimonial Text', 'redux-framework').'" />'.esc_attr($testimonials['quote']).'</textarea></li>';

                    // Item Sort Order [hidden]
                    echo '<li class="pt-hidden"><input type="hidden" class="testimonials-sort" name="' . $this->field['name'] . '[' . $x . '][sort]" id="' . $this->field['id'] . '-sort_' . $x . '" value="' . $testimonials['sort'] . '" /></li>';

                    // Delete Button [button]
                    // echo '<li><a href="javascript:void(0);" class="button deletion pt-accordion-remove redux-testimonials-remove">' . __('Delete Testimonial', 'redux-framework') . '</a></li>';
                    echo '</ul></div></fieldset></div>';
                    $x++;

                }
            }

            // Add Button [button]
            // echo '</div><a href="javascript:void(0);" class="button redux-testimonials-add button-primary pt-accordion-add" rel-id="' . $this->field['id'] . '-ul" rel-name="' . $this->field['name'] . '[title][]">' . __('Add Testimonial', 'redux-framework') . '</a><br/>';

            echo '</div>'; // End Accordion

            // Action Bar [section]
            echo '<div class="pt-accordion-action-bar">';

            // Add Button [button]
            echo '<a href="javascript:void(0);" class="button redux-testimonials-add button-primary pt-accordion-add" rel-id="' . $this->field['id'] . '-ul" rel-name="' . $this->field['name'] . '[title][]"><i class="fa fa-plus"></i>' . __('New Testimonial', 'redux-framework') . '</a>';

            // Remove All Button [button]
            echo '<a href="javascript:void(0);" class="button deletion pt-accordion-remove-all redux-testimonials-remove-all"><i class="fa fa-eraser"></i>' . __('Delete All', 'redux-framework') . '</a>';

            echo '</div>'; // Action Bar

        }

    }
}
