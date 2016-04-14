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
    
    //Get List of Keys for Object
    $pidList = get_object_vars($packageList);
    
    //$array = get_object_vars($object);
    //$properties = array_keys($array);
	
	echo json_encode($pidList);
?>