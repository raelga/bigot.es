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

function the_archive_title_name( $before = '', $after = '' ) {
    $title = get_the_archive_title();

    if ( ! empty( $title ) ) {
      echo $before . trim(strstr($title, ' ')) . $after;
    }
}

function envo_magazine_widget_date_comments( ) {
	?>
	<span class="posted-date">
		<?php echo esc_html( get_the_date() ); ?>
	</span>
	<?php
}

function bigotes_author_meta( ) {
?>
	<div class="author-meta">
		<span class="author-meta-by"><?php esc_html_e( 'Por', 'envo-magazine' ); ?></span>
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>">
			<?php the_author(); ?>
		</a>
		<span class="author-meta-by"><?php esc_html_e( 'el', 'envo-magazine' ); ?></span>
		<?php echo esc_html( get_the_date() ); ?>
	</div>
<?php	
}

add_action( 'envo_magazine_generate_footer', 'envo_magazine_generate_construct_footer' );

function envo_magazine_generate_construct_footer() {
	?>
	<div class="footer-credits-text text-center">
		<?php 
		printf( esc_html__( '%s' ), '<a href="https://cms.bigot.es/">Condiciones de uso</a>' );
		?>
		<span class="sep"> | </span>
		<?php 
		printf( esc_html__( '%s' ), '<a href="https://cms.bigot.es/politica-de-cookies/">Política de cookies</a>' );
		?>
		<span class="sep"> | </span>
		<?php 
		printf( esc_html__( '%s' ), '<a href="https://cms.bigot.es/">Redacción</a>' );
		?>
		<span class="sep"> | </span>
		<?php 
		printf( esc_html__( '%s' ), '<a href="https://cms.bigot.es/">Contacto</a>' );
		?>
		<hr>
		<?php 
		printf( esc_html__( '%s %s' ), date("Y"), '<a href="https://cms.bigot.es/">bigot.es</a>' );
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
