<h2>Debit Category</h2>
 
<!-- link to add new users page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( '+ New Category', array( 'action' => 'add') ); ?>
</div>
 
 <div class="container">
<table style='padding:5px;' class="able-responsive">
    <!-- table heading -->
    <tr style='background-color:#fff;'>
        <th>ID</th>
		<th>Category</th>
        
        <th>Actions</th>
    </tr>
     
<?php
 
     
    //loop to show all retrieved records
    foreach( $arrDebits as $arrDebits ){
	
		
        echo "<tr>";
            echo "<td>{$arrDebits['Debit']['id']}</td>";
			echo "<td>{$arrDebits['Debit']['debit_category_name']}</td>";
		    echo "<td class='actions'>";
                echo $this->Html->link( 'Edit', array('action' => 'edit', $arrDebits['Debit']['id']) );
                 
                //in cakephp 2.0, we won't use get request for deleting records
                //we use post request (for security purposes)
                echo $this->Form->postLink( 'Delete', array(
                        'action' => 'delete', 
                        $arrDebits['Debit']['id']), array(
                            'confirm'=>'Are you sure you want to delete that Debit Category?' ) );
            echo "</td>";
        echo "</tr>";
    }
?>
     
</table>
</div>