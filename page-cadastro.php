<?php /* Template Name: Cadastro */ ?>

<?php get_template_part('header'); ?>

<div class="container">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</div>

<?php get_template_part('footer'); ?>
