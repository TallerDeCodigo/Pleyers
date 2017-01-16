<section id="apuntes-de-rabona" class="full_container"  >

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
		<?php pleyers_custom_taxonomy_dropdown( 'shows', 'date', 'DESC', '', 'shows', 'Apuntes de rabona', '' ); ?>
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
											<a href="<?php the_permalink(); ?>">
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
										if($terms): foreach($terms as $term):
										?>
											<a href="<?php the_permalink(); ?>">
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
</section>

<section id="cultura-pop" class="full_container" >

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
		<?php pleyers_custom_taxonomy_dropdown( 'shows', 'date', 'DESC', '', 'shows', 'Cultura pop', '' ); ?>
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
											<a href="<?php the_permalink(); ?>">
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
										if($terms): foreach($terms as $term):
										?>
											<a href="<?php the_permalink(); ?>">
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
</section>


<section id="deportologia" class="full_container" >
	
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
		<?php pleyers_custom_taxonomy_dropdown( 'shows', 'date', 'DESC', '', 'shows', 'Deportología', '' ); ?>
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
											<a href="<?php the_permalink(); ?>">
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
										if($terms): foreach($terms as $term):
										?>
											<a href="<?php the_permalink(); ?>">
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
</section>


<section id="jiots-tv" class="full_container" >
	
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
		<?php pleyers_custom_taxonomy_dropdown( 'shows', 'date', 'DESC', '', 'shows', 'El Jiots sports', '' ); ?>
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
											<a href="<?php the_permalink(); ?>">
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
										if($terms): foreach($terms as $term):
										?>
											<a href="<?php the_permalink(); ?>">
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
</section>

<section id="el_pechofrio" class="full_container" >

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
		<?php pleyers_custom_taxonomy_dropdown( 'shows', 'date', 'DESC', '', 'shows', 'El pecho frío', '' ); ?>
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
											<a href="<?php the_permalink(); ?>">
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
										if($terms): foreach($terms as $term):
										?>
											<a href="<?php the_permalink(); ?>">
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
</section>


<section id="lucha-libre" class="full_container" >
	
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
		<?php pleyers_custom_taxonomy_dropdown( 'shows', 'date', 'DESC', '', 'shows', 'Lucha libre', '' ); ?>
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
											<a href="<?php the_permalink(); ?>">
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
										if($terms): foreach($terms as $term):
										?>
											<a href="<?php the_permalink(); ?>">
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
</section>


<section id="tactica" class="full_container" >
	
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
		<?php pleyers_custom_taxonomy_dropdown( 'shows', 'date', 'DESC', '', 'shows', 'Táctica', '' ); ?>
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
											<a href="<?php the_permalink(); ?>">
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
										if($terms): foreach($terms as $term):
										?>
											<a href="<?php the_permalink(); ?>">
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
</section>


<section id="tirando-guante" class="full_container" >
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
		<?php pleyers_custom_taxonomy_dropdown( 'shows', 'date', 'DESC', '', 'shows', 'Tirando guante ', '' ); ?>
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
											<a href="<?php the_permalink(); ?>">
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
										if($terms): foreach($terms as $term):
										?>
											<a href="<?php the_permalink(); ?>">
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
</section>


<section id="turismo-deportivo" class="full_container" >
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
		<?php pleyers_custom_taxonomy_dropdown( 'shows', 'date', 'DESC', '', 'shows', 'Turismo deportivo', '' ); ?>
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
											<a href="<?php the_permalink(); ?>">
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
										if($terms): foreach($terms as $term):
										?>
											<a href="<?php the_permalink(); ?>">
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
</section>

<section id="erizos" class="full_container" >

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
										'terms'=>'erizos'										)
									)
					);
		$posts = new WP_Query($args);
	?>
	<div class="grid_videos container clearfix">
		<h2>Blogs</h2>
		<?php pleyers_custom_taxonomy_dropdown( 'shows', 'date', 'DESC', '', 'shows', 'Erizos', '' ); ?>
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
											<a href="<?php the_permalink(); ?>">
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
										if($terms): foreach($terms as $term):
										?>
											<a href="<?php the_permalink(); ?>">
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
</section>