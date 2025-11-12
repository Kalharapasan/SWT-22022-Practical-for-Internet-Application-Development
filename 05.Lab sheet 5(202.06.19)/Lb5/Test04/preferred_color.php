<?php
if (isset($_GET["color_scheme"])) {
    $new_scheme = $_GET["color_scheme"];
    if ($new_scheme === "light" || $new_scheme === "dark") {
        setcookie("color_scheme", $new_scheme, time() + 3600 * 24 * 7, "/"); 
        header("Location: preferred_color.php"); 
        exit; 
    }
}
$color_scheme = isset($_COOKIE["color_scheme"]) ? $_COOKIE["color_scheme"] : "light"; 
if ($color_scheme === "light") {
    $body_style = "background-color: #fff; color: #000;";
} else {
    $body_style = "background-color: #373A40; color: #fff;";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Preferred Color Scheme</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style="<?php echo $body_style; ?>">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h2>Select Your Color Scheme</h2>
                <a href="?color_scheme=light" class="btn btn-light">Light Mode</a>
                <a href="?color_scheme=dark" class="btn btn-dark">Dark Mode</a>
                <hr>
                <p>Your current color scheme is: <strong><?php echo htmlspecialchars($color_scheme); ?></strong></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
