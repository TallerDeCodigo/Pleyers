(function($){

	$(window).on("load resize", function() {

		var height_screen = $(window).height();

		if ($('body').hasClass('post-type-archive-sprints') || $('body').hasClass('single-sprints')) {
			$('.sprints_container').height(height_screen-254);
		} else if ($('body').hasClass('single-episodios')) {
			$('.sprints_container').height(height_screen-192);
		}

		$('.carousel').css('opacity','1');

	});

	function docReady(){

	"use strict";

	$(function(){
				console.log('hello from functions.js');

				$('.carousel').bxSlider({
					mode: 'horizontal',
					slideWidth: 290,
					minSlides: 2,
					maxSlides: 4,
					moveSlides: 1,
					infiniteLoop: true,
					speed: 1000,
				    pause: 0,
				    auto: false,
				    pager: false,
				    controls: true
				});

				$('body').fitVids();

				$("div.sidebar.scrollable")
					.mouseover(function() {
						if ($(this).find('.sprints_container').height() < $(this).find('.the_scroll').height()) {
							$('body').css('overflow', 'hidden');
						}
					})
					.mouseout(function() {
						$('body').css('overflow', 'auto');
					});

				$(document).on('click', '.copylink', function() {
		        	var copyTextarea = $(this).parent().find('textarea');
		        	  copyTextarea.focus().select();
		        	  try {
		        	    var successful = document.execCommand('copy');
		        	    var msg = successful ? 'successful' : 'unsuccessful';
		        	    console.log('Copying text command was ' + msg);
		        	  } catch (err) {
		        	    console.log('Oops, unable to copy');
		        	  }
		        });

				$(document).on('click', '.no_play', function() {
					$(this).find('iframe').attr('src','https://www.youtube.com/embed/'+$(this).attr('video-id')+'?modestbranding=1&autohide=1&showinfo=0&autoplay=1');
					$(this).removeClass('no_play');
					$(this).find('img').fadeOut(500);
				});

				 $(document).on('click', 'button.dropbtn', function() {
		        	$('#myDropdown').addClass('show');
		        });

				$(document).on('click', '#myDropdown a', function() {
		        	$('#myDropdown').removeClass('show');
		        	$('#myDropdown a').removeClass('selected');
		        	$(this).addClass('selected');
		        	$('button.dropbtn').html($(this).html());
		        	$('.videos_stack').hide();
		        	$('#'+$(this).attr('data')).show();
		        	console.log($(this).attr('data'));
		        });

		        $('nav.blog_social a').attr('target','_blank');

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
				var width_screen = $(window).width();

				var orig_title = $('.nota1 a h3').html();
				var orig_tag = $('.nota1 a span').html();
				var ch_tag = '';

				$('.more_destacado .destacado').mouseover(function() {
					var img = $(this).attr('data-image');
					var title = $(this).find('a h3').html();
					var tag = $(this).find('span a').html();
					if(tag == undefined){ch_tag = '';}else{ch_tag = tag}
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
							$('body').css('overflow','auto');
						}, 260);
					} else {
						$('.overscreen').show();
						$('body').css('overflow','hidden');
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
						$('body').css('overflow','auto');
					}, 260);
				});

				$('.balloon').on('click', function(){
					$('.globo').slideDown();
					$('.balloon').append($('.globo'));
				});
				$('.globo').mouseleave(function(){
					$('.globo').slideUp();
				});

				$('input[type="submit"]').val('');

				/*** NAVEGACIÓN */
				/*HISTORY URL HKN*/

				var newHash = '';

				if(width_screen > 800){
					var aidi = 0;
					var es;
					var scroll_num = 0;
					var lastScrollTop = 0; 
					var cero = 0;
					var alto_post;
					$(function () {
					    var currentHash = "initial_hash";
					    $(window).scroll(function () {

					    	$('.sidebar.scrollable').css('margin-top',$(window).scrollTop()+'px');
					    	var referencia = $('.the_scroll').height()*$(window).scrollTop();
					    	referencia = referencia/$('body').height();
					    	$('.scrollable .sprints_container').scrollTop( referencia );

					        $('.anchor_tags').each(function () {
					        	var anterior = $('.sprints_container div#'+aidi).height();

					            var top = window.pageYOffset;
					            var distance = top - $(this).offset().top;
					            var hash = $(this).attr('href');

					            if (distance < 150 && distance > -150 && currentHash != hash) {
					            	aidi = $(this).attr('data');
					            	if(history.pushState) {
					            		history.pushState(null, null, "/"+hash);
					            		ga('send', { hitType: 'pageview', page: location.pathname });
					            	}else { 
					            		window.location.hash = hash;
					            		ga('send', { hitType: 'pageview', page: location.pathname });
					            	}
					                currentHash = hash;
					                es = $('.sprints_container div#'+aidi);
					                $('.sprints_container div').removeClass('selected');
					                es.addClass('selected');

					                alto_post = es.height();

									// var st = $(window).scrollTop();
									
									// if (st > lastScrollTop){
									// 		$('#sidebar_scroll').animate({scrollTop: scroll_num }, 250);
									// 		$('#blog_scroll').animate({scrollTop: scroll_num }, 250);
									// 		$('#episode_scroll').animate({scrollTop: scroll_num }, 250);
									// 		scroll_num += alto_post ;
									// 		console.log('down'+scroll_num);
									// } else {
									//    	if(cero == 0){
									//    		scroll_num-=alto_post ;
									//    		cero++;
									//    	}
									//         scroll_num -= alto_post ;
									//   	$('#sidebar_scroll').animate({scrollTop: scroll_num }, 250);
									//   	$('#blog_scroll').animate({scrollTop: scroll_num }, 250);
									//   	$('#episode_scroll').animate({scrollTop: scroll_num }, 250);
									// 		console.log('up'+scroll_num);
									// }

									// lastScrollTop = st;

					            }
					        });
					    });
					});

				}

	});

	}

	docReady();
	
})(jQuery);
