<?php 

	get_header(); 
	$pId = $post->ID;
	$terms = get_the_terms($post->ID, 'shows'); 
	$term_slug;
	foreach($terms as $term){
		$term_slug = $term->slug;
	}
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$args = array(
				'post_type'=>'episodios',
				'posts_per_page'=>7,
				'post_status'=>'publish',
				'orderby'=>'date',
				'order'=>'DESC',
				'paged'=>$paged,
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
	$count=0;

	?>
	<script type="text/javascript">
		location.href = "#";
		location.href = "#p<?php echo $pId; ?>";
	</script>
	
<div class="full_container">
	<section class="container clearfix ">
		<section class="sprint_top content_col inline">
			<?php 
				if($posts->have_posts()): 
					while($posts->have_posts()):
						$posts->the_post(); 
						setup_postdata($post);
						$img_size = get_post_meta($post->ID, 'sprint_type_meta', true);
						// echo $count;
			?>
						<article class="single_content" id="p<?php echo $post->ID; ?>">
							<?php 
								$link = get_the_permalink(); 
								// $link = substr($link, 17);//local
								$link = substr($link, 23);//productivo
							?>
							<a href="<?php echo $link; ?>" class="anchor_tags" data="<?php echo $post->ID; ?>"></a>

							<?php 
								if($img_size == 'foto_grande'){
									?>

									<div class="<?php echo $img_size; ?>">
										<?php 
											$youtube_id = get_post_meta($post->ID, 'eg_sources_youtube', true);
											the_post_thumbnail(); 
											?>
										<iframe width="560" height="367" src='https://www.youtube.com/embed/<?php echo $youtube_id; ?>?autoplay="1" '></iframe>
									</div>

									<div class="post_head clearfix">

										<div class="shares">

											<textarea style="display:none;"><?php the_permalink(); ?></textarea>

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

										<div class="left_title">
											<div class="head_tag">
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

											<a href="<?php the_permalink(); ?>">
												<h2>
													<?php the_title(); ?>
												</h2>
											</a>
											
											<div class="_the_date">
												<?php echo get_the_date('H:m d/M/Y'); ?>
											</div>

										</div>
									</div><br>

									<!-- <div class="sprint_excerpt">
										<?php the_excerpt(); ?>
									</div> -->

									<div class="contenido capital">
										<?php the_content(); ?>
										<div class="shares horizontal_share clearfix">

											<textarea style="display:none;"><?php the_permalink(); ?></textarea>

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



								<?php 		
									}else if($img_size == 'foto_chica'){
									?>

									<div class="post_head clearfix">

										<div class="shares">

											<textarea style="display:none;"><?php the_permalink(); ?></textarea>

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

										<div class="left_title">

											<div class="head_tag">
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

											<div class="_the_date">
												<?php echo get_the_date('H:m d/M/Y'); ?>
											</div>

										</div>
									</div><br>

									<div class="<?php echo $img_size; ?>">
										<?php the_post_thumbnail(); ?>
										<?php $youtube_id = get_post_meta($post->ID, 'eg_sources_youtube', true); ?>
										<iframe width="560" height="367" src='https://www.youtube.com/embed/<?php echo $youtube_id; ?>'></iframe>
									</div>
									


									<div class="contenido capital">
										<?php the_content(); ?>	

										<div class="shares horizontal_share clearfix">

											<textarea style="display:none;"><?php the_permalink(); ?></textarea>

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



								<?php
									}else if($img_size == 'sin_foto'){
									?>


										<div class="post_head clearfix">

											<div class="shares">

												<textarea style="display:none;"><?php the_permalink(); ?></textarea>
												<a class="copylink">
													<div class="share_link" aria-hidden="true"></div> 
												</a>

												<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Compartir en Facebook','width=600,height=400')">
													<div class="share_fb" aria-hidden="true"></div> 
												</a>

												<a href="https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx" target="popup" onclick="window.open('https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx','Compartir en Twitter','width=600,height=400')">
													<div class="share_tw" aria-hidden="true"></div> 
												</a>

											</div>

											<div class="left_title">

												<div class="head_tag">
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

												<div class="_the_date">
													<?php echo get_the_date('H:m d/M/Y'); ?>
												</div>

											</div>
										</div><br>
										
										<!-- <div class="sprint_excerpt">
											<?php the_excerpt(); ?>
										</div> 

										<div class="<?php echo $img_size; ?>">
											<?php the_post_thumbnail(); ?>
										</div> -->

										<div class="contenido capital">
											<?php the_content(); ?>
											<div class="shares horizontal_share clearfix">

												<textarea style="display:none;"><?php the_permalink(); ?></textarea>
												<a class="copylink">
													<div class="share_link" aria-hidden="true"></div> 
												</a>

												<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Compartir en Facebook','width=600,height=400')">
													<div class="share_fb" aria-hidden="true"></div> 
												</a>

												<a href="https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx" target="popup" onclick="window.open('https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx','Compartir en Twitter','width=600,height=400')">
													<div class="share_tw" aria-hidden="true"></div> 
												</a>

											</div>
										</div>


								<?php		
									}
									?>


						</article>

			<?php  		
					$count++;
					endwhile; 
					wp_reset_postdata();
				endif; ?>
		</section>


		<section id="blog_sprints" class="sidebar clearfix">
			<div id="blog_scroll" class="sprints clearfix" >
				<?php 
						$posts = new WP_Query($args);
						date_default_timezone_set('America/Mexico_City');
						$hoy = date('U');
				?>		
						<div class="sprints_container clearfix">
							<?php 
								if($posts->have_posts()): 
									while($posts->have_posts()):
										$posts->the_post();
										setup_postdata($post);
										$post_date = get_the_date('U');

										$time_ago = human_time_diff($post_date, $hoy);
										$time_ago = preg_replace('/\s+/', '', $time_ago);
										$time_ago = substr($time_ago, 0, 2);
										$img_size = get_post_meta($post->ID, 'sprint_type_meta', true);

							?>
										<a href="<?php the_permalink();?>" class="link_url" data="<?php echo $post->ID; ?>"></a>

										<div class="formato_b sprints_post clearfix " id="<?php echo $post->ID; ?>">
											<span class="post_time"><?php  echo $time_ago; ?></span>
											<div class="sprints_post_content clearfix">
													<?php 
														if($img_size == 'foto_grande'){
														?>
															<div class="<?php echo $img_size; ?> clearfix">
																<a href="#<?php echo $post->ID."h"; ?>">
																	<div class="img_frame clearfix">
																		<?php the_post_thumbnail(); ?>
																	</div>
																</a>

																<a href="<?php the_permalink(); ?>">
																	<p class="clearfix">
																		<?php the_title(); ?>
																	</p>
																</a>
																<?php //the_excerpt(); ?>
															</div>
													<?php 
														}else if($img_size == 'foto_chica'){
														?>
															<div class="<?php echo $img_size; ?> clearfix">
																<a href="#<?php echo $post->ID."h"; ?>">
																	<div class="img_frame">
																		<?php the_post_thumbnail(); ?>
																	</div>
																</a>

																<a href="<?php the_permalink(); ?>">
																	<p class="clearfix">
																		<?php the_title(); ?>
																	</p>
																</a>
																<?php //the_excerpt(); ?>
															</div>	
													<?php	
														}else if($img_size == 'sin_foto'){
														?>
															<div class="<?php echo $img_size; ?> clearfix">
																<!-- <a href="#<?php echo $post->ID."h"; ?>">
																	<div class="img_frame">
																		<?php the_post_thumbnail(); ?>
																	</div>
																</a> -->

																<a href="#<?php echo $post->ID."h"; ?>">
																	<p class="clearfix">
																		<?php the_title(); ?>
																	</p>
																</a>
																<?php //the_excerpt(); ?>
															</div>	
													<?php	
														}
														?>	
											</div>
										</div>
					<?php 				
									endwhile; 
									wp_reset_postdata();
								endif; 
					?>	

					<?php if ($posts->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
							 <nav class="prev-next-posts">

							    <div class="prev-posts-link">
							    	<a href="<?php bloginfo('url'); ?>/sprints">
							    		Ver más
							    		<img src="<?php echo THEMEPATH; ?>/images/right_arrow.png"/>
							    	</a>
							      <?php //echo get_next_posts_link( 'Ver más <img src="'.THEMEPATH.'/images/right_arrow.png"/>', $posts->max_num_pages ); ?>
							    </div>

							    <div class="next-posts-link">
							      <?php //echo get_previous_posts_link( 'Regresar' ); ?>
							    </div>

							</nav> 
					<?php } ?>
						</div>
			</div>
		</section>


		<!-- <div class="content_side inline" >
			<div id="blogs_scroll" class="sprints" >
				<div class="sprints_container">
					<?php 
						if($posts->have_posts()): 
							while($posts->have_posts()):
								$posts->the_post();
								$post_date = get_the_date('U');

								$time_ago = human_time_diff($post_date, $hoy);
								$time_ago = preg_replace('/\s+/', '', $time_ago);
								$time_ago = substr($time_ago, 0, 2);
								$img_size = get_post_meta($post->ID, 'sprint_type_meta', true);

					?>
					<div class="formato_b sprints_post clearfix" id="<?php echo $post->ID; ?>">
						<span class="post_time"><?php  echo $time_ago; ?></span>
						<div class="sprints_post_content">
								<?php 
									if(has_post_thumbnail() ){
									?>
									<div class="<?php echo $img_size; ?>">
										<a href="<?php the_permalink(); ?>">
											<div class="img_frame">
												<?php the_post_thumbnail(); ?>
											</div>
										</a>
										<a href="<?php the_permalink(); ?>">
											<p>	
												<?php the_title(); ?> 
											</p>
										</a>
										<?php the_excerpt(); ?>
									</div>
								<?php 
									}else{
									?>
										<div><?php the_excerpt(); ?></div>
									<?php	
									} 
								?>
						</div>
					</div>
			<?php 				
							endwhile; 
						endif; 
			?>	
				</div>
			</div>

		</div> -->

	</section>
</div>

<?php get_footer(); ?>