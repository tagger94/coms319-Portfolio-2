<?php session_start(); ?>
<?php
    //Open file
    $packageFile = file_get_contents('package.json');
		
	//Check for valid file contents
	if($packageFile[0] != "{") {
		$packageFile = "{}";
	}
	
	echo $packageFile
?>