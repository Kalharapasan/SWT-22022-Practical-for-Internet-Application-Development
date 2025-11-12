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
echo json_encode(["message" => $expense->create() ? "Expense added." : "Failed to add expense"]);
?>
