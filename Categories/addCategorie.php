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
    <title>Application de gestion de stock | Ajout des categories</title>
    <link rel="stylesheet" href="../login.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./categorie.css">
    
    <script src="https://kit.fontawesome.com/6d5b5d6689.js" crossorigin="anonymous"></script>
    <script src="../Js/jquery-3.6.0.min.js"></script>        
    <script src="../Js/jquery-3.6.0.js"></script>

</head>
<body>

    <?php
        require_once '../dbaccess.php';
        //session_start();
        require_once './categorieClass.php';
        $cat = new Categorie;
        if(isset($_POST['submit'])){
            $desc = $_POST['description'];
            $cat->setReference($_POST['ref']);
            $cat->setDescription("$desc");
            $cat->add();
            

        }
    ?>

    <div class="container1">
        <div class="nav">
            <div class="title">Ajouter une categorie </div>
        </div>
        
        <div class="login">
            <?php require_once('../aside.php'); ?>
            <div class="form">
                <form action="addCategorie.php" method="POST">
                    <i class="fas fa-users user"></i>
                    <label for="ref">Reference:</label>
                    <input type="text" name="ref" id="ref" required>
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" >
                    <button type="submit" name='submit'>Ajouter</button>
                </form>
            </div>
        </div>
        <div class="copyright">Copyright &copy; | AppStock All right reserved 2021 </div>
    </div>
    <script src="../Js/app.js"></script>
</body>
</html>