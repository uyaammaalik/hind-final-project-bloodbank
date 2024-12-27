<?php session_start(); 

if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
<html>
<head><title>Home | Delete Administrator</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />
</head>
<body>
<?php include('top.php');  ?>
<center>
<div  width="1020px">
<div  style="float:left; width:200px"><?php include('right.php'); ?></div>


<div style="width:800px; float:left" class="panel">

<table class="adminheading"><tr><td>Admin Delete...</td></tr></table><br>
<form method="post">
<table class="admintab">
<tr>
<td>
Select User Name:<br>
<select name="user" class="form-control" required><option value="">--select--</option>

<?php
include('../db/function.php');

$cn=makeconnection();
$s="select * from admin";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		
		
			echo "<option value=$data[0]>$data[0]</option>";
		
		
		
		
	}
	mysqli_close($cn);

?>



</select></td></tr>
<tr><td height="12px"></td></tr>
<?php
if(isset($_POST["show"]))
{
$cn=makeconnection();
$s="select * from admin where username='" .$_POST["user"] ."'";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	$data=mysqli_fetch_array($result);
	$username=$data[0];
	$pass=$data[1];
	$usertype=$data[2];
		
		
	mysqli_close($cn);
}
?>
<tr><td>
<input type="submit" name="submit" value="Delete" class="btn btn-success"></td></tr>
</table>
</form>
<?php
if(isset($_POST["submit"]))
{
	$cn=makeconnection();
	$s="delete from admin where username='"  . $_POST["user"] ."'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record delete');</script>";
	echo "<script>location.replace('deladmin.php');</script>";
}

?>
</body>
</html>