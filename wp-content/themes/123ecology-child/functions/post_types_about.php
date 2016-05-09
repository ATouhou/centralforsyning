<?php
/* About post type
================================================== */
function about_post_type_child() 
{
	$labels = array(
		'name' => __( 'Team Members'),
		'singular_name' => __( 'Team Members' ),
		'add_new' => _x('Add New', 'about'),
		'add_new_item' => __('Add New Team Member'),
		'edit_item' => __('Edit Team Member'),
		'new_item' => __('New Team Member'),
		'view_item' => __('View Team Member'),
		'search_items' => __('Search Team Members'),
		'not_found' =>  __('No team members found'),
		'not_found_in_trash' => __('No member found in trash'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
        'has_archive' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 45,
		'rewrite' => array('slug' => __( 'about' )),
		'supports' => array('title','editor','thumbnail')
	  ); 
	  
	  register_post_type(__( 'about' ),$args);
}


/* Portfolio taxonomies
================================================== */
function about_taxonomies_child(){
    
	// Categories
	
	register_taxonomy(
		'about_category',
		'about',
		array(
			'hierarchical' => true,
			'label' => 'Member Title',
			'query_var' => true,
			'rewrite' => true
		)
	);

}

/* Portfolio edit
================================================== */
function about_edit_columns_child($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Member Name' ),
            "about_category" => __( 'Member Title' ),
            "about_thumbnail" => __( 'Member Picture' ),
        );  
  
        return $columns;  
}  

/* Portfolio custom column
================================================== */
function about_custom_columns_child($column){  
        global $post;  
        switch ($column)  
        {    
    		case "about_category":
    			echo get_the_term_list($post->ID, 'about_category', '', ', ','');
    		break;
    		case "about_thumbnail":
    			the_post_thumbnail('thumbnail');
    		break;
        }  
}  

add_action( 'init', 'about_post_type_child' );
add_action( 'init', 'about_taxonomies_child', 0 ); 
add_filter("manage_edit-about_columns", "about_edit_columns_child");  
add_action("manage_posts_custom_column",  "about_custom_columns_child");  
?>