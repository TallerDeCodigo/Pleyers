<?php 
	get_header();
	$var_expire=300;
	$query = wp_cache_get('posts_cached');

	if($query == false){
		$args = array(
					'post_type'=>'post',
					'posts_per_page'=>4,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC'
					);
		$posts = new WP_Query($args);
		wp_cache_set('posts_cached', $posts, '', $var_expire);
		$count = 0;
		// echo "<pre>";
		// 	print_r($posts->posts);
		// echo "</pre>";
?>
	<section>
		<div class="main_banner full_container clearfix">

			<?php 
			if($posts->have_posts()): 
				while($posts->have_posts()):
					$posts->the_post(); setup_postdata($post);
				if($count == 0){
			?>
				<div class="img_frame">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="destacado nota1">
					<?php $tags = get_the_tags(); foreach($tags as $tag){ ?>
						<a href=""><span><?php echo "#".esc_html($tag->name)." "; ?></span></a>
					<?php } ?>
					<a href="<?php the_permalink(); ?>">
						<h3>
							<?php the_title(); ?>
						</h3>
					</a>
				</div>
			
			<?php		
				}else if($count == 1 ){
					$thumb = the_post_thumbnail_url();
			?>

			<div class="more_destacado">
				<div class="destacado" data-image="<?php $thumb?>">
					
					<a href="">
						<h3>
							<?php the_title(); ?>
						</h3>
					</a>
				</div>
				
			<?php		
				}else if($count > 1 ){
			?>	
				<div class="destacado" data-image="<?php $thumb?>">
					<a href="">
						<h3>
							<?php the_title(); ?>
						</h3>
					</a>
				</div>
			
			<?php		
				} $count ++; wp_reset_postdata(); endwhile; endif;
			?>
			</div>
		</div>
	</section>

	<section>
		<div class="container clearfix">
			<div class="left_container">
				<?php 
					$query = wp_cache_get('all_pt_cached');
					$types = get_all_posttypes();
					if($query == false){

					$args = array(
								'post_type'=> $types,
								'posts_per_page'=>-1,
								'post_status'=>'publish',
								'orderby'=>'date',
								'order'=>'DESC'
						);
					$posts = new WP_Query($args);
					wp_cache_set('all_pt_cached', $posts, '', $var_expire);
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
					wp_reset_postdata(); endwhile; endif; }
				?>
			</div>
			<div class="sidebar clearfix">
				<div class="sprints">
					<?php 
						$query = wp_cache_get('sprints_cached');
						if($query == false){

							$args = array(
										'post_type'=>'sprints',
										'posts_per_page'=>-1,
										'post_status'=>'publish',
										'orderby'=>'date',
										'order'=>'DESC'
										);
							$posts = new WP_Query($args);
							wp_cache_set('sprints_cached', $posts, '', $var_expire);

					?>
							<h3 class="header_sprints">SPRINTS</h3>
							<div class="sprints_container">
								<?php 
									if($posts->have_posts()): 
										while($posts->have_posts()):
											$posts->the_post(); setup_postdata($post);
								?>
								<div class="formato_b sprints_post clearfix">
									<span class="post_time">2h</span>
									<div class="sprints_post_content">
										<a href="">
											<div class="img_frame">
												<?php the_post_thumbnail(); ?>
												<!-- <img src="images/post.png" /> -->
											</div>
										</a>
										<a href="<?php the_permalink(); ?>">
											<p>
												<?php the_content(); ?>
											</p>
										</a>
									</div>
								</div>
						<?php wp_reset_postdata(); endwhile; endif; } ?>
							</div>
				</div>
			</div>
		</div>
	</section>

	<section class="cerocero">
		<div class="container clearfix">
		<img src="images/00_logo.png">
			<div class="posts_cerocero clearfix">
				<img src="images/cero.png">
				<img src="images/cero.png">
				<img src="images/cero.png">
			</div>
		</div>
	</section>

	<section>
		<div class="grid_videos container clearfix">
			<h2>Blogs</h2>
			<div class="videos_stack clearfix">
				<div class="video_post big_video clearfix">
					<a href="">
						<div class="img_frame clearfix">
							<img src="images/post.png">
						</div>
						<div class="video_info">
							<span>#Baseball</span>
							<h3>Marco Estrada tuvo salida inmejorable ante los Rangers</h3>
						</div>
					</a>
				</div>
				<div class="video_post small_video clearfix">
					<a href="">
						<div class="img_frame clearfix">
							<img src="images/post.png">
						</div>
						<div class="video_info">
							<span>#Baseball</span>
							<h3>Marco Estrada tuvo salida inmejorable ante los Rangers</h3>
						</div>
					</a>
				</div>
			</div>
			<div class="videos_stack clearfix">
				<div class="video_post same_size clearfix">
					<a href="">
						<div class="img_frame clearfix">
							<img src="images/post.png">
						</div>
						<div class="video_info">
							<span>#Baseball</span>
							<h3>Marco Estrada tuvo salida inmejorable ante los Rangers</h3>
						</div>
					</a>
				</div>
				<div class="video_post same_size clearfix">
					<a href="">
						<div class="img_frame clearfix">
							<img src="images/post.png">
						</div>
						<div class="video_info">
							<span>#Baseball</span>
							<h3>Marco Estrada tuvo salida inmejorable ante los Rangers</h3>
						</div>
					</a>
				</div>
			</div>
			<div class="videos_stack clearfix">
				<div class="video_post small_video clearfix">
					<a href="">
						<div class="img_frame clearfix">
							<img src="images/post.png">
						</div>
						<div class="video_info">
							<span>#Baseball</span>
							<h3>Marco Estrada tuvo salida inmejorable ante los Rangers</h3>
						</div>
					</a>
				</div>
				<div class="video_post big_video clearfix">
					<a href="">
						<div class="img_frame clearfix">
							<img src="images/post.png">
						</div>
						<div class="video_info">
							<span>#Baseball</span>
							<h3>Marco Estrada tuvo salida inmejorable ante los Rangers</h3>
						</div>
					</a>
				</div>
			</div>
			<div class="videos_stack clearfix">
				<div class="video_post same_size clearfix">
					<a href="">
						<div class="img_frame clearfix">
							<img src="images/post.png">
						</div>
						<div class="video_info">
							<span>#Baseball</span>
							<h3>Marco Estrada tuvo salida inmejorable ante los Rangers</h3>
						</div>
					</a>
				</div>
				<div class="video_post same_size clearfix">
					<a href="">
						<div class="img_frame clearfix">
							<img src="images/post.png">
						</div>
						<div class="video_info">
							<span>#Baseball</span>
							<h3>Marco Estrada tuvo salida inmejorable ante los Rangers</h3>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="jiotstv">
		<div class="container clearfix">
			<h2>Jiots.TV</h2>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
		</div>
	</section>
	<?php
		}//end if cached 
	?>
<?php get_footer(); ?>