<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129735875-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-129735875-1');
		</script>
		<?php wp_head(); ?>
	</head>
	<body id="blog" <?php body_class(); ?>>
		<?php get_template_part( 'template-parts/template-part', 'topnav' ); ?>
