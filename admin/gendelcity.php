<?php  session_start(); 

if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
<html>
<head><title>Home | Delete City</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />
</head>
<body>
<?php include('gentop.php');  ?>
<center>
<div  width="1020px">
<div  style="float:left; width:200px"><?php include('genright.php'); ?></div>


<div style="width:800px; float:left" class="panel">

<table class="adminheading"><tr><td>Delete City...</td></tr></table><br>
<form method="post">
<table class="admintab">
<tr>
<td>
Select District Name:<br>
<select name="district" class="form-control" required><option value="">--select--</option>

<?php
include('../db/function.php');

$cn=makeconnection();
$s="select * from district";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		
		if(isset($_POST["show"]) && $data[0]==$_POST["district"])
		{
			echo "<option value=$data[0] selected>$data[1]</option>";
		}
		else
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
		
		
		
	}
	mysqli_close($cn);

?>



</select></td>
<td><input type="submit" value="Show" style="margin-top:18px" name="show" class="btn btn-success" formnovalidate="formnovalidate" /></td></tr>
<tr><td height="12px"></td></tr>
<tr><td>Select City: <br><select name="city" class="form-control" required><option value="">--select--</option>


<?php
if(isset($_POST["show"]))
{
$cn=makeconnection();
$s="select * from city where district='" . $_POST["district"] ."'";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		
			echo "<option value=$data[0]>$data[1]</option>";
		
		
		
		
	}
	mysqli_close($cn);
}
?>



</select>
</td></tr>
<tr><td height="12px"></td></tr>
<tr><td><input type="submit" name="submit" class="btn btn-success" value="Delete"></td></tr>
</table>
</form>
<?php
if(isset($_POST["submit"]))
{
	$cn=makeconnection();
	$s="delete from city where city_id='"  . $_POST["city"] ."'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record deleted');</script>";
}

?>
</body>
</html>