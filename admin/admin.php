<?php  
session_start(); 
if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
<html>
<head>
<title>
Home | Administrator
</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />

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
</script>
</head>
<body>
<?php include('top.php');  ?>
<?php include('../db/function.php') ?>

<?php


if(isset($_POST["submit"]))
{
	$ps = $_POST["password"];
	$cn=makeconnection();
	$s="insert into admin (username, name, usertype, address,nic, tel, email, password) values ('" . $_POST["uname"] . "','" .$_POST["name"] . "','" .$_POST["usertype"] . "','". $_POST["address"] ."','". $_POST["nic"] ."','". $_POST["tel"] ."','". $_POST["email"] ."','". $ps."')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo"<script>alert('Your Record Saved');</script>";
}


?> 
<center>
<div  width="1020px">
<div  style="float:left; width:200px"><?php include('right.php'); ?></div>


<div style="width:800px; float:left" class="panel">

<table class="adminheading"><tr><td>Admin...</td></tr></table><br>

<form method="post">
<table class="admintabadmin">
<tr>
<td>User Name:* <br><input type="text" name="uname" class="form-control" required pattern="[a-zA-Z _]{3,15}" title="please enter only character between 3 to 15 for user name"></td>
<td>Name:* <br><input type="text" name="name" class="form-control" required></td>
<td>User Type:* <br><select name="usertype" class="form-control">
				<option>Administrator</option>
				<option>General</option>
				<option>Doctor</option></select></td></tr>
<tr><td height="12px"></td></tr>
<tr><td>Address:* <br><input type="text" name="address" class="form-control" required></td>
<td>NIC No:* <br><input type="text" name="nic" class="form-control" pattern="[a-zA-Z0-9]{10}" title="please enter only character and numbers are 10 for NIC" required></td>
<td>Telephone:* <br><input type="text" name="tel" class="form-control" required pattern="[0-9]{10}" title="please enter numbers are 10 for Phone Number"></td></tr>
<tr><td height="12px"></td></tr>
<tr><td>Email:* <br><input type="email" name="email" class="form-control" required></td>
<td>Password:* <br><input type="password"  name="password" id="newpass" class="form-control" required pattern="[a-zA-Z0-9]{3,10}" title="please enter only character and numbers between 3 to 10 for password"></td>
<td>Confirm Password:* <span id='message'></span><br><input type="password" id="rnewpass" onkeyup='check();'  class="form-control" required pattern="[a-zA-Z0-9]{3,10}" title="please enter only character and numbers between 3 to 10 for password"></td>
</tr>
<tr><td height="12px"></td></tr>
</tr><td><input type="submit" name="submit" class="btn btn-success" value="Sign Up"></td>
<td><input type="reset" value="Clear" class="btn btn-success"></td></tr>
</form>
</div>
</center>
</body>
</html>
