<?php get_header(); ?>
<section>
    <div class="short_container e404_ clearfix">
        <div class="er404 head_ clearfix">
            <img src="<?php echo THEMEPATH; ?>images/venado_pleyers.png" class="clearfix">
            <h2>Error 404</h2>
            <span>No encontramos lo que estás buscando pero esto podría interesarte...</span>
        </div>
        <?php
            $types = get_all_posttypes();
            $args = array(
                        'post_type'=>$types,
                        'posts_per_page'=>5,
                        'post_status'=>'publish',
                        'orderby'=>'rand',
                        'order'=>'DESC'
                        );
            $posts = new WP_Query($args);

                if($posts->have_posts()): 
                    while($posts->have_posts()):
                        $posts->the_post();
                        setup_postdata($post);
                        $terms = wp_get_post_terms($post->ID, 'noticiasde' );

            ?>
                <div class="post clearfix">
                    <a href="<?php the_permalink(); ?>">
                        <div class="img_frame clearfix">
                            <?php the_post_thumbnail('poster'); ?>
                        </div>
                    </a>
                    <span>
                        <a href="<?php bloginfo('url'); echo '/noticiasde/'.$terms[0]->slug.'/'; ?>">
                            <?php 
                                if($terms){
                                    $trm_nme = $terms[0]->name;
                                    echo "#".$trm_nme;
                                } 
                            ?>
                        </a>
                    </span>
                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                    <a href="<?php the_permalink(); ?>"><p><?php the_excerpt(); ?></p></a>
                </div>
            <?php
                        wp_reset_postdata(); 
                    endwhile; 
                endif; 
            ?>
    </div>
</section>
<?php get_footer(); ?>