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
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
		<script type='text/javascript' src='../../../wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
		<script type='text/javascript' src='../../../wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
		<?php wp_head(); ?>
		<script>
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=268844043214794";
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
		<script type="text/javascript" src="<?php echo THEMEPATH; ?>/js/jquery.clever-infinite-scroll.js"></script>
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
						<h3><a href="">Historias</a></h3>
						<a href="<?php bloginfo('url');?>/noticiasde/basquetbol">Basquetbol</a>
						<a href="<?php bloginfo('url');?>/noticiasde/futbol">Futbol</a>
						<a href="<?php bloginfo('url');?>/noticiasde/futbol-americano">Americano</a>
						<a href="<?php bloginfo('url');?>/noticiasde/beisbol">Beisbol</a>
						<a href="<?php bloginfo('url');?>/noticiasde/otros-deportes">Otros deportes</a>
					</div>
					<div>
						<h3><a href="">Blogs</a></h3>
						<a href="<?php bloginfo('url'); ?>/shows/jiots-tv">Jiots Sports</a>
						<a href="<?php bloginfo('url'); ?>/shows/deportologia">Deportología</a>
						<a href="<?php bloginfo('url'); ?>/shows/el_pechofrio">El Pechofrío</a>
						<a href="<?php bloginfo('url'); ?>/shows/tirando-guante">Tirando Guante</a>
						<a href="<?php bloginfo('url'); ?>/shows/apuntes-de-rabona">Apuntes de Rabona</a>
						<a href="<?php bloginfo('url'); ?>/shows/turismo-deportivo">Turismo Deportivo</a>
						<a href="<?php bloginfo('url'); ?>/shows/cultura-pop">Cultura Pop</a>
						<a href="<?php bloginfo('url'); ?>/shows/tactica">Táctica</a>
						<a href="<?php bloginfo('url'); ?>/shows/lucha-libre">Lucha Libre</a>
					</div>
					<div>
						<h3><a href="">Publicaciones</a></h3>
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
					<a href="https://www.facebook.com/Los-Pleyers-439793806182134/" target="_blank">
						<div class="fb"></div>
					</a>
					<a href="https://twitter.com/los_pleyers" target="_blank">
						<div class="tw"></div>
					</a>
					<a href="https://www.instagram.com/lospleyers/"  target="_blank">
						<div class="in"></div>
					</a>
					<a href="http://lospleyers.com/" target="_blank">
						<div class="md"></div>
					</a>
					<a href="http://lospleyers.com/" target="_blank">
						<div class="yt"></div>
					</a>
				</nav>
			</div>
		</header>
			