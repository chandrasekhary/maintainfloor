<h2>Edit User</h2>
 
<!-- link to add new users page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( 'List Users', array( 'action' => 'index' ) ); ?>
</div>
 
<?php 
//this is our edit form, name the fields same as database column names
echo $this->Form->create('Credit');
 
    echo $this->Form->input('category_title');
	
echo $this->Form->end('Submit');
?>