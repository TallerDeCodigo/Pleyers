<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <title><?php wp_title('| ',true,'right'); bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>" />  
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php global $mes_options;?>
    <link rel="shortcut icon" href="<?php  echo stripslashes($mes_options['mes_header_favicon']['url'])?>">
    <?php wp_head(); ?>
    <?php $classes = get_body_class(); ?>
</head>

<?php
$classes = '';
add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
    $classes[] = 'class-name';  
    return $classes;
}
?>
<body  <?php body_class(); ?> style="background:url('<?php echo $mes_options['mes_background_upload']['url']?>'); background-size: <?php echo $mes_options['pattern_size']?> auto;">

<!--PRELOADER -->
<?php if ($mes_options['preloader'] == true) { ?>  
    <div class="preloader-holder" style="background:url('<?php echo $mes_options['mes_background_upload']['url']?>'); background-size: <?php echo $mes_options['pattern_size']?> auto;">
        <div class="preloader dont-move-me">
            <img alt="" src="<?php echo $mes_options['mes_logo_upload']['url']?>">
        </div>
    </div>
<?php } ?>
<!--/PRELOADER -->
<!--TOP HEADER -->
<div class="mes_top_header">
    <div class="container">
    <div class="row">
        <div class="mes_socials_holder col-md-offset-4 col-sm-offset-4 col-xs-offset-4 col-md-6 col-sm-4 col-xs-12">
            <?php echo $mes_options['header_field_text_2']?>
            <div class="mes_top_left_widget">
                <?php if ( is_active_sidebar("top_left_widget") ) : ?><?php dynamic_sidebar( "top_left_widget" ); ?>              
                <?php endif; ?>
            </div>
        </div>
        <?php if($mes_options['search_true'] == true) { ?>
        <div class="mes_search-wrap col-md-2 col-sm-4 col-xs-2">
            <?php  echo do_shortcode( '[mes_search]' ) ?>
        </div>
        <?php }?>
    </div>
    </div>
</div>
<!--/TOP HEADER -->
<!--HEADER -->
<div class="mes_header_holder">
    <div class="container">
    <div class="mes_menu-holder">
            <div class="row">
                <?php if($mes_options['choose_head'] == true) {?>

                    <div class="mes_title_holder" style="background:url('wp-content/themes/news-board/framework/images/pleyers_logo.svg');background-repeat:no-repeat;background-position:center;height:195px;">
                       <!--
                        <?php echo $mes_options['header_field_text_1']?>
                        -->
                    </div>
                <?php } else {?>
                <?php echo $mes_options['header_field_text_1']?>
                    <div class="mes_logo_holdred dont-move-me col-sm-12 col-xs-12" style="background:url('<?php echo $mes_options['mes_stamp']['url']?>')  no-repeat scroll right bottom / 85px auto">
                        <a href="<?php echo home_url(); ?>"><img alt="" src="<?php echo $mes_options['mes_logo_upload']['url']?>"></a>
                    </div>
                <?php }?>
            </div>
        <div class="mes_toggle-wrapper-wrap">
            <a id="mes_menu-toggle-wrapper" href="#">
                <div id="mes_menu-toggle"></div>
            </a>
        </div>
    </div>
    </div>
</div>

<div class="mes_menu_content_holder">
    <div class="container">
            <?php if ( has_nav_menu( 'main_menu' ) ){
                $walker = new MES_Walker;
                wp_nav_menu(array(
                    'echo' => true,
                    'container' => '',
                    'theme_location' => 'main_menu',
                    'menu_class' => 'mes_header_menu',
                    'walker' => $walker
            ));
                } else { echo '<div class="alert alert-info" style="margin-top:10px !important; margin-bottom:30px; margin-left:20px;margin-right:20px;"><strong>Set up your FIRST menu</strong><br> Appearance -> Menus -> Create your menu -> Choose it in "Theme Location" block</div>';}
            ?>
    </div>
</div>
<!--/HEADER -->

<!--CONTENT -->
<?php $classes = get_body_class(); ?>
<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
<div class="wide_cont" id="mes_content">