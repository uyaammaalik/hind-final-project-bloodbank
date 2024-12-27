<?php  session_start(); 

if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
<html>
<head><title>Home | Blood</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />
</head>

<body>
<?php include('top.php');  ?>
<?php include ('../db/function.php') ?>
<?php

if (isset($_POST["submit"]))
{
	$cn=makeconnection();
	$s = "insert into bloodgroup (blood_group) values ('".$_POST["bg"]."')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Blood Group Saved');</script>";
}

?>
<center>
<div  width="1020px">
<div style="float:left; width:200px">
<?php include('right.php'); ?>
</div>
<div style="width:800px; float:left" class="panel">
<table class="adminheading"><tr><td>Add a Blood Group...</td></tr></table>
<br><br><br>
<form method="post">
<table class="admintab">
<tr><td>Blood Group: <input type="text" name="bg" class="form-control" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td><input type="submit" name="submit" class="btn btn-success" ></td></tr>
</table>
</form>
</div>
</center>
</body>
</html>
