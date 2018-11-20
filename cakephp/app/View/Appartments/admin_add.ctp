<!-- app/View/Users/add.ctp -->
<?php 
if(isset($_SESSION['Auth']['User']))
	$arrUser = $_SESSION['Auth']['User'];
	
 ?>
<div class="users form">
<?php echo $this->Form->create('Appartment'); ?>
    <fieldset>
        <legend><?php echo __('Add Appartment'); ?></legend>
        <?php 
		echo $this->Form->input('appartment_name', array('class'=>'txtField'));
        echo $this->Form->input('blocks', array('class'=>'txtField'));
		echo $this->Form->input('address', array('class'=>'txtField'));
		echo $this->Form->input('pincode', array('class'=>'txtField'));
		echo $this->Form->input('vr_url', array('type'=>'file'));
		echo $this->Form->input('image_url', array('type'=>'file'));

		if($arrUser['role'] == "superadmin"){
		 echo $this->Form->input(
		'admin_id',
		array('options' => $Authors)
		);
		
	}else{
?><input type='hidden' name='data[Appartment][admin_id]' value='<?php echo $arrUser['id']; ?>' /><?php } ?>
</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>