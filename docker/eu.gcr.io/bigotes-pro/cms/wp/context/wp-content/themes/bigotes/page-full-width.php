<?php /* Template Name: Full Width Page */ ?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/template-part', 'head' ); ?>

<!-- start content container -->
<!-- start content container -->
<div class="row">      
	<article class="col-md-12">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>                         
				<div <?php post_class(); ?>>
					<?php the_title( '<h1 class="single-title">', '</h1>' ); ?>

					<div class="single-content col-md-12"> 
						<div class="single-entry-summary">
							<?php do_action( 'envo_magazine_before_content' ); ?> 
							<?php the_content(); ?> 
							<?php do_action( 'envo_magazine_after_content' ); ?> 
						</div><!-- .single-entry-summary -->
					</div>
				</div>        
			<?php endwhile; ?>
		<?php else : ?>            
			<?php get_template_part( 'content', 'none' ); ?>        
		<?php endif; ?>    
	</article> 
	<!-- <?php get_sidebar( 'right' ); ?> -->
</div>
<!-- end content container -->

<?php get_footer(); ?>