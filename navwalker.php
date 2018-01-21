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

        public function start_lvl( &$output, $depth = 0, $args = array() ) {
           
            $output .= "<div class='navbar-dropdown'>";
        }

        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

            $liClasses = 'navbar-item '.$item->title;

            $hasChildren = $args->walker->has_children;
            $liClasses .= $hasChildren? " has-dropdown is-hoverable": "";

            if($hasChildren){
                $output .= "<div class='".$liClasses."'>";
                $output .= "\n<a class='navbar-link' href='".$item->url."'>".$item->title."</a>";
            }
            else {
                $output .= "<a class='".$liClasses."' href='".$item->url."'>".$item->title;
            }

            // Adds has_children class to the item so end_el can determine if the current element has children
            if ( $hasChildren ) {
                $item->classes[] = 'has_children';
            }
        }
        
        public function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ){

            if(in_array("has_children", $item->classes)) {

                $output .= "</div>";
            }
            $output .= "</a>";
        }

        public function end_lvl (&$output, $depth = 0, $args = array()) {

            $output .= "</div>";
        }
    }
?>