<section class="jiotstv">
	<div class="container clearfix">
		<a href="<?php bloginfo('url'); ?>/shows/jiots-tv/"><img class="section_logo" src="<?php echo THEMEPATH; ?>images/sports.png"></a>
		<a href="<?php bloginfo('url'); ?>/shows/jiots-tv/" class="see_more black">Ver más</a>
	</div>
	<div class="container clearfix">
	<?php
		$var_expire = 300;
		$query = wp_cache_get('jiots_cached');
		if($query == false){

		$args = array(
					'post_type'=>'episodios',
					'posts_per_page'=>8,
					'post_status'=>'piublish',
					'orderby'=>'data',
					'order'=>'DESC',
					'tax_query'=>array(
									array(
										'taxonomy'=>'shows',
										'field'=>'slug',
										'terms'=>'jiots-tv'
										)
									)
					);
		$posts = new WP_Query($args);
		wp_cache_set('jiots_cached', $posts, '', $var_expire);
		}

		if($posts->have_posts()): 
			while($posts->have_posts()):
				$posts->the_post(); setup_postdata($post);
	?>
		<div class="jiots_post clearfix">
			<a href="<?php the_permalink(); ?>">
				<div class="img_frame clearfix">
					<?php the_post_thumbnail('sprints_grande'); ?>
				</div>
			</a>
			<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
		</div>
	<?php	
			endwhile;
			wp_reset_postdata(); 
		endif; 
	?>
	</div>
</section>