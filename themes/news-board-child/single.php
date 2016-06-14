<?php 
/* Template Name: Blog Template */
get_header();
$mes_options['blog_sidebar_position'] = "Right Sidebar";
?>
    <div class="container">
        <div class="row">
	        <div class="<?php if ($mes_options['blog_sidebar_position'] == "Without Sidebar") { ?>col-md-12<?php } else { ?>col-md-12 col-sm-12<?php }; if ($mes_options['blog_sidebar_position'] == 'Left Sidebar'){?> col-md-push-4 col-sm-push-4<?php }; ?>">
				<?php if (!(have_posts())) { ?><h3 class="page_title"> There are no posts </h3><?php }  ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                <div <?php post_class('row mes_post'); ?> id="post-<?php the_ID(); ?>">
                    <div class="col-md-12">
                        <div class="blog_item"> 
                            <?php $format = get_post_format(); get_template_part( 'framework/post-format/single', $format );   ?>
                    	</div>

                            <?php echo do_shortcode( "[ess_grid alias='related-posts']")?>


						<!--<?php if ( ! post_password_required() ) { ?>
                        <?php if (comments_open()) { ?>
                                <div class="mes_commente_holder" id="comments">
                                    <div class="comments_div">
                                        <?php $comment_count = get_comment_count($post->ID); ?>
                                        <h4 class="mes_comments_title"><?php if($comment_count['approved'] > 0) { comments_number('0 Comments','1 Comment:','% Comments:'); };?></h4>
                                    </div>
                                    <ol class="mes_ticket_commentlist"> 
                                        <?php	 		 		 		 		 		 	

                                            $comments = get_comments(array(
                                            'post_id' => get_the_ID(),
                                            ));
                                

                                            wp_list_comments(array(
                                            'per_page' => 10, 
                                            'reverse_top_level' => true 
                                            ), $comments);
                                        ?>
                                    </ol>
                
                
                                    <?php if ( is_user_logged_in() ) { ?>
                                    <div id="respond">
                                        <h4><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h4>
                                        <form class="form" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="contact-form">
                                            <textarea type="text" placeholder="Message" id="comment" name="comment" class="input-text" rows="5" style="width:100%"></textarea><br><br>
                                            <button name="submit" id="submit_form" type="submit"  class="btn mes_submit"><?php _e( "Reply", "mestowabo" ) ?></button>
                                    
                                            <div><?php comment_id_fields(); ?></div>
                                            <?php do_action('comment_form', get_the_ID()); ?>
                                        </form>
                                    </div>

                                    <?php }else { ?>
                                        <h4><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h4>
                                        <form class="form" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="contact-form">
                                            <input type="text" class="input-text" style="width:100%" placeholder="Name" name="author" value="<?php if (isset($comment_author)){ echo esc_attr($comment_author); } ?>" /><br><br>
                                            <input  class="input-text" type="text" style="width:100%" placeholder="E-mail" name="email" value="<?php if (isset($comment_author_email)){ echo esc_attr($comment_author_email); }?>" /><br><br>
                                            <textarea type="text" placeholder="Message" id="comment" name="comment" class="input-text" rows="5" style="width:100%"></textarea><br><br>
                                            <button name="submit" id="submit_form" type="submit"  class="btn mes_submit"><?php _e( "Reply", "mestowabo" ) ?></button>
                                
                                            <div><?php comment_id_fields(); ?></div>
                                            <?php do_action('comment_form', get_the_ID()); ?>
                                        </form>
                                    <?php }?>
                                    <?php paginate_comments_links(); ?>
                                </div>
                            <?php };?>
                        <?php };?>-->

                    <!--    <?php $insert = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
                     <div class="comentarios">   
                        <p class="label_form">deja un comentario</p>
                        <p class="regreso"><a href="http://localhost/pleyers">regreso &nbsp; &lt;</a></p>
                        <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5"></div>
                    </div> -->
                
                    </div>
                
                </div>  
                <?php endwhile; endif; ?>
            </div>

                <!--/Page content-->
                <!--Sidebar-->
                <!--
                    <?php if (($mes_options['blog_sidebar_position'] == "Left Sidebar")|| ($mes_options['blog_sidebar_position'] == "Right Sidebar")) { ?>
                     <div class="col-md-4 col-sm-4 <?php if ($mes_options['blog_sidebar_position'] == 'Left Sidebar'){?>col-md-pull-8 col-sm-pull-8 mes_left_sidebar<?php }else {?> mes_right_sidebar<?php ;}; ?>">
                        <div class="myrs">
                                <?php if ( is_active_sidebar("blog_sidebar") ) : ?><?php dynamic_sidebar("blog_sidebar"); ?>              
                                <?php endif; ?>
                        </div>
                    </div> 
                -->
                
                <!--/Sidebar-->
            <?php } ?>
        </div>
    </div>


<?php 
get_footer();
?>