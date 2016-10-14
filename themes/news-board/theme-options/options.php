<?php
/**
 * Start Theme Options
 * -----------------------------------------------------------------------------
 */

// Setting dev mode to true allows you to view the class settings/info in the panel.
// Default: true
$args['dev_mode'] = true;

// Set the class for the dev mode tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['dev_mode_icon_class'] = 'icon-large';

// Set a custom option name. Don't forget to replace spaces with underscores!
$args['opt_name'] = 'mes_options';

// Setting system info to true allows you to view info useful for debugging.
// Default: false
//$args['system_info'] = true;

$theme = wp_get_theme();

$args['display_name'] = $theme->get('Name');
//$args['database'] = "theme_mods_expanded";
$args['display_version'] = $theme->get('Version');

// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
// Default: 'standard'
//$args['admin_stylesheet'] = 'standard';

// Set the class for the import/export tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['import_icon_class'] = 'icon-large';

/**
 * Set default icon class for all sections and tabs
 * @since 3.0.9
 */
$args['default_icon_class'] = 'icon-large';


// Set a custom menu icon.
//$args['menu_icon'] = '';

// Set a custom title for the options page.
// Default: Options
$args['menu_title'] = __('Theme Options', "mestowabo");

// Set a custom page title for the options page.
// Default: Options
$args['page_title'] = __('Theme Options', "mestowabo");

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug'] = 'redux_options';

$args['default_show'] = true;
$args['default_mark'] = '*';


// Add HTML before the form.
if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
	if (!empty($args['global_variable'])) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace("-", "_", $args['opt_name']);
	}
	$args['intro_text'] = sprintf( __('<p>Welcome to the awesome <strong>Mestowabo Themes</strong>! Retina Ready, Fully Responsive!</p>', "mestowabo" ), $v );
} else {
	$args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', "mestowabo");
}

$sections = array();              

//Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';

/*$sample_patterns_path = get_template_directory_uri() . '/img/bg/';
$sample_patterns_url = get_template_directory_uri() . '/img/bg/';*/

$ct_bg_type = array( "none" => "None" , "upload" => "Upload" , "predefined" => "Predefined" );
$ct_bg_repeat = array( "repeat" => "repeat" , "repeat-x" => "repeat-x", "repeat-y" => "repeat-y", "no-repeat" => "no-repeat" );
$ct_bg_position = array( "top left" => "top left", "top center" => "top center", "top right" => "top right", "center left" => "center left", "center center" => "center center", "center right" => "center right", "bottom left" => "bottom left", "bottom center" => "bottom center", "bottom right" => "bottom right");
$ct_type_animation = array( "fade" => "Fade", "scale_up" => "Scale Up", "scale_down" => "Scale Down", "slide_top" => "Slide Top", "slide_bottom" => "Slide Bottom", "slide_right" => "Slide Right", "slide_left" => "Slide Left" );
$type_of_pagination = array( "standard" => "Standard", "numeric" => "Numeric", "load_more" => "Load More button" );
$type_of_pagination_cat = array( "standard" => "Standard", "numeric" => "Numeric" );

$theme_bg_type = array ( "uploaded" => "Uploaded", "predefined" => "Predefined" , "color" => "Color" );
$theme_bg_attachment = array ( "scroll" => "Scroll" , "fixed" => "Fixed" );
$theme_bg_position = array ( "left" => "Left" , "right" => "Right", "centered" => "Centered" , "full_screen" => "Full Screen" );
$theme_bg_color = array ( "bg_image" => "Background Image", "color" => "Color", "upload" => "Upload" );

$blog_sidebar_position = array ( "Right Sidebar" => "Right Sidebar", "Left Sidebar" => "Left Sidebar");
$sl_port_style = array ( "Random Thumbnails" => "Random Thumbnails", "Standard Thumbnails" => "Standard Thumbnails");



$sample_patterns = array();

if ( is_dir( $sample_patterns_path ) ) :
	
  if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
  	$sample_patterns = array();

    while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

      if( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
      	$name = explode(".", $sample_patterns_file);
      	$name = str_replace('.'.end($name), '', $sample_patterns_file);
      	$sample_patterns[] = array( 'alt'=>$name,'img' => $sample_patterns_url . $sample_patterns_file );
      }
    }
  endif;
endif;



/* Theme Parameters*/

		$bg_images_path = get_stylesheet_directory() . '/framework/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri() . '/framework/images/bg/'; // change this to where you store your bg images

		$ct_theme_patterns = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($ct_theme_patterns); //Sorts the array into a natural order
		                $ct_theme_patterns[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}


$theme_path_images = get_template_directory_uri() . '/framework/images/';






$sections[] = array(
	'title' => __('General Settings', "mestowabo"),
	'header' => '',
	'desc' => '',
	'icon_class' => 'icon-large',
    'icon' => 'el-icon-home',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
	'fields' => array(

			array(
				'id'=>'mes_header_favicon',
				'type' => 'media', 
				'url'=> true,
				'title' => __('Favicon Upload', "mestowabo"),
				'desc'=> __('Upload your favicon the url', "mestowabo"),
				'subtitle' => __('Upload image using the native media uploader, or define the URL directly', "mestowabo"),
				'default'=>array('url'=> $theme_path_images . 'favicon.ico' ),
			),
			array(
				'id'       => 'preloader',
				'type'     => 'switch',
				'title'    => __('Turn Preloader?', 'mestowabo'),
				'default'  => false,
				'on' => 'Enabled',
				'off' => 'Disabled',
			),
			array(
			'id'=>'mes_logo_upload',
			'type' => 'media', 
			'url'=> true,
			'title' => __('Logo Upload', "mestowabo"),
			'desc'=> __('Upload your logo or paste the url', "mestowabo"),
			'subtitle' => __('Upload image using the native media uploader, or define the URL directly', "mestowabo"),
			'default'=>array('url'=> $theme_path_images . 'ne-logo.png' ),
			),
			array(
				'id'       => 'choose_head',
				'type'     => 'switch',
				'title'    => __('Header Field', 'mestowabo'),
				'default'  => true,
				'on' => 'Custom HTML',
				'off' => 'Logo',
			),
			array(
				'id'               => 'header_field_text_1',
				'type'             => 'ace_editor',
				'mode'			   => 'html',
				'required'		   =>  array('choose_head','=', true),
				'title'            => __('Top Field', 'mestowabo'),
				'subtitle' => __('Type your custom HTML markup', "mestowabo"),
				'default'          => '
<div style="font-family: sanelma; color: rgb(17, 17, 17); font-size: 105px; line-height: 80px;">News Board</div>
<h2 class="colored" style="margin-top: 6px; font-size: 13px;">«Creative Journal»</h2>
				'
			),

			array(
			'id'=>'mes_background_upload',
			'type' => 'media', 
			'url'=> true,
			'title' => __('Background Pattern Upload', "mestowabo"),
			'desc'=> __('Upload your background or paste the url', "mestowabo"),
			'subtitle' => __('Upload image using the native media uploader, or define the URL directly', "mestowabo"),
			'default'=>array('url'=> $theme_path_images . 'bg.jpg' ),
			),
			array(
			'id'=>'pattern_size',
			'type' => 'text',
			'title' => __('Pattern Size (Width)', "mestowabo"),
			'subtitle' => __('Default width: 330px', "mestowabo"),
			"default" => '330px',
			),

			array(
				'id'       => 'mes_accent_color',
				'type'     => 'color',
				'compiler' => true, // Use if you want to hook in your own CSS compiler
				'title'    => __('Main accent color', 'mestowabo'), 
				'subtitle' => __('Default:#ffcc00', 'mestowabo'),
				'default'  => '#ffcc00',
				'validate' => 'color',
			),
			array(
				'id'               => 'header_field_text_2',
				'type'             => 'ace_editor',
				'mode'			   => 'html',
				'title'            => __('Socials Field', 'mestowabo'),
				'subtitle' => __('Type your custom HTML markup', "mestowabo"),
				'default'          => '
<!--USE FONT AWESOME CLASSES-->
<a href="#"><i class="fa fa-twitter-square"></i></a>
<a href="#"><i class="fa fa-pinterest-square"></i></a>
<a href="#"><i class="fa fa-facebook-square"></i></a>
<a href="#"><i class="fa fa-linkedin-square"></i></a>
<a href="#"><i class="fa fa-tumblr-square"></i></a>
				'
			),
		array(
				'id'       => 'tagline',
				'type'     => 'switch', 
				'title'    => __('Switch on tagline?', 'mestowabo'),
				'default'  => true,
				'on' => 'Enabled',
				'off' => 'Disabled',
			),		  
		
		array(
				'id'       => 'tagline_before',
				'type'     => 'switch', 
				'title'    => __('Do you want to add styling "//" to page titles?', 'mestowabo'),
				'default'  => true,
				'compiler'          => true, // Use if you want to hook in your own CSS compiler
				'on' => 'Enabled',
				'off' => 'Disabled',
			),		
		  
				
		array(
			'id'=>'mes_custom_css',
			'type' => 'ace_editor',
			'mode' => 'css',
			'compiler' => true,
			'theme' => 'monokai',
			'title' => __('Custom CSS', "mestowabo"), 
			'subtitle' => __('Quickly add some CSS to your theme by adding it to this block.', "mestowabo"),
			'desc' => __('This field is even CSS validated!', "color-theme-framework"),
			'validate' => "css",
			'default' => "",
		),

		
		),
	);

$sections[] = array(
	'title' => __('Header Settings', "mestowabo"),
	'header' => '',
	'desc' => '',
	'icon_class' => 'icon-large',
    'icon' => 'el-icon-credit-card',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
	'fields' => array(

												

		array(
				'id'       => 'cart_true',
				'type'     => 'switch', 
				'title'    => __('Show cart in top header', 'mestowabo'),
				'default'  => false,
				'subtitle' => __('works for websites which demos show this feature', "mestowabo"),
				'on' => 'Enabled',
				'off' => 'Disabled',
		),
		array(
				'id'       => 'search_true',
				'type'     => 'switch',
				'title'    => __('Show search field in top header', 'mestowabo'),
				'subtitle' => __('works for websites which demos show this feature', "mestowabo"),
				'default'  => true,
				'on' => 'Enabled',
				'off' => 'Disabled',
		),
	),
);


$sections[] = array(
	'title' => __('Blog and Portfolio', "mestowabo"),
	'header' => '',
	'desc' => '',
	'icon_class' => 'icon-large',
    'icon' => 'el-icon-website',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
	'fields' => array(
	
					array(
						'id'=>'blog_sidebar_position',			
						'type' => 'select',
						'compiler' => true,
						'title' => __("Blog Sidebar Position", "mestowabo"), 
						'options' => $blog_sidebar_position,
						'default' => "Right Sidebar"
					)
		),
	);




$sections[] = array(
	'title' => __('Footer Settings', "mestowabo"),
	'header' => '',
	'desc' => '',
	'icon_class' => 'icon-large',
    'icon' => 'el-icon-photo',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
	'fields' => array(

			array(
				'id'               => 'bottom_line_text',
				'type'             => 'editor',
				'title'            => __('Bottom footer text', 'mestowabo'), 
				'default'          => '
Copyright © 2015 Mestowabo. All Rights Reserved.

				',
				'args'   => array(
					'teeny'            => true,
					'textarea_rows'    => 10
				)
			),
			
	
		),
	);












global $ReduxFramework;
if ( !isset( $tabs ) ) $tabs = 0;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

// END Sample Config

function generate_options_css( $newdata ) {
    $smof_data = $newdata;
    $css_dir = get_stylesheet_directory() . '/framework/css/';
    $css_php_dir = get_template_directory() . '/framework/css/';
    ob_start();
    require( $css_php_dir . '/style.php' );
    $css = ob_get_clean();
    global $wp_filesystem;
    WP_Filesystem();
    if ( ! $wp_filesystem->put_contents( $css_dir . '/options.css', $css, 0644 ) ) {
        return true;
    }
}

function mes_theme_css_compiler() {
	global $mes_options;
	generate_options_css( $mes_options );
}
add_action('redux-compiler-mes_options', 'mes_theme_css_compiler');