(function ($) {
    'use strict';
    // Preloader
    jQuery(window).on('load', function () {
        jQuery("#preloader").delay(250).fadeOut(250);
        jQuery(".loader-wrap").fadeOut(250);
    });
    // Fullscreen
    jQuery(document).ready(function ($) {
        jQuery(document).on('click', '#fullscreen', function () {
            let elem = jQuery(this);
            if (!document.fullscreenElement &&
                !document.mozFullScreenElement && // Mozilla
                !document.webkitFullscreenElement && // Webkit-Browser
                !document.msFullscreenElement) { // MS IE ab version 11
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                } else if (document.documentElement.msRequestFullscreen) {
                    document.documentElement.msRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            }
            elem.find('i').toggleClass('ri-fullscreen-line').toggleClass('ri-fullscreen-exit-line');
        });
    });
    // Restrict Inspect
    document.onkeydown = function (e) {
        if (e.ctrlKey &&
            (e.keyCode === 67 ||
                e.keyCode === 86 ||
                e.keyCode === 85 ||
                e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
    };
    $(document).keypress("u", function (e) {
        if (e.ctrlKey) {
            return false;
        } else {
            return true;
        }
    });
    // Navigation menu
    $("#metismenu").metisMenu();
    const loc = location.href;
    const navMenu = document.querySelectorAll('#metismenu .menu-link');
    const subMenu = document.querySelectorAll('.submenu a');
    for (let i = 0; i < navMenu.length; i++) {
        if (navMenu[i].href == loc) {
            navMenu[i].classList.add('active');
            navMenu[i].parentNode.classList.add('activeLi');
        }
    }
    for (let i = 0; i < subMenu.length; i++) {
        if (subMenu[i].href == loc) {
            subMenu[i].classList.add('active');
            subMenu[i].parentNode.classList.add('activeLi');
            let parentLi = subMenu[i].parentNode.parentNode.parentNode;
            let subMenuLink = parentLi.querySelector('.has-arrow');
            subMenuLink.classList.add('active');
            parentLi.classList.add('activeLi');
        }
    }
})(jQuery);