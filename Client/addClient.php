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
    <link rel="stylesheet" href="../Produits/addProduit.css">
    <link rel="stylesheet" href="../Categories/categorie.css">
    <script src="https://kit.fontawesome.com/6d5b5d6689.js" crossorigin="anonymous"></script>
    <script src="../Js/jquery-3.6.0.min.js"></script>        
    <script src="../Js/jquery-3.6.0.js"></script>
    <title>Application de gestion de stock | Ajouter un Client</title>
</head>
<body>

    <?php
        require_once '../dbaccess.php';
        //session_start();
        require_once './clientClass.php';
        $f = new Client;
        if(isset($_POST['submit'])){
            $f->setNom($_POST['nom']);
            $f->setTel($_POST['tel']);
            $f->setEmail($_POST['mail']);
            $f->setAdr($_POST['adr']);

            $f->add();
            header('location:listClient.php');
        }
    ?>

    <div class="container1">
        <div class="nav">
            <div class="title">Ajouter un client</div>
        </div>
        
        <div class="login">
            <?php require_once('../aside.php'); ?>
            <div class="form">
                <form action="addClient.php" method="POST">
                    <i class="fas fa-users user"></i>
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" required>
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