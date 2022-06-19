<?php 
    require_once '../dbaccess.php';
    class Commande{
        private $reference;
        private $date;
        private $client;
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

        public function getClient(){
            return $this->client;
        }

        public function setClient($client){
            $this->client = $client;
        }

        // ------------------------------------ Commander --------------------------------------

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

        // ------------------------------------ Commande -------------------------------------

        public function add(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "INSERT INTO commande(commandeId,commandeDate,commandeClient_num)
                VALUES(
                        '".$this->reference."',
                        '".$this->date."',
                        '".$this->client."'
                )";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

        public function selectAll(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM commande";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultset();
        }

        public function selectOne(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM commande INNER JOIN  commander ON commande.commandeId=commander.comComm_num WHERE commandeId = '" . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->single();
        }

        public function selectOne11(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM commande INNER JOIN  commander ON commande.commandeId=commander.comComm_num WHERE commandeId = '" . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultSet();
        }

        public function selectRow(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM commande INNER JOIN commander ON commande.commandeId=commander.comComm_num WHERE commandeId = '" . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->rowCount();
        }

        // ------------------- Commander ----------------------

        public function add1(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "INSERT INTO commander(comProduit_id,comComm_num,comProduit_qt) 
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
            $sqlQuery = "SELECT * FROM commander";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultset();
        }

        public function selectAll2(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM commande INNER JOIN  commander ON commande.commandeId=commander.comComm_num;";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultset();
        }
    }
?>