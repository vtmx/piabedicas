<?php get_template_part( 'header' ); ?>

<main>
	<div id="container-ajax" class="animation">

		<div class="container">
			<hgroup>
				<h3>Nenhuma página encontrada</h3>
				<h4>Talvez você; possa achar algo pesquisando por outra palavra</h4>
			</hgroup>

			<div class="error-image"></div>

			<a href="<?php echo esc_url( home_url() ); ?>" class="btn" title="Voltar para a p&aacute;gina incial">Voltar para página incial</a>
		</div>
	</div>
</main>

<?php get_template_part( 'footer' ); ?>
