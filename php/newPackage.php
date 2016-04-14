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
	
	$package = $_REQUEST;
	
	//Create id
	$pid = "a".rand();
	
	$package['pid'] = $pid;
	
	//Store Package
	$packageList->{$pid} = $package;
	
	//Encode packages
	$packageFile = json_encode($packageList);
	
	//Store back in file
	file_put_contents('package.json', $packageFile);
	
	echo $pid;
?>