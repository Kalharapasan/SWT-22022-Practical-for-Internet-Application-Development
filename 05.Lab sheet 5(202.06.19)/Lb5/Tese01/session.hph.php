<?php
    session_start();
    $_SESSION['username'] = "Kalhara";
    $_SESSION['index_no']="SEU/IS/20/ICT/084";
    $_SESSION['password']="#4535fdDED";
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php echo $_SESSION['username']; ?>
    <br>
    <?php echo $_SESSION['index_no']; ?>
    <br>
    <?php echo $_SESSION['password']; ?>

   

</body>
</html>
<?php 
     unset($_SESSION['username']);
     unset($_SESSION['index_no']);
     unset($_SESSION['password']);
     session_unset();
     session_destroy();
    ?>