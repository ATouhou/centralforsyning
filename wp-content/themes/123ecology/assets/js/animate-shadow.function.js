jQuery(document).ready(function() {	
    animateShadow();
});

function animateShadow(){
    
    jQuery('.blog-thumbnail').mouseenter(function() {
        jQuery(this).find('.Thumbnail').stop(true,true).animate({boxShadow: '0 0 10px rgba(0, 0, 0, 0.2)'}, 200);
    
    }).mouseleave(function(){
        jQuery(this).find('.Thumbnail').stop(true,true).animate({boxShadow: '0 0 0 rgba(0, 0, 0, 0.2)'}, 200);
    });
    
    jQuery('.mini-post').mouseenter(function() {
        jQuery(this).stop(true,true).animate({boxShadow: '0 0 10px rgba(0, 0, 0, 0.2)'}, 200);
    
    }).mouseleave(function(){
        jQuery(this).stop(true,true).animate({boxShadow: '0 0 10px 0 rgba(0, 0, 0, 0.05)'}, 200);
    });
    
    jQuery('.portfolio-thumbnail').mouseenter(function() {
        jQuery(this).stop(true,true).animate({boxShadow: '0 0 10px rgba(0, 0, 0, 0.2)'}, 200);
    
    }).mouseleave(function(){
        jQuery(this).stop(true,true).animate({boxShadow: '0 0 10px 0 rgba(0, 0, 0, 0.05)'}, 200);
    });
    
    jQuery('.portfolio-item').mouseenter(function() {
        jQuery(this).stop(true,true).animate({boxShadow: '0 0 10px rgba(0, 0, 0, 0.2)'}, 200);
    
    }).mouseleave(function(){
        jQuery(this).stop(true,true).animate({boxShadow: '0 0 10px 0 rgba(0, 0, 0, 0.05)'}, 200);
    });
    
    jQuery('.about-post .member').mouseenter(function() {
        jQuery(this).stop(true,true).animate({boxShadow: '0 0 10px rgba(0, 0, 0, 0.2)'}, 200);
    
    }).mouseleave(function(){
        jQuery(this).stop(true,true).animate({boxShadow: '0 0 10px 0 rgba(0, 0, 0, 0.05)'}, 200);
    });
    
    jQuery('.item .effect-thumb').mouseenter(function() {
        jQuery(this).find('.sd_Thumbnail').stop(true,true).animate({boxShadow: '0 0 5px rgba(0, 0, 0, 0.2)'}, 200);
    
    }).mouseleave(function(){
        jQuery(this).find('.sd_Thumbnail').stop(true,true).animate({boxShadow: '0 0 0 rgba(0, 0, 0, 0.2)'}, 200);
    });
    
    jQuery('.dropdown-menu .item .img-wrap').mouseenter(function() {
        jQuery(this).stop(true,true).animate({boxShadow: '0 0 10px rgba(0, 0, 0, 0.2)'}, 200);
    
    }).mouseleave(function(){
        jQuery(this).stop(true,true).animate({boxShadow: '0 0 10px 0 rgba(0, 0, 0, 0.05)'}, 200);
    });

}