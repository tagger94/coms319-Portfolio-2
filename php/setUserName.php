<?php

/*class that adds the users email to the session in order to display it in the upper right of the different screens */
session_start();


$_SESSION['username'] = $_REQUEST["email"];


?>