<?php get_template_part( 'header' ); ?>

<div id="content" class="container ">
	<div id="ajax-container" class="animation">

		<?php if( have_posts() ) { ?>
		<hgroup>
			<h3>Pesquisa</h3>
			<h4>
			<?php
				$allsearch = new WP_Query();
				$allsearch -> query(array( 's' => $s, 'showposts' => '-1',	'posts_per_page' => 3 ));
				$key = esc_html($s, 1);
				$count = $allsearch->post_count;
				echo( 'Encontrado(s) um total de '.$count. ' páginas com a palavra <span>'. $key .'</span>' );
				wp_reset_query();
			?>
			</h4>
		</hgroup>

		<div class="search-result">
			<?php while( have_posts() ){ the_post(); ?>
				<a class="search-link" href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( 'thumbnail', array( 'size' => 'store-thumb', 'class' => 'store-thumb' ) );  ?>
					<?php } else { ?>
						<?php echo '<img src="' . esc_url( get_stylesheet_directory_uri() ) . '/images/no-logo.png">'; ?>
					<?php } ?>
					<h2><?php the_title(); ?></h2>
				</a>
			<?php } ?>
		</div>

		<?php if( function_exists( 'wp_pagenavi' ) ) : ?>
			<div class="pagination">
				<?php wp_pagenavi(); ?>
			</div>
		<?php endif; ?>

		<?php  } else { ?>
			<div class="error-search">
				<hgroup>
					<h3>Nenhum resultado encontrado</h3>
					<h4>Tente pesquisar outra palavra</h4>
				</hgroup>

				<div class="error-image"></div>

				<a href="<?php echo esc_url( home_url() ); ?>" class="btn btn-primary" title="Voltar para a página incial">Voltar para página incial</a>
			</div>
		<?php } ?>
	</div><!-- #content -->
</div><!-- #ajax-container -->

<?php get_template_part( 'footer' ); ?>
