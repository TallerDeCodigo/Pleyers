<?php  global $smof_data; ?>
<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); ?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="mes_blog_item_holder">

            <?php if (get_post_type()=='noticias' || get_post_type()=='opiniones') {?> <!--$large_image_url[0] != ""-->
            <div class="mes_post_format_content">
                 <div class="mes_with_mask_no_url">
                    <img src="<?php echo esc_url($large_image_url[0]); ?>" alt="" />
                    <section class="date_time">
                        <?php the_time('d F Y') ?>,&nbsp;&nbsp;
                    </section>
                    <h2 class="mes_blog_post_title_inner">
                        <?php the_title(); ?>
                    </h2>
                    <section class="redes_sociales">
                        <?php echo do_shortcode('[easy-share buttons="facebook,twitter,google,pinterest,linkedin" counters=1 counter_pos="right" native="no" facebook_text="facebook" twitter_text="twitter" google_text="google" pinterest_text="pinterest" linkedin_text="linkedin"]'); ?>
                    </section>
                    <?php the_content(); ?>
                </div>
            </div>
            <?php }else{ ?><!--END IF-->


            <section class="contenido_single">
                 <div class="mes_blog_head">
                    <div class="mes_blog_meta">
                        <section class="singleContent">
                            <?php the_content(); ?>
                        </section>
                        <section class="mes_post_format_content">
                            <?php the_author_posts_link() ?>,&nbsp;&nbsp;
                            <?php the_time('d F Y') ?>,&nbsp;&nbsp;
                            <h2 class="mes_blog_post_title_inner"><?php the_title(); ?></h2>
                        
                            <!--redes sociales-->
                            <section class="redes_sociales">
                                <?php echo do_shortcode('[easy-share buttons="facebook,twitter,google,pinterest,linkedin" counters=1 counter_pos="right" native="no" facebook_text="facebook" twitter_text="twitter" google_text="google" pinterest_text="pinterest" linkedin_text="linkedin"]'); ?>
                            </section>
                        </section>    
                        <a href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%')?>  <?php echo __("Comments","mestowabo")?></a>
                    </div>
                </div>
            </section>
            <?php }; ?><!--END ELSE-->
        </div>
	</div>
</div>