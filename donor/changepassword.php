<?php session_start();

if($_SESSION['donorstatus']=="")
{
	header("Location:../donorlogin.php");
}
?>
<?php 
include ('../db/function.php');
$cn = makeconnection();

?>
<html><head><title>Home | Change Password</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />
</head>
<body>
<?php include('top.php');  ?>
<center>
<div style="width:1020px; float:left" class="npanel">
<table class="adminheading"><tr><td>Update Profile...</td></tr></table>
<br><br>
<form method='post'>
<table width="700px" style="font-style:italic; font-size:16px; font-weight:bold;">
</tr><td colspan="2">

	Enter Current Password: <br><input class="form-control" type='password' name='oldpass' required></td></tr>
	<tr><td height="12px"></td></tr>
	
<tr><td>	Enter New Password: <br><input class="form-control" type='password' name='newpass' required></td>
<td>	Re-enter new password: <br><input class="form-control" type='password' name='renewpass' required></td></tr>
	<tr><td height="12px"></td></tr>
	<tr><td><input class="btn btn-success" type='submit' name='submit' value='Change'></td></tr>
	
	</table>
</form>

</body>
</html>
<?php

if(isset($_POST['submit'])){

	
		$cn=makeconnection();			

			$s="select *from donor where email='" .$_SESSION["email"] . "' and  password='" .$_POST["oldpass"] . "'";
			
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	
	if($r>0)
	{
	
	$s1="update donor set password='" . $_POST["newpass"]  ."' where email='" .$_SESSION["email"] ."'";
	mysqli_query($cn,$s1);
	mysqli_close($cn);
	echo "<script>alert('Record Update');</script>";

	}
	else
	{
		echo "<script>alert('Invalid old Password');</script>";
	}
}
	

?>