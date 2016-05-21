<?php
/*
Plugin Name: Page/Post Content Shortcode
Plugin URI: http://wordpress.org/extend/plugins/pagepost-content-shortcode/
Description: Adds content from another page/post using a shortcode.

Installation:

1) Install WordPress 4.1 or higher

2) Download the latest from:

http://wordpress.org/extend/plugins/pagepost-content-shortcode

3) Login to WordPress admin, click on Plugins / Add New / Upload, then upload the zip file you just downloaded.

4) Activate the plugin.

Version: 1.0
Author: TheOnlineHero - Tom Skroza
License: GPL2
*/

add_shortcode( 'page-content-sc', 'page_content_shortcode' );
function page_content_shortcode($atts) {
	$thispage = get_page($atts["id"]);
	return do_shortcode( $thispage->post_content );
}
add_shortcode( 'post-content-sc', 'post_content_shortcode' );
function post_content_shortcode($atts) {
	$thispost = get_post($atts["id"]);
	return do_shortcode( $thispost->post_content );
}