<?php if ( ! empty( $pictogram['icon'] ) ) { ?>
  <div class="pictogram__icon">
    <?php
      $icon = array(
        'name' => $pictogram['icon'],
        'title' => $pictogram['icon']
      );

      //include dirname(__DIR__) . '/../structure/icon/icon.php';
    ?>
  </div>
<?php } ?>
