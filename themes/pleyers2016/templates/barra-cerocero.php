<?php 
	$args = array(
				'post_type'=>'graficos',
				'posts_per_page'=>4,
				'post_status'=>'publish',
				'orderby'=>'date',
				'order'=>'DESC'
				);
	$posts = new WP_Query($args);

	// echo "<pre>";
	// 	print_r($posts);
	// echo "</pre>";

?>
<section class="cerocero">
	<div class="container clearfix">
		<a href="http://cerocero.mx/" target="_blank"><img class="section_logo" src="<?php echo THEMEPATH; ?>images/00_logo.png"></a>
		<a href="http://cerocero.mx/" target="_blank" class="see_more black">Ver más</a>
	</div>
	<div class="container clearfix posts_cerocero">
		<?php 
			if($posts->have_posts()): 
				while($posts->have_posts()):
				$posts->the_post();
				$id_cerocero = get_post_meta($post->ID, 'id_cerocero', true);

		?>
		<a href="http://cerocero.mx/?p=<?php echo $id_cerocero; ?>" class="gif_space" target="_blank">
			<?php 
				if(has_post_thumbnail()){	
					the_post_thumbnail('medium');
				}else{
					echo "no tiene thumbnail";
				}
				?>
		</a>
		<?php 
				wp_reset_postdata();
				endwhile; 
			endif; 
		?>
	</div>
</section>
