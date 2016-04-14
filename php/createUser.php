<?php




$file = file_get_contents('user.json');

$list = json_decode($file, true);
$obj = $_REQUEST;

$message = "";
foreach ($list as $k)
{
	if($k['email'] == $_REQUEST["email"]){
		$message .= "email already in system";
	}
}

if($message == ""){
$temp = new stdClass();
        $temp->email = $obj["email"];
        $temp->password = $obj["password"];
        $temp->isEmployee = $obj["isEmployee"];
        array_unshift($list, $temp);
		$file = json_encode($list);
        //List is now has new 
		file_put_contents('user.json', $file);
        $message .= "true";
}

if($message == "true"){
echo($message);
}
else{
echo("false");
}






?>