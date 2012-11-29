<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */


foreach($albums as $album){
    echo '<a href="?albumid='.$album['id'].'&CKEditorFuncNum='.$_GET['CKEditorFuncNum'].'">';
    echo '<img src="'.$album['thumbnail']. '" />';
    echo '</a>';
}