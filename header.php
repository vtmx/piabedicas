<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<!-- Metas -->
		<meta charset="utf-8">
		<meta name="author" content="Vitor Melo">
		<meta name="google-site-verification" content="QZ8m608yn54IfBqovXbZHx1GuyXDynL04NfLwjJKg7w">
		<meta name="msvalidate.01" content="F1482EA6DEE1CBDD3BE76A141F78B8B0">
		<meta name="robots" content="index, follow">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Title -->
		<title><?php wp_title(); ?></title>

		<!-- Styles -->
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/dest/css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<!-- Favicons -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/img/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory'); ?>/img/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/img/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/img/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/img/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/img/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/img/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/img/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/img/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicons/favicon-194x194.png" sizes="194x194">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicons/android-chrome-192x192.png" sizes="192x192">
		<link rel="manifest" href="<?php bloginfo('template_directory'); ?>/img/favicons/manifest.json">
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicons/favicon.ico">
		<meta name="msapplication-TileColor" content="#2f353e">
		<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/img/favicons/mstile-144x144.png">
		<meta name="msapplication-config" content="<?php bloginfo('template_directory'); ?>/img/favicons/browserconfig.xml">
		<meta name="theme-color" content="#2f353e">

		<!-- WordPress -->
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header role="banner">
			<div class="container">
				<a href="<?php bloginfo( 'url' ); ?>" class="logo">
					<img src="<?php bloginfo( 'template_directory' ); ?>/img/logo.svg" alt="Logo do site Piabedicas">
				</a>

				<nav role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'header', 'container_class' => 'header-menu' ) ); ?>
				</nav>

				<form class="search-form" role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>">
					<input type="search" id="searchtext" value="" name="s" placeholder="Pesquisar">
					<button type="submit" id="searchsubmit"><i></i></button>
				</form>

				<a href="http://facebook.com/piabedicas" class="facebook" target="_blank"><i class="fa fa-facebook-official"></i></a>

				<div class="ajax-loading-icon animation"></div>
				<div class="ajax-loading-error animation">Falha no carregamento</div>
			</div>
		</header>

		<main role="main">
