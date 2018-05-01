<?php
  /**
   * Template part to display posts from an archive
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<section class="archive-list archive-list--posts">
  <h3 class="archive-list-title">
    <?php esc_html_e( 'All posts', 'log-lolla'); ?>
  </h3>

  <div class="archive-list-body">
    <?php
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
          get_template_part( 'template-parts/post/post', 'search' );
        }

        get_template_part( 'template-parts/navigation/navigation', 'posts' );
      } else {
        get_template_part( 'template-parts/post/post', 'none' );
      }
    ?>
  </div>
</section>
