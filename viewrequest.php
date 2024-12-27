
<?php include("db/function.php"); ?>
<html>
<head>
<title>View Requests</title>
<link rel="stylesheet" href="css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="css/top.css" type="text/css" />
<link rel="stylesheet" href="css/body.css" type="text/css" />
<link rel="stylesheet" href="css/form.css" type="text/css" />
</head>
<body>
<?php include('banner.php');  ?>
<center>
<div style="width:1020px; float:left" class="npanel">
<table class="adminheading"><tr><td>Requests...</td></tr></table>
<br><br><br>


<table class="admintabadmintab">
<tr>
<strong>
<th class='borderright' width="100px">Name</th>
<th class='borderright' width='50px'>Gender</th>
<th class='borderright'  width='30px'>Age</th>
<th class='borderright'  width='80px'>Mobile No</th>
<th class='borderright' width='60px'>Blood Group</th>
<th class='borderright' width='130px'>Email</th>
<th class='borderright'  width='80px'>Date</th>
<th >Details</th>
</strong>
</tr>
</table>

<?php
$cn=makeconnection();
$date=date('Y-m-d');
$d = "delete from request where date ='$date'";
$results=mysqli_query($cn,$d);
$s="select * from request";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
				echo"<table class='borderbottom'><tr>
				<th width='100px' class='borderright'>$data[1]</th>
				<th width='50px' class='borderright'>$data[2] </th>
				<th width='30px' class='borderright'>$data[3] </th>
				<th width='80px' class='borderright'>$data[4] </th>
				<th width='60px' class='borderright'>$data[5] </th>
				<th width='130px' class='borderright'>$data[6]</th>
				<th width='80px'class='borderright'>$data[7]  </th>
				<th>$data[8]</th></tr></table>";
			}
			mysqli_close($cn);
			$cn = makeconnection();

			?>



</div>
<?php include('bottom.php'); ?>
</body>
</html>