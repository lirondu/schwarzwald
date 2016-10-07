$(function () {
    
    /* Find tallest picture in the gallery */
    $(window).load(function () {
        var tallestPicHeight = 0;

        $('a.img-link img').each(function () {
            var currHeight = $(this).height();

            if (currHeight > tallestPicHeight) {
                tallestPicHeight = currHeight;
            }
        });

        $('div.img-cont').css('height', tallestPicHeight + 'px');
    });
    
    
    
    /*#### INIT BAGUETTEBOX ####*/
    baguetteBox.run('#post_gallery', {
        async: true,
        preload: 3,
        afterShow: function () {
            $('body').css('overflow', 'hidden');
        },
        afterHide: function () {
            $('body').css('overflow', '');
        }
    });
    
    
    
    /*#### ADD CLOSE BTN TO BAGUETTE MOBILE AND DESKTOP ####*/
    $('<span class="close hairline"></span>').appendTo($('div#baguetteBox-overlay'));
    
    
    
    /*#### HANDLE PHOTOSWIPE BUTTONS HOVER ####*/
    $('button#close-button').hover(function () {
        $('span.close').toggleClass('hover');
        $(this).css('opacity', '0');
    }, function () {
        $('span.close').toggleClass('hover');
        $(this).css('opacity', '1');
    });

});