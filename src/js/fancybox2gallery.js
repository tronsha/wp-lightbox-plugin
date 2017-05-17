/*!
 * WordPress Lightbox Plugin
 * Fancybox to Wordpress Gallery
 * Copyright 2017 Stefan Hüsges
 * MIT License
 * https://github.com/tronsha/wp-lightbox-plugin
 */
jQuery(document).ready(function () {
    var $ = jQuery;
    $('.gallery').each(function () {
        var id = $(this).attr('id');
        $(this).find('.gallery-icon a').each(function () {
            if ($(this).attr('href').indexOf('attachment_id') === -1) {
                $(this).attr('data-fancybox', id);
            }
        });
    });
});
