<?php 
	$args = array(
				'post_type'=>'graficos',
				'posts_per_page'=>4,
				'post_status'=>'publish',
				'orderby'=>'date',
				'order'=>'DESC'
				);
	$posts = new WP_Query($args);

?>
<div class="cerocero ">
	<div class="container clearfix">
			<img src="<?php echo THEMEPATH; ?>/images/00_logo.png">
			<a href="http://cerocero.mx/" target="_blank">
				<span class="vermas">Ver Más<img src="<?php echo THEMEPATH; ?>/images/right_arrow_black.png"></span>
			</a>
		<ul class="posts_cerocero clearfix">
			<?php 
				if($posts->have_posts()): 
					while($posts->have_posts()):
					$posts->the_post();
					setup_postdata($post);
				?>
					<li>
						<?php the_post_thumbnail();?>
					</li>
			<?php 
					wp_reset_postdata();
					endwhile; 
				endif; 
				?>
		</ul>
	</div>
</div>
