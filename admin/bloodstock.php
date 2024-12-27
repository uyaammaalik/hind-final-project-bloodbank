<?php  session_start(); 

if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
<?php include('../db/function.php'); ?>
<html><head>
<title>Home | Blood Stock</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />
</head>


</head>
<body>
<?php include('top.php');  ?>
<center>
<div width="1020px">
<div style="float:left; width:200px">
<?php include('right.php'); ?>
</div>
<div style="width:800px; float:left" class="panel">
<table class="adminheading"><tr><td>Blood Stocks...<div style="float:right; font-size:18px; padding-right:12px;">1 unit = 350ml</div></td></tr></table>
<br><br><br>

<table class="stock">
<tr>
<strong>
<th class='borderright' width="200px">Blood Group</th>
<th width="200px">Stocks</th>
</strong>
</tr>
</table>
<br>
<form method="post" enctype="multipart/form-data">
	<?php

	$cn=makeconnection();

$s="select * from bloodstock";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
				echo"<table class='stocks'>
				<tr>
				<th width='200px'>$data[1]</th>
				<th width='200px'>$data[2] Units</th>
				</tr>
				</table>";
			}
			mysqli_close($cn);
			?>                         







<br><br>
<table class="adminheading"><tr><td>Give Units...</td></tr></table>
<br><br>
<table class="admintab">
<tr><td>Select Blood Group: <br><select name="bld" class="form-control"><option selected>--select--</option>
<?php
$cn=makeconnection();
$s="select * from bloodgroup";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[1]==$_POST["s2"])
		{
			echo "<option value=$data[1]>$data[1]</option>";
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
 <tr><td><input type="submit" name="submit" value="Give" class="btn btn-success"></td></tr>
 
 </table>
</form>

<?php 
$cn=makeconnection();
			
	if(isset($_POST["submit"])) 
	{
		$bgs= "select units from bloodstock where bloodgroup = '".$_POST['bld']."'";
		$r=mysqli_query($cn,$bgs);
		$re = mysqli_num_rows($r);
		$datab = mysqli_fetch_array($r);
		$num = $datab[0];
			$total = $num-1;
		
		
		
					$s="update bloodstock set units='" .$total. "' where bloodgroup = '".$_POST['bld']."'";
		
$i=mysqli_query($cn,$s);
echo "<script>location.replace('bloodstock.php')</script>";
	mysqli_close($cn);
	
}




?>