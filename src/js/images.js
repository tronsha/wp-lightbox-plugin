/*!
 * WordPress Lightbox Plugin
 * Copyright 2015 - 2018 Stefan Hüsges
 * MIT License
 * https://github.com/tronsha/wp-lightbox-plugin
 */
jQuery(document).ready(function () {
    if (1 === parseInt(lbData.gallery)) {
        jQuery('.gallery').each(function () {
            var $div = jQuery(this);
            var id = $div.attr('id');
            $div.find('.gallery-icon a').each(function () {
                if (-1 === jQuery(this).attr('href').indexOf('attachment_id')) {
                    jQuery(this).attr(lbData.lightbox, id);
                }
            });
            if ('colorbox' === lbData.name) {
                jQuery("<script>jQuery('#" + id + " .gallery-icon a').colorbox({rel:'" + id + "', maxWidth: '95%', maxHeight: '95%'});</script>").appendTo(document.body);
            }
        });
    }
    if (1 === parseInt(lbData.standalone)) {
        jQuery('a > img').each(function () {
            if (0 === jQuery(this).parents('.gallery').length) {
                var $img = jQuery(this);
                var id = Math.floor((Math.random() * 900000) + 100000);
                var src = $img.attr('src');
                if (undefined !== src) {
                    id = src.split(/[^a-zA-Z0-9]+/).join('-') + '-' + id;
                }
                var $a = $img.parent('a');
                if (undefined !== $a.attr('data-lightbox') && 'data-lightbox' !== lbData.lightbox) {
                    $a.attr(lbData.lightbox, $a.attr('data-lightbox'));
                    $a.removeAttr('data-lightbox');
                }
                if (undefined !== $a.attr('data-title') && 'data-title' !== lbData.title) {
                    $a.attr(lbData.title, $a.attr('data-title'));
                    $a.removeAttr('data-title');
                }
                var href = $a.attr('href');
                if (undefined !== href && null !== href.match(/\.(jpeg|jpg|gif|png)$/)) {
                    if (undefined === $a.attr(lbData.lightbox) || '' === $a.attr(lbData.lightbox)) {
                        $a.attr(lbData.lightbox, id);
                        if ('colorbox' === lbData.name) {
                            jQuery("<script>jQuery('a[rel=" + id + "]').colorbox({rel:'" + id + "', maxWidth: '95%', maxHeight: '95%'});</script>").appendTo(document.body);
                        }
                    } 
                    if (1 === parseInt(lbData.ajax)) {
                        var classArray = [];
                        var classAttr = $img.attr('class');
                        if (undefined !== classAttr) {
                            classArray = classAttr.split(' ');
                        }
                        var postId = '';
                        for (var i = 0, count = classArray.length; i < count; i++) {
                            if (0 === classArray[i].indexOf('wp-image-')) {
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
                                        if ('' !== result) {
                                            $a.attr(lbData.title, result);
                                        }
                                    },
                                    error: function () {
                                    }
                                });
                            }
                        }
                    }
                } else {
                    $a.removeAttr(lbData.lightbox);
                    $a.removeAttr(lbData.title);
                }
            }
        });
    }
    if (1 === parseInt(lbData.justified)) {
        jQuery('.gallery').each(function () {
            var $div = jQuery(this);
            $div.children('.gallery-item').each(function() {
                var $item = jQuery(this);
                var $caption = $item.children('.gallery-caption');
                var caption = $caption.text();
                $caption.remove();
                if (caption.length > 0) {
                    $item.find('.gallery-icon a').append('<div class="caption">' + caption + '</div>');
                }
            });
            $div.find('.gallery-icon a').each(function () {
                var $a = jQuery(this);
                while ($a.parent().attr('id') !== $div.attr('id')) {
                    $a.unwrap();
                }
            });
            jQuery(this).justifiedGallery({
                rowHeight : parseInt(lbData.justified_height),
                margins : parseInt(lbData.justified_margins),
                captions: 1 === parseInt(lbData.justified_captions),
                randomize: 1 === parseInt(lbData.justified_randomize)
            });
        });
    }
});
