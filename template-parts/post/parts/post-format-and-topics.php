<?php
/**
 * Displays the post format and topics
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$format     = log_lolla_pro_get_post_format_link_to_archive_as_html();
$categories = get_the_term_list( $post->ID, 'category', '<div class="topic">', '</div><div class="topic">', '</div>' );
$tags       = get_the_term_list( $post->ID, 'post_tag', '<div class="topic">', '</div><div class="topic">', '</div>' );

$all = '<div class="topic">' . $format . '</div>' . $categories . $tags;
echo wp_kses_post( $all );
