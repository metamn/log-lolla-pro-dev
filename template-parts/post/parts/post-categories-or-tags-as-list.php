<?php
/**
 * Displays the post categories, or tags, as a list
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

?>

<aside class="post-categories post-categories-or-tags-as-list">
	<h3 class="hidden">Post categories or tags as list</h3>

	<?php
	$categories = get_the_category_list();
	$tags       = get_the_tag_list( '<ul class="ul"><li class="li">', '</li><li class="li">', '</li></ul>' );
	$list       = ( 'Uncategorized' === $categories ) ? $tags : $categories;

	echo wp_kses_post( $list );
	?>
</aside>
