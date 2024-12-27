<?php
session_start();

if($_SESSION['donorstatus']=="")
{
	header("Location:../donorlogin.php");
}
?>
<?php include('../db/function.php'); ?>
<html><head><title>Home | View Donations</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />
</head>
<body>

<form method="post" enctype="multipart/form-data">
  <?php include('top.php');  ?>
<center>
<div style="width:1020px; float:left" class="npanel">
<table class="adminheading"><tr><td>My Donations...</td></tr></table>
<br><br><br>


<table class="admintabadmintab">
<tr>
<strong>
<th class='borderright' width="100px">Camp Name</th>
<th class='borderright' width='100px'>Date of Donation</th>
<th class='borderright'  width='50px'>No. of Units</th>
<th  width='50px'>Date</th>

</strong>
</tr>
</table>
<br>
    <?php

	$cn=makeconnection();

$s="select * from camps,donation where camps.campid=donation.campid and donation.email='" . $_SESSION["email"] . "'";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
				echo"<table class='borderbottom'><tr>
				<th width='100px' class='borderright'>$data[1]</th>
				<th width='100px' class='borderright'>$data[8]</th>
				<th width='50px' class='borderright'>$data[9]</th>
				<th width='50px'>$data[10]</th>
				</tr></table>";
			}
			mysqli_close($cn);
			?>               






</form>

</body>
</html>