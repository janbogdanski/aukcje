<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */

foreach($photos as $photo){
    echo '<a href="javascript:select_image(\''.$photo['image'].'\')">';
    echo '<img src="'.$photo['thumbnail'].'">';
    echo '</a>';
}

echo '<a href="?'.$query.'">'.$query.'</a> ';

