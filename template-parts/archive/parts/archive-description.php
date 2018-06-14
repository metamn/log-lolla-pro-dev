<?php
  /**
   * Displaying archive description
   *
   *
   * @package Log_Lolla_Pro
   */

  $archive_description = get_query_var( 'archive_description' );

  if ( ! empty( $archive_description ) ) {
    printf(
      '%1$s',
      $archive_description
    );
  } else {
    the_archive_description( '', '' );
  }
?>
