<?php 
	get_header(); 
	$user = get_queried_object();
	$usrid = $user->ID; 
	$nicename = $user->user_nicename;
	$user_login = $user->user_login;
	$email =  $user->user_email;
	$default = "https://lh3.googleusercontent.com/ZMepV1eSMYHg1Rc-EAXScjutJDJwq6e7RzjtuR_HN8cqXv99R6U_aExOk72DlTTk7hwxWk52H5xjkoSserEWKmvf2yNhgQNlSd-RIUiEGLsZ-NP9pPyeNfo3ekzNlR8mHVD_UUNY74pPGddWDTGRQHaqfvVI1vhvdz73XXAxC-K7yqntznVAI85XR3y1W_xlpBGNOpUQNp0SFyWexdN4cdt3-NqWA4cE0w17wSsx6SS58VDh8eyhLi6oSlpfWxJSstz0IcDccsbqRiKg0wtzSYUIgX1PCij3gKSDD3k93nBrKAAR9_XhvOMhVGGg8OYB6x-vqeFwvgFOMFScQr2SNoCQnrwAIS9zvunaOWWSfMc8IldmY4bibf4NcGhsWIhbOA3-6MCmcObLeF3RwUekDPNF_P4WhO20BjHkGRekc5gPOEW9bqC7UkcLtbvGkr1BUWUnZiaI1Hg_VqV8yhvwqKtAl6YWSuEYmER_qaQ-Pmj0llwFWQhRNnDMmcWWrB9xOZABIFiQJdPhFhg8KnulgQ801nsA4V2sj7GVf2K9kx7pU4sBHUUWigEKBF2wqwL4d8qtM03bL_vErA_idjlpBz0As-3gwg85UqHp_49Ho2wIoQo=s200-no";

	$usr_meta = get_user_meta($usrid);
	$usr_meta = $usr_meta['twitter'];
	$twtt = $usr_meta[0];

	$usr_description = get_user_meta($usrid, 'description', true);

	?>
	<section>
		<article class="staff">
			<article class="pub">
				<div>
					<?php
						$hash =md5(strtolower(trim($email)))."?d=".urlencode($default);
					?>

					<img src="https://www.gravatar.com/avatar/<?php echo $hash; ?>">
				</div>

				<div>
					<a href="<?php echo bloginfo('url')."/author/".$usr_login; ?>">
						<h2><?php echo esc_html($nicename); ?></h2>
					</a>
					<p>
						<?php echo $usr_description; ?>
					</p>
					<span>
						<a href="https://twitter.com/<?php echo $twtt; ?>">
							<p>
								<?php echo "@".esc_html($twtt); ?>
							</p>
						</a>
					</span>
				</div>
			</article>
		</article>
	</section>

		<div class="container clearfix">
			<section class="single_post clearfix">
				<div class="posts_pool clearfix">
					<?php
						$types = get_all_posttypes();
						$args = array(
									'post_type'=>$types,
									'posts_per_page'=>10,
									'post_status'=>'publish',
									'orderby'=>'date',
									'order'=>'DESC',
									'author_name'=>$nicename
							);
						$posts = new WP_Query($args);
							if($posts->have_posts()): 
								while($posts->have_posts()):
									$posts->the_post(); setup_postdata($post);
									$tags = get_the_tags();

						?>
									<div class="post clearfix">
										<a href="">
											<div class="img_frame clearfix">
												<?php the_post_thumbnail(); ?>
											</div>
										</a>
										<?php 
											$terms = wp_get_post_terms($post->ID, 'noticiasde' ); 
											if($terms){
												foreach($terms as $term):
											?>
												<a href="<?php echo bloginfo('url').'/noticiasde/'.$term->slug; ?>">
													<span>
														<?php echo "#".esc_html($term->name)." "; ?>
													</span>
												</a>
											<?php		
											endforeach; }
										?>
										<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
										<p><?php the_excerpt(); ?></p>
									</div>
					<?php
									wp_reset_postdata(); 
								endwhile; 
							endif; 
						?>
				</div>
			</section>
		</div>

<?php get_footer(); ?>