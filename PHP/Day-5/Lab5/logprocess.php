<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'connection.php';
    $sql=mysqli_query($conn,"SELECT * FROM register where Email='$Email' and password='md5($password)'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["Email"]=$row['Email'];
        $_SESSION["full_name"]=$row['full_name'];
        header("Location: ../home/home.html"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>