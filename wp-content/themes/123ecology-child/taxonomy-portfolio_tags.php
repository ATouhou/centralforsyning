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

		<div id="breadcrumb" class="<?php if($theme_style=="boxed"){?>wrap<?php }?> gradient">
			<div class="container">
				<?php get_template_part('includes/heading' ) ?>
			</div>
		</div>
		<div id="main" class="<?php if($theme_style=="boxed"){?>wrap<?php }?> post-template portfolio-template">
			<div class="container">
				<div class="row post-page">
					<div class="clearfix"></div>
                	<div id="container" class="portfolio clearfix">
                        <?php $query = new WP_Query();?>
                    	<?php $taxo_slug = get_queried_object()->slug;?> 
                        <?php $query->query('portfolio_tags='.$taxo_slug.'&post_type=portfolio&posts_per_page=-1');?>
                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();?>
                        
						<?php $lightbox = get_post_meta($post->ID, 'lightbox_value', true);?>
						<?php $videoURL_raw = get_post_meta($post->ID, 'video-url_value', true);?>
						<?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
						<?php $linkURL = get_post_meta($post->ID, 'link-url_value', true);?>
						<?php $full_width = get_post_meta($post->ID, 'full-width_value', true);?>
						<?php $details = get_post_meta($post->ID, 'details_value', true); if($details){$details = array_filter($details);};?>
				        <?php $terms = get_the_terms( get_the_ID(), 'portfolio_category' ); ?>
						<?php $share = get_post_meta($post->ID, 'share_value', true);?>
						<?php $gallery_type = get_post_meta($post->ID, 'gallery_type_value', true);?>
				        <?php $filter = get_post_meta($post->ID, 'filter_value', true);?>	                      
                        
						<div class="element post portfolio span3 <?php if($terms) : foreach ($terms as $term) { echo ''.$term->slug.' '; } endif; ?>">
							<div class="portfolio-item">
								<?php if ( $lightbox ) { ?>
									<?php if(has_post_thumbnail()) {?>
		                                <a rel="prettyPhoto[pp_gal-<?php echo $post->ID ?>]" class="effect-thumb" href="<?php if ($videoURL) { echo $videoURL_raw; }else{ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo $image[0]; }?>" title="<?php if ($videoURL) { the_title(); }else{ $attachment = get_post(get_post_thumbnail_id( $post->ID )); echo $attachment->post_title;}?>">
		                                	<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-style-1' ); echo $image[0];?>"/>
		                                	<div class="extras"></div>
		                                	<div class="icon zoom-in"></div>
		                                </a>
		                                <?php if (!$videoURL) { $thumbnail_id = get_post_thumbnail_id( $post->ID ); }?>
		                                <?php $args = array(
		                                'numberposts' => 9999, // change this to a specific number of images to grab
		                                'offset' => 0,
		                                'post_parent' => $post->ID,
		                                'post_type' => 'attachment',
		                                'exclude'  => $thumbnail_id,
		                                'nopaging' => false,
		                                'post_mime_type' => 'image',
		                                'order' => 'ASC', // change this to reverse the order
		                                'orderby' => 'menu_order ID', // select which type of sorting
		                                'post_status' => 'any'
		                                );
		                                $attachments =& get_children($args);?>
		                                <?php foreach($attachments as $attachment) {
		                                    $imageTitle = $attachment->post_title;
		                                    $imageDescription = $attachment->post_content;
		                                    $imageArrayFull = wp_get_attachment_image_src($attachment->ID, 'full', false);?>
		                                    <a class="hide" rel="prettyPhoto[pp_gal-<?php echo $post->ID ?>]" href="<?php echo $imageArrayFull[0] ?>" title="<?php echo $imageTitle ?>"></a>
		                                <?php }?>
	                                <?php }else{?>
	                                <p style="color: #ed1c24; padding: 10px;"><?php _e( 'Please add an image to "Featured Image" for thumbnail.', GETTEXT_DOMAIN_CHILD);?></p>
	                                <?php }?>
								<?php } elseif ( $linkURL ) { ?>
	                                <?php if(has_post_thumbnail()) {?>
										<a href="<?php echo $linkURL; ?>" class="effect-thumb">
											<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-style-1' ); echo $image[0];?>"/>
											<div class="extras"></div>
											<div class="icon link"></div>
										</a>
	                                <?php }else{?>
	                                <p style="color: #ed1c24; padding: 10px;"><?php _e( 'Please add an image to "Featured Image" for thumbnail.', GETTEXT_DOMAIN_CHILD);?></p>
	                                <?php }?>
                                <?php } elseif ( $videoURL ) { ?>
	                                <?php if(has_post_thumbnail()) {?>
									<a href="<?php the_permalink(); ?>" class="effect-thumb">
										<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-style-1' ); echo $image[0];?>"/>
										<div class="extras"></div>
										<div class="icon eye"></div>
									</a>
	                                <?php }else{?>
	                                <p style="color: #ed1c24; padding: 10px;"><?php _e( 'Please add an image to "Featured Image" for video thumbnail.', GETTEXT_DOMAIN_CHILD);?></p>
	                                <?php }?>
                                <?php } elseif ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
								<a href="<?php the_permalink(); ?>" class="effect-thumb">
									<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-style-1' ); echo $image[0];?>"/>
									<div class="extras"></div>
									<div class="icon eye"></div>
								</a>
                                <?php }?>
								<div class="content">
									<?php if ( $linkURL ) { ?>
									<h4 class="title"><a href="<?php echo $linkURL; ?>"><?php the_title(); ?></a></h4>
									<?php }else{?>
									<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<?php }?>
									<div class="column">
										<div class="post_content">
											<p><?php echo excerpt_portfolio(25)?> 
											<?php if ( $linkURL ) { ?>
											<a class="more-link" href="<?php echo $linkURL; ?>">[read more]</a></p>
											<?php }else{?>
											<a class="more-link" href="<?php the_permalink(); ?>">[read more]</a></p>
											<?php }?>
										</div>
									</div>
									<div class="portfolio-categories">
										<?php $resultstr = array(); ?>
	                                    <?php if($terms) : foreach ($terms as $term) { ?>
	                                        <?php $resultstr[] = '<a title="'.$term->name.'" href="'.get_term_link($term->slug, 'portfolio_category').'">'.$term->name.'</a>'?>
	                                    <?php } ?>
	                                    <?php echo implode(", ",$resultstr); endif;?>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>                    
						</div>
						<?php endwhile; endif; ?> 
                    </div>
				</div>
			</div>
		</div>
        
<?php get_footer(); ?>