<?php
    session_start();
    if(!isset($_SESSION['submit'])){
        header('location: ../login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de gestion de stock | Liste des approvisions</title>
    <link rel="stylesheet" href="../Produits/addProduit.css">
    <link rel="stylesheet" href="../Produits/listProduit.css">
    <script src="https://kit.fontawesome.com/6d5b5d6689.js" crossorigin="anonymous"></script>
    <script src="../Js/jquery-3.6.0.min.js"></script>        
    <script src="../Js/jquery-3.6.0.js"></script>
</head>
<body>
    <?php
        require_once '../dbaccess.php';
        require_once './approvisionClass.php';
        $c= new Approvision();
        $res=$c->selectAll2();
        if(isset($_POST['submit'])){
            $c->setReference($_POST['search']);
            $res=$c->selectOne();
        }
    

    ?>
        <table class="tableau">
            <caption class="caption">Approvisions</caption>
                <thead>
                    <tr>
                        <th>Reference</th>
                        <th>La date</th>
                        <th>Le numero du client</th>
                        <th>Reference du produit</th>
                        <th>Quantite du produit</th>
                        <th>Impression</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach($res as $p){ ?>
                        <tr class="row">
                            <td><?php echo "$p->appId" ?></td>
                            <td><?php echo "$p->appDate" ?></td>
                            <td><?php echo "$p->appFournisseur_num" ?></td>
                            <td><?php echo "$p->ajoutProduit_num" ?></td>
                            <td><?php echo "$p->ajoutProduit_qt" ?></td>
                            <?php echo "<td><a href=\"pdf.php?id=$p->appId\"><i class=\"fas fa-print\"></i></a></td>" ; ?>
                    <?php } ?>
                        </tr>



                </tbody>
        </table>
        <div class="popup">
            <div class="upHeader">
                <div class="upTitle">Modifier un produit</div>
                <button class="upClose">&times;</button>
            </div>
            <form class="update_form" action="updateProduit.php" method="POST">
                    <label for="ref">Reference du produit à modifier:</label>
                    <input class="upInput" type="number" name="ref" id="ref" value="<?php echo "$var" ?>" >
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
                    <input class="upInput" type="text" name="cat" id="cat" >
                    <button type="submit" name='submit' class="upButton">Modifier</button>
            </form>
        </div>
        <div class="upOverlay "></div>
<script src="../Js/app.js"></script>
</body>
</html>