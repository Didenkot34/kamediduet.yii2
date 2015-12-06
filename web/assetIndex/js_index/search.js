/**
 * Created by didenkot34 on 05.12.15.
 */
$(document).ready(function () {
    $('#form-search').addClass('hidden');
    $('#undefined-sticky-wrapper').height('0');
    $('#li-search').click(function () {
        $(this).addClass('hidden');
        $('#form-search').removeClass('hidden');
    });

    $('#search-clouse').click(function () {
        $('#form-search').addClass('hidden');
        $('#li-search').removeClass('hidden');
    });

    $('#searchpost-title').attr('value', 'Введите название поста');
    $('#searchpost-title').focus(function () {
        if ($('#searchpost-title').val() == 'Введите название поста' || $('#searchpost-title').val() == 'Такого поста не существует. Возможно Вы сделали опечатку.') {
            $('#searchpost-title').attr('value', '');
            $('#searchpost-title').val('');
        }
    });
    $('#searchpost-title').focusout(function () {
        if ($('#searchpost-title').attr('value') == '' || $('#searchpost-title').val() == '' ) {
            $('#searchpost-title').attr('value', 'Введите название поста');
        }
    });

    $('#search-form').on('beforeSubmit', function () {

        var form_s = $(this).serialize();
        $.post(
            '/home/index/search-post',
            form_s,
            function (data) {

                if ((data.id)) {
                    window.location.href = "/single-post/"+data.id;
                } else {
                    $('#searchpost-title').val('Такого поста не существует. Возможно Вы сделали опечатку.');
                }
            },
            'json'
        );
        return false;
    });

});