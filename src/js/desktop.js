$(function () {
    
    //Handle CS image hover overlay
    $('div.cs-image-container').hover(function () {
        $(this).find('.cs-overlay').css('display', 'inline-block');
    }, function () {
        $(this).find('.cs-overlay').css('display', 'none');
    });
    
    
    /*#### INIT BAGUETTEBOX ####*/
    baguetteBox.run('#post_gallery', {
        animation: 'fadeIn',
        buttons: true,
        afterShow: function () {
            $('body').css('overflow', 'hidden');
        },
        afterHide: function () {
            $('body').css('overflow', '');
        }
    });
    
    /*#### ADD CUSTOM BTN TO BAGUETTE ####*/
    $('<i class="arrowl" title="arrow icon"></i>').appendTo($('div#baguetteBox-overlay'));
    $('<i class="arrowr" title="arrow icon"></i>').appendTo($('div#baguetteBox-overlay'));
    $('<span class="close hairline"></span>').appendTo($('div#baguetteBox-overlay'));
    
    /*#### HANDLE PHOTOSWIPE BUTTONS HOVER ####*/
    $('button#previous-button').hover(function () {
        $('i.arrowl').toggleClass('hover');
    }, function () {
        $('i.arrowl').toggleClass('hover');
    });

    $('button#next-button').hover(function () {
        $('i.arrowr').toggleClass('hover');
    }, function () {
        $('i.arrowr').toggleClass('hover');
    });

    $('button#close-button').hover(function () {
        $('span.close').toggleClass('hover');
        $(this).css('opacity', '0');
    }, function () {
        $('span.close').toggleClass('hover');
        $(this).css('opacity', '1');
    });

});