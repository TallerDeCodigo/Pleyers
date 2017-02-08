<?php get_header(); ?>
<section>
	<div class="main_banner page_style video_container clearfix">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/zQeXAIeo1WA" frameborder="0" allowfullscreen></iframe>
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
					<img src="<?php echo THEMEPATH; ?>images/cerocero_about.png"></a>
					<p>Las más grandes historias empiezan en (0-0). Información visual y sintética para los grandes curiosos del deporte.</p>
				</a>
			</div>
			<div class="publicacion">
				<a target="_blank" href="<?php echo bloginfo('url'); ?>/shows/jiots-tv/">
					<img src="<?php echo THEMEPATH; ?>images/jiotssports_about.png">
					<p>Trolleo en los espacios deportivos para hacer del internet un lugar peor.</p>
				</a>
			</div>
		</div>
		<h2 class="title">STAFF</h2>
	</div>
	<div class="short_container clearfix">
	<?php
		$args = array(
		    'roles'          => array('administrator', 'editor'),
		    'orderby'		=> 'name',
		    'order'         => 'ASC',
		    'meta_key'      => 'dealing',
		    'meta_value'    => 'si',
		    'meta_compare'  => '=',
		);

		$usrs = get_users($args);


		foreach($usrs as $usr):

			$usrid = $usr->ID;
			$nicename = $usr->display_name;
			$usr_login = $usr->user_login;
			$email =  $usr->user_email;
			$default = 'https://lospleyers.com/wp-content/uploads/2017/02/pleyers_avatar-1.jpg';
			$usr_meta = get_user_meta($usrid);
			$usr_twitter = $usr_meta['twitter'];
			$usr_apellido = $usr_meta['last_name'];

			// echo "<pre>";
			// 	print_r($usr_meta);
			// echo "</pre>";

			$twtt = $usr_twitter[0];
			$usr_description = get_user_meta($usrid, 'description', true);
	?>
		<div class="author head_ clearfix">
		    <table border="0">
		    	<tr>
		    		<td>
		    			<?php $hash =md5(strtolower(trim($email)))."?d=".urlencode($default); ?>
		    			<div class="author_frame">
							<img src="https://www.gravatar.com/avatar/<?php echo $hash."&size=200"; ?>">
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