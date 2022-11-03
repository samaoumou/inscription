
        <?php
            
            if($_SESSION['email'] !== ""){
              session_unset();
              header("location:login.php");
              session_destroy(); 
            }
    ?> 