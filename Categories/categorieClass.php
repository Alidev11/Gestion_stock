<?php 
    require_once '../dbaccess.php';
    class Categorie{
        private $reference;
        private $description;

        public function __construct(){}

        public function getReference(){
            return $this->reference;
        }

        public function setReference($reference){
            $this->reference = $reference;
        }

        public function getDescription(){
            return $this->description;
        }

        public function setDescription($description){
            $this->description = $description;
        }

        public function add(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "INSERT INTO categorie(catId,catLibelle) 
                VALUES(
                        '" . $this->reference . "',
                        '".$this->description."'
                )";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            header('location:listCategorie.php');
            return 0;
        }

        public function update(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "UPDATE categorie SET 
                                    catId = '" . $this->reference . "',
                                    catLibelle = '" . $this->description . "'
                                    where catId = '"  . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

        public function delete(){
            $dbconnect = new Dbaccess();
            $sqlQuery = " DELETE FROM categorie WHERE catId = '" . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

        public function selectAll(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM categorie";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultSet();
        }

        public function selectOne(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM categorie WHERE catId = '" . $this->reference . "'";
            $dbconnect->query($sqlQuery);
            $dbconnect->execute();
            return $dbconnect->resultSet();
        }
    }
?>