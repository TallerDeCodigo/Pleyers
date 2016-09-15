<?php get_header(); ?>
	<!-- Insert content here -->
		<div class="content clearfix">
			<div class="wrapper-destacado clearfix">
				<?php
					$args = array(
							'post_type' 		=> array('post', 'episodios'),
							'posts_per_page'	=>	1,
							'category'			=> 17
					);
					$destacado = get_posts($args);
					foreach($destacado as $post): setup_postdata($post);
					$destacado_id = $post->ID;
					$permalink = get_the_permalink($destacado_id);
					$squareurl = get_the_post_thumbnail_url($post->ID, 'grid_home_square');
				?>
				<div class="post destacado clearfix">
					<div class="over"></div>
					<?php $src = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?> 
					<a href="<?php the_permalink(); ?>"><img class="thumb thumbnota" src="<?php echo $src; ?>" data-square="<?php echo $squareurl; ?>"></a>
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
			</div><!-- wrapper-destacado -->
			<?php
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$args = array(
						'post_type' 		=> array('graficos', 'post', 'episodios', 'frases'),
						'paged' 			=> $paged,
						'category__not_in'	=> 17,
						'order'    			=> 'DESC'
				);
				
				$play = new WP_Query( $args );

			?>
			<div class="posts-pool clearfix">
				<?php			
					while ( $play->have_posts() ) 
					{
						$play->the_post();
						$permalink = get_the_permalink($play->ID);
						if(get_post_type($play->ID) == 'post'){
							$random = rand(1,10);
						}
						$_autor   = get_post_meta($post->ID, 'nombre_autor', array("fields"=>"all"));

					
				?>

				<?php if(get_post_type($play->ID) == 'tweets') { ?>

				
					 <a class="tweets" target="_blank" href="http://twitter.com/los_pleyers/status/<?php the_title(); ?>"><div class="clearfix">
					
					<span class="tweetie"><img src="<?php echo THEMEPATH; ?>/images/tweetie.png">@Los_Pleyers</span>
					<div class="tweet_content"><?php the_content(); ?></div>
						<span class="date"><?php echo get_the_date(); ?></span>
					</div></a> <!-- tweet -->
				
				<?php } else if(get_post_type($play->ID) == 'frases') { ?>
				
					 <div class="nota clearfix frases">
						
						<span class="tweetie">#frasedeldía</span>
						<div class="tweet_content">"<?php the_title(); ?>"</div>
						<span class="date">- <?php echo $_autor; ?></span>
						
					</div> <!-- tweet -->
				

				<?php } else if(get_post_type($play->ID) == 'graficos') { ?>

					 <div class="nota clearfix grafico bigsquare">
						
						
						<a target="_blank" href="http://cerocero.mx/?p=<?php echo get_post_meta($play->ID, 'id_cerocero', true); ?>">
						<?php 
							the_post_thumbnail('full');
						?>
						</a>
					
					</div> <!-- post -->

				<?php } else { ?> 

				<div class="nota clearfix <?php echo get_post_type($play->ID); ?> <?php  if($random == 1 ){ echo 'widescreen bigsquare'; } else { echo 'square'; } ?>">
					<div class="over"></div>
					<?php
						$square = get_the_post_thumbnail($play->ID, 'grid_home_square');
						$squareurl = get_the_post_thumbnail_url($play->ID, 'grid_home_square');
						$widescreen = get_the_post_thumbnail($play->ID, 'grid_home_large', array('data-square' => $squareurl, 'class' => 'thumbnota'));
						$bigsquare = get_the_post_thumbnail($play->ID, 'grid_home_square_large', array('data-square' => $squareurl, 'class' => 'thumbnota'));
					?>			
					
					<a href="<?php the_permalink(); ?>">
					<?php 
						if(get_post_type($play->ID) == 'episodios'){
							echo $widescreen; 
						} else if(get_post_type($play->ID) == 'post'){
							if($random == 1 ){
								echo $widescreen; 
							} else {
								echo $square; 	
							}
						} else if(get_post_type($play->ID) == 'graficos'){
							echo $square; 	
						}
					?>
					</a>
					<span class="date"><?php echo get_the_date(); ?></span>
					<?php 
						if(get_post_meta($play->ID, 'eg_sources_youtube', true)){
							echo '<a href="'.$permalink.'"><img class="play" src="'.THEMEPATH.'/images/play.png"></a>';
						} 
					?>
					<div class="post-info">	
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<a class="mas" href="<?php the_permalink(); ?>">MÁS</a>
					</div><!-- post-info -->
				</div><!-- post -->
				<?php } ?>
				<?php
					} //End of while
				?>
				
				<?php
					// wp_reset_postdata();
				//End of if
				?>
				
			</div><!-- posts-pool -->
		</div><!-- content -->
	<?php get_footer(); ?>