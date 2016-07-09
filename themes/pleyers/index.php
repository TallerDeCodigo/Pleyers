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
				?>
				<div class="post destacado clearfix">
					<div class="over"></div>
					<?php 
						$src = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
					?> 
					<a href="<?php the_permalink(); ?>"><img class="thumb" src="<?php echo $src; ?>"></a>
					<span class="date"><?php the_date(); ?></span>
					<div class="post-info">	
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<a href="<?php the_permalink(); ?>">MÁS</a>
					</div><!-- post-info -->
				</div><!-- destacadp -->
				<?php endforeach; wp_reset_query(); ?>
			</div><!-- wrapper-destacado -->
			<div class="posts-pool">
			</div><!-- posts-pool -->
		</div><!-- content -->
	
	<?php get_footer(); ?>