<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());

$arrUser = "";
if(isset($_SESSION['Auth']['User']))
	$arrUser = $_SESSION['Auth']['User'];

?>
<?php // echo $this->Html->link( '+ New User', array( 'action' => 'add' ) ); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
  
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('jquery-ui');
		echo $this->Html->css('jquery-ui');
	?>
	<script>
	
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
</script>
<!--	<input type='textfield' id="datepicker"></div> -->
	<style>
	
		.left {
  float: left;
  width: 125px;
  text-align: right;
  margin: 2px 10px;
  display: inline;
}

.right {
  float: left;
  text-align: left;
  margin: 2px 10px;
  display: inline;
  width: 80%;
}

body {
    background: #ffffff;
    font: normal normal 12px Arial,Helvetica,sans-serif !important;
    color: #404040;
    line-height: normal;
}

input, textarea{
	width: 247px; */
    margin-bottom: 14px;
    /* padding: 4px 4px 4px 8px; */
    border-radius: 3px;
    border-color: #e5e5e5;
    border-style: solid;
    border-width: 1px;
    box-sizing: border-box;
    background-color: #fff;
    font-size: 14px;
    font-weight: normal;
    color: #000a12;
	width: 300px;
}

h1 {
    
    text-align: right;
}

.loginform{
	background-image: url("app.jpeg");
   background-color: #cccccc;
}

.error{
	
	background-color: #fc727a !important;
	color: #fff;
	padding: 10px 15px !important;
    font-size: 14px;
	background-image: none;
	border: 1px solid #fff;
	
}

.message{
	position: absolute;
	top: 0;
	right:20px;
}

#content{
	position: relative;
}
	</style>
<style>
body{
background-color:rgba(203,203,210,0.15);
}
*{
text-shadow:none;
}
#content{
background-color:transparent;
}
#container #content .right{
width: 86.5%;
    border: 1px solid rgba(0,0,0,0.125);
    background-color: #fff;
    padding: 0px !important;
    margin-right: 0px !important;
}
#header h1{
font-size:16px;
padding:15px;height:50px;
	border:1px solid rgba(0,0,0,0.125);
	background-color:#fff;
	background-position: 15px center !important;
}
#header h1 a, #header h1 a:hover{
color:#888;
background-color:transparent;
}
#container #content .right .title{ 
color:#000;
margin-top:0px;padding-left:15px;padding-top:15px;
font-family:"Roboto", "Helvetica Neue", Arial, sans-serif;
 }
#container #content .right .container{
	width:100%; padding:0px;
}
#container #content .right .upper-right-opt a{ 
    padding-top: 0;
    padding-left: 15px;
    padding-bottom: 30px;
    display: block;
	}
#container #content .right .container .able-responsive th{
border-bottom-width: 1px;
    font-size: 12px;
    text-transform: uppercase;
    color: #9A9A9A;
    font-weight: 400;
    padding-bottom: 5px;
    border-top: none !important;
    border-bottom: none;
    text-align: left !important;

}
#container #content .right .container .able-responsive td{
color:#000;
font-size:16px;
border-top:1px solid #e9ecef;
padding:12px 8px;
vertical-align:middle;
}
#container #content .right .container .able-responsive tr:last-child td{
border-bottom:none;
}
#container #content .right .container .able-responsive{margin-bottom:0px;}
#container #content .right .container .able-responsive td.actions{text-align:left;padding-left:0px;}
#container #content .right .container .able-responsive th,
#container #content .right .container .able-responsive td
{
	padding-top:15px;
	padding-left:15px;
	padding-bottom:15px;
}
.able-responsive a{
    -webkit-appearance: none;
    background: none !important;
    background-color: #a4a4a5 !important;
    border: none !important;
    border-radius: 2px;
    padding: 7px 12px 6px !important;
    font-size: 12px;
    color: #000;
    text-shadow: none;
    line-height: normal;
    margin: 0px;
}
.able-responsive a:hover{background-color:#d0d0d0 !important}

div.form, div.index, div.view {
    float: right;
    width: 76%;
    border-left: 0px !important;
    padding: 10px 2%;
}

.sidemenulink{
		border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 5px; 
    
}

</style>
	</head>
<body>
	<div id="container">
		<div id="header">
			
			<div style='float:right;><h1 style='color:#888'><?php if(isset($arrUser['username'])){  echo "Welcome ".$arrUser['username']."|".$arrUser['role']; } ?> 
			<?php if(isset($arrUser['username'])){ ?>| 
			<?php
				echo $this->Html->link(
    'Logout',
    '/admin/users/logout',
    array('class' => 'button', 'target' => '_blank', 'style' => 'color: green;'));
			?>
			<?php }else{ ?>
			
			<?php			
				
				echo $this->Html->link(
    'Login',
    '/admin/users/login',
    array('class' => 'button', 'target' => '_blank'));
		?>
			<?php } ?>
			</h1></div>
		</div>
		<div id="content">
		<?php if(isset($arrUser['username'])){ ?>
		<div class='left'> 
		
		<?php if(isset($arrUser['role']) && ($arrUser['role'] == "superadmin")){ 
		
		?>
		<div class='sidemenulink'>
		<?php
		echo $this->Html->link(
		'Sub Admins',
		'/admin/users/index',
		array('class' => '', 'target' => '_blank'));

		?>
	
	
		</div><br><div class='sidemenulink'>
	<?php
						echo $this->Html->link(
    'Appartments',
    '/admin/appartments/all',
    array('class' => '', 'target' => '_blank'));
	
	?>
		<?php
	/*
	</div><br><div class='sidemenulink'>
	
						echo $this->Html->link(
    'Debits List',
    '/admin/debits/index',
    array('class' => '', 'target' => '_blank'));
	*/
	?>
	</div>
		
		<?php }else if(isset($arrUser['role']) && ($arrUser['role'] == "admin")){ 
		?>
		<br><div class='sidemenulink'>
	<?php
	
						echo $this->Html->link(
    'Appartment List',
    '/admin/appartments/index',
    array('class' => 'button', 'target' => '_blank'));
	?>
	</div><br><div class='sidemenulink'>
	<?php
	
						echo $this->Html->link(
    'Accounts',
    '/admin/accounts/index',
    array('class' => 'button', 'target' => '_blank'));
	
	
		
		?>
		</div>
		<?php }else{ ?>
		
		<?php
			
				
				echo $this->Html->link(
    'Login',
    '/admin/users/login',
    array('class' => 'button', 'target' => '_blank'));
		?>
		<?php } ?>
		</div>
		<div class='right'>

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<?php }else{ ?>
		<div class='right'>

		<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
			</div>
		<?php } ?>
		
		</div>
		<div id="footer">
			<?php 
			echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'https://cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
				
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php  echo $this->element('sql_dump'); ?>
</body>
</html>
