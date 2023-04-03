(function ($) {

    'use strict';

    const email = {

        // Initialization the functions
        init: () => {
            email.emailForm();
            email.loginForm();
            email.resetForm();
            email.contactForm();
        },

        emailForm: () => {
            let $form = $('#emailPlan');

            $form.on('click', 'button', function(){
                let requared = false;
                let $firsName = $("input[name=first_name]");
                let $email = $("input[name=email]");
                let error = ($el) => {
                    requared = false;
                    $el.parents('.form-item').addClass('error');
                };
                let valid = ($el) => {
                    requared = true;
                    $el.parents('.form-item').removeClass('error');
                };

                validator.isEmpty($firsName.val()) ? error($firsName) : valid($firsName);
                !validator.isEmail($email.val()) ? error($email) : valid($email);

                if (requared) return true;

                return false;
            })
        },

        loginForm: () => {
            let $form = $('#loginForm');

            $form.on('click', 'button', function(){
                let requared = false;
                let $email = $("input[name=e]");
                let $password = $("input[name=pass]");
                let error = ($el) => {
                    requared = false;
                    $el.parents('.form-item').addClass('error');
                };
                let valid = ($el) => {
                    requared = true;
                    $el.parents('.form-item').removeClass('error');
                };

                !validator.isEmail($email.val()) ? error($email) : valid($email);
                //!validator.isStrongPassword($password.val()) ? error($password) : valid($password);

                if (requared) return true;

                return false;
            })
        },

        resetForm: () => {
            let $form = $('#resetForm');

            $form.on('click', 'button', function(){
                let requared = false;
                let $email = $("input[name=e]");
                let error = ($el) => {
                    requared = false;
                    $el.parents('.form-item').addClass('error');
                };
                let valid = ($el) => {
                    requared = true;
                    $el.parents('.form-item').removeClass('error');
                };

                !validator.isEmail($email.val()) ? error($email) : valid($email);

                if (requared) return true;

                return false;
            })
        },

        contactForm: () => {
            let $form = $('#contactForm');
            console.log('in')

            $form.on('click', 'button', function(){
                let requared = false;
                let $message = $("textarea[name=message]");
                let error = ($el) => {
                    requared = false;
                    $el.parents('.form-item').addClass('error');
                };
                let valid = ($el) => {
                    requared = true;
                    $el.parents('.form-item').removeClass('error');
                };

                validator.isEmpty($message.val()) ? error($message) : valid($message);

                if (requared) {
                    let $btnClose = $('.filter-modal__btns button.close');

                    $message.val('');
                    Fancybox.show([{ src: "#contact-confirm", type: "inline" }]);

                    $btnClose.on('click', function (e) {
                        e.preventDefault();
                        Fancybox.close();
                    });
                }

                return false;
            })
        },
    };

    // Run the main function
    $(function () {
        email.init();
    });

})(jQuery);