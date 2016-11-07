<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////


	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){

		// NOTICIAS DE
		if( ! taxonomy_exists('noticiasde')){

			$labels = array(
				'name'              => 'Noticias de',
				'singular_name'     => 'Noticia de',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todas',
				'edit_item'         => 'Editar Noticias de',
				'update_item'       => 'Actualizar Noticias de',
				'add_new_item'      => 'Nuevo Noticias de',
				'new_item_name'     => 'Nombre Nuevo Noticias de',
				'menu_name'         => 'Noticias de'
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

			register_taxonomy( 'noticiasde', 'post', $args );
		}

		// SHOWS
		if( ! taxonomy_exists('shows')){

			$labels = array(
				'name'              => 'Show',
				'singular_name'     => 'Show',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todas',
				'edit_item'         => 'Editar Show',
				'update_item'       => 'Actualizar Show',
				'add_new_item'      => 'Nuevo Show',
				'new_item_name'     => 'Nombre Nuevo Show',
				'menu_name'         => 'Show'
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
		
		
		
		// TERMS
		/*if ( ! term_exists( 'some-term', 'autor' ) ){
			wp_insert_term( 'Some term', 'category', array('slug' => 'some-term') );
		}*/

		/* // SUB TERMS CREATION
		if(term_exists('parent-term', 'category')){
			$term = get_term_by( 'slug', 'parent-term', 'category');
			$term_id = intval($term->term_id);
			if ( ! term_exists( 'child-term', 'category' ) ){
				wp_insert_term( 'A child term', 'category', array('slug' => 'child-term', 'parent' => $term_id) );
			}
			
		} */
	}
