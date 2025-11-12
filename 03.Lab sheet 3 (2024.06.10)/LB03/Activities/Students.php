<?php 
    class Student
    {
        private $name;
        private $gpa;
        private $id;
        private $connection;
    
        public function __construct($connection)
        {
            $this->connection = $connection;
        }
    
        public function setName($name)
        {
            $this->name = $name;
        }
    
        public function setGpa($gpa)
        {
            $this->gpa = $gpa;
        }
    
        public function setId($id)
        {
            $this->id = $id;
        }
    
        public function getName()
        {
            return $this->name;
        }
    
        public function getGpa()
        {
            return $this->gpa;
        }
    
        public function getId()
        {
            return $this->id;
        }
    
        public function getAllStudent()
        {
            $query = "SELECT * FROM students";
            $result = mysqli_query($this->connection, $query);
            if (!$result) {
                die("Failed to retrieve data!");
            }
            $students = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $students[] = $row;
            }
            return $students;
        }
    
        public function create()
        {
            if (empty($this->name) || empty($this->gpa)) {
                return header('Location: index.php?error=All fields are required');
            }
            $query = "INSERT INTO students (Name, Gpa) VALUES (?, ?)";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param($stmt, 'sd', $this->name, $this->gpa);
    
            if (mysqli_stmt_execute($stmt)) {
                return header('Location: index.php?success=Successfully added student');
            } else {
                return header('Location: index.php?error=Failed to add student');
            }
        }
    
        public function delete()
        {
            if (empty($this->id)) {
                return header('Location: index.php?error=ID is required');
            }
            $query = "DELETE FROM students WHERE ID = ?";
            $stmt = mysqli_prepare($this->connection, $query);
            mysqli_stmt_bind_param($stmt, 'i', $this->id);
    
            if (mysqli_stmt_execute($stmt)) {
                return header('Location: index.php?success=Successfully deleted student');
            } else {
                return header('Location: index.php?error=Failed to delete student');
            }
        }
    }

?>