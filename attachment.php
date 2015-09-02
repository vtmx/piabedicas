<?php get_template_part( 'header' ); ?>

<div id="container">
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="product-image">
			<?php echo wp_get_attachment_image(get_the_ID(), 'medium');	?>
		</div>
		<div class="product-info">
			<h2 class="title"><?php the_title(); ?></h2>
			<?php if( get_field('store-product-price') ): ?>
				<p class="price">R$ <?php the_field('store-product-price'); ?></p>
			<?php endif; ?>
			<!-- <h2><?php the_excerpt(); ?></h2> -->
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
</div>

<?php get_template_part( 'footer' ); ?>
