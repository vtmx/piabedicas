

<?php get_template_part( 'header' ); ?>

<div class="store-categories">
	<div class="container">
		<?php wp_nav_menu( array( 'theme_location' => 'store-categories', 'container_class' => 'store-categories-menu' ) ); ?>
	</div>
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
	                    'taxonomy'       => 'comercio-categoria',
	                    'field'          => 'slug',
	                    'terms'          => $term->slug
	                )
	            ),
			);

			// The Query
			$query = new WP_Query( $args );
			?>

			<div class="stores">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<a class="store-link animation" href="<?php the_permalink(); ?>">
						<?php if ( get_field( 'store-active' ) ) { ?>
							<?php the_post_thumbnail( 'store-thumb', array( 'size' => 'store-thumb', 'class' => 'store-thumb', 'alt' => 'Logo do comércio ' . get_the_title() ) ); ?>
						<?php } else { ?>
							<img class="store-thumb" src="<?php bloginfo( 'template_directory' ); ?>/img/no-logo.png" alt="Sem logo">
						<?php } ?>
						<h2 class="store-name"><?php the_title(); ?></h2>
					</a>
				<?php endwhile; ?>
			</div>

			<?php if( function_exists('wp_pagenavi') ) : ?>
				<div class="pagination store-pagination"><?php wp_pagenavi( array( 'query' => $query ) ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</div><!-- .container -->

<?php get_template_part( 'footer' ); ?>
