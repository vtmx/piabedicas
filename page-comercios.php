<?php /* Template Name: Comércios */ ?>

<?php get_template_part( 'header' ); ?>

<div class="store-categories">
	<ul class="container">
		<li class="current-cat"><a href="http://localhost/piabedicas/?page_id=49" title="Todos">Todos</a></li>
		<?php $cat = array( 'title_li' => null, 'taxonomy' => 'comercio-categoria' ); ?>
		<?php wp_list_categories( $cat ); ?> 
	</ul>
</div>

<div class="container">
	<div id="stores" class="animation fade-in">
		<div id="ajax-container" class="animation">
			<?php $query = new WP_Query(array( 'post_type' => 'comercio', 'orderby' => 'ID', 'posts_per_page' => 6, 'paged' => get_query_var('paged') )); while ( $query->have_posts() ) : $query->the_post(); ?>
				<a class="store-link animation" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'thumbnail', array( 'size' => 'full', 'class' => 'store-thumb' ) ); ?>
					<h2 class="store-name"><?php the_title(); ?></h2>
				</a>
			<?php endwhile; ?>

			<?php if( function_exists('wp_pagenavi') ) : ?>
				<div class="pagination"><?php wp_pagenavi( array('query' => $query) ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</div><!-- .container -->

<?php get_template_part( 'footer' ); ?>