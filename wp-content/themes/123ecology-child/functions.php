<?php

global $woocommerce;

add_theme_support('woocommerce');

/**

 * Optional: set 'ot_show_pages' filter to false.

 * This will hide the settings & documentation pages.

 */

add_filter( 'ot_show_pages', '__return_false' );



/**

 * Required: set 'ot_theme_mode' filter to true.

 */

add_filter( 'ot_theme_mode', '__return_true' );



/**

 * Required: include OptionTree.

 */

//include_once( 'option-tree/ot-loader.php' );
include_once dirname(__FILE__) . '/option-tree/ot-loader.php';

/**

 * Theme Options

 */

//include_once( 'option-tree/theme-options.php' );
include_once dirname(__FILE__) . '/option-tree/theme-options.php';

/* URI shortcuts

================================================== */

define( 'THEME_ASSETS_CHILD', get_bloginfo('url') . '/wp-content/themes/123ecology-child/assets/', true );

define( 'GETTEXT_DOMAIN_CHILD', '123ecology-child' );



/* Localization

================================================== */

add_action('after_setup_theme', 'my_theme_setup_child');

function my_theme_setup_child(){

   load_child_theme_textdomain( GETTEXT_DOMAIN_CHILD,  get_stylesheet_directory_uri() . '/languages');
//load_child_theme_textdomain( '123ecology-child', get_stylesheet_directory_uri() . '/languages' );
}



require_once dirname( __FILE__ ) . '/functions/class-tgm-plugin-activation.php';



add_action( 'tgmpa_register', 'my_theme_register_required_plugins_child' );



function my_theme_register_required_plugins_child() {



	$plugins = array(



		array(

			'name'     				=> 'Contact Form 7 v3.7.1', // The plugin name

			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)

			'source'   				=> 'http://downloads.wordpress.org/plugin/contact-form-7.3.7.1.zip', // The plugin source

			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required

			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL

		),

		

		array(

			'name'     				=> 'Dynamic Grid: Photo Gallery v1.1.2', // The plugin name

			'slug'     				=> 'dynamic-grid-gallery', // The plugin slug (typically the folder name)

			'source'   				=> get_stylesheet_directory() . '/plugins/dynamic-grid-gallery.zip', // The plugin source

			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required

			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL

		),

		

		array(

			'name'     				=> 'jNewsticker v1.1.11', // The plugin name

			'slug'     				=> 'jnewsticker-for-wordpress', // The plugin slug (typically the folder name)

			'source'   				=> get_stylesheet_directory() . '/plugins/jnewsticker-for-wordpress.zip', // The plugin source

			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required

			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL

		),

		

		array(

			'name'     				=> 'Layerslider v4.6.5', // The plugin name

			'slug'     				=> 'LayerSlider', // The plugin slug (typically the folder name)

			'source'   				=> get_stylesheet_directory() . '/plugins/LayerSlider.zip', // The plugin source

			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required

			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL

		)



	);



	$theme_text_domain = '123ecology-child';



	$config = array(

		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.

		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins

		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug

		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug

		'menu'         		=> 'install-required-plugins', 	// Menu slug

		'has_notices'      	=> true,                       	// Show admin notices or not

		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not

		'message' 			=> '',							// Message to output right before the plugins table

		'strings'      		=> array(

			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),

			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),

			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name

			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),

			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)

			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)

			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)

			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)

			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)

			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)

			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)

			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)

			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),

			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),

			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),

			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),

			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link

			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'

		)

	);



	tgmpa( $plugins, $config );



}



/* Feed Links

================================================== */

add_theme_support('automatic-feed-links');



/* content width

================================================== */

if ( ! isset( $content_width ) )

	$content_width = 620;  



/* Register WP Menus

================================================== */

function register_menu_child() {

	register_nav_menu('primary-menu', __('Primary Menu'));

	register_nav_menu('footer-menu', __('Footer Menu'));

}

add_action('init', 'register_menu_child');





// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images

add_theme_support( 'post-thumbnails' );



if ( function_exists( 'add_theme_support' ) ) {

	set_post_thumbnail_size( 56, 56, true ); // Normal post thumbnails

	add_image_size( 'blog-style-1', 870, 400, true ); // Blog style 1 thumbnail

	add_image_size( 'blog-style-2', 1170, 400, true ); // Blog style 2 thumbnail, full-widht thumbnail

	add_image_size( 'widget-thumb', 45, 45, true ); // Widget post thumbnail

	add_image_size( 'client', 234, 150, true ); // Client thumbnail

	add_image_size( 'shop', 570, 570, true ); // Shop thumbnail

	add_image_size( 'product', 580, 580, true ); // Product thumbnail

	add_image_size( 'zoom', 1000, 1000, true ); // Shop zoom thumbnail

	add_image_size( 'shop-navigation', 156, 156, true ); // Shop navigation thumbnail

	add_image_size( 'portfolio-post', 710, 710, true ); // portfolio post gallery thumbnail

	add_image_size( 'widget-thumbnail', 710, 368, true ); // portfolio, news widget

	add_image_size( 'showbiz-thumbnail', 710, 533, true ); // showbiz thumbnail

	add_image_size( 'front-1', 870, 460, true ); // front 1 thumbnail

	add_image_size( 'front-2', 1170, 460, true ); // front 2 thumbnail

}



/* Grayscale Thumbnails

================================================== */

require_once (dirname(__FILE__) . '/functions/grayscale.php');

grayscale_add_image_size_child( 'client', 234, 150, true);

grayscale_add_image_size_child( 'blog-style-1', 870, 400, true);

grayscale_add_image_size_child( 'blog-style-2', 1170, 400, true);

grayscale_add_image_size_child( 'portfolio-post', 710, 710, true);

grayscale_add_image_size_child( 'widget-thumbnail', 710, 368, true);



/* Register and load JS, CSS

================================================== */

function theme_enqueue_scripts_child() {

    

    // register scripts;

    wp_register_style('woocommerce', get_stylesheet_directory_uri() . '/assets/css/woocommerce.css');

    

    wp_register_style('responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css');

    wp_register_style('1200-fixed', get_stylesheet_directory_uri() . '/assetsassetscss/fixed_1170_layouts.css');

    wp_register_style('1200-responsive', get_stylesheet_directory_uri() . '/assets/css/responsive_1170_layouts.css');

    

    wp_register_style('showbizpro-settings', get_stylesheet_directory_uri() . '/assets/showbiz-pro/showbizpro/css/settings.css');

    

    wp_register_script('prettify', get_stylesheet_directory_uri() .'/assets/js/google-code-prettify/prettify.js', false, false, true);

    wp_register_script('bootstrap-min', get_stylesheet_directory_uri() .'/assets/js/bootstrap.min.js', false, false, true);

    wp_register_script('bootstrap-carousel', get_stylesheet_directory_uri() .'/assets/js/bootstrap-carousel.js', false, false, false);

    wp_register_script('application', get_stylesheet_directory_uri() .'/assets/js/application.js', false, false, true);

    wp_register_script('bootstrap-function', get_stylesheet_directory_uri() .'/assets/js/bootstrap.function.js', false, false, true);

    wp_register_script('lavalamp', get_stylesheet_directory_uri() .'/assets/js/jquery.lavalamp-1.4.min.js', false, false, false);

    wp_register_script('lavalamp-function', get_stylesheet_directory_uri() .'/assets/js/lavalamp.function.js', false, false, false);

    wp_register_script('footer-function', get_stylesheet_directory_uri() .'/assets/js/footer.function.js', 'jquery');

    wp_register_script('selector-function', get_stylesheet_directory_uri() .'/assets/js/selector.function.js', 'jquery');

    wp_register_script('blog-function', get_stylesheet_directory_uri() .'/assets/js/blog.function.js', 'jquery');

	wp_register_script('animate-shadow', get_stylesheet_directory_uri() .'/assets/js/jquery.animate-shadow-min.js', 'jquery');

	wp_register_script('animate-shadow-function', get_stylesheet_directory_uri() .'/assets/js/animate-shadow.function.js', 'jquery');

	wp_register_script('iframe-function', get_stylesheet_directory_uri() .'/assets/js/iframe.function.js', 'jquery');

    wp_register_script('pp', get_stylesheet_directory_uri() .'/assets/prettyPhoto/jquery.prettyPhoto.js', 'jquery');

    wp_register_script('pp-function', get_stylesheet_directory_uri() .'/assets/prettyPhoto/prettyPhoto.function.js', 'jquery');

    wp_register_script('isotope', get_stylesheet_directory_uri() .'/assets/isotope/jquery.isotope.min.js', 'jquery');

    wp_register_script('isotope-function', get_stylesheet_directory_uri() .'/assets/isotope/isotope.function.js', 'jquery');

    wp_register_script('custom-function', get_stylesheet_directory_uri() .'/assets/js/custom.function.js', 'jquery');

    wp_register_script('newsticker-fix', get_stylesheet_directory_uri() .'/assets/js/newsticker-fix.js', 'jquery');

    wp_register_script('ba-resize', get_stylesheet_directory_uri() .'/assets/cowboy-jquery-resize-21ae0ec/jquery.ba-resize.min.js', false, false, true);

    wp_register_script('bootstrap-mega-dd', get_stylesheet_directory_uri() .'/assets/js/bootstrap-mega-dd.js', false, false, true);

  

    wp_register_script('themepunch-plugins', get_stylesheet_directory_uri() .'/assets/showbiz-pro/showbizpro/js/jquery.themepunch.plugins.min.js', 'jquery');

    wp_register_script('showbizpro', get_stylesheet_directory_uri() .'/assets/showbiz-pro/showbizpro/js/jquery.themepunch.showbizpro.js', 'jquery');

    wp_register_script('input-function', get_stylesheet_directory_uri() .'/assets/js/input.function.js', 'jquery');

    

    wp_register_script('etalage', get_stylesheet_directory_uri() .'/assets/etalage/js/jquery.etalage.min.js', 'jquery');

	wp_register_script('etalage-function', get_stylesheet_directory_uri() .'/assets/js/etalage.function.js', 'jquery');

	wp_register_script('fancybox', get_stylesheet_directory_uri() .'/assets/js/jquery.fancybox-1.3.4.pack.js', 'jquery');	

	wp_register_script('etalage-function-960', get_stylesheet_directory_uri() .'/assets/js/etalage.function-960.js', 'jquery');

	
// 	wp_register_script('equal-heights', THEME_ASSETS_CHILD.'js/jquery.equalheights.js', 'jquery');
//    wp_register_script('equal-heights-init', THEME_ASSETS_CHILD.'js/equalheights-init.js', 'jquery');
    

	// enqueue scripts

	wp_enqueue_script('jquery');

	

	wp_enqueue_script('prettify');

	wp_enqueue_script('bootstrap-min');

	wp_enqueue_script('bootstrap-carousel');

	wp_enqueue_script('application');

	wp_enqueue_script('bootstrap-function');

	wp_enqueue_script('lavalamp');

	wp_enqueue_script('lavalamp-function');

	wp_enqueue_script('selector-function');

	wp_enqueue_script('footer-function');

	wp_enqueue_script('blog-function');

	wp_enqueue_script('animate-shadow');

	wp_enqueue_script('animate-shadow-function');

	wp_enqueue_script('iframe-function');

	wp_enqueue_script('pp');

	wp_enqueue_script('pp-function');

	wp_enqueue_script('isotope');

    wp_enqueue_script('isotope-function');

    wp_enqueue_script('custom-function');

    wp_enqueue_script('newsticker-fix');

	wp_enqueue_script('ba-resize');

	wp_enqueue_script('bootstrap-mega-dd');

	wp_enqueue_script('input-function');

	

    wp_enqueue_style('showbizpro-settings');

    wp_enqueue_script('themepunch-plugins');

    wp_enqueue_script('showbizpro');

    

    wp_enqueue_script('etalage');

    wp_enqueue_script('fancybox');

    
//	wp_enqueue_script('equal-heights');
//	wp_enqueue_script('equal-heights-init');

    if ( is_singular() ) wp_enqueue_script( "comment-reply" );   



}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts_child');



function woocommerce_styles_child() {

    wp_enqueue_style('woocommerce');

}

function responsive_child() {

    wp_enqueue_style('responsive');

}

function fixed_1170_layouts_child() {

	wp_enqueue_style('1200-fixed');

}

function responsive_1170_layouts_child() {

	wp_enqueue_style('1200-responsive');

}

function etalage_function_child() {

	wp_enqueue_script('etalage-function');

}

function etalage_function_960_child() {

	wp_enqueue_script('etalage-function-960');

}



function add_admin_scripts_child( $hook ) {



    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {    

        wp_enqueue_script('custom-js', get_bloginfo('url') . '/wp-content/themes/123ecology-child' .'/functions/js/custom-js.js');

    }

}

add_action( 'admin_enqueue_scripts', 'add_admin_scripts_child', 10, 1 );



/* Sidebar

================================================== */

if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Main Sidebar',

		'before_widget' => '<div id="%1$s" class="widget %2$s">',

		'after_widget' => '</div>',

		'before_title' => '<h4 class="title">',

		'after_title' => '</h4>',

	));

}

if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Footer',

		'before_widget' => '<div class="span3 one-column"><div id="%1$s" class="widget %2$s">',

		'after_widget' => '</div></div>',

		'before_title' => '<h4 class="title">',

		'after_title' => '</h4>',

	));

}

if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Contact Page Sidebar',

		'before_widget' => '<div id="%1$s" class="widget %2$s">',

		'after_widget' => '</div>',

		'before_title' => '<h4 class="title">',

		'after_title' => '</h4>',

	));

}

if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Portfolio Post Sidebar',

		'before_widget' => '<div id="%1$s" class="widget %2$s">',

		'after_widget' => '</div>',

		'before_title' => '<h4 class="title">',

		'after_title' => '</h4>',

	));

}

if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Shop Sidebar',

        'description' => '',

		'before_widget' => '<div id="%1$s" class="widget %2$s">',

		'after_widget' => '</div>',

		'before_title' => '<h4 class="title">',

		'after_title' => '</h4>',

	));

}

if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Product Post Sidebar',

        'description' => '',

		'before_widget' => '<div id="%1$s" class="widget %2$s">',

		'after_widget' => '</div>',

		'before_title' => '<h4 class="title">',

		'after_title' => '</h4>',

	));

}

if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Right Header Meta',

        'description' => 'Alternative for multilingual project, available widgets for this sidebar "Text" and "Black Studio TinyMCE"',

		'before_widget' => '<div id="%1$s" class="widget %2$s">',

		'after_widget' => '</div>',

	));

}

if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Shortcode Sidebar',

		'before_widget' => '<div id="%1$s" class="widget %2$s">',

		'after_widget' => '</div>',

		'before_title' => '<h4 class="title">',

		'after_title' => '</h4>',

	));

}

if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Footer 3 Column',

		'before_widget' => '<div class="span4 one-column"><div id="%1$s" class="widget %2$s">',

		'after_widget' => '</div></div>',

		'before_title' => '<h4 class="title">',

		'after_title' => '</h4>',

	));

}

function html_widget_title_child( $title ) {

	//HTML tag opening/closing brackets

	$title = str_replace( '[', '<', $title );

	$title = str_replace( '[/', '</', $title );

	

	$title = str_replace( 'select]', 'span>', $title );

	

	return $title;

}

add_filter( 'widget_title', 'html_widget_title_child' );



function custom_tag_cloud_widget_child($args) {

	$args['number'] = 0; //adding a 0 will display all tags

	$args['largest'] = 13; //largest tag

	$args['smallest'] = 13; //smallest tag

	$args['unit'] = 'px'; //tag font unit

	return $args;

}

add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget_child' );

add_filter( 'woocommerce_product_tag_cloud_widget_args', 'custom_tag_cloud_widget_child' );



/* fix current_page_parent for custom posts [for archive is_post_type_archive( 'post_type' )]

================================================== */

function fix_blog_menu_css_class_child( $classes, $item ) {

    if ( is_tax( 'portfolio_tags' ) || is_tax( 'portfolio_category' ) || is_singular( 'portfolio' ) ) {

        if ( $item->object_id == get_option('page_for_posts') ) {

            $key = array_search( 'current_page_parent', $classes );

            if ( false !== $key )

                unset( $classes[ $key ] );

        }

    }



    return $classes;

}

add_filter( 'nav_menu_css_class', 'fix_blog_menu_css_class_child', 10, 2 );



require_once (dirname(__FILE__) . '/functions/custom-widgets/widget-post-tabs.php');

require_once (dirname(__FILE__) . '/functions/custom-widgets/widget-posts.php');



/*  wpml functions

================================================== */

function language_selector_flags_child(){

    $languages = icl_get_languages('skip_missing=0&orderby=code');

    if(!empty($languages)){

        foreach($languages as $l){

        echo '<span class="flag">';

            if(!$l['active']) echo '<a href="'.$l['url'].'">';

            echo '<img class="ttip" data-placement="bottom" rel="tooltip" title="'.$l['translated_name'].'" src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';

            if(!$l['active']) echo '</a>';

        echo '</span>';

        }

    }

}



/*  get attachment id

================================================== */

function get_attachment_id_from_src_child ($image_src) {

	global $wpdb;

	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";

	$id = $wpdb->get_var($query);

	return $id;

}



/* Excerpt&content words filter

================================================== */ 

function excerpt_portfolio_child($limit) {

  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt)>=$limit) {

    array_pop($excerpt);

    $excerpt = implode(" ",$excerpt);

  } else {

    $excerpt = implode(" ",$excerpt);

  }	

  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

  return $excerpt;

}

function excerpt_child($limit) {

  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt)>=$limit) {

    array_pop($excerpt);

    $excerpt = implode(" ",$excerpt).' &#91;...&#93;';

  } else {

    $excerpt = implode(" ",$excerpt);

  }	

  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

  return $excerpt;

}

function custom_excerpt_length_child( $length ) {

	return 100;

}

add_filter( 'excerpt_length', 'custom_excerpt_length_child', 999 );



add_filter( 'post_gallery', 'my_post_gallery_child', 10, 2 );

function my_post_gallery_child( $output, $attr) {

    global $post, $wp_locale;



    static $instance = 0;

    $instance++;



    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement

    if ( isset( $attr['orderby'] ) ) {

        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );

        if ( !$attr['orderby'] )

            unset( $attr['orderby'] );

    }



    extract(shortcode_atts(array(

        'order'      => 'ASC',

        'orderby'    => 'menu_order ID',

        'id'         => $post->ID,

        'itemtag'    => 'dl',

        'icontag'    => 'dt',

        'captiontag' => 'dd',

        'columns'    => 3,

        'size'       => 'zoom',

        'include'    => '',

        'exclude'    => ''

    ), $attr));



    $id = intval($id);

    if ( 'RAND' == $order )

        $orderby = 'none';



    if ( !empty($include) ) {

        $include = preg_replace( '/[^0-9,]+/', '', $include );

        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );



        $attachments = array();

        foreach ( $_attachments as $key => $val ) {

            $attachments[$val->ID] = $_attachments[$key];

        }

    } elseif ( !empty($exclude) ) {

        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );

        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

    } else {

        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

    }



    if ( empty($attachments) )

        return '';



    if ( is_feed() ) {

        $output = "\n";

        foreach ( $attachments as $att_id => $attachment )

            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";

        return $output;

    }



    $itemtag = tag_escape($itemtag);

    $captiontag = tag_escape($captiontag);

    $columns = intval($columns);

    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;

    $float = is_rtl() ? 'right' : 'left';



    $selector = "gallery-{$instance}";



    $output = apply_filters('gallery_style', "

        <style type='text/css'>

            #{$selector} {

                margin: auto;

            }

            #{$selector} .gallery-item {

                float: {$float};

                text-align: center;

                margin: 0;

                width: {$itemwidth}%;

            }

            .gallery-icon{

            	padding: 10% 10% 10px;

            }

            #{$selector} .gallery-caption {

                margin-left: 0;

                margin-bottom: 10%;

                font-weight: bold;

            }

        </style>

        <!-- see gallery_shortcode() in wp-includes/media.php -->

        <div id='$selector' class='gallery galleryid-{$id}'>");



    $i = 0;

    foreach ( $attachments as $id => $attachment ) {

        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);



        $output .= "<{$itemtag} class='gallery-item'>";

        $output .= "

            <{$icontag} class='gallery-icon'>

                $link

            </{$icontag}>";

        if ( $captiontag && trim($attachment->post_excerpt) ) {

            $output .= "

                <{$captiontag} class='gallery-caption'>

                " . wptexturize($attachment->post_excerpt) . "

                </{$captiontag}>";

        }

        $output .= "</{$itemtag}>";

        if ( $columns > 0 && ++$i % $columns == 0 )

            $output .= '<br style="clear: both" />';

    }



    $output .= "

            <br style='clear: both;' />

        </div>\n";



    return $output;

}

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)

add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment_child');

 

function woocommerce_header_add_to_cart_fragment_child( $fragments ) {

global $woocommerce;

ob_start();

?>

<div class="header-cart btn-group pull-right">

    <a class="dropdown-toggle Total cart-icon" data-toggle="dropdown" href="#">

    	<?php _e('Cart', GETTEXT_DOMAIN_CHILD ); ?> - <span><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span>

    </a>

    <div class="dropdown-menu">

		<div class="header_cart_list">

		

			<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>

		

				<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

		

					$_product = $cart_item['data'];

		

					// Only display if allowed

					if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )

						continue;

		

					// Get price

					$product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();

		

					$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );?>

		

					<div class="item clearfix">

						<a class="cart-thumbnail" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo $_product->get_image('widget-thumb'); ?></a>

						<div class="cart-content">

							<a class="cart-title" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?></a>

							<?php echo $woocommerce->cart->get_item_data( $cart_item ); ?>

							<div class="cart-meta">

								<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">Fjern</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Fjern dette produkt', GETTEXT_DOMAIN_CHILD) ), $cart_item_key );?>

								<span class="quantity"><?php printf( '%s &times; %s', $cart_item['quantity'], $product_price ); ?></span>

							</div>

						</div>

					</div>

					

				<?php endforeach; ?>

		

			<?php else : ?>

		

				<div class="empty"><?php _e('No products in the cart.', GETTEXT_DOMAIN_CHILD); ?></div>

		

			<?php endif; ?>

		

		</div><!-- end product list -->

		

		<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>

		

		<div class="header_cart_footer">

			<p class="total cleanfix"><strong><?php _e('Cart Subtotal', GETTEXT_DOMAIN_CHILD); ?>:</strong> <span><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span></p>

		

			<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

		

			<p class="buttons">

				<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="btn btn-primary btn-small"><?php _e('View Cart &rarr;', GETTEXT_DOMAIN_CHILD); ?></a>

				<a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="btn btn-primary btn-small checkout"><?php _e('Checkout &rarr;', GETTEXT_DOMAIN_CHILD); ?></a>

			</p>

		</div>

		

		<?php endif; ?>

		

    </div>

</div>

<?php

$fragments['.header-cart'] = ob_get_clean();

return $fragments;

}



/* Theme Functions

================================================== */



require_once (dirname(__FILE__) . '/functions/custom-page_fields.php');

require_once (dirname(__FILE__) . '/functions/custom-sidebar_fields.php');

require_once (dirname(__FILE__) . '/functions/custom-post_fields.php');

require_once (dirname(__FILE__) . '/functions/post_types-portfolio.php');

require_once (dirname(__FILE__) . '/functions/custom-portfolio_fields.php');

require_once (dirname(__FILE__) . '/functions/post_types_clients.php');

require_once (dirname(__FILE__) . '/functions/custom-about_fields.php');

require_once (dirname(__FILE__) . '/functions/post_types_about.php');

require_once (dirname(__FILE__) . '/functions/post_types_front_tabs.php');

require_once (dirname(__FILE__) . '/functions/custom-front_tabs_fields.php');

require_once (dirname(__FILE__) . '/functions/custom-page-portfolio_fields.php');

require_once (dirname(__FILE__) . '/functions/theme_walker.php');

require_once (dirname(__FILE__) . '/functions/theme_video.php');

require_once (dirname(__FILE__) . '/functions/theme_comments.php');

require_once (dirname(__FILE__) . '/functions/theme_breadcrumb.php');

require_once (dirname(__FILE__) . '/functions/shortcodes.php');

include_once (dirname(__FILE__) . '/admin/shortcode-tinymce.php');

require_once (dirname(__FILE__) . '/functions/custom-widgets/black-studio-tinymce-widget/black-studio-tinymce-widget.php');

require_once (dirname(__FILE__) . '/functions/dw-shortcodes-bootstrap/designwall-shortcodes.php');

include_once (dirname(__FILE__) . '/functions/woocommerce.php');

//Change the symbol of an existing currency
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'DKK': $currency_symbol = 'kr.'; break;
     }
     return $currency_symbol;
}

add_action('wp_enqueue_scripts', 'oab_override_woo_frontend_scripts'); 
function oab_override_woo_frontend_scripts() { 
wp_deregister_script('wc-checkout'); 
wp_enqueue_script('wc-checkout', get_stylesheet_directory_uri() . '/woocommerce/assets/js/frontend/checkout.js', array('jquery', 'woocommerce', 'wc-country-select', 'wc-address-i18n'), null, true); }



/**
 * Change custom text 
 *
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 */
function my_text_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Checkout' :
			$translated_text = __( 'Check ud', 'woocommerce' );
			break;
		case 'Cart' :
			$translated_text = __( 'Kurv', 'woocommerce' );
			break;
		case 'Have a coupon?' :
			$translated_text = __( 'har du en kupon?', 'woocommerce' );
			break;
		case 'Click here to enter your code' :
			$translated_text = __( 'klik her for at indtaste koden', 'woocommerce' );
			break;
		case 'Returning customer?' :
			$translated_text = __( 'Tidligere kunde?', 'woocommerce' );
			break;
		case 'Click here to login' :
			$translated_text = __( 'Klik her for at logge ind', 'woocommerce' );
			break;
		case 'If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.' :
			$translated_text = __( '
Hvis du har handlet hos os før, skal du indtaste dine oplysninger i felterne nedenfor. Hvis du er en ny kunde, skal du gå videre til Fakturering & Shipping sektion.', 'woocommerce' );  
			break;
			case 'Remember me' :
			$translated_text = __( 'Husk mig', 'woocommerce' );
			break;
			case 'Apply Coupon' :
			$translated_text = __( 'Anvend kupon', 'woocommerce' );
			break;
			case 'Recent Orders' :
			$translated_text = __( 'Seneste ordrer', 'woocommerce' );
			break;
			case 'My Address' :
			$translated_text = __( 'Min adresse', 'woocommerce' );
			break;
			case 'My Addresses' :
			$translated_text = __( 'Mine adresser', 'woocommerce' );
			break;
			case 'Order Details' :
			$translated_text = __( 'Ordre detaljer', 'woocommerce' );
			break;
			case 'Customer details' :
			$translated_text = __( 'Kundeoplysninger', 'woocommerce' );
			break;
			case 'Home' :
			$translated_text = __( 'Hjem', 'woocommerce' );
			break;
			case 'Additional Information' :
			$translated_text = __( 'Yderligere information', 'woocommerce' );
			break;
			case 'Description' :
			$translated_text = __( 'Beskrivelse', 'woocommerce' );
			break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'my_text_strings', 20, 3 );
?>