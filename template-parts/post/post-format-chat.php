<?php
  /**
   * Template part for displaying chat posts
   *
   * chat – A chat transcript, like so:
   * John: foo
   * Mary: bar
   * John: foo 2
   *
   * @link https://developer.wordpress.org/themes/functionality/post-formats/
   *
   * @package Log_Lolla_Pro
   */

  $klass = 'post post-format-chat';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $klass ); ?>>
  <?php get_template_part( 'template-parts/post/post', 'sidebar-left' ); ?>

  <div class="post__content">
    <?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
    <?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
	  <?php get_template_part( 'template-parts/post/parts/post', 'content' ); ?>
    <?php get_template_part( 'template-parts/post/parts/post', 'permalink-if-no-title' ); ?>
  </div>

 	<?php get_template_part( 'template-parts/post/post', 'sidebar-right' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
