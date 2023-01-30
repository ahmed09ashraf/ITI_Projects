<?php
extract($_POST);
include("connection.php");
$sql=mysqli_query($conn,"SELECT * FROM register where Email='$Email'");
if(mysqli_num_rows($sql)>0)
{
    echo "Email Id Already Exists"; 
	exit;
}
elseif(isset($_POST['save'])){
        $query="INSERT INTO register(full_name, Email, Password ) VALUES ('$full_name', '$Email', 'md5($password)')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: login.php?status=success");
    
}
    else 
    {
		echo "Error.Please try again";
	}


?>