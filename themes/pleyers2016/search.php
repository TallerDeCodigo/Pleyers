<?php 
	get_header(); 
	$query = $_GET['s'];
	$total_results = $wp_query->found_posts;
?>
<section>
	<div class="short_container clearfix">
	<?php if(!empty($total_results)): ?>
	    <div class="search_ head_ clearfix">
	        <span>Resultados de la búsqueda para</span>
	        <h2><?php echo ucfirst($query); ?></h2>
	    </div>
	    <?php
    		if(have_posts()): 
    			while(have_posts()):
    				the_post();
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
	   		    <a class="the_excerpt" href="<?php the_permalink(); ?>"><p><?php the_excerpt(); ?></p></a>
	   		</div>
	   	<?php
   					wp_reset_postdata(); 
   				endwhile; 
   			endif; 
   		?>
   	<?php else : ?>
   		<div class="er404 head_ clearfix">
   		    <img src="<?php echo THEMEPATH; ?>images/venado_pleyers.png" class="clearfix">
   		    <h2>Ooops!</h2>
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
   		            <a class="the_excerpt" href="<?php the_permalink(); ?>"><p><?php the_excerpt(); ?></p></a>
   		        </div>
   		    <?php
   		                wp_reset_postdata(); 
   		            endwhile; 
   		        endif; 
   		    ?>
   	<?php endif; ?>
	</div>
</section>
<section>
      <?php
         if (!empty($total_results) && function_exists('custom_pagination')) {
      ?>
         <nav class='custom-pagination'>
                  <?php
                     $total = $wp_query->max_num_pages;
                     if ( $total > 1 )  {
                        if ( !$current_page = get_query_var('paged') ){
                           $current_page = 1;
                           }
                        echo paginate_links(
                           array(
                                 'base' => get_pagenum_link(1) . '%_%',
                                 'format' => '&paged=%#%',
                                 'current' => $current_page,
                                 'prev_next' => True,
                                 'prev_text' => __('<img src="'.THEMEPATH.'/images/left_nav.png" width="15px" height="15px">'),
                                 'next_text' => __('<img src="'.THEMEPATH.'/images/right_nav.png" width="15px" height="15px">'),
                                 'type' => 'plain',
                                 'total' => $total,
                                 'mid_size' => 4,
                           )
                        );
                     }
                  ?>
         </nav>
      <?php
         }
      ?> 
</section>
<?php get_footer(); ?>