<?php get_header(); ?>
<?php 
	$args = array(
				'post_type'=> array('post', 'episodios', 'graficos'),
				'posts_per_page'=>-1,
				'post_status'=>'publish',
				'orderby'=>'date',
				'order'=>'DESC',
				'post__not_in'=>array($main_post_id)
		);

	$posts = new WP_Query($args);
	// echo "<pre>";
	// 	print_r($posts);
	// echo "</pre>";
?>
	<div class="posts_pool clearfix">

		<?php	
			if($posts->have_posts()):
				while($posts->have_posts()):
					$posts->the_post();
					setup_postdata($post);
		?>
					<div class="post clearfix">
					    <a href="">
					        <div class="img_frame clearfix">
					            <?php the_post_thumbnail(); ?>
					        </div>
					    </a>
					    <?php 
					        $terms = wp_get_post_terms($post->ID, 'noticiasde' ); 
					        if($terms){
					            foreach($terms as $term):
					        ?>
					            <a href="<?php echo bloginfo('url').'/noticiasde/'.$term->slug; ?>">
					                <span>
					                    <?php echo "#".esc_html($term->name)." "; ?>
					                </span>
					            </a>    
					        <?php       
					        endforeach; }
					    ?>
					    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
					</div>
		<?php 
				wp_reset_postdata();
				endwhile;
			endif;	
		?>
	</div>
<?php get_footer(); ?>