<?php  session_start(); 
if($_SESSION['adminstatus']=="")
{

	header("Location:../adminlogin.php");
}
?>
 <?php include ('../db/function.php'); ?>
<html>
<head><title>Home | Gallery</title>
<link rel="stylesheet" href="../css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="../css/top.css" type="text/css" />
<link rel="stylesheet" href="../css/body.css" type="text/css" />
<link rel="stylesheet" href="../css/form.css" type="text/css" />
</head>
<body>
<?php include('top.php');  ?>
<center>
<div  width="1020px">
<div  style="float:left; width:200px"><?php include('right.php'); ?></div>


<div style="width:800px; float:left" class="panel">

<table class="adminheading"><tr><td>Gallery...</td></tr></table><br>
<form method="post" enctype="multipart/form-data">
<table class="admintab">
<tr>
<td>
Camp Title: <br><select name="camptitle" class="form-control" required><option value="">--Select--</option>

<?php
$cn=makeconnection();
$s="select * from camps";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[0]==$_POST["camptitle"])
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
<td>Picture Title: <br><input type="text" name="title" class="form-control" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td>Upload Pic: <br><input type="file" name="camppic" class="form-control" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td><input type="submit" name="submit" class="btn btn-success" value="Save"></td>
<td><input type="reset" class="btn btn-success"></td></tr>
</table>
</form>
<?php
if(isset($_POST["submit"])) 
{
$target_dir = "gallery/";
$target_file = $target_dir . basename($_FILES["camppic"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = @getimagesize($_FILES["camppic"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
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
		if(move_uploaded_file($_FILES["camppic"]["tmp_name"], $target_file)){
		$cn=makeconnection();
			$s="insert into gallery(campid,title,pic) values('" . $_POST["camptitle"] ."','" . $_POST["title"] ."','" . basename($_FILES["camppic"]["name"])  ."')";
			
			
	mysqli_query($cn,$s);
	mysqli_close($cn);
	if($s>0)
	{
	echo "<script>alert('Record Save');</script>";
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
</body>
</html>