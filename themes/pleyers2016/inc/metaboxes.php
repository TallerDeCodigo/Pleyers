<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////

	

	add_action('add_meta_boxes', function(){

		$types = array('post', 'episodios');
		foreach($types as $posttype){
			add_meta_box( 'post_video_meta', 'ID de Youtube', 'show_post_video_meta', $posttype, 'side', 'high' );
		}
		add_meta_box( 'id_poll', 'Liga para encuesta', 'show_id_poll_question', 'post', 'side', 'high');
		add_meta_box( 'id_cerocero_meta', 'ID de CeroCero', 'show_id_cerocero', 'graficos', 'side', 'high' );
		add_meta_box( 'nombre_autor_meta', 'Autor de la frase', 'show_nombre_autor_meta', 'frases', 'side', 'high' );
		add_meta_box( 'id_pleyers_twitter_meta', 'ID de Twitter', 'show_id_pleyers_twitter_meta', 'tweets', 'side', 'high' );
		add_meta_box( 'id_fecha_partido', 'Información del partido', 'show_get_match_calendar', 'calendarios', 'side', 'high');
		add_meta_box( 'id_tipo_sprint', 'Tamaños de imagen', 'show_get_sprint_type', array('sprints', 'episodios'), 'side', 'high' ); 
	});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////


	function show_post_video_meta($post){
		$eg_sources_youtube = get_post_meta($post->ID, 'eg_sources_youtube', true);
		$check_thumb 		= get_post_meta($post->ID, 'check_thumb', true) ? 'checked' : '';

		wp_nonce_field(__FILE__, 'post_video_meta_nonce');

		echo "<input type='text' class='widefat' id='eg_sources_youtube' name='eg_sources_youtube' value='$eg_sources_youtube'/>";
		echo "<br/><br />";

		echo "<label class='selectit'>";
		echo "<input type='checkbox' name='check_thumb' value='1' $check_thumb>";
		echo "Importar thumbnail</label>";
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

	function show_get_match_calendar($post){
		$fecha_match = get_post_meta($post->ID, '_fecha_match_meta', true);  
		$hora_match = get_post_meta($post->ID, '_hora_match_meta', true); 
		$liga_match = get_post_meta($post->ID, '_liga_match_meta', true); 
		$equipo_uno_match = get_post_meta($post->ID, '_equipo_uno_match_meta', true); 
		$equipo_dos_match = get_post_meta($post->ID, '_equipo_dos_match_meta', true); 

		echo ("
				<label for='fecha_match'>Fecha del partido</label><br>
				<input type='text' id='fecha_match' name='fecha_match', value='$fecha_match' ><br>

				<label for='hora_match'>Hora del partido</label><br>
				<input type='text' id='hora_match' name='hora_match', value='$hora_match' ><br>

				<label for='liga_match'>Liga donde se juega</label><br>
				<input type='text' id='liga_match' name='liga_match', value='$liga_match' ><br>

				<label for='equipo_uno_match'>Equipo uno</label><br>
				<input type='text' id='equipo_uno_match' name='equipo_uno_match', value='$equipo_uno_match' ><br>

				<label for='equipo_dos_match'>Equipo dos</label><br>
				<input type='text' id='equipo_dos_match' name='equipo_dos_match', value='$equipo_dos_match' > <br>
			");
	}

	function show_get_sprint_type($post){
		$sprint_type = get_post_meta($post->ID, 'sprint_type_meta', true);

		if($sprint_type == 'sin_foto'){
			$sel1 = 'selected';
			$sel2 = '';
			$sel3 = '';
		}else if($sprint_type == 'foto_chica'){
			$sel1 = '';
			$sel2 = 'selected';
			$sel3 = '';
		}else if($sprint_type == 'foto_grande'){
			$sel1 = '';
			$sel2 = '';
			$sel3 = 'selected';
		}

		echo ("	

				<select id='image_type' name='option_selected'>
				    <option  if( $sprint_type == 'sin_foto'){ 		$sel = 'selected'; }  value='sin_foto' $sel1> 	Sin Fotografía   </option>
				    <option  if( $sprint_type == 'foto_chica'){ 	$sel = 'selected'; }  value='foto_chica' $sel2>	Fotografía chica </option>
				    <option  if( $sprint_type == 'foto_grande'){	$sel = 'selected'; }  value='foto_grande' $sel3> Fotografía gande </option>
				</select>

				<label for='image_type'>Sprint type</label>
				<em>Selecciona una opción de imagen para el sprint</em>

			");

		wp_nonce_field(__FILE__, 'sprint_type_meta_nonce');
	}


	function show_id_poll_question($post){
		$poll_question = get_post_meta($post->ID, 'poll_question_meta', true);

		echo ("
				<input class='widefat' type='text' id='poll_question_meta' name='poll_question_meta' value='".$poll_question."'> 
			");

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
			update_post_meta($post_id, 'check_thumb', $_POST['check_thumb']);
			if (isset($_POST['check_thumb'])) {
				if (get_the_post_thumbnail_url($post_id) == ''){
					$image = 'https://img.youtube.com/vi/'.$_POST['eg_sources_youtube'].'/maxresdefault.jpg';
					$media = media_sideload_image($image, $post_id);
					if(!empty($media) && !is_wp_error($media)){
					    $args = array(
					        'post_type' => 'attachment',
					        'posts_per_page' => -1,
					        'post_status' => 'any',
					        'post_parent' => $post_id
					    );
					    $attachments = get_posts($args);
					    if(isset($attachments) && is_array($attachments)){
					        foreach($attachments as $attachment){
					            $image = wp_get_attachment_image_src($attachment->ID, 'full');
					            if(strpos($media, $image[0]) !== false){
					                set_post_thumbnail($post_id, $attachment->ID);
					                break;
					            }
					        }
					    }
					}	
				}
			}
		}else{
			delete_post_meta($post_id, 'eg_sources_youtube');
			delete_post_meta($post_id, 'check_thumb');
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

		if ( isset($_POST['fecha_match']) ){
			update_post_meta($post_id, '_fecha_match_meta', $_POST['fecha_match']);
		}

		if ( isset($_POST['hora_match']) ){
			update_post_meta($post_id, '_hora_match_meta', $_POST['hora_match']);
		}

		if ( isset($_POST['liga_match']) ){
			update_post_meta($post_id, '_liga_match_meta', $_POST['liga_match']);
		}

		if ( isset($_POST['equipo_uno_match']) ){
			update_post_meta($post_id, '_equipo_uno_match_meta', $_POST['equipo_uno_match']);
		}

		if ( isset($_POST['equipo_dos_match']) ){
			update_post_meta($post_id, '_equipo_dos_match_meta', $_POST['equipo_dos_match']);
		}


		if ( isset($_POST['option_selected'] )   ){
			update_post_meta($post_id, 'sprint_type_meta', $_POST['option_selected']);
		}else{
			delete_post_meta($post_id, 'sprint_type_meta');
		}

		if ( isset($_POST['poll_question_meta'] )   ){
			update_post_meta($post_id, 'poll_question_meta', $_POST['poll_question_meta']);
		}else{
			delete_post_meta($post_id, 'poll_question_meta');
		}


		// Guardar correctamente los checkboxes
		/*if ( isset($_POST['_checkbox_meta']) and check_admin_referer(__FILE__, '_checkbox_nonce') ){
			update_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		} else if ( ! defined('DOING_AJAX') ){
			delete_post_meta($post_id, '_checkbox_meta');
		}*/


	});



// OTHER METABOXES ELEMENTS //////////////////////////////////////////////////////////



	if (is_admin()){
	  /* 
	   * prefix of meta keys, optional
	   */
	  $prefix = 'wp_';
	  /* 
	   * configure your meta box
	   */
	  $config = array(
	    'id' => 'demo_meta_box',          // meta box id, unique per meta box
	    'title' => 'Demo Meta Box',          // meta box title
	    'pages' => array('shows'),        // taxonomy name, accept categories, post_tag and custom taxonomies
	    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
	    'fields' => array(),            // list of meta fields (can be added by field arrays)
	    'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
	    'use_with_theme' => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	  );
	  
	  $my_meta =  new Tax_Meta_Class($config);
	  

	  //$my_meta->addColor($prefix.'color_field_id',array('name'=> __('My Color ','tax-meta')));
	  //Image field
	  $my_meta->addImage($prefix.'image_field_id',array('name'=> __('Imagen del show ','tax-meta')));
	  
	  
	 
	  $my_meta->Finish();

	  /* 
	   * configure your meta box
	   */
	  $config = array(
	    'id' => 'card_meta_box',          // meta box id, unique per meta box
	    'title' => 'Card Meta Box',          // meta box title
	    'pages' => array('stack'),        // taxonomy name, accept categories, post_tag and custom taxonomies
	    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
	    'fields' => array(),            // list of meta fields (can be added by field arrays)
	    'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
	    'use_with_theme' => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	  );
	  
	  $my_card_meta =  new Tax_Meta_Class($config);
	  

	  $my_card_meta->addImage($prefix.'image_card',array('name'=> __('My Card Image ','tax-meta')));
	 
	  $my_card_meta->Finish();

	}
