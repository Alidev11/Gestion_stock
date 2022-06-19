
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
    <title>Application de gestion de stock | Ajouter une commande</title>
</head>
<body>

    <?php
        require_once('../dbaccess.php') ;
        require_once('./commandeClass.php');
        require_once('../Client/clientClass.php');
        $dbconnect = new Dbaccess();
        $com = new Commande();
        $client = new Client();
        $res3 = $client->selectAll();
        $i=0;
        if(isset($_POST['submit'])){
            $com->setReference($_POST['ref']);
            $com->setDate($_POST['date']); 
            $com->setClient($_POST['client']);


            $com->add();
            $_SESSION['comId'] = $com->getReference();
            header("location:addCom_qt.php?comId=".$com->getReference()."");
        }
    ?>

    <div class="container1">
        <div class="nav">
            <div class="title">Ajouter une commande</div>
        </div>
        
        <div class="login">
            <?php require_once('../aside.php'); ?>
            
            <div class="form">
                <form action="addCommande.php" method="POST">
                <img src="../Images/Icons/voice-command.png" class="icon-img">
                    <label for="ref">Reference:</label>
                    <input type="text" name="ref" id="ref" required>
                    <label for="date">La date:</label>
                    <input type="date" name="date" id="date" >
                    <label for="client">Le client:</label>
                    <select name="client" id="client">
                        <?php
                            foreach($res3 as $p){ ?>
                                <option value = "<?php print_r( $p->clientId) ?>"  ><?php print_r( $p->clientId) ?> </option>
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