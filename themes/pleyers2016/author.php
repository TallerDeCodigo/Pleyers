<?php 
	get_header(); 
	$user = get_queried_object();
	$usrid = $user->ID;
	$nicename = $user->user_nicename;
	$user_login = $user->user_login;
	$email =  $user->user_email;
	$default = 'https://lospleyers.com/wp-content/uploads/2017/01/place_pleyers.png';

	$usr_meta = get_user_meta($usrid);
	$usr_meta = $usr_meta['twitter'];
	$twtt = $usr_meta[0];

	$usr_description = get_user_meta($usrid, 'description', true);

	?>
<section>
	<div class="short_container clearfix">
		<div class="author head_ clearfix">
		    <table border="0">
		    	<tr>
		    		<td>
		    			<?php $hash =md5(strtolower(trim($email)))."?d=".urlencode($default); ?>
		    			<div class="author_frame">
							<img src="https://www.gravatar.com/avatar/<?php echo $hash; ?>">
		    			</div>
		    		</td>
		    		<td>
		    			<h2><?php echo esc_html($nicename); ?></h2>
		    			<?php if ($usr_description != '') { ?>
		    			<span><?php echo $usr_description; ?></span>
		    			<?php 
		    				  }
		    				  if ($twtt != '') { ?>
		    			<a href="https://twitter.com/<?php echo $twtt; ?>"><?php echo "@".esc_html($twtt); ?></a>
		    			<?php } ?>
		    		</td>
		    	</tr>
		    </table>
		</div>
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
						$posts->the_post();
						setup_postdata($post);
						$terms = wp_get_post_terms($post->ID, 'noticiasde' );
		?>
	   		<div class="post clearfix">
	   		    <a href="<?php the_permalink(); ?>">
	   		        <div class="img_frame clearfix">
	   		            <?php the_post_thumbnail('poster'); ?>
	   		        </div>
	   		    </a>
	   		    <span>
	   		        <a href="<?php bloginfo('url'); echo '/noticiasde/'.$terms[0]->slug.'/'; ?>">
	   		            <?php 
	   		                if($terms){
	   		                    $trm_nme = $terms[0]->name;
	   		                    echo "#".$trm_nme;
	   		                } 
	   		            ?>
	   		        </a>
	   		    </span>
	   		    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
	   		    <a href="<?php the_permalink(); ?>"><p><?php the_excerpt(); ?></p></a>
	   		</div>
	   	<?php
   					wp_reset_postdata(); 
   				endwhile; 
   			endif; 
   		?>
   	</div>
</section>
<section>
	<?php
		if (function_exists('custom_pagination')) {
			custom_pagination($posts->max_num_pages,"3",$paged);
		}
	?>	
</section>
<?php get_footer(); ?>