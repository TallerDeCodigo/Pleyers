<?php 
	get_header(); 
	$pId = $post->ID;
	$terms = get_the_terms($post->ID, 'shows'); 
	$term_slug;
	foreach($terms as $term){
		$term_slug = $term->slug;
	}
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

		<div class="content_side inline"><?php get_template_part('templates/barra', 'shows'); ?></div>
	</div>

	
</section>

<?php get_footer(); ?>