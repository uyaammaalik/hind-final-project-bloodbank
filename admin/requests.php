<?php  session_start(); 
if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
<html>
<head>
<title>Home | Requests</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" /></head>
<body>
<?php include('../db/function.php') ?>
<?php


if(isset($_POST["submit"]))
{
	$cn=makeconnection();
	$s="insert into request (name, gender, age, mobileno, bloodgrp, email, date, detail) values ('" . $_POST["name"] . "','" .$_POST["gender"] . "','". $_POST["age"] ."','". $_POST["mobno"] ."','". $_POST["bldgrp"] ."','". $_POST["email"]."','". $_POST["date"]."','". $_POST["details"]."')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo"<script>alert('Your Record Saved');</script>";
}


?> 
 <?php include('top.php');  ?>
<center>
<div width="1020px">
<div style="float:left; width:200px">
<?php include('right.php'); ?>
</div>
<div style="width:800px; float:left" class="panel">
<table class="adminheading"><tr><td>Give Requests...</td></tr></table>
<br><br><br>
<form method="post">
<table class="admintabadmin">
<tr>
<td>
Name: <br><input type="text" name="name" class="form-control" required></td>
<td>Gender: <br><select name="gender" class="form-control" required>
			<option selected>--Select--</option>
			<option>Male</option>
			<option>Female</option>
			<option>Other</option>
			</select></td>
<td>Age: <br><input type="number" name="age" class="form-control" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td>Mobile No: <br><input type="number" class="form-control" name="mobno" required></td>
<td>Blood Group: <br><select name="bldgrp" class="form-control" required><option value="">--Select--</option>

<?php
$cn=makeconnection();
$s="select * from bloodgroup";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[1]==$_POST["s2"])
		{
			echo "<option value=$data[1]>$data[1]</option>";
		}
		else
		{
			echo "<option value=$data[1]>$data[1]</option>";
		}
		
		
		
	}
	mysqli_close($cn);

?>
</select>
</td>
<td>Till Required Date: <br><input type="date" class="form-control" name="date" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td colspan="3">Email: <br><input type="email" class="form-control" name="email" required></td>
</tr>
<tr><td height="12px"></td></tr>
<tr><td colspan="3">Details: <br><textarea name="details" class="form-control" required></textarea></td></tr>
<tr><td height="12px"></td></tr>
<tr><td><input type="submit" name="submit" class="btn btn-success" value="Add Request"></td>
<td><input type="reset" class="btn btn-success"></td></tr>
</table>
</form>
</body>
</html>