<?php get_template_part('header'); ?>

<div class="container">
	<div class="page-content">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</div>

<?php get_template_part('footer'); ?>
