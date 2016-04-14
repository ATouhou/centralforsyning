/*global jQuery:false */

jQuery(document).ready(function(){    
"use strict";
// contact form 7 plugin
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

// comment form
// clear input on focus
jQuery('#commentform input').focus(function(){
if(jQuery(this).val()===this.defaultValue){
jQuery(this).val('');
}
});

// if field is empty afterward, add text again
jQuery('#commentform input').blur(function(){
if(jQuery(this).val()===''){
jQuery(this).val(this.defaultValue);
}
});

// clear input on focus
jQuery('#commentform textarea').focus(function(){
if(jQuery(this).val()===this.defaultValue){
jQuery(this).val('');
}
});

// if field is empty afterward, add text again
jQuery('#commentform textarea').blur(function(){
if(jQuery(this).val()===''){
jQuery(this).val(this.defaultValue);
}
});

// clear input on focus
jQuery('.form-search input').focus(function(){
	if(jQuery(this).val()===this.defaultValue){
		jQuery(this).val('');
	}
});

// if field is empty afterward, add text again
jQuery('.form-search input').blur(function(){
	if(jQuery(this).val()===''){
		jQuery(this).val(this.defaultValue);
	}
}); 

    
});