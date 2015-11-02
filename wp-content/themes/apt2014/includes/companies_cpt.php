<?php 


/*-----------------------------------------------------------------------------------*/
/* Custom Post Type  */
/*-----------------------------------------------------------------------------------*/

add_action('init', 'arrmd2_add_cpt',0);
function arrmd2_add_cpt(){
	
  /* CPT - Companies */
  $labels = array(
    'name' => 'Companies',
    'singular_name' => 'Company',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Company',
    'edit_item' => 'Edit Company',
    'new_item' => 'New Company', 
    'view_item' => 'View Company', 
    'search_items' => 'Search Companies', 
    'not_found' =>  'No Companies found', 
    'not_found_in_trash' => 'No Companies found in Trash',  
    'parent_item_colon' => ''
  );
  $args = array(		
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
	  'has_archive' => true,
	  'rewrite' => array('slug' => 'companies','with_front' => FALSE),
    'show_ui' => true, 
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => true,
	  'exclude_from_search' => false,
    //'menu_icon' => get_template_directory_uri() .'/includes/images/slides.png',
    //'menu_position' => 105,
	  'register_meta_box_cb' => 'add_companies_metaboxes',
    'supports' => array('title', 'thumbnail', 'excerpt')
  ); 


  register_post_type('companies', $args);
   
 }


