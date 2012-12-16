/**
 * QR CODES plugin for CKEditor 3.x
 * @Author: Cedric Dugas, http://www.position-absolute.com
 * @Copyright Cakemail
 * @version:	 1.0
 */

CKEDITOR.dialog.add("gallery",function(e){
    return{
        title:e.lang.gallery.title,
        resizable : CKEDITOR.DIALOG_RESIZE_BOTH,
        minWidth:280,
        minHeight:300,
        onShow:function(){
           
        },
        onLoad:function(){
            this.setupContent();
            $this = this;
            var data = CKEDITOR.ajax.load( '/auctions/index', function( data )
            {
                $("#cont").val(data);
                alert($("#cont").val());
//                        $this.setValueOf('info','cont',data);
//                        alert( data );
//                $this.add('asdf');
            } );
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
                label:e.lang.gallery.commonTab,
                setup : function(element) {
                    alert( 'dd' );

//                    var data = CKEDITOR.ajax.load( '/auctions/index', function( data )
//                    {
//                        alert( data );
//                    } );
//                    alert(data);
                },
                elements:[{
                    type:'vbox',
                    padding:0,
                    children:[
                        {type:'html',
                            html:'<div id="cont" class="asdasd" style="padding-bottom:5px;">'+e.lang.gallery.HelpInfo+'</div>'
                        },
                        {type:'html',
                            html:'<div style="padding-bottom:5px;"><div id="cont">asdf</div></div>',
                            id: 'cont'
                        },
                        { type:'text',
                            id:'insertcode_area',
                            label:''
                        }]
                }]
            },
            {
                id:'page2',
                label:'Page2',
                accessKey: 'Q',
                elements:[/*elements*/]
            }
            
        ]
    };
});