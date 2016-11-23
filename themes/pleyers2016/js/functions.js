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
		$('div.sprints_container').css('height', height_screen-300+"px");
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


		$('#apuntes-de-rabona,  #cultura-pop, #jiots-tv, #el_pechofrio, #lucha-libre, #tactica, #tirando-guante, #turismo-deportivo').hide();

		$('.apuntes-de-rabona').click(function(){
			$('.barra_blogs li.change').removeClass('change');
			$(this).addClass('change');
			$('#apuntes-de-rabona').show();
			$('#cultura-pop, #deportologia, #jiots-tv, #el_pechofrio, #lucha-libre, #tactica, #tirando-guante, #turismo-deportivo').hide();
		});

		$('.cultura-pop').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			//$(this).addClass('change');
			$('#cultura-pop').show();
			$('#apuntes-de-rabona, #deportologia, #jiots-tv, #el_pechofrio, #lucha-libre, #tactica, #tirando-guante, #turismo-deportivo').hide();
		});

		$('.deportologia').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			//$(this).addClass('change');
			$('#apuntes-de-rabona, #cultura-pop, #jiots-tv, #el_pechofrio, #lucha-libre, #tactica, #tirando-guante, #turismo-deportivo').hide();
			$('#deportologia').show();
		});

		$('.jiots-tv').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			//$(this).addClass('change');
			$('#apuntes-de-rabona, #cultura-pop, #deportologia, #el_pechofrio, #lucha-libre, #tactica, #tirando-guante, #turismo-deportivo').hide();
			$('#jiots-tv').show();
		});

		$('.el_pechofrio').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			//$(this).addClass('change');
			$('#apuntes-de-rabona,  #cultura-pop, #deportologia, #jiots-tv, #lucha-libre, #tactica, #tirando-guante, #turismo-deportivo').hide();
			$('#el_pechofrio').show();
		});

		$('.lucha-libre').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			//$(this).addClass('change');
			$('#lucha-libre').show();
			$('#apuntes-de-rabona,  #cultura-pop, #deportologia, #jiots-tv, #el_pechofrio, #tactica, #tirando-guante, #turismo-deportivo').hide();
		});

		$('.tactica').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			//$(this).addClass('change');
			$('#tactica').show();
			$('#apuntes-de-rabona,  #cultura-pop, #deportologia, #jiots-tv, #el_pechofrio, #lucha-libre, #tirando-guante, #turismo-deportivo').hide();
		});

		$('.tirando-guante').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			//$(this).addClass('change');
			$('#tirando-guante').show();
			$('#apuntes-de-rabona,  #cultura-pop, #deportologia, #jiots-tv, #el_pechofrio, #lucha-libre, #tactica, #turismo-deportivo').hide();
		});

		$('.turismo-deportivo').click(function(){
			//$('.barra_blogs li.change').removeClass('change');
			//$(this).addClass('change');
			$('#turismo-deportivo').show();
			$('#apuntes-de-rabona,  #cultura-pop, #deportologia, #jiots-tv, #el_pechofrio, #lucha-libre, #tactica, #tirando-guante').hide();
		});


		/*SPRITE TIME*/
		var hour_string = $('.post_time').html();
		hour_string = hour_string.substring(0, 3);


		if($('body').hasClass('single-episodios') ){
			
			console.log('has class');
			var height = $(window).height();
			var ul = $('.single_content a').attr('data-link');

			
		}




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
