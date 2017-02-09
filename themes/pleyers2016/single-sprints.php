<?php
get_header();
$pId = $post->ID;

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$args = array(
			'post_type'=>'sprints',
			'posts_per_page'=>100,
			'post_status'=>'publish',
			'orderby'=>'date',
			'order'=>'DESC',
			'paged'=>$paged
			);

$posts = new WP_Query($args);

date_default_timezone_set('America/Mexico_City');
$hoy = date('U');

?>
<script type="text/javascript">
	location.href = "#";
	location.href = "#gt<?php echo $pId; ?>";
</script>
<section>
	<div class="paginaqueva">1</div>
	<div class="full_container clearfix">
		<div class="sidebar scrollable clearfix">
			<div class="sprints">
				<h3 class="header_sprints">Sprints PAGE</h3>
				<div class="sprints_container">
					<div class="the_scroll">
						<?php 
							if($posts->have_posts()): 
								while($posts->have_posts()):
								$posts->the_post(); 
								$post_date = get_the_date('U');

								$time_ago = human_time_diff($post_date, $hoy);
								$unwanted_array = array('minuto'=>'m', 'hora'=>'h', 'día'=>'d', 'semana'=>'s', 'mes'=>'M', 'año'=>'A',
			 						 'minutos'=>'m', 'horas'=>'h', 'días'=>'d', 'semanas'=>'s', 'meses'=>'M', 'años'=>'A',
			 						 'min'=>'m', 'hour'=>'h', 'day'=>'d', 'week'=>'s', 'month'=>'M', 'year'=>'A',
			 						 'mins'=>'m', 'hours'=>'h', 'days'=>'d', 'weeks'=>'s', 'months'=>'M', 'years'=>'A', ' '=>'');
								$time_ago = strtr( $time_ago, $unwanted_array );
								$img_size = get_post_meta($post->ID, 'sprint_type_meta', true);

						?>
						<a href="<?php echo get_the_permalink();?>" class="link_url" data="<?php echo $post->ID; ?>"></a>
						<?php 
							if($img_size == 'foto_grande') {
						?>
						<div class="formato_a sprints_post clearfix" id="<?php echo $post->ID; ?>">
							<span class="post_time"><?php  echo $time_ago; ?></span>
							<div class="sprints_post_content">
								<a href="#<?php echo "gt".$post->ID; ?>"><div class="img_frame"><?php the_post_thumbnail('sprints_grande'); ?></div></a>
								<a href="#<?php echo "gt".$post->ID; ?>"><p><?php the_excerpt(); ?></p></a>
							</div>
						</div>
						<?php 
							} else if($img_size == 'foto_chica') {
						?>
						<div class="formato_b sprints_post clearfix" id="<?php echo $post->ID; ?>">
							<span class="post_time"><?php  echo $time_ago; ?></span>
							<div class="sprints_post_content">
								<a href="#<?php echo "gt".$post->ID; ?>"><div class="img_frame"><?php the_post_thumbnail('sprints_grande'); ?></div></a>
								<a href="#<?php echo "gt".$post->ID; ?>"><p><?php the_excerpt(); ?></p></a>
							</div>
						</div>
						<?php 
							} else {
						?>
						<div class="formato_b sprints_post clearfix" id="<?php echo $post->ID; ?>">
							<span class="post_time"><?php  echo $time_ago; ?></span>
							<div class="sprints_post_content">
								<a href="#<?php echo "gt".$post->ID; ?>"><p><?php the_excerpt(); ?></p></a>
							</div>
						</div>
						<?php 
							}
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
						$img_size = get_post_meta($post->ID, 'sprint_type_meta', true);
						$link = get_the_permalink();
						// $link = substr($link, 23); 	//Productivo
						$link = substr($link, 17);		//Local
			?>
					<article>
						<div class="referent" id="<?php echo "gt".$post->ID; ?>"></div>
						<a href="<?php echo $link; ?>" class="anchor_tags" data="<?php echo $post->ID; ?>" ></a>
							<?php 
								if($img_size == 'foto_grande'){
							?>
								<div class="<?php echo $img_size; ?>" >
									<?php the_post_thumbnail('medium_large'); ?>
								</div>

								<div class="article_header">
									<table border="0">
										<tr>
											<td>
												<div class="shares">
													<textarea><?php the_permalink(); ?></textarea>
													<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Compartir en Facebook','width=600,height=400')">
														<div class="share_fb" aria-hidden="true"></div> 
													</a>
													<a href="https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx" target="popup" onclick="window.open('https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx','Compartir en Twitter','width=600,height=400')">
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
												<h2><?php the_title(); ?></h2>
												<span class="author_name">
													<?php echo ucfirst(get_the_date('F j, Y - g:i A')); ?>
												</span>
											</td>
										</tr>
									</table>
								</div>

								<div class="contenido">
									<?php the_content(); ?>

							<?php 		
								}else if($img_size == 'foto_chica'){
							?>
								<div class="article_header">
									<table border="0">
										<tr>
											<td>
												<div class="shares">
													<textarea><?php the_permalink(); ?></textarea>
													<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Compartir en Facebook','width=600,height=400')">
														<div class="share_fb" aria-hidden="true"></div> 
													</a>
													<a href="https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx" target="popup" onclick="window.open('https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx','Compartir en Twitter','width=600,height=400')">
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
												<h2><?php the_title(); ?></h2>
												<span class="author_name">
													<?php echo ucfirst(get_the_date('F j, Y - g:i A')); ?>
												</span>
											</td>
										</tr>
									</table>
								</div>

								<div class="contenido">
									<div class="<?php echo $img_size; ?>">
										<?php the_post_thumbnail('sprints_grande'); ?>
									</div>
									<?php the_content(); ?>

							<?php
								}else{
							?>
								<div class="article_header">
									<table border="0">
										<tr>
											<td>
												<div class="shares">
													<textarea><?php the_permalink(); ?></textarea>
													<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Compartir en Facebook','width=600,height=400')">
														<div class="share_fb" aria-hidden="true"></div> 
													</a>
													<a href="https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx" target="popup" onclick="window.open('https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx','Compartir en Twitter','width=600,height=400')">
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
												<h2><?php the_title(); ?></h2>
												<span class="author_name">
													<?php echo ucfirst(get_the_date('F j, Y - g:i A')); ?>
												</span>
											</td>
										</tr>
									</table>
								</div>

								<div class="contenido">
									<?php the_content(); ?>			
							<?php		
								}
							?>
									<div class="shares horizontal_share clearfix">
										<textarea><?php the_permalink(); ?></textarea>
										<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Compartir en Facebook','width=600,height=400')">
											<div class="share_fb" aria-hidden="true"></div> 
										</a>
										<a href="https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx" target="popup" onclick="window.open('https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx','Compartir en Twitter','width=600,height=400')">
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