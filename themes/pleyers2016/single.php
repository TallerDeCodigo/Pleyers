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
			
			<div class="addthis_inline_share_toolbox"></div>

				<div>
					<?php 
						$tags = get_the_tags();
						if($tags){
							foreach($tags as $tag):
								$tag_slug = $tag->slug;
								$tag_nme = $tag->name;
							endforeach;
							?>
							<a href='<?php echo bloginfo('url')."/tag/".$tag_slug; ?> '><span class='tags'># <?php echo $tag_nme; ?> </span> </a>
					<?php } ?>

					<h2>
						<?php the_title(); ?>
					</h2>

				</div><br>

				<div class="single_excerpt">
					<?php the_excerpt(); ?>
				</div>

				<div class="contenido capital">
					<?php the_content(); ?>
				</div>
			

			<?php 
				$author_mail = get_the_author_meta('user_email');
				$usrid = get_the_author_meta('ID');
			?>

				<?php
					if($author_mail){

						$email = $author_mail;
						$hash = md5(strtolower($email));
						$nme_author = get_the_author();
						$default = "https://lh3.googleusercontent.com/ZMepV1eSMYHg1Rc-EAXScjutJDJwq6e7RzjtuR_HN8cqXv99R6U_aExOk72DlTTk7hwxWk52H5xjkoSserEWKmvf2yNhgQNlSd-RIUiEGLsZ-NP9pPyeNfo3ekzNlR8mHVD_UUNY74pPGddWDTGRQHaqfvVI1vhvdz73XXAxC-K7yqntznVAI85XR3y1W_xlpBGNOpUQNp0SFyWexdN4cdt3-NqWA4cE0w17wSsx6SS58VDh8eyhLi6oSlpfWxJSstz0IcDccsbqRiKg0wtzSYUIgX1PCij3gKSDD3k93nBrKAAR9_XhvOMhVGGg8OYB6x-vqeFwvgFOMFScQr2SNoCQnrwAIS9zvunaOWWSfMc8IldmY4bibf4NcGhsWIhbOA3-6MCmcObLeF3RwUekDPNF_P4WhO20BjHkGRekc5gPOEW9bqC7UkcLtbvGkr1BUWUnZiaI1Hg_VqV8yhvwqKtAl6YWSuEYmER_qaQ-Pmj0llwFWQhRNnDMmcWWrB9xOZABIFiQJdPhFhg8KnulgQ801nsA4V2sj7GVf2K9kx7pU4sBHUUWigEKBF2wqwL4d8qtM03bL_vErA_idjlpBz0As-3gwg85UqHp_49Ho2wIoQo=s200-no";
						
						$author_slug = get_the_author_meta('user_login');
						$usr_description = get_user_meta($usrid, 'description', true);
						$usr_meta = get_user_meta($usrid);
						$usr_meta = $usr_meta['twitter'];
						$twtt = $usr_meta[0];

					?>
						<article class="pub">
							<div class="img_pub">
								<?php
									$hash =md5(strtolower(trim($email)))."?d=".urlencode($default);
								?>

								<img src="https://www.gravatar.com/avatar/<?php echo $hash; ?>">
							</div>

							<div class="content_pub">
								<a href="<?php echo bloginfo('url')."/author/".$author_slug; ?>">
									<h2><?php echo esc_html($nme_author); ?></h2>
								</a>
								<p>
									<?php echo $usr_description; ?>
								</p>
								<span>
									<a href="mailto:<?php $email; ?>" target="_top">
										<?php echo "@".esc_html($twtt); ?>
									</a>
								</span>
							</div>
						</article>
				<?php								
					}
				?>
				<?php if (function_exists('get_pollquestions')): ?>
				  <?php //do_shortcode(['poll id="1"']); ?>
				<?php endif; ?>
			<div class="line_division"></div>
			<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
			<div class="globo" style="display:none;">
				Lorem ipsum dolor sit amet consectetur adiscplicing elit
			</div>


		</div>
			<?php get_template_part('templates/barra', 'mashistorias'); ?>
			<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>