/*!
 * WordPress Lightbox Plugin
 * Fancybox to Image
 * Copyright 2017 Stefan Hüsges
 * MIT License
 * https://github.com/tronsha/wp-lightbox-plugin
 */
jQuery(document).ready(function () {
    var $ = jQuery;
    $('a > img').each(function () {
        if ($(this).parents('.gallery').length === 0) {
            var id = $(this).attr('src').split(/[^a-zA-Z0-9]+/).join('-');
            if ($(this).parent('a').attr('href').match(/\.(jpeg|jpg|gif|png)$/) !== null) {
                $(this).parent('a').attr('data-fancybox', id);
            }
        }
    });
});
