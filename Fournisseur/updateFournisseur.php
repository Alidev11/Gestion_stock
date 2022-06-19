<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de gestion de stock | Modifier un fournisseur</title>
</head>
<body>

    <?php
        require_once '../dbaccess.php';
        require_once './fournisseurClass.php';
        $f = new Fournisseur;
        
        if(isset($_POST['submit'])){
            $f->setReference($_POST['ref']);
            $f->setNom($_POST['nom']); 
            $f->setTel($_POST['tel']);
            $f->setEmail($_POST['mail']);
            $f->setAdr($_POST['adr']);

            $f->update();
            header('location:listFournisseur.php');
        }
    ?>

    <!-- <div class="container1">
        
        
        <div class="login">
            <div class="wall">
                <div class="nav">
                    <div class="title">Modifier un Fournisseur</div>
                </div>
                <div class="copyright">Copyright &copy; | AppStock All right reserved 2021 </div>
            </div>
            <div class="form">
                <form action="updateFournisseur.php" method="POST">
                    <i class="fab fa-product-hunt"></i>
                    <label for="ref">Reference:</label>
                    <input type="text" name="ref" id="ref" >
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" >
                    <label for="tel">Numero de telephone:</label>
                    <input type="text" name="tel" id="tel" >
                    <label for="mail">Adresse electronique:</label>
                    <input type="email" name="mail" id="mail" >
                    <label for="adr">Adresse:</label>
                    <input type="text" name="adr" id="adr" >
                    <button type="submit" name='submit'>Modifier</button>
                </form>
            </div>
        </div>
        
    </div> -->
</body>
</html>