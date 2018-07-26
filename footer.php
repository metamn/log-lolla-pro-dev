<?php
/**
 * Displays the site footer.
 *
 * It contains:
 * * A Footer template part.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials Wordpress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

?>

<?php // The `content` div, opened in the header. ?>
</div>

<?php
$display_sidebar = get_query_var( 'display-sidebar' );

if ( false !== $display_sidebar ) {
	get_template_part( 'template-parts/sidebar/sidebar' );
}

get_template_part( 'template-parts/footer/footer' );
wp_footer();
?>


</body>
</html>
