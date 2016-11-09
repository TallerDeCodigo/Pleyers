<?php 
	get_header(); 
	$objeto = get_queried_object();
	echo '<pre>';
	print_r($objeto);
	echo '</pre>';
?>
	<div class="content clearfix">
		<div class="top_taxonomy">
			<div class="wrapper-destacado">

				<?php 
					$args = array(
							'post_type'			=> 'episodios',
							'posts_per_page' 	=> 1,
							'tax_query' => array(
								array(
									'taxonomy' => 'shows',
									'field'    => 'id',
									'terms'    => $objeto->term_id,
								),
							),
						);
				
					$ultimo = get_posts($args);
					foreach($ultimo as $post): setup_postdata($post);
					$destacado_id = $post->ID;
					$permalink = get_the_permalink($destacado_id);
				?>
				<div class="post destacado clearfix">
					<div class="over"></div>
					<?php $src = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?> 
					<a href="<?php the_permalink(); ?>"><img class="thumb" src="<?php echo $src; ?>"></a>
					<span class="date"><?php the_date(); ?></span>
					<?php 
						if(get_post_meta($post->ID, 'eg_sources_youtube', true)){
							echo '<a href="'.$permalink.'"><img class="play" src="'.THEMEPATH.'/images/play.png"></a>';
						} 
					?>
					<div class="post-info">	
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<a class="mas" href="<?php the_permalink(); ?>">MÁS</a>
					</div><!-- post-info -->
				</div><!-- destacadp -->

				<?php endforeach; wp_reset_postdata(); ?>
			</div><!-- wrapper destacado -->				


			<div class="tax_description">
				<h1><?php echo $objeto->name; ?></h1>
				<?php 
					$content = $objeto->description;
					$descripcion = apply_filters('the_content', $content);

					echo $descripcion; 
				?>
			</div>
		
		</div><!-- top_taxonomy -->
		<div class="shows-pool clearfix">

				<?php
					$args = array(
						'post_type'			=> 'episodios',
						'posts_per_page' 	=> -1,
						'exclude'			=> $destacado_id,
						'tax_query' => array(
							array(
								'taxonomy' => 'shows',
								'field'    => 'id',
								'terms'    => $objeto->term_id,
							),
						),
					);

					$episodios = get_posts($args);
					foreach($episodios as $post): setup_postdata($post);

					$permalink = get_the_permalink($post->ID);
					$random = rand(1,3);
				?>

				<div class="nota clearfix <?php echo get_post_type($post->ID); ?> <?php  if($random == 1 ){ echo 'widescreen bigsquare'; } else { echo 'square'; } ?>">
					<div class="over"></div>
					<?php 
						$widescreen = get_the_post_thumbnail( $post->ID, 'grid_home_large' );
						$square = get_the_post_thumbnail( $post->ID, 'grid_home_square' );
					?>
					<a href="<?php the_permalink(); ?>">
					<?php 
						echo $widescreen;
					?>
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
				
				<?php endforeach; wp_reset_query(); ?>
			</div><!-- posts-pool -->
	</div>
<?php get_footer(); ?>