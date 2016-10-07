/* global ga */
$(function () {

    //Globals
    var activeMenuPage = $('input#active-menu-page').val();


    //Handle active menu item
    $('ul#page-menu').find('li a').each(function () {
        if ($(this).siblings('input#menu-page-id').val() === activeMenuPage) {
            $(this).addClass('active');
            return false;
        }
    });


    /*#### REMOVE GALLERY EDITOR ELEMENTS FROM GALLERY (CLEAN) ####*/
    var galleryTitle = $('#post_gallery').find('#post_gallery_title').val();

    $('#post_gallery').find('div.img-cont').each(function () {
        $(this).find('a.pic-number').remove();
        $(this).find('button').remove();

        $(this).find('a').has('img').each(function () {
            var currTitle = $(this).attr('title');

            if (!$.trim(currTitle)) {
                currTitle = $(this).children('img').attr('title');
            }

            if (!$.trim(currTitle)) {
                currTitle = galleryTitle;
            }

            $(this).attr('title', currTitle);
        });

    });
	
	
	// Google Analytics
	(function (i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function () {
			(i[r].q = i[r].q || []).push(arguments)
		},
		i[r].l = 1 * new Date(); a = s.createElement(o),
		m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
	})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-72241455-1', 'auto');
	ga('send', 'pageview');

});