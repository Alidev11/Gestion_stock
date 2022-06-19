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
    <link rel="stylesheet" href="../Produits/addProduit.css">
    <link rel="stylesheet" href="../login.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./categorie.css">
    <link rel="stylesheet" href="../Produits/addProduit.css">
    

    
    <script src="https://kit.fontawesome.com/6d5b5d6689.js" crossorigin="anonymous"></script>
    <script src="../Js/jquery-3.6.0.min.js"></script>        
    <script src="../Js/jquery-3.6.0.js"></script>
    <title>Application de gestion de stock | Ajouter un produit</title>
</head>
<body>

    <?php
        require_once('../dbaccess.php') ;
        require_once('./produitClass.php') ;
        require_once('../Categories/categorieClass.php');
        $pr = new Product;
        $cat = new Categorie;
        $res = $cat->selectAll();
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
            $pr->add();
            header('location:listProduit.php');
        }
    ?>
    
    <div class="container1">
        <div class="nav">
            <div class="title">Ajouter un produit</div>
        </div>
        <div class="login">
            <?php require_once('../aside.php'); ?>
                
            <div class="form">
                <form action="addProduit.php" method="POST" enctype="multipart/form-data">
                    <i class="fab fa-product-hunt"></i>
                    <label for="ref">Reference:</label>
                    <input type="text" name="ref" id="ref" >
                    <label for="libelle">Libelle:</label>
                    <input type="text" name="libelle" id="libelle" >

                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image">

                    <label for="prix_u">Prix unitaire:</label>
                    <input type="text" name="prix_u" id="prix_u" >
                    <label for="qt">La quantite en stock:</label>
                    <input type="text" name="qt" id="qt" >
                    <label for="prix_v">Prix de vente:</label>
                    <input type="text" name="prix_v" id="prix_v" >
                    <label for="prix_a">Prix d'achat:</label>
                    <input type="text" name="prix_a" id="prix_a" >
                    <label for="cat">Categorie du produit:</label>
                    <select name=cat id=cat>
                        <?php
                            foreach($res as $p){ ?>
                                <option value = "<?php print_r( $p->catId) ?>"  ><?php print_r( $p->catId) ?> </option>
                        <?php } ?>
                        
                    </select>
                    <button type="submit" name='submit'>Ajouter</button>
                </form>
            </div>
            
        </div>
        
    </div>
    
    <div class="copyright">Copyright &copy; | AppStock All right reserved 2021 </div>
    <script src="../Js/app.js"></script>
    
</body>
</html>