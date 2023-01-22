
<html>
   <body>
   
      <?php
      #1
      //Numeric Array

         /* First method to create array. */
         $numbers = array( 1, 2, 3, 4, 5);
         // $numbers = [1, 2, 3, 4, 5];
        

         $arrlength =count($numbers);
         echo 'Number of array items :'.$arrlength.'<br>';

         foreach( $numbers as $value ) {
            echo "Value is $value <br />";
         }
         
         /* Second method to create array. */
         $numbers[0] = "one";
         $numbers[1] = "two";
         $numbers[2] = "three";
         $numbers[3] = "four";
         $numbers[4] = "five";
         
         foreach( $numbers as $value ) {
            echo "Value is $value <br />";
         }
      ?>
      
   </body>
</html>
<!-- ******************************************************************* -->
<html>
   <body>
      
      <?php
      #2
      // Associative Array

         /* First method to associate create array. */
         $salaries = array("Mohammad" => 2000, "Yara" => 1000, "Aly" => 500);
         
         echo "Salary of Mohammad is ". $salaries['Mohammad'] . "<br />";
         echo "Salary of Yara is ".  $salaries['Yara']. "<br />";
         echo "Salary of Aly is ".  $salaries['Aly']. "<br />";
         
         /* Second method to create array. */
         $salaries['Mohammad'] = "high";
         $salaries['Yara'] = "medium";
         $salaries['Aly'] = "low";
         
         echo "Salary of Mohammad is ". $salaries['Mohammad'] . "<br />";
         echo "Salary of Yara is ".  $salaries['Yara']. "<br />";
         echo "Salary of Aly is ".  $salaries['Aly']. "<br />";
      ?>
   
   </body>
</html>
<!-- ******************************************************************* -->
<html>
   <body>
      
      <?php
      #3
      //Multidimensional Arrays
      //Two dimensional array to store marks of three students in three subjects 
         $marks = array( 
            "Mohammad" => array (
               "physics" => 35,
               "maths" => 30,	
               "chemistry" => 39
            ),
            
            "Yara" => array (
               "physics" => 30,
               "maths" => 32,
               "chemistry" => 29
            ),
            
            "Aly" => array (
               "physics" => 31,
               "maths" => 22,
               "chemistry" => 39
            )
         );
         
         /* Accessing multi-dimensional array values */
         echo "Marks for Mohammad in physics : " ;
         echo $marks['Mohammad']['physics'] . "<br />"; 
         
         echo "Marks for Yara in maths : ";
         echo $marks['Yara']['maths'] . "<br />"; 
         
         echo "Marks for Aly in chemistry : " ;
         echo $marks['Aly']['chemistry'] . "<br />"; 
      ?>
   
   </body>
</html>