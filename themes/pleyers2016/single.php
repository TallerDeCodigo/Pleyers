<?php 
	get_header(); 
	$posts = get_queried_object();
	// echo "<pre>";
	// 	print_r($posts);
	// echo "</pre>";
?>
	<div class="single_post clearfix">
		<div class="single_top">
			<?php 
				if(get_post_meta($post->ID, 'eg_sources_youtube', true)){ 
					$videoid = get_post_meta($post->ID, 'eg_sources_youtube', true);
					echo '<iframe width="1024" height="576" src="https://www.youtube.com/embed/'.$videoid.'" frameborder="0" allowfullscreen></iframe>';
				} else { ?>
				<?php the_post_thumbnail('full'); ?>
			<?php } ?>
		</div>

		<div class="single_content">
			
				<?php 
					$tags = get_the_tags();
					if($tags){
						foreach($tags as $tag):
							echo "<a href=''><span class='tags'>#".$tag->name." "."</span></a>";
						endforeach;	
					}
				?>
			<h2>
				<?php the_title(); ?>
			</h2>
			<div class="addthis_sharing_toolbox"></div>
			<?php the_content(); ?>
			<div class="addthis_sharing_toolbox"></div>

			<?php 
				$author_mail = get_the_author_meta('user_email');
				
			?>
				<?php
					if($author_mail){
						$email = $author_mail;
						$hash = md5(strtolower($email));
						$gravatar = get_home_url()."/".$hash;
						$nme_author = get_the_author();
					?>
						<img src="<?php echo $gravatar; ?>">
						<div><?php echo $nme_author; ?></div>
						<div><?php echo $email; ?></div>
				<?php								
					}
				?>
			<div class="line_division"></div>
			<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
			<div class="globo" style="display:none;">
				Lorem ipsum dolor sit amet consectetur adiscplicing elit
			</div>

			<?php get_template_part('templates/barra', 'mashistorias'); ?>

		</div>

	</div>
<?php get_footer(); ?>