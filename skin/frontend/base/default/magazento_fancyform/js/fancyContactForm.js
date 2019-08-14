(function ($) {



    function bubbleLetter(ev, eft, letterFadingOutTime, letterFadingInTime, letterMovingTime, letter) {   
        var newletter = '<div class="fcf-alphabet">' + letter + '</div>';   
        var randomLeftStart = Math.floor(Math.random() * ($(window).width()));   
        var randomLeftEnd = Math.floor(Math.random() * (ev.width() - 40));randomLeftEnd += ev.offset().left;   
        var randomTopEnd = Math.floor(Math.random() * (eft.height() / 2 - 40));randomTopEnd += eft.offset().top + (eft.height() / 2);      
        var closestX = (randomLeftStart > (ev.offset().left + ev.width() / 2)) ? (ev.offset().left + ev.width() - 40) : (ev.offset().left + 40);      
        if (Math.abs((randomTopEnd) / (randomLeftEnd - randomLeftStart)) > Math.abs((eft.offset().top) / (closestX - randomLeftStart))) {randomTopEnd = eft.offset().top + (eft.height() / 2);randomLeftEnd = eft.offset().left + (eft.width() / 2);      
        }$(newletter).appendTo('body').css({
            'top': 0,
            'left': randomLeftStart + 'px'
        }).fadeIn(letterFadingInTime).animate({'top': randomTopEnd + 'px',
               'left': randomLeftEnd + 'px',
               'fontSize': '26px',
               'width': '40px',
               'height': '40px'   
        },
        letterMovingTime).fadeOut(letterFadingOutTime, function () {
            $(this).remove();
        });   
    }



    $.fn.fancyContactForm = function (options) {
        
        
        var defaults = {
            urlSubmit: 'test.php',
            methodSubmit: 'POST',
            afterSubmit: function (res) {},
            error: function (request, status, error) {},
            stampAppearingTime: 1000,
            dataType: "html",
            textAppearingTime: 1000,
            letterMovingTime: 3000,
            envelopeOpeningTime: 1000,
            envelopeClosingTime: 1000,
            letterFadingInTime: 300,
            letterFadingOutTime: 300,
            thanksText: function (res) {
                return 'Well Done, thank you for your message !<br/>Sent : ' + res
            }
        };
        
        var options = $.extend(defaults, options);
        
        this.each(function () {

            var $cont = $(this),
            eft = $cont.find('.fcf-envelope-ft'),
            ev = $cont.find('.fcf-envelope'),
            form = $cont.find('.fcf-contact-form');

            form.find('input, textarea').keypress(function (e) {

                bubbleLetter(ev, eft, options.letterFadingOutTime, options.letterFadingInTime, options.letterMovingTime, String.fromCharCode(e.which));

                   
            });

            ev.animate({
                'height': '740px'
            },
            options.envelopeOpeningTime);

            form.submit(function (e) {
                var allow_send_form = $("#hideit").val();
                if (allow_send_form == 1) {
                 
                        e.preventDefault();
                        $.ajax({
                            url: options.urlSubmit,
                            type: options.methodSubmit,
                            data: $(form).serialize(),
                            dataType: options.dataType,
                            success: function (res) {
                                options.afterSubmit(res);
                                $('.fcf-alphabet').remove();
                                //console.log(ev.offset().left);
                                ev.animate({
                                    'height': '400px'
                                },
                                options.envelopeClosingTime).css('marginLeft', (ev.offset().left - $('.fcf-contact').offset().left) + 'px').animate({
                                    'marginLeft': $(window).width() + 'px'
                                },
                                function () {
                                    var confirmation = '<div class="fcf-confirmation">' + options.thanksText(res) + '</div>';
                                    var stamp = '<div class="fcf-stamp"><div class="fcf-stamp-borders"></div><div class="fcf-lines"></div></div>';
                                    $(stamp).css({
                                        'opacity': '0',
                                        'position': 'absolute'
                                    }).appendTo('.fcf-contact');
                                    $(confirmation).css({
                                        'opacity': '0',
                                        'position': 'absolute'
                                    }).appendTo('.fcf-contact');

                                    var h = $('.fcf-confirmation').height();
                                    var w = $('.fcf-confirmation').width();
                                    var hstamp = $('.fcf-stamp').height();
                                    var wstamp = $('.fcf-stamp').width();

                                    $('.fcf-stamp').css({
                                        'top': '-200px',
                                        'left': ((($('.fcf-contact').width() - wstamp) / 2)) + 'px'
                                    }).animate({
                                        'opacity': 1,
                              //          'top': (($('.fcf-contact').height() - 2 * h) / 2) - hstamp + 'px'
                                           'top':0 
                                    },
                                    options.stampAppearingTime);

                                    $('.fcf-confirmation').css({
                                        'top': (($('.fcf-contact').height() - h) / 2) + 'px',
                                        'left': -w + 'px'
                                    }).animate({
                                        'opacity': 1,
                                        'left': (($('.fcf-contact').width() - w) / 2) + 'px'
                                    },
                                    options.textAppearingTime);

                                    ev.remove();

                                });
                            },
                            error: function (request, status, error) {
                                options.error(request, status, error);
                            }
                        });                 
                }
                
                
            });

            $(window).resize(function () {

                var h = $('.fcf-confirmation').height();
                var w = $('.fcf-confirmation').width();
                var hstamp = $('.fcf-stamp').height();
                var wstamp = $('.fcf-stamp').width();

                $('.fcf-stamp').css({
                    'top': (($('.fcf-contact').height() - 2 * h) / 2) - hstamp + 'px',
                    'left': ((($('.fcf-contact').width() - wstamp) / 2)) + 'px'
                });

                $('.fcf-confirmation').css({
                    'top': (($('.fcf-contact').height() - h) / 2) + 'px',
                    'left': (($('.fcf-contact').width() - w) / 2) + 'px'
                })

            });

        });
    };
})(jQuery);