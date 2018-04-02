<?php

/**
 * Custom shortcodes
 *
 * @link https://codex.wordpress.org/Shortcode_API
 *
 * @package Log_Lolla
 */


if (! function_exists( 'log_lolla_create_custom_shortcode_person' ) ) {
  /**
   * Create custom shortcode for persons
   *
   * Example: [person name="John Doe"]
   *
   * It needs the People custom post type
   *
   * @param  Array $attributes The attributes of the shortcode
   * @return string            HTML
   */
  function log_lolla_create_custom_shortcode_person( $attributes ) {
    // Default attributes
    $default_attributes = array(
      'name' => 'The person name'
    );

    // Parse attributes
    $attrs = shortcode_atts( $default_attributes, $attributes );
    $name = $attrs['name'];

    // Get the person details from the database
    $person = get_page_by_title( $name, OBJECT, 'people');

    if ( ! empty( $person ) ) {
      $link = get_permalink( $person );

      if ( has_post_thumbnail( $person->ID ) ) {
        $image = get_the_post_thumbnail( $person->ID, 'thumbnail' );
      } else {
        $image = '<img src="' . get_stylesheet_directory_uri() . '/assets/images/brutalist_line_SVGicon_author2-64x64.png" title="' . $name . '">';
      }
    }

    // Return HTML
    ob_start();
    ?>

    <aside class="person">
      <h3 class="person__name">
        <?php if ( isset( $link ) ) { ?>
          <a class="link" href="<?php echo $link ?>" title="<?php echo $name ?>"><?php echo $name ?></a>
        <?php } else { ?>
          <?php echo $name ?>
        <?php } ?>
      </h3>

      <?php if ( isset( $link ) ) { ?>
        <figure class="figure">
          <a class="link" href="<?php echo $link ?>" title="<?php echo $name ?>">
            <?php echo $image ?>
          </a>
        </figure>
      <?php } ?>
    </aside>

    <?php
    return ob_get_clean();
  }

  add_shortcode( 'log-lolla-person', 'log_lolla_create_custom_shortcode_person' );
}

?>
