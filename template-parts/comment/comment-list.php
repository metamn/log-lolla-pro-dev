<?php
  /**
   * Template part to display the comments of a post
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<?php
  if ( post_password_required() ) return;

  $comments = log_lolla_get_comments_of_a_post( $post );

  $number_of_comments = count( $comments );
  if ( ! $number_of_comments ) return;
?>

<section class="comments" id="comments-for-post-<?php echo get_the_ID( $post ) ?>">
  <h3 class="comments-title">
    <?php echo log_lolla_comment_list_title( $number_of_comments, $post ) ?>
  </h3>

  <div class="comments-body">
    <?php foreach ( $comments as $comment ) {
      get_template_part( 'template-parts/comment/comment', 'single' );
    } ?>
  </div>
</section>
