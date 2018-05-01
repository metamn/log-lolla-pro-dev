<?php
  /**
   * Template part for displaying posts associated to a source
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<?php
  $posts_of_a_source = log_lolla_get_posts_of_a_source( $post );
  if ( empty( $posts_of_a_source ) ) return;
?>

<section class="source-posts">
  <h3 class="title">Posts of <?php the_title() ?></h3>

  <?php
    $current_post = $post;

    foreach ($posts_of_a_source as $post) {
      get_template_part( 'template-parts/post/post', 'search' );
    }

    $post = $current_post;
  ?>
</section>
