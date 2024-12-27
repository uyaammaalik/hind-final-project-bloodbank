<?php session_start(); 

if($_SESSION['donorstatus']=="")
{
	header("Location:../donorlogin.php");
}
?>
<html>
<head>
<title>Home | Update Profile</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />
</head>



<body>

<?php include('../db/function.php') ?>
<?php
			
	$cn=makeconnection();
			$s="select * from donor where email='" . $_SESSION["email"] . "'";
			
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	
	$data=mysqli_fetch_array($q);
	$name=$data[1];
	$age=$data[4];
	$mobile=$data[6];
	$add=$data[8];
	$pic=$data[10];
	mysqli_close($cn);

?> 
<?php include('top.php');  ?>
<center>
<div style="width:1020px; float:left" class="npanel">
<table class="adminheading"><tr><td>Update Profile...</td></tr></table>
<br><br><br>




<form method="post">
<table width="700px" style="font-style:italic; font-size:16px; font-weight:bold;">
</tr><td colspan="2">
<center>
<img src="donor_pic/<?php echo @$pic; ?>" width="200px" height="200px" style="box-shadow:1px 2px 20px black"></center>
<input type="hidden" value="<?php echo @$pic; ?>"></td></tr>
<tr><td height="12px"></td></tr>
<tr><td>
Name: <br><input class="form-control" type="text" name="name" value="<?php echo @$name;  ?>" required></td>
<td>Age: <br><input class="form-control" type="text" name="age" value="<?php echo @$age;  ?>" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td>Telephone No: <br><input class="form-control" type="number_format" name="tel" value="<?php echo @$mobile;  ?>" required></td>
<td>Address: <br><input class="form-control" type="text" name="address" value="<?php echo @$add;  ?>" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td align="right"><input class="btn btn-success" type="submit" name="submit" value="Update"></td>
<td><input class="btn btn-success" type="reset" ></td></tr>
</table>
</form>

<?php
	
	if(isset($_POST["submit"])) 
	{
		$cn=makeconnection();
		
		
					$s="update donor set name='" .$_POST["name"]. "' ,age='" .$_POST["age"]."' , t_no='" .$_POST["tel"]. "',address='" .$_POST["address"]. "' where email='" .$_SESSION["email"]. "'";
		
$i=mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record update');</script>";
		echo "<script>location.replace('updatedonor.php');</script>";
	
}
?> 

</body>
</html>