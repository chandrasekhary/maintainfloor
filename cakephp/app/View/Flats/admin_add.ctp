<!-- app/View/Users/add.ctp -->
<?php 
if(isset($_SESSION['Auth']['User']))
	$arrUser = $_SESSION['Auth']['User'];
print_r($arrUser['id']); ?>
<div class="users form">
<?php echo $this->Form->create('Flat'); ?>
    <fieldset>
        <legend><?php echo __('Add Flat'); ?></legend>
        <?php echo $this->Form->input('flat_no', array('class'=>'txtField'));
      
	 ?>
	 <div class="input text"><label for="FlatOwnerMobile">Ownership</label>
	 <select name='data[Flat][ownership]'>
		<option value='0'>-Select</otpion>
		<option value='1'>Owner</otpion>
		<option value='2'>Tanent</otpion>
	 </select>
	
	 </div>
     <?php
	 echo $this->Form->input(
    'user_id',
    array('options' => $Authors)
);

?>
	</fieldset>
	<input type='hidden' name='data[Flat][appartment_id]' value='<?php echo $appartment_id; ?>' />
	<?php
	
?>
<?php echo $this->Form->end(__('Submit')); ?>
</div>