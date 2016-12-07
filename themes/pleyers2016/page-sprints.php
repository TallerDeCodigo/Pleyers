<?php get_header(); ?>
<?php 
	$args = array(
				'post_type'=>'sprints',
				'posts_per_page'=>10,
				'post_status'=>'publish',
				'orderby'=>'date',
				'order'=>'DESC',
		);
	$posts = new WP_Query($args);
?>
<section class="smart_content_wrapper">
	<div id="contentsWrapper" class="clearfix full_container smart_scroll_container">
		<div class="content_col smart_ajax_container  inline">
			<article id="<?php echo $pId; ?>">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
				
				<div class="single_content">
					<div class="addthis_inline_share_toolbox"></div>
					<div>
						<?php 
							$tags = get_the_tags();
							if($tags){
								foreach($tags as $tag):
									$tag_slug = $tag->slug;
									$tag_nme = $tag->name;
								endforeach;	
									echo "<span class='tags'>#".$tag_nme." "."</span>";
							}
						?>

						<a href="<?php the_permalink(); ?>">
							<h2>
								<?php the_title(); ?>
							</h2>
						</a>
						<span class="the_date">
							<?php echo get_the_date('H:m - d/j/Y'); ?>
						</span>

					</div>
					<?php 
						$contenido = get_the_content();
						the_content(); 
						if($contenido){
							//echo '<div class="addthis_sharing_toolbox"></div>';
						}else{ }
						?>
					<div class="line_division"></div>
					<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
					<div class="inlink">

						<?php 

							if(get_post_type( $post )=="episodios"){

							    $_terms = array_shift(get_the_terms($post->ID, 'shows'));

							    // get_posts in same custom taxonomy
							    $postlist_args = array(
							        'posts_per_page'  => -1,
							        'orderby'         => 'date',
							        'order'           => 'DESC',
							        'post_type'       => 'episodios',
							        'tax_query'		  => array(
							        						array(
							        							'taxonomy'=>'shows',
							        							'field'=>'slug',
							        							'terms'=>$term_slug
							        							)
							        						)
							    );

							    $postlist = get_posts( $postlist_args );

							    // get ids of posts retrieved from get_posts
							    $ids = array();
							    foreach ($postlist as $thepost) {
							        $ids[] = $thepost->ID;

							    }

							    // get and echo previous and next post in the same taxonomy
							    $thisindex  = array_search($post->ID, $ids);
							    $previd     = $ids[$thisindex-1];
							    $nextid     = $ids[$thisindex+1];

							    ?>
							    <?php

							        if ( !empty($nextid) ) {

							            echo '<a rel="next" href="' .get_permalink($nextid). '"></a>';

							        }


							    ?>

							    <?php
							}else{

							    // Your Default Previous/Next Links in single.php file
							}
							?>


						<?php //next_post_link(); ?>
						<div class="next_art_container">

						</div>
					</div>
			</article>
			
		</div>

		<div class="content_side inline" style="position:fixed;">
			<div class="sidebar clearfix">
				<div class="sprints">
					<?php 
							$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
							$args = array(
										'post_type'=>'episodios',
										'posts_per_page'=>4,
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
					?>
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
								<div class="formato_b sprints_post clearfix">
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
													<a href="<?php the_permalink(); ?>"><p><?php the_title(); //the_content(); ?> </p></a>
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
						<?php /*if ($posts->max_num_pages > 1) { ?>
							  	<nav class="prev-next-posts">

								    <div class="prev-posts-link">
								      <?php echo get_next_posts_link( 'Ver más', $posts->max_num_pages ); // display older posts link ?>
								      <img src="<?php echo THEMEPATH; ?>/images/right_arrow.png">
								    </div>

								    <div class="next-posts-link">
								      <?php echo get_previous_posts_link( '' ); // display newer posts link ?>
								    </div>

							  	</nav>
						<?php } */?>
							</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>