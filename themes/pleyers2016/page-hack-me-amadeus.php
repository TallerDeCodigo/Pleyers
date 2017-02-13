<?php 
	
function pleyers_insert_post_and_attachment(){

	$url = 'http://cerocero.mx/api/';
	$graficos = file_get_contents($url);
	$json = json_decode($graficos, true);



	$args = array(
			'post_type'			=> 'graficos',
			'posts_per_page'	=> -1
		);

	$posts_in_db = get_posts($args);


	$ids_in_db = array();

	foreach($posts_in_db as $post):
		setup_postdata($post);
		$ids_in_db[] = get_post_meta($post->ID, 'id_cerocero', true);
	endforeach;


	foreach($json as $item) {

		$ceroceroid 	= $item['id'];
		$title 			= $item['name'];
		$date 			= $item['date'];
		$img 			= $item['thumbnail'];

		$grafico = array(
			
			'post_date' 		=> $date,
			'post_title' 		=> $title,
			'post_type'			=> 'graficos',
			'post_status'		=> 'publish',
		);


		if (!in_array($ceroceroid, $ids_in_db)) {

			$post_id = wp_insert_post( $grafico );

			$filename = basename($img);
			$upload_file = wp_upload_bits($filename, null, file_get_contents($img));
			$wp_filetype = wp_check_filetype($filename, null );

			$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
				'post_content' => '',
				'post_status' => 'inherit'
			);

			$attachment_id = wp_insert_attachment( $attachment, $upload_file['file'] );

			require_once(ABSPATH . "wp-admin" . '/includes/image.php');

			$attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
			wp_update_attachment_metadata( $attachment_id, $attachment_data );

			update_post_meta($post_id, 'id_cerocero', $ceroceroid, '');
			set_post_thumbnail($post_id, $attachment_id);

	 	}else{
	 		// echo "no se insertó el post";
	 	}
	}

	return;

}
