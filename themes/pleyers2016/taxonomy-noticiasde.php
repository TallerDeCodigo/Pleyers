<?php 
	get_header(); 
	$posts = get_queried_object();
	print_r($posts);
	$tax = $posts->taxonomy;
	$tax_slug = $posts->slug;
	$types = get_all_posttypes();
	$aidi_exclude = $post->ID;

?>
	<div class="single_post clearfix">
		<div class="single_top clearfix">
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
			<?php 
				if(get_post_meta($post->ID, 'eg_sources_youtube', true)){ 
					$videoid = get_post_meta($post->ID, 'eg_sources_youtube', true);
					echo '<iframe width="1024" height="576" src="https://www.youtube.com/embed/'.$videoid.'" frameborder="0" allowfullscreen></iframe>';
				} else { ?>
				<?php the_post_thumbnail('full'); ?>
			<?php } ?>
			<h2>
				<?php the_title(); ?>
			</h2>
		</div>	
		
		<?php get_sidebar(); ?>

		<div class="posts_pool clearfix">
			<?php
				$args = array(
							'post_type'=>$types,
							'posts_per_page'=>10,
							'post_status'=>'publish',
							'orderby'=>'date',
							'order'=>'DESC',
							'post__not_in'=>array($aidi_exclude),
							'tax_query'=>array(
											array(
												'taxonomy'=>$tax,
												'field'=>'slug',
												'terms'=> $tax_slug
												)
											)
						);
				$posts = new WP_Query($args);

				if($posts->have_posts()): 
					while($posts->have_posts()):
						$posts->the_post(); setup_postdata($post);
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
				wp_reset_postdata(); endwhile; endif; 
			?>
		</div>
	</div>
	
<?php get_footer(); ?>