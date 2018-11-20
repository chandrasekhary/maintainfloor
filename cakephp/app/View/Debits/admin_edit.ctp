<h2>Edit Debit Category</h2>
 
<!-- link to add new users page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( 'List Debit Categories', array( 'action' => 'index' ) ); ?>
</div>
 
<?php 
//this is our edit form, name the fields same as database column names
echo $this->Form->create('Debit');
 
    echo $this->Form->input('debit_category_name');
	
echo $this->Form->end('Submit');
?>