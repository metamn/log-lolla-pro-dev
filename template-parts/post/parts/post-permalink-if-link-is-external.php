<?php
/**
 * Displaying post permalink if the link post points to an external link
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 */

$url = log_lolla_pro_get_post_link_from_content();

if ( ! log_lolla_pro_post_link_is_external( $url ) ) {
	get_template_part( 'template-parts/post/parts/post', 'permalink' );
}
