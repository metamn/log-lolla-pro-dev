<?php
/**
 * Displays the post content for the Standard Post format.
 *
 * If the post has a `more` tag it needs a special treatment:
 * The `read more` text has to be displayed without using the `the_content()` function.
 * If 'the_content( log_lolla_pro_add_readmore_to_content() )' is used the arrow will be spread across multiple lines because `the_content()` is applying `wpautop` to everything what's inside the content.
 *
 * @link https://wordpress.stackexchange.com/questions/38030/is-there-a-has-more-tag-method-or-equivalent
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 */

$klass = '';
?>

<aside class="post-content">
	<h3 class="hidden">Article content</h3>

	<div class="text">
		<?php
		if ( strpos( $post->post_content, '<!--more-->' ) ) {
			echo wp_kses_post( get_the_content( log_lolla_pro_add_readmore_to_content() ) );
		} else {
			the_content();
		}
		?>
	</div>
</aside>
