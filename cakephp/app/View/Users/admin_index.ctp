<h2 class="title">Users</h2>
 
<!-- link to add new users page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( '+ New User', array( 'action' => 'add' ) ); ?>
</div>
 
 <div class="container">
<table style='padding:5px;' class="able-responsive">
    <!-- table heading -->
    <tr style='background-color:#fff;'>
        <th>ID</th>
        <th>Username</th>
        <th>Actions</th>
    </tr>
     
<?php
 
    //loop to show all retrieved records
    foreach( $users as $user ){
     
        echo "<tr>";
            echo "<td>{$user['User']['id']}</td>";
            echo "<td>{$user['User']['username']}</td>";
            echo "<td class='actions'>";
                echo $this->Html->link( 'Edit', array('action' => 'edit', $user['User']['id']) );
                echo $this->Form->postLink( 'Delete', array(
                        'action' => 'delete', 
                        $user['User']['id']), array(
                            'confirm'=>'Are you sure you want to delete that user?' ) );
            echo "</td>";
        echo "</tr>";
    }
?>
     
</table>
</div>