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
 * @subpackage  Field_icon_menu
 * @author      Luciano "WebCaos" Ubertini
 * @author      Daniel J Griffiths (Ghost1227)
 * @author      Dovy Paukstys
 * @version     3.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Don't duplicate me!
if (!class_exists('ReduxFramework_icon_menu')) {

    /**
     * Main ReduxFramework_icon_menu class
     *
     * @since       1.0.0
     */
    class ReduxFramework_icon_menu extends ReduxFramework{

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
                // 'new_window' => 0,
                // 'color:hover' => '',
                // 'border-color:hover' => '',
                // 'background:hover' => '',
                'title' => '',
                'url' => '',
                'new-window' => 0,
                'color' => '',
                'color-hover' => '',
                'background' => '',
                'background-hover' => '',
                'border-color' => '',
                'border-color-hover' => '',
                'select' => array(),
                'sort' => '',
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

            echo '<div class="redux-icon_menu-accordion pt-accordion-holder">';

            $x = 0;

            if (isset($this->value) && is_array($this->value)) {

                $icon_menus = $this->value;

                foreach ($icon_menus as $icon_menu) {

                    if ( empty( $icon_menu ) ) {
                        continue;
                    }

                    // Accordion Item Group
                    echo '<div class="redux-icon_menu-accordion-group pt-accordion-group"><fieldset class="redux-field redux-container-select" data-id="'.$this->field['id'].'">';

                    // Delete Button [button]
                    echo '<a href="javascript:void(0);" class="button deletion pt-accordion-remove redux-icon_menu-remove"><i class="fa fa-remove"></i>' . __('Delete', 'redux-framework') . '</a>';

                    // Accordion Item Title Bar
                    echo '<h3><span class="redux-icon_menu-header pt-accordion-title">' . $icon_menu['title'] . '</span></h3><div>';

                    echo '<ul id="' . $this->field['id'] . '-ul" class="redux-icon_menu-list">';

                    // Title [input]
                    // echo '<li class="p--half"><label>Text</label> <input type="text" id="' . $this->field['id'] . '-title_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][title]" value="' . esc_attr($icon_menu['title']) . '" placeholder="'.__('Label', 'redux-framework').'" class="full-text icon_menu-title" /></li>';
                    echo '<li class=""><label>Text</label> <input type="text" id="' . $this->field['id'] . '-title_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][title]" value="' . esc_attr($icon_menu['title']) . '" placeholder="'.__('Label', 'redux-framework').'" class="full-text icon_menu-title" /></li>';

                    // URL [input]
                    // echo '<li class="p--half custom--left"><label>URL</label> <input type="text" id="' . $this->field['id'] . '-url_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][url]" value="' . esc_attr($icon_menu['url']) . '" class="full-text" placeholder="'.__('Link', 'redux-framework').'" /></li>';
                    echo '<li class=""><label>URL</label> <input type="text" id="' . $this->field['id'] . '-url_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][url]" value="' . esc_attr($icon_menu['url']) . '" class="full-text" placeholder="'.__('Link', 'redux-framework').'" /></li>';

                    // New Window
                    $icon_menu['new-window'] = !empty($icon_menu['new-window']) ? $icon_menu['new-window'] : 0;
                    echo '<li class="pt-checkbox pt-idented"><label class="pt-checkbox-label" for="' . $this->field['id'] . '-new-window_' . $x . '"><input type="checkbox" id="' . $this->field['id'] . '-new-window_' . $x . '" name="' . $this->field['name'] . '[' . $x . '][new-window]" value="1" class="checkbox icon_menu-new-window_" '.($icon_menu['new-window'] == 1 ? 'checked="checked"' : '').' /> Force open in new Window/Tab</label></li>';

                    // Icon Selector [select]
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
                                    $selected = $icon_menu['select'] == $k ?' selected="selected"':'';
                                } else {
                                    $selected = selected($this->value['select'], $k, false);
                                }
                                echo '<option value="'.$k.'"'.$selected.'>'.$v.'</option>';
                            }

                        echo '</select></li>';
                    }


                    // Color [color-picker]
                    echo '<li class="pt-colorpicker pt-third"><label class="label-color--picker" for="' . $this->field['id'] . '-color-' . $x . '"><strong>Color</strong> </label>
                    <input type="text" class="color--picker" name="' . $this->field['name'] . '[' . $x . '][color]" id="' . $this->field['id'] . '-color-' . $x . '" value="' . esc_attr($icon_menu['color']) . '" />
                    <input type="text" class="color--picker" name="' . $this->field['name'] . '[' . $x . '][color-hover]" id="' . $this->field['id'] . '-color-hover-' . $x . '" value="' . esc_attr($icon_menu['color-hover']) . '" /><label class="label-color--picker" for="' . $this->field['id'] . '-color-hover-' . $x . '"><strong>:hover</strong> </label></li>';

                    // Border Color [color-picker]
                    echo '<li class="pt-colorpicker pt-third"><label class="label-color--picker" for="' . $this->field['id'] . '-color' . $x . '"><strong>Border Color</strong> </label>
                    <input type="text" class="color--picker" name="' . $this->field['name'] . '[' . $x . '][border-color]" id="' . $this->field['id'] . '-color-' . $x . '" value="' . esc_attr($icon_menu['border-color']) . '" />
                    <input type="text" class="color--picker" name="' . $this->field['name'] . '[' . $x . '][border-color-hover]" id="' . $this->field['id'] . '-color-bdh-' . $x . '" value="' . esc_attr($icon_menu['border-color-hover']) . '" /><label class="label-color--picker" for="' . $this->field['id'] . '-color-bdh-' . $x . '"><strong>:hover</strong> </label>
                    </li>';

                    // Background [color-picker]
                    echo '<li class="pt-colorpicker pt-third"><label class="label-color--picker" for="' . $this->field['id'] . '-background' . $x . '"><strong>Background</strong> </label>
                    <input type="text" class="color--picker" name="' . $this->field['name'] . '[' . $x . '][background]" id="' . $this->field['id'] . '-background-' . $x . '" value="' . esc_attr($icon_menu['background']) . '" />
                    <input type="text" class="color--picker" name="' . $this->field['name'] . '[' . $x . '][background-hover]" id="' . $this->field['id'] . '-background-hvr-' . $x . '" value="' . esc_attr($icon_menu['background-hover']) . '" /><label class="label-color--picker" for="' . $this->field['id'] . '-background-hvr-' . $x . '"><strong>:hover</strong> </label>
                    </li>';

                    // Help Notice [!]
                    echo '<li class="pt-accordion-notice no-border">'.__('<strong>Important!</strong> If you add new field, please <strong>Save Changes</strong> first and then insert your <strong>colors</strong>.','pt-minigo').'</li>';

                    // Item Sort Order [hidden]
                    echo '<li class="pt-hidden"><input type="hidden" class="icon_menu-sort" name="' . $this->field['name'] . '[' . $x . '][sort]" id="' . $this->field['id'] . '-sort_' . $x . '" value="' . $icon_menu['sort'] . '" /></li>';

                    // Delete Button [button]
                    // echo '<li><a href="javascript:void(0);" class="button deletion pt-accordion-remove redux-icon_menu-remove">' . __('Delete Link', 'redux-framework') . '</a></li>';
                    echo '</ul></div></fieldset></div>';
                    $x++;

                }
            }

            // Add Button [button]
            // echo '</div><a href="javascript:void(0);" class="button redux-icon_menu-add button-primary pt-accordion-add" rel-id="' . $this->field['id'] . '-ul" rel-name="' . $this->field['name'] . '[title][]">' . __('New Icon Menu Link', 'redux-framework') . '</a><br/>';

            echo '</div>'; // End Accordion

            // Action Bar [section]
            echo '<div class="pt-accordion-action-bar">';

            // Add Button [button]
            echo '<a href="javascript:void(0);" class="button redux-icon_menu-add button-primary pt-accordion-add" rel-id="' . $this->field['id'] . '-ul" rel-name="' . $this->field['name'] . '[title][]"><i class="fa fa-plus"></i>' . __('New Icon Menu Link', 'redux-framework') . '</a>';

            // Remove All Button [button]
            echo '<a href="javascript:void(0);" class="button deletion pt-accordion-remove-all redux-icon_menu-remove-all"><i class="fa fa-eraser"></i>' . __('Delete All', 'redux-framework') . '</a>';

            echo '</div>'; // Action Bar

        }

        public function output() {

            for ($i = 0, $counter = count($this->value); $i < $counter; $i++) {

                $item = $this->value[$i];

                $smartCounter = $this->value[$i]['sort'] + 1;

                if( !empty($item['color']) ) {
                    $color = $item['color'];
                }
                else {
                    $color = '';
                }
                if( !empty($item['background']) ) {
                    $background = $item['background'];
                }
                else {
                    $background = '';
                }
                if( !empty($item['border']) ) {
                    $border = $item['border'];
                }
                else {
                    $border = '';
                }


                $style = 'color: '. $color .';background: '. $background .';border-color: '. $border .';';

                $fieldCss = array('.minigo .nav-social a:nth-child('.$smartCounter.')');

                $css = Redux_Functions::parseCSS( $fieldCss, $style, $color );
                $this->parent->outputCSS .= $css;
            }

            for ($x = 0, $counter = count($this->value); $x < $counter; $x++) {

                $item = $this->value[$x];

                $smartCounter = $this->value[$x]['sort'] + 1;

                if( !empty($item['color-hover']) ) {
                    $colorH = $item['color-hover'];
                }
                else {
                    $colorH = '';
                }
                if( !empty($item['background-hover']) ) {
                    $backgroundH = $item['background-hover'];
                }
                else {
                    $backgroundH = '';
                }
                if( !empty($item['border-color-hover']) ) {
                    $borderH = $item['border-color-hover'];
                }
                else {
                    $borderH = '';
                }

                $style = 'color: '. $colorH .';background: '. $backgroundH .';border-color: '. $borderH .';';


                $fieldCss = array('.minigo .nav-social a:hover:nth-child('.$smartCounter.')');

                $css = Redux_Functions::parseCSS( $fieldCss, $style, $colorH );
                $this->parent->outputCSS .= $css;
            }

        }

    }
}
