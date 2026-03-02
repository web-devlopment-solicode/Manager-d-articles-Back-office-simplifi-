<?php
class Utilisateur {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($nom, $email, $article) {
        $sql = "INSERT INTO users (nom, email, article)
                VALUES (:nom, :email, :article)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nom'     => $nom,
            ':email'   => $email,
            ':article' => $article
        ]);
    }
}
