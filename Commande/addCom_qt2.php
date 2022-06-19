<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../login.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../Categories/categorie.css">
    <link rel="stylesheet" href="../Produits/addProduit.css">
    <link rel="stylesheet" href="../Commande/addComqt.css">
    <script src="https://kit.fontawesome.com/6d5b5d6689.js" crossorigin="anonymous"></script>
    <script src="../Js/jquery-3.6.0.min.js"></script>        
    <script src="../Js/jquery-3.6.0.js"></script>
    <title>Application de gestion de stock | Quantite de commande</title>
</head>
<body>

    <?php
        require_once('../dbaccess.php') ;
        require_once('./commandeClass.php');
        require_once('../Produits/produitClass.php');
        $dbconnect = new Dbaccess();
        $com = new Commande();
        $pr = new Product();
        $res1 = $com->selectAll();
        $res2 = $pr->selectAll();  
        if(isset($_POST['submit'])){
            for($i = 0; $i<$_GET['iteration']; $i++){ 
                $com->setReference($_POST["ref"]);
                $com->setProduit($_POST[$i."refP"]); 
                $com->setproduitQt($_POST[$i."qt"]);
                $com->add1();
                $pr->setReference($_POST[$i."refP"]);
                $res = $pr->selectOne1();
                $pr->setQuantiteStock($res[0]->produitQt_stock);                
                $pr->update1($_POST[$i."qt"]);
            }
            header('location:listCommande.php');
        }
    ?>

    <div class="container1">
        <div class="nav">
            <div class="title">Description de la commande</div>
        </div>
        <div class="login">
            <?php require_once('../aside.php'); ?>
            <div class="form">
                <form action="addCom_qt2.php?iteration=<?php echo $_GET['iteration']; ?>" method="POST">
                <img src="../Images/Icons/voice-command.png" class="icon-img">
                    <label for="ref">Le numero de commande:</label>
                    <input type="text" name="ref" value="<?php echo $_SESSION['comId'] ?>">
                    <?php 
                        
                            for($i = 0; $i<$_GET['iteration']; $i++){ ?>
                                <label for=<?php echo $i."refP" ?> >Reference du produit:</label>
                                <select name=<?php echo $i."refP" ?> id=<?php echo $i."refP" ?>>
                                    <?php
                                        foreach($res2 as $p){ ?>
                                            <option value = "<?php print_r( $p->produitId) ?>"  ><?php print_r( $p->produitId) ?> </option>
                                    <?php } ?>
                                </select>
                                <label for=<?php echo $i."qt" ?>>La quantite du produit:</label>
                                <input type="number" name=<?php echo $i."qt" ?> id=<?php echo $i."qt" ?>>
                            <?php }
                        ?>
                        <button type="submit" name="submit">Ajouter</button>
                </form>
            </div>
        </div>
        
    </div>
    <div class="copyright">Copyright &copy; | AppStock All right reserved 2021 </div>
    <script src="../Js/app.js"></script>
</body>
</html>