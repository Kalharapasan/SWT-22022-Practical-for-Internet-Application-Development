<?php
require_once '../database/Expense.php';
require_once '../database/Database.php';

$database = new Database("localhost", "root", "", "expense_tracker");
$db = $database->getConnection();
$expense = new Expense($db);

header('Content-Type: application/json');
echo json_encode(["records" => $expense->getAllExpenses()]);
?>
