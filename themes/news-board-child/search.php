<?php get_header(); ?>
	<div class="main_content_area">
        <div class="container">
            <div class="row">
                <!--Page contetn-->
                <div class="<?php if ($mes_options['blog_sidebar_position'] == "Without Sidebar") { ?>col-md-12<?php } else { ?>col-md-8<?php }; if ($mes_options['blog_sidebar_position'] == 'Left Sidebar'){?> col-md-push-4<?php }; ?>">
                    <h3 style="margin-bottom:30px;"><?php _e("Search Results for:","mestowabo"); ?> <strong class="colored"><?php echo get_search_query();?></strong></h3>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                     <div <?php post_class('row mes_post'); ?> id="post-<?php the_ID(); ?>">
                        <div class="col-md-12">
                            <div class="blog_item">
                                <?php $format = get_post_format(); get_template_part( 'framework/post-format/format-search', $format );   ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; else: ?>
                    <div class="alert alert-danger">
                        <strong>Nothing was found!</strong> Change a few things up and try submitting again.
                    </div>
                     <?php endif; ?>
                    <hr class="notopmargin">
					<?php if (function_exists('wp_corenavi')) { ?><div class="pride_pg"><?php wp_corenavi(); ?></div><?php }?>
                </div>
                <?php if (($mes_options['blog_sidebar_position'] == "Left Sidebar")|| ($mes_options['blog_sidebar_position'] == "Right Sidebar")) { ?>
                <!--Sidebar-->
                <div class="col-md-4 <?php if ($mes_options['blog_sidebar_position'] == 'Left Sidebar'){?>col-md-pull-8 mes_left_sidebar<?php }else {?> mes_right_sidebar<?php ;}; ?>">
                    <div class="myrs">

                        <?php if ( is_active_sidebar("blog_sidebar") ) : ?><?php dynamic_sidebar( "blog_sidebar" ); ?>              
                        <?php endif; ?> <!-- sidebar comentado desde functions-->
                    </div>
                </div>
                <!--/Sidebar-->
                <?php } ?>

            </div>
        </div>
    </div>


<?php 
get_footer();
?>