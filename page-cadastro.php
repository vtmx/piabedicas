<?php /* Template Name: Cadastro */ ?>

<?php get_template_part('header'); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>

<?php get_template_part('footer'); ?>
