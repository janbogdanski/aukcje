<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */
?>

<h2>Gallerys</h2>

<!-- link to add new users page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( '+ New Gallery', array( 'action' => 'add' ) ); ?>
</div>

<table style='padding:5px;'>
    <!-- table heading -->
    <tr style='background-color:#fff;'>
        <th>ID</th>
        <th>img</th>
        <th>title</th>
        <th>opt</th>
    </tr>

    <?php

    //loop to show all retrieved records
    foreach( $galleries as $gallery ): ?>

        <tr>
        <td><?php echo $gallery['Gallery']['id']; ?></td>
        <td><?php echo $this->Html->image($this->PicasaImageSize->picasaImgScaledUrl($gallery['Gallery']['mini'] ,PicasaImageSizeHelper::PHOTO_THUMB_LIST), array("alt" => "Brownies")); ?></td>
        <td><?php echo $gallery['Gallery']['title']; ?></td>
<?php

        //here are the links to edit and delete actions
        echo "<td class='actions'>";
        echo $this->Html->link( 'Edit', array('action' => 'edit', $gallery['Gallery']['id']) );
        echo $this->Html->link( 'Preview', array('action' => 'view', $gallery['Gallery']['id']) );

        //in cakephp 2.0, we won't use get request for deleting records
        //we use post request (for security purposes)
        echo $this->Form->postLink( 'Delete', array(
            'action' => 'delete',
            $gallery['Gallery']['id']), array(
            'confirm'=>'Are you sure you want to delete that user?' ) );
        echo "</td>";
        echo "</tr>";
        ?>
        <?php endforeach;?>

</table>