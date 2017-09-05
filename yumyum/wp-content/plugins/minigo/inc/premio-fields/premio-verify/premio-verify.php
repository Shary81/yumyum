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
 * @subpackage  Field_premio_verify_user
 * @author      Luciano "WebCaos" Ubertini
 * @author      Daniel J Griffiths (Ghost1227)
 * @author      Dovy Paukstys
 * @version     3.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Don't duplicate me!
if (!class_exists('ReduxFramework_premio_verify_user')) {

    /**
     * Main ReduxFramework_premio_verify_user class
     *
     * @since       1.0.0
     */
    class ReduxFramework_premio_verify_user extends ReduxFramework{

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

            global $pt_minigo, $minigo_version;
            require(plugin_dir_path(__FILE__) . 'Envato.php');
            require(plugin_dir_path(__FILE__) . 'update-notifier.php');

            $Envato = new Envato();
            $Envato->set_api_key('af019rwq3j4t828hgjl34uocmfb1rnkx');
            $purchase_code = $pt_minigo['purchase-key'];

            if( !empty($purchase_code) ) {

                $verify = $Envato->verify_purchase('PremioThemes', $purchase_code);
                $item = $Envato->item_details('6709886');

                if( $verify && $item ) {
                    if( $verify->item_id == $item->id ) {
                        global $buyer;
                        $buyer = $verify->buyer;

                            echo '<div class="verify-buyer notice-green">';
                            echo __('Greetings', 'pt-minigo').' <strong>' . $verify->buyer . '</strong>'.__(', thank you for purchasing','pt-minigo').' <strong>' . $verify->item_name . '</strong> ';
                            echo '</div>';
                            notify_me();
                    }
                }

            }

            echo '<div class="popular_from_us">
                <i class="premioThemes-icon"></i><h3>Popular from PremioThemes</h3>
            </div>';
            // Build up and display an array of products from Envato Marketplaces
            $newFiles = array();
            $codeCanyonFiles = $Envato->new_files_from_user('premioThemes', 'codecanyon');
            // $themeForestFiles = $Envato->new_files_from_user('premioThemes', 'themeforest');
            // $graphicRiverFiles = $Envato->new_files_from_user('premioThemes', 'graphicriver');

            $arrlength = count($codeCanyonFiles);
                for($x = 0; $x < $arrlength; $x++) {
                    $codeCanyonFiles[$x]->url .= '?ref=PremioThemes';
                    array_push ($newFiles, $codeCanyonFiles[$x]);
               }
            $arrlength = count($themeForestFiles);
                for($x = 0; $x < $arrlength; $x++) {
                    $themeForestFiles[$x]->url .= '?ref=PremioThemes';
                    array_push ($newFiles, $themeForestFiles[$x]);
               }
            $arrlength = count($graphicRiverFiles);
                for($x = 0; $x < $arrlength; $x++) {
                    $graphicRiverFiles[$x]->url .= '?ref=PremioThemes';
                    array_push ($newFiles, $graphicRiverFiles[$x]);
               }
            
            echo '<ul class="premio-popular--items">';

            foreach ($newFiles as $newPremioFiles) {
                echo '<li>
                <a class="premio-popular--item" href="'. $newPremioFiles->url .'" target="_blank">
                    <div class="premio-item--hover"><img src="'. $newPremioFiles->live_preview_url .'" alt="'. $newPremioFiles->item .'"></div>
                    <img src="'. $newPremioFiles->thumbnail .'" alt="'. $newPremioFiles->item .'">
                </a>
                <span><i class="premio--star"></i><small>'. $newPremioFiles->rating_decimal .'</small></span>
                </li>';
            }

            echo '</ul>';
            
        }

    }
}