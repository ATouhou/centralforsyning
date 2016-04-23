<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* General Settings
    ================================================== */
    $body_font_size = get_option_tree('body_font_size',$theme_options);
    $body_font_family = get_option_tree('body_font_family',$theme_options);
    $heading_font_family = get_option_tree('heading_font_family',$theme_options);
    $google_character_sets = get_option_tree('google_character_sets',$theme_options);
    $left_headermeta = get_option_tree('left_headermeta',$theme_options);
    $right_headermeta = get_option_tree('right_headermeta',$theme_options);
    $headermeta_font_size = get_option_tree('headermeta_font_size',$theme_options);
    $wpml_switcher = get_option_tree('wpml_switcher',$theme_options);
    $custom_logo = get_option_tree('custom_logo',$theme_options);
    $logo_tagline = get_option_tree('logo_tagline',$theme_options);
    $header_search = get_option_tree('header_search',$theme_options);
    $header_right_container = get_option_tree('header_right_container',$theme_options);
    $header_right_social = get_option_tree('header_right_social',$theme_options);
    $portfolio_title = get_option_tree('portfolio_title',$theme_options);
    
    /* Menu Options
    ================================================== */
	$exclude_primarynavi = get_option_tree('exclude_primarynavi',$theme_options);
	$menu_order = get_option_tree('menu_order',$theme_options); 
}
?>


					<div class="span12">
						<!-- Navbar
						================================================== -->
						<div class="navbar">
							<div class="container">
								<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<div class="nav-collapse collapse">
			                        <?php if ( has_nav_menu( 'primary-menu' ) ) { /* if menu location 'primary-menu' exists then use custom menu */ ?>
			                        <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'nav', 'container' => '', 'walker' => new bootstrap_nav_menu_456shop_walker() ) ); ?>
			                        <?php } else { /* else use wp_list_pages */?>
			                        <ul class="nav">
			                            <?php wp_list_pages( array( 'exclude' => $exclude_primarynavi, 'title_li' => '', 'menu_class' => 'nav', 'sort_column' => $menu_order, 'walker' => new bootstrap_list_pages_walker() )); ?>
			                        </ul>
			                        <?php } ?>
								</div>
							</div>
						</div>
					</div>