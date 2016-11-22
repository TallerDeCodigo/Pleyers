<?php 
	get_header(); 
	$posts = get_queried_object();
	// echo "<pre>";
	// 	print_r($posts->ID);
	// echo "</pre>";
	$pId = $post->ID;
	$terms = get_the_terms($post->ID, 'shows'); 
	$term_slug;
	foreach($terms as $term){
		$term_slug = $term->slug;
	}
?>
<div id="contentsWrapper" class="clearfix full_container">

	<div class="content_col  inline">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
		<div class="single_content">
			<div class="addthis_inline_share_toolbox"></div>
			<div>
				<?php 
					$tags = get_the_tags();
					if($tags){
						foreach($tags as $tag):
							$tag_slug = $tag->slug;
							$tag_nme = $tag->name;
						endforeach;	
							echo "<span class='tags'>#".$tag_nme." "."</span>";
					}
				?>

				<a href="<?php the_permalink(); ?>">
					<h2>
						<?php the_title(); ?>
					</h2>
				</a>
				<span class="the_date">
					<?php echo get_the_date('H:m - d/j/Y'); ?>
				</span>

			</div>
			<?php 
				$contenido = get_the_content();
				the_content(); 
				if($contenido){
					//echo '<div class="addthis_sharing_toolbox"></div>';
				}else{ }
				?>
			<div class="line_division"></div>
			<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div> 


		</div>
	</div>

	<div class="content_side inline">
		<?php get_template_part('templates/barra', 'shows'); ?>
	</div>
	
	<?php 
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
					'post_type'=>'episodios',
					'posts_per_page'=>3,
					'post_status'=>'piublish',
					'orderby'=>'data',
					'order'=>'DESC',
					'paged'=> $paged,
					'post__not_in'=>array($pId),
					'tax_query'=>array(
									array(
										'taxonomy'=>'shows',
										'field'=>'slug',
										'terms'=>$term_slug
										)
									)
					);
		$mas_posts = new WP_Query($args);

		if($mas_posts->have_posts()): 
			while($mas_posts->have_posts()):
				$mas_posts->the_post(); setup_postdata($post);
				$img_type = get_post_meta($post->ID, 'sprint_type_meta', true);

				if($img_type == 'foto_grande'){
		?>
					<div class="content_col post_wrap inline <?php echo $img_type; ?>">
						<?php 
							if(has_post_thumbnail() ):
						?>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
						<?php endif; ?>
						<div class="single_content">
							<div class="addthis_inline_share_toolbox"></div>
							<div>
								<?php 
									$tags = get_the_tags();
									if($tags){
										foreach($tags as $tag):
											$tag_slug = $tag->slug;
											echo "<span class='tags'>#".$tag->name." "."</span>";
										endforeach;	
									}
								?>
								<a href="<?php the_permalink(); ?>">
									<h2 class="_title">
										<?php the_title(); ?>
									</h2>
								</a>
								<span class="the_date">
									<?php echo get_the_date('H:m - d/j/Y'); ?>
								</span>
							</div>

							<?php 
								$contenido = get_the_content();
								the_content(); 
								if($contenido){
								}else{}
						
								?>
						
							<div class="line_division"></div>
							<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div> 
						</div>
						<nav class="prev-next-posts">

						    <div class="prev-posts-link">
						      <?php echo get_next_posts_link( 'Ver más', $posts->max_num_pages ); // display older posts link ?>
						    </div>

						    <div class="next-posts-link">
						      <?php echo get_previous_posts_link( 'Regresar' ); // display newer posts link ?>
						    </div>

						</nav>
					</div>
		
			<?php
				} //end fotogrande

				if($img_type == 'foto_chica'){

				?>	

					<div class="content_col post_wrap inline <?php echo $img_type; ?>">
						<div class="single_content">
							<div class="addthis_inline_share_toolbox"></div>
							<div>
								<?php 
									$tags = get_the_tags();
									if($tags){
										foreach($tags as $tag):
											$tag_slug = $tag->slug;
											echo "<span class='tags'>#".$tag->name." "."</span>";
										endforeach;	
									}
								?>
								<a href="<?php the_permalink(); ?>">
									<h2 class="_title">
										<?php the_title(); ?>
									</h2>
								</a>
								<span class="the_date">
									<?php echo get_the_date('H:m - d/j/Y'); ?>
								</span>
							</div>
							<div class="content_single_episodio">
								<?php 
									if(has_post_thumbnail() ):
								?>
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
								<?php endif; 
									the_content(); 
									?>
							</div>
							

							<div class="line_division"></div>
							<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div> 
						</div>
						<nav class="prev-next-posts">

						    <div class="prev-posts-link">
						      <?php echo get_next_posts_link( 'Ver más', $posts->max_num_pages ); // display older posts link ?>
						    </div>

						    <div class="next-posts-link">
						      <?php echo get_previous_posts_link( 'Regresar' ); // display newer posts link ?>
						    </div>

						</nav>
					</div>
			<?php
				} //end fotochica


				if($img_type == 'sin_foto'){
				?>
					<div class="content_col post_wrap inline <?php echo $img_type; ?>">

						<?php if(has_post_thumbnail() ): endif; ?>

						<div class="single_content">
							<div class="addthis_inline_share_toolbox"></div>
							<div>
								<?php 
									$tags = get_the_tags();
									if($tags){
										foreach($tags as $tag):
											$tag_slug = $tag->slug;
											$tag_nme = $tag->name;
										endforeach;	
											echo "<span class='tags'>#".$tag_nme." "."</span>";
									}
								?>
								<a href="<?php the_permalink(); ?>">
									<h2 class="_title">
										<?php the_title(); ?>
									</h2>
								</a>
								<span class="the_date">
									<?php echo get_the_date('H:m - d/j/Y'); ?>
								</span>
							</div>

							<?php 
								$contenido = get_the_content();
								the_content(); 
								if($contenido){
									//echo '<div class="addthis_sharing_toolbox"></div>';
								}else{  }
								?>
							

							<div class="line_division"></div>
							<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
						</div>
						<nav class="prev-next-posts">

						    <div class="prev-posts-link">
						      <?php echo get_next_posts_link( 'Ver más', $posts->max_num_pages ); // display older posts link ?>
						    </div>

						    <div class="next-posts-link">
						      <?php echo get_previous_posts_link( 'Regresar' ); // display newer posts link ?>
						    </div>

						</nav>
					</div>
		<?php		
			}
	?>
		


	<?php wp_reset_postdata(); endwhile; endif;?>
</div>
<?php get_footer(); ?>