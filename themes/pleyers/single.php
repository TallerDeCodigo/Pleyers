<?php get_header(); ?>
	
	<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<div class="single_post clearfix">
		<div class="single_top">
			<?php 
				if(get_post_meta($post->ID, 'eg_sources_youtube', true)){ 
					$videoid = get_post_meta($post->ID, 'eg_sources_youtube', true);
					echo '<iframe width="1024" height="576" src="https://www.youtube.com/embed/'.$videoid.'" frameborder="0" allowfullscreen></iframe>';
				} else { ?>
				<?php the_post_thumbnail('full'); ?>
			<?php } ?>
		</div>
		<div class="single_content">
			<span class="date"><?php echo get_the_date(); ?></span>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</div>
	<?php endwhile; endif; wp_reset_query(); ?>

	<div class="related_posts clearfix">
		<?php 
			$args = array(
					'post_type'			=> array('episodios', 'post', 'graficos'),
					'posts_per_page' 	=> 3,
					'order'				=> 'rand'
				);
			$related = get_posts($args);
			foreach($related as $post): setup_postdata($post);
			$permalink = get_the_permalink($post->ID);
		?>
		<div class="nota clearfix <?php echo get_post_type($post->ID); ?> square">
			<div class="over"></div>
			<?php $square = get_the_post_thumbnail( $post->ID, 'grid_home_square' ); ?>			
			<a href="<?php the_permalink(); ?>">
			<?php echo $square; ?>
			</a>
			<span class="date"><?php echo get_the_date(); ?></span>
			<?php 
				if(get_post_meta($post->ID, 'eg_sources_youtube', true)){
					echo '<a href="'.$permalink.'"><img class="play" src="'.THEMEPATH.'/images/play.png"></a>';
				} 
			?>
			<div class="post-info">	
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<a class="mas" href="<?php the_permalink(); ?>">MÁS</a>
			</div><!-- post-info -->
		</div><!-- post -->
		<?php endforeach; ?>
	
	</div>

<?php get_footer(); ?>