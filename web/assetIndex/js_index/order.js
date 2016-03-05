/**
 * Created by didenkot34 on 10.11.15.
 */
$(document).ready(function () {
    $('#click-order').on('click', function () {
        if($('#click-order').text() == 'Скрыть заказ' ) {
            $('#order').addClass('hidden');
            $('#click-order').text('Закажи нас');
        } else {
            $('#order').removeClass('hidden');
            $('#click-order').text('Скрыть заказ');
        }

    });

    $('#order-form').on('beforeSubmit', function () {

        var form_o = $(this).serialize();

        $.post(
            '/home/index/save-order',
            form_o,
            function (data) {

                if ((data.name)) {
                    $('#click-order').text('Закажи нас');
                    $('#order').addClass('hidden');
                    $('#alert-order').removeClass('hidden');
                    $('#orderUserName').text(data.name);
                }
            },
            'json'
        );
        return false;
    });

});