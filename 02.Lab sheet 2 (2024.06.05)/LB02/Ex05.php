<?php
function calculate_total_per_item($item) {
    $total_cost = $item['price'] * $item['quantity'];
    return $total_cost;
}


function calculate_total_bill($cart) {
    $total_bill = 0;
    foreach ($cart as $item) {
        $total_cost = calculate_total_per_item($item);
        $total_bill += $total_cost;
    }
    return $total_bill;
}

$shopping_cart = [
    ["name" => "apples", "price" => 1.2, "quantity" => 10],
    ["name" => "bread", "price" => 2.5, "quantity" => 2],
    ["name" => "milk", "price" => 3.0, "quantity" => 1]
];

$total_bill = calculate_total_bill($shopping_cart);
echo "Total Bill Amount: $$total_bill\n";
?>
