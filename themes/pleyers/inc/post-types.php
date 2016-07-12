<?php


// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// EPISODIOS
		$labels = array(
			'name'          => 'Episodios',
			'singular_name' => 'Episodio',
			'add_new'       => 'Nuevo Episodio',
			'add_new_item'  => 'Nuevo Episodio',
			'edit_item'     => 'Editar Episodio',
			'new_item'      => 'Nuevo Episodio',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Episodio',
			'search_items'  => 'Buscar Episodio',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Episodios'
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
		register_post_type( 'episodios', $args );

		// GRAFICOS
		$labels = array(
			'name'          => 'Gráficos',
			'singular_name' => 'Gráfico',
			'add_new'       => 'Nuevo Gráfico',
			'add_new_item'  => 'Nuevo Gráfico',
			'edit_item'     => 'Editar Gráfico',
			'new_item'      => 'Nuevo Gráfico',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Gráfico',
			'search_items'  => 'Buscar Gráfico',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Gráficos'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'graficos' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'graficos', $args );

	});