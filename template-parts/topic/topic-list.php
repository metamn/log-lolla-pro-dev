<?php
  /**
   * Template part for displaying a list of topics
   *
   * @package Log_Lolla_Pro
   */
?>


<?php
  $topic_list_klass = get_query_var( 'topic_list_klass' );
  $topic_list_title = get_query_var( 'topic_list_title' );
  $topic_list_items = get_query_var( 'topic_list_items' );
?>

<section class="topic-list <?php echo $topic_list_klass ?>">
  <h3 class="topic-list-title">
    <?php echo $topic_list_title ?>
  </h3>

  <div class="topic-list-body">
    <?php echo $topic_list_items ?>
  </div>
</section>
