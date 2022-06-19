<?php
    session_start();
    if(!isset($_SESSION['submit'])){
        header('location:./login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de gestion de stock | Homepage</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/6d5b5d6689.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400&display=swap" rel="stylesheet">
    <script src="./Js/jquery-3.6.0.min.js"></script>        
    <script src="./Js/jquery-3.6.0.js"></script>
    
</head>

<body>
<?php
    
    require_once './dbaccess.php';
    $dbconnect = new Dbaccess();

    $sqlQuery = "SELECT * FROM produit";
    $dbconnect->query("$sqlQuery");
    $dbconnect->execute();
    $res=$dbconnect->resultset();
    $resu=$dbconnect->resultset1();
    $rowNum = $dbconnect->rowCount();

    $sqlQuery1 = "SELECT * FROM categorie";
    $dbconnect->query("$sqlQuery1");
    $dbconnect->execute();
    $res1=$dbconnect->resultset();
    $rowNum1 = $dbconnect->rowCount();

    $sqlQuery2 = "SELECT * FROM fournisseur";
    $dbconnect->query("$sqlQuery2");
    $dbconnect->execute();
    $res2=$dbconnect->resultset();
    $rowNum2 = $dbconnect->rowCount();

    $sqlQuery3 = "SELECT * FROM client";
    $dbconnect->query("$sqlQuery3");
    $dbconnect->execute();
    $res3=$dbconnect->resultset();
    $rowNum3 = $dbconnect->rowCount();

    $sqlQuery4 = "SELECT * FROM commande";
    $dbconnect->query("$sqlQuery4");
    $dbconnect->execute();
    $res4=$dbconnect->resultset();
    $rowNum4 = $dbconnect->rowCount();


?>


    <div class="contain1">
        <aside>
            <div class="menu"><img src="./Images/Icons/open-menu.png" class="menu-icon"> 
                <div class="menu-txt ">Menu</div> 
            </div>
            <div class="pr prod">
                <img src="./Images/Icons/product.png" class="icons">
                <div >Produits <i class="fas fa-chevron-down"></i></div> 
            </div>
            <div class="produit none">
                <div class="pr pr1 "><a class="pr-link" href="./Produits/addProduit.php" _blank>Ajouter un produit</a></div>
                <div class="pr pr1 "><a class="pr-link" href="./Produits/listProduit.php">Liste des produits</a> </div>
            </div>
            
            <div class="pr cat">
                <img src="./Images/Icons/categories.png" class="icons">
                <div >Categories <i class="fas fa-chevron-down"></i></div> 
            </div>
            <div class="categorie none">
                <div class="pr pr1"><a class="pr-link" href="./Categories/addCategorie.php">Ajouter une categorie</a></div>
                <div class="pr pr1"><a class="pr-link" href="./Categories/listCategorie.php">Liste des categories</a></div>
            </div>

            <div class="pr fourn">
                <img src="./Images/Icons/loan.png" class="icons">
                <div c>Fournisseurs <i class="fas fa-chevron-down"></i></div> 
            </div>
            <div class="fournisseur none">
                <div class="pr pr1"><a class="pr-link" href="./Fournisseur/addFournisseur.php">Ajouter un fournisseur</a></div>
                <div class="pr pr1"><a class="pr-link" href="./Fournisseur/listFournisseur.php">Liste des fournisseurs</a></div>
            </div>

            <div class="pr client">
                <img src="./Images/Icons/loan.png" class="icons">
                <div >Clients <i class="fas fa-chevron-down"></i></div> 
            </div>
            <div class="cli none">
                <div class="pr pr1"><a class="pr-link" href="./Client/addClient.php">Ajouter un client</a></div>
                <div class="pr pr1"><a class="pr-link" href="./Client/listClient.php">Liste des clients</a></div>
            </div>
            
            <div class="pr com">
                <img src="./Images/Icons/voice-command.png" class="icons">
                <div >Commandes <i class="fas fa-chevron-down"></i></div> 
            </div>
            <div class="commande none">
                <div class="pr pr1"><a class="pr-link" href="./Commande/addCommande.php">Ajouter une commande</a></div>
                <div class="pr pr1"><a class="pr-link" href="./Commande/listCommande.php">Liste des commandes</a></div>
            </div>

            <div class="pr app">
                <img src="./Images/Icons/buy.png" class="icons">
                <div>Approvisionnements <i class="fas fa-chevron-down"></i></div> 
            </div>
            <div class="appro none">
                <div class="pr pr1"><a class="pr-link" href="./Approvisionnement/addApp.php">Ajout d'approvisionnement</a></div>
                <div class="pr pr1"><a class="pr-link" href="./Approvisionnement/listApp.php">Liste des approvisionnements</a></div>
                
            </div>
        </aside>
        <div class="body">
            <header>
                <div class="nav">
                    <div class="logo-text">AppStock</div>
                    <div class="welcome">Bienvenue <?php echo $_SESSION['username']?> !</div>
                    <div class="logout"><a href="logout.php" class="outLink">Logout</a> </div>
                </div>
                <div class="space">
                    <div class="text">
                        <div class="text1">Gestion de stock</div>
                        <div class="text2">Ceci est une application web permettant la gestion de <br> stock d'une entreprise et qui contient plusieurs fonctionnalités. </div>
                        <div class="btn"><a class="btn-link" href="#tab">Learn more</a> </div>
                    </div>
                    <div class="image"></div>
                    
                </div>
            </header>
            <div class="dash">
                <div class="pr-title" id="tab">Tableau de bord</div>
                <div class="cards">
                    <div class="card1">
                        <div class="innerTxt"><?php echo "$rowNum" ?> Produits</div> 
                        <div class="part">Produits</div>  
                    </div>
                    <div class="card1">
                        <div class="innerTxt"><?php echo "$rowNum3" ?> Clients</div> 
                        <div class="part">Clients</div>
                    </div>
                    <div class="card1">
                        <div class="innerTxt"><?php echo "$rowNum2" ?> Fournisseurs</div> 
                        <div class="part">Fournisseurs</div> 
                    </div>
                    <div class="card1">
                        <div class="innerTxt"><?php echo "$rowNum2" ?> Commandes</div> 
                        <div class="part">Commandes</div>   
                    </div>
                    <div class="card1">
                        <div class="innerTxt"><?php echo "$rowNum1" ?> Categories</div> 
                        <div class="part">Categories</div> 
                    </div>
                </div>
            </div>
            <div class="stat">
                <div class="pr-title">Quantite de stock</div>
                <div class="chart1">
                    <canvas id="myChart"></canvas>
                </div>
                
            </div>
        </div>
    </div> 
    <script>
        const labels = [
            'clavier',
            'Mac pro',
            'Earphone white K-33',
            'Souris',
            'Mac'
            
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'Quantite de stock',
                data: [3000, 2000, 1927, 2000, 1000],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
            };

        const config = {
            type: 'polarArea',
            data: data,
            options: {}
        };
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    
    <script src="./Js/app.js"></script>
</body>

<footer class="footer">
            <div class="line22"></div>
        <div class="copy">copyright © - 2021 tous les droits sont réservés </div>
        <div class="footer-links">
            <ul class="footer-icon">
                <li class="footer-li"><a class="footer-a" href="https://www.facebook.com/ste.sofamaroc"><i class="fab fa-facebook-f iconn"></i></a></li>
                <li class="footer-li"><a class="footer-a" href="https://www.instagram.com/sofamaroc/"><i class="fab fa-instagram iconn"></i></a></li>
                <li class="footer-li"><a class="footer-a" href="https://www.linkedin.com/in/sofa-maroc-a48087217"><i class="fab fa-linkedin-in iconn"></i></a></li>
                <li class="footer-li"><a class="footer-a" href="https://www.youtube.com/channel/UCXIpY-nFuHtYcSk1_B3E1HA"><i class="fab fa-youtube iconn"></i></a></li>
            </ul>
        </div>
        <div class="custom-shape-divider-bottom-1640443358">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>
    </footer>

</html>