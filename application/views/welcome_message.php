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
		<link rel="stylesheet" href="./asset/css/bootstrap.min.css">
		<script src="./asset/js/jquery-3.4.1.min.js"></script>
		<script src="./asset/js/bootstrap.min.js"></script>
	<style>
		.table-body{
			max-height: 60vh;
			overflow: auto;
			margin-bottom: 12px;
		}
		th{
			position: sticky;
			top: 0;
			background: white;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Employee CURD</a>
  </div>
</nav>
<div class="container mt-3">
<h4>Employee Records</h4>
<?php echo anchor('welcome/post', 'Add +', array('class' => 'btn btn-primary mb-3 mt-2')); ?>
<?php echo anchor('welcome/pdfprint', 'Print ', array('class' => 'btn btn-success mb-3 mt-2 ml-3', 'id'=>"printbtn")); ?>

<!-- <button class="btn btn-success mb-3 mt-2 ml-3" id="printbtn"> Print</button> -->

<div class="table-body">
<table class="table " id="dataTable">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Full name</th>
      <th scope="col">Role</th>
      <th scope="col">Contact</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	<?php if(count($data) > 0):
		 foreach ($data as $row):
	?>
    <tr>
      <td><?php echo($row->id) ?></td>
      <td><?php echo($row->emp_name) ?></td>
      <td><?php echo($row->emp_role) ?></td>
      <td><?php echo($row->emp_contact) ?></td>
      <td> 
	  	<h5><?php echo anchor("welcome/edit/{$row->id}", 'Edit', array('class' => 'badge badge-success')); ?>
	  	<?php echo anchor("welcome/delete/{$row->id}", 'Delete', array('class' => 'badge badge-danger')); ?></h5>
	  </td>
    </tr>
	<?php endforeach; ?>
	<?php else:?>
		<tr>
		<td>
		No records available
		</td>
		</tr>
	<?php endif;?>
  </tbody>
</table>
</div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand invisible" href="#">l</a>
</nav>
</body>
</html>