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
 * @subpackage  Field_progress_bars
 * @author      Luciano "WebCaos" Ubertini
 * @author      Daniel J Griffiths (Ghost1227)
 * @author      Dovy Paukstys
 * @version     3.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Don't duplicate me!
if (!class_exists('ReduxFramework_progress_bars')) {

    /**
     * Main ReduxFramework_progress_bars class
     *
     * @since       1.0.0
     */
    class ReduxFramework_progress_bars extends ReduxFramework{

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
            'value' => '24 of 200',
            'progress' => '',
            'sort' => 0,
            'color' => '',
            'border-color'=> '',
            'background' => '',
            'select' => array()
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

            echo '<div class="redux-progress_bars-accordion pt-accordion-holder">';

            $x = 0;

            if (isset($this->value) && is_array($this->value)) {

                $progress_barss = $this->value;

                foreach ($progress_barss as $progress_bars) {

                    if ( empty( $progress_bars ) ) {
                        continue;
                    }

                    // Accordion Item Title
                    echo '<div class="redux-progress_bars-accordion-group pt-accordion-group"><fieldset class="redux-field redux-container-select" data-id="'.$this->field['id'].'">';

                    // Delete Button [button]
                    echo '<a href="javascript:void(0);" class="button deletion pt-accordion-remove redux-progress_bars-remove"><i class="fa fa-remove"></i>' . __('Delete', 'redux-framework') . '</a>';

                    // Accordion Item Title Bar
                    echo '<h3><span class="redux-progress_bars-header pt-accordion-title">' . $progress_bars['title'] . '</span></h3><div>';

                    echo '<ul id="' . $this->field['id'] . '-ul" class="redux-progress_bars-list">';

                    // Title [input]
                    echo '<li class="pt-col pt-two-thirds"><label>'.__('Title:', 'pt-minigo').'</label> <input type="text" id="' . $this->field['id'] . '-title_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][title]" value="' . esc_attr($progress_bars['title']) . '" placeholder="'.__('Label', 'redux-framework').'" class="full-text progress_bars-title" /></li>';

                    // Value [input]

                    echo '<li class="pt-col pt-third"><label>'.__('Value', 'pt-minigo').'</label> <input type="text" id="' . $this->field['id'] . '-value_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][value]" value="' . esc_attr($progress_bars['value']) . '" class="full-text" placeholder="'.__('Amount ex. 5 or 24%', 'pt-minigo').'" /></li>';

                    // Progress [input]
                    echo '<li class="pt-col pt-third pt-progress"><label>'.__('Progress (%)', 'pt-minigo').'</label> <input type="text" id="' . $this->field['id'] . '-progress_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][progress]" value="' . esc_attr($progress_bars['progress']) . '" class="full-text" placeholder="'.__('Progress bar percentage, ex. 75', 'pt-minigo').'" /></li>';

                    // Icon Selector [select]
                    if ( isset( $this->field['options'] ) && !empty( $this->field['options'] ) ) {
                        echo '<li class="pt-icon-select">';
                        $placeholder = (isset($this->field['placeholder']['options'])) ? esc_attr($this->field['placeholder']['options']) : __( 'Select an Icon', 'redux-framework' );

                        if ( isset( $this->field['select2'] ) ) { // if there are any let's pass them to js
                            $select2_params = json_encode( esc_attr( $this->field['select2'] ) );
                            $select2_params = htmlspecialchars( $select2_params , ENT_QUOTES);
                            echo '<input type="hidden" class="select2_params" value="'. $select2_params .'">';
                        }

                        echo '<label class="for--select">'.__('Icon','pt-minigo').'</label> <select id="'.$this->field['id'].'-select" data-placeholder="'.$placeholder.'" name="' . $this->field['name'] . '[' . $x . '][select]" class="font-awesome-icons s--icons redux-select-item '.$this->field['class'].'" rows="6">';
                            echo '<option></option>';

                            foreach($this->field['options'] as $k => $v){
                                if (is_array($this->value)) {
                                    $selected = $progress_bars['select'] == $k ?' selected="selected"':'';
                                } else {
                                    $selected = selected($this->value['select'], $k, false);
                                }
                                echo '<option value="'.$k.'"'.$selected.'>'.$v.'</option>';
                            }
                            
                        echo '</select></li>';
                    }

                    // Color [color-picker]
                    echo '<li class="pt-col pt-third"><label class="label-color--picker" for="' . $this->field['id'] . '-color-' . $x . '"><strong>'.__('Bar Color','pt-minigo').'</strong> </label>
                    <input type="text" class="color--picker" name="' . $this->field['name'] . '[' . $x . '][bar-color]" id="' . $this->field['id'] . '-color-' . $x . '" value="' . esc_attr($progress_bars['bar-color']) . '" />
                    </li>';

                    // Border Color [color-picker]
                    echo '<li class="pt-col pt-third"><label class="label-color--picker" for="' . $this->field['id'] . '-border-color-' . $x . '"><strong>'.__('Border Color', 'pt-minigo').'</strong> </label>
                    <input type="text" class="color--picker" name="' . $this->field['name'] . '[' . $x . '][border-color]" id="' . $this->field['id'] . '-border-color-' . $x . '" value="' . esc_attr($progress_bars['border-color']) . '" />
                    </li>';

                    // Background Color [color-picker]
                    echo '<li class="pt-col pt-third"><label class="label-color--picker" for="' . $this->field['id'] . '-background-' . $x . '"><strong>'.__('Background Color','pt-minigo').'</strong> </label>
                    <input type="text" class="color--picker" name="' . $this->field['name'] . '[' . $x . '][background]" id="' . $this->field['id'] . '-background-' . $x . '" value="' . esc_attr($progress_bars['background']) . '" />
                    </li>';

                    // Help Notice [!]
                    echo '<li class="pt-accordion-notice no-border">'.__('<strong>Important!</strong> If you add new field, please <strong>Save Changes</strong> first and then insert your <strong>colors</strong>.','pt-minigo').'</li>';

                    // Item Sort Order [hidden]
                    echo '<li class="pt-hidden"><input type="hidden" class="progress_bars-sort" name="' . $this->field['name'] . '[' . $x . '][sort]" id="' . $this->field['id'] . '-sort_' . $x . '" value="' . $progress_bars['sort'] . '" /></li>';

                    // Delete Button [button]
                    // echo '<li><a href="javascript:void(0);" class="button deletion pt-accordion-remove redux-progress_bars-remove">' . __('Delete Progress Bar', 'pt-minigo') . '</a></li>';
                    echo '</ul></div></fieldset></div>';
                    $x++;

                }
            }

            // Add Button [button]
            // echo '</div><a href="javascript:void(0);" class="button redux-progress_bars-add button-primary pt-accordion-add" style="float: right; margin-right: 10%;" rel-id="' . $this->field['id'] . '-ul" rel-name="' . $this->field['name'] . '[title][]">' . __('Add Progress Bar', 'pt-minigo') . '</a><br/>';

            echo '</div>'; // End Accordion

            // Action Bar [section]
            echo '<div class="pt-accordion-action-bar">';

            // Add Button [button]
            echo '<a href="javascript:void(0);" class="button redux-progress_bars-add button-primary pt-accordion-add" rel-id="' . $this->field['id'] . '-ul" rel-name="' . $this->field['name'] . '[title][]"><i class="fa fa-plus"></i>' . __('New Progress Bar', 'redux-framework') . '</a>';

            // Remove All Button [button]
            echo '<a href="javascript:void(0);" class="button deletion pt-accordion-remove-all redux-progress_bars-remove-all"><i class="fa fa-eraser"></i>' . __('Delete All', 'redux-framework') . '</a>';

            echo '</div>'; // Action Bar
        }

        public function output() {

            for ($i = 0, $counter = count($this->value); $i < $counter; $i++) {

                $item = $this->value[$i];

                $smartCounter = $this->value[$i]['sort'] + 1;

                $style = 'color: '. $item['bar-color'] .';background: '. $item['background'] .';border-color: '. $item['border-color'] .';';

                $fieldCss = array('.minigo .progress_bars a:nth-child('.$smartCounter.')');

                $css = Redux_Functions::parseCSS( $fieldCss, $style, $item['bar-color'] );
                $this->parent->outputCSS .= $css;
            }

            for ($x = 0, $counter = count($this->value); $x < $counter; $x++) {

                $item = $this->value[$x];

                $smartCounter = $this->value[$x]['sort'] + 1;

                $fieldCss = array('.minigo .nav-social a:hover:nth-child('.$smartCounter.')');

                $css = Redux_Functions::parseCSS( $fieldCss, $style, $item['bar-color'] );
                $this->parent->outputCSS .= $css;
            }

        }

    }
}
