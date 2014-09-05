jQuery(document).ready(function () {
    var $ = jQuery;
    $('.gallery').each(function () {
        var id = $(this).attr('id');
        $(this).find('a').each(function () {
            if ($(this).attr('href').indexOf('attachment_id') === -1) {
                $(this).attr('data-lightbox', id);
            }
        });
    });
});