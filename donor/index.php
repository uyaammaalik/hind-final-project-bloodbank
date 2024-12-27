<?php session_start();
if($_SESSION['donorstatus'] == "")
{
	header("location:../donorlogin.php");
}
?>
<html>
<head>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />

</head>
<body>
<?php include('top.php'); ?>
<div class="in">

<form method="POST" enctype="multipart/form-data">


	
<center>
<table class="heading"><tr><td>Want to Become a Donor...</td></tr></table>
<br>



</body>
</html>