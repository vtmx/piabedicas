

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

			<?php
			// A Paginação é influênciada pelo Admin do Wordpress deixar 6
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

			// WP_Query arguments
			$args = array (
				'post_type'              => 'comercio',
				'orderby'                => 'rand',
				'pagination'             => true,
				'paged'                  => get_query_var('paged'),
				'posts_per_page'         => '6',
				'tax_query' => array(
                array(
	                    'taxonomy' => 'comercio-categoria',
	                    'field' => 'slug',
	                    'terms' => $term->slug
	                )
	            ),
			);

			// The Query
			$query = new WP_Query( $args );
			?>

			<div class="stores">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<a class="store-link animation" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'thumbnail', array( 'size' => 'thumb', 'class' => 'store-thumb' ) ); ?>
						<h2 class="store-name"><?php the_title(); ?></h2>
					</a>
				<?php endwhile; ?>
			</div>

			<?php if( function_exists('wp_pagenavi') ) : ?>
				<div class="pagination"><?php wp_pagenavi( array('query' => $query) ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</div><!-- .container -->

<?php get_template_part( 'footer' ); ?>
