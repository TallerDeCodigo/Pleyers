<?php 
	
	$url = 'http://lospleyers.com/api_twitter/';
	$content = file_get_contents($url);
	$tweets = json_decode($content, true);

	$args = array(
			'post_type'			=> 'tweets',
			'posts_per_page'	=> -1
		);

	$tweet_posts = get_posts($args);
	$tweets_in_db = array();
	foreach($tweet_posts as $post): setup_postdata($post);

		$tweets_in_db[] = get_post_meta($post->ID, 'id_twitter', true);
		
	endforeach;

	//print_r($tweets_in_db);

	foreach($tweets as $item) {
		// echo '<pre>';
		// print_r($item);
		// echo '</pre>';

		$id = $item['id'];
		$content = $item['text'];
		$date = $item['created_at'];

		$newDate = date("Y-m-d H:i:s", strtotime($date));


		
		$tweet = array(
			
			'post_date' 		=> $newDate,
			'post_title' 		=> $id,
			'post_type'			=> 'tweets',
			'post_status'		=> 'publish',	
			'post_content'		=> $content

		);

		

		if (!in_array($id, $tweets_in_db)) {
			$post_id = wp_insert_post( $tweet );
	 		update_post_meta($post_id, 'id_twitter', $id, '');
	 	}
	}
		


?>