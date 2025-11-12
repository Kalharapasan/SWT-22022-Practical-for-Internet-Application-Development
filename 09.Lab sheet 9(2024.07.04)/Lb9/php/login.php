<?php 
session_start();
require_once '../database/Database.php';
require_once '../database/User.php';

$database = new Database("localhost", "root", "", "expense_tracker");
$db_connection = $database->getConnection();
$user = new User($db_connection);

$data = json_decode(file_get_contents("php://input"));

$user->setUsername($data->username);
$user->setPassword($data->password);

if ($user->login()) {
    $_SESSION['username'] = $user->username; // Corrected here
    echo json_encode(["message" => "Login success"]);
} else {
    echo json_encode(["message" => "Login fail"]);
}
?>
