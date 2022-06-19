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
    <title>Application de gestion de stock | Quantite d'approvisionnement</title>
</head>
<body>

    <?php
        require_once('../dbaccess.php') ;
        require_once('./approvisionClass.php');
        require_once('../Produits/produitClass.php');
        $dbconnect = new Dbaccess();
        $f = new Approvision();
        $pr = new Product();
        $res1 = $f->selectAll();
        $res2 = $pr->selectAll();          

        if(isset($_POST['submit'])){
            $f->setReference($_POST['ref']);
            $f->setProduit($_POST['refP']); 
            $f->setproduitQt($_POST['qt']);
            $f->add1();
            $pr->setReference($_POST["refP"]);
            $res = $pr->selectOne1();
            $pr->setQuantiteStock($res[0]->produitQt_stock);                
            $pr->update2($_POST["qt"]);
            header('location:listApp.php');    
        }  
    ?>

    <div class="container1">
        <div class="nav">
            <div class="title">Quantite d'approvisionnement</div>
            <form class="search" method="GET" action="addApp_qt2.php">
                <button type="submit" name="iterate" class="iterate">Enter</i></button>
                <input class="input-search" type="number" name="iteration" id="iteration">
            </form>
        </div>
        <div class="login">
                <?php require_once('../aside.php'); ?>
            <div class="form">         
                <form action="addApp_qt.php" method="POST">
                    <img src="../Images/Icons/buy.png" class="icon-img">
                    <label for="ref">Le numero d'approvisionnement:</label>
                    <input type="text" name="ref" value="<?php echo $_SESSION['appId'] ?>">
                    <label for="refP">Reference du produit:</label>
                    <select name="refP" id="refP">
                        <?php
                            foreach($res2 as $p){ ?>
                                <option value = "<?php print_r( $p->produitId) ?>"  ><?php print_r( $p->produitId) ?> </option>
                        <?php } ?>
                    </select>
                    <label for="qt">La quantite du produit:</label>
                    <input type="number" name="qt" id="qt">
                    <button type="submit" name="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
    <div class="copyright">Copyright &copy; | AppStock All right reserved 2021 </div>
    <script src="../Js/app.js"></script>
</body>
</html>