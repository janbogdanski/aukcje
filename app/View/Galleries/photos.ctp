<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */
?>
<?php if(isset($_GET['CKEditorFuncNum'])): ?>



<?php foreach($photos as $photo): ?>

    <?php echo $this->Html->link(
            $this->Html->image($photo['thumbnail'], array("alt" => "Brownies", 'class' => '',
//                'data-full' => $photo['image'],
//                'data-thumb' => $photo['thumbnail'],
            )),
            'javascript:select_image(\''.$photo['image'].'\')',
            array('escape' => false)
        );?>
        <?php 
//    echo '<a href="javascript:select_image(\''.$photo['image'].'\')">';
//    echo '<img src="'.$photo['thumbnail'].'">';
//    echo '</a>'; ?>
<?php endforeach; ?>

<!--            --><?php //echo '<a href="?'.$query.'">'.$query.'</a> '; ?>
<?php else: ?>
<?php  foreach($photos as $photo): ?>
    <?php $url = "javascript:editor.insertHtml('<img src=\"{$photo['image']}\" />')";?>

            <?php echo $this->Html->link(
            $this->Html->image($photo['thumbnail'], array("alt" => "Brownies", 'class' => '',
//                'data-full' => $photo['image'],
//                'data-thumb' => $photo['thumbnail'],
            )),
            $url,
            array('escape' => false)
        );?>
<!--    echo '<a href="javascript:select_image(\''.$photo['image'].'\')">';-->
<!--        echo '<img src="'.$photo['thumbnail'].'">';-->
<!--        echo '</a>';-->

        <?php endforeach; ?>
        <?php endif; ?>



<!--editor.insertHtml( 'The current date and time is: <em>' + item + '</em>' );-->
