<h2>Flats</h2>
 
<!-- link to add new users page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( '+ New Flat', array( 'action' => 'add' , $appartment_id ) ); ?>
</div>
 
 <div class="container">
<table style='padding:5px;' class="able-responsive">
    <!-- table heading -->
    <tr style='background-color:#fff;'>
        <th>ID</th>
		<th>Flat Number</th>
        
        
		<th>Ownership</th>
        <th>Actions</th>
    </tr>
     
<?php
 
     
    //loop to show all retrieved records
    foreach( $Flats as $user ){
	
		$ownership = ($user['Flat']['ownership'] == 1) ? 'Owner' : 'Tanent'; 
     
        echo "<tr>";
            echo "<td>{$user['Flat']['id']}</td>";
			echo "<td>{$user['Flat']['flat_no']}</td>";
		  
           
			echo "<td>{$ownership}</td>";
             
            //here are the links to edit and delete actions
            echo "<td class='actions'>";
                echo $this->Html->link( 'Edit', array('action' => 'edit', $user['Flat']['id']) );
                 
                //in cakephp 2.0, we won't use get request for deleting records
                //we use post request (for security purposes)
                echo $this->Form->postLink( 'Delete', array(
                        'action' => 'delete', 
                        $user['Flat']['id']), array(
                            'confirm'=>'Are you sure you want to delete that user?' ) );
            echo "</td>";
        echo "</tr>";
    }
?>
     
</table>
</div>