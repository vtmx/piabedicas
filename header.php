<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<!-- Metas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Title -->
		<title><?php wp_title(); ?></title>

		<!-- Styles -->
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicons/favicon.png">
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/dest/css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<!-- WordPress -->
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header>
			<div class="container">
				<a href="<?php bloginfo('url'); ?>" class="logo">
					<img src="<?php bloginfo('template_directory'); ?>/img/logo.svg" alt="Logo do site Piabedicas">
				</a>

				<nav>
					<?php //wp_nav_menu('menu'); ?>
					<ul class="menu">
						<li class="menu-item-store"><a href="<?php bloginfo('url'); ?>/comercios">Comércios <i class="fa fa-angle-down"></i></a>
							<ul class="sub-menu">
								<?php $cat = array( 'title_li' => null, 'taxonomy' => 'comercio-categoria' ); ?>
								<?php wp_list_categories( $cat ); ?>
							</ul>
						</li>

						<li class="menu-item-contact"><a class="lightbox-contact" href="http://localhost/piabedicas/?page_id=57">Contato</a></li>
						<li class="menu-item-contact"><a class="lightbox-contact" href="http://localhost/piabedicas/cadastro/">Cadastro</a></li>
					</ul>
				</nav>

				<form class="search-form" role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>">
					<input type="search" id="searchtext" value="" name="s" placeholder="Pesquisar">
					<button type="submit" id="searchsubmit"><i></i></button>
				</form>

				<div class="ajax-loading-icon animation"></div>

				<a href="http://facebook.com/piabedicas" class="facebook" target="_blank"><i class="fa fa-facebook-official"></i></a>
			</div>
		</header>

		<main>
