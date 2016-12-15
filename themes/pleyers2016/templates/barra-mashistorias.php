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
				$posts->the_post(); setup_postdata($post);
				$tags = get_the_tags();
	?>
	<div class="post clearfix">
		<a href="<?php the_permalink(); ?>">
			<div class="img_frame clearfix">
				<?php the_post_thumbnail(); ?>
				<!-- <img src="images/post.png"> -->
			</div>
		</a>
		<?php 
			if(!empty($tags)){
				foreach($tags as $tag): 
					$tag_nme = $tag->name;
				endforeach; 
					?>
					<a href="<?php the_permalink(); ?>"><span><?php echo "#".$tag_nme; ?></span></a>
		<?php 		
			} 
		?>
		<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
		<p><?php the_excerpt(); ?></p>
	</div>
	<?php
		wp_reset_postdata(); endwhile; endif; 
	?>
</div>