(function ($) {

    'use strict';

    const checkout = {

        // Initialization the functions
        init: () => {
            checkout.checkoutForm();
        },

        checkoutForm: () => {
            let $planBtn = $('.get-plan');
            let $tariff = $('.checkout-plan__item');

            $planBtn.on('click', 'button', function (e) {
                e.preventDefault();

                tariffClickHandler($('.checkout-plan__item.active'), false);
            });

            $tariff.click(function (e) {
                e.preventDefault();

                tariffClickHandler($(this), true);
            });

            $('#togData').change(function () {
                $('#stripe-submit-button').prop('disabled', !$(this).prop('checked'))
            });

            /*
            $('.cta-btn').click(function (ee) {
                ee.preventDefault();
                tariffClickHandler($('.buyOpt-row.active'), false);
            });
            */

            $(".card-block").click(function () {
                $(".card-box").show();
                $(".paypal-box").hide();
            });

            $(".paypal-block").click(function () {
                $(".card-box").hide();
                $(".paypal-box").show();
            });

            //After submit loader
            $('#stripe-submit-button').click(function (e) {
                $('#result').show().css({
                    'backgroundColor': 'transparent',
                    'zIndex': 1001
                })
            });

            function tariffClickHandler($this, addClass) {
                if (addClass) {
                    $tariff.removeClass('active');
                    $this.addClass('active');
                }

                Fancybox.show([{ src: "#Pop1", type: "inline" }]);

                $('#result').show();
                $('#form-checkout').hide();

                let price = $this.data('price');
                price = price.toFixed(2);
                $('.total-sum').html('$' + price);
                $('.total-period').html($this.data('period'));

                add_to_cart_request($this.data('tariff'));
            }

            function add_to_cart_request(tariff) {
                let formData = new FormData();
                formData.append('Whatever', 1234);
                formData.append('action', 'add_tariff_to_cart_request');
                formData.append('_ajax_nonce', ajax.nonce);
                formData.append('tariff', tariff);

                $.ajax({
                    type: 'POST',
                    url: ajax.url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.success) {
                            $('#result').hide();
                            $('#form-checkout').show();
                            jQuery(document.body).trigger("update_checkout");
                        } else {
                            $('#result').text(data.message);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        $('#result').text('Error. Try again');
                    },
                    complete: function () {
                    },

                });
            }
        },
    };

    // Run the main function
    $(function () {
        checkout.init();
    });

})(jQuery);