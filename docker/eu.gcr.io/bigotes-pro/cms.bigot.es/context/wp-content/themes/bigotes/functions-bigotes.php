<?php
/**
 * Function describe for Bigotes template
 * 
 * @package bigotes
 */

// add_action( 'wp_enqueue_scripts', 'envo_magazine_child_enqueue_styles' );
// function envo_magazine_child_enqueue_styles() {
//   wp_enqueue_style( 'envo-magazine-stylesheet', get_template_directory_uri() . '/style.css', array( 'bootstrap' ) );
// 	wp_enqueue_style( 'envo-magazine-child-style', get_stylesheet_uri(), array( 'envo-magazine-stylesheet' ) );
// }

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
		<a class="author-meta-name" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>">
			<?php the_author(); ?>
		</a>
		<span class="author-meta-by"><?php esc_html_e( 'el', 'envo-magazine' ); ?></span>
		<span class="author-meta-date"><?php echo esc_html( get_the_date() ); ?></span>
	</div>
<?php	
}

add_action( 'envo_magazine_generate_footer', 'envo_magazine_generate_construct_footer' );

function envo_magazine_generate_construct_footer() {
	?>
	<div class="footer-legal-note text-center">
		<?php 
		printf( esc_html__( '%s' ), '<a href="/condiciones-generales-de-uso">Condiciones de uso</a>' );
		?>
		<?php 
		printf( esc_html__( '%s' ), '<a href="/politica-de-cookies">Política de cookies</a>' );
		?>
		<?php 
		printf( esc_html__( '%s' ), '<a href="/">Redacción</a>' );
		?>
		<?php 
		printf( esc_html__( '%s' ), '<a href="mailto:contacto@bigot.es" target="_blank">Contacto</a>' );
		?>
	</div>
	<div class="footer-social-icons text-center">	
		<!-- The social media icon bar -->
		<ul class="footer-social-bar">
			<li class="social-footer-icon facebook">
				<a href="https://www.facebook.com/somosbigotes"><i class="fa fa-facebook"></i></a>
			</li>
			<li class="social-footer-icon twitter">
				<a href="https://twitter.com/somosbigotes"><i class="fa fa-twitter"></i></a>
			</li>
			<li class="social-footer-icon instagram">
				<a href="https://www.instagram.com/bigot.es"><i class="fa fa-instagram"></i></a>
			</li>
			<li class="social-footer-icon telegram">
				<a href="https://t.me/BigotesTelegram"><i class="fa fa-telegram"></i></a>
			</li>
			<li class="social-footer-icon youtube">
				<a href="https://www.youtube.com/channel/UClmcYJZDVty5QWqT-zuJV6Q"><i class="fa fa-youtube-play"></i></a>
			</li>
			<li class="social-footer-icon podcast">
				<a href="https://www.ivoox.com/escuchar-bigotes_nq_484298_1.html"><i class="fa fa-podcast"></i></a>
			</li>
		</ul>
	</div>
	<div class="footer-credits-text text-center">
		<?php 
		printf( esc_html__( '%s %s %s' ), 'Copyright', date("Y"), '<a href="/">bigot.es</a>' );
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

function user_contact_add_twitter( $user_contact ) {
	$user_contact['twitter'] = __( 'Twitter Username' );

	return $user_contact;
}
add_filter( 'user_contactmethods', 'user_contact_add_twitter' );

function user_contact_add_psn( $user_contact ) {
	$user_contact['psn'] = __( 'PlayStation Network' );

	return $user_contact;
}
add_filter( 'user_contactmethods', 'user_contact_add_psn' );

function user_contact_add_xbox( $user_contact ) {
	$user_contact['xbox'] = __( 'Xbox Live' );

	return $user_contact;
}
add_filter( 'user_contactmethods', 'user_contact_add_xbox' );

function user_contact_add_nintendo( $user_contact ) {
	$user_contact['nintendo'] = __( 'Nintendo' );

	return $user_contact;
}
add_filter( 'user_contactmethods', 'user_contact_add_nintendo' );