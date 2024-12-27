<?php  session_start(); 
if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<table class="adminheading"><tr><td>Welcome Home...</td></tr></table><br>
</body>
</html>