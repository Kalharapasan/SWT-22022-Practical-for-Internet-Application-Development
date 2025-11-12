<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    if (!empty($name) && !empty($email)) {

        $message = "Thank you, $name! Your email address ($email) has been submitted successfully.";
    } else {
        $message = "Please fill in all fields.";
    }
} else {
    $message = "Invalid request method.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Submission Result</h1>
        <div class="alert alert-info" role="alert">
            <?php echo $message; ?>
        </div>
        <a href="index.html" class="btn btn-primary">Go Back</a>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
