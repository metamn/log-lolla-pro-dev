<?php
/**
 * Displays a link to the Topic the Summary refers to
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$topic = log_lolla_pro_get_post_type_summary_topic( $post );

set_query_var( 'topic', $topic );
get_template_part( 'template-parts/topic/topic', 'with-prefix' );
