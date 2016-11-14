<section>
	<?php 
		$args = array(
					'post_type'=>'calendarios',
					'posts_per_page'=>4,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC'
				);
		$posts = new WP_Query($args);
	?>
	
	<nav class="match_calendar">
		<ul class="match_list">
			<?php 
				if($posts->have_posts()): while($posts->have_posts()):
					$posts->the_post(); setup_postdata($post);
					$fecha_match = get_post_meta($post->ID, '_fecha_match_meta', true);
					$hora_match = get_post_meta($post->ID, '_hora_match_meta', true);
					$liga_match = get_post_meta($post->ID, '_liga_match_meta', true);
					$team1_match = get_post_meta($post->ID, '_equipo_uno_match_meta', true);	
					$team2_match = get_post_meta($post->ID, '_equipo_dos_match_meta', true);
					$content = get_the_content();
					$exploded = multiexplode(array( '"', ',' ), $content);
					$clean_arr = array_diff_key($exploded, [0=>'xy', 3=>'xy'] );
			?>
			<li>
				<div>
					<?php echo "<span>".$liga_match."</span>"." ".$fecha_match." @ ".$hora_match; ?>
				</div>
				<div>
					<img src="<?php echo wp_get_attachment_url($clean_arr[1]); ?>">
					<?php echo $team1_match; ?>
				</div>
				<div>
					<img src="<?php echo wp_get_attachment_url($clean_arr[2]); ?>">
					<?php echo $team2_match; ?>
				</div>
			</li>
			<?php wp_reset_postdata(); endwhile; endif; ?>
		</ul>
	</nav>
</section>