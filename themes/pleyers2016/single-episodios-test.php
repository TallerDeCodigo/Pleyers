<?php get_header(); ?>
	<section class="smart_content_wrapper">
		<section class="smart_scroll_container">
			<?php
				if(have_posts()): 
					while(have_posts()):
						the_post();
				?>
						<article class="smart_ajax_container">
							<div>
								<?php the_post_thumbnail(); ?>
							</div>
							<h2 class="title">
								<?php the_title(); ?>
							</h2>
						</article>
			<?php 	
					endwhile; 
				endif;
				?>	

				<nav class="post-navigation">
					<div class="navigation">
						<div class="alignleft"><?php posts_nav_link( '', '', '&laquo; Previous Entries' ); ?></div>
						<div class="alignright"><?php posts_nav_link( '', 'Next Entries &raquo;', '' ); ?></div>
					</div>
				</nav>

		</section>
	</section>
<?php get_footer(); ?>