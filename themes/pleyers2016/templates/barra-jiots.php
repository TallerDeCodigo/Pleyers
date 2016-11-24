<div class="jiotstv ">
		<div class="container clearfix"> 
			<div class="head_jiots">
				<img src="<?php echo THEMEPATH; ?>/images/jiotstv.png">
				<span>Haciendo del internet un lugar peor</span>
				<a href="http://jiots.tv/" target="_blank">
					<span class="vermas">
						Ver Más
						<img src="<?php echo THEMEPATH; ?>/images/right_arrow_black.png">
					</span>
				</a>
			</div>
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
				// echo "<pre>";
				// 	print_r($posts);
				// echo "</pre>";
				if($posts->have_posts()): 
					while($posts->have_posts()):
						$posts->the_post(); setup_postdata($post);
			?>
				<div class="jiots_post clearfix">
					<a href="<?php the_permalink(); ?>">
						<div class="img_frame clearfix">
							<?php the_post_thumbnail(); ?>
							<!-- <img src=""> -->
						</div>
					</a>
					<a href="<?php the_permalink(); ?>">
							<?php
								$tags = get_the_tags();
								if($tags){
										echo "<span style='display:inline-block;'>";
											echo "#".esc_html($tags[0]->name)." ";
										echo "</span>";
								}
							?>
					</a>
					<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
				</div>
			<?php	
				wp_reset_postdata(); endwhile; endif; 
				}
			?>
		</div>
	</div>