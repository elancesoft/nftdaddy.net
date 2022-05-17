<?php

class MenuWalker extends Walker_Nav_Menu
{
  public function start_lvl(&$output, $depth = 0, $args = array())
  {
    $indent = str_repeat("\t", $depth);
    $output .= $indent.'<div class="sub-menu-wrap"><ul class="sub-menu">';
  }
  public function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul></div>\n";
  }

  public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    // check submenu
    if(in_array('menu-item-has-children', $classes)) {
      $classes[] = 'dropdown';
    }
        
    if( 0 == $depth) {
      $classes[] = 'relative dropdown lg:mr-4';
    } else {
      $classes[] = 'navbar__subitem';
    }
    /**
    * Filter the arguments for a single nav menu item.
    *
    * @since 4.4.0
    *
    * @param array  $args  An array of arguments.
    * @param object $item  Menu item data object.
    * @param int    $depth Depth of menu item. Used for padding.
    */
    $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

    /**
    * Filter the CSS class(es) applied to a menu item's list item element.
    *
    * @since 3.0.0
    * @since 4.1.0 The `$depth` parameter was added.
    *
    * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
    * @param object $item    The current menu item.
    * @param array  $args    An array of {@see wp_nav_menu()} arguments.
    * @param int    $depth   Depth of menu item. Used for padding.
    */
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    /**
    * Filter the ID applied to a menu item's list item element.
    *
    * @since 3.0.1
    * @since 4.1.0 The `$depth` parameter was added.
    *
    * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
    * @param object $item    The current menu item.
    * @param array  $args    An array of {@see wp_nav_menu()} arguments.
    * @param int    $depth   Depth of menu item. Used for padding.
    */
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $class_names .'>';

    $atts = array();
    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

    /**
    * Filter the HTML attributes applied to a menu item's anchor element.
    *
    * @since 3.6.0
    * @since 4.1.0 The `$depth` parameter was added.
    *
    * @param array $atts {
    *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
    *
    *     @type string $title  Title attribute.
    *     @type string $target Target attribute.
    *     @type string $rel    The rel attribute.
    *     @type string $href   The href attribute.
    * }
    * @param object $item  The current menu item.
    * @param array  $args  An array of {@see wp_nav_menu()} arguments.
    * @param int    $depth Depth of menu item. Used for padding.
    */
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
      if ( ! empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    /** This filter is documented in wp-includes/post-template.php */
    $title = apply_filters( 'the_title', $item->title, $item->ID );

    /**
    * Filter a menu item's title.
    *
    * @since 4.4.0
    *
    * @param string $title The menu item's title.
    * @param object $item  The current menu item.
    * @param array  $args  An array of {@see wp_nav_menu()} arguments.
    * @param int    $depth Depth of menu item. Used for padding.
    */
    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

    $item_output = $args->before;
    if($depth == 0) {
      $item_output .= '<a class="lg:p-5 px-5 pt-5 flex items-center text-base text-coolGray-600 hover:text-indigo-500 font-medium"'. $attributes .'>';
    } else {
      $item_output .= '<a class="navbar__sublink js-navbar-sublink"'. $attributes .'>';
    }

      $item_output .= $args->link_before . $title . $args->link_after;
    
    $item_output .= '</a>';
    $item_output .= $args->after;

    /**
    * Filter a menu item's starting output.
    *
    * The menu item's starting output only includes `$args->before`, the opening `<a>`,
    * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
    * no filter for modifying the opening and closing `<li>` for a menu item.
    *
    * @since 3.0.0
    *
    * @param string $item_output The menu item's starting HTML output.
    * @param object $item        Menu item data object.
    * @param int    $depth       Depth of menu item. Used for padding.
    * @param array  $args        An array of {@see wp_nav_menu()} arguments.
    */
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  public function walk( $elements, $max_depth, ...$args ) {
    $output = '';

    // Invalid parameter or nothing to walk.
    if ( $max_depth < -1 || empty( $elements ) ) {
        return $output;
    }

    $parent_field = $this->db_fields['parent'];

    // Flat display.
    if ( -1 == $max_depth ) {
        $empty_array = array();
        foreach ( $elements as $e ) {
            $this->display_element( $e, $empty_array, 1, 0, $args, $output );
        }
        return $output;
    }

    /*
     * Need to display in hierarchical order.
     * Separate elements into two buckets: top level and children elements.
     * Children_elements is two dimensional array, eg.
     * Children_elements[10][] contains all sub-elements whose parent is 10.
     */
    $top_level_elements = array();
    $children_elements  = array();
    foreach ( $elements as $e ) {
        if ( empty( $e->$parent_field ) ) {
            $top_level_elements[] = $e;
        } else {
            $children_elements[ $e->$parent_field ][] = $e;
        }
    }

    /*
     * When none of the elements is top level.
     * Assume the first one must be root of the sub elements.
     */
    if ( empty( $top_level_elements ) ) {

        $first = array_slice( $elements, 0, 1 );
        $root  = $first[0];

        $top_level_elements = array();
        $children_elements  = array();
        foreach ( $elements as $e ) {
            if ( $root->$parent_field == $e->$parent_field ) {
                $top_level_elements[] = $e;
            } else {
                $children_elements[ $e->$parent_field ][] = $e;
            }
        }
    }

    foreach ( $top_level_elements as $e ) {
        $this->display_element( $e, $children_elements, $max_depth, 0, $args, $output );
    }

    /*
     * If we are displaying all levels, and remaining children_elements is not empty,
     * then we got orphans, which should be displayed regardless.
     */
    if ( ( 0 == $max_depth ) && count( $children_elements ) > 0 ) {
        $empty_array = array();
        foreach ( $children_elements as $orphans ) {
            foreach ( $orphans as $op ) {
                $this->display_element( $op, $empty_array, 1, 0, $args, $output );
            }
        }
    }

    return $output;
}
}
