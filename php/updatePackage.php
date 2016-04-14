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
	
	$pidToFind = $_REQUEST['pid'];
	
	if($pidToFind === "DEBUG") {
		$arr = (array) $packageList;
		$tempArray = array_rand($arr);
		$pidToFind = $tempArray;
	}
	
	//Check for Package
	if(property_exists($packageList, $pidToFind) === false) {
		//Error
		echo -1;
	}
	
	//Package Found so modify
	$activity = $_REQUEST['activity'];
	
	//Add Activity to timeline
	//echo var_dump($packageList->{$pidToFind}->{"timeline"});
	array_unshift($packageList->{$pidToFind}->{"timeline"}, $activity);
	
	//Encode packages
	$packageFile = json_encode($packageList);
	
	//Store back in file
	file_put_contents('package.json', $packageFile);
	
	
	echo 1;
	
?>