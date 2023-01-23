<!--
	Lab 3
	Author: Ahmed Ashraf Ibrahim
	Date:   22-01-2023
	File:   index.php
-->

<?php
const MAX_NAME_LENGTH = 100;
const MAX_MESSAGE_LENGTH = 255;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $group = $_POST["group"];
    $classdetails = $_POST["classdetails"];
    $gender = $_POST["gender"];
    // $courses = $_POST["courses"];
    if ((empty($_POST["name"])) && (!empty($_POST["email"])) && (!empty($_POST["gender"]))) {
        echo  "*Name is required";;
    } else if ((!empty($_POST["name"])) && (empty($_POST["email"])) && (!empty($_POST["gender"]))) {
        echo "*Email is required";
    } else if ((!empty($_POST["name"])) && (!empty($_POST["email"])) && (empty($_POST["gender"]))) {
        echo "*gender is required";
    } else if ((empty($_POST["name"])) && (empty($_POST["email"])) && (!empty($_POST["gender"]))) {
        echo "*Name & Email are required";
    } else if ((empty($_POST["name"])) && (!empty($_POST["email"])) && (empty($_POST["gender"]))) {
        echo "*Name & gender are required";
    } else if ((!empty($_POST["name"])) && (empty($_POST["email"])) && (empty($_POST["gender"]))) {
        echo "*Email & gender are required";
    } else if ((empty($_POST["name"])) && (empty($_POST["email"])) && (empty($_POST["gender"]))) {
        echo "*Name, Email & gender are required";
    } else {
        if ((strlen($name) > MAX_NAME_LENGTH) && (filter_var($email, FILTER_VALIDATE_EMAIL))) {
            echo "*Name is not vaild.<br>";
        } else if ((strlen($name) <= MAX_NAME_LENGTH) && (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
            echo "*Email is not vaild.<br>";
        } else if ((strlen($name) > MAX_NAME_LENGTH) && (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
            echo "*Name & Email are not vaild.<br>";
        } 
      
        if(isset($_POST['submit'])){
          if(!empty($_POST['courses']) && (strlen($name) < MAX_NAME_LENGTH) && (filter_var($email, FILTER_VALIDATE_EMAIL))) {
            echo "<h2>Thank you for contacting Us</h2><b>Name: </b>" . $name .
            "<br><b>Email: </b>" . $email .
            "<br><b>Group #: </b>" . $group .
            "<br><b>Class Details : </b>" . $classdetails .
            "<br><b>Gender: </b>" . $gender ;
            echo "<br><b>Your Course : </b>" ;
            foreach($_POST['courses'] as $selected){
              echo '   ' . $selected ;
            }           
        } 
          else {
            echo "*You Should Select Courses";
          }
        }
        
    }
}
    function clearBtn(){
        $name = "";
        $email = "";
        $gender = "";
        $group = "";
        $classdetails = "";
}
?>
<html>

<head>
    <title> Contact Form </title>


</head>

<body>
    <h3> Contact Form </h3>
    <div id="after_submit">

    </div>
    <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">

        <div class="row">
            <label class="required" for="name">Your name:</label><br>
            <input id="name" class="input" name="name" type="text" value="<?php echo (isset($name)) ? $name : ''; ?>" size="30" /><br><br>
        </div>

        <div class="row">
            <label class="required" for="email">Your email:</label><br>
            <input id="email" class="input" name="email" type="text" value="<?php echo (isset($email)) ? $email : ''; ?>" size="30" /><br><br>
        </div>

        <div class="row">
            <label>Group # :</label><br />
            <input id="group" class="input" name="group" type="text" value="<?php echo (isset($group)) ? $group : ''; ?>"><br><br>
        </div>

        Gender: <input type="radio" name="gender" required value="Male"><label>Male </label>
        <input type="radio" name="gender" required value="Female"><label>Female </label><br><br>
        <input type="radio" style="display:none ;" name="gender" required value="" checked="checked">
        
        <div class="row">
            <label class="required">Class Details:</label><br><br>
            <textarea id="classdetails" class="input" name="classdetails" rows="7" cols="30"><?php echo (isset($classdetails)) ? $classdetails : ''; ?></textarea><br><br>
        </div>


        Select Courses: <select name="courses[]" multiple id="courses">
            <option value="PHP" name="courses">PHP</option>
            <option value="Java">Java</option>
            <option value="MySQL">MySQL</option>
            <option value="python">Python</option>
            <option value="C#">C#</option>
            <option value="C++">C++</option>
            <option value="HTML">HTML</option>
        </select><br><br>
        Agree : <input type="checkbox" name="agree" required checked><br><br>

        <input id="submit" name="submit" type="submit" value="Send email" />
        <input id="clear" name="clear" onclick="clearBtn()" type="reset" value="clear form" />
    </form>
</body>

</html>