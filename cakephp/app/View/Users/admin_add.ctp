<style>

.g-recaptcha{
padding: 0px 0px !important;
}

</style>


<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Sign-up'); ?></legend>
        <?php echo $this->Form->input('username', array('class'=>'txtField'));
        echo $this->Form->input('password', array('class'=>'txtField'));
		 echo $this->Form->input('confirm_password', array('class'=>'txtField', 'title' => 'password2'));
		 echo $this->Form->input('mobile', array('class'=>'txtField'));
		 echo $this->Form->input('address', array('class'=>'txtField'));
		 
		 $sizes = array('1' => 'Yes', '0' => 'No');
echo $this->Form->input(
    'terms_and_conditions',
    array('options' => $sizes, 'default' => 'm')
);
          
		 /*    
    echo $this->Form->hidden('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
	*/	
	 ?>
	 <div class="g-recaptcha" data-sitekey="6LdpMXAUAAAAAK3eIZ2aw7EVbiXlnqxquT9-5dIi"></div>
    </fieldset>
	<input type='hidden' name='data[User][role]' value='<?php echo $role; ?>' />
<?php echo $this->Form->end(__('Submit')); ?>
</div>