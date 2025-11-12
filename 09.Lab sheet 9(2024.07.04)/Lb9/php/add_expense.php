<?php
require_once '../database/Expense.php';
require_once '../database/Database.php';

$database = new Database("localhost", "root", "", "expense_tracker");
$db = $database->getConnection();
$expense = new Expense($db);

$data = json_decode(file_get_contents("php://input"), true);
$expense->setDescription($data['description']);
$expense->setAmount($data['amount']);

header('Content-Type: application/json');
if ($expense->create()) {
    echo json_encode(["message" => "Expense added."]);
} else {
    echo json_encode(["message" => "Unable to add expense."]);
}
?>
