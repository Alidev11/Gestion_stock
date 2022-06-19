<?php
    session_start();
    if(!isset($_SESSION['submit'])){
        header('location:../login.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../login.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../Categories/categorie.css">
    <link rel="stylesheet" href="../Produits/addProduit.css">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <script src="https://kit.fontawesome.com/6d5b5d6689.js" crossorigin="anonymous"></script>
    <script src="../Js/jquery-3.6.0.min.js"></script>        
    <script src="../Js/jquery-3.6.0.js"></script>
    <title>Application de gestion de stock | Ajouter un Fournisseur</title>
</head>
<body>

    <?php
        require_once '../dbaccess.php';
        //session_start();
        require_once './fournisseurClass.php';
        $f = new Fournisseur;
        if(isset($_POST['submit'])){
            $f->setReference($_POST['ref']);
            $f->setNom($_POST['nom']);
            $f->setTel($_POST['tel']);
            $f->setEmail($_POST['mail']);
            $f->setAdr($_POST['adr']);

            $f->add();
        }
    ?>

    <div class="container1">
        <div class="nav">
            <div class="title">Ajouter un fournisseur</div>
        </div>
        
        <div class="login">
            <?php require_once('../aside.php'); ?>
            <div class="form">
                <form action="addFournisseur.php" method="POST">
                    <i class="fas fa-users user"></i>
                    <label for="ref">Reference:</label>
                    <input type="text" name="ref" id="ref" required>
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom">
                    <label for="tel">Numero de telephone:</label>
                    <input type="tel" name="tel" id="tel" >
                    <label for="mail">E-mail:</label>
                    <input type="email" name="mail" id="mail" >
                    <label for="adr">Adresse:</label>
                    <input type="text" name="adr" id="adr" >
                    <button type="submit" name='submit'>Ajouter</button>
                </form>
            </div>
        </div>
        <div class="copyright">Copyright &copy; | AppStock All right reserved 2021 </div>
    </div>
    <script src="../Js/app.js"></script>
</body>
</html>