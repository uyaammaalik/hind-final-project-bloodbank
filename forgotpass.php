<html>
<head><title>Forgot Password</title>
<link rel="stylesheet" href="css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="css/top.css" type="text/css" />
<link rel="stylesheet" href="css/body.css" type="text/css" />
<link rel="stylesheet" href="css/form.css" type="text/css" />



<script>

var check = function() {
  if (document.getElementById('newpass').value ==
    document.getElementById('rnewpass').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Not Matching';
  }
}
</script></head>
<body>
<form method="post">
<?php include('banner.php'); ?>
<div class="in">
<center>
<table class="heading"><tr><td>Change Password...</td></tr></table>
<br>
<table class="dtab">
<tr><td width="425px">
E-mail: <br><input type="email" class="form-control" name="email" required></td>
<td>
NIC No: <br><input type="text" class="form-control" name="nic" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td>New Password: <br><input class="form-control" type="password" name="npass" id="newpass" required></td>
<td>Re Enter Password:<span id='message'></span> <br><input class="form-control" type="password" name="rnpass" id="rnewpass" onkeyup='check();' required></td>
</tr>
<tr><td height="12px"></td></tr>
<tr><td><input class="btn btn-success" type="submit" name="submit"></td></tr>
</table>
</form>
</div>
</body>
</html>
<?php include('db/function.php'); ?>
<?php 
$cn = makeconnection();
	$s = "select * from admin";
	$r = mysqli_query($cn,$s);
	$n=mysqli_num_rows($r);
	$data=mysqli_fetch_array($r);
	$nic = $data[4];
	$email = $data[6];

if(isset($_POST["submit"]))
{
	
	 if(($email==$_POST["email"]) && ($nic==$_POST["nic"]))
	{
		$up = "update admin set password = '".$_POST["npass"]."' where email = '".$_POST["email"]."'";
		mysqli_query($cn,$up);
		echo "<script> alert('Your password has been changed')</script>";
	}
	else
	{ 
		echo "<script> alert('Check your email or nic no..')</script>";
 } 
}

?>
<?php include('bottom.php'); ?>