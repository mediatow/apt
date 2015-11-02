<?php 


/*-----------------------------------------------------------------------------------*/
/* Custom Post Type  */
/*-----------------------------------------------------------------------------------*/

add_action('init', 'arrmd_add_cpt',0);
function arrmd_add_cpt(){
	
  /* CPT - Leaders */
  $labels = array(
    'name' => 'Leaders',
    'singular_name' => 'Leader',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Leader',
    'edit_item' => 'Edit Leader',
    'new_item' => 'New Leader', 
    'view_item' => 'View Leader', 
    'search_items' => 'Search Leaders', 
    'not_found' =>  'No Leaders found', 
    'not_found_in_trash' => 'No Leaders found in Trash',  
    'parent_item_colon' => ''
  );
  $args = array(		
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
	  'has_archive' => true,
	  'rewrite' => array('slug' => 'leaders','with_front' => FALSE),
    'show_ui' => true, 
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => true,
	  'exclude_from_search' => false,
    //'menu_icon' => get_template_directory_uri() .'/includes/images/slides.png',
    //'menu_position' => 105,
	  'register_meta_box_cb' => 'add_leaders_metaboxes',
    'supports' => array('title', 'thumbnail', 'excerpt')
  ); 


  register_post_type('leaders', $args);
   
 }


