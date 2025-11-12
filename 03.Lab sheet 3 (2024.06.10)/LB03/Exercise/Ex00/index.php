<?php
include('db.php');
require_once('todo.php');

$db = new Db("localhost", "root", "", "todo");
$db->connect();
$connection = $db->getConnection();

$todo = new Todo($connection);
$tasks = $todo->getAllTasks();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $todo->setTitle($title);
    $todo->setDescription($description);

    if ($todo->create()) {
        header('Location: index.php?success=Successfully added task');
        exit();
    } else {
        header('Location: index.php?error=Failed to add task');
        exit();
    }
}

if (isset($_GET['id']) && isset($_GET['action'])) {
    if ($_GET['action'] === 'delete') {
        $task_id = $_GET['id'];
        $todo->setId($task_id);
        if ($todo->delete()) {
            header('Location: index.php?success=Successfully deleted task');
            exit();
        } else {
            header('Location: index.php?error=Failed to delete task');
            exit();
        }
    } elseif ($_GET['action'] === 'update') {
        $task_id = $_GET['id'];
        // Redirect to update_task.php with the task ID
        header('Location: update_task.php?id=' . $task_id);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Application</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-5">ToDo List</h1>
    <div class="card mt-3">
        <div class="card-header">Add New Task</div>
        <div class="card-body">
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Task</button>
            </form>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">Tasks</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($task['id']); ?></td>
                        <td><?php echo htmlspecialchars($task['title']); ?></td>
                        <td><?php echo htmlspecialchars($task['description']); ?></td>
                        <td>
                            <a href="index.php?id=<?php echo $task['id']; ?>&action=delete" class="btn btn-danger">Delete</a>
                            <a href="index.php?id=<?php echo $task['id']; ?>&action=update" class="btn btn-warning">Update</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
