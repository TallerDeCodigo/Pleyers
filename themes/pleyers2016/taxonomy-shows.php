<?php 
	get_header(); 
	$objeto = get_queried_object();
	$tax = $objeto->taxonomy;
	$slug = $objeto->slug;
	$show_name = $objeto->name;

	// echo '<pre>';
	// print_r($objeto);
	// echo '</pre>';
?>
<section class="tax_show">
	<div class="tax_show_top clearfix">
		<h2 id="show_name">
			<?php echo $show_name; ?>
		</h2>
		<?php 
			if( get_post_meta($post->ID, 'eg_sources_youtube', true) ){ 
				$videoid = get_post_meta($post->ID, 'eg_sources_youtube', true);
				echo '<iframe width="1024" height="576" src="https://www.youtube.com/embed/'.$videoid.'" frameborder="0" allowfullscreen></iframe>';
			?>
			<div class="img_play">
				<img src="<?php echo THEMEPATH; ?>/images/play.svg">
			</div>
		<?php		
				}else{ 

			 	the_post_thumbnail('full'); 

				} 
			?>
		<div class="titulo">
				<?php
					$tags = get_the_tags();
					if($tags): foreach($tags as $tag): endforeach; 
				?>
						<a href="<?php echo bloginfo('url').'/tag/'.$tag->slug ?>">
							<span>
								<?php echo "#".$tag->name." "; ?>
							</span>
						</a>
				<?php endif; ?>

			<h2>
				<?php the_title(); ?>
			</h2>	
		</div>
	</div><!--END TAX SHOW TOP-->






	<?php
		$types = get_all_posttypes();
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
					'post_type'=>$types,
					'posts_per_page'=>5,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC',
					'paged'=>$paged,
					'tax_query'=>array(
									array(
										'taxonomy'=>$tax,
										'field'=>'slug',
										'terms'=>$slug
										)
									)
			);
		$posts = new WP_Query($args);
		// echo "<pre>";
		// 	print_r($posts);
		// echo "</pre>";
	?>

		<div class="grid_videos container clearfix">

			<div class="videos_stack clearfix">
				<?php
				$count = 0;
					if($posts->have_posts()): 
						while($posts->have_posts()):
							$posts->the_post(); setup_postdata($post);
							if($count == 0 || $count == 3 || $count == 4 || $count == 8) {
					?>
							<div class="video_post same_size clearfix">
								<a href="<?php the_permalink(); ?>">
									<div class="img_frame clearfix">
										<?php the_post_thumbnail(); ?>
									</div>
									<div class="video_info">
										<?php 
											$terms = wp_get_post_terms(); 
											if($terms): foreach($terms as $term):
											?>
												<a href="<?php the_permalink(); ?>">
													<span><?php echo esc_html($term->name); ?></span>
												</a>
									<?php endforeach; endif;?>
										<h3><?php the_title(); ?></h3>
									</div>
								</a>
							</div>
						<?php
							}else if($count == 1 || $count == 2 || $count == 6 || $count == 7){
							?>
								<div class="video_post small_video clearfix">
									<a href="<?php the_permalink(); ?>">
									<div class="img_frame clearfix">
										<?php the_post_thumbnail(); ?>
									</div>
									<div class="video_info">
										<?php 
											$terms = wp_get_post_terms(); 
											if($terms): foreach($terms as $term):
											?>
												<a href="">
													<span><?php echo esc_html($term->name); ?></span>
												</a>
									<?php endforeach; endif;?>
										<h3><?php the_title(); ?></h3>
									</div>
								</a>
								</div>
						<?php 	
							}
							?>
				<?php			
							$count++;
							
						endwhile;
					endif;						
					?>
			</div>
				<?php 
					if (function_exists('custom_pagination')) {
					   	custom_pagination($posts->max_num_pages,"9",$paged);
					}
					wp_reset_postdata();
				?>
		</div>	
</section>


<?php get_footer(); ?>