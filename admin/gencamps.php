<?php session_start(); 
if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
<?php include('../db/function.php');?>
<html>
<head><title>Home | Camps</title>
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

<table class="adminheading"><tr><td>Camps...</td></tr></table><br>

<form method="post" enctype="multipart/form-data">
<table class="admintabadmin">
<tr>
<td>
Camp Name: <br><input type="text" name="campname" class="form-control" required></td>
<td>Organized By: <br><input type="text" name="org" class="form-control" required></td>
<td>District: <br><select name="district" class="form-control" required><option selected>--Select--</option>

<?php
$cn = makeconnection();

$s="select * from district";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[0]==$_POST["district"])
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
		else
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
		
		
		
	}
	mysqli_close($cn);

?>



</select></td></tr>
<tr><td height="12px"></td></tr>
<tr><td>City: <br><select name="city" class="form-control" required><option selected>--Select--</option>

<?php
$cn = makeconnection();

$s="select * from city";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[0]==$_POST["city"])
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
		else
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
		
		
		
	}
	mysqli_close($cn);

?>



</select></td>
<td>Date:<br><input type="date" name="date" class="form-control" required></td>
<td>Upload Pic: <br><input type="file" name="piccamp" class="form-control" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td colspan="3">Details: <br><textarea name="detail" class="form-control" style="border-radius:5px;" required></textarea></td></tr>
<tr><td height="12px"></td></tr>
<tr><td><input type="submit" name="submit" value="Save" class="btn btn-success"></td>

<td><input type="reset" class="btn btn-success"></td></tr>
</table>
</form>


<?php
if(isset($_POST["submit"])) 
{
$target_dir = "pic/";
$target_file = $target_dir . basename($_FILES["piccamp"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = @getimagesize($_FILES["piccamp"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script type='javascript'>alert('File is not an image.')</script>";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
//allow certain file formats
	if($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
		echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["piccamp"]["tmp_name"], $target_file)){
		$cn=makeconnection();
			$s="insert into camps(campname,organized,district,city,date,pic,detail) values('" . $_POST["campname"] ."','" . $_POST["org"] ."','" . $_POST["district"] . "','" . $_POST["city"] . "','" . $_POST["date"] . "','" . basename($_FILES["piccamp"]["name"])  ."','" . $_POST["detail"] . "')";
			
			
	mysqli_query($cn,$s);
	mysqli_close($cn);
	if($s>0)
	{
	echo "<script>alert('Record Saved');</script>";
	}
	else
	{echo "<script>alert('Record save');</script>";
	}
		} else{
			echo "sorry there was an error uploading your file.";
		}	
	
	}
}
?> 
</center>
</body>
</html>