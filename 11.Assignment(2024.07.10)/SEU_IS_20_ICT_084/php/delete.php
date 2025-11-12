<?php
require '../database/BookICT084.php';
require '../database/DatabaseConnectionICT084.php';

$database = new DatabaseConnectionICT084("localhost", "root", "", "SEU_IS_20_ICT_084");
$connection = $database->getConnection();

$book = new BookICT084($connection);

$data = json_decode(file_get_contents("php://input"));

$book->setBookID($data->bookId);

if ($book->delete()) {
    echo json_encode(["message" => "Book deleted successfully"]);
} else {
    echo json_encode(["message" => "Unable to delete book"]);
}
?>
