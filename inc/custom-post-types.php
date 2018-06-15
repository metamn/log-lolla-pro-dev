<?php
  /**
   * Custom post types
   *
   * @link https://codex.wordpress.org/Post_Types
   *
   * @package Log_Lolla_Pro
   */



if ( ! function_exists( 'log_lolla_pro_create_custom_post_type_summary' ) ) {
  /**
   * Create custom post type Summary
   *
   * @link https://codex.wordpress.org/Function_Reference/register_post_type
   */
  function log_lolla_pro_create_custom_post_type_summary() {
    $labels = array(
      'name'               => _x( 'Summaries', 'post type general name', 'log-lolla-pro' ),
  		'singular_name'      => _x( 'Summary', 'post type singular name', 'log-lolla-pro' ),
  		'menu_name'          => _x( 'Summaries', 'admin menu', 'log-lolla-pro' ),
  		'name_admin_bar'     => _x( 'Summary', 'add new on admin bar', 'log-lolla-pro' ),
  		'add_new'            => _x( 'Add New', 'book', 'log-lolla-pro' ),
  		'add_new_item'       => __( 'Add New Summary', 'log-lolla-pro' ),
  		'new_item'           => __( 'New Summary', 'log-lolla-pro' ),
  		'edit_item'          => __( 'Edit Summary', 'log-lolla-pro' ),
  		'view_item'          => __( 'View Summary', 'log-lolla-pro' ),
  		'all_items'          => __( 'All Summaries', 'log-lolla-pro' ),
  		'search_items'       => __( 'Search Summaries', 'log-lolla-pro' ),
  		'parent_item_colon'  => __( 'Parent Summaries:', 'log-lolla-pro' ),
  		'not_found'          => __( 'No people found.', 'log-lolla-pro' ),
  		'not_found_in_trash' => __( 'No people found in Trash.', 'log-lolla-pro' )
    );

    $args = array(
      'labels'             => $labels,
      'description'        => __( 'High level summaries of a topic', 'log-lolla-pro' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'summaries' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
      'taxonomies'         => array( 'category', 'post_tag' )
    );

    register_post_type( 'summary', $args );
  }

  add_action( 'init', 'log_lolla_pro_create_custom_post_type_summary' );
}




if ( ! function_exists( 'log_lolla_pro_create_custom_post_type_source' ) ) {
 /**
  * Create custom post type Sources
  *
  * @link https://codex.wordpress.org/Function_Reference/register_post_type
  */
 function log_lolla_pro_create_custom_post_type_source() {
   $labels = array(
    'name'               => _x( 'Sources', 'post type general name', 'log-lolla-pro' ),
 		'singular_name'      => _x( 'Source', 'post type singular name', 'log-lolla-pro' ),
 		'menu_name'          => _x( 'Sources', 'admin menu', 'log-lolla-pro' ),
 		'name_admin_bar'     => _x( 'Source', 'add new on admin bar', 'log-lolla-pro' ),
 		'add_new'            => _x( 'Add New', 'book', 'log-lolla-pro' ),
 		'add_new_item'       => __( 'Add New Source', 'log-lolla-pro' ),
 		'new_item'           => __( 'New Source', 'log-lolla-pro' ),
 		'edit_item'          => __( 'Edit Source', 'log-lolla-pro' ),
 		'view_item'          => __( 'View Source', 'log-lolla-pro' ),
 		'all_items'          => __( 'All Sources', 'log-lolla-pro' ),
 		'search_items'       => __( 'Search Sources', 'log-lolla-pro' ),
 		'parent_item_colon'  => __( 'Parent Sources:', 'log-lolla-pro' ),
 		'not_found'          => __( 'No source found.', 'log-lolla-pro' ),
 		'not_found_in_trash' => __( 'No source found in Trash.', 'log-lolla-pro' )
   );

   $args = array(
     'labels'             => $labels,
     'description'        => __( 'Frequently used sources of information', 'log-lolla-pro' ),
     'public'             => true,
     'publicly_queryable' => true,
     'show_ui'            => true,
     'show_in_menu'       => true,
     'query_var'          => true,
     'rewrite'            => array( 'slug' => 'sources' ),
     'has_archive'        => true,
     'hierarchical'       => false,
     'menu_position'      => null,
     'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
   );

   register_post_type( 'source', $args );
 }

 add_action( 'init', 'log_lolla_pro_create_custom_post_type_source' );
}


if ( ! function_exists( 'log_lolla_pro_create_custom_post_type_people' ) ) {
  /**
   * Create custom post type People
   *
   * @link https://codex.wordpress.org/Function_Reference/register_post_type
   */
  function log_lolla_pro_create_custom_post_type_people() {
    $labels = array(
      'name'               => _x( 'People', 'post type general name', 'log-lolla-pro' ),
  		'singular_name'      => _x( 'Person', 'post type singular name', 'log-lolla-pro' ),
  		'menu_name'          => _x( 'People', 'admin menu', 'log-lolla-pro' ),
  		'name_admin_bar'     => _x( 'Person', 'add new on admin bar', 'log-lolla-pro' ),
  		'add_new'            => _x( 'Add New', 'book', 'log-lolla-pro' ),
  		'add_new_item'       => __( 'Add New Person', 'log-lolla-pro' ),
  		'new_item'           => __( 'New Person', 'log-lolla-pro' ),
  		'edit_item'          => __( 'Edit Person', 'log-lolla-pro' ),
  		'view_item'          => __( 'View Person', 'log-lolla-pro' ),
  		'all_items'          => __( 'All People', 'log-lolla-pro' ),
  		'search_items'       => __( 'Search People', 'log-lolla-pro' ),
  		'parent_item_colon'  => __( 'Parent People:', 'log-lolla-pro' ),
  		'not_found'          => __( 'No people found.', 'log-lolla-pro' ),
  		'not_found_in_trash' => __( 'No people found in Trash.', 'log-lolla-pro' )
    );

    $args = array(
      'labels'             => $labels,
      'description'        => __( 'People to learn from', 'log-lolla-pro' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'people' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
    );

    register_post_type( 'people', $args );
  }

  add_action( 'init', 'log_lolla_pro_create_custom_post_type_people' );
}

?>
