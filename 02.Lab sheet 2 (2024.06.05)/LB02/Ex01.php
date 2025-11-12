<?php
    
   echo "------------------------------------------------------------------------- <br>";
   echo" Arithmetic Operators + , - , * , / , % , ++ , ";
   echo"<br>";
   echo "------------------------------------------------------------------------- <br>";
   echo"<br>";
   $number1 = 45;
   $number2 = 67;
   $sum = $number1 + $number2;
   echo "Sum : " . $sum;
   echo"<br>";


   echo"<br>";
   echo "------------------------------------------------------------------------- <br>";
   echo "Comparison Operators == , != , > , < , >= , <= ";
   echo"<br>";
   echo "------------------------------------------------------------------------- <br>";
   echo"<br>";
   $number3 = 45;
   $number4 = 67;
   $is_equal = $number1 == $number2;
   echo "Is Equal ( ".$number3.",".$number4." ) : " . $is_equal;
   echo"<br>";

   echo"<br>";
   echo "------------------------------------------------------------------------- <br>";
   echo " Logical Operators  and , or , && , || , !";
   echo"<br>";
   echo "------------------------------------------------------------------------- <br>";
   $true_val = true;
   $false_val = false;
   $and_operator = ($true_val and $false_val);
   echo "AND ( " . $true_val . "," . $false_val . " ) : " .$and_operator;
   echo"<br>";

   echo"<br>";
   echo "------------------------------------------------------------------------- <br>";
   echo " Assignment Operators = , += , -= , *= , /= , %= ";
   echo"<br>";
   echo "------------------------------------------------------------------------- <br>";
   echo"<br>";
   $var1 = 23;
   $var2 = 34;
   $assignment_opr = $var1 + $var2;
   echo "Simple Assignment ( " . $var1 . "," . $var2 . " ) : " . $assignment_opr;
   echo "<br>";

   echo"<br>";
   echo "------------------------------------------------------------------------- <br>";
   echo "String Operators . , .=";
   echo"<br>";
   echo "------------------------------------------------------------------------- <br>";
   echo"<br>";
   $string_var1 = "Olivia";
   $String_var2 = "Edith";
   $string_var1 .= $String_var2;
   echo $string_var1;
   echo "<br>";

   echo"<br>";
   echo "------------------------------------------------------------------------- <br>";
   echo "Conditional Operators ?";
   echo"<br>";
   echo "------------------------------------------------------------------------- <br>";
   echo"<br>";
   $number5 = 3;
   $number6 = 4;
   $cond_output = $number5 == $number6 ? "Number_5 and Number_6 areequal." : "Number_5 and Number_6 are not equal.";
   echo $cond_output;

?>