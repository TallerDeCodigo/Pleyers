<?php
/* --------- Insert your customized functions on next rows --------- */


add_action('init', function(){
		
		//NEWS

		$labels = array(
			'name' 			=> 	'Noticias',
			'singular_name'	=>	'new noticia',
			'add_new'		=>	'Nueva noticia',
			'add_new_item'  => 	'Nueva noticia',
			'edit_item'     => 	'Editar noticia',
			'new_item'      => 	'Nueva noticia',
			'all_items'     => 	'Todas',
			'view_item'     => 	'Ver noticia',
			'search_items'  => 	'Buscar noticia',
			'not_found'     => 	'No se encontro',
			'menu_name'     => 	'Noticias'
			);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'noticia' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
			);
		register_post_type('noticia', $args);

		//EPISODIOS

		$labels = array(
			'name' 			=> 	'Episodios',
			'singular_name'	=>	'new episodio',
			'add_new'		=>	'Nueva episodio',
			'add_new_item'  => 	'Nueva episodio',
			'edit_item'     => 	'Editar episodio',
			'new_item'      => 	'Nueva episodio',
			'all_items'     => 	'Todas',
			'view_item'     => 	'Ver episodio',
			'search_items'  => 	'Buscar new',
			'not_found'     => 	'No se encontro',
			'menu_name'     => 	'Episodios'
			);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'episodios' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
			);
		register_post_type('episodios', $args);


		//OPINION
		$labels = array(
			'name' 			=> 	'Opiniones',
			'singular_name'	=>	'opinion',
			'add_new'		=>	'Nueva opinion',
			'add_new_item'  => 	'Nueva opinion',
			'edit_item'     => 	'Editar opinion',
			'new_item'      => 	'Nueva opinion',
			'all_items'     => 	'Todas',
			'view_item'     => 	'Ver opinion',
			'search_items'  => 	'Buscar opinion',
			'not_found'     => 	'No se encontro',
			'menu_name'     => 	'Opiniones'
			);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'opiniones' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
			);
		register_post_type('opinion', $args);

	});//end add action
	

// TAXONOMIES ////////////////////////////////////////////////////////////////////////


	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){

		// SHOWS EN VIDEO
		if( ! taxonomy_exists('shows')){

			$labels = array(
				'name'              => 'Nombres shows',
				'singular_name'     => 'Show',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Show',
				'update_item'       => 'Actualizar Show',
				'add_new_item'      => 'Nueva Show',
				'new_item_name'     => 'Nombre Nueva Show',
				'menu_name'         => 'Nombres de shows'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'shows' ),
			);

			register_taxonomy( 'shows', 'episodios', $args );
		}


		// NOTICIAS DE 
		if( ! taxonomy_exists('noticiasde')){

			$labels = array(
				'name'              => 'Noticias de',
				'singular_name'     => 'Noticia de',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Noticia de',
				'update_item'       => 'Actualizar Noticia de',
				'add_new_item'      => 'Nueva Noticia de',
				'new_item_name'     => 'Nombre Nueva Noticia de',
				'menu_name'         => 'Nombres de shows'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'noticiasde' ),
			);

			register_taxonomy( 'noticiasde', 'noticia', $args );
		}

}
	

?>