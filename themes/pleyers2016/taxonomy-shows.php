<?php 
	get_header(); 
	$objeto = get_queried_object();
	$tax = $objeto->taxonomy;
	$slug = $objeto->slug;
	$show_name = $objeto->name;
?>
<section>
	<div class="main_banner videos full_container clearfix">
<?php
	$counter = 0;
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$args = array(
				'post_type'=>'episodios',
				'posts_per_page'=>9,
				'post_status'=>'publish',
				'orderby'=>'date',
				'order'=>'DESC',
				'paged'=>$paged,
				'tax_query'=>array(
								array(
									'taxonomy'=>'shows',
									'field'=>'slug',
									'terms'=>$slug
									)
								)
		);

	$posts = new WP_Query($args);

	if($posts->have_posts()): 
		while($posts->have_posts()):
			$posts->the_post();
			setup_postdata($post);
			$tags = get_the_tags();
			if ($counter==0) {
?>
		<div class="full_frame">
			<div class="img_frame">
				<img class="post_picture" src="<?php the_post_thumbnail_url('banner'); ?>" />
			</div>
			<div class="tema_topic"><?php echo $show_name; ?></div>
			<div class="destacado nota1 is_video">
				<?php if($tags){ ?>
					<a><span>#<?php echo $tags[0]->name; ?></span></a>
				<?php } ?>
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
			</div>
		</div>
		<a href="<?php the_permalink(); ?>" class="all_banner"></a>
	</div>
</section>
<section>
	<div class="grid_videos full_container clearfix">
		<div class="videos_stack clearfix">
	<?php  } elseif ($counter==1 || $counter==4 || $counter==5 || $counter==8) { ?>
			<div class="video_post is_video big_video clearfix">
				<a href="<?php the_permalink(); ?>">
					<div class="img_frame clearfix">
						<?php the_post_thumbnail('grid'); ?>
					</div>
					<div class="video_info">
						<?php if($tags){ ?>
							<span>#<?php echo $tags[0]->name; ?></span>
						<?php } ?>
						<h3><?php the_title(); ?></h3>
					</div>
				</a>
			</div>
	<?php  } else { ?>
			<div class="video_post is_video small_video clearfix">
				<a href="<?php the_permalink(); ?>">
					<div class="img_frame clearfix">
						<?php the_post_thumbnail('grid'); ?>
					</div>
					<div class="video_info">
						<?php if($tags){ ?>
							<span>#<?php echo $tags[0]->name; ?></span>
						<?php } ?>
						<h3><?php the_title(); ?></h3>
					</div>
				</a>
			</div>
	<?php }
		$counter++;	
		endwhile;
		wp_reset_postdata(); 
	endif; 
?>
		</div>
	</div>
</section>
<section>
	<?php
		if (function_exists('custom_pagination')) {
			custom_pagination($posts->max_num_pages,"5",$paged);
		}
	?>	
</section>
<?php get_footer(); ?>