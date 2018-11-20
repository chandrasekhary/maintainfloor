<!-- app/View/Credits/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('Credit'); ?>
    <fieldset>
        <legend><?php echo __('Add Credit Category'); ?></legend>
        <?php 
        echo $this->Form->input('category_title', array('class'=>'txtField', 'type'=>'text'));
		
	 ?>
	</fieldset>	
<?php echo $this->Form->end(__('Submit')); ?>
</div>