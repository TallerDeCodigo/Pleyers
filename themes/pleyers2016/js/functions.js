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

		$( "div.sprints" )
			.mouseover(function() {
				$('body').css('overflow','hidden');
			})
			.mouseout(function() {
				$('body').css('overflow','auto');
		});

		$( "div.menu nav" )
			.mouseover(function() {
				$('body').css('overflow','hidden');
			})
			.mouseout(function() {
				$('body').css('overflow','auto');
		});
		$('.more_destacado .destacado').mouseover(function() {
			var img = $(this).attr('data-image');
		    $('img.post_picture').fadeOut(300, function() {
		        $('img.post_picture').attr("src",img);
		        $('img.post_picture').fadeIn(300);
		    });
		}).mouseout(function() {
			$('img.post_picture').fadeOut(300, function() {
		        $('img.post_picture').attr("src",$('.destacado.nota1').attr('data-image'));
		        $('img.post_picture').fadeIn(300);
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

		$('.single_content p').first().addClass('capital');

		var image_frame_width = $('.img_frame').width();
		$('.match_calendar').css({'width': image_frame_width, 'margin': '0 auto'});
		var single_img_height = $('.single_top img').height();
		$('.grid').css('height', single_img_height+32+"px");

	});//end funcition

})(jQuery);
