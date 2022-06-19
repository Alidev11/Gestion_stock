<?php 
    require_once '../dbaccess.php';
    class Approvision{
        private $reference;
        private $date;
        private $fournisseur;
        private $produit;
        private $qt_produit;

        public function __construct(){}

        public function getReference(){
            return $this->reference;
        }

        public function setReference($reference){
            $this->reference = $reference;
        }

        public function getDate(){
            return $this->date;
        }

        public function setDate($date){
            $this->date = $date;
        }

        public function getFournisseur(){
            return $this->fournisseur;
        }

        public function setFournisseur($fournisseur){
            $this->fournisseur = $fournisseur;
        }

        // ------------------------------------ acheter --------------------------------------

        public function getProduit(){
            return $this->produit;
        }

        public function setProduit($produit){
            $this->produit = $produit;
        }

        public function getproduitQt(){
            return $this->produitQt;
        }

        public function setproduitQt($produitQt){
            $this->produitQt = $produitQt;
        }

        // ------------------------------------ Approvisionement -------------------------------------

        public function add(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "INSERT INTO approvisionnement(appId,appDate,appFournisseur_num) 
                VALUES(
                        '".$this->reference."',
                        '".$this->date."',
                        '".$this->fournisseur."'
                )";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

        public function selectAll(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM approvisionnement";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultset();
        }

        //select jointure 
        public function selectOne(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM approvisionnement INNER JOIN  acheter ON approvisionnement.appId=acheter.ajoutApp_num WHERE appId = '" . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->single();
        }

        public function selectOne11(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM approvisionnement INNER JOIN  acheter ON approvisionnement.appId=acheter.ajoutApp_num WHERE appId = '" . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultSet();
        }

        public function selectRow(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM approvisionnement INNER JOIN  acheter ON approvisionnement.appId=acheter.ajoutApp_num WHERE appId = '" . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->rowCount();
        }

        // ------------------- acheter ----------------------

        public function add1(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "INSERT INTO acheter(ajoutProduit_num,ajoutApp_num,ajoutProduit_qt) 
                VALUES(
                        '".$this->produit."',
                        '".$this->reference."',
                        '".$this->produitQt."'
                )";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

        public function selectAll1(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM acheter";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultset();
        }

        public function selectAll2(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM approvisionnement INNER JOIN  acheter ON approvisionnement.appId=acheter.ajoutApp_num;";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultset();
        }
    }
?>