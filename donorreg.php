
<?php include ('db/function.php'); ?>
<html>
<head>
<title>Donor Registration</title>
<link rel="stylesheet" href="css/pagecss.css" type="text/css" />
<link rel="stylesheet" href="css/top.css" type="text/css" />
<link rel="stylesheet" href="css/body.css" type="text/css" />
<link rel="stylesheet" href="css/form.css" type="text/css" />



<script>

var check = function() {
  if (document.getElementById('newpassword').value ==
    document.getElementById('confirmpassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Not Matching';
  }
}
</script>
</head>
<body>
<?php include('banner.php'); ?>
<div class="in">

<form method="POST" enctype="multipart/form-data">


	
<center>
<table class="heading"><tr><td>Want to Become a Donor...</td></tr></table>
<br>

<table class="dtab">
<tr><td width="300px" height="50px">User Name:* <br><input type="text" name="uname" class="form-control" required></td>
<td width="300px">Name:* <br><input type="text" name="name" class="form-control" required></td>
<td width="300px">Gender:* <br><select name="gender" class="form-control" required>
			<option selected>--Select--</option>
			<option>Male</option>
			<option>Female</option>
			<option>Other</option>
			</select></td></tr>
			<tr><td height="12px"></td></tr>
<tr><td width="300px">NIC No:* <br><input type="text" name="nic" class="form-control" required pattern="[a-zA-Z0-9]{10}" title="please enter only character and numbers are 10 for NIC"></td>
<td width="300px">Age:* <br><input type="number" name="age" class="form-control" required></td>
<td width="300px">Blood Group:* <br><select name="bldgrp" class="form-control" required><option value="">--Select--</option>

<?php
$cn=makeconnection();
$s="select * from bloodgroup";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[0]==$_POST["s2"])
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
<tr><td width="300px">Telephone No:* <br><input type="number" name="tel" class="form-control" required pattern="[0-9]{10}" title="please enter numbers are 10 for Phone Number"></td>
<td width="300px">Email:* <br><input type="email" name="email" class="form-control" required></td>
<td width="300px">Address:* <br><input type="text" name="address" class="form-control" required></td></tr>
<tr><td height="12px"></td></tr>
<tr><td width="300px">Password:* <br><input type="password" name="password" id="newpassword" class="form-control" required pattern="[a-zA-Z0-9]{3,10}" title="please enter only character and numbers between 3 to 10 for password"></td>
<td width="300px">Confirm Password:* <span id='message'></span> <br><input type="password" name="" id="confirmpassword" onkeyup='check();' class="form-control" required pattern="[a-zA-Z0-9]{3,10}" title="please enter only character and numbers between 3 to 10 for password"></td>
<td width="300px">Donor Picture:* <br><input type="file" name="dpic" class="form-control" required></td></tr>
<tr><td height="12px"></td></tr>

<tr><td width="300px"><input type="submit" name="submit" value="Sign In" class="btn btn-success"></td>
<td width="300px"><input type="reset" class="btn btn-success"></td><td width="300px"></td></tr>
</table></center>
</form>
</div>
<?php
$cn=makeconnection();

$get="select * from donor";
	$query=mysqli_query($cn,$get);
	$row=mysqli_num_rows($query);
	$data = mysqli_fetch_array($query);
if(isset($_POST["submit"])) 
{
	
	if($data[3]==$_POST['nic'])	

	{	
	echo "<script>alert('You are already signed..');</script>";
				
			}
			else{
				
				$target_dir = "donor_pic/";
			$target_file = $target_dir . basename($_FILES["dpic"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image

				$check = @getimagesize($_FILES["dpic"]["tmp_name"]);
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
					if(move_uploaded_file($_FILES["dpic"]["tmp_name"], $target_file)){
					$cn=makeconnection();
						$s="insert into donor(username,name,gender,nic,age,bldgrp,t_no,email,address,password,pic) values('" . $_POST["uname"] ."','" . $_POST["name"] ."','" . $_POST["gender"] . "','" . $_POST["nic"] . "','" . $_POST["age"] . "','" . $_POST["bldgrp"] . "','" . $_POST["tel"] . "','" . $_POST["email"] . "','" . $_POST["address"] .  "','" . $_POST["password"] ."','" . basename($_FILES["dpic"]["name"])  ."')";
						
						
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
}

include('bottom.php');
?> 



</body>
</html>
