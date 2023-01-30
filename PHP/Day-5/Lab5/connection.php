<!--
	Lab 3
	Author: Ahmed Ashraf Ibrahim
	Date  : 24-01-2023
	File  : connection.php
    Title : CRUD Form 
-->


<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'crud_php');

// <?php
//     $url='localhost';
//     $username='root';
//     $password='';
//     $conn=mysqli_connect($url,$username,$password,"fregister");
//     if(!$conn){
//         die('Could not Connect My Sql:' .mysql_error());
//     }
// 

/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>