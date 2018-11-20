<h2>Appartments List</h2>
 
<!-- link to add new users page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( '+ New Appartment', array( 'action' => 'add' ) ); ?>
</div>
 
 <div class="container">
<table style='padding:5px;' class="able-responsive">
    <!-- table heading -->
    <tr style='background-color:#fff;'>
        <th>ID</th>
        <th>NAME</th>
		<th>Admin</th>
		<th>Address</th>
		<th></th>
        <th>Actions</th>
    </tr>
     
<?php
 
     
    //loop to show all retrieved records
    foreach( $Appartments as $user ){
     
        echo "<tr>";
            echo "<td>{$user['Appartment']['id']}</td>";
            echo "<td>{$user['Appartment']['appartment_name']}</td>";
			
            echo "<td>-admin email id --</td>";
			echo "<td>{$user['Appartment']['address']}</td>";
			echo "<td>".$this->Html->link(
    'Accounts',    "/admin/accounts/index/{$user['Appartment']['admin_id']}",
    array('class' => '', 'target' => '_blank'))."</td>";
            echo "<td class='actions'>";
                echo $this->Html->link( 'Edit', array('action' => 'edit', $user['Appartment']['id']) );
                 
                //in cakephp 2.0, we won't use get request for deleting records
                //we use post request (for security purposes)
                echo $this->Form->postLink( 'Delete', array(
                        'action' => 'delete', 
                        $user['Appartment']['id']), array(
                            'confirm'=>'Are you sure you want to delete that user?' ) );
            echo "</td>";
        echo "</tr>";
    }
?>
     
</table>
</div>