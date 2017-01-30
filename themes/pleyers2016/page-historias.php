<?php get_header(); ?>
	<?php
		$count = 0;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

		$args = array(
					'post_type'=>'post',
					'posts_per_page'=>20,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC',
					'paged'=>$paged,
					'offset'=>9
			);
		$posts = new WP_Query($args);
	?>
<section>
	<div class="full_container clearfix">
		<?php 
			if($posts->have_posts()):
				while($posts->have_posts()):
					$posts->the_post();
					setup_postdata($post);
					$terms = wp_get_post_terms($post->ID, 'noticiasde' );
					if($count == 0){
				?>
						<section class="head_historias">
							<div class="main_banner full_container clearfix">
								<div class="full_frame">
									<div class="img_frame">
										<img src="<?php echo the_post_thumbnail_url('banner'); ?>" class="post_picture">
									</div>
									<div class="tema_topic">#Historias </div>
									<div class="destacado nota1">
										<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
									</div>
								</div>
							</div>
						</section>
				<?php		
					}else{ 
					?>
						<div class="post clearfix">
						    <a href="<?php the_permalink(); ?>">
						        <div class="img_frame clearfix">
						            <?php the_post_thumbnail('poster'); ?>
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
						    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
						    <a class="the_excerpt" href="<?php the_permalink(); ?>"><p><?php the_excerpt(); ?></p></a>
						</div>
			<?php			
					}
				$count++;
				endwhile;
				wp_reset_postdata();
			endif;		
		?>
		<br>
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