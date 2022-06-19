<?php 
    require_once '../dbaccess.php';
    class Fournisseur{
        private $reference;
        private $nom;
        private $tel;
        private $email;
        private $adr;

        public function __construct(){}

        public function getReference(){
            return $this->reference;
        }

        public function setReference($reference){
            $this->reference = $reference;
        }

        public function getNom(){
            return $this->nom;
        }

        public function setNom($nom){
            $this->nom = $nom;
        }

        public function getTel(){
            return $this->tel;
        }

        public function setTel($tel){
            $this->tel = $tel;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getAdr(){
            return $this->adr;
        }

        public function setAdr($adr){
            $this->adr = $adr;
        }

        public function add(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "INSERT INTO fournisseur(fournisseurId,fournisseurNom,fournisseurTel,fournisseurEmail,fournisseurAdr) 
                VALUES(
                        '" . $this->reference . "',
                        '".$this->nom."',
                        '".$this->tel."',
                        '".$this->email."',
                        '".$this->adr."'
                    )";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            header('location:listFournisseur.php');
            return 0;
        }

        public function update(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "UPDATE fournisseur SET 
                                                -- fournisseurId = '" . $this->reference . "',
                                                fournisseurNom = '" . $this->nom . "',
                                                fournisseurTel = '"  . $this->tel. "',
                                                fournisseurEmail = '"  . $this->email . "',
                                                fournisseurAdr = '"  . $this->adr . "'
                                                where fournisseurId = '"  . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

        public function delete(){
            $dbconnect = new Dbaccess();
            $sqlQuery = " DELETE FROM fournisseur WHERE fournisseurId = '" . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

        public function selectAll(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM fournisseur";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultset();
        }

        public function selectOne(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM fournisseur WHERE fournisseurId = '" . $this->reference . "'";
            $sql = $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultset();
        }

    }


?>