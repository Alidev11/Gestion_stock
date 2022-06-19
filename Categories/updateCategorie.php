<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de gestion de stock | Modifier une categorie</title>
</head>
<body>

    <?php
        require_once '../dbaccess.php';
        require_once './categorieClass.php';
        $cat = new Categorie;
        
        if(isset($_POST['submit'])){
            $cat->setReference($_POST['ref']);
            $cat->setDescription($_POST['libelle']);
            $cat->update();
            header('location:listCategorie.php');
        }
    ?>

</body>
</html>