<?php 
	$args = array(
				'post_type'=>'graficos',
				'posts_per_page'=>3,
				'post_status'=>'publish',
				'orderby'=>'date',
				'order'=>'DESC'
				);
	$posts = new WP_Query($args);

?>
<div class="cerocero full_container">
	<div class="container clearfix">
			<img src="<?php echo THEMEPATH; ?>/images/00_logo.png">
		<div class="posts_cerocero clearfix">
			<?php 
				if($posts->have_posts()): while($posts->have_posts()):
					$posts->the_post();
					the_post_thumbnail();
			?>
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>
