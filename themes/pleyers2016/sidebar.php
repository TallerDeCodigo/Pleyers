<div class="sidebar clearfix">
	<div class="sprints">
		<?php 
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$args = array(
							'post_type'=>'sprints',//cambiar por el posttype -> sprints
							'posts_per_page'=>10,
							'post_status'=>'publish',
							'orderby'=>'date',
							'order'=>'DESC',
							'paged'=>$paged
							);
				$posts = new WP_Query($args);
				date_default_timezone_set('America/Mexico_City');
				$hoy = date('U');
		?>
				<div>
					<img class="header_sprints" src="<?php echo THEMEPATH; ?>images/venado-cabeza.svg" width="30px" height="30px">
					<a href="<?php bloginfo('url'); ?>/sprints">
						<h3 class="header_sprints">SPRINTS</h3>
					</a>
				</div>
				<div class="sprints_container">
					<?php 
						if($posts->have_posts()): 
							while($posts->have_posts()):
								$posts->the_post();
								$post_date = get_the_date('U');

								$time_ago = human_time_diff($post_date, $hoy);
								$time_ago = preg_replace('/\s+/', '', $time_ago);
								$time_ago = substr($time_ago, 0, 2);
								$img_size = get_post_meta($post->ID, 'sprint_type_meta', true);

					?>
					<div class="formato_b sprints_post clearfix">
						<span class="post_time"><?php  echo $time_ago; ?></span>
						<div class="sprints_post_content">
								<?php 
									if(has_post_thumbnail() ){
									?>
									<div class="<?php echo $img_size; ?>">
										<a href="<?php the_permalink(); ?>">
											<div class="img_frame">
												<?php the_post_thumbnail(); ?>
											</div>
										</a>
										<a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
										<?php the_excerpt(); ?>
									</div>
								<?php 
									}else{
									?>
										<div><?php the_excerpt(); ?></div>
									<?php	
									} 
								?>
						</div>
					</div>
			<?php 				
							endwhile; 
						endif; 
			?>	
			<?php if ($posts->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
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
			<?php } ?>
				</div>
	</div>
</div>