<?php
    session_start();
    if(!isset($_SESSION['submit'])){
        header('location:../login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de gestion de stock | Liste des categories</title>
    <link rel="stylesheet" href="../Produits/addProduit.css">
    <link rel="stylesheet" href="../Produits/listProduit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/6d5b5d6689.js" crossorigin="anonymous"></script>
    <script src="../Js/jquery-3.6.0.min.js"></script>        
    <script src="../Js/jquery-3.6.0.js"></script>
</head>
<body>
    <?php
        require_once '../dbaccess.php';
        require_once './categorieClass.php';
        $cat = new Categorie;
        $res=$cat->selectAll();
        if(isset($_POST['submit'])){
            $text = $_POST['search'];
            $cat->setReference("$text");
            $res=$cat->selectOne();
        }
    

    ?>
    <form class="search" method="POST" action="listCategorie.php">
        <input class="input-search" type="text" name="search" id="search">
        <button type="submit" name="submit"><i class="fas fa-search" ></i></button>
    </form>
        <table class="tableau">
            <caption class="caption">Categories</caption>
                <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Libelle</th>
                        <th>Suppression</th>
                        <th>Modification</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach($res as $c){ $a=10; ?>
                        <tr class="row">
                            <td><?php echo "$c->catId"  ?></td>
                            <td><?php echo "$c->catLibelle" ?></td>
                            <?php echo "<td><a href=\"deleteCategorie.php?id=$c->catId\"><i class=\"fas fa-trash-alt\"></i></a></td>" ; ?>
                            <td><button class="edit"><i class="fas fa-edit"></i></button> </td>
                    <?php } ?>
                        </tr>
                </tbody>
        </table>
        <div class="popup">
            <div class="upHeader">
                <div class="upTitle">Modifier une cartegorie</div>
                <button class="upClose">&times;</button>
            </div>
            <form class="update_form" action="updateCategorie.php" method="POST">
                    <label for="ref">Reference du cartegorie à modifier:</label>
                    <input class="upInput" type="number" name="ref" id="ref" value="<?php echo "$var" ?>" >
                    <label for="libelle">Libelle:</label>
                    <input class="upInput" type="text" name="libelle" id="libelle" >
                    <button type="submit" name='submit' class="upButton">Modifier</button>
            </form>
        </div>
        <div class="upOverlay "></div>
<script src="../Js/app.js"></script>
</body>
</html>