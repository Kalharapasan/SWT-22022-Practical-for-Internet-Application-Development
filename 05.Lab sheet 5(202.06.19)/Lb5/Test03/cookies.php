<!DOCTYPE html>
<html>
<head>
    <title>Language Preference</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h2>Set Language Preference</h2>

                <?php
                $cookie_name = "language";
                $cookie_value = "English";
                $cookie_expiration = time() + (86400 * 5);
                setcookie($cookie_name, $cookie_value, $cookie_expiration, "/");

               
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_COOKIE[$cookie_name])) {
                        $language = $_COOKIE[$cookie_name];
                        echo "<p>Preferred language: " . htmlspecialchars($language) . "</p>";
                    } else {
                        echo "<p>Preferred language is not set.</p>";
                    }
                } else {
                    echo "<form method='POST'><button type='submit' class='btn btn-primary'>Show Preferred Language</button></form>";
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
