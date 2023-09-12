<?php 

    session_start();
    if(!session_destroy())
    {
        echo "Failed to log out";
    }
    else
    {
        header("location: login.php");
        echo "Logged out successfully";

    }
?>