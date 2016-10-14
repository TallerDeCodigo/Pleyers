<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio-squre-lit'); 
$title = get_the_title();
global $mes_options;
if ( $title == "Blog Left Sidebar")  $mes_options['blog_sidebar_position'] = "Left Sidebar";
if ( $title == "Blog Right Sidebar")  $mes_options['blog_sidebar_position'] = "Right Sidebar";
if ( $title == "Without Sidebar")  $mes_options['blog_sidebar_position'] = "Without Sidebar";
?>

<?php if (get_post_meta($post->ID, 'image', true)||get_post_meta($post->ID, 'image2', true)||get_post_meta($post->ID, 'image3', true)) {?>
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="mes_full_blog_post_date">
            <h2 class="mes_date_d"><?php the_time('d') ?></h2>
            <h4 class="mes_date_y colored"><?php the_time('M Y') ?></h4>
        </div>
        <div class="mes_post_format_content">
                <div id="port_slider" class="flexslider mes_flex_loading mes_vc_gal">
                    <ul class="slides">
                    <?php    if (get_post_meta($post->ID, 'image', true)) { ?>
                        <li><img src="<?php      echo get_post_meta($post->ID, 'image', true); ?>" alt="" /></li>
                    <?php    } ?>
                    <?php    if (get_post_meta($post->ID, 'image2', true)) { ?>
                        <li><img src="<?php      echo get_post_meta($post->ID, 'image2', true); ?>" alt="" /></li>
                    <?php    } ?>
                    <?php    if (get_post_meta($post->ID, 'image3', true)) { ?>
                        <li><img src="<?php      echo get_post_meta($post->ID, 'image3', true); ?>" alt="" /></li>
                    <?php    } ?>
                    <?php    if (get_post_meta($post->ID, 'image4', true)) { ?>
                        <li><img src="<?php      echo get_post_meta($post->ID, 'image3', true); ?>" alt="" /></li>
                    <?php    } ?>
                    <?php    if (get_post_meta($post->ID, 'image5', true)) { ?>
                        <li><img src="<?php      echo get_post_meta($post->ID, 'image3', true); ?>" alt="" /></li>
                    <?php    } ?>
                    </ul>
                </div>
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
    <div class="col-xs-12">
        <div class="mes_full_blog_post_date">
            <h2 class="mes_date_d"><?php the_time('d') ?></h2>
            <h4 class="mes_date_y colored"><?php the_time('M Y') ?></h4>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="mes_blog_item_holder">        
            <div class="mes_blog_full_content_holder" style="padding-bottom: 20px;padding-left: 100px;">
                <div class="mes_blog_head">
                    <h5 class="mes_blog_post_title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?> </a></h5>
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