/*global $:false, jQuery:false */

jQuery(document).ready(function() {
	"use strict";	
    portfolio();
});

function portfolio() {

"use strict";
jQuery(".portfolio-2 .element:nth-child(2n+1)").addClass('alpha').css({"margin-left":"0"});
jQuery(".portfolio-3 .element:nth-child(3n+1)").addClass('alpha').css({"margin-left":"0"});
jQuery(".portfolio-4 .element:nth-child(4n+1)").addClass('alpha').css({"margin-left":"0"});
jQuery(".columns-2 .one-column:nth-child(2n+1)").addClass('alpha').css({"margin-left":"0"});
jQuery(".columns-3 .one-column:nth-child(3n+1)").addClass('alpha').css({"margin-left":"0"});
jQuery(".columns-4 .one-column:nth-child(4n+1)").addClass('alpha').css({"margin-left":"0"});

}