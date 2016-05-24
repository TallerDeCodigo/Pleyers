<?php
$paged = 1;
if ( get_query_var('paged') ) $paged = get_query_var('paged');
if ( get_query_var('page') ) $paged = get_query_var('page');
?>
<?php 
get_header(); 
?>
<?php global $more;
    $more = 0;   
?>
<?php $my_sb =  get_post_meta($post->ID, 'sidebarss', 1);
if ($my_sb == ''){$sb = 'Right Sidebar';} else { $sb = $my_sb;};

$sb_pos =  get_post_meta($post->ID, 'sidebarss_position', 1);
?> 

<div class="main_content_area mes_page_cont_holder">
    <div class="container">
        <?php  global $smof_data; ?>
<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); ?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="mes_blog_item_holder">   
            <div class="mes_blog_item_content">
                <div class="mes_blog_item_main_content">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile;  ?> 
                <?php endif; ?>
                </div>
                <br><a href="javascript:javascript:history.go(-1)" class="mes_back_btn"><h4><?php echo __("Back","mestowabo"); ?><i class="fa fa-chevron-left"></i></h4></a>


                <?php if ( ! post_password_required() ) {?>
                        <?php if (comments_open()) {?>
                        <div class="mes_commente_holder" id="comments">
                        <div class="comments_div">
                        <?php $comment_count = get_comment_count($post->ID); ?>
                        <h4 class="mes_comments_title"><?php if($comment_count['approved'] > 0) { comments_number('0 Comments','1 Comment:','% Comments:'); };?></h4>
                        </div>
                        <ol class="mes_ticket_commentlist">
                        <?php                                               
                        //Gather comments for a specific page/post 
                        $comments = get_comments(array(
                        'post_id' => get_the_ID(),
                        ));
                        
                        //Display the list of comments
                        wp_list_comments(array(
                        'per_page' => 10, //Allow comment pagination
                        'reverse_top_level' => true //Show the latest comments at the top of the list
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
                <?php };?>


            </div>
        </div>
    </div>
</div>
    </div>
</div>
<?php 
get_footer();
?>