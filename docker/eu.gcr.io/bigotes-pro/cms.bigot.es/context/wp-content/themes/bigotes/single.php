<?php get_header(); ?>

<?php get_template_part( 'template-parts/template-part', 'head' ); ?>

<!-- start content container -->
<?php get_template_part( 'content', 'single' ); ?>
<div id="disqus_thread"></div>
<script>
    var disqus_config = function () {
      this.page.url = '<?php echo get_permalink(); ?>';
      this.page.identifier = '<?php echo get_the_ID() . ' ' . get_the_guid(); ?>';
    };
    (function() {  // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://bigotes.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
<?php get_footer(); ?>