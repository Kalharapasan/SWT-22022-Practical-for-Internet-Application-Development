<?php 
session_start();
require_once '../database/Database.php';
require_once '../database/User.php';

$database = new Database("localhost", "root", "", "expense_tracker");
$db = $database->getConnection();
$user = new User($db);

$data = json_decode(file_get_contents("php://input"));
$user->setUsername($data->username);
$user->setPassword($data->password);
$user->setEmail($data->email);

if ($user->register()) {
    echo json_encode(["message" => "User was registered."]);
} else {
    echo json_encode(["message" => "Unable to register the user."]);
}
?>
