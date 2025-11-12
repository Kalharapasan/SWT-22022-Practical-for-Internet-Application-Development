<?php
class Todo {
    private $id;
    private $title;
    private $description;
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function create() {
        if (empty($this->title) || empty($this->description)) {
            die("Title and Description are required.");
        }
        $query = "INSERT INTO task (title, description) VALUES (?, ?)";
        $stmt = mysqli_prepare($this->connection, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $this->title, $this->description);

        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            die("Failed to add task: " . mysqli_error($this->connection));
        }
    }

    public function delete() {
        if (empty($this->id)) {
            die("ID is required.");
        }
        $query = "DELETE FROM task WHERE id = ?";
        $stmt = mysqli_prepare($this->connection, $query);
        mysqli_stmt_bind_param($stmt, 'i', $this->id);

        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            die("Failed to delete task: " . mysqli_error($this->connection));
        }
    }

    public function update() {
        if (empty($this->id) || empty($this->title) || empty($this->description)) {
            die("All fields are required.");
        }
        $query = "UPDATE task SET title = ?, description = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->connection, $query);
        mysqli_stmt_bind_param($stmt, 'ssi', $this->title, $this->description, $this->id);

        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            die("Failed to update task: " . mysqli_error($this->connection));
        }
    }

    public function getAllTasks() {
        $query = "SELECT * FROM task";
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("Failed to retrieve data: " . mysqli_error($this->connection));
        }
        $tasks = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $tasks[] = $row;
        }
        return $tasks;
    }
}
?>
