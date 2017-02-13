<?php
	get_header();
	$pId = $post->ID;
	?>
<section>
	<div class="full_container clearfix">
		<div class="right_container clearfix">
			<?php
				date_default_timezone_set('America/Mexico_City');
				$hoy = date('U');

				if(have_posts()):
					while(have_posts()):
						the_post();
						$post_date = get_the_date('U');
						$time_ago = human_time_diff($post_date, $hoy);
						$unwanted_array = array('minuto'=>'m', 'hora'=>'h', 'día'=>'d', 'semana'=>'s', 'mes'=>'M', 'año'=>'A',
								 'minutos'=>'m', 'horas'=>'h', 'días'=>'d', 'semanas'=>'s', 'meses'=>'M', 'años'=>'A',
								 'min'=>'m', 'hour'=>'h', 'day'=>'d', 'week'=>'s', 'month'=>'M', 'year'=>'A',
								 'mins'=>'m', 'hours'=>'h', 'days'=>'d', 'weeks'=>'s', 'months'=>'M', 'years'=>'A', ' '=>'');
						$img_size = get_post_meta($post->ID, 'sprint_type_meta', true);

						$terms = wp_get_post_terms($post->ID, 'noticiasde' );
						$link = get_the_permalink();	
				?>
						<article>
							<div class="referent" id="<?php echo "gt".$post->ID; ?>"></div>
							<a href="<?php esc_url($link); ?>" class="anchor_tags" data="<?php echo $post->ID; ?>" ></a>
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
														<a href="# https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Compartir en Facebook','width=600,height=400')">
															<div class="share_fb" aria-hidden="true"></div> 
														</a>
														<a href="# https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx" target="popup" onclick="window.open('https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx','Compartir en Twitter','width=600,height=400')">
															<div class="share_tw" aria-hidden="true"></div> 
														</a>
														<a class="copylink">
															<div class="share_link" aria-hidden="true"></div> 
														</a>
														<div class="alerta">Link copiado al portapapeles</div>
													</div>
												</td>
												<td>
													<?php if ($terms) { ?>
													<a class="term" href="<?php bloginfo('url'); echo '/noticiasde/'.$terms[0]->slug; ?>"><?php echo "#".esc_html($terms[0]->name)." "; ?></a>
													<?php } ?>
													<h1>
														<?php the_title(); ?>
													</h1>
													<span class="author_name">
														<?php echo ucfirst(get_the_date('F j, Y - g:i A')); ?>
													</span>
												</td>
											</tr>
										</table>
									</div>

									<div class="contenido">
										<?php the_content(); ?>
									</div>	

								<?php 		
									}else if($img_size == 'foto_chica'){
								?>
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
														<div class="alerta">Link copiado al portapapeles</div>
													</div>
												</td>
												<td>
													<?php if ($terms) { ?>
													<a class="term" href="<?php bloginfo('url'); echo '/noticiasde/'.$terms[0]->slug; ?>"><?php echo "#".esc_html($terms[0]->name)." "; ?></a>
													<?php } ?>
													<h1>
														<?php the_title(); ?>
													</h1>
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
									</div>	

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
														<div class="alerta">Link copiado al portapapeles</div>
													</div>
												</td>
												<td>
													<?php if ($terms) { ?>
													<a class="term" href="<?php bloginfo('url'); echo '/noticiasde/'.$terms[0]->slug; ?>"><?php echo "#".esc_html($terms[0]->name)." "; ?></a>
													<?php } ?>
													<h1>
														<?php the_title(); ?>
													</h1>
													<span class="author_name">
														<?php echo ucfirst(get_the_date('F j, Y - g:i A')); ?>
													</span>
												</td>
											</tr>
										</table>
									</div>
									<div class="contenido">
										<?php the_content(); ?>	
									</div>			
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
											<div class="alerta">Link copiado al portapapeles</div>
										</div>
									</div>
							</article>
			<?php			
					endwhile;
				endif;
				?>
		</div><!--END RIGHT CONTAINER-->
	</div>	
</section>	
<?php get_footer(); ?>

