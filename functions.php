<?php

add_action( 'init', 'register_my_menus' );
	// Change login logo
	function custom_login_logo() {
		echo
		"<style>
			.login h1 {
				margin-bottom: 10px;
			}

			.login h1 a {
				width: 274px;
				height: 63px;
				margin: 0 auto;
				background: url(wp-content/themes/piabedicas/img/wp-logo-admin.png) no-repeat !important;
			}
		</style>";
	}
	add_action( 'login_head', 'custom_login_logo' );

	// Custom Admin Style
	function custom_admin_css() {
		echo
		"<style>
			/* Adjust price ACF media field */
			.media-sidebar .acf-input-prepend, .media-modal .acf-input-prepend {
				padding: 13px 7px;
				line-height: 0;
			}

			/* Remove more button of editor */
			.quicktags-toolbar {
				display: none;
			}

			/* Add style editor ACF */
			.wp-editor-area {
				margin-top: 0 !important;
				padding: 10px !important;
				font-family: 'open sans', sans-serif !important;
				font-size: 14px !important;
				box-shadow: inset 0 1px 2px rgba(0,0,0,.07) !important;
			}

			/* Add shadow in gallery field */
			.acf-gallery-attachments {
				box-shadow: inset 0 1px 2px rgba(0,0,0,.07) !important;
			}

			/* Hide label fields, because repeat in layout */
			.acf-field-wysiwyg .acf-label, .acf-field-gallery .acf-label {
				display: none !important;
			}

			/* Height ACF visual editor */
			.mce-edit-area iframe {
				height: 600px !important;
			}
		</style>";

		if (current_user_can( 'author' )) {
			echo
				"<style>
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

					/* Hide fields media */
					.setting[data-setting='alt']/*, .setting[data-setting='caption']*/ {
						display: none;
					}

					/* Hide fields products */
					.layout[data-layout='products'] .acf-field[data-name='alt'],
					.layout[data-layout='products'] .acf-field[data-name='caption'] {
						display: none;
					}

					/* Hide YoastSeo to post store */
					#wpseo_meta {
						display: none;
					}
				</style>";
		}
	}
	add_action( 'admin_head', 'custom_admin_css' );

	// Custom Admin JS
	function custom_admin_js() {
		if (current_user_can( 'author' )) {
			echo
				'<script>
					document.body.className+=" folded";
				</script>';
		}
	}
	add_action( 'admin_footer', 'custom_admin_js' );

	// Custom interface if Author user
	if (current_user_can( 'author' )) {

		function remove_admin_bar_links() {
			global $wp_admin_bar;
			$wp_admin_bar->remove_menu( 'about' );            // Remove the about WordPress link
			$wp_admin_bar->remove_menu( 'comments' );         // Remove the comments link
			$wp_admin_bar->remove_menu( 'dashboard' );        // Remove the site name menu
			$wp_admin_bar->remove_menu( 'documentation' );    // Remove the WordPress documentation link
			$wp_admin_bar->remove_menu( 'feedback' );         // Remove the feedback link
			$wp_admin_bar->remove_menu( 'new-content' );      // Remove the content link
			$wp_admin_bar->remove_menu( 'site-name' );       // Remove the site name menu
			$wp_admin_bar->remove_menu( 'support-forums' );   // Remove the support forums link
			$wp_admin_bar->remove_menu( 'updates' );          // Remove the updates link
			$wp_admin_bar->remove_menu( 'view-site' );        // Remove the view site link
			$wp_admin_bar->remove_menu( 'wporg' );            // Remove the WordPress.org link
			$wp_admin_bar->remove_menu( 'wp-logo' );          // Remove the WordPress logo
			$wp_admin_bar->remove_menu( 'w3tc' );             // If you use w3 total cache remove the performance link
			$wp_admin_bar->remove_menu( 'wpseo-menu' );             // If you use w3 total cache remove the performance link
			// $wp_admin_bar->remove_menu( 'my-account' );    // Remove the user details tab
			// $wp_admin_bar->remove_menu( 'view' );          // If you use w3 total cache remove the performance link
		}

		add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );


		function disable_dashboard_metabox() {

			// Dashboard metabox
			remove_meta_box( 'dashboard_activity', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_gravfx_feed', 'dashboard', 'core' );
			remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
			remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
			remove_meta_box( 'authordiv', 'comercio', 'normal' );
			remove_meta_box( 'commentsdiv', 'comercio', 'normal' );
			remove_meta_box( 'commentstatusdiv', 'comercio', 'normal' );
			remove_meta_box( 'slugdiv', 'comercio', 'normal' );
			remove_meta_box( 'wpseo_meta', 'comercio', 'normal' );

			// Menu
			remove_menu_page( 'index.php' );                   // Dashboard
			remove_menu_page( 'edit.php' );                    // Posts
			remove_menu_page( 'upload.php' );                  // Media
			remove_menu_page( 'edit.php?post_type=page' );     // Pages
			remove_menu_page( 'edit-comments.php' );           // Comments
			remove_menu_page( 'themes.php' );                  // Appearance
			remove_menu_page( 'plugins.php' );                 // Plugins
			remove_menu_page( 'users.php' );                   // Users
			remove_menu_page( 'profile.php' );                 // Users
			remove_menu_page( 'tools.php' );                   // Tools
			remove_menu_page( 'options-general.php' );         // Settings
			remove_menu_page( 'wpcf7' );                       // Contact7
			remove_menu_page( 'edit.php?post_type=comercio' ); // Comércio
			remove_submenu_page( 'edit.php?post_type=comercio', 'edit.php?post_type=comercio' );     // Submenu All Stores
			remove_submenu_page( 'edit.php?post_type=comercio', 'post-new.php?post_type=comercio' ); // Submenu New Store
		}

		add_action( 'admin_menu', 'disable_dashboard_metabox' );


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

	// Register menus
	function register_my_menus() {
	  register_nav_menus(
	    array(
	      'header'           => __( 'header' ),
	      'store-categories' => __( 'store-categories' )
	    )
	  );
	}

	// Theme support
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'html5', array( 'caption', 'comment-list', 'comment-form', 'gallery', 'search-form' ));
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );

	// Using Plugin Simple Image Sizes
	add_image_size( 'store-thumb', 200, 160, true );
	add_image_size( 'store-single-thumb', 250, 200, true );
	add_image_size( 'store-single-gallery', 217, 145, true );

	// Style editor
	add_editor_style( 'dest/css/style-editor.css' );
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_content', 'wptexturize' );
	remove_filter( 'the_excerpt', 'wpautop' );
	remove_filter( 'the_excerpt', 'wptexturize' );
	remove_filter( 'acf_the_content', 'wpautop' );
	remove_filter( 'acf_the_content', 'wptexturize' );

	// Use text editor by default
	//add_filter( 'wp_default_editor', create_function( '', 'return "html";' ));
	//add_filter( 'user_can_richedit', create_function( '' , 'return false;' ) , 50);

	// Remove style of gallery
	add_filter( 'use_default_gallery_style', '__return_false' );

	// Markdown support
	add_filter( 'the_content', 'Markdown' );
	add_filter( 'the_excerpt', 'Markdown' );
	add_filter( 'acf_the_content', 'Markdown' );

	// Change Footer Description
	function footer_editor() {
		return get_bloginfo( 'description' );
	}
	add_filter( 'admin_footer_text', 'footer_editor' );

	// Return Search Blank
	function make_blank_search ($query){
		global $wp_query;
		if (isset($_GET['s']) && $_GET['s'] == '' ){  //if search parameter is blank, do not return false
			$wp_query->set( 's',' ' );
			$wp_query->is_search=true;
	}
		return $query;
	}
	add_action( 'pre_get_posts', 'make_blank_search' );


	// Theme check
	if ( ! isset( $content_width ) ) { $content_width = 600; }
	register_sidebars( $number, $args );

	add_action( 'widgets_init', 'vitormelo_widgets' );
	function vitormelo_widgets() {
	    register_sidebar( array(
	        'name' => __( 'Main Sidebar', 'vitormelo' ),
	        'id' => 'sidebar-1',
	        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
	        'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="title-widget">',
			'after_title'   => '</h2>',
	    ) );
	}
?>
