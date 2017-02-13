<div class="sidebar clearfix">
	<div class="sprints">
		<h3 class="header_sprints">
			<a href="<?php bloginfo('url'); ?>/sprints">
				Sprints
			</a>
		</h3>
		<div class="sprints_container">
			<?php 
				$args = array(
							'post_type'=>'sprints',
							'posts_per_page'=>10,
							'post_status'=>'publish',
							'orderby'=>'date',
							'order'=>'DESC',
							);
				$posts = new WP_Query($args);
				date_default_timezone_set('America/Mexico_City');
				$hoy = date('U');

				if($posts->have_posts()): 
					while($posts->have_posts()):
						$posts->the_post();
						setup_postdata($post);
						$post_date = get_the_date('U');
						$time_ago = human_time_diff($post_date, $hoy);
						$unwanted_array = array('minuto'=>'m', 'hora'=>'h', 'día'=>'d', 'semana'=>'s', 'mes'=>'M', 'año'=>'A',
	 						 'minutos'=>'m', 'horas'=>'h', 'días'=>'d', 'semanas'=>'s', 'meses'=>'M', 'años'=>'A',
	 						 'min'=>'m', 'hour'=>'h', 'day'=>'d', 'week'=>'s', 'month'=>'M', 'year'=>'A',
	 						 'mins'=>'m', 'hours'=>'h', 'days'=>'d', 'weeks'=>'s', 'months'=>'M', 'years'=>'A', ' '=>'');
						$time_ago = strtr( $time_ago, $unwanted_array );
						$img_size = get_post_meta($post->ID, 'sprint_type_meta', true);

					if($img_size == 'foto_grande'){
			?>
			<div class="formato_a sprints_post clearfix">
			<a href="<?php the_permalink(); ?>" class="link_url" data="<?php echo $post->ID; ?>"></a>
				<span class="post_time"><?php  echo $time_ago; ?></span>
				<div class="sprints_post_content">
					<a href="<?php bloginfo('url'); ?>/sprints/<?php echo "#".$post->ID."h"; ?>"><div class="img_frame"><?php the_post_thumbnail('sprints_grande'); ?></div></a>
					<a href="<?php bloginfo('url'); ?>/sprints/<?php echo "#".$post->ID."h"; ?>"><p><?php the_excerpt(); ?></p></a>
				</div>
			</div>
			<?php 
					}else if($img_size == 'foto_chica'){
			?>
			<div class="formato_b sprints_post clearfix">
			<a href="<?php the_permalink(); ?>" class="link_url" data="<?php echo $post->ID; ?>"></a>
				<span class="post_time"><?php  echo $time_ago; ?></span>
				<div class="sprints_post_content">
					<a href="<?php bloginfo('url'); ?>/sprints/<?php echo "#".$post->ID."h"; ?>"><div class="img_frame"><?php the_post_thumbnail('sprints_chica'); ?></div></a>
					<a href="<?php bloginfo('url'); ?>/sprints/<?php echo "#".$post->ID."h"; ?>"><p><?php the_excerpt(); ?></p></a>
				</div>
			</div>
			<?php	
					}else{
			?>
			<div class="formato_b sprints_post clearfix">
			<a href="<?php the_permalink(); ?>" class="link_url" data="<?php echo $post->ID; ?>"></a>
				<span class="post_time"><?php  echo $time_ago; ?></span>
				<div class="sprints_post_content">
					<a href="<?php bloginfo('url'); ?>/sprints/<?php echo "#".$post->ID."h"; ?>"><p><?php the_excerpt(); ?></p></a>
				</div>
			</div>
			<?php 	
					}			
					endwhile; 
					wp_reset_postdata();
				endif; 
			?>	
		</div>
		<a href="<?php bloginfo('url'); ?>/sprints" class="see_more gray">Ver más</a>
	</div>
</div>