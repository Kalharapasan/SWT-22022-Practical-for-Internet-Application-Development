<?php
    require_once '../database/Expense.php';
    require_once '../database/Database.php';
    $database = new Database("localhost", "root", "", "expense_tracker");
    $db = $database->getConnection();
    
    $data = json_decode(file_get_contents("php://input"), true);
    $expense = new Expense($db);
    $expense->setId($data['id']);
    $expense->setDescription($data['description']);
    $expense->setAmount($data['amount']);
    
    if ($expense->update()) {
        echo json_encode(["message" => "Expense updated."]);
    } else {
        echo json_encode(["message" => "Unable to update expense."]);
    }
    
?>