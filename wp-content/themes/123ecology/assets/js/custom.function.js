/*global $:false, jQuery:false */
jQuery(document).ready(function() {
	"use strict";		
    calloutButton();
    callout1Button();
    callout2Button();
    calloutMailchimp();
    callout1Mailchimp();
    callout2Mailchimp();
    cart_list();
    inputFocus();
    shopThumbnail();
	wp_gallery();
	productCategoryWidget();
});

function calloutButton() { 
	"use strict";
    jQuery(".callout").each(function() {
    
    var moduleHeight = jQuery(this).find('.button').prev('.content').outerHeight();
    var bnHeight = jQuery(this).find('.button .btn').outerHeight();
    var Height = moduleHeight-bnHeight;
    
    jQuery(this).find(".button").css({height: moduleHeight, paddingTop: Height/2});
	
	});

}
function callout1Button() { 
	"use strict";
    jQuery(".callout-1").each(function() {
    
    var moduleHeight = jQuery(this).find('.button').prev('.content').height();
    var bnHeight = jQuery(this).find('.button .btn').outerHeight();
    var Height = moduleHeight-20-bnHeight;
    
    jQuery(this).find(".button").css({height: moduleHeight-20, paddingTop: Height/2});
	
	});

}
function callout2Button() {
	"use strict";
    jQuery(".callout-2").each(function() {
    
    var moduleHeight = jQuery(this).find('.button').prev('.content').height();
    var bnHeight = jQuery(this).find('.button .btn').outerHeight();
    var Height = moduleHeight-bnHeight;
    
    jQuery(this).find(".button").css({height: moduleHeight, paddingTop: Height/2});
	
	});

}
function calloutMailchimp() { 
	"use strict";
    jQuery(".callout").each(function() {
    
    var moduleHeight = jQuery(this).find('.newsletter').prev('.content').outerHeight();
    var bnHeight = jQuery(this).find('.newsletter .pmc_mailchimp').outerHeight();
    var Height = moduleHeight-bnHeight;
    
    jQuery(this).find(".newsletter").css({height: moduleHeight, paddingTop: Height/2+5});
	
	});

}
function callout1Mailchimp() { 
	"use strict";
    jQuery(".callout-1").each(function() {
    
    var moduleHeight = jQuery(this).find('.newsletter').prev('.content').height();
    var bnHeight = jQuery(this).find('.newsletter .pmc_mailchimp').outerHeight();
    var Height = moduleHeight-20-bnHeight;
    
    jQuery(this).find(".newsletter").css({height: moduleHeight-20, paddingTop: Height/2+5});
	
	});

}
function callout2Mailchimp() {
	"use strict";
    jQuery(".callout-2").each(function() {
    
    var moduleHeight = jQuery(this).find('.newsletter').prev('.content').height();
    var bnHeight = jQuery(this).find('.newsletter .pmc_mailchimp').outerHeight();
    var Height = moduleHeight-bnHeight;
    
    if(moduleHeight < bnHeight){
	jQuery(this).find(".newsletter").addClass('test').css({paddingTop: 10}); 
    }else{
	jQuery(this).find(".newsletter").css({height: moduleHeight, paddingTop: Height/2+5});  
    }

	});

}
function cart_list() {
	"use strict";
	jQuery(".cart_list li").each(function() {
		jQuery(this).find(".variation").next().andSelf().wrapAll('<div class="meta-wrap" />');
	});
}
function inputFocus() {
	"use strict";
	// clear input on focus
	jQuery('.wpcf7-text').focus(function(){
		if(jQuery(this).val()===this.defaultValue){
			jQuery(this).val('');
		}
	});
	
	// if field is empty afterward, add text again
	jQuery('.wpcf7-text').blur(function(){
		if(jQuery(this).val()===''){
			jQuery(this).val(this.defaultValue);
		}
	});
	// clear input on focus
	jQuery('.form-456 .form-search input').focus(function(){
		if(jQuery(this).val()===this.defaultValue){
			jQuery(this).val('');
		}
	});
	
	// if field is empty afterward, add text again
	jQuery('.form-456 .form-search input').blur(function(){
		if(jQuery(this).val()===''){
			jQuery(this).val(this.defaultValue);
		}
	});
}
function shopThumbnail() {
	"use strict";
    jQuery('<div class="clearfix"></div>').insertAfter(".thumbnails .zoom:nth-child(4n)");
}
function wp_gallery() {
	"use strict";
    jQuery(".gallery-item .gallery-icon a").each(function() {
    
	jQuery(this).addClass("thumbnail");
	
	});
}

function productCategoryWidget() {
	"use strict";
    jQuery('.widget_product_categories ul ul').hide().click(function(e) {
        e.stopPropagation();
    });
 
    jQuery('.widget_product_categories ul > li > ul.children').before('<span class="toggle">[+]</span>');
 
    var current_cat = jQuery('.widget_product_categories ul > li.current-cat, .widget_product_categories ul > li.current-cat-parent');
    
    current_cat.children('.toggle').html("[-]");
    current_cat.children('ul').slideDown().addClass('opened');
    
    
    jQuery('.widget_product_categories ul > li > ul.children').each(function() {
        jQuery(this).parent().children('.toggle').toggle(function() {
			if(jQuery(this).parent().children('ul').hasClass('opened')){
			jQuery(this).html("[+]");
			jQuery(this).parent().children('ul').slideUp();
			jQuery(this).parent().children('ul').removeClass('opened').addClass('closed');
			}else{
			jQuery(this).html("[-]");
			jQuery(this).parent().children('ul').slideDown();
			jQuery(this).parent().children('ul').removeClass('closed').addClass('opened');
			}
        }, function() {
			if(jQuery(this).parent().children('ul').hasClass('closed')){
			jQuery(this).html("[-]");
			jQuery(this).parent().children('ul').slideDown();
			jQuery(this).parent().children('ul').removeClass('closed').addClass('opened');
			}else{
			jQuery(this).html("[+]");
			jQuery(this).parent().children('ul').slideUp();
			jQuery(this).parent().children('ul').removeClass('opened').addClass('closed');
		}
        });    
    });
}