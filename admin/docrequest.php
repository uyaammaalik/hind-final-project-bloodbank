<?php  session_start(); 

if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
<?php include('../db/function.php'); ?>
<html>
<head><title>Home | Give Request</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" /></head>
<body>
<?php include('doctop.php');  ?>
<center>
<div  width="1020px">
<div  style="float:left; width:200px"><?php include('docright.php'); ?></div>


<div style="width:800px; float:left" class="panel">

<table class="adminheading"><tr><td>Give Request for Blood...</td></tr></table><br>
<form method="post">
<table class="admintab">
<tr>
<td>
Name: <br><input type="text" name="name" class="form-control" required></td>
<td>Age: <br><input type="number" name="age"  class="form-control" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td>Blood Group: <br><select name="bdg" class="form-control" required><option selected>--select--</option>
<?php 
$cn=makeconnection();
$s="select * from bloodgroup";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);

while($data = mysqli_fetch_array($result)){
	
	if(isset($_POST["show"]) && $data[1] == $_POST["bdg"])
	{
		
		echo "<option value=$data[1]> $data[1] </option>";
	}
	else{
		echo "<option value=$data[1]> $data[1]</option>";
	}
}
?>
</select></td>

<td>Date:<br><input type="date" name="date" class="form-control" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td><input type="submit" name="submit" class="btn btn-success" value="Send"></td><td> <input class="btn btn-success" type="reset"></td></tr></table>
</form>
<?php 

if(isset($_POST["submit"]))
{
	$b= "insert into docrequest(name,age,bloodgroup,date) values('".$_POST["name"]."','" . $_POST["age"]."','".$_POST["bdg"]."','".$_POST["date"]."')";
	mysqli_query($cn,$b);
	mysqli_close($cn);
	echo "<script>alert('Your request has been sent'); </script>";
	echo "<script>location.replace('docrequest.php'); </script>";
}


?>



</body>
</html>