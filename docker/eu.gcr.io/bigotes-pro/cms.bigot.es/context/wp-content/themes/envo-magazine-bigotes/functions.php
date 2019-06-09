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


add_action( 'envo_magazine_generate_footer', 'envo_magazine_generate_construct_footer' );

function envo_magazine_generate_construct_footer() {
	?>
	<div class="footer-credits-text text-center">
		<?php 
		printf( esc_html__( '%s' ), '<a href="https://google.com/">Condiciones de uso</a>' );
		?>
		<span class="sep"> | </span>
		<?php 
		printf( esc_html__( '%s' ), '<a href="https://google.com/">Política de cookies</a>' );
		?>
		<span class="sep"> | </span>
		<?php 
		printf( esc_html__( '%s' ), '<a href="https://google.com/">Redacción</a>' );
		?>
		<span class="sep"> | </span>
		<?php 
		printf( esc_html__( '%s' ), '<a href="https://google.com/">Contacto</a>' );
		?>
		<hr>
		<?php 
		printf( esc_html__( '%s %s' ), date("Y"), '<a href="https://google.com/">bigot.es</a>' );
		?>
	</div> 
	<?php
}

register_sidebar(
	array(
		'name'			 => esc_html__( 'bigot.es Footer' ),
		'id'			 => 'bigotes-footer',
		'before_widget'	 => '<div id="%1$s" class="widget %2$s col-md-12">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<div class="widget-title"><h3>',
		'after_title'	 => '</h3></div>',
	)
);