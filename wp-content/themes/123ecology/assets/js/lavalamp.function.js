/*global jQuery:false */

jQuery(function() {
"use strict";
if ( jQuery(window).width() > 960) {
    jQuery( '.menu-item-language' ).addClass( 'noLava' );
    jQuery( '.current-menu-item, .current_page_item, .current-page-ancestor, .current-menu-parent, .current_page_item, .current_page_parent, .current_page_ancestor' ).addClass( 'selectedLava' );
    jQuery('.navbar .nav').lavaLamp(); 
}
});