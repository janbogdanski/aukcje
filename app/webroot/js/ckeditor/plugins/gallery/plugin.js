/**
 * QR CODES plugin for CKEditor 3.x
 * @Author: Cedric Dugas, http://www.position-absolute.com
 * @Copyright Cakemail
 * @Licence: MIT
 * @version:	 1.0
 */

CKEDITOR.plugins.add('gallery',
    {
        requires: ['dialog'],
        lang : ['en', 'fr'],
        init:function(a) {
            var b="gallery";
            var c=a.addCommand(b,new CKEDITOR.dialogCommand(b));
            c.modes={wysiwyg:1,source:0};
            c.canUndo=false;
            a.ui.addButton("gallery",{
                label:a.lang.gallery.title,
                command:b,
                icon:this.path+"gallery.jpg"
            });
//            var answer = window.open('');}
            CKEDITOR.dialog.add(b,this.path+"dialogs/gallery.js")}
    });