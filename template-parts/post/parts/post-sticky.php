<?php
  /**
   * Displaying a sticky post
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  if ( is_sticky() ) { ?>
    <div class="post-sticky">
      <span class="text">
        <?php
          echo esc_html_x( 'Featured', 'sticky post text', 'log-lolla' );
        ?>
      </span>
    </div>
<?php } ?>
