<?php  session_start();  ?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><head><title>Login</title>
<link rel="stylesheet" href="css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="css/top.css" type="text/css" />
<link rel="stylesheet" href="css/body.css" type="text/css" />
<link rel="stylesheet" href="css/form.css" type="text/css" />
</head>
<body>

<form method="post" enctype="multipart/form-data">
<?php include('banner.php'); ?>
<div class="in">
<center>

<table class="heading"><tr><td>Admin login...</td></tr></table>
<br>
<form method="post" enctype="multipart/form-data">

<div style="border:2px solid #CD0000; border-radius:5px; width:340px; padding-top:20px;padding-bottom:20px"><table width="300px" style="font-style:italic; text-align:left; font-size:16px; font-weight:bold;">

<tr>
<th>
Username: <br><input type="text" class="form-control"placeholder="User Name" name="uname" required></th></tr>
<tr><td height="12px"></td></tr>
<tr><th>
Password: <br><input type="password" name="password" placeholder="Password" class="form-control" required></th></tr>
<tr><td height="12px"></td></tr>

<tr><th>
<input type="submit" class="btn btn-success" value="Log In" name="login"></th></tr>
<tr><td height="12px"></td></tr>

<tr><th><a class="link" href="forgotpass.php"> <div height="20px" style="float:left">Forgot Password</div></a></th></tr>
<tr><td height="12px"></td></tr>
</form>
</div>
</div>

<?php include('db/function.php') ?>
<?php

$_SESSION['adminstatus']="";

if(isset($_POST["login"])) 
{
	
	$cn=makeconnection();			

			$s="select *from admin where username='" . $_POST["uname"] . "' and password='" .$_POST["password"] . "'";
			
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	$data=mysqli_fetch_array($q);
	$_SESSION["usertype"]=$data[2];
	
	mysqli_close($cn);
	if($r>0 && $_SESSION["usertype"]=="Administrator")
	{
		$_SESSION["username"]=$_POST["uname"];
       $_SESSION['adminstatus']="yes";
	   $_SESSION["usertype"]=$data[2];
	   echo "<script>location.replace('admin/adminindex.php')</script>";
	}
	else if($r>0 && $_SESSION["usertype"]=="General")
	{
		$_SESSION["username"]=$_POST["uname"];
       $_SESSION['adminstatus']="yes";
	   $_SESSION["usertype"]=$data[2];
	   	   echo "<script>location.replace('admin/generalindex.php')</script>";
	}
	else if($r>0 && $_SESSION["usertype"]=="Doctor")
	{
		$_SESSION["username"]=$_POST["uname"];
       $_SESSION['adminstatus']="yes";
	   $_SESSION["usertype"]=$data[2];
	   	   echo "<script>location.replace('admin/doctorindex.php')</script>";
	}
	else
	{
		echo "<script>alert('Invalid Username Or Password');</script>";
	}
		
		}	
?> 

</body>
</html>

