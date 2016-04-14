jQuery(document).ready(function() {	
    
    addAlpha();
    megaDDClear();
});


function addAlpha() {
	
	    jQuery('.dropdown-menu section.menu-item:nth-child(3n+1)').addClass("alpha");

}


function megaDDClear() {

	if ( jQuery(window).width() < 767) {
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(2n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(2n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(2n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(2n)");
	}
	else if ( jQuery(window).width() < 960) {
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(3n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(3n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(3n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(3n)");
	}
	else {
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(1n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(2n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(3n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(4n)");
	}


jQuery(window).resize(function(){

	if ( jQuery(window).width() < 767) {
		jQuery('.dropdown-menu').find('.fluid').remove();
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(2n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(2n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(2n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(2n)");
	}
	else if ( jQuery(window).width() < 960) {
		jQuery('.dropdown-menu').find('.fluid').remove();
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(3n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(3n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(3n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(3n)");
	}
	else {
		jQuery('.dropdown-menu').find('.fluid').remove();
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(1n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(2n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(3n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(4n)");
	}

});

	
}
	jQuery("li.pull-right").removeClass("pull-right").find(".dropdown-menu:first").addClass("pull-right");