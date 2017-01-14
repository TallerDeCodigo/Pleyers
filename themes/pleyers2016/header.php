<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta property="fb:pages" content="890404164418411" />
		<title><?php print_title(); ?></title>
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<meta name="geo.region" content="MX-DIF" />
		<meta name="geo.position" content="23.634501;-102.552784" />
		<meta name="ICBM" content="23.634501, -102.552784" />
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,900' rel='stylesheet' type='text/css'>
		<?php wp_enqueue_script('jquery'); ?>
		<?php wp_head(); ?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery('.carousel').bxSlider({
				    mode: 'horizontal',
				    infiniteLoop: true,
				    minSlides: 4,
				    maxSlides: 4,
				    moveSlides: 4,
				    speed: 1000,
				    pause: 0,
				    auto: false,
				    pager: false,
				    controls: true
				  });
			});
		</script>
		
		<!--
		// <script>
		// 	(function(d, s, id) {
		// 	  var js, fjs = d.getElementsByTagName(s)[0];
		// 	  if (d.getElementById(id)) return;
		// 	  js = d.createElement(s); js.id = id;
		// 	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=268844043214794";
		// 	  fjs.parentNode.insertBefore(js, fjs);
		// 	}(document, 'script', 'facebook-jssdk'));
		// </script>
		-->


		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.7&appId=1770490416550304";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>


		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-65208621-1', 'auto');
			ga('send', 'pageview');
		</script>

	</head>

	<body <?php body_class(); ?> >
		
		<div class="overscreen" style="display:none">
			<div class="_over"></div>
			<div class="menu">
				<nav>
					<div>
						<h3><a href="<?php echo bloginfo('url');?>/sprints">Sprints</a></h3>
					</div>
					<div>
						<h3>Historias</h3>
						<?php

							$terms = get_terms( array( 'taxonomy' => 'noticiasde','hide_empty' => false ));

							for($i=0; $i<count($terms); $i++){
								$term_menu = $terms[$i]->name;
								$term_slug = $terms[$i]->slug;
							?>
								<a href="<?php  bloginfo('url'); ?>/noticiasde/<?php echo esc_html($term_slug); ?>"><?php echo esc_html($term_menu); ?></a>	
						<?php			
							}
							?>
					</div>
					<div>
						<h3>Blogs</h3>
						<?php

							$terms = get_terms( array( 'taxonomy' => 'shows','hide_empty' => false ));

							for($i=0; $i<count($terms); $i++){
								$term_menu = $terms[$i]->name;
								$term_slug = $terms[$i]->slug;
							?>
								<a href="<?php  bloginfo('url'); ?>/shows/<?php echo esc_html($term_slug); ?>"><?php echo esc_html($term_menu); ?></a>	
						<?php			
							}
							?>
					</div>

					<div>
						<h3>Publicaciones</h3>
						<a href="http://cerocero.mx/" target="_blank">(0-0) cerocero</a>
						<a href="http://jiots.tv/" target="_blank">Jiots·TV</a>
					</div>
					<div>
						<h3><a href="<?php bloginfo('url'); ?>/quienes-somos">Quiénes Somos</a></h3>
					</div>
					<div>
						<figure class="_logo"></figure>
						<a href="">Copyright &copy; 2010 Los Pleyers</a>
						<span>
							<a href="<?php echo bloginfo('url'); ?>/terminos-y-condiciones">Términos y condiciones</a><a href="<?php echo bloginfo('url'); ?>/politicas-de-privacidad">Políticas de privacidad</a>&nbsp;
						</span>
					</div>
				</nav>
			</div>
		</div>
		
		<header class="todo_el_header">
			<div class="container clearfix">
				<h1>LOS PLEYERS</h1>
				<div id="nav_icon"><span></span><span></span><span></span><span></span></div>
				<a href="<?php echo site_url(); ?>"><img class="header_logo" src="<?php echo THEMEPATH; ?>images/logo.png"></a>
				<nav class="social">
					<div class="search_bar">
						<?php get_search_form(); ?>
						<!-- <input type="search" name="search" placeholder="Búsqueda" style="display:block"> -->
					</div>
					<div class="fb">
						<a href="https://www.facebook.com/ceroceromx" target="_blank"></a>
					</div>
					
					<div class="tw">
						<a href="https://twitter.com/ceroceromx" target="_blank"></a>
					</div>
					<div class="in">
						<a href="https://www.instagram.com/ceroceromx/"  target="_blank"></a>
					</div>
					<div class="md">
						<a href="https://medium.com/cerocero-mx" target="_blank"></a>
					</div>
					<div class="yt">
						<a href="https://www.youtube.com/ElJiotsSports" target="_blank"></a>
					</div>
				</nav>
			</div>
		</header>
		<section id="todo_el_contenido">
			