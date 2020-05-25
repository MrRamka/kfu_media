$(document).ready(function () {
    $('.parser-expand, .parser-add-button').click(function (e) {
        e.preventDefault();
        $(this).toggleClass('show');
        $(this).siblings('.parser-expanded').toggleClass('show');
    });
    $('.parser-info').click(function (e) {
        e.preventDefault();
        $(this).toggleClass('show');
        $(this).siblings('.parser-expand').toggleClass('show');
        $(this).siblings('.parser-expanded').toggleClass('show');
    });

    $('.parser form').submit(function (e) {
        e.preventDefault();
        form = $(this);

        $.ajax({
            url: form.attr('action'),
            data: form.serialize(),
            method: form.attr('method'),
            beforeSend: function () {
                form.children().children('.parser-error').remove();
                form.children().children('input').removeClass('error');
                form.children('.parser-message').removeClass('success').removeClass('error').html('');
                form.children('.input-button').children('input[type=submit]').prop('disabled', true).addClass('loading');
            },
            success: function (data) {
                data = JSON.parse(data);
                if (data.status == true) {
                    form.children('.parser-message').addClass('success').html('Сохранено');
                    if (data.autoReload) {
                        setTimeout(function () {
                            location.reload();
                        }, 1500);
                    }
                } else {
                    for (i = 0; i < data.errors.length; i++) {
                        form.children()
                            .children('input[name="parser[' + data.errors[i].field + ']"]')
                            .addClass('error')
                            .parent()
                            .append("<div class='parser-error'>" + data.errors[i].message + "</div>");
                    }
                }
            },
            complete: function () {
                form.children('.input-button')
                    .children('input[type=submit]')
                    .prop('disabled', false)
                    .removeClass('loading');
            },
            error: function () {
                form.children('.parser-message').addClass('error').html('Произошла ошибка')
            }
        });
    });

    $('.parser-delete').click(function (e) {
        return confirm('Удалить этот парсер?');
    });

    $('.generate-token').click(function (e) {
        e.preventDefault();
        el = $(this);
        if (el.hasClass('loading')) return false;
        if (!confirm("Уверены?")) return false;
        $.ajax({
            url: el.attr('href'),
            method: 'get',
            beforeSend: function () {
                el.addClass('loading');
            },
            success: function (data) {
                $('input[name="setting[token]"]').val(data);
                alert('Не забудьте сменить токен в настройках WordPress');
            },
            complete: function () {
                el.removeClass('loading');
            }
        });
    });
    $('.pager-input').change(function () {
        document.location.href = $(this).data('action') + "&page=" + $(this).val()
    });
});