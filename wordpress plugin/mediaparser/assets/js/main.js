jQuery(document).ready(function () {
    jQuery('.mediaparser-publish-link').click(function (e) {
        e.preventDefault();
        el = jQuery(this);
        if (el.hasClass('loading')) return false;
        jQuery.ajax({
            url: el.attr('href'),
            beforeSend: function () {
                el.addClass('loading');
            },
            success: function (data) {
                if (data == 'success') location.reload();
                else alert('Произошла ошибка');
            },
            complete: function () {
                el.removeClass('loading');
            }
        });
    });

    jQuery('.mediaparser-get-version').click(function (e) {
        e.preventDefault();
        jQuery('#getVer').modal();
        el = jQuery(this)
        jQuery.ajax({
            url: '/?mediaparser_path=post/article',
            data: {link: el.data('link'), token: el.data('token')},
            method: 'get',
            beforeSend: function () {
                jQuery('#getVer').html('<div>Загрузка...</div>');
            },
            success: function (data) {
                jQuery('#getVer').append('<div>' + data + '</div>');
            }
        });
    });
});