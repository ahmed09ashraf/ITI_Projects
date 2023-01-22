<?php
#1
//function
         /* Defining a PHP Function */
         function writeMessage() {
            echo "You are really a nice person, Have a nice time!";
         }
         
         /* Calling a PHP Function */
         writeMessage();
     

//PHP Functions with Parameters
         function addFunction($num1, $num2) {
            $sum = $num1 + $num2;
            echo "Sum of the two numbers is : $sum";
         }
         
         addFunction(10, 20);

//Passing Arguments by Reference      
function add_five(&$value) {
    $value += 5;
  }
  
  $num = 2;
  add_five($num);
  echo $num; 
  //7
//PHP Functions returning value
function add_Function($num1, $num2) {
    $sum = $num1 + $num2;
    return $sum;
 }
 $return_value = add_Function(10, 20);
 
 echo "Returned value from the function : $return_value";
 

 //Setting Default Values for Function Parameters
 function printMe($param = 3) {
    print $param;
 }
 
 printMe("This is test");
 printMe();


?>