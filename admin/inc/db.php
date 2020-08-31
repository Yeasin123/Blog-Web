<?php


	$db = mysqli_connect("localhost","root","","blog");

	if($db){
		//echo "database conneted";
	}
	else{
		die("error".mysqli_error($db));
	}

	
?>