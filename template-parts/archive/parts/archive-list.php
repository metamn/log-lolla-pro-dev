<?php
  /**
   * Displaying a list of archives
   *
   * The corresponding SCSS code can be found in `assets/scss/parts/archive-list`
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  $archive_list_klass = get_query_var( 'archive_list_klass' );
  $archive_list_title = get_query_var( 'archive_list_title' );
  $archive_list_posts = get_query_var( 'archive_list_posts' );
?>

<section class="archive-list <?php echo $archive_list_klass ?>">
  <h3 class="archive-list-title">
    <?php echo $archive_list_title ?>
  </h3>

  <div class="archive-list-body">
    <?php

      // We have a manually created list of posts
      //
      if ( ! empty( $archive_list_posts ) ) {
        $current_post = $post;

        foreach ($archive_list_posts as $post) {
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
