<h2>Accounts</h2>
 
<!-- link to add new users page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( '+ New Account', array( 'action' => 'add' )); ?>
</div>
 
 <div class="container">
<table style='padding:5px;' class="able-responsive">
    <!-- table heading -->
    <tr style='background-color:#fff;'>
        <th>ID</th>
		<th>Credit / Debit</th> 
        <th>Amount</th>
		<th>Created Date</th>
		<th> Type</th>
        <th>Actions</th>
    </tr>

     
<?php
 	$creditAmount = 0;
	$debitAmount = 0;
    foreach( $arrAccounts as $arrAccounts ){
	if($arrAccounts['accounts']['account_type'] == 1){
		$account_type = "Credit";
		$creditAmount += $arrAccounts['accounts']['amount'];
	}else{
		$account_type = "Debit";
		$debitAmount += $arrAccounts['accounts']['amount'];
	}
		//	$creditAmount += $arrAccounts['accounts']['amount'];
			echo "<tr>";
            echo "<td>{$arrAccounts['accounts']['id']}</td>";
			echo "<td>{$account_type}</td>";
            echo "<td>{$arrAccounts['accounts']['amount']}</td>";
			echo "<td>{$arrAccounts['accounts']['created_date']}</td>";			
            echo "<td>{$arrAccounts['accounts']['description']}</td>";
			echo "<td class='actions'>";
                echo $this->Html->link( 'Edit', array('action' => 'edit', $arrAccounts['accounts']['id']) );
                 
                //in cakephp 2.0, we won't use get request for deleting records
                //we use post request (for security purposes)
                echo $this->Form->postLink( 'Delete', array(
                        'action' => 'delete', 
                        $arrAccounts['accounts']['id']), array(
                            'confirm'=>'Are you sure you want to delete that user?' ) );
            echo "</td>";
        echo "</tr>";
    }
	
?>
  <tr><td colspan="6" style='text-align: right;padding-right:100px;'><b>Total Amount: <?php 
echo ($creditAmount-$debitAmount); ?></b></td></tr>
</table>
</div>