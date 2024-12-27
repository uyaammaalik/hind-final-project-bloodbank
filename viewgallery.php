<html>
<head><title>Gallery</title>

		<link rel="stylesheet" href="engine/css/vlightbox1.css" type="text/css" />
		<link rel="stylesheet" href="engine/css/visuallightbox.css" type="text/css" media="screen" />
<script src="engine/js/jquery.min.js" type="text/javascript"></script>
		<script src="engine/js/visuallightbox.js" type="text/javascript"></script>
		<script src="engine/js/vlbdata.js" type="text/javascript"></script>



</head>
<body>
<?php include('banner.php'); ?>
<?php include('db/function.php'); ?>
<table width="1020px" style="margin-left:auto; background-color:white; border-radius:5px; margin-top:10px; padding-bottom:15px " >
			
         <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3" align="center"><h2><font color="#CD0000">Gallery</font></h2></td></tr>
         <tr><td colspan="3">&nbsp;</td></tr>  
            
        
             <?php
$cn=makeconnection();
$s="select * from gallery,camps where gallery.campid=camps.campid and gallery.campid='" . $_GET["cid"] ."'";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	$n=0;
	while($data=mysqli_fetch_array($result))
	{
		if($n%3==0)
		{
		?>
    
    
            <tr>
            <?php
			
		}?>
            
            
            <td>
          
            

  <a class="vlightbox1" href="admin/gallery/<?php  echo $data[3] ?>" data-lightbox="roadtrip"><img class="vlightbox1" src="admin/gallery/<?php  echo $data[3] ?>" width="250px" height="200px" style="padding-left:40px" /></a>
  
    </td>
        <?php
        if($n%3==2)
	 {
	 ?>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
         <tr><td colspan="3">&nbsp;</td></tr>
          <tr><td colspan="3">&nbsp;</td></tr>
        <?php
	}
	$n=$n+1;
		
	}?>
    </table>

<?php include('bottom.php'); ?>
</body>
</html>