<?php 
class Expense {
    private $connection;
    private $amount;
    private $description;
    private $id;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAllExpenses() {
        $query = "SELECT * FROM expenses";
        $result = mysqli_query($this->connection, $query);

        if (!$result) {
            die("Failed to retrieve data: " . mysqli_error($this->connection));
        }

        $expenses = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $expenses[] = $row;
        }
        return $expenses;
    }

    public function create() { 
        $query = "INSERT INTO `expenses` (`description`, `amount`) VALUES (?, ?)"; 
        $stmt = $this->connection->prepare($query); 
         if ($stmt === false) { 
                         return false; 
        } 
        $stmt->bind_param('sd', $this->description, $this->amount); 
        $result = $stmt->execute(); 
        $stmt->close(); 
         return $result; 
    } 
    

    public function delete() {
        $query = "DELETE FROM expenses WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        if ($stmt === false) {
            return false;
        }
        $stmt->bind_param('i', $this->id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    
    public function update() {
        $query = "UPDATE expenses SET amount = ?, description = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        if ($stmt === false) {
            return false;
        }
        $stmt->bind_param('dsi', $this->amount, $this->description, $this->id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    
}
?>
