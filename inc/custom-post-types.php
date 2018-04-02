<?php

/**
 * Custom post types
 *
 * @link https://codex.wordpress.org/Post_Types
 *
 * @package Log_Lolla
 */


if ( ! function_exists( 'log_lolla_create_custom_post_type_people' ) ) {
  /**
   * Create custom post type People
   *
   * @link https://codex.wordpress.org/Function_Reference/register_post_type
   */
  function log_lolla_create_custom_post_type_people() {
    $labels = array(
      'name'               => _x( 'People', 'post type general name', 'log-lolla' ),
  		'singular_name'      => _x( 'Person', 'post type singular name', 'log-lolla' ),
  		'menu_name'          => _x( 'People', 'admin menu', 'log-lolla' ),
  		'name_admin_bar'     => _x( 'Person', 'add new on admin bar', 'log-lolla' ),
  		'add_new'            => _x( 'Add New', 'book', 'log-lolla' ),
  		'add_new_item'       => __( 'Add New Person', 'log-lolla' ),
  		'new_item'           => __( 'New Person', 'log-lolla' ),
  		'edit_item'          => __( 'Edit Person', 'log-lolla' ),
  		'view_item'          => __( 'View Person', 'log-lolla' ),
  		'all_items'          => __( 'All People', 'log-lolla' ),
  		'search_items'       => __( 'Search People', 'log-lolla' ),
  		'parent_item_colon'  => __( 'Parent People:', 'log-lolla' ),
  		'not_found'          => __( 'No books found.', 'log-lolla' ),
  		'not_found_in_trash' => __( 'No books found in Trash.', 'log-lolla' )
    );

    $args = array(
      'labels'             => $labels,
      'description'        => __( 'Description.', 'log-lolla' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'person' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
    );

    register_post_type( 'people', $args );
  }

  add_action( 'init', 'log_lolla_create_custom_post_type_people' );
}

?>
