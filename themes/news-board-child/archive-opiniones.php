<?php get_header(); ?>
<div class="container">
    <div class="row">
<?php
	$args =  array(
					'post_type'=>'opiniones',
					'posts_per_page'=>'-1');
	$query =  new WP_Query($args);
	?>

	
	<?php
	if($query->have_posts()):
		while($query->have_posts()):$query->the_post();
	?>
		<article class="col-md-6">
	<?php the_title(); the_content(); ?>
		</article>

<?php endwhile; ?>
<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>