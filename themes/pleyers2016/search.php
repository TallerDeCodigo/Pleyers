<?php 
	get_header(); 
	$query = $_GET['s'];
	$total_results = $wp_query->found_posts;
?>
	<div class="container clearfix">
		<section class="single_post">
			<div class="top_taxonomy">
				<div class="tax_description">
					<span>Resultados de búsqueda para:</span>
					<h2><?php echo ucfirst($query); ?></h2>
				</div>
			
			</div><!-- top_taxonomy -->
			<div class="posts_pool clearfix">
			<?php
				if(!empty($total_results)){
					if(have_posts()): 
						while(have_posts()):
							the_post(); setup_postdata($post);
							$tags = get_the_tags();

				?>
				<div class="post clearfix">
					<a href="">
						<div class="img_frame clearfix">
							<?php the_post_thumbnail(); ?>
						</div>
					</a>
					<?php 
						$terms = wp_get_post_terms($post->ID, 'noticiasde' ); 
						if($terms){
							foreach($terms as $term):
						?>
							<a href="<?php echo bloginfo('url').'/noticiasde/'.$term->slug; ?>">
								<span>
									<?php echo "#".esc_html($term->name)." "; ?>
								</span>
							</a>	
						<?php		
						endforeach; }
					?>
					<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
				</div>
			<?php
							wp_reset_postdata(); 
						endwhile; 
					endif; 
				}else{
				?>
					<h2>Ooops!</h2>
					<p>No encontramos lo que estás buscando, inténtalo de nuevo por favor.</p>
			<?php
				}
				?>
			</div>
		</section>
	</div>
<?php get_footer(); ?>