<?php get_header(); ?>
	<div class="main_content_area">
        <div class="container">
            <div class="row">
                <!--Page contetn-->
                <div class="<?php if ($mes_options['blog_sidebar_position'] == "Without Sidebar") { ?>col-md-12<?php } else { ?>col-md-8<?php }; if ($mes_options['blog_sidebar_position'] == 'Left Sidebar'){?> col-md-push-4<?php }; ?>">
                    <h3 style="margin-bottom:30px;"><?php _e("Resultados de búsqueda:","mestowabo"); ?> <strong class="colored"><?php echo get_search_query();?></strong></h3>
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
                        <strong>Tu búsqueda no produjo resultados</strong> Cambia algunas cosas e inténtalo de nuevo.
                    </div>
                     <?php endif; ?>

                    <hr class="notopmargin">
					<?php if (function_exists('wp_corenavi')) { ?><div class="pride_pg"><?php wp_corenavi(); ?></div><?php }?>
                </div>
                <?php if (($mes_options['blog_sidebar_position'] == "Left Sidebar")|| ($mes_options['blog_sidebar_position'] == "Right Sidebar")) { ?>
                <!--Sidebar-->
                <div class="col-md-4 <?php if ($mes_options['blog_sidebar_position'] == 'Left Sidebar'){?>col-md-pull-8 mes_left_sidebar<?php }else {?> mes_right_sidebar<?php ;}; ?>">
                    <div class="myrs">
                        <h3>Relacionados</h3>

                        <a href="<?php the_permalink(); ?>">

                            <?php 
                                $args=array(
                                        'numberposts'=>'3',
                                        'order'=>'DESC',
                                        'post_type'=>'episodios',
                                        'post_status'=>'published'
                                    );

                                $query = get_posts($args);

                                for($i=0; $i<count($query); $i++){
                                    print_r("<div class='srch_relacionados'>" . $query[$i]->post_content) . "</div>"; 
                                    // print_r($query[$i]->post_content);
                                }
                             ?>
                        </a>
                        <?php //} }?>

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