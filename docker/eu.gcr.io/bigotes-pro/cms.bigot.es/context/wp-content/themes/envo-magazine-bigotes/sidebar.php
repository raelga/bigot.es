<?php if ( is_active_sidebar( 'envo-magazine-right-sidebar' ) ) { ?>
	<aside id="sidebar" class="col-md-4">
		<?php
		$authordesc = get_the_author_meta( 'description' );
		if ( !empty( $authordesc ) ) {
			?>
			<div class="widget postauthor-container">			  
				<div class="widget-title">
					<h3 class="about">
						<?php esc_html_e( 'Sobre ', 'envo-magazine' ); ?>
						<?php the_author_posts_link(); ?>
					</h3>
        </div>
				</div>        	
        </div>
        <div class="postauthor-avatar"> 
          <?php echo get_avatar( get_the_author_meta( 'ID' ), 128 ); ?>
        </div>
				<div class="postauthor-content"> 
					<p>
						<?php the_author_meta( 'description' ) ?>
					</p>
				</div>
			</div>

		<?php } ?>
		<?php dynamic_sidebar( 'envo-magazine-right-sidebar' ); ?>
	</aside>
<?php } ?>
