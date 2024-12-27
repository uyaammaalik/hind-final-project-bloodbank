<?php session_start();

if($_SESSION['donorstatus']=="")
{
	header("Location:../donorlogin.php");
}
?>
<?php include('../db/function.php'); ?>
<html>
<head><title>Home | Donate</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />
</head>
<body>
<?php include('top.php');  ?>
<center>
<div style="width:1020px; float:left" class="npanel">
<table class="adminheading"><tr><td>Donate...</td></tr></table>
<br><br><br>

<?php
			
	$cn=makeconnection();
			$s="select * from donor where email='" . $_SESSION["email"] . "'";
			
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	
	$data=mysqli_fetch_array($q);
	$_SESSION["bldgrp"]=$data[5];
	$name=$data[1];
	$age=$data[4];
	$mobile=$data[6];
	$add=$data[8];
	$pic=$data[10];
	mysqli_close($cn);


?> 

<form method="post">
<table width="700px" style="font-style:italic; font-size:16px; font-weight:bold;">
</tr><td colspan="2">
<center><img align="center" src="donor_pic/<?php echo $pic; ?>" width="200px" height="200px" style="box-shadow:1px 2px 20px black"></center></td></tr>
<tr><td height="12px"></td></tr>
<tr><td>
Select camp: <br><select class="form-control" name="camp" required><option value="" selected>--select--</option>
<?php
$cn=makeconnection();
$s="select * from camps";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[0]==$_POST["camp"])
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
		else
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
		
		
		
	}
	


?>



</select></td>

<?php
if(isset($_POST["show"]))
{
$cn=makeconnection();
$s="select * from camps where camp_id='" .$_POST["camp"] ."'";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	$data=mysqli_fetch_array($result);
	$camp_id=$data[0];
	$camp_title=$data[1];
	$organized_by=$data[2];
	$district=$data[3];
	$city=$data[4];
	$detail=$data[5];
		
		
	mysqli_close($cn);
}


?>
<td width="350px">
Date: <br><input type="date" name="date" class="form-control" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td colspan="2">Other Details: <br><textarea class="form-control" name="detail" required></Textarea></td></tr>
<tr><td height="12px"></td></tr>
<tr><td><input type="submit" value="Save" name="submit" class="btn btn-success"></td></tr>

</table>
</form>

<?php

$units=450;

if(isset($_POST["submit"])) 
{
$cn=makeconnection();
			$s="insert into donation(campid,ddate,units,detail,email) values('" . $_POST["camp"] . "','". $_POST["date"] ."' ,'" . $units . "','" . $_POST["detail"] . "','". $_SESSION["email"] ."')";
			
			
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Saved');</script>";
	
	
	
}
		

	

?> 	 
<?php
$cn=makeconnection();
		$bgs= "select units from bloodstock where bloodgroup = '" . $_SESSION["bldgrp"] . "'";
		$r=mysqli_query($cn,$bgs);
		$re = mysqli_num_rows($r);
		$datab = mysqli_fetch_array($r);
		$num = $datab[0];
			$total = $num+1;
			
	if(isset($_POST["submit"])) 
	{
		
		
		
					$s="update bloodstock set units='" .$total. "' where bloodgroup = '" . $_SESSION["bldgrp"] . "'";
		
$i=mysqli_query($cn,$s);
	mysqli_close($cn);
	
}
?> 

</body>
</html>