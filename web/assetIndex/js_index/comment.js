/**
 * Created by didenkot34 on 10.11.15.
 */
$(document).ready(function () {
    $('#comment-form').on('beforeSubmit', function () {

        var form_d = $(this).serialize();

        $.post(
            '/event/categories/save-comment',
            form_d,
            function (data) {

                if ((data.name)) {
                    $('#comment').addClass('hidden');
                    $('#alert-comment').removeClass('hidden');
                    $('#commentUserName').text(data.name);
                }
            },
            'json'
        );
        return false;
    });

});