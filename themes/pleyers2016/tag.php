<?php 
	get_header(); 
	$posts = get_queried_object();
	// echo "<pre>";
	// 	print_r($posts);
	// echo "</pre>";
?>
	<div class="single_post clearfix">
		<div class="single_top">
				<?php 
					$tags = get_the_tags();
					if($tags){
						foreach($tags as $tag):
					?>
							<span><?php echo "#".esc_html($tag->name)." "; ?></span>
					<?php		
						endforeach;
					}
				?>
			<h2>
				<?php the_title(); ?>
			</h2>
			<?php 
				if(get_post_meta($post->ID, 'eg_sources_youtube', true)){ 
					$videoid = get_post_meta($post->ID, 'eg_sources_youtube', true);
					echo '<iframe width="1024" height="576" src="https://www.youtube.com/embed/'.$videoid.'" frameborder="0" allowfullscreen></iframe>';
				} else { ?>
				<?php the_post_thumbnail('full'); ?>
			<?php } ?>
		</div>

		<div class="single_content">
			<span class="date">
				<?php echo get_the_date(); ?>
			</span>
			<h2>
				<?php the_title(); ?>
			</h2>
			<div class="addthis_sharing_toolbox"></div>
			<?php the_content(); ?>
			<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
		</div>
		<div class="single_sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>