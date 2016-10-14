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



		/*** OVERLAY ***/

		var destacado_height = $('.wrapper-destacado').height();
		console.log(destacado_height);

		$('.destacado .over').height(destacado_height);

		$('.destacado').hover(function(){
			$('.destacado .over').hide();
		}, function(){
			$('.destacado .over').show();
		});


		$('.nota').hover(function(){
			$(this).find('.over').hide();
		}, function(){
			$(this).find('.over').show();
		});


		/*** SUBMENUS ***/

		$('.has-children').hover(function(){
			var datashow = $(this).attr('data');
			$('#'+datashow).show();
		}, function(){
			var datashow = $(this).attr('data');
			$('#'+datashow).hide();
		});


		/*** FITVIDS ***/

		$('.container').fitVids();



		if($(window).width() < 769 ){

			/*** POST THUMBNAIL SQUARE ***/

			$('.thumbnota').each(function(){
				var squareimage = $(this).data('square');
				$(this).attr('src', squareimage);
			});

			$('.menu_control').on('click', function(){
				var imagen_abrir = $(this).attr('data-opened');
				var imagen_cerrar = $(this).attr('data-closed');
				if($(this).hasClass('closed')){
					$(this).addClass('opened');
					$(this).removeClass('closed');
					$(this).attr('src', imagen_cerrar);
					$('.mobile-nav').slideDown();
				} else {
					$(this).addClass('closed');
					$(this).removeClass('opened');
					$(this).attr('src', imagen_abrir);
					$('.mobile-nav').hide();
				} 
			});

		} else {

			/*** ISOTOPE ***/


			var alturapornota = $('.nota').find('img').height();
			// $('.nota .over').height(alturapornota);
			
		}

		var $grid = $('.posts-pool').isotope({
			itemSelector: '.nota',
			masonry: {
				columnWidth: 334,
				gutter: 10
			}
		});

		// $grid.imagesLoaded().progress( function() {
		//   $grid.isotope('layout');
		// });




	});

})(jQuery);
