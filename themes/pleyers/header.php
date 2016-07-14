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
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
		<script src="https://use.fontawesome.com/1656c3d468.js"></script>
		<?php wp_head(); ?>
	</head>

	<body>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
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
				<header class="clearfix">
					<div class="container clearfix">
						<a href="<?php echo site_url(); ?>">
							<div class="logo">
								<h1>LOS PLEYERS</h1>
							</div>
						</a>
						<nav class="clearfix">
							<ul class="main-nav">
								<li class="has-children">SHOWS<img src="<?php echo THEMEPATH; ?>/images/dropdown.png" /></li>
								<li class="has-children">NOTICIAS<img src="<?php echo THEMEPATH; ?>/images/dropdown.png" /></li>
								<li class=""><a target="_blank" href="https://medium.com/@ceroceromx">OPINIÓN</a></li>
								<li class=""><a target="_blank" href="http://cerocero.mx/">(0-0)</a></li>
								<li class=""><a href="">ACERCA DE</a></li>
							</ul>
						</nav>
					</div><!-- container -->
				</header>
				<div class="container clearfix">
			