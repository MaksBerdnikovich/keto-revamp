(function ($) {

    'use strict';

    const summary = {

        // Initialization the functions
        init: () => {
            summary.sliders();
            summary.countdown();
            summary.onResize();
        },

        sliders: () => {
            let isVersion1 = $('.summary').hasClass('v1');
            let $slider = $('.summary-calc__plan-slider');

            $slider.each(function (i, item) {
                let roundRadiusV1 = window.innerWidth > 360 ? 135 : 105;
                let roundRadiusV2 = 85;
                let roundWidthV1 = 20;
                let roundWidthV2 = 14;
                let roundShape = "half-top";
                let roundType = "range";

                $(item).roundSlider({
                    radius: isVersion1 ? roundRadiusV1 : roundRadiusV2,
                    width: isVersion1 ? roundWidthV1 : roundWidthV2,
                    circleShape: roundShape,
                    sliderType: roundType,
                    readOnly: true,
                    min: $(item).data("min"),
                    max: $(item).data("max"),
                    step: $(item).data("step"),
                    value: `${$(item).data("min-val")}, ${$(item).data("max-val")}`
                });
            });
        },

        countdown: () => {
            let time = new Date().getTime() + 18*60000;
            let $countdowns = $('.summary-countdown');

            $countdowns.each(function (i, el) {
                $(el).countdown(time).on('update.countdown', function(event) {
                    $(this).html(event.strftime(
                        `%M<span>min</span> <span class="sep">:</span> %S<span>sec</span>`
                    ));
                });
            });
        },

        onResize: () => {
            let resizeTimer;
            $(window).on('resize', function(e) {
                clearTimeout(resizeTimer);

                resizeTimer = setTimeout(function() {
                    summary.sliders();
                }, 250);
            });
        }
    };

    // Run the main function
    $(function () {
        summary.init();
    });

})(jQuery);