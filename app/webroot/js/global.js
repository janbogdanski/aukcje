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
    $('#joyRideTipContent').joyride({
        'tipLocation': 'bottom',
        'tipAnimation': 'fade',
        'cookieMonster': true,           // true/false for whether cookies are used
        'cookieName': 'GuidedTour',
        'cookieDomain': 'aukcje.local'
    });
});

function picasaImgScaledUrl(url, size) {
    var split = url.lastIndexOf("/");
    return url.substring(0, split) + "/s" + size + url.substring(split);
}

var slug = function(str) {
    if(str == undefined) return;
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();


    // remove accents, swap ñ for n, etc
    var from = "ąćęłńóśźż·/_,:;";
    var to   = "acelnoszz------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    return str;
};