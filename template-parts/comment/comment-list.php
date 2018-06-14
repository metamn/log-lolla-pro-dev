<?php
  /**
   * Template part to display the comments of a post
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */

  if ( post_password_required() ) return;

  $comments = log_lolla_get_comments_of_a_post( $post );

  $number_of_comments = count( $comments );
  if ( ! $number_of_comments ) return;
?>

<section class="comments" id="comments-for-post-<?php echo get_the_ID( $post ) ?>">
  <?php
    set_query_var( 'number_of_comments', $number_of_comments );
    get_template_part( 'template-parts/comment/parts/comment', 'list-title' );
  ?>

  <div class="comments-body">
    <?php foreach ( $comments as $comment ) {
      get_template_part( 'template-parts/comment/comment', 'single' );
    } ?>
  </div>
</section>
