<?php
/*Class to check if submitted login info is valid. If they are the screen will redirect to either the customer or employee portal*/



$file = file_get_contents("user.json");

$list = json_decode($file, true);
$obj = $_REQUEST;
//var_dump($_REQUEST);

$message = "Invalid Login Creds";
/*  
*goes through the user file and check if the login credentials match one of those in the system
*/
foreach ($list as $k)
{
	if($k["email"] == $_REQUEST["email"]){
		if($k["password"] == $_REQUEST["password"]){
			$message = $k['isEmployee'];
		}
	}
}


	echo($message);







?>