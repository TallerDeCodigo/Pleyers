<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////

	

	add_action('add_meta_boxes', function(){

		$types = array('post', 'episodios');
		foreach($types as $posttype){
			add_meta_box( 'post_video_meta', 'ID de Youtube', 'show_post_video_meta', $posttype, 'side', 'high' );
		}

		add_meta_box( 'id_cerocero_meta', 'ID de CeroCero', 'show_id_cerocero', 'graficos', 'side', 'high' );
		add_meta_box( 'nombre_autor_meta', 'Autor de la frase', 'show_nombre_autor_meta', 'frases', 'side', 'high' );
		add_meta_box( 'id_pleyers_twitter_meta', 'ID de Twitter', 'show_id_pleyers_twitter_meta', 'tweets', 'side', 'high' );
	});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////



	function show_post_video_meta($post){
		$eg_sources_youtube = get_post_meta($post->ID, 'eg_sources_youtube', true);
		wp_nonce_field(__FILE__, 'post_video_meta_nonce');
		echo "<input type='text' class='widefat' id='eg_sources_youtube' name='eg_sources_youtube' value='$eg_sources_youtube'/>";
	}

	function show_id_cerocero($post){
		$id_cerocero = get_post_meta($post->ID, 'id_cerocero', true);
		wp_nonce_field(__FILE__, 'id_cerocero_meta_nonce');
		echo "<input type='text' class='widefat' id='id_cerocero' name='id_cerocero' value='$id_cerocero'/>";
	}

	function show_id_pleyers_twitter_meta($post){
		$id_twitter = get_post_meta($post->ID, 'id_twitter', true);
		wp_nonce_field(__FILE__, 'id_twitter_meta_nonce');
		echo "<input type='text' class='widefat' id='id_twitter' name='id_twitter' value='$id_twitter'/>";
	}

	function show_nombre_autor_meta($post){
		$nombre_autor = get_post_meta($post->ID, 'nombre_autor', true);
		wp_nonce_field(__FILE__, 'nombre_autor_meta_nonce');
		echo "<input type='text' class='widefat' id='nombre_autor' name='nombre_autor' value='$nombre_autor'/>";
	}

// SAVE METABOXES DATA ///////////////////////////////////////////////////////////////



	add_action('save_post', function($post_id){


		if ( ! current_user_can('edit_page', $post_id)) 
			return $post_id;


		if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE ) 
			return $post_id;
		
		
		if ( wp_is_post_revision($post_id) OR wp_is_post_autosave($post_id) ) 
			return $post_id;


		if ( isset($_POST['eg_sources_youtube']) and check_admin_referer(__FILE__, 'post_video_meta_nonce') ){
			update_post_meta($post_id, 'eg_sources_youtube', $_POST['eg_sources_youtube']);
		}

		if ( isset($_POST['id_cerocero']) and check_admin_referer(__FILE__, 'id_cerocero_meta_nonce') ){
			update_post_meta($post_id, 'id_cerocero', $_POST['id_cerocero']);
		}

		if ( isset($_POST['id_twitter']) and check_admin_referer(__FILE__, 'id_twitter_meta_nonce') ){
			update_post_meta($post_id, 'id_twitter', $_POST['id_twitter']);
		}

		if ( isset($_POST['nombre_autor']) and check_admin_referer(__FILE__, 'nombre_autor_meta_nonce') ){
			update_post_meta($post_id, 'nombre_autor', $_POST['nombre_autor']);
		}

		// Guardar correctamente los checkboxes
		/*if ( isset($_POST['_checkbox_meta']) and check_admin_referer(__FILE__, '_checkbox_nonce') ){
			update_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		} else if ( ! defined('DOING_AJAX') ){
			delete_post_meta($post_id, '_checkbox_meta');
		}*/


	});



// OTHER METABOXES ELEMENTS //////////////////////////////////////////////////////////
