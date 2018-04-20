<?php
  /**
   * People template tags for this theme
   *
   * Contains custom template tags related to people custom post type
   *
   * @link https://codex.wordpress.org/Template_Tags
   *
   * @package Log_Lolla
   */


if ( ! function_exists( 'log_lolla_display_people_with_post_count' ) ) {
  /**
   * Display People with post count
   *
   * @param  integer $number_of_people How many people to display
   * @return string                    HTML
   */
  function log_lolla_display_people_with_post_count( $number_of_people = 5 ) {
    $people = log_lolla_get_most_popular_people( $number_of_people );
    if ( empty( $people ) ) return;

    $html = '';
    $html .= log_lolla_display_widget_body( 'people', 'person-with-count', $people, function( $item ) {
      return log_lolla_display_person_with_post_count( $item );
    });

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_display_person_with_post_count') )  {
  /**
   * Display person and post count
   *
   * @param  Object $item Contains the person id and the count of the person's posts
   * @return string       HTML
   */
  function log_lolla_display_person_with_post_count( $item ) {
    if ( empty( $item ) ) return;

    $person = get_post( $item->person );
    $count = $item->post_count;

    $html = '';
    $html .= log_lolla_display_person( $person );
    $html .= '<span class="post-count">' . $count . '</span>';

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_get_most_popular_people' ) ) {
  /**
   * Get most popular people
   *
   * @param  integer $number_of_posts How many posts to return
   * @return Array                    An array of posts
   */
  function log_lolla_get_most_popular_people( $number_of_posts = 5 ) {
    $people = get_posts(
      array(
        'post_type' => 'people',
        'post_status' => 'publish',
        'posts_per_page' => -1,
      )
    );
    if ( empty( $people ) ) return;

    // Get posts of people
    //
    $posts_of_people = [];
    foreach ( $people as $person ) {
      $posts_of_a_person = log_lolla_get_posts_of_a_person( $person );

      $entry = new stdClass;
      $entry->person = $person->ID;
      $entry->post_count = count($posts_of_a_person);
      $posts_of_people[] = $entry;
    }

    // Sorst posts of people
    //
    usort( $posts_of_people, function( $a, $b ) {
      return ( $a->post_count < $b->post_count );
    });

    // Return the first x items only
    //
    return array_slice( $posts_of_people, 0, $number_of_posts );
  }
}


if ( ! function_exists( 'log_lolla_get_posts_of_a_person' ) ) {
  /**
   * Get posts of a person
   *
   * @param  Object $person A post of type 'person'
   * @return Array          A list of posts
   */
  function log_lolla_get_posts_of_a_person( $person ) {
    if ( empty( $person ) ) return;

    return get_posts(
      array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => $person->post_name
          )
        )
      )
    );
  }
}


if ( ! function_exists( 'log_lolla_display_person' ) ) {
  /**
   * Display a person
   *
   * Based on either a database entry or from a simple name
   *
   * @param  Object $person The person object
   * @param  string $name   The person name
   * @return string         HTML
   */
  function log_lolla_display_person( $person, $name = '' ) {
    if ( empty( $person ) && empty( $name )) return;

    return empty( $person ) ? log_lolla_display_person_from_name( $name ) : log_lolla_display_person_from_database( $person );
  }
}


if ( ! function_exists( 'log_lolla_display_person_from_name' ) ) {
  /**
   * Display person from name only
   *
   * Used when there is no `person` entry in the database
   *
   * @param  string $name   The person name
   * @return string         HTML
   */
  function log_lolla_display_person_from_name( $name ) {
    if ( empty( $name ) ) return;

    $image = '<img src="' . get_stylesheet_directory_uri() . '/assets/images/brutalist_line_SVGicon_author2-64x64.png" title="' . $name . '">';

    // Return HTML
    ob_start();
    ?>

    <aside class="person">
      <h3 class="person__name"><?php echo $name ?></h3>

      <figure class="person__avatar figure">
        <?php echo $image ?>
      </figure>
    </aside>

    <?php
    return ob_get_clean();
  }
}


if ( ! function_exists( 'log_lolla_display_person_from_database' ) ) {
  /**
   * Display a person from the database
   *
   * @param  Object $person The person object
   * @return string         HTML
   */
  function log_lolla_display_person_from_database( $person ) {
    if ( empty( $person ) ) return;

    $name = $person->post_title;
    $link = get_permalink( $person );

    if ( has_post_thumbnail( $person->ID ) ) {
      $image = get_the_post_thumbnail( $person->ID, 'thumbnail' );
    } else {
      $image = '<img src="' . get_stylesheet_directory_uri() . '/assets/images/brutalist_line_SVGicon_author2-64x64.png" title="' . $name . '">';
    }

    // Return HTML
    ob_start();
    ?>

    <aside class="person">
      <h3 class="person__name">
        <a class="link" href="<?php echo $link ?>" title="<?php echo $name ?>"><?php echo $name ?></a>
      </h3>

      <figure class="person__avatar figure">
        <a class="link" href="<?php echo $link ?>" title="<?php echo $name ?>">
          <?php echo $image ?>
        </a>
      </figure>
    </aside>

    <?php
    return ob_get_clean();
  }
}


?>
