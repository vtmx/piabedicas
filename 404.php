<?php get_template_part( 'header' ); ?>		

<main>
	<div id="container-ajax" class="animation">

		<div class="container">
			<div class="error-404">
				<hgroup>
					<h3>Nenhuma página encontrada</h3>
					<h4>Talvez você possa achar algo pesquisando por alguma palavra</h4>
				</hgroup>
				
				<div class="search-smille"></div>

				<a href="<?php bloginfo('url'); ?>" class="btn" title="Voltar para a página incial">Voltar para página incial</a>
			</div>
		</div>
		
	</div>
</main>

<?php get_template_part( 'footer' ); ?>
