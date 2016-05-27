<?php // Template Name: Front Page
get_header(); 
?>
este es front page.php
<div class="mes_page_cont_holder main_content_area">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php $args=query_posts('meta_key=priority&orderby=meta_value&order=ASC');?>
                <?php if ( $args->have_posts() ) : while ( $args->have_posts() ) : $args->the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile;  ?> 
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php 
get_footer();
?>