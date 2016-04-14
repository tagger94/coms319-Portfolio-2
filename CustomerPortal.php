<!DOCTYPE html>
<html>
    <?php session_start();
    ?>
<head>
    <title>Customer Portal</title>
    <?php include "style/header.php"; ?>
    <?php include "style/forceLogin.php"; ?>
    <script src="js/moment/moment.min.js"></script>
</head>

<body>
    
   <!--<button id="getAll" type="button">get all packages</button> <br>-->
   <!--<button id="clearAll" type="button">clear packages</button> <br>-->
   <!--<button id="makeNew" type="button">make Random Package</button> <br>-->
    
    <!--Fragment for package submission-->
    <?php include "style/packageSubmit.php"; ?>
    <br><br>
    <?php //include "style/packageUpdate.html"; ?>
    <br><br>
    <?php include "style/packageView.html"; ?>
    
    <script src="js/faker/faker.js"></script>
    <script src="js/package.js"></script>
    <script>
    
        $(document).ready(function(){
            
            $("#getAll").click (function () {
                $.post("php/getCustomerPackages.php", {}, function(data,status,xhr) {
                    var obj = JSON.parse(data);
				    console.log(obj);
			    });
            });
            
            $("#clearAll").click (function () {
                $.post("php/clearPackages.php", {}, function(data,status,xhr) {
				    console.log(data);
			    });
            });
            
        }); 
    </script>
    
</body>

</html>