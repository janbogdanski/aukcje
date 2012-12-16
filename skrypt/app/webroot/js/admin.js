/**
 * Created with JetBrains PhpStorm.
 * User: Jan
 * Date: 29.11.12
 * Time: 09:11
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(function(){
    $("#title").keyup(function(){
        $("#slug").val(slug($('#title').val()));
    });


    //slug

});
