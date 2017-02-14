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
					slideWidth: 305,
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

				$('.copylink').on('click', function() {
					console.log('click');
		        	var copyTextarea = $(this).parent().parent().find('textarea');
	        	  	copyTextarea.focus().select();
		        	  try {
		        	    var successful = document.execCommand('copy');
		        	    var msg = successful ? 'successful' : 'unsuccessful';
		        	    $(this).parent().find('.alerta').show();
		        	  } catch (err) {
		        	    console.log('Oops, unable to copy');
		        	  }
	        	  	setTimeout(function() {
	        	  		 $('.alerta').hide();
	        	  	}, 1000);
		        });//end copy link
	

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
					    	var bodhei = ($('body').height());

					    	referencia = referencia / bodhei*0.8;

					    	$('.scrollable .sprints_container').scrollTop( referencia );
					        $('.anchor_tags').each(function () {
					        	var anterior = $('.sprints_container div#'+aidi).height();

					            var top = window.pageYOffset;
					            var distance = top - $(this).offset().top;
					            var hash = $(this).attr('href');
					            var site_url = document.location.origin;

					            hash = hash.replace(site_url+"/", '');

					            if (distance < 150 && distance > -150 && currentHash != hash) {
					            	aidi = $(this).attr('data');
					            	if(history.pushState) {
					            		history.pushState(null, null, "/"+hash);
					            		// ga('send', { hitType: 'pageview', page: location.pathname });
					            	}else { 
					            		window.location.hash = hash;
					            		// ga('send', { hitType: 'pageview', page: location.pathname });
					            	}
					                currentHash = hash;
					                es = $('.sprints_container div#'+aidi);
					                $('.sprints_container div').removeClass('selected');
					                es.addClass('selected');
					                alto_post = es.height();
					            }
					        });
					    });
					});
				}

		/*LOAD POSTS*/
		if( $('body').hasClass('post-type-archive-sprints')){
				var pag_next=0;
				$(window).scroll(function() {
				   if($(window).scrollTop() + $(window).height() == $(document).height()) {
			       console.log("bottom!");
			       pag_next = parseInt($('.paginaqueva:first-of-type').html());
			       console.log(pag_next);
			       pag_next = pag_next+1;
			       $('.paginaqueva').html(pag_next);
			       $('.loader').addClass('active');
			       $.ajax({
		               type: "GET",
		               dataType: "html",
		               url: 'https://lospleyers.com/sprints/page/'+pag_next+'/' ,
		               data: '',
		               success: function(data){
		                   var $data = $(data);
		                   // console.log($data);
		                   $.each( $data, function( key, value ) {
		                   		// console.log(value);
		                   		if( $(value).hasClass('appender') ){
		                   			 // console.log(pag_next);

	                   				$('.right_container').append($($(value).html()).find('.right_container').html());
	                   				$('.the_scroll').append($($(value).html()).find('.the_scroll').html());
	                   				$('.loader').removeClass('active');
		                   		}
		                   });
		               },
		               error : function(jqXHR, textStatus, errorThrown) {
		               }
			        });
				   }

				   if($(window).scrollTop() == 0 &&  parseInt($('.paginaqueva_up').html()) > 1 )  {
	       		       console.log("UP!");
	       		       pag_next = parseInt($('.paginaqueva_up').html());

	       		       console.log(pag_next);

	       		       pag_next = pag_next-1;
	       		       $('.paginaqueva_up').html(pag_next);
	       		       $('.loader').addClass('active');
	       		       $.ajax({
	       	               type: "GET",
	       	               dataType: "html",
	       	               url: 'https://lospleyers.com/sprints/page/'+pag_next+'/',
	       	               data: '',
	       	               success: function(data){
	       	                   var $data = $(data);
	       	                   // console.log($data);
	       	                   $.each( $data, function( key, value ) {
	       	                   		// console.log(value);
	       	                   		if( $(value).hasClass('appender') ){
	       	                   			 // console.log(pag_next);

	                          				$('.right_container').prepend('<div class="medir">'+$($(value).html()).find('.right_container').html()+'</ div>');
	                          				$('.the_scroll').prepend($($(value).html()).find('.the_scroll').html());
	                          				$('.loader').removeClass('active');
	                          				$(window).scrollTop( $('div.medir').height());
	       	                   		}
	       	                   });
	       	               },
	       	               error : function(jqXHR, textStatus, errorThrown) {
	       	               }
	       		        });
				   }
				});

				

			      
			}//endif has class


			/*LAZY LOAD ON EPISODIOS*/
			if( $('body').hasClass('single-episodios') ){
				var pag_next=0;
		        var show_name = $('div.taxonomia').attr('data-name');
				$(window).scroll(function() {
				   if($(window).scrollTop() + $(window).height() == $(document).height()) {
				       console.log("bottom!");
			       pag_next = parseInt($('.paginaqueva').html());
			       pag_next = pag_next+1;

			       $('.paginaqueva').html(pag_next);
			       $('.loader').addClass('active');

			       $.ajax({
		               type: "GET",
		               dataType: "html",
		               url: 'https://lospleyers.com/paginas/page/'+pag_next+'/?e='+show_name,
		               data: '',
		               success: function(data){
		                   var $data = $(data);
		                   // console.log($data);
		                   $.each( $data, function( key, value ) {
		                   		// console.log(value);
		                   		if( $(value).hasClass('appender') ){
	                   				$('.right_container').append($($(value).html()).find('.right_container').html());
	                   				$('.the_scroll').append($($(value).html()).find('.the_scroll').html());
	                   				$('.loader').removeClass('active');
		                   		}
		                   });
		               },
		               error : function(jqXHR, textStatus, errorThrown) {
		               }
			        });
				   }
				   if($(window).scrollTop() == 0 &&  parseInt($('.paginaqueva_up').html()) > 1 )  {
				       console.log("UP!");
			       pag_next = parseInt($('.paginaqueva_up').html());

			       console.log(pag_next);

			       pag_next = pag_next-1;
			       $('.paginaqueva_up').html(pag_next);
			       $('.loader').addClass('active');
			       $.ajax({
		               type: "GET",
		               dataType: "html",
		               url: 'https://lospleyers.com/paginas/page/'+pag_next+'/?e='+show_name,
		               data: '',
		               success: function(data){
		                   var $data = $(data);
		                   // console.log($data);
		                   $.each( $data, function( key, value ) {
		                   		// console.log(value);
		                   		if( $(value).hasClass('appender') ){
	                   				$('.right_container').prepend('<div class="medir">'+$($(value).html()).find('.right_container').html()+'</ div>');
	                   				$('.the_scroll').prepend($($(value).html()).find('.the_scroll').html());
	                   				$('.loader').removeClass('active');
	                   				$(window).scrollTop( $('div.medir').height());
		                   		}
		                   });
		               },
		               error : function(jqXHR, textStatus, errorThrown) {
		               }
			        });

				   }
				});


			       
			}//end single episodios



	});
}

docReady();
	
})(jQuery);
