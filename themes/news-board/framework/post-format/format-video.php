<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio-squre-lit'); 
$title = get_the_title();
global $mes_options;
if ( $title == "Blog Left Sidebar")  $mes_options['blog_sidebar_position'] = "Left Sidebar";
if ( $title == "Blog Right Sidebar")  $mes_options['blog_sidebar_position'] = "Right Sidebar";
if ( $title == "Without Sidebar")  $mes_options['blog_sidebar_position'] = "Without Sidebar";
?>
<?php if(get_post_meta($post->ID, '_format_video_embed', true)){?>
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">

            <div class="mes_post_format_content">
                <?php echo get_post_meta($post->ID, '_format_video_embed', true); ?>
            </div>
    </div>
    <div class="col-lg-8 col-md-6 col-sm-6">
        <div class="mes_blog_item_holder">
            
            <div class="mes_blog_full_content_holder">
                <div class="mes_blog_head">
                    <h4 class="mes_blog_post_title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?> </a></h4>
                    <div class="mes_blog_meta">
                        
                        By <?php the_author_posts_link() ?>,&nbsp;&nbsp;
                        <?php $posttags = get_the_tags(); if (!$posttags){echo __("No tags","mestowabo");}else{the_tags('');}; ?>,&nbsp;&nbsp;
                        <a href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%')?>  <?php echo __("Comments","mestowabo")?></a>
                    </div>
                </div>
                
            </div>       
            <div class="mes_blog_item_content">
                <div class="mes_blog_item_main_content">
                    <?php the_content('<div class="mes_read_more"><a class="mes_readmore_btn" href="'. get_permalink($post->ID) . '">'. __(" Read More","mestowabo") .'</a></div>'); ?>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php } else {;?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="mes_post_format_content">
                <?php echo get_post_meta($post->ID, '_format_video_embed', true); ?>
            </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="mes_blog_item_holder">
            <div class="mes_blog_full_content_holder">
                <div class="mes_blog_head">
                    <h4 class="mes_blog_post_title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?> </a></h4>
                    <div class="mes_blog_meta">
                        By <?php the_author_posts_link() ?>,&nbsp;&nbsp;
                        <?php $posttags = get_the_tags(); if (!$posttags){echo __("No tags","mestowabo");}else{the_tags('');}; ?>,&nbsp;&nbsp;
                        <a href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%')?>  <?php echo __("Comments","mestowabo")?></a>
                    </div>
                </div>
            </div>       
            <div class="mes_blog_item_content">
                <div class="mes_blog_item_main_content">
                    <?php the_content('<div class="mes_read_more"><a class="mes_readmore_btn" href="'. get_permalink($post->ID) . '">'. __(" Read More","mestowabo") .'</a></div>'); ?>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php };?>
