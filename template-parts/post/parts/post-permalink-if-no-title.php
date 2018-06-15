<?php
  /**
   * Displaying post permalink if there is no post title
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  if ( ! log_lolla_pro_post_has_link() ) {
    get_template_part( 'template-parts/post/parts/post', 'permalink' );
  }
?>
