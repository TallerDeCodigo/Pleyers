<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); ?>

<div class="row">
    <div class="col-md-12">
    	<div class="row">
        	<div class="col-md-2 col-sm-2 ">
                <div class="mes_testimonial2_item_holder">
					<img class="img-circle" src="<?php echo esc_url($large_image_url[0]); ?>" alt="" />
                </div>
            </div>
            <div class="col-md-10 col-sm-10">
                <div class="mes_textimponial2_text">
                    <?php the_content(); ?>
                </div>
                <h6 class="mes_textimponial2_author"><?php the_time('d F Y') ?>,&nbsp;&nbsp;  <?php the_title(); ?></h6>
                <h4 class="mes_textimponial2_author_small"><?php echo get_post_meta($post->ID, 'testum-text-color', true); ?></h4>
            </div>
        </div>
	</div>
</div>
