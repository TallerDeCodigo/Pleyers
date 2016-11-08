<div class="sidebar clearfix">
	<div class="sprints">
		<?php 

				$args = array(
							'post_type'=>'sprints',
							'posts_per_page'=>-1,
							'post_status'=>'publish',
							'orderby'=>'date',
							'order'=>'DESC'
							);
				$posts = new WP_Query($args);
		?>
				<h3 class="header_sprints">SPRINTS</h3>
				<div class="sprints_container">
					<?php 
						if($posts->have_posts()): 
							while($posts->have_posts()):
								$posts->the_post();
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
			<?php 				
							endwhile; 
						endif; 
			?>
				</div>
	</div>
</div>