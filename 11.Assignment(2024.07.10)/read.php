<?php
require '../database/BookICT084.php';
require '../database/DatabaseConnectionICT084.php';

$database = new DatabaseConnectionICT084("localhost", "root", "", "SEU_IS_20_ICT_084");
$connection = $database->getConnection();

$book = new BookICT084($connection);

$result = $book->read();

$books = [];
while ($row = $result->fetch_assoc()) {
    $books[] = $row;
}

echo json_encode($books);
?>
