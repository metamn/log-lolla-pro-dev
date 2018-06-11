<?php
  /**
   * Displaying a list of topics of an archive
   *
   * The corresponding SCSS code can be found in `assets/scss/parts/archive-list`
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  $archive_list_topics_klass = get_query_var( 'archive_list_topics_klass' );
  $archive_list_topics_title = get_query_var( 'archive_list_topics_title' );
  $archive_list_topics_topics = get_query_var( 'archive_list_topics_topics' );
?>

<section class="archive-list archive-list--<?php echo $archive_list_topics_klass ?>">
  <h3 class="archive-list-title">
    <?php echo $archive_list_topics_title ?>
  </h3>

  <div class="archive-list-body">
    <?php echo $archive_list_topics_topics ?>
  </div>
</section>
