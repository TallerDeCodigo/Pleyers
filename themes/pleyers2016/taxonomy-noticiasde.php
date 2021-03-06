<?php 
	get_header(); 
	$the_term = '';
	$posts = get_queried_object();
	$tax = $posts->taxonomy;
	$tax_slug = $posts->slug;
	$types = get_all_posttypes();
	$aidi_exclude = $post->ID;
	$terms = wp_get_post_terms($post->ID, 'noticiasde' ); 
	if($terms){
		foreach($terms as $term){
			$the_term = $term->name;
		}
	}
?>
<section>
	<div class="main_banner full_container clearfix">
		<div class="full_frame">
			<div class="img_frame">
				<img src="<?php echo the_post_thumbnail_url('banner'); ?>" class="post_picture">
			</div>
			<div class="tema_topic">#<?php echo $the_term; ?></div>
			<div class="destacado nota1">
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container clearfix">
		<div class="left_container">
			<?php
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$args = array(
							'post_type'=>$types,
							'posts_per_page'=>10,
							'post_status'=>'publish',
							'orderby'=>'date',
							'order'=>'DESC',
							'post__not_in'=>array($aidi_exclude),
							'paged'=>$paged,
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
						$posts->the_post(); 
						setup_postdata($post);
						$terms = wp_get_post_terms($post->ID, 'noticiasde' );
			?>
			<div class="post clearfix">
				<a href="<?php the_permalink(); ?>">
					<div class="img_frame clearfix">
						<?php the_post_thumbnail('poster'); ?>
						<div class="web_cover clearfix">
							<div class="shares">
								<textarea ><?php the_permalink(); ?></textarea>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Compartir en Facebook','width=600,height=400')">
									<div class="share_fb" aria-hidden="true"></div> 
								</a>
								<a href="https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx" target="popup" onclick="window.open('https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx','Compartir en Twitter','width=600,height=400')">
									<div class="share_tw" aria-hidden="true"></div> 
								</a>
								<a class="copylink">
									<div class="share_link" aria-hidden="true"></div> 
								</a>
								<div class="alerta">Link copiado al portapapeles</div>
							</div>
						</div>
					</div>
				</a>

				<span>
					<a href="<?php bloginfo('url'); echo '/noticiasde/'.$terms[0]->slug.'/'; ?>">
						<?php 
							if($terms){
								$trm_nme = $terms[0]->name;
								echo "#".$trm_nme;
							} 
						?>
					</a>
				</span>
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				<a class="the_excerpt" href="<?php the_permalink(); ?>"><p><?php the_excerpt(); ?></p></a>
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