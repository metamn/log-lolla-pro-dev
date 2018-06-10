<?php
  /**
   * Displaying archive title
   *
   * The archive type is removed by a filter (`Category: News` => `News`)
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  $archive_title = get_query_var( 'archive_title' );

  if ( ! empty( $archive_title ) ) {
    printf(
      '<h3 class="archive-title">%1$s</h3>',
      $archive_title
    );
  } else {
    the_archive_title( '<h3 class="archive-title">', '</h3>' );
  }
?>
