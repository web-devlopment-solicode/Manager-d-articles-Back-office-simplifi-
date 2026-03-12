<?php
require_once 'Database.php';

class Article {
    private $conn;
    private $table = "articles";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Lire tous les articles
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ajouter un article
    public function create($title, $content) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (title, content, created_at) VALUES (:title, :content, NOW())");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    }

    // Récupérer un article par ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Modifier un article
    public function update($id, $title, $content) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET title = :title, content = :content WHERE id = :id");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Supprimer un article
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>