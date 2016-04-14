/*global jQuery:false*/

jQuery(document).ready( function(){
	"use strict";
	jQuery(".newsticker").css("visibility", "hidden");
    var to=setTimeout("showNewsticker()",500);        
});

function showNewsticker(){
	"use strict";
    jQuery(".newsticker").css("visibility", "visible");
}