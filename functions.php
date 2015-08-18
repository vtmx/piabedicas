<?php

	// Theme Support
	add_theme_support('menus');
	add_theme_support('post-formats');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array('caption', 'comment-list', 'comment-form', 'gallery', 'search-form') );

	// Change Logo Login
	function pd_logo_login() {
		global $path_img;
		echo '<style type="text/css">.login h1 a {width: 274px; height: 63px; margin: 0 auto; background: url(wp-content/themes/piabedicas/img/wp-logo-admin.png) no-repeat !important;}</style>';
	}
	add_action( 'login_head', 'pd_logo_login' );


	// Remove Default Editor
	function add_custom_admin_styles() {
		echo '<style type="text/css">.post-type-comercio #postdivrich{ display:none!important; }</style>';
	}
	add_action('admin_head', 'add_custom_admin_styles');

	// HTML Default Editor
	add_filter('wp_default_editor', create_function( '', 'return "html";' ));

	// Add style editor
	function custom_editor() {
		echo '
			<style>
				.post-new-php .wp-editor-area, .post-php .wp-editor-area, #excerpt {
					width: 100% !important;
					min-height: 360px !important;
					font: 14px "Open Sans",sans-serif !important;
					line-height: 1.5 !important;
				}

				#insert-jetpack-contact-form {
					display: none !important;
				}

				.post-type-comercio #edit-slug-box {
					margin-bottom: 20px;
				}
			</style>
		';
	}
	add_action('admin_head', 'custom_editor');

	// style editor
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_content', 'wptexturize' );
	remove_filter( 'the_excerpt', 'wpautop' );
	remove_filter( 'the_excerpt', 'wptexturize' );
	remove_filter( 'acf_the_content', 'wpautop' );
	remove_filter( 'acf_the_content', 'wptexturize' );

	// markdown support
	add_filter( 'the_content', 'Markdown' );
	add_filter( 'the_excerpt', 'Markdown' );
	add_filter( 'acf_the_content', 'Markdown' );

	// Change Footer Description
	function pd_description() {
		return get_bloginfo( 'description' );
	}
	add_filter('admin_footer_text', 'pd_description');

	// Excerpt Length
	function my_excerpt_length($length) {
		return 35;
	}
	add_filter('excerpt_length', 'my_excerpt_length');

	// Return Search Blank
	function make_blank_search ($query){
		global $wp_query;
		if (isset($_GET['s']) && $_GET['s'] == ''){  //if search parameter is blank, do not return false
			$wp_query->set('s',' ');
			$wp_query->is_search=true;
	}
		return $query;
	}
	add_action('pre_get_posts','make_blank_search');

	// Register Menu
	register_nav_menu('menu', 'Menu');


	// Register Sidebar Blog
	register_sidebar( array(
		'name'          => 'Barra lateral Blog',
		'id'            => 'sidebar-blog',
		'description'   => 'Widgets será incluído na barra lateral do Blog.',
		'class'         => 'item',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	));


	// Remove Style of Gallery
	add_filter('use_default_gallery_style', '__return_false');

?>
