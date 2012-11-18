<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 */
?>
<h2>Auctions</h2>

<!-- link to add new users page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( '+ New Auction', array( 'action' => 'add' ) ); ?>
</div>

<table style='padding:5px;'>
    <!-- table heading -->
    <tr style='background-color:#fff;'>
        <th>ID</th>
        <th>title</th>
    </tr>

    <?php


    //loop to show all retrieved records
    foreach( $users as $user ){

        echo "<tr>";
        echo "<td>{$user['Auction']['id']}</td>";
        echo "<td>{$user['Auction']['title']}</td>";


        //here are the links to edit and delete actions
        echo "<td class='actions'>";
        echo $this->Html->link( 'Edit', array('action' => 'edit', $user['Auction']['id']) );
        echo $this->Html->link( 'Preview', array('action' => 'preview', $user['Auction']['id']) );

        //in cakephp 2.0, we won't use get request for deleting records
        //we use post request (for security purposes)
        echo $this->Form->postLink( 'Delete', array(
            'action' => 'delete',
            $user['Auction']['id']), array(
            'confirm'=>'Are you sure you want to delete that user?' ) );
        echo "</td>";
        echo "</tr>";
    }
    ?>

</table>