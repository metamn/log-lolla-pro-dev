<?php
  /**
   * Template part for displaying posts associated to a person
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<?php
  $posts_of_a_person = log_lolla_get_posts_of_a_person( $post );
  if ( empty( $posts_of_a_person ) ) return;
?>

<section class="person-posts archive-list archive-list--posts">
  <?php
    printf(
      '<h3 class="archive-list-title">%1$s%2$s</h3>',
      esc_html_x( 'Posts of ', 'post permalink', 'log-lolla' ),
      get_the_title()
    );
  ?>


  <div class="archive-list-body">
    <?php
      $current_post = $post;

      foreach ($posts_of_a_person as $post) {
        get_template_part( 'template-parts/post/post', 'search' );
      }

      $post = $current_post;
    ?>
  </div>
</section>
