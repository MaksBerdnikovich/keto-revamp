(function ($) {

    'use strict';

    const $upsellV1 = $('.upsell.v1');
    const $upsellV2 = $('.upsell.v2');
    const $upsellV3 = $('.upsell.v3');
    const $upsellV4 = $('.upsell.v4');

    const upsell = {

        // Initialization the functions
        init: () => {
            upsell.defaults();
            upsell.modals();

            if ($upsellV1.length > 0) upsell.countdown();
            if ($upsellV3.length > 0) upsell.player();
        },

        defaults: () => {
            let $orderBtnV2 = $('.upsell-order-btn', $upsellV2);

            $('.checkbox-group', $upsellV2).on('change', 'input', function () {
                $orderBtnV2.toggleClass('disabled');
            });
        },

        countdown: () => {
            let time1 = new Date().getTime() + 24*60*60000;
            let time2 = new Date().getTime() + 5*60000;
            let time3 = new Date().getTime() + 30*60000;
            let $countdown1 = $('.upsell-countdown1');
            let $countdown2 = $('.upsell-countdown2');
            let $countdown3 = $('.upsell-countdown3');

            $countdown1.countdown(time1).on('update.countdown', function(event) {
                $(this).html(event.strftime(
                    `<li><b>%H</b> <span>hours</span></li>
                     <li class="sep"><b>:</b></li>
                     <li><b>%M</b> <span>minutes</span></li>
                     <li class="sep"><b>:</b></li>
                     <li><b>%S</b> <span>seconds</span></li>
                     `
                ));
            });

            $countdown2.countdown(time2).on('update.countdown', function(event) {
                $(this).html(event.strftime(`%M : %S`));
            });

            $countdown3.countdown(time3).on('update.countdown', function(event) {
                $(this).html(event.strftime(
                    `<li><b>%H</b> <span>hours</span></li>
                     <li class="sep"><b>:</b></li>
                     <li><b>%M</b> <span>minutes</span></li>
                     <li class="sep"><b>:</b></li>
                     <li><b>%S</b> <span>seconds</span></li>
                     `
                ));
            });
        },

        modals: () => {
            let $modal1 = $('#upsellModalV1');
            let $modal2 = $('#upsellModalV2');
            let $modal3 = $('#upsellModalV3');
            let modalCookie1, modalCookie2, modalCookie3;
            let date = new Date;
            date.setDate(date.getDate() + 1);

            let getCookie = (name) => {
                let matches = document.cookie.match(new RegExp(
                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ));
                return matches ? decodeURIComponent(matches[1]) : undefined;
            };

            //Show/Hide text in upsell3
            $('.upsell-modal__text-change', $modal3).on('click', 'a', function(e) {
                e.preventDefault();

                $('.show-before', $modal3).hide();
                $('.show-after', $modal3).show();
                $(this).parent().hide();
            });

            $(document).mouseover(function(){
                modalCookie1 = getCookie("upsell_1_show");
                modalCookie2 = getCookie("upsell_2_show");
                modalCookie3 = getCookie("upsell_3_show");
            });

            $(document).mouseleave(function(e){
                if ($modal1.length > 0 && !$modal1.is(":visible") && modalCookie1 !== "no" && e.clientY < 10) {
                    Fancybox.show([{ src: "#upsellModalV1", type: "inline" }]);
                }
                if ($modal2.length > 0 && !$modal2.is(":visible") && modalCookie2 !== "no" && e.clientY < 10) {
                    Fancybox.show([{ src: "#upsellModalV2", type: "inline" }]);
                }
                if ($modal3.length > 0 && !$modal3.is(":visible") && modalCookie3 !== "no" && e.clientY < 10) {
                    Fancybox.show([{ src: "#upsellModalV3", type: "inline" }]);
                }
            });

            $modal1.on('click', 'button.set-cookie', function(e) {
                document.cookie = "upsell_1_show=no; path=/; expires=" + date.toUTCString();
                Fancybox.close();
            });
            $modal2.on('click', 'button.set-cookie', function(e) {
                document.cookie = "upsell_2_show=no; path=/; expires=" + date.toUTCString();
                Fancybox.close();
            });
            $modal3.on('click', 'button.set-cookie', function(e) {
                document.cookie = "upsell_3_show=no; path=/; expires=" + date.toUTCString();
                Fancybox.close();
            });
        },

        player: () => {
            function postMsg(id){
                let msg = {method:"addEventListener", value: 'playProgress'};
                let iframe = document.getElementById(id), cW;
                if(iframe) cW = iframe.contentWindow;
                if(!cW){setTimeout(function(){postMsg(id)}, 200); return;}
                cW.postMessage(JSON.stringify(msg), '*');
            }

            let messageListener = function(e){
                if (!(/^https?:\/\/player.vimeo.com/).test(e.origin)) return false;
                let evt = JSON.parse(e.data);
                if(evt.event==='ready') postMsg(evt.player_id);
                if(evt.event==='playProgress') onPlayProgress(evt.data);
                //console.log(evt.data);
            }

            function onPlayProgress(data) {
                if(data.percent >= 0.95) document.getElementById('showAfterVideo').style.display = "block";
            }

            let iframe = document.querySelector('iframe');
            window.addEventListener('message', messageListener, false);
            iframe.src = '//player.vimeo.com/video/662167826?title=0&byline=0&portrait=0&badge=0;player_id='+iframe.id;
        }
    };

    // Run the main function
    $(function () {
        upsell.init();
    });

})(jQuery);