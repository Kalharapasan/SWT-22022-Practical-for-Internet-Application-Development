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
        $query = "INSERT INTO expenses (amount, description) VALUES ('$this->amount', '$this->description')";
        $result = mysqli_query($this->connection, $query);

        return $result ? true : false;
    }

    public function delete() {
        $query = "DELETE FROM expenses WHERE id = '$this->id'";
        $result = mysqli_query($this->connection, $query);

        return $result ? true : false;
    }

    public function update() {
        $query = "UPDATE expenses SET amount = '$this->amount', description = '$this->description' WHERE id = '$this->id'";
        $result = mysqli_query($this->connection, $query);

        return $result ? true : false;
    }
}
?>
