CKEDITOR.plugins.add( 'proaukcje_insertgallery',
    {
        init: function( editor )
        {
            editor.addCommand( 'insertGallery',
                {
                    exec : function( editor )
                    {
                        //dataitem.zmienna - jest dostepna jako 'zmienna' w otwartym oknie
                        //przekazujemy instancje editor, do ktorego mozemy pisac editor.insertHtml(data);
                        dataitem = window.open("/galleries/galleryBrowser","dataitem", "toolbar=no,menubar=no,scrollbars=yes,top=100,width=700,height=500");
                        dataitem.editor = editor;
                    }
                });
            editor.ui.addButton( 'proaukcje_insertgallery',
                {
                    label: 'Insert Gallery',
                    command: 'insertGallery',
                    icon: this.path + 'proaukcje_insertgallery.png',
                } );
        }
    } );