<?php
		SESSION_start('donorstatus');

		SESSION_unset('donorstatus');
		header("location:../index.php");

?>
