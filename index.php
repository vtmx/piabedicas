<?php get_template_part( 'header' ); ?>

<div class="container">
	<div id="content" class="blog-content animation fade-in">
		<div id="ajax-container" class="animation">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="post" <?php post_class(); ?>>
					<a class="post-title" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>

			<?php if ( function_exists( 'wp_pagenavi' ) ) : ?>
				<div class="pagination blog-pagination"><?php wp_pagenavi(); ?></div>
			<?php endif;?>
		</div>
	</div>

	<aside class="blog-aside">
		<div class="widget">
			<h2 class="widget-title">Categorias</h2>
			<ul>
				<li class="cat-item current-cat"><a href="<?php echo esc_url( home_url() ); ?>/blog">Todos</a></li>
				<?php $args = array( 'title_li' => null, 'exclude' => '1' ); ?>
				<?php wp_list_categories( $args ); ?>
			</ul>
		</div>
	</aside>
</div>

<?php get_template_part( 'footer' ); ?>
