<?php
include('DatabasesConnection.php');
require_once('Students.php');

$db = new DatabasesConnection("localhost", "root", "", "faculty");
$connection = $db->getConnection();

$student = new Student($connection);
$students = $student->getAllStudent();

if (isset($_GET['ID']) && isset($_GET['to_delete'])) {
    $student->setId($_GET['ID']);
    $student->delete();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Faculty Student Details</title>
</head>
<body>
    <div class="container-md">
        <div class="col-10 mb-3">

            <form class="form-control bg-light p-4" action="index.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control form-control-lg" type="text" id="name" name="name" placeholder="Enter your Name">
                </div>
                <div class="mb-3">
                    <label for="gpa" class="form-label">GPA</label>
                    <input class="form-control form-control-lg" type="text" id="gpa" name="gpa" placeholder="Enter your GPA">
                </div>
                <input type="submit" value="Add" name="add_student" class="btn btn-primary">
            </form>
        <div>

        <?php
        if (isset($_POST['add_student'])) {
            $name = $_POST['name'];
            $gpa = $_POST['gpa'];
            $student->setName($name);
            $student->setGpa($gpa);
            $student->create();
        }
        ?>

        <?php
        if (isset($_GET['error'])) {
            echo "<div class='alert alert-danger mt-3'>" . $_GET['error'] . "</div>";
        }?>

        <div class="col-10 mb-3 mt-4">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>GPA</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $std): ?>
                        <tr>
                            <td><?php echo $std['ID']; ?></td>
                            <td><?php echo $std['Name']; ?></td>
                            <td><?php echo $std['Gpa']; ?></td>
                            <td><a href="index.php?ID=<?php echo $std['ID']; ?>&to_delete=1" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
