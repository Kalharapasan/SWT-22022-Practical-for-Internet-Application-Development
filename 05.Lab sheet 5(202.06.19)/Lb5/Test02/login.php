<?php
    session_start();
    $username = "Kalhara";
    $password = "Pasa2001#";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $entered_username = $_POST['username']; 
        $entered_password = $_POST['password']; 

        if ($entered_username === $username && $entered_password === $password) {
            $_SESSION['username'] = $username; 
            header("Location: profile.php"); 
            exit;
        } else {
            $error_message = "Invalid username or password.";
        } 
    }
?>



<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">   

</head>
<body>
    <div class="container">
        <div   
 class="row justify-content-center">
            <div class="col-md-6">
                <h2>Login</h2>   


                <?php if (isset($error_message)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php } ?>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="mb-3">   

                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>   


                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>   

                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>