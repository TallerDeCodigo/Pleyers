<?php
$terms = get_the_terms($post->ID, 'shows'); 
if($terms[0]->slug=="jiots-tv"){
get_header('jiots');
} else {
get_header();
}

$pId = $post->ID;
$term_slug;

foreach($terms as $term){
	$term_slug = $term->slug;
}

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$args_test = array(
			'post_type'=>'episodios',
			'posts_per_page'=>-1,
			'post_status'=>'publish',
			'orderby'=>'date',
			'order'=>'DESC',
			'tax_query'=>array(
							array(
								'taxonomy'=>'shows',
								'field'=>'slug',
								'terms'=>$term_slug
								)
							)
			);
$posts_test = new WP_Query($args_test);
if($posts_test->have_posts()):
	$count = 1;
	while($posts_test->have_posts()):
		$posts_test->the_post();

		if($pId == $post->ID){
			break;
		}

		$count++;
	endwhile;
endif;
$count = $count/5;
$paged_count = ceil($count);


$args = array(
			'post_type'=>'episodios',
			'posts_per_page'=>5,
			'post_status'=>'publish',
			'orderby'=>'date',
			'order'=>'DESC',
			'paged'=>$paged_count,
			'tax_query'=>array(
							array(
								'taxonomy'=>'shows',
								'field'=>'slug',
								'terms'=>$term_slug
								)
							)
			);

$posts = new WP_Query($args);

date_default_timezone_set('America/Mexico_City');
$hoy = date('U');

?>
<script type="text/javascript">
	location.href = "#";
	location.href = "#p<?php echo $pId; ?>";
</script>
<section class="appender">
	<div class="taxonomia" data-name="<?php echo $term_slug; ?>"></div>
	<div class="paginaqueva"><?php echo $paged_count; ?></div>
	<div class="paginaqueva_up"><?php echo $paged_count; ?></div>

	<div class="full_container clearfix">

		<div class="sidebar scrollable clearfix">
			<div class="sprints">
				<div class="sprints_container">
					<div class="the_scroll">
						<?php 
						if($posts->have_posts()): 
							while($posts->have_posts()):
								$posts->the_post(); 
								setup_postdata($post);
								$post_date = get_the_date('U');

								$time_ago = human_time_diff($post_date, $hoy);
								$unwanted_array = array('minuto'=>'m', 'hora'=>'h', 'día'=>'d', 'semana'=>'s', 'mes'=>'M', 'año'=>'A',
			 						 'minutos'=>'m', 'horas'=>'h', 'días'=>'d', 'semanas'=>'s', 'meses'=>'M', 'años'=>'A',
			 						 'min'=>'m', 'hour'=>'h', 'day'=>'d', 'week'=>'s', 'month'=>'M', 'year'=>'A',
			 						 'mins'=>'m', 'hours'=>'h', 'days'=>'d', 'weeks'=>'s', 'months'=>'M', 'years'=>'A', ' '=>'');
								$time_ago = strtr( $time_ago, $unwanted_array );
						?>
						<a href="<?php echo get_the_permalink();?>" class="link_url" data="<?php echo $post->ID; ?>"></a>
						<div class="formato_a sprints_post clearfix" id="<?php echo $post->ID; ?>">
							<span class="post_time"><?php  echo $time_ago; ?></span>
							<div class="sprints_post_content">
								<a href="#<?php echo "p".$post->ID; ?>"><div class="img_frame"><?php the_post_thumbnail('sprints_grande'); ?></div></a>
								<a href="#<?php echo "p".$post->ID; ?>">
									<h1>
										<?php the_title(); ?>
									</h1>
								</a>
							</div>
						</div>	
						<?php 
							endwhile; 
							wp_reset_postdata();
						endif; 
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="right_container clearfix">
			<?php
				$posts = new WP_Query($args);
				date_default_timezone_set('America/Mexico_City');

				if($posts->have_posts()): 
						while($posts->have_posts()):
						$posts->the_post();
						$terms = wp_get_post_terms($post->ID, 'noticiasde' );
						$link = get_the_permalink();
						// $link = substr($link, 23); 	//Productivo
						$link = substr($link, 17);		//Local
						$youtube_id = get_post_meta($post->ID, 'eg_sources_youtube', true);
			?>
					<article>
						<div class="referent" id="<?php echo "p".$post->ID; ?>"></div>
						<a href="<?php echo $link; ?>" class="anchor_tags" data="<?php echo $post->ID; ?>" ></a>

								<div class="episodio no_play" video-id="<?php echo $youtube_id; ?>" >
									<?php if ($youtube_id): ?>
										<iframe width="560" height="315" src='' allowfullscreen frameborder="0"></iframe>
									<?php endif; ?>
										<?php the_post_thumbnail('grid'); ?>
								</div>

								<div class="article_header">
									<table border="0">
										<tr>
											<td>
												<div class="shares">
													<textarea><?php the_permalink(); ?></textarea>
													<a href="# https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Compartir en Facebook','width=600,height=400')">
														<div class="share_fb" aria-hidden="true"></div> 
													</a>
													<a href="# https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx" target="popup" onclick="window.open('https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx','Compartir en Twitter','width=600,height=400')">
														<div class="share_tw" aria-hidden="true"></div> 
													</a>
													<a class="copylink">
														<div class="share_link" aria-hidden="true"></div> 
													</a>
												</div>
											</td>
											<td>
												<?php if ($terms) { ?>
												<a class="term" href="<?php bloginfo('url'); echo '/noticiasde/'.$terms[0]->slug; ?>"><?php echo "#".esc_html($terms[0]->name)." "; ?></a>
												<?php } ?>
												<h1><?php the_title(); ?></h1>
												<span class="author_name">
													<?php echo ucfirst(get_the_date('F j, Y - g:i A')); ?>
												</span>
											</td>
										</tr>
									</table>
								</div>

								<div class="contenido">
									<?php the_content(); ?>
									<div class="shares horizontal_share clearfix">
										<textarea><?php the_permalink(); ?></textarea>
										<a href="# https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Compartir en Facebook','width=600,height=400')">
											<div class="share_fb" aria-hidden="true"></div> 
										</a>
										<a href="# https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx" target="popup" onclick="window.open('https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx','Compartir en Twitter','width=600,height=400')">
											<div class="share_tw" aria-hidden="true"></div> 
										</a>
										<a class="copylink">
											<div class="share_link" aria-hidden="true"></div> 
										</a>
									</div>
								</div>
						</article>
			<?php  	
					endwhile; 
					wp_reset_postdata();
				endif; 
			?>
		</div>
	</div>
</section>
<?php get_footer(); ?>