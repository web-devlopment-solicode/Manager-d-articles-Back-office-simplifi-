<?php
class database{
    private $host = "localhosat";
    private $dbname = "art" ; 
    private $username = "root";
    private $password = "" ;
    public $conn ;
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mwsql:host={$this->host};dname={$this->dbname};charset=utf8",$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            echo "erreur de connexion : " . $e->getMessage();
        }
        return $this->conn;
    }

}