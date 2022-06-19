<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de gestion de stock | Modifier un produit</title>
</head>
<body>

    <?php
        require_once '../dbaccess.php';
        require_once './clientClass.php';
        $f = new Client;
        
        if(isset($_POST['submit'])){
            $f->setReference($_POST['ref']);
            $f->setNom($_POST['nom']);
            $f->setTel($_POST['tel']); 
            $f->setEmail($_POST['mail']);
            $f->setAdr($_POST['adr']);

            $f->update();
            header('location:listClient.php');
        }
    ?>
</body>
</html>