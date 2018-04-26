<?php
  /**
   * Displaying archive title
   *
   * The archive type is removed by a filter (`Category: News` => `News`)
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<?php
  the_archive_title( '<h3 class="archive-title">', '</h3>' );
?>
