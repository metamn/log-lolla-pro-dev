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

<section class="person-posts">
  <h3 class="title">Posts of <?php the_title() ?></h3>

  <?php
    print_r($posts_of_a_person);
  ?>
</section>
