<?php /* Template Name: Home */ ?>

<?php get_template_part( 'header' ); ?>

<main>
	<div class="slider">
		<div class="container">
			<div class="owl-carousel">
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

			<div class="slider-controls">
				<button class="prev"><i class="fa fa-angle-left"></i></button>
				<button class="next"><i class="fa fa-angle-right"></i></button>
			</div>
		</div>
	</div>

	<div class="news">
		<div class="container">
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
		</div>
	</div>

	<div class="plans">
		<div class="container">
			<div class="plan">
				<h2 class="plan-title">Básico</h2>
				<div class="price"><span>R$</span>30<span>mês</span></div>
				<ul>
					<li><strong>5</strong> users</li>
					<li><strong>10</strong> projects</li>
					<li><strong>10GB</strong> amount of space</li>
					<li><strong>5</strong> e-mail accounts</li>
				</ul>
				<a href='#' class='btn'>Pré-Cadastro</a>
			</div>

			<div class="plan">
				<h2 class="plan-title">Pro</h2>
				<div class="price"><span>R$</span>50<span>mês</span></div>
				<ul>
					<li><strong>5</strong> users</li>
					<li><strong>10</strong> projects</li>
					<li><strong>10GB</strong> amount of space</li>
					<li><strong>5</strong> e-mail accounts</li>
				</ul>
				<a href='#' class='btn'>Pré-Cadastro</a>
			</div>

			<div class="plan">
				<h2 class="plan-title">Premium</h2>
				<div class="price"><span>R$</span>75<span>mês</span></div>
				<ul>
					<li><strong>5</strong> users</li>
					<li><strong>10</strong> projects</li>
					<li><strong>10GB</strong> amount of space</li>
					<li><strong>5</strong> e-mail accounts</li>
				</ul>
				<a href='#' class='btn'>Pré-Cadastro</a>
			</div>
		</div>
	</div>

<?php get_template_part( 'footer' ); ?>
