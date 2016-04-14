<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');

    /* Theme Options
    ================================================== */
    $theme_style = get_option_tree('theme_style',$theme_options);
    
}
?>

<?php get_header(); ?>
<?php $left_sidebar = get_post_meta($post->ID, 'left_sidebar_value', true);?>

		<div id="breadcrumb" class="<?php if($theme_style=="boxed"){?>wrap<?php }?> gradient">
			<div class="container">
				<?php get_template_part('includes/heading' ) ?>
			</div>
		</div>
		<div id="main" class="<?php if($theme_style=="boxed"){?>wrap<?php }?> post-template sidebar-template <?php if ($left_sidebar){?>left-sidebar-template<?php }?>">
			<div class="container">
				<div class="row-fluid">
					<div class="span9 post-page">
			        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			        <div class="shop-image">	
                        <?php $post_thumbnail_id = get_post_thumbnail_id(); ?> 
                        <?php $alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);?>
			            <img alt="<?php echo $alt; ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-style-1' ); echo $image[0];?>" />
			        </div>
			        <?php }?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content();?>
                    <?php endwhile; else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
                    <?php endif; ?>
                    </div>
                    <?php get_sidebar(); ?>
				</div>
			</div>
		</div>
        
<?php get_footer(); ?>