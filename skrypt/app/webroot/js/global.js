/**
 * Created with JetBrains PhpStorm.
 * User: Jan
 * Date: 29.11.12
 * Time: 09:11
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(function(){


    //wyswietl modal z ajaxowa zawartoscia (data-toggle="modal" )
    $('[data-toggle="modal"]').click(function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        if (url.indexOf('#') == 0) {
            $(url).modal('open');
        } else {
            $.get(url, function(data) {
                $('<div class="modal hide fade"><textarea name="name" id="" style="width: 90%; height: 300px;">' + data + '</textarea></div>').modal();
            }).success(function() { $('input:text:visible:first').focus(); });
        }
        return false;
    });
});

function picasaImgScaledUrl(url, size) {
    var split = url.lastIndexOf("/");
    return url.substring(0, split) + "/s" + size + url.substring(split);
}
