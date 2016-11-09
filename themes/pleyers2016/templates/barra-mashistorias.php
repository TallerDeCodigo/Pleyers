<div class="mas_historias">
	<h3 class="header_sprints">Mas historias</h3>
	<?php 
		$types = get_all_posttypes();

		$args = array(
					'post_type'=> $types,
					'posts_per_page'=>3,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC'
			);
		$posts = new WP_Query($args);
		if($posts->have_posts()): 
			while($posts->have_posts()):
				$posts->the_post(); setup_postdata($post);
				$tags = get_the_tags();
	?>
	<div class="post clearfix">
		<a href="">
			<div class="img_frame clearfix">
				<?php the_post_thumbnail(); ?>
				<!-- <img src="images/post.png"> -->
			</div>
		</a>
		<?php 
			if(!empty($tags)){
				foreach($tags as $tag): ?>
					<a href="<?php the_permalink(); ?>"><span><?php echo "#".esc_html($tag->name)." "; ?></span></a>
		<?php 		
				endforeach; 
			} 
		?>
		<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
		<!-- <a href=""><p><?php the_content(); ?></p></a> -->
	</div>
	<?php
		wp_reset_postdata(); endwhile; endif; 
	?>
</div>