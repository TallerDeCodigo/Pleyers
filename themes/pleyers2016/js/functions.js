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
		if( $('body').hasClass('post-type-archive-sprints') ){
			$('div.sprints_container').css('height', height_screen-250+"px");	
		}
		


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

		var blogs_arr = ['.apuntes-de-rabona', '.cultura-pop', '.deportologia', '.jiots-tv', '.el_pechofrio', '.lucha-libre', '.tactica', '.tirando-guante', '.turismo-deportivo'];


		$('#apuntes-de-rabona,  #cultura-pop, #jiots-tv, #el_pechofrio, #lucha-libre, #tactica, #tirando-guante, #turismo-deportivo, #deportologia').hide();

		$('.apuntes-de-rabona').click(function(){
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

		$('.anterior').click(function(){
			var data_id = $('.barra_blogs').find('.change').attr('data-id');

			if( $('.barra_blogs').find('.change').attr('data-id') == data_id){
				data_id--;
				$('.barra_blogs').find('.change').removeClass('change');

				$('.barra_blogs li[data-id='+data_id+']').addClass('change');

			};

		});

		$('.siguiente').click(function(){
			var data_id = $('.barra_blogs').find('.change').attr('data-id');

			if( $('.barra_blogs').find('.change').attr('data-id') == data_id){
				data_id++;

				$('.barra_blogs').find('.change').removeClass('change');
				$('.barra_blogs li[data-id='+data_id+']').addClass('change');

			};
		})


		/*FNUCION MANUEL SCROLL*/
		var pag_next=0;
		// $(window).on("load", function() {
		// 	if ($('body').height() < document.documentElement.clientHeight) {
		// 		loader();
		// 	}
		// });

		$(window).scroll(function() {
		   if($(window).scrollTop() + $(window).height() == $(document).height()) {
		       loader();
		   }
		});


		function loader() {
	       console.log("bottom!");
	       pag_next = parseInt($('.paginaqueva:first-of-type').html());
	       pag_next = pag_next+1;
	       $('.paginaqueva').html(pag_next);
	       $('.loader').addClass('active');
	       var code_var = $('code').html();
	       // code_var = JSON.stringify(code_var);
	       console.log(code_var);

	       // $.ajax({
        //        type: "POST",
        //        dataType: "html",
        //        url: '<?php echo esc_url(site_url()); ?>/breaking/page/'+pag_next+'/' ,
        //        data: '',
        //        success: function(data){
        //            var $data = $(data);
        //            $("body").append($data);
        //            $('.paginaqueva').html($('.paginaqueva:first-of-type').html());
        //            $('.loader').removeClass('active');
        //        },
        //        error : function(jqXHR, textStatus, errorThrown) {
        //            // $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        //        }
	       //  });
		}



		/*SPRITE TIME*/
		var hour_string = $('.post_time').html();
		//hour_string = hour_string.substring(0, 3);

		


	});//end funcition

})(jQuery);
