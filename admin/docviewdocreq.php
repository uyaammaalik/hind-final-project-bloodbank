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
<?php include('doctop.php');  ?>
<center>
<div width="1020px">
<div style="float:left; width:200px">
<?php include('docright.php'); ?>
</div>
<div style="width:800px; float:left" class="panel">
<table class="adminheading"><tr><td>Doctor Requests...</td></tr></table>
<br><br><br>

<table class="admintabadmintab">
<tr>
<strong>
<th class='borderright' width="300px">Name</th>
<th class='borderright'  width='100px'>Age</th>
<th class='borderright' width='100px'>Blood Group</th>
<th  width='100px'>Date</th>
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
	<th class='borderright' width='100px' >".$data['age']."</th>
	<th class='borderright' width='100px'>".$data['bloodgroup']."</th>
	<th width='100px'>".$data['date']."</th>";
		

	
	
	}

mysqli_close($cn)

?>

<?php 
/*  if(isset($_POST["submit"])) 
	{
		
		
		
					$s="delete from docrequest where id = '".$_GET['id']."'";
		
$i=mysqli_query($cn,$s);
	
}  */
	
	

?>


</form>
</body>
</html>
