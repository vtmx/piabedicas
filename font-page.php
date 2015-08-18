<?php /* Template Name: Home */ ?>

<?php get_template_part( 'header' ); ?>

<main>
	<div id="container-ajax" class="animation">

		<div class="owl-wrap">
			<div class="owl-carousel animate animate fade-in">
				<?php
					if( have_rows('slider') ):
						while( have_rows('slider') ) : the_row();
							$slider_image = get_sub_field('slider-image');
							$slider_link = get_sub_field('slider-link');
							$slider_title = get_sub_field('slider-title');
				?>

						<a href="<?php echo $slider_link; ?>" title="<?php echo $slider_title; ?>">
							<img src="<?php echo $slider_image; ?>" alt="<?php echo $slider_title; ?>">
						</a>

					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>

		<div class="container">
			<section class="news">
				<a class="new" href="#">
					<img src="http://placehold.it/413x220">
					<h2>Título 01</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
				</a>

				<a class="new" href="#">
					<img src="http://placehold.it/413x220">
					<h2>Título 01</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
				</a>

				<a class="new" href="#">
					<img src="http://placehold.it/413x220">
					<h2>Título 01</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
				</a>
			</section>
		</div>
	</div><!-- #container-ajax -->

<?php get_template_part( 'footer' ); ?>
