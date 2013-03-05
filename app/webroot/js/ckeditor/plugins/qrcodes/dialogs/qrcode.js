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
        minWidth:190,
        minHeight:210,
        onShow:function(){
        },
        onLoad:function(){
            this.setupContent();
        },
        onOk:function(){
            var name = this.getValueOf("info","name").trim();
            var phone = this.getValueOf("info","phone").trim();
            var email = this.getValueOf("info","email").trim();
            var url = this.getValueOf("info","url").trim();
            var mecard = 'MECARD:';

            if(name){mecard += 'N:'+name+';';}
            if(phone){mecard += 'TEL:'+ phone+';';}
            if(email){mecard += 'EMAIL:'+ email+';';}
            if(mecard){mecard += 'URL:'+ url+';';}
            mecard += ';';
//            http://chart.apis.google.com/chart?cht=qr&chs=250x260&chl=BEGIN%3AVCARD%0AVERSION%3A2.1%0AFN%3AJan%20Bo%0AN%3ABo%3BJan%0ATEL%3BHOME%3BVOICE%3A112233%0AEMAIL%3BHOME%3BINTERNET%3Ajan%40wp.pl%0AURL%3Ahttp%3A%2F%2Fwp.pl%0AADR%3A%3B%3BWarszawa%3B%3B%3B%3B%0AORG%3AFIrma%0AEND%3AVCARD%0A
            //http://chart.apis.google.com/chart?cht=qr&chs=200x200&chl=MECARD:N:Bogda%C5%84ski,Jan;TEL:600418512;EMAIL:dean@Cognation.net;URL:www.cognation.net;;
            var sInsert='<img src="http://chart.apis.google.com/chart?cht=qr&chs=200x200&chl='+ mecard+'" alt="Proaukcje kreator aukcji online - kod QR" />';
            if (name || phone || email || url){
                e.insertHtml(sInsert);
            }
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
                            html:'<div style="padding-top:8px;">'+ e.lang.qrcodes.labelName +'</div>'
                        },
                        { type:'text',
                            id:'name',
                            label:''
                        },
                        {type:'html',
                            html:'<div style="padding-top:8px;">' + e.lang.qrcodes.labelPhone + '</div>'
                        },
                        { type:'text',
                            id:'phone',
                            label:''
                        },
                        {type:'html',
                            html:'<div style="padding-top:8px;">' + e.lang.qrcodes.labelEmail + '</div>'
                        },
                        { type:'text',
                            id:'email',
                            label:''
                        },
                        {type:'html',
                            html:'<div style="padding-top:8px;">' + e.lang.qrcodes.labelUrl + '</div>'
                        },
                        { type:'text',
                            id:'url',
                            label:''
                        }
                    ]
                }]
            }
        ]
    };
});