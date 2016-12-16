<!DOCTYPE html>
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
		       pag_next = parseInt($('.paginaqueva:first-of-type').html());
		       pag_next = pag_next+1;
		       $('.paginaqueva').html(pag_next);
		       $('.loader').addClass('active');
		       $.ajax({
	               type: "POST",
	               dataType: "html",
	               url: '<?php echo esc_url(site_url()); ?>/ultimas-noticias/page/'+pag_next+'/' ,
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
	<body class="iframe" >