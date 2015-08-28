

<?php get_template_part( 'header' ); ?>

<div class="store-categories">
	<ul class="container">
		<li><a href="http://localhost/piabedicas/?page_id=49" title="Todos">Todos</a></li>
		<?php $cat = array( 'title_li' => null, 'taxonomy' => 'comercio-categoria' ); ?>
		<?php wp_list_categories( $cat ); ?>
	</ul>
</div>

<div class="container">
	<div id="stores" class="animation fade-in">
		<div id="ajax-container" class="animation">
			
			<div class="stores">
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<a class="store-link" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('thumbnail', array('size' => 'full', 'class' => 'store-thumb')); ?>
						<h2 class="store-name"><?php the_title(); ?></h2>
					</a>
				<?php endwhile; ?>
			</div>

			<?php if( function_exists('wp_pagenavi') ) : ?>
				<div class="pagination"><?php wp_pagenavi(); ?></div>
			<?php endif; ?>
		</div>
	</div>
</div><!-- .container -->

<?php get_template_part( 'footer' ); ?>
