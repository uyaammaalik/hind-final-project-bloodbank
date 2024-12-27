<?php  session_start(); 
if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
<?php include('../db/function.php'); ?>
<html>
<head><title>Home | View Doctor Requests</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />
</head>
<body>
<?php include('top.php');  ?>
<center>
<div width="1020px">
<div style="float:left; width:200px">
<?php include('right.php'); ?>
</div>
<div style="width:800px; float:left" class="panel">
<table class="adminheading"><tr><td>Doctor Requests...</td></tr></table>
<br><br><br>

<table class="admintabadmintab">
<tr>
<strong>
<th class='borderright' width="300px">Name</th>
<th class='borderright'  width='50px'>Age</th>
<th class='borderright' width='100px'>Blood Group</th>
<th class='borderright'  width='100px'>Date</th>
<th width='150px'>Action</th>
</strong>
</tr>
</table>
<br>
<form method="POST">

<?php 
$cn=makeconnection();
$s="select * from docrequest";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
while($data=mysqli_fetch_array($result)){
	echo "<table class='borderbottom'><tr>
	<th class='borderright' width='300px'>".$data['name']."</th>
	<th class='borderright' width='50px' >".$data['age']."</th>
	<th class='borderright' width='100px'>".$data['bloodgroup']."</th>
	<th class='borderright' width='100px'>".$data['date']."</th>
	<th width='150px'><a href=\"action.php?id=".$data['id']."\"><div class='action'>Accept</div></a></td></tr></table>";
		

	
	
	}

mysqli_close($cn)

?>




</form>
</body>
</html>
