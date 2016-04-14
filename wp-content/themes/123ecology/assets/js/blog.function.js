/*global $:false, jQuery:false */
jQuery(document).ready(function() {
	"use strict";	
    commentButton();
    tag_cloud();
});
function commentButton() {
	"use strict";
	jQuery("#searchform #searchsubmit").addClass("btn");
	jQuery(".sidebar #searchform #searchsubmit").addClass("btn-primary");
	jQuery("#footer #searchform #searchsubmit").addClass("btn-footer");
    jQuery('.widget_product_search').children().children('div').addClass("input-append");
    jQuery('.widget_product_search #s').addClass("span8");
    jQuery('.widget_search').children().children('div').addClass("input-append");
    jQuery('.widget_search #s').addClass("span8");
    jQuery('.widget_layered_nav #dropdown_layered_nav_black').addClass("span12");
    jQuery('.widget_login #user_login').addClass("span12");
    jQuery('.widget_login #user_pass').addClass("span12");
	jQuery(".form-submit #submit").addClass("btn");
	jQuery(".sidebar .form-submit #submit").addClass("btn-primary");
	jQuery(".wpcf7 .wpcf7-submit").addClass("btn-primary").addClass("btn");
	jQuery("#footer .form-submit #submit").addClass("btn-footer");
	jQuery(".blog .post:last").css({borderBottom: 'none'});
	jQuery(".blog .post:first").css({borderTop: 'none', paddingTop: 0});
	jQuery(".archive .post:last").css({borderTop: 'none', paddingTop: 0});
	jQuery(".archive .post:first").css({borderTop: 'none', paddingTop: 0});
}
function tag_cloud(){
	"use strict";
    jQuery('.tagcloud a').prepend('&rarr; ');
}