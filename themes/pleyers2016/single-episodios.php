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
<div class="clearfix full_container">
	<div class="content_col  inline">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
		<div class="single_content">
			
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
					<h2>
						<?php the_title(); ?>
					</h2>
				</a>
			<span class="the_date">
				<?php echo get_the_date('H:m - d/j/Y'); ?>
			</span>
			<div class="addthis_sharing_toolbox"></div>
			<?php 
				$contenido = get_the_content();
				the_content(); 
				if($contenido){
					//echo '<div class="addthis_sharing_toolbox"></div>';
				}else{ }
				?>
			<div class="line_division"></div>
			<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
			<div class="globo" style="display:none;">
				Lorem ipsum dolor sit amet consectetur adiscplicing elit
			</div>


		</div>
	</div>
	<div class="content_side inline">
		<?php get_sidebar(); ?>
	</div>
	<?php 
		$args = array(
					'post_type'=>'episodios',
					'posts_per_page'=>6,
					'post_status'=>'piublish',
					'orderby'=>'data',
					'order'=>'DESC',
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

		if($mas_posts->have_posts()): while($mas_posts->have_posts()):
			$mas_posts->the_post(); setup_postdata($post);
	?>
		<div class="content_col  inline">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
			<div class="single_content">
				
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
						<h2>
							<?php the_title(); ?>
						</h2>
					</a>
				<span class="the_date">
					<?php echo get_the_date('H:m - d/j/Y'); ?>
				</span>
				<div class="addthis_sharing_toolbox"></div>
				<?php 
					$contenido = get_the_content();
					the_content(); 
					if($contenido){
						//echo '<div class="addthis_sharing_toolbox"></div>';
					}else{}
					?>
				

				<div class="line_division"></div>
				<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
				<div class="globo" style="display:none;">
					Lorem ipsum dolor sit amet consectetur adiscplicing elit
				</div>
			</div>
		</div>
	<?php wp_reset_postdata(); endwhile; endif;?>
</div>
<?php get_footer(); ?>