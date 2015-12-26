/**
 * Created by didenkot34 on 26.12.15.
 */
$(document).ready(function () {

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5&appId=1469037176744606";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    $('#vkshare0').css('margin-top', '63px');

    $('#tw_share_button').css({'margin-top': '4px', 'margin-left': '9px'});

});