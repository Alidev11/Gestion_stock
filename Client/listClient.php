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
    <link rel="stylesheet" href="../Produits/addProduit.css">
    <link rel="stylesheet" href="../Produits/listProduit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/6d5b5d6689.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400&display=swap" rel="stylesheet">
    <script src="../Js/jquery-3.6.0.min.js"></script>        
    <script src="../Js/jquery-3.6.0.js"></script>
    <link href="../Js/scrollpoint.jquery.css" rel="stylesheet">
    <script src="../Js/scrollpoint.jquery.js"></script>
</head>
<body>
    <?php
        require_once '../dbaccess.php';
        require_once './clientClass.php';
        $f= new Client();
        $res=$f->selectAll();
        if(isset($_POST['submit'])){
            $text = $_POST['search'];
            $f->setReference("$text");
            $res=$f->selectOne();
        }
    

    ?>
    <form class="search" method="POST" action="listClient.php">
        <input class="input-search" type="text" name="search" id="search">
        <button type="submit" name="submit"><i class="fas fa-search" ></i></button>
    </form>
        <table class="tableau">
            <caption class="caption">Clients</caption>
                <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Nom</th>
                        <th>Telephone</th>
                        <th>Adresse e-mail</th>
                        <th>Adresse</th>
                        <th>Suppression</th>
                        <th>Modification</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach($res as $f){ ?>
                        <tr class="row">
                            <td><?php echo "$f->clientId"  ?></td>
                            <td><?php echo "$f->clientNom" ?></td>
                            <td><?php echo "$f->clientTel" ?></td>
                            <td><?php echo "$f->clientEmail" ?></td>
                            <td><?php echo "$f->clientAdr" ?></td>
                            <?php echo "<td><a href=\"deleteClient.php?id=$f->clientId\"><i class=\"fas fa-trash-alt\"></i></a></td>" ; ?>
                            <td><button class="edit"><i class="fas fa-edit"></i></button> </td>
                    <?php } ?>
                        </tr>
                </tbody>
        </table>
        <div class="popup">
            <div class="upHeader">
                <div class="upTitle">Modifier un client</div>
                <button class="upClose">&times;</button>
            </div>
            <form class="update_form" action="updateClient.php" method="POST">
                    <!-- <i class="fab fa-product-hunt"></i> -->
                    <label for="ref">Reference du client à modifier:</label>
                    <input class="upInput" type="number" name="ref" id="ref" value="<?php echo "$var" ?>" >
                    <label for="nom">Nom:</label>
                    <input class="upInput" type="text" name="nom" id="nom" >
                    <label for="mail">Adresse electronique:</label>
                    <input class="upInput" type="email" name="mail" id="mail" >
                    <label for="tel">Numero de telephone:</label>
                    <input type="text" name="tel" id="tel" class="upInput">
                    <label for="adr">Adresse:</label>
                    <input class="upInput" type="text" name="adr" id="adr" >
                    <button type="submit" name='submit' class="upButton">Modifier</button>
            </form>
        </div>
        <div class="upOverlay "></div>
<script src="../Js/app.js"></script>
<script src="../Js/app.js"></script>
<script src="../Js/jquery-3.6.0.min.js"></script>        
    <script src="../Js/jquery-3.6.0.js"></script>
    <link href="../Js/scrollpoint.jquery.css" rel="stylesheet">
    <script src="../Js/scrollpoint.jquery.js"></script>

</body>
</html>