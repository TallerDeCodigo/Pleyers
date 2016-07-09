<!doctype html>
	<head>
		<meta charset="utf-8">
		<title><?php print_title(); ?></title>
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<?php wp_head(); ?>
	</head>

	<body>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
			<div class="top-header clearfix">
				<div class="container clearfix">
					<div class="search">
						<?php get_search_form(); ?>	
					</div><!-- search -->
					<div class="social clearfix">
						<ul class="social-icons">
							<li class="tw"><a target="_blank" href=""></a></li>
							<li class="tw"><a target="_blank" href=""></a></li>
							<li class="tw"><a target="_blank" href=""></a></li>
							<li class="tw"><a target="_blank" href=""></a></li>
						</ul>
					</div><!-- social -->
				</div><!-- container -->
			</div><!-- top-header -->
				<header class="clearfix">
					<div class="container clearfix">
						<div class="logo">
							<h1>LOS PLEYERS</h1>
						</div>
						<nav class="clearfix">
							<ul class="main-nav">
								<li class="has-children">SHOWS<img src="<?php echo THEMEPATH; ?>/images/dropdown.png" /></li>
								<li class="has-children">NOTICIAS<img src="<?php echo THEMEPATH; ?>/images/dropdown.png" /></li>
								<li class=""><a href="">OPINIÓN</a></li>
								<li class=""><a href="">(0-0)</a></li>
								<li class=""><a href="">ACERCA DE</a></li>
							</ul>
						</nav>
					</div><!-- container -->
				</header>
				<div class="container clearfix">
			