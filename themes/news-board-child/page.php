<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="page_content">
                    <?php the_content(); ?>
                </div>    
                <?php endwhile;  ?> 
                <?php endif; ?>
            
            </div>
        </div>
    </div>
<?php 
get_footer();
?>