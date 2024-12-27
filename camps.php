<html>
<head>
<title>Camps</title>
<link rel="stylesheet" href="engine/css/vlightbox1.css" type="text/css" />
		<link rel="stylesheet" href="engine/css/visuallightbox.css" type="text/css" media="screen" />
<script src="engine/js/jquery.min.js" type="text/javascript"></script>
		<script src="engine/js/visuallightbox.js" type="text/javascript"></script>
		<script src="engine/js/vlbdata.js" type="text/javascript"></script>
</head>
<body style="width:980px; margin:auto">

<?php include('db/function.php'); 
include('banner.php');
?>

<table cellpadding="0" cellspacing="0" width="980px">
            
            <?php
$cn=makeconnection();
$s="select * from camps,district,city where camps.district=district.district_id and camps.city=city.city_id";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	$n=0;
	while($data=mysqli_fetch_array($result))
	{
		if($n%2==0)
		{
		?>
    
			<tr>
            
            <?php
			
		}?> 
            
            <td>
            
            
            
            
    <table width="505px" style="border:none; background-color:white; margin-top:10px; border-radius:5px; margin-right:10px">
    <tr><td style="font-size:24px; font-weight:bold; text-shadow:1px 1px 6px browm; padding-left:50px; padding-top:10px; padding-bottom:10px; color:#925959"><?php echo $data[1]; ?></td></tr>
      <tr><td align="center"> 
   <a class="vlightbox1" href="admin/pic/<?php echo $data[6] ?>"data-lightbox="image-1"> <img class="vlightbox1" src="admin/pic/<?php echo $data[6] ?>" height="250px" width="350px" style="margin:auto; padding-left:20px" /></a></td></tr>
   
                        <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
                        <tr><td class="title" style="padding-left:15px;"><a href="viewgallery.php?cid=<?php echo $data[0];  ?>">View Camp Gallary</td></tr>
  



        
          <tr ><td class="title" style="padding-left:15px;">Organised By:<?php echo $data[2]; ?></td><td align="left" width="50%"></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
          <tr><td class="title" style="padding-left:15px;">District:<?php echo $data[9]; ?></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
          <tr><td class="title" style="padding-left:15px;">City:<?php echo $data[11]; ?></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		</table>
        
        
        </td>
        <?php
        if($n%2==1)
	 {
	 ?>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>

        <?php
	}
	$n=$n+1;
		
	}?>
    </table>
<div>
<?php include('bottom.php'); ?>
</body>
</html>