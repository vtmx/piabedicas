<?php get_template_part( 'header' ); ?>

<style>
	body {
		background-attachment: fixed;
		background-image: url(<?php the_field( 'store-background-image' ); ?>);

		<?php // if deselect repeat ?>
		<?php if( !in_array('repeat', get_field('store-background-repeat') ) ) { ?>
			background-attachment: scroll;
			background: url(<?php the_field( 'store-background-image' ); ?>);
			background-size: contain;
			background-repeat: no-repeat;
		<?php } ?>
	}
</style>

<div class="store-wrap">

	<div class="store-details">
		<?php
			// If store category exist
			$terms = get_the_terms( $post->id, 'comercio-categoria' );
			if( $terms ) { foreach( $terms as $term ) {} $term_link = get_term_link( $term, 'categoria-comercio' );	}
		?>

		<img class="store-thumb" src="<?php the_field( 'store-logo' ); ?>" alt="Logo do comércio <?php the_title(); ?>">

		<div class="store-info">
			<h2 class="store-name"><?php the_title(); ?></h2>
			<h3 class="store-category"><?php echo '<a href="' . $term_link . '">' . $term->name . '</a>'; ?></h3>

			<dl>
				<dt class="address">Endereço: </dt
				<dd><?php the_field('store-adress'); ?>, Piabetá, Magé, RJ - <a class="lightbox-map" href="http://maps.google.com/maps?q=<?php the_field('store-adress'); ?>,+Piabtetá,+Magé,+Rio de Janeiro,+Brasil">Mapa <i class="fa fa-map-marker"></i></a></dd>

				<dt class="tel">Telefone(s):</dt>
				<dd><?php the_field( 'store-phone'); ?></dd>

				<dt class="email">E-mail:</dt>
				<dd><?php the_field( 'store-email' ); ?></dd>

				<?php // If site of store exist ?>
				<?php if ( get_field('store-site') ): ?>
					<dt>Site:</dt>
					<dd><a href="http://<?php the_field( 'store-site' ); ?>" target="_blank"><?php the_field( 'store-site' ); ?></a></dd>
				<?php endif; ?>

				<?php // If facebook of store exist ?>
				<?php if ( get_field('store-facebook') ): ?>
					<dt>Facebook:</dt>
					<dd><a href="http://<?php the_field( 'store-site' ); ?>" target="_blank"><?php the_field( 'store-facebook' ); ?></a></dd>
				<?php endif; ?>
			</dl>

		</div><!-- .store-info -->
	</div><!-- .store-details -->


	<div class="store-pages">
		<ul class="tab">
			<li class="active"><a href="#section-1" data-toggle="tab"><?php the_field( 'store-section1-title' ); ?></a></li>
			<?php for ( $c = 2; $c <= 5; $c++ ) { ?>
				<?php if ( get_field('store-section'.$c.'-title') ) { ?>
					<li><a href="#section-<?php echo $c; ?>"><?php the_field( 'store-section'.$c.'-title' ); ?></a></li>
				<?php } ?>
			<?php } ?>
		</ul>

		<div class="tab-content">
			<section id="section-1" class="section active animation fade-in">
				<?php the_field( 'store-section1-content' ); ?>
			</section>
			<?php for ( $c = 2; $c <= 5; $c++ ) { ?>
				<?php if ( get_field('store-section'.$c.'-content') ) { ?>
					<section id="section-<?php echo $c; ?>" class="animation fade-in">
						<?php the_field( 'store-section'.$c.'-content' ); ?>
					</section>
				<?php } ?>
			<?php } ?>
		</div>

	</div><!-- #store-pages -->

</div><!-- .store-wrap -->

<?php
	//Get array of terms
	$terms = get_the_terms( $post->ID , 'comercio-categoria', 'string');
	//Pluck out the IDs to get an array of IDS
	$term_ids = wp_list_pluck( $terms, 'term_id' );

	//Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
	//Chose 'AND' if you want to query for posts with all terms
	$second_query = new WP_Query( array(
	'post_type' => 'comercio',
	'tax_query' => array(
	    array(
	        'taxonomy' => 'comercio-categoria',
	        'field' => 'term_id',
	        'terms'    => $term_ids,
	     )),
		'posts_per_page' => 12,
		'orderby' => 'rand',
		'post__not_in'=>array($post->ID)
	) );
?>

<?php if($second_query->have_posts()) { ?>
	<div class="container">
		<div class="stores-related">
			<h3>Comercios da mesma categoria</h3>
			<div class="stores">
				<?php while ($second_query->have_posts() ) : $second_query->the_post(); ?>
					<a class="store-link" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('thumbnail', array('size' => 'full', 'class' => 'store-thumb')); ?>
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
<?php } else { ?>

<?php } ?>

<div class="container">
	<div class="comments">
		<div id="disqus_thread"></div>
		<script type="text/javascript">
			/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
			var disqus_shortname = 'piabedicasonline'; // required: replace example with your forum shortname

			/* * * DON'T EDIT BELOW THIS LINE * * */
			(function() {
				var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	</div><!-- #comments -->
</div>

<?php get_template_part( 'footer' ); ?>
