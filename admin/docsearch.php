<?php  session_start(); 
if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
<?php include('../db/function.php'); ?>
<html><head>
<title>Home | Search</title>

<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />

</head><body>

<?php include('doctop.php');  ?>
<form method="POST">
<center>
<div width="1020px">
<div style="float:left; width:200px"><?php include('docright.php'); ?></div>

<div style="width:800px; float:left" class="searchpanel">
<table class="adminheading"><tr><td>Search Donors...</td></tr></table>
<br><br><br>

<table class="admintab" border="0">
<tr><td>Select Blood Group: <select class="form-control" name="bloodgroup"><option selected>--select--</option>
<?php 
$cn=makeconnection();
$s="select * from bloodgroup";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[1]==$_POST["bloodgroup"])
		{
			echo "<option value=$data[1] selected>$data[1]</option>";
		}
		else
		{
			echo "<option value=$data[1]>$data[1]</option>";
		}
		
		
		
	}
	mysqli_close($cn);

?>
</select></td></tr>
<tr><td height="12px"></td></tr>
</tr><td><input type="submit" name="submit" value="Search" class="btn btn-success"></td></tr></table>
<table class="searchheading"><tr><td>Results...</td></tr></table>
<br>

<?php
$cn = makeconnection();
if(isset($_POST["submit"]))
	{
		if($_POST["bloodgroup"] == "--select--")
		{
			echo "<script> alert('Please select the blood group'); </script>";
		}
	
		else{	
		$x = "select * from donor where bldgrp = '".$_POST["bloodgroup"]."'";
		$r = mysqli_query($cn,$x);
		$y = mysqli_num_rows($r);

		while($d = mysqli_fetch_array($r))
		{
			?> 
			
			<table class="searchtab"><tr class="searchtab"><td rowspan='7' class="leftcol"><img src="../donor/donor_pic/<?php echo @$d[10]; ?>" height="100px" width="100px" style="margin:auto; padding-left:10px; padding-right:10px; float:left"></td></tr>
					<tr><td>Name:</td><td><?php echo $d[1]; ?></td></tr>
					<tr><td>Address:</td><td><?php echo $d[8]; ?></td></tr>
					<tr><td>Blood Group:</td><td><?php echo $d[5]; ?></td></tr>
					<tr><td>Age:</td><td><?php echo $d[4]; ?></td></tr>
					<tr><td>NIC No:</td><td><?php echo $d[3]; ?></td></tr>
					<tr><td>Telephone No:</td><td><?php echo $d[6]; ?></td></tr></table><br>
	<?php	
	}
		}
	}
	?>
</div>
</center>
</form>

</body>
</html>

