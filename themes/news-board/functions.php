<?php
/**
 * Transfer functions and definitions
 *
 * @package Transfer
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) $content_width = 1000; /* pixels */
add_filter( 'show_admin_bar', '__return_false' );

/* Makes theme available for translation. */
load_theme_textdomain( 'mes-framework', get_template_directory() . '/languages' );

/**
 * Include Framework. (Theme options)
 */ 
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/theme-options/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/theme-options/ReduxCore/framework.php' );
}

if ( !isset( $ct_options ) && file_exists( dirname( __FILE__ ) . '/theme-options/options.php' ) ) {
	require_once( dirname( __FILE__ ) . '/theme-options/options.php' );
}

/* ------------------------------------------------------------------------ */
/* Theme Stylesheets */
/* ------------------------------------------------------------------------ */

function mes_theme_styles_basic() {   
		/* Enqueue Stylesheets */
		wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '1', 'all' ); // Main Stylesheet
		wp_enqueue_style( 'mes_bxslider_css', get_template_directory_uri() . '/framework/css/jquery.bxslider.css', array(), '1', 'all' );
		wp_enqueue_style( 'flex-slider', get_template_directory_uri() . '/framework/FlexSlider/flexslider.css', array(), '1', 'all' );
		wp_enqueue_style( 'mes_prettyPhoto_css', get_template_directory_uri() . '/framework/css/prettyPhoto.css', array(), '1', 'all' );
		wp_enqueue_style( 'mes_main_css', get_template_directory_uri() . '/framework/css/main_style.css', array(), '1', 'all' );
		wp_enqueue_style( 'mes_options_css', get_template_directory_uri() . '/framework/css/options.css', array(), '1', 'all' );
		//Internet Explorer Styles
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') == true) { 
		wp_enqueue_style( 'mes_iestyles_css', get_template_directory_uri() . '/framework/css/iestyles.css', array(), '1', 'all' );
		};
	}  
add_action( 'wp_enqueue_scripts', 'mes_theme_styles_basic', 1 ); 


/* ------------------------------------------------------------------------ */
/* Loading Theme Scripts */
/* ------------------------------------------------------------------------ */
add_action('wp_enqueue_scripts', 'mes_load_scripts');
if ( !function_exists( 'mes_load_scripts' ) ) {
	function mes_load_scripts() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script('mes_bootstrap', get_template_directory_uri().'/framework/bootstrap/bootstrap.min.js', false, null , true);
		wp_enqueue_script('mes_modernizr', get_template_directory_uri().'/framework/js/modernizr.custom.js', false, null , true);
		wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?sensor=false');
		wp_enqueue_script('mes_inst', get_template_directory_uri().'/framework/js/instagram.min.js', false, null , true);
		wp_enqueue_script('mes_bxslider', get_template_directory_uri().'/framework/js/jquery.bxslider.min.js', false, null , true);
		wp_enqueue_script('mes_prettyPhoto', get_template_directory_uri().'/framework/js/jquery.prettyPhoto.js', false, null , true);		
		wp_enqueue_script('mes_waitforimages', get_template_directory_uri().'/framework/js/jquery.waitforimages.js', false, null , true);
		wp_enqueue_script('mes_flexslider', get_template_directory_uri().'/framework/FlexSlider/jquery.flexslider-min.js', false, null , true);
    	wp_enqueue_script('mes_custom', get_template_directory_uri().'/framework/js/custom.js', false, null , true);

		global $mes_options;
		$mes_theme = array( 
				'theme_url' => get_template_directory_uri(),
			);
    	wp_localize_script( 'mes_custom', 'mes_theme', $mes_theme );
	}    
}



/* ------------------------------------------------------------------------ */
/* Theme Menus */
/* ------------------------------------------------------------------------ */

function mes_menu() { 
  register_nav_menus(
    array(
      'main_menu' => 'Header Menu',
      'secondary_menu' => 'Footer Navigation',
    )
  );
}
add_action( 'init', 'mes_menu' );

/* Custom menu Walker */
class MES_Walker extends Walker_Nav_Menu
	{
	function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='my_drop'><ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . ' menu-item-'. $item->ID . '"';

		$output .= $indent . '<li id="menu-item-id-'. $item->ID . '"' . $value . $class_names .' >';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .' data-description="' . $item->description . '">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

// additional image sizes
add_image_size( 'portfolio-squrex2', 762,762, true );
add_image_size( 'portfolio-squre-lit', 400,400, true );
add_image_size( 'portfolio-wide', 762, 480, true );
/*=======================================
	Register Sidebar UNLIMITED 
=======================================*/

if ( function_exists('register_sidebar') ){
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id' => 'blog_sidebar',
        'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="mes_widget_title">',
        'after_title' => '</h6>'
    ));
	register_sidebar(array(
		'name' => 'Top Left Widget',
		'id' => 'top_left_widget',
        'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="mes_widget_title">',
        'after_title' => '</h6>'
    ));

	register_sidebar( array(
		'name' => 'WooCommerce Page Sidebar',
		'id' => 'woocommerce_sidebar',
		'before_widget' => '<div id="%1$s" class="widgetSidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar(array(
		'name' => 'Page Sidebar',
		'id' => 'page_sidebar',
		'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div><div class="clearfix"></div>',
        'before_title' => '<div class="clearfix"></div><h6 class="mes_widget_title">',
        'after_title' => '</h6>'
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar 1',
		'id' => 'footer_sidebar1',
		'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div><div class="clearfix"></div>',
        'before_title' => '<div class="clearfix"></div><h5 class="mes_widget_title_single">',
        'after_title' => '</h5>'
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar 2',
		'id' => 'footer_sidebar2',
		'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div><div class="clearfix"></div>',
        'before_title' => '<div class="clearfix"></div><h5 class="mes_widget_title_single">',
        'after_title' => '</h5>'
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar 3',
		'id' => 'footer_sidebar3',
		'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div><div class="clearfix"></div>',
        'before_title' => '<div class="clearfix"></div><h5 class="mes_widget_title_single">',
        'after_title' => '</h5>'
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar 4',
		'id' => 'footer_sidebar4',
		'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div><div class="clearfix"></div>',
        'before_title' => '<div class="clearfix"></div><h3 class="mes_widget_title_single">',
        'after_title' => '</h3>'
	));
	
	register_sidebar( array(
		'name' => 'Portfolio Page Sidebar',
		'id' => 'portfolio_sidebar',
		'before_widget' => '<div id="%1$s" class="widgetSidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_filter('widget_text', 'do_shortcode');

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
}



//if woocommerce is active
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$url = site_url();
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ){
	// WooCommerce
	require_once(dirname( __FILE__ ) . '/framework/woocommerce/index.php');
} ;
if (is_plugin_active( 'woocommerce/woocommerce.php' ) && ($url == 'http://www.mestowabo.com/theme/news-board') ) {

add_action( 'template_redirect', 'add_product_to_cart' );
function add_product_to_cart() {
	if ( 1 == 1 ) {
		$product_id = 31;
		$product_id2 = 76;
		$product_id3 = 60;
		$found = false;
		//check if product already in cart
		if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
			foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
				$_product = $values['data'];
				if ( $_product->id == $product_id )
					$found = true;
			}
			// if product not found, add it
			if ( ! $found )
				WC()->cart->add_to_cart( $product_id );
		} else {
			// if no products in cart, add it
			WC()->cart->add_to_cart( $product_id );
			WC()->cart->add_to_cart( $product_id2 );
			WC()->cart->add_to_cart( $product_id3 );
		}
	}
}

}

    /* ------------------------------------------------------------------------ */
	/* Automatic Plugin Activation */
	require_once('framework/plugin-activation.php');
	
	add_action('tgmpa_register', 'goodchoice_register_required_plugins');
	function goodchoice_register_required_plugins() {
		$plugins = array(			
			array(
				'name'     				=> 'Ultimate VC Addons', // The plugin name
				'slug'     				=> 'ultimate_vc', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/Ultimate_VC_Addons.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'Slider Revolution', // The plugin name
				'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/revslider.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'CF-Post-Formats', // The plugin name
				'slug'     				=> 'cf-post-formats', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/cf-post-formats.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),			
			array(
				'name'     				=> 'Essential Grid', // The plugin name
				'slug'     				=> 'essential-grid', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/essential-grid.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
		);
	
		// Change this to your theme text domain, used for internationalising strings
		$theme_text_domain = 'goodchoice-framework';
	
		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
			'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
				'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
				'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
				'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);
	
		tgmpa($plugins, $config);
		
	}

/* ------------------------------------------------------------------------ */
/* Shortcodes.  */
/* ------------------------------------------------------------------------ */
include ('framework/shortcodes.php');
include("framework/widgets/twitter/mes_twitter_widget.php");
include("framework/widgets/mes_flickr_widget.php");


//SEARCH FORM
function mes_search_func( $atts ){
	return '<form role="search" method="get" class="mes-search-form" action="'.home_url( "/" ).'">
			<input type="search" class="mes-search-field" placeholder="'. esc_attr_x( '', "placeholder" ) .'" value="'. get_search_query() .'" name="s" title="'. esc_attr_x( 'Search for:', 'label' ) .'" />   
            <input type="submit" class="mes-search-submit" value=""/>
		    <i class="fa fa-search mes-search-magnif"></i>
		  </form>'
		  ;
}
add_shortcode( 'mes_search', 'mes_search_func' );



/*=======================================
	Include VC extends
=======================================*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('js_composer/js_composer.php')){
include('framework/vc.php');
}



/* ------------------------------------------------------------------------ */
/* Post Formats  */
/* ------------------------------------------------------------------------ */

add_theme_support( 'post-formats',      // post formats
		array( 
			'image',    //image
			'quote',   // a quick quote
			'video',   // video 
			'audio',   // audio
			'gallery',   // audio
		)
);


add_filter('get_avatar','change_avatar_css');

function change_avatar_css($class) {
$class = str_replace("class='avatar", "class='avatar img-circle mes_avatar ", $class) ;
return $class;
}





/* ------------------------------------------------------------------------ */
/* Extra Fields.  */
/* ------------------------------------------------------------------------ */
add_action('admin_init', 'extra_fields', 1);
function extra_fields() {
	add_meta_box( 'extra_fields', 'Additional Description', 'extra_fields_for_blog', 'post', 'normal', 'high'  );
	add_meta_box( 'extra_fields', 'Additional settings', 'extra_fields_for_testimonials', 'testimonials', 'normal', 'high'  );
	add_meta_box( 'extra_fields', 'Additional settings', 'extra_fields_for_portfolio', 'portfolio', 'normal', 'high'  );
	add_meta_box( 'extra_fields', 'Additional settings', 'extra_fields_for_pages', 'page', 'normal', 'high'  );

}
@the_post_thumbnail();
@wp_link_pages( $args );
@comments_template( $file, $separate_comments );
@add_theme_support( 'automatic-feed-links' );
@add_theme_support( 'custom-header', $args );
@add_theme_support( 'custom-background', $args );


function extra_fields_for_testimonials ( $post ){
?>
 <h4>Company Name</h4>
 <input type="text" name="extra[testum-text-color]" value="<?php echo get_post_meta($post->ID, 'testum-text-color', true); ?>" />
<?php }



//Extra Field for Pages
function extra_fields_for_pages( $post ){
?>
    <h4>You can use any sidebar, just choose it. <span style="color:red">Don't forget set page template as "With Sidebars"</span></h4>
    <?php global $wp_registered_sidebars;
  	?>
    <select name="extra[sidebarss]">
    <?php foreach ($wp_registered_sidebars as $val){ ?>
    <option <?php if ($val['name'] == get_post_meta($post->ID, 'sidebarss', 1)) { echo 'selected';} ?> value="<?php echo $val['name'] ?>"><?php echo $val['name'] ?></option>
	<?php } ?>
    </select>
    <br>
  <h4>SideBar Position</h4>
  <select name="extra[sidebarss_position]">
  	<?php
	$mes_sidebars_position = array (
		"rs"  => array("name" => "Right Sidebar"),
		"ls"  => array("name" => "Left Sidebar"),
	);
	?>
    <?php foreach ($mes_sidebars_position as $val){ ?>
    <option <?php if ($val['name'] == get_post_meta($post->ID, 'sidebarss_position', 1)) { echo 'selected';} ?> value="<?php echo $val['name'] ?>"><?php echo $val['name'] ?></option>
	<?php } ?>
   </select>
   <h4>Show tagline</h4>
  <select name="extra[tagline_position]">
  	<?php
	$mes_sidebars_position = array (
		"sh"  => array("name" => "Show"),
		"hd"  => array("name" => "Hide"),
	);
	?>
    <?php foreach ($mes_sidebars_position as $val){ ?>
    <option <?php if ($val['name'] == get_post_meta($post->ID, 'tagline_position', 1)) { echo 'selected';} ?> value="<?php echo $val['name'] ?>"><?php echo $val['name'] ?></option>
	<?php } ?>
   </select>
   <?php }



//Extra Field for Portfolio
function extra_fields_for_portfolio( $post ){
	?>

<?php };



//Extra Field for Blog
function extra_fields_for_blog( $post ){
	global $mes_options;
	?>
	<h4>Show tagline</h4>
  <select name="extra[tagline_position]">
  	<?php
	$mes_sidebars_position = array (
		"sh"  => array("name" => "Show"),
		"hd"  => array("name" => "Hide"),
	);
	?>
    <?php foreach ($mes_sidebars_position as $val){ ?>
    <option <?php if ($val['name'] == get_post_meta($post->ID, 'tagline_position', 1)) { echo 'selected';} ?> value="<?php echo $val['name'] ?>"><?php echo $val['name'] ?></option>
	<?php } ?>
   </select>


<h4>You can upload up to 5 additional images (Optional. For Gallery)</h4>
    <div>
    <p>
		<label for="upload_image">Image 1: </label>
		<input id="upload_image" type="text" style="width:70%;" name="extra[image]" value="<?php echo get_post_meta($post->ID, 'image', true); ?>" />
		<input class="upload_image_button" type="button" value="Upload" /><br/>

	</p>	
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	<p>
		<label for="upload_image">Image 2: </label>
		<input id="upload_image" type="text" style="width:70%;" name="extra[image2]" value="<?php echo get_post_meta($post->ID, 'image2', true); ?>" />
		<input class="upload_image_button" type="button" value="Upload" /><br/>

	</p>	
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />

	<p>
		<label for="upload_image">Image 3: </label>
		<input id="upload_image" type="text" style="width:70%;" name="extra[image3]" value="<?php echo get_post_meta($post->ID, 'image3', true); ?>" />
		<input class="upload_image_button" type="button" value="Upload" /><br/>

	</p>
    <p>
		<label for="upload_image">Image 4: </label>
		<input id="upload_image" type="text" style="width:70%;" name="extra[image4]" value="<?php echo get_post_meta($post->ID, 'image4', true); ?>" />
		<input class="upload_image_button" type="button" value="Upload" /><br/>

	</p>
    <p>
		<label for="upload_image">Image 5: </label>
		<input id="upload_image" type="text" style="width:70%;"name="extra[image5]" value="<?php echo get_post_meta($post->ID, 'image5', true); ?>" />
		<input class="upload_image_button" type="button" value="Upload" /><br/>

	</p>
    </div>
<?php };




//Save Extra Fields
add_action('save_post', 'extra_fields_update', 0);


function extra_fields_update( $post_id ){
	
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; 
	if ( !current_user_can('edit_post', $post_id) ) return false; 
	if( !isset($_POST['extra']) ) return false;	

	
	$_POST['extra'] = array_map('trim', $_POST['extra']);
	foreach( $_POST['extra'] as $key=>$value ){
		if( empty($value) )	delete_post_meta($post_id, $key);
		update_post_meta($post_id, $key, $value);
	}
	return $post_id;
}


function upload_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_template_directory_uri().'/framework/js/custom_uploader.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}



function upload_styles() {
	wp_enqueue_style('thickbox');
}
add_action('admin_enqueue_scripts', 'upload_scripts'); 
add_action('admin_enqueue_scripts', 'upload_styles');



/**
* Custom widgets
**/


add_filter('wp_list_categories', 'add_span_cat_count');
function add_span_cat_count($links) {
$links = str_replace('</a> (', '</a> <span class="mes_cat_count">', $links);
$links = str_replace(')', '</span>', $links);
return $links;
}

add_filter('wp_list_archive', 'add_spann_cat_count');
function add_spann_cat_count($links) {
$links = str_replace('</a> (', '</a> <span class="mes_cat_count">', $links);
$links = str_replace(')', '</span>', $links);
return $links;
}



function tcr_tag_cloud_filter($args = array()) {
    $args['smallest'] = 8;
    $args['largest'] = 14;
    $args['unit'] = 'pt';
    return $args;
}

add_filter('widget_tag_cloud_args', 'tcr_tag_cloud_filter', 90);


//PAGINATION
function wp_corenavi() {
    global $wp_query;

    $big = 999999999; // This needs to be an unlikely integer

    // For more options and info view the docs for paginate_links()
    // http://codex.wordpress.org/Function_Reference/paginate_links
    $paginate_links = paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'mid_size' => 5
    ) );

    // Display the pagination if more than one page is found
    if ( $paginate_links ) {
        echo '<div class="pagination">';
        echo $paginate_links;
        echo '</div><!--// end .pagination -->';
    }
}


/*=======================================
	Add WP Breadcrumbs
=======================================*/



function mes_breadcrumbs(){
	/* === OPTIONS === */
    $text['home']     = __( 'Home', 'mestowabo' ); // text for the 'Home' link
    $text['category'] = __( 'Archive by Category "%s"', 'mestowabo' ); // text for a category page
    $text['search']   = __( 'Search Results for "%s" Query', 'mestowabo' ); // text for a search results page
    $text['tag']      = __( 'Posts Tagged "%s"', 'mestowabo' ); // text for a tag page
    $text['author']   = __( 'Articles Posted by %s', 'mestowabo' ); // text for an author page
    $text['404']      = __( 'Error 404', 'mestowabo' ); // text for the 404 page
 
    $show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
    $show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
    $show_title     = 1; // 1 - show the title for the links, 0 - don't show
    $delimiter      = ' &nbsp;&nbsp;›&nbsp;&nbsp;'; // delimiter between crumbs
    $before         = '<h4 class="current">'; // tag before the current crumb
    $after          = '</h4>'; // tag after the current crumb
    /* === END OF OPTIONS === */
 
    global $post;
    $home_link    = home_url('/');
    $link_before  = '<h4 typeof="v:Breadcrumb">';
    $link_after   = '</h4>';
    $link_attr    = ' rel="v:url" property="v:title"';
    $link         = $link_before . '<a style="color: #999;" ' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $parent_id    = $parent_id_2 = $post->post_parent;
    $frontpage_id = get_option('page_on_front');
 
    if (is_home() || is_front_page()) {
 
        if ($show_on_home == 1) echo '<div class="breadcrumbs"><a style="color: #999;" href="' . $home_link . '">' . $text['home'] . '</a></div>';
 
    } else {
 
        echo '<div class="breadcrumbs">';
        if ($show_home_link == 1) {
            echo '<h4><a style="color: #999;" href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a></h4>';
            if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
        }
 
        if ( is_category() ) {
            $this_cat = get_category(get_query_var('cat'), false);
            if ($this_cat->parent != 0) {
                $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a  class="colored"', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
            }
            if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
 
        } elseif ( is_search() ) {
            echo $before . sprintf($text['search'], get_search_query()) . $after;
 
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;
 
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;
 
        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
 
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a  class="colored"' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
                if ($show_current == 1) echo $before . get_the_title() . $after;
            }
 
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
 
        } elseif ( is_attachment() ) {
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            if ($cat) {
                $cats = get_category_parents($cat, TRUE, $delimiter);
                $cats = str_replace('<a class="colored"', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
            }
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
 
        } elseif ( is_page() && !$parent_id ) {
            if ($show_current == 1) echo $before . get_the_title() . $after;
 
        } elseif ( is_page() && $parent_id ) {
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs)-1) echo $delimiter;
                }
            }
            if ($show_current == 1) {
                if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
                echo $before . get_the_title() . $after;
            }
 
        } elseif ( is_tag() ) {
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
 
        } elseif ( is_author() ) {
             global $author;
            $userdata = get_userdata($author);
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;
 
        } elseif ( is_404() ) {
            echo $before . $text['404'] . $after;
        }
 
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page','mestowabo') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
 
        echo '</div><!-- .breadcrumbs -->';
 
    }
	
	
}
function crumbs_tax($term_id, $tax, $sep){
	$termlink = array();
	while( (int)$term_id ){
		$term2 = get_term( $term_id, $tax );
		$termlink[] = '<a class="subpage_block" href="'. get_term_link( (int)$term2->term_id, $term2->taxonomy ) .'">'. $term2->name .'</a>'. $sep;
		$term_id = (int)$term2->parent;
	}
	$termlinks = array_reverse($termlink);
	return implode('', $termlinks);
}

?>
