<?php
class BookICT084 {
    private $book_ID;
    private $title;
    private $author;
    private $isbn;
    private $price;
    private $description;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function setBookID($book_ID) {
        $this->book_ID = $book_ID;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setISBN($isbn) {
        $this->isbn = $isbn;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function create() {
        $query = "INSERT INTO `bookICT084` (`title`, `author`, `ISBN`, `price`, `description`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param('sssds', $this->title, $this->author, $this->isbn, $this->price, $this->description);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function update() {
        $query = "UPDATE `bookICT084` SET `title` = ?, `author` = ?, `ISBN` = ?, `price` = ?, `description` = ? WHERE `book_ID` = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param('ssssdi', $this->title, $this->author, $this->isbn, $this->price, $this->description, $this->book_ID);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function delete() {
        $query = "DELETE FROM `bookICT084` WHERE `book_ID` = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param('i', $this->book_ID);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function read() {
        $query = "SELECT * FROM `bookICT084`";
        $result = $this->conn->query($query);
        return $result;
    }
}
?>
