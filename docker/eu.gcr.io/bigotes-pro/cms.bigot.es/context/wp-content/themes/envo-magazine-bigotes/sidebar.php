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
        <div class="postauthor-avatar"> 
          <?php echo get_avatar( get_the_author_meta( 'ID' ), 128 ); ?>
        </div>
				<div class="postauthor-content"> 
					<p>
						<?php the_author_meta( 'description' ) ?>
					</p>
				</div>
        <div class="postauthor-social">
          <ul class="postauthor-social">
          <?php
          $author_name = get_the_author_meta( 'first_name' );
          if ( !empty( $author_name ) ) {
          ?>
            <li class="postauthor-social user">
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>">
                <i class="fa fa-search"></i> <?php echo esc_html__( "más de $author_name" ) ?>
              </a>
            </li>
          <?php } ?>
          <?php
          $author_twitter = get_the_author_meta( 'twitter' );
          if ( !empty( $author_twitter ) ) {
          ?>
            <li class="postauthor-social twitter">
              <a href="<?php echo esc_url("https//twitter.com/$author_twitter") ?>">
                <i class="fa fa-twitter"></i> <?php echo esc_html__("$author_twitter") ?>
              </a>
            </li>
          <?php } ?>
          </ul>
        </div>
      </div>
      <?php } ?>
		<?php dynamic_sidebar( 'envo-magazine-right-sidebar' ); ?>
	</aside>
<?php } ?>
