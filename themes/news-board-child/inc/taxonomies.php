<?php

// TAXONOMIES ////////////////////////////////////////////////////////////////////////


	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){

		// SHOWS EN VIDEO
		if( ! taxonomy_exists('shows')){

			$labels = array(
				'name'              => 'Nombres de shows',
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

}

?>