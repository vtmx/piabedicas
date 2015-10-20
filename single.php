<?php get_template_part( 'header' ); ?>

<div class="container">
	<div id="content" class="blog-content animation fade-in">
		<div id="ajax-container">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="post">
					<h2 class="post-title"><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>

			<div class="comments">
				<div id="disqus_thread"></div>
				<script>
					/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
					var disqus_shortname = 'piabedicasonline'; // required: replace example with your forum shortname

					/* * * DON'T EDIT BELOW THIS LINE * * */
					(function() {
						var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
						dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
						(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
					})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
			</div><!-- #comments -->
		</div>
	</div>

	<aside class="blog-aside">
		<div class="widget">
			<h2 class="widget-title">Categorias</h2>
			<ul>
				<li class="cat-item"><a href="<?php echo esc_url( home_url() ); ?>/blog">Todos</a></li>

				<?php $args = array( 'title_li' => null, 'exclude' => '1' ); ?>
				<?php wp_list_categories( $args ); ?>
			</ul>
		</div>
	</aside>
</div>

<?php get_template_part( 'footer' ); ?>
