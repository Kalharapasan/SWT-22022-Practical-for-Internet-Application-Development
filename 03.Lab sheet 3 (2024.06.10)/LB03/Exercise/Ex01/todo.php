<?php

class Todo {
    private $title;
    private $description;
    private $id;
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getId() {
        return $this->id;
    }

    public function getAllTasks() {
        $query = "SELECT * FROM task";
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            die("Failed to retrieve data!");
        }
        $tasks = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $tasks[] = $row;
        }
        return $tasks;
    }

    public function create() {
        if (empty($this->title) || empty($this->description)) {
            return header('Location: index.php?error=All fields are required');
        }
        $query = "INSERT INTO task (title, description) VALUES (?, ?)";
        $stmt = mysqli_prepare($this->connection, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $this->title, $this->description);

        if (mysqli_stmt_execute($stmt)) {
            return header('Location: index.php?success=Successfully added task');
        } else {
            return header('Location: index.php?error=Failed to add task');
        }
    }

    public function delete() {
        if (empty($this->id)) {
            return header('Location: index.php?error=ID is required');
        }
        $query = "DELETE FROM task WHERE id = ?";
        $stmt = mysqli_prepare($this->connection, $query);
        mysqli_stmt_bind_param($stmt, 'i', $this->id);

        if (mysqli_stmt_execute($stmt)) {
            return header('Location: index.php?success=Successfully deleted task');
        } else {
            return header('Location: index.php?error=Failed to delete task');
        }
    }

    public function update() {
        if (empty($this->id) || empty($this->title) || empty($this->description)) {
            return header('Location: index.php?error=All fields are required');
        }
        $query = "UPDATE task SET title = ?, description = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->connection, $query);
        mysqli_stmt_bind_param($stmt, 'ssi', $this->title, $this->description, $this->id);

        if (mysqli_stmt_execute($stmt)) {
            return header('Location: index.php?success=Successfully updated task');
        } else {
            return header('Location: index.php?error=Failed to update task');
        }
    }
}
?>
