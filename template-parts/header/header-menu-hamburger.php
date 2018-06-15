<?php
  /**
   * Displaying a navigation menu icon in the header
   * It is only displayed if there is a custom function to provide content for the header menu
   *
   * @package Log_Lolla_Pro
   */

   if ( function_exists( 'log_lolla_pro_display_header_menu_contents' ) ) {
     ?>

    <nav class="menu-hamburger menu-hamburger--closed">
      <h3 class="hidden">Hamburger Menu Icon</h3>

      <div class="hamburger-icon hamburger-icon--closed">
        <span class="icon">&#x2630;</span>
      </div>

      <div class="hamburger-icon hamburger-icon--opened">
        <span class="icon">&times;</span>
      </div>
    </nav>

    <?php
  }
  ?>
