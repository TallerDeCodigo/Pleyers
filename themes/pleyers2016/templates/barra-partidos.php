<?php 
		$args = array(
					'post_type'=>'calendarios',
					'posts_per_page'=>8,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC'
				);
		$posts = new WP_Query($args);
		?>
	<div class="match_calendar full_container">
		<div class="sport_calendar">
			Calendario Deportivo
		</div>	
		<ul class="carousel clearfix">
	<?php	
		if($posts->have_posts()):
			while($posts->have_posts()):
				$posts->the_post();
				setup_postdata($post);
				$fecha_match = get_post_meta($post->ID, '_fecha_match_meta', true);
				$hora_match = get_post_meta($post->ID, '_hora_match_meta', true);
				$liga_match = get_post_meta($post->ID, '_liga_match_meta', true);
				$team1_match = get_post_meta($post->ID, '_equipo_uno_match_meta', true);	
				$team2_match = get_post_meta($post->ID, '_equipo_dos_match_meta', true);
				$content = get_the_content();
				$exploded = multiexplode(array( '"', ',' ), $content);
				$clean_arr = array_diff_key($exploded, [0=>'xy', 3=>'xy'] );
	?>
					<li class="bx_sl_li clearfix">
						<div class="single_match">
							<div class="inner_li">
								<?php echo "<span>".$liga_match."</span>"." ".$fecha_match." @ ".$hora_match; ?>
							</div>
							<div class="inner_li">
								<div class="escudo_partido">
									<img src="<?php echo wp_get_attachment_url($clean_arr[1]); ?>">
								</div>
								<span class="team_name">
									<?php echo $team1_match; ?>
								</span>
							</div>
							<div class="inner_li">
								<div class="escudo_partido">
									<img src="<?php echo wp_get_attachment_url($clean_arr[2]); ?>">
								</div>
								<span class="team_name">
									<?php echo $team2_match; ?>
								</span>
							</div>
						</div>
					</li>
	<?php
			wp_reset_postdata();
			endwhile;
		endif;	
	?>
		</ul>
	</div>