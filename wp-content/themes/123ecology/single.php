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

		<?php $full_width = get_post_meta($post->ID, 'full-width_value', true);?>
		<?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
		<?php $linkURL = get_post_meta($post->ID, 'link-url_value', true);?>
		<?php $share = get_post_meta($post->ID, 'share_value', true);?>
		<?php $left_sidebar = get_post_meta($post->ID, 'left_sidebar_value', true);?>
            
		<div id="breadcrumb" class="<?php if($theme_style=="boxed"){?>wrap<?php }?> gradient">
			<div class="container">
				<?php get_template_part('includes/heading' ) ?>
			</div>
		</div>
		<div id="main" class="<?php if($theme_style=="boxed"){?>wrap<?php }?> post-template sidebar-template <?php if (!$full_width){?><?php if ($left_sidebar){?>left-sidebar-template<?php }?><?php }?>">
			<div class="container">
				<div class="row-fluid">
					<div class="<?php if ($full_width){?>span12<?php }else{?>span9<?php }?> post-page">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part('includes/single-post' ) ?>
						<div class="row-fluid"><div class="<?php if ($full_width){?>span9<?php }else{?>span12<?php }?>"><?php comments_template('', true); ?></div></div>
	                    <?php endwhile; else: ?>
	                        <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
	                    <?php endif; ?>
                    </div>
                    <?php if (!$full_width){?>
                    <?php get_sidebar(); ?>
                    <?php }?>
				</div>
			</div>
		</div>
        
<?php get_footer(); ?>