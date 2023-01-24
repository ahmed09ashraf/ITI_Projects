<?php
// Include database connection file
require_once "connection.php";

    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE users set  name='" . $_POST['name'] . "' , mail_status='" . $_POST['mail_status'] . "', email='" . $_POST['email'] . "' WHERE user_id='" . $_POST['user_id'] . "'");
     
     header("location: index.php");
     exit();
    }
    $result = mysqli_query($conn,"SELECT * FROM users WHERE user_id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
  
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <?php include "head.php"; ?>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>View Record</h2>
                    </div>

                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" style="border :2px solid black ; width : 50% ; border-radius:10px ; padding:10px ; font-size :20px ;">
                      
                    <div class="form-group ">
                            <label>Name :</label>
                            <p ><?php echo $row["name"]; ?></p>
                        </div><br>

                        <div class="form-group ">
                            <label>Email :</label>
                            <p ><?php echo $row["email"]; ?></p>
                        </div><br>
                    
                        <div class="form-group ">
                            <label>Gender :</label>
                            <p><?php echo $row["gender"]; ?></p>
                        </div><br>
                    
                        <div class="form-group ">
                            <label>Recieve E-Mail From Us :</label>
                            <p><?php echo $row["mail_status"]; ?></p>
                        </div><br>
                    

                        <a href="index.php" class="btn btn-danger">Back</a>
                        <a href="update.php?id=<?php echo $row["user_id"]; ?>" class="btn btn-primary">Update</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>