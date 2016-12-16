<?php get_header('sprints'); ?>
	<?php 
		$args = array(
					'post_type'=>'sprints',
					'post_per_page'=>5,
					'post_status'=>'publish',
					'orderby'=>'date',
					'order'=>'DESC'
			);
		$posts = new WP_Query($args);
		if($posts->have_posts()):
			while($posts->have_posts()):
				$posts->the_post();
				setup_postdata($post);
		?>

				<section class="sprint_content">
					<?php 
						the_title();
						echo "<br>";
						the_content();
						echo "<br>";
						the_post_thumbnail();
						echo "<br>";
						?>

				</section>

		<?php
			endwhile;
			wp_reset_postdata();
		endif;	
				
	?>
<?php get_footer('sprints'); ?>