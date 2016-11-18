<?php 
	get_header(); 
	$posts = get_queried_object();
	$aidi_exclude = $post->ID;
?>
	<div class="single_post clearfix">
		<div class="single_top clearfix">
				<?php 
					$tags = get_the_tags();
					if($tags){
						foreach($tags as $tag):
							$tag_url = $tag->slug;
						endforeach;
					?>
							<a href="<?php echo bloginfo('url').'/tag/'.$tag_url; ?>">
								<span>
									<?php echo "#".esc_html($tag->name)." "; ?>
								</span>
							</a>	
					<?php		
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
							'posts_per_page'=>5,
							'post_status'=>'publish',
							'orderby'=>'date',
							'order'=>'DESC',
							'tag'=>$tag_url,
							'post__not_in'=>array($aidi_exclude)
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
					</div>
				</a>
				<?php 
					if(!empty($tags)){
						foreach($tags as $tag): 
							$tag_url = $tag->slug; 
						endforeach; 
						?>
							<a href="<?php echo bloginfo('url').'/tag/'.$tag_url; ?>">
								<span>
									<?php echo "#".esc_html($tag->name)." "; ?>
								</span>
							</a>
				<?php 		
					} 
				?>
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
			</div>
			<?php
				wp_reset_postdata(); endwhile; endif; 
			?>
		</div>
	</div>
	
<?php get_footer(); ?>