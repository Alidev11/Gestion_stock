<?php 

    class Dbaccess {
        private $dbHost = 'localhost';
        private $username = 'root';
        private $password = '';
        private $dbName = 'gs';

        private $_statement;
        private $_dbHandler;
        private $_error;

        public function __construct() {
            $dbconnect = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
            try {
                $this->_dbHandler = new PDO($dbconnect, $this->username, $this->password);
                $this->_dbHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sqlQuery1 = "SET CHARSET utf8";
                $sql1 = $this->_dbHandler->prepare($sqlQuery1);
                $sql1->execute();
                $sqlQuery2 = "SET NAMES utf8";
                $sql2 = $this->_dbHandler->prepare($sqlQuery2);
                $sql2->execute();
            } catch (PDOException $e) {
                $this->_error = $e->getMessage();
                echo $this->_error;
            }
        }

        // Prepare statement
        public function query($sql) {
            $this->_statement = $this->_dbHandler->prepare($sql);
        }

        //Execute statement
        public function execute() {
            return $this->_statement->execute();
        }

        //Execute statement with var1 as parameter
        public function execute_var1($var1) {
            return $this->_statement->execute(
                array($var1)
            );
        }

        //Execute the prepared statement with var2 and var1
        public function execute_var2($var1,$var2) {
            return $this->_statement->execute(
                array($var1,$var2)
            );
        }

        //Execute the prepared statement with var2 and var1 and var3
        public function execute_var3($var1,$var2,$var3) {
            return $this->_statement->execute(
                array($var1,$var2,$var3)
            );
        }
        
        public function resultSet() {
            $this->execute();
            return $this->_statement->fetchAll(PDO::FETCH_OBJ);
        }

        public function resultSet1() {
            $this->execute();
            return $this->_statement->fetchAll(PDO::FETCH_ASSOC);
        }

        
        public function single() {
            $this->execute();
            return $this->_statement->fetch(PDO::FETCH_OBJ);
        }

        
        public function rowCount() {
            return $this->_statement->rowCount();
        }
    }
?>