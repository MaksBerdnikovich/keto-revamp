(function($) {

    'use strict';

    const quiz = {

        // Initialization the functions
        init: function() {
            quiz.datepicker();
            quiz.validation();
        },


        datepicker: function () {
            $('[data-toggle="datepicker-quiz"]').datepicker({
                date: new Date(),
                startDate: new Date(),
                endDate: new Date(2022, 11, 30),
                format: 'yyyy-mm-dd',
            });
        },

        // Owl quiz carousel validation
        validation: function() {
            const $quiz = $('.quiz-section');
            const $quizForm = $('.keto-calc-form');
            const $quizCarousel = $('.quiz__carousel');
            const $quizCarouselCurr = $('.quiz__nav-page-cur');
            const $quizCarouselSize = $('.quiz__nav-page-all');
            const $quizCarouselPrev = $('.quiz__prev-btn');
            const $quizCarouselNext = $('.quiz__next-btn');
            const $quizCarouselSubmit = $('.quiz__submit-btn');
            const $quizCarouselProgress = $('.quiz__progress-bar');
            const $step0 = $('.quiz__item--step0');
            const $step1 = $('.quiz__item--step1');
            const $step2 = $('.quiz__item--step2');
            const $step3 = $('.quiz__item--step3');
            const $step4 = $('.quiz__item--step4');
            const $step5 = $('.quiz__item--step5');
            const $step6 = $('.quiz__item--step6');
            const $step7 = $('.quiz__item--step7');
            const $step8 = $('.quiz__item--step8');
            const $step9 = $('.quiz__item--step9');
            const $step10 = $('.quiz__item--step10');
            const $formImperial = $('.quiz__item-form--imperial');
            const $formMetric = $('.quiz__item-form--metric');
            const $preloader = $('.preloader', $quiz);

            let currIndex = 0, prevIndex = 0, smartSpeed = 500, timeout = 500;

            // Progress
            const progress = (e) => {
                let current = e.item.index + 1;
                let count = e.item.count;

                return Math.round((100 / count) * current);
            };

            $quizCarousel.owlCarousel({
                loop: false,
                items: 1,
                rewind: false,
                touchDrag: false,
                mouseDrag: false,
                smartSpeed: smartSpeed,
                autoHeight: true,
                nav: false,
                dots: false,

                onInitialized: (e) => {
                    //Init default elements
                    let current = e.item.index + 1;
                    let count = e.item.count;

                    $quizCarouselCurr.html(current);
                    //$quizCarouselSize.html(count);
                    $quizCarouselProgress.css('width', Math.round(100 / count) + '%');

                    //Preloader hide
                    $preloader.hide();
                }
            })
            .on('changed.owl.carousel', (e) => {
                // Change default elements
                currIndex = getCurrIndex(e);
                $quizCarouselProgress.css('width', progress(e) + '%');

                // Show/hide type btn
                //let $typeBtn = $('.header-quiz__btn');
                //let $head = $('.header-quiz');
                //currIndex > 1 ? $typeBtn.hide() : $typeBtn.show();
                //currIndex > 1 ? $head.addClass('center') : $head.removeClass('center');

                // Disable prev btn
                currIndex > 0 ? $quizCarouselPrev.prop('disabled', false) : $quizCarouselPrev.prop('disabled', true);

                // Set current page
                $quizCarouselCurr.html(currIndex+1);

                // Show/hide next btn
                currIndex === 2 || currIndex === 4 || currIndex === 5 || currIndex === 9 || currIndex === 10
                    ? $quizCarouselNext.show()
                    : $quizCarouselNext.hide();

                if (currIndex === 4 || currIndex === 5 || currIndex === 9)
                    $quizCarouselNext.text('Next').prop('disabled', true);

                //Checkbox clear
                if (currIndex === 4 || currIndex === 5) {
                    $('.quiz__item--step'+currIndex).find('.quiz__item-checkbox').prop('checked', false);
                }

                if (currIndex === 10)
                    $quizCarouselNext.text('Continue').prop('disabled', true);

                if (currIndex === 11) {
                    $('.quiz__navigate', $quiz).hide();
                    $('.quiz__progress', $quiz).hide();

                    quiz.progressbar();
                }
            });

            // Owl default events
            const getCurrIndex = (e) => {
                return e.item.index;
            };

            const quizGalleryPrev = () => {
                $quizCarousel.trigger('prev.owl.carousel', [smartSpeed]);
            };

            const quizGalleryNext = () => {
                $quizCarousel.trigger('next.owl.carousel', [smartSpeed]);
            };

            const quizGalleryTo = (position) => {
                $quizCarousel.trigger('to.owl.carousel', [position-1, smartSpeed]);
            };

            const quizGalleryRefresh = (position) => {
                $quizCarousel.trigger('refresh.owl.carousel');
            };

            //delete after
            //quizGalleryTo(9);

            // Custom prev/next
            $quizCarouselPrev.on('click', function(e) {
                e.preventDefault();
                if ( prevIndex === 8) {
                    quizGalleryTo(8);
                    prevIndex = 0;
                } else{
                    quizGalleryPrev()
                }
            });

            $quizCarouselNext.on('click', function(e) {
                e.preventDefault();
                quizGalleryNext();
            });

            // Step0
            $('.quiz__item-radio', $step0).each(function (i, el) {
                $(el).on('change', function () {
                    let value = $(el).val();

                    $('input[name=gender]', $quizForm).val(value);

                    if (value === 'm') {
                        $('.image--man', $quizForm).show();
                        $('.image--woman', $quizForm).hide();
                    } else {
                        $('.image--man', $quizForm).hide();
                        $('.image--woman', $quizForm).show();
                    }

                    setTimeout(() => quizGalleryNext(), timeout);

                });
            });

            // Step1
            $('.quiz__item-radio', $step1).on('change', function () {
                setTimeout(() => quizGalleryNext(), timeout);
            });

            // Step3
            $('.quiz__item-radio', $step3).on('change', function () {
                setTimeout(() => quizGalleryNext(), timeout);
            });

            // Step4
            $step4.on('change', function () {
                $(this).find('.quiz__item-checkbox:checked').length > 0
                    ? $quizCarouselNext.prop('disabled', false) : $quizCarouselNext.prop('disabled', true);
            });

            $('.quiz__item-checkbox', $step4).each(function (i, el) {
                $(el).on('change', function () {
                    let value = $(el).val();

                    if (value === 'vegan') $('.quiz__item-checkbox:not(#vegan)', $step4).prop('checked', false);
                    if (value !== 'vegan') $('#vegan.quiz__item-checkbox', $step4).prop('checked', false);
                });
            });

            //Step5
            $step5.on('change', function () {
                $(this).find('.quiz__item-checkbox:checked').length >= 5
                    ? $quizCarouselNext.prop('disabled', false) : $quizCarouselNext.prop('disabled', true);
            });

            $('.quiz__item-checkbox', $step5).each(function (i, el) {
                $(el).on('change', function () {
                    let count = $('.quiz__item-checkbox:checked', $step5).length;
                    let target = $(el).val();

                    $('sup[data-id='+target+']').text(count);
                });
            });

            // Step6
            $('.quiz__item-radio', $step6).on('change', function () {
                setTimeout(() => quizGalleryNext(), timeout);
            });

            // Step7
            $('.quiz__item-radio', $step7).on('change', function () {
                setTimeout(() => quizGalleryNext(), timeout);
            });

            // Step8
            $('.quiz__item-radio', $step8).each(function (i, el) {
                $(el).on('change', function () {
                    let value = $(el).val();

                    /* To last step logic
                    if (value === 'not_event'){
                        prevIndex = 8;
                        setTimeout(() => quizGalleryTo(10), timeout);
                    }

                    if (value !== 'not_event') {
                        $('input', $step9).val('');
                        if (value === 'other') {
                            $('#event_name', $step9).val('').prop('readonly', false);
                        } else{
                            $('#event_name', $step9).val(value);
                        }

                        prevIndex = 8;
                        setTimeout(() => quizGalleryNext(), timeout);
                    }
                    */

                    $('input', $step9).val('');
                    if (value === 'other' || value === 'not_event') {
                        $('#event_name', $step9).val('').prop('readonly', false);
                    } else{
                        $('#event_name', $step9).val(value).prop('readonly', true);
                    }

                    setTimeout(() => quizGalleryNext(), timeout);
                });
            });

            // Step9
            $('input', $step9).each(function (i, el) {
                $(el).on('change keyup', function () {
                    let event = $('input#event_name').val();
                    let date = $('input#event_date').val();

                    event !== '' && date !== ''
                        ? $quizCarouselNext.prop('disabled', false)
                        : $quizCarouselNext.prop('disabled', true);
                });
            });

            // Step10
            let $switcher = $('.quiz__switcher', $step10);
            let $form = $('.quiz__item-form', $step10);
            let $system = $('#system', $step10);

            $switcher.on('change' , () => {
                let target = $('input[name="system"]:checked').val();

                $form.hide();
                $form.find('input').val('');
                $system.val(target);
                $quizCarouselNext.prop('disabled', true);
                $('.quiz__item-form[data-id='+target+']').show();
            });

            // Step10 forms metric validate
            $('input', $formMetric).on('keyup', function (){
                $formMetric.find('input').each( function(){
                    let $count = $formMetric.find('input').length,
                        $valid = $(this).val().length > 0;

                    for (let i = 0; i < $count; i++) {
                        $valid ? $quizCarouselNext.prop('disabled', false) : $quizCarouselNext.prop('disabled', true);
                    }
                });
            });

            // Step10 forms imperial validate
            $('input', $formImperial).on('keyup', function (){
                $formImperial.find('input').each( function(){
                    let $count = $formImperial.find('input').length,
                        $valid = $(this).val().length > 0;

                    for (let i = 0; i < $count; i++) {
                        $valid ? $quizCarouselNext.prop('disabled', false) : $quizCarouselNext.prop('disabled', true);
                    }
                });
            });
        },

        progressbar: function() {
            // Make progress svg
            function makeSvg(percentage) {
                let abs_percentage = Math.abs(percentage).toString();

                return '<svg class="circle-chart__progress" viewbox="0 0 33.83098862 33.83098862">'
                    + '<circle class="circle-chart__background" cx="16.9" cy="16.9" r="15.9"/>'
                    + '<circle class="circle-chart__circle" stroke-dasharray="' + abs_percentage + ',100" cx="16.9" cy="16.9" r="15.9"/>'
                    + '</svg>';
            }

            // Progress animation
            let $progress = $('#progressBar'),
                $value = $('#progressVal');

            $progress.each(function () {
                let percentage = $(this).data("percentage");
                let speed = $(this).data("speed");
                let $step1 = $('.quiz-result__steps-item.finish--step1');
                let $step2 = $('.quiz-result__steps-item.finish--step2');
                let $step3 = $('.quiz-result__steps-item.finish--step3');

                $value.prop('counter', 0).animate({
                    counter: percentage
                }, {
                    duration: speed,
                    easing: 'swing',
                    step: function (now) {
                        $progress.html(makeSvg(now));
                        $value.text(Math.ceil(now) + '%');
                    }
                });

                setTimeout(() => {
                    $step1.removeClass('finish');
                }, speed / 4);

                setTimeout(() => {
                    $step2.removeClass('finish');
                }, speed / 2);

                setTimeout(() => {
                    $step3.removeClass('finish');
                }, speed - 500);

                setTimeout(() => {
                    $( '#ketoCalcForm' ).submit();
                }, speed + 500);
            });
        },

    };

    // Run the main function
    $(function() {
        quiz.init();
    });

})(jQuery);