<!DOCTYPE html>
<html>
<?php session_start(); ?>
<head>
    <title>Employee Portal</title>
    <?php include "style/header.php"; ?>
    <?php include "style/forceLogin.php"; ?>
</head>

<body>
    
    <?php
        /*
        customer actions
            drop off package -> newPackage
            get list of packages -> ???
            check status of package -> getPackage
            see timeline of package movement -> getPackage
        */
    ?>
    
   <?php include "style/packageUpdate.html"; ?>
    
    
    <script src="js/faker/faker.js"></script>
    <script src="js/package.js"></script>
    <script>
        $(document).ready(function(){
            //Do Nothing Yet
            
        });
        
    </script>
</body>

</html>