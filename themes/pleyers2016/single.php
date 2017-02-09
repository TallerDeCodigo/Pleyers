<?php 
get_header();
if(have_posts()):
	while(have_posts()):
		the_post(); 
		$terms = wp_get_post_terms($post->ID, 'noticiasde' );
?>
<section>
	<div class="main_banner full_container clearfix">
		<div class="full_frame">
			<div class="img_frame">
				<img class="post_picture" src="<?php the_post_thumbnail_url('banner'); ?>" />
			</div>
		</div>
	</div>
</section>
<section>
	<div class="reading_container clearfix">
		<div class="article_header">
			<table border="0">
				<tr>
					<td>
						<div class="shares">
							<textarea style="display:none;"><?php the_permalink(); ?></textarea>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Compartir en Facebook','width=600,height=400')">
								<div class="share_fb" aria-hidden="true"></div> 
							</a>
							<a href="https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx" target="popup" onclick="window.open('https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx','Compartir en Twitter','width=600,height=400')">
								<div class="share_tw" aria-hidden="true"></div> 
							</a>
							<a class="copylink">
								<div class="share_link" aria-hidden="true"></div> 
							</a>
						</div>
					</td>
					<td>
						<?php if ($terms): ?>
						<a class="term" href="<?php bloginfo('url'); echo '/noticiasde/'.$terms[0]->slug; ?>"><?php echo "#".esc_html($terms[0]->name)." "; ?></a>
						<?php endif ?>
						<h2>
							<?php the_title(); ?>
							<br>
							<span class="la_fecha">
								<?php the_date(); ?>
							</span>
						</h2>
						<span class="author_name">
							Por 
							<a href="<?php bloginfo('url'); echo '/author/'.esc_html(get_the_author()); ?>">
								<?php echo esc_html(get_the_author()); ?>
							</a>
						</span>
					</td>
				</tr>
			</table>
		</div>
		<?php if ( has_excerpt( $post->ID ) ) { ?>
		<div class="single_excerpt">
			<?php the_excerpt(); ?>
		</div>
		<?php } ?>
		<div class="contenido capital">
			<?php the_content(); ?>
			<div class="shares horizontal_share clearfix">
				<textarea style="display:none;"><?php the_permalink(); ?></textarea>
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Compartir en Facebook','width=600,height=400')">
					<div class="share_fb" aria-hidden="true"></div> 
				</a>
				<a href="https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx" target="popup" onclick="window.open('https://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=ceroceromx','Compartir en Twitter','width=600,height=400')">
					<div class="share_tw" aria-hidden="true"></div> 
				</a>
				<a class="copylink">
					<div class="share_link" aria-hidden="true"></div> 
				</a>
			</div>
			<br>
		</div>
		<?php 
			$author_mail = get_the_author_meta('user_email');
			$usrid = get_the_author_meta('ID');

			if($author_mail){

				$email = $author_mail;
				$hash = md5(strtolower($email));
				$nme_author = get_the_author();
				$default = 'https://lospleyers.com/wp-content/uploads/2017/01/place_pleyers.png';
				
				$author_slug = get_the_author_meta('user_login');
				$usr_description = get_user_meta($usrid, 'description', true);
				$usr_meta = get_user_meta($usrid);
				$usr_meta = $usr_meta['twitter'];
				$twtt = $usr_meta[0];

		?>
				<table border="0" class="public">
					<tr>
						<td>
							<div class="img_pub">
								<?php $hash =md5(strtolower(trim($email)))."?d=".urlencode($default);?>
								<img src="https://www.gravatar.com/avatar/<?php echo $hash; ?>">
							</div>
						</td>
						<td>
							<a class="link" href="<?php echo bloginfo('url')."/author/".$author_slug; ?>"><h2><?php echo esc_html($nme_author); ?></h2></a>
							<span><?php echo $usr_description; ?></span>
							<a class="tuit" href="mailto:<?php $email; ?>" target="_top"><?php echo "@".esc_html($twtt); ?></a>
						</td>
					</tr>
				</table>
			<?php								
				}
			?>
				<div class="poll_container">
				<?php
					$poll = get_post_meta($post->ID, 'poll_question_meta', true);

					if($poll){
						echo($poll);
					}
				?>
					<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>

				</div>
	</div>
</section>
<?php 
	endwhile; 
endif; 
?>
<section>
	<div class="footer_container clearfix">
		<?php get_template_part('templates/barra', 'mashistorias'); ?>
		<?php get_sidebar(); ?>
	</div>
</section>
<?php get_footer(); ?>