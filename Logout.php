<?php
?>
<html>
<body>

<?php
    // CHECK THAT SESSION IS ACTIVE
    session_start();
  
  
    echo "<script>";
    echo "document.location.href = \"Login.php\";";
    echo "</script>";

    // destroy the session 
    session_destroy(); 
?>

</body>
</html>
