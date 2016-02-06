<?php /* Template Name: Home */ ?>

<?php get_template_part( 'header' ); ?>

	<section class="slider">
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
				<button class="prev"><svg class="icon icon-angle-left"><use xlink:href="#icon-angle-left"></use></svg></button>
				<button class="next"><svg class="icon icon-angle-right"><use xlink:href="#icon-angle-right"></use></svg></button>
			</div>
		</div>
	</section>

	<section class="marketing">
		<div class="container">
			<h2>Seu comércio pode mais com menos</h2>
			<h3>Todos os comércios de Piabetá em um lugar</h3>

			<div class="advantages">
				<div class="advantage">
					<svg class="icon icon-globe"><use xlink:href="#icon-globe"></use></svg>
					<h4>Internet</h4>
					<p>Hoje a Web é o meio mais prático do seu cliente encontrar você.</p>
				</div>

				<div class="advantage">
					<svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg>
					<h4>Clientes</h4>
					<p>Direcionado ao público do município de Piabetá, será fácil encontrar seu comércio.</p>
				</div>

				<div class="advantage">
					<svg class="icon icon-facebook-official"><use xlink:href="#icon-facebook-official"></use></svg>
					<h4>Mídias sociais</h4>
					<p>O Piabedicas sincroniza suas novidades no Facebook, para ficar por dentro curta <a href="http://facebook.com/piabedicas">nossa página</a>.</p>
				</div>

				<div class="advantage">
					<svg class="icon icon-money"><use xlink:href="#icon-money"></use></svg>
					<h4>Economize</h4>
					<p>Por um pequeno valor você irá divulgar seu próprio link piabedicas.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="objective">
		<div class="container">
			<h2>Nosso objetivo</h2>
			<p>
				O objetivo do Piabedicas é oferecer um serviço de divulgação do comércio local de Piabetá a um preço acessível.
				<br>
				Onde os comerciantes possam anunciar seus produtos e serviços de forma rápida e prática.
			</p>
		</div>
	</section>

	<section class="plans">
		<div class="container">
			<a href="http://localhost/piabedicas/cadastro/" class="plan lightbox-iframe">
				<h2 class="plan-title">Cadastro</h2>
				<div class="price"><span>R$</span>30<span>/mês</span></div>
				<ul>
					<li>Atualizações feitas pelo comerciante</li>
					<li>Feedbacks dos usuários sobre seu serviço</li>
					<li>Link personalizado Piabedicas</li>
				</ul>
				<div class="btn">Cadastro</div>
			</a>
		</div>
	</section>

	<section class="news">
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
	</section>

<?php get_template_part( 'footer' ); ?>
