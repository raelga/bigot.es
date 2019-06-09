</div><!-- end main-container -->
</div><!-- end page-area -->
<?php if ( is_active_sidebar( 'bigotes-footer' ) ) { ?>  				
	<div id="content-footer-section" class="container-fluid clearfix">
		<div class="container">
			<?php dynamic_sidebar( 'bigotes-footer' ) ?>
		</div>	
	</div>		
<?php } ?>
<?php do_action( 'envo_magazine_before_footer' ); ?> 
<footer id="colophon" class="footer-credits container-fluid">
	<div class="container">
		<?php do_action( 'envo_magazine_generate_footer' ); ?> 
	</div>	
</footer>
<?php do_action( 'envo_magazine_after_footer' ); ?> 
<?php wp_footer(); ?>

</body>
</html>
