<?php 
    require_once('../dbaccess.php') ;
    
    class Product{
        private $reference;
        private $libelle;
        private $prixUnitaire;
        private $prixAchat;
        private $prixVente;
        private $quantiteStock;
        private $categorieProduit;
        private $image;

        public function __construct(){}

        public function getReference(){
            return $this->reference;
        }

        public function setReference($reference){
            $this->reference = $reference;
        }

        public function getLibelle(){
            return $this->libelle;
        }

        public function setLibelle($libelle){
            $this->libelle = $libelle;
        }

        public function getQuantiteStock(){
            return $this->quantiteStock;
        }

        public function setQuantiteStock($quantiteStock){
            $this->quantiteStock = $quantiteStock;
        }
        
        public function getPrixAchat(){
            return $this->prixAchat ;
        }

        public function setPrixAchat($prixAchat){
            $this->prixAchat = $prixAchat;
        }

        public function getPrixUnitaire(){
            return $this->prixUnitaire ;
        }

        public function setPrixUnitaire($prixUnitaire){
            $this->prixUnitaire = $prixUnitaire;
        }

        public function getPrixVente(){
            return $this->prixVente ;
        }

        public function setPrixVente($prixVente){
            $this->prixVente = $prixVente;
        }

        public function getCategorieProduit(){
            return $this->categorieProduit ;
        }

        public function setCategorieProduit($categorieProduit){
            $this->categorieProduit = $categorieProduit;
        }

        public function getImage(){
            return $this->image ;
        }

        public function setImage($image){
            $this->image = $image;
        }
        public function add(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "INSERT INTO produit(produitId, produitLibelle, produitPrix_u, produitPrix_a, produitPrix_v, produitQt_stock, produitCat, image) 
                VALUES(
                        '".$this->reference."',
                        '".$this->libelle."',
                        '".$this->prixUnitaire."',
                        '".$this->prixAchat."',
                        '".$this->prixVente."',
                        '".$this->quantiteStock."',
                        '".$this->categorieProduit."',
                        '".$this->image."'

                    )";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }
        public function update(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "UPDATE produit SET 
                                                produitLibelle = '" . $this->libelle . "',
                                                produitQt_stock = '"  . $this->quantiteStock. "',
                                                produitPrix_a = '"  . $this->prixAchat . "',
                                                produitPrix_u = '"  . $this->prixUnitaire . "',
                                                produitPrix_v = '"  . $this->prixVente . "',
                                                produitCat = '"  . $this->categorieProduit . "',
                                                image = '"  . $this->image . "'
                                                where produitId = '" . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

        public function delete(){
            $dbconnect = new Dbaccess();
            $sqlQuery = " DELETE FROM produit WHERE produitId = '" . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

        public function selectAll(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM produit";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultset();
        }

        public function selectOne(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM produit WHERE produitId = '" . $this->reference . "'";
            $dbconnect->query($sqlQuery);
            $dbconnect->execute();
            return $dbconnect->resultset();
        }

        public function selectOne1(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT produitQt_stock FROM produit WHERE produitId = '" . $this->reference . "'";
            $dbconnect->query($sqlQuery);
            $dbconnect->execute();
            return $dbconnect->resultset();
        }

        public function selectOne3(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM produit WHERE produitId = '" . $this->reference . "'";
            $dbconnect->query($sqlQuery);
            $dbconnect->execute();
            return $dbconnect->single();
        }

        public function update1($val){
            $dbconnect = new Dbaccess();
            if($this->quantiteStock < $val){
                $minus = 0;
            }else{
                $minus = $this->quantiteStock - $val;
            }
            $sqlQuery = "UPDATE produit SET 
                                                produitQt_stock = '"  . $minus. "'
                                                where produitId = '" . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

        public function update2($val){
            $dbconnect = new Dbaccess();
            $minus = $this->quantiteStock + $val;
            $sqlQuery = "UPDATE produit SET 
                                                produitQt_stock = '"  . $minus. "'
                                                where produitId = '" . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

    }


?>