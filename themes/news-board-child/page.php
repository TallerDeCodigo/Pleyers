<?php 
get_header(); 
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
<!--
                <?php
                    $args = array(
                                array(
                                    'key'     => 'episodios',
                                    'value'   => 'videos'
                                    )   
                                );
                    $query =  new WP_Query($args);
                ?>-->

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile;  ?> 
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php 
get_footer();
?>