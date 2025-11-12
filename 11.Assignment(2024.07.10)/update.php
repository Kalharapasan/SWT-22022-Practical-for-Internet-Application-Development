<?php
require '../database/BookICT084.php';
require '../database/DatabaseConnectionICT084.php';

$database = new DatabaseConnectionICT084("localhost", "root", "", "SEU_IS_20_ICT_084");
$connection = $database->getConnection();

$book = new BookICT084($connection);

$data = json_decode(file_get_contents("php://input"));

$book->setBookID($data->bookId);
$book->setTitle($data->title);
$book->setAuthor($data->author);
$book->setISBN($data->isbn);
$book->setPrice($data->price);
$book->setDescription($data->description);

if ($book->update()) {
    echo json_encode(["message" => "Book updated successfully"]);
} else {
    echo json_encode(["message" => "Unable to update book"]);
}
?>
