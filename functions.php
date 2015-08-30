<?php
	// Change login logo
	function custom_login_logo() {
		echo
		'<style>
			.login h1 {
				margin-bottom: 10px;
			}

			.login h1 a {
				width: 274px;
				height: 63px;
				margin: 0 auto;
				background: url(wp-content/themes/piabedicas/img/wp-logo-admin.png) no-repeat !important;
			}
		</style>';
	}
	add_action('login_head', 'custom_login_logo');

	// Custom Admin Style
	function custom_admin_css() {
		echo
		'<style>
			/* Adjust price ACF media field */
			.media-sidebar .acf-input-prepend {
				padding: 13px 7px;
				line-height: 0;
			}
		</style>';

		if (current_user_can('author')) {
			echo
				'<style>
					/* Hide Elements */

					/* Sidebar */
					#adminmenu, #adminmenuback, #adminmenuwrap {
						display: none;
					}

					/* Options and help */
					#screen-meta, #screen-meta-links {
					   display: none;
				   	}

					/* Add new store button */
					.page-title-action {
						display: none;
					}

					/* Text editor toolbar */
					.quicktags-toolbar {
						display: none;
					}

					/* Version footer */
					#footer-upgrade {
							display: none;
					}

					/* Customize */
					.folded #wpcontent, .folded #wpfooter {
						margin-left: 0;
						padding-left: 15px;
					}

					/* Hide alt att media field */
					.setting[data-setting="alt"] {
						display: none;
					}
				</style>';
		}
	}
	add_action('admin_head', 'custom_admin_css');

	// Custom Admin JS
	function custom_admin_js() {
		if (current_user_can('author')) {
			echo
				'<script>
					document.body.className+=" folded";
				</script>';
		}
	}
	add_action('admin_footer', 'custom_admin_js');

	// Custom interface if Author user
	if (current_user_can('author')) {

		function remove_admin_bar_links() {
			global $wp_admin_bar;
			$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
			$wp_admin_bar->remove_menu('comments');         // Remove the comments link
			$wp_admin_bar->remove_menu('dashboard');        // Remove the site name menu
			$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
			$wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
			$wp_admin_bar->remove_menu('new-content');      // Remove the content link
			$wp_admin_bar->remove_menu('site-name');       // Remove the site name menu
			$wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
			$wp_admin_bar->remove_menu('updates');          // Remove the updates link
			$wp_admin_bar->remove_menu('view-site');        // Remove the view site link
			$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
			$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
			$wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
			// $wp_admin_bar->remove_menu('my-account');    // Remove the user details tab
			// $wp_admin_bar->remove_menu('view');          // If you use w3 total cache remove the performance link
		}

		add_action('wp_before_admin_bar_render', 'remove_admin_bar_links');


		function disable_dashboard_metabox() {

			// Dashboard metabox
			remove_meta_box('dashboard_activity', 'dashboard', 'core');
			remove_meta_box('dashboard_right_now', 'dashboard', 'core');
			remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
			remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
			remove_meta_box('dashboard_plugins', 'dashboard', 'core');
			remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
			remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
			remove_meta_box('dashboard_gravfx_feed', 'dashboard', 'core');
			remove_meta_box('dashboard_primary', 'dashboard', 'side');
			remove_meta_box('dashboard_secondary', 'dashboard', 'side');
			remove_meta_box('authordiv', 'comercio', 'normal');
			remove_meta_box('commentsdiv', 'comercio', 'normal');
			remove_meta_box('commentstatusdiv', 'comercio', 'normal');
			remove_meta_box('slugdiv', 'comercio', 'normal');

			// Menu
			remove_menu_page('index.php');                   // Dashboard
			remove_menu_page('edit.php');                    // Posts
			remove_menu_page('upload.php');                  // Media
			remove_menu_page('edit.php?post_type=page');     // Pages
			remove_menu_page('edit-comments.php');           // Comments
			remove_menu_page('themes.php');                  // Appearance
			remove_menu_page('plugins.php');                 // Plugins
			remove_menu_page('users.php');                   // Users
			remove_menu_page('profile.php');                 // Users
			remove_menu_page('tools.php');                   // Tools
			remove_menu_page('options-general.php');         // Settings
			remove_menu_page('wpcf7');                       // Contact7
			remove_menu_page('edit.php?post_type=comercio'); // Comércio
			remove_submenu_page('edit.php?post_type=comercio', 'edit.php?post_type=comercio');     // Submenu All Stores
			remove_submenu_page('edit.php?post_type=comercio', 'post-new.php?post_type=comercio'); // Submenu New Store
		}

		add_action('admin_menu', 'disable_dashboard_metabox');


		// Add new dashboard widgets
		function piabedias_add_dashboard_widgets() {
			wp_add_dashboard_widget( 'piabedias_dashboard_welcome_widget', 'Bem Vindo', 'piabedias_add_welcome_widget' );
		}
		function piabedias_add_welcome_widget() {
			echo 'Links necessários para a manutenção do site:';
			echo
			'<ul>
		        <li><a href="/piabedicas/wp-admin/edit.php?post_type=comercio">Página de comércios</a></li>
		    </ul>';
		}
		add_action( 'wp_dashboard_setup', 'piabedias_add_dashboard_widgets' );
	}


	// Theme support
	add_theme_support('custom-background');
	add_theme_support('custom-header');
	add_theme_support('html5', array('caption', 'comment-list', 'comment-form', 'gallery', 'search-form'));
	add_theme_support('menus');
	add_theme_support('post-formats');
	add_theme_support('post-thumbnails');

	// Style editor
	remove_filter('the_content', 'wpautop');
	remove_filter('the_content', 'wptexturize');
	remove_filter('the_excerpt', 'wpautop');
	remove_filter('the_excerpt', 'wptexturize');
	remove_filter('acf_the_content', 'wpautop');
	remove_filter('acf_the_content', 'wptexturize');

	// Remove style of gallery
	add_filter('use_default_gallery_style', '__return_false');

	// Markdown support
	add_filter('the_content', 'Markdown');
	add_filter('the_excerpt', 'Markdown');
	add_filter('acf_the_content', 'Markdown');

	// Change Footer Description
	function pd_description() {
		return get_bloginfo('description');
	}
	add_filter('admin_footer_text', 'pd_description');

	// Return Search Blank
	function make_blank_search ($query){
		global $wp_query;
		if (isset($_GET['s']) && $_GET['s'] == ''){  //if search parameter is blank, do not return false
			$wp_query->set('s',' ');
			$wp_query->is_search=true;
	}
		return $query;
	}
	add_action('pre_get_posts', 'make_blank_search');

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

?>
