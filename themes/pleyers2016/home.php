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
		$main_post_id = $posts->posts;
		$main_post_id = $main_post_id[0]->ID;
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
					
					<a href="<?php the_permalink(); ?>">
						<h3>
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
										<span >
											<?php echo "#".esc_html($terms[0]->name); ?>
										</span>
									</a>	
					<a href="<?php the_permalink(); ?>">
						<h3>
							<?php the_title(); ?>
						</h3>
					</a>
				</div>
			
			<?php		
				} $count ++; wp_reset_postdata(); endwhile; endif;
			}
			?>
			</div>
		</div>
		<?php get_template_part('templates/barra', 'partidos'); ?>
	</section>

	<section>
		<div class="container clearfix">
			<div class="left_container">
				<?php 
					$types = get_all_posttypes();
					$args = array(
								'post_type'=> $types,
								'posts_per_page'=>10,
								'post_status'=>'publish',
								'orderby'=>'rand',
								'order'=>'DESC',
								'post__not_in'=>array($main_post_id)
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
						</div>
					</a>
					<?php $terms = wp_get_post_terms($post->ID, 'noticiasde' ); ?>
								<a href="<?php echo 'noticiasde/'.$terms[0]->slug; ?>">
									<span>
										<?php 
											if($terms){
												echo "#".esc_html($terms[0]->name);
											} 
										?>
									</span>
								</a>
					<a href="<?php the_permalink(); ?>">
						<h3>
							<?php the_title(); ?>
						</h3>
					</a>
				</div>
				<?php
					wp_reset_postdata(); endwhile; endif;
				?>
			</div>
		<?php get_sidebar(); ?>
		</div>
	</section>
	<?php get_template_part('templates/barra', 'cerocero'); ?>
	<?php get_template_part('templates/barra', 'blogs'); ?>
	<?php get_template_part('templates/barra', 'jiots'); ?>
<?php get_footer(); ?>