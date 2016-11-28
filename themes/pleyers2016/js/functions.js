(function($){

	"use strict";

	$(function(){


		console.log('hello from functions.js');


		/**
		 * Validación de emails
		 */
		window.validateEmail = function (email) {
			var regExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return regExp.test(email);
		};



		/**
		 * Regresa todos los valores de un formulario como un associative array 
		 */
		window.getFormData = function (selector) {
			var result = [],
				data   = $(selector).serializeArray();

			$.map(data, function (attr) {
				result[attr.name] = attr.value;
			});
			return result;
		}


		var height_screen = $(window).height();
		var height_container = $('.archive div.full_container').height();


		$('div.sprints_container').css('height', height_screen-100+"px");

		if( $('body').hasClass('home') ){
			$('div.sprints_container').css('height', height_screen-90+"px");
		}
		// if($('body').hasClass('archive') ){
		// 	$('div.sprints_container').css('height', height_container-100+"px");	
		// }

		// $('.internav').append(
		// 	'<img src="wp-content/themes/pleyers2016/images/right_arrow.png">'
		// 	);
		
		//$('.single_top').height(height_screen);


		$( "div.sprints" ).mouseover(function() {
				$('body').css('overflow','hidden');
			}).mouseout(function() {
				$('body').css('overflow','auto');
		});

		$( "div.menu nav" )
			.mouseover(function() {
				$('body').css('overflow','hidden');
			})
			.mouseout(function() {
				$('body').css('overflow','auto');
		});
			var orig_title = $('.nota1 a h3').html();
			var orig_tag = $('.nota1  a span').html();
			var ch_tag = '';
		$('.more_destacado .destacado').mouseover(function() {
			var img = $(this).attr('data-image');
			var title = $(this).find('.el_titulo').html();
			var tag = $(this).find('.el_tag').html();
			if(tag == undefined){ch_tag = '';}else{ch_tag = tag}
			console.log(tag);
		    $('img.post_picture').fadeOut(300, function() {
		        $('img.post_picture').attr("src",img);
		        $('img.post_picture').fadeIn(300);
		        $('.nota1 a h3').html(title);
		        $('.nota1 a span').html(ch_tag);
		    });
		}).mouseout(function() {
			$('img.post_picture').fadeOut(300, function() {

		        $('img.post_picture').attr("src",$('.destacado.nota1').attr('data-image'));
		        $('img.post_picture').fadeIn(300);
		        $('.nota1 a h3').html(orig_title);
		        $('.nota1 a span').html(orig_tag);

		    });
		});









		$('#nav_icon').click(function(){
			if ($('.overscreen').hasClass('open')) {
				$('.overscreen').toggleClass('open');
				$('#nav_icon').toggleClass('open');
				setTimeout(function() {
					$('.overscreen').hide();
				}, 260);
			} else {
				$('.overscreen').show();
				setTimeout(function() {
					$('.overscreen').toggleClass('open');
					$('#nav_icon').toggleClass('open');
				}, 10);
			}	
		});

		$('div._over').click(function(){
			$('.overscreen').toggleClass('open');
			$('#nav_icon').toggleClass('open');
			setTimeout(function() {
				$('.overscreen').hide();
			}, 260);
		});

		$(document).mouseup(function(e){
			// var container = $("nav.menu");
			// if (!container.is(e.target)&& container.has(e.target).length === 0) {
			// }, 260);
			// }
		});

		$('.balloon').on('click', function(){
			console.log('hey');
			$('.globo').slideDown();
			$('.balloon').append($('.globo'));
		});
		$('.globo').mouseleave(function(){
			console.log('you');
			$('.globo').slideUp();
		});

		$('input[type="submit"]').val('');


		var single_img_height = $('.single_top img').height();
		$('.grid').css('height', single_img_height+32+"px");


		$('#apuntes-de-rabona,  #cultura-pop, #jiots-tv, #el_pechofrio, #lucha-libre, #tactica, #tirando-guante, #turismo-deportivo, #deportologia').hide();

		$('.apuntes-de-rabona').click(function(){
			// $('.barra_blogs li.change').removeClass('change');

			$(this).addClass('change');
			$('.cultura-pop, .deportologia, .jiots-tv, .el_pechofrio, .lucha-libre, .tactica, .tirando-guante, .turismo-deportivo, .todos').removeClass('change');
			$('#apuntes-de-rabona').show();
			$('#cultura-pop, #deportologia, #jiots-tv, #el_pechofrio, #lucha-libre, #tactica, #tirando-guante, #turismo-deportivo, #todos').hide();
		});

		$('.cultura-pop').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			$(this).addClass('change');
			$('.apuntes-de-rabona, .deportologia, .jiots-tv, .el_pechofrio, .lucha-libre, .tactica, .tirando-guante, .turismo-deportivo, .todos').removeClass('change');
			$('#cultura-pop').show();
			$('#apuntes-de-rabona, #deportologia, #jiots-tv, #el_pechofrio, #lucha-libre, #tactica, #tirando-guante, #turismo-deportivo, #todos').hide();
		});

		$('.deportologia').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			$(this).addClass('change');
			$('.apuntes-de-rabona, .cultura-pop, .jiots-tv, .el_pechofrio, .lucha-libre, .tactica, .tirando-guante, .turismo-deportivo, .todos').removeClass('change');
			$('#apuntes-de-rabona, #cultura-pop, #jiots-tv, #el_pechofrio, #lucha-libre, #tactica, #tirando-guante, #turismo-deportivo, #todos').hide();
			$('#deportologia').show();
		});

		$('.jiots-tv').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			$(this).addClass('change');
			$('.apuntes-de-rabona, .cultura-pop, .deportologia, .el_pechofrio, .lucha-libre, .tactica, .tirando-guante, .turismo-deportivo, .todos').removeClass('change');
			$('#apuntes-de-rabona, #cultura-pop, #deportologia, #el_pechofrio, #lucha-libre, #tactica, #tirando-guante, #turismo-deportivo, #todos').hide();
			$('#jiots-tv').show();
		});

		$('.el_pechofrio').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			$(this).addClass('change');
			$('.apuntes-de-rabona,  .cultura-pop, .deportologia, .jiots-tv, .lucha-libre, .tactica, .tirando-guante, .turismo-deportivo, .todos').removeClass('change');
			$('#apuntes-de-rabona,  #cultura-pop, #deportologia, #jiots-tv, #lucha-libre, #tactica, #tirando-guante, #turismo-deportivo, #todos').hide();
			$('#el_pechofrio').show();
		});

		$('.lucha-libre').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			$(this).addClass('change');
			$('#lucha-libre').show();
			$('.apuntes-de-rabona,  .cultura-pop, .deportologia, .jiots-tv, .el_pechofrio, .tactica, .tirando-guante, .turismo-deportivo, .todos').removeClass('change');
			$('#apuntes-de-rabona,  #cultura-pop, #deportologia, #jiots-tv, #el_pechofrio, #tactica, #tirando-guante, #turismo-deportivo, #todos').hide();

		});

		$('.tactica').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			$(this).addClass('change');
			$('.apuntes-de-rabona,  .cultura-pop, .deportologia, .jiots-tv, .el_pechofrio, .lucha-libre, .tirando-guante, .turismo-deportivo, .todos').removeClass('change');
			$('#tactica').show();
			$('#apuntes-de-rabona,  #cultura-pop, #deportologia, #jiots-tv, #el_pechofrio, #lucha-libre, #tirando-guante, #turismo-deportivo, #todos').hide();
		});

		$('.tirando-guante').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			$(this).addClass('change');
			$('.apuntes-de-rabona,  .cultura-pop, .deportologia, .jiots-tv, .el_pechofrio, .lucha-libre, .tactica, .turismo-deportivo, .todos').removeClass('change');
			$('#tirando-guante').show();
			$('#apuntes-de-rabona,  #cultura-pop, #deportologia, #jiots-tv, #el_pechofrio, #lucha-libre, #tactica, #turismo-deportivo, #todos').hide();
		});

		$('.turismo-deportivo').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			$(this).addClass('change');
			$('.apuntes-de-rabona,  .cultura-pop, .deportologia, .jiots-tv, .el_pechofrio, .lucha-libre, .tactica, .tirando-guante, .todos').removeClass('change');
			$('#turismo-deportivo').show();
			$('#apuntes-de-rabona,  #cultura-pop, #deportologia, #jiots-tv, #el_pechofrio, #lucha-libre, #tactica, #tirando-guante, #todos').hide();
		});




		/*SPRITE TIME*/
		var hour_string = $('.post_time').html();
		//hour_string = hour_string.substring(0, 3);


		/*AJAX FOR BLOGS*/
		/*
		jQuery.ajax({
			type: 'POST',
			url: 'http://localhost/~programacion2/pleyers/wp-admin/admin-ajax.php',
			data: {
				action: 'my_get_posts' // this must be the same with your ajax function name
			},
				success: function(data, textStatus, XMLHttpRequest)
			{
				for (var entry in data)
				{ 
				// get post's attributes
				var postID = data[entry].id;
				var title = data[entry].title;

				// append new post into some list
				$(".videos_stack").append("<li>" + title + "</li>");

				}
			},
				error: function(MLHttpRequest, textStatus, errorThrown)
				{
				},
				complete: function(XMLHttpRequest, textStatus)
				{
				},
			dataType: 'json'
		});*/




		// $('.change').click(function(){
		// 	var test = $(this).find('input[type="hidden"]').val();
		// 	$.ajax({
		// 		type: 	'GET', 
		// 		url: 	'http://localhost/~programacion2/pleyers/wp-admin/admin-ajax.php',
		// 		data: 	{
		// 				action: 'get_blogset',
		// 				test: test,
		// 		},
		// 		success: function(data){
		// 			console.log('success');
		// 			console.log(data);
		// 		},
		// 		error: function(XMLHttpRequest, textStatus, errorThrown){
		// 			console.log(errorThrown);
		// 		}
		// 	});ç

		// }); //end click change

	});//end funcition

})(jQuery);
