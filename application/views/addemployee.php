<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Employee CURD</title>
	<link rel="stylesheet" href=<?php echo base_url("/asset/css/bootstrap.min.css"); ?>>
	<script src=<?php echo base_url("/asset/js/jquery-3.4.1.min.js"); ?>></script>
	<script src=<?php echo base_url("/asset/js/bootstrap.min.js"); ?>></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Employee CURD</a>
  </div>
</nav>
<div class="container mt-3">
<h4>Add Employee Records</h4><br>
<?php echo form_open('welcome/add',['class'=>'col-7']); ?>
  <div class="form-group ">
    <label for="fullname" >Full Name</label>
    <?php 
        echo form_input( array('name' => 'fullname', 'id' => 'fullname','class' => 'form-control'));
    ?>
    <?php echo form_error('fullname', '<div class="error text-danger">', '</div>'); ?>
  </div>
  <div class="form-group">
    <label for="role">Role</label>
    <?php 
        echo form_input( array('name' => 'role', 'id' => 'role','class' => 'form-control'));
    ?>
  </div>
  <div class="form-group">
    <label for="contact">Contact No</label>
    <?php 
        echo form_input( array('name' => 'contact', 'id' => 'contact','class' => 'form-control'));
    ?>
    <?php echo form_error('contact', '<div class="error text-danger">', '</div>'); ?>
  </div>
  
<?php 
echo form_submit('Submit', 'Submit', array('class' => 'btn btn-primary'));
echo anchor('welcome', 'back', array('class' => 'btn btn-primary' , "type" => "submit")); ?>

<?php echo form_close(); ?>

<br>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand invisible" href="#">l</a>
  
</nav>
</body>
</html>