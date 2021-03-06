<div class="mas_historias">
	<h3 class="header_sprints">Más historias</h3>
	<?php 
		$types = get_all_posttypes();

		$args = array(
					'post_type'=> $types,
					'posts_per_page'=>3,
					'post_status'=>'publish',
					'orderby'=>'rand',
					'order'=>'DESC'
			);
		$posts = new WP_Query($args);
		if($posts->have_posts()): 
			while($posts->have_posts()):
				$posts->the_post(); 

				$terms = get_the_terms($post->ID, 'noticiasde');
				if($terms){
					$term_name = $terms[0]->name; 
					$term_url = $terms[0]->slug;
				}


	?>
	<div class="post clearfix">
		<div class="img_frame clearfix">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
		<span>
				<?php if($terms){ ?>
			<a href="<?php echo 'noticiasde/'.$term_url; ?>">
				<?php echo "#".$term_name; ?>
				<?php } ?>
			</a>
		</span>

		<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
		<a class="the_excerpt" href="<?php the_permalink(); ?>"><p><?php the_excerpt(); ?></p></a>
	</div>
	<?php
		wp_reset_postdata(); endwhile; endif; 
	?>
</div>