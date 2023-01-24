<?php
require_once "connection.php";

if(isset($_POST['save']))
{    

    $name = $_POST['name'];
    $email = $_POST['email'];


    if(!empty($_POST['gender'])) {
        if ($_POST['gender'] == 'Male')
        {
            $gender ='Male' ;
            }
    
        elseif($_POST['gender'] == 'Female') { 
            $gender ='Female' ; 
        }
    
    } 
        else {
            echo 'Please select the value.';
            }

    if (isset($_POST['mail_status'])) { $mail_status = "yes" ; }
        
    else { $mail_status = "no" ; }

     $sql = "INSERT INTO users(name,email,gender,mail_status)
     VALUES ('$name','$email','$gender','$mail_status')";
     if (mysqli_query($conn, $sql)) {
        header("location: index.php");
        exit();
     } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <?php include "head.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>User Regestration Form</h2>
                    </div>
                    <p>Please fill this form and submit to add User record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="" maxlength="50" required="">
                        </div>

                        <div class="form-group ">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                        </div>
                        
                        <div>
                            <label>Gender</label><br><br>
                            <input type="radio" name="gender"  required value="Female"><label>....Female </label><br><br>
                            <input type="radio" name="gender" required value="Male"><label>....Male</label><br><br>
                            <!-- <input type="radio" style="display:none ;" name="gender" required value="" checked="checked"> -->
                        </div>


                            <label>Recieve E-Mail From Us :</label> <span style="padding:10px ;"></span><input type="checkbox" name="mail_status" ><labe style="padding:10px">I AGREE </labe><br><br>

                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
