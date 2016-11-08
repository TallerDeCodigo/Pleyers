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


		// SPRINTS
		$labels = array(
			'name'          => 'Sprints',
			'singular_name' => 'Sprint',
			'add_new'       => 'Nuevo Sprint',
			'add_new_item'  => 'Nuevo Sprint',
			'edit_item'     => 'Editar Sprint',
			'new_item'      => 'Nuevo Sprint',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Sprint',
			'search_items'  => 'Buscar Sprint',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Sprints'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'sprints' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'sprints', $args );



		// TWEETS
		$labels = array(
			'name'          => 'Tweets',
			'singular_name' => 'Tweet',
			'add_new'       => 'Nuevo Tweet',
			'add_new_item'  => 'Nuevo Tweet',
			'edit_item'     => 'Editar Tweet',
			'new_item'      => 'Nuevo Tweet',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Tweet',
			'search_items'  => 'Buscar Tweet',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Tweets'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'tweets' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'editor', 'thumbnail' )
		);
		register_post_type( 'tweets', $args );

		// FRASE DEL DÍA
		$labels = array(
			'name'          => 'Frase del día',
			'singular_name' => 'Frase',
			'add_new'       => 'Nueva Frase',
			'add_new_item'  => 'Nueva Frase',
			'edit_item'     => 'Editar Frase',
			'new_item'      => 'Nueva Frase',
			'all_items'     => 'Todos',
			'view_item'     => 'Ver Frase',
			'search_items'  => 'Buscar Frase',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Frase del día'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'frases' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title' )
		);
		register_post_type( 'frases', $args );
		
	});