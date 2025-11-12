<?php 
include('db.php');
require_once('todo.php');

$db = new DatabasesConnection("localhost", "root", "", "todo");
$connection = $db->getConnection();

$todo = new Todo($connection);
$tasks = $todo->getAllTasks();

if (isset($_GET['id']) && isset($_GET['to_delete'])) {
    $task_id = $_GET['id'];
    $todo->setId($task_id);
    $todo->delete();
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
    <title>ToDo Application</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">ToDo List</h1>
        <div class="card mt-3">
            <div class="card-header">Add New Task</div>
            <div class="card-body">
                <form action="add_task.php" method="POST">
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
                                <a href="?id=<?php echo $task['id']; ?>&to_delete=1" class="btn btn-danger">Delete</a>
                                <a href="#updateModal" data-toggle="modal" data-id="<?php echo $task['id']; ?>" data-title="<?php echo $task['title']; ?>" data-description="<?php echo $task['description']; ?>" class="btn btn-warning update-btn">Update</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

 
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="index.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="update-id">
                        <div class="form-group">
                            <label for="update-title">Title:</label>
                            <input type="text" class="form-control" id="update-title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="update-description">Description:</label>
                            <textarea class="form-control" id="update-description" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.update-btn').on('click', function() {
                var id = $(this).data('id');
                var title = $(this).data('title');
                var description = $(this).data('description');

                $('#update-id').val(id);
                $('#update-title').val(title);
                $('#update-description').val(description);

                $('#updateModal').modal('show');
            });
        });
    </script>
</body>
</html>
