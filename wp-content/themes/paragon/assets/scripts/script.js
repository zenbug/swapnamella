jQuery.noConflict()(function($) {
	'use strict';
	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iPhone: function() {
			return navigator.userAgent.match(/iPhone/i);
		},
		iPad: function() {
			return navigator.userAgent.match(/iPad/i);
		},
		iPod: function() {
			return navigator.userAgent.match(/iPod/i);
		},
		iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};
	
	$(document).ready(function() {

		// Preloader

		if($('.vl-preloader-outer').length){
			NProgress.configure({
				minimum: 0.08,
				easing: 'linear',
				positionUsing: '',
				speed: 200,
				trickle: true,
				trickleSpeed: 200,
				showSpinner: false,
				barSelector: '[role="bar"]',
				spinnerSelector: '[role="spinner"]',
				parent: 'body',
				template: '<div class="bar" role="bar"></div>'
			});

			NProgress.start();  

			setTimeout(function(){
				NProgress.done();
				$('.vl-preloader-outer').fadeOut(500);
			},500);
		}


		vlPrimaryMenu();
		vlPortfolio();
		vlWoocommerce();
		vlBloglistMasonry();
		vlOwlSliderBlog();
		vlBackToTop();
        vlSidebarFixed();
        vlDemoColors();


		$('body').fitVids();
		$('a.is-popup').lightcase({
			transition: 'scrollVertical',
			speedIn: 400,
			speedOut: 300,
		});

		vl_alert_shortcode();
		vl_collage_shortcode();
		vl_counter_up_shortcode();
		vl_progress_bar_shortcode();
		vl_image_slider_shortcode();
		vl_circle_progress_bar_shortcode();
		vl_testimonial_shortcode();
		vl_sidebar_fixed_shortcode();

	});

	function vlDemoColors(){
    	$('.vl-theme-demo-open').on('click', function() {
			$(this).parent().toggleClass('is-open');
        });

        $('.vl-theme-demo-colors a').on('click', function(e) {

        	e.preventDefault();

            var color = $(this).attr('data-color');
            var url = window.location.href.split('?')[0];
            $(location).attr('href', url + '?general_color=' + color);

        });
	}

	function vlSidebarFixed() {
        $('.vl-sidebar-sticky > div, .vl-content-sticky > div').theiaStickySidebar({
            containerSelector: '.vl-site-outer',
            additionalMarginTop: 30,
            additionalMarginBottom: 30
        });

    }
	function vl_sidebar_fixed_shortcode() {
		$('.vl-content-fixed > div, .vl-sidebar-fixed > div').theiaStickySidebar({
			containerSelector: '.vl-sticky-sidebar-parent',
			additionalMarginTop: 30,
			additionalMarginBottom: 30
		});
	}

	function vl_circle_progress_bar_shortcode() {
		var element = $('.vl-circle-progress-bar'),
			duration = 750;

		element.each(function() {
			$(this).one('inview', function() {

				var t = $(this),
					circle = t.find('.vl-circle-progress-bar--circle'),
					percent = circle.data('vcvalue'),
					thickness = circle.data('vcthickness'),
					trackcolor = circle.data('vctrackcolor'),
					barcolor = circle.data('vcbarcolor'),
					size = circle.data('vcsize');

				t.circleProgress({
					value: percent / 100,
					size: size,
					thickness: thickness,
					startAngle: -(3 * Math.PI) / 2,
					fill: barcolor,
					emptyFill: trackcolor,
					animation: {
						duration: duration
					}
				});

				t.find('.vl-circle-progress-bar--circle span').countTo({
					from: 0,
					to: percent,
					speed: duration,
					refreshInterval: 30
				});
			});
		});
	}





	function vl_testimonial_shortcode() {
		var element = $('.owl-testimonial-shortcode');

		element.each(function(){
			$(this).owlCarousel({
			    margin: $(this).data('margin'),
			    loop: true,
			    autoWidth: false,
			    items: $(this).data('items'), 
			    nav: false,
			    dots: false,
			    autoHeight: $(this).data('auto-height'),
			});
		});


	}



	function vl_image_slider_shortcode() {
		var element = $('.owl-slider-shortcode');

		element.each(function(){
			$(this).owlCarousel({
			    margin: 0,
			    loop: true,
			    autoWidth: false,
			    items: 1, 
			    nav: $(this).data('arrows'),
			    dots: $(this).data('dots'),
			    navText: ['<i class="ion ion-android-arrow-back"></i>', '<i class="ion ion-android-arrow-forward"></i>'],
			
			});
		});
	}


	function vl_progress_bar_shortcode() {
		var element = $('.vl-progress-bar'),
			duration = 750;
		element.each(function() {
			$(this).one('inview', function() {
				var t = $(this),
					percent = parseInt(t.find('.vl-progress-bar--percent').text(), 10);
				t.find('.vl-progress-bar--inner, .vl-progress-bar--percent').animate({
					width: percent + '%'
				}, duration);
				t.find('.vl-progress-bar--percent').countTo({
					from: 0,
					to: percent,
					speed: duration,
					refreshInterval: 30
				});
			});
		});
	}

	function vl_counter_up_shortcode() {
		var element = $('.vl-counter-up');
		element.each(function() {
			$(this).one('inview', function() {
				var t = $(this),
					number = parseInt(t.find('.vl-counter-number').text(), 10);
				t.find('.vl-counter-number').countTo({
					from: 0,
					to: number,
					speed: 1200,
					refreshInterval: 30
				});
			});
		});
	}

	function vl_collage_shortcode() {
		var element = $('.vl-collage-list');
		element.imagesLoaded(function() {
			element.removeWhitespace().collagePlus({
				'allowPartialLastRow': false,
				'direction': 'vertical',
				'targetHeight': element.data('target-height'),
			});
		});
	}

	var resizeTimer = null;
	$(window).on('resize', function() {
		if (resizeTimer) {
			clearTimeout(resizeTimer);
		}
		resizeTimer = setTimeout(vl_collage_shortcode, 200);
	}).trigger('resize');





	function vl_alert_shortcode() {
		var element = $('.vl-alert.vl-alert-dismissible'),
			close = $('.vl-alert.vl-alert-dismissible .vl-alert-close');
		close.on('click', function() {
			$(this).parent(element).remove();
			return false;
		});
	}


	function vlPrimaryMenu(){

		var element = $('.vl-sidebar-navigation nav ul.menu');


		element.on('click', 'li.menu-item-has-children > a', function(){
			
			$(this).parent('li.menu-item-has-children').toggleClass('sub-active');
			$(this).next('ul.sub-menu').slideToggle(300);

			return false;

		});


		$('.vl-mobile-btn').on('click', function() {
			$(this).toggleClass('is-active');
			element.slideToggle(300);
		});
	}

	function vlWoocommerce() {

		var shopContainer = $('.vl-shop-masonry-wrapper');
		shopContainer.imagesLoaded(function() {
			shopContainer.isotope({
				itemSelector: 'article',
				layoutMode: 'masonry',
				transitionDuration: '150ms',
			});
		});

		var slider = $('.owl-slider-shop');

		slider.owlCarousel({
		    margin: 0,
		    loop: true,
		    autoWidth: false,
		    items: 1,
		    nav: true,
		    dots: true,
		    navText: ['<i class="ion ion-android-arrow-back"></i>', '<i class="ion ion-android-arrow-forward"></i>']
		});

		$('body').on('click', '.quantity .plus, .quantity .minus', function(){
			
            var $this = $(this),
                $qty = $this.siblings('.qty'),
                current = parseInt($qty.val(), 10),
                min = parseInt($qty.attr('min'), 10),
                max = parseInt($qty.attr('max'), 10);

            min = min ? min : 1;
            max = max ? max : current + 1;

            if ($this.hasClass('minus') && current > min) {
                $qty.val(current - 1);
                $qty.trigger('change');
            }
            
            if ($this.hasClass('plus') && current < max) {
                $qty.val(current + 1);
                $qty.trigger('change');
            }

            return false;
        });

		var cartSidebar = $('.vl-cart-sidebar');

		$('body').on('click', '.vl-cart-sidebar .vl-icon-cart', function(){
			cartSidebar.toggleClass('is-open');
		});
	
        $(document).on('keyup', function(e) {
            if (e.keyCode == 27) {
                cartSidebar.removeClass('is-open');
            }
        });



	}

	function vlPortfolio() {

		var portfolioContainer = $('.vl-portfolio-masonry-wrapper'),
			portfolioFilterContainer = $('.vl-sidebar-portfolio-filter'),
			portfolioSortingContainer = $('.vl-sidebar-portfolio-sorting');

		// http://isotope.metafizzy.co/sorting.html

		portfolioContainer.imagesLoaded(function() {
			portfolioContainer.isotope({
				itemSelector: 'article',
				layoutMode: 'masonry',
				transitionDuration: '150ms',
				getSortData: {
                    date: '[data-date]',
                    views: '[data-views]',
                }
			});
		});


		portfolioSortingContainer.find('a').on('click', function() {

			portfolioSortingContainer.find('a').removeClass('is-active');
			$(this).addClass('is-active');

			portfolioContainer.isotope('reloadItems').isotope({
				sortBy: $(this).attr('data-sort'),
				sortAscending: false
			});

			return false;

		});


		portfolioFilterContainer.find('a').on('click', function() {

			portfolioFilterContainer.find('a').removeClass('is-active');
			$(this).addClass('is-active');

			portfolioContainer.isotope({
				filter: $(this).attr('data-filter')
			});
			return false;
			
		});
	}



	function vlBloglistMasonry() {
		var bloglistContainer = $('.vl-postlist-masonry');

		bloglistContainer.imagesLoaded(function() {
			bloglistContainer.isotope({
				itemSelector: 'article',
				layoutMode: 'masonry',
				transitionDuration: '150ms'
			});
		});

	}

	window.vlOwlSliderBlog = function(){
		var slider = $('.owl-slider-blog');

		slider.owlCarousel({
		    margin: 0,
		    loop: true,
		    autoWidth: false,
		    items: 1,
		    nav: true,
		    dots: true,
		    navText: ['<i class="ion ion-android-arrow-back"></i>', '<i class="ion ion-android-arrow-forward"></i>']
		});
	}

	function vlBackToTop(){

		var element = $('.vl-back-to-top'),
			offset = 200,
			duration = 350;

		$(window).on('scroll', function() {
		   	if(($(window).scrollTop() + $(window).height() > $(document).height() - offset) && $(window).scrollTop() > offset + 50) {
		       	element.removeClass('is-hidden').addClass('is-visible');
		   	} else{
				element.removeClass('is-visible').addClass('is-hidden');
		   	}
		});

		element.on('click', function() {
			$('html, body').animate({
				scrollTop: 0
			}, duration);
			return false;
		});


	}


});