<?php
/**
 * Template Name: Archives Page
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Log_Lolla
 */
?>

<?php get_header() ?>

<section class="content archives">
  <h3 class="archives-title">
    <?php esc_html_e( 'Archives', 'log-lolla-pro' ); ?>
  </h3>

  <?php
    // Display the content of the page
    //
    if ( have_posts() ) {

      /* Start the Loop */
      while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/page/page-type', 'archive' );
      endwhile;

    } else {

      get_template_part( 'template-parts/post/post', 'none' );
    }

    wp_reset_postdata();
  ?>
</section>


<?php get_footer() ?>