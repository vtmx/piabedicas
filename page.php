<?php get_template_part('header'); ?>

<div class="container">
	<div class="page-content">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>

	<aside class="page-aside vcard">
		<p class="email"><span>E-mail</span>piabedicas@gmail.com</p>
		<p class="tel"><span>Telefone</span>(21) 9459-7383</p>
	</aside>
</div>

<?php get_template_part('footer'); ?>