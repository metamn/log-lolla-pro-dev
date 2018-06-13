<?php
  /**
   * Displaying a list of post of an archive
   *
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  $archive_posts_klass = get_query_var( 'archive_posts_klass' );
  $archive_posts_title = get_query_var( 'archive_posts_title' );
  $archive_posts_posts = get_query_var( 'archive_posts_posts' );
?>

<section class="archive-posts <?php echo $archive_posts_klass ?>">
  <h3 class="archive-posts-title">
    <?php echo $archive_posts_title ?>
  </h3>

  <div class="archive-posts-body">
    <?php

      // We have a manually created list of posts
      //
      if ( ! empty( $archive_posts_posts ) ) {
        $current_post = $post;

        foreach ($archive_posts_posts as $post) {
          get_template_part( 'template-parts/post/post-format', get_post_format() );
        }

        get_template_part( 'template-parts/navigation/navigation', 'posts' );

        $post = $current_post;
      } else {

        // We have the standard loop
        //
        if ( have_posts() ) {
          while ( have_posts() ) {
            the_post();
            get_template_part( 'template-parts/post/post-format', get_post_format() );
          }

          get_template_part( 'template-parts/navigation/navigation', 'posts' );
        } else {
          get_template_part( 'template-parts/post/post', 'none' );
        }
      }
    ?>
  </div>
</section>
