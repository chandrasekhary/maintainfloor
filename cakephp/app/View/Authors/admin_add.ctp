<!-- app/View/Users/add.ctp -->
<?php 
if(isset($_SESSION['Auth']['User']))
	$arrUser = $_SESSION['Auth']['User'];
print_r($arrUser['id']); ?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Author Registration'); ?></legend>
        <?php echo $this->Form->input('username', array('class'=>'txtField'));
        echo $this->Form->input('password', array('class'=>'txtField'));

	 ?>
    </fieldset>
	<input type='hidden' name='data[User][role]' value='author' />
	<input type='hidden' name='data[User][admin_id]' value='<?php echo $arrUser['id']; ?>' />
<?php echo $this->Form->end(__('Submit')); ?>
</div>