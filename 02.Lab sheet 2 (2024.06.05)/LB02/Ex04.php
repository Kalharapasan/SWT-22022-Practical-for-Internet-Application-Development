<?php

function calculate_tax_amount($price, $tax_rate) {
    $tax_amount = $price * $tax_rate;
    return $tax_amount;
}


function calculate_total_bill($price, $tax_rate) {
    $tax_amount = calculate_tax_amount($price, $tax_rate);
    $total_amount = $price + $tax_amount;
    return $total_amount;
}


$price = 100; 
$tax_rate = 0.08; 


$tax_amount = calculate_tax_amount($price, $tax_rate);
$total_amount = calculate_total_bill($price, $tax_rate);

echo "Price: $$price <br>";
echo "Tax Amount: $$tax_amount <br>";
echo "Total Bill Amount: $$total_amount <br>";
?>
