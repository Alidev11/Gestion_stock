<?php 
    require_once '../dbaccess.php';
    class Client{
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
            $sqlQuery = "INSERT INTO client(clientNom,clientTel,clientEmail,clientAdr) 
                VALUES(
                        '".$this->nom."',
                        '".$this->tel."',
                        '".$this->email."',
                        '".$this->adr."'
                    )";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

        public function update(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "UPDATE client SET 
                                                -- reference = '" . $this->reference . "',
                                                clientNom = '" . $this->nom . "',
                                                clientTel = '"  . $this->tel. "',
                                                clientEmail = '"  . $this->email . "',
                                                clientAdr = '"  . $this->adr . "'
                                                where clientId = '"  . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

        public function delete(){
            $dbconnect = new Dbaccess();
            $sqlQuery = " DELETE FROM client WHERE clientId = '" . $this->reference . "'";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return 0;
        }

        public function selectAll(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM client";
            $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultset();
        }

        public function selectOne(){
            $dbconnect = new Dbaccess();
            $sqlQuery = "SELECT * FROM client WHERE clientId = '" . $this->reference . "'";
            $sql = $dbconnect->query("$sqlQuery");
            $dbconnect->execute();
            return $dbconnect->resultset();
        }

    }


?>