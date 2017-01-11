<?php get_header(); ?>

<div class="paginaqueva">1</div>

<div class="full_container">
	<section class="container clearfix smart_scroll_container">
		<section id="sprints_scroll" class="sprint_top">
			<?php
				if(have_posts()): 
					while(have_posts()):
						the_post();
						$img_size = get_post_meta($post->ID, 'sprint_type_meta', true);
				?>
						<article class="single_content" id="<?php echo $post->ID."h"; ?>">
							<?php 

								$link = get_the_permalink(); 
								$link = substr($link, 23); 	//Productivo
								// $link = substr($link, 17);		//Local

							?>

							<a href="<?php echo $link; ?>" class="anchor_tags" data="<?php echo $post->ID; ?>" ></a> </br></br></br></br>
							<?php 
								if($img_size == 'foto_grande'){
									?>

									<div class="<?php echo $img_size; ?>">
										<?php the_post_thumbnail(); ?>
									</div>

									<div class="post_head clearfix">

										<div class="shares">

											<!-- <textarea style="display:none;"><?php the_permalink(); ?></textarea> -->

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

											<!-- <textarea style="display:none;"><?php the_permalink(); ?></textarea> -->

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

									<div class="nav_container">
										<!-- <a  class="next_p">
											next >
										</a> -->
									</div>


								<?php 		
									}else if($img_size == 'foto_chica'){
									?>



									<div class="post_head clearfix">

										<div class="shares">

											<!-- <textarea style="display:none;"><?php the_permalink(); ?></textarea> -->

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

									<div class="nav_container">
										<!-- <a  class="next_p">
											next >
										</a> -->
									</div>


								<?php
									}else{
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
										</div>  -->

										<div class="<?php echo $img_size; ?>">
											<?php the_post_thumbnail(); ?>
										</div>

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

										<div class="nav_container">
											<!-- <a  class="next_p">
												next >
											</a> -->
										</div>
								<?php		
									}
									?>
						</article>
			<?php  	
					endwhile; 
					wp_reset_postdata();
				endif; ?>
		</section>
					



					<!--SIDEBAR ARCHIVE BREAKING-->



		<section id="sidebar_sprints" class="sidebar clearfix">
			<div id="sidebar_scroll" class="sprints clearfix" >
				<?php 
						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						
						date_default_timezone_set('America/Mexico_City');
						$hoy = date('U');
				?>
						<div class="clearfix">
							<img class="header_sprints" src="<?php echo THEMEPATH; ?>images/venado_head.svg" width="30px" height="30px">
							<a href="<?php bloginfo('url'); ?>/sprints">
								<h3 class="header_sprints">SPRINTS</h3>
							</a>
						</div>
						
						<div class="sprints_container clearfix">
							<?php 
								if(have_posts()): 
									while(have_posts()):
										the_post();
										setup_postdata($post);
										$post_date = get_the_date('U');

										$time_ago = human_time_diff($post_date, $hoy);
										$time_ago = preg_replace('/\s+/', '', $time_ago);
										$time_ago = substr($time_ago, 0, 2);
										$img_size = get_post_meta($post->ID, 'sprint_type_meta', true);

							?>
										

										<a href="<?php echo get_the_permalink();?>" class="link_url" data="<?php echo $post->ID; ?>"></a>

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
														}else{
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


		<?php //get_sidebar(); ?>
	</section>
</div>

<?php get_footer(); ?>