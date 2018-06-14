<?php
  /**
   * Displaying archive title
   *
   * The archive type is removed by a filter (`Category: News` => `News`)
   *
   * @package Log_Lolla_Pro
   */

  $archive_title = get_query_var( 'archive_title' );

  if ( ! empty( $archive_title ) ) {
    printf(
      '%1$s',
      $archive_title
    );
  } else {
    the_archive_title( '', '' );
  }
?>
