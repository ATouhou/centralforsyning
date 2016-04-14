<?php
/*
Template Name: Sitemap Template
*/
?>

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

			        	<div class="row-fluid">
	                        <?php $query = new WP_Query();?>
	                        <?php $posts = $query->query('ignore_sticky_posts=1&post_status=publish');?>
	                        <?php if($posts){?>
				        	<div class="span6">
						        <h4><?php _e('Blog Posts', GETTEXT_DOMAIN) ?>:</h4>
						        <div class="advanced lists-Tags">
				                    <ul>
				                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
				                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				                        <?php endwhile; endif; ?> 
				                        <?php wp_reset_query(); ?>
				                    </ul>
						        </div>
				        	</div>
				        	<?php }?>
				        	<?php if(!$posts){?>
				        	<div class="span12">
					        <?php }else{?>
					        <div class="span6">
					        <?php }?>
		                        <h4><?php _e('Available Pages', GETTEXT_DOMAIN) ?>:</h4>
		                        <div class="advanced lists-Documents-1">
			                        <ul>
			                            <?php wp_list_pages('title_li=&posts_per_page=15'); ?>
			                        </ul>
		                        </div>
				        	</div>
				        </div>
				        <hr />
			        	<div class="row-fluid">
			        	
	                        <?php $query = new WP_Query();?>
	                        <?php $portfolio = $query->query('post_type=portfolio&ignore_sticky_posts=1&post_status=publish');?>
	                        <?php $products = $query->query('post_type=product&ignore_sticky_posts=1&post_status=publish');?>
	                        
	                        <?php if($products){?>
				        	
				        	<?php if(!$portfolio){?>
				        	<div class="span12">
					        <?php }else{?>
					        <div class="span6">
					        <?php }?>
						        
						        <h4><?php _e('Available Products', GETTEXT_DOMAIN) ?>:</h4>
						        <div class="advanced lists-Shopping-Cart-2">
				                    <ul>
				                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
				                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				                        <?php endwhile; endif; ?> 
				                        <?php wp_reset_query(); ?>
				                    </ul>
						        </div>
				        	</div>
				        	<?php }?>
				        	<?php wp_reset_query();?>
	                        
				        	<?php $query = new WP_Query();?>
	                        <?php $products = $query->query('post_type=product&ignore_sticky_posts=1&post_status=publish');?>
	                        <?php $portfolio = $query->query('post_type=portfolio&ignore_sticky_posts=1&post_status=publish');?>
	                        
				        	<?php if($portfolio){?>
				        	
				        	<?php if(!$products){?>
				        	<div class="span12">
					        <?php }else{?>
					        <div class="span6">
					        <?php }?>
					        
		                        <h4><?php _e('Portfolio Posts', GETTEXT_DOMAIN) ?>:</h4>
		                        <div class="advanced lists-Wallpaper">
			                    <ul>
			                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			                        <?php endwhile; endif; ?> 
			                        <?php wp_reset_query(); ?>
			                    </ul>
		                        </div>
				        	</div>
				        	<?php }?>
				        	<?php wp_reset_query();?>
				        	
				        </div>

                    </div>
                    <?php get_sidebar(); ?>
				</div>
			</div>
		</div>
        
<?php get_footer(); ?>