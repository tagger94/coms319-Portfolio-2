<?php session_start(); ?>
<?php
    //Open file
    $packageFile = file_get_contents('package.json');
		
	//Check for valid file contents
	if($packageFile[0] != "{") {
		$packageFile = "{}";
	}
	
	//Decode
	$packageList = json_decode($packageFile);
	
	$pidToFind = $_REQUEST->{"pid"};
	
	//Check for Package
	if(property_exists($packageList, $pidToFind)) {
		//Send Package
		echo json_encode($packageList->{$pidToFind});
	} else {
		//Error
		echo -1;
	}
?>