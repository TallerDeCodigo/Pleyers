<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); 
$title = get_the_title();
global $mes_options;
if ( $title == "Blog Left Sidebar")  $mes_options['blog_sidebar_position'] = "Left Sidebar";
if ( $title == "Blog Right Sidebar")  $mes_options['blog_sidebar_position'] = "Right Sidebar";
if ( $title == "Without Sidebar")  $mes_options['blog_sidebar_position'] = "Without Sidebar";
?>

<div class="row">
    <?php if($mes_options['blog_sidebar_position'] == "Right Sidebar" ) {?>
    <div class="col-md-12 col-sm-12">
        <div class="mes_full_blog_post_date">
            <h2 class="mes_date_d"><?php the_time('d') ?></h2>
            <h4 class="mes_date_y colored"><?php the_time('M Y') ?></h4>
        </div>
        <?php if ($large_image_url[0] != "") {?>
            <div class="mes_post_format_content">
                 <div class="mes_with_mask_no_url">
                    <img src="<?php echo esc_url($large_image_url[0]); ?>" alt="<?php the_title(); ?>" />
                </div>
            </div>
        <?php } else {;?>
            <div class="mes_post_format_content">
                 <div class="mes_with_mask_no_url">
                    <img src="<?php echo bloginfo('template_directory').'/framework/css/img/mes_empty.jpg'; ?>" alt="<?php the_title(); ?>" />
                </div>
            </div>
        <?php };?>
    </div>
    <?php };?>
    <div class="col-md-12 col-sm-12">
        <div class="mes_blog_item_holder">
            <div class="mes_blog_full_content_holder">
                <div class="mes_blog_head">
                    <h5 class="mes_blog_post_title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?> </a></h5>
                    <div class="mes_blog_meta">
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
    <?php if($mes_options['blog_sidebar_position'] == "Left Sidebar" ) {?>
    <div class="col-md-2">
        <div class="mes_full_blog_post_date">
        <h2 class="mes_date_d"><?php the_time('d') ?></h2>
        <h4 class="mes_date_y colored"><?php the_time('M Y') ?></h4>
        </div>
    </div>
    <?php };?>
</div>

