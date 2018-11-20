
<style>

.g-recaptcha{
padding: 0px 0px !important;
}

</style>


<script src='https://www.google.com/recaptcha/api.js'></script>

 <div class="container">
<div class="users form ">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
           <h2 class="title"> <?php echo __('Sign-in'); ?></h2>
        <br>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
	<div class="g-recaptcha" data-sitekey="6LdpMXAUAAAAAK3eIZ2aw7EVbiXlnqxquT9-5dIi"></div>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>
</div>