<?php 
	get_header(); 
	$args = array(
				'post_type'=>'post',
				'posts_per_page'=>5,
				'post_status'=>'publish',
				'orderby'=>'rand',
				'order'=>'DESC'
		);
	$posts = new WP_Query($args);
?>
<div class="full_container">
	<section class="container clearfix smart_scroll_container">
		<?php get_sidebar(); ?>
		<?php 
			if($posts->have_posts()): while($posts->have_posts()):
				$posts->the_post(); setup_postdata($post);
		?>
		<article class="single_content">
			<div>
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="post_head">

				<div class="addthis_inline_share_toolbox"></div>

				<div>
					<?php 
						$tags = get_the_tags();
						if($tags){
							foreach($tags as $tag):
								$tag_url = $tag->slug;
							endforeach;
						?>
								<a href="<?php echo bloginfo('url').'/tag/'.$tag_url; ?>">
									<span class="tags">
										<?php echo "#".esc_html($tag->name)." "; ?>
									</span>
								</a>	
						<?php		
						}
					?>
				</div>

				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

				<div>
					<?php echo get_the_date('H:m d/M/Y'); ?>
				</div>

			</div><br>
			
			<div class="sprint_excerpt">
				<?php the_excerpt(); ?>
			</div>

			<div class="contenido capital">
				<?php the_content(); ?>
				<div class="addthis_inline_share_toolbox_dvmh"></div>
			</div>
			<!-- <div class="addthis_sharing_toolbox"></div> -->

		</article>
		<?php wp_reset_postdata(); endwhile; endif; ?>

	</section>
</div>
<?php get_footer(); ?>