<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* Shop Options
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
    $heading_navi = get_option_tree('heading_navi',$theme_options);
    $portfolio_title = get_option_tree('portfolio_title',$theme_options);
}
?>

				<div class="row-fluid heading">
					<div class="span12">
						<h2 class="title">
							<?php $posts_page_id = get_option( 'page_for_posts');
                            $posts_page = get_page( $posts_page_id);?>
                            <?php if(is_home()){

	                            if($posts_page_id){
	                                echo $posts_page->post_title;
	                            }else{
	                                echo bloginfo( 'description' );
	                            }
	                            
							}elseif ( is_post_type_archive('product') && get_option('page_on_front') !== woocommerce_get_page_id('shop') ) {
								
								if ( is_search() ) {
									printf( __( 'Search Results: &ldquo;%s&rdquo;', 'woocommerce' ), get_search_query() );
									if ( get_query_var( 'paged' ) )
									printf( __( '&nbsp;&ndash; Page %s', 'woocommerce' ), get_query_var( 'paged' ) );
								}else{
									$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
									echo apply_filters( 'the_title', ( $shop_page_title = get_option( 'woocommerce_shop_page_title' ) ) ? $shop_page_title : $shop_page->post_title );
								}

							} elseif ( is_tax()) {
							
								echo single_term_title( "", false );
							
                            } elseif(is_search()){
                            
	                            _e('Search for: ', GETTEXT_DOMAIN); the_search_query();
	                            	
	                        } elseif (is_404()) {
	                        
	                        	_e('404 Error', GETTEXT_DOMAIN);
	                        	 
	                        } elseif(is_author()){
	                        
                            	$author = get_userdata( get_query_var('author') );
                            	echo $author->display_name;
                            
                            } elseif (is_archive()) {
                            
						        if ( is_day() ) :
						            printf( get_the_date('M j, Y'));
						        elseif ( is_month() ) :
						            printf( get_the_date('F Y'));
						        elseif ( is_year() ) :
						            printf( get_the_date('Y'));
							    elseif(is_category()) :
							    	single_cat_title();
							    elseif(is_tag()) :
							    	single_tag_title();
						        else :
						        	_e( 'Archives', GETTEXT_DOMAIN);
						        endif;
                            
                            } else{
	                            the_title();
                            }?>
						</h2>
						<?php if(is_singular('product')){?>
						<div class="Breadcrumb"><a class="heading-navi" href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><?php _e('&larr; Return To Shop', GETTEXT_DOMAIN)?></a></div>
                    <?php $plugins = get_option('active_plugins');?>
                    <?php $required_plugin = 'woocommerce/woocommerce.php';?>
                    <?php if ( in_array( $required_plugin , $plugins ) ) {?>
						<?php } else if(is_shop()){?>
						<div class="Breadcrumb"><a class="heading-navi" href="<?php echo home_url(); ?>"><?php _e('&larr; Return To Home', GETTEXT_DOMAIN)?></a></div>
					<?php }?>
						<?php }else{?>
						<div class="Breadcrumb"><?php echo the_breadcrumb()?></div>
						<?php }?>
					</div>
				</div>