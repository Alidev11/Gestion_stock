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
        require_once './produitClass.php';
        $pr = new Product;
        
        if(isset($_POST['submit'])){
            $pr->setReference($_POST['ref']);
            $pr->setLibelle($_POST['libelle']);
            $pr->setQuantiteStock($_POST['qt']); 
            $pr->setPrixAchat($_POST['prix_a']);
            $pr->setPrixUnitaire($_POST['prix_u']);
            $pr->setPrixVente($_POST['prix_v']);
            $pr->setCategorieProduit($_POST['cat']);

            $src = $_FILES['image']['tmp_name'];
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $dest="../Images/".$_POST['libelle'].".".$ext;
            move_uploaded_file($src,$dest);

            $pr->setImage($dest);
            $pr->update();
            header('location:listProduit.php');
        }
    ?>

</body>
</html>