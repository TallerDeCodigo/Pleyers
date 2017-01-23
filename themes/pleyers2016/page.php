<?php 
get_header();
while ( have_posts() ) :
the_post();
?>
<section>
	<div class="reading_container page_style clearfix">	
		<h2 class="title"><?php echo get_the_title(); ?></h2>
		<div class="contenido capital">
			<?php the_content(); ?>
		</div>
	</div>
</section>
<?php
endwhile;
wp_reset_query();
get_footer();
?>