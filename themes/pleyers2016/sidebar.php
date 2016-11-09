<div class="sidebar clearfix">
	<div class="sprints">
		<?php 

				$args = array(
							'post_type'=>'post',//cambiar por el posttype -> sprints
							'posts_per_page'=>15,
							'post_status'=>'publish',
							'orderby'=>'date',
							'order'=>'DESC'
							);
				$posts = new WP_Query($args);
				$hoy = date('U');
		?>
				<h3 class="header_sprints">SPRINTS</h3>
				<div class="sprints_container">
					<?php 
						if($posts->have_posts()): 
							while($posts->have_posts()):
								$posts->the_post();
								$post_date = get_the_date('U');
								$resta = $hoy - $post_date;
								$segundos = $resta;
								$minutos = $segundos / 60;
								$horas = $minutos / 60;
								$dias = $horas / 24;
								$meses = $dias / 30;

								//echo "m> ".round($minutos)." h> ".round($horas)." d> ".round($dias)." M> ".round($meses)."<br>";
								//echo date('F j, Y', $post_date);
							if($segundos > 60 && $minutos < 60){
								$hace = round($minutos)."m";
							}else if($minutos > 60 && $horas < 24){
								$hace = round($horas)."h";
							}else if($horas > 24 && $dias < 30){
								$hace = round($dias)."d";
							}else if($dias > 30 && $meses < 12){
								$hace = round($meses)."M";
							}
								

					?>
					<div class="formato_b sprints_post clearfix">
						<span class="post_time"><?php  echo $hace; ?></span>
						<div class="sprints_post_content">
							<a href="">
								<div class="img_frame">
									<?php the_post_thumbnail(); ?>
									<!-- <img src="images/post.png" /> -->
								</div>
							</a>
							<a href="<?php the_permalink(); ?>">
								<p>
									<?php the_title(); //the_content(); ?>
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