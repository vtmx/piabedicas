<?php

// add_action( 'init', 'cptui_register_my_cpts' );
// function cptui_register_my_cpts() {
// 	$labels = array(
// 		"name" => "Comércios",
// 		"singular_name" => "Comercio",
// 		"menu_name" => "Comércios",
// 		"all_items" => "Todos os Comércios",
// 		"add_new" => "Adicionar Novo",
// 		"add_new_item" => "Adicionar Novo Comércio",
// 		"edit" => "Editar",
// 		"edit_item" => "Editar Comércio",
// 		"new_item" => "Novo Comércio",
// 		"view" => "Exibir",
// 		"view_item" => "Exibir Comércio",
// 		"search_items" => "Pesquisar Comércio",
// 		"not_found" => "Comércio não encontrado",
// 		"not_found_in_trash" => "Lixeira sem comércio",
// 		"parent" => "Pai Comércio",
// 		);
//
// 	$args = array(
// 		"labels" => $labels,
// 		"description" => "",
// 		"public" => true,
// 		"show_ui" => true,
// 		"has_archive" => false,
// 		"show_in_menu" => true,
// 		"exclude_from_search" => false,
// 		"capability_type" => "post",
// 		"map_meta_cap" => true,
// 		"hierarchical" => false,
// 		"rewrite" => array( "slug" => "comercio", "with_front" => true ),
// 		"query_var" => true,
//
// 		"supports" => array( "title", "comments" ),
// 	);
// 	register_post_type( "comercio", $args );
//
// // End of cptui_register_my_cpts()
// }
//
//
//
//
// add_action( 'init', 'cptui_register_my_taxes' );
// function cptui_register_my_taxes() {
//
// 	$labels = array(
// 		"name" => "categoria-comercio",
// 		"label" => "Categorias",
// 		"menu_name" => "Categorias",
// 		"all_items" => "Todas as Categorias",
// 		"edit_item" => "Editar Categoria",
// 		"view_item" => "Exibir Categoria",
// 		"update_item" => "Atualizar Categoria",
// 		"add_new_item" => "Adicionar Nova Categoria",
// 		"new_item_name" => "Nova Categoria",
// 		"parent_item" => "Pai Categoria",
// 		"parent_item_colon" => "Pai Categoria",
// 		"search_items" => "Pesquisar Categorias",
// 		"popular_items" => "Categorias Populares",
// 		"separate_items_with_commas" => "Separar categoria com vírgula",
// 		"add_or_remove_items" => "Adicionar ou remover categoria",
// 		"choose_from_most_used" => "Escolher categorias mais usadas",
// 		"not_found" => "Categoria não encontrada",
// 		);
//
// 	$args = array(
// 		"labels" => $labels,
// 		"hierarchical" => true,
// 		"label" => "Categorias",
// 		"show_ui" => true,
// 		"query_var" => true,
// 		"rewrite" => array( 'slug' => 'categoria-comercio', 'with_front' => true ),
// 		"show_admin_column" => false,
// 	);
// 	register_taxonomy( "categoria-comercio", array( "comercio" ), $args );
//
// // End cptui_register_my_taxes
// }


?>
