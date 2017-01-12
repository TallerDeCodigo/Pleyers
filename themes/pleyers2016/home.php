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
					'order'=>'DESC',
					'tax_query'=>array(
									array(
										'taxonomy'=>'category',
										'field'=>'slug',
										'terms'=>'destacado'
										)
									)
					);
		$posts = new WP_Query($args);
		$main_post_id = $posts->posts;
		$main_post_id = $main_post_id[0]->ID;
		wp_cache_set('posts_cached', $posts, '', $var_expire);
	}
		$count = 0;
?>
	<section id="uno">
		<div class="main_banner full_container clearfix">

			<?php 
			if($posts->have_posts()): 
				while($posts->have_posts()):
					$posts->the_post(); 
					setup_postdata($post);
					if($count == 0){
			?>
						<div class="img_frame">
							<img src="<?php echo the_post_thumbnail_url(); ?>" class="post_picture">
							<div class="grid"></div>
						</div>
						<div class="destacado nota1" data-image="<?php echo the_post_thumbnail_url(); ?>">
							<?php $terms = wp_get_post_terms($post->ID, 'noticiasde' ); ?>
								<a href="<?php echo 'noticiasde/'.$terms[0]->slug; ?>">
									<span>
										<?php echo "#".esc_html($terms[0]->name)." "; ?>
									</span>
								</a>
							<a href="<?php the_permalink(); ?>">
								<h3>
									<?php the_title(); ?>
								</h3>
							</a>
						</div>
			
			<?php		
					}else if($count == 1 ){
			?>

						<div class="more_destacado">
							<div class="destacado" data-image="<?php echo the_post_thumbnail_url(); ?>">
								<?php $terms = wp_get_post_terms($post->ID, 'noticiasde' ); ?>
												<a href="<?php echo 'noticiasde/'.$terms[0]->slug; ?>">
													<span class="el_tag">
														<?php 
															if($terms){
																$trm_nme = $terms[0]->name;
																echo "#".$trm_nme;
															} 
														?>
													</span>
												</a>	
								<a href="<?php the_permalink(); ?>">
									<h3 class="el_titulo">
										<?php the_title(); ?>
									</h3>
								</a>
							</div>
				
			<?php		
				}else if($count > 1 ){
			?>	
						<div class="destacado" data-image="<?php echo the_post_thumbnail_url(); ?>">
							<?php $terms = wp_get_post_terms($post->ID, 'noticiasde' ); ?>
											<a href="<?php echo 'noticiasde/'.$terms[0]->slug; ?>">
												<span class="el_tag">
													<?php 
														if($terms){
															$trm_nme = $terms[0]->name;
															echo "#".$trm_nme;
														} 
													?>
												</span>
											</a>	
							<a href="<?php the_permalink(); ?>">
								<h3 class="el_titulo">
									<?php the_title(); ?>
								</h3>
							</a>
						</div>
			
			<?php		
				} $count ++; wp_reset_postdata(); endwhile; endif;
			
			?>
						</div>
		</div>
		<?php get_template_part('templates/barra', 'partidos'); ?>
	</section>



	<section id="dos">
		<div class="container clearfix">
			<div class="left_container">
				<?php 
					$args = array(
								'post_type'=> 'post',
								'posts_per_page'=>5,
								'post_status'=>'publish',
								'orderby'=>'date',
								'order'=>'DESC',
								'post__not_in'=>array($main_post_id)
						);
					$posts = new WP_Query($args);

					if($posts->have_posts()): 
						while($posts->have_posts()):
							$posts->the_post(); 
							setup_postdata($post);
							$tags = get_the_tags();
				?>
							<div class="post clearfix">
								<div class="img_frame clearfix">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
								<?php $terms = wp_get_post_terms($post->ID, 'noticiasde' ); ?>
											<span class="el_tag">
												<a href="<?php echo 'noticiasde/'.$terms[0]->slug; ?>">
													<?php 
														if($terms){
															$trm_nme = $terms[0]->name;
															echo "#".$trm_nme;
														} 
													?>
												</a>
											</span>
								<h3>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h3>
									<div>
										<?php the_excerpt(); ?>
									</div>
							</div>
				<?php
					 
						endwhile; 
						wp_reset_postdata();
					endif;
				?>
				<!-- <div class="ver_mas_home">
					<a href="<?php //echo bloginfo(); ?>/ver-mas">Ver más</a>
				</div> -->
			</div>
		<?php get_sidebar(); ?>
		</div>
	</section>

	<?php get_template_part('templates/barra', 'cerocero'); ?>

	<section id="todos" class="full_container clearfix">

		<?php 
			$args = array(	
						'post_type'=>'episodios',
						'posts_per_page'=>5,
						'post_status'=>'publish',
						'orderby'=>'rand',
						'order'=>'DESC'
						);
			$posts = new WP_Query($args);
		?>
		<div class="grid_videos container clearfix">
			<h2>Blogs</h2>
			<?php pleyers_custom_taxonomy_dropdown( 'shows', 'date', 'DESC', '', 'shows', 'Todos', '' ); ?>

			<div class="videos_stack clearfix">
				<?php
				$count = 0;
					if($posts->have_posts()): 
						while($posts->have_posts()):
							$posts->the_post(); setup_postdata($post);
							if($count == 0 || $count == 3 || $count == 4 || $count == 8) {
					?>
							<div class="video_post same_size clearfix">
								<a href="<?php the_permalink(); ?>">
									<div class="img_frame clearfix">
										<?php the_post_thumbnail(); ?>
									</div>
									<div class="video_info">
										<?php 
											$terms = wp_get_post_terms(); 
											if($terms): foreach($terms as $term):
											?>
												<a href="">
													<span><?php echo esc_html($term->name); ?></span>
												</a>
									<?php endforeach; endif;?>
										<h3><?php the_title(); ?></h3>
									</div>
								</a>
							</div>
						<?php
							}else if($count == 1 || $count == 2 || $count == 6 || $count == 7){
							?>
								<div class="video_post small_video clearfix">
									<a href="<?php the_permalink(); ?>">
										<div class="img_frame clearfix">
											<?php the_post_thumbnail(); ?>
										</div>
										<div class="video_info">
											<?php 
												$terms = wp_get_post_terms(); 
												if($terms): 
													foreach($terms as $term):
												?>
														<a href="">
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
							}
							?>
				<?php			
							$count++;
							
						endwhile;
					endif;						
					?>
			</div>
		</div>
	</section>

	<?php get_template_part('templates/barra', 'blogs'); ?>
	<?php get_template_part('templates/barra', 'jiots'); ?>
<?php get_footer(); ?>