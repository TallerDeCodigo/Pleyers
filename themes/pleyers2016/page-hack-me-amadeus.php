<?php 
	
	$url = 'http://cerocero.mx/api/';
	$graficos = file_get_contents($url);
	$json = json_decode($graficos, true);

	$args = array(
			'post_type'			=> 'graficos',
			'posts_per_page'	=> -1
		);

	$posts_in_db = get_posts($args);
	$ids_in_db = array();
	
	foreach($posts_in_db as $post): setup_postdata($post);

		$ids_in_db[] = get_post_meta($post->ID, 'id_cerocero', true);
		
	endforeach;

	//print_r($ids_in_db);

	foreach($json as $item) {
	    
		$ceroceroid 	= $item['id'];
		$title 			= $item['name'];
		$date 			= $item['date'];
		$img 			= $item['thumbnail'];

		$grafico = array(
			
			'post_date' 		=> $date,
			'post_title' 		=> $title,
			'post_type'			=> 'graficos',
			'post_status'		=> 'publish'	

		);

		//print_r($grafico);

		if (!in_array($ceroceroid, $ids_in_db)) {
			$post_id = wp_insert_post( $grafico );
	 		update_post_meta($post_id, 'id_cerocero', $ceroceroid, '');
	 		set_featured_image($img, $post_id);
	 	}
	}
?>