<?php 
session_start();
if($_SESSION['adminstatus'] == "")
{
	header('location:../adminlogin.php');
}

?>
<?php 
include ('../db/function.php');
$cn = makeconnection();
?>

<html><head><title>Chanege Password</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />
</head>
</head><body>
<?php include('doctop.php');  ?>
<center>
<div  width="1020px">
<div style="float:left; width:200px">
<?php include('docright.php'); ?>
</div>
<div style="width:800px; float:left" class="panel">
<table class="adminheading"><tr><td>Change Password...</td></tr></table>
<br><br><br>
<form method='post'>
<table class="admintab">
<tr><td colspan="2">
	Enter Current Password: <br><input class="form-control" type='password' name='oldpass' required></td></tr>
	<tr><td height="12px"></td></tr>
<tr><td>Enter New Password: <br><input class="form-control" type='password' name='newpass' required><td>
	<td>Re-enter new password: <br><input class="form-control" type='password' name='renewpass' required></td></tr>
	<tr><td height="12px"></td></tr>
	<tr><td><input width="100px" type='submit' name='submit' class="btn btn-success" value='Change'></td></tr>
</form>
<?php
	$new = "select password from admin where username = '".$_SESSION['username']."'";
$q=mysqli_query($cn,$new);
$n=mysqli_num_rows($q);
$data=mysqli_fetch_array($q);
$pass = $data[0];
if(isset($_POST['submit'])){

	
		$cn=makeconnection();			

			$s="select *from admin where username='" .$_SESSION["username"] . "' and  password='" .$_POST["oldpass"] . "'";
			
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	
	if($r>0)
	{
	
	$s1="update admin set password='" . $_POST["newpass"]  ."' where username='" .$_SESSION["username"] ."'";
	mysqli_query($cn,$s1);
	mysqli_close($cn);
	echo "<script>alert('Password was Changed');</script>";

	}
	else
	{
		echo "<script>alert('Invalid old Password');</script>";
	}
}
	

?>