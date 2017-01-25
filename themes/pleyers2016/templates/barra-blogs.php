<?php

	$terms = get_terms( array( 
	    'taxonomy' => 'shows',
	    'hide_empty' => 1
	) );

	if ( $terms ) :
		foreach ( $terms as $term ) :

			$img = get_term_meta($term->term_id, 'wp_image_field_id', true);

?>
<div id="<?php echo $term->slug; ?>" class="videos_stack with_banner clearfix" style="display:none">
	<div class="video_post is_video small_video presentation clearfix">
		<div class="img_frame clearfix">
			<?php if ($img) : ?>
			<img src="<?php echo $img['url']; ?>">
			<?php endif; ?>
		</div>
		<nav class="blog_social">
			<?php echo $term->description; ?>
		</nav>
	</div>
<?php 
	$args = array(	
				'post_type'=>'episodios',
				'posts_per_page'=>8,
				'post_status'=>'publish',
				'orderby'=>'date',
				'order'=>'DESC',
				'tax_query'=>array(
								array(
									'taxonomy'=>'shows',
									'field'=> 'slug',
									'terms'=>$term->slug										)
								)
				);
	$posts = new WP_Query($args);

	$count = 0;
	if($posts->have_posts()): 
		while($posts->have_posts()):
			$posts->the_post(); setup_postdata($post);
			if($count == 0 || $count == 2 || $count == 3 || $count == 6) {
?>
	<div class="video_post is_video big_video clearfix">
		<a href="<?php the_permalink(); ?>">
			<div class="img_frame clearfix">
				<?php the_post_thumbnail('grid'); ?>
			</div>
			<div class="video_info">
				<?php 
					$terms = wp_get_post_terms(); 
					if($terms): 
						foreach($terms as $term):
				?>
					<a href="<?php bloginfo('url'); echo '/noticiasde/'.$terms[0]->slug.'/'; ?>">
						<span><?php echo esc_html($term->name); ?></span>
					</a>
				<?php 
						endforeach; 
					endif;?>
				<h3>
					<?php the_title(); ?>
				</h3>
			</div>
		</a>
	</div>				
<?php
			}else if($count == 1 || $count == 4 || $count == 5){
?>
	<div class="video_post is_video small_video clearfix">
		<a href="<?php the_permalink(); ?>">
			<div class="img_frame clearfix">
				<?php the_post_thumbnail('grid'); ?>
			</div>
			<div class="video_info">
				<?php 
					$terms = wp_get_post_terms(); 
					if($terms): 
						foreach($terms as $term):
				?>
					<a href="<?php echo'noticiasde/'.$terms->slug; ?>">
						<span><?php echo $term->name; ?></span>
					</a>
				<?php 
						endforeach; 
					endif;
				?>
				<h3>
					<?php the_title(); ?>
				</h3>
			</div>
		</a>
	</div>					
<?php 	
			}			
		$count++;
		endwhile;
	endif;						
?>
</div>
<?php 	
		endforeach;
	endif;						
?>
