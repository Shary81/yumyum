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
 * @subpackage  Field_counter_features
 * @author      Luciano "WebCaos" Ubertini
 * @author      Daniel J Griffiths (Ghost1227)
 * @author      Dovy Paukstys
 * @version     3.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Don't duplicate me!
if (!class_exists('ReduxFramework_counter_features')) {

    /**
     * Main ReduxFramework_counter_features class
     *
     * @since       1.0.0
     */
    class ReduxFramework_counter_features extends ReduxFramework{

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
                'title' => '',
                'text' => '',
                'counter' => '',
                'select' => array(),
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

            echo '<div class="redux-counter_features-accordion pt-accordion-holder">';

            $x = 0;

            if (isset($this->value) && is_array($this->value)) {

                $counter_featuress = $this->value;

                foreach ($counter_featuress as $counter_features) {

                    if ( empty( $counter_features ) ) {
                        continue;
                    }

                    // Accordion Item Group
                    echo '<div class="redux-counter_features-accordion-group pt-accordion-group"><fieldset class="redux-field redux-container-select" data-id="'.$this->field['id'].'">';

                    // Delete Button [button]
                    echo '<a href="javascript:void(0);" class="button deletion pt-accordion-remove redux-counter_features-remove"><i class="fa fa-remove"></i>' . __('Delete', 'redux-framework') . '</a>';

                    // Accordion Item Title Bar
                    echo '<h3><span class="redux-counter_features-header pt-accordion-title">' . $counter_features['title'] . '</span></h3><div>';

                    echo '<ul id="' . $this->field['id'] . '-ul" class="redux-counter_features-list">';

                    // Icon [select]
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
                                    $selected = $counter_features['select'] == $k ?' selected="selected"':'';
                                } else {
                                    $selected = selected($this->value['select'], $k, false);
                                }
                                echo '<option value="'.$k.'"'.$selected.'>'.$v.'</option>';
                            }

                        echo '</select></li>';
                    }

                    // Title [input]
                    echo '<li class=""><label>Title</label> <input type="text" id="' . $this->field['id'] . '-title_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][title]" value="' . esc_attr($counter_features['title']) . '" placeholder="'.__('Enter Title', 'redux-framework').'" class="full-text counter_features-title" /></li>';

                    // Counter Value [input]
                    echo '<li class=""><label>Counter Value</label> <input type="text" id="' . $this->field['id'] . '-title_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][counter]" value="' . esc_attr($counter_features['counter']) . '" placeholder="'.__('Enter Counter Value', 'redux-framework').'" class="full-text counter_features-counter" /></li>';

                    // Text [textarea]
                    echo '<li class="no-border"><label>Text</label> <textarea rows="4" id="' . $this->field['id'] . '-url_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][text]" value="' . esc_attr($counter_features['text']) . '" class="full-text" placeholder="'.__('Enter (optional) Text', 'redux-framework').'" />'.esc_attr($counter_features['text']).'</textarea></li>';

                    // Item Sort Order [hidden]
                    echo '<li class="pt-hidden"><input type="hidden" class="counter_features-sort" name="' . $this->field['name'] . '[' . $x . '][sort]" id="' . $this->field['id'] . '-sort_' . $x . '" value="' . $counter_features['sort'] . '" /></li>';

                    // Delete Button [button]
                    // echo '<li><a href="javascript:void(0);" class="button deletion pt-accordion-remove redux-counter_features-remove">' . __('Delete Icon Feature', 'redux-framework') . '</a></li>';
                    echo '</ul></div></fieldset></div>';
                    $x++;

                }
            }

            // // Add Button [button]
            // echo '</div><a href="javascript:void(0);" class="button redux-counter_features-add button-primary pt-accordion-add" rel-id="' . $this->field['id'] . '-ul" rel-name="' . $this->field['name'] . '[title][]">' . __('Add Icon Feature', 'redux-framework') . '</a><br/>';

            echo '</div>'; // End Accordion

            // Action Bar [section]
            echo '<div class="pt-accordion-action-bar">';

            // Add Button [button]
            echo '<a href="javascript:void(0);" class="button redux-counter_features-add button-primary pt-accordion-add" rel-id="' . $this->field['id'] . '-ul" rel-name="' . $this->field['name'] . '[title][]"><i class="fa fa-plus"></i>' . __('New Counter Feature', 'redux-framework') . '</a>';

            // Remove All Button [button]
            echo '<a href="javascript:void(0);" class="button deletion pt-accordion-remove-all redux-counter_features-remove-all"><i class="fa fa-eraser"></i>' . __('Delete All', 'redux-framework') . '</a>';

            echo '</div>'; // Action Bar
        }

    }
}
