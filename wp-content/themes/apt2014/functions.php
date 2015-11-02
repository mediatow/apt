<?php
require_once('includes/cpt.php');
require_once('includes/companies_cpt.php');
require_once('includes/metabox_leaders.php');

define('BASE_URL', get_stylesheet_directory_uri());

#wp_register_script( $handle, $src, $deps, $ver, $in_footer );
wp_register_script( 'global', BASE_URL.'/js/global.js', array('jquery'), NULL, false);
wp_register_script('fancybox', BASE_URL.'/js/fancybox/jquery.fancybox-1.3.4.pack.js', array("jquery"));
wp_register_script( 'navigate', BASE_URL.'/js/navigate.js', array('jquery'), NULL, false);
//wp_register_script( 'ddaccordion', BASE_URL.'/js/ddaccordion.js', array('jquery'), NULL, false);

wp_enqueue_script('jquery');
wp_enqueue_script('global');
wp_enqueue_script('fancybox');
wp_enqueue_script('navigate');
//wp_enqueue_script('ddaccordion');

#wp_register_style( $handle, $src, $deps, $ver, $media );
wp_register_style('fancyboxstyle', BASE_URL.'/js/fancybox/jquery.fancybox-1.3.4.css');
wp_enqueue_style('fancybox');


if(function_exists('register_nav_menus')){
	register_nav_menus(
		array(
			'main_nav' => 'Main Navigation Menu',
            'footernav' => 'Bottom Navigation Menu'
			
			)
	);
}

function buildHeader($path, $img){
	echo  "<img src='".$path.$img."' width='100%'>";
	}

//custom media image sizes
 if ( function_exists( 'add_image_size' ) ) {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'menucard_thumb', 9999, 100 );
    add_image_size( 'gallery_thumb', 260, 9999 );
    add_image_size( 'mediumwidth', 588, 9999 );
    add_image_size( 'fullwidth', 906, 9999 );
    add_image_size( 'slider', 1020, 9999 );
}

// Redirect to a gallery/blog/menucard category template
function custom_category_template($cat_template) {
    global $wp_query, $wpdb, $pageid;
    $sql = "SELECT DISTINCT p.ID, pm.meta_value AS page_template, pm2.meta_value AS mc_categories FROM " . $wpdb->posts . " AS p ";
    $sql .= "LEFT JOIN (SELECT post_id, meta_value FROM " . $wpdb->postmeta . " WHERE meta_key = '_wp_page_template') ";
    $sql .= "AS pm ON p.ID = pm.post_id ";
    $sql .= "LEFT JOIN (SELECT post_id, meta_value FROM " . $wpdb->postmeta . " WHERE meta_key = 'categories') ";
    $sql .= "AS pm2 ON p.ID = pm2.post_id ";
    $sql .= "WHERE pm.meta_value = 'gallery.php' OR pm.meta_value = 'blog.php' OR pm.meta_value = 'menucard.php' ";
    $rows = $wpdb->get_results($sql,OBJECT);
    
    $catID = get_query_var('cat');
    foreach($rows as $row) {
        $categories = explode(',', $row->mc_categories);
        if (in_array($catID, $categories)) {
            $path = TEMPLATEPATH . "/" . $row->page_template;
            if ( file_exists($path) ) {
                $cat_template = $path;
                $pageid = $row->ID;
            }

        }
    }
    
    return $cat_template;
}
add_filter('category_template', 'custom_category_template');
   
/**
 * Register our sidebars and widgetized areas.
 *
 */
function wptutsplus_widgets_init() {
 
    // In header widget area, located to the right hand side of the header, next to the site title and description. Empty by default.
    
 
    // Sidebar widget area, located in the sidebar. Empty by default.
    register_sidebar( array(
        'name' => 'USA Widget Area',
        'id' => 'usa-widget-area',
        'description' => 'The usa widget area',
        'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    // Sidebar widget area, located in the sidebar. Empty by default.
    register_sidebar( array(
        'name' => 'EU Widget Area',
        'id' => 'eu-widget-area',
        'description' => 'The eu widget area',
        'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    // Sidebar widget area, located in the sidebar. Empty by default.
    register_sidebar( array(
        'name' => 'Details Widget Area',
        'id' => 'details-widget-area',
        'description' => 'The details widget area',
        'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

register_sidebar( array(
        'name' => 'Contact Form Widget Area',
        'id' => 'contact-widget-area',
        'description' => 'The contact widget area',
        'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
}
add_action( 'widgets_init', 'wptutsplus_widgets_init' );





?>
