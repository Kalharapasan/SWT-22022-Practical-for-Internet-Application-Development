<?php
require_once '../database/Expense.php';
require_once '../database/Database.php';

$database = new Database("localhost", "root", "", "expense_tracker");
$db = $database->getConnection();
$expense = new Expense($db);

$data = json_decode(file_get_contents("php://input"), true);
$expense->setId($data['id']);
$expense->setDescription($data['description']);
$expense->setAmount($data['amount']);

header('Content-Type: application/json');
echo json_encode(["message" => $expense->update() ? "Expense updated." : "Failed to update expense"]);
?>
