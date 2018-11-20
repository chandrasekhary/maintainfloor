<!-- app/View/Users/add.ctp -->
<?php 
if(isset($_SESSION['Auth']['User']))
	$arrUser = $_SESSION['Auth']['User'];
	$appartmentName = $arrAppartments[0]['Appartment']['appartment_name'];
	$appartmentID = $arrAppartments[0]['Appartment']['id'];
	
	$appartmentName = ucfirst($appartmentName)." Account Details";
	

 ?>
<div class="users form">
<?php echo $this->Form->create('Account'); ?>
    <fieldset>
        <legend><?php echo __('Add Account'); ?></legend>
		<div><i><b><?php echo ($appartmentName); ?><b></i></div>
        <?php echo $this->Form->input('amount', array('class'=>'txtField'));
        echo $this->Form->input('created_date', array('class'=>'txtField', 'type'=>'text', 'id'=>'datepicker'));
		
	 ?>
	 <div class="input text"><label for="AccountOwnerMobile">Type</label>
	 <select name='data[Account][account_type]'>
		<option value='0'>-Select</otpion>
		<option value='1'>Credit</otpion>
		<option value='2'>Debit</otpion>
	 </select>
	 </div>
     <?php
	 echo $this->Form->input('description', array('class'=>'txtField', 'type'=>'text','required'));
	 echo $this->Form->input('bill', array('type'=>'file'));

		

?>
	</fieldset>
	<input type='hidden' name='data[Account][admin_id]' value='<?php echo $admin_id; ?>' />
	<input type='hidden' name='data[Account][appartment_id]' value='<?php echo $appartmentID; ?>' />
	<?php
	
?>
<?php echo $this->Form->end(__('Submit')); ?>
</div>