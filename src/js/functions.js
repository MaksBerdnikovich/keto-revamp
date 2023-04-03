(function($) {

    'use strict';

    const functions = {

        // Initialization the functions
        init: function() {
            functions.preloader();
            functions.fixedHeader();
            functions.fancybox();
            functions.accordion();
            functions.tabs();
            functions.stickySidebar();
            functions.readMore();
            functions.dbMobileToggle();
        },

        // Page preloader hide
        preloader: function() {

            setTimeout(() => {
                document.body.dataset.loading = "false";
            }, 250);
        },

        fixedHeader: function () {
            let $header = $('.header.header--sticky');

            $(window).scroll(function () {
                if ($(this).scrollTop() > 0) {
                    $header.addClass("fixed");
                } else {
                    $header.removeClass("fixed");
                }
            });
        },

        stickySidebar: function () {
            let $sticky = $('.sticky-sidebar');
            let offset = $sticky.data('offset');

            $(window).scroll(function () {
                if ($(this).scrollTop() > offset) {
                    $sticky.addClass("fixed");
                } else {
                    $sticky.removeClass("fixed");
                }
            });
        },

        fancybox: function () {
            Fancybox.bind("[data-fancybox]", {
                Html: {
                    video: {
                        autoplay: true,
                    },
                    vimeo: {
                        hd: 1,
                        show_title: 1,
                        show_byline: 1,
                        show_portrait: 0,
                        fullscreen: 1,
                        autoplay: true,
                    }
                },
            });
        },

        accordion: function () {
            $(".accordion__title").on("click", function(e) {
                e.preventDefault();

                let $this = $(this);
                if (!$this.hasClass("active")) {
                    $(".accordion__content").slideUp(400);
                    $(".accordion__title").removeClass("active");
                }

                $this.toggleClass("active");
                $this.next().slideToggle(400);
            });
        },

        tabs: function () {
            $('.tabs-navigate__link').on('click', function(e) {
                e.preventDefault();

                $('.tabs-navigate__link').removeClass('active');
                $(this).addClass('active');

                let current = $(this).data('target');
                $('.tabs-content').removeClass('active').filter(current).addClass('active');
            });
        },

        readMore: function () {
            let $wrap = $('.read-more');

            $wrap.each(function (i, el) {
                $(el).on('click', '.read-more__open', function(e) {
                    e.preventDefault();

                    $(this).hide();
                    $(el).find('.read-more__block').addClass('active');
                    $(el).find('.read-more__close').show();
                });

                $(el).on('click', '.read-more__close', function(e) {
                    e.preventDefault();

                    $(this).hide();
                    $(el).find('.read-more__block').removeClass('active');
                    $(el).find('.read-more__open').show();
                });
            });
        },

        dbMobileToggle: function () {
            let $wrap = $('.layout-dashboard .sidebar');
            let $btn = $('.sidebar-toggle');

            $btn.on("click", function(e) {
                $wrap.toggleClass('open');
            })
        }
    };

    // Run the main function
    $(function() {
        functions.init();
    });

})(jQuery);