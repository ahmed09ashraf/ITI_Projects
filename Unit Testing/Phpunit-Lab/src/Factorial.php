
<?php 
class Factorial{

public function factorial($num) { 

        if (is_int($num) && $num >= 0) { 
            $factorial = 1; 
            for ($i = $num; $i >= 1; $i--) { 
                $factorial = $factorial * $i; 
            } 
            return $factorial;
        }

        
        else {
            return null ;
        }
    }
}
?>