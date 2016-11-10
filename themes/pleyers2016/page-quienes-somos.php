<?php 
	get_header(); 
	$posts = get_posts();
	$title = get_the_title();
	$content = get_the_content(); 
	?>
	<section>
		<div class="main_banner full_container clearfix">

			<?php
			$types = get_all_posttypes();
			$args = array(
						'post_type'=>$types,
						'posts_per_page'=>1,
						'post_status'=>'publish',
						'orderby'=>'date',
						'order'=>'DESC',
						'category_name'=>'destacado',
						'meta_key'=>'eg_sources_youtube'
						);
			$posts = new WP_Query($args);

			if($posts->have_posts()): 
				while($posts->have_posts()):
					$posts->the_post(); setup_postdata($post);
			?>
				<div class="img_frame">
					<img src="<?php echo the_post_thumbnail_url(); ?>" class="post_picture">
				</div>
				<div class="destacado nota1" data-image="<?php echo the_post_thumbnail_url(); ?>">
					<?php $terms = wp_get_post_terms($post->ID, 'noticiasde' ); ?>
						<a href="<?php echo 'noticiasde/'.$terms[0]->slug; ?>">
							<span>
								<?php echo "#".esc_html($terms[0]->name)." "; ?>
							</span>
						</a>
					<a href="<?php the_permalink(); ?>">
						<h3>
							<?php the_title(); ?>
						</h3>
					</a>
				</div>
			
			<?php		
					wp_reset_postdata(); endwhile; endif; 
				?>

		</div>
		<div class="container clearfix">
			<section class="txt_angosto">
				<div>
					<h2>
						<?php echo esc_html($title); ?>
					</h2>
					<p>
						<?php echo esc_html($content); ?>
					</p>
				</div>

				<article class="pubs">
					<h2>
						NUESTRAS PUBLICACIONES
					</h2>
					<article class="pub">
						<img src="<?php echo THEMEPATH; ?>images/logo.png">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.
						</p>
					</article>
					<article class="pub">
						<img src="<?php echo THEMEPATH; ?>images/logo.png">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.
						</p>
					</article>
				</article>

				<article class="staff">
					<h2>
						STAFF
					</h2>
					<?php 
						$usrs = get_users();
						foreach($usrs as $usr):

							$nicename = $usr->user_nicename;
							$usr_login = $usr->user_login;
							$email =  $usr->user_email;
							$default = "https://lh3.googleusercontent.com/ZMepV1eSMYHg1Rc-EAXScjutJDJwq6e7RzjtuR_HN8cqXv99R6U_aExOk72DlTTk7hwxWk52H5xjkoSserEWKmvf2yNhgQNlSd-RIUiEGLsZ-NP9pPyeNfo3ekzNlR8mHVD_UUNY74pPGddWDTGRQHaqfvVI1vhvdz73XXAxC-K7yqntznVAI85XR3y1W_xlpBGNOpUQNp0SFyWexdN4cdt3-NqWA4cE0w17wSsx6SS58VDh8eyhLi6oSlpfWxJSstz0IcDccsbqRiKg0wtzSYUIgX1PCij3gKSDD3k93nBrKAAR9_XhvOMhVGGg8OYB6x-vqeFwvgFOMFScQr2SNoCQnrwAIS9zvunaOWWSfMc8IldmY4bibf4NcGhsWIhbOA3-6MCmcObLeF3RwUekDPNF_P4WhO20BjHkGRekc5gPOEW9bqC7UkcLtbvGkr1BUWUnZiaI1Hg_VqV8yhvwqKtAl6YWSuEYmER_qaQ-Pmj0llwFWQhRNnDMmcWWrB9xOZABIFiQJdPhFhg8KnulgQ801nsA4V2sj7GVf2K9kx7pU4sBHUUWigEKBF2wqwL4d8qtM03bL_vErA_idjlpBz0As-3gwg85UqHp_49Ho2wIoQo=s200-no";
					?>
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
									<span>
										<a href="mailto:<?php echo $email; ?>" target="_top">
											<?php echo esc_html($email); ?>
										</a>
									</span>
								</div>
							</article>
					<?php endforeach; ?>
				</article>
			</section>
		</div>
	</section>			
<?php
	get_footer(); 
?>