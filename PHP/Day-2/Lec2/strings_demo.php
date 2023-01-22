<?php
#1
//String Concatenation Operator
   $string1="Hello World";
   $string2="1234";
   
   echo $string1 . " " . $string2;
?>

<?php
#2
//the strlen() function
   echo strlen("Hello world!");
?>

<?php
#3
//Using the strpos() function
   echo strpos("Hello world!","world");
?>

<?php
#4
//Count Words in a String
echo str_word_count("Hello world!"); // outputs 2
?>

<?php
#5
//Replace Text Within a String
echo str_replace("world", "Noha", "Hello world!"); // outputs Hello Dolly!
?>