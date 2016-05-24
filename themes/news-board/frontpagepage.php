<?php // Template Name: Front Page
get_header(); 
?>

<div class="mes_page_cont_holder main_content_area">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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