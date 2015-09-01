<?php get_template_part( 'header' ); ?>

<div class="container">
	<div class="page-content">
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="post">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</article>
		<?php endwhile; ?>

		<?php if( function_exists('wp_pagenavi') ) : ?>
			<div class="pagination"><?php wp_pagenavi(); ?></div>
		<?php endif; ?>
	</div>

	<aside class="page-aside">
		<?php dynamic_sidebar('sidebar-blog'); ?>
	</aside>
</div>

<?php get_template_part( 'footer' ); ?>
