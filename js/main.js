$(function(){
    triggerNavigation();
    triggerScrollTop();
    triggerPreviousNextPost();
    triggerTooltips();
    initMQ();
});

function autoplayVideo(video, autoplay) {
    autoplay = autoplay || false;
    var $carousel = $('.carousel');
    $carousel.on('slide.bs.carousel', function(e) {
        video.pause();
    });

    $(video).on('ended', function (e) {
        setTimeout(function () {
            $carousel.carousel('next');
            $carousel.carousel('cycle');
        }, 1000);
    });
    if (autoplay) {
        $(window).on('scroll.video.trigger resize.video.trigger', function () {
            if ($(video).isOnScreen(0.8)) {
                $(window).off('scroll.video.trigger resize.video.trigger');
                video.play();
            }
        });
    }
}

function triggerNavigation() {
    var $nav_trigger = $('.js-navi-trigger');
    $nav_trigger.on('mouseenter', function (e) {
        $('#'+$(this).data('trigger')).addClass('navi-open-icons');
    });
    $nav_trigger.on('mouseleave', function (e) {
        $('#'+$(this).data('trigger')).removeClass('navi-open-icons');
    });
    $nav = $('.js-nav');
    $nav.on('mouseenter', function (e) {
        $(this).addClass('navi-open-full')
    });
    $nav.on('mouseleave', function (e) {
        $(this).removeClass('navi-open-full')
    });
}

function triggerScrollTop() {
    var $up_trigger = $('.js-up-trigger');
    $up_trigger.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 500);
    });
    $(window).on('scroll.up.trigger resize.up.trigger', function () {
        if ($(this).scrollTop() > $(this).outerHeight() / 2) {
            $up_trigger.fadeIn();
        } else {
            $up_trigger.fadeOut();
        }
    });
}

function triggerPreviousNextPost() {
    var $prevnext_triggers = $('.js-prevnext-trigger');
    var content_height = $('#content').outerHeight();
    $(window).on('scroll.prevnext.trigger resize.prevnext.trigger', function () {
        // TODO: fix for short posts
        if ($(this).scrollTop() > content_height / 3) {
            $prevnext_triggers.fadeIn();
        } else {
            $prevnext_triggers.fadeOut();
        }
    });
}

function triggerTooltips() {
    $('[data-toggle="tooltip"]').tooltip();
}

function initMQ() {
    var queries = [
        {
            context: 'default',
            match: function() {
                $('img').each(function() {
                    if (typeof $(this).data('default') == 'undefined') $(this).attr('data-default', $(this).attr('src'));
                    var small = $(this).data('default');
                    if (small) $(this).attr('src', small);
                });
            }
        },
        {
            context: 'medium',
            match: function() {
                $('img').each(function() {
                    if (typeof $(this).data('default') == 'undefined') $(this).attr('data-default', $(this).attr('src'));
                    var medium = $(this).data('medium');
                    if (medium) $(this).attr('src', medium);
                });
            }
        },
        {
            context: 'wide',
            match: function() {
                $('img').each(function() {
                    if (typeof $(this).data('default') == 'undefined') $(this).attr('data-default', $(this).attr('src'));
                    var large = $(this).data('large');
                    if (large) $(this).attr('src', large);
                });
            }
        }
    ];
    MQ.init(queries);
}

$.fn.isOnScreen = function(percentage) {

    percentage = percentage || 0;

    var win = $(window);

    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();

    var bounds = this.offset();
    var height = this.outerHeight();
    var width = this.outerWidth();
    bounds.right = bounds.left + height;
    bounds.bottom = bounds.top + width;

    return (!(
        viewport.right < bounds.left + width * percentage ||
            viewport.left > bounds.right - width * percentage ||
            viewport.bottom < bounds.top + height * percentage ||
            viewport.top > bounds.bottom - height * percentage
        ));

};
