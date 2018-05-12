<?php
  /**
   * Displaying navigation for paginated post content
   *
   * @link https://codex.wordpress.org/Styling_Page-Links
   *
   * @package Log_Lolla
   */
?>

<?php
  /**
   * Cannot be wrapped into an <ul>,<li> structure ....
   */
  $wp_link_pages = wp_link_pages( array(
    'before' => '<span class="page-links-title">' . __( 'Pages:', 'log-lolla' ) . '</span><div class="ul page-links">',
    'after' => '</div>',
    'separator' => '&nbsp;',
    'echo' => 0
  ) );
?>

<?php if ( ! empty( $wp_link_pages ) ) { ?>
  <nav class="post-paginated-content">
    <h3 class="hidden">Paginated content navigation</h3>

    <div class="text">
      <?php echo $wp_link_pages; ?>
    </div>
  </nav>
<?php } ?>
