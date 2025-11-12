<?php
session_start();
require_once '../database/Database.php';
require_once '../database/User.php';

$database = new Database("localhost", "root", "", "expense_tracker");
$db = $database->getConnection();
$user = new User($db);

$data = json_decode(file_get_contents("php://input"));
$username = htmlspecialchars($data->username, ENT_QUOTES, 'UTF-8');
$password = htmlspecialchars($data->password, ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($data->email, ENT_QUOTES, 'UTF-8');

$user->setUsername($username);
$user->setPassword($password);
$user->setEmail($email);

header('Content-Type: application/json');
if ($user->register()) {
    echo json_encode(["message" => "User was registered."]);
} else {
    echo json_encode(["message" => "Unable to register the user."]);
}
?>
