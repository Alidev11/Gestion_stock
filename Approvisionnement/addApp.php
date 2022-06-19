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
    
    <link rel="stylesheet" href="../login.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../Categories/categorie.css">
    <link rel="stylesheet" href="../Produits/addProduit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/6d5b5d6689.js" crossorigin="anonymous"></script>
    <script src="../Js/jquery-3.6.0.min.js"></script>        
    <script src="../Js/jquery-3.6.0.js"></script>
    <title>Application de gestion de stock | Ajouter un approvisionnement</title>
</head>
<body>

    <?php
        require_once('../dbaccess.php') ;
        require_once('./approvisionClass.php');
        require_once('../Fournisseur/fournisseurClass.php');
        $dbconnect = new Dbaccess();
        $app = new Approvision();
        $f = new Fournisseur();
        $res3 = $f->selectAll();
        $i=0;
        if(isset($_POST['submit'])){
            $app->setReference($_POST['ref']);
            $app->setDate($_POST['date']); 
            $app->setFournisseur($_POST['four']);


            $app->add();
            $_SESSION['appId'] = $app->getReference();
            header("location:addApp_qt.php?appId=".$app->getReference()."");
        }
    ?>

    <div class="container1">
        <div class="nav">
            <div class="title">Ajouter un approvisionnement</div>
        </div>
        
        <div class="login">
            <?php require_once('../aside.php'); ?>
            
            <div class="form">
                <form action="addApp.php" method="POST">
                    <img src="../Images/Icons/buy.png" class="icon-img">
                    <label for="ref">Reference:</label>
                    <input type="text" name="ref" id="ref" required>
                    <label for="date">La date:</label>
                    <input type="date" name="date" id="date" >
                    <label for="four">Le fournisseur:</label>
                    <select name="four" id="four">
                        <?php
                            foreach($res3 as $p){ ?>
                                <option value = "<?php print_r( $p->fournisseurId) ?>"  ><?php print_r( $p->fournisseurId) ?> </option>
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