<?php session_start(); ?>
<?php
    file_put_contents('package.json', "[]");
    echo "Cleared";
?>