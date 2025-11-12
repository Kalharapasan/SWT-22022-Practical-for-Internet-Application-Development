<?php
include('db.php');
require_once('todo.php');

$db = new Db("localhost", "root", "", "todo");
$db->connect();
$connection = $db->getConnection();

$todo = new Todo($connection);

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $todo->setId($task_id);
    $query = "SELECT * FROM task WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $task_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $task = mysqli_fetch_assoc($result);

    if (!$task) {
        die("Task not found!");
    }
} else {
    die("Invalid request!");
}

if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['description'])) {
    $task_id = $_POST['id'];
    $task_title = $_POST['title'];
    $task_description = $_POST['description'];

    $todo->setId($task_id);
    $todo->setTitle($task_title);
    $todo->setDescription($task_description);
    $todo->update();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Update Task</h1>
    <div class="card mt-3">
        <div class="card-header">Update Task</div>
        <div class="card-body">
            <form action="update_task.php?id=<?php echo $task['id']; ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($task['description']); ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Task</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
