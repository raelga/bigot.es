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

function the_archive_title_name($before = '', $after = '')
{
	$title = get_the_archive_title();

	if (!empty($title)) {
		echo $before . trim(strstr($title, ' ')) . $after;
	}
}

function envo_magazine_widget_date_comments()
{
	?>
	<span class="posted-date">
		<?php echo esc_html(get_the_date()); ?>
	</span>
<?php
}

function bigotes_author_meta()
{
	?>
	<div class="author-meta">
		<span class="author-meta-by"><?php esc_html_e('Por', 'envo-magazine'); ?></span>
		<a class="author-meta-name" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename'))); ?>">
			<?php the_author(); ?>
		</a>
		<span class="author-meta-by"><?php esc_html_e('el', 'envo-magazine'); ?></span>
		<span class="author-meta-date"><?php echo esc_html(get_the_date()); ?></span>
	</div>
<?php
}

add_action('envo_magazine_generate_footer', 'envo_magazine_generate_construct_footer');

function envo_magazine_generate_construct_footer()
{
	?>
	<div class="footer-legal-note text-center">
		<?php
		printf(esc_html__('%s'), '<a href="/condiciones-generales-de-uso">Condiciones de uso</a>');
		?>
		<?php
		printf(esc_html__('%s'), '<a href="/politica-de-cookies">Política de cookies</a>');
		?>
		<?php
		printf(esc_html__('%s'), '<a href="/">Redacción</a>');
		?>
		<?php
		printf(esc_html__('%s'), '<a href="mailto:contacto@bigot.es" target="_blank">Contacto</a>');
		?>
	</div>
	<div class="footer-social-icons text-center">
		<!-- The social media icon bar -->
		<ul class="footer-social-bar">
			<li class="social-footer-icon facebook">
				<a href="https://www.facebook.com/somosbigotes"><i class="fab fa-facebook"></i></a>
			</li>
			<li class="social-footer-icon twitter">
				<a href="https://twitter.com/somosbigotes"><i class="fab fa-twitter"></i></a>
			</li>
			<li class="social-footer-icon instagram">
				<a href="https://www.instagram.com/bigot.es"><i class="fab fa-instagram"></i></a>
			</li>
			<li class="social-footer-icon telegram">
				<a href="https://t.me/BigotesTelegram"><i class="fab fa-telegram"></i></a>
			</li>
			<li class="social-footer-icon youtube">
				<a href="https://www.youtube.com/channel/UClmcYJZDVty5QWqT-zuJV6Q"><i class="fab fa-youtube"></i></a>
			</li>
			<li class="social-footer-icon podcast">
				<a href="https://www.ivoox.com/escuchar-bigotes_nq_484298_1.html"><i class="fa fa-podcast"></i></a>
			</li>
		</ul>
	</div>
	<div class="footer-credits-text text-center">
    <?php
    $description = get_bloginfo( 'description', 'display' );
    if ( $description || is_customize_preview() ) :
      ?>
      <p class="site-description">
        <?php echo esc_html( $description ); ?>
      </p>
    <?php endif; ?>
		<?php
		printf(esc_html__('%s %s %s'), 'Copyright', date("Y"), '<a href="/">bigot.es</a>');
		?>
	</div>
<?php
}

register_sidebar(
	array(
		'name'			 => esc_html__('bigot.es Footer'),
		'id'			 => 'bigotes-footer',
		'before_widget'	 => '<div id="%1$s" class="widget %2$s col-md-12">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<div class="widget-title"><h3>',
		'after_title'	 => '</h3></div>',
	)
);

function user_contact_add_twitter($user_contact)
{
	$user_contact['twitter'] = __('Twitter Username');

	return $user_contact;
}
add_filter('user_contactmethods', 'user_contact_add_twitter');

function user_contact_add_psn($user_contact)
{
	$user_contact['psn'] = __('PlayStation Network');

	return $user_contact;
}
add_filter('user_contactmethods', 'user_contact_add_psn');

function user_contact_add_xbox($user_contact)
{
	$user_contact['xbox'] = __('Xbox Live');

	return $user_contact;
}
add_filter('user_contactmethods', 'user_contact_add_xbox');

function user_contact_add_nintendo($user_contact)
{
	$user_contact['nintendo'] = __('Nintendo');

	return $user_contact;
}
add_filter('user_contactmethods', 'user_contact_add_nintendo');

/**
 * Returns widget thumbnail.
 */
function bigotes_thumb_img($img = 'full', $col = '', $link = true, $single = false)
{
	if ((has_post_thumbnail() && $link == true)) { ?>
		<div class="news-thumb <?php echo esc_attr($col); ?>">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<img src="<?php the_post_thumbnail_url($img); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
			</a>
		</div><!-- .news-thumb -->
	<?php } elseif (has_post_thumbnail()) { ?>
		<div class="news-thumb <?php echo esc_attr($col); ?>">
			<img src="<?php the_post_thumbnail_url($img); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
		</div><!-- .news-thumb -->
	<?php }
}

/**
 * Returns meta for the summary card.
 */
function bigotes_summary_card()
{
	?>
	<?php global $post; ?>
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@somosbigotes" />
	<meta name="og:site_name" content="bigot.es" />
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<!-- Get post title, failback to welcome message -->
	<?php if (!empty(get_the_title())) { ?>
		<meta property="og:title" content="<?php esc_html( the_title()); ?>" />
	<?php } else { ?>
		<meta property="og:title" content="Bienvenidos a bigot.es" />
	<?php } ?>
	<!-- Get post date -->
	<?php if (!empty(get_the_date())) { ?>
		<meta property="article:published_time" content="<?php echo $post->post_date; ?>" />
	<?php } ?>
	<!-- Get author information, failback to @somosbigotes -->
	<?php if (!empty(get_the_author_meta('twitter', $post->post_author))) { ?>
		<meta name="twitter:creator" content="<?php esc_html( the_author_meta('twitter', $post->post_author ) ); ?>" />
		<meta name="article:author" content="<?php esc_html( the_author_meta('twitter', $post->post_author ) ); ?>" />
	<?php } else { ?>
		<meta name="twitter:creator" content="@somosbigotes" />
		<meta name="article:author" content="@somosbigotes" />
	<?php } ?>
	<!-- Get post excerpt information, failback to bigot.es short presentation -->
	<?php if (has_excerpt()) { ?>
		<meta property="og:description" content="<?php echo esc_html( get_the_excerpt() ); ?>" />
	<?php } else { ?>
		<meta property="og:description" content="Bigot.es es una web especializada en el entretenimiento multimedia e interactivo. Nuestros objetivos se cimientan en el interés continuo por el medio cultural de los videojuegos en habla hispana." />
	<?php } ?>
	<!-- Get post image, failback to bigot.es custom logo if available -->
	<?php if (has_post_thumbnail()) { ?>
		<meta property="og:image" content="<?php the_post_thumbnail_url('full'); ?>" />
	<?php } elseif (has_custom_logo()) {
	$custom_logo_id = get_theme_mod('custom_logo');
	$custom_logo_url = wp_get_attachment_image_src($custom_logo_id, 'full');
	?>
		<meta property="og:image" content="<?php echo $custom_logo_url[0] ?>" />
	<?php } ?>
<?php
}

add_action( 'pre_get_posts', 'author_disable_pagination' );
function author_disable_pagination( $query )
{
  if (is_author()) $query->set( 'posts_per_page', '-1' );
}