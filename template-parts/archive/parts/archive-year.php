<?php
  /**
   * Displaying a link to an archive year
   *
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  $archive_year = get_query_var( 'archive_year' );
?>

<div class="year">
  <a class="link" href="<?php echo get_year_link( $archive_year ); ?>" title="<?php echo $archive_year ?>">
    <?php echo $archive_year ?>
  </a>
</div>
