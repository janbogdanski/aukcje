<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    22.02.13 19:24
 * @var $this View
 */

?>
<?php  foreach($data as $photo): ?>
<!--    --><?php //print_r($photo); ?>
<?php $url = "javascript:editor.insertHtml('<img src=\"{$photo['Image']['image']}\" />')";?>

<?php echo $this->Html->link(
        $this->Html->image($photo['Image']['thumb'], array("alt" => "Brownies", 'class' => '',
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
<!-- echo $this->element('images', array("updateId" => "categoriesList"));-->
<!--?>-->

<!--?>-->
