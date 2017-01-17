<div class="mas_historias">
	<h3 class="header_sprints">Mas historias</h3>
	<?php 
		$types = get_all_posttypes();

		$args = array(
					'post_type'=> $types,
					'posts_per_page'=>7,
					'post_status'=>'publish',
					'orderby'=>'rand',
					'order'=>'DESC'
			);
		$posts = new WP_Query($args);
		if($posts->have_posts()): 
			while($posts->have_posts()):
				$posts->the_post(); 

				$terms = get_the_terms($post->ID, 'noticiasde');
				$term_name = $terms[0]->name; 
				$term_url = $terms[0]->slug;


	?>
	<div class="post clearfix">
		<div class="img_frame clearfix">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
		<span>
			<a href="<?php echo bloginfo('url'); ?>'/noticiasde/'<?php echo esc_html($term_url); ?> ">
				<?php if($term_name){ echo "#".esc_html($term_name); }else{ } ?>
			</a>
		</span>

		<h3>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<p>
			<?php the_excerpt(); ?>
		</p>
	</div>
	<?php
		wp_reset_postdata(); endwhile; endif; 
	?>
</div>