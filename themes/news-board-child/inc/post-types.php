<?php

	add_action('init', function(){
		
		//NEWS

		$labels = array(
			'name' 			=> 	'News',
			'singular_name'	=>	'new news',
			'add_new'		=>	'Nueva news',
			'add_new_item'  => 	'Nueva news',
			'edit_item'     => 	'Editar news',
			'new_item'      => 	'Nueva news',
			'all_items'     => 	'Todas',
			'view_item'     => 	'Ver news',
			'search_items'  => 	'Buscar news',
			'not_found'     => 	'No se encontro',
			'menu_name'     => 	'News'
			);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'news' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
			);
		register_post_type('new', $args);

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
	
?>