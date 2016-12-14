<?php get_header(); ?>
<div class="full_container">
	<section class="container clearfix smart_scroll_container">
		
		<section class="sprint_top">
			<?php 
				if(have_posts()): 
					while(have_posts()):
						the_post(); setup_postdata($post);
						$img_size = get_post_meta($post->ID, 'sprint_type_meta', true);
			?>
						<article class="single_content" >
							<?php 
								$link = get_the_permalink(); 
								$link = substr($link, 17);
							?>
							<a href="<?php echo $link; ?>" class="anchor_tags" data="<?php echo $post->ID; ?>"></a>

							<?php 
								if($img_size == 'foto_grande'){
									?>

									<div class="<?php echo $img_size; ?>">
										<?php the_post_thumbnail(); ?>
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

									<div class="sprint_excerpt">
										<?php the_excerpt(); ?>
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
										<a  class="next_p">
											next >
										</a>
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
										<a  class="next_p">
											next >
										</a>
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
										
										<div class="sprint_excerpt">
											<?php the_excerpt(); ?>
										</div> 

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
											<a  class="next_p">
												next >
											</a>
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
		<?php get_sidebar(); ?>
	</section>
</div>
<?php get_footer(); ?>