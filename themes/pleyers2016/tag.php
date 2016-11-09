<?php 
	get_header(); 
	$posts = get_queried_object();
	// echo "<pre>";
	// 	print_r($posts);
	// echo "</pre>";
?>
	<div class="single_post clearfix">
		<div class="single_top clearfix">
				<?php 
					$tags = get_the_tags();
					if($tags){
						foreach($tags as $tag):
							$tags = $tag->slug;
							// echo "<pre>";
							// 	print_r($arr_tag);
							// echo "</pre>";
					?>
							<span><?php echo "#".esc_html($tag->name)." "; ?></span>
					<?php		
						endforeach;
					}
				?>
			<?php 
				if(get_post_meta($post->ID, 'eg_sources_youtube', true)){ 
					$videoid = get_post_meta($post->ID, 'eg_sources_youtube', true);
					echo '<iframe width="1024" height="576" src="https://www.youtube.com/embed/'.$videoid.'" frameborder="0" allowfullscreen></iframe>';
				} else { ?>
				<?php the_post_thumbnail('full'); ?>
			<?php } ?>
			<h2>
				<?php the_title(); ?>
			</h2>
		</div>	
		<?php get_sidebar(); ?>
		<div class="posts_pool clearfix">
			<?php 
				$types = get_all_posttypes();
				$args = array(
							'post_type'=> $types,
							'posts_per_page'=>-1,
							'post_status'=>'publish',
							'orderby'=>'date',
							'order'=>'DESC',
							'tag'=>$tags
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
	</div>
	
<?php get_footer(); ?>