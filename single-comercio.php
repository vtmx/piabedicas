<?php get_template_part( 'header' ); ?>

<style>
	/*body {
		background: url(<?php the_field( 'store-background' ); ?>);
	}*/
</style>

<div class="container-store">
	<div class="store">
		<?php
			// If store category exist
			$terms = get_the_terms( $post->id, 'comercio-categoria' );
			if( $terms ) { foreach( $terms as $term ) {} $term_link = get_term_link( $term, 'categoria-comercio' );	}
		?>

		<!-- <img class="store-thumb" src="<?php the_field( 'store-logo-medium' ); ?>" alt="Logo do comércio <?php the_title(); ?>"> -->
		<img class="store-thumb" src="http://placehold.it/250x200" alt="Logo do comércio <?php the_title(); ?>">

		<div class="store-info">
			<h2 class="store-name"><?php the_title(); ?></h2>
			<h3 class="store-category-info"><?php echo '<a href="' . $term_link . '">' . $term->name . '</a>'; ?></h3>

			<ul>
				<li class="street-address"><?php the_field('store-adress'); ?>, Piabetá, Magé, RJ - <a class="lightbox fancybox.iframe" href="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=fenway+park&amp;sll=42.291762,-71.425894&amp;sspn=0.20368,0.315514&amp;ie=UTF8&amp;hq=Fenway+Park&amp;hnear=Fenway+Park,+4+Yawkey+Way,+Boston,+Massachusetts+02215-3409&amp;z=14&amp;iwloc=A&amp;cid=10154405128186028253&amp;ll=42.346751,-71.096946&amp;output=embed">Mapa <i class="icon-map fa fa-map-marker"></i></a></li>
				<li class="tel">Tel: <?php the_field( 'store-phone'); ?></li>
				<li class="email">E-mail: <?php the_field( 'store-email' ); ?></li>
				<?php // If site of store exist ?>
				<?php if ( get_field('store-site') ): ?> <li>Site: <a href="http://<?php the_field( 'store-site' ); ?>" target="_blank"><?php the_field( 'store-site' ); ?></a></li><?php endif; ?>

				<?php // If facebook of store exist ?>
				<?php if ( get_field('store-facebook') ): ?> <li>Facebook: <a href="http://<?php the_field( 'store-site' ); ?>" target="_blank"><?php the_field( 'store-facebook' ); ?></a></li><?php endif; ?>
			</ul>
		</div>
	</div>
</div>

<div class="container">

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
	</div><!-- #store-pages -->

</div><!-- .container -->

<?php get_template_part( 'footer' ); ?>
