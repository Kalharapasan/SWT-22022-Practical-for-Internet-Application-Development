<?php
class Student {
    private $name;
    private $gpa;
    private $id;
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function setName($name) {
        $this->name = mysqli_real_escape_string($this->connection, $name); 
    }

    public function setGpa($gpa) {
        $this->gpa = $gpa;
    }

    public function create() {
        if (empty($this->name) || empty($this->gpa)) {
            return false; 
        }
        $query = "INSERT INTO student (Name, Gpa) VALUES (?, ?)";
        $stmt = mysqli_prepare($this->connection, $query);
        mysqli_stmt_bind_param($stmt, 'sd', $this->name, $this->gpa);

        return mysqli_stmt_execute($stmt);
    }

    public function getAllStudents() {
        $query = "SELECT * FROM student";
        $result = mysqli_query($this->connection, $query);
        if (!$result) {
            return []; 
        }
        $students = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }
        return $students;
    }
}

?>
