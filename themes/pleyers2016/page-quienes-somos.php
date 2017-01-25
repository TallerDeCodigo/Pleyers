<?php get_header(); ?>
<section>
	<div class="main_banner page_style video_container clearfix">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/yKgzIInYMds" frameborder="0" allowfullscreen></iframe>
	</div>
</section>
<section class="page_style">
	<?php 
		while ( have_posts() ) :
		the_post();
	?>
	<div class="reading_container about clearfix">
		<h2 class="title"><?php echo get_the_title(); ?></h2>
		<div class="contenido capital">
			<?php the_content(); ?>
		</div>
		<h2 class="title">NUESTRAS PUBLICACIONES</h2>
		<div class="contenido clearfix">
			<div class="publicacion">
				<a target="_blank" href="http://cerocero.mx/">
					<img src="<?php echo THEMEPATH; ?>images/pub1.jpg"></a>
					<p>En Los Pleyers estamos convencidos de que las grandes historias del deporte también son noticias.</p>
				</a>
			</div>
			<div class="publicacion">
				<a target="_blank" href="<?php echo bloginfo('url'); ?>/shows/jiots-tv/">
					<img src="<?php echo THEMEPATH; ?>images/pub2.jpg">
					<p>En Los Pleyers estamos convencidos de que las grandes historias del deporte también son noticias.</p>
				</a>
			</div>
		</div>
		<h2 class="title">STAFF</h2>
	</div>
	<div class="short_container clearfix">
	<?php
		$args = array(
		    'roles'          => array('administrator', 'editor'),
		    'order'         => 'DESC',
		    'meta_key'      => 'dealing', // Is this the meta key you are using?
		    'meta_value'    => 'si', // Based on however you store your meta data
		    'meta_compare'  => '=',
		);

		$usrs = get_users($args);
		
		foreach($usrs as $usr):

			$usrid = $usr->ID;
			$nicename = $usr->user_nicename;
			$usr_login = $usr->user_login;
			$email =  $usr->user_email;
			$default = 'https://lospleyers.com/wp-content/uploads/2017/01/place_pleyers.png';
			$usr_meta = get_user_meta($usrid);
			$usr_meta = $usr_meta['twitter'];
			$twtt = $usr_meta[0];
			$usr_description = get_user_meta($usrid, 'description', true);
	?>
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
		    			<a href="<?php echo bloginfo('url')."/author/".$usr_login; ?>">
		    				<h2><?php echo esc_html($nicename); ?></h2>
		    			</a>
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
	<?php endforeach; ?>
	<br><br>
	</div>
	<?php
		endwhile;
		wp_reset_query();
	?>
</section>			
<?php get_footer(); ?>