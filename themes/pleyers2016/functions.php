<?php
	add_theme_support('auto-load-next-post');

// DEFINIR LOS PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ///////////////////////////

	define( 'JSPATH', get_template_directory_uri() . '/js/' );

	define( 'CSSPATH', get_template_directory_uri() . '/css/' );

	define( 'THEMEPATH', get_template_directory_uri() . '/' );
	
	define( 'SITEURL', site_url('/') );



//	ADD CATEGORIES FOR ATTACHMENTS

	function wptp_add_categories_to_attachments() {
	    register_taxonomy_for_object_type( 'category', 'attachment' );
	}
	add_action( 'init' , 'wptp_add_categories_to_attachments' );


	// LOAD BX SLIDER
	// *********************************************************
	function loadbxslider()
	{
	    wp_enqueue_style('bxstyle', '/wp-content/themes/pleyers2016/bx_styles/bx_styles.css');
	    wp_enqueue_script('bxscript', '/wp-content/themes/pleyers2016/js/jquery.bxSlider.min.js', array('jquery'));
	}
	add_action('init', 'loadbxslider');


// 	CUSTOM TAXONOMY DROPDOWN /////////////////////////////////////////////////////////
	function pleyers_custom_taxonomy_dropdown( $taxonomy, $orderby = 'date', $order = 'DESC', $limit = '-1', $name, $show_option_all = null, $show_option_none = null ) {
		$args = array(
			'orderby' => $orderby,
			'order' => $order,
			'number' => $limit,
			'hide_empty' => 1,
		);
		$terms = get_terms( $taxonomy, $args );
		$name = ( $name ) ? $name : $taxonomy;
		if ( $terms ) {
			printf( '<select name="%s" class="postform">', esc_attr( $name ) );
			if ( $show_option_all ) {
				printf( '<option value="0">%s</option>', esc_html( $show_option_all ) );
			}
			if ( $show_option_none ) {
				printf( '<option value="-1">%s</option>', esc_html( $show_option_none ) );
			}
			foreach ( $terms as $term ) {
				printf( '<option value="%s">%s</option>', esc_attr( $term->slug ), esc_html( $term->name ) );
			}
			print( '</select>' );
		}
	}



// FRONT END SCRIPTS AND STYLES //////////////////////////////////////////////////////



	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );

		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );

	});



// ADMIN SCRIPTS AND STYLES //////////////////////////////////////////////////////////



	add_action( 'admin_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'admin-js', JSPATH.'admin.js', array('jquery'), '1.0', true );

		// localize scripts
		wp_localize_script( 'admin-js', 'ajax_url', admin_url('admin-ajax.php') );

		// styles
		wp_enqueue_style( 'admin-css', CSSPATH.'admin.css' );

	});



// FRONT PAGE DISPLAYS A STATIC PAGE /////////////////////////////////////////////////



	/*add_action( 'after_setup_theme', function () {
		
		$frontPage = get_page_by_path('home', OBJECT);
		$blogPage  = get_page_by_path('blog', OBJECT);
		
		if ( $frontPage AND $blogPage ){
			update_option('show_on_front', 'page');
			update_option('page_on_front', $frontPage->ID);
			update_option('page_for_posts', $blogPage->ID);
		}
	});*/



// REMOVE ADMIN BAR FOR NON ADMINS ///////////////////////////////////////////////////



	add_filter( 'show_admin_bar', function($content){
		return ( current_user_can('administrator') ) ? $content : false;
	});



// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////



	add_filter( 'admin_footer_text', function() {
		echo 'Creado por <a href="http://tallerdecodigo.com">TDC</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});



// POST THUMBNAILS SUPPORT ///////////////////////////////////////////////////////////



	if ( function_exists('add_theme_support') ){
		add_theme_support('post-thumbnails');
	}

	if ( function_exists('add_image_size') ){
		
		add_image_size( 'grid_home_large', 678, 334, true );
		add_image_size( 'grid_home_square', 334, 334, true );
		add_image_size( 'grid_home_square_large', 678, 678, false );
		
		// cambiar el tamaño del thumbnail
		
		// update_option( 'thumbnail_size_h', 100 );
		// update_option( 'thumbnail_size_w', 200 );
		// update_option( 'thumbnail_crop', false );
		
	}


// POST TYPES, METABOXES, TAXONOMIES AND CUSTOM PAGES ////////////////////////////////



	require_once('inc/post-types.php');


	require_once('inc/metaboxes.php');


	require_once('inc/taxonomies.php');


	require_once('inc/pages.php');
	
	
// MODIFICAR EL MAIN QUERY ///////////////////////////////////////////////////////////



	// add_action( 'pre_get_posts', function($query){

	// 	if( $query->is_main_query() and ! is_admin()){
	// 		if($query->is_search()){
	// 			$query->set('post_type', array('post', 'episodios', 'graficos', 'tweets', 'frases'));
	// 			$query->set('posts_per_page', -1);
	// 		}
	// 	}
	// 	return $query;

	// });

	function pleyers_get_sprints( $query ) {
	    if ( is_admin() || ! $query->is_main_query() )
	        return;

	    if ( is_post_type_archive( 'sprints' ) ) {
	        // Display 50 posts for a custom post type called 'movie'
	        $query->set( 'posts_per_page', 6 );
	        $query->set('orderby', 'date');
	        $query->set('order', 'DESC');

	        return;
	    }
	}
	add_action( 'pre_get_posts', 'pleyers_get_sprints', 1 );

		


// THE EXECRPT FORMAT AND LENGTH /////////////////////////////////////////////////////



	// add_filter('excerpt_length', function($length){
	// 	return 25;
	// });


	add_filter('excerpt_more', function(){
		return '...';
	});



// REMOVE ACCENTS AND THE LETTER Ñ FROM FILE NAMES ///////////////////////////////////



	add_filter( 'sanitize_file_name', function ($filename) {
		$filename = str_replace('ñ', 'n', $filename);
		return remove_accents($filename);
	});

// INSERTAR POST THUMBNAIL DESDE URL /////////////////////////////////////////////////

	// function set_featured_image( $image_url, $post_id  ){
	//     $upload_dir = wp_upload_dir();
	//     $image_data = file_get_contents($image_url);
	//     $filename = basename($image_url);
	//     if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
	//     else                                    $file = $upload_dir['basedir'] . '/' . $filename;
	//     file_put_contents($file, $image_data);

	//     $wp_filetype = wp_check_filetype($filename, null );
	//     $attachment = array(
	//         'post_mime_type' => $wp_filetype['type'],
	//         'post_title' => sanitize_file_name($filename),
	//         'post_content' => '',
	//         'post_status' => 'inherit'
	//     );

	//     $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
	//     require_once(ABSPATH . 'wp-admin/includes/image.php');
	//     $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
	//     $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
	//     $res2= set_post_thumbnail( $post_id, $attach_id );
	// }

// HELPER METHODS AND FUNCTIONS //////////////////////////////////////////////////////



	/**
	 * Print the <title> tag based on what is being viewed.
	 * @return string
	 */
	function print_title(){
		global $page, $paged;

		wp_title( '|', true, 'right' );
		bloginfo( 'name' );

		// Add a page number if necessary
		if ( $paged >= 2 || $page >= 2 ){
			echo ' | ' . sprintf( __( 'Página %s' ), max( $paged, $page ) );
		}
	}



	/**
	 * Imprime una lista separada por commas de todos los terms asociados al post id especificado
	 * los terms pertenecen a la taxonomia especificada. Default: Category
	 *
	 * @param  int     $post_id
	 * @param  string  $taxonomy
	 * @return string
	 */
	function print_the_terms($post_id, $taxonomy = 'category'){
		$terms = get_the_terms( $post_id, $taxonomy );

		if ( $terms and ! is_wp_error($terms) ){
			$names = wp_list_pluck($terms ,'name');
			echo implode(', ', $names);
		}
	}


	/*CAMBIA POSTYPE DE ENTRADAS A SPRINTS*/

	set_post_type( 13488, 'sprints');






	/**
	 * Regresa la url del attachment especificado
	 * @param  int     $post_id
	 * @param  string  $size
	 * @return string  url de la imagen
	 */
	function attachment_image_url($post_id, $size){
		$image_id   = get_post_thumbnail_id($post_id);
		$image_data = wp_get_attachment_image_src($image_id, $size, true);
		echo isset($image_data[0]) ? $image_data[0] : '';
	}



	/*
	 * Echoes active if the page showing is associated with the parameter
	 * @param  string $compare, Array $compare
	 * @param  Bool $echo use FALSE to use with php, default is TRUE to echo value
	 * @return string
	 */
	function nav_is($compare = array(), $echo = TRUE){

		$query = get_queried_object();
		$inner_array = array();
		if(gettype($compare) == 'string'){
			
			$inner_array[] = $compare;
		}else{
			$inner_array = $compare;
		}

		foreach ($inner_array as $value) {
			if( isset($query->slug) AND preg_match("/$value/i", $query->slug)
				OR isset($query->name) AND preg_match("/$value/i", $query->name)
				OR isset($query->rewrite) AND preg_match("/$value/i", $query->rewrite['slug'])
				OR isset($query->post_name) AND preg_match("/$value/i", $query->post_name)
				OR isset($query->post_title) AND preg_match("/$value/i", remove_accents(str_replace(' ', '-', $query->post_title) ) ) )
			{
				if($echo){
					echo 'active';
				}else{
					return 'active';
				}
				return FALSE;
			}

		}
		return FALSE;
	}

	// add_filter('next_posts_link_attributes', 'posts_link_attributes');
	// add_filter('previous_posts_link_attributes', 'posts_link_attributes');

	// function posts_link_attributes(){
	//    return 'class="internav"';
	// }
	
	function wpdocs_five_posts_on_homepage( $query ) {
	    // if ( $query->is_home() && $query->is_main_query() ) {
	    //     $query->set( 'posts_per_page', 5 );
	    // }

		if ( $query->is_archive() && $query->is_main_query() ) {
	        $query->set( 'posts_per_page', 20 );
	        $query->set( 'order', 'DESC' );
	    }	

	}
	add_action( 'pre_get_posts', 'wpdocs_five_posts_on_homepage' );



	function get_all_posttypes(){
		$pt = array('post', 'episodios', 'graficos', 'sprints');
		return $pt;
	}

	function add_tags_categories() {
	// register_taxonomy_for_object_type('category', 'tilbud');
	register_taxonomy_for_object_type('post_tag', 'episodios');
	}
	add_action('init', 'add_tags_categories');


	function multiexplode ($delimiters,$string) {
	    
	    $ready = str_replace($delimiters, $delimiters[0], $string);
	    $launch = explode($delimiters[0], $ready);
	    return  $launch;
	}

	function custom_pagination($numpages = '', $pagerange = '', $paged='') {

	  if (empty($pagerange)) {
	    $pagerange = 9;
	  }

	  /**
	   * This first part of our function is a fallback
	   * for custom pagination inside a regular loop that
	   * uses the global $paged and global $wp_query variables.
	   * 
	   * It's good because we can now override default pagination
	   * in our theme, and use this function in default quries
	   * and custom queries.
	   */
		global $paged;
	  	
	  	if (empty($paged)) {
	    	$paged = 1;
	  	}

	  	if ($numpages == '') {
	    	global $wp_query;
	    	$numpages = $wp_query->max_num_pages;

	    	if(!$numpages) {
	        	$numpages = 1;
	    	}
	  	}

	$pagination_args = array(
	  'base'            => get_pagenum_link(1) . '%_%',
	  'format'          => 'page/%#%',
	  'total'           => $numpages,
	  'current'         => $paged,
	  'show_all'        => false,
	  'end_size'        => 1,
	  'mid_size'        => $pagerange,
	  'prev_next'       => True,
	  'prev_text'       => __('<img src="'.THEMEPATH.'/images/left_nav.png" width="15px" height="15px">'),
	  'next_text'       => __('<img src="'.THEMEPATH.'/images/right_nav.png" width="15px" height="15px">'),
	  'type'            => 'plain',
	  'add_args'        => false,
	  'add_fragment'    => ''
	);

	$paginate_links = paginate_links($pagination_args);

	 if ($paginate_links) {
	   echo "<nav class='custom-pagination'>";
	     // echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
	     echo $paginate_links;
	   echo "</nav>";
	 }

	}//custom pagination



	/*LIMIT FOR EXCERPT 20 WORDS*/

	function custom_excerpt_length( $length ) {
	        return 20;
	    }
	    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	    /*AJAX FOR BLOGS 2*/
	    // ajax: generate a list of posts from a list of post types
	    // function my_get_posts(){
		   //  //permission_check(); <-- check nonce and permissions here

		   //  // show only published posts
		   //  $args = array(	
					// 'post_type'=>'episodios',
					// 'posts_per_page'=>5,
					// 'post_status'=>'publish',
					// 'orderby'=>'date',
					// 'order'=>'DESC',
					// 'paged'=>$paged,
					// 'tax_query'=>array(
					// 				array(
					// 					'taxonomy'=>'shows',
					// 					'field'=> 'slug',
					// 					'terms'=>'deportologia'										)
					// 				)
					// );

		   //  $posts = get_posts($args);

		   //  // put the posts into an array
		   //  $arr = array();
		   //  foreach ($posts as $post)
		   //  {
		   //  	$entry = array();

			  //   // get the post's attributes here
			  //   $entry['id'] = $post->ID;
			  //   $entry['title'] = $post->post_title;
			  //   $arr[] = $entry;

	    // 	}

		   //  // then output in json format
		   //  header("Content-Type: application/json");
		   //  echo json_encode($arr);

		   //  // make sure you have "exit" here
		   //  exit;
	    // }

	    // add into the ajax action chains

	    // this is for logged in users
	    // add_action('wp_ajax_my_get_posts', 'my_get_posts');

	    // // this is for the rest
	    // add_action('wp_ajax_nopriv_my_get_posts', 'my_get_posts');



	    /*SHORT CODE*/
	    function sc_dato($params, $content = null) {

			// default parameters
			extract(shortcode_atts(array(
				'style' => ''
			), $params));

		  return
			"<div class='sc_dato'><h4>DATO</h4>" . do_shortcode($content) . "</div>";
		}

		add_shortcode('dato','sc_dato');



		function sc_referencia($params, $content = null) {
			extract(shortcode_atts(array(
				'style' => ''
			), $params));
		  return
			"<span class='sc_referencia' data='" . do_shortcode($content) . "'>i</span>";
		}
		add_shortcode('referencia','sc_referencia');



		/*SELECCIÓN DE PERFILES PARA PAGINA QUIENES SOMOS*/

		function my_user_field( $user ) {
		    $gender = get_the_author_meta( 'dealing', $user->ID);
		?>
		    <h3><?php _e('Seleccion para Quiénes Somos'); ?></h3>
		    <table class="form-table">
		        <tr>
		            <th>
		                <label for="Dealing Type"><?php _e('Selección'); ?></label>
		        	</th>
		            <td>
		           		<label>
		           			<input type="radio" name="dealing" <?php if ($gender == 'Si' ) { ?>checked="checked"<?php }?> value="Si">Tú sí<br />
		           		</label>

		            	<label>
		            		<input type="radio" name="dealing" <?php if ($gender == 'No' ) { ?>checked="checked"<?php }?> value="No">Tú no<br />
		            	</label>
		            </td>
		        </tr>
		    </table>
		<?php 
		}

		function my_save_custom_user_profile_fields( $user_id ) {
		    if ( !current_user_can( 'edit_user', $user_id ) )
		        return FALSE;
		    update_usermeta( $user_id, 'dealing', $_POST['dealing'] );
		}

		add_action( 'show_user_profile', 'my_user_field' );
		add_action( 'edit_user_profile', 'my_user_field' );
		add_action( 'personal_options_update', 'my_save_custom_user_profile_fields' );
		add_action( 'edit_user_profile_update', 'my_save_custom_user_profile_fields' );



?>	