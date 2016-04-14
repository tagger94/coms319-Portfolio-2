<html>
<?php session_start(); ?>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
    <script>
        var check_username = 
        <?php
                if(isset($_SESSION['username'])) {
                    echo "true";
                } else {
                    echo "false";
                }
            ?>
            
        if(!check_username) {
            document.location.href = "Login.php";
        }
    </script>
</body>

</html>