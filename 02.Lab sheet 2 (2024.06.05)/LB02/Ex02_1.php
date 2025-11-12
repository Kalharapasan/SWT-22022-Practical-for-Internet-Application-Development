<?php

$room_temperature = 66; 

if ($room_temperature >= 72) {
 echo "Turning on the air conditioner.\n";;
} elseif ($room_temperature <= 68) {
 echo "Turning on the heater.\n";
} else {
 echo "Maintaining current temperature.\n";
}
?>
