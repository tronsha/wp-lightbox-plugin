/*!
 * WordPress Lightbox Plugin
 * Copyright 2015 - 2017 Stefan Hüsges
 * MIT License
 * https://github.com/tronsha/wp-lightbox-plugin
 */
jQuery(document).ready(function () {
    jQuery('.gallery').each(function () {
        var id = jQuery(this).attr('id');
        jQuery(this).find('.gallery-icon a').each(function () {
            if (jQuery(this).attr('href').indexOf('attachment_id') === -1) {
                jQuery(this).attr('data-' + lbData.lightbox, id);
            }
        });
    });
    jQuery('a > img').each(function () {
        if (jQuery(this).parents('.gallery').length === 0) {
            var $img = jQuery(this);
            var id = $img.attr('src').split(/[^a-zA-Z0-9]+/).join('-') + '-' + Math.floor((Math.random() * 900000) + 100000);
            var $a = $img.parent('a');
            if ($a.attr('href').match(/\.(jpeg|jpg|gif|png)$/) !== null) {
                $a.attr('data-' + lbData.lightbox, id);
                var classArray = $img.attr('class').split(' ');
                var postId = '';
                for (var i = 0, len = classArray.length; i < len; i++) {
                    if (classArray[i].indexOf('wp-image-') === 0) {
                        postId = parseInt(classArray[i].replace('wp-image-', ''));
                        jQuery.ajax({
                            type: 'POST',
                            url: lbData.ajaxUrl,
                            dataType: 'json',
                            data: {
                                'postId': postId,
                                'action': 'lightbox_get_image_title'
                            },
                            success: function (result) {
                                if (result !== '') {
                                    $a.attr('data-' + lbData.title, result);
                                }
                            },
                            error: function () {
                            }
                        });
                    }
                }
            }
        }
    });
});
