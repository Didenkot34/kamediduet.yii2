/**
 * Created by didenkot34 on 05.12.15.
 */
$(document).ready(function () {
  $('#form-search').addClass('hidden');
  $('#undefined-sticky-wrapper').height('0');
    $('#li-search').click(function(){
        $(this).addClass('hidden');
        $('#form-search').removeClass('hidden');
       // $('#undefined-sticky-wrapper').height('106px');
    });

    $('#searchpost-title').attr('value','Введите название поста');
    $('#searchpost-title').focus( function(){
        if($('#searchpost-title').val() == 'Введите название поста' || $('#searchpost-title').val() =='Попробуйте еще раз, но только правильно :)'){
            $('#searchpost-title').attr('value','');
        }
    });
    $('#searchpost-title').focusout( function(){
        if($('#searchpost-title').val() == ''){
            $('#searchpost-title').attr('value','Введите название поста');
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
                    $('#searchpost-title').attr('value','Попробуйте еще раз, но только правильно :)');
                }
            },
            'json'
        );
        return false;
    });

});