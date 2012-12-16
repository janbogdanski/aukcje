/**
 * QR CODES plugin for CKEditor 3.x
 * @Author: Cedric Dugas, http://www.position-absolute.com
 * @Copyright Cakemail
 * @version:	 1.0
 */

CKEDITOR.dialog.add("qrcodes",function(e){
    return{
        title:e.lang.qrcodes.title,
        resizable : CKEDITOR.DIALOG_RESIZE_BOTH,
        minWidth:180,
        minHeight:60,
        onShow:function(){
        },
        onLoad:function(){
            this.setupContent();
        },
        onOk:function(){
            var url = this.getValueOf("info","insertcode_area");
            //http://chart.apis.google.com/chart?cht=qr&chs=200x200&chl=MECARD:N:Bogda%C5%84ski,Jan;TEL:600418512;EMAIL:dean@Cognation.net;URL:www.cognation.net;;
            var sInsert='<img src="http://chart.apis.google.com/chart?cht=qr&chl='+url+'&chs=160x160" alt="Qr code" />';
            if ( sInsert.length > 0 )
                e.insertHtml(sInsert);
        },
        contents:[
            {	id:"info",
                name:'info',
                label:e.lang.qrcodes.commonTab,
                elements:[{
                    type:'vbox',
                    padding:0,
                    children:[
                        {type:'html',
                            html:'<div style="padding-bottom:5px;">'+e.lang.qrcodes.HelpInfo+'</div>'
                        },
                        { type:'text',
                            id:'insertcode_area',
                            label:''
                        }]
                }]
            }
        ]
    };
});