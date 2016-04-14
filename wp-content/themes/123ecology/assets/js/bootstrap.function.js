jQuery(".ttip").tooltip();

jQuery(".testimonial").carousel({interval: 10000, pause: "hover"})
jQuery(".testimonial").each(function(){
	jQuery(this).find('.item:first').addClass('active');
});