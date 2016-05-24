<?php $little_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail'); ?>


<div class="row">
	<div class="col-md-2 col-sm-3">
    	<div class="mes_news_thumb"><a href="<?php echo the_permalink(); ?>"><img src="<?php echo esc_url($little_image_url[0]); ?>" alt="" /></a></div>
    </div>
    <div class="col-md-10 col-sm-9">
    	<a href="<?php echo the_permalink(); ?>"><h4 class="mes_news_title"><?php the_title(); ?></h4></a>
        <h6 class="mes_news_date text-center">
            <?php the_time('d') ?>
            <?php the_time('F') ?>
            <?php the_time('Y') ?>
        </h6>
        <?php $content = get_the_content();
		$content = strip_tags($content);
		echo substr($content, 0, 180);?> ...
    </div>
</div>
