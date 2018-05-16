jQuery.noConflict()(function($) {

	'use strict';

	var startPage = parseInt(infinity_load.startPage) + 1,
		maxPages = parseInt(infinity_load.maxPages),
		nextLink = infinity_load.nextLink,
		loadMoreButtonNone = infinity_load.loadMoreButtonNone,
		loadMoreButton = $('.vl-btn-ajax-load'),
		postsContainer = $('.vl-postlist');

		// console.log('next ' + nextLink + ', maxPages ' + maxPages + ', startPage ' + startPage);
		

	loadMoreButton.on('click', function(e){

		e.preventDefault();
		
		if(nextLink == null){
			return;
		}

		var t = $(this);
			
		if(!$(this).hasClass('disabled')){
			t.addClass('loaded');
		}

		if(startPage <= maxPages) {

			$.ajax({
				type: 'POST',
				url: nextLink,
				dataType: 'html',
				success: function(data) {
					var k = $(data),
					g = k.find('.vl-postlist article');

					if(g.length > 0) {

						g.imagesLoaded(function() {

							if(postsContainer.hasClass('isotope')){
								postsContainer.append(g).isotope('appended', g).isotope('layout'); 
								vlOwlSliderBlog();
							} else {
								postsContainer.append(g);
								vlOwlSliderBlog();
							}

						});

						t.removeClass('loaded');

					} else {

						t.removeClass('loaded');

						// No Posts
						t.find('span:not(.icon)').text(loadMoreButtonNone).end().addClass('disabled');


					}

					startPage++;
					nextLink = nextLink.replace(/\/page\/[0-9]?/,'/page/'+ startPage);

					if(startPage <= maxPages) {

						t.removeClass('loaded');

					} else {
							
						t.removeClass('loaded');

						// No Posts
						t.find('span:not(.icon)').text(loadMoreButtonNone).end().addClass('disabled');

						$('.vl-btn-ajax-load').on('click', function(){

							var quotes = infinity_load.loadMoreButtonText,
								quotesRandom = quotes[Math.floor( Math.random() * quotes.length )];

							$(this).find('span:not(.icon)').text(quotesRandom);

						});
					}

				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
				}
			});
		}

	});

});
