(function($) {

    'use strict';

    const $form = $('#progressForm');
    const $tableWrap = $('.progress-db__table-item');
    const $tableColumn = $('.progress-db__table-column');

    let total = $tableColumn.length + 1;

    let scripts = {

        // Initialization the functions
        init: function() {
            scripts.addColumn();
            scripts.removeColumn();
            scripts.addStartDate();
        },

        editColumn: function () {
            $form.on("click", 'a.table-item__edit', function(e) {
                e.preventDefault();

                $(this).hide().siblings('.table-item__save').show();

                let $parent = $(this).parents('.progress-db__table-column');
                $parent.find('input').attr("readonly", false).addClass('edit');
            });
        },

        removeColumn: function () {
            $(document).on("click", 'a.table-item__remove', function(e) {
                e.preventDefault();

                $(this).closest('form').submit()
            });
        },

        addColumn: function () {
            $('.progress-db__table-btn').on("click", 'a', function(e) {
                e.preventDefault();

                let $inputs = $('#addColumn').find('input[type=number]');
                $inputs.each(function (i, el){
                    if ($(el).val() !== ''){
                        $('#addColumn').submit();
                    }
                })
            });
        },

        addStartDate: function () {
            $('[data-toggle="datepicker-measurement"]').datepicker({
                date: new Date(),
                startDate: new Date(),
                endDate: new Date(2022, 11, 30),
                format: 'yyyy-mm-dd',
            });

            $('#addStartDate').on("change", 'input', function(e) {
                e.preventDefault();

                $('#addStartDate').submit();
            });
        },
    };

    // Run the main function
    $(function() {
        scripts.init();
    });

})(jQuery);