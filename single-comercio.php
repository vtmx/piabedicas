<?php get_template_part( 'header' ); ?>

<style>
	body {
		/*background: #efefef url(http://placehold.it/1920x500) no-repeat center 55px;*/

		background: url(<?php the_field( 'store-background-image' ); ?>) fixed;
		
		<?php // if deselect repeat ?>
		<?php if( !in_array('repeat', get_field('store-background-repeat') ) ) { ?>
			background: url(<?php the_field( 'store-background-image' ); ?>) fixed;
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
			<h3 class="store-category-info"><?php echo '<a href="' . $term_link . '">' . $term->name . '</a>'; ?></h3>

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

<div class="container">
	<div id="comments">
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
