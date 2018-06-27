<?php
/**
 * Template tags for Breadcrumb.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( ! function_exists( 'log_lolla_pro_display_breadcrumb_for_archive' ) ) {
	/**
	 * Display breadcrumb for an archive.
	 */
	function log_lolla_pro_display_breadcrumb_for_archive() {
		$deco = array(
			'before_all'  => '<ul class="ul">',
			'after_all'   => '</ul>',
			'before_each' => '<li class="li">',
			'after_each'  => '</li>',
			'separator'   => '<li class="li">' . log_lolla_pro_get_triangle_html( 'right' ) . '</li>',
		);

		$links   = [];
		$links[] = log_lolla_pro_get_link_html_for( 'Home' );
		$links[] = log_lolla_pro_get_link_html_for( 'Archives' );

		if ( is_tag() ) {
			$links[] = log_lolla_pro_get_link_html_for( 'Tags' );
		}

		if ( is_category() ) {
			$links[] = log_lolla_pro_get_link_html_for( 'Categories' );
		}

		if ( is_singular( 'source' ) ) {
			$links[] = log_lolla_pro_get_link_html_for( 'Sources' );
		}

		if ( is_singular( 'people' ) ) {
			$links[] = log_lolla_pro_get_link_html_for( 'People' );
		}

		if ( is_singular( 'summary' ) ) {
			$links[] = log_lolla_pro_get_link_html_for( 'Summaries' );
		}

		$list = [];

		foreach ( $links as $link ) {
			if ( ! empty( $link ) ) {
				$list[] = $deco['before_each'] . $link . $deco['after_each'];
			}
		}

		echo wp_kses_post( $deco['before_all'] . implode( $deco['separator'], $list ) . $deco['after_all'] );
	}
}
