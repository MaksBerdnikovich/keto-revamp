(function($) {

    'use strict';

    let scripts = {

        // Initialization the functions
        init: function() {
            scripts.motivation();
            scripts.switcher();
            scripts.quantityWeek();
            scripts.filter();
            scripts.modalRecipeCard();
            scripts.modalRecipeSwap();
            scripts.modalGroceryList();
        },

        motivation: function () {
            const carousel = new Carousel(document.querySelector(".carousel"), {
                'slidesPerPage' : 1,
                'center' : true
            });

            setInterval(function() {
                carousel.slideNext();
            }, 30000);
        },

        switcher: function () {
            let $switcher = $('.switcher');
            let $switcherBlock = $('.switch-block');
            let $switcherBtn = $('.switch-item', $switcher);

            $switcher.on('click', 'a', function (e) {
                e.preventDefault();

                $switcherBtn.removeClass('active');
                $(this).addClass('active');

                let showBlock = $(this).data('id');
                $switcherBlock.hide();
                $('#'+showBlock).show();
            })
        },

        quantityWeek: function () {
            let $quantities = $('.quantity-group--week');
            let $weeks = $('.home-db-plans__week');

            $quantities.each(function (i, el) {
                let max = $(el).find('input').attr('max');

                $(el).on('click', '.btn-plus', function(e) {
                    let $input = $(this).siblings('input');

                    if (max !== undefined && $input.val() < max) {
                        $input.val(+$input.val() + 1);

                        $weeks.hide();
                        $('#week-' + $input.val()).show();
                    }
                });

                $(el).on('click', '.btn-minus', function(e) {
                    let $input = $(this).siblings('input');

                    if ($input.val() > 1) {
                        $input.val(+$input.val() - 1);

                        $weeks.hide();
                        $('#week-' + $input.val()).show();
                    }
                });
            });
        },

        filter: function () {
            let $btnConfirmOpen = $('.filter-modal__btn button');
            let $btnConfirm = $('.filter-modal__btns button.confirm');
            let $btnClose = $('.filter-modal__btns button.close');

            $btnConfirmOpen.on('click', function (e) {
                e.preventDefault();

                Fancybox.close();
                Fancybox.show([{ src: "#filter-confirm", type: "inline" }]);
            });

            $btnConfirm.on('click', function (e) {
                e.preventDefault();

                Fancybox.close();
            });

            $btnClose.on('click', function (e) {
                e.preventDefault();

                Fancybox.close();
            });
        },

        modalRecipeCard: function () {
            let $modalCard = $('#recipeCard');
            let $modalCardBody = $('.dashboard-modal-body', $modalCard);
            let $loader = $('.preloader', $modalCard);
            let $openLink = $('.home-db-plans__grid-item');

            let get_recipe = (recipe) => {
                $.ajax({
                    type: 'GET',
                    url: ajax.url,
                    data: {
                        'Whatever': '1234',
                        'action': 'get_recipe_details_request',
                        '_ajax_nonce': ajax.nonce,
                        'recipe': recipe,
                    },
                    beforeSend: function () {
                        $loader.show();
                        $modalCardBody.html('');
                        Fancybox.show([{ src: "#recipeCard", type: "inline" }]);
                    },
                    success: function (data) {
                        if (data.success) {
                            $loader.hide();
                            $modalCardBody.html(data.data);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                    },
                    complete: function () {
                    },
                });
            };

            $(document).on('click', '.home-db-plans-card', function (e){
                e.preventDefault();
                get_recipe($(this).data('recipe'));
                $('#recipeCard--clone').closest('.fancybox__container').remove();
                $modalCard.animate({ scrollTop: 0 });
            });
        },

        modalRecipeSwap: function () {
            let currentDay = 0;
            let currentCategory = 0;
            let needUpdate = false;
            let newContent = '';
            let parent = '';

            let $modalSwap = $('#recipeSwap');
            let $modalSwapBody = $('.dashboard-modal-body', $modalSwap);
            let $loader = $('.preloader', $modalSwap);
            let $openLink = $('.home-db-plans-swap');

            let get_recipes = (keyword, count) => {
                $.ajax({
                    type: 'GET',
                    url: ajax.url,
                    data: {
                        'Whatever': '1234',
                        'action': 'get_recipes_by_category_request',
                        '_ajax_nonce': ajax.nonce,
                        'category': currentCategory,
                        'keyword': keyword,
                        'count': count,
                    },
                    beforeSend: function () {
                        $loader.show();
                        $modalSwapBody.html('');
                        Fancybox.show([{ src: "#recipeSwap", type: "inline" }]);
                    },
                    success: function (data) {
                        if (data.success) {
                            $loader.hide();
                            $modalSwapBody.html(data.recipes);
                            $(document).on('click', '.replace-recipe-button', function () {
                                replace_recipe($(this).data('id'), data.parent);
                            });
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                    },
                    complete: function () {
                    },
                });
            };

            let load_more_recipes = (keyword, count) => {
                $.ajax({
                    type: 'GET',
                    url: ajax.url,
                    data: {
                        'Whatever': '1234',
                        'action': 'get_recipes_by_category_request',
                        '_ajax_nonce': ajax.nonce,
                        'category': currentCategory,
                        'keyword': keyword,
                        'count': count,
                    },
                    beforeSend: function () {
                    },
                    success: function (data) {
                        if (data.success) {
                            $modalSwapBody.html(data.recipes);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                    },
                    complete: function () {
                    },
                });
            };

            let replace_recipe = (newRecipe) => {
                $.ajax({
                    type: 'POST',
                    url: ajax.url,
                    data: {
                        'Whatever': '1234',
                        'action': 'replace_recipe_request',
                        '_ajax_nonce': ajax.nonce,
                        'category': currentCategory,
                        'day': currentDay,
                        'recipe': newRecipe,
                    },
                    beforeSend: function () {
                    },
                    success: function (data) {
                        if (data.success) {
                            needUpdate = true;
                            newContent = data.data;

                            if (needUpdate) {
                                if (parent === 'week-1') {
                                    $('.home-db-plans-week-1').load(location.href+' .home-db-plans-week-1>*', '');
                                }

                                if (parent === 'week-2') {
                                    $('.home-db-plans-week-2').load(location.href+' .home-db-plans-week-2>*', '');
                                }

                                needUpdate = false;
                                newContent = '';
                                $(document).trigger('content-updated');
                            }

                            Fancybox.close();
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                    },
                    complete: function () {
                    },

                });
            };

            $(document).on('click', '.home-db-plans-swap', function (e){
                e.stopPropagation();
                currentCategory = $(this).data('category');
                currentDay = $(this).data('day');
                parent = $(this).data('parent');
                get_recipes('', 12, parent);
                $('#recipeSwap--clone').closest('.fancybox__container').remove();
            });

            $(document).on('click', '.search-recipe-button', function (e){
                let value = $('#search-recipe-input').val();
                let count = value === '' ? 12 : '';

                load_more_recipes(value, count);
                if (count === ''){
                    $('.load-more-button').hide();
                } else {
                    $('.load-more-button').show();
                }
            });

            $(document).on('click', '.load-more-button', function (e){
                let count = $modalSwap.find('.home-db-plans__grid-item').length;

                load_more_recipes('', count + 12);
                $modalSwap.animate({ scrollBottom: 0 });
            });
        },

        modalGroceryList: function () {
            let $modalGrocery = $('#groceryList');
            let $modalGroceryBody = $('.dashboard-modal-body', $modalGrocery);
            let $loader = $('.preloader', $modalGrocery);

            /*
            let get_grocery = () => {
                $.ajax({
                    type: 'GET',
                    url: ajax.url,
                    data: {
                        'Whatever': '1234',
                        'action': 'get_grocery_details_request',
                        '_ajax_nonce': ajax.nonce,
                    },
                    beforeSend: function () {
                        $loader.show();
                        $modalGroceryBody.html('');
                        Fancybox.show([{ src: "#groceryList", type: "inline" }]);
                    },
                    success: function (data) {
                        if (data.success) {
                            $loader.hide();
                            $modalGroceryBody.html(data.data);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                    },
                    complete: function () {
                    },
                });
            };

            $(document).on('click', '.home-db-plans-grocery', function (e){
                e.preventDefault();
                get_grocery();
                $('#groceryList--clone').closest('.fancybox__container').remove();
                $modalGrocery.animate({ scrollTop: 0 });
            });
            */

            let $switcher = $('.switcher-grocery');
            let $switcherBtn = $('.switch-item', $switcher);
            $switcher.on('click', 'a.switch-item', function (e) {
                e.preventDefault();

                $switcherBtn.removeClass('active');
                $(this).addClass('active');

                let showBlock = $(this).data('target');
                $('.grocery-switch-block').hide();
                $('#'+showBlock).show();
            });

            let checkedAll = false;
            $(document).on('change', '.selected-all', function (e){
                checkedAll = !checkedAll;
                $(this).closest('form').find('input[type=checkbox]').prop('checked', checkedAll);
            });
        },
    };

    // Run the main function
    $(function() {
        scripts.init();
    });

    $(document).on('content-updated', function () {
        scripts.init();
    });

})(jQuery);