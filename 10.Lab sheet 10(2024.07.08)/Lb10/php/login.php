<?php
session_start();
require_once '../database/Database.php';
require_once '../database/User.php';

$database = new Database("localhost", "root", "", "expense_tracker");
$db_connection = $database->getConnection();
$user = new User($db_connection);

$data = json_decode(file_get_contents("php://input"));
$username = filter_var($data->username, FILTER_SANITIZE_STRING);
$password = filter_var($data->password, FILTER_SANITIZE_STRING);

$user->setUsername($username);
$user->setPassword($password);

header('Content-Type: application/json');
if ($user->login()) {
    $_SESSION['username'] = $user->username;
    echo json_encode(["message" => "Login success"]);
} else {
    echo json_encode(["message" => "Login failed"]);
}
?>
