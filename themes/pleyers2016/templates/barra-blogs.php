<div id="apuntes-de-rabona" class="full_container">

	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>5,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC',
					'tax_query'=>array(
									array(
										'taxonomy'=>'shows',
										'field'=> 'slug',
										'terms'=>'apuntes-de-rabona'										)
									)
					);
		$posts = new WP_Query($args);
	?>
	<div class="grid_videos container clearfix">
		<h2>Blogs</h2>
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
								<a href="">
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
						}
						?>
			<?php			
						$count++;
						
					endwhile;
				endif;						
				?>
		</div>
	</div>
</div>


<div id="cultura-pop" class="full_container">

	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>5,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC',
					'tax_query'=>array(
									array(
										'taxonomy'=>'shows',
										'field'=> 'slug',
										'terms'=>'cultura-pop'										)
									)
					);
		$posts = new WP_Query($args);
	?>
	<div class="grid_videos container clearfix">
		<h2>Blogs</h2>
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
								<a href="">
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
						}
						?>
			<?php			
						$count++;
						
					endwhile;
				endif;						
				?>
		</div>
	</div>
</div>


<div id="deportologia" class="full_container">
	
	<?php 
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>5,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC',
					'paged'=>$paged,
					'tax_query'=>array(
									array(
										'taxonomy'=>'shows',
										'field'=> 'slug',
										'terms'=>'deportologia'										)
									)
					);
		$posts = new WP_Query($args);
	?>
	<div class="grid_videos container clearfix">
		<h2>Blogs</h2>
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
								<a href="">
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
						}
						?>
			<?php			
						$count++;
						
					endwhile;
				endif;						
				?>
		</div>
	</div>
	<nav class="prev-next-posts">

	    <div class="prev-posts-link">
	    	<?php //next_post_link('Ver más','<img src="images/right_arrow.png"/>'); ?>
	      <?php echo get_next_posts_link( 'Ver más <img src="wp-content/themes/pleyers2016/images/right_arrow.png"/>', $posts->max_num_pages ); // display older posts link ?>
	      <!-- <img src="<?php //echo THEMEPATH; ?>/images/right_arrow.png"> -->
	    </div>

	    <div class="next-posts-link">
	      <?php echo get_previous_posts_link( 'Regresar' ); // display newer posts link ?>
	    </div>

	</nav>
</div>


<div id="jiots-tv" class="full_container">
	
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>5,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC',
					'tax_query'=>array(
									array(
										'taxonomy'=>'shows',
										'field'=> 'slug',
										'terms'=>'jiots-tv'										)
									)
					);
		$posts = new WP_Query($args);
	?>
	<div class="grid_videos container clearfix">
		<h2>Blogs</h2>
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
								<a href="">
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
						}
						?>
			<?php			
						$count++;
						
					endwhile;
				endif;						
				?>
		</div>
	</div>
</div>

<div id="el_pechofrio" class="full_container">

	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>5,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC',
					'tax_query'=>array(
									array(
										'taxonomy'=>'shows',
										'field'=> 'slug',
										'terms'=>'el_pechofrio'										)
									)
					);
		$posts = new WP_Query($args);
	?>
	<div class="grid_videos container clearfix">
		<h2>Blogs</h2>
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
								<a href="">
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
						}
						?>
			<?php			
						$count++;
						
					endwhile;
				endif;						
				?>
		</div>
	</div>
</div>


<div id="lucha-libre" class="full_container">
	
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>5,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC',
					'tax_query'=>array(
									array(
										'taxonomy'=>'shows',
										'field'=> 'slug',
										'terms'=>'lucha-libre'										)
									)
					);
		$posts = new WP_Query($args);
	?>
	<div class="grid_videos container clearfix">
		<h2>Blogs</h2>
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
								<a href="">
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
						}
						?>
			<?php			
						$count++;
						
					endwhile;
				endif;						
				?>
		</div>
	</div>
</div>


<div id="tactica" class="full_container">
	
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>5,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC',
					'tax_query'=>array(
									array(
										'taxonomy'=>'shows',
										'field'=> 'slug',
										'terms'=>'tactica'										)
									)
					);
		$posts = new WP_Query($args);
	?>
	<div class="grid_videos container clearfix">
		<h2>Blogs</h2>
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
								<a href="">
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
						}
						?>
			<?php			
						$count++;
						
					endwhile;
				endif;						
				?>
		</div>
	</div>
</div>


<div id="tirando-guante" class="full_container">
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>5,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC',
					'tax_query'=>array(
									array(
										'taxonomy'=>'shows',
										'field'=> 'slug',
										'terms'=>'tirando-guante'										)
									)
					);
		$posts = new WP_Query($args);
	?>
	<div class="grid_videos container clearfix">
		<h2>Blogs</h2>
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
								<a href="">
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
						}
						?>
			<?php			
						$count++;
						
					endwhile;
				endif;						
				?>
		</div>
	</div>
</div>


<div id="turismo-deportivo" class="full_container">
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>5,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC',
					'tax_query'=>array(
									array(
										'taxonomy'=>'shows',
										'field'=> 'slug',
										'terms'=>'turismo-deportivo'										)
									)
					);
		$posts = new WP_Query($args);
	?>
	<div class="grid_videos container clearfix">
		<h2>Blogs</h2>
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
								<a href="">
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
						}
						?>
			<?php			
						$count++;
						
					endwhile;
				endif;						
				?>
		</div>
	</div>
</div>