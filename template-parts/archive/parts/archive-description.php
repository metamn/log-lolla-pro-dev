<?php
  /**
   * Displaying archive description
   *
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  $archive_description = get_query_var( 'archive_description' );

  if ( ! empty( $archive_description ) ) {
    printf(
      '<div class="archive-description">%1$s</div>',
      $archive_description
    );
  } else {
    the_archive_description( '<div class="archive-description">', '</div>' );
  }
?>
