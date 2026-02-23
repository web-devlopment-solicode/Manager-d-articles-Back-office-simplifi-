<?php
class User{
    private $conn;
    private $table = "users";

    public $id;
    public $nom;
    public $email;

    public function __construct($db){
        $this->conn = $db;
    }
    public function create(){
        $sql= "INSERT INTO {$this->table} (nom, email) VALUES (:nom, :email)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute (
            [
                'nom' => $this->nom, 'email' => $this->email]) ;
            }
    public function read() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update(){
        $sql = "UPDATE {$this->table} SET nom=:nom, email=:email WHERE id=:id" ;
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['nom' => $this->nom, 'email'=>$this->email, 'id'=>$this->id ]);
    }
    public function delete(){
        $sql = "DELETE FROM {$yhis->table} WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id'=> $this->id ]);
    }
}