<?php
require_once '../database/Expense.php';
require_once '../database/Database.php';

$database = new Database("localhost", "root", "", "expense_tracker");
$db = $database->getConnection();
$expense = new Expense($db);

$data = json_decode(file_get_contents("php://input"), true);
$expense->setId($data['id']);

header('Content-Type: application/json');
echo json_encode(["message" => $expense->delete() ? "Expense deleted." : "Failed to delete expense"]);
?>
