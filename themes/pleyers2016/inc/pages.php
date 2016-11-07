<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// CONTACTO
		if( ! get_page_by_path('hack-me-amadeus') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Hack me Amadeus',
				'post_name'   => 'hack-me-amadeus',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


	});
