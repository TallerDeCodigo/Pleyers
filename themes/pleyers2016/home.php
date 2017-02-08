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
		$aidi_preserve = array();
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
					<div class="full_frame">
						<div class="img_frame">
							<img src="<?php echo the_post_thumbnail_url('banner'); ?>" class="post_picture">
						</div>
						<div class="destacado nota1" data-image="<?php echo the_post_thumbnail_url('banner'); ?>">
							<?php $terms = wp_get_post_terms($post->ID, 'noticiasde' ); ?>
								<a href="<?php bloginfo('url'); echo '/noticiasde/'.$terms[0]->slug.'/'; ?>">
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
					</div>
					<div class="more_destacado">
		
		<?php		
				}else {
		?>
						<div class="destacado" data-image="<?php echo the_post_thumbnail_url('banner'); ?>">
						<div class="img_load"><img src="<?php echo the_post_thumbnail_url('banner'); ?>"></div>
							<?php $terms = wp_get_post_terms($post->ID, 'noticiasde' ); ?>
											<span>
												<a href="<?php bloginfo('url'); echo '/noticiasde/'.$terms[0]->slug.'/'; ?>">
													<?php 
														if($terms){
															$trm_nme = $terms[0]->name;
															echo "#".$trm_nme;
														} 
													?>
												</a>	
											</span>
							<a href="<?php the_permalink(); ?>">
								<h3>
									<?php the_title(); ?>
								</h3>
							</a>
						</div>
		<?php		
			} array_push($aidi_preserve, $post->ID); $count ++; wp_reset_postdata(); endwhile; endif;
		
		?>
					</div>
		</div>
		<?php get_template_part('templates/barra', 'partidos'); ?>
	</section>

	<section id="dos">
		<div class="container clearfix">
			<?php get_sidebar(); ?>
			<div class="left_container">
				<?php 
					$args = array(
								'post_type'=> 'post',
								'posts_per_page'=>5,
								'post_status'=>'publish',
								'orderby'=>'date',
								'order'=>'DESC',
								'post__not_in'=>$aidi_preserve
						);
					$posts = new WP_Query($args);

					if($posts->have_posts()): 
						while($posts->have_posts()):
							$posts->the_post(); 
							setup_postdata($post);
							$terms = wp_get_post_terms($post->ID, 'noticiasde' );
				?>
					<div class="post clearfix">
						<a href="<?php the_permalink(); ?>">
							<div class="img_frame clearfix">
								<?php the_post_thumbnail('poster'); ?>
							</div>
						</a>
						<span>
							<a href="<?php bloginfo('url'); echo '/noticiasde/'.$terms[0]->slug.'/'; ?>">
								<?php 
									if($terms){
										$trm_nme = $terms[0]->name;
										echo "#".$trm_nme;
									} 
								?>
							</a>
						</span>
						<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
						<a class="the_excerpt" href="<?php the_permalink(); ?>"><p><?php the_excerpt(); ?></p></a>
					</div>

				<?php
						endwhile; 
						wp_reset_postdata();
					endif;
				?>
					<div class="post clearfix">
						<a class="load_more" href="<?php bloginfo('url'); ?>/historias/"><h3>Ver más historias <span>&raquo;</span></h3></a>
					</div>
			</div>
		</div>
	</section>

	<?php get_template_part('templates/barra', 'cerocero'); ?>

	<section id="todos">
		<div class="grid_videos container clearfix">
			<h2>Blogs</h2>
			<?php

				$terms = get_terms( array( 
				    'taxonomy' => 'shows',
				    'hide_empty' => 1
				) );

				if ( $terms ) {
			?>
				<div class="dropdown">
				<button class="dropbtn">Todos</button>
				  <div id="myDropdown" class="dropdown-content">
				    <a data="todos_blogs" class="selected">Todos</a>
			<?php
					foreach ( $terms as $term ) {
			?>
					<a data="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
			<?php
					}
				}
			?>
				  </div>
				</div>
				<div id="todos_blogs" class="videos_stack clearfix">
			<?php

				$args = array(	
							'post_type'=>'episodios',
							'posts_per_page'=>9,
							'post_status'=>'publish',
							'orderby'=>'rand',
							'order'=>'DESC'
							);
				$posts = new WP_Query($args);

				$count = 0;
					if($posts->have_posts()): 
						while($posts->have_posts()):
							$posts->the_post(); setup_postdata($post);
							if($count == 0 || $count == 3 || $count == 4 || $count == 8) {
				?>
					<div class="video_post is_video big_video clearfix">
						<a href="<?php the_permalink(); ?>">
							<div class="img_frame clearfix">
								<?php the_post_thumbnail('grid'); ?>
							</div>
							<div class="video_info">
								<?php 
									$terms = wp_get_post_terms(); 
									if($terms): 
										foreach($terms as $term):
								?>
									<a href="<?php echo 'noticiasde/'.$terms[0]->slug; ?>">
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
							}else if($count == 1 || $count == 2 || $count == 6 || $count == 7){
				?>
					<div class="video_post is_video small_video clearfix">
						<a href="<?php the_permalink(); ?>">
							<div class="img_frame clearfix">
								<?php the_post_thumbnail('grid'); ?>
							</div>
							<div class="video_info">
								<?php 
									$terms = wp_get_post_terms(); 
									if($terms): 
										foreach($terms as $term):
								?>
									<a href="<?php echo'noticiasde/'.$terms->slug; ?>">
										<span><?php echo $term->name; ?></span>
									</a>
								<?php 
										endforeach; 
									endif;
								?>
								<h3>
									<?php the_title(); ?>
								</h3>
							</div>
						</a>
					</div>
				<?php 	
							}

						$count++;	
						endwhile;
					endif;						
					?>
			</div>
		<?php get_template_part('templates/barra', 'blogs'); ?>
		</div>
	</section>

	<?php get_template_part('templates/barra', 'jiots'); ?>

<?php get_footer(); ?>