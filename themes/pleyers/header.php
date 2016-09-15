<!doctype html>
	<head>
		<meta charset="utf-8">
		<meta property="fb:pages" content="890404164418411" />
		<title><?php print_title(); ?></title>
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
		<script src="https://use.fontawesome.com/1656c3d468.js"></script>
		<?php wp_head(); ?>
		<div id="fb-root"></div>
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
	</head>

	<body <?php body_class( $class ); ?> >
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
			<div>
			<div class="todo_el_header"></div>
				<div class="top-header clearfix">
					<div class="container clearfix">
						<div class="search">
							<form role="search" method="get" id="searchform" class="searchform" action="<?php echo site_url(); ?>">
								<div>
									<input type="text" value="" name="s" id="s" />
									<input type="submit" id="searchsubmit" value="" />
								</div>
							</form>		
						</div><!-- search -->
						<div class="social clearfix">
							<ul class="social-icons">

								<li class="tw"><a target="_blank" href="https://www.facebook.com/LosPleyers/"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
								<li class="tw"><a target="_blank" href="https://twitter.com/los_pleyers/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li class="tw"><a target="_blank" href="https://www.instagram.com/lospleyers/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li class="tw"><a target="_blank" href="https://www.youtube.com/channel/UCbp3C3hELysSQkyamnpM2og"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
							</ul>
						</div><!-- social -->
					</div><!-- container -->
				</div><!-- top-header -->
				<header class="header-nav clearfix">
					<div class="container clearfix">
						<a href="<?php echo site_url(); ?>">
							<div class="logo">
								<h1>LOS PLEYERS</h1>
							</div>
						</a>
						<nav class="clearfix">
							<ul class="main-nav">
								<!-- <li class="rio"><a target="" href="http://lospleyers.com/noticiasde/rio-2016">RIO 2016</a></li> -->
								<li data="shows" class="has-children">SHOWS<img src="<?php echo THEMEPATH; ?>/images/dropdown.png" />
									<ul class="submenu" id="shows"> 
										<?php
											$args = array(
										        'hide_empty'          => 1,
										        'show_count'          => 0,
										        'style'               => 'list',
										        'taxonomy'            => 'shows',
										        'title_li'            => __( '' ),
										        'use_desc_for_title'  => 1,
										    );
										    wp_list_categories($args);
										?>
									</ul>
								</li>
								<li data="noticiasde" class="has-children">NOTICIAS<img src="<?php echo THEMEPATH; ?>/images/dropdown.png" />
									<ul class="submenu" id="noticiasde"> 
										<?php
											$args = array(
										        'hide_empty'          => 1,
										        'show_count'          => 0,
										        'style'               => 'list',
										        'taxonomy'            => 'noticiasde',
										        'title_li'            => __( '' ),
										        'use_desc_for_title'  => 1,
										        'exclude'			  => 84	
										    );
										    wp_list_categories($args);
										?>
									</ul>
								</li>
								<li class=""><a target="_blank" href="https://medium.com/@ceroceromx">OPINIÓN</a></li>
								
								<li class=""><a target="_blank" href="http://cerocero.mx/">(0-0)</a></li>
								<li class=""><a href="">ACERCA DE</a></li>
							</ul>
						</nav>

						

						<div class="menu_movil">
							<img 
								class="menu_control closed"
								src="<?php echo THEMEPATH; ?>/images/menu_open.png" 
								data-closed="<?php echo THEMEPATH; ?>/images/menu_close.png"
								data-opened="<?php echo THEMEPATH; ?>/images/menu_open.png"
								/>

							<ul class="mobile-nav">
								<li data="shows" class="has-children main_li">
									<span>SHOWS</span>
									<ul class="submenu-mobile" > 
										<?php
											$args = array(
										        'hide_empty'          => 1,
										        'show_count'          => 0,
										        'style'               => 'list',
										        'taxonomy'            => 'shows',
										        'title_li'            => __( '' ),
										        'use_desc_for_title'  => 1,
										    );
										    wp_list_categories($args);
										?>
									</ul>
								</li>
								<li data="noticiasde" class="has-children main_li">
									<span>NOTICIAS</span>
									<ul class="submenu-mobile" > 
										<?php
											$args = array(
										        'hide_empty'          => 1,
										        'show_count'          => 0,
										        'style'               => 'list',
										        'taxonomy'            => 'noticiasde',
										        'title_li'            => __( '' ),
										        'use_desc_for_title'  => 1,
										    );
										    wp_list_categories($args);
										?>
									</ul>
								</li>
								<li class="main_li"><a target="_blank" href="https://medium.com/@ceroceromx">OPINIÓN</a></li>
								<li class="main_li"><a target="_blank" href="http://cerocero.mx/">(0-0)</a></li>
								<li class="main_li"><a href="">ACERCA DE</a></li>
							</ul>
						</div>
					</div><!-- container -->
				</header>
			</div>
			<div class="container clearfix">
			