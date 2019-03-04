<?php
/**
 * Bulma-Navwalker
 *
 * @package Bulma-Navwalker
 */

/**
 * Class Name: Navwalker
 * Plugin Name: Bulma Navwalker
 * Plugin URI:  https://github.com/Poruno/Bulma-Navwalker
 * Description: An extended Wordpress Navwalker object that displays Bulma framework's Navbar https://bulma.io/ in Wordpress.
 * Author: Carlo Operio - https://www.linkedin.com/in/carlooperio/, Bulma-Framework
 * Author URI: https://github.com/wp-bootstrap
 * License: GPL-3.0+
 * License URI: https://github.com/Poruno/Bulma-Navwalker/blob/master/LICENSE
 */

	class Navwalker extends Walker_Nav_Menu {

        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

            $lowerCaseTitle = strtolower($item->title);
            $linkTitle = str_replace(' ', '', $lowerCaseTitle);
            $liClasses = 'navbar-item '.$linkTitle;

            $hasChildren = $args->walker->has_children;
            $liClasses .= $hasChildren ? " has-dropdown is-hoverable": "";

            $linkClasses = $hasChildren ? "" : "is-arrowless";

            $output .= '<li class="'.$liClasses.'">';

            $output .= '<a class="navbar-link '.$linkClasses.'" href="'.$item->url.'">'.$item->title.'</a>';

            // Adds has_children class to the item so end_el can determine if the current element has children
            if ( $hasChildren ) {
                $item->classes[] = "has_children";
            }
        }

        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $output .= '<ul class="navbar-dropdown">';
        }

        public function end_lvl (&$output, $depth = 0, $args = array()) {
            $output .= "</ul>";
        }

        public function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ){

            $output .= "</li>";

        }

    }
?>