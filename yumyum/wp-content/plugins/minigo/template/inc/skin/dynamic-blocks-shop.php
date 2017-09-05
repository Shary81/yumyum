
<?php if ($pt_minigo['shop-brand-color']['color'] || $pt_minigo['shop-bg-color']['color']) {

	// HEX to RGB convertor to extract color rgb for rgba values.
	function hex2rgb($color, $opacity = false) {
	 
		$default = '0,0,0';
	 
		//Return default if no color provided
		if(empty($color))
	          return $default; 
	 
		//Sanitize $color if "#" is provided 
	        if ($color[0] == '#' ) {
	        	$color = substr( $color, 1 );
	        }
	 
	        //Check if color has 6 or 3 characters and get values
	        if (strlen($color) == 6) {
	                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	        } elseif ( strlen( $color ) == 3 ) {
	                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	        } else {
	                return $default;
	        }
	 
	        //Convert hexadec to rgb
	        $rgb =  array_map('hexdec', $hex);
	 
	        //Check if opacity is set(rgba or rgb)
	        if($opacity){
	        	if(abs($opacity) > 1)
	        		$opacity = 1.0;
	        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	        } else {
	        	// $output = 'rgb('.implode(",",$rgb).')';
	        	$output = implode(",",$rgb);
	        }
	 
	        //Return rgb(a) color string
	        return $output;
	}


	$brandColor = $pt_minigo['shop-brand-color']['color'];
	$bgColor = $pt_minigo['shop-bg-color']['color'];

	$bgColorRGB = hex2rgb($pt_minigo['shop-bg-color']['color']);
	$brandColorRGB = hex2rgb($pt_minigo['shop-brand-color']['color']);


 ?>

/* [Shop] */

/* General */

.minigo .ecwid {
<?php if( $pt_minigo['base-typo']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['base-typo']['font-family'] ?> !important;
<?php } ?>
    color: <?php echo $brandColor ;?> !important;
}

.minigo .ecwid .ecwid-btn {
<?php if( $pt_minigo['base-typo']['font-family'] ) { ?>
    font-family: <?php echo $pt_minigo['base-typo']['font-family'] ?> !important;
<?php } ?>
}


/* Color */

.minigo .ecwid .ecwid-note,
.minigo #cart-id .ecwid-minicart-label-text,
.minigo .ecwid .ecwid-productBrowser-cart-hint,
.minigo .ecwid .ecwid-productBrowser-details-rightPanel .ecwid-productBrowser-backgroundedPanel .ecwid-productBrowser-nav-left,
.minigo .ecwid .ecwid-productBrowser-details-rightPanel .ecwid-productBrowser-backgroundedPanel .ecwid-productBrowser-nav-right {
    color: <?php echo $brandColor ;?>, 0.5 !important;
}

.minigo .ecwid .ecwid-Checkout-BreadCrumbs-link.ecwid-Checkout-BreadCrumbs-link-visited {
    color: rgba(<?php echo $brandColorRGB ;?>, 0.75) !important;
}

.minigo .ecwid-popup .ecwid-popup-headLabel,
.minigo #cart-id .gwt-InlineLabel,
.minigo #cart-id .ecwid-minicart-caption,
.minigo .ecwid .ecwid-OrdersList-OrderBox .ecwid-OrdersList-OrderBox-header,
.minigo .ecwid .ecwid-OrdersList-OrderBox .ecwid-OrdersList-OrderBox-header span,
.minigo .ecwid .ecwid-Checkout-BreadCrumbs-link,
.minigo .ecwid .ecwid-Checkout-BreadCrumbs-link.ecwid-Checkout-BreadCrumbs-link-visited:hover,
.minigo .ecwid .ecwid-productBrowser-head,
.minigo .ecwid .ecwid-productBrowser-price-value,
.minigo .ecwid .ecwid-productBrowser-categoryPath,
.minigo .ecwid .ecwid-results-topPanel div,
.minigo .ecwid .ecwid-btn,
.minigo .ecwid .gwt-InlineLabel,
.minigo .ecwid a,
.minigo .ecwid .ecwid-productBrowser-auth-mini .ecwid-ProductBrowser-auth-anonim::before,
.minigo .ecwid .ecwid-productBrowser-sku,
.minigo .ecwid .ecwid-productBrowser-details-inStockLabel,
.minigo .ecwid .ecwid-productBrowser-price,
.minigo .ecwid .ecwid-fieldLabel,
.minigo .ecwid .ecwid-productBrowser-details-qtyLabel,
.minigo .ecwid .ecwid-Checkout-blockTitle,
.minigo .ecwid .ecwid-Checkout-PasswordBlock-tip,
.minigo .ecwid .ecwid-Invoice-block,
.minigo .ecwid .ecwid-Invoice-Summary-label,
.minigo .ecwid .ecwid-Invoice-Summary-value,
.minigo .ecwid .ecwid-Invoice-optionsList-name,
.minigo .ecwid .ecwid-Invoice-optionsList-value,
.minigo .ecwid .ecwid-Invoice-itemsTable-headerCell,
.minigo .ecwid .ecwid-Invoice-blockTitle,
.minigo .ecwid .ecwid-Invoice-Header-OrderStatus,
.minigo .ecwid .ecwid-Invoice-Header-OrderNumber,
.minigo .ecwid .ecwid-Invoice-Header-OrderNumber span,
.minigo .ecwid .ecwid-Invoice-Header-OrderStatus,
.minigo .ecwid .ecwid-Invoice-Header-OrderStatus-status,
.minigo .ecwid .ecwid-Invoice-Header-timestamp,
.minigo .ecwid .ecwid-Invoice-qtyLabel,
.minigo .ecwid .ecwid-Invoice-footer-orderConfirmation-text,
.minigo .ecwid .ecwid-categories-category,
.minigo .ecwid .ecwid-OrdersList-OrderBox-options-name,
.minigo .ecwid .ecwid-OrdersList-OrderBox-options-value,
.minigo .ecwid .ecwid-OrdersList-OrderBox-itemprice,
.minigo .ecwid .ecwid-OrdersList-OrderBox-itemsubtotal,
.minigo .ecwid .ecwid-OrdersList-OrderBox-status span,
.minigo .ecwid .ecwid-OrdersList-OrderBox-status,
.minigo .ecwid .ecwid-OrdersList-OrderBox-totals-price,
.minigo .ecwid .ecwid-OrdersList-OrderBox-totals-title,
.minigo .ecwid .ecwid-AddressBook-itemDescription,
.minigo .ecwid .ecwid-productBrowser-cart-itemsTable-headerCell,
.minigo .ecwid .ecwid-productBrowser-cart .ecwid-productBrowser-cart-totalLabel,
.minigo .ecwid .ecwid-productBrowser-cart .ecwid-productBrowser-cart-totalAmount,
.minigo .ecwid .ecwid-productBrowser-cart .ecwid-productBrowser-cart-subtotalLabel,
.minigo .ecwid .ecwid-productBrowser-cart .ecwid-productBrowser-cart-subtotalAmount,
.minigo .ecwid .ecwid-productBrowser-cart .ecwid-productBrowser-cart-optionsList-name,
.minigo .ecwid .ecwid-productBrowser-cart .ecwid-productBrowser-cart-optionsList-value,
.minigo .ecwid .ecwid-productBrowser-details-qtyTextField,
.minigo .ecwid .ecwid-productBrowser-cart-qtyTextField,
.minigo .ecwid .gwt-TextBox,
.minigo .ecwid .gwt-PasswordTextBox,
.minigo .ecwid .ecwid-results-topPanel div .ecwid-results-topPanel-sortByPanel .gwt-ListBox,
.minigo .ecwid .ecwid-AddressBook-block .ecwid-AddressBook-addButton,
.minigo .ecwid .ecwid-AddressBook-block,
.minigo .ecwid .ecwid-DateRangeBox .ecwid-DateRangeBox-range,
.minigo .ecwid .gwt-RadioButton,
.minigo .ecwid .ecwid-productBrowser-details-inTheBag,
.minigo .ecwid-OrdersList-OrderBox-sku,
.minigo .ecwid-OrdersList-OrderBox-cell,
.minigo .ecwid-productBrowser-cart-hint,
.minigo .ecwid-note,
.minigo .ecwid-productBrowser-productsTable-addToBagLink,
.minigo .ecwid-productBrowser-productsList-descr {
    color: <?php echo $brandColor ;?> !important;
}

/* Background */

.minigo #cart-id:hover,
.minigo #cart-id:active {
    background: rgba(<?php echo $bgColorRGB ;?>, 0.9) !important;
}

.minigo .ecwid .ecwid-results-topPanel div .ecwid-results-topPanel-sortByPanel .gwt-ListBox {
    background: <?php echo $bgColor ;?> !important;
}
.minigo .ecwid .gwt-TextBox:hover,
.minigo .ecwid .gwt-PasswordTextBox:hover,
.minigo .ecwid .ecwid-productBrowser-cart-itemsTable-cell-selected,
.minigo .ecwid .ecwid-Invoice-cell-title,
.minigo .ecwid .ecwid-AddressBook-block {
    background: rgba(<?php echo $bgColorRGB ;?>, 0.1) !important;
}

.minigo .ecwid .gwt-TextBox:active,
.minigo .ecwid .gwt-PasswordTextBox:active,
.minigo .ecwid .ecwid-btn:hover {
    background: rgba(<?php echo $bgColorRGB ;?>, 0.15) !important;
}

.minigo .ecwid .ecwid-img::after {
    background: rgba(<?php echo $bgColorRGB ;?>, 0.25) !important;
}

.minigo #cart-id {
    background: rgba(<?php echo $bgColorRGB ;?>, 0.75) !important;
}

.minigo .ecwid-popup .popupContent {
    background: rgba(<?php echo $bgColorRGB ;?>, 0.9) !important;
}

.minigo .ecwid .ecwid-AddressBook-block .ecwid-AddressBook-addButton {
    background: rgba(<?php echo $brandColorRGB ;?>, 0.1) !important;
}


/* Background-Color */

.minigo .ecwid .ecwid-productBrowser-cart .ecwid-productBrowser-cart-removeItemButton,
.minigo .ecwid .ecwid-DateRangeBox .ecwid-DateRangeBox-icon, {
    background-color: <?php echo $bgColor ;?> !important;
}

.minigo .ecwid-DateRangePopup,
.minigo .ecwid .ecwid-DateRangeBox .ecwid-DateRangeBox-range {
    background-color: rgba(<?php echo $bgColorRGB ;?>, 0.75) !important;
}


.minigo .ecwid .ecwid-Checkout-BreadCrumbs-section.ecwid-Checkout-BreadCrumbs-section-visited,
.minigo .ecwid-popup .ecwid-popup-closeButton {
    background-color: <?php echo $brandColor ;?> !important;
}

.minigo .ecwid-popup.ecwid-EditPersonPopup,
.minigo .ecwid-productBrowser-auth::before {
    background-color: rgba(<?php echo $brandColorRGB ;?>, 0.15) !important;
}

.minigo .ecwid .ecwid-Checkout-BreadCrumbs-section,
.minigo .ecwid a::before,
.minigo .ecwid .ecwid-results-topPanel div .ecwid-results-topPanel-viewAsPanel-link::before {
    background-color: rgba(<?php echo $brandColorRGB ;?>, 0.25) !important;
}

.minigo .ecwid .ecwid-Checkout-BreadCrumbs-point::after {
    background-color: rgba(<?php echo $brandColorRGB ;?>, 0.5) !important;
}

.minigo .ecwid .ecwid-Checkout-BreadCrumbs-point.ecwid-Checkout-BreadCrumbs-point-visited::after,
.minigo .ecwid a:hover::before,
.minigo .ecwid .ecwid-results-topPanel div .ecwid-results-topPanel-viewAsPanel-link:hover::before {
    background-color: rgba(<?php echo $brandColorRGB ;?>, 0.75) !important;
}

/* Border Color */

.minigo .ecwid .ecwid-Checkout-BreadCrumbs-point.ecwid-Checkout-BreadCrumbs-point-visited,
.minigo .ecwid .gwt-TextBox:active,
.minigo .ecwid .gwt-PasswordTextBox:active,
.minigo .ecwid .ecwid-AddressBook-block .ecwid-AddressBook-addButton:hover,
.minigo .ecwid button.ecwid-btn:hover,
.minigo .ecwid .ecwid-AddressBook-block .ecwid-AddressBook-addButton:hover {
    border-color: <?php echo $brandColor ;?> !important;
}

.minigo .ecwid .ecwid-productBrowser-cart-itemsTable-cell,
.minigo .ecwid .ecwid-img::after,
.minigo .ecwid .ecwid-img::after,
.minigo .ecwid-popup .popupContent  {
    border-color: rgba(<?php echo $brandColorRGB ;?>, 0.1) !important;
}

.minigo .ecwid .ecwid-Invoice-cell-title,
.minigo .ecwid-productBrowser-productsTable-cell {
    border-color: rgba(<?php echo $brandColorRGB ;?>, 0.15) !important;
}
.minigo .ecwid .ecwid-productBrowser-details-qtyTextField,
.minigo .ecwid .ecwid-productBrowser-cart-qtyTextField,
.minigo .ecwid .ecwid-productBrowser-cart .ecwid-productBrowser-cart-itemsTable-headerCell,
.minigo .ecwid .ecwid-Checkout-BreadCrumbs-link.ecwid-Checkout-BreadCrumbs-link-current,
.minigo .ecwid .ecwid-Invoice,
.minigo .ecwid .ecwid-OrdersList-OrderBox-cell,
.minigo .ecwid .ecwid-DateRangeBox,
.minigo .ecwid .ecwid-productBrowser-cart-itemsTable-cell-selected,
.minigo .ecwid .ecwid-AddressBook-block {
    border-color: rgba(<?php echo $brandColorRGB ;?>, 0.25) !important;
}

.minigo .ecwid .gwt-TextBox,
.minigo .ecwid .gwt-PasswordTextBox,
.minigo .ecwid .ecwid-AddressBook-block .ecwid-AddressBook-addButton,
.minigo .ecwid .ecwid-Checkout-BreadCrumbs-point,
.minigo .ecwid .ecwid-productBrowser-productsGrid-hover .ecwid-img::after,
.minigo .ecwid .ecwid-AddressBook-block .ecwid-AddressBook-addButton,
.minigo #cart-id,
.minigo .ecwid .ecwid-btn,
.minigo .ecwid .ecwid-btn.ecwid-btn--secondary
 {
    border-color: rgba(<?php echo $brandColorRGB ;?>, 0.5) !important;
}

.minigo .ecwid .gwt-TextBox:hover,
.minigo .ecwid .gwt-PasswordTextBox:hover {
    border-color: rgba(<?php echo $brandColorRGB ;?>, 0.75) !important;
}

.minigo #cart-id .ecwid-minicart-label-text {
    color: rgba(<?php echo $brandColorRGB ;?>, 0.75) !important;
}

.minigo #cart-id {
    border-color: rgba(<?php echo $brandColorRGB ;?>, 0.15) !important; 
}

.minigo #cart-id:hover,
.minigo #cart-id:active {
        background-color: rgba(<?php echo $bgColorRGB ;?>, 0.9) !important;
        border-color: rgba(<?php echo $brandColorRGB ;?>, 0.15) !important;
}

.minigo .ecwid .gwt-RadioButton {
    color: <?php echo $brandColor ;?> !important;
}

/* Buttons Hover */
.minigo .ecwid button.ecwid-btn:hover {
    border-color: <?php echo $brandColor ;?> !important;
}

.minigo .ecwid .ecwid-img img {
        border-color: rgba(<?php echo $bgColorRGB ;?>, 0.5) !important;
}


<?php } // End If ?>