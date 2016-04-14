<?php session_start(); ?>
<?php
    //Open file
    $packageFile = file_get_contents('package.json');
		
	//Check for valid file contents
	if($packageFile[0] != "{") {
		$packageFile = "{}";
	}
	
	//$user = $_REQUEST['user'];
	
	$packageList = json_decode($packageFile);
	
	$tempArray = [];
	
	foreach ($packageList as $item) {
		if($item->user === $_SESSION['username']) {
			array_unshift($tempArray, $item);
		}
	}
	
	echo json_encode($tempArray);
	//echo $username;
?>