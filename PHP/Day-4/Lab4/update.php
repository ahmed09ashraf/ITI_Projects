<?php
// Include database connection file
require_once "connection.php";

// Update Table Values 
    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE users 
                        SET  name='" . $_POST['name'] . "' , 
                        mail_status='" . $_POST['mail_status'] . "', 
                        email='" . $_POST['email'] . "' 
                        
                        WHERE user_id='" . $_POST['user_id'] . "'");
     
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
    <title>Update Record</title>
    <?php include "head.php"; ?>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row["name"]; ?>" maxlength="50" required="">
                        </div>

                        <div class="form-group ">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $row["email"]; ?>" maxlength="50" required="">
                        </div>


                            <label>Do You Want To Recieve Mails ?</label><span style="padding:10px ;"></span>
                            <input type="text" autocomplete="none" name="mail_status" value ="<?php echo $row["mail_status"];?>" > 

                            <br><br>
                    
                        <input type="hidden" name="user_id" value="<?php echo $row["user_id"]; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>