<?php

// // Q1-  Search for how to make \n work in browser.

// echo nl2br( "AHMED \n\n ASHRAF \r\r ITI \n\n PHP\n" ) ;

// // // header('Content-type: text/plain');
// // echo ( "AHMED \nASHRAF \rITI \nPHP" ) ;


//  echo "<br><br>==================================================================<br><br>" ;
// // =====================================================================

// // // Q2-  Search for 3 built-in function of a string.
// echo nl2br ("\n\nLength Of Word Is :".strlen("Hello world")."\n\n");
// echo nl2br ("Num of words is :".str_word_count("Ahmed Ashraf")."\n\n") ;
// echo nl2br (strrev("\n\n"."Ahmed Ashraf"));
// echo nl2br ("Position of word is :".strpos("Ahmrf Ashraf Ibrahim","Ashraf")."\n\n");
// echo nl2br (str_replace("PHP","NodeJs","FullStack PHP")."\n") ;

// echo "<br><br>==================================================================<br><br>" ;
// // =====================================================================
// /*
// Q3-  Write a PHP script to get the sum and avg of an indexed array
// with value = 45 in index =1
// with value = 12 in index =0
// with value = 25 in index =3
// with value = 10 in index =2
// after that sort it in a reverse order (highest to lowest).*/

// $numbers = [] ;

// $numbers[1] = 45;
// $numbers[0] = 12;
// $numbers[3] = 25;
// $numbers[2] = 10;

// $sum = array_sum($numbers) ;
// $average = array_sum($numbers) / count($numbers);

// echo nl2br("\n\n Sum is : $sum\n Average is : $average \n\n");


// rsort($numbers);

// print_r ($numbers) ;
// echo "<br><br>" ;
// foreach( $numbers as $value ) {
//     echo "$value , ";
// }

echo "<br><br>==================================================================<br><br>" ;
// =========================================================================

// $ages = array("Sara"=>31,"John"=>41,"Walaa"=>39,"Ramy"=>40) ;

// echo "Age of Sara is ". $ages['Sara'] . "<br/>";
// echo "Age of John is ".  $ages['John']. "<br/>";
// echo "Age of Walaa is ".  $ages['Walaa']. "<br/>";
// echo "Age of Ramy is ".  $ages['Ramy']. "<br><br><br>";

// echo "a) ascending order sort by value<br>" ;
// echo "<pre>";
// asort($ages);
// print_r ($ages) ;
// echo "</pre>" ;

// echo "<br>b) descending order sort by value<br>" ;
// echo "<pre>";
// arsort($ages);
// print_r ($ages) ;
// echo "</pre>" ;


// echo "<br>c) ascending order sorting by Key<br>" ;
// echo "<pre>";
// ksort($ages);
// print_r ($ages) ;
// echo "</pre>" ;

// echo "<br> d) descending order sorting by Key <br>" ;

// echo "<pre>";
// krsort($ages);
// print_r ($ages) ;
// echo "</pre>" ;

// echo "<br><br>==================================================================<br><br>" ;

// =============================================================================================

// Q5)Display the following array in an HTML table with Name, Email and Status table headers.
// Specify PHP status with red color.


$students = [
    ['name' => 'Alaa', 'email' => 'alaa@test.com', 'status' => 'PHP'],
    ['name' => 'Shamy', 'email' => 'shamy@test.com', 'status' => '.Net'],
    ['name' => 'Youssef', 'email' => 'youssef@test.com', 'status' => 'Testing'],
    ['name' => 'Waleid', 'email' => 'waleid@test.com', 'status' => 'PHP'],
    ['name' => 'Rahma', 'email' => 'rahma@test.com', 'status' => 'Front End'],
];
echo "<h1>PHP Q2_2022 Class Regestration<br><br> " ;
echo "<table>
   <thead>
      <tr style='font-size: 40px;'>
           <th>Name---</th>
           <th>Email---</th>
           <th>Status---</th>
       </tr>
   </thead>
   </table>" ;
foreach( $students as $element ) {
   
   echo "<br>" ;
   if($element["status"] == "PHP"){
    foreach( $element as $key => $value ) {
            echo '<span style="color: red;">'."$value---" ;
        }
    }
    else {
        foreach( $element as $key => $value ) {
            echo '<span style="color: black;">'."$value---" ;
    }
 }
}


?>