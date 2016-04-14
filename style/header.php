<html>
<?php session_start(); ?>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>

    <span class="topbar">
        <ul class = "topbar">
            <?php
                if(isset($_SESSION['username'])) {
                    echo "<li class = \"topbar\"><a class=\"topbar\" href=\"Logout.php\">Logout</a></li>";
                    echo "<li class = \"topbar\"><a id=\"username\" class=\"topbar\">".$_SESSION['username']."</a></li>";
                } else {
                    echo "<li class = \"topbar\"><a class=\"topbar\" href=\"Login.php\">Sign In</a></li>";
                }
            ?>
        </ul>
    </span>
</body>

</html>




