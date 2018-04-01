<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Log_Lolla
 */


 if ( ! function_exists( 'log_lolla_display_topics_with_sparklines' ) ) {
   /**
    * Display topics (categories and tags) using sparklines
    *
    * @param  integer $sparklines           Number of sparklines. See @link https://github.com/aftertheflood/sparks
    * @param  integer $number_of_categories How many categories to show
    * @param  integer $number_of_tags       How many tags to show
    * @return string                        HTML
    */
   function log_lolla_display_topics_with_sparklines( $sparklines = 10, $number_of_categories = 5, $number_of_tags = 5) {
     $dates = log_lolla_get_first_post_and_last_post_date();
     if ( empty( $dates ) ) return;

     // Number of days since the first post
     $date1 = new DateTime( $dates[0] );
     $date2 = new DateTime( $dates[1] );
     $number_of_days = $date2->diff($date1)->format("%a");


   }
 }


 if ( ! function_exists( 'log_lolla_get_first_post_and_last_post_date' ) ) {
   /**
    * Get first post and last post published dates
    *
    * Returns smnthg like Array ( [0] => 2018-03-27 06:21:26 [1] => 2017-12-05 14:27:58 )
    *
    * @return array Of two dates
    */
   function log_lolla_get_first_post_and_last_post_date() {
     $posts = get_posts(
       array(
         'posts_per_page' => -1,
       )
     );
     if ( empty( $posts ) ) return;

     $first = reset( $posts );
     $last = end( $posts );
     if ( ( $first == false ) || ($last == false ) ) return;

     $ret = [];
     $ret[] = $last->post_date;
     $ret[] = $first->post_date;

     return $ret;
   }
 }


 if ( ! function_exists(' log_lolla_display_archives_by_year_and_month' ) ) {
   /**
    * Display archives by year and month
    *
    * @return string HTML
    */
   function log_lolla_display_archives_by_year_and_month() {
     $archives = log_lolla_get_archives_by_year_and_month();

     $dates = log_lolla_group_archives_by_year_and_month($archives);
     if ( empty( $dates ) ) return;

     $html = '';
     foreach ($dates as $year => $months) {
       $html .= '<div class="year-and-months">';
       $html .= '<div class="year"><a class="link" href="' . get_year_link( $year ) .'" title="' . $year .'">' . $year . '</a></div>';

       $grid = round( count($months) / 2 );
       $html .= '<div class="months grid-' . $grid . '">';

       foreach ($months as $month) {
         $html .= '<div class="month"><a class="link" href="' . get_month_link( $year, $month ) .'" title="' . $month .'">' . $month . '</a></div>';
       }

       $html .= '</div>';
       $html .= '</div>';
     }

     return $html;
   }
 }


 if ( ! function_exists(' log_lolla_group_archives_by_year_and_month' ) ) {
   /**
    * Groups archives into an array of years and months
    *
    * Return something like:
    *  Array ( [2017] => Array ( [0] => 12 ) [2018] => Array ( [0] => 01 [1] => 02 [2] => 03 ) )
    *
    * @param  array $archives An array of objects
    * @return array           An array of arrays
    */
   function log_lolla_group_archives_by_year_and_month($archives) {
     if ( empty( $archives ) ) return;

     // Get an array with timestamps like 2017-12-05 14:27:58
     $timestamps = array_map( function($d) { return $d->post_date; }, $archives );
     if ( empty( $timestamps ) ) return;

     // Get an array with dates like 2017-12, 2018-01, ...
     $dates = array_reverse( array_unique( array_map( function($d) { return date( 'Y-m', strtotime( $d ) ); }, $timestamps ) ) );
     if ( empty( $dates ) ) return;

     // Create a multidimensional array like [2017] => [12], [2018] => [01, 02, 03]
     $ret = [];
     foreach ($dates as $d) {
       $split = explode( '-', $d );
       $ret[$split[0]][] = $split[1];
     }

     return $ret;
   }
 }


 if ( ! function_exists( 'log_lolla_get_archives_by_year_and_month' ) ) {
   /**
    * Get all years and months when there were posts published
    *
    * Returns an array of objects like:
    *  Array ( [0] => stdClass Object ( [post_date] => 2017-12-05 14:27:58 [post_status] => publish ) [1] => stdClass Object ( [post_date] => 2017-12-06 07:13:21 [post_status] => publish ) ...
    *
    * @return array
    */
   function log_lolla_get_archives_by_year_and_month() {
     global $wpdb;

     $results = $wpdb->get_results(
       "SELECT `post_date`, `post_status` FROM $wpdb->posts WHERE `post_status` = 'publish' GROUP BY `post_date`",
       OBJECT
     );

     return $results;
   }
 }


 if (! function_exists( 'log_lolla_sticky_post_text' ) ) {
   /**
    * Returns a text / HTML for a sticky post
    *
    * @return string
    */
   function log_lolla_sticky_post_text() {
     /* translators: sticky post text. */
     return esc_html_x( 'Featured', 'sticky post text', 'log-lolla' );
   }
 }


if (! function_exists( 'log_lolla_word_count' ) ) {
  /**
   * Count words in a text
   *
   * @link http://www.thomashardy.me.uk/wordpress-word-count-function
   *
   * @return integer
   */
  function log_lolla_word_count( $text ) {
    return str_word_count( $text );
  }
}



if ( ! function_exists( 'log_lolla_get_post_first_image_url' ) ) {
  /**
  * Get the first image from each post and resize it.
  * Returns an URL
  *
  * @link https://css-tricks.com/snippets/wordpress/get-the-first-image-from-a-post/
  *
  * @return string $first_img.
  *
  */
 function log_lolla_get_post_first_image_url() {
 	global $post;
 	$first_img = '';
 	preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', do_shortcode( $post->post_content, 'gallery' ), $matches );
  $first_img = isset( $matches[1][0] ) ? $matches[1][0] : null;

 	if ( empty( $first_img ) ) {
 		return get_template_directory_uri() . '/assets/images/empty.png'; // path to default image.
 	}

	return $first_img;
 }
}


 if ( ! function_exists( 'log_lolla_add_arrow_to_link_title' ) ) {
   /**
    * Add arrow after the link title
    *
    * @return string
    */
   function log_lolla_add_arrow_to_link_title( $title ) {
    $arrow = log_lolla_get_arrow_html( 'right' );

    return $title . $arrow;
   }
 }



if ( ! function_exists( 'log_lolla_post_has_link' ) ) {
 /**
 * Return true if post has link
 *
 * @return boolen
 */
function log_lolla_post_has_link() {
  $has_title = the_title_attribute( 'echo=0');

  return ( ! empty( $has_title ) );
 }
}



if ( ! function_exists( 'log_lolla_get_link_title_for_link_post_format' ) ) {
  /**
  * Return link title for the link post format
  * Returns either the post title, or url where it points
  *
  * @return string
  */
 function log_lolla_get_link_title_for_link_post_format( $url ) {
   $has_title = the_title_attribute( 'echo=0');

   return ( ! empty( $has_title ) ) ? $has_title : $url;
  }
}


if ( ! function_exists( 'log_lolla_post_link_is_external' ) ) {
  /**
   * Return true is the post link is external
   *
   * @return boolean
   */
  function log_lolla_post_link_is_external() {
    $url = log_lolla_get_link_from_content();
    return ($url === apply_filters( 'the_permalink', get_permalink() ));
  }
}


if ( ! function_exists( 'log_lolla_get_link_from_content_class' ) ) {
  /**
   * Return a class for the link post format
   *
   * @return string
   */
  function log_lolla_get_link_from_content_class( $url ) {
    return ($url === apply_filters( 'the_permalink', get_permalink() )) ? 'local-link' : 'external-link';
  }
}


if ( ! function_exists( 'log_lolla_get_link_from_content' ) ) {
  /**
   * Return link from post content for the link post format
   * Returns either the link, or the post permalink if the link cannot be get
   *
   * @return string
   */
  function log_lolla_get_link_from_content() {
    $content = get_the_content();
  	$has_url = get_url_in_content( $content );

  	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
  }
}


if ( ! function_exists( 'log_lolla_post_class' ) ) {
  /**
   * Returns a custom post class
   *
   * @return string
   */
   function log_lolla_post_class() {
     // Changing the post grid based on how long a post & it's excerpt is
     $max_word_count = 50;

     $post_word_count = log_lolla_word_count( strip_tags( get_the_content() ) );
     $grid = ( $post_word_count < $max_word_count ) ? ' display-horizontal' : ' display-vertical';
     $klass = '';

     if ( has_excerpt() ) {
       $excerpt_word_count = log_lolla_word_count( strip_tags( get_the_excerpt() ) );
       $grid = ( $excerpt_word_count < $max_word_count ) ? ' display-horizontal' : ' display-vertical';
       $klass .= ' has-excerpt';
     }

     if ( has_post_thumbnail() ) {
       $klass .= ' has-thumbnail';
     }

     return $grid . $klass;
  }
}


if ( ! function_exists( 'log_lolla_header_class' ) ) {
  /**
   * Returns a custom header class
   *
   * @return string
   */
   function log_lolla_header_class() {
     $header_image = get_header_image() ? ' with-header-image' : ' without-header-image';
     $logo = has_custom_logo() ? ' with-logo' : ' without-logo';
     $header_text = display_header_text() ? ' with-header-text' : ' without-header-text';
     $header_menu = function_exists( 'log_lolla_header_menu_contents' ) ? ' with-header-menu' : ' without-header-menu';

     return $header_image . $logo . $header_text . $header_menu;
  }
}


 if ( ! function_exists( 'log_lolla_hamburger_icon' ) ) {
   /**
    * Return HTML markup for hamburger icon
    *
    * @return string
    *
    */
    function log_lolla_hamburger_icon() {
    	echo '<span class="icon">&#x2630;</span>';
    }
 }


 if ( ! function_exists( 'log_lolla_hamburger_icon_x' ) ) {
   /**
    * Return HTML markup for hamburger icon X
    *
    * @return string
    */
    function log_lolla_hamburger_icon_x() {
   	 echo '<span class="icon">&times;</span>';
    }
 }


if ( ! function_exists( 'log_lolla_get_arrow_html' ) ) {
 /**
  * Return HTML markup for an arrow
  *
  * @param [string] $direction the arrow direction liek top, left, right, bottom
  *
  * @return string
  */
 function log_lolla_get_arrow_html( $direction ) {
   return '<span class="arrow-with-triangle arrow-with-triangle--' . $direction . '">
 					  	<span class="arrow-with-triangle__line"></span>
 					  	<span class="triangle triangle-- arrow-with-triangle__triangle"></span>
 						</span>';
 }
}



if ( ! function_exists( 'log_lolla_header_menu_contents' ) ) {
  /**
  * What goes into the header menu
  * If this function is removed the header menu won't be displayed
  *
  * Example code for Header Menu
  *
  * <a href="#sidebar">
     	<span class="text">Archives</span>
     	<div class="arrows" style="display:flex;flex-wrap:wrap">
     		<span class="arrow-with-triangle arrow-with-triangle--bottom">
      					  	<span class="arrow-with-triangle__line"></span>
      					  	<span class="triangle triangle-- arrow-with-triangle__triangle"></span>
      						</span>
     		<span class="arrow-with-triangle arrow-with-triangle--bottom">
      					  	<span class="arrow-with-triangle__line"></span>
      					  	<span class="triangle triangle-- arrow-with-triangle__triangle"></span>
      						</span>
     		<span class="arrow-with-triangle arrow-with-triangle--bottom">
      					  	<span class="arrow-with-triangle__line"></span>
      					  	<span class="triangle triangle-- arrow-with-triangle__triangle"></span>
      						</span>
     	</div>
     </a>
  *
  * @return string
  *
  */
  function log_lolla_header_menu_contents() {
    if ( is_active_sidebar( 'sidebar-2' ) ) {
      dynamic_sidebar( 'sidebar-2' );
    } else {
      /* translators: empty header menu text. */
      echo esc_html_x( 'Use the `Header Menu` widget to define what content goes here', 'empty header menu text', 'log-lolla' );
    }
  }
}


if ( ! function_exists( 'log_lolla_post_permalink' ) ) {
  /**
   * Prints HTML with meta information for the current post link
   *
   */
  function log_lolla_post_permalink() {
    printf(
      '<div class="permalink"><a class="link" href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute( 'echo=0') . '">%s</a></div>',
      /* translators: %s: post permalink. */
      esc_html_x( '&infin;', 'post permalink', 'log-lolla' )
    );
  }
}


if ( ! function_exists( 'log_lolla_post_author_linking_to_post' ) ) {
  /**
   * Prints HTML with meta information for the current post author
   *
   */
  function log_lolla_post_author_linking_to_post() {
    printf(
      '<div class="byline"><span class="author vcard"><a class="link" href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute( 'echo=0') . '">%s' . esc_html( get_the_author() ) . '</a></span></div>',
      /* translators: %s: status update by. */
      esc_html_x( 'status update by ', 'status update by', 'log-lolla' )
    );
  }
}



if ( ! function_exists( 'log_lolla_post_author' ) ) {
  /**
   * Prints HTML with meta information for the current post author
   *
   */
  function log_lolla_post_author() {
    printf(
      '<div class="byline">%s <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></div>',
			/* translators: %s: post author. */
			esc_html_x( 'by', 'post author', 'log-lolla' )
		);
  }
}


if ( ! function_exists( 'log_lolla_post_date_and_time' ) ) {
  /**
   * Prints HTML with meta information for the current post-date/time
   *
   * The date format is set on the admin interface
   * Preferably to 'M j, y'
   */
  function log_lolla_post_date_and_time() {
    printf(
			'<div class="posted-on"><time class="date published" datetime="%1$s">%2$s</time></div>',
			esc_attr( get_the_date( 'c' ) . ', ' .  get_the_time( 'c' ) ),
			esc_html( get_the_date() . ', ' . get_the_time() )
		);
  }
}



if ( ! function_exists( 'log_lolla_post_date' ) ) {
  /**
   * Prints HTML with meta information for the current post-date/time
   *
   * The date format is set on the admin interface
   * Preferably to 'M j, y'
   */
  function log_lolla_post_date() {
    printf(
			'<div class="posted-on"><time class="date published" datetime="%1$s">%2$s</time></div>',
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);
  }
}


if (! function_exists( 'log_lolla_post_categories' ) ) {
  /**
   * Prints HTML with meta information for the categories
   */
  function log_lolla_post_categories() {
    $categories_list = get_the_category_list( esc_html__( ', ', 'log-lolla' ) );

    if ( $categories_list ) {
      /* translators: 1: list of categories. */
      printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s. ', 'log-lolla' ) . '</span>', $categories_list ); // WPCS: XSS OK.
    }
  }
}


if (! function_exists( 'log_lolla_post_tags' ) ) {
  /**
   * Prints HTML with meta information for the tags
   */
  function log_lolla_post_tags() {
    $categories_list = get_the_category_list( esc_html__( ', ', 'log-lolla' ) );

    /* translators: used between list items, there is a space after the comma */
    $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'log-lolla' ) );
    if ( $tags_list ) {
      /* translators: 1: list of tags. */
      printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s. ', 'log-lolla' ) . '</span>', $tags_list ); // WPCS: XSS OK.
    }
  }
}


if (! function_exists( 'log_lolla_post_edit_link' ) ) {
  /**
   * Prints HTML with meta information for the edit link
   */
  function log_lolla_post_edit_link() {
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
  }
}
?>
