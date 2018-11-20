<!-- app/View/Debits/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('Debit'); ?>
    <fieldset>
        <legend><?php echo __('Add Debit Category'); ?></legend>
        <?php 
        echo $this->Form->input('debit_category_name', array('class'=>'txtField', 'type'=>'text'));
		
	 ?>
	</fieldset>	
<?php echo $this->Form->end(__('Submit')); ?>
</div>