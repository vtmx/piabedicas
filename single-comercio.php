<?php get_template_part( 'header' ); ?>

<?php if( get_field('store-background-color') || get_field('store-background-image') ): ?>
	<style>
		body {
			<?php // if background-color ?>
			<?php if( get_field('store-background-color') ): ?>
				background-color: <?php the_field('store-background-color'); ?>;
			<?php endif; ?>

			<?php // if background-image ?>
			<?php if( get_field('store-background-image') ): ?>
				background-image: url(<?php the_field('store-background-image'); ?>);
				background-size: <?php the_field('store-background-size'); ?>;
				background-repeat: <?php the_field('store-background-repeat'); ?>;
				background-position: <?php the_field('store-background-position'); ?> top;
				background-attachment: <?php the_field('store-background-attachment'); ?>;
			<?php endif; ?>
		}
	</style>
<?php endif; ?>

<div class="store-wrap">

	<div class="store-details" itemscope itemtype="http://schema.org/LocalBusiness">
		<?php
			// If store category exist
			$terms = get_the_terms( $post->id, 'comercio-categoria' );
			if( $terms ) { foreach( $terms as $term ) {} $term_link = get_term_link( $term, 'categoria-comercio' );	}
		?>

		<?php if ( get_field( 'store-active' ) ) { ?>
			<?php the_post_thumbnail( 'store-single-thumb', array( 'size' => 'store-single-thumb', 'class' => 'store-thumb', 'itemprop' => 'logo', 'alt' => 'Logo do comércio ' . get_the_title() ) ); ?>
		<?php } else { ?>
			<img class="store-thumb" itemprop="logo" src="<?php bloginfo( 'template_directory' ); ?>/img/no-logo.png" alt="Sem logo">
		<?php } ?>

		<div class="store-info">
			<h2 class="store-name" itemprop="name"><?php the_title(); ?></h2>
			<h3 class="store-category"><?php echo '<a href="' . $term_link . '">' . $term->name . '</a>'; ?></h3>

			<table>
				<?php if ( get_field( 'store-address' ) ) : ?>
				<tr>
					<th class="address">Endereço: </th>
					<td itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
						<span itemprop="streetAddress"><?php the_field( 'store-address' ); ?></span> -
						<span itemprop="addressLocality"><?php the_field( 'store-county' ); ?></span>,
						<span>Magé</span>, <span itemprop="addressRegion">RJ</span> -
						<a class="lightbox-map" itemprop="map" href="http://maps.google.com/maps?q=<?php the_field('store-address'); ?>,+Piabtetá,+Magé,+RJ">Mapa <i class="fa fa-map-marker"></i></a>
					</td>
				</tr>
				<?php endif; ?>

				<?php if ( get_field( 'store-operation' ) ) : ?>
					<tr>
						<th>Funcionamento:</th>
						<td itemprop="openingHours"><?php the_field( 'store-operation' ); ?></td>
					</tr>
				<?php endif; ?>

				<?php if ( get_field( 'store-phone' ) ) : ?>
				<tr>
					<th class="tel">Telefone(s):</th>
					<td itemprop="telephone"><?php the_field( 'store-phone'); ?></td>
				</tr>
				<?php endif; ?>

				<?php if ( get_field( 'store-email' ) ) : ?>
					<tr>
						<th class="email">E-mail:</th>
						<td itemprop="email"><?php the_field( 'store-email' ); ?></td>
					</tr>
				<?php endif; ?>

				<?php if ( get_field( 'store-site' ) ) : ?>
					<tr>
						<th>Site:</th>
						<td itemprop="url"><a href="http://<?php the_field( 'store-site' ); ?>" target="_blank"><?php the_field( 'store-site' ); ?></a></td>
					</tr>
				<?php endif; ?>

				<?php if ( get_field( 'store-facebook' ) ) : ?>
					<tr>
						<th>Facebook:</th>
						<td><a href="http://<?php the_field( 'store-facebook' ); ?>" target="_blank"><?php the_field( 'store-facebook' ); ?></a></td>
					</tr>
				<?php endif; ?>

				<?php if ( get_field( 'store-others' ) ) : ?>
					<?php while ( have_rows('store-others') ) : the_row(); ?>
						<tr>
							<th><?php the_sub_field( 'store-others-term' ); ?>:</th>
							<td><?php the_sub_field( 'store-others-description' ); ?></td>
						</tr>
					<?php endwhile; ?>
				<?php endif; ?>
			</table>
		</div><!-- .store-info -->
	</div><!-- .store-details -->

	<?php // If store active ?>
	<?php if ( get_field( 'store-active' ) && get_field( 'store-section1-title' ) ) : ?>
		<div class="store-pages">
			<ul class="tab">
				<?php for ( $c = 1; $c <= 5; $c++ ) : ?>
					<?php if ( get_field( 'store-section'.$c.'-title' ) ) : ?>
						<li><a href="#section-<?php echo $c; ?>"><?php the_field( 'store-section'.$c.'-title' ); ?></a></li>
					<?php endif; ?>
				<?php endfor; ?>
			</ul>

			<div class="tab-content">
				<?php for ( $c = 1; $c <= 5; $c++ ) : ?>

					<?php if( have_rows( 'store-section'.$c.'-content' ) ) : ?>
						<section id="section-<?php echo $c; ?>" class="animation fade-in">
						    <?php while ( have_rows( 'store-section'.$c.'-content' ) ) : the_row(); ?>

						        <?php if( get_row_layout() == 'text' ) : ?>
						        	<?php the_sub_field('text'); ?>
								<?php elseif( get_row_layout() == 'products' ) : ?>
									<div class="products">
										<?php $images = get_sub_field( 'products' ); ?>
										<?php if( $images ): ?>
										    <?php foreach( $images as $image ): ?>
										        <a class="product lightbox-iframe-product" href="<?php echo get_attachment_link($image['ID']); ?>">
										            <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>">
													<p class="title"><?php echo $image['title']; ?></p>
													<?php if ( get_field( 'store-product-price' ) ) : ?>
														<p class="price"><span>R$ </span><?php the_field( 'store-product-price', $image['ID'] ); ?></p>
													<?php endif; ?>
										        </a>
										    <?php endforeach; ?>
										<?php endif; ?>
									</div>
						        <?php endif; ?>

						    <?php endwhile; ?>
						</section>
					<?php endif; ?>
				<?php endfor; ?>
			</div><!-- .tab-content -->

		</div><!-- #store-pages -->
	<?php endif; ?>

</div><!-- .store-wrap -->

<?php
	// Get array of terms
	$terms = get_the_terms( $post->ID , 'comercio-categoria' );

	// Pluck out the IDs to get an array of IDS
	$term_ids = wp_list_pluck( $terms, 'term_id' );

	// Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
	// Chose 'AND' if you want to query for posts with all terms
	$tax_query = new WP_Query( array(
		'post_type' => 'comercio',
		'tax_query' => array(
		    array(
		        'taxonomy' => 'comercio-categoria',
		        'field'    => 'term_id',
		        'terms'    => $term_ids
		     )
		 ),
		'posts_per_page' => 15,
		'orderby'        => 'rand',
		'post__not_in'   => array($post->ID)
	) );
?>

<?php // Mandatory store have category ?>
<?php if( $tax_query->have_posts() ) : ?>
	<div class="container">
		<div class="stores-related">
			<?php $term = get_term( $post->ID , 'comercio-categoria' ); ?>
			<?php $term_link = get_term_link( $term ); ?>

			<h3>Categoria <?php //the_terms( $post->ID , 'comercio-categoria', ' - ', ' &raquo; ' ); ?> <?php echo $terms[0]->name; ?></h3>

			<div class="stores">
				<div class="owl-carousel">
					<?php while ($tax_query->have_posts() ) : $tax_query->the_post(); ?>
						<a class="store-link item" href="<?php the_permalink(); ?>">
							<?php if ( get_field( 'store-active' ) ) { ?>
								<?php the_post_thumbnail( 'thumbnail', array( 'size' => 'store-thumb', 'class' => 'store-thumb', 'alt' => 'Logo do comércio ' . get_the_title() ) ); ?>
							<?php } else { ?>
								<img class="store-thumb" src="<?php bloginfo( 'template_directory' ); ?>/img/no-logo.png" alt="Sem logo">
							<?php } ?>
							<h2 class="store-name"><?php the_title(); ?></h2>
						</a>
					<?php endwhile; wp_reset_query(); ?>
				</div>

				<div class="stores-related-controls">
					<button class="prev"><i class="fa fa-angle-left"></i></button>
					<button class="next"><i class="fa fa-angle-right"></i></button>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if ( get_field( 'store-active' ) ) : ?>
	<div class="container">
		<div class="comments">
			<?php comments_template(); ?>
			<div class="hidden-disqus-footer"></div>
		</div><!-- #comments -->
	</div><!-- .container -->
<?php endif; ?>

<?php get_template_part( 'footer' ); ?>
