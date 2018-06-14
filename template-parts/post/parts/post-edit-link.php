<?php
  /**
   * Displaying post edit link
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  $klass = '';
?>

<aside class="post-edit-link">
  <h3 class="hidden">Article edit link</h3>

  <?php
    edit_post_link(
     sprintf(
       wp_kses(
         /* translators: %s: Name of current post. Only visible to screen readers */
         __( 'Edit <span class="screen-reader-text">%s</span>', 'log-lolla' ),
         array(
           'span' => array(
             'class' => array(),
           ),
         )
       ),
       get_the_title()
     ),
     '<span class="edit-link">',
     '</span>'
   );
  ?>
</aside>
