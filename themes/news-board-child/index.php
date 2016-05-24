<?php 
get_header(); 
global $more;
$more = 0;

$title = get_the_title();
if ( $title == "Blog Left Sidebar")  $mes_options['blog_sidebar_position'] = "Left Sidebar";
if ( $title == "Blog Right Sidebar")  $mes_options['blog_sidebar_position'] = "Right Sidebar";
if ( $title == "Without Sidebar")  $mes_options['blog_sidebar_position'] = "Without Sidebar";?>

<div class="container">
    <div class="row">
        <div class="<?php if ($mes_options['blog_sidebar_position'] == "Without Sidebar") { ?> col-md-12 <?php } else { ?> col-md-12 col-sm-12 <?php }; if ($mes_options['blog_sidebar_position'] == 'Left Sidebar'){?> col-md-push-4 col-sm-push-4<?php }; ?>">
            <?php if ( !is_archive() ) { ?>
                <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts('paged='.$paged.'&cat='.$cat); ?>		
            <?php } ?> 
            <?php if (!(have_posts())) { ?><h3 class="page_title">There are no posts</h3><?php }  ?> 
             
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                               
                                
            <div <?php post_class('row mes_post'); ?> id="post-<?php the_ID(); ?>">
                <div class="col-md-12">
                    <div class="blog_item">
                        <?php $format = get_post_format(); get_template_part( 'framework/post-format/format', $format );   ?>
                    </div>
                </div>
            </div>
                                    
            <?php endwhile;  ?> 
            <?php endif; ?>
            <hr class="notopmargin">
            <?php if (function_exists('wp_corenavi')) { ?><div class="pride_pg"><?php wp_corenavi(); ?></div><?php }?>
        </div>
        <!--/Page contetn-->
        <?php if (($mes_options['blog_sidebar_position'] == "Left Sidebar")|| ($mes_options['blog_sidebar_position'] == "Right Sidebar")) { ?>
        <!--Sidebar-->
        <div class="col-md-4 col-sm-4 <?php if ($mes_options['blog_sidebar_position'] == 'Left Sidebar'){?>col-md-pull-8 col-sm-pull-8 mes_left_sidebar<?php }else {?> mes_right_sidebar<?php ;}; ?>">
            <div class="myrs">
                                <?php if ( is_active_sidebar("blog_sidebar") ) : ?><?php dynamic_sidebar( "blog_sidebar" ); ?>              
                                <?php endif; ?>
            </div>
        </div>
        <!--/Sidebar-->
        <?php } ?>
    </div>
</div>
<?php
get_footer();
?>