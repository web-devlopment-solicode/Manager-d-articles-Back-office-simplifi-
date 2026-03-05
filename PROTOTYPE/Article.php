<?php
class Article {
    private $conn;
    private $table = "articles";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get all articles
    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    // Create article
    public function create($title, $content) {
        $query = "INSERT INTO " . $this->table . " (title, content)
                  VALUES (:title, :content)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);

        return $stmt->execute();
    }
}