<?php  global $smof_data; ?>
<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); ?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="mes_blog_item_holder">

            <?php if (get_post_type()=='noticias' || get_post_type()=='opiniones') {?> <!--$large_image_url[0] != ""-->
            <div class="mes_post_format_content">
                 <div class="mes_with_mask_no_url">
                    <a rel="prettyPhoto" class="mes_pretty_image_link" title="<?php the_title();?>" href="<?php echo esc_url($large_image_url[0]); ?>"><div class="mes_pretty_image_link_plus"></div></a>
                    <img src="<?php echo esc_url($large_image_url[0]); ?>" alt="" />
                </div>
            </div>
            <?php }else{ ?><!--END IF-->

            <div class="mes_blog_item_content">
                <div class="mes_blog_item_main_content ">
                    <?php the_content('<div class="mes_read_more text-center"><a class="mes_readmore_btn" href="'. get_permalink($post->ID) . '">'. __("MAS","mestowabo") .'</a></div>'); ?>
                </div>
            </div>
            <?php }; ?><!--END ELSE-->

            <section class="contenido_single">
                 <div class="mes_blog_head">
                    <div class="mes_blog_meta">
                        <?php the_author_posts_link() ?>,&nbsp;&nbsp;
                        <?php the_time('d F Y') ?>,&nbsp;&nbsp;
                        <h2 class="mes_blog_post_title_inner"><?php the_title();?></h2>
                        <a href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%')?>  <?php echo __("Comments","mestowabo")?></a>
                    </div>
                </div>
                <section class="redes_sociales">
                    <!--redes sociales-->
                    <?php echo do_shortcode('[easy-share buttons="facebook,twitter,google,pinterest,linkedin" counters=1 counter_pos="right" native="no" facebook_text="facebook" twitter_text="twitter" google_text="google" pinterest_text="pinterest" linkedin_text="linkedin"]'); ?>
                </section>
                        <?php get_taxonomy($taxonomy);?>

                        <?php $terms = wp_get_post_terms( $post->ID, 'tipodeopinion' ); 
                            //print_r($terms);
                        ?>

                <?php if (get_post_type()=='noticias' || get_post_type()=='opiniones') {?>
                <div class="mes_blog_item_content">
                    <div class="mes_blog_item_main_content ">
                        <?php 
                            $args = array(
                                        'post_type'=>'opiniones',
                                        'post_per_page' => -1,
                                        'post_status' => 'publish',
                                        'tax_query'     =>array(
                                                            array(
                                                                'taxonomy'=>'tipodeopinion',
                                                                'field' =>'slug',
                                                                'term'  =>'columna'
                                                            ),
                                                        ),
                                        );
                            $query = new WP_Query($args);
                            
                           
                                    the_content('<div class="mes_read_more text-center"><a class="mes_readmore_btn" href="'. get_permalink($post->ID) . '">'. __("MAS","mestowabo") .'</a></div>');
                            
                        ?>
                <?php }; ?>
                    </div>
                </div>
                
            </section>
        </div>
	</div>
</div>