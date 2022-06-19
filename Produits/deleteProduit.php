<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <?php
        require_once '../dbaccess.php';
        require_once './produitClass.php';
        $pr = new Product;
        $pr->setReference($_GET['id']);
        $pr->delete();
        header('location:listProduit.php');
    
    ?>
</body>
</html>