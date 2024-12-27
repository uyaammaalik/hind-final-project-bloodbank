<?php  session_start(); 

if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
<html>
<head><title>Home | Add District</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />
</head>
<body>
<?php include('gentop.php');  ?>
<center>
<div  width="1020px">
<div style="float:left; width:200px">
<?php include('genright.php'); ?>
</div>
<div style="width:800px; float:left" class="panel">
<table class="adminheading"><tr><td>Add District...</td></tr></table>
<br><br><br>
<form method="post">
<table class="admintab">
<tr><td>District Name:<input type="text" name="dname" class="form-control" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td><input type="submit" name="submit" value="Save District" class="btn btn-success"></td></tr>
</table>
</form>
</div>
</center>
</body>
</html>
<?php
include('../db/function.php');

$cn=makeconnection();

if(isset($_POST["submit"])) 
{
			$s="insert into district(district_name) values('" . $_POST["dname"] . "')";
			
			
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('District Saved');</script>";
	
	
	
}
?>