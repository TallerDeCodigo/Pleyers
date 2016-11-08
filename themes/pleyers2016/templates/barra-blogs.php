<section>
		<div class="grid_videos container clearfix">
			<h2>Blogs</h2>
			<div class="videos_stack clearfix">
				<?php
					$var_expire = 300;
					$query = wp_cache_get('blogs_cached');
					if($query == false){
						$args = array(
									'post_type'=>'episodios',
									'posts_per_page'=>7,
									'post_status'=>'publish',
									'orderby'=>'date',
									'order'=>'DESC'
									);
						$posts = new WP_Query($args);
						wp_cache_set('blogs_cached', $posts, '', $var_expire);
						$count = 0;
						if($posts->have_posts()):
							while($posts->have_posts()):
								$posts->the_post(); setup_postdata($post);
							if($count == 0){
				?>
								<div class="video_post big_video clearfix">
									<a href="<?php the_permalink(); ?>">
										<div class="img_frame clearfix">
											<?php the_post_thumbnail(); ?>
											<!-- <img src="images/post.png"> -->
										</div>
										<div class="video_info">
											<?php 
												$tags = get_the_tags();
												if($tags){ foreach($tags as $tag): 
												?>
											<span>
												<?php echo esc_html($tag->name); ?>
											</span>
											<?php endforeach; }	?>
											<h3>
												<?php echo $count; the_title(); ?>
											</h3>
										</div>
									</a>
								</div>
						<?php
							}else if($count == 1){
						?>
								<div class="video_post small_video clearfix">
									<a href="<?php the_permalink(); ?>">
										<div class="img_frame clearfix">
											<?php the_post_thumbnail(); ?>
											<!-- <img src="images/post.png"> -->
										</div>
										<div class="video_info">
											<?php 
												$tags = get_the_tags();
												if($tags){ foreach($tags as $tag): 
												?>
											<span>
												<?php echo esc_html($tag->name); ?>
											</span>
											<?php endforeach; }	?>
											<h3>
												<?php echo $count; the_title(); ?>
											</h3>
										</div>
									</a>
								</div>
						<?php 		
							}else if($count < 2){
							?>
								<div class="video_post same_size clearfix">
									<a href="<?php the_permalink(); ?>">
										<div class="img_frame clearfix">
											<?php the_post_thumbnail(); ?>
											<!-- <img src="images/post.png"> -->
										</div>
										<div class="video_info">
											<?php 
												$tags = get_the_tags();
												if($tags){ foreach($tags as $tag): 
												?>
											<span>
												<?php echo esc_html($tag->name); ?>
											</span>
											<?php endforeach; }	?>
											<h3>
												<?php echo $count; the_title(); ?>
											</h3>
										</div>
									</a>
								</div>	
						<?php	
							}
						?>
			<?php 		
						$count ++;
						wp_reset_postdata();
						endwhile; 
					endif;
				} 
			?>
			</div>
		</div>
	</section>