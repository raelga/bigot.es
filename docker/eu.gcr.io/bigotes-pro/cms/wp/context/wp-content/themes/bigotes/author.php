<?php get_header(); ?>

<?php get_template_part('template-parts/template-part', 'head'); ?>

<!-- start content container -->
<div class="row">

  <div class="col-md-12">
    <?php
    $authordesc = get_the_author_meta('description');
    if (!empty($authordesc)) {
    ?>
      <div class="widget postauthor-container author-container">
        <div class="widget-title about-title">
          <h3 class="about-title">
            <?php the_author_posts_link(); ?>
          </h3>
        </div>
        <div class="postauthor-avatar author-avatar">
          <?php echo get_avatar(get_the_author_meta('ID'), 256); ?>
        </div>
        <div class="postauthor-content author-content">
          <p>
            <?php the_author_meta('description') ?>
          </p>
        </div>
        <div class="postauthor-social author-social">
          <ul class="postauthor-social author-social">
            <?php
            $author_twitter = get_the_author_meta('twitter');
            if (!empty($author_twitter)) {
            ?>
              <li class="postauthor-social author-social twitter">
                <a href="<?php echo esc_url("https://twitter.com/$author_twitter") ?>" target="_blank">
                  <i class="fab fa-twitter"></i> <?php echo esc_html__("$author_twitter") ?>
                </a>
              </li>
            <?php } ?>
            <?php
            $author_psn = get_the_author_meta('psn');
            if (!empty($author_psn)) {
            ?>
              <li class="postauthor-social author-social playstation">
                <a href="<?php echo esc_url("https://psnprofiles.com/$author_psn") ?>" target="_blank">
                  <i class="fab fa-playstation"></i> <?php echo esc_html__("$author_psn") ?>
                </a>
              </li>
            <?php } ?>
            <?php
            $author_xbox = get_the_author_meta('xbox');
            if (!empty($author_xbox)) {
            ?>
              <li class="postauthor-social author-social xbox">
                <a href="<?php echo esc_url("https://trueachievements.com/gamer/$author_xbox") ?>" target="_blank">
                  <i class="fab fa-xbox"></i> <?php echo esc_html__("$author_xbox") ?>
                </a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    <?php } ?>
    <?php
    if (have_posts()) :

      while (have_posts()) : the_post();

        get_template_part('content', get_post_format());

      endwhile;

      the_posts_pagination();

    else :

      get_template_part('content', 'none');

    endif;
    ?>

  </div>
  <!--
	<?php get_sidebar('right'); ?>
//-->
</div>
<!-- end content container -->

<?php get_footer(); ?>