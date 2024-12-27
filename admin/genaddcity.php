<?php  session_start();
if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
<html>
<head><title>Home | Add city</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />
</head>

<body>
<?php include('gentop.php');  ?>
<center>
<div width="1020px">
<div style="float:left; width:200px">
<?php include('genright.php'); ?>
</div>
<div style="width:800px; float:left" class="panel">
<table class="adminheading"><tr><td>Add City...</td></tr></table>
<br><br><br>
<form method="post"><table class="admintab">
<tr>
<td>City Name:<br><input type="text" name="cname" class="form-control" required></td>
<td>Pin Code:<br><input type="number" name="pin" class="form-control" required></td></tr>
<tr><td height="12px"></td></tr>
<td>District:<br><select name="district" class="form-control" required>
<option selected>--select--</option>
<?php
include('../db/function.php');
$cn=makeconnection();
$s="select * from district";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[0]==$_POST["district"])
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
		else
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
		
		
		
	}
	


?>



</select></td></tr>
<tr><td height="12px"></td></tr>
<tr>
<td><input type="submit" name="submit" value="Save City" class="btn btn-success"></td><td> <input class="btn btn-success" type="reset"></td></tr>
</table>
</form>
</div>
</div>
<center>
</body>

</html>
<?php


$cn=makeconnection();

if(isset($_POST["submit"])) 
{
			$s="insert into city(city_name,pincode,district) values('" . $_POST["cname"] . "','" . $_POST["pin"] . "','" . $_POST["district"] . "')";
			
			
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('City Saved');</script>";
	
	
	
}
?>
