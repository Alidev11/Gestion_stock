<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de gestion de stock | Logout</title>
</head>
<body>
    <?php 
        session_start();
        session_destroy();
        echo "Redirecting...";
        header("Location:login.php");
    
    
    ?>
</body>
</html>