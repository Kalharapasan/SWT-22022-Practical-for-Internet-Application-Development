<?php

$user_selection = 'C002'; 
switch ($user_selection) {
 case 'C001':
     echo "Dispensing Chips.\n";
     break;
 case 'C002':
     echo "Dispensing Cookies.\n";
     break;
 case 'C003':
     echo "Dispensing Candy Bar.\n";
     break;
 default:
     echo "Invalid selection.\n";
     break;
}

?>
