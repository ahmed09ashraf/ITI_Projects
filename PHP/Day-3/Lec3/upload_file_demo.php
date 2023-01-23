<?php
#1
// uploading file by form
   if(isset($_POST['submit']) or isset($_FILES['image'])){
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      
   //   echo ($_FILES['image']['error']);
         move_uploaded_file($file_tmp,"images/".$file_name);
   //   echo ($_FILES['image']['error']);

        }

?>
<html>
   <body>
      
      <form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
      <img src="<?php $file_name.$file_type?>" >
      
   </body>
</html>