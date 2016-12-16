<<<<<<< HEAD
<!DOCTYPE html>
=======
<!doctype html>
>>>>>>> b5623fb82fe6a3a6a3f49b802275f29a3e624e3a
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

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<?php //wp_enqueue_script('jquery'); ?>
		<?php wp_head(); ?>

		<script type="text/javascript">
			var pag_next=0;
			$(window).on("load", function() {
				if ($('body').height() < document.documentElement.clientHeight) {
					loader();
				}
			});

			$(window).scroll(function() {
			   if($(window).scrollTop() + $(window).height() == $(document).height()) {
			       loader();
			   }
			});

			function imgError(image) {
			    image.remove();
			    return true;
			}

			function loader() {
		       console.log("bottom!");

		       pag_next = parseInt($('.paginaqueva').html());

		       console.log( $('.paginaqueva').html() );

		       pag_next = pag_next+1;
		       $('.paginaqueva').html(pag_next);
		       $('.loader').addClass('active');
		       $.ajax({
	               type: "POST",
	               dataType: "html",

	               url: '<?php echo esc_url(site_url()); ?>/sprints/page/'+pag_next+'/' ,
	               data: '',
	               success: function(data){
	                   var $data = $(data);
	                   $("body").append($data);
	                   $('.paginaqueva').html($('.paginaqueva:first-of-type').html());
	                   $('.loader').removeClass('active');
	               },
	               error : function(jqXHR, textStatus, errorThrown) {
	                   // $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	               }
		        });
			}
		</script>

	
	</head>

	<body  class="iframm"> 
		
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
			
