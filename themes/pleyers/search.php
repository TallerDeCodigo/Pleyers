<?php 
	get_header(); 
	$query = $_GET['s'];
?>
	<div class="content clearfix">
		<div class="top_taxonomy">
			<div class="tax_description">
				<h1>Resultados para: <?php 	echo $query; ?></h1>
			</div>
		
		</div><!-- top_taxonomy -->
		<div class="posts-pool clearfix">

				<?php
					
					if(have_posts()): while(have_posts()): the_post();
					$permalink = get_the_permalink($post->ID);
					$random = rand(1,3);
				?>

				<div class="nota clearfix <?php echo get_post_type($post->ID); ?> <?php  if($random == 1 ){ echo 'widescreen'; } else { echo 'square'; } ?>">
					<div class="over"></div>

					<?php 
						$widescreen = get_the_post_thumbnail( $post->ID, 'grid_home_large' );
						$square = get_the_post_thumbnail( $post->ID, 'grid_home_square' );
					?>
					<a href="<?php the_permalink(); ?>">
					<?php  if($random == 1 ){ echo $widescreen; } else { echo $square; } ?>
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
				
				<?php endwhile; endif; wp_reset_query(); ?>
			</div><!-- posts-pool -->
	</div>
<?php get_footer(); ?>