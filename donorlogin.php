<?php session_start();  ?>
<html>
<head><title>Login</title>
<link rel="stylesheet" href="css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="css/top.css" type="text/css" />
<link rel="stylesheet" href="css/body.css" type="text/css" />
<link rel="stylesheet" href="css/form.css" type="text/css" />
</head>
<body>
<?php include('banner.php'); ?>
<div class="in">
<center>

<table class="heading"><tr><td>Donor Login...</td></tr></table>
<br>
<form method="post" enctype="multipart/form-data">

<div style="border:2px solid #CD0000; border-radius:5px; width:340px; padding-top:20px;padding-bottom:20px"><table width="300px" style="font-style:italic; text-align:left; font-size:16px; font-weight:bold;">

<tr>
<th>E-Mail: <br><input class="form-control" type="email" name="email" required></th></tr>
<tr><td height="12px"></td></tr>
<tr><th>
Password: <br><input class="form-control" type="password" name="password" required></th></tr>
<tr><td height="12px"></td></tr>

<tr><th><input  type="submit" value="Log In" class="btn btn-success" name="login"></th></tr>
<tr><td height="12px"></td></tr>

<tr><th><a class="link" href="fogotpass.php"> <div height="20px" style="float:left">Forgot Password</div></a></th></tr>
<tr><td height="12px"></td></tr>

<tr><th><a href="donorreg.php"> <div height="20px" class="active">I want to become a Donor!</div></a></th></tr>
</form>
</div>
</center>
</div>

<?php include('db/function.php') ?>

<?php

$_SESSION['donorstatus']="";

if(isset($_POST["login"])) 
{
	
	$cn=makeconnection();			

			$s="select *from donor where email='" . $_POST["email"] . "' and password='" .$_POST["password"] . "'";
			
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	mysqli_close($cn);
	if($r>0)
	{
		$_SESSION["email"]=$_POST["email"];
       $_SESSION['donorstatus']="yes";

echo "<script>location.replace('donor/index.php');</script>";
	}
	else
	{
		echo "<script>alert('Invalid Email Or Password');</script>";
	}
		
		}	
?> 



</body>
</html>
