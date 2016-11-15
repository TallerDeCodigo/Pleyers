<section id="apuntes-de-rabona">
	<ul class="barra_blogs">
		<?php 
			$terms = get_terms('shows', array('hide_empty'=>0) );
			$terms_arr = array();
			// echo "<pre>";
			// 	print_r($terms);
			// echo "</pre>";
			foreach($terms as $term):
				$term_name 		= $term->name;
				$class_slg 		= $term->slug;
				$terms_arr[] 	= $term->slug;
				$trm_id 		= $term->term_id;

		?>
		<li class="<?php echo $class_slg; ?> change">
			<?php echo $term_name; ?>
			<input type="hidden" name="nombre" id="<?php echo  $trm_id; ?>" class="chval" value="<?php echo $class_slg; ?>">
		</li>
	<?php endforeach; ?>
	</ul>
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>7,
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
</section>


<section id="cultura-pop">
	<ul class="barra_blogs">
		<?php 
			$terms = get_terms('shows', array('hide_empty'=>0) );
			$terms_arr = array();
			// echo "<pre>";
			// 	print_r($terms);
			// echo "</pre>";
			foreach($terms as $term):
				$term_name 		= $term->name;
				$class_slg 		= $term->slug;
				$terms_arr[] 	= $term->slug;
				$trm_id 		= $term->term_id;

		?>
		<li class="<?php echo $class_slg; ?> change">
			<?php echo $term_name; ?>
			<input type="hidden" name="nombre" id="<?php echo  $trm_id; ?>" class="chval" value="<?php echo $class_slg; ?>">
		</li>
	<?php endforeach; ?>
	</ul>
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>7,
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
</section>


<section id="deportologia">
	<ul class="barra_blogs">
		<?php 
			$terms = get_terms('shows', array('hide_empty'=>0) );
			$terms_arr = array();
			// echo "<pre>";
			// 	print_r($terms);
			// echo "</pre>";
			foreach($terms as $term):
				$term_name 		= $term->name;
				$class_slg 		= $term->slug;
				$terms_arr[] 	= $term->slug;
				$trm_id 		= $term->term_id;

		?>
		<li class="<?php echo $class_slg; ?> change">
			<?php echo $term_name; ?>
			<input type="hidden" name="nombre" id="<?php echo  $trm_id; ?>" class="chval" value="<?php echo $class_slg; ?>">
		</li>
	<?php endforeach; ?>
	</ul>
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>7,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC',
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
</section>


<section id="jiots-tv">
	<ul class="barra_blogs">
		<?php 
			$terms = get_terms('shows', array('hide_empty'=>0) );
			$terms_arr = array();
			// echo "<pre>";
			// 	print_r($terms);
			// echo "</pre>";
			foreach($terms as $term):
				$term_name 		= $term->name;
				$class_slg 		= $term->slug;
				$terms_arr[] 	= $term->slug;
				$trm_id 		= $term->term_id;

		?>
		<li class="<?php echo $class_slg; ?> change">
			<?php echo $term_name; ?>
			<input type="hidden" name="nombre" id="<?php echo  $trm_id; ?>" class="chval" value="<?php echo $class_slg; ?>">
		</li>
	<?php endforeach; ?>
	</ul>
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>7,
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
</section>

<section id="el_pechofrio">
	<ul class="barra_blogs">
		<?php 
			$terms = get_terms('shows', array('hide_empty'=>0) );
			$terms_arr = array();
			// echo "<pre>";
			// 	print_r($terms);
			// echo "</pre>";
			foreach($terms as $term):
				$term_name 		= $term->name;
				$class_slg 		= $term->slug;
				$terms_arr[] 	= $term->slug;
				$trm_id 		= $term->term_id;

		?>
		<li class="<?php echo $class_slg; ?> change">
			<?php echo $term_name; ?>
			<input type="hidden" name="nombre" id="<?php echo  $trm_id; ?>" class="chval" value="<?php echo $class_slg; ?>">
		</li>
	<?php endforeach; ?>
	</ul>
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>9,
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
</section>


<section id="lucha-libre">
	<ul class="barra_blogs">
		<?php 
			$terms = get_terms('shows', array('hide_empty'=>0) );
			$terms_arr = array();
			// echo "<pre>";
			// 	print_r($terms);
			// echo "</pre>";
			foreach($terms as $term):
				$term_name 		= $term->name;
				$class_slg 		= $term->slug;
				$terms_arr[] 	= $term->slug;
				$trm_id 		= $term->term_id;

		?>
		<li class="<?php echo $class_slg; ?> change">
			<?php echo $term_name; ?>
			<input type="hidden" name="nombre" id="<?php echo  $trm_id; ?>" class="chval" value="<?php echo $class_slg; ?>">
		</li>
	<?php endforeach; ?>
	</ul>
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>7,
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
</section>


<section id="tactica">
	<ul class="barra_blogs">
		<?php 
			$terms = get_terms('shows', array('hide_empty'=>0) );
			$terms_arr = array();
			// echo "<pre>";
			// 	print_r($terms);
			// echo "</pre>";
			foreach($terms as $term):
				$term_name 		= $term->name;
				$class_slg 		= $term->slug;
				$terms_arr[] 	= $term->slug;
				$trm_id 		= $term->term_id;

		?>
		<li class="<?php echo $class_slg; ?> change">
			<?php echo $term_name; ?>
			<input type="hidden" name="nombre" id="<?php echo  $trm_id; ?>" class="chval" value="<?php echo $class_slg; ?>">
		</li>
	<?php endforeach; ?>
	</ul>
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>7,
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
</section>


<section id="tirando-guante">
	<ul class="barra_blogs">
		<?php 
			$terms = get_terms('shows', array('hide_empty'=>0) );
			$terms_arr = array();
			// echo "<pre>";
			// 	print_r($terms);
			// echo "</pre>";
			foreach($terms as $term):
				$term_name 		= $term->name;
				$class_slg 		= $term->slug;
				$terms_arr[] 	= $term->slug;
				$trm_id 		= $term->term_id;

		?>
		<li class="<?php echo $class_slg; ?> change">
			<?php echo $term_name; ?>
			<input type="hidden" name="nombre" id="<?php echo  $trm_id; ?>" class="chval" value="<?php echo $class_slg; ?>">
		</li>
	<?php endforeach; ?>
	</ul>
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>7,
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
</section>


<section id="turismo-deportivo">
	<ul class="barra_blogs">
		<?php 
			$terms = get_terms('shows', array('hide_empty'=>0) );
			$terms_arr = array();
			// echo "<pre>";
			// 	print_r($terms);
			// echo "</pre>";
			foreach($terms as $term):
				$term_name 		= $term->name;
				$class_slg 		= $term->slug;
				$terms_arr[] 	= $term->slug;
				$trm_id 		= $term->term_id;

		?>
		<li class="<?php echo $class_slg; ?> change">
			<?php echo $term_name; ?>
			<input type="hidden" name="nombre" id="<?php echo  $trm_id; ?>" class="chval" value="<?php echo $class_slg; ?>">
		</li>
	<?php endforeach; ?>
	</ul>
	<?php 
		$args = array(	
					'post_type'=>'episodios',
					'posts_per_page'=>7,
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
</section>