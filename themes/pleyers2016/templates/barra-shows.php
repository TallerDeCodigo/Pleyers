<div class="sidebar clearfix">
	<div class="sprints">
		<?php 
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$args = array(
							'post_type'=>'episodios',
							'posts_per_page'=>5,
							'post_status'=>'publish',
							'orderby'=>'date',
							'order'=>'DESC',
							'paged'=>$paged
							);
				$posts = new WP_Query($args);

				date_default_timezone_set('America/Mexico_City');
				$hoy = date('U');
		?>
				<div class="sprints_container">
					<?php 
						if($posts->have_posts()): 
							while($posts->have_posts()):
								$posts->the_post();
								$post_date = get_the_date('U');

								$time_ago = human_time_diff($post_date, $hoy);
								$unwanted_array = array('minuto'=>'m', 'hora'=>'h', 'día'=>'d', 'semana'=>'s', 'mes'=>'M', 'año'=>'A',
			 						 'minutos'=>'m', 'horas'=>'h', 'días'=>'d', 'semanas'=>'s', 'meses'=>'M', 'años'=>'A',
			 						 'min'=>'m', 'hour'=>'h', 'day'=>'d', 'week'=>'s', 'month'=>'M', 'year'=>'A',
			 						 'mins'=>'m', 'hours'=>'h', 'days'=>'d', 'weeks'=>'s', 'months'=>'M', 'years'=>'A', ' '=>'');
								$time_ago = strtr( $time_ago, $unwanted_array );
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
										<a href="<?php the_permalink(); ?>"><p><?php the_title(); //the_content(); ?> </p></a>
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
			<?php if ($posts->max_num_pages > 1) { ?>
				  	<nav class="prev-next-posts">

					    <div class="prev-posts-link">
					      <?php echo get_next_posts_link( 'Ver más', $posts->max_num_pages ); // display older posts link ?>
					      <img src="<?php echo THEMEPATH; ?>/images/right_arrow.png">
					    </div>

					    <div class="next-posts-link">
					      <?php echo get_previous_posts_link( '' ); // display newer posts link ?>
					    </div>

				  	</nav>
			<?php } ?>
				</div>
	</div>
</div>