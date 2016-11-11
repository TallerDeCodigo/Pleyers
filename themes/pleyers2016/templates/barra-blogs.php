<section>
	<section>
		<nav>
			<ul>
				<?php 
					$args = array(
								'post_type'=>'episodios',
								'posts_per_page'=>-1,
								'post_status'=>'publish',
								'orderby'=>'date',
								'order'=>'DESC',
								'tax_query'=>array(
												array(
													'taxonomy'=>'shows',
													'field'=>'slug',
													'terms'=>array('apuntes-de-rabona', 'cultura-pop', 'deportologia', 'jiots-tv', 'el_pechofrio', 'lucha-libre', 'tactica', 'tirando-guante', 'Malo	turismo-deportivo');
													);
												)
						);
					$posts = new WP_Query($args);
					echo "<pre>";
						print_r($posts);
					echo "</pre>";
				?>
				<li>

				</li>
			</ul>
		</nav>
	</section>>
		<div class="grid_videos container clearfix">
			<h2>Blogs</h2>
			<div class="videos_stack clearfix">
				<?php
						$args = array(
									'post_type'=>'episodios',
									'posts_per_page'=>7,
									'post_status'=>'publish',
									'orderby'=>'date',
									'order'=>'DESC'
									);
						$posts = new WP_Query($args);
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
			?>
			</div>
		</div>
	</section>