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
    foreach( $galleries as $gallery ){

        echo "<tr>";
        echo "<td>{$gallery['Gallery']['id']}</td>";
        echo "<td>{$this->Html->image($gallery['Gallery']['mini'], array("alt" => "Brownies"))}</td>";
        echo "<td>{$gallery['Gallery']['title']}</td>";


        //here are the links to edit and delete actions
        echo "<td class='actions'>";
        echo $this->Html->link( 'Edit', array('action' => 'edit', $gallery['Gallery']['id']) );
        echo $this->Html->link( 'Preview', array('action' => 'preview', $gallery['Gallery']['id']) );

        //in cakephp 2.0, we won't use get request for deleting records
        //we use post request (for security purposes)
        echo $this->Form->postLink( 'Delete', array(
            'action' => 'delete',
            $gallery['Gallery']['id']), array(
            'confirm'=>'Are you sure you want to delete that user?' ) );
        echo "</td>";
        echo "</tr>";
    }
    ?>

</table>