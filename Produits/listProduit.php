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
    <title>Application de gestion de stock | Liste des produits</title>
    <!-- <link rel="stylesheet" href="../login.css"> -->
    <link rel="stylesheet" href="./addProduit.css">
    <link rel="stylesheet" href="./listProduit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/6d5b5d6689.js" crossorigin="anonymous"></script>
    <script src="../Js/jquery-3.6.0.min.js"></script>        
    <script src="../Js/jquery-3.6.0.js"></script>
</head>
<body>
    <?php
        require_once '../dbaccess.php';
        require_once './produitClass.php';
        require_once '../Categories/categorieClass.php';
        $pr= new Product;
        $cat = new Categorie();
        $res=$pr->selectAll();
        $res1 = $cat->selectAll();
        $dest = 0;
        if(isset($_POST['submit'])){
            $text = $_POST['search'];
            $pr->setReference("$text");
            $res=$pr->selectOne();
        }
    

    ?>
    <form class="search" method="POST" action="listProduit.php">
        <input class="input-search" type="text" name="search" id="search">
        <button type="submit" name="submit"><i class="fas fa-search" ></i></button>
    </form>
        <table class="tableau">
            <caption class="caption">Produits</caption>
                <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Image</th>
                        <th>Libelle</th>
                        <th>Quantite initiale en stock</th>
                        <th>Prix unitaire</th>
                        <th>Prix d'achat</th>
                        <th>Prix de vente</th>
                        <th>Categorie du produit</th>
                        <th>Suppression</th>
                        <th>Modification</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach($res as $p){ ?>
                        <tr class="row">
                            <td><?php echo "$p->produitId" ?></td>
                            <td><img src="<?php echo "$p->Image" ?>" class="upload"> </td>
                            <td><?php echo "$p->produitLibelle" ?></td>
                            <td><?php echo "$p->produitQt_stock" ?></td>
                            <td><?php echo "$p->produitPrix_u" ?></td>
                            <td><?php echo "$p->produitPrix_a" ?></td>
                            <td><?php echo "$p->produitPrix_v" ?></td>
                            <td><?php echo "$p->produitCat" ?></td>
                            <?php echo "<td><a href=\"deleteProduit.php?id=$p->produitId\"><i class=\"fas fa-trash-alt\"></i></a></td>" ; ?>
                            <td><button class="edit"><i class="fas fa-edit"></i></button> </td>
                    <?php } ?>
                        </tr>
                </tbody>
        </table>
        
        <div class="popup">
            <div class="upHeader">
                <div class="upTitle">Modifier un produit</div>
                <button class="upClose">&times;</button>
            </div>
            <form class="update_form" action="updateProduit.php?dest=<?php  print_r($dest); ?>" method="POST" enctype="multipart/form-data">
                    <label for="ref">Reference du produit à modifier:</label>
                    <input class="upInput" type="number" name="ref" id="ref" value="" >

                    <label for="image">Image:</label>
                    <input class="upInput" type="file" name="image" id="image">

                    <label for="libelle">Libelle:</label>
                    <input class="upInput" type="text" name="libelle" id="libelle" >
                    <label for="prix_u">Prix unitaire:</label>
                    <input class="upInput" type="text" name="prix_u" id="prix_u" >
                    <label for="qt">La quantite en stock:</label>
                    <input class="upInput" type="text" name="qt" id="qt" >
                    <label for="prix_v">Prix de vente:</label>
                    <input class="upInput" type="text" name="prix_v" id="prix_v" >
                    <label for="prix_a">Prix d'achat:</label>
                    <input class="upInput" type="text" name="prix_a" id="prix_a" >
                    <label for="cat">Categorie du produit:</label>
                    <select class="upInput" name="cat" id="cat">
                        <?php
                            foreach($res1 as $p){ ?>
                                <option value = "<?php print_r( $p->catId) ?>"  ><?php print_r( $p->catId) ?> </option>
                        <?php } ?>
                    </select>
                    <button type="submit" name='submit' class="upButton">Modifier</button>
            </form>
        </div>
        <div class="upOverlay "></div>
        <script src="../Js/app.js"></script>
</body>
</html>