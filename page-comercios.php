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

			<?php

			// WP_Query arguments store active
			$args = array (
				'post_type'              => 'comercio',
				// Esse atributo organizaria por store ativo, somente ordem alfabética
				//'meta_key'               => 'store-active',
				//'orderby'                => 'meta_value',
				'orderby'                => 'rand',
				'pagination'             => true,
				'paged'                  => get_query_var('paged'),
				'posts_per_page'         => '6',
			);

			// The Query
			$query = new WP_Query( $args );
			?>

			<div class="stores">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php $do_not_duplicate = $post->ID; ?>
					<a class="store-link animation" href="<?php the_permalink(); ?>">
						<?php if ( get_field( 'store-active' ) ) { ?>
							<?php the_post_thumbnail( 'thumbnail', array( 'size' => 'store-thumb', 'class' => 'store-thumb', 'alt' => 'Logo do comércio ' . get_the_title() ) ); ?>
						<?php } else { ?>
							<img class="store-thumb" src="<?php bloginfo( 'template_directory' ); ?>/img/no-logo.png" alt="Sem logo">
						<?php } ?>
						<h2 class="store-name"><?php the_title(); ?></h2>
					</a>
				<?php endwhile; ?>
			</div>

			<?php if( function_exists('wp_pagenavi') ) : ?>
				<div class="pagination"><?php wp_pagenavi( array( 'query' => $query ) ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</div><!-- .container -->

<?php get_template_part( 'footer' ); ?>
