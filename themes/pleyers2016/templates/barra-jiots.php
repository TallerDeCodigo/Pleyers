<section class="jiotstv">
		<div class="container clearfix">
			<h2>Jiots.TV</h2>
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
						<span>
							<?php
								$tags = get_the_tags();
								if($tags){
									foreach($tags as $tag){
										echo "#".esc_html($tag->name)." ";
									}
								}
							?>
						</span>
					</a>
					<a href=""><h3><?php the_title(); ?></h3></a>
				</div>
			
			<?php	
				wp_reset_postdata(); endwhile; endif; 
				}
			?>
			<!-- <div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div>
			<div class="jiots_post clearfix">
				<a href="">
					<div class="img_frame clearfix">
						<img src="">
					</div>
				</a>
				<a href=""><span>#Baseball</span></a>
				<a href=""><h3>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Integer</h3></a>
			</div> -->
		</div>
	</section>