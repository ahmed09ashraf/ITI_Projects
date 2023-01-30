<?php
    session_start();
    unset($_SESSION["ID"]);
    unset($_SESSION["Email"]);
    unset($_SESSION["full_name"]);
    header("Location:login.php");
?>