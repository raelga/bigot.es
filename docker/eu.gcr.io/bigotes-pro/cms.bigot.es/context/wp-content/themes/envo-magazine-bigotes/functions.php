<?php
/**
 * Function describe for Envo Magazine bigot.es child
 * 
 * @package envo-magazine-bigotes
 */

add_action( 'wp_enqueue_scripts', 'envo_magazine_child_enqueue_styles' );
function envo_magazine_child_enqueue_styles() {
  
  wp_enqueue_style( 'envo-magazine-stylesheet', get_template_directory_uri() . '/style.css', array( 'bootstrap' ) );
	wp_enqueue_style( 'envo-magazine-child-style', get_stylesheet_uri(), array( 'envo-magazine-stylesheet' ) );

}
