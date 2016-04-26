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

		<?php $post_style = get_post_meta($post->ID, 'post_style_value', true);?>
		<?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
		<?php $linkURL = get_post_meta($post->ID, 'link-url_value', true);?>
		<?php $share = get_post_meta($post->ID, 'share_value', true);?>

		<div id="breadcrumb" class="<?php if($theme_style=="boxed"){?>wrap<?php }?> gradient">
			<div class="container">
				<?php get_template_part('includes/heading' ) ?>
			</div>
		</div>
		<div id="main" class="<?php if($theme_style=="boxed"){?>wrap<?php }?> sidebar-template">
			<div class="container">
				<div class="row-fluid">
					<div class="span9 post-page">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
					<?php get_template_part('includes/blog-post' ) ?>
                    <?php endwhile; else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN_CHILD); ?></p>
                    <?php endif; ?>
                    <div class="pagination">
						<?php previous_posts_link(__('&larr; Newer Entries', GETTEXT_DOMAIN_CHILD), 0) ?>
						<?php next_posts_link(__('Older Entries &rarr;', GETTEXT_DOMAIN_CHILD), 0); ?>
                    </div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

<?php get_footer(); ?>