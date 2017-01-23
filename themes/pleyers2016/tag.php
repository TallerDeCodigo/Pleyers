<?php 
	get_header(); 
	$tag = get_queried_object();
	global $wp_query;	
?>
<section>
	<div class="main_banner full_container clearfix">
		<div class="img_frame">
			<img src="<?php echo the_post_thumbnail_url('banner'); ?>" class="post_picture">
		</div>
		<div class="tema_topic">#<?php echo $tag->name; ?></div>
		<div class="destacado nota1">
			<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
		</div>
	</div>
</section>
<section>
	<div class="container clearfix">
		<div class="left_container">
			<?php
				if($wp_query->have_posts()): 
					while($wp_query->have_posts()):
						$wp_query->the_post(); 
						setup_postdata($post);
						$terms = wp_get_post_terms($post->ID, 'noticiasde' );
			?>
			<div class="post clearfix">
				<a href="<?php the_permalink(); ?>">
					<div class="img_frame clearfix">
						<?php the_post_thumbnail('poster'); ?>
					</div>
				</a>
				<span>
					<a href="<?php echo 'noticiasde/'.$terms[0]->slug; ?>">
						<?php 
							if($terms){
								$trm_nme = $terms[0]->name;
								echo "#".$trm_nme;
							} 
						?>
					</a>
				</span>
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
				<a href="<?php the_permalink(); ?>"><p><?php the_excerpt(); ?></p></a>
			</div>
			<?php
					wp_reset_postdata();
					endwhile; 
				endif; 
			?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<section>
	<?php
		if (function_exists('custom_pagination')) {
			custom_pagination($posts->max_num_pages,"3",$paged);
		}
	?>	
</section>
<?php get_footer(); ?>
