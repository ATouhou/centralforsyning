jQuery(document).ready(function($) {
 
$(window).load(function() {
if (window.innerWidth > 1024) {
$('.product-item .imagewrapper').equalHeights();
$('.product-item').equalHeights();
}
});
 
$(window).resize(function(){
if (window.innerWidth > 1024) {
$('.product-item .imagewrapper').height('auto');
$('.product-item').equalHeights();
$('.product-item .imagewrapper').height('auto');
$('.product-item').equalHeights();
}
});
 
}); 