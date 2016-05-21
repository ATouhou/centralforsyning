<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');

    /* Theme Options
    ================================================== */
    $theme_color = get_option_tree('theme_color',$theme_options);
    $gradient_color = get_option_tree('gradient_color',$theme_options);

}
?>

<?php if($theme_color&&$gradient_color){?>
<style>
a,a:hover, a:focus,
.widget.widget_rss ul a:hover,
.widget.widget_pages ul a:hover,
.widget.widget_nav_menu ul a:hover,
.widget.widget_login ul a:hover,
.widget.widget_meta ul a:hover,
.widget.widget_categories ul a:hover,
.widget.widget_archive ul a:hover,
.widget.widget_recent_comments ul a:hover,
.widget.widget_recent_entries ul a:hover,
.widget.list .unstyled a:hover,
.woocommerce .woocommerce-breadcrumb a:hover,
.woocommerce-page .woocommerce-breadcrumb a:hover,
#breadcrumb a:hover,
.Breadcrumb a:hover,
.post .portfolio-item:hover h4.title a,
.nav-tabs .open .dropdown-toggle,
.nav-pills .open .dropdown-toggle,
.nav > li.dropdown.open.active > a:hover,
.nav-tabs > li > a:hover,
.nav > li.dropdown.open.active > a:focus,
.nav > li > a:focus,
.navbar .nav > li.selectedLava > a,
.navbar .nav > li > a:focus,
.navbar .nav > li > a:hover,
#header .navbar .nav li.dropdown.open > .dropdown-toggle,
#header .navbar .nav li.dropdown.active > .dropdown-toggle,
#header .navbar .nav li.dropdown.open.active > .dropdown-toggle,
#header .navbar .nav > .active > a,
#header .navbar .nav > .active > a:hover,
#header .navbar .nav > .active > a:focus,
.news-widget .Container .item:hover h5 a,
.skin-123ecology .reveal_container:hover .showbiz-title,
.skin-123ecology .reveal_container:hover .showbiz-title a,
.skin-123ecology .sb-showcase-skin:hover .showbiz-title,
.skin-123ecology .sb-showcase-skin:hover .showbiz-title a,
.menu-item div.item .price ins,
.menu-item div.item.portfolio-item-menu:hover h5,
.woocommerce ul.cart_list li ins, ul.product_list_widget li ins,
.woocommerce-page ul.cart_list li ins, ul.product_list_widget li ins,
ul.cart_list li ins, ul.product_list_widget li ins,
.widget_product_categories ul li a:hover{
	color: <?php echo $theme_color; ?>;
}
#footer a:hover,
#footer .woocommerce ul.cart_list li ins, #footer ul.product_list_widget li ins,
#footer .woocommerce-page ul.cart_list li ins, #footer ul.product_list_widget li ins,
#footer ul.cart_list li ins, #footer ul.product_list_widget li ins,
#footer .widget_product_categories ul li a:hover{
	color: <?php echo $gradient_color; ?>;
}
.dropcap1{
  background: <?php echo $theme_color; ?>;	
}
.callout-2 .content .selected,
.callout-1 .content .selected,
.callout .content .selected,
.woocommerce div.product span.price,
.woocommerce-page div.product span.price,
.woocommerce #content div.product span.price,
.woocommerce-page #content div.product span.price,
.woocommerce div.product p.price, .woocommerce-page div.product p.price,
.woocommerce #content div.product p.price,
.woocommerce-page #content div.product p.price,
.woocommerce ul.products li.product .price,
.woocommerce-page ul.products li.product .price,
.showbiz .txt-center .price,
.skin-123ecology .reveal_container .reveal_wrapper .price,
.skin-123ecology .sb-media-skin .reveal_container .reveal_wrapper .price{
	color: <?php echo $theme_color; ?> !important;
}
.dropdown-menu li > a:hover,
.dropdown-menu li > a:focus,
.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus,
.dropdown-submenu:hover > a,
.dropdown-submenu:focus > a {
  background-color: <?php echo $theme_color; ?>;
  background-image: -moz-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $gradient_color; ?>), to(<?php echo $theme_color; ?>));
  background-image: -webkit-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  background-image: -o-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  background-image: linear-gradient(to bottom, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffc7da1a', endColorstr='#ffaebe00', GradientType=0);
}
.dropdown-menu .active > a,
.dropdown-menu .active > a:hover,
.dropdown-menu .active > a:focus,
.dropdown-menu > .active > a,
.dropdown-menu > .active > a:hover,
.dropdown-menu > .active > a:focus {
	background-color: <?php echo $theme_color; ?>;
	background-image: -moz-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $gradient_color; ?>), to(<?php echo $theme_color; ?>));
	background-image: -webkit-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
	background-image: -o-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
	background-image: linear-gradient(to bottom, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffc7da1a', endColorstr='#ffaebe00', GradientType=0);
}
.btn-primary {
	background-color: <?php echo $theme_color; ?>;
	*background-color: <?php echo $theme_color; ?>;
	background-image: -moz-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $gradient_color; ?>), to(<?php echo $theme_color; ?>));
	background-image: -webkit-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
	background-image: -o-linear-gradient(top, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
	background-image: linear-gradient(to bottom, <?php echo $gradient_color; ?>, <?php echo $theme_color; ?>);
	background-repeat: repeat-x;
	border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffc7da1a', endColorstr='#ffaebe00', GradientType=0);
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
}
.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary.active,
.btn-primary.disabled,
.btn-primary[disabled] {
	background-color: <?php echo $theme_color; ?>;
	*background-color: <?php echo $theme_color; ?>;
}
.btn-primary:active,
.btn-primary.active {
	background-color: <?php echo $gradient_color; ?> \9;
}
.navbar li.backLava{
	border-top: 3px solid <?php echo $theme_color; ?>;
}
.option-set a:hover,
.tagcloud a:hover,
.tags a:hover,
#footer .tagcloud a:hover,
#footer .tags a:hover{
	background: <?php echo $gradient_color; ?>;
	border: 1px solid <?php echo $gradient_color; ?>;
}
.tabs-top > .nav-tabs .active,
.tabs-top > .nav-tabs .active:hover {
	border-left: 3px solid <?php echo $theme_color; ?> !important;
}
.heading-content .title{
	border-left-color: <?php echo $theme_color; ?>;
}
.product-item .effect-thumb .extras,
.portfolio-item .effect-thumb .extras{
	background: -moz-linear-gradient(left,  <?php echo $theme_color; ?> 0%, <?php echo $gradient_color; ?> 50%, <?php echo $theme_color; ?> 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right top, color-stop(0%,<?php echo $theme_color; ?>), color-stop(50%,<?php echo $gradient_color; ?>), color-stop(100%,<?php echo $theme_color; ?>)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(left,  <?php echo $theme_color; ?> 0%,<?php echo $gradient_color; ?> 50%,<?php echo $theme_color; ?> 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(left,  <?php echo $theme_color; ?> 0%,<?php echo $gradient_color; ?> 50%,<?php echo $theme_color; ?> 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(left,  <?php echo $theme_color; ?> 0%,<?php echo $gradient_color; ?> 50%,<?php echo $theme_color; ?> 100%); /* IE10+ */
	background: linear-gradient(to right,  <?php echo $theme_color; ?> 0%,<?php echo $gradient_color; ?> 50%,<?php echo $theme_color; ?> 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $theme_color; ?>', endColorstr='<?php echo $theme_color; ?>',GradientType=1 ); /* IE6-8 */
}
.nav .dropdown-toggle:hover .caret,
.nav .dropdown-toggle:focus .caret,
.nav li.dropdown.open .caret,
.nav li.dropdown.open.active .caret,
.nav li.dropdown.open a:hover .caret,
.nav li.dropdown.open a:focus .caret{
	border-top-color: <?php echo $theme_color; ?>;
	border-bottom-color: <?php echo $theme_color; ?>;
}

.header_icon.icon_64 span.icon-bg,
.header_icon.icon_32 span.icon-bg{
	background: <?php echo $theme_color; ?>; /* Old browsers */
	background: -moz-linear-gradient(top,  <?php echo $theme_color; ?> 0%, <?php echo $gradient_color; ?> 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $theme_color; ?>), color-stop(100%,<?php echo $gradient_color; ?>)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  <?php echo $theme_color; ?> 0%,<?php echo $gradient_color; ?> 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  <?php echo $theme_color; ?> 0%,<?php echo $gradient_color; ?> 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  <?php echo $theme_color; ?> 0%,<?php echo $gradient_color; ?> 100%); /* IE10+ */
	background: linear-gradient(to bottom,  <?php echo $theme_color; ?> 0%,<?php echo $gradient_color; ?> 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $theme_color; ?>', endColorstr='<?php echo $gradient_color; ?>',GradientType=0 ); /* IE6-8 */
	border: 1px solid <?php echo $theme_color; ?>;
}
.callout,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a,
div.product .woocommerce_tabs ul.tabs li.active a,
#content div.product .woocommerce_tabs ul.tabs li.active a{
	border-left: 3px solid <?php echo $theme_color; ?>; 
}
a.thumbnail:hover,
a.thumbnail:focus {
	border-color: <?php echo $theme_color; ?>;
}
.header-cart.open{
	border-top: 3px solid <?php echo $theme_color; ?>;	
}
.dg-add-content-wrap {
	background: <?php echo $theme_color; ?> !important;
}
</style>
<?php }?>