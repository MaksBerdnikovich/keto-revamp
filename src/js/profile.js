(function($) {

    'use strict';

    let scripts = {

        // Initialization the functions
        init: function() {
            scripts.selectric();
            scripts.tooltip();
            scripts.formsSubmit();
            scripts.quantity();
            scripts.systems();
        },

        selectric: function () {
            $('select').selectric({
                maxHeight: 200
            });
        },

        tooltip: function () {
            tippy('[data-tooltip]', {
                content(reference) {
                    const id = reference.getAttribute('data-template');
                    const template = document.getElementById(id);
                    return template.innerHTML;
                },
                allowHTML: true,
                //trigger: 'click',
            });
        },

        quantity: function () {
            let $quantities = $('.quantity-group');

            $quantities.each(function (i, el) {
                //let max = $(el).find('input').attr('max');

                $(el).on('click', '.btn-plus', function(e) {
                    let $input = $(this).siblings('input');
                    $input.val(+$input.val() + 1);
                });

                $(el).on('click', '.btn-minus', function(e) {
                    let $input = $(this).siblings('input');

                    if ($input.val() > 1) {
                        $input.val(+$input.val() - 1);
                    }
                });
            });
        },

        formChecker: function (item) {
            let $self = $(item);
            let $quantity = $('.quantity-group', $self);
            let $preview = $('.preview-value', $self);
            let $label = $('.preview-label', $self);

            $self.on('click', 'input.edit', function (e) {
                if ($(this).is(':checked')){
                    $quantity.show();
                    $preview.hide();
                    $(this).removeClass('edit').addClass('save');
                }
            });

            $self.on('click', 'input.save', function (e) {
                $self.submit();
            });
        },

        formsSubmit: function () {
            let $forms = $('.profile-db-details form.edit-details-form');

            $forms.each(function (i, el) {
                scripts.formChecker(el);
            });
        },

        systems: function () {
            let $system = $('[name=system]');
            $system.change(function () {
                if ($(this).val() === 'imperial') {
                    $('.imperial-inputs').show();
                    $('.imperial-inputs input').prop('readonly', false);
                    $('.imperial-inputs input').prop('disabled', false);

                    $('.metric-inputs').hide();
                    $('.metric-inputs input').prop('readonly', true);
                    $('.metric-inputs input').prop('disabled', true);
                } else {
                    $('.imperial-inputs').hide();
                    $('.imperial-inputs input').prop('readonly', true);
                    $('.imperial-inputs input').prop('disabled', true);

                    $('.metric-inputs').show();
                    $('.metric-inputs input').prop('readonly', false);
                    $('.metric-inputs input').prop('disabled', false);
                }
            });
            $system.change();
        }
    };

    // Run the main function
    $(function() {
        scripts.init();
    });

})(jQuery);