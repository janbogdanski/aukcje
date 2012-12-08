CKEDITOR.plugins.add( 'proaukcje_insertimage',
    {
        init: function( editor )
        {
            editor.addCommand( 'insertImage',
                {
                    exec : function( editor )
                    {
                        //dataitem.zmienna - jest dostepna jako 'zmienna' w otwartym oknie
                        //przekazujemy instancje editor, do ktorego mozemy pisac editor.insertHtml(data);
                        dataitem = window.open("/galleries/imageBrowser","dataitem", "toolbar=no,menubar=no,scrollbars=yes,top=100,width=700,height=500");
                        dataitem.editor = editor;
                    }
                });
            editor.ui.addButton( 'proaukcje_insertimage',
                {
                    label: 'Insert Image',
                    command: 'insertImage',
                    icon: this.path + 'proaukcje_insertimage.jpg'
                } );
        }
    } );