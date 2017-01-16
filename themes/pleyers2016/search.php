<?php 
	get_header(); 
	$query = $_GET['s'];
	$total_results = $wp_query->found_posts;
	if(!empty($total_results)){
?>
	<div class="container clearfix">
		<section class="single_post">
			<div class="top_taxonomy">
				<div class="search_description">
					<span>Resultados de búsqueda para:</span>
					<h2><?php echo ucfirst($query); ?></h2>
				</div>
			
			</div><!-- top_taxonomy -->
			<div class="posts_pool clearfix">
				<?php
						if(have_posts()): 
							while(have_posts()):
								the_post(); setup_postdata($post);
								$tags = get_the_tags();

					?>
								<div class="post clearfix">
									<a href="">
										<div class="img_frame clearfix">
											<?php the_post_thumbnail(); ?>
										</div>
									</a>
									<?php 
										$terms = wp_get_post_terms($post->ID, 'noticiasde' ); 
										if($terms){
											foreach($terms as $term):
										?>
											<a href="<?php echo bloginfo('url').'/noticiasde/'.$term->slug; ?>">
												<span>
													<?php echo "#".esc_html($term->name)." "; ?>
												</span>
											</a>	
										<?php		
										endforeach; }
									?>
									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
									<span><?php the_excerpt(); ?></span>
								</div>
				<?php
								wp_reset_postdata(); 
							endwhile; 
						endif; 
					?>
			</div>
		</section>
	</div>
			<?php		
				}else{
				?>
					<div class="container clearfix">
			            <section class="single_post">

			                <div class="top_taxonomy">
			                    <div class="tax_description">
			                    	<img src="<?php echo THEMEPATH; ?>/images/venado_pleyers.png">
			                        <h2>Error 404</h2>
			                        <span class="search_fail">No encontramos lo que estas buscando pero esto podría interesarte.</span>
			                    </div>
			                
			                </div><!-- top_taxonomy -->

			                <div class="posts_pool clearfix">
				                <?php
				                    $types = get_all_posttypes();
				                    $args = array(
				                                'post_type'=>$types,
				                                'posts_per_page'=>10,
				                                'post_status'=>'publish',
				                                'orderby'=>'rand',
				                                'order'=>'DESC'
				                                );
				                    $posts = new WP_Query($args);
				                        if($posts->have_posts()): 
				                            while($posts->have_posts()):
				                                $posts->the_post(); setup_postdata($post);
				                                $tags = get_the_tags();
				                    ?>
							                    <div class="post clearfix">
							                        <a href="">
							                            <div class="img_frame clearfix">
							                                <?php the_post_thumbnail(); ?>
							                            </div>
							                        </a>
							                        <?php 
							                            $terms = wp_get_post_terms($post->ID, 'noticiasde' ); 
							                            if($terms){
							                                foreach($terms as $term):
							                            ?>
							                                <a href="<?php echo bloginfo('url').'/noticiasde/'.$term->slug; ?>">
							                                    <span>
							                                        <?php echo "#".esc_html($term->name)." "; ?>
							                                    </span>
							                                </a>    
							                            <?php       
							                            endforeach; }
							                        ?>
							                        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
							                    </div>
				                <?php
				                                wp_reset_postdata(); 
				                            endwhile; 
				                        endif; 
				                    ?>
			                </div>
			            </section>
			        </div>
<?php
	}
	?>
<?php get_footer(); ?>