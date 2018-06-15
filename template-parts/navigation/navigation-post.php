<?php
  /**
   * Template part for displaying navigation inside a post
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  $arrow_left = log_lolla_pro_get_arrow_html( 'left' );
  $prev = get_previous_post_link("$arrow_left%link");

  $arrow_right = log_lolla_pro_get_arrow_html( 'right' );
  $next = get_next_post_link("$arrow_right%link");

  if ( ! empty( $prev ) || ! empty( $next ) ) { ?>

    <nav class="navigation post-navigation">
      <h3 class="hidden">Post navigation</h3>

      <ul class="ul">
        <?php
          if (! empty( $prev ) ) { ?>
            <li class="li">
              <?php echo $prev; ?>
            </li>
          <?php }

          if ( ! empty( $next ) ) { ?>
            <li class="li">
              <?php echo $next; ?>
            </li>
          <?php }
        ?>
      </ul>
    </nav>
  <?php }
?>
